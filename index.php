<html>
<head>
    <title>Ajax Request</title>
    <script type="text/javascript" src="jquery/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="create">
        <form method="post" id="create">
            <fieldset>
                <legend>Inset Person</legend>
                <label for="name">Name:</label>
                <input type="text" name="name" required>

                <label for="age">Age:</label>
                <input type="text" name="age" required>

                <label for="genre">Genre:</label>
                <select name="genre">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

                <label for="hobbie">Hobbie:</label>
                <input type="text" name="hobbie" required>

                <label></label>
                <input type="submit" value="Send" required>
            </fieldset>

            <script>
                $("#create").submit(function(event) {
                    event.preventDefault();
                    const request = new Request("actions/insert.php", {
                        method: "POST",
                        body: new FormData( document.querySelector("form") )
                    });
                    fetch(request).then( response => {
                        $("#create").trigger('reset'); //
                    })
                });
            </script>
        </form>
    </div>

    <div class="read">
        <fieldset>
            <legend>Read Persons</legend>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Genre</th>
                    <th>Hobbie</th>
                </tr>
                <?php
                    $host   = "localhost";
                    $user   = "hygorp";
                    $pass   = "Raimundo$123";
                    $schema = "ajax";
                    $conn   = mysqli_connect($host, $user, $pass) or die ('Connection Error');

                    $sql    = "SELECT * FROM person";
                    mysqli_select_db($conn, $schema);
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_array($result)){
                        $name   = $row['name'];
                        $age    = $row['age'];
                        $genre  = $row['genre'];
                        $hobbie = $row['hobbie'];
                        echo "
                        <tr>
                            <td>$name</td>
                            <td>$age</td>
                            <td>$genre</td>
                            <td>$hobbie</td>
                        </tr>
                        ";
                    }
                ?>
            </table>
        </fieldset>
    </div>
</body>
</html>
<html>
    <head>
    </head>
    <body>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user_admin";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        printf("Connected Successfully!\n");

        $sql = "CREATE TABLE user (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL,
            password VARCHAR(255) NOT NULL,
            role ENUM('user', 'admin') NOT NULL
        )";

        if ($conn->query($sql) === TRUE) {
            echo "Table 'user' created successfully!";
        } else {
            echo "Error creating table: " . $conn->error;
        }

        $conn->close();
    ?>

    </body>
</html>
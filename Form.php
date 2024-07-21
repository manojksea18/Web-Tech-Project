
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        //to connect db and instert data to db
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $gender = $_POST['gender'];
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "dbhcoe";

        //create connection
        $conn = mysqli_connect($servername, $username, $password, $db);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // $name = mysqli_real_escape_string($conn, $name);
        // $password = mysqli_real_escape_string($conn, $password);
        // $email = mysqli_real_escape_string($conn, $email);
        // $number = mysqli_real_escape_string($conn, $number);
        // $gender = mysqli_real_escape_string($conn, $gender);

        $sql = "INSERT INTO registration (name,password,email,number,gender) VALUES ('$name','$password','$email','$number','$gender')";
        //check connection

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    } else {
        echo "Invalid request method.";
    }

    ?>

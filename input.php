<!DOCTYPE html>
<html>
    <head>
        <title>Registration Form</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="shortcut icon" href="logo.jfif" type="image/x-icon"/>
    </head>
    <body class="in">
        <header>
             <nav>
                <a href="output.php" class="output-link">Output Page</a>
             </nav>
        </header>
        <main>
        <div class="main">
        <div class="register">
            <h2>Register Here</h2>
            <form action="/assignment1/input.php" method="post">
                <label>First Name : </label>
                <br>
                <input type="text" name="fname" id="name" placeholder="Enter your First Name">
                <br><br>
                <label>Last Name : </label>
                <br>
                <input type="text" name="lname" id="name" placeholder="Enter your Last Name">
                <br><br>
                <label>Age : </label>
                <br>
                <input type="number" name="age" id="name" placeholder="How old are you?">
                <br><br>
                <label>Email : </label>
                <br>
                <input type="email" name="email" id="name" placeholder="Enter your valid email">
                <br><br>
                <label>Department : </label>
                <br>
                <input type="text" name="dept" id="name" placeholder="Enter your Department">
                <br><br>
                <input type="submit" value="Submit" name="submit" id="submit">
              </form>
              <!---------------------------php---------------------------------->
              
              <?php
            // Check if the form was submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $age = $_POST['age'];
                $email = $_POST['email'];
                $dept = $_POST['dept'];

            // Validate age as a non-empty integer
            if (!empty($age) && is_numeric($age) && $age > 0) {
                // Database connectivity
                $servername = "localhost";
                $username = "root";
                $password = "Sharma@6473";
                $database = "assignments";

                // Create a connection
                $conn = mysqli_connect($servername, $username, $password, $database);

                // Check if the connection was successful
                if (!$conn) {
                    die("Sorry, connection failed!!" . mysqli_connect_error());
                } else {
                    // Submit the data to the database
                    $sql = "INSERT INTO `as1` (`fname`, `lname`, `age`, `email`, `dept`) VALUES ('$fname', '$lname', '$age', '$email', '$dept')";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        echo "Data inserted successfully";
                    } else {
                        echo "Data not inserted due to " . mysqli_error($conn);
                    }
                        }
            } else {
                echo "Please enter a valid age.";
            }
        }
        ?>

        </div>
        </div>
        </main>
        <footer>
    <p><small>Author: Ritika</small></p>
    </footer>
    </body>
</html>
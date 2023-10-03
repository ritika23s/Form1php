<!--------------------php begins-------------------->
<?php
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
    echo "Connection successful";
}

$sql = "SELECT * FROM `as1`"; // Use backticks (`) instead of single quotes (')
$result = mysqli_query($conn, $sql);

// Find the number of records in the table
$num = mysqli_num_rows($result);

echo "<br/>";
echo $num;

//display records using while loop
while($row=mysqli_fetch_assoc($result))
{
    echo"<br/>";
    echo"User details...";
    echo"<br/>";    
    echo"First Name : ". $row['fname']."    Last Name : ".$row['lname']."   Age : ".$row['age']."    Email : ".$row['email']."   Department : ".$row['dept'];
    echo"<br/>";


}
?>
<!---------------------------------php ends------------------------->

<!-------------------html code--------------------->
<!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <title>Login Details</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="shortcut icon" href="logo.jfif" type="image/x-icon"/>
    </head>
    <body class="out">
    <header>
      <nav>
        <ul>
          <li><a href="input.php">Input Page</a></li>
        </ul>
      </nav>
    </header>
    <main>
    <h1 class="outfix">Login Details</h1>    
    <table>
        <tbody>
    <?php
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
            <td><?php echo $row['fname']; ?></td>
            <td><?php echo $row['lname']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['dept']; ?></td>
        </tr>
    <?php
    }
    ?>
</tbody>
    </table>
   
    </main>
    <footer>
      <p>Author: Ritika</p>
    </footer>
  </body>
</html>

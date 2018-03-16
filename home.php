<?php 
include "server.php";
session_start();
?>
<!DOCTYPE html>
<html>
<body>
    <h1>PRODUCT FEDDBACK</h1>
    <ul>
    <li>Already a member<a href="login.php">Login</a></li>
    <li>Not a member?<a href="register.php">Register</a></li>
    <li><h2>Products</h2></li>
    <ul>
                    <?php 
                    $qry = "SELECT * FROM `product`";
                    $sql = mysqli_query($conn,$qry);
                    if(mysqli_num_rows($sql)>0) { 
                        while($row=mysqli_fetch_assoc($sql)) { 
                           $imagepath ="uploads/".$row["photo"];
                           //$productlink = "view.php?pid=".$row['pid']; 
                           $name = $row['name'];
                           $description = $row['description'];
                           echo "<li>";
                           echo "<img src='$imagepath' width='25%' height='25%'>";
                           echo "<h3>$name</h3>";
                           echo "<p>$description</p>";
                           echo "</li>";
                        } 
                    }
                    ?>
                    </ul>
    </ul>
</body>
</html>
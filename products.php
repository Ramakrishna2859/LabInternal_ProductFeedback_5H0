<?php 
include "server.php";
session_start();
?>
<!DOCTYPE html>             
<html>
        <div class="content">
            <div class="disp">
            <?php if ($_SESSION['username']=="root" and $_SESSION['password']=="1234"):?>
                <a href="add.php">ADD PRODUCTS</a>
            <?php endif?>
            <br><br>
            <a href="logout.php">Logout</a>
                    <h1>Products</h1>
                    <ul>
                    <?php 
                    $uid=$_SESSION['username'];
                    $qry = "SELECT * FROM `product`";
                    $sql = mysqli_query($conn,$qry);
                    if(mysqli_num_rows($sql)>0) { 
                        while($row=mysqli_fetch_assoc($sql)) { 
                           $imagepath ="uploads/".$row["photo"];
                           $productlink = "view.php?pid=".$row['pid']; 
                           $name = $row['name'];
                           $description = $row['description'];
                           echo "<li>";
                           echo "<img src='$imagepath' width='25%' height='25%'>";
                           echo "<h3><a href='$productlink'>$name</a></h3>";
                           echo "<p>$description</p>";
                           echo "</li>";
                        } 
                    }
                    else{
                        header('location:login.php');
                    }
                    ?>
                    </ul>
            </div> 
        </div>
    </body>  
</html>

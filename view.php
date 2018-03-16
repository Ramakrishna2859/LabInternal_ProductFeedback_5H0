<?php 
  include "server.php";
  session_start();
  $pid = $_GET['pid'];
  $qry = "SELECT * FROM `product` where `pid`='$pid'";
  $sql = mysqli_query($conn,$qry);
  if(mysqli_num_rows($sql)>0) 
     $row=mysqli_fetch_assoc($sql);
     
?>
<!DOCTYPE html>
<html> 
    <body>
    <a href="logout.php">Log out</a><br><br>
    <a href="products.php">See All Products</a>
        <div class="content">
            <div class="disp decription">
                <h2><?php echo $row['name'];?></h2>
                <p ><?php echo $row['description'];?></p>
                <h3>Photo</h3>
                <ul class="inline">
                    <li><img src="uploads/<?php echo $row['photo'];?>" width=50%,height=50%></li>
                </ul>
                <h3>Give Your Feedback</h3>
                <form method="POST" action="" id="form">
                <input type="text" name="feedback" id="feedback">
                <input type="submit" name='sub'/>
                </form>
                
                <div id="feedbacks" class="feedbacks">
                <?php $qry1 = "SELECT * FROM `feedback` where `pid` = '$pid'";
                $sql1 = mysqli_query($conn,$qry1);
                if(mysqli_num_rows($sql1)>0) {
                    while($row1=mysqli_fetch_assoc($sql1)) {
                        $uid = $row1['uid'];
                        $feedback=$row1['feedback'];
                        $qry2 = "SELECT * FROM `user` where `uid` = '$uid'";
                        $sql2 = mysqli_query($conn,$qry2);
                        $row2=mysqli_fetch_assoc($sql2);
                        echo "<div class='feedback'>";
                        echo "By:<b>".$row2['user_name']."</b><br>";
                        echo $feedback;
                        echo "</div>";
                    }
                }
                else echo "No Feedbacks Available"; ?>
                </div>
                
            </div> 
        </div>
    </body>  
</html>
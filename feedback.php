<?php
    include('server.php');
    session_start();
    $feedback=$_GET['feedback'];
    $pid=$_GET['pid'];
    $uid=$_SESSION['uid'];
    $query="INSERT INTO `feedback`(`uid`,`pid`,`feedback`) VALUES('$uid','$pid','$feedback')";
    mysqli_query($conn,$query);
    $qry="SELECT * FROM `user` WHERE `uid`='$uid'";
    $sql=mysqli_query($conn,$qry);
    $row=mysqli_fetch_asoc($sql)
    echo "<div class=feddback>";
    echo "By: <b>$row['user_name']<br><br>";
    echo $feedback;
    echo "</div>"
?>
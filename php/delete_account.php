<?php
    session_start();
    if(isset($_SESSION['user'])){
        $cur_user=$_SESSION['user'];
        $conn=new mysqli("localhost","newuser","","game_db");
        $sql="DELETE FROM Person WHERE username='$cur_user'";
        $conn->query($sql);
        session_destroy();
    }
    header("location:main.php");
?>

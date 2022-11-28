<?php
    session_start();
    $servername="localhost";
    $user="newuser";
    $pass="";
    $database="game_db";

    $conn=new mysqli($servername,$user,$pass,$database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['uname'])&&isset($_POST['pass'])){
        $user=$_POST['uname'];
        $pass=$_POST['pass'];
        
        $sql="SELECT * FROM person WHERE username='$user' AND password='$pass'";
        $res=$conn->query($sql);
        if($res->num_rows==0){
            $_SESSION['alert']=true;
            header("location:login.php");
        }
        else{
            $_SESSION['user']=$user;
            $sc="SELECT topScore FROM person WHERE username='$user'";
            $result=$conn->query($sc);
            $row=$result->fetch_assoc();
            header("location:main.php");
        }
    }
?>
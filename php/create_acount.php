<?php
    session_start();

    $servername = "localhost";
    $username = "newuser";
    $password = "";
    $dbname = "game_db";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
  
    if(isset($_POST['uname'])&&isset($_POST['pass'])){
        echo "set";
        $user=$_POST['uname'];
        $pass=$_POST['pass'];
        $sql="SELECT * FROM Person WHERE username='$user'";
        $result=$conn->query($sql);
        echo $result->num_rows;
        if($result->num_rows>=1){
            $_SESSION['alert']=true;
            header("location:signup.php");
        }

        else{
            $q="INSERT INTO person (username,password,topscore) VALUES('$user','$pass',0)";
            $conn->query($q);
            $_SESSION['user']=$_POST['uname'];
            header("location:main.php");
        }
    }
?>
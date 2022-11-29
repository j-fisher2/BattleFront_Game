<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>BattleFront</title>
        <link rel="stylesheet" href="../styles/styles.css"></link>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <?php
            if(isset($_SESSION['user'])){
                $cur=$_SESSION['user'];
                $sql="SELECT topScore From person WHERE username='$cur'";
                $conn=new mysqli("localhost","newuser","","game_db");
                $res=$conn->query($sql);
                $r=$res->fetch_array();
                $score=$r[0];
            }
            else{
                $cur=NULL;
                $score=NULL;
            }
        ?>
        <img id="mai" src="../images/flame.png">
        <img id="mai2" src="../images/flame.png">
        <img id="mai3" src="../images/flame.png"> 
        <img id="mai4" src="../images/flame.png">
        <div id="top_margin">
            <h1>Battle Front</h1><br><br>
            <?php if(isset($cur)){echo "<h4 id=top_s>"."User: ".$cur;}?>
            <?php if(isset($score)){echo "<h4 id=top_s>"."High Score: " .$score;}?></h4><br>
            <a class="center" href="index.php"><button class="btn btn-danger"><b>Start Game</b></button></a><br><br>
            <a class="center" href="login.php"><button class="btn btn-dark" class="center"><b>Login</b></button></a><br><br>
            <a class="center" href="signup.php"><button class="btn btn-dark" class="center"><b>Sign Up</b></button></a><br><br>
            <a class="center" href="logout.php"><button class="btn btn-warning" class="center"><b>Logout</b></button></a>
            <a class="center" href="delete_account.php">Delete Account</a>
        </div>
        <script src="../scripts/home_page.js"></script> 
    </body>
</html>

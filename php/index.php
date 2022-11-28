<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <title>BattleFront</title>
        <link rel="stylesheet" href="../styles/styles_2.css"></link>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div>
            <h1>Battle Front</h1>
            <?php 
                if(isset($_SESSION['user'])){
                    $user=$_SESSION['user'];
                }
                $q="SELECT MAX(topScore) FROM person";
                $conn=new mysqli("localhost","newuser","","game_db");
                $res=$conn->query($q);
                $r=$res->fetch_array();
                $val=$r[0];
                $q2="SELECT username FROM person WHERE topScore='$val'";
                $result=$conn->query($q2);
                $f=$result->fetch_array();
                $u=$f[0];

                echo "<h4 id='btn' style='color:white'>&nbsp&nbsp;".'Leader Board'."</h4>";
                echo "<h4 id='btn' style='color:yellow'>&nbsp&nbsp;1. $u | $val</h4>";
            ?>
            
            <span id="btn_2">Your Score:</span>
            <span id="life">Lives: </span>
        </div>
        <canvas id="game_screen" width="800" height="600"></canvas>
        <img id="flame" src="../images/flame.png" width="50px" height="50px">
        <script src="../scripts/test.js"></script>
    </body>
</html>
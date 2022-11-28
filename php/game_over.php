<?php session_start()?>
<!DOCTYPE html>
<html>
    <head>
        <title>BattleFront</title>
        <link rel="stylesheet" href="../styles/styles_2.css"></link>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <?php if(isset($_COOKIE['final_score'])&& isset($_SESSION['user'])){
            $conn=new mysqli("localhost","newuser","","game_db");
            $cur=$_SESSION['user'];
            $ss="SELECT topScore FROM person WHERE username='$cur'";
            $res=$conn->query($ss);
            $r=$res->fetch_array();
            $h=$r[0];
            $new_score=$_COOKIE['final_score'];
            $cur_user=$_SESSION['user'];
            if($new_score>$h){
                $sq="UPDATE person SET topScore='$new_score' WHERE username='$cur_user'";
                $conn->query($sq);
            }
        }
        ?>
        <div id="top_margin">
            <h1>Battle Front</h1>
            <div></div><br>
            <a href="index.php"><button class="btn btn-warning"><b>Play Again</b></button></a>
            <a href="main.php"><button class="btn btn-dark"><b>Main Menu</b></button></a>
            <span id="score"></span>
        </div>
        <canvas id="game_screen" width="800" height="600"></canvas>
        <script src="../scripts/game_over.js"></script>
    </body>
</html>
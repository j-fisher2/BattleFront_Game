<?php session_start();
    if(isset($_SESSION['user'])&&isset($_SESSION['alert'])){
        if($_SESSION['alert']==true){
            echo "<script type=text/javascript>alert('username taken')</script>";
            $_SESSION['alert']=false;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>BattleFront</title>
        <link rel="stylesheet" href="../styles/styles.css"></link>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="../scripts/signup.js"></script>
    </head>
    <body>
        <form id="s-form" class="center" method="post" action="create_acount.php">
            <fieldset id="f">
                <legend class="legend">Sign Up</legend><br><br>
                    <input id="un" type="text" placeholder="username" name="uname"><br><br>
                    <input id="pw" type="password" placeholder="password" name="pass"><br><br>
                    <input type="submit">
            </fieldset>
        </form><br><br><br><br><br>
        <a class="center" href="main.php"><button class="btn btn-warning">Main Menu</button></a>
    </body>
</html>
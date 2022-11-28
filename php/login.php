<?php session_start();
        if(isset($_SESSION['alert'])){
            if($_SESSION['alert']==true){
                echo "<script type=text/javascript>alert('Invalid username/password combination')</script>";
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
        <script src="./scripts/login.js"></script>
    </head>
    <body>
        <form class="center" method="post" action="validate.php">
            <fieldset id="f">
                <legend class="legend">Login</legend><br><br>
                    <input type="text" placeholder="username" name="uname" value=""><br><br>
                    <input type="password" placeholder="password" name="pass" value=""><br><br>
                    <input type="submit">
            </fieldset>
        </form><br><br><br><br><br>
        <a class="center" href="main.php"><button class="btn btn-warning">Main Menu</button></a>
    </body>
</html>
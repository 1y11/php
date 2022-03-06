<?php 
echo "1"; 
if(isset($_POST["submit"])){
    $username  = $_POST["userUid"]; 
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php' ; 
    require_once 'functions.inc.php' ; 


    if(emptyInputLogin($username ,$pwd) !== false ){

        header("Location : ../signup.php?error=emptyinput");
        exit();

    }

    Loginuser($con , $username , $pwd) ; 
}else {
        header("Location : ../login.php");
        exit();
}
<?php 

if(isset($_POST["submit"])){
    $name = $_POST["name"] ; 
    $email = $_POST["email"] ; 
    $username = $_POST["uid"] ; 
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"] ; 

    require_once 'dbh.inc.php' ; 
    require_once 'functions.inc.php' ; 

    if(emptyInputSignup($name ,  $email , $username ,$pwd ,  $pwdRepeat) !== false ){

        header("Location : ../signup.php?error=emptyinput");
        exit();

    }
    if(invalidUid( $username) !== false ){

        header("Location : ../signup.php?error=invalidUid");
        exit();

    }
    if(invalidEmail($email) !== false ){

        header("Location : ../signup.php?error=invalidEmail");
        exit();

    }
    if(pwdMatch($pwd ,  $pwdRepeat) !== false ){

        header("Location : ../signup.php?error=unmatchedpwd");
        exit();

    }
    if(uidExist($con , $username , $email) !== false ){

        header("Location : ../signup.php?error=usernametaken");
        exit();

    }
   createUser($con , $name ,  $email , $username ,$pwd); 

}
else {
    header("Location : ../signup.php");
    exit();
}
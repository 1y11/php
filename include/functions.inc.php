<?php 

function emptyInputSignup($name ,  $email , $username ,$pwd ,  $pwdRepeat) {
    $result ; 
    if(!empty($name) || empty($email) || empty( $username) || empty($pwd) || empty($pwdRepeat) ){
        $result = true ; 
    }
    else{
        $result = false ; 
    }
    return $result ; 
}

 function invalidUid($username){
    $result; 
    if(!preg_match("/^[a-zA-Z0-9,]*$/", $username)){
        $result = true ; 
    }
    else{
        $result = false ; 
    }
    return $result ; 

} 


function invalidEmail($email) {
    $result ; 
    if (!filter_var($email , FILTER_VALIDATE_EMAIL)){
        $result = true ; 
    }
    else{
        $result = false ; 
    }
    return $result ;
}

function pwdMatch($pwd ,  $pwdRepeat) {
    $result ; 
    if ($pwd !== $pwdRepeat){
        $result = true ; 
    }
    else{
        $result = false ; 
    }
    return $result ; 
}

function uidExist($con , $username, $email) {
    $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ? ;"; 
    $stmt = mysqli_stmt_init($con); 
    if (!mysqli_stmt_prepare($stmt , $sql)){
        header("Location : ../signup.php?error=signupfailed");
        exit();

    } 
        mysqli_stmt_bind_param($stmt , "ss" , $username , $email); 
        mysqli_stmt_execute($stmt); 
        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)){
            return $row ; 

        }
        else {
            return false ; 
            return $result ; 
        }

        mysqli_stmt_close($stmt);   
}

function createUser($con , $name ,  $email , $username ,$pwd) {
    $sql = "insert into users (userName , userEmail , userUid , userPwd) values (? , ? , ? ,? );"; 
    $stmt = mysqli_stmt_init($con); 
    if (!mysqli_stmt_prepare($stmt , $sql)){
        header("Location : ../signup.php?error=signupfailed");
        exit();

    } 
    $hashedPwd = password_hash($pwd , PASSWORD_DEFAULT) ; 
        mysqli_stmt_bind_param($stmt , "ssss" , $name ,  $email , $username ,$hashedPwd ); 
        mysqli_stmt_execute($stmt); 
        mysqli_stmt_close($stmt); 
        header("Location : ../signup.php?error=none");
        exit();
}
function emptyInputLogin($username ,$pwd) {
    $result ; 
    if(empty($username) || empty($pwd)){
        $result = true ; 
    }
    else{
        $result = false ; 
    }
    return $result ; 
}

function Loginuser($con , $username , $pwd) {
    $uidExists = uidExists($con , $username , $email); 

    if($uidExists === false) {
        header("Location : ../login.php?error=loginfailed");
        exit();
    }

    $pwdHashed = $uidExists["userPwd"];
    $checkPwd = password_verify($pwd); 

    if($checkPwd === false ){
        header("Location : ../login.php?error=loginfailed");
        exit();
    }
    else if ($checkPwd === true){
        session_start(); 
        $_SESSION["userid"] =  $uidExists["userId"] ; 
        $_SESSION["useruid"] =  $uidExists["userUid"];
        header("Location : ../index.php");
        exit();

    }
   

    
}
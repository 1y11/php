<?php 
    include_once 'header.php' ; 

?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/navigation.css">
<link rel="stylesheet" href="css/footer.css">
<section class="signup_form">
     <div class="container">  
     <form action="include/signup.php" method="post" class="form_container">
         <input type="text" name="name" placeholder="Enter full name..." >
         <input type="text" name="email" placeholder="Enter email..." >
         <input type="text" name="uid" placeholder="Enter username..." >
         <input type="password" name="pwd" placeholder="Enter password..." >
         <input type="password" name="pwdrepeat" placeholder="Confirm password..." >
         <button type="submit" name="submit">SIGN UP</button>
    </div>
</form>

<?php 
 if(isset($_GET["error"])){

    if($_GET["error"]== "emptyinput"){
        echo "<p>Fill in all feilds!</p>" ; 
    }
    else if($_GET["error"]== "invalidUid"){
       echo "<p>Choose a proper name !</p>" ; 
    }
    else if($_GET["error"]== "invalidEmail"){
        echo "<p>Choose a proper email !</p>" ; 
    }
    else if($_GET["error"]== "unmatchedpwd"){
        echo "<p>Unmatched Passwords !</p>" ; 
    }
    else if($_GET["error"]== "usernametaken"){
        echo "<p>Choose another username !</p>" ; 
    }
    else if($_GET["error"]== "signupfailed"){
        echo "<p>Something went wrong.Please try again !</p>";

    }
    else if($_GET["error"]== "none"){
        echo "<p>You have signed up!</p>";
    }
    }

?>
<footer class="footer">
</footer>
</section>


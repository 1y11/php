<?php 
    include_once 'header.php' ; 

?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/navigation.css">
<link rel="stylesheet" href="css/footer.css">
<section class="login_form">
     <div class="container">
     <form action="include/login.inc.php" method="post" class ="form_container">
         <input type="text" name="uids" placeholder="Enter Username/Email..." >
         <input type="password" name="pwd" placeholder="Enter password..." > 
         <button type="submit" name="submit">LOG IN</button>
</div>
</form>
<?php 
 if(isset($_GET["error"])){

    if($_GET["error"]== "emptyinput"){
        echo "<p>Fill in all feilds!</p>" ; 
    }
    else if($_GET["error"]== "loginfailed"){
       echo "<p>Incorrect Login !</p>" ; 
    }
 }
?>
<footer class="footer">
     </footer>
</section>
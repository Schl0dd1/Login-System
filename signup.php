<?php include_once 'header.php';?>

<section><h2>Sign Up</h2>
<div class="signup-form">
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="name" placeholder="Full Name..."> <br>
        <input type="text" name="email" placeholder="Email"><br>
        <input type="text" name="username" placeholder="Username"><br>
        <input type="password" name="pwd" placeholder="Password"><br>
        <input type="password" name="pwdrepeat" placeholder="Repeat Password"><br>
        <button type="submit" name="submit" > Signup!</button>
    </form>
</div>

<?php

if (isset($_GET["error"])){
    if($_GET["error"] =="emptyinput") {
        echo "<p> Fill in all Fields </p>";
    }
    else if($_GET["error"] =="invaliduid") {
        echo "<p> Choose proper Name </p>";
    }
    else if($_GET["error"] =="invalidemail") {
        echo "<p> Choose a proper email adress </p>";
    }
    else  if($_GET["error"] =="pwdnotmatch") {
        echo "<p> Your passwords do not match </p>";
    }
    else if($_GET["error"] =="usrexists") {
        echo "<p> Username or email already exists</p>";
    }
    else if($_GET["error"] =="none") {
        echo "<p> You successfully signed up!</p>";
    }

}

?>


</section>




<?php include_once 'footer.php';?>
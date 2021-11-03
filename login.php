<?php include_once 'header.php';?>

<section>
<div class="signup-form">
    <h1>Log in</h1>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="user" placeholder="Username/Email..."><br>
        <input type="password" name="pwd" placeholder="Password..."><br>
        <button class="btn" type="submit" name="submit" > Login</button>
    </form>
</div>
</section>



<?php include_once 'footer.php';?>
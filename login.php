<?php include_once 'header.php';?>

<section><h2>Log in</h2>
<div class="signup-form">
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="user" placeholder="Username/Email..."><br>
        <input type="password" name="pwd" placeholder="Password..."><br>
        <button type="submit" name="submit" > Login</button>
    </form>
</div>
</section>



<?php include_once 'footer.php';?>
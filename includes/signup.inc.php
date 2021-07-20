<?php

// check if user hit submit-buttoN:
if (isset($_POST['submit'])){
 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $pwdrepeat = $_POST['pwdrepeat'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php'; // includes functions used below

   
    if (emptyInputSignup($name,$email,$username,$pwd,$pwdrepeat)!== FALSE) {
        header("location:../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username)!== FALSE) {
        header("location:../signup.php?error=invaliduid");
        exit();
    }
    if (invalidEmail($email)!== FALSE) {
        header("location:../signup.php?error=invalidemail");
        exit();
    }
    if (pwdMatch($pwd,$pwdrepeat)!== FALSE) {
        header("location:../signup.php?error=pwdnotmatch");
        exit();
    }
    if (uidexists($conn,$username,$email)!== FALSE) {
        header("location:../signup.php?error=usrexists");
        exit();
    }

    createUser($conn,$username,$name,$email,$pwd);

}


else{
    header("location:../signup.php");
    exit();
}

?>
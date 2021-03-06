<?php

function emptyInputSignup($name,$email,$username,$pwd,$pwdrepeat){
    $result; //create var
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdrepeat)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function invalidUid($username) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;

}

/*function invalidEmail($email){
   $result;
    if(!filter_var($email,FILTER_VALITDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}*/

function pwdMatch($pwd,$pwdrepeat){
    $result;
    if($pwd !==$pwdrepeat){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;

}

function uidexists($conn,$username,$email){
   $sql = "SELECT * FROM users WHERE username= ? OR email= ?;";
   $stmt = mysqli_stmt_init($conn); //protecting database
   if (!mysqli_stmt_prepare($stmt,$sql)){
    header("location:../signup.php?error=stmtfailed");
    exit();
   }

   mysqli_stmt_bind_param($stmt,"ss",$username,$email);
   mysqli_stmt_execute($stmt);

   $resultData = mysqli_stmt_get_result($stmt);

   if ($row = mysqli_fetch_assoc($resultData)) {
       return $row; //funktioniert für login und signup-form
        }
   else{
    $result = false;
    return $result;
    }

    mysqli_stmt_close($stmt);

}



function createUser($conn,$username,$name,$email,$pwd){
    $sql = "INSERT INTO users (username,name,email,password) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn); //protecting database
    if (!mysqli_stmt_prepare($stmt,$sql)){
     header("location:../signup.php?error=stmtfailed");
     exit();
    }
 
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); //pwd needs to be hashed

    mysqli_stmt_bind_param($stmt,"ssss",$username,$name,$email,$hashedPwd); 
    mysqli_stmt_execute($stmt);
 
    mysqli_stmt_close($stmt);
    header("location:../signup.php?error=none");
    exit();
 }


//login-functions:


function emptyInputLogin($username,$pwd){
    $result;

    if(empty($username) || empty($pwd)){
            $result = true;
        }
        else{
            $result = false;
        }
    
        return $result;

    }

function loginUser($conn,$username,$pwd){
    $userExists = uidexists($conn,$username,$username);

    if($userExists == false){
        header("location:../login.php?error=wronglogin");
        exit();
    }

    $hashedPwd = $userExists['password'];
    $checkPwd = password_verify($pwd,$hashedPwd);

    if ($checkPwd  === false) {
        header("location:../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd  === true) {
        session_start();
        $_SESSION['user_id'] = $userExists['user_id'];
        $_SESSION['username'] = $userExists['username'];
        header("location:../index.php");
        exit();
    }
}





 ?>
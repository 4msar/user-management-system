<?php
session_start();
if(file_exists('includes/config.php')){
    require_once ('includes/config.php');
}
// Check session 
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']!=null ){
    header("location: index.php");
    exit;
}
// Check Cookie 
if(isset($_COOKIE['user_logged_in']) && $_COOKIE['user_logged_in']!=null){
    session_start();
    $_SESSION['logged_in'] = 1;
    $_SESSION['user_id']=$_COOKIE['user_login_id'];
    $_SESSION['user_role'] = $_COOKIE['user_role'];
	header("location:index.php");
	exit;
}


$msg = $s_msg = "";

/* Check Login form submitted */	
if(isset($_POST['login'])){
	/* Check and assign submitted Username and Password to new variable */
	$Username = isset($_POST['username']) ? $_POST['username'] : '';
	$Passwords = isset($_POST['password']) ? $_POST['password'] : '';
	$Password = md5($Passwords);
	
	/* Check Username and Password existence in defined array */		
	$sql =  "SELECT id, username, password, role FROM users WHERE username = '$Username' AND password = '$Password'";
	$run = mysqli_query($con, $sql);
	if(mysqli_num_rows($run) > 0){
	    $res = mysqli_fetch_array($run);
		/* Success: Set session variables and redirect to Protected page  */
		if(isset($_POST['remember'])){
		    $cookiehash = md5(sha1($Username . $Password));
		    setcookie('user_logged_in', $cookiehash, time()+(60*60*24*7), '/'); 
		    setcookie('user_login_id', $res['id'], time()+(60*60*24*7), '/'); 
		    setcookie('user_role', $res['role'], time()+(60*60*24*7), '/'); 
		    //60sec*60min*24hour in a day*7days
		}
		$_SESSION['logged_in'] = 1;
		$_SESSION['user_id'] = $res['id'];
		$_SESSION['user_role'] = $res['role'];
		header("location:index.php");
		exit;
	} else{
	    $msg = 'Username or Password is wrong...!!';//'Err '.mysqli_error($con);
	}
}
$nameErr = $emailErr = $phnErr = $unErr = $pwdErr = $re_pwdErr = '';
$name = $email = $phn = $username = $pwd = $reg_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    
    
    if (empty($_POST["name"])) {
        $nameErr = "* Name is required";
    } else {
        $name = $_POST["name"];
    }
    
    if (empty($_POST["phone"])) {
        $phnErr = "* Phone is required";
    } else {
        $phn = $_POST["phone"];
    }
    
    if (empty($_POST["email"])) {
        $emailErr = "* email is required";
    } else {
        $email = $_POST["email"];
    }
    
    if (empty($_POST["username"])) {
        $unErr = "* UserName is required";
    } else {
        $username = $_POST["username"];
    }
    
    if (empty($_POST["pwd"])) {
        $pwdErr = "* Password Can't be Null";
    } else {
        $pwd = md5($_POST["pwd"]);
    }
    $query = mysqli_query($con, 'SELECT * FROM users');
    if(mysqli_num_rows($query) > 0){
        $role = 'user';
    }else{
        $role = 'admin';
    }
    
    if($_POST['name']!=null && $_POST['phone']!=null && $_POST["email"]!=null && $_POST["username"]!=null && $_POST["pwd"]!=null){
        
        if($_POST['submit']=='SignUp'){
            $insert = "INSERT INTO users(name,phone, email, username, password, role, created_at) 
            VALUES('$name','$phn','$email','$username','$pwd','$role',NOW())";
            
            if(mysqli_query($con, $insert)){
                $s_msg = 'Registration Successfully..!!';
            }else{
                $msg = 'Registration Failed, Try Again...! '.mysqli_error($con);
                $reg_err = 1;
            }
        }
    }else{
        $reg_err = 1;
    }
   
}





?>
<?php

$nameErr = $emailErr = $phnErr = $unErr = $pwdErr = $msg = "";
$name = $email = $phn = $username = $pwd = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['submit']) {
    
    
    if (empty($_POST["name"])) {
        flash_msg( 'nameErr', "* Name is required", 'danger', 'form-msg');
    } else {
        $name = $_POST["name"];
        flash_msg( 'nameErr');
    }
    
    if (empty($_POST["phone"])) {
        flash_msg( 'phnErr', "* Phone is required", 'danger', 'form-msg');
    } else {
        $phn = $_POST["phone"];
        flash_msg( 'phnErr');
    }
    
    if (empty($_POST["email"])) {
        flash_msg( 'emailErr', "* email is required", 'danger', 'form-msg');
    } else {
        $email = $_POST["email"];
        flash_msg( 'emailErr');
    }
    
    if (empty($_POST["username"])) {
        flash_msg( 'unErr', "* UserName is required", 'danger', 'form-msg');
    } else {
        $username = $_POST["username"];
        flash_msg( 'unErr');
    }
    
    if (empty($_POST["pwd"])) {
        flash_msg( 'pwdErr', "* Password Can't be Null", 'danger', 'form-msg');
    } else {
        $pwd = md5($_POST["pwd"]);
        flash_msg( 'pwdErr');
    }
    
    if($_POST["pwd"]!=$_POST["re-pwd"]){
        flash_msg( 're-pwdErr', "* Password disn't match", 'danger', 'form-msg');
    }else {
        flash_msg( 're-pwdErr');
    }
    
    $query = mysqli_query($con, 'SELECT id FROM users');
    if(mysqli_num_rows($query) > 0){
        $role = 'user';
    }else{
        $role = 'admin';
    }
    
    if($_POST['name']!=null && $_POST['phone']!=null && $_POST["email"]!=null && $_POST["username"]!=null && $_POST["pwd"]!=null && $_POST["pwd"]==$_POST["re-pwd"]){
        
        if(isset($_FILES['avator'])){
            $imgName = 'user-'.time().'-'.rand(1000,100000).'.'.pathinfo($_FILES['avator']['name'],PATHINFO_EXTENSION);
        }else{
            $imgName='';
        }
        
        if($_POST['submit']=='Register'){
            $insert = "INSERT INTO users(name,phone, email, username, password, role,avator, created_at) 
            VALUES('$name','$phn','$email','$username','$pwd','$role','$imgName',NOW())";
            
            if(mysqli_query($con, $insert)){
                
                move_uploaded_file($_FILES['avator']['tmp_name'], 'uploads/'.$imgName);
                
                $msg = 'Data Added Successfully...! Add New.';
                flash_msg( 'msg', $msg, 'success' );
            }else{
                $msg = 'Data Adding Failed, Try Again '.mysqli_error($con);
                flash_msg( 'msg', $msg, 'danger' );
            }
        }
    }
    
    
    $id = (!empty($_POST['edit_id']) ? $_POST['edit_id'] : '');
    if($_SESSION['user_role']=='admin'){
        if($_POST['submit']=='Update'){
            
            if (empty($_POST["role"])) {
                $role = 'user';
            } else {
                $role  = $_POST["role"];
            }
            if(isset($_FILES['avator'])){
                $imgName = 'user-'.time().'-'.rand(1000,100000).'.'.pathinfo($_FILES['avator']['name'],PATHINFO_EXTENSION);
            }else{
                $imgName=get_data($id, 'users', 'avator');
            }
            
            $update = "UPDATE users SET name='$name', phone='$phn', email='$email', role='$role', avator='$imgName' WHERE id=$id";
            
            if(mysqli_query($con, $update)){
                move_uploaded_file($_FILES['avator']['tmp_name'], 'uploads/'.$imgName);
                flash_msg( 'msg', 'Data Update Successfully', 'success' );
            }else{
                flash_msg( 'msg', 'Data Update Failed '.mysqli_error($con), 'danger' );
            }
        }
    }else{
        $msg = "User can't do this. Permission Denied";
        flash_msg( 'msg', $msg, 'danger' );
    }

    
    
}
<?php 

if(file_exists('includes/auth.php')){
    include_once ('includes/auth.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>Admin Panel :: Login</title>
    <link rel="shortcut icon" type="image/png" href="/favicon.png">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/style.css" rel="stylesheet" type="text/css">
</head>
<body style="background: #272833;">
	<div class="container">
		<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" id="loginbox" style="margin-top:100px;">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						Sign In
					</div>
					<div style="float:right; font-size: 80%; position: relative; top:-10px">
						<a href="#">Forgot password?</a>
					</div>
				</div>
				<div class="panel-body" style="padding-top:30px">
				    
				    <?php if($reg_err=='' && $msg!='' ){ ?>
					<div class="alert alert-danger col-sm-12" id="login-alert" ><?php echo $msg; ?></div>
					<?php }
					if($reg_err=='' && $s_msg!='' ){ ?>
					<div class="alert alert-success col-sm-12" id="login-alert" ><?php echo $s_msg; ?></div>
					<?php } ?>
					<form action="" class="form-horizontal" id="loginform" method="post" name="loginform" role="form">
						<div class="input-group" style="margin-bottom: 25px">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span> <input class="form-control" id="login-username" name="username" placeholder="Username " type="text" value="">
						</div>
						<div class="input-group" style="margin-bottom: 25px">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> <input class="form-control" id="login-password" name="password" placeholder="Password" type="password">
						</div>
						
                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
                        </div>

						<div class="form-group" style="margin-top:10px">
							<!-- Button -->
							<div class="col-sm-12 controls">
								<input type="submit" name="login" value="Login" class="btn btn-success" id="btn-login"> 
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12 control">
								<div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">
									Don't have an account! <a href="#" onclick="$('#loginbox').hide(); $('#signupbox').show()">Sign Up Here</a>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" id="signupbox" style="display:none; margin-top:100px">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title">
						Sign Up
					</div>
					<div style="float:right; font-size: 85%; position: relative; top:-10px">
						<a href="#" id="signinlink" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a>
					</div>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" id="signupform"  method="post" name="signupform" role="form" onsubmit="return formCheck()">
						<div >
						<?php if($reg_err!=null && $msg!=''){ ?>
    					<div class="alert alert-danger col-sm-12" id="login-alert" ><?php echo $msg; ?></div>
    					<?php } ?>
						</div>
						<div class="form-group">
                            <label for="" class="col-sm-3 control-label">Name </label>
                            <div class="col-sm-8">
                              <input type="text" id="name" name="name" class="form-control" placeholder="Enter your full Name"><span class="err" id="name-err"><?php echo $nameErr; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-8">
                              <input type="email" id="email" name='email' class="form-control" placeholder="Enter your Email">
                              <span class="err" id="email-err"><?php echo $emailErr; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Phone</label>
                            <div class="col-sm-8">
                              <input type="number" id="phone" name="phone" class="form-control" placeholder="Enter your Phone Number">
                              <span class="err" id="phn-err"><?php echo $phnErr; ?></span>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">UserName</label>
                            <div class="col-sm-8">
                              <input type="text" id="username" name="username" class="form-control" placeholder="Enter a Username">
                              <span class="err" id="un-err"><?php echo $unErr; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-8">
                              <input type="password" id="pass" name="pwd" class="form-control" placeholder="Enter Password">
                              <span class="err" id="pwd-err"><?php echo $pwdErr; ?></span>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Confirm Password</label>
                            <div class="col-sm-8">
                              <input type="password" id="re-pass" name="re-pwd" class="form-control" placeholder="Enter Password Again">
                              <span class="err" id="re-pwd-err"><?php echo $re_pwdErr; ?></span>
                            </div>
                          </div>
                          
						<div class="form-group">
							<label class="col-md-3 control-label" for="icode">Invitation Code</label>
							<div class="col-md-9">
								<input class="form-control" name="icode" placeholder="" type="text">
							</div>
						</div>
						<div class="form-group">
							<!-- Button -->
							<div class="col-md-offset-3 col-md-9">
								<input type="submit" name="submit" class="btn btn-sm btn-primary" value="SignUp"/>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript">
	</script> 
	<script src="assets/js/bootstrap.min.js" type="text/javascript">
	</script> 
	<script src="assets/js/custom.js" type="text/javascript">
	</script>
	
<?php 
if($reg_err!=null){
    echo "
        <script  type='text/javascript'> 
        $(function(){
            $('#loginbox').hide(); $('#signupbox').show() 
        });
        </script>
    ";
}

?>
</body>
</html>
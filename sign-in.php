<?php
session_start();
require_once "function.php";
$user = new LoginRegistration();

    if($user->getSession()){
	   header('Location: index.php');
	   exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | NAHAR HOME APPLIANCE</title>
    <!-- Favicon-->
    <link rel="icon" href="icon.jpg" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Admin</b></a>
            <small><i>NAHAR HOME APPLIANCE</i></small>
						<p class="msg"> 
			   <span class="login_msg">
		<?php
		// Debugging: Display the session token and the response token
		$sessionToken = $user->getSession('logout_token'); 
		$responseToken = isset($_GET['response']) ? $_GET['response'] : 'No response token'; 

		if ($responseToken && $sessionToken) {
			if ($responseToken === $sessionToken) {
				echo "<span style='color:green'>You have been logged out successfully.</span>";
				unset($_SESSION['logou_token']); // Clear the token after use
			} else {
				echo "<span style='color:red'>Invalid logout attempt detected.</span>";
			}
		} 
		?>

			   </span>
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$email = $_POST['email'];
						$password = $_POST['password'];
					
					if(empty($email) or empty($password)){
						echo "<span style='color:#e53d37'>Field must not be empty...</span>";
					} else {
						$password = md5($password);
						$login = $user->loginUser($email, $password);
						if($login){
							header ("Location: index.php");
						} else {
							echo "<span style='color:#e53d37'>Email or Password not matched</span>";
						}
					}
					}
				?>
			</p>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in to Start Your Session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
						<?php if($user->getSession()){ ?>
					<a href="../../index.php">Home</a>
				<?php } else{ ?>
					<a href="sign-up.php">Register Now!</a>
				<?php } ?>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>
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
    <title>Sign Up | NAHAR HOME APPLIANCE</title>
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

<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);"><b>Admin</b></a>
            <small><i>NAHAR HOME APPLIANCE</i></small>
        </div>

					
					<p class="msg"> 
				<?php
					if($_SERVER['REQUEST_METHOD'] == 'POST'){
						$username = $_POST['username'];
						$password = $_POST['password'];
						$desg = $_POST['desg'];
						$name = $_POST['name'];
						$email = $_POST['email'];
						$website = $_POST['website'];
						$pro_image = $_FILES['pro_image'];
						
						if(empty($username) or empty($password) or empty ($desg) or empty($name) or empty($email) or empty($website) or empty($pro_image)){
							echo "<span style='color:#e53d37'>Error...Field Must Not Be Empty</span>";
						} else {
        // Handle file upload
						$target_dir = "images/"; // Make sure this directory exists and is writable
						$target_file = $target_dir . basename($pro_image['name']);
						$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

						// Check if the file is an actual image
						$check = getimagesize($pro_image['tmp_name']);
						if ($check === false) {
							echo "<span style='color:#e53d37'>File is not an image.</span>";
						} elseif (file_exists($target_file)) {
							echo "<span style='color:#e53d37'>Sorry, file already exists.</span>";
						} elseif ($pro_image['size'] > 500000) { // 500KB max file size
							echo "<span style='color:#e53d37'>Sorry, your file is too large.</span>";
						} elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
							echo "<span style='color:#e53d37'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</span>";
						} else {
							if (move_uploaded_file($pro_image['tmp_name'], $target_file)) {
								$password = md5($password);
								$register = $user->registerUser($username, $password, $desg, $name, $email, $website, $target_file);
								if ($register) {
									echo "<span style='color:green'>Registration Done <a href='sign-in.php' style='color:white'>Click Here!</a></span>";
								} else {
									echo "<span style='color:#e53d37'>Username or Email already exist</span>";
								}
							} else {
								echo "<span style='color:#e53d37'>Sorry, there was an error uploading your file.</span>";
							}
						}
					}
				}
				?>

			</p>
        <div class="card">
            <div class="body">
                <form id="sign_up" method="POST" enctype="multipart/form-data">
                    <div class="msg">Register a new membership</div>
					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="User Name" required autofocus>
                        </div>
                    </div>
					    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
					    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">arrow_drop_down</i>
                        </span>
                        <div class="form-line">
                                    <select class="form-control" name="desg" required>
									    <option value="">Select User Type</option>
                                        <option value="Owner">Owner</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Eployee">Employee</option>
                                    </select>
                        </div>
                    </div>					
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Full Name" required autofocus>
                        </div>
                    </div>
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
                            <i class="material-icons">search</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="website" minlength="6" placeholder="Website" required>
                        </div>
                    </div>
					<div class="input-group">
						<span class="input-group-addon">
							<i class="material-icons">image</i>
						</span>
						<div class="form-line">
							<input type="file" class="form-control" name="pro_image" placeholder="Upload Photo" required>
						</div>
					</div>

                    <button class="btn btn-block btn-lg bg-pink waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
					<a href="sign-in.php">You already have a membership?</a>	
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
    <script src="js/pages/examples/sign-up.js"></script>
</body>

</html>
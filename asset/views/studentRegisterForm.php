<?php
	include "config/server.php";
	if (isset($_POST['stu_submit'])){
		if(isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['confirm_password'])){
			$email = trim($_POST['email']);
			$phone = trim($_POST['phone']);
			$pass = trim($_POST['password']);
			$con_pass = trim($_POST['confirm_password']);
			$status = 1;

			if ($pass === $con_pass){
				$sql = "SELECT COUNT(email) AS num FROM usertable WHERE email = ?";
				$pass = md5($pass);

				$stmt = $pdo->prepare($sql);
				$stmt ->execute(array($email));
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
			
			if ($row['num'] > 0) {
					# code...
					echo "<div class='row'>
					<div class='col-md-4'></div>
					<div class='alert alert-warning alert-dismissible fade show mb-0 col-md-4' role='alert' style='margin-top:5%, align:c'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>×</span>
					</button>
					<i class='fa fa-check mx-2'></i>
						Email already exist </div>
					<div class='col-md-4'></div>
					</div>";
			}else{             
				$sql = "INSERT INTO usertable(status_id,email, phone, pass) VALUES ($status,?,?,?)";

				$sql_query = $pdo->prepare($sql);
				$result = $sql_query->execute(array($email, $phone, $pass));

				// if ($result) {
				// 	$stmt = $pdo->prepare("SELECT * FROM usertable WHERE email=?");
				// 	$stmt->execute([$email]);
				// 	$user = $stmt->fetch(PDO::FETCH_ASSOC);					

				// 	$_SESSION['user_id'] = $user['user_id'];
				// 	$_SESSION['fullname'] = $fullname;
				// 	$_SESSION['phone'] = $phone;	
				// 	$_SESSION['email'] = $email;
					
					
				// } else {
						
				// }				
			}

			}else{
				echo "check password";
			}

			

		}
	}
?>

<!-- Page Content -->
<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
								
							<!-- Register Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Patient Register <a href="doctorRegister.php">Are you a Doctor?</a></h3>
										</div>
										
										<!-- Register Form -->
										<form action="" method="POST">
											<div class="form-group form-focus">
												<input type="email" class="form-control floating" name="email">
												<label class="focus-label">example@stu.ucc.edu.gh</label>
											</div>
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" name="phone">
												<label class="focus-label">Index Number</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" class="form-control floating" name="password">
												<label class="focus-label">Create Password</label>
											</div>
											<div class="form-group form-focus">
												<input name="confirm_password" class="form-control floating" type="password">
												<label class="focus-label">Confirm Password</label>
											</div>
											<div class="text-right">
												<a class="forgot-link" href="login.php">Already have an account?</a>
											</div>
											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit" name="stu_submit">Signup</button>
											<div class="login-or">
												<span class="or-line"></span>
												<span class="span-or"></span>
											</div>
									
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Register Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
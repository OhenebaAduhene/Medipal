<?php
	session_start();
	include "config/server.php";
	if(isset($_POST['submit'])){
		if(isset($_POST['email']) && isset($_POST['pass'])){
			$email = trim($_POST['email']);
			$pass = trim($_POST['pass']);

			$md5_pass = md5($pass);

			
			$sql = "SELECT * FROM usertable WHERE email = :email";

			$stmt = $pdo->prepare($sql);
			$stmt->bindValue(':email', $email);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);	

			$user_id = $row['user_id'];
			// $status_id = $row['status_id'];
			$email = $row['email'];	
			$row_pass = $row['pass'];

			if ($row === false) {
				$err = "<div class='alert alert-success alert-dismissible fade show mb-0' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>×</span>
				</button>
				<i class='fa fa-check mx-2'></i>
				<strong>Success!</strong> Your profile has been updated! </div>";
			} else {

				if ($md5_pass === $row_pass) {

					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['logged_in'] = time();

					//Redirect to protected page, home.php
					if ($row['status_id'] == 0){
						header('Location: doctorDashboard.php');
					}else{
						header('Location: studentDashboard.php');
					}
					
					exit;
				} else {

					echo "<div class='row'>
					<div class='col-md-4'></div>
					<div class='alert alert-danger alert-dismissible fade show mb-0 col-md-4' role='alert' style='margin-top:5%, align:c'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'>×</span>
					</button>
					<i class='fa fa-check mx-2'></i>
					<strong>Wrong!</strong> Username/Password </div>
					<div class='col-md-4'></div>
					</div>";
				}
				
			}	

		}
	}


?>

<!-- Page Content -->
<div class="content">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-md-8 offset-md-2">
							
							<!-- Login Tab Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Login">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Login <span>Medipal</span></h3>
										</div>
										<form action="" method="POST">
											<div class="form-group form-focus">
												<input type="email" class="form-control floating" name="email">
												<label class="focus-label">Email</label>
											</div>
											<div class="form-group form-focus">
												<input type="password" class="form-control floating" name="pass">
												<label class="focus-label">Password</label>
											</div>
                                            <div class="form-group row">
                                        <div class="col-md-8    ">
                                            <div class="d-flex no-block align-items-center">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="$remember">
                                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <a class="forgot-link" href="forgotPassword.php">Forgot Password ?</a>
                                        </div>
                                    </div>

											<button class="btn btn-primary btn-block btn-lg login-btn" type="submit" name="submit">Login</button>
											<div class="login-or">
												<span class="or-line"></span>
												<span class="span-or"></span>
											</div>
										
											<div class="text-center dont-have">Don’t have an account? <a href="studentRegister.php">Register</a></div>
										</form>
									</div>
								</div>
							</div>
							<!-- /Login Tab Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
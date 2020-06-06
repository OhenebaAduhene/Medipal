<?php
	  //start session
  	session_start();
  
    if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
      header('Location:index.php');
      exit;
    }
      include "asset/includes/head.php";

      include "asset/includes/navmenu.php";

      include "asset/includes/student_Includes/breadcrumb.php";
    
      include "asset/includes/student_Includes/containerstart.php";

      include "asset/includes/student_Includes/sidebar.php";

?>

<div class="col-md-7 col-lg-8 col-xl-9">

    <!--  -->
	<div class="card">
		<div class="card-body pt-0">
		
			<!-- Tab Menu -->
			<nav class="user-tabs mb-4">
				<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
					<li class="nav-item">
						<a class="nav-link active" href="#pat_appointments" data-toggle="tab">Appointments</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" href="#pat_prescriptions" data-toggle="tab">Prescriptions</a>
					</li> -->
					<li class="nav-item">
						<a class="nav-link" href="#pat_medical_records" data-toggle="tab"><span class="med-records">Medical Records</span></a>
					</li>
				</ul>
			</nav>
			<!-- /Tab Menu -->
            
    <div class="tab-content pt-0">
            
<?php
        include "asset/views/student_views/appointmentlist.php";
        include "asset/views/student_views/medicalrecords.php";
?>
                          
             
                
            </div>
        </div>
    </div>
</div>

    
<!--  -->
</div>

<?php

    include "asset/includes/student_Includes/containerend.php";
    
    include "asset/includes/footer.php";

?>
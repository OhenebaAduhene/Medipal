
<?php
    //start session
  session_start();
  
    if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
      header('Location:index.php');
      exit;
    }
      include "asset/includes/head.php";

      include "asset/includes/navmenu.php";

      include "asset/includes/doctor_Includes/breadcrumb.php";
    
      include "asset/includes/doctor_Includes/containerstart.php";

      include "asset/includes/doctor_Includes/sidebar.php";

?>

<div class="col-md-7 col-lg-8 col-xl-9">

<?php
     include "asset/includes/doctor_Includes/statsheader.php";
?>
    <!--  -->
    <div class="row">
    <div class="col-md-12">
        <h4 class="mb-4">Patient Appoinment</h4>
        <div class="appointment-tab">
        
            <!-- Appointment Tab -->
            <ul class="nav nav-tabs nav-tabs-solid nav-tabs-rounded">
                <li class="nav-item">
                    <a class="nav-link active" href="#upcoming-appointments" data-toggle="tab">Upcoming</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#today-appointments" data-toggle="tab">Today</a>
                </li> 
            </ul>
            <!-- /Appointment Tab -->
            
            <div class="tab-content">
            
<?php
        include "asset/views/doctor_views/upcomingAppointment.php";
        include "asset/views/doctor_views/todayAppointment.php";
?>
                          
             
                
            </div>
        </div>
    </div>
</div>

    
<!--  -->
</div>

<?php

    include "asset/includes/doctor_Includes/containerend.php";
    
    include "asset/includes/footer.php";

?>
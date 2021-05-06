<?php
	session_start();
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		$error="";
		$msg="<br><span class=msg style='background-color:#5cd65c'>    Bed Added Successfully     </span><br><br>";
		require_once('header.php');
	}
?>





        <!-- <ul id="mainNav">
        	<li><a href="dashboard.php">DASHBOARD</a></li> 
        	<li><a href="patients.php">PATIENTS</a></li>
        	<li><a href="beds.php" class="active">BEDS</a></li>
        	<li class="logout"><a href="logout.php">LOGOUT</a></li>
        </ul> -->
        <!-- // #end mainNav -->
        
        <!-- <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="beds.php">VIew All Beds</a></li>
                    	<li><a href="add-bed.php" class="active">Add New Bed</a></li>
                    </ul> -->
                    <!-- // .sideNav -->
                <!-- </div>     -->
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
				<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bed</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<div class="jumbotron" style="background:url('images/admin.jpg') no-repeat;background-size:cover;height:300px;"> </div>
<div class="container-fluid">
<div class="row">
    <div class="col-md-3">
    <div class="list-group">
        <a href="dashboard.php" class="list-group-item active" style="background-color:#3498DB;color:#ffffff; border-color:#3498DB">Dashboard</a>
    </div>
	<hr>
    <div class="list-group">
        <a href="#" class="list-group-item active" style="background-color:#3498DB;color:#ffffff; border-color:#3498DB">Patients</a>
        <a href="patients.php" class="list-group-item">Patient Details</a>
        <a href="add-patient.php" class="list-group-item"> Add New Patient</a>
        <a href="assign-bed.php" class="list-group-item">Assign/Unassign Beds</a>
    </div>
    <hr>
    <div class="list-group">
        <a href="#" class="list-group-item active" style="background-color:3498DB;color:#ffffff; border-color:#3498DB">Beds</a>
        <a href="beds.php" class="list-group-item">Bed Availablity</a>
        <!-- <a href="add-bed.php" class="list-group-item"> Add New Bed</a> -->
    </div>
<hr>
<div class="list-group">
        <a href="#" class="list-group-item active" style="background-color:3498DB;color:#ffffff; border-color:#3498DB">Staff</a>
        <a href="add-staff.php" class="list-group-item">Add New Staff</a>
        <a href="assign-staff.php" class="list-group-item"> Assign/Unassign Staff</a>
    </div>
	<hr>
	<div class="list-group">
        <a href="logout.php" class="list-group-item active" style="background-color:3498DB;color:#ffffff; border-color:#3498DB">Logout</a>
</div>
</div>

				<div class='col d-flex justify-content-center'>
				
				<div class="col-md-11">
				<div class="card">
				<div class="card-body">
				<div class="textcontainer" style="width:100%;
  height:100%;">
<h3 style="background: rgba(0,102,255,0.8);
border-radius:15px;
    margin-top: 0.2px;
	margin-bottom: 25px;
	padding: 10px 300px 10px;
    color: aliceblue;
    font-size: 40px;
    font-family:Arial, Helvetica, sans-serif;">
  Add New Bed</h3>
</div>

                <form method="post" class="jNice">
					
                    <?php
						if(isset($_POST['save']))
						{
							$type=$_POST['type'];
							$ward=$_POST['ward'];
							
							if($type=="none"){ $error="<br><span class=error>Please select a type</span><br><br>"; }
							elseif($ward=="none"){ $error="<br><span class=error>Please select a ward</span><br><br>"; }
							else
							{
								mysqli_query($server,"INSERT INTO beds (type,ward) VALUES ('$type','$ward')");
								echo $msg;
							}
							
							if($error!=""){ echo $error; }
						}
					?>
                    	<fieldset>
                            <p><label>Type:</label>
                            <select name="type" class="form-control">
                            	<option value="none">[--------SELECT--------]</option>
                            	<option value="Manual">Manual</option>
                            	<option value="Bariatric">Bariatric</option>
                            	<option value="Full-Electric">Full-Electric</option>
                            	<option value="Semi-Electric">Semi-Electric</option>
                                <option value="Low Bed">Low Bed</option>
                            </select>
                            </p>
                            <p><label>Ward:</label>
                            <select name="ward" class="form-control">
                            	<option value="none">[--------SELECT--------]</option>
                            	<!-- <option value="Postnatal">Postnatal</option> -->
                            	<option value="Pregnancy">Pregnancy</option>
                            	<option value="Critical Care">Critical Care</option>
                            	<!-- <option value="Orthopaedic">Orthopaedic</option> -->
                                <!-- <option value="Psychiatric">Psychiatric</option> -->
                                <option value="Emergency"> Emergency</option>
                                <option value="Paediatric">Paediatric</option>
                            </select>
                            </p>
                            <input type="submit" value="Save" name="save" class="btn btn-primary" />
                        </fieldset>
                    </form>
                        <br /><br />

						</div>
</div>
</div>
<div class="col-md-1"></div>
</div>
</div>

    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
 crossorigin="anonymous"></script>
</body>
</html>
                <!-- </div> -->
          
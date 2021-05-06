<?php
	session_start();
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		$error="";
		$msg="<span class='label label-success'>Staff Added Successfully</span>";
		
		require_once('header.php');
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff</title>
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
        <a href="add-bed.php" class="list-group-item"> Add New Bed</a>
    </div>
<hr>
<div class="list-group">
        <a href="#" class="list-group-item active" style="background-color:3498DB;color:#ffffff; border-color:#3498DB">Staff</a>
        <!-- <a href="add-staff.php" class="list-group-item">Add New Staff</a> -->
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
  Add New Staff</h3>
</div>
                
                <form method="post" class="jNice">
					
                    <?php
						if(isset($_POST['save']))
						{
							$name=trim($_POST['name']);
							$age=trim($_POST['age']);
							$sex=$_POST['sex'];
							$specialization=trim($_POST['specialization']);
							$timings=trim($_POST['timings']);
							$phone=trim($_POST['phone']);
							
							
							if($name==""){ $error="<br><span class=error>Please enter a name</span><br><br>"; }
							elseif($age==""){ $error="<br><span class=error>Please enter the age</span><br><br>"; }
							elseif($age<1){ $error="<br><span class=error>Please enter a value greater than zero for age</span><br><br>"; }
							elseif(!is_numeric($age)){ $error="<br><span class=error>Age must be a number</span><br><br>"; }
							elseif($sex=="none"){ $error="<br><span class=error>Please select the sex</span><br><br>"; }
                            elseif($specialization==""){ $error="<br><span class=error>Please enter a specialization</span><br><br>"; }
                            elseif($timings==""){ $error="<br><span class=error>Please enter the Shift Timings</span><br><br>"; }
							elseif($phone==""){ $error="<br><span class=error>Please enter the phone number</span><br><br>"; }							
							else
							{
								mysqli_query($server,"INSERT INTO staff (name,age,sex,specialization,timings,phno) VALUES ('$name','$age','$sex','$specialization','$timings','$phone')");
								$result=mysqli_query($server,"SELECT staff_id FROM staff ORDER BY staff_id DESC LIMIT 0,1");
								$row=mysqli_fetch_array($result);
								
								mysqli_query($server,"INSERT INTO staff_to_pat (staff_id,pat_id) VALUES ('$row[staff_id]','none')");
								echo $msg;
							}
							
							if($error!=""){ echo $error; }
						}
					?>
                    	<fieldset>
                        	<p><label> Name:</label><input type="text" name="name" class="form-control" autofocus value="  " /></p>
                            <p><label>Age:</label><input type="number" name="age" class="form-control" value="<?php echo $age; ?>" /></p>
                            <p><label>Sex:</label>
                            <select name="sex" class="form-control">
                            	<option value="none">SELECT</option>
                            	<option value="Male">Male</option>
                            	<option value="Female">Female</option>
                            	<option value="Transexual">Transexual</option>
                            	<option value="Other">Other</option>
                            </select>
                            </p>
							<label>Role:</label><br>
							<input type="radio" id="doctor" name="specialization" value="Doctor">
							<label for="positive">Doctor</label><br>
							<input type="radio" id="Nurse" name="specialization" value="Nurse">
							<label for="negative">Nurse</label><br>
							<input type="radio" id="Volunteer" name="specialization" value="Volunteer">
							<label for="awaiting">Volunteer</label><br>
                            <input type="radio" id="Housekeeping" name="specialization" value="Housekeeping">
							<label for="negative">Housekeeping Staff</label><br>
							<p><label>Shift Timings:</label><input type="text" name="timings" class="form-control" value="  " /></p>
                            <p><label>Phone Number:</label><input type="text" name="phone" class="form-control" value="  " /></p>
                            <input type="submit" value="Save" name="save" class="btn btn-primary" />
                        </fieldset>
                    </form>
                        <br /><br />
						</div>
</div>
</div>

</div>
</div>

    


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
 crossorigin="anonymous"></script>
</body>
</html>
                <!-- // #main -->
            
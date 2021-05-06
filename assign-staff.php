<?php
	session_start();
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		$error="";
		$error2="";
		$msg="<br><span class=msg>Staff Assigned Successfully</span><br><br>";
		$msg2="<br><span class=msg>Staff Has Been Unssigned Successfully</span><br><br>";
		require_once('header.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
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
        <!-- <a href="assign-bed.php" class="list-group-item">Assign/Unassign Beds</a> -->
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
    font-size: 30px;
    font-family:Arial, Helvetica, sans-serif;">
  Assign/Unassign Staff</h3>
</div>
                <!-- <div id="main"> -->
                <form method="post" class="jNice" name="frm1">
					<h3>Assign Staff</h3>
                    <?php
						if(isset($_POST['assign']))
						{
							$staff=$_POST['staff'];
							$patient=$_POST['patient'];
							
							if($staff=="none"){ $error="<br><span class=error>Please select a staff</span><br><br>"; }
							elseif($patient=="none"){ $error="<br><span class=error>Please select a patient</span><br><br>"; }
							else
							{
								$result4=mysqli_query($server,"SELECT * FROM staff_to_pat WHERE staff_id='$staff'");
								if($row4=mysqli_num_rows($result4)>0){ $error="<br><span class=error>Staff $staff has already been assigned to a patient</span><br><br>"; }
								else
								{
									mysqli_query($server,"UPDATE staff_to_pat SET staff_id='$staff' WHERE pat_id='$patient'");
									echo $msg;
								}
							}
							
							if($error!=""){ echo $error; }
						}
					?>
                    	<fieldset>
                            <p><label>Patient:</label>
                            <select name="patient" class="form-control">
                            	<option value="none">[--------SELECT--------]</option>
                                <?php
									$result=mysqli_query($server,"SELECT p.pat_id,p.name,pb.pat_id,pb.staff_id FROM patients P, staff_to_pat pb WHERE p.pat_id=pb.pat_id AND pb.staff_id='none' ORDER BY p.pat_id DESC");
									while($row=mysqli_fetch_row($result))
									{
										$rn=$row['0'];
					 					if(strlen($rn)==1)
					 					$rn="000".$rn;
					 					elseif(strlen($rn)==2)
					 					$rn="00".$rn;
					 					elseif(strlen($rn)==3)
					 					$rn="0".$rn;
					 					elseif(strlen($rn)>3)
					 					$rn=$rn;
										echo"<option value=$row[0]>$rn - $row[1]</option>";
									}
								?>
                            </select>
                            </p>
                            <p><label>Staff:</label>
                            <select name="staff" class="form-control">
                            	<option value="none">[--------SELECT--------]</option>
                            	<?php
									$result2=mysqli_query($server,"SELECT * FROM staff ORDER BY staff_id DESC");
									while($row2=mysqli_fetch_assoc($result2))
									{
										echo"<option value=$row2[staff_id]>Staff $row2[staff_id] - $row2[specialization]</option>";
									}
								?>
                            </select>
                            </p>
                            <input type="submit" value="Assign Staff" name="assign" class="btn btn-primary" />
                        </fieldset>
                    </form>
                        <br /><br />
                    <form method="post" class="jNice" name="frm2">
					<h3>Unassign Beds</h3>
                    <?php
						if(isset($_POST['unassign']))
						{
							$stp=trim($_POST['stp']);
							
							if($stp=="none"){ $error2="<br><span class=error>Please select a relationship</span><br><br>"; }
							else
							{
								mysqli_query($server,"UPDATE staff_to_pat SET staff_id='none' WHERE pat_id='$stp'");
								echo $msg2;
							}
							
							if($error2!=""){ echo $error2; }
						}
					?>
                    	<fieldset>
                            <p><label>Staff - Patient Relationship:</label>
                            <select name="stp" class="form-control">
                            	<option value="none">[--------SELECT--------]</option>
                                <?php
                                $result3=mysqli_query($server,"SELECT p.pat_id,p.name,pb.pat_id,pb.staff_id FROM patients P, staff_to_pat pb WHERE p.pat_id=pb.pat_id AND pb.staff_id>0 ORDER BY p.pat_id DESC");
									while($row3=mysqli_fetch_row($result3))
									{
										$rn=$row3['0'];
					 					if(strlen($rn)==1)
					 					$rn="000".$rn;
					 					elseif(strlen($rn)==2)
					 					$rn="00".$rn;
					 					elseif(strlen($rn)==3)
					 					$rn="0".$rn;
					 					elseif(strlen($rn)>3)
					 					$rn=$rn;
                                        echo"<option value=$row3[0]>Staff
                                         $row3[3] to $rn - $row3[1]</option>";
									}
									?>
                            </select>
                            </p>
                            <input type="submit" value="Unassign Staff" name="unassign" class="btn btn-primary"/>
                        </fieldset>
                    </form>
				<!-- </div> -->
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
               
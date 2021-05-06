<!DOCTYPE html>

<html lang="en">
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
</head>

<body>

<?php
	session_start();
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		require_once('header.php');
	}
?>
<div class="jumbotron" style="background:url('images/admin.jpg') no-repeat;background-size:cover;height:300px;"> </div>
<div class="container"> 
<div class="card">


<div class="card-body">
<div class="row">
<div class="col-md-1">
<a href="dashboard.php" class="btn btn-dark"> Back </a>
</div>
<div class="col-md-3"><h3> Patient Details </h3></div>
<div class="col-md-8">
<!-- <form class="form-group" action="search_patient.php" method="post">
<div class="row">
   <div class="col-md-10"> <input type="text" name="search" placeholder="Search patient here.." class="form-control"></div>
   <div class="col-md-2"><input type="submit" name="patient_search" value="Search" class="btn btn-dark"></div>
  
</form>
</div> -->
</div>
</div> 

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Patient ID</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Sex</th>
      <th scope="col">Blood Group</th>
	  <th scope="col">Test Date</th>
	  <th scope="col">Test Result</th>

      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php
	$result=mysqli_query($server,"SELECT p.*,pb.pat_id,pb.bed_id AS bed FROM patients p,pat_to_bed pb WHERE p.pat_id=pb.pat_id ORDER BY p.pat_id DESC");
	while($row=mysqli_fetch_row($result))
	{
		$status="";
		if($row[9]=="none"){ $status="Unassigned"; }
		elseif($row[9]>0){ $status="Admitted <font color=#c66653>{Bed $row[9]}</font>"; } else{ $status="<font color=#33CC99>Discharged</font"; }
		$rn=$row['0'];
		if(strlen($rn)==1)
		$rn="000".$rn;
		elseif(strlen($rn)==2)
		$rn="00".$rn;
		elseif(strlen($rn)==3)
		$rn="0".$rn;
		elseif(strlen($rn)>3)
		$rn=$rn;
		
		echo"<tr class=odd>
		<td>$rn</td>
		<td>$row[1]</td>
		<td>$row[2]</td>
		<td>$row[3]</td>
		<td>$row[4]</td>
		<td>$row[6]</td>
		<td>$row[7]</td>
		<td>$status</td>
		</tr>";
	}
	?>      
  </tbody>
</table>
</div>
</div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
 crossorigin="anonymous"></script>

</body>
</html>



<?php
	// session_start();
	// require_once('connect.php');
	// if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	// else
	// {
	// 	require_once('header.php');
	// }
?>
        <!-- <ul id="mainNav">
        	<li><a href="dashboard.php">DASHBOARD</a></li> 
        	<li><a href="patients.php" class="active">PATIENTS</a></li>
        	<li><a href="beds.php">BEDS</a></li>
        	<li class="logout"><a href="logout.php">LOGOUT</a></li>
        </ul> -->
        <!-- // #end mainNav -->
        
        <!-- <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="patients.php" class="active">VIew All Patients</a></li>
                    	<li><a href="add-patient.php">Add New Patient</a></li>
                    	<li><a href="assign-bed.php">Assign/Unassign Beds</a></li>
                    </ul> -->
                    <!-- // .sideNav -->
                <!-- </div>     -->
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <!-- <h2>View All Patients</h2>
                
                <div id="main">
					<h3>Patient Records</h3> -->
                    	<!-- <table cellpadding="0" cellspacing="0">
							<tr>
                                <td><b>Patient ID</b></td>
                                <td><b>Name</b></td>
                                <td><b>Age</b></td>
                                <td><b>Sex</b></td>
                                <td><b>Blood Group</b></td>
                                <td><b>Status</b></td>
                            </tr> 
                             <?php
								// $result=mysqli_query($server,"SELECT p.*,pb.pat_id,pb.bed_id AS bed FROM patients p,pat_to_bed pb WHERE p.pat_id=pb.pat_id ORDER BY p.pat_id DESC");
								// while($row=mysqli_fetch_row($result))
								// {
								// 	$status="";
								// 	if($row[7]=="none"){ $status="Unassigned"; }
								// 	elseif($row[7]>0){ $status="Admitted <font color=#c66653>{Bed $row[7]}</font>"; } else{ $status="<font color=#33CC99>Discharged</font"; }
									
									
								// 	$rn=$row['0'];
					 			// 	if(strlen($rn)==1)
					 			// 	$rn="000".$rn;
					 			// 	elseif(strlen($rn)==2)
					 			// 	$rn="00".$rn;
					 			// 	elseif(strlen($rn)==3)
					 			// 	$rn="0".$rn;
					 			// 	elseif(strlen($rn)>3)
					 			// 	$rn=$rn;
									
								// 	echo"<tr class=odd>
                                // 	<td>$rn</td>
                                // 	<td>$row[1]</td>
                                // 	<td>$row[2]</td>
                                // 	<td>$row[3]</td>
                                // 	<td>$row[4]</td>
								// 	<td>$status</td>
                            	// 	</tr>";
								// }
							?>                      
                        </table>
                        <br /><br />
                </div> -->
                <!-- // #main -->
             
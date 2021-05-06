<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
<div class="jumbotron" style="background:url('images/admin.jpg') no-repeat;background-size:cover;height:400px;"> 
<div class="textcontainer" style="width:100%;
  height:100%;">
<h3 style="background: rgba(0,153,204,0.3);
    margin-top: 7%;
    padding: 7px;
    color: aliceblue;
    font-size: 50px;
    font-family: Palatino Linotype;">
  Covid-19 Health Care Facility</h3>
</div>
</div>
<div class="container-fluid">
<div class="row">
    <div class="col-md-3">
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
        <a href="add-staff.php" class="list-group-item">Add New Staff</a>
        <a href="assign-staff.php" class="list-group-item"> Assign/Unassign Staff</a>
    </div>
	<hr>
	<div class="list-group">
        <a href="logout.php" class="list-group-item active" style="background-color:3498DB;color:#ffffff; border-color:#3498DB">Logout</a>
</div>
</div>

<?php
	session_start();
	require_once('connect.php');
	if(!isset($_SESSION['user_id'])){ Redirect('index.php'); }
	else
	{
		require_once('header.php');
	}
?>
        <!-- <ul id="mainNav">
        	<li><a href="dashboard.php" class="active">DASHBOARD</a></li> <!-- Use the "active" class for the active menu item  -->
        	<!-- <li><a href="patients.php">PATIENTS</a></li>
        	<li><a href="beds.php">BEDS</a></li>
        	<li class="logout"><a href="logout.php">LOGOUT</a></li>
        </ul>  -->
        <!-- // #end mainNav -->
        
        <!-- <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a>Welcome,</a></li>
                    </ul> -->
                    <!-- // .sideNav -->
                <!-- </div>     -->
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
				<div class="d-flex">
		
</div>
                
               <!-- <div id="main"> -->
					<!-- <h3>Statistics</h3> -->
			
					<div class="d-flex">
							<div class='card' style="width:70rem;">
							
							<div class='card-body' style='font-weight:bolder;'>
							<a>Welcome, <?php echo $_SESSION['name']; ?></a>
							<table class='table table-hover'>
					 <!-- <table> -->
                  <?php
				  	$result=mysqli_query($server,"SELECT COUNT(pat_id) FROM patients");
					$row=mysqli_fetch_row($result);
					
					$result2=mysqli_query($server,"SELECT COUNT(bed_id) FROM beds");
					$row2=mysqli_fetch_row($result2);
					
					$result3=mysqli_query($server,"SELECT COUNT(pat_id) FROM pat_to_bed WHERE bed_id>0");
					$row3=mysqli_fetch_row($result3);
					
					$result4=mysqli_query($server,"SELECT COUNT(bed_id) FROM pat_to_bed WHERE bed_id>0");
					$row4=mysqli_fetch_row($result4);
					
					$result5=mysqli_query($server,"SELECT COUNT(pat_id) FROM pat_to_bed WHERE bed_id=0 AND bed_id!='none'");
					$row5=mysqli_fetch_row($result5);
					
					$row6[0] = $row2[0] - $row4[0];
					
					$result7=mysqli_query($server,"SELECT COUNT(pat_id) FROM pat_to_bed WHERE bed_id='none'");
					$row7=mysqli_fetch_row($result7); 
					
						// echo "
						// <thead>
						// 	<tr>
						// 	<th scope='col'>Patients</th>
						// 	<th scope='col'>Beds</th>
						// 	</tr>
						// </thead>
						// <tbody>
						// ";

						// while($row=mysqli_fetch_array($result)){
						// 	$name=$row['name'];
						// 	$contact=$row['contact'];
						// 	$email=$row['email'];
						// 	$doc=$row['doc'];
						// 	echo "<tr>
						// 	<td>$name</td>
						// 	<td>$contact</td>
						// 	<td>$email</td>
						// 	<td>$doc</td>
						//   </tr>";
						// }
						// echo "</tbody></table></div></div></div>";
					
							  echo"<thead>
							  <tr>
							  <th align=center valign=middle>Patients</th>
							  <th align=center valign=middle>Beds</th>
							  </tr>
							  </thead>
							  <tbody>
  							<tr>
    							<td> Total - $row[0]</td>
    							<td >Total - $row2[0]</td>
							</tr>
  							<tr>
    							<td>Admitted - $row3[0]</td>
    							<td>Occupied - $row4[0]</td>
							</tr>
  							<tr>
   		 						<td>Discharged - $row5[0]</td>
    							<td>Vacant - $row6[0]</td>
							</tr>
  							<tr>
   							  <td>Unassigned to bed - $row7[0]</td>
    							<td>&nbsp;</td>
							</tr>
							</tbody>";
					?>
				  </table>
                        
                </div>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
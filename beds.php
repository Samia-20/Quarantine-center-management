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
<div class="col-md-3"><h3> Bed Details </h3></div>

</div> 

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Bed Id</th>
      <th scope="col">Type</th>
      <th scope="col">Ward</th>
    </tr>
  </thead>
  <tbody>
  <?php
								$result=mysqli_query($server,"SELECT * FROM beds ORDER BY bed_id DESC");
								while($row=mysqli_fetch_assoc($result))
								{
									echo"<tr class=odd>
                                	<td>$row[bed_id]</td>
                                	<td>$row[type]</td>
                                	<td>$row[ward]</td>
                            		</tr>";
								}
							?>     
  </tbody>
</table>
</div>
</div>

       
                
            
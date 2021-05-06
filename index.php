<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>


<?php
	require_once('header.php');
	require_once('connect.php');
	$error="";
?>   
<body style="background:url('images/1.jpg') no-repeat; background-size:cover;">
<div class="container" style="width:400px; margin-top:150px;">
<div class="card">
<div class="card-body">
<form class="form-group"  method="post" name="frm1">

                    <?php
						if(isset($_POST['save']))
						{
							$uname=$_POST['uname'];
							$pword=$_POST['pword'];
							
							if($uname==""){ $error="<br><span class=error>Please enter a username</span><br><br>"; }
							elseif($pword==""){ $error="<br><span class=error>Please enter the password</span><br><br>"; }
							else
							{
								$result=mysqli_query($server,"SELECT * FROM users WHERE uname='$uname' AND pword='$pword'");
								if(mysqli_num_rows($result)==0){ $error="<br><span class=error>Invalid Username/Password</span><br><br>"; }
								else
								{
									$row=mysqli_fetch_array($result);
									session_start();
									$_SESSION['user_id']=$row['user_id'];
									$_SESSION['name']=$row['name'];
									Redirect('dashboard.php'); 
								}
							}
							if($error!=""){ echo $error; }
						}
					?>
                    	
                            <p><label>Username:</label><input type="text" name="uname" class="form-control" placeholder="Enter your username" /></p>
                            <p><label>Password:</label><input type="password" name="pword" class="form-control" placeholder="Enter your password" /></p>
                            <input type="submit" value="Log In" name="save" class="btn btn-primary" />
                        
                    </form>
                        <br /><br />
						</div>
</div>
 </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
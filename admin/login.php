<?php
/*include("../includes/header.php");*/
include("../includes/mysql_connect.php");// here we include the connection script; since this file(header.php) is included at the top of every page we make, the connection will then also be included. Also, config options like BASE_URL are also available to us.
$return = $_GET['return'];

/*echo $return;*/

if(isset($_POST['submit'])){

	//$msg = "Form has been submitted";
	$username = $_POST['user'];
	$password = $_POST['password'];
	//echo "$username | $password";

	// Please use your own values !!!
	if(($username == "123abc") && ($password == "123abc")){
	$msg = "Welcome";
		//Successful Login: create a session var that we check for on all secure pages 

		session_start();
		$_SESSION['estdrftu5sdf6hoetdry2'] = session_id();

		// header("Location:insert.php");
		switch ($return) {
			case 'edit': 
				header("Location:edit.php");
				break;

			case 'insert': 
				header("Location:insert.php");
				break;
			
			default: 
				header("Location:../index.php");
				break;
		}

	}else{
		//Unsuccessful Login Attempt
		$msg = "Incorrect Login";
	}

}// \ if isset submit

if (isset($_GET['action']) and $_GET['action']=='logout'){
if(!isset($_SESSION)){session_start();};
unset($_SESSION['id']);
header('Location:logout.php');
exit();
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Wendy+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>css/bootstrap-superhero.css">
	<title>Login Page</title>
	<style type="text/css">
	.message{
		color:#f00;
		font-weight: bold;
	}
	</style>
</head>
<body>
<!-- <div id = "container">
<div id="title">
	<h1>My Blog</h1>
	<h2>Login</h2>
</div>

<form name="myform" id="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
	<p>
		<label for="user">Username:</label>
		<input type="text" name="user" id="user">
	</p>

	<p>
		<label for="password">Password:</label>
		<input type="password" name="password" id="password">
	</p>

	<p>
		<label for="submit"></label>
		<input type="submit" name="submit" id="submit" value="Login">
	</p>

	https://bootsnipp.com/snippets/6nZpr

</form>
	<div class="message">
	<?php
	if($msg){
		echo $msg;
		}
	 ?>
	</div>

</div> -->

<div class="container" style="margin-top: 10%;">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
            
            <!-- Login Form -->
            <form name="myform" id="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
            
            <!-- Username Field -->
                <div class="row">
                    <div class="form-group col-xs-12">
                    <label for="user"><span class="text-danger" style="margin-right:5px;">*</span>Username:</label>
                        <div class="input-group">
                            <input class="form-control" id="user" type="text" name="user" placeholder="Username" required/>
                            <span class="input-group-btn">
                                <label class="btn btn-primary"><span class="glyphicon glyphicon-user" aria-hidden="true"></label>
                            </span>
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Content Field -->
                <div class="row">
                    <div class="form-group col-xs-12">
                        <label for="password"><span class="text-danger" style="margin-right:5px;">*</span>Password:</label>
                        <div class="input-group">
                            <input class="form-control" id="password" type="password" name="password" placeholder="Password" required/>
                            <span class="input-group-btn">
                                <label class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></label>
                            </span>
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Login Button -->
                <div class="row">
                    <div class="form-group col-xs-4">
                        <button class="btn btn-primary" name="submit" type="submit">Login</button>
                    </div>
                </div>
                
            </form>
            <!-- End of Login Form -->
            <div class="message">
				<?php
				if($msg){
					echo $msg;
					}
				 ?>
			</div>
        </div>
    </div>
</div>
</body>
</html>
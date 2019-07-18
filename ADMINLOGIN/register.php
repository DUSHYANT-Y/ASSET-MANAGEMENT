<?php
$pdo = new PDO('mysql:host=localhost;dbname=assets', 'root','');
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Admin Login
					</span>
				</div>

				<form class="login100-form validate-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Full Name is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="name" placeholder="Enter Full Name">
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email Id is required">
						<span class="label-input100">Email ID</span>
						<input class="input100" type="email" name="email" placeholder="Enter email Id">
						<span class="focus-input100"></span>
					</div>

                    
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Adminid</span>
						<input class="input100" type="text" name="id" placeholder="Enter Admin Id">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

                    <div class="form-group">
        		        <div class="col-xs-4">
                            <label for="ctype">Department:</label>
                                <select class="form-control"  name="department">
								<option value="" selected="selected">Select an option...</option>
                                <?php
                                    $sql= $pdo->prepare("select * from department");
                                    $sql->execute();
                                    $result = $sql->fetchall();
                                    foreach ($result as $result) {
                                    echo '<option value = "'.$result["d_name"].'">'.$result["d_name"].'</option>';
                                     }
                                ?>   
                                </select>
                        </div>
                    </div>

                    <br />
					<div class="container-login100-form-btn">
						<button>
							<input type="submit" value="Sign Up" name="submit"/>  
						</button>
                    </div>
                    <br />
                    <a href="index.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
							Sign in
							<i class="fa fa-long-arrow-right m-l-5"></i>
						</a>
				</form>
			</div>
		</div>
	</div>

	<?php  

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	//session_start();
	//try
//{

//}
	/*catch(PDOException $e)
{
	echo $e;
	exit('Database error.');
}*/
if(isset($_POST['submit'])){ 
  
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['id']) && !empty($_POST['pass']) && !empty($_POST['department'])) {  
            $name=$_POST['name']; 
            $email=$_POST['email']; 
            $id=$_POST['id'];  
            $pass=$_POST['pass'];  
            $department=$_POST['department']; 
    
            
            
            //extract($_POST);
        /*$Name = str_replace("'","`",$name); 	
        $email_id = str_replace("'","`",$email); 	        
        $user_id = str_replace("'","`",$user); 
        $password = str_replace("'","`",$pass); 
        $password = md5($password);*/
    
        $query  = $pdo->prepare("SELECT d_id FROM department WHERE d_name = '$department'");
        $query ->execute();
        $result = $query->fetchall();
    
        foreach ($result as $array) {
            $d_id=$array["d_id"];
        
        }
    
        $sql = $pdo->prepare("insert into admin(id,password,Name,d_id,email) values(:id,:pass,:name,:department,:email)");
        $sql->bindParam(':id',$id);
        $sql->bindParam(':pass',$pass);
        $sql->bindParam(':name',$name);
        $sql->bindParam(':department',$department);
        $sql->bindParam(':email',$email);
        $sql->execute();
    
         echo '<script language="javascript">';
         echo 'alert("Successfully Registered")';
         echo '</script>';
         echo '<meta http-equiv="refresh" content="0;url= register.php" />';
    
    }
    }
}
?>  

</body>
</html>
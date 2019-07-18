<!DOCTYPE HTML>
<html>
	<head>
		<title>ASSET MANAGEMENT</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--<link rel="stylesheet" href="assets/css/main.css" />-->
		<!-- Scripts -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
		
	</head>
	<style>
			*, *:before, *:after {
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
	}
	.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}



div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
		div.container{
			margin-left: 200px;
			
		}
	</style>
	<body>
		<nav class="navbar navbar-inverse">
  		<div class="container-fluid">
    		<div class="navbar-header">
      		<a class="navbar-brand" href="#"><strong>ASSET MANAGEMENT</strong></a>
    		</div>
    		<ul class="nav navbar-nav">
      		<li><a href="adminhome.php">Home</a></li>
      		<li><a href="generic.html">About us</a></li>
      		</ul>
          <ul class="nav navbar-nav navbar-right">
      <li><a href="../HomePage/index.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  		</div>
		</nav>

		<div class="sidebar">
   <a class="active" href="categories.php">Categories</a>
  <a href="Department.php">Departments</a>
  <a href="Hardware.php">Hardware</a>
  <a href="Software.php">Software</a>
  <a href="Furniture.php">Furniture</a>
  <a href="Vendor.php">Vendors</a>
  <a href="employee.php">Employee</a>
  
        </div>
        <div class= "container">
        	<form class="form-horizontal" enctype ="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?> " method="POST">
        		<div class="form-group">
        		<div class="col-xs-4">
  <label for="ctype">Category type:</label>
  <select class="form-control" id="ctype" name="ctype">
    <option>Hardware</option>
    <option>Software</option>
    <option>Furniture</option>
    
  </select>
</div>
</div>

    <div class="form-group">
    	<div class="col-xs-3">
      <label for="cdesc">Category Description:</label>
      <textarea class="form-control" rows="5" id="cdesc" name="cdesc"></textarea>
    </div>
   </div>

   <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    
  
 </form>
 <?php  

				if($_SERVER['REQUEST_METHOD'] == 'POST')
				{

				
	//session_start();
	//try
//{
  $pdo = new PDO('mysql:host=localhost;dbname=assets', 'root','');
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//}
	/*catch(PDOException $e)
{
	echo $e;
	exit('Database error.');
}*/
if(isset($_POST['submit'])){ 
  
  if(!empty($_POST['cname']) && !empty($_POST['ctype']) && !empty($_POST['cdesc']) ) {  
          $cname=$_POST['cname']; 
        $ctype=$_POST['ctype']; 
        $cdesc=$_POST['cdesc'];  
       
  
      
      
      //extract($_POST);
    /*$Name = str_replace("'","`",$name); 	
    $email_id = str_replace("'","`",$email); 	        
    $user_id = str_replace("'","`",$user); 
    $password = str_replace("'","`",$pass); 
    $password = md5($password);*/
  
    $sql = $pdo->prepare("insert into categories(cname,ctype,cdesc) values(:cname,:ctype,:cdesc)");
    $sql->bindParam(':cname',$cname);
    $sql->bindParam(':ctype',$ctype);
    $sql->bindParam(':cdesc',$cdesc);
    $sql->execute();
  
     echo '<script language="javascript">';
     echo 'alert("Successfully Registered")';
     echo '</script>';
     echo '<meta http-equiv="refresh" content="0;url= categories.php" />';
  
  }
  }

        }
?>

		

	</body>
</html>
<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=assets', 'root','');
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  ?>

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
   <a  href="categories.php">Categories</a>
  <a href="Department.php">Departments</a>
  <a  href="Hardware.php">Hardware</a>
  <a href="Software.php">Software</a>
  <a href="Furniture.php">Furniture</a>
  <a href="Vendor.php">Vendors</a>
  <a class ="active" href="employee.php">Employee</a>
  
        </div>
        <div class= "container">
        <form class="form-horizontal" enctype ="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <div class="form-group">
        <div class="col-xs-4">
  <label for="ctype">Hardwares</label>
  <select class="form-control" id="email" name="hardware">
  <option value="" selected="selected">Select an option...</option>
    <?php
    $sql1= $pdo->prepare("select * from hardware");
    $sql1->execute();
    $resultt = $sql1->fetchall();
    foreach ($resultt as $resulttt) {
      echo '<option value = "'.$resulttt["hw_name"].'">'.$resulttt["hw_name"].'</option>';
    }
    ?>   
  </select>
</div>
</div>

<div class="form-group">
        <div class="col-xs-4">
  <label for="ctype">Softwares</label>
  <select class="form-control" id="email" name="software">
  <option value="" selected="selected">Select an option...</option>
    <?php
    $sql2= $pdo->prepare("select * from software");
    $sql2->execute();
    $result2 = $sql2->fetchall();
    foreach ($result2 as $result3) {
      echo '<option value = "'.$result3["sw_name"].'">'.$result3["sw_name"].'</option>';
    }
    ?>   
  </select>
</div>
</div>
<br><br><br><br><br><br><br><br><br><br>
<button type="submit"  name="submit" class="btn btn-primary">Assign</button>

</form>
  <?php  
  $emp_id=$_SESSION["emp_id"];
  $emp_name=$_SESSION["emp_name"];
  $emp_phone=$_SESSION["emp_phone"];
  $d_id=$_SESSION["d_id"];

if($_SERVER['REQUEST_METHOD'] == 'POST')
{ 

if(isset($_POST['submit'])){ 
   
  if(!empty($_POST['hardware']) || !empty($_POST['software'])) {  
          $hardware=$_POST['hardware'];
          $software=$_POST['software'];
    
   $query50 = $pdo->prepare("SELECT hw_id FROM hardware WHERE hw_name = '$hardware'");
  $query50 ->execute();
  $result = $query50->fetchall();

  foreach ($result as $array) {
      $h_id=$array["hw_id"];
  
  } 

  $query51 = $pdo->prepare("SELECT sw_id FROM software WHERE sw_name = '$software'");
  $query51 ->execute();
  $result4 = $query51->fetchall();

foreach ($result4 as $array3) {
$s_id=$array3["sw_id"];

} 
  
  $sql21 = $pdo->prepare("insert into employee(emp_id,emp_name,d_id,emp_phone,hw_id,sw_id) values(:emp_id,:emp_name,:d_id,:emp_phone,:h_id,:s_id)");
  $sql21->bindParam(':emp_id',$emp_id);
  $sql21->bindParam(':emp_name',$emp_name);
  $sql21->bindParam(':d_id',$d_id);
  $sql21->bindParam(':emp_phone',$emp_phone);
  $sql21->bindParam(':h_id',$h_id);
  $sql21->bindParam(':s_id',$s_id);
  $sql21->execute();

  echo '<script language="javascript">';
     echo 'alert("Successfully Registered")';
     echo '</script>';
     echo '<meta http-equiv="refresh" content="0;url= employee.php" />';

  }
}
        }
      
        ?>



	</body>
</html>
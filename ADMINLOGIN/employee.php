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
    <div class = "form-group">
    	<div class="col-xs-4">
        <br>
      <h3>Enter Employee ID:</h3><input type="text" class="form-control" id="hwname" name="id">
    </div>
</div>
    <br><br>
    <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
  

  <?php  

				if($_SERVER['REQUEST_METHOD'] == 'POST')
				{ 

if(isset($_POST['submit'])){ 
  
  if(!empty($_POST['id'])) {  
          $id=$_POST['id']; 
          $_SESSION["emp_id"]=$id;

    $query  = $pdo->prepare("SELECT * FROM employee WHERE emp_id = '$id'");
    $query ->execute(); 
    $result = $query->fetchall();

    foreach ($result as $array) {
        $emp_name=$array["emp_name"];
        $_SESSION["emp_name"]=$emp_name;
        $emp_phone=$array["emp_phone"];
        $_SESSION["emp_phone"]=$emp_phone;
        $d_id=$array["d_id"];
        $_SESSION["d_id"]=$d_id;
        $hw_id=$array["hw_id"];
        
        $sw_id=$array["sw_id"]; 
               
        $sqlll = "SELECT hw_name,status FROM hardware WHERE hw_id = '$hw_id'";
        $qh = $pdo->query($sqlll);
		    $qh->setFetchMode(PDO::FETCH_ASSOC);

         while ($rowh = $qh->fetch()): ?>

<br><br>
<b>Hardware</b>: <?php echo htmlspecialchars($rowh['hw_name']) ?><br>
<b> Status</b>: <?php echo htmlspecialchars($rowh['status']) ?><br>

     <?php endwhile; 
     
     $sqllp = "SELECT sw_name FROM software WHERE sw_id = '$sw_id'";
        $qp = $pdo->query($sqllp);
		    $qp->setFetchMode(PDO::FETCH_ASSOC);

         while ($rowp = $qp->fetch()): ?>


<b>Software</b>: <?php echo htmlspecialchars($rowp['sw_name']) ?><br>

     <?php endwhile; 
    }


    $query1  = $pdo->prepare("SELECT d_name,room_number FROM department WHERE d_id = '$d_id'");
    $query1 ->execute(); 
    $result1 = $query1->fetchall();

    foreach ($result1 as $array1) {
        $d_name=$array1["d_name"];
        $room_number=$array1["room_number"];

    }
   ?>

   <br><br><br>
    <b>Employee Name</b>: <?php echo $emp_name; ?><br>
    <b>Employee Phone</b>: <?php echo $emp_phone; ?><br>
    <b>Employee Department</b>: <?php echo $d_name; ?><br>
    <b>Room number</b>: <?php echo $room_number; ?><br><br><br>
<br><br><br><br>
<a href="employee2.php" class="btn btn-primary" role="button">Assign</a>

</form>

<?php 
}
        }
      }
        ?>

	</body>
</html>
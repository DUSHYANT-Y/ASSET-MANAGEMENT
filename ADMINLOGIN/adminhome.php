<?php
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
   <a href="categories.php">Categories</a>
  <a href="Department.php">Departments</a>
  <a href="Hardware.php">Hardware</a>
  <a href="Software.php">Software</a>
  <a href="Furniture.php">Furniture</a>
  <a href="Vendor.php">Vendors</a>
  <a href="employee.php">Employee</a>
  
		</div>
		<div class= "container">
			<h1>VIEW TRANSACTIONS HERE......!!!!!</h1>
			<br><br><br>
			<form class="form-horizontal" enctype ="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
			
			<select name="option1">
			  <option value="" selected="selected">Select an option...</option>
			  <optgroup label="Software">
			    <option value="1">operating system</option>
				<option value="2">antivirus</option>
				<option value="3">System software</option>
				<option value="4">Other software</option>
			</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<select name="option2">
			  <option value="" selected="selected">Select an option...</option>
			  <optgroup label="Hardware">
			  <option  value="1">monitors</option>
				<option value="2">keyboards</option>
				<option value="3">mouse</option>
				<option value="4">printers</option>
				<option value="5">scanners</option>
			</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<select name="option3">
			  <option value="" selected="selected">Select an option...</option>
			  <optgroup label="Furniture">
			  <option value="1">tables</option>
			  <option value="2">chairs</option>
			  <option value="3">Sofa Set</option>
			  <option value="4">Air conditioner</option>
			</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</form>

        
        
        <?php  
				if($_SERVER['REQUEST_METHOD'] == 'POST')
				{
if(isset($_POST['submit'])){ 
  
  if(!empty($_POST['option1']) || !empty($_POST['option2']) || !empty($_POST['option3']) ) {  
		  $option1=$_POST['option1']; 
		  $option2=$_POST['option2']; 
		  $option3=$_POST['option3']; 

		if($option1 != NULL){

			$sql = "SELECT sw_name,serial_no,dop,price,exp_date FROM software WHERE master = '$option1'";

			
 
    		$q = $pdo->query($sql);
			$q->setFetchMode(PDO::FETCH_ASSOC);
			?>

			<br><br>
			<table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th>Software Name</th>
                        <th>Serial number</th>
                        <th>Date of purchase</th>
						<th>Price</th>
						<th>Date of expiry</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $q->fetch()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['sw_name']) ?></td>
                            <td><?php echo htmlspecialchars($row['serial_no']); ?></td>
                            <td><?php echo htmlspecialchars($row['dop']); ?></td>
							<td><?php echo htmlspecialchars($row['price']); ?></td>
							<td><?php echo htmlspecialchars($row['exp_date']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
			<?php
			}

			if($option2 != NULL){

				$sql = "SELECT hw_name,qty,dop,price,status FROM hardware WHERE master = '$option2'";
	 
				$q = $pdo->query($sql);
				$q->setFetchMode(PDO::FETCH_ASSOC);
				?>
				
				<br><br>
				<table class="table table-bordered table-condensed">
					<thead>
						<tr>
							<th>Hardware Name</th>
							<th>Quantity</th>
							<th>Date of purchase</th>
							<th>Price</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($row = $q->fetch()): ?>
							<tr>
								<td><?php echo htmlspecialchars($row['hw_name']) ?></td>
								<td><?php echo htmlspecialchars($row['qty']); ?></td>
								<td><?php echo htmlspecialchars($row['dop']); ?></td>
								<td><?php echo htmlspecialchars($row['price']); ?></td>
								<td><?php echo htmlspecialchars($row['status']); ?></td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
				
				<?php
				}

				if($option3 != NULL){

					$sql = "SELECT f_name,dop,price FROM furniture WHERE master = '$option3'";
		 
					$q = $pdo->query($sql);
					$q->setFetchMode(PDO::FETCH_ASSOC);
					?>

					<br><br>
					<table class="table table-bordered table-condensed">
						<thead>
							<tr>
								<th>Furniture Name</th>
								<th>Date of purchase</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($row = $q->fetch()): ?>
								<tr>
									<td><?php echo htmlspecialchars($row['f_name']) ?></td>
									<td><?php echo htmlspecialchars($row['dop']); ?></td>
									<td><?php echo htmlspecialchars($row['price']); ?></td>
								</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
					</div>
					<?php
					}
			
  }
}
}
		?>	
		

	</body>
</html>
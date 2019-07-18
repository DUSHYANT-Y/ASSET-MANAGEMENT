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
   <a  href="categories.php">Categories</a>
  <a href="Department.php">Departments</a>
  <a href="Hardware.php">Hardware</a>
  <a class="active" href="Software.php">Software</a>
  <a href="Furniture.php">Furniture</a>
  <a href="Vendor.php">Vendors</a>
  <a href="employee.php">Employee</a>
  
        </div>
        <div class= "container">
        	 <form class="form-horizontal" enctype ="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?> " method="POST">
        		 <div class = "form-group">            
      <div class="col-xs-4">
      <h3>Select Software type:</h3>
      <select name="option">
			  <option value="" selected="selected">Select an option...</option>
			  <optgroup label="Software">
			    <option value="1">operating system</option>
				<option value="2">antivirus</option>
				<option value="3">system software</option>
        <option value="4">other softwares</option>
			</select><br /><br /><br />
      <label for ="swmame">Software Name:</label>
      <input type="text" class="form-control" id="swname" name="swname">
    </div>
</div>


    <div class = "form-group">
    	<div class="col-xs-4">
    	<label for ="serial">Serial number:</label>
    	<input type="text" class="form-control" id="serial" name="serial">
    </div>
</div>


    <div class="row">
        <div class='col-sm-6'>
           <label for = "dop">Date of Purchase:</label>
           <div class="form-group">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="dop">
  </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker5').datetimepicker({
                    defaultDate: "11/1/2013",
                    disabledDates: [
                        moment("12/25/2013"),
                        new Date(2013, 11 - 1, 21),
                        "11/22/2013 00:53"
                    ]
                });
            });
        </script>
    </div>

    <div class="form-row">
        <label for="price">Price:</label>
    <div class="input-group"> 
        <span class="input-group-addon">₹</span>
        <input type="number" value="" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control currency" id="price" name="price"/>
    </div>
    <script>
      webshims.setOptions('forms-ext', {
    replaceUI: 'auto',
    types: 'number'
});
webshims.polyfill('forms forms-ext');
</script>
</div>

<br>
 <div class="row">
        <div class='col-sm-6'>
           <label for = "exp">Expiry date:</label>
            <div class="form-group">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="doe">
            </div>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker5').datetimepicker({
                    defaultDate: "11/1/2013",
                    disabledDates: [
                        moment("12/25/2013"),
                        new Date(2013, 11 - 1, 21),
                        "11/22/2013 00:53"
                    ]
                });
            });
        </script>
    </div>
    
    <br><br>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
 </form>

 <?php  
				if($_SERVER['REQUEST_METHOD'] == 'POST')
				{

if(isset($_POST['submit'])){ 
  $c_id=2;
  if(!empty($_POST['swname']) && !empty($_POST['serial']) && !empty($_POST['dop']) && !empty($_POST['price']) && !empty($_POST['doe'])  && !empty($_POST['option']))  {  
          $swname=$_POST['swname']; 
        $serial=$_POST['serial']; 
        $dop=$_POST['dop'];
        $price=$_POST['price'];
        $doe=$_POST['doe'];  
        $option=$_POST['option'];

      //extract($_POST);
    /*$Name = str_replace("'","`",$name); 	
    $email_id = str_replace("'","`",$email); 	        
    $user_id = str_replace("'","`",$user); 
    $password = str_replace("'","`",$pass); 
    $password = md5($password);*/
  
    $sql = $pdo->prepare("insert into software(sw_name,serial_no,dop,price,exp_date,c_id,master) values(:swname,:serial,:dop,:price,:doe,:c_id,:option)");
    $sql->bindParam(':swname',$swname);
    $sql->bindParam(':serial',$serial);
    $sql->bindParam(':dop',$dop);
    $sql->bindParam(':price',$price);
    $sql->bindParam(':doe',$doe);
    $sql->bindParam(':c_id',$c_id);
    $sql->bindParam(':option',$option);
    $sql->execute();
  
     echo '<script language="javascript">';
     echo 'alert("Successfully Registered")';
     echo '</script>';
     echo '<meta http-equiv="refresh" content="0;url= Software.php" />';
  
  }

      }
  }

?>
	</body>
</html>
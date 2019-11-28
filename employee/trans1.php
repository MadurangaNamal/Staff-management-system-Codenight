<?php session_start();
if(!$_SESSION['id']){header('Location: ../login.php');}
    $logged=($_SESSION['id']);

?>
<?php
//including the database connection file
include_once("../oopbackend.php");

$crud = new Crud();
$stat1 ="Approved";

//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM leave_trans 
		JOIN users on emp_id=id
		WHERE  status!='$stat1'  and id='{$_SESSION['id']}' ORDER BY leave_start DESC";
$result = $crud->getData($query);


//echo '<pre>'; print_r($result); exit;
?>

<html>
<title>Employee Pending transactions View</title>
	<meta charset="UTF-8">
 

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>

	<?php include '../inc/styles.php'?>
<head>	
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dashoboard1.php">Staff Management system</a>
    </div>
    	 
      <a  href="dashoboard1.php">Home</a>
      <a  class='active' href="trans1.php">View Pending Leave Requests</a>
      <a href="viewapprove1.php">View Approved Leave Requests</a>
      <a href="../logout.php">Logout</a>
  </div>
</nav>
</head>
<body>
<div class="container">
<div class="table100 ver3 m-b-110">
					<div class="table100-head">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Leave Type</th>
									<th class="cell100 column2">No. of Days</th>
									<th class="cell100 column3">Start Date</th>
									<th class="cell100 column4">Status</th>
									<th class="cell100 column5">Manage</th>
									
								</tr>
							</thead>
						</table>
					</div>


	<?php 
	
	foreach ($result as $key => $res) {
	//while($res = mysqli_fetch_array($result)) { 		
		
		 $leave=$res['leave_id'];
		echo "<div class=table100-body js-pscroll>";
		echo			"<table>";
		echo			"<tbody>";		
		echo "<tr class='row100 body'>";
		echo "<td class='cell100 column1'>".$res['leave_type']."</td>";
		echo "<td class='cell100 column2'>".$res['leave_days']."</td>";
		echo "<td class='cell100 column3'>".$res['leave_start']."</td>";	
		echo "<td class='cell100 column4'>".$res['status']."</td>";
		echo "<td class='cell100 column5'><a href= foreverdeletetrans.php?id=$leave \" onClick=\"return confirm('Are you sure you want to delete?')\"><button class='btn btn-danger'>Cancel or Delete</button></a></td>";		
	}
	?>
	</table>
	
</body>
</html>
<?php include '../footer.php'?>
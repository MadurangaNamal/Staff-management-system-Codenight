<?php session_start();
if(!$_SESSION['id']){header('Location: ../login.php');}
    $logged=($_SESSION['id']);

?>
<?php
//including the database connection file

include_once("../oopbackend.php");

$crud = new Crud();

//fetching data in descending order (lastest entry first)
$query = "SELECT users.name,leave_id,leave_type,leave_days,leave_start,status FROM leave_trans 
			JOIN users on emp_id=id
		    where status like 'approved' and id='{$_SESSION['id']}' ORDER BY leave_id DESC";
 $result = $crud->getData($query);



?>
<!DOCTYPE html>
<html>
<title>Employee approvedtransactions View</title>
<meta charset="UTF-8">
 

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include '../inc/styles.php'?>
 
<head>	
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dashoboard1.php">Staff Management system</a>
    </div>
    	 
      <a  href="dashoboard1.php">Home</a>
      <a href="trans1.php">View Pending Leave Requests</a>
      <a class='active' href="viewapprove1.php">View Approved Leave Requests</a>
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
									<th class="cell100 column1">Employee</th>						   <th class="cell100 column2">Leave Type</th>
									<th class="cell100 column3">Number of Days</th>
									<th class="cell100 column4">Start Date</th>
									<th class="cell100 column5">Status</th>
								</tr>
							</thead>
						</table>
					</div>


	
	<?php 

    foreach ($result as $key => $res) {
	//while($res = mysqli_fetch_array($result)) { 
		echo "<div class=table100-body js-pscroll>";
		echo			"<table>";
		echo			"<tbody>";		
		echo "<tr class='row100 body'>";
		echo "<td class='cell100 column1' >".$res['name']."</td>";
		echo "<td class='cell100 column2'>".$res['leave_type']."</td>";
		echo "<td class='cell100 column3'>".$res['leave_days']."</td>";
		echo "<td class='cell100 column4'>".$res['leave_start']."</td>";	
		echo "<td class='cell100 column5'>Approved</td>";
		
	}

	
	?>
	</tr>
							</tbody>
						</table>
					</div>
				</div>
				</div>

</body>


	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>

	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});


	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>


	<script src="js/main.js"></script>




</html>
<?php include '../footer.php'?>
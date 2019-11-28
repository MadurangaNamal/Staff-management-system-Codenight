<?php session_start();
if(!$_SESSION['id']){header('Location:../login.php');}
    $logged=($_SESSION['id']);

?>
<?php include_once("../oopbackend.php");

$crud = new Crud();

//getting id from url
$id = $crud->escape_string($_GET['id']);

//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM users WHERE id=$id");
 ?>
<html>
<meta charset="UTF-8">
 

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php include '../inc/styles.php'?>
<head>
	<title>File Leave</title>
	<script type="text/javascript">
		function validate() {
			if (document.form1.type.value == '') {
				alert('Please provide your leave type');
				document.form1.name.focus();				
				return false;
			}
			if (document.form1.days.value == '') {
				alert('Please provide number of days');
				document.form1.email.focus();
				return false;
			}
			if (document.form1.start.value == '') {
				alert('Please provide date start');
				document.form1.email.focus();
				return false;
			}
			return true;
		}
	</script>	
</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="dashoboard1.php">Staff Management system</a>
    </div>
    	 
      <a  href="dashoboard1.php">Home</a>
      <a  href="trans1.php">View Transactions</a>
  </div>
</nav>
<body>
	<br/><br/>
	<div id="msg"></div>
	<!--<form action="add.php" method="post" name="form1" onsubmit = "return(validate());">-->
	<form action="addtransaction.php" method="post" name="form1" >
	<h3>Filing Leave of Employee: <?php echo $id;?></h3>
		<table width="25%" border="0">
		<div class="form-group">
				<label for="id">Applicant ID:</label>
				<input type="text" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
			</div>
			<div class="form-group">
				<label for="type">Leave type:</label>
				<SELECT name="type">
					<option >Sick Leave</option>
					<option >Vacation Leave</option>
				</SELECT>
			</div>
			<div class="form-group"> 
				<label for="days">Number of Days:</label>
				<input type="text" class="form-control" id="days" name="days">
			</div>
			<div class="form-group"> 
				<label for="date">Starting Day:</label>
				<input type="date" class="form-control" id="date" name="date">
			</div>
			
				<input class='btn btn-success' type="submit" name="Submit" value="Add"></td>
			
		</table>
	</form>
</body>
</html>


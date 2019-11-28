
<?php require('SessionController.php');?>
<?php 

if(isset($_POST['btnLoginSubmit'])){
	attemptLogin();
}
function attemptLogin(){
	$id=$_POST['id'];
	$password=$_POST['password'];
	$conn = mysqli_connect("localhost", "root", "", "staff_management_db");
	$sql = "SELECT * FROM users WHERE id='$id' AND password='$password' LIMIT 1";
	$result= mysqli_query($conn,$sql);

	if (mysqli_num_rows($result) > 0) {
    
		while($row = mysqli_fetch_assoc($result)) {
			$admin="admin";
		setSesh($row['id'],$row
			['password'],$row['position']);
		if($row['position']==$admin){
			header('Location: admin/dashboard.php');
		}else
		header('Location: employee/dashoboard1.php');
		}
	} else {
		header('Location:login.php');
	}
	mysqli_close($conn);
}
?>

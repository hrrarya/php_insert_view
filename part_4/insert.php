<?php 
	include("config.php");
	$err = "";
	$suc = '';


 ?>
 <?php 

 	if(isset($_POST['form_insert'])){
 		try{
 			if(empty($_POST['uname'])){
 				throw new Exception("Name Can't be empty");
 			}
 			if(empty($_POST['uage'])){
 				throw new Exception("Age Can't be empty");
 			}
 			if(empty($_POST['umail'])){
 				throw new Exception("Email Can't be empty");
 			}

 			if (!filter_var($_POST['umail'], FILTER_VALIDATE_EMAIL)) {
 				throw new Exception("Please enter a valid email address.");
 			}
 			if (!is_numeric($_POST['uage'])) {
 				throw new Exception("Age Must be a number.");
 			}



 			$stmt = $db->prepare("insert into tbl_user(stu_name, stu_age, stu_mail) values(?,?,?)");
 			$stmt ->execute(array($_POST['uname'], $_POST['uage'], $_POST['umail']));

 		/*	
 			$res =$stmt->rowCount();

 			if($res>0){
 				throw new Exception("Data already exists.");
 			}
*/
 			$suc = 'Data inserted succesfully.';
 		}
 		catch(Exception $e){
 			$err = $e-> getMessage();
 		}
 	}


  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
</head>
<body>
<div class="wrapper">
	<div class="header">
		<h3>Insert Data</h3>
		<form action="" method="post">
			<table>
				<tr>
					<td>Name:</td>
					<td><input type="text" name="uname"></td>
				</tr>
				<tr>
					<td>Age:</td>
					<td><input type="text" name="uage"></td>
				</tr>
				<tr>
					<td>Mail:</td>
					<td><input type="text" name="umail"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="form_insert"></td>
				</tr>
			</table>
			<table>
				<tr>
					<td><?php if($err){echo $err; }
								if($suc){echo $suc; }
					 ?></td>
				</tr>
			</table>
		</form>
	</div>
</div>
</body>
</html>
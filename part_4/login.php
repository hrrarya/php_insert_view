<?php 

	include("config.php");
	$err = "";
 ?>
<?php 

	if(isset($_POST['form1'])){
		try{
			if (empty($_POST['username'])) {
				throw new Exception("Username Can't be Empty");
			}
			if (empty($_POST['password'])) {
				throw new Exception("Password Can't be Empty");
			}

			$password =$_POST['password'];
			$password = md5($password);

			$stmt = $db->prepare("select * from tbl_login where user_name=? and user_pass=?");
			$stmt->execute(array($_POST['username'], $password));

			$res = $stmt->rowCount();

			if($res>0){
				session_start();
				$_SESSION['name']="admin";
				header("location: index.php");
			}else{
				throw new Exception("Invalid username and password.");
			}


		}
		catch(Exception $e){
			$err = $e->getMessage();
		}
	}



 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
<div class="wrapper">
	<div class="header">
		
		<h2>Login your acount</h2>
		<form action="" method="post">
			<table>
				<tr>
					<td>Username</td>
					<td><input type="text" name="username"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="form1" value="Login"></td>
				</tr>
			</table>
		</form>
		<table>
			<th>
				<td><?php if($err){echo $err;} ?></td>
			</th>
		</table>
	</div>
</div>
</body>
</html>
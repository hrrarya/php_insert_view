	<?php 
	include("config.php");
	$err ="";
	$suc ="";
	 ?>
	 
<!DOCTYPE html>
<html>
<head>
	<title>View Page</title>
</head>
<body>
	<div class="wrapper">
		<div class="header">
				<h3>View Data</h3>
				<table border="1">
					
					<th>
						<td>Serial No.</td>
						<td>Student Name</td>
						<td>Student Age</td>
						<td>Student Email</td>
						<td>Action</td>
					</th>
					<?php 

						$stmt =$db->prepare("select * from tbl_user");
						$stmt ->execute();
						$i =0;
						$res =$stmt->fetchAll(PDO::FETCH_ASSOC);
						foreach($res as $row){
							$i++;
						?>
					<tr>
					<td></td>
						<td><?php echo $i;?></td>
						<td><?php echo $row['stu_name']; ?></td>
						<td><?php echo $row['stu_age']; ?></td>
						<td><?php echo $row['stu_mail']; ?></td>
						<td><a href="edit.php?id=<?php echo $row['stu_id']; ?>">Edit</a>|<a href="delete.php?id=<?php echo $row['stu_id']?>">delete</a></td>
					</tr>
					<?php

					}

					 ?>
				</table>



		</div>
	</div>

</body>
</html>
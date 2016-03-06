<!DOCTYPE html>
<?php
	
	include('identificador.php');
	

	
	$a= new Identi();
	$b=$a->isRpi();
	if($b==true) {
		$conexion=mysqli_connect("localhost","root","raspberry","php") or die("Conexion no establecida");
		echo "Utilizando base de datos RPI";
	}
	else {
		$conexion=mysqli_connect("localhost","root","","php") or die("Conexion no establecida");
		echo "Utilizando base de datos xamp";
	}
		
	
?>
<html>
	<head>
		<title>PHP FORM MYSQL</title>
	</head>
	<body>
	
		<form method="post" action="index.php">
			<input type="text" name="name" placeholder="Write your name"/><br/>
			<input type="password" name="pass" placeholder="Write your pass"/><br/>
			<input type="email" name="email" placeholder="Write your email"/><br/>
			<input type="submit" name="sub" value="Insert Data"/><br/>
			
		</form>
	
		<?php
			if(isset($_POST['sub'])){
				$name = $_POST['name'];
				$pass = $_POST['pass'];
				$email = $_POST['email'];
				
				$insert = "insert into tabla (Nombre,Cont,Email) values ('$name','$pass','$email')";
				$run = mysqli_query($conexion,$insert);
				
				if($run){
					echo"<h3>Registro Exitoso, Gracias $name</h3>";
				}
			}
		?>
		<table width="500" bgcolor="orange" border="2">
			<tr>
				<th>S.N</th>
				<th>Name</th>
				<th>Password</th>
				<th>Email</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			
			<?php
				$select = "select * from tabla";
				$run = mysqli_query($conexion,$select);
				
				while($row = mysqli_fetch_array($run)){
					$id = $row['id'];
					$nombre = $row['Nombre'];
					$cont = $row['Cont'];
					$email = $row['Email'];
				
			?>
			
			<tr align="center">
				<td><?php echo $id;?></td>
				<th><?php echo $nombre;?></th>
				<th><?php echo $cont;?></th>
				<th><?php echo $email;?></th>
				<th><a href="index.php?edit=<?php echo $id;?>">Edit</a></th>
				<th><a href="index.php?delete=<?php echo $id;?>">Delete</a></th>
				
			</tr>
			<?php } ?>
		</table>
		
		<?php
			if(isset($_GET['edit'])){
				include('edit.php');
			}
		?>
		
		<?php 
		if(isset($_GET['delete'])){
			$delete_id = $_GET['delete'];
			echo $delete_id;
			$delete = "delete from tabla where id='$delete_id'";
			$run_delete = mysqli_query($conexion,$delete);
			if($run_delete){
				echo "<script>alert('Se borró un usuario')</script>";
				echo "<script>window.open('index.php','_self')</script>";
				
			}
		}
		?>
	</body>
</html>
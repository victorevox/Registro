<?php
	if(isset($_GET['edit'])){
		$edit_id = $_GET['edit'];
		/*echo $edit_id;*/
		$edit_q = "select * from tabla where id = '$edit_id'";
		$run_edit = mysqli_query($conexion,$edit_q);
		
		$row=mysqli_fetch_array($run_edit);
		
		$name = $row['Nombre'];
		$pass = $row['Cont'];
		$email = $row['Email'];
		
	}
?>

<form method="post" action="">
	<input type="text" name="name" placeholder="Write your name" value="<?php echo $name;?>"/><br/>
	<input type="password" name="pass" placeholder="Write your pass" value="<?php echo $pass;?>"/><br/>
	<input type="email" name="email" placeholder="Write your email" value="<?php echo $email;?>"/><br/>
	<input type="submit" name="act" value="Actualizar Datos"/><br/>
	
	<?php
		if(isset($_POST['act'])){
			$name = $_POST['name'];
			$pass = $_POST['pass'];
			$email = $_POST['email'];
			
			$sql_query = "update tabla set nombre='$name',cont='$pass',email='$email' where id='$edit_id';";
			$row = mysqli_query($conexion,$sql_query);
			echo $row;
			if($row){
				echo "<script>alert ('Datos actualizados')</script>";
				echo "<script>window.open('form.php','_self')</script>";
				
			}
			
		}
	?>
		
</form>


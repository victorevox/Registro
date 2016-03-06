<?php
class Identi {
	public function isRpi(){
		$salt="";
		$RPI=false;
		if (strtoupper(substr(PHP_OS,0,3)) == 'LIN') {
			$RPI=true;
			$resultado= shell_exec("blkid -o value -s UUID");
			echo "AQUI";
			echo "<br/>";
			/*echo $resultado;*/
			/*
			if(strpos($resultado,"dbc")!==false) {
				$resultado = $_SERVER['HTTP_HOST'];
				echo $resultado;
			}*/
		}
		/*echo md5($salt.md5($resultado));*/
		return $RPI;
	}
}
?>
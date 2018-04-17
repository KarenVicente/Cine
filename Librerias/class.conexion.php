<?php 
	class base {
		private $servidor="localhost";
		private $usuario="root";
		private $password="";
		private $db="Cine";

		public $conexion;
		public $resultado;

		public function conectar()
		{
			$this->conexion=mysqli_connect($this->servidor,$this->usuario,$this->password,$this->db);
			return $this->conexion;
			
		}

		public function ejecutar($consulta)
		{
			$this->resultado=mysqli_query($this->conexion,$consulta);
			return $this->resultado;
		}

		public function obtener_array()
		{
			$array= mysqli_fetch_array($this->resultado);
			return $array;
		}

		public function obtener_assoc()
		{
			$assoc = mysql_fetch_assoc($this->resultado);
			return $assoc;
		}
		public function confirmar()
		{
			$afectada = mysqli_affected_rows($this->conexion);
			return $afectada;
		}

	}






 ?>
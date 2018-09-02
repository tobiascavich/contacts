<?php

Class Database 
{
	var $db;
	var $classQuery = '';

	var $erronum = '';
	var $error = '';

	function database()
	{
		$host = 'localhost';
		$name = 'contacts';
		$user = 'root';
		$password = '';

		$this->db = mysqli_connect($host,$user,$password,$name);

		if ($this->db->connect_errno)
		{
			echo "Failed to connect to MySQL: " . $this->db->conect_error;	
		}
	  
	}

	function query($query)
	{
		$this->classQuery = mysqli_query($this->db,$query);

		return $this->classQuery;
	}

	function results($query)
	{
		$result = $this->query($query);

		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}

}

?>
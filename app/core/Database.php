<?php

Trait Database
{

	private function connect()
	{
		$string = "mysql:hostname=".DBHOST.";dbname=".DBNAME;
		
		$con = new PDO($string,DBUSER,DBPASS);
		return $con;
	}

	// public function query($query, $data = [])
	// {

	// 	$con = $this->connect();
	// 	$stm = $con->prepare($query);
	// 	//var_dump($query, $data); // Add this line for debugging

	// 	$check = $stm->execute($data);
	// 	if($check)
	// 	{
	// 		$result = $stm->fetchAll(PDO::FETCH_OBJ);
	// 		if(is_array($result) && count($result))
	// 		{
	// 			return $result;
	// 		}
	// 	}

	// 	return false;
	// }

	public function query($query, $data = [])
	{
		$con = $this->connect();
		$stm = $con->prepare($query);
		
		if($stm->execute($data))
		{
			// If the query is a SELECT, fetch and return results
			if (strpos(strtoupper($query), 'SELECT') === 0) {
				$result = $stm->fetchAll(PDO::FETCH_OBJ);
				return $result ? $result : false;
			}
			// For INSERT, UPDATE, DELETE, return true on success
			return true;
		}
		
		return false;
	}


	public function get_row($query, $data = [])
	{

		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute($data);
		
		if($check)
		{
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			// show($result);
        	// die();
			if(is_array($result) && count($result))
			{
				return $result[0];
			}
		}

		return false;
	}
	
}



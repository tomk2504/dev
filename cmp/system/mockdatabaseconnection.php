<?php
class MockDatabaseConnection
{
	private function __construct()
	{

	}

	public function query($query)
	{
		echo "SIMMULATION DB: ".substr($query, 0, 100)."...\n";
		return true;
	}

	public function connection($host, $user, $password, $db)
	{
		echo "SIMMULATION DB: conntected\n";
		return true;
	}
}
?>
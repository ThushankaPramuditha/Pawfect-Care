<?php 

if($_SERVER['SERVER_NAME'] == 'localhost')
{
	/** database config **/
	define('DBNAME', 'Pawfect_Care');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', 'pawfect123');
	define('DBDRIVER', 'mysql');
	
	define('ROOT', 'http://localhost/mvc/public');

}else
{
	/** database config **/
	define('DBNAME', 'Pawfect_Care');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', 'mysql');

	define('ROOT', 'https://www.yourwebsite.com');

}

define('APP_NAME', "Pawfect Care");
define('APP_DESC', "Serving love and care, the Pawfect way!");

/** true means show errors **/
define('DEBUG', true);

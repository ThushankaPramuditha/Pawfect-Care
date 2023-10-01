<?php 

if($_SERVER['SERVER_NAME'] == 'localhost')
{
	/** database config **/
	define('DBNAME', 'pawfect-care');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');
	
	
	define('ROOT', 'http://localhost/Pawfect-Care/public/');
  

}else
{
	/** database config **/
	define('DBNAME', 'pawfect-care');
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBDRIVER', '');

	define('ROOT', 'https://www.yourwebsite.com');
    
}

define('APP_NAME', "Pawfect Care");
define('APP_DESC', "Serving love and care, the Pawfect way!");

/** true means show errors **/
define('DEBUG', true);

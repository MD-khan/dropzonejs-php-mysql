<?php 

class Dbconnection {
    
	public function dbCon() {		
		
	   return new PDO("mysql:host=localhost; dbname=", "", "");
        
           
        }
}
?>

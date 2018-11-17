<?php

include_once 'DBConnection.php';

class FileUpload {
     
    public $id = null;
    private $file_name, $file_type, $file_size, $file_location;
    private $user_id;    
    private $db;
    
   
      
    //Construction
    public function __construct() {
        
        $this->db = new Dbconnection();
        
        $this->db = $this->db->dbCon();
    }
    
    
    public function setFileProperty( $data ) {
        
        $this->file_name     = $data['name'];
        $this->file_type     = $data['type'];
        $this->file_size     = $data['size'];
        $this->file_location =$data['file_loc'];
        $this->user_id       = $data['$user_id'];
       
    }
    
    
    public function save() {       
      
        $time = date('Y-m-d: G:H:i:s');
        
          
        $sql = "INSERT INTO user_file ( file_id, user_id, file_name, file_location, file_size, file_type, date )
                 VALUES( ?, ?, ?, ?, ?, ?, ? )";
        
        $statement = $this->db->prepare( $sql );
        
        $statement->bindParam(1,  $this->id );
        $statement->bindParam(2,  $this->user_id );
        $statement->bindParam(3,  $this->file_name);      
        $statement->bindParam(4,  $this->file_location);
        $statement->bindParam(5,  $this->file_size );
        $statement->bindParam(6,  $this->file_type );
        $statement->bindParam(7,  $time);
        
       $result = $statement->execute() ? true : false;
        return $result;
        
    }
    
    public function show_files( $user_id ) {
        
        $sql = "SELECT * FROM `user_file` WHERE `user_id` = $user_id ORDER BY  `file_id` DESC";
        
        $statement = $this->db->query( $sql) ; 
									     
      	$statement->setFetchMode(PDO::FETCH_ASSOC);		 
        
        $data = array(); 
         
        if ($statement->rowCount() > 0) {	 
            
            while( $row = $statement->fetch() ) { 
                
                     $data[] = $row;              
                                 
            }
            
        return $data;      
        
        }else {
            return FALSE;
	}
    }
}


/*
 *  Test
$obj = new FileUpload();
$data = [
         //file data
         'name'     => 'image',
         'type'     => 'image',
         'size'     => '200',
         'file_loc' => '/loa/',
         
         //user data
         '$user_id'  => '10',
         
     ];

$obj->setFileProperty($data);


var_dump($obj->save());
 * 
 */
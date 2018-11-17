<?php
            
include_once 'FileUpload.php';

$user_file = new FileUpload();

            
    try {
            
        // Undefined | Multiple Files | $_FILES Corruption Attack
        // If this request falls under any of them, treat it invalid.
        if ( !isset($_FILES['file']['error']) || is_array($_FILES['file']['error']) )  {
            
            throw new RuntimeException('Invalid parameters.');
        }

        // Check $_FILES['file']['error'] value.
        switch ($_FILES['file']['error']) {
            
            case UPLOAD_ERR_OK:
                break;
            
            case UPLOAD_ERR_NO_FILE:
                throw new RuntimeException('No file sent.');
                
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                throw new RuntimeException('Exceeded filesize limit.');
                
            default:
                throw new RuntimeException('Unknown errors.');
        }
        
            
        // Cheking file size. 
        if ($_FILES['file']['size'] > 1e+6 ) { // 1 MB
            
            throw new RuntimeException('Exceeded filesize limit.');
        }

            
        // Check MIME Type  
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        
        if ( false === $ext = array_search(
             $finfo->file($_FILES['file']['tmp_name']),
            array(            
                 // images
                'png' => 'image/png',
                'jpe' => 'image/jpeg',
                'jpeg' => 'image/jpeg',
                'jpg' => 'image/jpeg',
                'gif' => 'image/gif',
                'bmp' => 'image/bmp',
                

                  // ms office
                'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'doc' =>  'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'xls' =>  'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'txt' =>  'text/plain',

                // adobe
                'pdf' => 'application/pdf',
                'psd' => 'image/vnd.adobe.photoshop',
                'ai' => 'application/postscript',
                'eps' => 'application/postscript',
                'ps' => 'application/postscript',

                 // archives
                'zip' => 'application/zip',
                'rar' => 'application/x-rar-compressed',      
            ),
            true
        )) {
            throw new RuntimeException('Invalid file format.');
        }

        // Cheking user types and movinig files        
        if( intval($_POST['user_id']) !== '0' ) { 
            
            $user_directory_name = "Bob";
            
            if ( !file_exists("../demos/file-upload/user-files/$user_directory_name") ) {
                
               mkdir("../demos/file-upload/user-files/$user_directory_name", 0777, true);
            
            }
            
            //making uniq   name
            $file_destination = sprintf("../demos/file-upload/user-files/$user_directory_name/%s.%s",
                  sha1_file($_FILES['file']['tmp_name']),
                  $ext
            );
            
        }
        
            
            //Moving file
            if ( !move_uploaded_file(
            
                    $_FILES['file']['tmp_name'],$file_destination
            
             )) 
  
    {
        throw new RuntimeException('Failed to move uploaded file.');
    }
     
     // Send file information to database 
     $data = [
         //file data
         'name'     => $_FILES['file']['name'],
         'type'     => $_FILES['file']['type'],
         'size'     => $_FILES['file']['size'],
         'file_loc' => $file_destination,
         
         //user data
         '$user_id'  => $_POST['user_id'],
         
     ];
     
     
     if(  $user_file->show_files( $data['$user_id'] ) ) {
            
        $files = $user_file->show_files( $data['$user_id'] );
        
        foreach ( $files as $file_name ) {
            
            if( $file_name['file_name'] ===  $data['name'] ) {
                throw new RuntimeException('The file '. $data['name']. ' is already uploaded');
            }
        }
    }
        
        
         //save file information to database
          $file = new FileUpload();
          $file->setFileProperty($data);
          $is_save = $file->save();
          
          if( $is_save ) {
              
                echo 'File is uploaded  successfully.';
          }

    } catch (RuntimeException $e) {

        echo $e->getMessage();

    }

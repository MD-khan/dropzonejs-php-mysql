<?php 
include_once 'FileUpload.php';

$file = new FileUpload();
 
$all_files = $file->show_files( intval($_REQUEST['user_id']) );
  


if ( $all_files ) {  ?>
 

<div class="panel panel-primary">
                         
    <div class="panel-heading">
        File(s)
    </div>

    <div class="panel-body">
        <?php foreach ( $all_files as $file_data ) { ?>
        <span class="list-group">
            <a class="list-group-item" href="<?= $file_data['file_location'] ?>"> <i class="fa fa-file"></i> <?= $file_data['file_name'] ?> 
                
                <span class="pull-right"><i class="fa fa-calendar"></i> <?= date('F d, Y', strtotime($file_data['date']) ); ?> </span>
               
            </a>
           
        </span>
        <?php } ?>
    </div>
</div>
<?php } ?>
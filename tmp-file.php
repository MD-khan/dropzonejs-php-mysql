 <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title> File upload web application with DropzoneJs, PHP and MySQL </title>

    <!-- Bootstrap -->
    <link href="/tutorials/demos/file-upload/css/libs/bootstrap.min.css" rel="stylesheet">
    
    <!-- Awesome Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
   
    <!-- Dropzone -->
    <link rel="stylesheet" type="text/css" href="/tutorials/demos/file-upload/css/libs/dropzone.css">     
  </head>
    <body>      
        <div class="container">

            <div class="row">

                <div class="col-md-2">
                   <!-- Left Side -->
                </div>

                <div class="col-md-8">                
                    <h2> DropzoneJs with PHP and MySQL  </h2>
                    <form  id="file-up" class="dropzone">                        
                        <input type="hidden" name="user_id" value="<?=$data['user_id']?>">                        
                    </form>
                </div>

                <div class="col-md-2">
                    <!-- Right Side-->
                </div>

          </div>

        </div>
   
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <!-- Bootstrap -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
  
     <!-- DropzonJs -->
      <script src="/tutorials/demos/file-upload/js/dropzone.js"></script>
      <script src="/tutorials/demos/file-upload/js/dropzone-configuration.js"></script>
   
     </body>
</html>
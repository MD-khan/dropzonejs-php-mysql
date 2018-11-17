<?php 
$data = ['user_id' => 1 ];

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> File Upload using dropzoneJS with php and MySql </title>

    <!-- Bootstrap -->
    <link href="/tutorials/demos/file-upload/css/libs/bootstrap.min.css" rel="stylesheet">
    
    <!-- Awesome Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
   
    <!-- Dropzone -->
    <link rel="stylesheet" type="text/css" href="/tutorials/demos/file-upload/css/libs/dropzone.css">
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-56565519-1', 'auto');
        ga('send', 'pageview');

</script>
  </head>
  
 
  
  <body>
      
      <div class="container">
         
          <div class="row">
              
              <div class="col-md-4">
               <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- tec-front-page -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9247795339544649"
     data-ad-slot="4326584419"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
              </div>
              
              <div class="col-md-8">
                  
                  <h2> DropzoneJs with PHP and MySQL  </h2>
                  <p>
                      Try to upload images, text, doc, pdf and zip file. The file size limit here is 
                      1MB. Keep in mind all file will be deleted.
                    
                      
                  </p>
                  <section id="file">
                    <span id="up-ack"></span>                
                       
                        <form  id="file-up" class="dropzone">
                            <input type="hidden" name="frm-token" value="<?=generateRandomString($length = 10)?>">
                            <input type="hidden" name="user_id" value="<?=$data['user_id']?>">
                        </form>
                    
                     </section> <!-- ./file -->
                     <hr>
                     
                      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- tec-front-page -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9247795339544649"
     data-ad-slot="4326584419"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                     
                     <hr>
                     <span id="show-files"></span>
                     
                     <hr>
                      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- tec-front-page -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-9247795339544649"
     data-ad-slot="4326584419"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                    
              </div>
             
          </div>
      </div>
      

    
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
  
     <!-- DropzonJs -->
      <script src="/tutorials/demos/file-upload/js/dropzone.js"></script>
      <script src="/tutorials/demos/file-upload/js/dropzone-configuration.js"></script>
   
      <!-- show file -->
      <script>
      
     setInterval(function(){   
      $.ajax( {
                  type: "GET",                 
                   url: "show-files.php", 
                   data: { user_id:<?=$data['user_id']?>},                        
                   cache: false,
                   
                    success: function(data) {   
                    
                        $('#show-files').html(data);                      
                      
                   },// success
                  
           })// ajax
      
       }, 1000);
      
      </script>
  
  
  </body>
</html>
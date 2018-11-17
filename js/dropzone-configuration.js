$(document).ready(function () {
     
     //prevent error: "Error: Dropzone already attached." 
      Dropzone.autoDiscover = false;
      
      $("#file-up").dropzone({
          
        url: "/tutorials/demos/file-upload/action-file-upload.php",
        addRemoveLinks: true,
        maxFilesize: 1, // MB
        acceptedFiles: ".jpeg, .jpg, .jpe, .bmp, .png, .gif, .ico, .tiff, .tif, .svg, .svgz, \n\
                         .doc,.docx,.txt, .pdf,.rtf,.xlsx,.xls,.csv, .ppt,\n\
                        .zip,.zipx,.tar,.gz,.z,.rar",
        
        success: function (file, response) {
            var imgName = response;
            file.previewElement.classList.add("dz-success");
            $('#up-ack').html(response);
        },
        
        
        
        error: function (file, response) {
            file.previewElement.classList.add("dz-error");
             $('#up-ack').css('color','red').html(response);
        }
    });
    
   
     
}); 


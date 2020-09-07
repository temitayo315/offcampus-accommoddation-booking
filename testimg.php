<?php
require 'assets/includes/core.inc.php';
require 'assets/includes/connect.php';

function GetImageExtension($imagetype) {
    if(empty($imagetype)) return false;
    switch($imagetype)
    {
        case 'image/bmp': return '.bmp';
        case 'image/gif': return '.gif';
        case 'image/jpeg': return '.jpg';
        case 'image/png': return '.png';
        case 'video/mp4': return '.mp4';
        # code...
        break;
        default: return false;
    }
}

if (isset($_POST['upload_images'])) {
        if (!empty($_FILES["images"]["name"])){
            for ($i=0; $i < count($file_name=$_FILES["images"]["name"]); $i++) { 


                $temp_name=$_FILES["images"]["tmp_name"][$i];
                $file_name=$_FILES["images"]["name"][$i];
                $imgtype=$_FILES["images"]["type"][$i];
                $ext= GetImageExtension($imgtype);
                $imagename= $file_name.$ext;
                $target_path = "assets/images/uploads/".$imagename;

                    if(move_uploaded_file($temp_name, $target_path)) {
                       ?>
                    <script>
                                window.alert('Multiple Images Uploaded Successfully');
                                window.history.back();
                                    </script>
                                <?php 
                                header('LOCATION:index.php');
                        


                }else{
                     ?>
                    <script>
                                window.alert('Opps! Something Went Wrong in Moving Multiple Images');
                                window.history.back();
                                    </script>
                                <?php 
                                 header('LOCATION:index.php');
                }



            }
        }
    }

  ?>
  <!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7 no-js" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8 no-js" lang="en-US">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en" class="no-js">
<head></head>
<body>    
<div class="col-md-7">

    <form action="<?php echo $currentfile ?>" method="post" enctype="multipart/form-data">
                                   
                                            <input type="file" name="images[]" multiple>
                                            <button type="submit" name ="upload_images">submit</button>

          </form>                                  
                                            
</body>
</html>

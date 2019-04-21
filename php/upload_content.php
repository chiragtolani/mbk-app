<?php
    
         use MicrosoftAzure\Storage\Common\ServicesBuilder;
       use MicrosoftAzure\Storage\Common\ServiceException;
       
 session_start();
      if(!isset($_SESSION['Login']))
    {
        header('Location: ../index.php');
    } 
    else
    {      
       require_once '../vendor/autoload.php';
       
      
       
          
              $userFilename=$_POST['userfile'];
              $date=$_POST['ad_date'];
              $s_time=$_POST['start_time_ad'];
              $dur=intval($_POST['duration']);
         
        $filepath= $_FILES["userfile"]["tmp_name"];
        
        $connectionString='DefaultEndpointsProtocol=https;AccountName=aduploads;AccountKey=JEIasw/ANH4YTCd59n9SiDw5M8KcB7Y7Iom2P+6HF5s5Wu6yixXGPQoqGb62M9+jv1mfzXc8sPohGY7CjNsjAA==;';
          
        $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
        $upload_dir = '../media/';
        $upload_path = (string) ($upload_dir . basename($_FILES["userfile"]["name"]));
        move_uploaded_file($filepath, $upload_path);

         $container= "emibook17";                 
         
         $content = fopen($upload_path,'r+');
         $blob_name = basename($_FILES["userfile"]["name"]);                      
          
          try    {
                       //Upload blob
                       
                      $blobRestProxy->createBlockBlob($container, $blob_name, $content);
                     
                  }
          catch(Exception $e)
               {
                   $code = $e->getCode();
                   $error_message = $e->getMessage();
                   echo $code.": ".$error_message."<br />";
                }
            fclose($content);    
     header("Location:../home.php");
    }           
 ?>

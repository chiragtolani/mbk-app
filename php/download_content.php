<?php
    
            use WindowsAzure\Common\ServicesBuilder;
            use MicrosoftAzure\Storage\Common\ServiceException;
      
session_start();      
    if(!isset($_SESSION['Login']))
    {
        header('Location: ../index.php');
    } 
    else
    {
            require_once '../vendor/autoload.php';
            
        
                $connectionString='DefaultEndpointsProtocol=https;AccountName=aduploads;AccountKey=JEIasw/ANH4YTCd59n9SiDw5M8KcB7Y7Iom2P+6HF5s5Wu6yixXGPQoqGb62M9+jv1mfzXc8sPohGY7CjNsjAA==;';
            $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
            
            
            try    {
             
                $blob = $blobRestProxy->getBlob("screen-1", "call_of_duty_black_ops_13-wallpaper-1920x1080.jpg");
               
                header('Content-type: image/jpeg');
                header("Content-Disposition: attachment; filename=\"call_of_duty_black_ops_13-wallpaper-1920x1080.jpg\"");
                fpassthru($blob->getContentStream());
            }
            catch(ServiceException $e){
              
                $code = $e->getCode();
                $error_message = $e->getMessage();
                echo $code.": ".$error_message."<br />";
            }
            
            header('Location: ../home.php');
    }
?>
<?php
// error_reporting(0);

if(isset($_FILES['file'])){
    $errors= array();
    $file_name = $_FILES['file']['name'];
    $file_name = (isset($filename)) ? $filename : "default.unknown";
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    
    $destination_path = getcwd().DIRECTORY_SEPARATOR;
    $target_path = $destination_path . "./uploads/" . basename( $_FILES["file"]["name"]); 

    // $extensions= array("pdf");

    // $file_ext=strtolower(end(explode('.',$file_name)));
    
    // if(in_array($file_ext,$extensions)=== false){
    //     $errors[]="extension not allowed, please choose a PDF file.";
    // }

    if($file_size > 2097152) {
        $errors[]='File size must be less than 2 MB';
    }

    if(empty($errors)==true) {
        move_uploaded_file($file_tmp,$target_path); 
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Success")'; 
        echo '</script>';  
        header("Location: http://localhost/temp/index.php?=1");
    }else{
        echo '<script type ="text/JavaScript">';  
        echo 'alert("'+print_r($errors[0]);+'")';  
        echo '</script>';
        header("Location: http://localhost/temp/index.php?=2");
    }
}
?>

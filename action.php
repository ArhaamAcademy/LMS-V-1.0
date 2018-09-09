<?php  
if(isset($_REQUEST['id'])){
    $_SESSION['id'] = $_REQUEST['id'];
    
    header('location: project.php');
}

?>
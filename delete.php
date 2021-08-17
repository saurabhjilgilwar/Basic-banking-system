<?php 
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    if(!$_GET['id']){
        include 'includes/errormessage.php';
        header("Location: users.php");
    }else{
        //Get ID values
        $id = $_GET['id'];

        //Call delete function
        $result = $crud->deleteUsers($id);
        //redirect list
        if($result){
            header("Location: users.php");
        }
        else{
            include 'includes/errormessage.php';
        }
    }

    

?>
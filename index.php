<?php 
 include "api_peliculas.php";

 $api=new Api_peliculas();

 if(isset($_GET['id'])){
    $id=$_GET['id'];
    if(is_numeric($id)){
        $api->getById($id);
    }else{
        $api->error("El id es incorrecto");
    }
 }else if(isset($_GET['delete'])){
    $delete_id=$_GET['delete'];
    if(is_numeric($delete_id)){
        $api->deletePeli($delete_id);
    }else{
        $api->error("El id del delete es incorrecto");
    }
 }else{
    $api->getAll();
 }

?>
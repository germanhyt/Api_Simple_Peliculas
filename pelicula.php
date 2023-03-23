<?php
//2. CREAMOS LA CLASE PELICULA DONDE REALIZAMOS DEFINIMOS LOS QUERYS

 //Incluimos el doc de DB
 include "db_peliculas.php";

 class Pelicula extends DB{

    //Obtenemos todas las peliculas 
    function obtenerPeliculas(){
        $query=$this->connect()->prepare("SELECT * FROM peliculas");
        $query->execute();
        return $query;
    }

    //Obtenemos las peliculas por id
    function obtenerPelicula($id){
        $query=$this->connect()->prepare("SELECT * FROM peliculas WHERE id= :id");
        $query->execute(['id'=>$id]);
        return $query;
    }

    //Insertamos una nueva pelicula
    function nuevaPelicula($pelicula){
        $query=$this->connect()->prepare("INSERT INTO peliculas(nombre,imagen)  VALUES( :nombre, :imagen)" );
        $query->execute(['nombre'=>$pelicula['nombre'], 'imagen'=>$pelicula['imagen']]);
        return $query;
    }

    //Eliminamos una peli
    function eliminarPelicula($id){
        $query=$this->connect()->prepare("DELETE FROM peliculas WHERE id= :id");
        $query->execute(["id"=>$id]);
        return $query;
    }
    
 }
?>
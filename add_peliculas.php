<?php 
//4. AGREGAMOS UNA NUEVA PELICULA TRAS SER ENVIADO MEDIANTE UN FORMULARIO

 include "api_peliculas.php";

 $api=new Api_peliculas();
 $nombre="";
 $error="";

 //Verificamos el métodos de evío y si se envío el recursos imagen
 if(isset($_POST['nombre'])&&isset($_FILES["imagen"])){
    //Verfiicamos que se ahaya subido una imagen
    if($api->subirImagen($_FILES['imagen'])){
            //guardamos los datos enviados en un array
            $item=array(
                "nombre"=>$_POST["nombre"],
                "imagen"=>$api->getImagen()
            );
            //Agregamos a la api el array "item"
            $api->add($item);
        }else{
            //Manejo del error
            $api->error("Error con el archivo".$api->getError());
        }
    }else{
        //manjeo del error
        $api->error("Error al llamar a ala API");
    }    
?>
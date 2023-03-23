<?php
//3.CREAMOS LA API PELICULAS DONDE SE DEFINIRÁ

 //Incluimos el doc pelicula.php
 include "pelicula.php";

header("Access-Control-Allow-Origin: *"); //Permite dar acceso a cualquier host que realice peticiones
 
 class Api_peliculas{

    private $error;
    private $imagen;
    
    //Función para mostrar los datos en tipos JSON
    function getAll(){
        //Creamos un objeto tipo pelicula
        $pelicula=new Pelicula();
        //Definimos "Peliculas" como arreglo
        $peliculas=array();
        //El campo items del la variable "Peliculas" los definimos como array
        $peliculas['items']=array();

        //Obtenemos todas las pelis de la DB
        $res=$pelicula->obtenerPeliculas();
        // var_dump($res);

        if($res->rowCount()){
            //Solicitamos los datos a la DB con fetch
            while($row=$res->fetch(PDO::FETCH_ASSOC)){
                $item=array(
                    "id"=> $row['id'],
                    "nombre"=> $row['nombre'],
                    "imagen"=> $row['imagen']
                );
                //Insertamos cada item se coloca en el array $peliculas['items']
                array_push($peliculas["items"],$item);
            }
            //Imprimimos en formato JSON
            $this->printJSON($peliculas);
        }else{
            $this->error("No hay elementos");  
        }        
    }

    function printJSON($array){
        echo json_encode($array);
    }
    function error($mensaje){
        echo json_encode(array('mensaje' => $mensaje)); 
    }

    //Función para obtener una pelicula de a cuerdo al id pasando por paráemetro
    function getById($id){
        $pelicula=new Pelicula();
        $peliculas=array();
        $peliculas["items"]=array();
        
        $res=$pelicula->obtenerPelicula($id);

        if($res->rowCount()==1){
             //Obtenemos el registro identificado por su id
            $row=$res->fetch(); 

            $item=array(
                "id"=>$row['id'],
                "nombre"=>$row['nombre'],
                "imagen"=>$row['imagen']
            );
            //Insertamos el item al array de items
            array_push($peliculas["items"],$item);
            //Imprimimos el array de items en formato JSON
            $this->printJSON($peliculas);
        }else{
            $this->error("No hay elementos");
        }
    }

    //Función para agregar una nueva película
    function add($item){
        //Creamos un objeto pelicula
        $pelicula=new Pelicula();
        //Agregamos una nueva pelicula
        $pelicula->nuevaPelicula($item);
        //Mostramos un mensaje en caso de exito
        $this->exito("Nueva pelicula registrada");
    }
    
    function exito($mensaje){
        echo json_encode(array("mensaje"=>$mensaje));
    }    


    function deletePeli($id){
        $pelicula=new Pelicula();
        $res=$pelicula->obtenerPelicula($id);

        if($res->rowCount()==1){
            $pelicula->eliminarPelicula($id);
            $this->exito("Eliminado correctamente");
        }else{
            $this->error("No existe la pelicula");
        }

    }


    //Función para subir una imagen
    function subirImagen($file){
        $directorio="assets/imagenes/"; 
        
        //Asiganmos una nombre base a la variable imagen
        $this->imagen = basename($file["name"]);
        //Asignamos un nombre base "archivo"
        $archivo=$directorio.basename($file["name"]);
        //Obteneemos el tipo de "archivo" o imagen que se está subiendo
        $tipoArchivo=strtolower(pathInfo($archivo,PATHINFO_EXTENSION));
        
        //validamos que es imagen
        $verificarImagen=getimagesize($file["tmp_name"]);

        if($verificarImagen!=false){
            //Validando tamaño del archivo
            $size=$file['size'];

            if($size> 500000){
                $this->error="El archivo tiene que ser menor a 500kb";
                return false;
            }else{
                //Validar tipo de imagen
                if($tipoArchivo=="jpg"||$tipoArchivo=="jpeg"||$tipoArchivo=="png"){
                     //Movemos el "archivo" al directorio    
                    if(move_uploaded_file($file['tmp_name'],$archivo)){
                        return true;
                    }else{
                        $this->error("No se pudo subir la imagen");
                        return false;
                    }
                }else{
                    $this->error="Solo se admiten archivos jpg/jpeg/png";
                    return false;
                }
            }
        }else{
            $this->error="El documento no es una imagen";
            return false;
        }        
    }

    function getImagen(){
        return $this->imagen;
    }

    function getError(){
        return $this->error;
    }

 }

?>


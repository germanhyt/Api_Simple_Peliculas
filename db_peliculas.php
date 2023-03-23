<?php
//1RO: CREAMOS LA CLASE DB Y NOS CONECTAMOS A LA BASE DB

 class DB{
     //Atributos 
    private $host;
    private $db;
    private $user;
    private $password;
    private $charset;


    //000webhost
    //db: id19325207_netflix
    //user: id19325207_user_nextflix
    //pass: sKl<WX6i-VM*3kae

    //Comnstructor
    public function __construct(){
        // $this->host ="localhost";
        // $this->db   ="netflix";
        // $this->user ="root";
        // $this->password ="";
        // $this->charset = "utf8mb4";
        $this->host ="localhost";
        $this->db   ="id19325207_netflix";
        $this->user ="id19325207_user_nextflix";
        $this->password ="sKl<WX6i-VM*3kae";
        $this->charset = "utf8mb4";
    }

    //Métodos
    function connect(){
       try{
            //Sentencia de conexión (host o servidor + db + set de caracteress )
            $connection="mysql:host=".$this->host."; dbname=".$this->db."; charset=".$this->charset;
            //Opciones PDO para el manejo de errores
            $options=[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES =>false,
            ];
            //Creamos el objeto PDO
            $pdo=new PDO($connection, $this->user, $this->password);
            //retornamos el objeto
            return $pdo;
       }catch(PDOException $e){
            print_r("Error connection; ".$e->getMessage());
       }
    }

 }

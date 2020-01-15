<?php 


class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    public function __construct(){

         // data source name
         $dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;
        //untuk optimasi internet ke database biar terjaga
        //dan untuk eror mode
        $option = [
             PDO::ATTR_PERSISTENT => true,
             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

         try{
             $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
         }catch(PDOException $e){
             die($e->getMessage());
         }

    }

    //untuk menjalankan queri untuk disiapin
    public function query($query){
        $this->stmt = $this->dbh->prepare($query); 
    }

    // where atau parameternya
    public function bind($param, $value, $type = null){
        if(is_null($type)){//supaya jalan
            switch (true) {//supaya jalan
                case is_int($value)://jika value int ubah typenya jadi int
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type  = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;    
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    //eksekusi
    public function execute(){
        $this->stmt->execute();
    }

    //untuk banyak
    // PDO::FETCH_ASSOC untuk menjadikan array asosiatif
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount(){
        //rowCount punya PDO
        return $this->stmt->rowCount();
    }
// end class
}
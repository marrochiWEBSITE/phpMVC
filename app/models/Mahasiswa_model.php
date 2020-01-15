<?php

// class Mahasiswa_model {
    // private $mhs = [
    //     [
    //         "nama" => "marrochi",
    //         "nim" => "171011400286",
    //         "email" => "marrochi@gmail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ],[
    //         "nama" => "septi",
    //         "nim" => "171011400266",
    //         "email" => "septi@gmail.com",
    //         "jurusan" => "Teknik Mesin"
    //     ],[
    //         "nama" => "hendri",
    //         "nim" => "171011400296",
    //         "email" => "hendri@gmail.com",
    //         "jurusan" => "Teknik Industri"
    //     ]
    // ];

    
    // private $dbh; //database handler
    // private $stmt;
    
    // public function __construct(){
    //      // data source name
    //      $dsn = 'mysql:host=localhost;dbname=phpmvc';

    //      try{
    //          $this->dbh = new PDO($dsn,'root','');
    //      }catch(PDOException $e){
    //          die($e->getMessage());
    //      }
    // }

    // public function  getALLMahasiswa(){
    //     $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
    //     $this->stmt->execute();
    //     return $this->stmt->fetchALL(PDO::FETCH_ASSOC);
    // }

    // end class
// }

class Mahasiswa_model{
    private $table = 'mahasiswa';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function  getALLMahasiswa(){
        $this->db->query('SELECT * FROM '.$this->table);
        return $this->db->resultSet();
        }

    public function getMahasiswaById($id)    
        {
            $this->db->query('SELECT * FROM '.$this->table.' WHERE id=:id');
            $this->db->bind('id', $id);
            return $this->db->single();
        }

    public function tambahDataMahasiswa($data){

        $query ="INSERT INTO mahasiswa VALUES ('', :nama, :nim, :email, :jurusan)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }    

    public function hapusDataMahasiswa($id){

            $query = "DELETE FROM mahasiswa WHERE id=:id";
            $this->db->query($query);
            $this->db->bind('id', $id);
            $this->db->execute();

            return $this->db->rowCount();
    }


    public function ubahDataMahasiswa($data){

        $query ="UPDATE mahasiswa SET 
        nama = :nama,
        nim = :nim,
        email = :email,
        jurusan = :jurusan
        WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }  

    public function cariDataMahasiswa(){
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword ";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();

    }
 //end class       
} 
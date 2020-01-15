<?php 

class App{
// untuk mengatur default'nya
protected $controller = 'Home';
protected $method = 'index';
protected $params = [];





// untuk tes app berhasil atau tidak
// public function __construct(){
//     echo 'ok';
// }

public function __construct(){
        $url = $this->parseURL();
        // var_dump($url);

        //--------------UNTUK CONTROLLER
        // pengecekan file atau folder yg sesuai yg kita ketikan
        /* kenapa kita ../ bukan ../../  karena kita sebenarnya berada di  folder public index.php */
        if( file_exists('../app/controllers/'.$url[0].'.php')){
            //memanggil controller yang baru
            $this->controller = $url[0];

            // untuk menghilangkan base url home untuk mengilangkan parameter home
            unset($url[0]);
            // var_dump($url);
        }

        // memanggil contrroler
        require_once '../app/controllers/'.$this->controller.'.php';
        $this->controller = new $this->controller;

        //methode
       if( isset($url[1])){
        if(method_exists($this->controller, $url[1])){
              $this->method = $url[1];
              unset($url[1]);      
        }
       }

        //params
        if(!empty($url)){
            $this->params = array_values($url);
        }    

        //jalankan controller & method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

public function parseURL(){
/*
jika ada url
nilai variabel url sama dengan get url
kembalikan nilai url

rtrim = untu menghilangkan yang dinginkan itu slash yg dilangkan
filter_var = untuk membersihkan dari karakter karakter aneh
explode = untuk mempecah bagian bagian
*/
    if(isset($_GET['url'])){
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
    }
}

//akhir class 
}
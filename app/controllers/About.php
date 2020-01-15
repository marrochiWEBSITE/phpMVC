<?php

class  About extends Controller{


    public function index($nama = 'Marrochi', $pekerjaan = 'Mahasiswa', $umur = 33){
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About';
        $this->view('templates/header',$data);
        $this->view('about/index',$data);
        $this->view('templates/footer');
    }
    public function page(){
        $data['judul'] = 'Pages';
        $this->view('templates/header');
        $this->view('page/index');
        $this->view('templates/footer');
    }



//penutup class    
}

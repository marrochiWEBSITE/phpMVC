<?php
// session
if(!session_id()) session_start();
/* disini kita akan memanggil init php
    yang berfungsi untuk memanggil fungsi yg lain di mvc
*/
require_once '../app/init.php';

// untuk menjalnkan kelas App
$app = new App;



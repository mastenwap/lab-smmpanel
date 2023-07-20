<?php 

class koneksi{
    
protected $db;

function __construct(){
define('DB_NAME','smmpanel');
define('USER','webaji');
define('PASS','t3st3r12345!');
define('HOST','db');
$this->db = new mysqli(HOST,USER,PASS,DB_NAME) OR die('AUTH DB IS NOT VALIDED'); 
}


function querys($query){
return $this->db->query($query);
}

}
$db = new koneksi();

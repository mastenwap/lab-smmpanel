<?php
// Penulis Kode 1LxCoder

date_default_timezone_set('Asia/Jakarta');
//error_reporting(0);

// web
$cfg_webname = "Bisnis Media";
$cfg_baseurl = "http://lab.wimisec.or.id:8080/";
$cfg_desc = "bisnis media Adalah Panel Sosmed Dan Pulsa Termurah!";
$cfg_author = "C&R Writter";
$cfg_logo_txt = "Bisnis Media";
$cfg_registerurl = "http://103.163.161.21:8080/";
$cfg_about = " Adalah Panel Sosmed Dan Pulsa Termurah!";

// fitur staff
$cfg_min_transfer = 5000; // jumlah minimal transfer saldo
$cfg_member_price = 10000; // harga pendaftaran member
$cfg_member_bonus = 5000; // bonus saldo member
$cfg_agen_price = 35000; // harga pendaftaran agen
$cfg_agen_bonus = 20000; // bonus saldo agen
$cfg_reseller_price = 65000; // harga pendaftaran reseller
$cfg_reseller_bonus = 40000; // bonus saldo reseller
$cfg_admin_price = 140000; // harga pendaftaran admin
$cfg_admin_bonus = 80000; // bonus saldo admin

// config api key fitur pulsa & line
$cfg_apikey_pulsaline ="-";

// database
$db_server = "db";
$db_user = "webaji";
$db_password = "t3st3r12345!";
$db_name = "smmpanel";

// date & time
$date = date("Y-m-d");
$time = date("H:i:s");

// require
require("lib/database.php");
require("lib/function.php");

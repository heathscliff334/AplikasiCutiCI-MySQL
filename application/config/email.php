<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
	// Untuk Broadcast via email ke users
    // Konfigurasi email
$config = Array(
    'mailtype'  => 'html',
    'charset'   => 'utf-8',
    'protocol'  => 'smtp',
    'smtp_host' => 'smtp.gmail.com',
    'smtp_user' => 'itissunter@gmail.com',  // Email gmail
    'smtp_pass'   => 'webisitadmin',  // Password gmail
    'smtp_crypto' => 'ssl',
    'smtp_port'   => 465,
    'crlf'    => "\r\n",
    'newline' => "\r\n"
);



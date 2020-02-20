<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Send_email extends CI_Controller {
	// Untuk Broadcast via email ke users

    public function index()
    {
      // Konfigurasi email
        $config = [
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
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@portalis.com', 'Portal IS Ing Silver');

        // Email penerima
        $this->email->to('heathscliff334@gmail.com'); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Pengumuman Baru di Portal IS | Ing Silver');

        // Isi email
        $this->email->message("Hai User, ada pengumuman baru di Portal IS, silahkan login untuk melihat.<br><br> Klik <strong><a href='http://192.168.1.52:8080/e-cuti/admin' target='_blank' rel='noopener'>disini</a></strong> untuk masuk ke Portal IS.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
    }
}

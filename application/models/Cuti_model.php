<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti_model extends CI_Model
{
    private $_table = "cuti";

    public $cuti_id;
    public $user_id;
    public $jenis_cuti;
    public $photo; //photo 
    public $mulai_cuti;
    public $sampai_cuti;
    public $lama_cuti;
    public $lama_hari;
    public $keterangan_cuti;
    public $komen;
    public $is_active;

    public function rules()
    {
        return [

            ['field' => 'lama_cuti',
            'label' => 'Lama Cuti',
            'rules' => 'required'],

            ['field' => 'lama_hari',
            'label' => 'Lama Cuti',
            'rules' => 'required'],            

            ['field' => 'keterangan',
            'label' => 'Keterangan Cuti',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        //join table cuti -> users (untuk mendapatkan nama lengkap user)
        $this->db->select('cuti.cuti_id, cuti.user_id, users.full_name, users.role, users.divisi, users.sisa_cuti, cuti.jenis_cuti, cuti.photo, cuti.keterangan_cuti, cuti.mulai_cuti, cuti.sampai_cuti,cuti.lama_cuti,cuti.lama_hari, cuti.acc_spv, cuti.acc_koor, cuti.acc_pimp, cuti.komen, cuti.status,cuti.created_at');
        $this->db->from('cuti');
        $this->db->join('users','cuti.user_id = users.user_id');

        if($_SESSION['session_var_user']->role == "staff"){
            $this->db->where('cuti.user_id',$_SESSION['session_var_user']->user_id);
            $this->db->group_start();
            $this->db->or_where('cuti.is_active = 1');
            $this->db->group_end();
        } else if($_SESSION['session_var_user']->role == "spv"){
            $this->db->where('users.divisi',$_SESSION['session_var_user']->divisi);
            $this->db->group_start();
            $this->db->or_where('users.role != "spv" AND cuti.is_active = 1');
            $this->db->group_end();            
        } else if($_SESSION['session_var_user']->role == "koordinator"){
            $this->db->where('cuti.acc_spv = 1');
            $this->db->group_start();
            $this->db->or_where('cuti.is_active = 1');
            $this->db->group_end();            
        } else if($_SESSION['session_var_user']->role == "pimpinan"){
            $this->db->where('users.role = "spv"');
            $this->db->group_start();
            $this->db->or_where('cuti.is_active = 1');
            $this->db->group_end();            
        }
         else {
            $this->db->where('cuti.is_active = 1');
        }
        $this->db->order_by('cuti.created_at','desc');
        $query = $this->db->get()->result();
        return $query;
    }
    
    public function getById($id)
    {
        $this->db->select('cuti.cuti_id, cuti.user_id, users.full_name, users.role, users.divisi, users.sisa_cuti, cuti.jenis_cuti, cuti.photo, cuti.keterangan_cuti, cuti.mulai_cuti, cuti.sampai_cuti,cuti.lama_cuti,cuti.lama_hari, cuti.acc_spv, cuti.acc_koor, cuti.acc_pimp, cuti.komen, cuti.status,cuti.created_at');
        $this->db->from('cuti');
        $this->db->join('users','cuti.user_id = users.user_id');
        $this->db->where('cuti.cuti_id',$id);
        $this->db->order_by('cuti.created_at','desc');
        $query = $this->db->get()->row();

        return $query;
    }
    public function getMyCuti()
    {
        $this->db->select('cuti.cuti_id, cuti.user_id, users.full_name, users.role, users.divisi, cuti.jenis_cuti, cuti.photo, cuti.keterangan_cuti, cuti.mulai_cuti, cuti.sampai_cuti,cuti.lama_cuti,cuti.lama_hari, cuti.acc_spv, cuti.acc_koor, cuti.acc_pimp, cuti.komen, cuti.status,cuti.created_at');
        $this->db->from('cuti');
        $this->db->join('users','cuti.user_id = users.user_id');
        $this->db->where('cuti.user_id',$_SESSION['session_var_user']->user_id);
        $this->db->group_start();
        $this->db->or_where('cuti.is_active = 1');
        $this->db->group_end();
        $this->db->order_by('cuti.created_at','desc');
        $query = $this->db->get()->result();
        return $query;
    }
    public function getEmail()
    {
        if($_SESSION['session_var_user']->role == "staff"){
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('divisi',$_SESSION['session_var_user']->divisi);
            $this->db->group_start();
            $this->db->or_where('role = "spv"');
            $this->db->group_end();
            $query = $this->db->get()->row();
            return $query;            
        } else if($_SESSION['session_var_user']->role == "spv" || $_SESSION['session_var_user']->role == "koordinator"){
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('role = "pimpinan"');
            $query = $this->db->get()->row();
            return $query;               
        }

    }

    public function save($jumlahHari,$jumlahJam)
    {
        $test = $this->getEmail();
        if($_POST["jenisCuti"] == "permisi" || $_POST["jenisCuti"] == "sakit")
        {
            $post = $this->input->post();
            $this->cuti_id = uniqid();
            $this->user_id = $post['userId'];
            $this->photo = $this->_uploadImage();
            $this->jenis_cuti =$post["jenisCuti"];
            $this->mulai_cuti = $post["mulaiCuti"];
            $this->sampai_cuti = $post["sampaiCuti"];
            $this->lama_cuti = $jumlahJam;
            $this->lama_hari = $jumlahHari;
            $this->keterangan_cuti = strtoupper($post["keterangan"]);
            $this->is_active = 1;
            $this->db->insert($this->_table, $this);
            $this->session->set_flashdata('success', 'Berhasil disimpan ');  
        } else if($_POST["jenisCuti"] == "tahunan")
        {
            if($_SESSION['session_var_user']->sisa_cuti <1)
            {
                $this->session->set_flashdata('success','<div class="alert alert-danger" style="margin:-21px;">Gagal disimpan, anda tidak punya sisa cuti!</div>');
                return false;
            } else
            {
                $post = $this->input->post();
                $this->cuti_id = uniqid();
                $this->user_id = $post['userId'];
                $this->photo = $this->_uploadImage();
                $this->jenis_cuti =$post["jenisCuti"];
                $this->mulai_cuti = $post["mulaiCuti"];
                $this->sampai_cuti = $post["sampaiCuti"];
                $this->lama_cuti = $jumlahJam;
                $this->lama_hari = $jumlahHari;
                $this->keterangan_cuti = strtoupper($post["keterangan"]);
                $this->is_active = 1;
                $this->db->insert($this->_table, $this);
                $this->db->set("sisa_cuti","sisa_cuti - $jumlahHari", FALSE);
                $this->db->where('user_id',$_SESSION['session_var_user']->user_id);
                $this->db->update('users');
                $this->session->set_flashdata('success', 'Berhasil disimpan ');  
            }
        }
    }
    public function getEmailTerima($userId)
    {    
        if($_SESSION['session_var_user']->role == "spv"){   
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('user_id = '.$userId.' OR role = "koordinator"');
            $query = $this->db->get()->result();
            return $query;               
        } else if($_SESSION['session_var_user']->role == "koordinator" || $_SESSION['session_var_user']->role == "pimpinan"){
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('user_id',$userId);
            $query = $this->db->get()->result();
            return $query;  
        }
    }
    public function updateTerima($id,$userId)
    {
        if($_SESSION['session_var_user']->role == "spv"){

            $data = array(                
                'acc_spv' => 1
            );
        } else if($_SESSION['session_var_user']->role == "koordinator" || $_SESSION['session_var_user']->role == "admin"){
            $data = array(                
                'acc_koor' => 1
            );
        } else if ($_SESSION['session_var_user']->role == "pimpinan"){
            $data = array(                
                'acc_pimp' => 1
            );
        }
        $this->db->where('cuti_id',$id);
        $this->db->update('cuti',$data);
        $this->session->set_flashdata('success', 'Berhasil di Terima! '); 
    }
    public function getEmailTolak($userId)
    {      
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_id',$userId);
        $query = $this->db->get()->result();
        return $query;               
    }
    public function updateTolak($id,$jCuti,$jHari,$userId)
    {
        if($jCuti == "tahunan"){
            if($_SESSION['session_var_user']->role == "spv"){
                $data = array(
                    'komen' => $_POST["komen_cuti"],
                    'acc_spv' => 3
                );
            } else if($_SESSION['session_var_user']->role == "koordinator" || $_SESSION['session_var_user']->role == "admin"){
                $data = array(
                    'komen' => $_POST["komen_cuti"],
                    'acc_koor' => 3
                );
            } else if ($_SESSION['session_var_user']->role == "pimpinan"){
                $data = array(
                    'komen' => $_POST["komen_cuti"],
                    'acc_spv' => 3,
                    'acc_pimp' => 3
                );
            }
            $this->db->where('cuti_id',$id);
            $this->db->update('cuti',$data);

            $this->db->set("sisa_cuti","sisa_cuti + $jHari", FALSE);
            $this->db->where('user_id',$userId);
            $this->db->update('users');
            $this->session->set_flashdata('success', 'Berhasil di Tolak! '); 

        } else if($jCuti == "permisi" || $jCuti == "sakit"){
            if($_SESSION['session_var_user']->role == "spv"){
                $data = array(
                    'komen' => $_POST["komen_cuti"],
                    'acc_spv' => 3
                );
            } else if($_SESSION['session_var_user']->role == "koordinator" || $_SESSION['session_var_user']->role == "admin"){
                $data = array(
                    'komen' => $_POST["komen_cuti"],
                    'acc_koor' => 3
                );
            } else if ($_SESSION['session_var_user']->role == "pimpinan"){
                $data = array(
                    'komen' => $_POST["komen_cuti"],
                    'acc_pimp' => 3
                );
            }
            $this->db->where('cuti_id',$id);
            $this->db->update('cuti',$data);
            $this->session->set_flashdata('success','<div class="alert alert-warning" style="margin:-21px;">Berhasil di Tolak!</div>');
        }

    }
    public function delete($id)
    {
        $data = array( 
            'is_active'       => 0
        );
        $this->db->where('cuti_id', $id);
        $this->db->update('cuti', $data);
    }
    private function _uploadImage()
    {
        $config['upload_path']          = './upload/cuti/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->cuti_id;
        $config['overwrite']            = true;
        $config['max_size']             = 2048; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
        return $this->upload->data("file_name");
    }
    
    return "default.jpg";
    }
    private function _deleteImage($id)
    {
    $cuti = $this->getById($id);
    if ($cuti->image != "default.jpg") {
        $filename = explode(".", $cuti->image)[0];
        return array_map('unlink', glob(FCPATH."upload/cuti/$filename.*"));
    }
    }
}

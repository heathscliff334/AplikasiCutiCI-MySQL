<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model
{
    private $_table = "users";

    public function rules()
    {
        return [

            ['field' => 'pwdHash',
            'label' => 'Old Password',
            'rules' => 'required'],

            ['field' => 'pwdNew',
            'label' => 'New Password',
            'rules' => 'required'],

            ['field' => 'confirmPwd',
            'label' => 'Confirm Password',
            'rules' => 'required|matches[pwdNew]']
        ];
    }

    public function getAll()
    {
       return $this->db->get_where($this->_table, ["user_id" => $id])->row();

    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["user_id" => $id])->row();

    }

    public function save($id)
    {
        $post = $this->input->post();
        $this->db->where('email', $post['email']);
        $getEmail = $this->db->get($this->_table)->row();

        if($getEmail){
            $this->session->set_flashdata('success','<div class="alert alert-danger" style="margin:-21px;">Gagal disimpan, email sudah terdaftar!</div>');
            return false;
        } else {
            $this->username = $post['usrName'];
            $this->full_name = $post['fullName'];
            $this->email = $post['email'];
            $this->phone = $post['telp'];
            $this->db->insert($this->_table, $this);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        
    }

    public function update($id)
    {

        $this->db->where('user_id', $id); 
        $getPassword = $this->db->get($this->_table)->row();      
        $isPasswordTrue = password_verify($_POST["pwdHash"], $getPassword->password);
        if($isPasswordTrue){
            $data = array(
                'password' => password_hash($_POST["pwdNew"], PASSWORD_DEFAULT)
            );
            $this->db->where('user_id',$id);
            $this->db->update('users',$data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }else if(!$isPasswordTrue){
            $this->session->set_flashdata('success','<div class="alert alert-danger" style="margin:-21px;">Gagal disimpan, old password salah!</div>');
            return false;
            }
    }
    public function updateProfile($id)
    {
        $this->db->where('email', $_POST["email"]); 
        $getEmail = $this->db->get($this->_table)->row();
        if($getEmail){
            $this->session->set_flashdata('success','<div class="alert alert-danger" style="margin:-21px;">Gagal disimpan, email sudah terdaftar!</div>');
            $data = array(
                'full_name' => $_POST["fullName"],
                'phone' => $_POST["telp"]
            );

            $this->db->where('user_id',$id);
            $this->db->update('users',$data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        } else {
            $data = array(
                'full_name' => $_POST["fullName"],
                'email' => $_POST["email"],
                'phone' => $_POST["telp"]
            );

            $this->db->where('user_id',$id);
            $this->db->update('users',$data);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

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

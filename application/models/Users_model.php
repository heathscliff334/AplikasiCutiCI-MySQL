<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model
{
    private $_table = "users";
    private $kat_user = 1;

    public function rules()
    {
        return [

            ['field' => 'usrName',
            'label' => 'Username',
            'rules' => 'trim|required|min_length[3]'],

            ['field' => 'pwdHash',
            'label' => 'Password',
            'rules' => 'required'],

            ['field' => 'confirmPwd',
            'label' => 'Confirm Password',
            'rules' => 'required|matches[pwdHash]'],

        ];
    }

    public function getAll()
    {
        $divisiSPV = $_SESSION['session_var_user']->divisi;
        $roleSPV = $_SESSION['session_var_user']->role;
              
        if ($roleSPV == "spv") {
            $this->db->select('*');
            $this->db->from('users');
            if ($divisiSPV == $divisiSPV) { 
                $this->db->where('divisi ', $divisiSPV);
            }
            $query = $this->db->get()->result();
            return $query;
        } else if ($roleSPV !="staff")
        {
            return $this->db->get($this->_table)->result();
        }
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["user_id" => $id])->row();

    }

    public function save()
    {
        $post = $this->input->post();
        $this->db->where('username', $post["usrName"]);
        $getUser = $this->db->get($this->_table)->row();
        if($getUser){
            $this->session->set_flashdata('success','<div class="alert alert-danger" style="margin:-21px;">Gagal disimpan, username sudah terdaftar!</div>');
            return false;
        }
         else {
            $this->username = $post['usrName'];
            $this->password = password_hash($post['pwdHash'], PASSWORD_DEFAULT); 
            $this->role = $post['roleUser'];
            $this->divisi = $post['divisiUser'];
            $this->is_active = 1; 
            $this->kat_user = $post['katUser'];
            $this->db->insert($this->_table, $this);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        
    }

    public function update($id)
    {
        $data = array(
            'judul_news' => $_POST["judulNews"],
            'isi_news' => $_POST["isiNews"]
        );
        $this->db->where('news_id',$id);
        $this->db->update('news',$data);
    }

    public function activate($id)
    {
        $data = array( 
            'is_active'       => 1
        );                  
        $this->db->where('user_id', $id);
        $this->db->update('users', $data);

    }
    public function disable($id)
    {

        $data = array( 
            'is_active'       => 0
        );

        $this->db->where('user_id', $id);
        $this->db->update('users', $data);

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

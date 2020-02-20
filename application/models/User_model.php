<?php

class User_model extends CI_Model
{
    private $_table = "users";
    public $full_name;

    public function doLogin(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email', $post["email"])
                ->or_where('username', $post["email"]);
        $user = $this->db->get($this->_table)->row();

        // jika user terdaftar
        if($user){
            // periksa password-nya
            $isPasswordTrue = password_verify($post["password"], $user->password);
            // periksa role-nya
            $isActive = $user->is_active == "1";
            $isAdmin = $user->role == "su" || "admin" || "pimpinan" || "spv" || "staff";

            // jika password benar dan dia admin
            if($isPasswordTrue && $isAdmin && $isActive){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                $this->_updateLastLogin($user->user_id);
                $_SESSION['session_var_user'] = $user;
                

            
                return true;
            }

        }
        
        // login gagal
      $message = "Username dan/atau Password salah!\\nSilahkan Coba lagi.";
      echo "<script type='text/javascript'>alert('$message');</script>";
		return false;
    }
    public function tambahCuti($um)
    {
        $dt = date('m');

        if ($dt == 1) {
            if ($um != 1) {
                $sqlSC = "UPDATE {$this->_table} SET sisa_cuti = 0 WHERE kat_user = 1 and divisi != 'marketing' ";
                $this->db->query($sqlSC);  
                $sqlSC = "UPDATE {$this->_table} SET sisa_cuti = 12 WHERE kat_user = 2";
                $this->db->query($sqlSC);  
                $sqlUM = "UPDATE {$this->_table} SET updated_month = 1";
                $this->db->query($sqlUM);              
            }
        }
        for($i=1; $i <= 12; $i++){
            if ($dt == $i) {
                if ($um != $i) {

                    $sqlSC = "UPDATE {$this->_table} SET sisa_cuti = sisa_cuti+1 WHERE kat_user = 1";
                    $this->db->query($sqlSC);  
                    $sqlUM = "UPDATE {$this->_table} SET updated_month = ".$i."";
                    $this->db->query($sqlUM);              
                }
            }

        }
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["user_id" => $id])->row();
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get()->result();
        return $query;
    }
    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }
    private function _updateLastLogin($user_id){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }

}
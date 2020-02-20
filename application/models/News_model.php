<?php defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model
{
    private $_table = "news";

    public $news_id;
    public $judul_news;
    public $isi_news;


    public function rules()
    {
        return [

            ['field' => 'judulNews',
            'label' => 'Judul news / event',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('news');
        $this->db->where('is_active = 1');
        $this->db->order_by('created_at','desc');
        $query = $this->db->get()->result();
        return $query;
    }
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["news_id" => $id])->row();
    }
    public function getEmail()
    {
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get()->result();
        return $query;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->news_id = uniqid();
        $this->judul_news = $post['judulNews'];
        $this->isi_news = $post['isiNews'];
        $this->db->insert($this->_table, $this);
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

    public function delete($id)
    {
        $data = array( 
            'is_active'       => 0
        );
        $this->db->where('news_id', $id);
        $this->db->update('news', $data);
    }
    private function _uploadImage()
    {
        $config['upload_path']          = './upload/news/';
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

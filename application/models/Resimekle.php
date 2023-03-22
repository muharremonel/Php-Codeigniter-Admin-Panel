<?php


class Resimekle extends CI_Model
{
    protected $table = "images";
    public function insert($data)
    {
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    public function add_gallery_image($id, $url)
    {
        if ($url != NULL) {
            $this->db->set('product_id', $id);
            $this->db->set('path', $url);
            $this->db->insert($this->table);
            return true;
        } else {
            return false;
        }
    }

    public function image_remove($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete('images');
        return $result;
    }

    public function get_category($id)
    {
        $result = $this->db->select('*')->from($this->table)->where('id', $id)->get()->row();
        return $result;
    }
    public function addproduct($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function list()
    {
        $result = $this->db->select('*')->from($this->table)->get()->result();
        return $result;
    }
}

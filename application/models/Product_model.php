<?php
class Product_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data)
    {
        return $this->db->insert('products', $data);
    }

    public function get_all_products()
    {

        $query = $this->db->get('products');
        return $query->result();
    }
    public function update_product($id, $data)
    {
        // Güncelleme işlemini yapın
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('products');
    }
}

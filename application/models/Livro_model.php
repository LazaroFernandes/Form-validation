<?php
class Livro_model extends CI_Model
{
    public function index()
		{
			return $this->db->get("livro")->result_array();
		}
        
        function get_livro()
        {
            $this->db->select('idlivro,nomelivro');
            $query = $this->db->get('livro');
            return $query->result();
        }
    
}
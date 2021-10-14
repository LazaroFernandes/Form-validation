<?php
class Relacao_model extends CI_Model
{
    public function index()
		{
			return $this->db->get("relacao")->result_array();
		}
        
        function get_relacao()
        {
            $this->db->select('idrelacao,nomerelacao');
            $query = $this->db->get('relacao');
            return $query->result();
        }
    
}
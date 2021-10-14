<?php
class Formulario_model extends CI_Model
{
    public function index()
		{
			return $this->db->get("register")->result_array();
		}
        function get_register($filter = null)
        {

            $this->db->select('relacao.nomerelacao,livro.nomelivro,register.id,register.nome,register.endereco,register.cpf,register.opiniao');
            $this->db->from('register');
            $this->db->join('livro','register.livro=livro.idlivro');
            $this->db->join('relacao','register.relacao=relacao.idrelacao');
            if($filter !== null){
                $this->db->where('livro.idlivro',$filter);
            }
            $query = $this->db->get();
            $return['results'] = $query->result();
            $return['rows'] = $query->num_rows();   
            return $return;
        }

    public function store($data){
        $data->cpf = $this->formated_cpf($data->cpf);
        $validation = $this->validation_register($data->cpf, $data->livro);
        if($validation['success']){
            $this->db->trans_start();
            $this->db->insert('register', $data);
            $this->db->trans_complete();
            if ($this->db->trans_status()) {
                return array('success'=>TRUE, 'message'=>'Informações salvas com sucesso');
            } else {
                return array('success'=>FALSE, 'message'=>'Houve um erro ao salvar as informações');
            }
        }else{
            return $validation;
        }
    }
    
    private function formated_cpf($cpf){
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);
        return $cpf;
    }

    public function validation_register($cpf, $livro){
        $this->db->where('livro', $livro);
        $this->db->where('cpf', $cpf);
        $query = $this->db->get('register');
        if($query->num_rows() == 0){
            $return['success'] = TRUE;
        }else{
            $return = array('success'=>FALSE, 'message'=>'CPF já cadastrado');
        }
        return $return;
    }

    public function valid_period(){
        $this->db->select('datastart, dataend');
        $query = $this->db->get('config');
        $result = $query->row();
        $current = time(); 
        $start = strtotime($result->datastart);
        $end = strtotime($result->dataend);
        if($current >= $start && $current <= $end){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
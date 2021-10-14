<?php

class Logged {

    public function get_logged() {
        $CI = & get_instance();
        $CI->load->library('session');
        if ($CI->session->userdata('logged')) {
            return;
        } else {
            $CI->session->set_flashdata('logged', 'Você não está logado');
            redirect(site_url(), 'refresh');
        }
    }

    public function verifica_permissoes($permissoes) {
        $CI = & get_instance();
        $CI->load->library('session');
        foreach ($permissoes as $p) {
            if ($p == $CI->session->userdata('profile')) {
                return TRUE;
            }
        }
        redirect(base_url('home/acesso_negado'), 'refresh');
    }

}

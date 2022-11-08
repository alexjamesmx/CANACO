<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class S extends CI_Controller {

    function index()
    {
        $data                     = array();
        $data['_APP']['header']   = $this->load->view('public/headersignup_f', $data, TRUE);
        $data['_APP']['footer']   = $this->load->view('public/footer_f', $data, TRUE);
        $data['scripts'][]        = 'app/private/modules/subir';
        $data['login_c']          = $this->load->view('public/components/login_c_prueba', $data, TRUE);
        $data['_APP']['fragment'] = $this->load->view('public/signup_f', $data, TRUE);
        $this->load->view('public/landing_v', $data, FALSE);
    }

}

/* End of file Signup.php */
/* Location: ./application/controllers/Signup.php */

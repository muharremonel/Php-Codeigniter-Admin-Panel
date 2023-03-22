<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');

        if (!$this->session->userdata('lang')) {
            $this->session->set_userdata('lang', 'tr');
        }
        $this->lang->load($this->session->userdata('lang'), $this->session->userdata('lang'));
    }
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dil extends CI_Controller
{
    public function index()
    {
        $this->load->view('dil');
    }
    public function dildegistir($dil)
    {
        $this->session->unset_userdata('lang');
        $this->session->set_userdata('lang', $dil);
        redirect($_SERVER['HTTP_REFERER']);
    }
}

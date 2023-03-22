<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

    public function index()
    {
        $this->load->view('back/login');
    }

    public function loginto()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->load->model('vt');
        $sonuc = $this->vt->kontrol($username, $password);
        if ($sonuc) {
            session("yaz", "adminlogin", true);
            session("yaz", "admininfo", $sonuc);
            redirect('admin');
        } else {
            flash("danger", "Hata!", "Kullanıcı Adı veya Şifre Hatalı!");
            redirect('auth');
        }
    }
}

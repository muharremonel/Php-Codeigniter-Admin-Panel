<?php

function session($type, $name, $message = null)
{
    $ci = get_instance();

    if ($type == "oku") {
        return $ci->session->userdata($name);
    }
    if ($type == "yaz") {
        return $ci->session->set_userdata($name, $message);
    }
}

function flash($type, $title, $message)
{
    $flash = '<div class="alert alert-dismissible bg-' . $type . ' d-flex flex-column flex-sm-row p-5 mb-10"> <span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0">...</span> <h4 class="mb-2 light">' . $title . '</h4><span>' . $message . '</span><button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert"><span class="svg-icon svg-icon-2x svg-icon-light">...</span></button></div>';
    if ($type == 'success') {
        $flash_new = '<!--begin::Alert-->
    <div class="alert alert-dismissible bg-' . $type . ' d-flex flex-column flex-sm-row p-5 mb-10">
        <!--begin::Icon-->
        <span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0"><i class="fa-solid fa-thumbs-up text-light fs-5x"></i></span>
        <!--end::Icon-->
    
        <!--begin::Wrapper-->
        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
            <!--begin::Title-->
            <h4 class="mb-2 text-light">' . $title . '</h4>
            <!--end::Title-->
    
            <!--begin::Content-->
            <span>' . $message . '</span>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    
        <!--begin::Close-->
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-2x svg-icon-light"><i class="fa-solid fa-xmark text-light fs-3x"></i></span>
        </button>
        <!--end::Close-->
    </div>
    <!--end::Alert-->';
    } elseif ($type == 'danger') {
        $flash_new = '<!--begin::Alert-->
    <div class="alert alert-dismissible bg-' . $type . ' d-flex flex-column flex-sm-row p-5 mb-10">
        <!--begin::Icon-->
        <span class="svg-icon svg-icon-2hx svg-icon-light me-4 mb-5 mb-sm-0"><i class="fa-solid fa-circle-exclamation text-light fs-5x"></i></span>
        <!--end::Icon-->
    
        <!--begin::Wrapper-->
        <div class="d-flex flex-column text-light pe-0 pe-sm-10">
            <!--begin::Title-->
            <h4 class="mb-2 text-light">' . $title . '</h4>
            <!--end::Title-->
    
            <!--begin::Content-->
            <span>' . $message . '</span>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    
        <!--begin::Close-->
        <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-2x svg-icon-light"><i class="fa-solid fa-xmark text-light fs-3x"></i></span>
        </button>
        <!--end::Close-->
    </div>
    <!--end::Alert-->';
    }
    $ci = get_instance();
    return $ci->session->set_flashdata('message', $flash_new);
}

function flashread()
{
    $ci = get_instance();
    return $ci->session->flashdata('message');
}
function bread($type, $title, $link = null)
{
    if ($type == "tamam") {
        return '<li class="breadcrumb-item">' . $title . '</li>';
    }
    if ($type == "devam") {
        return '<li class="breadcrumb-item active"><a href="' . $link . '">' . $title . '</a></li>';
    }
}


function postval($name)
{
    $ci = get_instance();
    return $ci->input->post($name);
}


function upimage($config, $name)
{
    $ci = get_instance();
    $ci->upload->initialize($config);
    if ($ci->upload->do_upload($name)) {
        $resim = $ci->upload->data();
        $resimadi = $resim['file_name'];
        $kayityolu = $config['upload_path'] . $resimadi;
        return $kayityolu;
    } else {
        if ($ci->upload->display_errors() == "<p>err</p>") {
            return "err";
        } else {
            flash("danger", "Resim Yüklenemedi!", $ci->upload->display_errors());
            redirect('admin');
        }
    }
}


function linkto($url)
{
    return base_url($url);
}

function teknikconfig()
{
    $ci = get_instance();
    $result = $ci->db->from("teknik")->where('t_id', 1)->get()->row();
    if ($ci->session->userdata('lang') == 'tr') {
        $data = [
            'analitik' => $result->analitik,
            'search' => $result->search,
            'meta' => $result->meta,


        ];
    } elseif ($ci->session->userdata('lang') == 'en') {
        $data = [
            'analitik' => $result->analitik,
            'search' => $result->search,
            'meta' => $result->meta,

        ];
    }
    return $data;
}

function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        return true;
    }
}
function sef($text)
{
    $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
    $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
    $text = strtolower(str_replace($find, $replace, $text));
    $text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
    $text = trim(preg_replace('/\s+/', ' ', $text));
    $text = str_replace(' ', '-', $text);

    return $text;
}

function active($module)
{
    $ci = get_instance();
    if ($ci->uri->segment(2) == $module) {
        echo "active";
    }
}

function show($module)
{
    $ci = get_instance();
    if (in_array($ci->uri->segment(2), $module)) {
        echo "show";
    }
}

function img_upload($input_name)
{
    if (!file_exists("assets/upload/slider/")) {
        mkdir("assets/upload/slider/", 0777);
    }
    if (!file_exists("assets/upload/slider/")) {
        mkdir("assets/upload/slider/", 0777);
    }
    if (is_uploaded_file(@$_FILES[$input_name]['tmp_name'])) {
        $config['upload_path'] =    'assets/upload/slider/';
        $config['allowed_types'] =  "jpg|jpeg|gif|png|svg";
        $config['file_name'] =      'product_' . date('Y-m-d_H-i-s');
        $config['overwrite'] =      FALSE;
        get_instance()->upload->initialize($config);
        get_instance()->upload->do_upload($input_name);
        get_instance()->file_inf = $name = get_instance()->upload->data();

        return 'assets/upload/slider/' . $name['file_name'];
    } else {
        return NULL;
    }
}

function image_remove($id)
{
    $ci = get_instance();
    $result = $ci->resimekle->image_remove($id);
    return $result;
}

function anaconfig()
{
    $ci = get_instance();
    $result = $ci->db->from("anasayfa")->where('a_id', 1)->get()->row();
    if ($ci->session->userdata('lang') == 'tr') {
        $data = [
            'en_hakkimizda' => $result->tr_hakkimizda,
            'en_baslik' => $result->tr_baslik,
        ];
    } elseif ($ci->session->userdata('lang') == 'en') {
        $data = [
            'en_hakkimizda' => $result->en_hakkimizda,
            'en_baslik' => $result->en_baslik,
        ];
    }
    return $data;
}
function hakkimizdaconfig()
{
    $ci = get_instance();
    $result = $ci->db->from("hakkimizda")->where('h_id', 1)->get()->row();
    if ($ci->session->userdata('lang') == 'tr') {
        $data = [
            'en_hakkimizda' => $result->tr_hakkimizda,
            'en_baslik' => $result->tr_baslik,
            'gorsel' => $result->gorsel,
        ];
    } elseif ($ci->session->userdata('lang') == 'en') {
        $data = [
            'en_hakkimizda' => $result->en_hakkimizda,
            'en_baslik' => $result->en_baslik,
            'gorsel' => $result->gorsel,
        ];
    }
    return $data;
}
function footerconfig()
{
    $ci = get_instance();
    $result = $ci->db->from("footer")->where('f_id', 1)->get()->row();
    if ($ci->session->userdata('lang') == 'tr') {
        $data = [
            'en_hakkimizda' => $result->tr_hakkimizda,
            'logo' => $result->logo,
            'tel1' => $result->tel1,
            'tel2' => $result->tel2,
            'tel3' => $result->tel3,
            'faks' => $result->faks,
            'kep' => $result->kep,
            'mail' => $result->mail,
            'adres' => $result->adres,
            'facebook' => $result->facebook,
            'twitter' => $result->twitter,
            'instagram' => $result->instagram,
            'linkedin' => $result->linkedin,

        ];
    } elseif ($ci->session->userdata('lang') == 'en') {
        $data = [
            'en_hakkimizda' => $result->en_hakkimizda,
            'logo' => $result->logo,
            'tel1' => $result->tel1,
            'tel2' => $result->tel2,
            'tel3' => $result->tel3,
            'faks' => $result->faks,
            'kep' => $result->kep,
            'mail' => $result->mail,
            'adres' => $result->adres,
            'facebook' => $result->facebook,
            'twitter' => $result->twitter,
            'instagram' => $result->instagram,
            'linkedin' => $result->linkedin,
        ];
    }
    return $data;
}

function headerconfig()
{
    $ci = get_instance();
    $result = $ci->db->from("header")->where('h_id', 1)->get()->row();
    if ($ci->session->userdata('lang') == 'tr') {
        $data = [
            'h_id' => $result->h_id,
            'logo' => $result->logo,
            'favicon' => $result->favicon,
            'title' => $result->title,


        ];
    } elseif ($ci->session->userdata('lang') == 'en') {
        $data = [
            'h_id' => $result->h_id,
            'logo' => $result->logo,
            'favicon' => $result->favicon,
            'title' => $result->title,
        ];
    }
    return $data;
}
function gethaber($id)
{
    $ci = get_instance();
    $ci->load->model('vt');
    return $ci->kategori->gethaber($id);
}

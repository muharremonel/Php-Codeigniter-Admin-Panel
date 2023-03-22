<?php

class Vt extends CI_Model
{
    protected $table = "admin";
    public function kontrol($username, $password)
    {
        $results = $this->db->where('username', $username)->where('password', $password)->get('admin')->row();
        return $results;
    }
    public function single($from, $where = array())
    {
        $results = $this->db
            ->from($from)
            ->where($where)
            ->get()
            ->row();
        return $results;
    }
    public function ans($from, $where = array())
    {
        $results = $this->db
            ->from($from)
            ->where($where)
            ->get()
            ->row();
        return $results;
    }
    public function get_contact_forms()
    {
        $results = $this->db->order_by('date desc')->get('contact_form')->result_array();
        return $results;
    }

    public function contact_send($name, $mail, $mesaj, $konu, $tel, $birim)
    {
        $data = [
            'name' => $name,
            'email' => $mail,
            'message' => $mesaj,
            'konu' => $konu,
            'tel' => $tel,
            'birim' => $birim,
        ];
        $result = $this->db->insert('contact_form', $data);
        return $result;
    }
    public function abt($from, $where = array())
    {
        $results = $this->db
            ->from($from)
            ->where($where)
            ->get()
            ->row();
        return $results;
    }
    public function carier($from, $where = array())
    {
        $results = $this->db
            ->from($from)
            ->where($where)
            ->get()
            ->row();
        return $results;
    }
    public function contact($from, $where = array())
    {
        $results = $this->db
            ->from($from)
            ->where($where)
            ->get()
            ->row();
        return $results;
    }
    function update($from, $where = array(), $data = array())
    {
        $results = $this->db
            ->where($where)
            ->update($from, $data);
        return $results;
    }
    public function list()
    {
        $result = $this->db->select('*')->from($this->table)->get()->result();
        return $result;
    }


    //SLİDER

    function slider_create($data)
    {
        return $this->db->insert('slider', $data);
    }
    function get_slider()
    {
        $this->db->where('active', 1);
        $this->db->order_by('order_id ASC');
        $result = $this->db->get('slider')->result();
        $data = [];
        foreach ($result as $value) {
            if ($this->session->userdata('lang') == 'tr') {
                $test = [
                    'id' => $value->id,
                    'name' => $value->name,
                    'gorsel' => $value->gorsel,
                    'metin' => $value->tr_metin,
                ];
                array_push($data, $test);
            } elseif ($this->session->userdata('lang') == 'en') {
                $test = [
                    'id' => $value->id,
                    'name' => $value->name,
                    'gorsel' => $value->gorsel,
                    'metin' => $value->en_metin,
                ];
                array_push($data, $test);
            }
        }
        return $data;
    }
    function get_sliders()
    {
        return $this->db->order_by('order_id ASC')->get('slider')->result_array();
    }
    public function update_slider_order($data)
    {
        foreach ($data['listItem'] as $key => $value) {
            $this->db->where('id', $value);
            $this->db->update('slider', ['order_id' => $key]);
        }
        return true;
    }
    public function slider_update($active, $id)
    {
        $data = [
            'active' => $active
        ];
        $this->db->where('id', $id);
        $result = $this->db->update('slider', $data);
        return $result;
    }
    public function getslider()
    {
        $results = $this->db->get('slider')->result_array();
        return $results;
    }
    public function did_delete_slider($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('slider');
    }
    //SLİDER SON


    //MEVZUATLAR
    function mevzuat_create($data)
    {
        return $this->db->insert('mevzuat', $data);
    }
    function get_mevzuats()
    {
        return $this->db->order_by('order_id ASC')->get('mevzuat')->result_array();
    }
    public function update_mevzuat_order($data)
    {
        foreach ($data['listItem'] as $key => $value) {
            $this->db->where('m_id', $value);
            $this->db->update('mevzuat', ['order_id' => $key]);
        }
        return true;
    }
    function get_mevzuat()
    {
        $this->db->where('active', 1);
        $this->db->order_by('order_id ASC');
        $result = $this->db->get('mevzuat')->result();
        $data = [];
        foreach ($result as $value) {
            if ($this->session->userdata('lang') == 'tr') {
                $test = [
                    'm_id' => $value->m_id,
                    'baslik' => $value->tr_baslik,
                    'name' => $value->tr_name,
                    'link' => $value->link,
                    'doc' => $value->doc,
                    'slug' => $value->slug,
                ];
                array_push($data, $test);
            } elseif ($this->session->userdata('lang') == 'en') {
                $test = [
                    'm_id' => $value->m_id,
                    'baslik' => $value->en_baslik,
                    'name' => $value->en_name,
                    'link' => $value->link,
                    'doc' => $value->doc,
                    'slug' => $value->slug,
                ];
                array_push($data, $test);
            }
        }
        return $data;
    }
    public function mevzuat_update($active, $id)
    {
        $data = [
            'active' => $active
        ];
        $this->db->where('m_id', $id);
        $result = $this->db->update('mevzuat', $data);
        return $result;
    }
    public function getmevzuat($link)
    {
        $result = $this->db->where('slug', $link)->get('mevzuat')->row();
        if ($result) {
            if ($this->session->userdata('lang') == 'tr') {
                $test = [
                    'm_id' => $result->m_id,
                    'name' => $result->tr_name,
                    'baslik' => $result->tr_baslik,
                    'link' => $result->link,
                    'doc' => $result->doc,
                    'slug' => $result->slug
                ];
            } elseif ($this->session->userdata('lang') == 'en') {
                $test = [
                    'm_id' => $result->m_id,
                    'name' => $result->en_name,
                    'baslik' => $result->en_baslik,
                    'doc' => $result->doc,
                    'slug' => $result->slug
                ];
            }
            return $test;
        } else {
            return false;
        }
    }
    public function did_delete_mevzuat($id)
    {
        $this->db->where('m_id', $id);
        $this->db->delete('mevzuat');
    }
    public function get_mevzuatup($id)
    {
        $this->db->where('m_id', $id);
        $result = $this->db->get('mevzuat')->row();
        return $result;
    }
    public function mevzuatupdate($id, $data)
    {
        $this->db->where('m_id', $id);
        return $this->db->update("mevzuat", $data);
    }
    //MEVZUATLAR SON

    //FORMLAR
    function formlar_create($data)
    {
        return $this->db->insert('formlar', $data);
    }
    function get_formlars()
    {
        return $this->db->order_by('order_id ASC')->get('formlar')->result_array();
    }
    public function update_formlar_order($data)
    {
        foreach ($data['listItem'] as $key => $value) {
            $this->db->where('f_id', $value);
            $this->db->update('formlar', ['order_id' => $key]);
        }
        return true;
    }
    function get_formlar()
    {
        $this->db->where('active', 1);
        $this->db->order_by('order_id ASC');
        $result = $this->db->get('formlar')->result();
        $data = [];
        foreach ($result as $value) {
            if ($this->session->userdata('lang') == 'tr') {
                $test = [
                    'f_id' => $value->f_id,
                    'baslik' => $value->tr_baslik,
                    'name' => $value->tr_name,
                    'doc' => $value->doc,
                    'slug' => $value->slug,
                ];
                array_push($data, $test);
            } elseif ($this->session->userdata('lang') == 'en') {
                $test = [
                    'f_id' => $value->f_id,
                    'baslik' => $value->en_baslik,
                    'name' => $value->en_name,
                    'doc' => $value->doc,
                    'slug' => $value->slug,
                ];
                array_push($data, $test);
            }
        }
        return $data;
    }
    public function formlar_update($active, $id)
    {
        $data = [
            'active' => $active
        ];
        $this->db->where('f_id', $id);
        $result = $this->db->update('formlar', $data);
        return $result;
    }
    public function getformlar($link)
    {
        $result = $this->db->where('slug', $link)->get('formlar')->row();
        if ($result) {
            if ($this->session->userdata('lang') == 'tr') {
                $test = [
                    'f_id' => $result->f_id,
                    'name' => $result->tr_name,
                    'baslik' => $result->tr_baslik,
                    'doc' => $result->doc,
                    'slug' => $result->slug
                ];
            } elseif ($this->session->userdata('lang') == 'en') {
                $test = [
                    'f_id' => $result->f_id,
                    'name' => $result->en_name,
                    'baslik' => $result->en_baslik,
                    'doc' => $result->doc,
                    'slug' => $result->slug
                ];
            }
            return $test;
        } else {
            return false;
        }
    }
    public function did_delete_formlar($id)
    {
        $this->db->where('f_id', $id);
        $this->db->delete('formlar');
    }
    public function get_formlarup($id)
    {
        $this->db->where('f_id', $id);
        $result = $this->db->get('formlar')->row();
        return $result;
    }
    public function formlarupdate($id, $data)
    {
        $this->db->where('f_id', $id);
        return $this->db->update("formlar", $data);
    }
    //FORMLAR SON

    //HABERLER
    function haber_create($data)
    {
        return $this->db->insert('haber', $data);
    }
    function get_habers()
    {
        return $this->db->order_by('order_id ASC')->get('haber')->result_array();
    }
    public function update_haber_order($data)
    {
        foreach ($data['listItem'] as $key => $value) {
            $this->db->where('h_id', $value);
            $this->db->update('haber', ['order_id' => $key]);
        }
        return true;
    }
    function get_haber()
    {
        $this->db->where('active', 1);
        $this->db->order_by('order_id ASC');
        $result = $this->db->get('haber')->result();
        $data = [];
        foreach ($result as $value) {
            if ($this->session->userdata('lang') == 'tr') {
                $test = [
                    'h_id' => $value->h_id,
                    'anabaslik' => $value->tr_anabaslik,
                    'name' => $value->tr_name,
                    'date' => $value->date,
                    'summary' => $value->tr_summary,
                    'content' => $value->tr_content,
                    'gorsel1' => $value->gorsel1,
                    'gorsel2' => $value->gorsel2,
                    'gorsel3' => $value->gorsel3,
                    'gorsel4' => $value->gorsel4,
                    'slug' => $value->slug,
                ];
                array_push($data, $test);
            } elseif ($this->session->userdata('lang') == 'en') {
                $test = [
                    'h_id' => $value->h_id,
                    'anabaslik' => $value->en_anabaslik,
                    'name' => $value->en_name,
                    'date' => $value->date,
                    'summary' => $value->en_summary,
                    'content' => $value->en_content,
                    'gorsel1' => $value->gorsel1,
                    'gorsel2' => $value->gorsel2,
                    'gorsel3' => $value->gorsel3,
                    'gorsel4' => $value->gorsel4,
                    'slug' => $value->slug,
                ];
                array_push($data, $test);
            }
        }
        return $data;
    }
    public function haber_update($active, $id)
    {
        $data = [
            'active' => $active
        ];
        $this->db->where('h_id', $id);
        $result = $this->db->update('haber', $data);
        return $result;
    }
    public function did_delete_haber($id)
    {
        $this->db->where('h_id', $id);
        $this->db->delete('haber');
    }
    public function get_haberup($id)
    {
        $this->db->where('h_id', $id);
        $result = $this->db->get('haber')->row();
        return $result;
    }
    public function haberupdate($id, $data)
    {
        $this->db->where('h_id', $id);
        return $this->db->update("haber", $data);
    }
    public function gethaber($link)
    {
        $result = $this->db->where('slug', $link)->get('haber')->row();
        if ($result) {
            if ($this->session->userdata('lang') == 'tr') {
                $test = [
                    'h_id' => $result->h_id,
                    'date' => $result->date,
                    'name' => $result->tr_name,
                    'anabaslik' => $result->tr_anabaslik,
                    'summary' => $result->tr_summary,
                    'content' => $result->tr_content,
                    'gorsel1' => $result->gorsel1,
                    'gorsel2' => $result->gorsel2,
                    'gorsel3' => $result->gorsel3,
                    'gorsel4' => $result->gorsel4,
                    'slug' => $result->slug
                ];
            } elseif ($this->session->userdata('lang') == 'en') {
                $test = [
                    'h_id' => $result->h_id,
                    'date' => $result->date,
                    'name' => $result->en_name,
                    'anabaslik' => $result->en_anabaslik,
                    'summary' => $result->en_summary,
                    'content' => $result->en_content,
                    'gorsel1' => $result->gorsel1,
                    'gorsel2' => $result->gorsel2,
                    'gorsel3' => $result->gorsel3,
                    'gorsel4' => $result->gorsel4,
                    'slug' => $result->slug
                ];
            }
            return $test;
        } else {
            return false;
        }
    }
    //HABERLER SON

    //HİZMETLERİMİZ
    function hizmet_create($data)
    {
        return $this->db->insert('hizmet', $data);
    }
    function get_hizmets()
    {
        return $this->db->order_by('order_id ASC')->get('hizmet')->result_array();
    }
    public function update_hizmet_order($data)
    {
        foreach ($data['listItem'] as $key => $value) {
            $this->db->where('h_id', $value);
            $this->db->update('hizmet', ['order_id' => $key]);
        }
        return true;
    }
    function get_hizmet()
    {
        $this->db->where('active', 1);
        $this->db->order_by('order_id ASC');
        $result = $this->db->get('hizmet')->result();
        $data = [];
        foreach ($result as $value) {
            if ($this->session->userdata('lang') == 'tr') {
                $test = [
                    'h_id' => $value->h_id,
                    'baslik' => $value->tr_baslik,
                    'slug' => $value->slug,
                ];
                array_push($data, $test);
            } elseif ($this->session->userdata('lang') == 'en') {
                $test = [
                    'h_id' => $value->h_id,
                    'baslik' => $value->en_baslik,
                    'slug' => $value->slug,
                ];
                array_push($data, $test);
            }
        }
        return $data;
    }
    public function gethizmet($link)
    {
        $result = $this->db->where('slug', $link)->get('hizmet')->row();
        if ($result) {
            if ($this->session->userdata('lang') == 'tr') {
                $test = [
                    'h_id' => $result->h_id,
                    'gkosb' => $result->gkosb,
                    'name' => $result->tr_name,
                    'baslik' => $result->tr_baslik,
                    'summary' => $result->tr_summary,
                    'content' => $result->tr_content,
                    'hakkinda' => $result->tr_hakkinda,
                    'gorsel1' => $result->gorsel1,
                    'gorsel2' => $result->gorsel2,
                    'gorsel3' => $result->gorsel3,
                    'gorsel4' => $result->gorsel4,
                    'slug' => $result->slug
                ];
            } elseif ($this->session->userdata('lang') == 'en') {
                $test = [
                    'h_id' => $result->h_id,
                    'gkosb' => $result->gkosb,
                    'name' => $result->en_name,
                    'baslik' => $result->en_baslik,
                    'summary' => $result->en_summary,
                    'content' => $result->en_content,
                    'hakkinda' => $result->en_hakkinda,
                    'gorsel1' => $result->gorsel1,
                    'gorsel2' => $result->gorsel2,
                    'gorsel3' => $result->gorsel3,
                    'gorsel4' => $result->gorsel4,
                    'slug' => $result->slug
                ];
            }
            return $test;
        } else {
            return false;
        }
    }
    public function hizmet_update($active, $id)
    {
        $data = [
            'active' => $active
        ];
        $this->db->where('h_id', $id);
        $result = $this->db->update('hizmet', $data);
        return $result;
    }
    public function did_delete_hizmet($id)
    {
        $this->db->where('h_id', $id);
        $this->db->delete('hizmet');
    }
    public function get_hizmetup($id)
    {
        $this->db->where('h_id', $id);
        $result = $this->db->get('hizmet')->row();
        return $result;
    }
    public function hizmetupdate($id, $data)
    {
        $this->db->where('h_id', $id);
        return $this->db->update("hizmet", $data);
    }
    //HİZMETLERİMİZ SON

    //DUYURULAR
    function duyuru_create($data)
    {
        return $this->db->insert('duyuru', $data);
    }

    function get_duyurus()
    {
        return $this->db->order_by('order_id ASC')->get('duyuru')->result_array();
    }
    public function update_duyuru_order($data)
    {
        foreach ($data['listItem'] as $key => $value) {
            $this->db->where('d_id', $value);
            $this->db->update('duyuru', ['order_id' => $key]);
        }
        return true;
    }
    function get_duyuru()
    {
        $this->db->where('active', 1);
        $this->db->order_by('order_id ASC');
        $result = $this->db->get('duyuru')->result();
        $data = [];
        foreach ($result as $value) {
            if ($this->session->userdata('lang') == 'tr') {
                $test = [
                    'd_id' => $value->d_id,
                    'anabaslik' => $value->tr_anabaslik,
                    'name' => $value->tr_name,
                    'date' => $value->date,
                    'summary' => $value->tr_summary,
                    'content' => $value->tr_content,
                    'gorsel1' => $value->gorsel1,
                    'gorsel2' => $value->gorsel2,
                    'gorsel3' => $value->gorsel3,
                    'gorsel4' => $value->gorsel4,
                    'slug' => $value->slug,
                ];
                array_push($data, $test);
            } elseif ($this->session->userdata('lang') == 'en') {
                $test = [
                    'd_id' => $value->d_id,
                    'anabaslik' => $value->en_anabaslik,
                    'name' => $value->en_name,
                    'date' => $value->date,
                    'summary' => $value->en_summary,
                    'content' => $value->en_content,
                    'gorsel1' => $value->gorsel1,
                    'gorsel2' => $value->gorsel2,
                    'gorsel3' => $value->gorsel3,
                    'gorsel4' => $value->gorsel4,
                    'slug' => $value->slug,
                ];
                array_push($data, $test);
            }
        }
        return $data;
    }
    public function duyuru_update($active, $id)
    {
        $data = [
            'active' => $active
        ];
        $this->db->where('d_id', $id);
        $result = $this->db->update('duyuru', $data);
        return $result;
    }
    public function did_delete_duyuru($id)
    {
        $this->db->where('d_id', $id);
        $this->db->delete('duyuru');
    }
    public function get_duyuruup($id)
    {
        $this->db->where('d_id', $id);
        $result = $this->db->get('duyuru')->row();
        return $result;
    }
    public function duyuruupdate($id, $data)
    {
        $this->db->where('d_id', $id);
        return $this->db->update("duyuru", $data);
    }
    public function getduyuru($link)
    {
        $result = $this->db->where('slug', $link)->get('duyuru')->row();
        if ($result) {
            if ($this->session->userdata('lang') == 'tr') {
                $test = [
                    'd_id' => $result->d_id,
                    'date' => $result->date,
                    'name' => $result->tr_name,
                    'anabaslik' => $result->tr_anabaslik,
                    'summary' => $result->tr_summary,
                    'content' => $result->tr_content,
                    'gorsel1' => $result->gorsel1,
                    'gorsel2' => $result->gorsel2,
                    'gorsel3' => $result->gorsel3,
                    'gorsel4' => $result->gorsel4,
                    'slug' => $result->slug
                ];
            } elseif ($this->session->userdata('lang') == 'en') {
                $test = [
                    'd_id' => $result->d_id,
                    'date' => $result->date,
                    'name' => $result->en_name,
                    'anabaslik' => $result->en_anabaslik,
                    'summary' => $result->en_summary,
                    'content' => $result->en_content,
                    'gorsel1' => $result->gorsel1,
                    'gorsel2' => $result->gorsel2,
                    'gorsel3' => $result->gorsel3,
                    'gorsel4' => $result->gorsel4,
                    'slug' => $result->slug
                ];
            }
            return $test;
        } else {
            return false;
        }
    }
    //DUYURULAR SON

    //EKİP
    function team_create($data)
    {
        return $this->db->insert('team', $data);
    }
    function get_teams()
    {
        return $this->db->order_by('order_id ASC')->get('team')->result_array();
    }
    public function update_team_order($data)
    {
        foreach ($data['listItem'] as $key => $value) {
            $this->db->where('t_id', $value);
            $this->db->update('team', ['order_id' => $key]);
        }
        return true;
    }
    function get_team()
    {
        $this->db->where('active', 1);
        $this->db->order_by('order_id ASC');
        return $this->db->get('team')->result_array();
    }
    public function team_update($active, $id)
    {
        $data = [
            'active' => $active
        ];
        $this->db->where('t_id', $id);
        $result = $this->db->update('team', $data);
        return $result;
    }
    public function getteam()
    {
        $results = $this->db->get('team')->result_array();
        return $results;
    }
    public function did_delete_team($id)
    {
        $this->db->where('t_id', $id);
        $this->db->delete('team');
    }
    public function get_teamup($id)
    {
        $this->db->where('t_id', $id);
        $result = $this->db->get('team')->row();
        return $result;
    }
    public function teamupdate($id, $data)
    {
        $this->db->where('t_id', $id);
        return $this->db->update("team", $data);
    }
    //EKİP SON

    //YÖNETİM KURULU
    function yonetim_create($data)
    {
        return $this->db->insert('yonetim', $data);
    }
    function get_yonetims()
    {
        return $this->db->order_by('order_id ASC')->get('yonetim')->result_array();
    }
    public function update_yonetim_order($data)
    {
        foreach ($data['listItem'] as $key => $value) {
            $this->db->where('y_id', $value);
            $this->db->update('yonetim', ['order_id' => $key]);
        }
        return true;
    }
    function get_yonetim()
    {
        $this->db->where('active', 1);
        $this->db->order_by('order_id ASC');
        return $this->db->get('yonetim')->result_array();
    }
    public function yonetim_update($active, $id)
    {
        $data = [
            'active' => $active
        ];
        $this->db->where('y_id', $id);
        $result = $this->db->update('yonetim', $data);
        return $result;
    }
    public function getyonetim()
    {
        $results = $this->db->get('yonetim')->result_array();
        return $results;
    }
    public function did_delete_yonetim($id)
    {
        $this->db->where('y_id', $id);
        $this->db->delete('yonetim');
    }
    public function get_yonetimup($id)
    {
        $this->db->where('y_id', $id);
        $result = $this->db->get('yonetim')->row();
        return $result;
    }
    public function yonetimupdate($id, $data)
    {
        $this->db->where('y_id', $id);
        return $this->db->update("yonetim", $data);
    }
    //YÖNETİM KURULU

    //BÖLGE MÜDÜRLÜĞÜ
    function bolge_create($data)
    {
        return $this->db->insert('bolge', $data);
    }
    function get_bolge()
    {
        $this->db->where('active', 1);
        $this->db->order_by('order_id ASC');
        return $this->db->get('bolge')->result_array();
    }
    function get_bolges()
    {
        return $this->db->order_by('order_id ASC')->get('bolge')->result_array();
    }
    public function update_bolge_order($data)
    {
        foreach ($data['listItem'] as $key => $value) {
            $this->db->where('b_id', $value);
            $this->db->update('bolge', ['order_id' => $key]);
        }
        return true;
    }
    public function getbolge()
    {
        $results = $this->db->get('bolge')->result_array();
        return $results;
    }
    public function bolge_update($active, $id)
    {
        $data = [
            'active' => $active
        ];
        $this->db->where('b_id', $id);
        $result = $this->db->update('bolge', $data);
        return $result;
    }
    public function did_delete_bolge($id)
    {
        $this->db->where('b_id', $id);
        $this->db->delete('bolge');
    }
    public function get_bolgeup($id)
    {
        $this->db->where('b_id', $id);
        $result = $this->db->get('bolge')->row();
        return $result;
    }
    public function bolgeupdate($id, $data)
    {
        $this->db->where('b_id', $id);
        return $this->db->update("bolge", $data);
    }
    //YÖNETİM KURULU

    //DENETİM KURULU
    function denetim_create($data)
    {
        return $this->db->insert('denetim', $data);
    }
    function get_denetim()
    {
        $this->db->where('active', 1);
        $this->db->order_by('order_id ASC');
        return $this->db->get('denetim')->result_array();
    }
    function get_denetims()
    {
        return $this->db->order_by('order_id ASC')->get('denetim')->result_array();
    }
    public function denetim_update($active, $id)
    {
        $data = [
            'active' => $active
        ];
        $this->db->where('d_id', $id);
        $result = $this->db->update('denetim', $data);
        return $result;
    }
    public function update_denetim_order($data)
    {
        foreach ($data['listItem'] as $key => $value) {
            $this->db->where('d_id', $value);
            $this->db->update('denetim', ['order_id' => $key]);
        }
        return true;
    }
    public function getdenetim()
    {
        $results = $this->db->get('denetim')->result_array();
        return $results;
    }
    public function did_delete_denetim($id)
    {
        $this->db->where('d_id', $id);
        $this->db->delete('denetim');
    }
    public function get_denetimup($id)
    {
        $this->db->where('d_id', $id);
        $result = $this->db->get('denetim')->row();
        return $result;
    }
    public function denetimupdate($id, $data)
    {
        $this->db->where('d_id', $id);
        return $this->db->update("denetim", $data);
    }
    //DENETİM KURULU
    //FİRMALAR
    function firma_create($data)
    {
        return $this->db->insert('firma', $data);
    }
    function get_firmas()
    {
        return $this->db->order_by('order_id ASC')->get('firma')->result_array();
    }
    public function update_firma_order($data)
    {
        foreach ($data['listItem'] as $key => $value) {
            $this->db->where('f_id', $value);
            $this->db->update('firma', ['order_id' => $key]);
        }
        return true;
    }
    function get_firma()
    {
        $this->db->where('active', 1);
        $this->db->order_by('order_id ASC');
        return $this->db->get('firma')->result_array();
    }
    public function getfirma()
    {
        $results = $this->db->get('firma')->result_array();
        return $results;
    }
    public function firma_update($active, $id)
    {
        $data = [
            'active' => $active
        ];
        $this->db->where('f_id', $id);
        $result = $this->db->update('firma', $data);
        return $result;
    }
    public function did_delete_firma($id)
    {
        $this->db->where('f_id', $id);
        $this->db->delete('firma');
    }
    public function get_firmaup($id)
    {
        $this->db->where('f_id', $id);
        $result = $this->db->get('firma')->row();
        return $result;
    }
    public function firmaupdate($id, $data)
    {
        $this->db->where('f_id', $id);
        return $this->db->update("firma", $data);
    }
    //FİRMALAR SON

    public function did_delete_row($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('slider');
    }
}

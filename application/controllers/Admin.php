<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('vt');
		$this->load->model('resimekle');
		$control = session("oku", "adminlogin");
		if (!$control) {
			redirect('auth');
		}
	}
	public function index()
	{
		$this->load->view('back/admin');
	}
	// ANASAYFA DÜZENLE
	public function anasayfa()
	{
		$data['anasayfa'] = $this->vt->ans("anasayfa", array('a_id' => 1));
		$this->load->view('back/anasayfa', $data);
	}

	public function anasayfaup()
	{

		$config['upload_path'] = "assets/upload/anasayfa/";
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['remove_space'] = true;
		$data = array(
			'tr_hakkimizda' => postval('trhakkimizda'),
			'en_hakkimizda' => postval('enhakkimizda'),
			'tr_baslik' => postval('trbaslik'),
			'en_baslik' => postval('enbaslik'),

		);

		if (@$_FILES['gorsel']['name'] != null) {
			if (upimage($config, "gorsel") != "err") {
				$data['gorsel'] = upimage($config, "gorsel");
			}
		}

		$sonuc = $this->vt->update("anasayfa", array('a_id' => 1), $data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Anasayfa Ayarlarınız güncellendi.");
			redirect('admin/anasayfa');
		} else {
			flash("danger", "Hata!", "Anasayfa Ayarlarınız güncellenirken hata oluştu.");
			redirect('admin/anasayfa');
		}
	}
	//ANASAYFA SON
	// TEKNİK DÜZENLE
	public function teknik()
	{
		$data['teknik'] = $this->vt->ans("teknik", array('t_id' => 1));
		$this->load->view('back/teknik', $data);
	}

	public function teknikup()
	{
		$config['upload_path'] = "assets/upload/hakkimizda/";
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['remove_space'] = true;

		$data = array(
			'analitik' => postval('analitik'),
			'search' => postval('search'),
			'meta' => postval('meta'),


		);

		$sonuc = $this->vt->update("teknik", array('t_id' => 1), $data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Teknik Ayarlarınız güncellendi.");
			redirect('admin/teknik');
		} else {
			flash("danger", "Hata!", "Teknik Ayarlarınız güncellenirken hata oluştu.");
			redirect('admin/teknik');
		}
	}
	//TEKNİK SON
	// HAKKIMIZDA DÜZENLE
	public function hakkimizda()
	{
		$data['hakkimizda'] = $this->vt->ans("hakkimizda", array('h_id' => 1));
		$this->load->view('back/hakkimizda', $data);
	}

	public function hakkimizdaup()
	{

		$config['upload_path'] = "assets/upload/hakkimizda/";
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['remove_space'] = true;

		$data = array(
			'tr_hakkimizda' => postval('trhakkimizda'),
			'en_hakkimizda' => postval('enhakkimizda'),
			'tr_baslik' => postval('trbaslik'),
			'en_baslik' => postval('enbaslik'),

		);
		if (@$_FILES['gorsel']['name'] != null) {
			if (upimage($config, "gorsel") != "err") {
				$data['gorsel'] = upimage($config, "gorsel");
			}
		}

		$sonuc = $this->vt->update("hakkimizda", array('h_id' => 1), $data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Hakkımızda Ayarlarınız güncellendi.");
			redirect('admin/hakkimizda');
		} else {
			flash("danger", "Hata!", "Anasayfa Ayarlarınız güncellenirken hata oluştu.");
			redirect('admin/hakkimizda');
		}
	}
	//HAKKIMIZDA SON

	public function slider_update_order()
	{
		$this->vt->update_slider_order($this->input->get());
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function slider()
	{

		$data['slider'] = $this->vt->get_sliders();
		$this->load->view('back/slider', $data);
	}
	public function yenislider()
	{

		$this->load->view('back/yenislider');
	}

	public function sliderup()
	{

		$config['upload_path'] = "assets/upload/anasayfa/";
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		$data = array(
			'name' => postval('name'),
			'tr_metin' => postval('tr_metin'),
			'en_metin' => postval('en_metin'),
		);

		if (@$_FILES['gorsel']['name'] != null) {
			if (upimage($config, "gorsel") != "err") {
				$data['gorsel'] = upimage($config, "gorsel");
			}
		}

		$sonuc = $this->vt->slider_create($data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Slider Eklendi.");
			redirect('admin/slider');
		} else {
			echo "Hata!";
		}
	}
	public function delete_slider($id)
	{
		$this->load->model("vt");
		$this->vt->did_delete_slider($id);
		redirect('admin/slider');
	}

	public function delete_row($id)
	{
		$this->load->model("vt");
		$this->vt->did_delete_row($id);
		redirect('admin/slider');
	}


	//EKİP
	public function team_update_order()
	{
		$this->vt->update_team_order($this->input->get());
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function yeniteam()
	{
		$this->load->view('back/yeniteam');
	}
	public function yeniteamup()
	{

		$config['upload_path'] = "assets/upload/team/";
		$config['allowed_types'] = 'png|jpg|jpeg|svg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		$data = array(
			'name' => postval('name'),
			'trstatu' => postval('trstatu'),
			'enstatu' => postval('enstatu'),
			'kurum' => postval('kurum'),
			'facebook' => @postval('facebook'),
			'linkedin' => @postval('linkedin'),
			'instagram' => @postval('instagram'),
			'twitter' => @postval('twitter'),

		);
		if (@$_FILES['gorsel']['name'] != null) {
			if (upimage($config, "gorsel") != "err") {
				$data['gorsel'] = upimage($config, "gorsel");
			}
		}
		$sonuc = $this->vt->team_create($data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Yeni Üye Eklendi.");
			redirect('admin/team');
		} else {
			flash("danger", "Hata!", "Yeni Üye Eklenirken sorun oluştu.");
			redirect('admin/team');
		}
	}
	public function team()
	{
		$data['team'] = $this->vt->get_teams();
		$this->load->view('back/team', $data);
	}
	public function delete_team($id)
	{
		$this->load->model("vt");
		$this->vt->did_delete_team($id);
		redirect('admin/team');
	}

	public function teamduzenle($id)
	{
		$data['team'] = $this->vt->get_teamup($id);
		$this->load->view('back/editteam', $data);
	}
	public function teamupdate()
	{
		$config['upload_path'] = "assets/upload/team/";
		$config['allowed_types'] = 'png|jpg|jpeg|svg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		if ($this->input->post()) {
			$id = $this->input->post('h_id');
			$data = array(
				'name' => $this->input->post('name'),
				'trstatu' => $this->input->post('trstatu'),
				'enstatu' => $this->input->post('enstatu'),
				'kurum' => $this->input->post('kurum'),
				'facebook' => $this->input->post('facebook'),
				'linkedin' => $this->input->post('linkedin'),
				'instagram' => $this->input->post('instagram'),
				'linkedin' => $this->input->post('linkedin'),
			);
			if (@$_FILES['gorsel']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}

			$result = $this->vt->teamupdate($id, $data);
			if (@$result) {
				flash('success', 'Başarılı!', 'Üye Güncellendi!');
			} else {
				flash("danger", "Hata!", "Yeni Üye Güncellenirken sorun oluştu.");
			}
			redirect('admin/team');
		}
	}
	//EKİP SON

	//YÖNETİM KURULU
	public function yonetim_update_order()
	{
		$this->vt->update_yonetim_order($this->input->get());
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function yeniyonetim()
	{
		$this->load->view('back/yeniyonetim');
	}
	public function yeniyonetimup()
	{

		$config['upload_path'] = "assets/upload/yonetim/";
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		$data = array(
			'name' => postval('name'),
			'trstatu' => postval('trstatu'),
			'enstatu' => postval('enstatu'),
			'facebook' => @postval('facebook'),
			'linkedin' => @postval('linkedin'),
			'instagram' => @postval('instagram'),
			'twitter' => @postval('twitter'),

		);
		if (@$_FILES['gorsel']['name'] != null) {
			if (upimage($config, "gorsel") != "err") {
				$data['gorsel'] = upimage($config, "gorsel");
			}
		}
		$sonuc = $this->vt->yonetim_create($data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Yeni Üye Eklendi.");
			redirect('admin/yonetim');
		} else {
			flash("danger", "Hata!", "Yeni Üye Eklenirken sorun oluştu.");
			redirect('admin/yonetim');
		}
	}
	public function yonetim()
	{
		$data['yonetim'] = $this->vt->get_yonetims();
		$this->load->view('back/yonetim', $data);
	}
	public function delete_yonetim($id)
	{
		$this->load->model("vt");
		$this->vt->did_delete_yonetim($id);
		redirect('admin/yonetim');
	}

	public function yonetimduzenle($id)
	{
		$data['yonetim'] = $this->vt->get_yonetimup($id);
		$this->load->view('back/edityonetim', $data);
	}
	public function yonetimupdate()
	{
		$config['upload_path'] = "assets/upload/yonetim/";
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		if ($this->input->post()) {
			$id = $this->input->post('y_id');
			$data = array(
				'name' => $this->input->post('name'),
				'trstatu' => $this->input->post('trstatu'),
				'enstatu' => $this->input->post('enstatu'),
				'facebook' => $this->input->post('facebook'),
				'linkedin' => $this->input->post('linkedin'),
				'instagram' => $this->input->post('instagram'),
				'linkedin' => $this->input->post('linkedin'),
			);
			if (@$_FILES['gorsel']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}

			$result = $this->vt->yonetimupdate($id, $data);
			if (@$result) {
				flash('success', 'Başarılı!', 'Üye Güncellendi!');
			} else {
				flash("danger", "Hata!", "Yeni Üye Güncellenirken sorun oluştu.");
			}
			redirect('admin/yonetim');
		}
	}
	//YÖNETİM KURULU SON

	//BÖLGE MÜDÜRLÜĞÜ
	public function bolge_update_order()
	{
		$this->vt->update_bolge_order($this->input->get());
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function yenibolge()
	{
		$this->load->view('back/yenibolge');
	}
	public function yenibolgeup()
	{

		$config['upload_path'] = "assets/upload/bolge/";
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		$data = array(
			'name' => postval('name'),
			'trstatu' => postval('trstatu'),
			'enstatu' => postval('enstatu'),
			'tel' => postval('tel'),
			'mail' => postval('mail'),

		);
		if (@$_FILES['gorsel']['name'] != null) {
			if (upimage($config, "gorsel") != "err") {
				$data['gorsel'] = upimage($config, "gorsel");
			}
		}
		$sonuc = $this->vt->bolge_create($data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Yeni Üye Eklendi.");
			redirect('admin/bolge');
		} else {
			flash("danger", "Hata!", "Yeni Üye Eklenirken sorun oluştu.");
			redirect('admin/bolge');
		}
	}
	public function bolge()
	{
		$data['bolge'] = $this->vt->get_bolges();
		$this->load->view('back/bolge', $data);
	}
	public function delete_bolge($id)
	{
		$this->load->model("vt");
		$this->vt->did_delete_bolge($id);
		redirect('admin/bolge');
	}

	public function bolgeduzenle($id)
	{
		$data['bolge'] = $this->vt->get_bolgeup($id);
		$this->load->view('back/editbolge', $data);
	}
	public function bolgeupdate()
	{
		$config['upload_path'] = "assets/upload/bolge/";
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		if ($this->input->post()) {
			$id = $this->input->post('b_id');
			$data = array(
				'name' => $this->input->post('name'),
				'trstatu' => $this->input->post('trstatu'),
				'enstatu' => $this->input->post('enstatu'),
				'tel' => $this->input->post('tel'),
				'mail' => $this->input->post('mail'),
			);
			if (@$_FILES['gorsel']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}

			$result = $this->vt->bolgeupdate($id, $data);
			if (@$result) {
				flash('success', 'Başarılı!', 'Üye Güncellendi!');
			} else {
				flash("danger", "Hata!", "Yeni Üye Güncellenirken sorun oluştu.");
			}
			redirect('admin/bolge');
		}
	}
	//BÖLGE MÜDÜRLÜĞÜ SON

	//DENETİM KURULU
	public function denetim_update_order()
	{
		$this->vt->update_denetim_order($this->input->get());
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function yenidenetim()
	{
		$this->load->view('back/yenidenetim');
	}
	public function yenidenetimup()
	{

		$config['upload_path'] = "assets/upload/denetim/";
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		$data = array(
			'name' => postval('name'),
			'statu' => postval('statu'),
			'facebook' => @postval('facebook'),
			'linkedin' => @postval('linkedin'),
			'instagram' => @postval('instagram'),
			'twitter' => @postval('twitter'),

		);
		if (@$_FILES['gorsel']['name'] != null) {
			if (upimage($config, "gorsel") != "err") {
				$data['gorsel'] = upimage($config, "gorsel");
			}
		}
		$sonuc = $this->vt->denetim_create($data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Yeni Üye Eklendi.");
			redirect('admin/denetim');
		} else {
			flash("danger", "Hata!", "Yeni Üye Eklenirken sorun oluştu.");
			redirect('admin/denetim');
		}
	}
	public function denetim()
	{
		$data['denetim'] = $this->vt->get_denetims();
		$this->load->view('back/denetim', $data);
	}
	public function delete_denetim($id)
	{
		$this->load->model("vt");
		$this->vt->did_delete_denetim($id);
		redirect('admin/denetim');
	}

	public function denetimduzenle($id)
	{
		$data['denetim'] = $this->vt->get_denetimup($id);
		$this->load->view('back/editdenetim', $data);
	}
	public function denetimupdate()
	{
		$config['upload_path'] = "assets/upload/denetim/";
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		if ($this->input->post()) {
			$id = $this->input->post('d_id');
			$data = array(
				'name' => $this->input->post('name'),
				'statu' => $this->input->post('statu'),
				'facebook' => $this->input->post('facebook'),
				'linkedin' => $this->input->post('linkedin'),
				'instagram' => $this->input->post('instagram'),
				'linkedin' => $this->input->post('linkedin'),
			);
			if (@$_FILES['gorsel']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}

			$result = $this->vt->denetimupdate($id, $data);
			if (@$result) {
				flash('success', 'Başarılı!', 'Üye Güncellendi!');
			} else {
				flash("danger", "Hata!", "Yeni Üye Güncellenirken sorun oluştu.");
			}
			redirect('admin/denetim');
		}
	}
	//DENETİM KURULU SON

	//HEADER BAŞLANGIC
	public function header()
	{

		$data['header'] = $this->vt->ans("header", array('h_id' => 1));
		$this->load->view('back/header', $data);
	}
	public function headerup()
	{

		$config['upload_path'] = "assets/upload/header/";
		$config['allowed_types'] = 'png|svg|jpg';
		$config['remove_space'] = true;

		$data = array(
			'title' => postval('title'),
		);
		if (@$_FILES['logo']['name'] != null) {
			if (upimage($config, "logo") != "err") {
				$data['logo'] = upimage($config, "logo");
			}
		}
		if (@$_FILES['favicon']['name'] != null) {
			if (upimage($config, "favicon") != "err") {
				$data['favicon'] = upimage($config, "favicon");
			}
		}

		$sonuc = $this->vt->update("header", array('h_id' => 1), $data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Header Kısmı güncellendi.");
			redirect('admin/header');
		} else {
			flash("danger", "Hata!", "Header Kısmı güncellenirken hata oluştu.");
			redirect('admin/header');
		}
	}
	//HEADER BİTİŞ

	//İLETİŞİM FORMU 
	public function iletisimform()
	{
		$data['contact_form'] = $this->vt->get_contact_forms();
		$this->load->view('back/iletisimform', $data);
	}
	//İLETİŞİM FORMU SON

	//FOOTER BAŞLANGIÇ
	public function footer()
	{
		$data['footer'] = $this->vt->ans("footer", array('f_id' => 1));
		$this->load->view('back/footer', $data);
	}
	public function footerup()
	{

		$config['upload_path'] = "assets/upload/footer/";
		$config['allowed_types'] = 'png|svg';
		$config['remove_space'] = true;

		$data = array(
			'tr_hakkimizda' => postval('trhakkimizda'),
			'en_hakkimizda' => postval('enhakkimizda'),
			'mail' => postval('mail'),
			'kep' => postval('kep'),
			'adres' => postval('adres'),
			'tel1' => postval('tel1'),
			'tel2' => postval('tel2'),
			'tel3' => postval('tel3'),
			'faks' => postval('faks'),
			'facebook' => postval('facebook'),
			'twitter' => postval('twitter'),
			'instagram' => postval('instagram'),
			'linkedin' => postval('linkedin'),
		);

		if (@$_FILES['logo']['name'] != null) {
			if (upimage($config, "logo") != "err") {
				$data['logo'] = upimage($config, "logo");
			}
		}

		$sonuc = $this->vt->update("footer", array('f_id' => 1), $data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Footer Bilgileri güncellendi.");
			redirect('admin/footer');
		} else {
			flash("danger", "Hata!", "Footer Bilgileri güncellenirken sorun oluştu.");
			redirect('admin/footer');
		}
	}
	//FOOTER BİTİŞ

	//FİRMALAR
	public function firma_update_order()
	{
		$this->vt->update_firma_order($this->input->get());
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function yenifirma()
	{
		$this->load->view('back/yenifirma');
	}
	public function yenifirmaup()
	{

		$config['upload_path'] = "assets/upload/firma/";
		$config['allowed_types'] = 'png|jpg|jpeg|svg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		$data = array(
			'name' => postval('name'),
			'link' => postval('link'),
			'adres' => postval('adres'),
			'tel' => postval('tel'),
			'mail' => postval('mail'),
			'lokasyon' => postval('lokasyon'),
			'web' => postval('web'),
			'faks' => postval('faks'),


		);
		if (@$_FILES['gorsel']['name'] != null) {
			if (upimage($config, "gorsel") != "err") {
				$data['gorsel'] = upimage($config, "gorsel");
			}
		}
		$sonuc = $this->vt->firma_create($data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Yeni Firma Eklendi.");
			redirect('admin/firma');
		} else {
			flash("danger", "Hata!", "Yeni Firma Eklenirken sorun oluştu.");
			redirect('admin/firma');
		}
	}
	public function firma()
	{
		$data['firma'] = $this->vt->get_firmas();
		$this->load->view('back/firma', $data);
	}
	public function delete_firma($id)
	{
		$this->load->model("vt");
		$this->vt->did_delete_firma($id);
		redirect('admin/firma');
	}
	public function firmaduzenle($id)
	{
		$data['firma'] = $this->vt->get_firmaup($id);
		$this->load->view('back/editfirma', $data);
	}
	public function firmaupdate()
	{
		$config['upload_path'] = "assets/upload/firma/";
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		if ($this->input->post()) {
			$id = $this->input->post('f_id');
			$data = array(
				'name' => $this->input->post('name'),
				'link' => $this->input->post('link'),
				'adres' => $this->input->post('adres'),
				'tel' => $this->input->post('tel'),
				'mail' => $this->input->post('mail'),
				'faks' => $this->input->post('faks'),
				'lokasyon' => $this->input->post('lokasyon'),
				'web' => $this->input->post('web'),

			);
			if (@$_FILES['gorsel']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}

			$result = $this->vt->firmaupdate($id, $data);
			if (@$result) {
				flash('success', 'Başarılı!', 'Firma Güncellendi!');
			} else {
				flash("danger", "Hata!", "Firma Güncellenirken sorun oluştu.");
			}
			redirect('admin/firma');
		}
	}
	//FİRMALAR SON

	//MEVZUATLAR
	public function mevzuat_update_order()
	{
		$this->vt->update_mevzuat_order($this->input->get());
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function yenimevzuat()
	{
		$this->load->view('back/yenimevzuat');
	}
	public function yenimevzuatup()
	{
		$config['upload_path'] = "assets/upload/mevzuat/";
		$config['allowed_types'] = 'png|jpg|jpeg|svg|doc|docx|docm|dot|pdf';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		$data = array(
			'tr_name' => @postval('tr_name'),
			'en_name' => @postval('en_name'),
			'tr_baslik' => @postval('tr_baslik'),
			'tr_baslik' => @postval('tr_baslik'),
			'link' => @postval('link'),
			'en_baslik' => @postval('en_baslik'),
			'slug' => @sef($this->input->post('tr_baslik')),

		);
		if (@$_FILES['doc']['name'] != null) {
			if (upimage($config, "doc") != "err") {
				$data['doc'] = upimage($config, "doc");
			}
		}

		$sonuc = $this->vt->mevzuat_create($data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Yeni Mevzuat Eklendi.");
			redirect('admin/mevzuat');
		} else {
			flash("danger", "Hata!", "Yeni Mevzuat Eklenirken sorun oluştu.");
			redirect('admin/mevzuat');
		}
	}
	public function mevzuat()
	{
		$data['mevzuat'] = $this->vt->get_mevzuats();
		$this->load->view('back/mevzuat', $data);
	}
	public function delete_mevzuat($id)
	{
		$this->load->model("vt");
		$this->vt->did_delete_mevzuat($id);
		redirect('admin/mevzuat');
	}
	public function mevzuatduzenle($id)
	{
		$data['mevzuat'] = $this->vt->get_mevzuatup($id);
		$this->load->view('back/editmevzuat', $data);
	}
	public function mevzuatupdate()
	{
		$config['upload_path'] = "assets/upload/mevzuat/";
		$config['allowed_types'] = 'png|jpg|jpeg|svg|doc|docx|docm|dot|pdf';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		if ($this->input->post()) {
			$id = $this->input->post('m_id');
			$data = array(
				'tr_name' => $this->input->post('tr_name'),
				'en_name' => $this->input->post('en_name'),
				'tr_baslik' => $this->input->post('tr_baslik'),
				'link' => $this->input->post('link'),
				'en_baslik' => $this->input->post('en_baslik'),
				'slug' => @sef($this->input->post('tr_baslik')),
			);
			if (@$_FILES['doc']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('doc')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['doc'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}
			$result = $this->vt->mevzuatupdate($id, $data);
			if (@$result) {
				flash('success', 'Başarılı!', 'Mevzuat Güncellendi!');
			} else {
				flash("danger", "Hata!", "Mevzuat Güncellenirken sorun oluştu.");
			}
			redirect('admin/mevzuat');
		}
	}
	//MEVZUATLAR SON

	//FORMLAR
	public function yeniformlar()
	{
		$this->load->view('back/yeniformlar');
	}
	public function formlar_update_order()
	{
		$this->vt->update_formlar_order($this->input->get());
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function yeniformlarup()
	{
		$config['upload_path'] = "assets/upload/formlar/";
		$config['allowed_types'] = 'png|jpg|jpeg|svg|doc|docx|docm|dot|pdf';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		$data = array(
			'tr_name' => @postval('tr_name'),
			'en_name' => @postval('en_name'),
			'tr_baslik' => @postval('tr_baslik'),
			'en_baslik' => @postval('en_baslik'),
			'slug' => @sef($this->input->post('tr_baslik')),

		);
		if (@$_FILES['doc']['name'] != null) {
			if (upimage($config, "doc") != "err") {
				$data['doc'] = upimage($config, "doc");
			}
		}

		$sonuc = $this->vt->formlar_create($data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Yeni Form Eklendi.");
			redirect('admin/formlar');
		} else {
			flash("danger", "Hata!", "Yeni Form Eklenirken sorun oluştu.");
			redirect('admin/formlar');
		}
	}
	public function formlar()
	{
		$data['formlar'] = $this->vt->get_formlars();
		$this->load->view('back/formlar', $data);
	}
	public function delete_formlar($id)
	{
		$this->load->model("vt");
		$this->vt->did_delete_formlar($id);
		redirect('admin/formlar');
	}
	public function formlarduzenle($id)
	{
		$data['formlar'] = $this->vt->get_formlarup($id);
		$this->load->view('back/editformlar', $data);
	}
	public function formlarupdate()
	{
		$config['upload_path'] = "assets/upload/formlar/";
		$config['allowed_types'] = 'png|jpg|jpeg|svg|doc|docx|docm|dot|pdf';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		if ($this->input->post()) {
			$id = $this->input->post('f_id');
			$data = array(
				'tr_name' => $this->input->post('tr_name'),
				'en_name' => $this->input->post('en_name'),
				'tr_baslik' => $this->input->post('tr_baslik'),
				'en_baslik' => $this->input->post('en_baslik'),
				'slug' => @sef($this->input->post('tr_baslik')),
			);
			if (@$_FILES['doc']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('doc')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['doc'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}
			$result = $this->vt->formlarupdate($id, $data);
			if (@$result) {
				flash('success', 'Başarılı!', 'Form Güncellendi!');
			} else {
				flash("danger", "Hata!", "Form Güncellenirken sorun oluştu.");
			}
			redirect('admin/formlar');
		}
	}
	//FORMLAR SON

	//HABERLER
	public function yenihaber()
	{
		$this->load->view('back/yenihaber');
	}
	public function haber_update_order()
	{
		$this->vt->update_haber_order($this->input->get());
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function yenihaberup()
	{
		$config['upload_path'] = "assets/upload/haber/";
		$config['allowed_types'] = 'png|jpg|jpeg|svg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		$data = array(
			'tr_name' => @postval('tr_name'),
			'en_name' => @postval('en_name'),
			'date' => @postval('date'),
			'tr_anabaslik' => @postval('tr_anabaslik'),
			'en_anabaslik' => @postval('en_anabaslik'),
			'slug' => @sef($this->input->post('tr_anabaslik')),
			'tr_summary' => @postval('tr_summary'),
			'en_summary' => @postval('en_summary'),
			'tr_content' => @postval('tr_content'),
			'en_content' => @postval('en_content')

		);
		if (@$_FILES['gorsel1']['name'] != null) {
			if (upimage($config, "gorsel1") != "err") {
				$data['gorsel1'] = upimage($config, "gorsel1");
			}
		}
		if (@$_FILES['gorsel2']['name'] != null) {
			if (upimage($config, "gorsel2") != "err") {
				$data['gorsel2'] = upimage($config, "gorsel2");
			}
		}
		if (@$_FILES['gorsel3']['name'] != null) {
			if (upimage($config, "gorsel3") != "err") {
				$data['gorsel3'] = upimage($config, "gorsel3");
			}
		}
		if (@$_FILES['gorsel4']['name'] != null) {
			if (upimage($config, "gorsel4") != "err") {
				$data['gorsel4'] = upimage($config, "gorsel4");
			}
		}

		$sonuc = $this->vt->haber_create($data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Yeni Haber Eklendi.");
			redirect('admin/haber');
		} else {
			flash("danger", "Hata!", "Yeni Haber Eklenirken sorun oluştu.");
			redirect('admin/haber');
		}
	}
	public function haber()
	{
		$data['haber'] = $this->vt->get_habers();
		$this->load->view('back/haber', $data);
	}
	public function delete_haber($id)
	{
		$this->load->model("vt");
		$this->vt->did_delete_haber($id);
		redirect('admin/haber');
	}
	public function haberduzenle($id)
	{
		$data['haber'] = $this->vt->get_haberup($id);
		$this->load->view('back/edithaber', $data);
	}
	public function haberupdate()
	{
		$config['upload_path'] = "assets/upload/haber/";
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		if ($this->input->post()) {
			$id = $this->input->post('h_id');
			$data = array(
				'tr_name' => $this->input->post('tr_name'),
				'en_name' => $this->input->post('en_name'),
				'date' => $this->input->post('date'),
				'tr_anabaslik' => $this->input->post('tr_anabaslik'),
				'en_anabaslik' => $this->input->post('en_anabaslik'),
				'slug' => @sef($this->input->post('tr_anabaslik')),
				'tr_content' => $this->input->post('tr_content'),
				'en_content' => $this->input->post('en_content'),
				'en_summary' => $this->input->post('en_summary'),
				'tr_summary' => $this->input->post('tr_summary'),
			);
			if (@$_FILES['gorsel1']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel1')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel1'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}
			if (@$_FILES['gorsel2']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel2')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel2'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}
			if (@$_FILES['gorsel3']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel3')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel3'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}
			if (@$_FILES['gorsel4']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel4')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel4'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}

			$result = $this->vt->haberupdate($id, $data);
			if (@$result) {
				flash('success', 'Başarılı!', 'Haber Güncellendi!');
			} else {
				flash("danger", "Hata!", "Haber Güncellenirken sorun oluştu.");
			}
			redirect('admin/haber');
		}
	}
	//HABERLER SON

	//HİZMETLERİMİZ
	public function hizmet_update_order()
	{
		$this->vt->update_hizmet_order($this->input->get());
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function yenihizmet()
	{
		$this->load->view('back/yenihizmet');
	}
	public function yenihizmetup()
	{
		$config['upload_path'] = "assets/upload/hizmet/";
		$config['allowed_types'] = 'png|jpg|jpeg|svg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		$data = array(
			'tr_name' => @postval('tr_name'),
			'en_name' => @postval('en_name'),
			'tr_baslik' => @postval('tr_baslik'),
			'en_baslik' => @postval('en_baslik'),
			'tr_hakkinda' => @postval('trhakkinda'),
			'en_hakkinda' => @postval('enhakkinda'),
			'slug' => @sef($this->input->post('tr_baslik')),
			'tr_summary' => @postval('tr_summary'),
			'en_summary' => @postval('en_summary'),
			'tr_content' => @postval('tr_content'),
			'en_content' => @postval('en_content')

		);
		if (@$_FILES['gorsel1']['name'] != null) {
			if (upimage($config, "gorsel1") != "err") {
				$data['gorsel1'] = upimage($config, "gorsel1");
			}
		}
		if (@$_FILES['gorsel2']['name'] != null) {
			if (upimage($config, "gorsel2") != "err") {
				$data['gorsel2'] = upimage($config, "gorsel2");
			}
		}
		if (@$_FILES['gorsel3']['name'] != null) {
			if (upimage($config, "gorsel3") != "err") {
				$data['gorsel3'] = upimage($config, "gorsel3");
			}
		}
		if (@$_FILES['gorsel4']['name'] != null) {
			if (upimage($config, "gorsel4") != "err") {
				$data['gorsel4'] = upimage($config, "gorsel4");
			}
		}

		$sonuc = $this->vt->hizmet_create($data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Yeni Hizmet Eklendi.");
			redirect('admin/hizmet');
		} else {
			flash("danger", "Hata!", "Yeni Hizmet Eklenirken sorun oluştu.");
			redirect('admin/hizmet');
		}
	}
	public function hizmet()
	{
		$data['hizmet'] = $this->vt->get_hizmets();
		$this->load->view('back/hizmet', $data);
	}
	public function delete_hizmet($id)
	{
		$this->load->model("vt");
		$this->vt->did_delete_hizmet($id);
		redirect('admin/hizmet');
	}
	public function hizmetduzenle($id)
	{
		$data['hizmet'] = $this->vt->get_hizmetup($id);
		$this->load->view('back/edithizmet', $data);
	}
	public function hizmetupdate()
	{
		$config['upload_path'] = "assets/upload/hizmet/";
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		if ($this->input->post()) {
			$id = $this->input->post('h_id');
			$data = array(
				'tr_name' => $this->input->post('tr_name'),
				'en_name' => $this->input->post('en_name'),
				'gkosb' => $this->input->post('gkosb'),
				'tr_baslik' => $this->input->post('tr_baslik'),
				'en_baslik' => $this->input->post('en_baslik'),
				'tr_hakkinda' => $this->input->post('trhakkinda'),
				'en_hakkinda' => $this->input->post('enhakkinda'),
				'slug' => @sef($this->input->post('tr_baslik')),
				'tr_content' => $this->input->post('tr_content'),
				'en_content' => $this->input->post('en_content'),
				'en_summary' => $this->input->post('en_summary'),
				'tr_summary' => $this->input->post('tr_summary'),
			);
			if (@$_FILES['gorsel1']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel1')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel1'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}
			if (@$_FILES['gorsel2']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel2')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel2'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}
			if (@$_FILES['gorsel3']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel3')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel3'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}
			if (@$_FILES['gorsel4']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel4')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel4'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}

			$result = $this->vt->hizmetupdate($id, $data);
			if (@$result) {
				flash('success', 'Başarılı!', 'Hizmet Güncellendi!');
			} else {
				flash("danger", "Hata!", "Hizmet Güncellenirken sorun oluştu.");
			}
			redirect('admin/hizmet');
		}
	}
	//HİZMETLERİMİZ SON

	//DUYURULAR
	public function duyuru_update_order()
	{
		$this->vt->update_duyuru_order($this->input->get());
		redirect($_SERVER['HTTP_REFERER']);
	}
	public function yeniduyuru()
	{
		$this->load->view('back/yeniduyuru');
	}
	public function yeniduyuruup()
	{
		$config['upload_path'] = "assets/upload/duyuru/";
		$config['allowed_types'] = 'png|jpg|jpeg|svg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		$data = array(
			'tr_name' => @postval('tr_name'),
			'en_name' => @postval('en_name'),
			'date' => @postval('date'),
			'tr_anabaslik' => @postval('tr_anabaslik'),
			'en_anabaslik' => @postval('en_anabaslik'),
			'slug' => @sef($this->input->post('tr_anabaslik')),
			'tr_summary' => @postval('tr_summary'),
			'en_summary' => @postval('en_summary'),
			'tr_content' => @postval('tr_content'),
			'en_content' => @postval('en_content')

		);
		if (@$_FILES['gorsel1']['name'] != null) {
			if (upimage($config, "gorsel1") != "err") {
				$data['gorsel1'] = upimage($config, "gorsel1");
			}
		}
		if (@$_FILES['gorsel2']['name'] != null) {
			if (upimage($config, "gorsel2") != "err") {
				$data['gorsel2'] = upimage($config, "gorsel2");
			}
		}
		if (@$_FILES['gorsel3']['name'] != null) {
			if (upimage($config, "gorsel3") != "err") {
				$data['gorsel3'] = upimage($config, "gorsel3");
			}
		}
		if (@$_FILES['gorsel4']['name'] != null) {
			if (upimage($config, "gorsel4") != "err") {
				$data['gorsel4'] = upimage($config, "gorsel4");
			}
		}

		$sonuc = $this->vt->duyuru_create($data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Yeni Duyuru Eklendi.");
			redirect('admin/duyuru');
		} else {
			flash("danger", "Hata!", "Yeni Duyuru Eklenirken sorun oluştu.");
			redirect('admin/duyuru');
		}
	}
	public function duyuru()
	{
		$data['duyuru'] = $this->vt->get_duyurus();
		$this->load->view('back/duyuru', $data);
	}
	public function delete_duyuru($id)
	{
		$this->load->model("vt");
		$this->vt->did_delete_duyuru($id);
		redirect('admin/duyuru');
	}
	public function duyuruduzenle($id)
	{
		$data['duyuru'] = $this->vt->get_duyuruup($id);
		$this->load->view('back/editduyuru', $data);
	}
	public function duyuruupdate()
	{
		$config['upload_path'] = "assets/upload/duyuru/";
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['encrypt_name'] = TRUE;
		$config['remove_space'] = true;

		if ($this->input->post()) {
			$id = $this->input->post('d_id');
			$data = array(
				'tr_name' => $this->input->post('tr_name'),
				'en_name' => $this->input->post('en_name'),
				'date' => $this->input->post('date'),
				'tr_anabaslik' => $this->input->post('tr_anabaslik'),
				'en_anabaslik' => $this->input->post('en_anabaslik'),
				'slug' => @sef($this->input->post('tr_anabaslik')),
				'tr_content' => $this->input->post('tr_content'),
				'en_content' => $this->input->post('en_content'),
				'en_summary' => $this->input->post('en_summary'),
				'tr_summary' => $this->input->post('tr_summary'),
			);
			if (@$_FILES['gorsel1']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel1')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel1'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}
			if (@$_FILES['gorsel2']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel2')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel2'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}
			if (@$_FILES['gorsel3']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel3')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel3'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}
			if (@$_FILES['gorsel4']['name'] != null) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('gorsel4')) {
					$resim = $this->upload->data();
					$resimadi = $resim['file_name'];
					$kayityolu = $config['upload_path'] . $resimadi;
					$data['gorsel4'] = $kayityolu;
				} else {
					if ($this->upload->display_errors() == "<p>err</p>") {
						return "err";
					} else {
						flash("danger", "Resim Yüklenemedi!", $this->upload->display_errors());
						redirect('admin');
					}
				}
				unlink($this->input->post('old_gorsel'));
			}

			$result = $this->vt->duyuruupdate($id, $data);
			if (@$result) {
				flash('success', 'Başarılı!', 'Duyuru Güncellendi!');
			} else {
				flash("danger", "Hata!", "Duyuru Güncellenirken sorun oluştu.");
			}
			redirect('admin/duyuru');
		}
	}
	//DUYURULAR SON


	public function duyuru_update($did = null, $active = null)
	{
		if ($did == null || $active == null) {
			echo "sıkıntılı yerdesin";
		} else {
			$result = $this->vt->duyuru_update($active, $did);
			if ($result == true) {
				if ($active == 1) {
					flash('success', 'Başarılı!', 'Duyuru Aktif!');
				} else {
					flash('success', 'Başarılı!', 'Duyuru Pasif!');
				}
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				echo "warning";
			}
		}
	}
	public function slider_update($id = null, $active = null)
	{
		if ($id == null || $active == null) {
			echo "sıkıntılı yerdesin";
		} else {
			$result = $this->vt->slider_update($active, $id);
			if ($result == true) {
				if ($active == 1) {
					flash('success', 'Başarılı!', 'Slider Aktif!');
				} else {
					flash('success', 'Başarılı!', 'Slider Pasif!');
				}
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				echo "warning";
			}
		}
	}
	public function bolge_update($bid = null, $active = null)
	{
		if ($bid == null || $active == null) {
			echo "sıkıntılı yerdesin";
		} else {
			$result = $this->vt->bolge_update($active, $bid);
			if ($result == true) {
				if ($active == 1) {
					flash('success', 'Başarılı!', 'Bölge Aktif!');
				} else {
					flash('success', 'Başarılı!', 'Bölge Pasif!');
				}
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				echo "warning";
			}
		}
	}
	public function denetim_update($did = null, $active = null)
	{
		if ($did == null || $active == null) {
			echo "sıkıntılı yerdesin";
		} else {
			$result = $this->vt->denetim_update($active, $did);
			if ($result == true) {
				if ($active == 1) {
					flash('success', 'Başarılı!', 'Üye Aktif!');
				} else {
					flash('success', 'Başarılı!', 'Üye Pasif!');
				}
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				echo "warning";
			}
		}
	}
	public function team_update($hid = null, $active = null)
	{
		if ($hid == null || $active == null) {
			echo "sıkıntılı yerdesin";
		} else {
			$result = $this->vt->team_update($active, $hid);
			if ($result == true) {
				if ($active == 1) {
					flash('success', 'Başarılı!', 'Üye Aktif!');
				} else {
					flash('success', 'Başarılı!', 'Üye Pasif!');
				}
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				echo "warning";
			}
		}
	}
	public function yonetim_update($yid = null, $active = null)
	{
		if ($yid == null || $active == null) {
			echo "sıkıntılı yerdesin";
		} else {
			$result = $this->vt->yonetim_update($active, $yid);
			if ($result == true) {
				if ($active == 1) {
					flash('success', 'Başarılı!', 'Üye Aktif!');
				} else {
					flash('success', 'Başarılı!', 'Üye Pasif!');
				}
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				echo "warning";
			}
		}
	}
	public function hizmet_update($hid = null, $active = null)
	{
		if ($hid == null || $active == null) {
			echo "sıkıntılı yerdesin";
		} else {
			$result = $this->vt->hizmet_update($active, $hid);
			if ($result == true) {
				if ($active == 1) {
					flash('success', 'Başarılı!', 'Hizmet Aktif!');
				} else {
					flash('success', 'Başarılı!', 'Hizmet Pasif!');
				}
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				echo "warning";
			}
		}
	}
	public function mevzuat_update($mid = null, $active = null)
	{
		if ($mid == null || $active == null) {
			echo "sıkıntılı yerdesin";
		} else {
			$result = $this->vt->mevzuat_update($active, $mid);
			if ($result == true) {
				if ($active == 1) {
					flash('success', 'Başarılı!', 'Mevzuat Aktif!');
				} else {
					flash('success', 'Başarılı!', 'Mevzuat Pasif!');
				}
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				echo "warning";
			}
		}
	}
	public function formlar_update($fid = null, $active = null)
	{
		if ($fid == null || $active == null) {
			echo "sıkıntılı yerdesin";
		} else {
			$result = $this->vt->formlar_update($active, $fid);
			if ($result == true) {
				if ($active == 1) {
					flash('success', 'Başarılı!', 'Form Aktif!');
				} else {
					flash('success', 'Başarılı!', 'Form Pasif!');
				}
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				echo "warning";
			}
		}
	}
	public function firma_update($fid = null, $active = null)
	{
		if ($fid == null || $active == null) {
			echo "sıkıntılı yerdesin";
		} else {
			$result = $this->vt->firma_update($active, $fid);
			if ($result == true) {
				if ($active == 1) {
					flash('success', 'Başarılı!', 'Firma Aktif!');
				} else {
					flash('success', 'Başarılı!', 'Firma Pasif!');
				}
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				echo "warning";
			}
		}
	}

	public function haber_update($hid = null, $active = null)
	{
		if ($hid == null || $active == null) {
			echo "sıkıntılı yerdesin";
		} else {
			$result = $this->vt->haber_update($active, $hid);
			if ($result == true) {
				if ($active == 1) {
					flash('success', 'Başarılı!', 'Haber Aktif!');
				} else {
					flash('success', 'Başarılı!', 'Haber Pasif!');
				}
				redirect($_SERVER['HTTP_REFERER']);
			} else {
				echo "warning";
			}
		}
	}

	public function profil()
	{
		$data['admin'] = $this->vt->carier("admin", array('id' => 1));
		$this->load->view('back/profil', $data);
	}
	public function adminup()
	{

		$config['upload_path'] = "assets/upload/back/";
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['remove_space'] = true;

		$data = array(
			'username' => postval('username'),
			'password' => postval('password'),


		);

		if (@$_FILES['gorsel']['name'] != null) {
			if (upimage($config, "gorsel") != "err") {
				$data['gorsel'] = upimage($config, "gorsel");
			}
		}

		$sonuc = $this->vt->update("admin", array('id' => 1), $data);
		if ($sonuc) {
			flash("success", "Başarılı!", "Profil Ekranınız güncellendi.");
			redirect('admin/profil');
		} else {
			echo "Hata!";
		}
	}
	public function sliderekle()
	{
		$this->load->view('back/slider');
	}
	public function slidergorsel()
	{
		$files = $_FILES;
		print_r($_FILES['imageupload']);
		exit;
		$cpt = count($_FILES['imageupload']['name']);
		for ($i = 0; $i < $cpt; $i++) {
			$_FILES['imageupload']['name']       = $files['imageupload']['name'][$i];
			$_FILES['imageupload']['type']       = $files['imageupload']['type'][$i];
			$_FILES['imageupload']['tmp_name']   = $files['imageupload']['tmp_name'][$i];
			$_FILES['imageupload']['error']      = $files['imageupload']['error'][$i];
			$_FILES['imageupload']['size']       = $files['imageupload']['size'][$i];

			$result = $this->resimekle->add_gallery_image('1', img_upload('imageupload'));
		}
		if (@$result == true) {
			flash('success', 'Başarılı!', 'Ürün ve Resim Eklendi!');
		} else {
			flash('error', 'Hata!', 'Ürün ve Resim Eklenirken Hata Oluşru!');
		}
		redirect('admin/sliderekle');
	}

	public function kullanimkilavuzu()
	{
		header('Content-Type: application/pdf');
		readfile('assets/upload/pdf/kilavuz.pdf');
	}

	public function cikis()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}

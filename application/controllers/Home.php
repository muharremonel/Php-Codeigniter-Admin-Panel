<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('vt');
	}

	public function index()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['haber'] = $this->vt->get_haber();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['duyuru'] = $this->vt->get_duyuru();
		$data['firma'] = $this->vt->get_firma();
		$data['slider'] = $this->vt->get_slider();
		$data['hizmet'] = $this->vt->get_hizmet();
		$this->load->view('front/home', $data);
	}



	public function iletisim()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['hizmet'] = $this->vt->get_hizmet();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$this->load->view('front/iletisim', $data);
	}
	public function tarihce()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['hizmet'] = $this->vt->get_hizmet();
		$this->load->view('front/tarihce', $data);
	}
	public function firmalar()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['firma'] = $this->vt->get_firma();
		$data['hizmet'] = $this->vt->get_hizmet();
		$this->load->view('front/firmalar', $data);
	}
	public function haberler()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['haber'] = $this->vt->get_haber();
		$data['hizmet'] = $this->vt->get_hizmet();
		$this->load->view('front/haberler', $data);
	}
	public function haberdetay($link)
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['haber'] = $this->vt->gethaber($link);
		if ($data['haber'] == false) {
			redirect('404');
		}
		$data['hizmet'] = $this->vt->get_hizmet();
		$this->load->view('front/haber-detay', $data);
	}
	public function hizmetdetay($link)
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['hizmetdetay'] = $this->vt->gethizmet($link);
		if ($data['hizmetdetay'] == false) {
			redirect('404');
		}

		$data['hizmet'] = $this->vt->get_hizmet();
		$this->load->view('front/hizmet-detay', $data);
	}
	public function mevzuatdetay($link)
	{
		$data['mevzuat_detay'] = $this->vt->getmevzuat($link);
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuatdetay'] = $this->vt->getmevzuat($link);
		if ($data['mevzuatdetay'] == false) {
			redirect('404');
		}
		$data['hizmet'] = $this->vt->get_hizmet();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$this->load->view('front/mevzuat-detay', $data);
	}
	public function mevzuat()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['haber'] = $this->vt->get_haber();
		$data['hizmet'] = $this->vt->get_hizmet();
		$this->load->view('front/mevzuat', $data);
	}
	public function formlardetay($link)
	{
		$data['form_detay'] = $this->vt->getformlar($link);
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['formlardetay'] = $this->vt->getformlar($link);
		if ($data['formlardetay'] == false) {
			redirect('404');
		}
		$data['hizmet'] = $this->vt->get_hizmet();
		$this->load->view('front/formlar-detay', $data);
	}
	public function formlar()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['haber'] = $this->vt->get_haber();
		$data['hizmet'] = $this->vt->get_hizmet();
		$this->load->view('front/formlar', $data);
	}

	public function duyurular()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['duyuru'] = $this->vt->get_duyuru();
		$data['hizmet'] = $this->vt->get_hizmet();
		$this->load->view('front/duyurular', $data);
	}
	public function duyurudetay($link)
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['duyuru'] = $this->vt->getduyuru($link);
		if ($data['duyuru'] == false) {
			redirect('404');
		}
		$data['hizmet'] = $this->vt->get_hizmet();
		$this->load->view('front/duyuru-detay', $data);
	}

	public function search()
	{

		$query = $this->input->get('term');
		if ($this->session->userdata('lang') == 'tr') {
			$haber = $this->db->like('tr_anabaslik', $query)->get('haber')->result();
			$duyuru = $this->db->like('tr_anabaslik', $query)->get('duyuru')->result();
			$hizmet = $this->db->like('tr_baslik', $query)->get('hizmet')->result();
		} elseif ($this->session->userdata('lang') == 'en') {
			$haber = $this->db->like('en_anabaslik', $query)->get('haber')->result();
			$duyuru = $this->db->like('en_anabaslik', $query)->get('duyuru')->result();
			$hizmet = $this->db->like('en_baslik', $query)->get('hizmet')->result();
		}
		$data = array();
		foreach ($haber as $value) {
			if ($this->session->userdata('lang') == 'tr') {
				$test = [
					'baslik' => $value->tr_anabaslik,
					'slug' => 'haberdetay/' . $value->slug,
					'gorsel' => $value->gorsel1
				];
				array_push($data, $test);
			} elseif ($this->session->userdata('lang') == 'en') {
				$test = [
					'baslik' => $value->en_anabaslik,
					'slug' => 'haberdetay/' . $value->slug,
					'gorsel' => $value->gorsel1
				];
				array_push($data, $test);
			}
		}
		foreach ($duyuru as $value) {
			if ($this->session->userdata('lang') == 'tr') {
				$test = [
					'baslik' => $value->tr_anabaslik,
					'slug' => 'duyurudetay/' . $value->slug,
					'gorsel' => $value->gorsel1
				];
				array_push($data, $test);
			} elseif ($this->session->userdata('lang') == 'en') {
				$test = [
					'baslik' => $value->en_anabaslik,
					'slug' => 'duyurudetay/' . $value->slug,
					'gorsel' => $value->gorsel1
				];
				array_push($data, $test);
			}
		}

		foreach ($hizmet as $value) {
			if ($this->session->userdata('lang') == 'tr') {
				$test = [
					'baslik' => $value->tr_baslik,
					'slug' => 'hizmetdetay/' . $value->slug,
					'gorsel' => $value->gorsel1
				];
				array_push($data, $test);
			} elseif ($this->session->userdata('lang') == 'en') {
				$test = [
					'baslik' => $value->en_baslik,
					'slug' => 'hizmetdetay/' . $value->slug,
					'gorsel' => $value->gorsel1
				];
				array_push($data, $test);
			}
		}
		echo json_encode($data);
	}
	public function hakkimizda()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['hizmet'] = $this->vt->get_hizmet();
		$this->load->view('front/hakkimizda', $data);
	}
	public function bolge()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['hizmet'] = $this->vt->get_hizmet();
		$data['bolge'] = $this->vt->get_bolge();
		$this->load->view('front/bolge', $data);
	}
	public function osbkanunu()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['hizmet'] = $this->vt->get_hizmet();
		$this->load->view('front/4562-sayili-osb-kanunu', $data);
	}
	public function osb_4562()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		header('Content-Type: application/pdf');
		readfile(base_url('assets/upload/pdf/4562.pdf'));
	}
	public function cerezler()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['hizmet'] = $this->vt->get_hizmet();
		$this->load->view('front/cerezler', $data);
	}
	public function osbyonetim()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['hizmet'] = $this->vt->get_hizmet();
		$this->load->view('front/osb-uygulama-yonetmeligi', $data);
	}
	public function uygulama()
	{
		header('Content-Type: application/pdf');
		readfile(base_url('assets/upload/pdf/uygulama.pdf'));
	}
	public function heyet()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['hizmet'] = $this->vt->get_hizmet();
		$data['heyet'] = $this->vt->get_heyet();
		$this->load->view('front/heyet', $data);
	}
	public function yonetim()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['mevzuat'] = $this->vt->get_mevzuat();
		$data['hizmet'] = $this->vt->get_hizmet();
		$data['yonetim'] = $this->vt->get_yonetim();
		$this->load->view('front/yonetim', $data);
	}
	public function denetim()
	{
		$data['formlar'] = $this->vt->get_formlar();
		$data['formlar'] = $this->vt->get_mevzuat();
		$data['hizmet'] = $this->vt->get_hizmet();
		$data['denetim'] = $this->vt->get_denetim();
		$this->load->view('front/denetim', $data);
	}

	public function contact_send()
	{
		if ($this->input->post()) {

			error_reporting(0); //Hataları Gizle
			//Form'dan Bütün Değerler Post Methodu ile Çekiliyor
			$name = trim(strip_tags($_POST['name']));
			$mail = trim(strip_tags($_POST['mail']));
			$konu = trim(strip_tags($_POST['konu']));
			$tel = trim(strip_tags($_POST['tel']));
			$birim = trim(strip_tags($_POST['birim']));
			$mesaj = trim(strip_tags($_POST['mesaj']));
			//Form'dan Bütün Değerler Post Methodu ile Çekiliyor Tamamlandı


			if ($name and $mail and $mesaj) { //Form'dan bütün değerler geliyorsa mail gönderme işlemini başlatıyoruz.
				$save_db_form = $this->vt->contact_send($name, $mail, $mesaj, $konu, $tel, $birim,);
				if (@$save_db_form) {
					$Mesaj = "
					<ul>
						<li> Adı soyadı: $name </li>
						<li> Mail Adresi : $mail </li>
						<li> Telefon : $tel </li>
						<li> Konu : $konu </li>
						<li> İlgili Birim : $birim </li>
						<li> Mesaj : $mesaj </li>
					</ul>
					";

					//Php Smtp Mailler Sınıfını Sayfaya Dahil Ediyoruz
					include('assets/phpmail/class.phpmailer.php');
					include('assets/phpmail/class.smtp.php');
					//Php Smtp Mailler Sınıfını Sayfaya Dahil Ediyoruz Tamamlandı

					//Mail Bağlantı Ayarları 
					//Mail Hangi Hesaptan Gönderilecek ise onun bilgilerini yazın.

					$MailSmtpHost = "mail.globalosb.org.tr";
					$MailUserName = "destek@globalosb.org.tr";
					$MailPassword = "A19Amz2P";
					$MesajKonusu = "Merhaba Web Sitesinden Mesajınız Var!";
					//Mail Bağlantı Ayarları Tamamlandı

					//Doldurulan Form Mail Olarak Kime Gidecek?
					$MailKimeGidecek = "info@globalosb.org.tr";
					//Doldurulan Form Mail Olarak Kime Gidecek Tamamlandı

					$mail = new PHPMailer();
					$mail->IsSMTP();
					$mail->SMTPAuth = true;
					$mail->Host = $MailSmtpHost; //Smtp Host
					$mail->Port = 587;  //SSL kullanacaksanız portu 465 olarak değiştiriniz - TLS Portu 587
					$mail->Username = $MailUserName; //Smtp Kullanıcı Adı
					$mail->Password = $MailPassword; //Smtp Parola
					$mail->SetFrom($mail->Username, 'GKOSB');
					// $mail->AddAttachment($_FILES['dosya']);
					$mail->AddAddress("$MailKimeGidecek", 'GKOSB'); //Mailin Gideceği Adres ve Alıcı Adı
					$mail->CharSet = 'UTF-8'; //Mail Karakter Seti
					$mail->Subject = $MesajKonusu; //Mail Konu Başlığı
					$mail->MsgHTML("$Mesaj"); //Mail Mesaj İçeriği
					if ($mail->Send()) {
						echo '<script>alert("Mail gönderildi! En kısa sürede dönüş sağlanacaktır.");</script>';
					} else {
						echo 'Mail gönderilirken bir hata oluştu: ' . $mail->ErrorInfo;
					}
					flash('success', 'Başarılı!', 'Bize ulaştığınız için teşekkür ederiz!');
				} else {
					flash('error', 'Hata!', 'Mesajınız bize ulaşırken hata oluştu!');
				}
			} //Mail gönderme işlemi tamamlandı end.if
		}
		redirect('iletisim');
	}
}

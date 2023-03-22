<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['hakkimizda'] = 'home/hakkimizda';
$route['iletisim'] = 'home/iletisim';
$route['duyurular'] = 'home/duyurular';
$route['haberler'] = 'home/haberler';
$route['tarihce'] = 'home/tarihce';
$route['heyet'] = 'home/heyet';
$route['cerezler'] = 'home/cerezler';
$route['denetim'] = 'home/denetim';
$route['yonetim'] = 'home/yonetim';
$route['firmalar'] = 'home/firmalar';
$route['bolge'] = 'home/bolge';
$route['mevzuat'] = 'home/mevzuat';
$route['formlar'] = 'home/formlar';
$route['haberdetay/(:any)'] = 'home/haberdetay/$1';
$route['mevzuatdetay/(:any)'] = 'home/mevzuatdetay/$1';
$route['formlardetay/(:any)'] = 'home/formlardetay/$1';
$route['duyurudetay/(:any)'] = 'home/duyurudetay/$1';
$route['hizmetdetay/(:any)'] = 'home/hizmetdetay/$1';
$route['4562-sayili-osb-kanunu'] = 'home/osbkanunu';
$route['osb-uygulama-yonetmeligi'] = 'home/osbyonetim';
$route['uygulama'] = 'home/uygulama';
$route['osb_4562'] = 'home/osb_4562';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

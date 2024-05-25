<?php
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  session_name('nguyenan.362');
  session_start();
  $config = array();
  
  // info
  $config['author']       = 'nguyenan.362';
  $config['keywords']     = 'Army 2 by Ann, army ii, mobiarmy, mobiarmy ii, army lau, mobiarmy lau, Army II by Ann';
  $config['description']  = 'Sống lại một thời hào hùng cùng tựa game siêu hấp dẫn.';
  $config['css']          = '/public/css/template.min.css?v='.time();
  $config['background']   = '/public/icon/background.png';
  $config['site_name']    = 'Home MobiArmy 2 by Ann';
  $config['site']          = 'http://army2.pw/';

  // mysql
  $config['mysql']['server']       = '20.2.1.143';
  $config['mysql']['port']         = 3306;
  $config['mysql']['user']         = 'admin';
  $config['mysql']['password']     = '@Neverdie1001';
  $config['mysql']['database']     = 'dbarmy2';

  // smtp
  $config['smtp']['server']        = 'smtp.gmail.com';
  $config['smtp']['port']          = 587;
  $config['smtp']['secure']        = 'tls';
  $config['smtp']['username']      = 'account_gmail@gmail.com';
  $config['smtp']['password']      = 'password_gmail';
  $config['smtp']['from']          = 'cloud.serarmy@gmail.com';
  $config['smtp']['from_name']     = 'MobiArmy 2 by Ann';
  $config['smtp']['reply']         = 'dntvdeveloper@gmail.com';
  $config['smtp']['reply_name']    = 'Ann';
  $config['smtp']['charset']       = 'UTF-8';
  $config['smtp']['language']      = 'en';
  $config['smtp']['html']          = true;
  $config['smtp']['auth']          = true;
  $config['smtp']['debug']         = false;
  
  // api cardvip
  $config['api']['key'] = 'B47EF339-9430-463A-AE25-3B1CE670C764';
  $config['api']['url'] = 'http://partner.cardvip.vn/api/createExchange';
?>
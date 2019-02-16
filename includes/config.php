<?php
date_default_timezone_set('Africa/Dar_Es_Salaam');
define('DB_HOST', 'localhost');          // Set database host
define('DB_USER', 'root');             // Set database user
define('DB_PASS', '1375db');             // Set database password
define('DB_NAME', 'agm');        // Set database name
define('BASE_URL', 'http://agm.vodacom.co.tz');
define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'].'/');
define('DEMO_SENDER','VODACOM AGM');


$config = array();
$config['upload_error'] = "There was an error uploading file";
$config['error_insufficient_balance'] = "You do not have enough SMS Balance";
$config['only_customer_can_buy_sms'] = "<p>Only a customer is allowed to buy SMS Packages. Please login as a customer to continue.</p>";
$config['sms_rate'] = 30;
$config['business_number'] = '405656';

$config['days'] = array(
    '0'=>'Sunday',
    '1'=>'Monday',
    '2'=>'Tuesday',
    '3'=>'Wednesday',
    '4'=>'Thursday',
    '5'=>'Friday',
    '6'=>'Saturday'
);

$config['months'] = array(
    '1'=>'January',
    '2'=>'February',
    '3'=>'March',
    '4'=>'April',
    '5'=>'May',
    '6'=>'June',
    '7'=>'July',
    '8'=>'August',
    '9'=>'September',
    '10'=>'October',
    '11'=>'November',
    '12'=>'December'
);
$config['times'] = array(
    '13'=>'1 PM',
    '14'=>'2 PM',
    '15'=>'3 PM',
    '16'=>'4 PM',
    '17'=>'5 PM',
    '18'=>'6 PM',
    '19'=>'7 PM',
    '20'=>'8 PM',
    '21'=>'9 PM',
    '22'=>'10 PM',
    '23'=>'11 PM',

    '0'=>'12 AM',
    '1'=>'1 AM',
    '2'=>'2 AM',
    '3'=>'3 AM',
    '4'=>'4 AM',
    '5'=>'5 AM',
    '6'=>'6 AM',
    '7'=>'7 AM',
    '8'=>'8 AM',
    '9'=>'9 AM',
    '10'=>'10 AM',
    '11'=>'11 AM',
    '12'=>'12 PM'
);

$config['rc_publickey'] = "6LczS0MUAAAAAJOtJc1oscSA54dLGs2WuNmCt2Db";
$config['rc_privatekey'] = "6LczS0MUAAAAANbnxCGELZSmAigVpPlZOluNeltC";
$config['smtp_server'] = "roadrunner.websitewelcome.com";
$config['smtp_user'] = "wilson.kifua@it.co.tz";
$config['smtp_password'] = 'PFKZEbSxf9Zt';
$config['smtp_port'] = 587;
$config['operators'] = array(
    'VODACOM'=>'Vodacom',
    'TIGO'=>'Tigo',
    'AIRTEL'=>'Airtel'
);
$config['page_intervals'] = array(10,20,30,60,120,240,500,1000);
$sections_dir = 'sections';
$modules_dir = 'modules';
$config['maximum_company_logo_size'] = '2MB';
$config['upload_path'] = '/uploads';
$config['upload_dir'] = $_SERVER['DOCUMENT_ROOT'].$config['upload_path'];
<?php
$errors = array();

/*--------------------------------------------------------------*/
/* Function for Remove escapes special
/* characters in a string for use in an SQL statement
/*--------------------------------------------------------------*/
function real_escape($str){
    global $con;
    $escape = mysqli_real_escape_string($con,$str);
    return $escape;
}
/*--------------------------------------------------------------*/
/* Function for Remove html characters
/*--------------------------------------------------------------*/
function remove_junk($str){
    $str = nl2br($str);
    $str = htmlspecialchars(strip_tags($str, ENT_QUOTES));
    return $str;
}
/*--------------------------------------------------------------*/
/* Function for Uppercase first character
/*--------------------------------------------------------------*/
function first_character($str){
    $val = str_replace('-'," ",$str);
    $val = ucfirst($val);
    return $val;
}
/*--------------------------------------------------------------*/
/* Function for Checking input fields not empty
/*--------------------------------------------------------------*/
function validate_fields($var){
    global $errors;
    foreach ($var as $field) {
        $val = remove_junk($_POST[$field]);
        if(isset($val) && $val==''){
            $errors = $field ." can't be blank.";
            return $errors;
        }
    }
}
/*--------------------------------------------------------------*/
/* Function for Display Session Message
   Ex echo displayt_msg($message);
/*--------------------------------------------------------------*/
function display_msg($msg =''){
    $output = array();
    if(!empty($msg)) {
        foreach ($msg as $key => $value) {
            $output  = "<div class=\"alert alert-{$key}\">";
            $output .= "<a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>";
            $output .= remove_junk(first_character($value));
            $output .= "</div>";

        }
        return $output;
    } else {
        return "" ;
    }
}
/*--------------------------------------------------------------*/
/* Function for redirect
/*--------------------------------------------------------------*/
function redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

/*--------------------------------------------------------------*/
/* Function for Readable date time
/*--------------------------------------------------------------*/
function read_date($str){
    if($str)
        return date('F j, Y, g:i:s a', strtotime($str));
    else
        return null;

}
/*--------------------------------------------------------------*/
/* Function for  Readable Make date time
/*--------------------------------------------------------------*/
function make_date(){
    return strftime("%Y-%m-%d %H:%M:%S", time());
}
/*--------------------------------------------------------------*/
/* Function for  Readable date time
/*--------------------------------------------------------------*/
function count_id(){
    static $count = 1;
    return $count++;

}

/*--------------------------------------------------------------*/
/* Function for Creting random string
/*--------------------------------------------------------------*/
function randString($length = 5, $numbers_only=false)
{
    $str='';
    $num = "0123456789";
    $char = "abcdefghijklmnopqrstuvwxyz";
    if($numbers_only){
        $string = $num;
    }else{
        $string = $num.$char;
    }

    for($x=0; $x<$length; $x++){
        $str .= $string[mt_rand(0,strlen($string))];
    }
    return $str;
}

function RandomString($length=10, $numbers_only=false, $upper_case=true){
    $characters = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string;
}


function is_front_page(){
    $url = $_SERVER['REQUEST_URI'];
    $file = explode("/", $url);
    $check_front_page = end($file);
    if(substr($check_front_page, 0,10)  == 'index.php' || $check_front_page == ''){
        return true;
    }else{
        return false;
    }
}
function user_exists($username){
    global $db;
    $sql = sprintf("SELECT `USERNAME` FROM `USER` WHERE `USERNAME`='%s'", $username);
    $query = $db->query($sql);
    if($db->num_rows($query)>0){
        return 1;
    }else{
        return 0;
    }
}

function email_exists($email){
    global $db;
    $sql = sprintf("SELECT `EMAIL` FROM `CUSTOMER` WHERE `EMAIL`='%s'", $email);
    $query = $db->query($sql);
    if($db->num_rows($query)>0){
        return 1;
    }else{
        return 0;
    }
}

function phone_exists($phonenumber){
    global $db;
    $sql = "SELECT `PHONENUMBER` FROM `CUSTOMER` WHERE `PHONENUMBER` LIKE '%$phonenumber%'";
    $query = $db->query($sql);
    if($db->num_rows($query)>0){
        return 1;
    }else{
        return 0;
    }
}

function server_url(){
    return "http://";
}
function send_sms_message($to, $sms, $network='', $sender, $customer_id, $queueID, $debug=false){

    $requestURL = "http://";
    $postData = array(
        'SmsQueueId'    => $queueID,
        'SenderId'      => $sender,
        'Sms'           => $sms,
        'CustomerId'    => $customer_id,
        'PhoneNumber'   => $to
    );

    //echo json_encode($postData);
    $postData = json_encode($postData);
    $opts = array(
        'http' => array(
            'method' => 'POST',
            'header' => 'Content-Type: application/json' . "\r\n"
                . 'Content-Length: ' . strlen($postData) . "\r\n",
            'content' => $postData,
        ),
    );

    $context  = stream_context_create($opts);
    $result = file_get_contents($requestURL, false, $context);

    if($debug) {
        echo '<pre>';
        print_r($result);
        echo '</pre>';
        echo '<pre>';
            var_dump($http_response_header);
        echo '<pre>';
        echo '<pre>';
        var_dump($postData);
        echo '</pre>';
    }
    if($http_response_header[0] == 'HTTP/1.1 200 OK'){
        return 1;
    }else{
        return 0;
    }
}


function count_sms_units($str){
    $total_characters = strlen($str);
    $total_sms = '';
    if($total_characters<=160){
        $total_sms = 1;
    }elseif($total_characters>=161 || $total_characters<=300){
        $total_sms = 2;
    }elseif($total_characters>=301 || $total_characters<=441) {
        $total_sms = 3;
    }elseif($total_characters>=442 || $total_characters<=581) {
        $total_sms = 4;
    }elseif($total_characters>=582 || $total_characters<=721) {
        $total_sms = 5;
    }
    return $total_sms;
}

function thousand_sep($amount) {
    return @number_format($amount, 2, '.', ',');
}

function FormatDate($date, $format='M d, Y'){
    $date_format = new DateTime($date);
    $formated_date =  $date_format->format($format);
    return $formated_date;
}

function get_number_network($number){
    $tigo_codes = array('71','65','67');
    $voda_codes = array('76','75','74');
    $airtel_codes = array('78','68','69');
    $string = '';

    if(in_array($number, $tigo_codes)){
        $string = 'TIGO';
    }elseif(in_array($number, $voda_codes)){
        $string = 'VODACOM';
    }elseif(in_array($number, $airtel_codes)){
        $string = 'AIRTEL';
    }
    return $string;
}


function get_user_id($user_id){
    return $user_id;
}

function get_user_type($super_user){
    if($super_user == '1') {
        return 'admin';
    }elseif($super_user == '5') {
        return 'manager';
    }elseif($super_user == '2') {
        return 'staff';
    }
}



function get_user_data($user_id){
    $results = find_by_sql(
        "SELECT * FROM `USER` WHERE `ID`='$user_id' LIMIT 1"
    );
    $data = array();
    foreach ($results as $key=>$result){
        $id = $result['ID'];
        $data['id'] = $id;
        $data['name'] = $result['NAME'];
        $data['username'] = $result['USERNAME'];
        $data['super_user'] = $result['SUPER_USER'];
        $data['email'] = $result['USER_EMAIL'];
        $data['parent'] = $result['PARENT_USER'];
        $data['referral'] = $result['REFERED_BY'];
        $data['type'] = get_user_type($result['SUPER_USER']);
		$data['date_created'] = $result['DATE_CREATED'];

    }
    return $data;
}



function add255($number){
    if(substr($number, 0,1) == '0'){
        $number1 = substr($number, 1,9);
        $new_number = '255'.$number1;
    }else{
        if(substr($number, 0,1) == '+') {
            $number2 = substr($number, 1,13);
            $new_number = $number2;
        }else{
            $new_number = $number;
        }
    }
    return $new_number;
}



function array2csv(array &$array){
    if (count($array) == 0) {
        return null;
    }
    ob_start();
    $df = fopen("php://output", 'w');
    fputcsv($df, array_keys(reset($array)));
    foreach ($array as $row) {
        fputcsv($df, $row);
    }
    fclose($df);
    return ob_get_clean();
}

function download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}

function strToHex($string){
    $hex = '';
    for ($i=0; $i<strlen($string); $i++){
        $ord = ord($string[$i]);
        $hexCode = dechex($ord);
        $hex .= substr('0'.$hexCode, -2);
    }
    return strToUpper($hex);
}

function load_user_roles($user_id){
    $results = find_by_sql(
        "SELECT ur.* FROM USER_ROLES as ur
              WHERE ur.ROLE_ID IN(SELECT `ROLE_ID` FROM `USER_ROLES_SECTIONS` WHERE `USER_ID`='$user_id')");

    $data = array();
    foreach($results as $key=>$result){
        //$data[$key]['role'] = $result['USER_ROLE'];
        $data[] = $result['USER_ROLE'];
    }
    return $data;
}

function user_can($do_what, $user_id){
    $user_roles = load_user_roles($user_id);
    //print_r($user_roles);
    if(in_array($do_what, $user_roles)){
        return true;
    }else{
        return false;
    }
}

function wilson_translate($key){
    global $translations;
    return $translations[$key];
}

function get_company_admins($company_id){
	$data = array();
	$sql = "SELECT `ID` FROM `USER` WHERE `ID` IN(SELECT `COMPANY_ADMIN` FROM `COMPANY` WHERE `ID`='$company_id')";
	$results = find_by_sql($sql);
	foreach($results as $key=>$result){
		$data[$key]['id'] = $result['ID'];
	}
	return $data;
}
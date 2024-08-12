<?php
// $_base_url = 'http://sigwisata.test';
$_base_url = 'http://localhost/SIG-WISATA';

function url($url) {
    global $_base_url;
    
    $trimmed_url = trim($url, '/');
    
    $trimmed_base_url = rtrim($_base_url, '/');
    
    // Construct the full URL
    $full_url = $trimmed_base_url . '/' . $trimmed_url;
    
    return $full_url;
}
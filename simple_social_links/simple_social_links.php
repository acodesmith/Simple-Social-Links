<?php
/**
 * Plugin Name: Simple Social Links
 * Plugin URI: https://github.com/acodesmith/Simple-Social-Links
 * Description: Simple Plain Text Links for Sharing on Social Media - Help page load time and user privacy
 * Version: 1.1
 * Author: ACODESMITH
 * Author URI: http://acodesmith.com
 * License: GNU
 */


function get_the_social_links($values,$links=array())
{
    if(!class_exists('SocialMediaShareLinks')){
        include_once('SocialMediaShareLinks.php');
    }

    $smsl = new SocialMediaShareLinks($values,array_change_key_case($links, CASE_LOWER));

    return $smsl->processed;
}
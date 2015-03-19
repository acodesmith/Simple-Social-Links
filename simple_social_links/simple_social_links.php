<?php
/**
 * Plugin Name: Simple Social Links
 * Plugin URI: https://github.com/wideopentech
 * Description: Simple Plain Text Links for Sharing on Social Media - Help page load time and user privacy
 * Version: 1.0
 * Author: WideOpenTech
 * Author URI: http://wideopentech.com
 * License: MS Reference
 */


function get_the_social_links($values,$links=array())
{
    if(!class_exists('SocialMediaShareLinks')){
        include_once('SocialMediaShareLinks.php');
    }

    $smsl = new SocialMediaShareLinks($values,array_change_key_case($links, CASE_LOWER));

    return $smsl->processed;
}
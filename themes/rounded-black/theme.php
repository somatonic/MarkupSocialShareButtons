<?php

/**
 * Default Theme MarkupSocialShareButtons
 *
 * This file is the default used by the module after a clean install.
 *
 * A theme can be choosen in the module config screen.
 *
 * Alternatively from the API you can set a theme by using method "theme" options
 * i.e. $options = array("theme" => "themename");
 *
 * To create your own create a file with the content of this file somewhere in your site/templates/ folder
 * This would be a subfolder, and in there a file "theme.php".
 *
 * Now you can enter the path relative from "site/templates" in the module config
 * $options = array("theme" => "templates/socialbuttontheme/mytheme");
 * $modules->MarkupSocialShareButtons->render($options);
 *
 * For the PNG icons themes I created using a set of PNG icons for free here
 * http://customizr.net/icons/?set=social-media
 *
 */

// {themeUrl} or $themeUrl is available and set by the module
// you can also get a custom path to and use API here with wire("config") or $this->config
//
// $themeUrl = wire("config")->urls->templates . "imgs/icons/";

$socialIcons = array(
    'email_icon'        => '<img src="{themeUrl}png/mail.png"/>',
    'googleplus_icon'   => '<img src="{themeUrl}png/googleplus-square.png"/>',
    'facebook_icon'     => '<img src="{themeUrl}png/facebook-square.png"/>',
    'twitter_icon'      => '<img src="{themeUrl}png/twitter.png"/>',
    'linkedin_icon'     => '<img src="{themeUrl}png/linkedin.png"/>',
    'reddit_icon'       => '<img src="{themeUrl}png/reddit.png"/>',
    'tumblr_icon'       => '<img src="{themeUrl}png/tumblr.png"/>',
    'pinterest_icon'    => '<img src="{themeUrl}png/pinterest.png"/>',
    );
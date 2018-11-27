<?php
   /*
   Plugin Name: MobiCow for Wordpress
   Plugin URI: http://mobicow.com
   Description: Adds MobiCow publisher code to your site
   Version: 1.4
   Author: MobiCow
   Author URI: http://mobicow.com          
   License: GPL2
   */

// INCLUDES

include("admin_page.php");

// GLOBAL VARIABLES

$mobicow_options = array("adactive"=> get_option("adactive"), "adaccountid"=> get_option("adaccountid"), "adsiteid"=> get_option("adsiteid"), "adtype" => get_option("adtype"), "adfreq" => get_option("adfreq"));

// MAIN FUNCTIONALITY
if($mobicow_options['adactive'] == 1)
{
	add_action('wp_head', 'add_mobicow_script');
}

function add_mobicow_script()
{
	global $mobicow_options;
	$accountid = $mobicow_options['adaccountid'];
	$siteid = $mobicow_options['adsiteid'];
	$type = $mobicow_options['adtype'];
	$freq = $mobicow_options['adfreq'];
$adcode = <<<EOD
<!-- Mobicow.com Ad Code Start : Do Not Modify -->
<script>
    var mc_s1 = document.createElement("script");
    mc_s1.async = true;
    mc_s1.src = "http://cdn.mobicow.com/deliver/p/{$accountid}/{$siteid}/1/{$type}/{$freq}";
    var MCs_1 = document.getElementsByTagName("script")[0];
    MCs_1.parentNode.insertBefore(mc_s1, MCs_1);
</script>
<!-- Mobicow.com Ad Code End : Do Not Modify -->
EOD;
	echo $adcode;
}


?>
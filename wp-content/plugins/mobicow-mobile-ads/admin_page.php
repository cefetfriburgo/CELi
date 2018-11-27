<?php
	function mobicow_options_page()
	{
		global $mobicow_options;
		echo '<div class="wrap">';
		echo '<img src="' .plugins_url( 'logo2.png' , __FILE__ ). '" vspace="5px"> ';
		echo '<h1>Mobicow for Wordpress</h1>';
		echo '<h2>Description</h2>';
		echo '<p>Here you can add and edit the publisher code that appears on your site. Just fill out the form below and this plugin will automatically add the publisher code to your site. You can find your MobiCow Account ID and the Site ID by logging in to the <a href="http://mobicow.com/adcenter" target="new">Adcenter</a>.</p>';
		echo '<h2>Settings</h2>';
		echo '<form action="options.php" method="post">';
		settings_fields('mobicow_settings_group');
		
		// Displays Ad Activated Option
		echo '<p><label class="description" for="adactive" style="float: left; width: 80px">Publish Ad? </label>';
		echo '<input type="checkbox" name="adactive" id="adactive" value="1"';
		checked(1, $mobicow_options['adactive']);
		echo ' /></p>';
		
		// Displays Account ID and Site ID inputs
		echo '<label class="description" for="adaccountid" style="float: left; width: 80px">Account ID </label>';
		echo '<input type="text" name="adaccountid" id="adaccountid" value="'. $mobicow_options['adaccountid'] .'"/><br />';
		
		echo '<label class="description" for="adsiteid" style="float: left; width: 80px">Site ID </label>';
		echo '<input type="text" name="adsiteid" id="adsiteid" value="'. $mobicow_options['adsiteid'] .'"/>';
		
		// Displays Ad Type Options
		echo '<p><label for="adtype" class="description">Show a Tab Ad </label>';
		echo'<select name="adtype" id="adtype" >';

        switch($mobicow_options['adtype']){
            case 'under':
                echo'<option value="under" selected="selected">Pop</option>';
                echo '<option value="over">Pop-over (Redirect)</option>';
                echo '<option value="intv2">Interstitial</option>';
                break;
            case 'over':
                echo'<option value="under">Pop</option>';
                echo '<option value="over" selected="selected">Pop-over (Redirect)</option>';
                echo '<option value="intv2">Interstitial</option>';
                break;
            case 'intv2':
                echo'<option value="under" >Pop</option>';
                echo '<option value="over">Pop-over (Redirect)</option>';
                echo '<option value="intv2" selected="selected">Interstitial</option>';
                break;
            default:
                echo'<option value="under">Pop</option>';
                echo '<option value="over">Pop-over (Redirect)</option>';
                echo '<option value="intv2" selected="selected">Interstitial</option>';
                break;

        }
        /*
		if($mobicow_options['adtype'] == "under")
		{
			echo'<option value="under" selected="selected">under</option>';
		}
		else
		{
			echo '<option value="over">over</option>';
		}
		if($mobicow_options['adtype'] == "over")
		{
			echo '<option value="over" selected="selected">over</option>';
		}
		elseif($mobicow_options['adtype'] != "under")
		{
			echo '<option value="over" selected="selected">over</option>';
		}
		else
		{
			echo '<option value="over">over</option>';
		}
        */
		echo '</select>';
		
		//Displays Ad Frequency Options
		echo '<label class="description" for="adfreq"> my site every </label>';
		echo '<select name="adfreq" id="adfreq">';
		if($mobicow_options['adfreq'] == "1800")
		{
			echo '<option value="1800" selected="selected">30 Min</option>';
		}
		else
		{
			echo '<option value="1800">30 Min</option>';
		}
		if($mobicow_options['adfreq'] == "3600")
		{
			echo '<option value="3600" selected="selected">1 Hour</option>';
		}
		else
		{
			echo '<option value="3600">1 Hour</option>';
		}
		if($mobicow_options['adfreq'] == "7200")
		{
			echo 'option value="7200" selected="selected">2 Hours</option>';
		}
		else
		{
			echo 'option value="7200">2 Hours</option>';
		}
		if($mobicow_options['adfreq'] == "14400")
		{
			echo '<option value="14400" selected="selected">4 Hours</option>';
		}
		else
		{
			echo '<option value="14400">4 Hours</option>';
		}
		if($mobicow_options['adfreq'] == "28800")
		{
			echo '<option value="28800">8 Hours</option>';
		}
		else
		{
			echo '<option value="28800">8 Hours</option>';
		}
		if($mobicow_options['adfreq'] == "86400")
		{
			echo '<option value="86400" selected="selected">1 Day</option>';
		}
		else
		{
			echo '<option value="86400">1 Day</option>';
		}
		echo '</select></p>';
		
		submit_button();
		echo '</form>';
		echo '</div>';
	}
	
	function mobicow_options_menu()
	{
		add_options_page( 'MobiCow for Wordpress', 'MobiCow for Wordpress', 'manage_options', 'mobicow-for-wordpress', 'mobicow_options_page');
		
	}
	
	add_action( 'admin_menu', 'mobicow_options_menu' );
	
	function mobicow_register_settings()
	{
		register_setting( 'mobicow_settings_group', 'adactive' );
		register_setting( 'mobicow_settings_group', 'adaccountid' );
		register_setting( 'mobicow_settings_group', 'adsiteid' );
		register_setting( 'mobicow_settings_group', 'adtype' );
		register_setting( 'mobicow_settings_group', 'adfreq' );

	}
	
	add_action( 'admin_init', 'mobicow_register_settings' );

	
	
	
	
	
?>
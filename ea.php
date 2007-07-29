<?php
//ob_start();
/*
Plugin Name: Even Easier Announcements
Plugin URI: http://christopherjones.us
Description: Adds announcements to your site
Version: 1.0
Author: Chris Jones
Author URI: http://christopherjones.us
*/

function cwj_subpanel() {
  if (isset($_POST['info_update'])) {
    ?><div class="updated"><p><strong><?php 
	if(update_option('cwj_announcement', $_POST[cwj_announce])){
			_e('Success');
	}else{
			if(get_option('cwj_announcement')==$_POST[cwj_announce])
				_e('Nothing Updated');
			else
				_e('An error occurred.');
	}
    ?></strong></p></div><?php
	} ?>
<div class=wrap>
<script language="javascript/text">
function cwj_announce(){
alert(cwj_menu.cwj_announce);
}
</script>
  <form name="cwj_menu" method="post">
    <h2>Even Easier Announcements</h2>
	The current announcement is:<br><i><?php echo(get_option('cwj_announcement')); ?></i><br><br>
     <fieldset name="set1">
	<legend><?php _e('Announcement', 'Localization name') ?></legend>
	<input name="cwj_announce" type="textbox">
	 </fieldset>
	 <div class="submit">
  <input type="submit" onclick="javascript:cwj_announce()" name="info_update" value="<?php
    _e('Update options', 'Localization name')
	?> »" /></div>
  </form>
 </div><?php
}

function cwj_announcement_menu() {
    if (function_exists('add_options_page')) {
		add_options_page('Even Easier Announcements', 'Announcements', level_5, basename(__FILE__), 'cwj_subpanel');
	}
}

function eea(){
	echo "<h3>";
	echo get_option('cwj_announcement');
	echo "</h3>";
	echo "<hr>";
}

add_action('admin_menu', 'cwj_announcement_menu');

?>

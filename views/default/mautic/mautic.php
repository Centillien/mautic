<?php
//Mautic programmatic marketing

$title =  $vars["title"];
if (empty($vars['title'])) {
        $title = elgg_get_config('sitename');
} 
$page_url = 'http://' . $_SERVER[HTTP_HOST] . $_SERVER['REQUEST_URI'];
$page_title = urlencode($title);
$url = elgg_get_plugin_setting("mautic_url","mautic");

if(elgg_is_logged_in()) {
        $muser = elgg_get_logged_in_user_entity();
        $mguid = $muser->guid;
        $email = urlencode($muser->email);
        $name = explode(" ", $muser->name);
        $firstname = $name[0];
	$firstname = rawurlencode($firstname);
        $lastname = $name[1];
        $lastname .= " " . ($name[2]); //For users who use their  middlenames like "Walter Bruce Willis"
	$lastname = rawurlencode($lastname);
	$location = explode(",", $muser->location);
        $location = $location[0];
	$location = rawurlencode($location);
	//Time to build the URL
	$src="$url/mtracking.gif?page_url=$page_url&page_title=$page_title&email=$email&firstname=$firstname&lastname=$lastname&location=$location&guid=$mguid";
} else {
	$src= "$url/mtracking.gif?page_url=$page_url&page_title=$page_title";
}

echo '<img src="'. $src .'" style="display: none;" />';
//End Mautic extention

?>

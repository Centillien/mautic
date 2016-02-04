<?php
//Mautic programmatic marketing


if(!$page_title =  elgg_echo(elgg_get_context())) {
	$page_title = $vars['config']->sitename;
}

$url = elgg_get_plugin_setting("mautic_url","mautic");
$page_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

if($muser = elgg_get_logged_in_user_entity()) {

    $name = explode(" ", $muser->name, 2);
    $firstname = trim($name[0]);
    $lastname = trim($name[1]);
	$location = explode(",", $muser->location);
	$location = $location[0];

	$d = urlencode(base64_encode(serialize(array(
    	'page_url'   => $page_url,
    	'page_title' => $page_title,
    	'email' => $muser->email,
    	'firstname' => $firstname,
    	'lastname' => $lastname,
    	'location' => $location,
    	'guid' => $muser->guid
	))));

} else {

	if (elgg_get_plugin_setting("mautic_dont_track_anonymos","mautic") == "yes") {
		return;
	}

	$d = urlencode(base64_encode(serialize(array(
    	'page_url'   => $page_url,
    	'page_title' => $page_title,
	))));

}

echo '<img src="'.$url.'/mtracking.gif?d=' . $d . '" alt="" style="display: none;" />';

?>

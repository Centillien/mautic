<?php
$url = elgg_get_plugin_setting("mautic_url","mautic");
?>
<script>
	(function(w,d,t,u,n,a,m){w['MauticTrackingObject']=n;
		w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
			m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
	})(window,document,'script','<?php echo $url; ?>/mtc.js','mt');
	<?php
//Mautic programmatic marketing


if(!$page_title =  elgg_echo(elgg_get_context())) {
	$page_title = $vars['config']->sitename;
}

$page_url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

if($muser = elgg_get_logged_in_user_entity()) {

    $name = explode(" ", $muser->name, 2);
    $firstname = trim($name[0]);
    $lastname = trim($name[1]);
	$location = explode(",", $muser->location);
	$location = $location[0];
	?>
	mt('send', 'pageview', {page_title: '<?php echo $page_title; ?>', page_url: '<?php echo $page_url;?>', email: '<?php echo $muser->email; ?>', firstname: '<?php echo $lastname; ?>', lastname: '<?php echo $lastname; ?>', location: '<?php echo $location; ?>', guid: '<?php echo $muser->guid; ?>'  });
	<?php


} else {

	if (elgg_get_plugin_setting("mautic_dont_track_anonymos","mautic") == "yes") {
		return;
	}
?>
	mt('send', 'pageview');
	<?php
}


?>


</script>
<?php
        /**
         * Elgg Mautic plugin
         *
         * @author Gerard Kanters
         * @copyright Centillien 2015
         */

        $noyes_options = array(
                "no" => elgg_echo("option:no"),
                "yes" => elgg_echo("option:yes")
        );
	
	$mautic_url = elgg_get_plugin_setting("mautic_url","mautic");

	if(empty($mautic_url)) {
		$mautice_url = "mautic ". elgg_get_site_entity()->url;
	}

	echo elgg_echo('mautic_url:title');
	echo elgg_view('input/text', array('name'=>'params[mautic_url]', 'value'=>$mautic_url));
        echo '<br><br>';

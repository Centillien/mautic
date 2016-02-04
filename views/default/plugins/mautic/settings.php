<?php
/**
 * Elgg Mautic plugin
 *
 * @author Gerard Kanters
 * @copyright Centillien 2015
 */

$mautic_url = elgg_get_plugin_setting("mautic_url","mautic");

if(empty($mautic_url)) {
	$mautice_url = "mautic ". elgg_get_site_entity()->url;
}

$mautic_dont_track_anonymos = elgg_get_plugin_setting("mautic_dont_track_anonymos","mautic");
$checked = $mautic_dont_track_anonymos == 'yes' ? 'checked' : false;

echo '<div>';
echo elgg_echo('mautic:settings:url');
echo elgg_view('input/text', array('name'=>'params[mautic_url]', 'value'=>$mautic_url));
echo '</div>';

echo '<div>';
echo '<label>';
echo elgg_view('input/checkbox', array('name' => 'params[mautic_dont_track_anonymos]', 'value' => 'yes', 'checked'=> $checked, 'default' => 'no'));
echo ' ',elgg_echo('mautic:settings:tracking'),'</label>';
echo '</div>';

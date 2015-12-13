<?php
	/**
	 * Elgg Mautic plugin
	 * This plugin adds the mautic tracking pixel to your Elgg installation
	 * 
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Gerard Kanters
	 * Website: https://www.centillien.com
	 */

	function mautic_init() {

		elgg_extend_view('page/elements/foot','mautic/mautic');
		
	}

	elgg_register_event_handler('init','system','mautic_init');
?>

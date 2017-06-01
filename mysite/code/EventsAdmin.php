<?php

class EventsAdmin extends ModelAdmin {
	private static $allowed_children = array('EventPage');
	
    private static $managed_models = array(
        'EventPage'
    );

    private static $url_segment = 'event';

    private static $menu_title = 'Events Admin';
}
?>
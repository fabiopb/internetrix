<?php

class EventsAdmin extends ModelAdmin {

    private static $managed_models = array(
        'Event',
        'Category'
    );

    private static $url_segment = 'events';

    private static $menu_title = 'Events Admin';
}
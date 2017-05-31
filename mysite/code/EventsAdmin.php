<?php

class EventsAdmin extends ModelAdmin {

    private static $managed_models = array(
        'Events'
        /*,
        'Category'
        */
    );

    private static $url_segment = 'events';

    private static $menu_title = 'Events Admin';
}
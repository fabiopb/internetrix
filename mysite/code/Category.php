<?php

class Category extends DataObject {

    private static $db = array(
        'Title' => 'Text'
    );

    private static $has_many = array(
        'Events' => 'Event'
    );
}
?>
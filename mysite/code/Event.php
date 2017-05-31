<?php

class Event extends DataObject {

    private static $db = array(
        'EventName' => 'Text',
        'EventCode' => 'Varchar',
        'StartDate' => 'Date',
        'EndDate' => 'Date',
    );

    private static $has_one = array(
        'Category' => 'Category'
    );
}
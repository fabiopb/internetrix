<?php

class Event extends DataObject {

    private static $db = array(
        'EventName' => 'Text',
        'EventCode' => 'Varchar',
        'StartDate' => 'SS_Datetime',
        'EndDate' => 'SS_Datetime',
    );

    /*
	private static $has_one = array(
        'Category' => 'Category'
    );
    */
}
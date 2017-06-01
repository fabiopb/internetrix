<?php

class Event extends DataObject {

    private static $db = array(
        'EventName' => 'Text',
        'EventCode' => 'Varchar',
        'StartDate' => 'SS_Datetime',
        'EndDate' => 'SS_Datetime',
    );
	
    public function getDefaultSearchContext() {
        $fields = $this->scaffoldSearchFields(array(
            'restrictFields' => array('StartDate','EventName')
        ));

        $filters = array(
            'StartDate' => new PartialMatchFilter('StartDate'),
            'EventName' => new GreaterThanFilter('EventName')
        );

        return new SearchContext(
            $this->class, 
            $fields, 
            $filters
        );
    }
}
<?php

class EventPage extends Page {
	
	private static $db = array (
		'EventName' => 'Text',
        'EventCode' => 'Varchar',
        'StartDate' => 'SS_Datetime',
        'EndDate' => 'SS_Datetime',
	);
	
	private static $has_one = array(
		'Photo' => 'Image',
	);
	
	private static $can_be_root = false;
	private static $icon = "cms/images/treeicons/book-openfolder.gif";
	
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		
		// define fields for CMS
		$fields->addFieldToTab('Root.Images', new UploadField('Photo'));
		$fields->addFieldToTab('Root.Main', SS_Datetime::create('StartDate','Start date and time of event')
				->setConfig('showcalendar', true),
			 'Content');
		$fields->addFieldToTab('Root.Main', SS_Datetime::create('EndDate','End date and time of event')
				->setConfig('showcalendar', true),
			 'Content');
		
		$fields->addFieldToTab('Root.Main', TextareaField::create('EventName'), 'Content');
		$fields->addFieldToTab('Root.Main', TextField::create('EventCode','Code of the event'), 'Content');
		
		return $fields;
	}
}

class EventPage_Controller extends Page_Controller {
	
}
	
?>
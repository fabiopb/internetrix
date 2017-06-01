<?php

class EventPage extends Page {
	
	private static $db = array (
		'EventName' => 'Text',
        'EventCode' => 'Varchar',
        'StartDate' => 'SS_Datetime',
        'EndDate' => 'SS_Datetime',
	);
	
	private static $searchable_fields = array(
      'StartDate',
   );
   
	private static $has_one = array(
		'Photo' => 'Image',
	);
	
	private static $can_be_root = false;
	private static $icon = "cms/images/treeicons/book-openfolder.gif";
	
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		
		// define fields for CMS
		/*
			$field = new DatetimeField('Name', 'Label');
			$field->setConfig('datavalueformat', 'yyyy-MM-dd HH:mm'); // global setting
			$field->getDateField()->setConfig('showcalendar', 1); // field-specific setting	
		*/
		$fields->addFieldToTab('Root.Images', new UploadField('Photo'));
		$fields->addFieldToTab('Root.Main', DatetimeField::create('StartDate','Start date and time of event')
		//$fields->addFieldToTab('Root.Main', DateField::create('StartDate','Start date and time of event')
				->setConfig('showcalendar', true),
			 'Content');
		$fields->addFieldToTab('Root.Main', DatetimeField::create('EndDate','End date and time of event')
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
<?php

class NewsPage extends Page {
	
	private static $db = array (
		'Date' => 'Date',
		'Extract' => 'Text',
		'Author' => 'Varchar',
	);
	
	private static $can_be_root = false;
	
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		
		// define fields for CMS
		$fields->addFieldToTab('Root.Main', DateField::create('Date','Date of news article'));
		$fields->addFieldToTab('Root.Main', TextareaField::create('Extract'));
		$fields->addFieldToTab('Root.Main', TextField::create('Author','Journalist of the publication'));
		
		return $fields;
	}
}

class NewsPage_Controller extends Page_Controller {
	
}
	
?>
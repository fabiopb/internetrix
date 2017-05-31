<?php
	class EventsHolder extends Page {
		private static $has_one = array();
	    private static $allowed_children = array('EventPage');
	    private static $icon = "cms/images/treeicons/book-openfolder.gif";
	}
	
	class EventsHolder_Controller extends Page_Controller {
		
	}
?>
<?php
	class NewsHolder extends Page {
		private static $has_one = array();
	    private static $allowed_children = array('NewsPage');
	    private static $icon = "cms/images/treeicons/news-file.gif";
	}
	
	class NewsHolder_Controller extends Page_Controller {
		
	}
?>
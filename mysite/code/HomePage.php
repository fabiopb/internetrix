<?php
	class HomePage extends Page {
		public function LatestNews($num = 3) {
		    $holder = NewsHolder::get()->First();
		    return ($holder) ? NewsPage::get()->filter('ParentID', $holder->ID)->sort('Date DESC')->limit($num) : false;
		}
	}
	
	class HomePage_Controller extends Page_Controller {
        private static $allowed_actions = array('BrowserPollForm');

        public function BrowserPollForm() {
	        if(Session::get('BrowserPollVoted')) {
		        return false;
	        }
	        
            // Create fields
            $fields = new FieldList(
                new TextField('Name'),
                new OptionsetField('Browser', 'Your Favourite Browser', array(
                    'Firefox' => 'Firefox',
                    'Chrome' => 'Chrome',
                    'IE' => 'IE',
                    'Safari' => 'Safari',
                    'Opera' => 'Opera',
                    'Lynx' => 'Lynx'
                ))
            );

            // Create actions
            $actions = new FieldList(
                new FormAction('doBrowserPoll', 'Submit')
            );
			
			// old
            //return new Form($this, 'BrowserPollForm', $fields, $actions);
            
            $validator = new RequiredFields('Name', 'Browser');
	        return new Form($this, 'BrowserPollForm', $fields, $actions, $validator);
        }
        
        public function doBrowserPoll($data, $form) {
            $submission = new BrowserPollSubmission();
            $form->saveInto($submission);
            $submission->write();
            Session::set('BrowserPollVoted', true);
            return $this->redirectBack();
        }
		
		public function BrowserPollResults() {
	        $submissions = new GroupedList(BrowserPollSubmission::get());
	        $total = $submissions->Count();
	
	        $list = new ArrayList();
	        foreach($submissions->groupBy('Browser') as $browserName => $browserSubmissions) {
	            $percentage = (int) ($browserSubmissions->Count() / $total * 100);
	            $list->push(new ArrayData(array(
	                'Browser' => $browserName,
	                'Percentage' => $percentage
	            )));
	        }
	        return $list;
	    }
    }	
?>
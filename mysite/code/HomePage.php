<?php
public function LatestNews($num=5) {
    $holder = NewsHolder::get()->First();
    return ($holder) ? NewsPage::get()->filter('ParentID', $holder->ID)->sort('Date DESC')->limit($num) : false;
}
?>
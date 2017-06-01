<?php

global $project;
$project = 'mysite';

global $databaseConfig;
$databaseConfig = array(
	'type' => 'MySQLDatabase',
	'server' => 'localhost',
	'username' => 'root',
	'password' => 'root',
	'database' => 'internetrix',
	'path' => ''
);

// Set the site locale
i18n::set_locale('en_US');

// enable search engine
FulltextSearchable::enable();
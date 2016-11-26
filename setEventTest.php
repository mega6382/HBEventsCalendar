<?php

include 'src/calendarHTML.php';
include 'src/eventCalendar.php';
include 'src/eventsDBGateway.php';


$config = ['dbname'=>'event_calendar', 'dbhost' => 'localhost', 'dbuser' => 'root', 'dbpass' => '', 'dbtable' => 'events', 'assetsPath' => 'assets/', 'defaultDate' => date("Y-m-d")];

$events = new HBEventsCalendar\eventCalendar($config);

$event = [
	"title" => "TestEvent 2",
	"start" => "2016-12-05",
	"url" => "http://phpclasses.org",
	"end" => "2016-12-06",
	];

echo($events->setEvent($event));

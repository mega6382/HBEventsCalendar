<?php

include 'src/calendarHTML.php';
include 'src/eventCalendar.php';
include 'src/eventsDBGateway.php';


$config = ['dbname'=>'event_calendar', 'dbhost' => 'localhost', 'dbuser' => 'root', 'dbpass' => '', 'dbtable' => 'events', 'assetsPath' => 'assets/', 'defaultDate' => date("Y-m-d")];

$events = new HBEventsCalendar\eventCalendar($config);

$where = [
	"where" => "`title` = :title",
	"whereParams" => [
		":title" => "Meeting",
		]
	];

echo($events->getCalendar('where', $where));


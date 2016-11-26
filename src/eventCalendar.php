<?php
namespace HBEventsCalendar;

class eventCalendar
{
	protected $edg;
	
	protected $assetsPath;
	
	protected $defaultDate;
	
	public function __construct($config)
	{
		$this->edg = new eventsDBGateway($config['dbname'], $config['dbhost'], $config['dbuser'], $config['dbpass']);
		$this->edg->setTableName($config['dbtable']);
		$this->assetsPath = $config['assetsPath'];
		$this->defaultDate = $config['defaultDate'];
	}
	
	public function getCalendar($getType, $params)
	{
		switch($getType)
		{
			case 'all':
				$dbData = $this->edg->fetchAll();
				break;
			case 'byId':
				$dbData = $this->edg->getEvent($params['id']);
				break;
			case 'where':
				$dbData = $this->edg->get($params['where'], $params['whereParams']);
				break;
			default:
				$dbData = [];
				break;
		}
		
		$jsonData = json_encode($dbData);
		
		$calendar = new calendarHTML($jsonData, $this->assetsPath, $this->defaultDate);
		
		return $calendar;
	}
	
	public function setEvent($event)
	{
		$lastId = $this->edg->setEvent($event['title'], $event['start'], $event['url'], $event['end']);
		
		return $lastId;
	}
	
	
	
}
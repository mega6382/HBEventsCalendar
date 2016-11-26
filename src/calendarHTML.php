<?php
namespace HBEventsCalendar;

use DOMDocument;

class calendarHTML
{
	protected $htmlDoc;
	
	protected $html;
	
	protected $head;
	
	protected $body;
	
	protected $assetsPath;
	
	protected $jsonData;
	
	public function __construct($jsonData, $assetsPath, $defaultDate)
	{
		$this->htmlDoc = new DOMDocument;
		$this->jsonData = $jsonData;
		$this->assetsPath = $assetsPath;
		$this->html = $this->htmlDoc->appendChild($this->htmlDoc->createElement('html'));
		$this->head = $this->html->appendChild($this->htmlDoc->createElement('head'));
		$this->addHeadElements($defaultDate);
		$this->body = $this->html->appendChild($this->htmlDoc->createElement('body'));
		$this->addBodyElements();
	}
	
	private function addHeadElements($defaultDate)
	{
		$fcCss = $this->head->appendChild($this->htmlDoc->createElement('link'));
		$fcHref = $this->htmlDoc->createAttribute("href");
		$fcRel = $this->htmlDoc->createAttribute("rel");
		$fcHref->value = "{$this->assetsPath}css/fullcalendar.css";
		$fcRel->value = "stylesheet";
		$fcCss->appendChild($fcHref);
		$fcCss->appendChild($fcRel);
		
		$fcCssPrint = $this->head->appendChild($this->htmlDoc->createElement('link'));
		$fcpHref = $this->htmlDoc->createAttribute("href");
		$fcpRel = $this->htmlDoc->createAttribute("rel");
		$fcpMedia = $this->htmlDoc->createAttribute("media");
		$fcpHref->value = "{$this->assetsPath}css/fullcalendar.print.css";
		$fcpRel->value = "stylesheet";
		$fcpMedia->value = "print";
		$fcCssPrint->appendChild($fcpHref);
		$fcCssPrint->appendChild($fcpRel);
		$fcCssPrint->appendChild($fcpMedia);
		
		$momentJs = $this->head->appendChild($this->htmlDoc->createElement('script'));
		$mJsrc = $this->htmlDoc->createAttribute("src");
		$mJsrc->value = "{$this->assetsPath}js/moment.min.js";
		$momentJs->appendChild($mJsrc);
		
		$jQuery = $this->head->appendChild($this->htmlDoc->createElement('script'));
		$jQsrc = $this->htmlDoc->createAttribute("src");
		$jQsrc->value = "{$this->assetsPath}js/jquery.min.js";
		$jQuery->appendChild($jQsrc);
		
		$fullCalendar = $this->head->appendChild($this->htmlDoc->createElement('script'));
		$fCsrc = $this->htmlDoc->createAttribute("src");
		$fCsrc->value = "{$this->assetsPath}js/fullcalendar.min.js";
		$fullCalendar->appendChild($fCsrc);
		
		$script = $this->createCalendarScript($defaultDate);
		$eventCalendarScript = $this->head->appendChild($this->htmlDoc->createElement('script', $script));
		$eventCalendarCSS = $this->head->appendChild($this->htmlDoc->createElement('style',"
	body {
		margin: 40px 10px;
		padding: 0;
		font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}
"));


	}
	
	private function addBodyElements()
	{
		$calendarDiv = $this->body->appendChild($this->htmlDoc->createElement('div'));
		$cdId = $this->htmlDoc->createAttribute("id");
		$cdId->value = "calendar";
		$calendarDiv->appendChild($cdId);
	}
	
	private function createCalendarScript($defaultDate)
	{
		$script = <<<EOF
		$(document).ready(function() {

		$('#calendar').fullCalendar({
			defaultDate: '$defaultDate',
			editable: true,
			eventLimit: true,
			events: {$this->jsonData}
		});
		
	});

	
EOF;

	return $script;
	}
	
    public function __toString()
    {
        return $this->htmlDoc->saveHTML();
    }
}
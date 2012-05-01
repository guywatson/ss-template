<?php

class FooterLink extends DataObject {

	public static $db = array(
		'Title' 			=> 'Varchar(255)',
		"RedirectionType" 	=> "Enum('Internal,External','Internal')",
		"ExternalURL" 		=> "Varchar(255)" 
	);

	public static $extensions = array(
		'Orderable'
	);
	
	public static $defaults = array(
		'RedirectionType' => 'Internal'
	);

	public static $has_one = array(
		'Parent' 		=> 'SiteConfig',
		"LinkTo" 		=> "SiteTree"
	);

	static $summary_fields = array(
	    'Title' => 'Title',
	    'Link' 	=> 'redirectionLink'
	);


	function getRequirementsForPopup() {
		Requirements::javascript("mysite/javascript/my-link.js");
	}


	public function getCMSFields_forPopup()
	{
		$fields = new FieldSet(new TabSet('Root', $tab1 =  new Tab('Main')));

		$fields->addFieldsToTab('Root.Main', new TextField('Title'));
		$fields->addFieldsToTab('Root.Main',

			array(
				new OptionsetField(
					"RedirectionType", "Link to",
					array(
						"Internal" => "A page on your website",
						"External" => "Another website",
					),
					"Internal"
				),
				new TreeDropdownField(
					"LinkToID", 
					_t('RedirectorPage.YOURPAGE', "Page on your website"),
					"SiteTree"
				),
				new TextField("ExternalURL", _t('RedirectorPage.OTHERURL', "Other website URL"))
			)
		);
		
		$fields->addFieldsToTab('Root.Main', new LiteralField('space', '</br></br></br></br></br></br></br></br></br>'));
			
		return $fields;
	}

	public function onBeforeWrite(){

		$links = array('ExternalURL');

		foreach ($links as $name) {
			$link = $this->owner->$name;

			if ($link && strpos($link, '://') === false) {
				$this->owner->$name = "http://$link";
			}
		}

		parent::onBeforeWrite();
	}

	function redirectionLink() {
		if($this->RedirectionType == 'External') 
		{
			if($this->ExternalURL)
				return $this->ExternalURL;
		} 
		else 
		{
			$linkTo = $this->LinkToID ? DataObject::get_by_id("SiteTree", $this->LinkToID) : null;
			
			if($linkTo) 
				return $linkTo->Link();
		}
	}
}
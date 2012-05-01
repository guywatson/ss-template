<?php

class SiteConfigExtension extends DataObjectDecorator {

	public function extraStatics() {
		return array(
			'has_many' => array(
				'FooterColumn1' 	=> 'FooterColumn1Link',
				'FooterColumn2' 	=> 'FooterColumn2Link',
				'FooterColumn3' 	=> 'FooterColumn3Link'
				
			)
		);
	}

	public function updateCMSFields(FieldSet $fields) {

	
		/************************************Add Footer********************************/
		
		$fields->addFieldToTab('Root', new Tab('FooterLinks'), 'Access');
		
		$footercol1links = new MyOrderableComplexTableField($this->owner,'FooterColumn1','FooterColumn1Link',
															array('Title' => 'Title'),
															'getCMSFields_forPopup'
		);
		$footercol2links = new MyOrderableComplexTableField($this->owner,'FooterColumn2','FooterColumn2Link',
															array('Title' => 'Title'),
															'getCMSFields_forPopup'
		);
		$footercol3links = new MyOrderableComplexTableField($this->owner,'FooterColumn3','FooterColumn3Link',
															array('Title' => 'Title'),
															'getCMSFields_forPopup'
		);

		$footercol1links->setSourceID($this->owner->ID);
		$footercol2links->setSourceID($this->owner->ID);
		$footercol3links->setSourceID($this->owner->ID);

		
		$footercol1links->setPermissions(array('add', 'edit', 'delete'));
		$footercol2links->setPermissions(array('add', 'edit', 'delete'));
		$footercol3links->setPermissions(array('add', 'edit', 'delete'));
		
		$fields->addFieldToTab('Root.FooterLinks', new HeaderField("Column 1"));
		$fields->addFieldToTab('Root.FooterLinks', $footercol1links);
		$fields->addFieldToTab('Root.FooterLinks', new HeaderField("Column 2"));
		$fields->addFieldToTab('Root.FooterLinks', $footercol2links);
		$fields->addFieldToTab('Root.FooterLinks', new HeaderField("Column 3"));
		$fields->addFieldToTab('Root.FooterLinks', $footercol3links);
		
		$fields->addFieldToTab('Root', new Tab('FooterImage'), 'Access');
	}
}

class  FooterColumn1Link extends FooterLink
{
}
class  FooterColumn2Link extends FooterLink
{
}
class  FooterColumn3Link extends FooterLink
{
}

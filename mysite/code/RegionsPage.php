<?php

class RegionsPage extends Page {

	private static $has_many = array(
		'Regions' => 'RegionData'
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab('Root.Regions', GridField::create(
			'Regions',
			'Regions on this page',
			$this->Regions(),
			GridFieldConfig_RecordEditor::create()
		));

		return $fields;
	}
}

class RegionsPage_Controller extends Page_Controller {

	private static $allowed_actions = array(
		'show'
	);

	public function show(SS_HTTPRequest $request) {
		
		$urlSegment = $request->param('ID');

		
		$region = RegionData::get()->filter('URLSegment', $urlSegment)->first();

		if (!$region) {
			return $this->httpError(404, 'That region could not be found');
		}

		return $this->customise(array(
			'Region' => $region
		))->renderWith(array('RegionsPageShow', 'Page'));
	}
}

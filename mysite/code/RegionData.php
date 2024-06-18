<?php

class RegionData extends DataObject {

	private static $db = array(
		'Title' => 'Varchar',
		'Description' => 'HTMLText',
		'URLSegment' => 'Varchar(255)'
	);
	
	private static $has_one = array(
		'Photo' => 'Image',
		'RegionsPage' => 'RegionsPage'
	);

	private static $has_many = array(
		'Articles' => 'ArticlePage',
		'Properties' => 'PropertyData'
	);

	private static $summary_fields = array(
		'GridThumbnail' => '',
		'Title' => 'Title of region',
		'Description' => 'Short description',
		'URLSegment' => 'URL Segment'
	);

	public function getGridThumbnail() {
		if($this->Photo()->exists()) {
			return $this->Photo()->SetWidth(100);
		}
		return '(no image)';
	}

	public function getCMSFields() {
		$fields = FieldList::create(
			TextField::create('Title'),
			HtmlEditorField::create('Description'),
			TextField::create('URLSegment', 'URL Segment'),
			$uploader = UploadField::create('Photo')
		);

		$uploader->setFolderName('region-photos');
		$uploader->getValidator()->setAllowedExtensions(array(
			'png', 'gif', 'jpeg', 'jpg'
		));

		return $fields;
	}

	protected function onBeforeWrite() {
		parent::onBeforeWrite();

		
		if((!$this->URLSegment || $this->URLSegment == '') && $this->Title) {
			$this->URLSegment = SiteTree::generateURLSegment($this->Title);
		}

		
		$count = 2;
		while(RegionData::get()->filter('URLSegment', $this->URLSegment)->exclude('ID', $this->ID)->exists()) {
			$this->URLSegment = preg_replace('/-[0-9]+$/', '', $this->URLSegment) . '-' . $count;
			$count++;
		}
	}

	public function Link() {
		return $this->RegionsPage()->Link('show/'.$this->URLSegment); 
	}

	public function LinkingMode() {
		return Controller::curr()->getRequest()->param('ID') == $this->URLSegment ? 'current' : 'link';
	}

	public function ArticlesLink() {
		$page = ArticleHolder::get()->first();
		if($page) {
			return $page->Link('region/'.$this->URLSegment);
		}
	}
}

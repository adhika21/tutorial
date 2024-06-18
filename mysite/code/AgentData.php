<?php

class AgentData extends DataObject {

    private static $db = array (
        'Name' => 'Varchar',
        'Alamat' => 'Varchar',
        'Telp' => 'Varchar',
        'About' => 'Text',
        'URLSegment' => 'Varchar(255)' 
    );

    private static $has_one = array (
        'PrimaryPhoto' => 'Image'
    );

    private static $has_many = array(
        'Properties' => 'PropertyData'
    );

    private static $summary_fields = array (
        'Name' => 'Name',
        'Alamat' => 'Alamat',
        'Telp' => 'Telp',
		'About' => 'About',
		'URLSegment' => 'URLSegment'
    );

    private static $searchable_fields = array (
        'Name' => array (
            'filter' => 'PartialMatchFilter',
            'title' => 'Name',
            'field' => 'TextField'
        )
    );

    protected function onBeforeWrite() {
        parent::onBeforeWrite();
        if (!$this->URLSegment || $this->isChanged('Name')) {
            $this->URLSegment = $this->generateURLSegment($this->Name);
        }

        $count = 2;
        $originalURLSegment = $this->URLSegment;
        while(AgentData::get()->filter('URLSegment', $this->URLSegment)->exclude('ID', $this->ID)->exists()) {
            $this->URLSegment = $originalURLSegment . '-' . $count;
            $count++;
        }
    }

    protected function generateURLSegment($name) {
        $segment = strtolower($name);
        $segment = preg_replace('/[^a-z0-9]+/i', '-', $segment);
        $segment = trim($segment, '-');
        return $segment;
    }

    public function getCMSFields() {
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', array(
            TextField::create('Name'),
            TextareaField::create('Alamat'),
            TextField::create('Telp'),
            TextareaField::create('About')
        ));
        $fields->addFieldToTab('Root.Photos', $upload = UploadField::create(
            'PrimaryPhoto',
            'Primary photo'
        ));

        $upload->getValidator()->setAllowedExtensions(array(
            'png','jpeg','jpg','gif'
        ));
        $upload->setFolderName('agent-photos');

        return $fields;
    }

    public function Link() {
        $detailPage = DetailAgentPage::get()->first();
        if ($detailPage) {
            return $detailPage->Link('show/' . $this->URLSegment); 
        } else {
            return '#'; 
        }
    }
}

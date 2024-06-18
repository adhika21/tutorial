<?php

class PropertyData extends DataObject {

    private static $db = array (
        'Title' => 'Varchar',
        'Harga' => 'Varchar', 
        'Bedrooms' => 'Int',
        'Bathrooms' => 'Int',
        'FeaturedOnHomepage' => 'Boolean',
        'AvailableStart' => 'Date',
        'AvailableEnd' => 'Date',
        'Description' => 'Text',
        'Alamat' => 'Text', 
        'Lokasi' => 'Varchar',
        'Group' => 'Enum("New,Secondary")',
        'Transaksi' => "Enum('Jual,Sewa','Jual')",
        'LuasBangunan' => 'Varchar',
        'LuasTanah' => 'Varchar',
        'Listrik' => 'Varchar',
        'Sertifikat' => 'Varchar',
        'Garasi' => 'Boolean',
        'URLSegment' => 'Varchar(255)'
    );

    private static $has_one = array (
        'Region' => 'RegionData',
        'Agent' => 'AgentData',
        'PrimaryPhoto' => 'Image',
        'PropertyType' => 'MasterPropertyData' 
    );

    private static $many_many = array(
        'Facilities' => 'FasilitasPropertyData'
    );

    private static $summary_fields = array (
        'Title' => 'Title',
        'PropertyType.Title' => 'Tipe',
		'Transaksi' => 'Transaksi',
        'Region.Title' => 'Region',
        'Harga' => 'Harga', 
        'Agent.Name' => 'Agent',
        'FeaturedOnHomepageNice' => 'Sudah Laku?',
        'FacilitiesList' => 'Fasilitas',
        'URLSegment' => 'URL Segment'
    );

    public function FeaturedOnHomepageNice() {
        return $this->FeaturedOnHomepage ? _t('PropertyData.YES', 'Yes') : _t('PropertyData.NO', 'No');
    }

    public function FacilitiesList() {
        return implode(', ', $this->Facilities()->column('Fasilitas'));
    }

    public function getCMSFields() {
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', array(
            TextField::create('Title'),
            TextareaField::create('Description'),
            TextField::create('Harga', 'Harga'),
            TextareaField::create('Alamat'),
            TextField::create('Lokasi'),
            DropdownField::create(
                'PropertyTypeID',
                'Tipe', 
                MasterPropertyData::get()->map('ID', 'Title')->toArray()
            ),
            CheckboxSetField::create(
                'Facilities', 
                'Fasilitas', 
                FasilitasPropertyData::get()->map('ID', 'Fasilitas')->toArray()
            ),
            DropdownField::create('Group', 'Group', singleton('PropertyData')->dbObject('Group')->enumValues()),
            OptionsetField::create('Transaksi', 'Transaksi', singleton('PropertyData')->dbObject('Transaksi')->enumValues()),
            TextField::create('LuasBangunan'), 
            TextField::create('LuasTanah'),
            TextField::create('Listrik'),
            TextField::create('Sertifikat'),
            CheckboxField::create('Garasi'), 
			TextField::create('Bedrooms'),
			TextField::create('Bathrooms'),
            DropdownField::create('RegionID','Region')
                ->setSource(RegionData::get()->map('ID', 'Title'))
                ->setEmptyString('-- Select a region --'),
            DropdownField::create('AgentID','Agent')
                ->setSource(AgentData::get()->map('ID', 'Name'))
                ->setEmptyString('-- Select an Agent --'),                
            CheckboxField::create('FeaturedOnHomepage','Sudah Laku?'),
            DateField::create('AvailableStart', 'Available Start Date'),
            DateField::create('AvailableEnd', 'Available End Date')
        ));
        $fields->addFieldToTab('Root.Photos', $upload = UploadField::create(
            'PrimaryPhoto',
            'Primary photo'
        ));

        $upload->getValidator()->setAllowedExtensions(array(
            'png','jpeg','jpg','gif'
        ));
        $upload->setFolderName('property-photos');

        return $fields;
    }

    protected function onBeforeWrite() {
        parent::onBeforeWrite();

        if(!$this->URLSegment || $this->isChanged('Title')) {
            $this->URLSegment = $this->generateURLSegment($this->Title);
        }

        $count = 2;
        $originalURLSegment = $this->URLSegment;
        while(PropertyData::get()->filter('URLSegment', $this->URLSegment)->exclude('ID', $this->ID)->exists()) {
            $this->URLSegment = $originalURLSegment . '-' . $count;
            $count++;
        }
    }

    protected function generateURLSegment($title) {
        $segment = strtolower($title);
        $segment = preg_replace('/[^a-z0-9]+/i', '-', $segment);
        $segment = trim($segment, '-');
        return $segment;
    }

    public function Link() {
        return Controller::join_links(Director::baseURL(), 'property', 'show', $this->URLSegment);
    }
}

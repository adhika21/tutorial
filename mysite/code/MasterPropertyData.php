<?php

class MasterPropertyData extends DataObject {
    
    private static $db = array(
        'Title' => 'Varchar',
        'Tipe' => 'Varchar'
    );

    private static $has_many = array(
        'Properties' => 'PropertyData'
    );
    
    private static $summary_fields = array(
        'Title' => 'Title',
        'Tipe' => 'Tipe'
    );

    private static $searchable_fields = array(
        'Title',
        'Tipe'
    );

    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab('Root.Main', TextField::create('Title', 'Title'));
        $fields->addFieldToTab('Root.Main', TextField::create('Tipe', 'Tipe'));

        return $fields;
    }
}

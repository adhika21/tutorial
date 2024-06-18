<?php

class FasilitasPropertyData extends DataObject {
    
    private static $db = array(
        'Fasilitas' => 'Varchar',
    );

    private static $belongs_many_many = array(
        'Properties' => 'PropertyData'
    );

    private static $searchable_fields = array(
        'Fasilitas'
    );

    private static $summary_fields = array(
        'Fasilitas' => 'Fasilitas'
    );

    public function getCMSFields() {
        $fields = FieldList::create(TabSet::create('Root'));
        $fields->addFieldsToTab('Root.Main', array(
            TextField::create('Fasilitas', 'Fasilitas'),
        ));

        return $fields;
    }
}

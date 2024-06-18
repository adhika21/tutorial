<?php

use SilverStripe\CMS\Model\SiteTree;

class PopularRegionsPage extends Page {
    private static $allowed_children = "none";
    private static $icon_class = 'font-icon-p-globe';
}

class PopularRegionsPage_Controller extends Page_Controller {
    private static $allowed_actions = [];
    
    public function init() {
        parent::init();
    }
    
    public function PopularRegions($limit = 5) {
        return RegionsPage::get()->sort('ViewCount DESC')->limit($limit);
    }
}

<?php

class MasterPropertyAdmin extends ModelAdmin {

    private static $menu_title = 'Master Property';

    private static $url_segment = 'master-property-admin';

    private static $managed_models = array(
        'MasterPropertyData'
    );

    private static $menu_icon = 'mysite/icons/master-property.png';
}

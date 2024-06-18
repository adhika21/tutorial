<?php

class FasilitasPropertyAdmin extends ModelAdmin {

    private static $menu_title = 'Fasilitas Property';

    private static $url_segment = 'fasilitas-property';

    private static $managed_models = array(
        'FasilitasPropertyData'
    );

    private static $menu_icon = 'mysite/icons/fasilitas.png';
}

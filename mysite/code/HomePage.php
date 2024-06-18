<?php

class HomePage extends Page {

}

class HomePage_Controller extends Page_Controller {

    public function GetLatestArticles($count = 3) {
        return ArticlePage::get()
                    ->sort('Created', 'DESC')
                    ->limit($count);
    }   
}

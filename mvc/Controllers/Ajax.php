<?php
class Ajax extends Controller {
    private $newsModel;

    public function __construct()
    {
        $this->newsModel = $this->load_model('NewsModel');
    }

    public function load_news_other() {
        $cid = $_POST['cid'];
        $newsother = $this->newsModel->getNewsFromCaOrSubCa($cid,"null");
        print_r($newsother);
    }
}
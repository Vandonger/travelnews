<?php
//error_reporting(0);
class HomeController extends Controller
{
    private $categoryModel;
    private $newsModel;

    public function __construct()
    {
        $this->newsModel = $this->load_model('NewsModel');
        $this->categoryModel = $this->load_model('CategoryModel');
    }

    public function index() {
        $this->load_view('MasterLayout',[
            "page"=>"home",
            "category"=>$this->categoryModel->getCategory(),
            "sub_category"=>$this->categoryModel->getSubCategory(),
            "newsBestView"=>$this->newsModel->getNewsBestView(),
            "newsSlide"=>$this->newsModel->getNewsSlide(),
            "news"=>$this->categoryModel->getNews()
        ]);
    }

    public function category() {
        $result = null;
        $link = null;
        $listnews = null;
        if (isset($_GET['cid'])) {
            $result = $this->categoryModel->getCaWithId($_GET['cid']);
            $listnews = $this->newsModel->getNewsFromCaOrSubCa($_GET['cid'],"null");
        } else if(isset($_GET['sid'])){
            $result = $this->categoryModel->getSubCaWithId($_GET['sid']);
            $link = $this->categoryModel->getCaWithId($result[2]);
            $listnews = $this->newsModel->getNewsFromCaOrSubCa("null",$_GET['sid']);
        } else if ($result == null){
            echo "Không tồn tại danh mục này.";
        }
        $this->load_view('MasterLayout',[
            "page"=>"category",
            "category"=>$this->categoryModel->getCategory(),
            "sub_category"=>$this->categoryModel->getSubCategory(),
            "newsBestView"=>$this->newsModel->getNewsBestView(),
            'title'=>$result,
            'link'=>$link,
            "listnews"=>$listnews
        ]);
    }

    public function details() {
        $news = null;
        $idca = null;
        $idsubca = null;
        $othernews  = null;
        if (isset($_GET['id'])) {
            $news = $this->newsModel->getNewsFromId($_GET['id']);
            $n = json_decode($news,true);
            if ($n != null) {
                $idsubca = $this->categoryModel->getSubCaWithId($n['id_subcategory']);
                $idca = $this->categoryModel->getCaWithId($idsubca['id_category']);
                $othernews = $this->newsModel->getNewsFromCaOrSubCa($idsubca['id_category'],$n['id_subcategory']);
                $this->newsModel->updateView($_GET['id']);
                $this->load_view('MasterLayout',[
                    "page"=>"details",
                    "category"=>$this->categoryModel->getCategory(),
                    "sub_category"=>$this->categoryModel->getSubCategory(),
                    "newsBestView"=>$this->newsModel->getNewsBestView(),
                    'idca'=>$idca,
                    'idsubca'=>$idsubca,
                    "othernews"=>$othernews,
                    "news"=>$this->newsModel->getNewsFromId($_GET['id'])
                ]);
            } else $this->load_view('error_404');

        } else $this->load_view('error_404');

    }
}
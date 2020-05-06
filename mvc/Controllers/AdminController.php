<?php


class AdminController extends Controller
{
    protected $newsModel;
    protected $categoryModel;
    protected $sub_category;
    protected $title;
    protected $desc;
    protected $image;
    protected $content;

    public function __construct()
    {
        $this->newsModel = $this->load_model('NewsModel');
        $this->categoryModel = $this->load_model('CategoryModel');
    }

    public function index() {
        $this->load_view('admin');
    }

    public function listuser() {
        $this->load_view('admin',[
            'page'=>"listuser"
        ]);
    }

    public function edituser() {
        $this->load_view('admin');
    }

    public function listcategory() {
        $this->load_view('admin',[
            'page'=>"listcategory",
            'listcategory'=>$this->categoryModel->getAllCateSub()
        ]);

        if (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == "remove") {
            $reslRemove = $this->categoryModel->deleteSub(['id_subcategory'=>(int)$_GET['id']]);
            //header("Refresh: 0");
        }
    }

    public function addcategory() {
        $this->load_view('admin',[
            'page'=>"addcategory",
            'listcategory'=>$this->categoryModel->getCategory()
        ]);

        if (isset($_POST['btnCategoryAdd'])) {
            $id_category = $_POST['category'];
            $subcategory = $_POST['txtCateName'];
            $kq = $this->categoryModel->insertSub(
                $subcategory,
                $id_category,
            );
            //header('Location: listcategory');
        }
    }

    public function editcategory() {
        //$_SESSION['id_ca'];
        if (isset($_GET['id'])) {
            $_SESSION['id_ca'] = (int) $_GET['id'];
            $this->load_view('admin',[
                'page'=>"editcategory",
                "category"=>$this->categoryModel->getCategory(),
                "subCaWithId"=>$this->categoryModel->getSubCaWithId((int)$_SESSION['id_ca'])
            ]);
        }
        if (isset($_POST['btnCategoryUpdate'])) {
            $id_category = $_POST['category'];
            $subcategory = $_POST['txtCateName'];
            $kq = $this->categoryModel->updateSubCa(
                $subcategory,
                $id_category,
                ['id_subcategory'=>$_SESSION['id_ca']]
            );
            header('Location: listcategory');
        }

    }

    public function listnews() {
        $this->load_view('admin',[
            'page'=>"listnews",
            'listnews'=>$this->newsModel->getAllNewsCate()
        ]);
        if (isset($_GET['action']) && isset($_GET['id']) && $_GET['action'] == "remove") {
            $reslRemove = $this->newsModel->deleteNews(['id_news'=>(int)$_GET['id']]);
            header("Refresh: 0");
        }
    }

    public function addnews() {
        $this->load_view('admin',[
            "page"=>"addnews",
            "subcategory"=>$this->categoryModel->getSubCategory()
        ]);

        if (isset($_POST['btnNewsAdd'])) {
            $this->sub_category = $_POST['sub_category'];
            $this->title = $_POST['txtNewsTitle'];
            $this->desc = $_POST['txtNewsDesc'];
            $this->checkFileUpload('NewsImage');
            $this->content = $_POST['txtNewsContent'];
            $kq = $this->newsModel->insertNews(
                $this->title,
                $this->desc,
                $this->image,
                $this->content,
                $this->sub_category
            );
            $this->load_view('admin',[
                "page"=>"addnews",
                "subcategory"=>$this->categoryModel->getSubCategory(),
                "result"=>$kq
            ]);
        }
    }

    public function editnews() {
        $_SESSION['id'];
        if (isset($_GET['id'])) {
            $_SESSION['id'] = (int) $_GET['id'];
            $this->load_view('admin',[
                'page'=>"editnews",
                "subcategory"=>$this->categoryModel->getSubCategory(),
                "newsWithId"=>$this->newsModel->getAllNewsCateWithId((int)$_SESSION['id'])
            ]);
        }
        if (isset($_POST['btnNewsUpdate'])) {
            $this->sub_category = $_POST['sub_category'];
            $this->title = $_POST['txtNewsTitle'];
            $this->desc = $_POST['txtNewsDesc'];
            $this->content = $_POST['txtNewsContent'];
            $kq = $this->newsModel->updateNews(
                $this->title,
                $this->desc,
                $this->content,
                $this->sub_category,
                ['id_news'=>$_SESSION['id']]
            );
            header('Location: listnews');
        }
    }

    private function checkFileUpload($file) {
        if(isset($_FILES[$file])){
            $errors= array();
            $file_name = $_FILES[$file]['name'];
            $this->image = $file_name;
            $file_size = $_FILES[$file]['size'];
            $file_tmp = $_FILES[$file]['tmp_name'];
            $file_type = $_FILES[$file]['type'];
            $path ="public/assets/image/". $file_name;
            $str = explode('.',$file_name);
            $file_ext=strtolower(end($str));
            $expensions= array("jpeg","jpg","png");
            if(in_array($file_ext,$expensions)=== false){
                $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
            }
            if($file_size > 2097152) {
                $errors[]='Kích thước file không được lớn hơn 2MB';
            }
            if(empty($errors)==true) {
                move_uploaded_file($file_tmp,$path);
            }else{
                print_r($errors);
            }
        }
    }

}
<?php
session_start();
class App {
    protected $controller = "HomeController";
    protected $action = "index";
    protected $params = [];

    /**
     * App constructor.
     */
    public function __construct()
    {

        $arr = $this->urlProcess();
        //Controllers
        if ($arr != null) {
            if(file_exists("./mvc/Controllers/".$arr[0].".php")) {
                $this->controller = $arr[0];
                unset($arr[0]);
            }
        }

        require_once "./mvc/Controllers/".$this->controller.".php";
        $this->controller = new $this->controller;

        //Action
        if(isset($arr[1])) {
            if (method_exists($this->controller,$arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        } else $this->action = "index";

        //Params
         $this->params = $arr?array_values($arr):[];
        call_user_func_array([$this->controller, $this->action], $this->params );
    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @param string $controller
     */
    protected function setController($controller)
    {
        $this->controller = $controller;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param string $action
     */
    protected function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param array $params
     */
    protected function setParams($params)
    {
        $this->params = $params;
    }

    //Xử lý url
    public function urlProcess() {
        if(isset($_GET["url"])) {
            return explode("/",filter_var(trim($_GET['url'],'/')));
        }
    }
}

?>
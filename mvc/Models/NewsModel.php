<?php


class NewsModel extends Database
{
    /**
    * getAllNews lấy hết dữ liệu trong bảng trả về mảng dữ liệu
    * @return json
    */
    public function getAllNews() {
        return json_encode($this->getArray('news'));
    }

    public function getAllNewsCate() {
        $sql = "SELECT * FROM `news`,`sub_category`
                WHERE `news`.`id_subcategory` = `sub_category`.`id_subcategory`";
        return json_encode($this->query($sql));
    }
    public function getAllNewsCateWithId($id) {
        $sql = "SELECT * FROM `news`,`sub_category`
                WHERE `news`.`id_subcategory` = `sub_category`.`id_subcategory`
                AND `news`.`id_news` = $id";
        return json_encode($this->query($sql));
    }

    /**
     * getNewsFormId lấy một dòng dữ liệu trong bảng trả về mảng dữ liệu
     * @param int $id tin tức muốn lấy
     * @return json
     */
    public function getNewsFromId($id) {
        return json_encode($this->getRowArray('news',['id_news'=>$id]));
    }

    /**
     * insertNews thêm dữ liệu vào trong bảng trả về true/false
     * @param string $title,$desciption, $image,$content,$id_subcategory
     * @return boolean
     */
    public function insertNews($title,$description,$image,$content,$id_subcategory) {
        $view = 0;
        $date = new DateTime("now");
        $dateCreate = $date->format("Y-m-d");
        return $this->insert('news',[
            "title"=>$title,
            "description"=>$description,
            "image"=>$image,
            "content"=>$content,
            "timepost"=>$dateCreate,
            "view"=>$view,
            "id_subcategory"=>$id_subcategory
        ]);
    }

    /**
     * updateNews cập nhật dữ liệu trong bảng trả về true/false
     * @param string $title,$desciption, $image,$content,$id_subcategory,$id điều kiện
     * @return boolean
     */
    public function updateNews($title,$description,$content,$id_subcategory,$id=[]) {
        return $this->update('news',[
            "title"=>$title,
            "description"=>$description,
            "content"=>$content,
            "id_subcategory"=>$id_subcategory
        ],$id
        );
    }

    /**
     * deleteNews xoá dữ liệu trong bảng trả về true/false
     * @param int $id
     * @return boolean
     */
    public function deleteNews($id=[]) {
        return $this->delete('news',$id);
    }

    public function getNewsFromCaOrSubCa($idca, $idsca) {
        $sql = "SELECT * FROM 
            (SELECT news.*,ca.id_category,ca.category, sca.subcategory FROM news,category as ca,sub_category as sca 
            WHERE ca.id_category = sca.id_category
            AND news.id_subcategory = sca.id_subcategory )as A 
            WHERE A.id_category = ".$idca." OR A.id_subcategory =".$idsca;
        return $this->query($sql);
    }

    public function updateView($id) {
        $sql = "UPDATE news
            SET `view`=`view` + 1
            WHERE news.id_news =".$id;
        $this->query($sql,false);
    }

    public function getNewsBestView() {
        $sql = "SELECT * FROM news ORDER BY news.`view` DESC LIMIT 12";
        return json_encode($this->query($sql));
    }

    public function getNewsSlide() {
        $sql = "SELECT * FROM news ORDER BY news.`timepost` DESC LIMIT 6";
        return $this->query($sql);
    }

}
<?php


class CategoryModel extends Database {
    //get category
    public function getCategory() {
        return  $this->getArray('category');
    }
    //get sub category
    public function getSubCategory() {
        return $this->getArray('sub_category');
    }

    //get news
    public function getNews() {
        return $this->query('SELECT `category`.*, `sub_category`.*, `news`.* FROM `category` 
                                        LEFT JOIN `sub_category` ON `sub_category`.`id_category` = `category`.`id_category` 
                                        LEFT JOIN `news` ON `news`.`id_subcategory` = `sub_category`.`id_subcategory`;');
    }

    public function getAllCateSub() {
        return json_encode($this->query("SELECT * FROM `category`,`sub_category`
            WHERE `category`.`id_category` = `sub_category`.`id_category`"));

    }

    public function getCaWithId($id) {
        return $this->getRowArray('category',['id_category'=>$id]);
    }

    public function getSubCaWithId($id) {
        return $this->getRowArray('sub_category',['id_subcategory'=>$id]);
    }

    public function insertSub($subcategory,$id_category) {
        return $this->insert('sub_category',[
           'subcategory'=>$subcategory,
           'id_category'=>$id_category
        ]);
    }

    public function updateSubCa($subcategory,$id_category,$id = []) {
        return $this->update('sub_category',['subcategory'=>$subcategory,'id_category'=>$id_category],$id);
    }

    public function deleteSub($id = [])
    {
        return $this->delete('sub_category',$id);
    }
}
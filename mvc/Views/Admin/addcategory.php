<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Category Parent</label>
                        <select class="form-control" name="category">
                            <option value="0">Please Choose Category</option>
                            <?php
                            $result = $data['listcategory'];
                            //print_r($result);
                            foreach ($result as $item) {
                                $id_category = $item['id_category'];
                                $category = $item['category'];
                                echo "<option value=\"".$id_category."\">".$category."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name"/>
                    </div>
                    <button type="submit" name="btnCategoryAdd" class="btn btn-default">Category Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

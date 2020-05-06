<?php $subCaWithId = $data['subCaWithId'] ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>Edit</small>
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
                            $result = $data['category'];
                            foreach ($result as $item) {
                                $id_category = $item['id_category'];
                                $category = $item['category'];
                                if ($id_category == $subCaWithId['id_category']) {
                                    echo "<option selected value=\"".$id_category."\">".$category."</option>";
                                } else echo "<option value=\"".$id_category."\">".$category."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" name="txtCateName" placeholder="Please Enter Category Name"
                        value="<?php echo $subCaWithId['subcategory']?>"
                        />
                    </div>
                    <button type="submit" name="btnCategoryUpdate" class="btn btn-default">Category Edit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

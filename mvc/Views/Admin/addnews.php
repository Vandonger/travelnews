<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="./addnews" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Sub Category</label>
                        <select class="form-control" name="sub_category">
                            <option value="0">Please Choose Category</option>
                            <?php
                                $result = $data['subcategory'];
                                foreach ($result as $item) {
                                    $id_subcategory = $item['id_subcategory'];
                                    $subcategory = $item['subcategory'];
                                    echo "<option value=\"".$id_subcategory."\">".$subcategory."</option>";
                                }
                            ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>News Title</label>
                        <input class="form-control" name="txtNewsTitle" placeholder="Please Enter News Title" />
                    </div>
                    <div class="form-group">
                        <label>News Description</label>
                        <input class="form-control" name="txtNewsDesc" placeholder="Please Enter News Description" />
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <input type="file" name="NewsImage" required>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="txtNewsContent" name="txtNewsContent" class="form-control ckeditor" rows="10"></textarea>
                    </div>
                    <button type="submit" name="btnNewsAdd" class="btn btn-default">News Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>

                    <?php
                        if (isset($data['result'])) {
                            if ($data['result']==true) {
                                echo "<h1 style=\"color:green;\">Thêm thành công </h1>";
                            } else echo "<h1 style=\"color:red;\">Thêm thất bại </h1>";
                        }
                    ?>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
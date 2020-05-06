<?php $newsWithId = json_decode($data['newsWithId'],true); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News
                    <small>Update</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="./editnews" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Sub Category</label>
                        <select class="form-control" name="sub_category">
                            <option value="0">Please Choose Category</option>
                            <?php
                            $result = $data['subcategory'];
                            foreach ($result as $item) {
                                $id_subcategory = $item['id_subcategory'];
                                $subcategory = $item['subcategory'];
                                if ($id_subcategory == $newsWithId[0]['id_subcategory']) {
                                    echo "<option selected value=\"".$id_subcategory."\">".$subcategory."</option>";
                                } else echo "<option value=\"".$id_subcategory."\">".$subcategory."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>News Title</label>
                        <input class="form-control" name="txtNewsTitle" placeholder="Please Enter News Title"
                        value="<?php echo $newsWithId[0]['title'];?>"
                        />
                    </div>
                    <div class="form-group">
                        <label>News Description</label>
                        <input class="form-control" name="txtNewsDesc" placeholder="Please Enter News Description"
                               value="<?php echo $newsWithId[0]['description'];?>"
                        />
                    </div>
                    <div class="form-group">
                        <label>Images</label>
                        <?php
                        echo "<img style=\"width=250px;margin:16px;\" src=\"../public/assets/image/".$newsWithId[0]['image']."\" alt=\"".$newsWithId[0]['title']."\" />";
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea id="txtNewsContent" name="txtNewsContent" class="form-control ckeditor" rows="10">
                            <?php echo $newsWithId[0]['content'];?>
                        </textarea>
                    </div>
                    <button type="submit" name="btnNewsUpdate" class="btn btn-default">News Update</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                    <form>

                        <?php
                        if (isset($data['result'])) {
                            if ($data['result']==true) {
                                echo "<h1 style=\"color:green;\">Sửa thành công </h1>";
                            } else echo "<h1 style=\"color:red;\">Sửa thất bại </h1>";
                        }
                        ?>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
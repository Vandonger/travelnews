<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-news">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category Parent</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $listcategory = $data['listcategory'];
                $listcategory = json_decode($listcategory,true);
                foreach ($listcategory as $item) {
                    echo "<tr class=\"odd gradeX\" align=\"center\">
                    <td>".$item['id_subcategory']."</td>
                    <td>".$item['subcategory']."</td>
                    <td>".$item['category']."</td>
                    <td class=\"center\"><i class=\"fa fa-trash-o  fa-fw\"></i><a
                            href=\"listcategory&action=remove&id=".$item['id_subcategory']."\"
                            onclick=\"return confirm('Bạn có muốn xoá không?');\"> Delete</a></td>
                    <td class=\"center\"><i class=\"fa fa-pencil fa-fw\"></i> <a href=\"editcategory&id=".$item['id_subcategory']."\">Edit</a></td>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
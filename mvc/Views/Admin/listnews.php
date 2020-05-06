<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-news">
                <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Subcategory</th>
                    <th>Date Post</th>
                    <th>View</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $listnews = $data['listnews'];
                    $listnews = json_decode($listnews,true);
                    foreach ($listnews as $item) {
                        echo "<tr class=\"odd gradeX\" align=\"center\">
                                        <td>".$item['id_news']."</td>
                                        <td>".$item['title']."</td>
                                        <td>".$item['subcategory']."</td>
                                        <td>".$item['timepost']."</td>
                                        <td>".$item['view']."</td>
                                        <td class=\"center\"><i class=\"fa fa-trash-o  fa-fw\"></i><a 
                                        href=\"listnews&action=remove&id=".$item['id_news']."\" 
                                        onclick=\"return confirm('Bạn có muốn xoá không?');\"> Delete</a></td>
                                        <td class=\"center\"><i class=\"fa fa-pencil fa-fw\"></i> <a href=\"editnews&id=".$item['id_news']."\">Edit</a></td>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTables-news').DataTable( {
            "pagingType": "full_numbers"
        } );
    } );
</script>
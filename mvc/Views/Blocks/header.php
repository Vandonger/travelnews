<div class="grid wide full-wrap">
    <div class="navbar-wrap ">
        <div class="navbar-header">
            <label for="menu-check"  class="navbar-toggle">
                <i class="navbar-toggle-icon fas fa-bars"></i>
            </label>
            <input type="checkbox" hidden id="menu-check" name="" />
            <a class="navbar-logo"  href="index">TravelNews.com</a>
            <label for="menu-check" class="navbar-overlay"></label>
            <!--begin NAV mobile,table -->
            <div class="navbar-mobile-collapse">
                <label class="navbar-mobile-close" for="menu-check">
                    <i class="navbar-mobile-close-icon far fa-times-circle"></i>
                </label>
                <ul class="navbar-moblie-menu">
                    <li class="nav-moblie-menu-item">
                        <a class="nav-moblie-menu-item-link"  href="index"> Trang Chủ</a>
                    </li>
                    <?php
                    $result1 = $data["category"];
                    if($result1) {
                        foreach ($result1 as $value) {
                            $id_category = $value['id_category'];
                            $category = $value['category'];
                            echo "<li class=\"nav-moblie-menu-item\">";
                            echo "<a class=\"nav-moblie-menu-item-link\"  href=\"category&cid=$id_category\"> $category</a>";
                            echo "<ul class=\"nav-moblie-sub-menu\">";
                            $result2 = $data['sub_category'];
                            if($result2) {
                                foreach ($result2 as $item) {
                                    $id_subcategory = $item['id_subcategory'];
                                    $subcategory = $item['subcategory'];
                                    if($id_category == $item['id_category']) {
                                        echo "<li class=\"sub-nav-moblie-menu-item\">";
                                        echo "<a class=\"sub-nav-moblie-menu-item-link\"  href=\"category&sid=$id_subcategory\">$subcategory</a>";
                                        echo "</li>";
                                    }
                                }
                                echo "</ul>";
                                echo "</li>";
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
            <!--end NAV mobile,table -->
        </div>
        <!--begin NAV PC -->

        <div id="nav" class="navbar-collapse collapse hide-on-mobile-tablet" >
            <ul class="nav navbar-menu">
                <li class="menu-item">
                    <a class="menu-item-link"  href="index">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <?php
                $result1 = $data["category"];
                if($result1 != null) {
                    foreach ($result1 as $value) {
                        $id_category = $value['id_category'];
                        $category = $value['category'];
                        echo "<li class=\"menu-item\">";
                        echo "<a class=\"menu-item-link\"  href=\"category&cid=$id_category\"> $category</a>";

                        $result2 = $data['sub_category'];
                        if($result2 != null) {
                            echo "<ul class=\"nav-sub-menu\">";
                            foreach ($result2 as $item) {
                                $id_subcategory = $item['id_subcategory'];
                                $subcategory = $item['subcategory'];
                                if($id_category == $item['id_category']) {
                                    echo "<li class=\"sub-menu-item\">";
                                    echo "<a class=\"sub-menu-item-link\"  href=\"category&sid=$id_subcategory\">$subcategory</a>";
                                    echo "</li>";
                                }
                            }
                            echo "</ul>";
                            echo "</li>";
                        }
                    }
                }
                ?>

            </ul>
            <div class="menu-item nav-avatar">
<!--                <a href="/Login.aspx" class="nav-avatar__link"> Đăng nhập </a>-->
                <div class="nav-avatar-wrap">
                    <div class="nav-avatar__user">Mai Hoa</div>
                    <ul class="nav-sub-menu nav-avatar__list">
                        <li class="sub-menu-item nav-avatar__list-item">
                            <a href="/QuanLiBaiViet.aspx" class="sub-menu-item-link nav-avatar__item-link"> Quản lí bài viết </a>
                        </li>
                        <li class="nav-avatar__list-item">
                            <button id="btnlogout" class="nav-avartar__btn sub-menu-item-link nav-avatar__item-link" type="submit" value="true" name="btn-logout"> Thoát </button>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--End NAV PC -->
    </div>
</div>
<div class="main-left">
    <div class="slide" id="slide">
        <div class="slide-wrap">
            <?php
            $newsSlide = $data["newsSlide"];
            foreach ($newsSlide as $value) {
                echo "<div class=\"slide-wrap__item\">";
                echo "<div class=\"slide-wrap__item-img\">";
                echo "<a href=\"details&id=".$value['id_news']."\" class=\"slide-wrap__item-link\">";
                echo "<img src=\"../public/assets/image/".$value['image']."\" alt=\"".$value['title']."\" />";
                echo "</a>";
                echo "</div>";
                echo "<div class=\"slide-wrap__item-desc\">";
                echo "<div class=\"slide-wrap__item-title\">";
                echo "<h3>";
                echo "<a href=\"details&id=".$value['id_news']."\">".$value['title']."</a>";
                echo "</h3>";
                echo "</div>";
                echo "<div class=\"slide-wrap__item-content\">";
                echo "<p>" .$value['description'] ."</p>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>

        </div>
    </div>
    <!-- Su kien-->
    <div class="main-box" id="suKien">
        <div class="main-box__title">
            <div class="main-box__title-left">
                <h2>
                    <?php
                    echo "<a href=\"category&cid=4\" class=\"main-box__title-link\">Sự kiện</a>"
                    ?>
                </h2>
            </div>
        </div>
        <div class="main-box__content">
            <div class="row">
                <?php
                function noiBat($danhmuc,$resl,$col)
                {
                    //$resl = $data['news'];
                    //print_r($resultNews1);
                    $count = 0;
                    foreach ($resl as $item) {
                        if ($item['category'] == $danhmuc) {
                            if ($count < 6) {
                                $count++;
                            } else break;
                            echo "<div class=\"col l-".$col." m-6 c-6\">";
                            echo "<div class=\"main-box__item\">";
                            echo "<div class=\"main-box__item-img\">";
                            echo "<a class=\"main-box__item-link\" href=\"details&id=" . $item['id_news'] . "\">";
                            echo "<img src=\"../public/assets/image/" . $item['image'] . "\" alt=\"" . $item['title'] . "\" />";
                            echo "</a>";
                            echo "</div>";
                            echo "<div class=\"main-box__item-desc\">";
                            echo "<div class=\"main-box__item-desc-title\">";
                            echo "<h3>";
                            echo "<a class=\"main-box__item-link-title\" href=\"details&id=" . $item['id_news'] . "\">" . $item['title'] . "</a>";
                            echo "</h3>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }

                    }
                }

                noiBat("Sự kiện",$data['news'],4);
                ?>
            </div>
            <div class="main-box__content-more">
                <a class="main-box__content-more-link" href="category&cid=4">
                    <span>Xem thêm
                        <i class="main-box__content-more-img fas fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <!-- Tong Hop-->
    <div class="main-box" id="tongHop">
        <div class="main-box__title">
            <div class="main-box__title-left">
                <h2>
                    <a href="category&cid=1" class="main-box__title-link">Tổng hợp</a>
                </h2>
            </div>
        </div>
        <div class="main-box__content">
            <div class="row">
                <?php noiBat('Tổng hợp',$data['news'],6); ?>
            </div>
            <div class="main-box__content-more">
                <a class="main-box__content-more-link" href="category&cid=1">
                    <span>Xem thêm
                        <i class="main-box__content-more-img fas fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <!-- Viet nam-->
    <div class="main-box">
        <div class="main-box__title">
            <div class="main-box__title-left">
                <h2>
                    <a href="category&cid=2" class="main-box__title-link">Việt Nam</a>
                </h2>
            </div>
        </div>
        <div class="main-box__content">
            <div class="row">
                <?php noiBat('Việt nam',$data['news'],4); ?>
            </div>
            <div class="main-box__content-more">
                <a class="main-box__content-more-link" href="category&cid=2">
                    <span>Xem thêm
                        <i class="main-box__content-more-img fas fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <!-- The giơi -->
    <div class="main-box">
        <div class="main-box__title">
            <div class="main-box__title-left">
                <h2>
                    <a href="category&cid=3" class="main-box__title-link">Thế giới</a>
                </h2>
            </div>
        </div>
        <div class="main-box__content">
            <div class="row">
                <?php noiBat('Thế giới',$data['news'],6); ?>
            </div>
            <div class="main-box__content-more">
                <a class="main-box__content-more-link" href="categoryc&cid=3">
                    <span>Xem thêm
                        <i class="main-box__content-more-img fas fa-angle-down" aria-hidden="true"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
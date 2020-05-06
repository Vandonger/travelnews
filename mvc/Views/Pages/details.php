<?php
    $news = $data['news'];
    $news = json_decode($news,true);
    $idca  = $data['idca'];
    $idsubca = $data["idsubca"];
    $othernews = $data['othernews'];
?>
<!--tin chi tiết -->
<div class="main-left">
    <div class="main-short-bar">
        <ul class="short-bar__list">
            <li class="short-bar__item">
                <a href="index" class="short-bar__item-link">Trang chủ</a>
            </li>
            <li class="short-bar__item">
                <?php
                    echo "<a href=\"category&cid=".$idca['id_category'] ."\" class=\"short-bar__item-link\">".$idca['category']."</a>"
                ?>
            </li>
            <li class="short-bar__item">
                <?php
                    echo "<a href=\"category&sid=".$idsubca['id_subcategory'] ."\" class=\"short-bar__item-link\">".$idsubca['subcategory']."</a>"
                ?>
            </li>
        </ul>
    </div>
    <div class="main-block">
        <div class="block-title">
            <h1>
                <?php echo $news['title']?>
            </h1>
        </div>
        <div class="block-time">
            <?php echo $news['timepost']?>
        </div>
        <div class="block-desc">
            <p>
                <?php echo $news['description']?>
            </p>
        </div>
        <div class="block-content">
            <div class="block-content-desc">
                <?php echo $news['content']?>
            </div>
        </div>
    </div>
</div>
<!-- end tin chi tiết-->
<!--Các tin có liên quan  -->
<div class="row news-other">
    <div class="col l-12 m-12 c-12">
        <div class="news-other-title">Các tin cùng chuyên mục</div>
    </div>
    <?php
        $i = 0;
        foreach ($othernews as $item) {
            if ($i < 6 ) {
                $i++;
            } else break;
            echo "<div class=\"col l-4 m-4 c-6 other-content__item\">
                    <div class=\"news-other-content\">
                        <div class=\"other-content__item-img\">
                            <a class=\"other-content__item-link\" href=\"details&id=".$item['id_news']."\">
                                <img src=\"../public/assets/image/" . $item['image'] . "\" alt=\"" . $item['title'] . "\" />
                            </a>
                        </div>
                        <div class=\"other-content__item-desc\">
                            <div class=\"other-content__item-title\">
                                <a class=\"other-content__item-desc-link\" href=\"details&id=".$item['id_news']."\">".$item['title']."</a>
                            </div>
                            <div class=\"other-content__item-time\">".$item['timepost']."</div>
                        </div>
                    </div>
                </div>";
        }
    ?>

</div>
<!--end các tin có liên quan-->
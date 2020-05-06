<?php
    $title = $data['title'];
    $listnews = $data['listnews'];
    ?>

<div class="main-left">
    <div class="main-short-bar" id="mainShortBar" runat="server">
        <ul class="short-bar__list">
            <li class="short-bar__item">
                <a href="index" class="short-bar__item-link">Trang chủ</a>
            </li>
            <?php
                $link = $data['link'];
                if ($link != null) {
                    echo "<li class=\"short-bar__item\">";
                    echo "<a href=\"category&cid=".$link[0]."\" class=\"short-bar__item-link\">".$link['1']."</a>";
                    echo "</li>";
                    echo "<li class=\"short-bar__item\">";
                    echo "<a href=\"\" class=\"short-bar__item-link\">".$title['1']."</a>";
                    echo "</li>";
                } else {
                    echo "<li class=\"short-bar__item\">";
                    echo "<a href=\"#\" class=\"short-bar__item-link\">".$title['1']."</a>";
                    echo "</li>";
                }
            ?>
        </ul>
    </div>
    <!-- Su kien-->
    <div class="main-wrap" id="mainwrap" runat="server">
        <div class="main-wrap__title">
            <?php
                echo "<h1>".$title['1']."</h1>"
            ?>
        </div>
        <div class="main-wrap__list" id="main">
            <?php
            if ($listnews !=null) {
                foreach ($listnews as $item) {
                    echo "<div class=\"main-wrap__item\">
                        <div class=\"main-wrap__item-img\">
                            <a href=\"details&id=".$item['id_news']."\" class=\"main-wrap__item-link\">
                                <img src=\"../public/assets/image/" . $item['image'] . "\" alt=\"" . $item['title'] . "\" />
                            </a>
                        </div>
                        <div class=\"main-wrap__item-desc\">
                            <div class=\"main-wrap__item-desc-title\">
                                <h3>
                                    <a class=\"main-wrap__item-desc-link\" href=\"details&id=".$item['id_news']."\">".$item['title']."</a>
                                </h3>
                            </div>
                            <div class=\"main-wrap__item-desc-content hide-on-mobile-tablet\">
                                <p>".$item['description']."</p>
                            </div>
                            <div class=\"main-wrap__item-desc-time\">".$item['timepost']."</div>
                        </div>
                    </div>";
                }
            }

            ?>

            <div class="main-wrap__content-more">
                <button class="main-wrap__content-more-link" id="newsother">
                    <span>Xem nhiều hơn
                        <i class="main-wrap__content-more-img fas fa-angle-down" aria-hidden="true"></i>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var count = 5;
        $('#newsother').click(function () {
            $('main').load("Ajax.php",{
                countNews: count
            })
        })
    })
</script>
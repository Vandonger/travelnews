<!-- main right -->
<div class="main-right">
    <div class="row slide-bar">
        <!-- main right left -->
        <div class="col l-7 m-12 c-12 slide-bar-left">
            <div class="slide-box">
                <div class="slide-box-title">
                    <h4>KHUYẾN MÃI</h4>
                </div>
                <div class="slide-box-content">
                    <div class="box-content__title">
                        <a href="#">Kích cầu du lịch: Combo nghỉ dưỡng FLC 5 sao ưu đãi đến 50%</a>
                    </div>
                    <div class="box-content-desc">
                        <p>Lữ Hành Việt Nam kết hợp cùng hệ thống khách sạn FLC triển khai gói combo hấp
                            dẫn,
                            giảm giá đến 50% bao gồm vé máy bay/xe Limousine đưa đón, nghỉ dưỡng tại
                            FLC, khởi hành từ Hà Nội. </p>
                    </div>
                </div>
                <div class="slide-box-content">
                    <div class="box-content__title">
                        <a href="#">Ưu đãi giá vé đặc biệt từ Hãng hàng không Emirates</a>
                    </div>
                    <div class="box-content-desc">
                        <p>Hãng hàng không Emirates thực hiện chương trình ưu đãi dành cho hành khách từ nay
                            đến ngày 29/3/2020 với mức giá vé khứ hồi dành cho hạng Phổ thông chỉ từ 13,97 triệu đồng. </p>
                    </div>
                </div>
                <div class="slide-box-content">
                    <div class="box-content__title">
                        <a href="#">Khuyến mãi hot: Tour Singapore - Malaysia 4 ngày trọn gói chỉ từ 6,9 triệu đồng</a>
                    </div>
                    <div class="box-content-desc">
                        <p>Tour Singapore - Malaysia một hành trình 2 quốc gia, đưa du khách đến thăm những thành
                            phố xinh đẹp với nền văn minh tiên tiến và văn hóa đặc sắc, giá chỉ từ 6,9 triệu đồng/người. </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- main right rigth -->
        <div class="col l-5 m-0 c-0 slide-bar-right">
            <div class="box-best-view">
                <div class="box-best-view-title">
                    TIN XEM NHIỀU
                </div>
                <div class="box-best-view-content">
                    <ul class="box-best-view-list">
                        <?php
                            $newsBestView = json_decode($data['newsBestView'],true);
                            foreach ($newsBestView as $item) {
                                $title = $item['title'];
                                echo "<li class=\"box-best-view-item\">
                                        <a href=\"details&id=".$item['id_news']."\">".$title."</a>
                                    </li>";
                            }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
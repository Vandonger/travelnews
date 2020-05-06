<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel News</title>
    <!--    <link href="~/favicon.ico" rel="shortcut icon" type="image/x-icon" />-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese" rel="stylesheet"/>
    <link rel="stylesheet" href="../public/assets/css/style.css" />
    <link rel="stylesheet" href="../public/assets/css/grid.css" />
    <link rel="stylesheet" href="../public/assets/css/responsive.css" />
    <link rel="stylesheet" href="../public/assets/font/fontawesome-pro-5.12.0-web/css/all.min.css" />
</head>
<body>
<div class="app" style="overflow: hidden">
    <!--header-->
    <div class="navbar">
        <?php require_once './mvc/Views/Blocks/header.php'?>
    </div>
    <!--Main-->
    <div class="container">
        <div class="grid wide">
            <div class="row">
                <div class="col l-7 m-7 c-12">
                    <!--Display mainleft-->
                    <?php require_once './mvc/Views/Pages/'.$data['page'].'.php'?>
                </div>
                <!--Display mainright-->
                <div class="col l-5 m-5 c-0">
                    <?php require_once './mvc/Views/Blocks/mainright.php'?>
                </div>
            </div>
        </div>
    </div>
    <!--footer-->
    <footer class="grid wide">
        <?php require_once './mvc/Views/Blocks/footer.php'?>
    </footer>
</div>
<script type="text/javascript" defer>
    var myIndex = 0;
    carousel();
    function carousel() {
        var i;
        var x = document.getElementsByClassName("slide-wrap__item");
        for (i = 0; i < x.length; i++) {
            //x[i].style.display = "none";
            x[i].classList.remove("active");
            x[i].classList.remove("slide-out");
        }
        if(myIndex != 0) {x[myIndex-1].classList.add("slide-out");}
        myIndex++;
        if (myIndex > x.length) { myIndex = 1 }
        x[myIndex - 1].classList.add("active");

        setTimeout(carousel, 3000); // Change image every 3 seconds
    }
</script>
</body>
</html>

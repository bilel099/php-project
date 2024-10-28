<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>

<?php
require('inc/header.inc.php');
?>
    <section class="hero">
        <div class="container">
            <div class="row">
                <?php
                    require('inc/allCategories.inc.php');
                ?>
                <div class="col-lg-9">
                    <?php
                        require('inc/bar_search.inc.php');
                        $req=$con->prepare("select product.id as id,product.nom as nom,product.url as url,product.prix as prix from product,category where product.status=1 and category.status=1 and product.category=category.id order by id DESC LIMIT 1");
                        $req->execute();
                        if($req->rowCount()>=1){
                        $ligne=$req->fetch();
                    ?>
                    <div class="hero__item set-bg" data-setbg="image/<?php echo $ligne['url'] ; ?>">
                        <div class="hero__text">
                            <span>Nouveau produit</span>
                            <h2><?php echo $ligne['nom'] ?><br /><?php echo $ligne['prix'] ?> DT</h2>
                           <!-- <p>Free Pickup and Delivery Available</p>  -->
                            <a href="shop-details.php?id=<?php echo $ligne['id']; ?>" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin 
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-1.jpg">
                            <h5><a href="#">Fresh Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-2.jpg">
                            <h5><a href="#">Dried Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-3.jpg">
                            <h5><a href="#">Vegetables</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-4.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-5.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  -->
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2 id="produit">Produit en vedette</h2>
                    </div>

                </div>
            </div>
            <div class="row featured__filter">
                <?php 
                if(isset($_GET['category'])){
                $req=$con->prepare("select product.id as id,product.nom as nom,product.url as url,product.prix as prix from product,category where product.category=? and product.status=1 and category.status=1 and product.category=category.id ");
                $req->execute(array($_GET['category']));
                }elseif(isset($_GET['search'])){
                    $sql="select product.id as id,product.nom as nom,product.url as url,product.prix as prix from product,category where product.status=1 and category.status=1 and product.category=category.id and cle like '%".$_GET['search']."%'";
                    $req=$con->prepare($sql);
                    $req->execute();
                    
                }else{
                    $req=$con->prepare("select product.id as id,product.nom as nom,product.url as url,product.prix as prix from product,category where product.status=1 and category.status=1 and product.category=category.id order by nom");
                    $req->execute();
                }
                if($req->rowCount()>=1){
                while($ligne=$req->fetch()){
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="image/<?php echo $ligne['url'] ; ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="shop-details.php?id=<?php echo $ligne['id']; ?>"><?php echo $ligne['nom'] ; ?></a></h6>
                            <h5><?php echo $ligne['prix'] ; ?> DT</h5>
                        </div>
                    </div>
                </div><?php }}else{ echo "aucun produit trouver" ; } ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
     Banner End -->


    <!-- Footer Section Begin -->
    <?php
require('inc/footer.inc.php');
?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>
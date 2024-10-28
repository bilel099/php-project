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

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
            <?php
                    require('inc/allCategories.inc.php');
                ?>
                <div class="col-lg-9">
                <?php
                        require('inc/bar_search.inc.php');
                ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->



    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                 <?php 
                    $req=$con->prepare("select product.id as id,product.nom as nom , product.url as url , product.prix as prix, product.category as id_cat,product.description as description,category.nom as nom_cat,product.qte as qte from product,category where product.id=? and product.category=category.id and product.status=1 ");
                    $req->execute(array($_GET['id']));
                    while($ligne=$req->fetch()){
                        $id_cat=$ligne['id_cat'];
                        $id_pro=$ligne["id"];
                ?>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="image/<?php echo $ligne['url']; ?>" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <?php
                                $req_img=$con->prepare("select * from images where id_product=?");
                                $req_img->execute(array($_GET['id']));
                                while($l_img=$req_img->fetch()){
                             ?>
                            <img data-imgbigurl="image/<?php echo $l_img['url']; ?>"
                                src="image/<?php echo $l_img['url']; ?>" alt="">
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $ligne['nom']; ?></h3>
                        <div class="product__details__price"><?php echo $ligne['prix']; ?> DT</div>
                        <p><?php echo $ligne['description']; ?></p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">ADD TO CARD</a>
                        <!-- <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a> -->
                        <ul>
                            <li><b>Availability</b> <span><?php if($ligne["qte"]>=1){ ?>En Stock<?php }else{ ?>En Arrivage<?php } ?></span></li>
                            <li><b>Categorie</b> <span><?php echo $ligne["nom_cat"] ?></span></li>

                        </ul>
                    </div>
                </div>
                <?php } ?>
                <!-- 
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                        suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                        vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                        accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                        pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                        elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                        et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                        vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                        <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                        Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                        porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                        sed sit amet dui. Proin eget tortor risus.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Produit associé</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                    $req=$con->prepare("select * from product where id!=? and category=? and status=1 order by id DESC LIMIT 4");
                    $req->execute(array($id_pro,$id_cat));
                    
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
                </div>
                <?php }
                    if($req->rowCount()<4){
                        $n=4-$req->rowCount();
                        $req=$con->prepare("select product.id as id,product.nom as nom,product.url as url,product.prix as prix from product,category where product.id!=? and product.category!=? and product.status=1 and category.status=1 and product.category=category.id  order by id DESC LIMIT ".$n);
                        $req->execute(array($id_pro,$id_cat));
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
                </div>
                <?php } } ?>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

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
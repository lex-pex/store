<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>E-Store</title>
        <link href="/design/css/style.css" rel="stylesheet">
        <link href="/design/css/bootstrap.min.css" rel="stylesheet">
        <link href="/design/css/font-awesome.min.css" rel="stylesheet">
        <link href="/design/css/prettyPhoto.css" rel="stylesheet">
        <link href="/design/css/price-range.css" rel="stylesheet">
        <link href="/design/css/animate.css" rel="stylesheet">
        <link href="/design/css/main.css" rel="stylesheet">
        <link href="/design/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]><script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script><![endif]-->
        <link rel="shortcut icon" href="/design/images/ico/favi.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/design/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/design/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/design/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/design/images/ico/apple-touch-icon-57-precomposed.png">
    </head>
    <body>
        <header id="header">
            <div> <!--class="very_top"-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone"></i> +38(123)456-78-90</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> kujawec@gmail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul>
                                    <li>
                                        <a href="/cart/"><i class="fa fa-shopping-cart"></i> Корзина
                                                (<span id="cart_count"><?php echo Cart::countItems(); ?></span>)
                                        </a>
                                    </li>
                                    <li>
                                        <?php if (User::isGuest()): ?>
                                        <a href="/login/"><i class="fa fa-lock"></i> Вход</a>
                                        <?php else : ?>
                                        <a href="/cabinet/"><i class="fa fa-user"></i>
                                            <?php echo $_SESSION['u'] ? $_SESSION['u']['name'] : 'Аккаунт'; ?>
                                        </a>
                                        <a href="/logout/"><i class="fa fa-unlock"></i> Выход</a>
                                        <?php endif; ?>
                                        &nbsp;&nbsp;&nbsp;
                                    </li>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu_block">
                <div class="menu">
                    <ul>
                        <li><a href="/"><img height="25" src="/design/images/home/logotype.png" alt="" /></a></li>
                        <li><a href="/">Главная</a></li>
                        <li>
                        <div class="drop"><a href="#">Магазин<i class="fa fa-angle-down"></i></a>
                            <div class="drop_item"><a href="/catalog/">Каталог товаров</a>
                            <a href="/cart/">Корзина</a></div>
                        </div>
                        </li>
                        <li><a href="/blog/">Блог</a></li> 
                        <li><a href="/about/">О сайте</a></li>
                        <li><a href="/contacts/">Контакты</a></li>
                    </ul>
                </div>
            </div>
        </header>
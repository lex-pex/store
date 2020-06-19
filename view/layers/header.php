<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Online-Store, household appliances, computers, phones, tablets">
        <meta name="author" content="Lex-Pex">
        <title>Lex-Pex E-Store</title>
        <link href="/public/css/style.css?v=2" rel="stylesheet">
        <!--[if lt IE 9]><script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script><![endif]-->
        <link rel="shortcut icon" href="/public/images/ico/favi.png">
    </head>
    <body>
        <header id="header">
            <div> <!--class="very_top"-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">
                                <ul class="nav nav-pills">
                                    <li><a href="#"><i class="fa fa-phone bg-info"></i> + 4 098 765 43 21</a></li>
                                    <li><a href="#"><i class="fa fa-envelope"></i> address@mail.com</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul>
                                    <li>
                                        <a href="/cart/"><i class="fa fa-shopping-cart"></i> Cart (<span id="cart_count"><?php echo Cart::countItems(); ?></span>)</a>
                                    </li>
                                    <li>
                                    <?php if (User::isGuest()): ?>
                                        <a href="/login/"><i class="fa fa-lock"></i> Login</a>
                                    <?php else : ?>
                                        <a href="/cabinet/"><i class="fa fa-user"></i><?php echo $_SESSION['u'] ? $_SESSION['u']['name'] : 'Profile'; ?></a>
                                        <a href="/logout/"><i class="fa fa-unlock"></i> Logout</a>
                                    <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu_block">
                <div class="menu">
                    <ul>
                        <li><a href="/"><img height="25" src="/public/images/home/logotype.png" alt="" /></a></li>
                        <li><a href="/">Home</a></li>
                        <li>
                            <div class="drop"><a href="#">Store<i class="fa fa-angle-down"></i></a>
                                <div class="drop_item">
                                    <a href="/catalog/">Catalog</a>
                                    <a href="/cart/">Cart</a>
                                </div>
                            </div>
                        </li>
                        <li><a href="/about/">About</a></li>
                        <li><a href="/contacts/">Contacts</a></li>
                    </ul>
                </div>
            </div>
        </header>
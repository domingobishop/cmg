<!DOCTYPE html>
<html lang="en-gb">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="initial-scale = 1.0" name="viewport">
    <title>
        <?php wp_title('|', true, 'right'); ?>
    </title>
    <?php wp_head(); ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>
<div class="bc-banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <a href="<?php bloginfo('siteurl'); ?>/"
                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>" class="img-responsive">
                </a>
            </div>
            <div class="col-sm-6 text-right">
                <div class="tagline-logo clearfix">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo-tag.jpg" alt="<?php bloginfo('description'); ?>" class="img-responsive pull-right">
                </div>
                <p>
                    <a href="https://www.facebook.com/ClareMastersGames/" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/facebook.png"></a>
                    <a href="https://twitter.com/claresamasters" target="_blank"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/twitter.png"></a>
                </p>
                <p>
                    <a href=" https://regonline.activeglobal.com/mrmcsagames2017" type="button" class="btn btn-primary">Register now</a>
                </p>
            </div>
        </div>
    </div>
</div>
<header id="head" class="bc-head">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php bloginfo('siteurl'); ?>/"
                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
                    <?php bloginfo('name'); ?>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php wp_nav_menu(array('menu' => 'primary', 'items_wrap' => '<ul class="nav navbar-nav" role="menu">%3$s</ul>', 'container' => false)); ?>
                <div id="countdown"></div>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>
<!-- #head -->

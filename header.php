<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php wp_title();?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/msv-rivista.css" rel="stylesheet">

    <!-- import google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Domine:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

    <?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<div class="container">

    <div class="row-fluid">

        <div class="col-sm-12 text-center">
            <img src="<?php echo get_template_directory_uri(); ?>/img/msv_logo.svg">
        </div>
        <div class="col-sm-12">

            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <?php
                            $items = wp_get_nav_menu_items('main-menu');
                            foreach ( $items as $item ) {
                                $class_menu_active = '';
                                if( have_posts()&& get_the_ID() == $item->object_id ) {
                                    $class_menu_active = 'active';
                                }
                                $menu_item_title = $item->title;
                                $menu_item_url = $item->url;
                                $menu_item_format = "<li class='%s'><a href='%s'>%s</a></li>%s";
                                printf( $menu_item_format, $class_menu_active, $menu_item_url, $menu_item_title, PHP_EOL );
                            }
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Altro <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <?php
                                    $items = wp_get_nav_menu_items('page-menu');
                                    foreach ( $items as $item ) {
                                        $menu_item_title = $item->title;
                                        $menu_item_url = $item->url;
                                        $menu_item_format = "<li><a href='%s'>%s</a></li>%s";
                                        printf( $menu_item_format, $menu_item_url, $menu_item_title, PHP_EOL );
                                    }
                                    ?>
                                </ul>
                            </li>
                        </ul>

                        <form class="navbar-form navbar-right" role="search">
                            <div class="input-group add-on">
                                <div class="input-group-btn">
                                    <button class="btn btn-default search" type="submit"><i
                                            class="glyphicon glyphicon-search"></i></button>
                                </div>
                                <input type="text" class="form-control search" placeholder="Search" name="srch-term"
                                       id="srch-term">
                            </div>
                            <a href="<?php echo get_permalink( USER_PROFILE_PAGE ); ?>" class="btn btn-default search">
                                <i class="glyphicon glyphicon-user"></i>
                            </a>
                        </form>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>
        </div>
    </div>


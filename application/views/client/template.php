<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Moderna</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content=""/>
    <meta name="author" content="http://bootstraptaste.com"/>
    <base href="/">
    <!-- css -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet"/>
    <!-- Theme skin -->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="">
    <!-- start header -->
    <header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="menu-toggle">
                        <span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                    </button>
                    <a class="navbar-brand" href="/"><span>A</span>rticles</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="/about">About</a></li>
                        <li><a href="/about/contacts">Contacts</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->
    <section id="inner-headline">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <!-- Хлебные крошки -->
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
                        <li class="active"><?=$data['breadcrumb']?></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="row" id="wrapper">
                <div class=""  id="sidebar-wrapper">
                    <aside class="right-sidebar" id="">
                        <div class="sidebar-nav nav-pills nav-stacked" id="menu">
                            <div class="widget">
                            <!-- Поиск -->
                                <form class="form-search" action="/search" method="POST">
                                    <input name="text" class="form-control" type="text" placeholder="Search..">
                                    <div class="glyphicon glyphicon-search"><input name="send" type="submit" value="" class="search__send"></div>
                                </form>
                            </div>
                            <!-- Категории -->
                            <div class="widget">
                                <h5 class="widgetheading">Категории</h5>
                                <ul class="cat"></ul>
                            </div>
                        </div>
                    </aside>
                </div>
                <!-- #CONTENT# -->
                <div class="col-lg-10">
                    <?php include $this->view_path_folder . '/' . $content_view; ?>
                </div>
                <!-- #ENDCONTENT# -->
            </div>
        </div>
    </section>
    <footer>
        <div id="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="copyright">
                            <p>
                                <span>&copy; Moderna 2014 All right reserved. By </span><a
                                    href="#" target="_blank">Bootstraptaste</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<script src="js/jquery-1.8.2.min.js"></script>

<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>
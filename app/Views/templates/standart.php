<!DOCTYPE html>
<html lang="<?=$Hunabku->app->lang?>">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?=$Hunabku->app->charset?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <title><?= $Hunabku->title ?> |  <?=$Hunabku->app->name ?></title>
    <link href="<?= $Hunabku->framework ?>/css/themes/collapsible-menu/materialize.css?ver=<?=$Hunabku->app->version ?>"  rel="stylesheet" type="text/css">
    <link href="<?= $Hunabku->framework ?>/css/themes/horizontal-menu/style.css?ver=<?=$Hunabku->app->version ?>" rel="stylesheet" type="text/css">
    <link href="<?= $Hunabku->framework ?>/css/layouts/style-horizontal.min.css?ver=<?=$Hunabku->app->version ?>" rel="stylesheet" type="text/css">
    <link href="<?= $Hunabku->framework ?>/vendors/perfect-scrollbar/perfect-scrollbar.css?ver=<?=$Hunabku->app->version ?>" rel="stylesheet" type="text/css" >
    <?= $Hunabku->stylesheets ?>
  </head>

  <body>
    <header id="header" class="page-topbar" data-render="navwidget">
        <section id="topnavbar" class="navbar-fixed">
            <?= $Hunabku->Widget('TopNavBar',['blue darken-4']) ?>
            <aside id="topnavmenu">
                <?= $Hunabku->Widget('TopNavMenu',['blue darken-4']) ?>
            </aside>
        </section>
    </header>

    <div class="wrapper" data-render="template">
      <section id="content">
          <?= $this->renderSection('organism') ?>
      </section>
    </div>

    <script type="text/javascript" src="<?= $Hunabku->framework ?>/vendors/jquery-3.2.1.min.js?ver=<?=$Hunabku->app->version ?>"></script>
    <script type="text/javascript" src="<?= $Hunabku->framework ?>/js/materialize.min.js?ver=<?=$Hunabku->app->version ?>"></script>
    <script type="text/javascript" src="<?= $Hunabku->framework ?>/vendors/perfect-scrollbar/perfect-scrollbar.min.js?ver=<?=$Hunabku->app->version ?>"></script>
    <script type="text/javascript" src="<?= $Hunabku->framework ?>/js/plugins.js?ver=<?=$Hunabku->app->version ?>"></script>
    <?= $Hunabku->javascripts ?>
  </body>

</html>
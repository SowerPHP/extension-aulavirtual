<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en-AU">
    <head>
        <meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
        <meta name="generator" content="SowerPHP" />
        <title><?=$_header_title?></title>
        <link rel="shortcut icon" href="<?=$_base?>/img/favicon.png" />
        <link rel="stylesheet" type="text/css" href="<?=$_base?>/layouts/sinorca/css/screen.css" media="screen" title="Sinorca (screen)" />
        <link rel="stylesheet alternative" type="text/css" href="<?=$_base?>/layouts/sinorca/css/screen-alt.css" media="screen" title="Sinorca (alternative)" />
        <link rel="stylesheet" type="text/css" href="<?=$_base?>/layouts/sinorca/css/print.css" media="print" />
        <script type="text/javascript" src="<?=$_base?>/js/jquery.js"></script>
        <script type="text/javascript" src="<?=$_base?>/js/__.js"></script>
        <script type="text/javascript" src="<?=$_base?>/js/form.js"></script>
        <link href="<?=$_base?>/js/google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript" src="<?=$_base?>/js/jquery-ui/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="<?=$_base?>/js/jquery-ui/css/smoothness/jquery-ui.css" media="screen"/>
        <script type="text/javascript" src="<?=$_base?>/js/google-code-prettify/prettify.js"></script>
        <script type="text/javascript"> $(function() { prettyPrint(); }); </script>
<?=$_header_extra?>
    </head>
    <body>
        <!-- For non-visual user agents: -->
        <div id="top"><a href="#main-copy" class="doNotDisplay doNotPrint">Skip to main content.</a></div>
        <!-- ##### Header ##### -->
        <div id="header">
            <div class="superHeader">
                <div class="left">
                    <span class="doNotDisplay">Links:</span>
                    <?=header_useful_links('page.header.useful_links.left')?>
                </div>
                <div class="right">
                    <span class="doNotDisplay">Links:</span>
                    <?=header_useful_links('page.header.useful_links.right')?>
                </div>
            </div>
            <div class="midHeader">
                <h1 class="headerTitle"><?=$_body_title?></h1>
            </div>
            <div class="subHeader">
                <span class="doNotDisplay">Navigation:</span>
<?php
$links = array();
foreach($_nav_website as $link => &$name) {
    $class = $link == $_page ? ' class="highlight"' : '';
    if($link[0]=='/') $link = $_base.$link;
    if(is_array($name)) $links[] = '                <a href="'.$link.'" title="'.$name['title'].'"'.$class.'>'.$name['name'].'</a>'."\n";
    else $links[] = '                <a href="'.$link.'"'.$class.'>'.$name.'</a>'."\n";
}
echo implode(' | ', $links);
?>
            </div>
        </div>
        <!-- ##### Side Bar ##### -->
        <div id="side-bar">
            <div>
                <ul>
<?php
// determinar curso si es que se está viendo uno
if(substr($_request, 0, 8)=='/cursos/') {
    $tercer_slash = strpos($_request, '/', 8);
    if($tercer_slash!==false) $curso = substr($_request, 7, $tercer_slash - 7);
    else $curso = substr($_request, 7);
} else $curso = null;
// mostrar cursos
foreach($_nav_website['/cursos']['nav'] as $link => &$name) {
    if (is_numeric($link)) {
        echo '<p class="sideBarTitle">'.$name['name'].'</p>';
        foreach ($name['nav'] as $l => &$c) {
            if(!empty($name['nav'][$curso]['nav']))
                nav_cursos($l, $c, $curso, $name['nav'][$curso]['nav']);
            else
                nav_cursos($l, $c, $curso);
        }
    } else {
        if(!empty($_nav_website['/cursos']['nav'][$curso]['nav']))
            nav_cursos($link, $name, $curso, $_nav_website['/cursos']['nav'][$curso]['nav']);
        else
            nav_cursos($link, $name, $curso);
    }
}
?>
                </ul>
            </div>
            <div class="lighterBackground">
                <p class="sideBarTitle">Sobre mí</p>
                <span class="sideBarText">
                    <?=\sowerphp\core\Configure::read('page.aboutme')?>
                </span>
            </div>
            <div>
                <p class="sideBarTitle">Validación</p>
                <span class="sideBarText">
                    Validar el <a href="http://validator.w3.org/check/referer">XHTML</a> y
                    <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> de esta página.
                </span>
            </div>
        </div>
        <!-- ##### Banners ##### -->
        <div id="banners">
            <div class="center">
<?php if (file_exists(DIR_WEBSITE.'/webroot/img/foto.jpg')) { ?>
                <img src="<?=$_base?>/img/foto.jpg" alt="" />
<?php
}
$banners = \sowerphp\core\Configure::read('banners.right');
foreach ($banners as $link => &$image) {
    if($image[0]=='/') $image = $_base.$image;
    echo '<a href="',$link,'"><img src="',$image,'" alt="" /></a>',"\n";
}
?>
            </div>
<?php
$google_ads = \sowerphp\core\Configure::read('banners.google.ads');
if (!empty($google_ads['client']) && !empty($google_ads['ads']['160x600'])) {
?>
            <div class="adsense">
                <script type="text/javascript">
                    google_ad_client = "<?=$google_ads['client']?>";
                    google_ad_slot = "<?=$google_ads['ads']['160x600']?>";
                    google_ad_width = 160;
                    google_ad_height = 600;
                </script>
                <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
            </div>
<?php } ?>
        </div>
        <!-- ##### Main Copy ##### -->
        <div id="main-copy">
<?php
$message = \sowerphp\core\Model_Datasource_Session::message();
if($message) echo '<div class="session_message">',$message,'</div>';
echo $_content;
?>
            <!--<a class="topOfPage" href="#top" title="Go to the top of this page">Ir hasta arriba</a></div>-->
            <div class="timestamp">Última modificación de esta página fue el <?=timestamp2string($_timestamp)?></div>
<?php if (!empty($google_ads['client']) && !empty($google_ads['ads']['468x60'])) { ?>
            <div class="adsense">
                <script type="text/javascript">
                    google_ad_client = "<?=$google_ads['client']?>";
                    google_ad_slot = "<?=$google_ads['ads']['468x60']?>";
                    google_ad_width = 468;
                    google_ad_height = 60;
                </script>
                <script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
            </div>
<?php } ?>
            <div style="clear:both"></div>
        </div>
        <!-- ##### Footer ##### -->
        <div id="footer">
            <div class="left">
<?php
$links = array();
foreach($_nav_website as $link => &$name) {
    if($link[0]=='/') $link = $_base.$link;
    $class = ' class="highlight"';
    if(is_array($name)) $links[] = '                <a href="'.$link.'" title="'.$name['title'].'"'.$class.'>'.$name['name'].'</a>'."\n";
    else $links[] = '                <a href="'.$link.'"'.$class.'>'.$name.'</a>'."\n";
}
echo implode(' | ', $links);
?>
            </div>
            <br class="doNotDisplay doNotPrint" />
            <div class="right">
                <?=$_footer?><br />
                <!--This theme is free for distriubtion, so long as link to openwebdesing.org and www.best10webhosting.net stay on the theme -->
                Diseño cortesía de <a href="http://www.openwebdesign.org">Open Web Design</a> &amp;
                <a href="http://www.dubaiapartments.biz/hotels/">Hotels - Dubai</a>
            </div>
        </div>
    </body>
</html>

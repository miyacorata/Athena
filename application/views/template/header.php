<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$share_text = "ShinyColorsPortal ".GetCurrentUrl()." %23283pro_net";
if(!empty($title))$share_text = $title." - ".$share_text;
?>
<!doctype html>
<html lang="ja">
<head>
    <?php if(ENVIRONMENT === "production"){ ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= config_item('ga_token') ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '<?= config_item('ga_token') ?>');
    </script>
    <?php } ?>
    <title><?php if(!empty($title))echo $title." - "; ?>ShinyColorsPortal</title>
    <meta charset="utf8">
    <meta name="viewport" content="width=1360, maximum-scale=3">
    <link rel="stylesheet" href="<?= config_item('resource_root') ?>css/style.css">
    <?php if(!empty($load_css) && is_array($load_css)){
        foreach ($load_css as $css){
            $css = config_item('resource_root')."css/".$css.".css";
            echo "<link rel='stylesheet' href='{$css}'>".PHP_EOL;
        }
    }
    ?>
    <script
            src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js" integrity="sha256-vVnwgKyq3pIb4XdL91l1EC8j7URqDRK8BAWvSnKX0U8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css" integrity="sha256-IyR33qBiUXj7Clf/BpIUivtGnpIpLIL0XOCEGSQPZxg=" crossorigin="anonymous">
</head>
<body>

<!--HEADER-->
<header>
    <h1><a href="<?= config_item('root_url') ?>" id="sitename">ShinyColorsPortal</a></h1>
    <span id="version"><?= config_item('system_name')." ".config_item('system_version') ?></span>
    <nav id="headmenu">
        <a href="<?= config_item('root_url') ?>">Home</a>
        <a href="<?= config_item('root_url') ?>idol">Idol</a>
        <a href="<?= config_item('root_url') ?>unit">Unit</a>
        <!-- <a href="<?= config_item('root_url') ?>search">Search</a> -->
        <!-- まだけんさくできてない ゆるして -->
    </nav>
    <div id="share_buttons" data-share_text="<?= $share_text ?>">
        <a href="javascript:window.open('https://shinycolors.enza.fun','shinycolors','width=1136,height=640,scrollbars=no')" class="sc" style="vertical-align: top;">Go to Production</a>
        <a href="javascript:void(0)" class="mstdn" target="_blank" id="mstdn_share">Share</a>
        <script>
            document.getElementById('mstdn_share').addEventListener('click',function(event){
                event.preventDefault();
                $('#share_to_mastodon').iziModal('open');
            })
        </script>
        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
</header>

<?php
if(ENVIRONMENT === "development"){
    ?>
    <p style="margin: 0;padding: 7px;background: orange;text-align: center">
        DEVELOPMENT環境で動作中
    </p>
    <?php
}
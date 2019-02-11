<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="ja">
<head>
    <title>Not Found - ShinyColorsPortal</title>
    <meta charset="utf8">
    <link rel="stylesheet" href="<?= config_item('resource_root') ?>css/style.css">
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
    </nav>
</header>

<!--PAGETITLE-->
<div id="pagetitle">
    <img src="<?= config_item('resource_root') ?>image/283.png" alt="283">
    <h1>404 Not Found</h1>
    <p>There is nothing here.</p>
</div>

<!--MAIN-->
<main>
    <h2>お探しのページは存在しません</h2>
    <p>
        URLなどをお確かめの上もう一度お試しください。リンク切れなどの場合は管理者へお申し出ください。
    </p>
</main>


<!--FOOTER-->
<footer>
    <div id="footerinner">
        <a href="https://miyacorata.net" target="_blank" style="float: right;">
            <img src="https://miyacorata.net/resources/image/logo.png"
                 style="width: 180px;height: auto;"
                 alt="MiyanojiRapid">
        </a>
        <span style="font-size: 17px">ShinycolorsPortal </span><?= config_item('system_name')." ".config_item('system_version') ?>
        <div id="footerlinks">
            <a href="javascript:void(0)">このサイトについて</a>
            <a href="javascript:void(0)">免責事項</a>
            <a href="javascript:void(0)">プライバシーポリシー</a>
            <a href="https://mstdn.miyacorata.net/@283pro" rel="me" target="_blank">Mastodon:@283pro</a>
        </div>
    </div>
</footer>

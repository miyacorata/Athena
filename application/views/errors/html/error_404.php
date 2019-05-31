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
        <a href="<?= config_item('root_url') ?>mypage">Mypage</a>
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
    <hr style="margin: 50px 10px">
    <h3>お困りですか？</h3>
    <p>
        解決できない問題(リンク切れ等)に遭遇された場合は管理者までお知らせください。
    </p>
    <table>
        <tr>
            <th>管理者名</th><td>宮野 (miyacorata)</td>
        </tr>
        <tr>
            <th>宮野駅</th>
            <td>
                <a href="https://mstdn.miyacorata.net/@miyacorata" target="_blank">@miyacorata@mstdn.miyacorata.net</a><br>
            </td>
        </tr>
        <tr>
            <th>twista</th>
            <td><a href="https://twista.283.cloud/@miyacorata" target="_blank">@miyacorata@twista.283.cloud</a></td>
        </tr>
        <tr>
            <th>im@stodon</th>
            <td><a href="https://imastodon.net/@miyacorata" target="_blank">@miyacorata@imastodon.net</a></td>
        </tr>
        <tr>
            <th>Twitter</th>
            <td><a href="https://twitter.com/miyacorata" target="_blank">@miyacorata</a></td>
        </tr>
    </table>
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

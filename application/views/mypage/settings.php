<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$icon = empty($_SESSION['user']['avatarUrl']) ? config_item('resource_root')."image/283.png" : $_SESSION['user']['avatarUrl'];
?>
<div id="pagetitle">
    <img src="<?= $icon ?>" alt="">
    <h1>個人設定</h1>
    <p>Personal Settings</p>
</div>
<main>
    <div id="sidebar">
        <h2>ユーザー情報</h2>
        <div id="profile_main">
            <img src="<?= $icon ?>" class="usericon" alt="icon">
            <h3><?= html_escape($_SESSION['user']['name']) ?></h3>
            <a href="<?= config_item('twista_url')."/@".html_escape($_SESSION['user']['screenname']) ?>" class="twista" target="_blank"><?= html_escape($_SESSION['user']['screenname']) ?></a>
        </div>
        <hr style="margin: 15px 0 10px">
        <div class="buttonbox">
            <a href="<?= config_item('root_url') ?>mypage" class="button half il">マイページに戻る</a>
        </div>
    </div>
    <div id="mainbar">
        <h2>名前の変更</h2>
    </div>
</main>
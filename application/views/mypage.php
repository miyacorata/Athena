<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$icon = empty($_SESSION['user']['avatarUrl']) ? config_item('resource_root')."image/283.png" : $_SESSION['user']['avatarUrl'];
?>
<div id="pagetitle">
    <img src="<?= $icon ?>" alt="">
    <h1>マイページ</h1>
    <p><?php if(empty($_SESSION['user']['username']))echo "Mypage";
    else echo "Welcome, ".html_escape($_SESSION['user']['username'])."!" ?></p>
</div>
<main>
    <?php if(empty($_SESSION['user'])){
        ?>
        <div id="signin">
            <h2>ログインが必要です</h2>
            <p>マイページ利用には <a href="https://twista.283.cloud" target="_blank">twista</a> のIDが必要です。</p>
            <p class="notification">
                twista はシャニマスP&ファン向けのオープンな SNS です。
            </p>
            <a href="<?= config_item('root_url') ?>mypage/login/twista" class="twista" style="margin:7px">Login with Twista ID</a>
        </div>
        <?php
    }else{
        ?>
        <div id="sidebar">
            <h2>ユーザー情報</h2>
            <div id="profile_main">
                <img src="<?= $icon ?>" class="usericon" alt="icon">
                <h3><?= html_escape($_SESSION['user']['name']) ?></h3>
                <a href="<?= config_item('twista_url')."/@".html_escape($_SESSION['user']['username']) ?>" class="twista" target="_blank"><?= html_escape($_SESSION['user']['username']) ?></a>
            </div>
            <hr style="margin: 15px 0 10px">
            <div class="buttonbox">
                <a href="<?= config_item('root_url') ?>mypage/logout" class="button half il">ログアウト</a>
            </div>
        </div>
        <div id="mainbar">
            <h2>ばーだんぷ</h2>
            <?php var_dump($_SESSION['user']); ?>
        </div>
        <?php
    }?>
</main>
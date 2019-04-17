<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div id="pagetitle">
    <img src="<?= config_item('resource_root') ?>image/283.png" alt="">
    <h1>マイページ</h1>
    <p>Mypage</p>
</div>
<main>
    <?php if(empty($_SESSION['user'])){
        ?>
        <div id="signin">
            <h2>ログインが必要です</h2>
            <p>マイページ利用には <a href="https://twista.283.cloud" target="_blank">twista</a> のIDが必要です。</p>
            <p class="notification">
                twista はシャニマスプロデューサー向けのオープンな SNS です。
            </p>
            <a href="#" class="twista" style="margin:7px">Login with Twista ID</a>
        </div>
        <?php
    }else{
        ?>
        ログイン済み
        <?php
    }?>
</main>
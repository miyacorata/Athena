<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div id="pagetitle">
    <img src="<?= config_item('resource_root')."image/283.png" ?>" alt="">
    <h1>マイページ</h1>
    <p>Mypage</p>
</div>
<main>
    <div id="signin">
        <h2>ログインが必要です</h2>
        <p>マイページ利用には <a href="https://twista.283.cloud" target="_blank">twista</a> のIDが必要です。</p>
        <p class="notification">
            twista はシャニマスP&ファン向けのオープンな SNS です。
        </p>
        <a href="<?= config_item('root_url') ?>mypage/login/twista" class="twista" style="margin:7px">Login with twista ID</a>
    </div>
</main>

<script>
    <?php if(!empty($_SESSION['message']) && $_SESSION['message'] === "logout"){ ?>
    $('<div>またのご利用をお待ちしております。</div>').iziModal({
        headerColor: '#ae0000',
        width: 520,
        transitionIn: 'fadeInUp',
        transitionOut: 'fadeOut',
        title: 'ログアウトしました',
        subtitle: 'Logged out.',
        timeout: 3000,
        autoOpen: 1,
        padding: 15
    });
    <?php } ?>

</script>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$icon = empty($_SESSION['user']['avatarUrl']) ? config_item('resource_root')."image/283.png" : $_SESSION['user']['avatarUrl'];
?>
<div id="pagetitle">
    <img src="<?= $icon ?>" alt="">
    <h1>マイページ</h1>
    <p><?php if(empty($_SESSION['user']['name']))echo "Mypage";
    else echo "お疲れ様です、".html_escape($_SESSION['user']['name'])."さん" ?></p>
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
            <a href="<?= config_item('root_url') ?>mypage/logout" class="button half il">ログアウト</a>
        </div>
    </div>
    <div id="mainbar">
        <h2>あなたの担当・お気に入りアイドル</h2>
        <?php if(!empty($_SESSION['producer']['tantou'])){
            foreach ($_SESSION['producer']['tantou'] as $tantou){
                ?>
                <div class="idol button">
                    <a href="<?= config_item('root_url')."idol/detail/".hsc($tantou->name_r) ?>">
                        <img src="<?= config_item('resource_root') ?>image/character/<?= hsc($tantou->name_r) ?>/icon.jpg" alt="" class="idolicon">
                    </a>
                    <a href="<?= config_item('root_url')."idol/detail/".hsc($tantou->name_r) ?>" class="idolname"><?= hsc(SeparateString($tantou->name,$tantou->name_separate)) ?></a>
                    <table>
                        <tr>
                            <th>ユニット</th><td style="min-width: 125px"><?= hsc($tantou->unit_name) ?></td>
                            <th>誕生日</th><td><?= ConvertDateString($tantou->birthdate,'ja') ?></td>
                            <th>年齢</th><td><?= hsc($tantou->age) ?>歳</td>
                            <th>星座</th><td><?= hsc($tantou->constellation) ?></td>
                            <th>CV</th><td><?= hsc($tantou->cv) ?></td>
                        </tr>
                    </table>
                </div>
                <?php
            }
            ?>
            <p class="notification">この一覧はtwistaのプロフィールに記載されているハッシュタグを元にしています。</p>
            <?php
        }else{
            ?>
            <div class="notification">
                <p>この欄ではtwistaのプロフィールに記載されているハッシュタグを元に担当アイドルを一覧表示できます。</p>
                <p>例えば、あなたが黛冬優子さんの担当やファンであるならばプロフィールに "#黛冬優子" と入力するとこの一覧に黛冬優子さんへのリンクが表示されるようになります。</p>
            </div>
            <?php
        }
        ?>
    </div>
</main>

<script>
    <?php if(!empty($_SESSION['message']) && $_SESSION['message'] === "firstlogin"){ ?>
    $('<div>ユーザー登録を完了しました！<br>ShinyColorsPortalをご利用いただきありがとうございます。</div>').iziModal({
        headerColor: '#0058ae',
        width: 520,
        transitionIn: 'fadeInUp',
        transitionOut: 'fadeOut',
        title: '登録完了',
        subtitle: 'User registration completed!',
        timeout: 3000,
        autoOpen: 1,
        padding: 15
    });
    <?php } ?>

</script>
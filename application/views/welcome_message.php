<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(empty($units)){
    show_error("Required data 'units' is not declared.");
}
?>

<!--MAIN-->
<div id="top">
    <img src="<?= config_item('resource_root') ?>image/character/visual.png" alt="visual" style="height: 300px;width: auto;vertical-align: bottom">
    <div id="site_title">
        <span style="font-size: 50px;">ShinyColorsPortal</span><br>
        The database and portal website of THE IDOLM@STER ShinyColors
        <div id="top_search">
            <a href="<?= config_item('root_url') ?>idol" class="button il" style="width: 160px">
                アイドル一覧
            </a>
            <a href="<?= config_item('root_url') ?>unit" class="button il" style="width: 160px">
                ユニット一覧
            </a>
            <!--<form action="<?= config_item('root_url') ?>search/idol/" method="get"
            <label><input type="search" name="name" id="idol_search" placeholder="アイドルを検索"></label>-->
            <!-- ゆるして -->
        </div>
    </div>
</div>
<main>
    <div id="sidebar">
        <h2>Information</h2>
        <h3>データ情報</h3>
        <p>
            データベース更新：<?= hsc(ConvertDateString(config_item('db_last_modified'),'ja_year')) ?>
        </p>
        <h3>システム情報</h3>
        <p>
            <?= config_item('system_name')." ".config_item('system_version') ?>
            on <?= $_SERVER['SERVER_NAME'] ?>
        </p>
        <p>
            <a href="https://github.com/project-tsubasa/Athena" target="_blank">Repository on GitHub</a>
        </p>
    </div>
    <div id="mainbar">
        <h2>Welcome to ShinyColorsPortal!</h2>
        <p>
            ShinyColorsPortalへようこそ。ShinyColorsPortalは、アイドル・ユニットの情報を提供する非公式データベース・ポータルサイトです。
        </p>
        <?php if(!empty($birthday)){

            ?>
            <h3>HappyBirthday!</h3>
                <p>本日<?= date('n月j日') ?>がお誕生日のアイドルです。Happy Birthday!</p>
            <?php foreach ($birthday as $idol){
                ?>
                <div class="idol button">
                    <a href="<?= config_item('root_url')."idol/detail/".hsc($idol->name_r) ?>">
                        <img src="<?= config_item('resource_root') ?>image/character/<?= hsc($idol->name_r) ?>/icon.jpg" alt="" class="idolicon">
                    </a>
                    <a href="<?= config_item('root_url')."idol/detail/".hsc($idol->name_r) ?>" class="idolname"><?= hsc(SeparateString($idol->name,$idol->name_separate)) ?></a>
                    <table>
                        <tr>
                            <th>ユニット</th><td style="min-width: 125px"><?= hsc($units[$idol->unit_id - 1]->name) ?></td>
                            <th>誕生日</th><td><?= ConvertDateString($idol->birthdate,'ja') ?></td>
                            <th>年齢</th><td><?= hsc($idol->age) ?>歳</td>
                            <th>星座</th><td><?= hsc($idol->constellation) ?></td>
                            <th>CV</th><td><?= hsc($idol->cv) ?></td>
                        </tr>
                    </table>
                </div>
                <?php
            }
        } ?>
        <h3>Menu</h3>
        <div class="buttonbox">
            <a href="<?= config_item('root_url') ?>idol" class="button il half">
                アイドル一覧<br>
                <span class="subtext">アイドル一覧から詳しい情報を見る</span>
            </a>
            <a href="<?= config_item('root_url') ?>unit" class="button il half">
                ユニット一覧<br>
                <span class="subtext">ユニット一覧から詳しい情報を見る</span>
            </a>
            <a href="<?= config_item('root_url') ?>info/about" class="button il half">
                このサイトについて<br>
                <span class="subtext">ShinyColorPortalの簡単な説明</span>
            </a>
            <a href="<?= config_item('root_url') ?>info/privacy" class="button il half">
                プライバシーポリシー<br>
                <span class="subtext">プライバシーに関するお約束</span>
            </a>
        </div>
        <hr>
        <div>
            <h2 style="margin-top: 5px">更新情報</h2>
            <a href="https://mstdn.miyacorata.net/@283pro" class="mstdn" target="_blank">283pro<span>mstdn.miyacorata.net</span></a>
            更新情報はmastodonより配信しております。
        </div>
        <div id="infobox">
            <?php
            $url = "https://mstdn.miyacorata.net/@283pro.rss";
            $feed = file_get_contents($url);
			$invalid_characters = '/[^\x9\xa\x20-\xD7FF\xE000-\xFFFD]/';
            $feed = simplexml_load_string($feed);
            if($feed){
                foreach ($feed->channel->item as $entry){
                    if(mb_strpos($entry->description,"(承前)"))continue;
                    echo "<h4>".date("Y年n月j日 H:i",strtotime($entry->pubDate) + (60 * 60 * 9 * 0))."配信 - <a href=\"".$entry->link."\" target=\"_blank\">Mastodonで見る</a></h4>".PHP_EOL;
                    echo $entry->description.PHP_EOL;
                }
            }else{
                ?>
                <p style="padding-top: 80px;text-align: center">
                    <img src="<?= config_item('resource_root') ?>image/283.png" alt="" style="width: 150px"><br>
                    Mastodonからお知らせを取得できませんでした
                </p>
                <?php
            }
            ?>
        </div>
    </div>

</main>


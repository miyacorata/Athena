<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(empty($unit)){
    show_error("Required data 'unit' is not declared.");
}
if(empty($member)){
    show_error("Required data 'member' is not declared.");
}elseif(!is_array($member)){
    show_error("Data 'member' format is incorrect.");
}

$choiced_member = $member[mt_rand(0,count($member)-1)]->name_r;
$mainname = preg_match('/^([a-zA-Z0-9 \']+)$/',$unit->name) ? $unit->name_y : $unit->name;
$urlname = urlencode($mainname);

/* ##### 邪悪コード ##### */
if($unit->name === "ALSTROEMERIA"){
    $urlname = $unit->name;
    $nicodic_suffix = urlencode("(アイドルマスター)");
}else{
    $nicodic_suffix = "";
}

?>
<style>
    .half{
        width: 47.4%;
    }
    .trisection {
        width: 31%;
    }
</style>

<!--PAGETITLE-->
<div id="pagetitle">
    <img src="<?= config_item('resource_root') ?>image/character/<?= hsc($choiced_member) ?>/icon.jpg" alt="icon">
    <h1><?= hsc($unit->name) ?></h1>
    <p><?= hsc($unit->name_y); ?></p>
    <div id="unitlogo">
        <img src="<?= config_item('resource_root') ?>image/unitlogo/<?= hsc($unit->slug) ?>.png" alt="UnitLogo">
    </div>

</div>

<!-- MAIN -->
<main>
    <div id="unitdata">
        <h2><?= hsc($mainname) ?>とは？</h2>
        <p style="font-size: 28px"><?= hsc($unit->catchcopy) ?></p>
        <p><?= hsc($unit->description) ?></p>
        <h3>メンバー</h3>
        <div style="text-align: center">
            <?php foreach ($member as $m){
                ?>
                <a class="member" href="<?= config_item('root_url') ?>idol/detail/<?= hsc($m->name_r) ?>">
                    <img src="<?= config_item('resource_root') ?>image/character/<?= hsc($m->name_r) ?>/icon.jpg" alt="<?= hsc($m->name_r) ?>">
                    <?= hsc(SeparateString($m->name,$m->name_separate)) ?>
                </a>
                <?php
            }
            ?>
        </div>

    </div>
    <img src="<?= config_item('resource_root') ?>image/card/<?= hsc($unit->slug) ?>.png" alt="unit" id="unitimage">
    <hr>
    <div id="sidebar">
        <h2>Information</h2>
        <h3>MediaSearchについて</h3>
        <p>
            MediaSearchでTwitterを検索する場合、Twitter Web Clientが新バージョンでないと正常に動作しません。
        </p>
        <h3>データ情報</h3>
        <p>
            データベース更新：<?= hsc(ConvertDateString(config_item('db_last_modified'),'ja_year')) ?>
        </p>
    </div>
    <div id="mainbar">
        <h2>百科事典・外部サイト</h2>
        <div class="buttonbox">
            <a href="https://dic.nicovideo.jp/a/<?= $urlname.$nicodic_suffix ?>" class="button il half" target="_blank">
                ニコニコ大百科
            </a>
            <a href="https://dic.pixiv.net/a/<?= $urlname ?>" class="button il half" target="_blank">
                ピクシブ百科事典
            </a>
            <a href="https://fujiwarahaji.me/idol/sc/<?= $urlname ?>" class="button il half" target="_blank">
                ふじわらはじめ<br>
                <span class="subtext">アイマス楽曲DBで曲一覧を見る</span>
            </a>
            <!--<a href="https://azure-gallery.net/?query=imas%3A<?= $urlname ?>" class="button il half" target="_blank">
                蒼天画廊<br>
                <span class="subtext">イラストツイート検索サービスで検索</span>
            </a>-->
        </div>
        <h2>MediaSearch</h2>
        <h3>Twitter</h3>
        <div class="buttonbox">
            <a href="https://twitter.com/search?vertical=default&q=<?= $urlname ?>" class="button il trisection" target="_blank">
                通常検索<br>
                <span class="subtext">Twitter標準検索</span>
            </a>
            <a href="https://twitter.com/hashtag/<?= $urlname ?>" class="button il trisection" target="_blank">
                ハッシュタグ検索<br>
                <span class="subtext">ハッシュタグつきツイートを検索</span>
            </a>
            <a href="https://twitter.com/search?q=<?= $urlname ?>&f=users" class="button il trisection" target="_blank">
                ユーザー検索<br>
                <span class="subtext">プロフィールからユーザーを検索</span>
            </a>
            <a href="https://twitter.com/search?q=<?= $urlname ?>&f=images" class="button il trisection" target="_blank">
                画像検索<br>
                <span class="subtext">画像を含むツイートの検索</span>
            </a>
            <a href="https://twitter.com/search?q=<?= $urlname ?>&f=videos" class="button il trisection" target="_blank">
                動画検索<br>
                <span class="subtext">動画・動画リンクを含むツイートの検索</span>
            </a>
            <a href="https://twitter.com/search?q=<?= $urlname ?>%20⚡" class="button il trisection" target="_blank">
                モーメント検索<br>
                <span class="subtext">モーメントを含む(と思われる)ツイートの検索</span>
            </a>
        </div>
        <h3>niconico</h3>
        <div class="buttonbox">
            <a href="https://www.nicovideo.jp/tag/<?= $urlname.$nicodic_suffix ?>" class="button il trisection" target="_blank">
                動画をタグ検索<br>
            </a>
            <a href="https://www.nicovideo.jp/search/<?= $urlname.$nicodic_suffix ?>" class="button il trisection" target="_blank">
                動画をキーワード検索<br>
            </a>
            <a href="https://seiga.nicovideo.jp/tag/<?= $urlname.$nicodic_suffix ?>" class="button il trisection" target="_blank">
                静画をタグ検索<br>
            </a>
        </div>
        <h3>pixiv</h3>
        <div class="buttonbox">
            <a href="https://www.pixiv.net/search.php?s_mode=s_tag_full&word=<?= $urlname ?>" class="button il trisection" target="_blank">
                イラストをタグ検索
            </a>
            <a href="https://www.pixiv.net/novel/search.php?s_mode=s_tag&word=<?= $urlname ?>" class="button il trisection" target="_blank">
                小説をキーワード検索
            </a>
            <a href="https://www.pixiv.net/novel/tags.php?tag=<?= $urlname ?>" class="button il trisection" target="_blank">
                小説をタグ検索
            </a>
        </div>
    </div>
</main>


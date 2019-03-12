<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(empty($idol)){
    show_error("Required data 'idol' is not declared.");
}
if(empty($unit)){
    show_error("Required data 'unit' is not declared.");
}

$urlname = urlencode($idol->name);
//$protocol = !empty($_SERVER['HTTPS']) ? 'https://' : 'http://';
//$share_url = $urlname." ShinyColorsPortal - ".$protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$share_url = $urlname." ShinyColorsPortal - ".GetCurrentUrl();

$fhme_linknames = explode(" ",SeparateString($idol->name_r,$idol->name_r_separate));
$fhme_linkname = $unit->slug_fhme."/".$fhme_linknames[1]."-".$fhme_linknames[0];
?>
<style>
    .half{
        width: 47.4%;
    }
    .trisection{
        width: 31%;
    }
</style>

<!--PAGETITLE-->
<div id="pagetitle">
    <img src="<?= config_item('resource_root') ?>image/character/<?= hsc($idol->name_r) ?>/icon.jpg" alt="<?= hsc($idol->name) ?>">
    <h1><?= hsc(SeparateString($idol->name,$idol->name_separate)) ?></h1>
    <p><?= hsc(ucwords(SeparateString($idol->name_r,$idol->name_r_separate))); ?></p>
    <div id="unitlogo">
        <img src="<?= config_item('resource_root') ?>image/unitlogo/<?= hsc($unit->slug) ?>.png" alt="UnitLogo">
    </div>

</div>

<!--MAIN-->
<main>
    <div id="upper">
        <div id="profile">
            <h2>プロフィール</h2>
            <p><?= hsc($idol->introduction) ?></p>
            <table id="profile_table">
                <tr>
                    <th>名前</th><td colspan="3"><?= hsc(SeparateString($idol->name,$idol->name_separate)) ?></td>
                    <th>ユニット</th><td><a href="<?= config_item('root_url') ?>unit/detail/<?= hsc($unit->slug) ?>"><?= hsc($unit->name) ?></a></td>
                </tr>
                <tr>
                    <th>なまえ</th><td colspan="3"><?= hsc(SeparateString($idol->name_y,$idol->name_y_separate)) ?></td>
                    <th>CV</th><td><?= hsc($idol->cv) ?></td>
                </tr>
                <tr>
                    <th>Alphabet</th><td colspan="5"><?= hsc(ucwords(SeparateString($idol->name_r,$idol->name_r_separate))); ?></td>
                </tr>
                <tr>
                    <th>誕生日</th><td><?= hsc(ConvertDateString($idol->birthdate,'ja')) ?></td>
                    <th>年齢</th><td><?= hsc($idol->age) ?>歳</td>
                    <th>星座</th><td><?= hsc($idol->constellation) ?></td>
                </tr>
                <tr>
                    <th>身長</th><td><?= hsc($idol->height) ?>cm</td>
                    <th>体重</th><td><?= hsc($idol->weight) ?>kg</td>
                    <th>3サイズ</th><td><?= hsc($idol->bust)."/".hsc($idol->weist)."/".hsc($idol->hip) ?></td>
                </tr>
                <tr>
                    <th>特技</th><td colspan="5"><?= empty($idol->skill) ? "<i>N/A</i>" : hsc($idol->skill) ?></td>
                </tr>
                <tr>
                    <th>趣味</th><td colspan="5"><?= empty($idol->hobby) ? "<i>N/A</i>" : hsc($idol->hobby) ?></td>
                </tr>
            </table>
            <h3>百科事典・外部サイト</h3>
            <div class="buttonbox" style="width: 100%">
                <a href="https://dic.nicovideo.jp/a/<?= $urlname ?>" class="button il half" target="_blank">
                    ニコニコ大百科
                </a>
                <a href="https://dic.pixiv.net/a/<?= $urlname ?>" class="button il half" target="_blank">
                    ピクシブ百科事典
                </a>
                <a href="https://fujiwarahaji.me/idol/sc/<?= hsc($fhme_linkname) ?>" class="button il half" target="_blank">
                    ふじわらはじめ<br>
                    <span class="subtext">アイマス楽曲DBで曲一覧を見る</span>
                </a>
                <a href="https://azure-gallery.net/?query=imas%3A<?= $urlname ?>" class="button il half" target="_blank">
                    蒼天画廊<br>
                    <span class="subtext">イラストツイート検索サービスで検索</span>
                </a>
            </div>
            <h3>このアイドルのタグ</h3>
            <table id="tag_table">
                <?php if(!empty($tags)){
                    $c_cat = ""; $tag_count = 0;
                    foreach ($tags as $tag){
                        if($c_cat !== $tag->category){ // カテゴリチェンジ判定
                            if($tag_count != 0) echo "</tr>".PHP_EOL;
                            echo "<tr><th>".hsc($tag->category)."</th><td>";
                            $c_cat = $tag->category;
                        }
                        $linktext = empty($tag->property) ? $tag->tagname : $tag->property."/".$tag->tagname;
                        echo "<a href=\"javascript:void(0)\" class=\"tag\">".hsc($linktext)."</a>";
                        //echo "<a href=\"".config_item('root_url')."search/tag/".hsc($linktext)."\" class=\"tag\">".hsc($linktext)."</a>";
                        if($tag_count == count($tags))echo "</tr>".PHP_EOL;
                    }
                }else{
                    ?>
                    <p class="notification">
                        タグ情報が登録されていません
                    </p>
                    <?php
                }
                ?>
            </table>

        </div>
        <div id="tachie">
            <img src="<?= config_item('resource_root') ?>image/character/<?= hsc($idol->name_r) ?>/default.png" alt="tachie">
        </div>
    </div>
    <hr>
    <div id="sidebar">
        <h2>Information</h2>
        <h3>MediaSearchについて</h3>
        <p>
            MediaSearchでTwitterを検索する場合、Twitter Web Clientが新バージョンでないと正常に動作しません。
        </p>
        <p>
            Twitter上のイラストを検索する場合は、外部サイト欄よりイラスト検索サービス「蒼天画廊」もおすすめします。
        </p>
        <h3>データ情報</h3>
        <p>
            データベース更新：<?= hsc(ConvertDateString(config_item('db_last_modified'),'ja_year')) ?>
        </p>
    </div>
    <div id="mainbar">
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
            <a href="https://twitter.com/search?q=<?= $urlname ?>&f=user" class="button il trisection" target="_blank">
                ユーザー検索<br>
                <span class="subtext">プロフィールからユーザーを検索</span>
            </a>
            <a href="https://twitter.com/search?q=<?= $urlname ?>&f=image" class="button il trisection" target="_blank">
                画像検索<br>
                <span class="subtext">画像を含むツイートの検索</span>
            </a>
            <a href="https://twitter.com/search?q=<?= $urlname ?>&f=video" class="button il trisection" target="_blank">
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
            <a href="https://www.nicovideo.jp/tag/<?= $urlname ?>" class="button il trisection" target="_blank">
                動画をタグ検索<br>
            </a>
            <a href="https://www.nicovideo.jp/search/<?= $urlname ?>" class="button il trisection" target="_blank">
                動画をキーワード検索<br>
            </a>
            <a href="https://seiga.nicovideo.jp/tag/<?= $urlname ?>" class="button il trisection" target="_blank">
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


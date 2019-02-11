<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(empty($idols)){
    show_error("Required data 'idols' is not declared.");
}
if(empty($units)){
    show_error("Required data 'units' is not declared.");
}

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
    <img src="<?= config_item('resource_root') ?>image/283.png" alt="">
    <h1>アイドル一覧</h1>
    <p>Idol List</p>

</div>

<!--MAIN-->
<main>
    <div id="sidebar">
        <h2>Navigation</h2>
        <p>各アイドルのアイコンか名前をクリックすると詳細ページへ遷移します。</p>
    </div>
    <div id="mainbar">
        <h2>アイドル一覧</h2>
        <p>
            現在<?= count($idols) ?>人のアイドルが登録されています。
        </p>
        <?php foreach($idols as $idol){
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
        } ?>
    </div>

</main>


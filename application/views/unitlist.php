<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(empty($units)){
    show_error("Requered data 'units' is not declared.");
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

<div id="pagetitle">
    <img src="<?= config_item('resource_root') ?>image/283.png" alt="283">
    <h1>ユニット一覧</h1>
    <p>Unit List</p>
</div>

<main>
    <p>各ユニットをクリックすると詳細ページに遷移します</p>
    <div class="buttonbox">
        <?php foreach ($units as $unit){
            ?>
            <a href="<?= config_item('root_url') ?>unit/detail/<?= hsc($unit->slug) ?>" class="unit il trisection">
                <img src="<?= config_item('resource_root') ?>image/card/<?= hsc($unit->slug) ?>.png" alt="">
                <img src="<?= config_item('resource_root') ?>image/unitlogo/<?= hsc($unit->slug) ?>.png" alt=""><br>
                <?= hsc($unit->name) ?>
            </a>
            <?php
        } ?>
    </div>
</main>

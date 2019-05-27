<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div id="modal-default">
    <div id="share_to_mastodon" data-izimodal-title="Fediverseへ共有" data-izimodal-subtitle="Share to Fediverse such as mastodon and Misskey">
        <div style="padding: 5px 10px 10px;text-align: center">
            <p style="margin: 10px 15px;">共有するインスタンスのホストを入力してください</p>
            <label for="sm_instance"></label><input type="search" id="sm_instance" placeholder="your.instance.tld" style="margin: 10px auto;display: block">
            <datalist id="mastodon_instance">
                <option value="imastodon.net">
                <option value="imastodon.blue">
                <option value="pawoo.net">
                <option value="mstdn.maud.io">
                <option value="mstdn.jp">
                <option value="twista.283.cloud">
                <option value="misskey.io">
                <option value="misskey.m544.net">
            </datalist>
            <p>または以下から選ぶことができます</p>
            <hr>
            <div class="buttonbox">
                <a href="javascript:openTootWindow('imastodon.net')" class="mstdn il half">imastodon.net</a>
                <a href="javascript:openTootWindow('imastodon.blue')" class="mstdn il half">imastodon.blue</a>
                <a href="javascript:openTootWindow('mstdn.jp')" class="mstdn il half">mstdn.jp</a>
                <a href="javascript:openTootWindow('mstdn.maud.io')" class="mstdn il half">mstdn.maud.io</a>
                <a href="javascript:openTootWindow('pawoo.net')" class="mstdn il half">pawoo.net</a>
                <a href="javascript:openTootWindow('twista.283.cloud')" class="twista il half">twista.283.cloud</a>
                <a href="javascript:openTootWindow('misskey.io')" class="misskey il half">misskey.io</a>
                <a href="javascript:openTootWindow('misskey.m544.net')" class="misskey il half">misskey.m544.net</a>
            </div>
            <script>
                var sm_instance = document.getElementById('sm_instance');
                sm_instance.addEventListener('keydown',function(event){
                    if(event.key === 'Enter'){
                        openTootWindow(sm_instance.value);
                    }
                });
                function openTootWindow(instance){
                    var share_text = document.getElementById('share_buttons').getAttribute('data-share_text');
                    window.open("https://"+instance+"/share?text="+share_text,"_blank","width=500,height=500");
                }
            </script>
        </div>

    </div>
</div>
<script>
    $('#share_to_mastodon').iziModal({
        headerColor: '#fe8200',
        width: 520,
        //overlayColor: 'rgba(0, 0, 0, 0.5)',
        transitionIn: 'fadeInUp',
        transitionOut: 'fadeOutDown'
    });
</script>

<!--FOOTER-->
<footer>
    <div id="footerinner">
        <a href="https://miyacorata.net" target="_blank" style="float: right;">
            <img src="https://miyacorata.net/resources/image/logo.png"
                 style="width: 180px;height: auto;"
                 alt="MiyanojiRapid">
        </a>
        <span style="font-size: 17px">ShinyColorsPortal </span><?= config_item('system_name')." ".config_item('system_version') ?>
        - Page rendered in {elapsed_time} sec.<br>
        <div id="footerlinks">
            <a href="<?= config_item('root_url') ?>info/about">このサイトについて</a>
            <a href="<?= config_item('root_url') ?>info/privacy">プライバシーポリシー</a>
            <a href="https://mstdn.miyacorata.net/@283pro" rel="me" target="_blank">Mastodon:@283pro</a>
            <a href="https://github.com/project-tsubasa/athena" target="_blank">GitHub</a>
            <a href="https://github.com/project-tsubasa/athena/issues" target="_blank">Feedback</a>
            <?php if(!empty($_SESSION['user']))echo "ログイン中：お疲れ様です、".html_escape($_SESSION['user']['name'])."さん" ?>
        </div>
    </div>
</footer>

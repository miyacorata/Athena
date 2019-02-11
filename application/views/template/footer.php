<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div id="modal-default">
    <div id="ph_unsupported" data-izimodal-title="非対応ブラウザです" data-izimodal-subtitle="Share to mastodon unavailable">
        <p style="margin: 10px 15px">お使いのブラウザはプロトコルハンドラに対応していないため、トゥートボタンをご利用いただけません。</p>
    </div>
    <div id="share_to_mastodon"></div>
</div>
<script>
    $('#ph_unsupported').iziModal({
        headerColor: 'darkred',
        width: 520,
        overlayColor: 'rgba(0, 0, 0, 0.5)',
        transitionIn: 'fadeInUp',
        transitionOut: 'fadeOut',
        timeout: 10000,
        timeoutProgressbar: true
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
        </div>
    </div>
</footer>

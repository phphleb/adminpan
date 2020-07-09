<!DOCTYPE html>
<html lang="<?=  $this->getLang(); ?>">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width"/>
    <style>
        <?php /*  https://compressor.andona.click/ HTML  */  ?>
        .hl-ap-over-all,body,html{padding:0;margin:0;width:100%;height:100%;background-color:#fff;font-family:'PT Sans',sans-serif;font-size:16px}.hl-ap-over-menu{position:absolute;left:0;top:0;background-color:<?= $this->getColor(); ?>;width:13%;height:100%;padding:0;margin:0;display:block}.hl-ap-menu{position:absolute;left:0;top:0;max-height:calc(100% - 45px);padding:25px 5px 20px 21px;overflow:auto;width:calc(100% - 26px)}.hl-ap-actual-name{min-height:54px;background-color:#f5f5f5;color:#555;border-bottom:2px solid #e8e8e8;white-space:nowrap;overflow:hidden}.hl-ap-menu-block,.hl-ap-menu-block-link{text-shadow:1px 1px 1px #0b589d;filter:Shadow(Color=#0B589D, Direction=45, Strength=1);margin-bottom:10px;cursor:default;color:#f5f5f5;white-space:nowrap}.hl-ap-menu-block-link a{color:#f5f5f5;cursor:pointer;text-decoration:none}.hl-ap-menu-block-link a:hover{color:#fff}.hl-ap-menu-block{color:#c8cdd5}.hl-ap-over-content{position:absolute;width:87%;left:13%;top:0;background-color:rgba(255,255,255,.6);height:100%}.hl-ap-content{padding:0!important;margin:0!important;box-sizing:content-box!important}.hl-ap-main-content{position:absolute;top:57px;padding:3px 0 20px 0!important;margin:0!important;overflow:auto;height:calc(100% - 108px);width:calc(100% - 15px);font-size:13px;box-sizing:content-box!important}.hl-ap-mobile-menu-btn{position:absolute;z-index:1000;background-color:<?= $this->getColor(); ?>;border:0;padding:10px 5px 5px 10px;display:none;cursor:pointer;max-height:51px;overflow-y:hidden}.hl-ap-mobile-menu-btn-close{position:fixed;right:7px;padding:5px 5px;background-color:<?= $this->getColor(); ?>;cursor:pointer;display:none;z-index:1002}.hl-ap-block_numeric{margin:5px 0 20px 5px}.hl-ap-block_numeric span{display:inline-block;padding:0 10px 0 10px;margin-bottom:15px}.hl-ap-block_numeric button{display:inline-block;margin-bottom:15px}.-hl-ap-btn-link{border:0;padding:5px 0 5px 0;margin:0}.-hl-ap-btn-title-link{display:inline-block;margin-left:6px;cursor:pointer}.hl-ap-select-blocks{position:relative;bottom:6px;background:<?= $this->getColor(); ?>;background:rgba(255,255,255,.1);padding:5px 0 15px 10px;margin-bottom:3px}.hl-ap-link-str{white-space:nowrap;position:relative;left:-12px}.hl-ap-over-listing{margin:5px 0 15px 0}.hl-ap-list-num{color:#9e9e9e;padding:3px 5px 3px 0;margin:0;text-align:center}.hl_ap_over_table{display:block;overflow:auto;padding:5px;margin-bottom:15px}.hl-ap-simple-table{background-color:#fff;padding:0;border-spacing:0}.hl-ap-simple-table td{padding:3px 5px;border-bottom:1px solid #cdcdcd}.hl-ap-second-line{background-color:#ececec}.hl-ap-block_html{padding:10px 0 15px 0;white-space:nowrap}.hl-ap-actual-name-on{padding:18px 5px 0 15px}.hl-ap-graph-over{white-space:nowrap;margin:5px 0 10px 0}.hl-ap-graph-over q0{display:inline-block;background-color:#5776cd;font-size:0;padding:0;margin:0;max-width:10px;min-width:3px}.hl-ap-graph-over q0:hover{background-color:orange}.hl-ap-graph-max{border-top:4px solid #5fcdc9}.hl-ap-graph-min{border-top:4px solid #494eff}.hl-main-logo{position:relative;bottom:6px;max-width:170px;height:70px}.hl-main-logo-mob-background{background-image:none}.hl-main-link{font-weight:bolder;color:#fff;text-decoration:none}@media only screen and (max-width:1500px){.hl-ap-over-menu{width:18%}.hl-ap-over-content{width:82%;left:18%}}@media only screen and (max-width:1200px){.hl-ap-over-menu{width:20%}.hl-ap-over-content{width:80%;left:20%}}@media only screen and (max-width:992px){.hl-ap-over-menu{width:25%;position:absolute;z-index:1001;min-width:100%;box-shadow:0 0 6px 0 #000;display:none}.hl-ap-over-content{width:100%;left:0}.hl-ap-mobile-menu-btn,.hl-ap-mobile-menu-btn-close{display:block}.hl-ap-actual-name{background-color:<?= $this->getColor(); ?>;padding-left:50px;color:#f5f5f5}.hl-ap-main-content{width:calc(100% - 15px);font-size:15px;padding:15px 5px}.hl-ap-menu-block,.hl-ap-menu-block-link{margin-top:18px;padding-bottom:16px;border-bottom:1px solid #a2a4a8;width:calc(100% - 38px)}.hl-ap-select-blocks{position:relative;right:5px;width:calc(100% - 50px)}.hl-ap-menu-block-link a{text-decoration:none;display:inline-block;width:100%}.hl-ap-menu-block{text-shadow:none;filter:none}.-hl-ap-btn-link{border:0!important}.hl-ap-select-blocks{bottom:11px}.hl-ap-block_html{padding:0}.hl-main-logo{display:none}.fil1{fill:#fefefe}.fil0{fill:#2b2a29}.str0-close{stroke:#b3b3b3;stroke-width:2.36;stroke-miterlimit:22.9256}.fil0-close{fill:none}.fil1-close{fill:#b3b3b3}}#hl-instructions-for-the-page{font-size:13px;position:absolute;bottom:0;padding:10px 4px 5px 15px;width:calc(100% - 70px);overflow-y:auto;height:40px;border:1px solid #b8b8b8;border-left:16px solid #d18c24;background-color:#fff;z-index:2}.hl-instructions-for-the-page-close{position:absolute;right:15px;top:10px;color:grey;cursor:pointer;background-color:#fff}@media print{.hl-ap-noprint{display:none}}
        .hl-user-select-none { -khtml-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;}
        /* Medium Devices, Desktops */
        @media only screen and (max-width: 992px) {
            .hl-main-logo-mob-background {
            <?php if(!empty($this->getLogo())){ ?> background-image: url(<?= $this->getLogo();  ?>);
                background-repeat: no-repeat;
                background-size: auto;
                background-position: right;
            <?php } ?>
            }
        }
    </style>
    <script>
        function hl_menu_size_tracking(){var e=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth;document.getElementById("HlApOverMenu").style.display=e>992?"block":hl_status_last_open_menu?"block":"none"}function hl_revert_menu_block(e){document.getElementById("HlApOverMenu").style.display=e?"block":"none",hl_status_last_open_menu=e}function hl_revert_submenu_block_view(e){var n=e.id,t=document.getElementById(n+"-block"),l=document.getElementById(n+"-marker");"block"==t.style.display?(t.style.display="none",l.innerHTML="+"):(t.style.display="block",l.innerHTML="- ")}window.addEventListener("resize",hl_menu_size_tracking);var hl_status_last_open_menu=!1;
    </script>
    <?php if(!empty($this->getDataFromHeader())){ print implode("\n    ", $this->getDataFromHeader()); } ?>
    <title>Admin Panel | <?= $this->actual_name; ?></title>
</head>
<body>
<div align="left" class="hl-ap-over-all">

    <button class="hl-ap-mobile-menu-btn hl-ap-noprint"id=HlApMenuBtn onclick=hl_revert_menu_block(!0) type=button><svg class=svg-icon height=30 role=img viewBox="0 0 30 30"width=30><g><g><polygon class=fil0 points="2.09,3.03 30,3.13 30,7.01 2.09,6.91 "/><polygon class=fil0 points="2.08,25.02 29.99,25.12 29.99,29 2.08,28.9 "/><polygon class=fil0 points="2.08,14.01 29.99,14.11 29.99,17.99 2.08,17.89 "/></g><g><polygon class=fil1 points="1.06,2 28.97,2.1 28.97,5.98 1.06,5.88 "/><polygon class=fil1 points="1.05,23.99 28.95,24.09 28.95,27.97 1.05,27.87 "/><polygon class=fil1 points="1.05,12.98 28.95,13.08 28.95,16.96 1.05,16.86 "/></g></g></svg></button>

    <div id="HlApOverMenu" class="hl-ap-over-menu hl-ap-noprint hl-user-select-none">
        <div class="hl-ap-menu">
            <div class=hl-ap-mobile-menu-btn-close onclick=hl_revert_menu_block(!1)><svg height=30 role=img viewBox="0 0 30 30"width=30><g><line class="fil0-close str0-close"x1=4 x2=10 y1=15 y2=8.5 /><line class="fil0-close str0-close"x1=10 x2=4 y1=21.5 y2=15 /><polygon class=fil1-close points="27.1,1 29,1 29,3 29,29 27.1,29 27.1,3 9,3 9,1 "/><polygon class=fil1-close points="4.97,14 21.97,14 21.97,16 4.97,16 "/><polygon class=fil1-close points="9,27 29,27 29,29 9,29 "/></g></svg></div>
            <?php if(!empty($this->getLogo())){ ?>
                <div class="hl-main-logo"><img src="<?= $this->getLogo();  ?>" class="hl-main-logo"></div>
            <?php }  ?>
            <?php if(!empty($this->getLink())){ ?>
                <div class="hl-ap-menu-block-link hl-ap-menu-block"><a href="<?= $this->getLink()['url'];  ?>" class="hl-main-link"><?= $this->getLink()['name'];  ?></a></div>
            <?php }  ?>
            <!-- Menu -->
            <?= $this->menu_cont; ?>
            <!-- /Menu -->

        </div>
    </div>
    <div class="hl-ap-over-content">
        <?= $this->getInstruction(); ?>
        <div class="hl-ap-content">
            <div class="hl-ap-actual-name hl-main-logo-mob-background hl-user-select-none"><div class="hl-ap-actual-name-on"><?= $this->actual_name; ?></div></div>
            <div class="hl-ap-main-content no-gutters">

                <!-- ADMIN PANEL CONTENT -->


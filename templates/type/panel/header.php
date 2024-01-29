<?php
/**
 * @var string $lang
 * @var string $design
 * @var string $apiVersion
 * @var string $menuContent
 * @var array $headData
 * @var string $title
 * @var string $logoUri
 * @var string $breadcrumbs
 * @var string $showcaseCenter
 * @var string $showcaseRight
 * @var array $translated
 */
?><!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="csrf-token" content="<?= csrf_token() ?>"/>
<?php
    foreach ($headData as $row) {
        echo '    ' . $row . PHP_EOL;
    }
?>
    <link rel="stylesheet" href="/hlresource/adminpan/v<?= $apiVersion ?>/css/adminpanstyle"/>
    <link rel="stylesheet" href="/hlresource/adminpan/v<?= $apiVersion ?>/css/<?= $design ?>"/>
    <title><?= $title ?></title>
</head>
    <body>
    <div id="hl-pan-background"></div>
    <div id="hl-pan-over"><div id="hl-pan-menu" class="hl-pan-cell-default">
        <div id="hl-pan-menu-title">
            <div id="hl-pan-company-logo"><?php if ($logoUri) {echo "<img src=\"$logoUri\" alt=\"Logo\">";} ?></div>
            <button class="hl-pan-menu-arrow hl-pan-menu-icon hl-pan-scroll-icon hl-pan-sel-none">
                <svg class="hl-pan-cl-icon" height="30" role="img" viewBox="0 0 30 30" width="30"><g><line
                     class="hl-pan-cl-fil0 hl-pan-cl-fil1" x1=4 x2=10 y1=15 y2=8.5 ></line><line
                     class="hl-pan-cl-fil0 hl-pan-cl-fil1" x1=10 x2=4 y1=21.5 y2=15 ></line><polygon
                     class="hl-pan-cl-fil1" points="27.1,1 29,1 29,3 29,29 27.1,29 27.1,3 9,3 9,1 "/></g><polygon
                     class="hl-pan-cl-fil1" points="4.97,14 21.97,14 21.97,16 4.97,16 "/><polygon
                     class="hl-pan-cl-fil1" points="9,27 29,27 29,29 9,29 "/></g></svg>
            </button>
        </div>
        <div class="hl-pan-menu-list hl-pan-sel-none">
            <!-- Menu -->
            <?= $menuContent ?>
        </div>
    </div><div id="hl-pan-over-content"><div id="hl-pan-nav-menu">
                <button class="hl-pan-menu-switch hl-pan-menu-icon hl-pan-sel-none" aria-label="Menu">
                    <svg class="hl-pan-svg-hb-icon" height="30" role="img" viewBox="0 0 30 30" width="30"><g><g><polygon
                        class=hl-pan-hb-fil0 points="2.09,3.03 30,3.13 30,7.01 2.09,6.91 "/><polygon
                        class=hl-pan-hb-fil0 points="2.08,25.02 29.99,25.12 29.99,29 2.08,28.9 "/><polygon
                        class=hl-pan-hb-fil0 points="2.08,14.01 29.99,14.11 29.99,17.99 2.08,17.89 "/></g><g><polygon
                        class=hl-pan-hb-fil1 points="1.06,2 28.97,2.1 28.97,5.98 1.06,5.88 "/><polygon
                        class=hl-pan-hb-fil1 points="1.05,23.99 28.95,24.09 28.95,27.97 1.05,27.87 "/><polygon
                        class=hl-pan-hb-fil1 points="1.05,12.98 28.95,13.08 28.95,16.96 1.05,16.86 "/></g></g></svg>
                </button>
                <div id="hl-pan-menu-center-content"><?= $showcaseCenter ?></div>
                <div id="hl-pan-menu-right-content"><?= $showcaseRight ?></div>
                <?php if ($translated): ?>
                <div id="hl-pan-menu-trans-content">
                        <select class="hl-pan-menu-trans-select">
<?php
    foreach ($translated as $name => $uri) {
        echo \str_repeat(' ', 28) . "<option value=\"$uri\">$name</option>" . PHP_EOL;
    }
?>
                        </select></div>
                <?php endif; ?>
      </div><div id="hl-pan-content">
      <?= $breadcrumbs; ?><br>
      <!-- Start panel -->

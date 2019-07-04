<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width"/>
    <style>

        html, body, .hl-ap-over-all {
            padding: 0;
            margin: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            font-family: "PT Sans", "Arial", serif;
            font-size: 16px;
        }
        .hl-ap-over-menu {
            position: absolute;
            left: 0;
            top: 0;
            background-color: #4e759d;
            width: 13%;
            height: 100%;
            padding:0;
            margin: 0;
        }
        .hl-ap-menu {
            position: absolute;
            left: 0;
            top: 0;
            max-height: calc(100% - 45px);
            padding: 25px 5px 20px 21px;
            overflow: auto;
            width: calc(100% - 26px);
        }
        .hl-ap-actual-name{
            min-height: 54px;
            background-color: whitesmoke;
            color: #555555;
            border-bottom: 2px solid #e8e8e8;
            white-space: nowrap;
            overflow: hidden;
        }
        .hl-ap-menu-block, .hl-ap-menu-block-link {
            text-shadow: 1px 1px 1px #0B589D;
            filter: Shadow(Color=#0B589D, Direction=45, Strength=1);
            margin-bottom: 10px;
            cursor: default;
            color: whitesmoke;
            white-space: nowrap;
        }
        .hl-ap-menu-block-link a {
            color: whitesmoke;
            cursor: pointer;
        }
        .hl-ap-menu-block-link a:hover {
            color: white;
        }
        .hl-ap-over-content {
            position: absolute;
            width: 87%;
            left: 13%;
            top: 0;
            background-color: rgba(255, 255, 255, 0.6);
            height: 100%;
        }
        .hl-ap-content {
            padding: 0!important;
            margin:0!important;
            box-sizing: content-box!important;
        }
        .hl-ap-main-content {
            position: absolute;
            top: 57px;
            padding: 15px 0 0 13px!important;
            margin:0!important;
            overflow: auto;
            height: calc(100% - 108px);
            width: calc(100% - 15px);
            font-size: 13px;
            box-sizing: content-box!important;
        }

        .hl-ap-mobile-menu-btn {
            position: absolute;
            z-index: 1000;
            background-color: #4e759d;
            border: 0;
            padding: 10px 5px 5px 10px;
            display: none;
            cursor: pointer;
            max-height: 51px;
            overflow-y: hidden;
        }
        .hl-ap-mobile-menu-btn-close{
            float:right;
            padding: 2px 10px 5px 5px;
            background-color: #4e759d;
            cursor: pointer;
            color: whitesmoke;
            font-size: 24px;
            font-weight: bold;
            display: none;
        }
        .-hl-ap-btn-link{
            border: 0;
            padding: 5px 0 5px 0px;
            margin: 0;
        }
        .-hl-ap-btn-title-link{
            display: inline-block;
            margin-left: 3px;
            cursor: pointer;
        }
        .hl-ap-block-bottom {
            display: inline-block;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 10px 5px 0 5px;
            border-color: #fcfcfc transparent transparent transparent;
            line-height: 0px;
            _border-color: #fcfcfc #000000 #000000 #000000;
            _filter: progid:DXImageTransform.Microsoft.Chroma(color='#000000');
        }
        .hl-ap-select-blocks{
            position: relative;
            bottom: 6px;
            background-color: #5789B9;
            padding: 5px 0 15px 10px;
            margin-bottom: 3px;
        }
        .hl-ap-link-str{
            white-space: nowrap;
            position: relative;
            left: -12px;
        }
        /*  Data List   */
        .hl-ap-over-listing { margin: 5px 0 15px 0;}
        .hl-ap-list-num{
            color: #9e9e9e;
            padding: 3px 5px 3px 0;
            margin: 0;
            text-align: center;
        }
        /*  Data Table   */
        .hl_ap_over_table{
            display: block;
            overflow: auto;
            padding: 5px;
            margin-bottom: 15px;
        }
        .hl-ap-simple-table{
            background-color: white;
            padding: 0;
            border-spacing:0;
        }
        .hl-ap-simple-table tr{
            border-top 1px solid darkgrey;
        }
        .hl-ap-simple-table th{
            padding: 0 10px 7px 0;
            border: 0;
            border-bottom: 1px solid darkgrey;
        }
        .hl-ap-simple-table td{
            padding: 3px 5px;
            border-bottom: 1px solid #cdcdcd;
        }
        .hl-ap-second-line{
            background-color: #ececec;
        }
        .hl-ap-block_html{
            padding: 10px 0 15px 0;
            white-space: nowrap;
        }
        .hl-ap-actual-name-on{
            padding: 18px 5px 0 15px;
        }
        .hl-ap-graph-over{
            white-space: nowrap;
            margin: 5px 0 10px 0 ;
        }
        .hl-ap-graph-over q0{
            display: inline-block;
            background-color: #5776cd;
            font-size: 0;
            padding:0;
            margin:0;
            max-width: 10px;
            min-width: 3px;
        }
        .hl-ap-graph-over q0:hover{
            background-color: orange;
        }
        .hl-ap-graph-max{
            border-top: 4px solid #5fcdc9;
        }
        .hl-ap-graph-min{
            border-top: 4px solid #494eff;
        }

        /* Large Devices, Wide Screens */

        @media only screen and (max-width: 1500px) {
            .hl-ap-over-menu {
                width: 18%;
            }
            .hl-ap-over-content {
                width: 82%;
                left: 18%;
            }
        }
        @media only screen and (max-width: 1200px) {
            .hl-ap-over-menu {
                width: 20%;
            }
            .hl-ap-over-content {
                width: 80%;
                left: 20%;
            }
        }
        /* Medium Devices, Desktops */
        @media only screen and (max-width: 992px) {
            .hl-ap-over-menu {
                width: 25%;
                position: absolute;
                z-index: 1001;
                width: 100%;
                max-width: 500px;
                box-shadow: 0px 0px 6px 0px #000000;
                display: none;
            }
            .hl-ap-over-content {
                width: 100%;
                left: 0;
            }
            .hl-ap-mobile-menu-btn, .hl-ap-mobile-menu-btn-close {
                display: block;
            }
            .hl-ap-actual-name{
                background-color: #4e759d;
                padding-left: 50px;
                color: whitesmoke;
            }
            .hl-ap-main-content{
                width: calc(100% - 15px);
                font-size: 15px;
                padding: 15px 5px;
            }
            .hl-ap-menu-block, .hl-ap-menu-block-link{
                margin-top: 14px;
                padding-bottom: 12px;
                border-bottom: 1px solid #6b8ca9;
            }
            .hl-ap-menu-block-link a{
                text-decoration: none;
            }
            .hl-ap-menu-block{
                color: #3a3a3a;
                text-shadow: none;
                filter: none;
            }
            .-hl-ap-btn-link{
                border: 0!important;
            }
            .hl-ap-select-blocks {
                bottom: 11px;
            }
            .hl-ap-block_html{
                padding: 0;
            }
        }

        @media print {
            .hl-ap-noprint {
                display: none;
            }
        }
    </style>
    <title>Admin Panel | <?= $this->actual_name; ?></title>
</head>
<body>
<div align="left" class="hl-ap-over-all">

    <button id="HlApMenuBtn" type="button" class="hl-ap-mobile-menu-btn hl-ap-noprint" onclick="document.getElementById('HlApOverMenu').style.display = 'block'">
        <svg class="svg-icon"
             width="30" height="30"
             viewBox="0 0 10 10"
             role="img">
            <g fill="whitesmoke">
                <path d="m1 7h8v2h-8zm0-3h8v2h-8zm0-3h8v2h-8z"/>
            </g>
        </svg>
    </button>
    <div id="HlApOverMenu" class="hl-ap-over-menu hl-ap-noprint">
        <div class="hl-ap-menu">
            <div class="hl-ap-mobile-menu-btn-close" onclick="document.getElementById('HlApOverMenu').style.display = 'none'">X</div>
            <!-- Menu -->
            <?= $this->menu_cont; ?>

            <!-- /Menu -->

        </div>
    </div>
    <div class="hl-ap-over-content">
        <div class="hl-ap-content ">
            <div class="hl-ap-actual-name"><div class="hl-ap-actual-name-on"><?= $this->actual_name; ?></div></div>
            <div class="hl-ap-main-content no-gutters">

            <!-- ADMIN PANEL CONTENT -->


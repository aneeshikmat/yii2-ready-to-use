<?php

use common\components\helpers\LanguageHelpers;
use yii\helpers\Url;

$direction = LanguageHelpers::getCurrentLanguageDirection();
?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title> Email Template</title>

    <!-- External Font -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap');
    </style>

    <style>
        /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
        table {
            border: 0;
        }

        /*All the styling goes here*/

        img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%;
            height: auto;
        }

        body {
            background-color: #f6f6f6;
            font-family: 'Open Sans', sans-serif;
            -webkit-font-smoothing: antialiased;
            font-size: 16px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%;
        }

        table td {
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            vertical-align: top;
        }

        /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */

        .body {
            background-color: #F2F7FF;
            color: #46586B;
            width: 100%;
        }

        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .container {
            display: block;
            margin: 0 auto !important;
            /* makes it centered */
            max-width: 580px;
            padding: 10px;
            width: 580px;
        }

        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
            box-sizing: border-box;
            display: block;
            margin: 0 auto;
            max-width: 580px;
            padding: 10px;
        }

        /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
        .main {
            background: #ffffff;
            border-radius: 3px;
            width: 100%;
        }

        .wrapper {
            box-sizing: border-box;
            padding: 40px;
        }

        .content-block {
            padding-bottom: 10px;
            padding-top: 10px;
        }

        .footer {
            clear: both;
            margin-top: 10px;
            text-align: left;
            /* width: 100%;  */
            padding: 0 20px;
        }

        .footer td,
        .footer p,
        .footer span,
        .footer a {
            color: #46586B;
            font-size: 12px;
            text-align: left;
        }

        .footer a {
            color: #0062FF;
            text-decoration: none;
        }

        /* -------------------------------------
          Description
      ------------------------------------- */
        .description-lable {
            color: #46586B;
        }
        .description-value {
            color: #222D38;

        }

        /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
        h1,
        h2,
        h3,
        h4 {
            color: #222D38;
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 32px;
            font-weight: 700;
            text-align: center;
            text-transform: capitalize;
        }

        h3 {
            font-size: 24px;
            font-weight: 700;
            text-align: center;
            text-transform: capitalize;
        }

        p,
        ul,
        ol {
            font-family: 'Open Sans', sans-serif;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
        }

        p li,
        ul li,
        ol li {
            list-style-position: inside;
            margin-left: 5px;
        }

        p,
        span {
            line-height: 24px;
        }

        a {
            color: #0062FF;
            text-decoration: underline;
        }

        .font-small {
            font-size: 10px;
            line-height: 150%;
        }

        /* -------------------------------------
          BUTTONS
      ------------------------------------- */
        .btn {
            box-sizing: border-box;
            width: 100%;
            text-decoration: none;
        }

        .btn>tbody>tr>td {
            padding-bottom: 16px;
        }

        .btn table {
            width: auto;
        }

        .btn table td {
            background-color: #ffffff;
            border-radius: 4px;
            text-align: center;
        }

        .btn a {
            background-color: #ffffff;
            border: solid 1px #0062FF;
            border-radius: 4px;
            box-sizing: border-box;
            color: #0062FF;
            cursor: pointer;
            display: inline-block;
            font-size: 16px;
            margin: 0;
            padding: 12px 24px;
            text-decoration: none;
            text-transform: capitalize;
        }

        .btn-primary table td {
            background-color: #0062FF;
        }

        .btn-primary a {
            background-color: #0062FF;
            border-color: #0062FF;
            color: #ffffff !important;
        }

        /* Divider */
        span.divider {
            width: 100%;
            border-bottom: 1px solid #f4f5f6;
            display: block;
            margin: 32px 0;
        }

        /* Logo */
        .logo {
            margin-bottom: 16px;
        }

        /* Hero image, The main image in the emial */
        .hero {
            margin-bottom: 40px;
        }

        .text-right {
            text-align: right !important;
        }
        .text-start {
            text-align: left !important;
        }

        /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
        .last {
            margin-bottom: 0;
        }

        .first {
            margin-top: 0;
        }

        .align-center {
            text-align: center;
        }

        .align-right {
            text-align: right;
        }

        .align-left {
            text-align: left;
        }

        .clear {
            clear: both;
        }

        .mt0 {
            margin-top: 0;
        }

        .mb0 {
            margin-bottom: 0;
        }

        .mb3 {
            margin-bottom: 30px;
        }

        .mr1 {
            margin-right: 10px;
        }

        .mr28 {
            margin-right: 28px;
        }

        .mt30 {
            margin-top: 30px;
        }

        .mb20 {
            margin-bottom: 20px;
        }

        .mb10 {
            margin-bottom: 10px;
        }

        .preheader {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0;
        }

        .powered-by a {
            text-decoration: none;
        }

        hr {
            border: 0;
            border-bottom: 1px solid #f6f6f6;
            margin: 20px 0;
        }

        .clickable-img {
            cursor: pointer;
        }

        /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
        @media only screen and (max-width: 620px) {
            table[class=body] h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important;
            }

            table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
                font-size: 16px !important;
            }

            table[class=body] .wrapper,
            table[class=body] .article {
                padding: 10px !important;
            }

            table[class=body] .content {
                padding: 0 !important;
            }

            table[class=body] .container {
                padding: 0 !important;
                width: 100% !important;
            }

            table[class=body] .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important;
            }

            table[class=body] .btn table {
                width: 100% !important;
            }

            table[class=body] .btn a {
                width: 100% !important;
            }

            table[class=body] .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important;
            }
        }

        /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
        @media all {
            .ExternalClass {
                width: 100%;
            }

            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%;
            }

            .apple-link a {
                color: inherit !important;
                font-family: 'Open Sans', sans-serif;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important;
            }

            #MessageViewBody a {
                color: inherit;
                text-decoration: none;
                font-size: inherit;
                font-family: 'Open Sans', sans-serif;
                font-weight: inherit;
                line-height: inherit;
            }

            .btn-primary table td:hover {
                background-color: #2982ff !important;
            }

            .btn-primary a:hover {
                background-color: #2982ff !important;
                border-color: #2982ff !important;
            }
        }

        .ltr-direction {
            direction: ltr;
        }

        /* RTL styles */
        .rtl-direction {
            direction: rtl;
        }

        .rtl-direction .text-start,
        .rtl-direction .footer td,
        .rtl-direction .footer p,
        .rtl-direction .footer span,
        .rtl-direction .footer a {
            text-align: right !important;
        }

    </style>
</head>

<body class="<?= "{$direction}-direction" ?>">
<table  class="body">
    <tr>
        <td>&nbsp;</td>
        <td class="container">
            <div class="content">

                <!-- START CENTERED WHITE CONTAINER -->
                <table role="presentation" class="main">

                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td class="wrapper">
                            <table >
                                <tr>
                                    <td>
                                        <img class="logo" src="<?= Url::base(true) ?>/img/logo.png" alt="Logo" />
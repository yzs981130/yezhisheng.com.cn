<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<style type="text/css">
    /* Font - Merriweather */
    @media screen and (min-device-pixel-ratio:  1.5), screen and (-webkit-min-device-pixel-ratio: 1.5),
            screen and (-o-min-device-pixel-ratio: 1.5/1.5), screen and (min--moz-device-pixel-ratio: 1.5){
        @font-face {
            font-family: 'Merriweather';
            font-style: normal;
            font-weight: 300;
            src: local('Merriweather Light'),
            local('Merriweather-Light'),
            url(<?= STATIC_PATH ?>font/Merriweather/300.woff2) format('woff2'),
            url(<?= STATIC_PATH ?>font/Merriweather/300.woff) format('woff');
        }
        @font-face {
            font-family: 'Merriweather';
            font-style: italic;
            font-weight: 300;
            src: local('Merriweather Light Italic'),
            local('Merriweather-LightItalic'),
            url(<?= STATIC_PATH ?>font/Merriweather/300i.woff2) format('woff2'),
            url(<?= STATIC_PATH ?>font/Merriweather/300i.woff) format('woff');
        }

        @font-face {
            font-family: 'Merriweather';
            font-style: normal;
            font-weight: 400;
            src: local('Merriweather'),
            local('Merriweather-Regular'),
            url(<?= STATIC_PATH ?>font/Merriweather/400.woff2) format('woff2'),
            url(<?= STATIC_PATH ?>font/Merriweather/400.woff) format('woff');
        }
        @font-face {
            font-family: 'Merriweather';
            font-style: italic;
            font-weight: 400;
            src: local('Merriweather Italic'),
            local('Merriweather-Italic'),
            url(<?= STATIC_PATH ?>font/Merriweather/400i.woff2) format('woff2'),
            url(<?= STATIC_PATH ?>font/Merriweather/400i.woff) format('woff');
        }
    }
    <?php if (isWindows()):?>
    @media screen and (max-device-pixel-ratio:  1.5), screen and (-webkit-max-device-pixel-ratio: 1.5), screen and (max--moz-device-pixel-ratio: 1.5){
        /* Font - Open Sans */
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 300;
            src: local('Open Sans Light'),
            local('OpenSans-Light'),
            url(<?= STATIC_PATH ?>font/OpenSans/300.woff2) format('woff2'),
            url(<?= STATIC_PATH ?>font/OpenSans/300.woff) format('woff');
        }
        @font-face {
            font-family: 'Open Sans';
            font-style: italic;
            font-weight: 300;
            src: local('Open Sans Light Italic'),
            local('OpenSansLight-Italic'),
            url(<?= STATIC_PATH ?>font/OpenSans/300i.woff2) format('woff2'),
            url(<?= STATIC_PATH ?>font/OpenSans/300i.woff) format('woff');
        }

        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: 400;
            src: local('Open Sans'),
            local('OpenSans'),
            url(<?= STATIC_PATH ?>font/OpenSans/400.woff2) format('woff2'),
            url(<?= STATIC_PATH ?>font/OpenSans/400.woff) format('woff');
        }
        @font-face {
            font-family: 'Open Sans';
            font-style: italic;
            font-weight: 400;
            src: local('Open Sans Italic'),
            local('OpenSans-Italic'),
            url(<?= STATIC_PATH ?>font/OpenSans/400i.woff2) format('woff2'),
            url(<?= STATIC_PATH ?>font/OpenSans/400i.woff) format('woff');
        }
    }
    <?php endif;?>
</style>

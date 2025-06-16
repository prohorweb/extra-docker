<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        
        'css/fonts/Oswald.css',
        'css/fonts/Roboto.css',
        'css/styles.css',
        'css/utilites.css',
        'css/present-video.css',
        'https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css',
        'https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css'
    ];
    public $js = [
        '/js/app.js',
        'js/main.js',
        'js/cookieconsent.min.js',
        // 'js/jquery.carouFredSel-6.2.1-packed.js',
        //'js/jquery.mousewheel.min.js',
        // 'js/jquery.touchSwipe.min.js',
        'js/flipclock.min.js',
        // 'js/bootstrap.bundle.min.js',
        'js/cookie.min.js',
        'js/minified.js',
        'js/present-video.js'
    ];
    public $jsOptions = [
        //'async' => 'async',
        //'position' =>  \yii\web\View::POS_HEAD
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}

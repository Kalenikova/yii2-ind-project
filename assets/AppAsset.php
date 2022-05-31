<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/style.css',
        'css/bootstrap.min.css',
        'css/custom.css',
        'css/plugins.css',
        'css/plugins/maimenu.css',
        'css/plugins/animation.css',
        'css/plugins/bicon.min.css',
        'css/plugins/fakeloader.css',
        'css/plugins/fancybox.css',
        'css/plugins/font-awesome.min.css',
        'css/plugins/fotorama.css',
        'css/plugins/jquery-ui.min.css',
        'css/plugins/lightbox.css',
        'css/plugins/material-design-iconic-font.min.css',
        'css/plugins/nivo-preview-2.css',
        'css/plugins/nivo-slider.css',
        'css/plugins/owl.carousel.min.css',
        'css/plugins/owl.theme.default.min.css',
        'css/plugins/pe-icon-7-stroke.css',
        'css/plugins/simple-line-icons.css',
        'css/plugins/slick.min.css',
      
    ];
    public $js = [
        'js/active.js',
        'js/bootstrap.min.js',
        'js/plugins.js',
        'js/popper.min.js',
        'js/vendor/jquery-3.2.1.min.js',
        'js/vendor/modernizr-3.5.0.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}

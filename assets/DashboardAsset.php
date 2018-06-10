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
class DashboardAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'public/bootstrap/css/bootstrap.min.css',
        'public/custom/css/dashboard/style.css',
    ];
    public $js = [
        'public/custom/js/dashboard/main.js',
        //'public/jquery-latest/jquery.min.js',
        'public/bootstrap/js/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}

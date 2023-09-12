<?php
// 导入腾讯云COS SDK
require 'vendor/autoload.php';

use Qcloud\Cos\Client;

// 引入配置文件
$cosConfig = require 'tencent/cos-config.php';

// 创建COS客户端，使用引入的配置
$cosClient = new Client($cosConfig);

// 存储桶名称从配置文件中获取
$bucket = $cosConfig['bucket'];

// 初始化已使用图片数组
if (!isset($_SESSION['used_images'])) {
    $_SESSION['used_images'] = [];
}

// 获取存储桶中的所有对象
$objects = $cosClient->listObjects(['Bucket' => $bucket]);

// 如果所有图片都已输出过一次，重置已使用图片数组
if (count($_SESSION['used_images']) == count($objects['Contents'])) {
    $_SESSION['used_images'] = [];
}

// 随机选择一个未使用的对象
do {
    $randomObject = $objects['Contents'][array_rand($objects['Contents'])];
} while (in_array($randomObject['Key'], $_SESSION['used_images']));

// 将选定对象添加到已使用图片数组
$_SESSION['used_images'][] = $randomObject['Key'];

// 获取选定对象的URL
$objectUrl = $cosClient->getObjectUrl($bucket, $randomObject['Key']);

// 获取图片类型
$imageType = exif_imagetype($objectUrl);

// 根据图片类型设置相应的 Content-Type
switch ($imageType) {
    case IMAGETYPE_JPEG:
        header('Content-Type: image/jpeg');
        break;
    case IMAGETYPE_PNG:
        header('Content-Type: image/png');
        break;
    case IMAGETYPE_GIF:
        header('Content-Type: image/gif');
        break;
    // 添加其他支持的图片类型
    default:
        // 默认为JPEG
        header('Content-Type: image/jpeg');
}

// 输出图片
readfile($objectUrl);
?>

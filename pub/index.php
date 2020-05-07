<?php
/**
 * Public alias for the application entry point
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

use Magento\Framework\App\Bootstrap;
use Magento\Framework\App\Filesystem\DirectoryList;

try {
    require __DIR__ . '/../app/bootstrap.php';
} catch (\Exception $e) {
    echo <<<HTML
<div style="font:12px/1.35em arial, helvetica, sans-serif;">
    <div style="margin:0 0 25px 0; border-bottom:1px solid #ccc;">
        <h3 style="margin:0;font-size:1.7em;font-weight:normal;text-transform:none;text-align:left;color:#2f2f2f;">
        Autoload error</h3>
    </div>
    <p>{$e->getMessage()}</p>
</div>
HTML;
    exit(1);
}

$params = $_SERVER;
function isHttpHost($host)
{
    if (!isset($_SERVER['HTTP_HOST'])) {
        return false;
    }
    return $_SERVER['HTTP_HOST'] ===  $host;
}
if(isHttpHost('magento2-dev.com')){
    $params[\Magento\Store\Model\StoreManager::PARAM_RUN_TYPE] = 'website';
}else{
    $params[\Magento\Store\Model\StoreManager::PARAM_RUN_CODE] = 'website2';
}
$params[\Magento\Store\Model\StoreManager::PARAM_RUN_TYPE] = 'website';
$bootstrap = \Magento\Framework\App\Bootstrap::create(BP,$params);
$params[Bootstrap::INIT_PARAM_FILESYSTEM_DIR_PATHS] = array_replace_recursive(
    $params[Bootstrap::INIT_PARAM_FILESYSTEM_DIR_PATHS] ?? [],
    [
        DirectoryList::PUB => [DirectoryList::URL_PATH => ''],
        DirectoryList::MEDIA => [DirectoryList::URL_PATH => 'media'],
        DirectoryList::STATIC_VIEW => [DirectoryList::URL_PATH => 'static'],
        DirectoryList::UPLOAD => [DirectoryList::URL_PATH => 'media/upload'],
    ]
);
$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $params);
/** @var \Magento\Framework\App\Http $app */
$app = $bootstrap->createApplication(\Magento\Framework\App\Http::class);
$bootstrap->run($app);

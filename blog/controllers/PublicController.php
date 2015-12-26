<?php

namespace blog\controllers;

use blog\controllers\common\BaseController;
use common\components\HttpClient;
use common\models\posts\Posts;
use common\models\posts\PostsTags;
use Yii;


class PublicController extends BaseController{
    public function actionIframe(){
        $url = $this->get("url","");
        $data = HttpClient::get($url);
        echo $data;exit();
    }
}
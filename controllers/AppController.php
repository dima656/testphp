<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 28.10.16
 * Time: 0:54
 */

namespace app\controllers;

use yii\web\Controller;


class AppController extends Controller
{
    protected function setMeta($title=null, $keywords=null,$description=null ) {
        $this->view->title=$title;
        $this->view->registerMetaTag(['name'=>'keywords', 'content'=>"$keywords"]);
        $this->view->registerMetaTag(['name'=>'description', 'content'=>"$description"]);

    }
}
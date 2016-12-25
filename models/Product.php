<?php
/**
 * Created by PhpStorm.
 * User: dima
 * Date: 26.10.16
 * Time: 18:53
 */

namespace app\models;
use yii;
use yii\base\Model;
use yii\db\ActiveRecord;



class Product extends ActiveRecord
{

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName(){
        return 'product';
    }

    public function getCategory(){
        return $this->hasOne(Category::className(),['id'=>'category_id']);
    }
}
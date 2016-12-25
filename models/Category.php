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



class Category extends ActiveRecord
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
    return 'category';
}

public function getProducts(){
    return $this->hasMany(Product::className(),['category_id'=>'id']);
}
}
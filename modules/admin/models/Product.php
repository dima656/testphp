<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product extends \yii\db\ActiveRecord
{


    public $image;
    public $gallery;
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    public function getCategory() {
        return $this->hasOne(Category::className(),['id'=>'category_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
           [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'product id',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'content' => 'Content',
            'price' => 'Price',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'image' => 'Image',
            'hit' => 'Hit',
            'new' => 'New',
            'sale' => 'Sale',
        ];
    }

    public function upload() {
        if($this->validate()) {
            $path='upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            debug($path); //die;
            $this->image->saveAs($path);
            $this->attachImage($path,true);
            unlink($path);
            return true;
        } else {
            return false;
        }
    }

    public function uploadGallery() {
        if($this->validate()) {
            foreach ($this->gallery as $file) {
                $path='upload/store/' . $file->baseName . '.' . $file->extension;
                debug($path); //die;
                $file->saveAs($path);
                $this->attachImage($path);
                unlink($path);
            }
            return true;
        } else {
            return false;
        }
    }
}

<?php

namespace app\models;

use Yii;
use app\models\Tag;
use app\models\Utilities;
use app\models\ImageUpload;
use app\models\ProductTags;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property double $price
 * @property string $description
 * @property string $thumb
 * @property string $content
 * @property int $category_id
 * @property string $date
 * @property int $count
 * @property int $popular
 * @property int $forcing
 * @property int $ends_count
 *
 * @property Checkout[] $checkouts
 * @property ProductTags[] $productTags
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'title', 'count', 'ends_count'], 'required'],
            [['price'], 'number'],
            [['description', 'content'], 'string'],
            [['category_id', 'count', 'popular', 'forcing', 'ends_count'], 'integer'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['date'], 'default', 'value' => date('Y-m-d')],
            [['title', 'thumb'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'price' => 'Цена',
            'description' => 'Короткое описание',
            'thumb' => 'Изображение',
            'content' => 'Полное описание',
            'category_id' => 'Категория',
            'date' => 'Дата',
            'count' => 'Количество',
            'popular' => 'Популярность',
            'forcing' => 'Приоритет',
            'ends_count' => 'Минимальное количество',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCheckouts()
    {
        return $this->hasMany(Checkout::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTags()
    {
        return $this->hasMany(ProductTags::className(), ['product_id' => 'id']);
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function saveCategory($category)
    {
        $this->category_id = $category;
        return $this->save(false);
    }

    public function clearCategory()
    {
        $this->category_id = null;
        return $this->save(false);
    }

    private function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
            ->viaTable('product_tags', ['product_id' => 'id']);
    }

    public function getSelectedTags()
    {
        $selected = $this->getTags()->select('id')->asArray()->all();
        return ArrayHelper::getColumn($selected, 'id');
    }

    public function saveTags($tags)
    {
        if (is_array($tags))
        {
            $this->clearTags();

            foreach ($tags as $tag_id) {
                $tag = Tag::findOne($tag_id);

                $productTags = new ProductTags();
                $productTags->tag_id = $tag_id;
                $productTags->product_id = $this->id;
                $productTags->save(false);
            }
        }
    }

    private function clearTags()
    {
        ProductTags::deleteAll(['product_id' => $this->id]);
    }

    public function saveImage($filename)
    {
        $this->thumb = $filename;
        return $this->save(false);
    }

    public function getImage()
    {
        return ($this->thumb) ? '/uploads/' . $this->thumb : '/no-image.png';
    }

    private function removeImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->removeCurrentImage($this->thumb);
    }

    public function beforeDelete()
    {
        $this->removeImage();
        return parent::beforeDelete();
    }
}

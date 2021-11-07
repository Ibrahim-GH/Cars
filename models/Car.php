<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "cars".
 *
 * @property int $id
 * @property string $plate_number
 * @property string|null $image_path
 * @property string $model
 * @property string $color
 * @property string $year
 * @property int $cast_per_day
 * @property int $city_id
 * @property int $brand_id
 * @property int $type_id
 * @property int $company_id
 *
 * @property Brand $brand
 * @property City $city
 * @property Company $company
 * @property Type $type
 * @property Offer[] $offers
 */
class Car extends \yii\db\ActiveRecord
{

    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['plate_number', 'model', 'color', 'year', 'cast_per_day', 'city_id', 'brand_id', 'type_id', 'company_id'], 'required'],
            [['cast_per_day', 'city_id', 'brand_id', 'type_id', 'company_id'], 'integer'],
            [['plate_number', 'image_path', 'model', 'color', 'year'], 'string', 'max' => 255],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brand::className(), 'targetAttribute' => ['brand_id' => 'id']],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $path = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($path);
            return $path;
        } else {
            return false;
        }
    }

    public function getImageUrl()
    {
        return Url::to(Url::base() . $this->image_path, 'http');
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'plate_number' => Yii::t('app', 'Plate Number'),
            'image_path' => Yii::t('app', 'Image Path'),
            'model' => Yii::t('app', 'Model'),
            'color' => Yii::t('app', 'Color'),
            'year' => Yii::t('app', 'Year'),
            'cast_per_day' => Yii::t('app', 'Cast Per Day'),
            'city_id' => Yii::t('app', 'City ID'),
            'brand_id' => Yii::t('app', 'Brand ID'),
            'type_id' => Yii::t('app', 'Type ID'),
            'company_id' => Yii::t('app', 'Company ID'),
        ];
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['id' => 'company_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['id' => 'type_id']);
    }

    /**
     * Gets query for [[Offers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOffers()
    {
        return $this->hasMany(Offer::className(), ['car_id' => 'id']);
    }
}

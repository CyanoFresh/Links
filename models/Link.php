<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "link".
 *
 * @property integer $id
 * @property string $short_code
 * @property string $long_url
 */
class Link extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['long_url'], 'required'],
            [['long_url'], 'url'],
            [['short_code'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'short_code' => 'Short Code',
            'long_url' => 'Long Url',
        ];
    }
}

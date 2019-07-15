<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string $tags
 *
 * @property ArtTags[] $artTags
 */
class Tags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tags'], 'required'],
            [['tags'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tags' => 'Tags',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtTags()
    {
        return $this->hasMany(ArtTags::className(), ['tag_id' => 'id']);
    }
}

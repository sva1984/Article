<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "art_tags".
 *
 * @property int $id
 * @property int $art_id
 * @property int $tag_id
 *
 * @property Articals $art
 * @property Tags $tag
 */
class ArtTags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'art_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['art_id', 'tag_id'], 'required'],
            [['art_id', 'tag_id'], 'integer'],
            [['art_id'], 'exist', 'skipOnError' => true, 'targetClass' => Articals::className(), 'targetAttribute' => ['art_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::className(), 'targetAttribute' => ['tag_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'art_id' => 'Art ID',
            'tag_id' => 'Tag ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArt()
    {
        return $this->hasOne(Articals::className(), ['id' => 'art_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tags::className(), ['id' => 'tag_id']);
    }
}

<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "articals".
 *
 * @property int $id
 * @property string $title
 * @property string $text
 * @property int $tagId
 * @property int $time_create
 * @property int $time_update
 * @property string $slug
 * @property int $created_by
 * @property int $updated_by
 *
 * @property ArtTags[] $artTags
 * @property User $createdBy
 * @property User $updatedBy
 * @property Comment[] $comments
 */
class Articals extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articals';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'text', 'tagId'], 'required'],
            [['text'], 'string'],
            [['tagId', 'time_create', 'time_update', 'created_by', 'updated_by', 'active'], 'integer'],
            [['title', 'slug'], 'string', 'max' => 64],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'tagId' => 'Tag ID',
            'time_create' => 'Time Create',
            'time_update' => 'Time Update',
            'slug' => 'Slug',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArtTags()
    {
        return $this->hasMany(ArtTags::className(), ['art_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['articals_id' => 'id']);
    }

    public function behaviors()
    {
        return [
            ['class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'time_create',
                'updatedAtAttribute' => 'time_update'],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                // 'slugAttribute' => 'slug',
            ],

            BlameableBehavior::className(),

        ];
    }

}

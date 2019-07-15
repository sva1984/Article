<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $comment
 * @property int $articals_id
 * @property int $created_by
 * @property int $updated_by
 * @property int $time_create
 * @property int $time_update
 * @property int $parrent_comment_id
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property Articals $articals
 * @property Comment $parrentComment
 * @property Comment[] $comments
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment', 'articals_id'], 'required'],
            [['comment'], 'string'],
            [['articals_id', 'created_by', 'updated_by', 'time_create', 'time_update', 'parrent_comment_id'], 'integer'],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['articals_id'], 'exist', 'skipOnError' => true, 'targetClass' => Articals::className(), 'targetAttribute' => ['articals_id' => 'id']],
            [['parrent_comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comment::className(), 'targetAttribute' => ['parrent_comment_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment' => 'Comment',
            'articals_id' => 'Articals ID',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'time_create' => 'Time Create',
            'time_update' => 'Time Update',
            'parrent_comment_id' => 'Parrent Comment ID',
        ];
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
    public function getArticals()
    {
        return $this->hasOne(Articals::className(), ['id' => 'articals_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParrentComment()
    {
        return $this->hasOne(Comment::className(), ['id' => 'parrent_comment_id']);
    }

    /**
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function getTimeCreate()
    {
        return Yii::$app->formatter->asDatetime($this->time_create);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['parrent_comment_id' => 'id']);
    }

    public function behaviors()
    {
        return [
            ['class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'time_create',
                'updatedAtAttribute' => 'time_update'],
            BlameableBehavior::className(),
        ];
    }


}

<?php

use yii\db\Migration;

/**
 * Handles adding img_url to table `{{%user}}`.
 */
class m190721_145727_add_img_url_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'img_url', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'img_url');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles adding parrent_comment_id to table `{{%comment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%comment}}`
 */
class m190715_094214_add_parrent_comment_id_column_to_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%comment}}', 'parrent_comment_id', $this->integer());

        // creates index for column `parrent_comment_id`
        $this->createIndex(
            '{{%idx-comment-parrent_comment_id}}',
            '{{%comment}}',
            'parrent_comment_id'
        );

        // add foreign key for table `{{%comment}}`
        $this->addForeignKey(
            '{{%fk-comment-parrent_comment_id}}',
            '{{%comment}}',
            'parrent_comment_id',
            '{{%comment}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%comment}}`
        $this->dropForeignKey(
            '{{%fk-comment-parrent_comment_id}}',
            '{{%comment}}'
        );

        // drops index for column `parrent_comment_id`
        $this->dropIndex(
            '{{%idx-comment-parrent_comment_id}}',
            '{{%comment}}'
        );

        $this->dropColumn('{{%comment}}', 'parrent_comment_id');
    }
}

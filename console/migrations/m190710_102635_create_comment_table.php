<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%articals}}`
 */
class m190710_102635_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'comment' => $this->text()->notNull(),
            'articals_id' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
            'time_create' => $this->integer()->notNull(),
            'time_update' => $this->integer()->notNull(),
        ]);

        // creates index for column `articals_id`
        $this->createIndex(
            '{{%idx-comment-articals_id}}',
            '{{%comment}}',
            'articals_id'
        );

        // add foreign key for table `{{%articals}}`
        $this->addForeignKey(
            '{{%fk-comment-articals_id}}',
            '{{%comment}}',
            'articals_id',
            '{{%articals}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%articals}}`
        $this->dropForeignKey(
            '{{%fk-comment-articals_id}}',
            '{{%comment}}'
        );

        // drops index for column `articals_id`
        $this->dropIndex(
            '{{%idx-comment-articals_id}}',
            '{{%comment}}'
        );

        $this->dropTable('{{%comment}}');
    }
}

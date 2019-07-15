<?php

use yii\db\Migration;

/**
 * Handles adding updated_by to table `{{%articals}}`.
 */
class m190710_112935_add_updated_by_column_to_articals_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%articals}}', 'updated_by', $this->integer()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%articals}}', 'updated_by');
    }
}

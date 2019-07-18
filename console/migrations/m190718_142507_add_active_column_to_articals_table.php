<?php

use yii\db\Migration;

/**
 * Handles adding active to table `{{%articals}}`.
 */
class m190718_142507_add_active_column_to_articals_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%articals}}', 'active', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%articals}}', 'active');
    }
}

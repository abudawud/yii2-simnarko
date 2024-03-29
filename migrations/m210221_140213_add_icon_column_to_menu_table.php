<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%menu}}`.
 */
class m210221_140213_add_icon_column_to_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%menu}}', 'icon', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%menu}}', 'icon');
    }
}

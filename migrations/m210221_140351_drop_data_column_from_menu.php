<?php

use yii\db\Migration;

/**
 * Class m210221_140351_drop_data_column_from_menu
 */
class m210221_140351_drop_data_column_from_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210221_140351_drop_data_column_from_menu cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210221_140351_drop_data_column_from_menu cannot be reverted.\n";

        return false;
    }
    */
}

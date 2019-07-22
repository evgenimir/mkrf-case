<?php

use yii\db\Migration;

/**
 * Class m190721_131224_add_names_to_user
 */
class m190721_131224_add_names_to_user extends Migration
{
    public const USER_TABLE = '{{%user}}';
    
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::USER_TABLE, 'last_name', $this->string()->defaultValue(null));
        $this->addColumn(self::USER_TABLE, 'first_name', $this->string()->defaultValue(null));
        $this->addColumn(self::USER_TABLE, 'father_name', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(self::USER_TABLE,'father_name');
        $this->dropColumn(self::USER_TABLE,'first_name');
        $this->dropColumn(self::USER_TABLE,'last_name');
    }
}

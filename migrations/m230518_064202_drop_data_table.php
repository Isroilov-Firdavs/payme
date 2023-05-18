<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `{{%data}}`.
 */
class m230518_064202_drop_data_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropTable('{{%data}}');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->createTable('{{%data}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'desc' => $this->text(),
        ]);
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%offers}}`.
 */
class m201218_120706_create_offers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%offers}}', [
            'id' => $this->primaryKey(),
            'start_date' => $this->date()->notNull(),
            'end_date' => $this->date()->notNull(),
            'car_id' => $this->integer()->notNull(),
        ], 'ENGINE=InnoDB');

        // creates index for column `car_id`
        $this->createIndex('idx-offers-car_id', 'offers', 'car_id');

        // add foreign key for table `cars`
        $this->addForeignKey('fk-offers-car_id', 'offers', 'car_id', 'cars', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%offers}}');
    }
}

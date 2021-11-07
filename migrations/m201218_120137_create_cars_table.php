<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cars}}`.
 */
class m201218_120137_create_cars_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cars}}', [
            'id' => $this->primaryKey(),
            'plate_number' => $this->string()->notNull(),
            'image_path' => $this->string(),
            'model' => $this->string()->notNull(),
            'color' => $this->string()->notNull(),
            'year' => $this->string()->notNull(),
            'cast_per_day' => $this->integer()->notNull(),
            'city_id' => $this->integer()->notNull(),
            'brand_id' => $this->integer()->notNull(),
            'type_id' => $this->integer()->notNull(),
            'company_id' => $this->integer()->notNull(),
        ], 'ENGINE=InnoDB');

        // creates index for column `city_id`
        $this->createIndex('idx-cars-city_id', 'cars', 'city_id');

        // add foreign key for table `cities`
        $this->addForeignKey('fk-cars-city_id', 'cars', 'city_id', 'cities', 'id', 'CASCADE');

        // creates index for column `brand_id`
        $this->createIndex('idx-cars-brand_id', 'cars', 'brand_id');

        // add foreign key for table `brands`
        $this->addForeignKey('fk-cars-brand_id', 'cars', 'brand_id', 'brands', 'id', 'CASCADE');

        // creates index for column `type_id`
        $this->createIndex('idx-cars-type_id', 'cars', 'type_id');

        // add foreign key for table `types`
        $this->addForeignKey('fk-cars-type_id', 'cars', 'type_id', 'types', 'id', 'CASCADE');

        // creates index for column `company_id`
        $this->createIndex('idx-cars-company_id', 'cars', 'company_id');

        // add foreign key for table `companies`
        $this->addForeignKey('fk-cars-company_id', 'cars', 'company_id', 'companies', 'id', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cars}}');
    }
}

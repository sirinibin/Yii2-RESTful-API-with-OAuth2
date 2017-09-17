<?php

use yii\db\Migration;

/**
 * Class m170916_101824_adding_sample_data_to_employee_table
 */
class m170916_101824_adding_sample_data_to_employee_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $sql="INSERT INTO `employee` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES (NULL, 'John ', 'john@gmail.com', '2017-09-16 03:09:12', CURRENT_TIMESTAMP), (NULL, 'James', 'james@gmail.com', '2017-09-16 04:09:00', CURRENT_TIMESTAMP);";
        Yii::$app->db->createCommand($sql)->execute();

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       // echo "m170916_101824_adding_sample_data_to_employee_table cannot be reverted.\n";

        $sql="DELETE from employee where email='john@gmail.com' or email='james@gmail.com' ";
        Yii::$app->db->createCommand($sql)->execute();

       // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170916_101824_adding_sample_data_to_employee_table cannot be reverted.\n";

        return false;
    }
    */
}

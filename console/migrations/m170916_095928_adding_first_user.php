<?php

use yii\db\Migration;

/**
 * Class m170916_095928_adding_first_user
 */
class m170916_095928_adding_first_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $sql="INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sirinibin', 'msYYcnCvsik9p-xXFh917VQ48fyzhtvR', '$2y$13$4M3N06yd6/sjwcKcal8PceB1nt.x6fJnxEx73iKZZV.tF1KPeILlO', 'mP4czGphDbp3waFgWSRyAPw5uBzgxmiQ_1429844420', 'sirinibin2006@gmail.com', 10, 1429844102, 1429846978);
";
        Yii::$app->db->createCommand($sql)->execute();
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       // echo "m170916_095928_adding_first_user cannot be reverted.\n";

        $sql="DELETE from user where username='sirinibin'";
        Yii::$app->db->createCommand($sql)->execute();

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170916_095928_adding_first_user cannot be reverted.\n";

        return false;
    }
    */
}

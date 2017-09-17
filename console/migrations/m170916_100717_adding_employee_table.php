<?php

use yii\db\Migration;

/**
 * Class m170916_100717_adding_employee_table
 */
class m170916_100717_adding_employee_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $sql="
        CREATE TABLE `employee` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
        ";
        Yii::$app->db->createCommand($sql)->execute();


    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%employee}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170916_100717_adding_employee_table cannot be reverted.\n";

        return false;
    }
    */
}

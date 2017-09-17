<?php

use yii\db\Migration;

/**
 * Class m170916_150649_adding_oauth2_tables
 */
class m170916_150649_adding_oauth2_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $sql="
        --
-- Table structure for table `access_tokens`
--

CREATE TABLE `access_tokens` (
`id` int(11) NOT NULL,
  `token` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `expires_at` int(11) NOT NULL,
  `auth_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `authorization_codes`
--

CREATE TABLE `authorization_codes` (
`id` int(11) NOT NULL,
  `code` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `expires_at` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `app_id` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_tokens`
--
ALTER TABLE `access_tokens`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authorization_codes`
--
ALTER TABLE `authorization_codes`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_tokens`
--
ALTER TABLE `access_tokens`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
--
-- AUTO_INCREMENT for table `authorization_codes`
--
ALTER TABLE `authorization_codes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
        ";
        Yii::$app->db->createCommand($sql)->execute();

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
       // echo "m170916_150649_adding_oauth2_tables cannot be reverted.\n";
        $this->dropTable('{{%access_tokens}}');
        $this->dropTable('{{%authorization_codes}}');

        //return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170916_150649_adding_oauth2_tables cannot be reverted.\n";

        return false;
    }
    */
}

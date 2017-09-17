<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "access_tokens".
 *
 * @property int $id
 * @property string $token
 * @property int $expires_at
 * @property string $auth_code
 * @property int $user_id
 * @property string $app_id
 * @property int $created_at
 * @property int $updated_at
 */
class AccessTokens extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access_tokens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['token', 'expires_at', 'auth_code', 'user_id', 'created_at', 'updated_at'], 'required'],
            [['expires_at', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['token'], 'string', 'max' => 300],
            [['auth_code', 'app_id'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token' => 'Token',
            'expires_at' => 'Expires At',
            'auth_code' => 'Auth Code',
            'user_id' => 'User ID',
            'app_id' => 'App ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}

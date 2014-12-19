<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_program_role".
 *
 * @property integer $id
 * @property integer $User_id
 * @property integer $Program_id
 *
 * @property User $user
 */
class UserProgramRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_program_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'User_id'], 'required'],
            [['id', 'User_id', 'Program_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'User_id' => 'User ID',
            'Program_id' => 'Program ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'User_id']);
    }
}

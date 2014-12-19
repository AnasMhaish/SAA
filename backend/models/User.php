<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $lastVisited_date
 * @property string $created_date
 * @property string $updated_date
 * @property boolean $status
 * @property string $description
 * @property integer $Role_id
 *
 * @property Role $role
 * @property UserProgramRole[] $userProgramRoles
 */
class User extends \yii\db\ActiveRecord 
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'updated_date', 'Role_id'], 'required'],
            [['id', 'Role_id'], 'integer'],
            [['lastVisited_date', 'created_date', 'updated_date'], 'safe'],
            [['status'], 'boolean'],
            [['username'], 'string', 'max' => 20],
            [['password', 'email'], 'string', 'max' => 128],
            [['description'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'lastVisited_date' => 'Last Visited Date',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
            'description' => 'Description',
            'Role_id' => 'Role ID',
        ];
    }

    
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'Role_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProgramRoles()
    {
        return $this->hasMany(UserProgramRole::className(), ['User_id' => 'id']);
    }
    
     /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    
       /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    
       /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
}

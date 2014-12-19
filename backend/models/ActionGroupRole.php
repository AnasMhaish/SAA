<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "action_group_role".
 *
 * @property integer $id
 * @property integer $Action_id
 * @property integer $Role_id
 * @property integer $Group_id
 *
 * @property Action $action
 * @property Role $role
 * @property Group $group
 */
class ActionGroupRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'action_group_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'Action_id', 'Role_id', 'Group_id'], 'required'],
            [['id', 'Action_id', 'Role_id', 'Group_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Action_id' => 'Action ID',
            'Role_id' => 'Role ID',
            'Group_id' => 'Group ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAction()
    {
        return $this->hasOne(Action::className(), ['id' => 'Action_id']);
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
    public function getGroup()
    {
        return $this->hasOne(Group::className(), ['id' => 'Group_id']);
    }
}

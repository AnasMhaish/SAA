<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "action".
 *
 * @property integer $id
 * @property string $actionUrl
 * @property string $created_date
 * @property string $description
 *
 * @property ActionGroupRole[] $actionGroupRoles
 */
class Action extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'action';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['created_date'], 'safe'],
            [['actionUrl'], 'string', 'max' => 128],
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
            'actionUrl' => 'Action Url',
            'created_date' => 'Created Date',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActionGroupRoles()
    {
        return $this->hasMany(ActionGroupRole::className(), ['Action_id' => 'id']);
    }
}

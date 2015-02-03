<?php

namespace app\models\users;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property integer $id
 * @property string $role_name
 * @property string $role_description
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_name', 'role_description'], 'required'],
            [['role_name'], 'string', 'max' => 50],
            [['role_description'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_name' => 'Role Name',
            'role_description' => 'Role Description',
        ];
    }
}

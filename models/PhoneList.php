<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "phone_list".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $phone
 * @property int|null $phone_type
 */
class PhoneList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'phone_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            ['user_id', 'safe' ],
//            ['phone_type', 'safe' ],
//            ['phone', 'integer' ],
            [['user_id', 'phone', 'phone_type'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'phone' => 'Phone',
            'phone_type' => 'Phone Type',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(),['id' => 'user_id']);
    }

    public function getPhoneType()
    {
        return $this->hasOne(PhoneType::className(),['id' => 'phone_type']);
    }

    public function getAllPhoneUser()
    {

        $query = PhoneList::find('phone')->where(['user_id' => $this->user_id])->all();
        return $query;
    }

}

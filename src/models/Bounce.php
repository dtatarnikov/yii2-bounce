<?php
namespace strong2much\bounce\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%bounce}}".
 *
 * The followings are the available columns in table '{{%bounce}}':
 * @property string $email - email (pk)
 * @property integer $time - unix time
 *
 * @author   Denis Tatarnikov <tatarnikovda@gmail.com>
 */
class Bounce extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
		return '{{%bounce}}';
	}

    /**
     * @return array the behavior configurations.
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'time',
                'updatedAtAttribute' => false,
            ]
        ];
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return [
			['email', 'required'],
            ['email', 'email'],
            ['email', 'unique'],
            ['email', 'filter', 'filter'=>'strtolower'],
            ['time', 'integer'],
		];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
            'email' => Yii::t('bounce', 'Email'),
			'time' => Yii::t('bounce', 'Time'),
		];
	}
}
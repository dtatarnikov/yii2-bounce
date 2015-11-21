<?php
namespace strong2much\bounce\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%bounce_history}}".
 *
 * The followings are the available columns in table '{{%bounce_history}}':
 * @property integer $id
 * @property string $email - email
 * @property string $reason - bounce reason
 * @property string $status - bounce status
 * @property string $type - bounce type
 * @property bool $is_critical - is bounce critical
 * @property integer $time - unix time
 *
 * @author   Denis Tatarnikov <tatarnikovda@gmail.com>
 */
class BounceHistory extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public static function tableName()
	{
		return '{{%bounce_history}}';
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
            ['email', 'filter', 'filter'=>'strtolower'],
            ['reason', 'string', 'max'=>4000],
            [['status', 'type'], 'string', 'max'=>32],
            ['time', 'integer'],
            ['is_critical', 'boolean'],
		];
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return [
            'id' => 'ID',
            'email' => Yii::t('bounce', 'Email'),
			'time' => Yii::t('bounce', 'Time'),
			'reason' => Yii::t('bounce', 'Reason'),
			'status' => Yii::t('bounce', 'Status'),
			'type' => Yii::t('bounce', 'Type'),
			'is_critical' => Yii::t('bounce', 'Is critical'),
		];
	}

    /**
     * @param string $email
     * @return ActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($email = null)
    {
        $query = $this->find();
        $query->filterWhere(['like', 'email', $email]);

        return new ActiveDataProvider([
            'query'=>$query,
            'pagination'=>false,
        ]);
    }
}
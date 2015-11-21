<?php
namespace strong2much\bounce\models\search;

use Yii;
use yii\data\ActiveDataProvider;
use strong2much\bounce\models\Bounce;

/**
 * BounceSearch represents the model behind the search form about `strong2much\bounce\models\Bounce`.
 *
 * @author   Denis Tatarnikov <tatarnikovda@gmail.com>
 */
class BounceSearch extends Bounce
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'safe'],
        ];
    }

    /**
     * Creates data provider instance with search query applied
     * @param array $params
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Bounce::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => '[[time]] DESC',
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
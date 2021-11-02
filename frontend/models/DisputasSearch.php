<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Disputas;

/**
 * DisputasSearch represents the model behind the search form of `frontend\models\Disputas`.
 */
class DisputasSearch extends Disputas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDDisputa', 'IDPagamento'], 'integer'],
            [['descricao', 'resolvido'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Disputas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'IDDisputa' => $this->IDDisputa,
            'IDPagamento' => $this->IDPagamento,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'resolvido', $this->resolvido]);

        return $dataProvider;
    }
}

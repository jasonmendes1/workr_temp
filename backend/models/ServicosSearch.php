<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Servicos;

/**
 * ServicosSearch represents the model behind the search form of `backend\models\Servicos`.
 */
class ServicosSearch extends Servicos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDServico', 'IDPrestador'], 'integer'],
            [['requerimento', 'dataInicio', 'dataFim'], 'safe'],
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
        $query = Servicos::find();

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
            'IDServico' => $this->IDServico,
            'dataInicio' => $this->dataInicio,
            'dataFim' => $this->dataFim,
            'IDPrestador' => $this->IDPrestador,
        ]);

        $query->andFilterWhere(['like', 'requerimento', $this->requerimento]);

        return $dataProvider;
    }
}

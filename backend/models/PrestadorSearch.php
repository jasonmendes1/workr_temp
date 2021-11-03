<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Prestador;

/**
 * PrestadorSearch represents the model behind the search form of `backend\models\Prestador`.
 */
class PrestadorSearch extends Prestador
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDPrestador', 'datanascimento', 'nif', 'num_tele', 'IDUser'], 'integer'],
            [['nome', 'sexo', 'avatar'], 'safe'],
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
        $query = Prestador::find();

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
            'IDPrestador' => $this->IDPrestador,
            'datanascimento' => $this->datanascimento,
            'nif' => $this->nif,
            'num_tele' => $this->num_tele,
            'IDUser' => $this->IDUser,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'avatar', $this->avatar]);

        return $dataProvider;
    }
}

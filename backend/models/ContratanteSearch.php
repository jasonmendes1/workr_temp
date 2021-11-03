<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Contratante;

/**
 * ContratanteSearch represents the model behind the search form of `backend\models\Contratante`.
 */
class ContratanteSearch extends Contratante
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDContratante', 'datanascimento', 'IDUser', 'IDCargo', 'IDEmpresa'], 'integer'],
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
        $query = Contratante::find();

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
            'IDContratante' => $this->IDContratante,
            'datanascimento' => $this->datanascimento,
            'IDUser' => $this->IDUser,
            'IDCargo' => $this->IDCargo,
            'IDEmpresa' => $this->IDEmpresa,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'avatar', $this->avatar]);

        return $dataProvider;
    }
}

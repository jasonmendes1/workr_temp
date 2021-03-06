<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Pagamento;

/**
 * PagamentoSearch represents the model behind the search form of `frontend\models\Pagamento`.
 */
class PagamentoSearch extends Pagamento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IDPagamento', 'valor', 'taxa', 'IDTipoPagamento', 'IDContrante', 'IDPrestador'], 'integer'],
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
        $query = Pagamento::find();

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
            'IDPagamento' => $this->IDPagamento,
            'valor' => $this->valor,
            'taxa' => $this->taxa,
            'IDTipoPagamento' => $this->IDTipoPagamento,
            'IDContrante' => $this->IDContrante,
            'IDPrestador' => $this->IDPrestador,
        ]);

        return $dataProvider;
    }
}

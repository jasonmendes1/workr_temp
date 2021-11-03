<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipopagamento".
 *
 * @property int $IDTipoPagamento
 * @property string $tipoPagamento
 *
 * @property Pagamento[] $pagamentos
 */
class TipoPagamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipopagamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipoPagamento'], 'required'],
            [['tipoPagamento'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDTipoPagamento' => 'Id Tipo Pagamento',
            'tipoPagamento' => 'Tipo Pagamento',
        ];
    }

    /**
     * Gets query for [[Pagamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPagamentos()
    {
        return $this->hasMany(Pagamento::className(), ['IDTipoPagamento' => 'IDTipoPagamento']);
    }
}

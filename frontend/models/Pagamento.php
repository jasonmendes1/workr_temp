<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pagamento".
 *
 * @property int $IDPagamento
 * @property int $valor
 * @property int $taxa
 * @property int $IDTipoPagamento
 * @property int $IDContrante
 * @property int $IDPrestador
 *
 * @property Disputas[] $disputas
 * @property Contratante $iDContrante
 * @property Prestador $iDPrestador
 * @property Tipopagamento $iDTipoPagamento
 */
class Pagamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['valor', 'taxa', 'IDTipoPagamento', 'IDContrante', 'IDPrestador'], 'required'],
            [['valor', 'taxa', 'IDTipoPagamento', 'IDContrante', 'IDPrestador'], 'integer'],
            [['IDTipoPagamento'], 'exist', 'skipOnError' => true, 'targetClass' => Tipopagamento::className(), 'targetAttribute' => ['IDTipoPagamento' => 'IDTipoPagamento']],
            [['IDPrestador'], 'exist', 'skipOnError' => true, 'targetClass' => Prestador::className(), 'targetAttribute' => ['IDPrestador' => 'IDPrestador']],
            [['IDContrante'], 'exist', 'skipOnError' => true, 'targetClass' => Contratante::className(), 'targetAttribute' => ['IDContrante' => 'IDContratante']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDPagamento' => 'Id Pagamento',
            'valor' => 'Valor',
            'taxa' => 'Taxa',
            'IDTipoPagamento' => 'Id Tipo Pagamento',
            'IDContrante' => 'Id Contrante',
            'IDPrestador' => 'Id Prestador',
        ];
    }

    /**
     * Gets query for [[Disputas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDisputas()
    {
        return $this->hasMany(Disputas::className(), ['IDPagamento' => 'IDPagamento']);
    }

    /**
     * Gets query for [[IDContrante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDContrante()
    {
        return $this->hasOne(Contratante::className(), ['IDContratante' => 'IDContrante']);
    }

    /**
     * Gets query for [[IDPrestador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDPrestador()
    {
        return $this->hasOne(Prestador::className(), ['IDPrestador' => 'IDPrestador']);
    }

    /**
     * Gets query for [[IDTipoPagamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDTipoPagamento()
    {
        return $this->hasOne(Tipopagamento::className(), ['IDTipoPagamento' => 'IDTipoPagamento']);
    }
}

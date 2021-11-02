<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "servicos".
 *
 * @property int $IDServico
 * @property string $requerimento
 * @property string $dataInicio
 * @property string $dataFim
 * @property int $IDPrestador
 *
 * @property Prestador $iDPrestador
 */
class Servicos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'servicos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['requerimento', 'dataInicio', 'dataFim', 'IDPrestador'], 'required'],
            [['dataInicio', 'dataFim'], 'safe'],
            [['IDPrestador'], 'integer'],
            [['requerimento'], 'string', 'max' => 255],
            [['IDPrestador'], 'exist', 'skipOnError' => true, 'targetClass' => Prestador::className(), 'targetAttribute' => ['IDPrestador' => 'IDPrestador']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDServico' => 'Id Servico',
            'requerimento' => 'Requerimento',
            'dataInicio' => 'Data Inicio',
            'dataFim' => 'Data Fim',
            'IDPrestador' => 'Id Prestador',
        ];
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
}

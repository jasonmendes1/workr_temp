<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "disputas".
 *
 * @property int $IDDisputa
 * @property string $descricao
 * @property string $resolvido
 * @property int $IDPagamento
 *
 * @property Pagamento $iDPagamento
 */
class Disputas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disputas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'resolvido', 'IDPagamento'], 'required'],
            [['resolvido'], 'string'],
            [['IDPagamento'], 'integer'],
            [['descricao'], 'string', 'max' => 255],
            [['IDPagamento'], 'exist', 'skipOnError' => true, 'targetClass' => Pagamento::className(), 'targetAttribute' => ['IDPagamento' => 'IDPagamento']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDDisputa' => 'Id Disputa',
            'descricao' => 'Descricao',
            'resolvido' => 'Resolvido',
            'IDPagamento' => 'Id Pagamento',
        ];
    }

    /**
     * Gets query for [[IDPagamento]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDPagamento()
    {
        return $this->hasOne(Pagamento::className(), ['IDPagamento' => 'IDPagamento']);
    }
}

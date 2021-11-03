<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $IDEmpresa
 * @property int $nome
 * @property int $IDContratante
 *
 * @property Contratante[] $contratantes
 * @property Contratante $iDContratante
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'IDContratante'], 'required'],
            [['nome', 'IDContratante'], 'integer'],
            [['IDContratante'], 'exist', 'skipOnError' => true, 'targetClass' => Contratante::className(), 'targetAttribute' => ['IDContratante' => 'IDContratante']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDEmpresa' => 'Id Empresa',
            'nome' => 'Nome',
            'IDContratante' => 'Id Contratante',
        ];
    }

    /**
     * Gets query for [[Contratantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContratantes()
    {
        return $this->hasMany(Contratante::className(), ['IDEmpresa' => 'IDEmpresa']);
    }

    /**
     * Gets query for [[IDContratante]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDContratante()
    {
        return $this->hasOne(Contratante::className(), ['IDContratante' => 'IDContratante']);
    }
}

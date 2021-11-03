<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "prestador".
 *
 * @property int $IDPrestador
 * @property string $nome
 * @property string $sexo
 * @property string|null $avatar
 * @property int $datanascimento
 * @property int $nif
 * @property int $num_tele
 * @property int $IDUser
 *
 * @property User $iDUser
 * @property Pagamento[] $pagamentos
 * @property Servicos[] $servicos
 */
class Prestador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prestador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'sexo', 'datanascimento', 'nif', 'num_tele', 'IDUser'], 'required'],
            [['sexo'], 'string'],
            [['datanascimento', 'nif', 'num_tele', 'IDUser'], 'integer'],
            [['nome', 'avatar'], 'string', 'max' => 255],
            [['IDUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IDUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDPrestador' => 'Id Prestador',
            'nome' => 'Nome',
            'sexo' => 'Sexo',
            'avatar' => 'Avatar',
            'datanascimento' => 'Datanascimento',
            'nif' => 'Nif',
            'num_tele' => 'Num Tele',
            'IDUser' => 'Id User',
        ];
    }

    /**
     * Gets query for [[IDUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDUser()
    {
        return $this->hasOne(User::className(), ['id' => 'IDUser']);
    }

    /**
     * Gets query for [[Pagamentos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPagamentos()
    {
        return $this->hasMany(Pagamento::className(), ['IDPrestador' => 'IDPrestador']);
    }

    /**
     * Gets query for [[Servicos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServicos()
    {
        return $this->hasMany(Servicos::className(), ['IDPrestador' => 'IDPrestador']);
    }
}

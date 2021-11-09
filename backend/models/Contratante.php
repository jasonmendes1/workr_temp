<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contratante".
 *
 * @property int $IDContratante
 * @property string $nome
 * @property string $sexo
 * @property string|null $avatar
 * @property string $datanascimento
 * @property int $IDUser
 * @property int $IDCargo
 * @property int $IDEmpresa
 *
 * @property Empresa[] $empresas
 * @property Cargo $iDCargo
 * @property Empresa $iDEmpresa
 * @property User $iDUser
 * @property Pagamento[] $pagamentos
 */
class Contratante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contratante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'sexo', 'datanascimento', 'IDUser', 'IDCargo', 'IDEmpresa'], 'required'],
            [['IDUser', 'IDCargo', 'IDEmpresa'], 'integer'],
            [['nome', 'sexo', 'avatar'], 'string', 'max' => 255],
            [['datanascimento'], 'string', 'max' => 11],
            [['IDCargo'], 'exist', 'skipOnError' => true, 'targetClass' => Cargo::className(), 'targetAttribute' => ['IDCargo' => 'IDCargo']],
            [['IDEmpresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['IDEmpresa' => 'IDEmpresa']],
            [['IDUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IDUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDContratante' => 'Id Contratante',
            'nome' => 'Nome',
            'sexo' => 'Sexo',
            'avatar' => 'Avatar',
            'datanascimento' => 'Datanascimento',
            'IDUser' => 'Id User',
            'IDCargo' => 'Id Cargo',
            'IDEmpresa' => 'Id Empresa',
        ];
    }

    /**
     * Gets query for [[Empresas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresas()
    {
        return $this->hasMany(Empresa::className(), ['IDContratante' => 'IDContratante']);
    }

    /**
     * Gets query for [[IDCargo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDCargo()
    {
        return $this->hasOne(Cargo::className(), ['IDCargo' => 'IDCargo']);
    }

    /**
     * Gets query for [[IDEmpresa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['IDEmpresa' => 'IDEmpresa']);
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
        return $this->hasMany(Pagamento::className(), ['IDContrante' => 'IDContratante']);
    }
}

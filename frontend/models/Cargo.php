<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cargo".
 *
 * @property int $IDCargo
 * @property string $cargo
 *
 * @property Contratante[] $contratantes
 */
class Cargo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cargo'], 'required'],
            [['cargo'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDCargo' => 'Id Cargo',
            'cargo' => 'Cargo',
        ];
    }

    /**
     * Gets query for [[Contratantes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContratantes()
    {
        return $this->hasMany(Contratante::className(), ['IDCargo' => 'IDCargo']);
    }
}

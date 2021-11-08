<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupFormContratante extends Model
{
    public $username;
    public $email;
    public $password;
    public $nome;
    public $sexo;
    public $avatar;
    public $datanascimento;
    public $IDCargo;
    public $IDEmpresa;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],


            [['IDUser', 'nome', 'sexo', 'datanascimento', 'IDCargo', 'IDEmpresa'], 'required'],
            [['IDUser', 'IDCargo', 'IDEmpresa'], 'integer'],
            [['datanascimento'], 'safe'],
            [['nome', 'sexo', 'avatar'], 'string', 'max' => 255],
            [['IDUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['IDUser' => 'id']],

        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup($getAvatar)
    {
        $avatardefaultdir = '/workr_temp/frontend/web/avatar';

        $user = new User();
        $contratante = new Contratante();

        $user->username = $this->username;
        $user->email = $this->email;

        $contratante->nome = $this->nome;
        $contratante->sexo = $this->sexo;
        $contratante->datanascimento = $this->datanascimento;
        $contratante->IDCargo = $this->IDCargo;
        $contratante->IDEmpresa = $this->IDEmpresa;

        if($getAvatar == null){
            $contratante->avatar = '/workr_temp/frontend/web/avatar/default-avatar.png';
        }else{
            $contratante->avatar = $avatardefaultdir . "/" . $getAvatar;
        }

        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = 10;

        $user->save();
        $contratante->IDUser = $user->id;

        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('prestador');
        $auth->assign($authorRole, $user->getId());
        
        /*
        if (!$this->validate()) {
            return null;
        }
        */

        return $contratante->save();
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}

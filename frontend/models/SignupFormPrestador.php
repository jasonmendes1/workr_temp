<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
use frontend\models\Prestador;

/**
 * Signup form
 */
class SignupFormPrestador extends Model
{
    public $username;
    public $email;
    public $password;
    public $nome;
    public $sexo;
    public $avatar;
    public $datanascimento;
    public $nif;
    public $num_tele;


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

            [['IDUser', 'nome', 'sexo', 'datanascimento', 'nif', 'num_tele'], 'required'],
            [['IDUser', 'nif', 'num_tele'], 'integer'],
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
        $prestador = new Prestador();

        $user->username = $this->username;
        $user->email = $this->email;

        $prestador->nome = $this->nome;
        $prestador->sexo = $this->sexo;
        $prestador->datanascimento = $this->datanascimento;
        $prestador->nif = $this->nif;
        $prestador->num_tele = $this->num_tele;

        if($getAvatar == null){
            $prestador->avatar = '/workr_temp/frontend/web/avatar/default-avatar.png';
        }else{
            $prestador->avatar = $avatardefaultdir . "/" . $getAvatar;
        }


        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->status = 10;


        $user->save();
        $prestador->IDUser = $user->id;

        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('prestador');
        $auth->assign($authorRole, $user->getId());
        
        /*
        if (!$this->validate()) {
            return null;
        }
        */

        return $prestador->save();
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

<?php

namespace app\models;

use borales\extensions\phoneInput\PhoneInputValidator;
use Yii;
use yii\validators\CpfValidator;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%usuarioscadastro}}".
 *
 * @property int $Id
 * @property string $Usuario
 * @property string $Senha
 * @property string $Nome
 * @property string $CPF
 * @property string $Email
 * @property string|null $Telefone
 * @property string|null $Foto
 * @property string|null $Data_de_Nascimento
 * @property int $Ativo
 * @property string|null $CEP
 * @property string|null $Endereco
 * @property string|null $Complemento
 * @property string|null $Bairro
 * @property string|null $Cidade
 * @property string|null $Estado
 */
class Usuarios extends \yii\db\ActiveRecord implements IdentityInterface
{
    public $FotoUsuario;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%usuarioscadastro}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Usuario', 'Senha', 'CPF', 'Email', 'Ativo','Nome'], 'required'],
            [['Ativo'], 'integer'],
            [['Usuario', 'Foto', 'Nome', 'Email', 'Bairro', 'Cidade'], 'string', 'max' => 60],
            [['Senha'], 'string', 'max' => 45],
            [['CPF'], 'string', 'max' => 14],
            [['Telefone'], 'string', 'max' => 19],
            ['Data_de_Nascimento', 'date', 'format' => 'php:d/m/yy'],
            ['Telefone', PhoneInputValidator::class],
            [['CEP'], 'string', 'max' => 9],
            [['Endereco', 'Complemento'], 'string', 'max' => 100],
            [['Estado'], 'string', 'max' => 2],
            [['Usuario'], 'unique'],
            [['Senha'], 'unique'],
            [['CPF'], 'unique'],
            [['Email'], 'unique'],
            [['Telefone'], 'unique'],
            ['FotoUsuario','file','extensions' =>'jpg, png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => Yii::t('app', 'ID'),
            'Usuario' => Yii::t('app', 'Usuario'),
            'Senha' => Yii::t('app', 'Senha'),
            'Nome' => Yii::t('app', 'Nome'),
            'CPF' => Yii::t('app', 'Cpf'),
            'Email' => Yii::t('app', 'Email'),
            'Telefone' => Yii::t('app', 'Telefone'),
            'Foto' => Yii::t('app', 'Foto do Usuario'),
            'Data_de_Nascimento' => Yii::t('app', 'Data De Nascimento'),
            'Ativo' => Yii::t('app', 'Ativo'),
            'CEP' => Yii::t('app', 'Cep'),
            'Endereco' => Yii::t('app', 'Endereco'),
            'Complemento' => Yii::t('app', 'Complemento'),
            'Bairro' => Yii::t('app', 'Bairro'),
            'Cidade' => Yii::t('app', 'Cidade'),
            'Estado' => Yii::t('app', 'Estado'),
            'FotoUsuario' => Yii::t('app', 'Foto do Usuarios'),
        ];
    }

    public static function findIdentity($Id)
    {
        return static::findOne($Id);
    }

    public function getId()
    {
        return $this->Id;
    }

    public function validatePassword($Senha)
    {
        return $this->Senha === $Senha;
    }

    public static function findByUsername($Usuario){
        return self::findOne(['Usuarios'=>$Usuario]);
    }

    public static function findByEmail($Email){
        return self::findOne(['Email'=>$Email]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}

<?php

namespace common\models;

use Baha2Odeh\EasyFileUpload\EasyFileUploadBehavior;
use borales\extensions\phoneInput\PhoneInputBehavior;
use borales\extensions\phoneInput\PhoneInputValidator;
use codeonyii\yii2validators\AtLeastValidator;
use common\behaviors\SluggableBehavior;
use common\components\FileUploadHelper;
use common\components\Helper;
use Yii;
use yii\helpers\ArrayHelper;
use yii\validators\EmailValidator;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property int $user_type_id
 * @property string $slug
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $dob
 * @property string $phone_number
 * @property string $email
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $access_token
 * @property int $country_id
 * @property int $city_id
 * @property int $status
 * @property int $media_id
 * @property string $created_at
 * @property int $created_by
 * @property string $updated_at
 * @property int $updated_by
 * @property int $is_deleted
 * @property string $deleted_at
 * @property int $deleted_by
 * @property string $ip_address
 * @property string $user_agent
 * @property-read string $username
 * @property-read string $avatar
 *
 * @property UserType $userType
 * @property City $city
 * @property Country $country
 * @property Media $media
 * @property Article[] $articles
 * @property Auth[] $auths
 */
class User extends ActiveRecord implements IdentityInterface
{


    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    const GENDER_FEMALE = 'female';
    const GENDER_MALE = 'male';


    public $phone_country_code;

    public $password;
    public $confirm_password;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }


    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            [
                'class' => PhoneInputBehavior::className(),
                'countryCodeAttribute' => 'phone_country_code',
                'phoneAttribute' => 'phone_number',
            ],
            'slug' => [
                'class' => SluggableBehavior::className(),
                'attribute' => ['first_name', 'last_name'],
                'slugAttribute' => 'slug',
                'ensureUnique' => true,
                // 'skipOnEmpty' => true
            ],
            [
                'class' => EasyFileUploadBehavior::className(),
                'relations' => [
                    'image' => 'media',
                ],
                'uploadCallBack' => function ($relationName, UploadedFile $uploadedFile) {
                    return FileUploadHelper::upload($uploadedFile);
                },
            ],

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_type_id', 'country_id', 'city_id', 'is_active', 'media_id'], 'integer'],
            [['user_type_id', 'first_name', 'last_name', 'gender'], 'required'],
            [['first_name', 'last_name', 'phone_number', 'email', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['dob'], 'compare', 'type' => 'date', 'compareValue' => date('Y-m-d'), 'operator' => '<='],
            [['dob'], 'date', 'format' => 'php:Y-m-d'],
            [['access_token'], 'string', 'max' => 80],
            [['phone_number'], PhoneInputValidator::className()],
            [['phone_number'], 'unique'],
            [['email'], 'unique'],
            [['email', 'phone_number'], AtLeastValidator::className(), 'in' => ['email', 'phone_number']],


            [['password_reset_token'], 'unique'],
            [['access_token'], 'unique'],

            [['gender'], 'string'],
            ['gender', 'in', 'range' => [self::GENDER_MALE, self::GENDER_FEMALE]],


            ['is_active', 'default', 'value' => self::STATUS_ACTIVE],
            ['is_active', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],
            ['email', 'email'],

            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
            [['media_id'], 'exist', 'skipOnError' => true, 'targetClass' => Media::className(), 'targetAttribute' => ['media_id' => 'id']],

            [['user_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['user_type_id' => 'id']],


            [['password', 'confirm_password'], 'required', 'on' => 'create'],
            [['password', 'confirm_password'], 'string', 'min' => 6],
            [['confirm_password'], 'required', 'when' => function ($model) {
                return !empty($model->password);
            }, 'whenClient' => "function (attribute, value){
                return $('#user-password').val() != '';
            }"],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'operator' => '=='],
            [['email', 'phone_number'], 'default', 'value' => null],


            [['image'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg,png,gif,mp4,wav', 'maxSize' => 1024 * 1024 * 10, 'tooBig' => Yii::t('app', 'Max Size Is 10MB')],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_type_id' => Yii::t('app', 'User Type ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'gender' => Yii::t('app', 'Gender'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'email' => Yii::t('app', 'Email'),
            'dob' => Yii::t('app', 'Date Of Birth'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'access_token' => Yii::t('app', 'Access Token'),
            'country_id' => Yii::t('app', 'Country ID'),
            'city_id' => Yii::t('app', 'City ID'),
            'is_active' => Yii::t('app', 'Is Active'),
            'media_id' => Yii::t('app', 'Media ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'is_deleted' => Yii::t('app', 'Is Deleted'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
            'deleted_by' => Yii::t('app', 'Deleted By'),
            'ip_address' => Yii::t('app', 'Ip Address'),
            'user_agent' => Yii::t('app', 'User Agent'),
            'password' => Yii::t('app', 'Password'),
            'confirm_password' => Yii::t('app', 'Confirm Password'),
            'image' => Yii::t('app', 'Image'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['id' => 'user_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedia()
    {
        return $this->hasOne(Media::className(), ['id' => 'media_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuths()
    {
        return $this->hasMany(Auth::className(), ['user_id' => 'id']);
    }


    public function getAvatar($size = ImagePreset::TYPE_THUMB)
    {
        if (!empty($this->media)) {
            return $this->media->getThumb($size);
        }

        $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?s=500";
        return $grav_url;
    }



    ############ IdentityInterface   ############

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'is_active' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token, 'is_active' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by email
     *
     * @param string $email
     * @param null $user_type_id
     * @return static|null
     */
    public static function findByEmail($email, $user_type_id = null)
    {
        $emailValidator = new EmailValidator();
        if (!$emailValidator->validate($email)) {
            return null;
        }
        return static::find()
            ->andWhere([
                'email' => $email,
                'is_active' => self::STATUS_ACTIVE,
            ])->andFilterWhere(['user_type_id' => $user_type_id])
            ->one();
    }

    /**
     * Finds user by email
     *
     * @param $phone_number
     * @param null $user_type_id
     * @return static|null
     */
    public static function findByPhoneNumber($phone_number, $user_type_id = null)
    {
        $formatedPhoneNumber = Helper::formatMobileNumber($phone_number);
        if (empty($formatedPhoneNumber)) {
            return null;
        }
        return static::find()
            ->andWhere([
                'phone_number' => $formatedPhoneNumber,
                'is_active' => self::STATUS_ACTIVE,
            ])->andFilterWhere(['user_type_id' => $user_type_id])
            ->one();
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'is_active' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return sha1($password) == $this->password_hash;
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = sha1($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }


    ############ END IdentityInterface   ############

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (empty($this->auth_key)) {
                $this->generateAuthKey();
            }

            if (!empty($this->password) && !empty($this->confirm_password) && $this->password == $this->confirm_password) {
                $this->setPassword($this->password);
            }

            return true;
        }
        return false;
    }

    public function getUsername()
    {
        return implode(' ', [$this->first_name, $this->last_name]);
    }

}

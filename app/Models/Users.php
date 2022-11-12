<?php


namespace App\Models;


class Users extends BaseModel
{
    protected $table = 'users';
    protected $hidden = [
        'password'
    ];

    //column
    const EMAIL = 'email';
    const PHONE = 'phone';
    const PASSWORD = 'password';
    const FULL_NAME = 'full_name';
    const STATUS = 'status';
    const TYPE = 'type';
    const CHANNELS = 'channels';
    const AVATAR = 'avatar';
    const OTP = 'otp';
    const TIME_OTP = 'time_otp';
    const REVIEWS = 'reviews';
    const TOKEN_WEB = 'token_web';
    const TOKEN_APP = 'token_app';
    const CARD_BACK = 'card_back';
    const FRONT_FACING_CARD = 'front_facing_card';
    const IDENTITY = 'identity';
    const SOURCE = 'source';
    const DATA_SOURCE = 'data_source';
    const REFERRAL_CODE = 'referral_code';
    const IS_ADMIN = 'is_admin';
    const JOB = 'job';
    const TAX_CODE = 'tax_code';
    const CITY = 'city';
    const DISTRICT = 'district';
    const WARD = 'ward';
    const LAST_LOGIN = 'last_login';
    const BIRTHDAY = 'birthday';
    const GENDER = 'gender';
    const ACTIVE_AT = 'active_at';
    const ACCURACY = 'accuracy';
    const ID_FACEBOOK = 'id_facebook';
    const ID_GOOGLE = 'id_google';
    const PHOTO = "photo";
    const ADDRESS = "address";
    const DATE_IDENTITY = "date_identity";
    const ADDRESS_IDENTITY = "address_identity";
    const REFERRAL_ID = "referral_id";
    const REFERRAL_DATE = "referral_date";
    const BANK_NAME = "bank_name";
    const ACCOUNT_NAME = "account_name";
    const ACCOUNT_NUMBER = "account_number";

    // status
    const ACTIVE = 'active';
    const BLOCK = 'block';
    const NEW = 'new';

    // type user
    const EMPLOYEE = 1;
    const INVESTOR = 2;

    //gender
    const MALE = 'male';
    const FEMALE = 'female';

    //accuracy
    const NO_AUTH = 0;
    const AUTH = 1;
    const WARNING_AUTH = 2;
    const FAIL_AUTH = 3;

    //type login social
    const FACEBOOK = 'facebook';
    const GOOGLE = 'google';

    //is_admin
    const ADMIN = 1;

    public function bills()
    {
        return $this->hasMany(Bills::class, Bills::USER_ID);
    }
}

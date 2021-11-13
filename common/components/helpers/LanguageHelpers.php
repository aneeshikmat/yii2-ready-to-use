<?php
namespace common\components\helpers;

use Yii;

class LanguageHelpers {
  const ARABIC_ISO = 'ar';
  CONST LTR_DIRECTIONS = "ltr";
  CONST RTL_DIRECTIONS = "rtl";

  public static function getLanguages(): array
  {
    return [
        "ar" => Yii::t('app', "Arabic"),
        "en" => Yii::t('app', "English"),
    ];
  }

  public static function getLanguagesIso(): array
  {
    return array_keys(self::getLanguages());
  }

  public static function getCurrentLanguageDirection(): string
  {
    if(Yii::$app->language === self::ARABIC_ISO){
      return self::RTL_DIRECTIONS;
    }

    return self::LTR_DIRECTIONS;
  }
}
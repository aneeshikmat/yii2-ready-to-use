<?php
namespace common\widgets;

use cetver\LanguageSelector\items\DropDownLanguageItem;
use common\components\helpers\LanguageHelpers;
use yii\base\Widget;
use yii\bootstrap4\Nav;


class LanguageSwitcher extends Widget
{
  const LANGUAGE_SWITCHER_DROPDOWN_TYPE = 1;
  const LANGUAGE_SWITCHER_ARRAY_TYPE = 2;

  public $type;
  public $languageItem;

  public function init()
  {
    parent::init();

    if($this->type === null){
      $this->type = self::LANGUAGE_SWITCHER_DROPDOWN_TYPE;
    }

    $items = new DropDownLanguageItem([
        'languages' => LanguageHelpers::getLanguages()
    ]);
    $this->languageItem = $items->toArray();
  }

  /**
   * {@inheritdoc}
   */
  public function run()
  {
    if($this->type === self::LANGUAGE_SWITCHER_ARRAY_TYPE){
      return $this->languageItem;
    }

    return $this->getDropdown();
  }

  private function getDropdown()
  {
    return Nav::widget([
        'items' => [
            [
                'label' => $this->languageItem['label'],
                'items' => $this->languageItem['items'],
            ],
        ],
        'options' => ['class' =>'nav navbar-nav'],
    ]);
  }
}

<?php

/* @var $this \yii\web\View */
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Yii::$app->homeUrl ?>" class="brand-link">
        <img src="<?= Yii::$app->user->identity->avatar ?>" alt="Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Yii2 Skeleton</span>
    </a>

    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= Yii::$app->user->identity->avatar ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity->first_name ?></a>
            </div>
        </div>

        <section class="mt-2">
          <?= \hail812\adminlte\widgets\Menu::widget(
              [
                  'items' => [

                    //['label' => Yii::t('app','Settings'), 'options' => ['class' => 'header']],

                      [
                          'label' => Yii::t('app', 'User Type'),
                          'visible' => Yii::$app->user->can('manageUserType'),
                          'icon' => 'users',
                          'url' => '#',
                          'items' => [
                              ['label' => Yii::t('app', 'User type list'), 'icon' => 'users', 'url' => ['/user-type/index']],
                              ['label' => Yii::t('app', 'Create User type'), 'icon' => 'plus', 'url' => ['/user-type/create']],
                          ]
                      ],

                      [
                          'label' => Yii::t('app', 'User'),
                          'visible' => Yii::$app->user->can('manageUser'),
                          'icon' => 'user',
                          'url' => '#',
                          'items' => [
                              ['label' => Yii::t('app', 'User list'), 'icon' => 'user', 'url' => ['/user/index']],
                              ['label' => Yii::t('app', 'Create User'), 'icon' => 'plus', 'url' => ['/user/create']],
                          ]
                      ],
                      [
                          'label' => Yii::t('app', 'Category'),
                          'visible' => Yii::$app->user->can('manageCategory'),
                          'icon' => 'tags',
                          'url' => '#',
                          'items' => [
                              ['label' => Yii::t('app', 'Category list'), 'icon' => 'tags', 'url' => ['/category/index']],
                              ['label' => Yii::t('app', 'Create Category'), 'icon' => 'plus', 'url' => ['/category/create']],
                          ]
                      ],
                      [
                          'label' => Yii::t('app', 'Article'),
                          'visible' => Yii::$app->user->can('manageArticle'),
                          'icon' => 'book',
                          'url' => '#',
                          'items' => [
                              ['label' => Yii::t('app', 'Article list'), 'icon' => 'book', 'url' => ['/article/index']],
                              ['label' => Yii::t('app', 'Create Article'), 'icon' => 'plus', 'url' => ['/article/create']],
                          ]
                      ],
                      [
                          'label' => Yii::t('app', 'Countries and Cities'),
                          'icon' => 'fa fa-flag-checkered',
                          'url' => '#',
                          'visible' => Yii::$app->user->can('manageCountryAndCity'),
                          'items' => [
                              [
                                  'label' => Yii::t('app', 'Countries'),
                                  'icon' => 'globe',
                                  'url' => '#',
                                  'items' => [
                                      ['label' => Yii::t('app', 'Countries list'), 'icon' => 'list', 'url' => ['/country/index']],
                                      ['label' => Yii::t('app', 'Create Country'), 'icon' => 'plus', 'url' => ['/country/create']],
                                  ]
                              ],
                              [
                                  'label' => Yii::t('app', 'Cities'),
                                  'icon' => 'globe',
                                  'url' => '#',
                                  'items' => [
                                      ['label' => Yii::t('app', 'Cites list'), 'icon' => 'list', 'url' => ['/city/index']],
                                      ['label' => Yii::t('app', 'Create City'), 'icon' => 'plus', 'url' => ['/city/create']],
                                  ]
                              ],

                          ]
                      ],

                      [
                          'label' => Yii::t('app', 'Translation'),
                          'visible' => Yii::$app->user->can('manageTranslation'),
                          'icon' => 'language',
                          'active' => Yii::$app->controller->id == 'translation',
                          'url' => ['/i18n']
                      ],
                      [
                          'label' => Yii::t('app', 'Permissions'),
                          'visible' => Yii::$app->user->can('managePermissions'),
                          'icon' => 'fa fa-user-secret',
                          'url' => ['/permissions'],
                          'items' => [
                              ['label' => Yii::t('app', 'Assignment'), 'icon' => 'list', 'url' => ['/permissions/assignment'], 'active' => Yii::$app->controller->id == 'assignment'],
                              ['label' => Yii::t('app', 'Permission'), 'icon' => 'list', 'url' => ['/permissions/permission'], 'active' => Yii::$app->controller->id == 'permission'],
                              ['label' => Yii::t('app', 'Role'), 'icon' => 'list', 'url' => ['/permissions/role'], 'active' => Yii::$app->controller->id == 'role'],
                          ]
                      ],
                      [
                          'label' => Yii::t('app', 'Settings'),
                          'visible' => Yii::$app->user->can('manageSettings'),
                          'icon' => 'fa fa-wrench',
                          'items' => [
                              ['label' => Yii::t('app', 'Image Preset'), 'icon' => 'fa fa-file-image-o', 'url' => ['/image-preset/index'], 'active' => Yii::$app->controller->id == 'image-preset'],
//                            ['label' => Yii::t('app', 'Permissions'), 'icon' => 'shield', 'url' => ['/permissions']],
                          ]
                      ],

                    //['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    /* ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                     ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                     [
                         'label' => 'Some tools',
                         'icon' => 'share',
                         'url' => '#',
                         'items' => [
                             ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                             ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                             [
                                 'label' => 'Level One',
                                 'icon' => 'circle-o',
                                 'url' => '#',
                                 'items' => [
                                     ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                     [
                                         'label' => 'Level Two',
                                         'icon' => 'circle-o',
                                         'url' => '#',
                                         'items' => [
                                             ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                             ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                         ],
                                     ],
                                 ],
                             ],
                         ],
                     ],*/
                  ],
              ]
          ) ?>
        </section>
    </div>
</aside>

CKEditor - Configurator
==========

**Version 0.1.0**


What is CKEditor - Configurator?
-------------------

This module provides the ability to configurate the templates and styles that will be further availible in your CKEditor.
Out of the box, you don`t need to do this is the cktemplates.js and ckstyles.js !!!
(https://github.com/schmunk42/yii-ckeditor-configurator)


Quick-Start
-----------

### Step 1
If you have [composer already installed](http://getcomposer.org/doc/00-intro.md#installation-nix)
   
`composer.phar require schmunk42/ckeditor-configurator`

**or**

add the package `schmunk42/ckeditor-configurator` to your composer.json


*!!! You need to have already setup a database connection for the ckeditor-configurator migration !!!*

### Step 2  
[SETUP] edit in app/config/main.php

**REQUIRED**
```php
'modules' => array(
        'ckeditorConfigurator' => array(
            'class' => 'vendor.schmunk42.ckeditor-configurator.CkeditorConfiguratorModule',
            ),
        ),
```

```php
'params' => array(
     ...
     'ext.ckeditor.options' => array(
        ...
        'templates_files' => array($baseUrl . '/index.php?r=ckeditorConfigurator/default/cktemplates'),
        'stylesCombo_stylesSet' => 'my_styles:' . $baseUrl . '/index.php?r=ckeditorConfigurator/default/ckstyles',
        ...
      ),
),
```

OPTIONAL 
*(if you have  schmunk42/multi-theme installed, you can say in wich theme should the CKEditor-Configurator be displayed)*
```php
'themeManager' => array(
            'class' => 'vendor.schmunk42.multi-theme.EMultiThemeManager',
            'basePath' => $applicationDirectory . '/themes',
            'baseUrl' => $baseUrl . '/themes',
            'rules' => array(
                ...
                '^ckeditorConfigurator/(.*)' => 'backend2',
                ...
            )
        ),
```


Documentation
-------------

 * [The Definitive Guide to Phundament](https://github.com/phundament/app/wiki)

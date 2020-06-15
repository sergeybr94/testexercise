<?php

namespace Sprint\Migration;


class ModelTable20200615140046 extends Version
{
    protected $description = "";

    protected $moduleVersion = "3.15.1";

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $hlblockId = $helper->Hlblock()->saveHlblock(array (
  'NAME' => 'CarModel',
  'TABLE_NAME' => 'car_model',
  'LANG' => 
  array (
    'ru' => 
    array (
      'NAME' => 'Модель машины',
    ),
    'en' => 
    array (
      'NAME' => 'Car model',
    ),
  ),
));
        $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_BRAND',
  'USER_TYPE_ID' => 'hlblock',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'Y',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'Y',
  'SETTINGS' => 
  array (
    'DISPLAY' => 'CHECKBOX',
    'LIST_HEIGHT' => 5,
    'HLBLOCK_ID' => 'CarBrand',
    'HLFIELD_ID' => 'UF_NAME',
    'DEFAULT_VALUE' => 0,
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Brand',
    'ru' => 'Бренд',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Brand',
    'ru' => 'Бренд',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Brand',
    'ru' => 'Бренд',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
        $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_NAME',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'Y',
  'SHOW_FILTER' => 'N',
  'SHOW_IN_LIST' => 'Y',
  'EDIT_IN_LIST' => 'Y',
  'IS_SEARCHABLE' => 'Y',
  'SETTINGS' => 
  array (
    'SIZE' => 20,
    'ROWS' => 1,
    'REGEXP' => '',
    'MIN_LENGTH' => 0,
    'MAX_LENGTH' => 0,
    'DEFAULT_VALUE' => '',
  ),
  'EDIT_FORM_LABEL' => 
  array (
    'en' => 'Model\'s name',
    'ru' => 'Название модели',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Model\'s name',
    'ru' => 'Название модели',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Model\'s name',
    'ru' => 'Название модели',
  ),
  'ERROR_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
  'HELP_MESSAGE' => 
  array (
    'en' => '',
    'ru' => '',
  ),
));
    }

    public function down()
    {
        //your code ...
    }
}

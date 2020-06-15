<?php

namespace Sprint\Migration;


class BrandTable20200615140037 extends Version
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
  'NAME' => 'CarBrand',
  'TABLE_NAME' => 'car_brand',
  'LANG' => 
  array (
    'ru' => 
    array (
      'NAME' => 'Бренды',
    ),
    'en' => 
    array (
      'NAME' => 'Brands',
    ),
  ),
));
        $helper->Hlblock()->saveField($hlblockId, array (
  'FIELD_NAME' => 'UF_NAME',
  'USER_TYPE_ID' => 'string',
  'XML_ID' => '',
  'SORT' => '100',
  'MULTIPLE' => 'N',
  'MANDATORY' => 'Y',
  'SHOW_FILTER' => 'I',
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
    'en' => 'Brand\'s name',
    'ru' => 'Название бренда',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Brand\'s name',
    'ru' => 'Название бренда',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Brand\'s name',
    'ru' => 'Название бренда',
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

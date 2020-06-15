<?php

namespace Sprint\Migration;


class OptionsTable20200615140053 extends Version
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
  'NAME' => 'Options',
  'TABLE_NAME' => 'car_options',
  'LANG' => 
  array (
    'ru' => 
    array (
      'NAME' => 'Опции машины',
    ),
    'en' => 
    array (
      'NAME' => 'Car\'s options',
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
    'en' => 'Option\'s name',
    'ru' => 'Название опции',
  ),
  'LIST_COLUMN_LABEL' => 
  array (
    'en' => 'Option\'s name',
    'ru' => 'Название опции',
  ),
  'LIST_FILTER_LABEL' => 
  array (
    'en' => 'Option\'s name',
    'ru' => 'Название опции',
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

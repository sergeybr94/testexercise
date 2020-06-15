<?php
namespace SB\Cars\Model;

\Bitrix\Main\Loader::includeModule('highloadblock');

use Bitrix\Highloadblock as HL;
use Bitrix\Main\SystemException;


/**
 * Class Car
 * @package SB\Cars
 */
abstract class AbstractTable
{
    protected static $entityCode;
    protected static $entity;
    protected static $entityDataClass;


    /**
     * @return string
     */
    protected static function getEntityCode()
    {
        return static::$entityCode;
    }

    /**
     * Set entity
     */
    protected static function setEntity()
    {
        $hlblock = HL\HighloadBlockTable::getList([
            'filter' => [
                'TABLE_NAME' => static::getEntityCode()
            ]
        ])->fetch();
        try {
            static::$entity = HL\HighloadBlockTable::compileEntity($hlblock);
        } catch (SystemException $e) {
        }
    }

    /**
     * @return mixed
     */
    protected static function getEntity()
    {
        if(!static::$entity){
            static::setEntity();
        }
        return static::$entity;
    }

    /**
     * @return mixed
     */
    protected static function getDataClass()
    {
        if(!static::$entityDataClass){
            static::$entityDataClass = static::getEntity()->getDataClass();
        }
        return static::$entityDataClass;
    }

    /**
     * @param string[] $order
     * @param array $filter
     * @param string[] $select
     * @param int $limit
     * @return array
     */
    public static function getList($order = ['ID' => 'ASC'], $filter = [], $select = ['*'], $limit = 0){
        $entityDC = static::getDataClass();

        $resID = $entityDC::getList(array(
            'select' => $select,
            'filter' => $filter,
            'limit' => $limit,
            'order' => $order,
        ));
        $arItems = [];
        while ($arID = $resID->Fetch()) {
            $arItems[] = $arID;
        }

        return $arItems;
    }


    /**
     * @param $ID
     * @param $arFields
     * @return mixed
     */
    public static function update($ID, $arFields){
        $entityDC = static::getDataClass();
        return $entityDC::update($ID, $arFields);
    }

}
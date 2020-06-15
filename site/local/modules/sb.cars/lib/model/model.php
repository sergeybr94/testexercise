<?php
namespace SB\Cars\Model;


use Bitrix\Main\Entity;
use Bitrix\Main\ORM\Query;

/**
 * Class Car
 * @package SB\Cars
 */
class Model extends AbstractTable
{
    const brandPropCode = 'UF_BRAND';
    const namePropCode = 'UF_NAME';

    protected static $entityCode = 'car_model';
    protected static $entity;
    protected static $entityDataClass;

    /**
     * @param string[] $order
     * @param array $filter
     * @param string[] $select
     * @param int $limit
     * @return array
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\SystemException
     */
    public static function getList($order = ['ID' => 'ASC'], $filter = [], $select = ['*'], $limit = 0){
        $entityDC = self::getDataClass();

        $resID = $entityDC::getList(array(
            'select' => [
                '*',
                'BRAND_NAME' => 'BRAND.UF_NAME'
            ],
            'filter' => $filter,
            'limit' => $limit,
            'order' => $order,
            'runtime' => [
                'BRAND' => [
                    'data_type' => Brand::getDataClass(),
                    'reference' => [
                        '=this.UF_BRAND' => 'ref.ID',
                    ],
                    'join_type' => 'left'
                ],
            ],
        ));
        $arModels = [];
        while ($arID = $resID->Fetch()) {
            $arModels[] = $arID;
        }

        return $arModels;
    }



}
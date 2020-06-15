<?php

namespace SB\Cars\Model;

use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\ORM\Query\Join;

/**
 * Class Car
 * @package SB\Cars
 */
class Car extends AbstractTable
{
    const modelPropCode = 'UF_BRAND'; //Это момедль машины. Ошибся при заполнении
    const yearPropCode = 'UF_YEAR';
    const newPropCode = 'UF_NEW';
    const pricePropCode = 'UF_PRICE';
    const optionsPropCode = 'UF_OPTIONS';
    const mileagePropCode = 'UF_MILEAGE';

    protected static $entityCode = 'car';
    protected static $entity;
    protected static $entityDataClass;
    /**
     * @param string[] $order
     * @param array $filter
     * @param string[] $select
     * @param int $limit
     * @return array
     */
    public static function getList($order = ['ID' => 'ASC'], $filter = [], $select = ['*'], $limit = 0)
    {
        $entityDC = static::getDataClass();

        $select['MODEL_NAME'] = 'MODEL.UF_NAME';
        $select['BRAND_ID'] = 'MODEL.UF_BRAND';
        $select['BRAND_NAME'] = 'BRAND.UF_NAME';

        $resID = $entityDC::getList(array(
            'select' => $select,
            'filter' => $filter,
            'limit' => $limit,
            'order' => $order,
            'runtime' => [
                'MODEL' => [
                    'data_type' => Model::getDataClass(),
                    'reference' => [
                        '=this.UF_BRAND' => 'ref.ID',
                    ],
                    'join_type' => 'left'
                ],
                'BRAND' => [
                    'data_type' => Brand::getDataClass(),
                    'reference' => [
                        '=this.MODEL.UF_BRAND' => 'ref.ID',
                    ],
                    'join_type' => 'left'
                ],
            ],
        ));

        $arCars = [];
        while ($arID = $resID->Fetch()) {
            $arCars[] = $arID;
        }

        return $arCars;
    }
}
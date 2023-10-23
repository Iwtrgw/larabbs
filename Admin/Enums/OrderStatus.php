<?php


namespace App\Enums;


/**
 * 订单状态说明
 * Class PaymentType
 * @package App\Enums
 */
class OrderStatus extends Enums
{

    const USABLE  = 0;
    const DISABLE = 1;

    public static $translations = [
        self::USABLE  => '可用',
        self::DISABLE => '禁用',
    ];

    /**
     * 检查是否可用
     * @param $status
     * @return bool
     */
    public static function checkUsable($status): bool
    {
        return $status == OrderStatus::USABLE;
    }
}
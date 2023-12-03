<?php


namespace App\Enums;


/**
 * 订单状态说明
 * Class PaymentType
 * @package App\Enums
 */
class OrderStatus extends Enums
{

    /**
     *
     */
    const USABLE  = 0;

    /**
     *
     */
    const DISABLE = 1;

    /**
     * @var string[]
     */
    public static $translations = [
        self::USABLE  => '已支付',
        self::DISABLE => '未支付',
    ];

    /**
     * 订单支付状态
     * @param $status
     * @return bool
     */
    public static function checkUsable($status): bool
    {
        return $status == OrderStatus::USABLE;
    }
}
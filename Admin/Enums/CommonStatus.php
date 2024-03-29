<?php


namespace App\Enums;


/**
 * 通用状态说明
 * Class PaymentType
 * @package App\Enums
 */
class CommonStatus extends Enums
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
        return $status == CommonStatus::USABLE;
    }
}
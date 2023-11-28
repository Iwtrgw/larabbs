<?php


namespace App\Enums;


/**
 * 文件上传入口类型
 * Class PaymentType
 * @package App\Enums
 */
class FileUploadType extends Enums
{

    /**
     *
     */
    public const ID_CARD_PHOTO = 'ID_CARD_PHOTO';

    public const PLATFORM_PAYMENT_QRCODE = 'PLATFORM_PAYMENT_QRCODE';

    public const RECHARGE_VOUCHER = 'RECHARGE_VOUCHER';

    public static $translations = [
        self::ID_CARD_PHOTO           => '身份证照片',
        self::PLATFORM_PAYMENT_QRCODE => '平台支付方式二维码',
        self::RECHARGE_VOUCHER        => '充值凭证',
    ];

}
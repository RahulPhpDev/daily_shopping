<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrderStatusEnum extends Enum
{
    const status = [
        'Pending' => 0,
        'Approved' => 1,
        'Reject' => 2,
        'Dispatched' => 3,
        'Arrived' => 4
    ];

}

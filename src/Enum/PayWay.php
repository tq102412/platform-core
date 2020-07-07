<?php

namespace Ineplant\Enum;

class PayWay {

    const WECHAT = '61a88b34-6f09-11e9-91c2-8c85903c945c';

    const BALANCE = '61a8566e-6f09-11e9-ad33-8c85903c945c';

    const CASH = '1471e612-70a1-11e9-9355-9203d831425c';

    const SCORE = '73ab216c-ebcc-4f1e-bdc0-8c69001a2a19';

    const FACT = '412850f1-8af8-42f3-bf27-1e3e93f39b55';

    const DONATE = '3348f00e-c681-4207-b762-b6aef4335cd0';

    const VIRTUAL_ACCOUNT = [
        self::BALANCE,
        self::FACT,
        self::DONATE,
        self::SCORE,
    ];

}
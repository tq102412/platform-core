<?php

namespace Ineplant\Rules;

use Illuminate\Contracts\Validation\Rule;

class Tel implements Rule {
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value) {
        return 1 === preg_match('/^[0-9\-]{3,15}$/u', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return ':attribute只能是3~15位的数字或破折号-';
    }
}

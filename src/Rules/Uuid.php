<?php

namespace Ineplant\Rules;

use Illuminate\Contracts\Validation\Rule;

class Uuid implements Rule {
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value) {
        return '00000000-0000-0000-0000-000000000000' != $value &&
            preg_match(
                '/^[0-9A-F]{8}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{12}$/i',
                $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return 'The :attribute error format.';
    }
}

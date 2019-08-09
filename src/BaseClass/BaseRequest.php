<?php

namespace Ineplant\BaseClass;

use App\Services\CollectHandle;

abstract class BaseRequest extends \Ineplant\BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

    public function validated() {
        $rules = $this->container->call([$this, 'rules']);
        return CollectHandle::extractInputFromRules($this->all(), $rules);
    }
}

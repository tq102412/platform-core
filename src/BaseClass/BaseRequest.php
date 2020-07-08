<?php

namespace Ineplant\BaseClass;

use Ineplant\CollectHandle;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest {

    use RequestTrait;

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

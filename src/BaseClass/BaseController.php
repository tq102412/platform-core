<?php

namespace Ineplant\BaseClass;

use App\Exceptions\ValidationFailException;
use App\Services\CollectHandle;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 验证并根据验证规则获取请求参数
     *
     * @param Request $request
     * @param array $rules
     * @param array $messages
     * @param array $customAttributes
     * @return array|mixed
     * @throws ValidationFailException
     */
    public function getParamsByRules(
        Request $request,
        array $rules,
        array $messages = [],
        array $customAttributes = []
    ) {
        $validator = $this->getValidationFactory()
            ->make($request->all(), $rules, $messages, $customAttributes);

        if ($validator->fails()) {
            $errorMsg = $validator->errors()->first();
            throw new ValidationFailException($errorMsg, 10000);
        }

        return CollectHandle::extractInputFromRules($request->all(), $rules);
    }
}

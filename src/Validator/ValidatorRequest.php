<?php

namespace Ineplant\Validator;

use Ineplant\Exceptions\ErrCodeException;
use Ineplant\Exceptions\ValidationFailException;

trait ValidatorRequest {

    /**
     * 获取所有请求参数
     * TODO 根据框架不同可以重写该方法
     *
     * @return array
     */
    protected function getAllInput() {
        return $this->request->all();
    }

    /**
     * 自动获取请求参数并验证
     * 验证通过,根据验证规则返回请求数据

     * @param $validator
     * @param null $scene
     * @return mixed
     * @throws ErrCodeException
     * @throws ValidationFailException
     */
    public function validated($validatorClass, $scene = null) {
        $validator = $this->getValidator($validatorClass);
        if ($scene) {
            $validator->scene($scene);
        }

        $bool = $validator->check($this->getAllInput());
        if (!$bool) {
            throw new ValidationFailException($validator->getError());
        }

        return $validator->getDataByRule($this->getAllInput());
    }

    /**
     * @param string $validatorClass
     * @return BaseValidate
     */
    private function getValidator($validatorClass) {
        return new $validatorClass;
    }
}
<?php

namespace Ineplant\Services;

class FollowData {

    /**
     * @var array
     */
    protected $data;


    /**
     * @param $data
     */
    public function initByWechat($data) {
        $this->data = [
            'nickname'   => $data['nickname'] ?? '',
            'headimgurl' => $data['headimgurl'] ?? '',
            'city'       => $data['city'] ?? '',
            'country'    => $data['country'] ?? '',
            'gender'     => intval($data['sex'] ?? 0),
            'language'   => $data['language'] ?? '',
            'province'   => $data['province'] ?? '',
        ];
    }

    /**
     * @param $data
     */
    public function initByFollowData($data) {
        $this->data = [
            'nickname'   => $data['nickname'] ?? '',
            'headimgurl' => $data['avatar_url'] ?? '',
            'city'       => $data['city'] ?? '',
            'country'    => $data['country'] ?? '',
            'gender'     => intval($data['gender'] ?? 0),
            'language'   => $data['language'] ?? '',
            'province'   => $data['province'] ?? '',
        ];
    }


    /**
     * @return \Follow\FollowData
     */
    function getFollowData() {
        $followData = new \Follow\FollowData();

        $followData->setNickname($this->data['nickname']);
        $followData->setAvatarUrl($this->data['headimgurl']);
        $followData->setCity($this->data['city']);
        $followData->setCountry($this->data['country']);
        $followData->setGender($this->data['gender']);
        $followData->setLanguage($this->data['language']);
        $followData->setProvince($this->data['province']);

        return $followData;
    }


    /**
     * @return array
     */
    function toArray() {
        return $this->data;
    }


}
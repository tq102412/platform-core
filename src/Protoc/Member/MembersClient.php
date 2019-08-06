<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Member;

/**
 */
class MembersClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param \Member\GetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function Get(\Member\GetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/member.Members/Get',
        $argument,
        ['\Member\MembersResult', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Member\GetRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetMemberCards(\Member\GetRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/member.Members/GetMemberCards',
        $argument,
        ['\Member\MembersCards', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Member\GetByUnionIdRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetByUnionId(\Member\GetByUnionIdRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/member.Members/GetByUnionId',
        $argument,
        ['\Member\MemberInfo', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Member\GetByMemberUnionIds $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetListByUnionId(\Member\GetByMemberUnionIds $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/member.Members/GetListByUnionId',
        $argument,
        ['\Member\MembersResult', 'decode'],
        $metadata, $options);
    }

    /**
     * @param \Member\GetByFollowIdAndCompanyIdRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function getByFollowIdAndCompanyId(\Member\GetByFollowIdAndCompanyIdRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/member.Members/getByFollowIdAndCompanyId',
        $argument,
        ['\Member\MemberInfo', 'decode'],
        $metadata, $options);
    }

}

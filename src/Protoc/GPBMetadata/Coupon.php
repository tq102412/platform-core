<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: coupon.proto

namespace GPBMetadata;

class Coupon
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(hex2bin(
            "0a83100a0c636f75706f6e2e70726f746f120670726f746f63221e0a0d446973636f756e744d6f6e6579120d0a056d6f6e65791801200128052288010a14446973636f756e744d6f6e65795265717565737412130a0b636f75706f6e5f636f646518012001280912170a0f6d656d6265725f756e696f6e5f6964180220012809120d0a057573616765180320012805120d0a056d6f6e6579180420012805120f0a0773686f705f696418052001280912130a0b70726f647563745f6964731806200328092297010a10526563656976696e675265717565737412110a09636f75706f6e5f696418012001280912170a0f6d656d6265725f756e696f6e5f696418022001280912100a087175616e74697479180320012805120d0a056d6f6e657918042001280512130a0b61637469766974795f6964180520012809120e0a06736f7572636518062001280512110a09736f757263655f696418072001280922a1010a10436f6e73756d696e675265717565737412130a0b636f75706f6e5f636f646518012001280912170a0f6d656d6265725f756e696f6e5f6964180220012809120d0a057573616765180320012805120f0a0773686f705f696418042001280912170a0f637265617465645f757365725f696418052001280912110a0962696c6c5f636f646518062001280912130a0b70726f647563745f69647318072003280922240a0f47657442794964735265717565737412110a09636f75706f6e49647318012003280922280a114765744279436f6465735265717565737412130a0b636f75706f6e436f646573180120032809222a0a06436f75706f6e12110a09636f75706f6e5f6964180120012809120d0a057469746c6518022001280922450a0c4d656d626572436f75706f6e12110a09636f75706f6e5f6964180120012809120d0a057469746c6518022001280912130a0b636f75706f6e5f636f6465180320012809222a0a07436f75706f6e73121f0a07636f75706f6e7318012003280b320e2e70726f746f632e436f75706f6e223c0a0d4d656d626572436f75706f6e73122b0a0d6d656d626572436f75706f6e7318012003280b32142e70726f746f632e4d656d626572436f75706f6e22070a05456d70747922420a17476574436f756e7442794d656d62657252657175657374120e0a0673746174757318012001280512170a0f6d656d6265725f756e696f6e5f696418022001280922160a05436f756e74120d0a05636f756e7418012001280522cc020a13436f75706f6e43726561746552657175657374120c0a047479706518012001280512120a0a66726f6d5f6d6f6e657918022001280512100a08746f5f6d6f6e6579180320012805120d0a057469746c6518042001280912120a0a636f6d70616e795f696418052001280912170a0f637265617465645f757365725f696418062001280912130a0b61637469766974795f696418072001280912110a09746f74616c5f736b75180820012805120d0a056c696d697418092001280512160a0e6566666563746976655f74797065180a20012805121b0a136566666563746976655f66726f6d5f64617465180b2001280912190a116566666563746976655f746f5f64617465180c2001280912150a0d6566666563746976655f646179180d2001280512180a106566666563746976655f746f5f646179180e20012805120d0a057573616765180f2001280522390a0d43616e63656c5265717565737412140a0c636f75706f6e5f636f64657318012003280912120a0a636f6d70616e795f696418022001280922370a0e5265636f76657252657175657374120c0a04636f646518012001280912170a0f637265617465645f757365725f696418022001280922380a1343616e63656c536f7572636552657175657374120e0a06736f7572636518012001280512110a09736f757263655f696418022001280932ea040a06636f75706f6e12490a10476574446973636f756e744d6f6e6579121c2e70726f746f632e446973636f756e744d6f6e6579526571756573741a152e70726f746f632e446973636f756e744d6f6e6579220012360a09436f6e73756d696e6712182e70726f746f632e436f6e73756d696e67526571756573741a0d2e70726f746f632e456d707479220012360a09526563656976696e6712182e70726f746f632e526563656976696e67526571756573741a0d2e70726f746f632e456d707479220012360a08476574427949647312172e70726f746f632e4765744279496473526571756573741a0f2e70726f746f632e436f75706f6e73220012400a0a4765744279436f64657312192e70726f746f632e4765744279436f646573526571756573741a152e70726f746f632e4d656d626572436f75706f6e73220012440a10476574436f756e7442794d656d626572121f2e70726f746f632e476574436f756e7442794d656d626572526571756573741a0d2e70726f746f632e436f756e742200123d0a0c437265617465436f75706f6e121b2e70726f746f632e436f75706f6e437265617465526571756573741a0e2e70726f746f632e436f75706f6e220012300a0643616e63656c12152e70726f746f632e43616e63656c526571756573741a0d2e70726f746f632e456d707479220012320a075265636f76657212162e70726f746f632e5265636f766572526571756573741a0d2e70726f746f632e456d707479220012400a1043616e63656c4279536f757263654964121b2e70726f746f632e43616e63656c536f75726365526571756573741a0d2e70726f746f632e456d7074792200620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}


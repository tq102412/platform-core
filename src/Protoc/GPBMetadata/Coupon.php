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
            "0aba0d0a0c636f75706f6e2e70726f746f120670726f746f63221e0a0d44" .
            "6973636f756e744d6f6e6579120d0a056d6f6e657918012001280522730a" .
            "14446973636f756e744d6f6e65795265717565737412130a0b636f75706f" .
            "6e5f636f646518012001280912170a0f6d656d6265725f756e696f6e5f69" .
            "64180220012809120d0a057573616765180320012805120d0a056d6f6e65" .
            "79180420012805120f0a0773686f705f69641805200128092297010a1052" .
            "6563656976696e675265717565737412110a09636f75706f6e5f69641801" .
            "2001280912170a0f6d656d6265725f756e696f6e5f696418022001280912" .
            "100a087175616e74697479180320012805120d0a056d6f6e657918042001" .
            "280512130a0b61637469766974795f6964180520012809120e0a06736f75" .
            "72636518062001280512110a09736f757263655f69641807200128092279" .
            "0a10436f6e73756d696e675265717565737412130a0b636f75706f6e5f63" .
            "6f646518012001280912170a0f6d656d6265725f756e696f6e5f69641802" .
            "20012809120d0a057573616765180320012805120f0a0773686f705f6964" .
            "18042001280912170a0f637265617465645f757365725f69641805200128" .
            "0922240a0f47657442794964735265717565737412110a09636f75706f6e" .
            "496473180120032809222a0a06436f75706f6e12110a09636f75706f6e5f" .
            "6964180120012809120d0a057469746c65180220012809222a0a07436f75" .
            "706f6e73121f0a07636f75706f6e7318012003280b320e2e70726f746f63" .
            "2e436f75706f6e22070a05456d70747922420a17476574436f756e744279" .
            "4d656d62657252657175657374120e0a0673746174757318012001280512" .
            "170a0f6d656d6265725f756e696f6e5f696418022001280922160a05436f" .
            "756e74120d0a05636f756e7418012001280522cc020a13436f75706f6e43" .
            "726561746552657175657374120c0a047479706518012001280512120a0a" .
            "66726f6d5f6d6f6e657918022001280512100a08746f5f6d6f6e65791803" .
            "20012805120d0a057469746c6518042001280912120a0a636f6d70616e79" .
            "5f696418052001280912170a0f637265617465645f757365725f69641806" .
            "2001280912130a0b61637469766974795f696418072001280912110a0974" .
            "6f74616c5f736b75180820012805120d0a056c696d697418092001280512" .
            "160a0e6566666563746976655f74797065180a20012805121b0a13656666" .
            "6563746976655f66726f6d5f64617465180b2001280912190a1165666665" .
            "63746976655f746f5f64617465180c2001280912150a0d65666665637469" .
            "76655f646179180d2001280512180a106566666563746976655f746f5f64" .
            "6179180e20012805120d0a057573616765180f2001280522390a0d43616e" .
            "63656c5265717565737412140a0c636f75706f6e5f636f64657318012003" .
            "280912120a0a636f6d70616e795f6964180220012809221e0a0e5265636f" .
            "76657252657175657374120c0a04636f646518012001280922380a134361" .
            "6e63656c536f7572636552657175657374120e0a06736f75726365180120" .
            "01280512110a09736f757263655f696418022001280932a8040a06636f75" .
            "706f6e12490a10476574446973636f756e744d6f6e6579121c2e70726f74" .
            "6f632e446973636f756e744d6f6e6579526571756573741a152e70726f74" .
            "6f632e446973636f756e744d6f6e6579220012360a09436f6e73756d696e" .
            "6712182e70726f746f632e436f6e73756d696e67526571756573741a0d2e" .
            "70726f746f632e456d707479220012360a09526563656976696e6712182e" .
            "70726f746f632e526563656976696e67526571756573741a0d2e70726f74" .
            "6f632e456d707479220012360a08476574427949647312172e70726f746f" .
            "632e4765744279496473526571756573741a0f2e70726f746f632e436f75" .
            "706f6e73220012440a10476574436f756e7442794d656d626572121f2e70" .
            "726f746f632e476574436f756e7442794d656d626572526571756573741a" .
            "0d2e70726f746f632e436f756e742200123d0a0c437265617465436f7570" .
            "6f6e121b2e70726f746f632e436f75706f6e437265617465526571756573" .
            "741a0e2e70726f746f632e436f75706f6e220012300a0643616e63656c12" .
            "152e70726f746f632e43616e63656c526571756573741a0d2e70726f746f" .
            "632e456d707479220012320a075265636f76657212162e70726f746f632e" .
            "5265636f766572526571756573741a0d2e70726f746f632e456d70747922" .
            "0012400a1043616e63656c4279536f757263654964121b2e70726f746f63" .
            "2e43616e63656c536f75726365526571756573741a0d2e70726f746f632e" .
            "456d7074792200620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}


<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: account.proto

namespace GPBMetadata;

class Account
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        $pool->internalAddGeneratedFile(hex2bin(
            "0aeb120a0d6163636f756e742e70726f746f12076163636f756e7422b702" .
            "0a0d4368616e67655265717565737412120a0a6163636f756e745f696418" .
            "012001280912150a0d66697865645f62616c616e63651802200128051211" .
            "0a0962696c6c5f636f646518032001280912110a0962696c6c5f74797065" .
            "18042001280912170a0f637265617465645f757365725f69641805200128" .
            "0912170a0f637265617465645f73686f705f6964180620012809120e0a06" .
            "616374696f6e180720012809120d0a056d6f6e6579180820012805120f0a" .
            "07636f6d6d656e7418092001280912140a0c657870697265645f74696d65" .
            "180a20012803121e0a027861180b2001280b32122e6163636f756e742e58" .
            "615265717565737412140a0c6163636f756e745f74797065180c20012805" .
            "12130a0b6173736f63696174696f6e180d2001280912120a0a636f6d7061" .
            "6e795f6964180e2001280922390a0a47657452657175657374122b0a0c61" .
            "73736f63696174696f6e7318012003280b32152e6163636f756e742e4173" .
            "736f63696174696f6e7322390a0c4173736f63696174696f6e7312130a0b" .
            "6173736f63696174696f6e18012001280912140a0c6163636f756e745f74" .
            "797065180220012805226a0a0b4163636f756e74496e666f12120a0a6163" .
            "636f756e745f6964180120012809120f0a0762616c616e63651802200128" .
            "0512130a0b6173736f63696174696f6e180320012809120c0a0474797065" .
            "18052001280512130a0b6d61785f62616c616e636518062001280522370a" .
            "0d526573756c744163636f756e7412260a086163636f756e747318012003" .
            "280b32142e6163636f756e742e4163636f756e74496e666f22070a05456d" .
            "70747922d8010a0d43616e63656c5265717565737412110a0962696c6c5f" .
            "636f646518012001280912110a0962696c6c5f7479706518022001280912" .
            "180a106f726967696e5f62696c6c5f636f646518032001280912170a0f63" .
            "7265617465645f757365725f696418052001280912170a0f637265617465" .
            "645f73686f705f6964180620012809120e0a06616374696f6e1807200128" .
            "09120f0a07636f6d6d656e7418092001280912140a0c657870697265645f" .
            "74696d65180a20012803121e0a027861180b2001280b32122e6163636f75" .
            "6e742e586152657175657374221a0a09586152657175657374120d0a0578" .
            "615f6964180120012809226d0a0d43726561746552657175657374120f0a" .
            "0742616c616e636518012001280512120a0a4d617842616c616e63651802" .
            "2001280512140a0c466978656442616c616e6365180320012805120c0a04" .
            "5479706518042001280512130a0b4173736f63696174696f6e1805200128" .
            "09226d0a0e437265617465735265717565737412270a0763726561746573" .
            "18012003280b32162e6163636f756e742e43726561746552657175657374" .
            "121e0a02786118022001280b32122e6163636f756e742e58615265717565" .
            "737412120a0a636f6d70616e795f6964180320012809226f0a0f47657454" .
            "6f74616c5265717565737412130a0b6173736f63696174696f6e18012001" .
            "2809120c0a047479706518022003280512110a0966726f6d5f6461746518" .
            "0320012809120f0a07746f5f6461746518042001280912150a0d71756572" .
            "795f62616c616e636518052001280522160a05546f74616c120d0a05746f" .
            "74616c18012001280122a4010a0d4765744c6f675265717565737412130a" .
            "0b6173736f63696174696f6e180120012809120c0a047479706518022003" .
            "280512110a0966726f6d5f64617465180320012809120f0a07746f5f6461" .
            "7465180420012809120e0a066f6666736574180520012805120d0a056c69" .
            "6d697418062001280512150a0d71756572795f62616c616e636518072001" .
            "280512160a0e6368616e67655f62616c616e636518082001280522450a0b" .
            "4163636f756e744c6f677312270a0a6163636f756e744c6f671801200328" .
            "0b32132e6163636f756e742e4163636f756e744c6f67120d0a05746f7461" .
            "6c18022001280322d0010a0a4163636f756e744c6f6712110a094163636f" .
            "756e744964180120012809120f0a07436f6d6d656e741802200128091210" .
            "0a0842696c6c436f646518032001280912100a0842696c6c547970651804" .
            "20012809120e0a06416374696f6e18052001280912150a0d4368616e6765" .
            "42616c616e636518062001280512120a0a4e6f7742616c616e6365180720" .
            "01280512150a0d4372656174656453686f70496418082001280912150a0d" .
            "4372656174656455736572496418092001280912110a0943726561746564" .
            "4174180a2001280922280a0e4173736f63696174696f6e49647312160a0e" .
            "6173736f63696174696f6e5f696418012003280922680a0e426574776565" .
            "6e5265717565737412160a0e6173736f63696174696f6e5f696418012003" .
            "280912140a0c6163636f756e745f7479706518022001280512130a0b6d69" .
            "6e5f62616c616e636518032001280512130a0b6d61785f62616c616e6365" .
            "18042001280532b7040a074163636f756e7412380a064368616e67651216" .
            "2e6163636f756e742e4368616e6765526571756573741a142e6163636f75" .
            "6e742e4163636f756e74496e666f220012340a0347657412132e6163636f" .
            "756e742e476574526571756573741a162e6163636f756e742e526573756c" .
            "744163636f756e74220012370a064765744f6e6512152e6163636f756e74" .
            "2e4173736f63696174696f6e731a142e6163636f756e742e4163636f756e" .
            "74496e666f220012320a0643616e63656c12162e6163636f756e742e4361" .
            "6e63656c526571756573741a0e2e6163636f756e742e456d707479220012" .
            "300a085861436f6d6d697412122e6163636f756e742e5861526571756573" .
            "741a0e2e6163636f756e742e456d707479220012320a0a5861526f6c6c62" .
            "61636b12122e6163636f756e742e5861526571756573741a0e2e6163636f" .
            "756e742e456d707479220012330a0643726561746512172e6163636f756e" .
            "742e43726561746573526571756573741a0e2e6163636f756e742e456d70" .
            "7479220012380a064765744c6f6712162e6163636f756e742e4765744c6f" .
            "67526571756573741a142e6163636f756e742e4163636f756e744c6f6773" .
            "220012420a0c47657442794265747765656e12172e6163636f756e742e42" .
            "65747765656e526571756573741a172e6163636f756e742e4173736f6369" .
            "6174696f6e496473220012360a08476574546f74616c12182e6163636f75" .
            "6e742e476574546f74616c526571756573741a0e2e6163636f756e742e54" .
            "6f74616c2200620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}


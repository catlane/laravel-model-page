<?php
/**
 * 将驼峰变为下划线
 */
if (!function_exists('convertHumpToUnderLine')) {
    function convertHumpToUnderLine($str)
    {
        $length = mb_strlen($str);

        $new = '';

        for ($i = 0; $i < $length; $i++) {
            $num = ord($str[$i]);
            $pre = ord($str[$i - 1]);

            $new .= ($i != 0 && ($num >= 65 && $num <= 90) && ($pre >= 97 && $pre <= 122)) ? "_{$str[$i]}" : $str[$i];
        }
        return strtolower($new);
    }
}

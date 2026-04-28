<?php

/**
 * 字串處理工具
 */
class StringHelper {
    
    /**
     * 1. 字串全取代為指定符號
     * 範例：aaddw1123 -> *********
     */
    public static function maskAll($str, $symbol = "*") {
        return str_repeat($symbol, mb_strlen($str));
    }

    /**
     * 2. 分割並重新組合
     * 範例："this,is,a,book" -> "this is a book"
     */
    public static function splitAndCombine($str, $delimiter = ",", $glue = " ") {
        $array = explode($delimiter, $str);
        return implode($glue, $array);
    }

    /**
     * 3. 子字串擷取 (支援中英文)
     * 範例：擷取前 10 字並加上省略符號
     */
    public static function truncate($str, $length = 10, $append = "...") {
        if (mb_strlen($str) <= $length) return $str;
        return mb_substr($str, 0, $length) . $append;
    }

    /**
     * 4. 實務加碼：中間部分隱碼 (可用於電話、姓名)
     * 範例：0912345678 -> 0912****78
     */
    public static function maskMiddle($str, $start = 4, $length = 4, $symbol = "*") {
        return substr_replace($str, str_repeat($symbol, $length), $start, $length);
    }
}

// --- 執行示範 ---

echo "<h3>PHP 字串處理練習結果</h3>";

// 1. 字串取代
$str1 = "aaddw1123";
echo "原字串：$str1 <br>";
echo "取代後：" . StringHelper::maskAll($str1) . "<br><hr>";

// 2. 分割與組合
$str2 = "this,is,a,book";
echo "原字串：$str2 <br>";
echo "重新組合：" . StringHelper::splitAndCombine($str2) . "<br><hr>";

// 3. 子字串取用
$str3 = " The reason why a great man is great is that he resolves to be a great man";
echo "原字串：$str3 <br>";
echo "取前十字：" . StringHelper::truncate($str3, 10) . "<br><hr>";

// 4. 實務應用 (手機隱碼)
$phone = "0912345678";
echo "手機原號：$phone <br>";
echo "隱碼處理：" . StringHelper::maskMiddle($phone, 4, 4) . "<br>";

?>

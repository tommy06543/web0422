<?php
// 1. 宣告一個陣列用來存放結果
$multiTable = [];

// 2. 第一組迴圈：產生九九乘法表並存入陣列
for ($i = 1; $i <= 9; $i++) {
    for ($j = 1; $j <= 9; $j++) {
        // 以字串格式存入二維陣列 [被乘數][乘數]
        $multiTable[$i][$j] = "{$i} x {$j} = " . ($i * $j);
    }
}

// 3. 第二組迴圈：將陣列內容印出
echo "<h3>九九乘法表 (陣列印出版)</h3>";
echo "<div style='display: flex; flex-wrap: wrap; gap: 0px;'>";

for ($i = 1; $i <= 9; $i++) {
    echo "<div style='border: 1px solid #ccc; padding: 10px; line-height: 1.5;'>";
    for ($j = 1; $j <= 9; $j++) {
        // 從陣列取回字串並印出
        echo $multiTable[$i][$j] . "<br>";
    }
    echo "</div>";
}

echo "</div>";
?>

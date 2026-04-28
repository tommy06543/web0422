<?php
$currentYear = date("Y"); // 取得今年年份
$endYear = $currentYear + 500;
$leapYears = []; // 儲存閏年的陣列

// 1. 找出閏年並存入陣列
$year = $currentYear;
while ($year <= $endYear) {
    // 閏年判斷公式
    if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
        $leapYears[] = $year;
    }
    $year++;
}

// 2. 使用迴圈印出陣列內容
echo "<h3>從 {$currentYear} 年到 {$endYear} 年間的閏年：</h3>";
echo "<div style='line-height: 1.8;'>";

foreach ($leapYears as $index => $ly) {
    echo  $ly . "年 ";
    
    // 每印 10 個換一行，方便閱讀
    if (($index + 1) % 10 == 0) {
        echo "<br>";
    }
}

echo "</div>";

// 計算總數
echo "<p>總共有 " . count($leapYears) . " 個閏年。</p>";
?>

<style>
    /* 設定表格基本樣式 */
    .multi-table {
        border-collapse: collapse;
        margin-bottom: 20px;
        font-family: Arial, sans-serif;
    }
    .multi-table td {
        border: 1px solid #ccc;  
        padding: 8px 12px;
        text-align: center;
        vertical-align: top;
        font-size: 14px;
    }
    /* 針對交叉表的表頭樣式 */
    .cross-table td:first-child, 
    .cross-table tr:first-child td {
        background-color: #f9f9f9;
        font-weight: bold;
    }
</style>

<?php
// --- 1. 以表格排列的九九乘法表 ---
echo "<h3>以表格排列的九九乘法表</h3>";
echo "<table class='multi-table'>";
echo "<tr>";
for ($i = 1; $i <= 9; $i++) {
    echo "<td>";
    for ($j = 1; $j <= 9; $j++) {
        echo "{$i}x{$j}=" . ($i * $j) . "<br>";
    }
    echo "</td>";
}
echo "</tr>";
echo "</table>";

echo "<hr>";

// --- 2. 以交叉計算結果呈現的九九乘法表 ---
echo "<h3>以交叉計算結果呈現的九九乘法表</h3>";
echo "<table class='multi-table cross-table'>";

// 產生第一列標題 (1-9)
echo "<tr><td></td>";
for ($h = 1; $h <= 9; $h++) {
    echo "<td>$h</td>";
}
echo "</tr>";

// 產生內容
for ($row = 1; $row <= 9; $row++) {
    echo "<tr>";
    echo "<td>$row</td>"; // 每列開頭標籤
    for ($col = 1; $col <= 9; $col++) {
        echo "<td>" . ($row * $col) . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>

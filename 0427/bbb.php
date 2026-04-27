<?php
// 1. 必須先定義函式，否則下面呼叫會噴錯 (Fatal error)
function getOddNumbers($n) {
    $result = [];
    for ($i = 1; $i <= $n; $i += 2) { $result[] = $i; }
    return implode(', ', $result);
}

function getTens($n) {
    $result = [];
    for ($i = 10; $i <= $n; $i += 10) { $result[] = $i; }
    return implode(', ', $result);
}

function getPrimes($n) {
    $result = [];
    for ($i = 3; $i <= $n; $i += 2) {
        $isPrime = true;
        for ($j = 3; $j * $j <= $i; $j += 2) {
            if ($i % $j == 0) { $isPrime = false; break; }
        }
        if ($isPrime) { $result[] = $i; }
    }
    return implode(', ', $result);
}

// 2. 準備資料
$configs = [
    ["title" => "奇數數列 (1, 3, 5...n)", "data" => getOddNumbers(19)],
    ["title" => "十倍數數列 (10, 20...n)", "data" => getTens(100)],
    ["title" => "質數數列 (3, 5...97)", "data" => getPrimes(97)],
];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>數列測試</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px; font-family: sans-serif; }
        th, td { border: 1px solid #ccc; padding: 10px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <table>
        <tr><th>數列類型</th><th>產生的數值</th></tr>
        <?php foreach ($configs as $row): ?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['data']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

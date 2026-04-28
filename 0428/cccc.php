<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// --- 第一區選號 (1~38 取 6 個) ---
$zone1 = []; // 存放第一區號碼的陣列

while (count($zone1) < 6) {
    $num = rand(1,38);
    echo $num,", ";
    // 檢查產生的亂數是否已存在陣列中
    if (!in_array($num, $zone1)) {
        $zone1[] = $num; // 不重覆才存入陣列
    } else{
         echo $num,", ";
    }

}

// 為了閱讀方便，通常會將號碼排序
sort($zone1);

// --- 第二區選號 (1~8 取 1 個) ---
$zone2 = rand(1, 8);

// --- 印出結果 ---
echo "<h3>威力彩電腦選號</h3>";
echo "第一區號碼：";
foreach ($zone1 as $result) {
    echo "<span style='display:inline-block; width:30px; height:30px; background:#f0f0f0; border-radius:50%; text-align:center; line-height:30px; margin-right:5px;'>$result</span>";
}

echo "<br><br>第二區號碼：";
echo "<span style='display:inline-block; width:30px; height:30px; background:#ffeb3b; border-radius:50%; text-align:center; line-height:30px;'>$zone2</span>";
?>

</body>
</html>
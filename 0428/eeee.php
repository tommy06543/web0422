<?php
// 1. 定義天干地支陣列
$sky = ["甲", "乙", "丙", "丁", "戊", "己", "庚", "辛", "壬", "癸"];
$earth = ["子", "丑", "寅", "卯", "辰", "巳", "午", "未", "申", "酉", "戌", "亥"];

// 2. 取得年份：如果有 POST 傳值就用輸入值，否則預設當年
$targetYear = isset($_POST['year']) ? intval($_POST['year']) : intval(date("Y"));
$baseYear = 1024; // 基準年：甲子年

// 3. 計算索引
$diff = $targetYear - $baseYear;

// 處理天干索引 (確保負數時也能正確循環)
$sIdx = $diff % 10;
if ($sIdx < 0) $sIdx += 10;

// 處理地支索引 (確保負數時也能正確循環)
$eIdx = $diff % 12;
if ($eIdx < 0) $eIdx += 12;

$result = $sky[$sIdx] . $earth[$eIdx];
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>天干地支換算器</title>
    <style>
        body { font-family: "Microsoft JhengHei", sans-serif; padding: 50px; background-color: #f9f9f9; }
        .card { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); max-width: 400px; margin: auto; text-align: center; }
        input[type="number"] { padding: 10px; width: 100px; border: 1px solid #ccc; border-radius: 5px; }
        button { padding: 10px 20px; background: #555; color: white; border: none; border-radius: 5px; cursor: pointer; }
        .result-box { margin-top: 20px; font-size: 24px; color: #d9534f; font-weight: bold; }
    </style>
</head>
<body>

<div class="card">
    <h2>天干地支查詢</h2>
    <form method="post">
        <input type="number" name="year" value="<?php echo $targetYear; ?>" required>
        <button type="submit">查詢</button>
    </form>

    <div class="result-box">
        西元 <?php echo $targetYear; ?> 年 <br>
        歲次【<?php echo $result; ?>】
    </div>
    
    <p style="font-size: 12px; color: #888; margin-top: 20px;">
        (註：基準年 1024年 為 甲子年)
    </p>
</div>
    <!-- 修改後的對照表 DIV -->
    <div style="max-width: 950px; margin: 30px auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h3 style="text-align: center; border-bottom: 2px solid #eee; padding-bottom: 10px;">西元 1000 - 3000 年歲次對照表</h3>
        
        <div style="display: flex; flex-wrap: wrap; gap: 8px; justify-content: center; font-size: 13px; font-family: monospace;">
            <?php
            for ($y = 1000; $y <= 3000; $y++) {
                $d = $y - 1024;
                
                $s = $d % 10;
                if ($s < 0) $s += 10;
                
                $e = $d % 12;
                if ($e < 0) $e += 12;

                $ganZhi = $sky[$s] . $earth[$e];

                // --- 設定不同的樣式 ---
                if ($ganZhi == "甲子") {
                    // 甲子年：深紅色背景，白字
                    $style = "background: #d9534f; color: white; font-weight: bold; border: 1px solid #a94442;";
                } elseif ($y == $targetYear) {
                    // 當前查詢年：黃色背景
                    $style = "background: #ffeb3b; color: #333; font-weight: bold; border: 1px solid #f0ad4e;";
                } else {
                    // 一般年：灰色背景
                    $style = "background: #f0f0f0; color: #666;";
                }

                echo "<div style='padding: 4px 6px; border-radius: 4px; $style' title='西元 {$y} 年'>";
                echo "{$y}:{$ganZhi}";
                echo "</div>";
            }
            ?>
        </div>
        
        <div style="margin-top: 15px; text-align: center; font-size: 12px;">
            <span style="display:inline-block; width:12px; height:12px; background:#d9534f; vertical-align:middle;"></span> 甲子年 (每60年一輪) &nbsp;&nbsp;
            <span style="display:inline-block; width:12px; height:12px; background:#ffeb3b; vertical-align:middle; border:1px solid #f0ad4e;"></span> 查詢年份
        </div>
    </div>





</body>
</html>

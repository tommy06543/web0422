<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <title>PHP 星星圖形產生器</title>
    <style>
        body { font-family: "Courier New", Courier, monospace; line-height: 1.2; background-color: #f4f4f9; padding: 20px; }
        .container { display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px; max-width: 900px; margin: auto; background: white; padding: 30px; border: 1px solid #ccc; }
        .shape-box { margin-bottom: 20px; }
        h3 { border-bottom: 1px solid #eee; padding-bottom: 5px; font-size: 18px; color: #333; }
        pre { font-size: 16px; margin-top: 10px; }
    </style>
</head>
<body>

<div class="container">
    <!-- 1. 直角三角形 -->
    <div class="shape-box">
        <h3>直角三角形</h3>
        <pre><?php
        for ($i = 1; $i <= 5; $i++) {
            echo str_repeat('*', $i) . "\n";
        }
        ?></pre>
    </div>

    <!-- 2. 倒直角三角形 -->
    <div class="shape-box">
        <h3>倒直角三角形</h3>
        <pre><?php
        for ($i = 5; $i >= 1; $i--) {
            echo str_repeat('*', $i) . "\n";
        }
        ?></pre>
    </div>

    <!-- 3. 正三角形 -->
    <div class="shape-box">
        <h3>正三角形</h3>
        <pre><?php
        $rows = 5;
        for ($i = 1; $i <= $rows; $i++) {
            echo str_repeat(' ', $rows - $i); // 前置空格
            echo str_repeat('*', (2 * $i) - 1) . "\n";
        }
        ?></pre>
    </div>

    <!-- 4. 菱形 -->
    <div class="shape-box">
        <h3>菱形</h3>
        <pre><?php
        $size = 5;
        // 上半部
        for ($i = 1; $i <= $size; $i++) {
            echo str_repeat(' ', $size - $i) . str_repeat('*', (2 * $i) - 1) . "\n";
        }
        // 下半部
        for ($i = $size - 1; $i >= 1; $i--) {
            echo str_repeat(' ', $size - $i) . str_repeat('*', (2 * $i) - 1) . "\n";
        }
        ?></pre>
    </div>

    <!-- 5. 矩形 (空心框) -->
    <div class="shape-box">
        <h3>矩形 (空心)</h3>
        <pre><?php
        $w = 7; $h = 7;
        for ($i = 1; $i <= $h; $i++) {
            if ($i == 1 || $i == $h) {
                echo str_repeat('*', $w) . "\n";
            } else {
                echo '*' . str_repeat(' ', $w - 2) . '*' . "\n";
            }
        }
        ?></pre>
    </div>

    <!-- 6. 矩形 (中間含空心十字) -->
    <div class="shape-box">
        <h3>矩形 (變化版)</h3>
        <pre><?php
        $w = 7; $h = 7;
        for ($i = 1; $i <= $h; $i++) {
            if ($i == 1 || $i == $h) {
                echo str_repeat('*', $w) . "\n";
            } elseif ($i == 2 || $i == 6) {
                echo "**" . str_repeat(' ', 3) . "**\n";
            } else {
                echo "*" . str_repeat(' ', 2) . "*" . str_repeat(' ', 2) . "*\n";
            }
        }
        ?></pre>
    </div>
</div>

</body>
</html>

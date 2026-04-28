<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <title>PHP 星星圖形產生器 (純迴圈版)</title>
    <style>
        body {
            font-family: "Courier New", Courier, monospace;
            line-height: 1.2;
            background-color: #f4f4f9;
            padding: 20px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border: 1px solid #ccc;
        }

        .shape-box {
            margin-bottom: 20px;
        }

        h3 {
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
            font-size: 18px;
            color: #333;
        }

        pre {
            font-size: 16px;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- 1. 直角三角形 -->
        <div class="shape-box">
            <h3>直角三角形</h3>
            <pre><?php
                    for ($i = 1; $i <= 5; $i++) {
                        for ($j = 1; $j <= $i; $j++) {
                            echo "*";
                        }
                        echo "\n";
                    }
                    ?></pre>
        </div>

        <!-- 2. 倒直角三角形 -->
        <div class="shape-box">
            <h3>倒直角三角形</h3>
            <pre><?php
                    for ($i = 5; $i >= 1; $i--) {
                        for ($j = 1; $j <= $i; $j++) {
                            echo "*";
                        }
                        echo "\n";
                    }
                    ?></pre>
        </div>

        <!-- 3. 正三角形 -->
        <div class="shape-box">
            <h3>正三角形</h3>
            <pre><?php
                    $rows = 5;
                    for ($i = 1; $i <= $rows; $i++) {
                        // 印空格
                        for ($j = 1; $j <= ($rows - $i); $j++) {
                            echo " ";
                        }
                        // 印星星
                        for ($k = 1; $k <= (2 * $i - 1); $k++) {
                            echo "*";
                        }
                        echo "\n";
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
                        for ($j = 1; $j <= ($size - $i); $j++) echo " ";
                        for ($k = 1; $k <= (2 * $i - 1); $k++) echo "*";
                        echo "\n";
                    }
                    // 下半部
                    for ($i = $size - 1; $i >= 1; $i--) {
                        for ($j = 1; $j <= ($size - $i); $j++) echo " ";
                        for ($k = 1; $k <= (2 * $i - 1); $k++) echo "*";
                        echo "\n";
                    }
                    ?></pre>
        </div>

        <!-- 4. 菱形 (單一迴圈控制) -->
        <div class="shape-box">
            <h3>菱形 (不分段)</h3>
            <pre><?php
                    $size = 5; // 中心點高度
                    $total_rows = 2 * $size - 1; // 總行數為 9

                    for ($i = 1; $i <= $total_rows; $i++) {
                        // 計算目前行與中心行的距離 (例如：4,3,2,1,0,1,2,3,4)
                        $dist = abs($size - $i);

                        // 計算該行需要的空格與星星數
                        $spaces = $dist;
                        $stars = 2 * ($size - $dist) - 1;

                        // 印空格
                        for ($j = 1; $j <= $spaces; $j++) {
                            echo " ";
                        }
                        // 印星星
                        for ($k = 1; $k <= $stars; $k++) {
                            echo "*";
                        }
                        echo "\n";
                    }
                    ?></pre>
        </div>

        <!-- 5. 矩形 (空心框) -->
        <div class="shape-box">
            <h3>矩形 (空心)</h3>
            <pre><?php
                    $w = 7;
                    $h = 7;
                    for ($i = 1; $i <= $h; $i++) {
                        for ($j = 1; $j <= $w; $j++) {
                            if ($i == 1 || $i == $h || $j == 1 || $j == $w) {
                                echo "*";
                            } else {
                                echo " ";
                            }
                        }
                        echo "\n";
                    }
                    ?></pre>
        </div>

        <!-- 7. 矩形 (含對角線) -->
        <div class="shape-box">
            <h3>矩形 (含對角線)</h3>
            <pre><?php
                    $w = 9; // 建議用奇數，對角線會在中心交叉
                    $h = 9;
                    for ($i = 1; $i <= $h; $i++) {
                        for ($j = 1; $j <= $w; $j++) {
                            // 判斷條件：
                            // 1. 四周邊框 ($i==1, $i==$h, $j==1, $j==$w)
                            // 2. 左上到右下對角線 ($i == $j)
                            // 3. 右上到左下對角線 ($i + $j == $w + 1)
                            if (
                                $i == 1 || $i == $h || $j == 1 || $j == $w ||
                                $i == $j || ($i + $j == $w + 1)
                            ) {
                                echo "*";
                            } else {
                                echo " ";
                            }
                        }
                        echo "\n";
                    }
                    ?></pre>
        </div>


        <!-- 6. 矩形 (變化版) -->
        <div class="shape-box">
            <h3>矩形 (變化版)</h3>
            <pre><?php
                    $w = 7;
                    $h = 7;
                    for ($i = 1; $i <= $h; $i++) {
                        for ($j = 1; $j <= $w; $j++) {
                            if ($i == 1 || $i == $h) {
                                echo "*";
                            } elseif ($i == 2 || $i == 6) {
                                echo ($j <= 2 || $j >= 6) ? "*" : " ";
                            } else {
                                echo ($j == 1 || $j == 4 || $j == 7) ? "*" : " ";
                            }
                        }
                        echo "\n";
                    }
                    ?></pre>
        </div>
    </div>

</body>

</html>
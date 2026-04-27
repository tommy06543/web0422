<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>閏年判斷工具 (PHP版)</title>
    <style>
        body { font-family: "Microsoft JhengHei", sans-serif; line-height: 1.6; background-color: #f9f9f9; padding: 20px; color: #333; }
        .card { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h1 { color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
        .description { background: #eef7ff; padding: 15px; border-left: 5px solid #3498db; margin-bottom: 25px; }
        .rule-list { list-style: none; padding: 0; }
        .rule-list li { margin-bottom: 8px; padding-left: 20px; position: relative; }
        .rule-list li::before { content: "•"; color: #3498db; font-weight: bold; position: absolute; left: 0; }
        .interactive-section { text-align: center; border-top: 1px solid #eee; padding-top: 20px; }
        input { padding: 12px; width: 150px; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem; margin: 10px; }
        button { padding: 12px 24px; background-color: #2c3e50; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 1rem; }
        button:hover { background-color: #1a252f; }
        .result-box { margin-top: 20px; font-size: 1.2rem; font-weight: bold; padding: 10px; border-radius: 6px; }
        .leap { color: #27ae60; background: #eafaf1; }
        .common { color: #e74c3c; background: #fdedec; }
    </style>
</head>
<body>

<div class="card">
    <h1>閏年判斷</h1>
    <p>給定一個西元年份，判斷是否為閏年</p>

    <div class="description">
        地球對太陽的公轉一年的真實時間大約是365天5小時48分46秒，因此以365天定為一年 的狀況下，每年會多出近六小時的時間，所以每隔四年設置一個閏年來消除這多出來的一天。
    </div>

    <ul class="rule-list">
        <li>公元年分除以4不可整除，為平年。</li>
        <li>公元年分除以4可整除但除以100不可整除，為閏年。</li>
        <li>公元年分除以100可整除但除以400不可整除，為平年。</li>
    </ul>

    <div class="interactive-section">
        <form method="post">
            <input type="number" name="year" placeholder="輸入年份 (如: 2024)" required value="<?php echo isset($_POST['year']) ? htmlspecialchars($_POST['year']) : ''; ?>">
            <button type="submit">判斷結果</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['year'])) {
            $y = intval($_POST['year']);
            $isLeap = false;
            $reason = "";

            // PHP 判斷邏輯
            if ($y % 4 !== 0) {
                $isLeap = false;
                $reason = "除以 4 不可整除，為【平年】";
            } elseif ($y % 100 !== 0) {
                $isLeap = true;
                $reason = "除以 4 可整除但除以 100 不可整除，為【閏年】";
            } elseif ($y % 400 !== 0) {
                $isLeap = false;
                $reason = "除以 100 可整除但除以 400 不可整除，為【平年】";
            } else {
                $isLeap = true;
                $reason = "除以 400 可整除，為【閏年】";
            }

            $class = $isLeap ? "leap" : "common";
            echo "<div class='result-box $class'>$y 年：$reason</div>";
        }
        ?>
    </div>
</div>

</body>
</html>

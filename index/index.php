<?php
$courses = [
    "xampp安裝與設定",
    "Visual Studio Code安裝與設定",
    "瀏覽器開發者工具",
    "git 版本管理系統",
    "github 遠端程式碼托管",
    "開發環境測試",
    "常用快速鍵及打字練習",
    "網頁開發輔助工具",
    "虛擬主機設定",
    "Docker認識與基礎安裝操作",
    "PHP程式語言基礎",
    "PHP程式流程控制",
    "陣列",
    "字串處理",
    "時間及日期處理"
];
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
<meta charset="UTF-8">
<title>PHP 教學平台</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: linear-gradient(135deg, #5b6cff, #8f5bff);
}

.container {
    width: 900px;
    margin: auto;
    padding: 40px;
}

h1 {
    color: white;
    margin-bottom: 30px;
}

.card {
    display: block;
    background: #f1f1f1;
    padding: 15px 20px;
    margin-bottom: 12px;
    border-radius: 10px;
    text-decoration: none;
    color: #333;
    transition: 0.2s;
}

.card:hover {
    background: #e0e0e0;
    transform: translateX(5px);
}

.num {
    background: #5b6cff;
    color: white;
    padding: 6px 10px;
    border-radius: 6px;
    margin-right: 10px;
}
</style>

</head>

<body>
<div class="container">
    <h1>📘 PHP 基礎語法學習平台</h1>

    <?php foreach ($courses as $i => $course): ?>
        <a class="card" href="page_<?php echo $i+1; ?>.php">
            <span class="num"><?php echo str_pad($i+1, 2, "0", STR_PAD_LEFT); ?></span>
            <?php echo $course; ?>
        </a>
    <?php endforeach; ?>

</div>
</body>
</html>
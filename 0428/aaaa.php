<?php
// 1. 規劃陣列結構
$scores = [
    'judy'  => ['國文' => 95, '英文' => 64, '數學' => 70, '地理' => 90, '歷史' => 84],
    'amo'   => ['國文' => 88, '英文' => 78, '數學' => 54, '地理' => 81, '歷史' => 71],
    'john'  => ['國文' => 45, '英文' => 60, '數學' => 68, '地理' => 70, '歷史' => 62],
    'peter' => ['國文' => 59, '英文' => 32, '數學' => 77, '地理' => 54, '歷史' => 42],
    'hebe'  => ['國文' => 71, '英文' => 62, '數學' => 80, '地理' => 62, '歷史' => 64],
];

// 取得所有學科名稱 (從第一個學生資料中取出 key)
$subjects = array_keys(current($scores));
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <style>
        table { border:  double; width: 100%; max-width: 600px; text-align: center; font-family: sans-serif; }
        th, td { border: solid; }
        th { background-color: #f8f8f8; }
        .fail { color: red; font-weight: bold; } /* 不及格紅字標示 */
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>姓名</th>
            <?php foreach ($subjects as $sub): ?>
                <th><?php echo $sub; ?></th>
            <?php endforeach; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($scores as $name => $data): ?>
            <tr>
                <td><?php echo $name; ?></td>
                <?php foreach ($subjects as $sub): ?>
                    <?php $val = $data[$sub]; ?>
                    <td class="<?php echo ($val < 60) ? 'fail' : ''; ?>">
                        <?php echo $val; ?>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>

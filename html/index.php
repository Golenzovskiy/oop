<?php
define('ROOT', dirname(__FILE__, 2) . '/');
require ROOT . 'etc/config.php';

$id = 1;
foreach ($employeeData as $position => $arrEmployees) {
    if ($position == 'Designer') {
        foreach ($arrEmployees as $name => $value) {
            $employees[] = new $position($id++, $name, $value[0]);
        }
    } elseif ($position == 'Seller') {
        foreach ($arrEmployees as $name => $value) {
            $employees[] = new $position($id++, $name, $value[0], $value[1]);
        }
    } elseif ($position == 'Freelance') {
        foreach ($arrEmployees as $name => $value) {
            $employees[] = new $position($id++, $name, $value[0]);
        }

    }
}

$collection = new EmployeeCollection($employees);
$collection->sortByTwoFields('getPayment', 'getName');
?>

<html>
<head>
    <meta charset="utf-8">
    <title>ООП</title>
</head>
<body>
<table border="1" style="border: ridge;">
    <tr>
        <th colspan="3">Среднемесячная выплата сотрудникам</th>
    </tr>
    <tr style="font-style: italic; font-weight: bolder;">
        <td>
            id
        </td>
        <td>
            Имя сотрудника
        </td>
        <td>
            Выплата
        </td>
    </tr>
    <? if ($collection !== null): ?>
        <? foreach ($collection->getEmployees() as $employee): ?>
            <tr>
                <td>
                    <?= $employee->getId() ?>
                </td>
                <td>
                    <?= $employee->getName() ?>
                </td>
                <td>
                    <?= $employee->getPayment() ?>
                </td>
            </tr>
        <? endforeach ?>
    <? else: ?>
        <tr>
            <td colspan="3"><strong>Ошибка!</strong><br/>Файл с данными сотрудников не подключен.</td>
        </tr>
    <? endif; ?>
</table>
</body>
</html>

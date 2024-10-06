<!-- Собрать для себя окружение из Nginx + PHP-FPM и PHP CLI
Выполните код в контейнере PHP CLI и объясните, что выведет данный код и почему: -->

<?php
$a = 5;
$b = '05';
var_dump($a == $b);
var_dump((int)'012345');
var_dump((float)123.0 === (int)123.0);
var_dump(0 == 'hello, world');
?>

<!-- В контейнере с PHP CLI поменяйте версию PHP с 8.2 на 7.4. Изменится ли вывод?
Используя только две числовые переменные, поменяйте их значение местами. Например, если a = 1, b = 2, надо, чтобы получилось: b = 1, a = 2.
Дополнительные переменные, функции и конструкции типа list() использовать нельзя.
Решение: -->

<?php

$a = 5; 
$b = '05';
echo '<pre>';
var_dump($a == $b);  // true, т.к. происходит неявное преобразование в int
var_dump((int)'012345'); // 12345 - целочисленное число
var_dump((float)123.0 === (int)123.0);  // false,  т.к. int = 123, а не 123,0 (они имеют разные типы)
var_dump(0 == 'hello, world'); // false, поскольку строка не равна числовому значению, в версии PHP 7.4 значение true, т.к. значение приравнивалось к нулю.


$a = 1; 
$b = 2;
echo "a1 ="." ".$a.";\n";
echo "b1 ="." ".$b.";\n"; 
$a = $a + $b;  1 + 2 = 3
$b = $a - $b;  3 - 2 = 1
$a = $a - $b;  3 - 1 = 2

echo "a2 ="." ".$a.";\n";
echo "b2 ="." ".$b.";";

echo '</pre>';
// a = 2, b = 1
<!-- 6. Дан код: -->

<!-- Что он выведет на каждом шаге? Почему? -->

<?php

class A
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}

$a1 = new A();    //- Создается экземпляр класса A и присваивается переменной $a1.

$a2 = new A();    //- Создается еще один экземпляр класса A и присваивается переменной $a2.

$a1->foo();     // - Вызывается метод foo() класса A через экземпляр $a1.
                //- Статическая переменная $x в классе A имеет начальное значение 0.
                //- Выводится значение 1, так как ++$x увеличивает значение $x на 1 и возвращает новое значение.

$a2->foo();     //- Вызывается метод foo() класса A через экземпляр $a2.
                //- Статическая переменная $x в классе A имеет значение 1 (после предыдущего вызова).
                //- Выводится значение 2, так как ++$x увеличивает значение $x на 1 и возвращает новое значение.

$a1->foo();     //- Вызывается метод foo() класса A через экземпляр $a1.
                //- Статическая переменная $x в классе A имеет значение 2 (после предыдущего вызова).
                //- Выводится значение 3, так как ++$x увеличивает значение $x на 1 и возвращает новое значение.

$a2->foo();     //- Вызывается метод foo() класса A через экземпляр $a2.
                //- Статическая переменная $x в классе A имеет значение 3 (после предыдущего вызова).
                //- Выводится значение 4, так как ++$x увеличивает значение $x на 1 и возвращает новое значение.

//Вывод скрипта: 1234

// Cтатические переменные в классах являются общими для всех экземпляров этого класса.
// Поэтому, независимо от того, через какой экземпляр вызывается метод foo(), он использует и изменяет одну и ту же статическую переменную $x.
// Каждый последующий вызов функции foo() увеличивает переменнyю $x  на единицу каким бы объектом класса А не вызывалась
// А т.к. инкремент префиксный, то переменная $x сначала увеличивается на единицу, а затем выводится на
// экран. При постфискном инкременте результат вывода был бы такой: 0123

// ****************************************************************************************************************************************
// Немного изменим п.5

// Что он выведет теперь?

<?php

class A
{
    public function foo()
    {
        static $x = 0;
        echo ++$x;
    }
}

class B extends A
{
}

$a1 = new A();    //- Создается экземпляр класса A и присваивается переменной $a1.

$b1 = new B();    //- Создается экземпляр класса B и присваивается переменной $b1.

$a1->foo();       //- Вызывается метод foo() класса A через экземпляр $a1.
                  //- Статическая переменная $x в классе A имеет начальное значение 0.
                  //- Выводится значение 1, так как ++$x увеличивает значение $x на 1 и возвращает новое значение.

$b1->foo();       //- Вызывается метод foo() класса A через экземпляр $b1, так как класс B наследует класс A.
                  //- Статическая переменная $x в классе A имеет значение 1 (после предыдущего вызова).
                  //- Выводится значение 2, так как ++$x увеличивает значение $x на 1 и возвращает новое значение.

$a1->foo();       //- Вызывается метод foo() класса A через экземпляр $a1.
                  //- Статическая переменная $x в классе A имеет значение 2 (после предыдущего вызова).
                  //- Выводится значение 3, так как ++$x увеличивает значение $x на 1 и возвращает новое значение.

$b1->foo();       //- Вызывается метод foo() класса A через экземпляр $b1, так как класс B наследует класс A.
                  //- Статическая переменная $x в классе A имеет значение 3 (после предыдущего вызова).
                  //- Выводится значение 4, так как ++$x увеличивает значение $x на 1 и возвращает новое значение.

//Вывод скрипта: 1234

// Cтатические переменные в классах являются общими для всех экземпляров этого класса.
// Поэтому, независимо от того, через какой экземпляр вызывается метод foo(), он использует и изменяет одну и ту же статическую переменную $x,
// не переопределяя ее. Таким образом, результат будет тот же.
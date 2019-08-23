<?php

$str = 'Shreder';

echo "hello, {$str} ! <br/><br/>";

// Cat {catname} is sayig meow».

// Пример использования:

$cat = new Cat('garfield');

if($cat->getName() === 'garfield') {
    echo 'Task getName() is solved!<br/>';
} else {
    echo 'Task getName() is not solved!<br/>';
}

if ($cat->meow() === 'Cat garfield is saying meow') {
    echo 'Task meow() is solved!<br/>';
} else {
    echo 'Task meow() is not solved!<br/>';
}

class Cat {
    private $name;
    public function Cat($name) {
        $this->name = $name;
    }

    function getName() {
        return $this->name;
    }

    function meow() {
        return "Cat {$this->name} is saying meow";
    }
}


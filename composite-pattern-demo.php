<?php

require_once __DIR__ . '/app/bootstrap.php';

use DesignPattern\CompositePattern;

global $container;

$listArr = [
    'layer 1' => [
        'item 1' => '',
        'layer 2' => [
            'item 2' => '',
            'layer 3' => [
                'item 3' => '',
                'item 4' => '',
                'layer 4' => [],
            ],
        ],
    ],
];

// $todoFactory = $container->get('factory.todo');
// $todoListFactory = $container->get('factory.todo-list');
//
// $todoList = $todoListFactory('first layer');
// $todoList1 = $todoListFactory('second layer');
// $todoList2 = $todoListFactory('third layer');
//
// $todo1 = $todoFactory('item 1');
// $todo2 = $todoFactory('item 2');
// $todo3 = $todoFactory('item 3');
//
// $todoList->add($todo1);
// $todoList->add($todoList1);
// $todoList1->add($todo2);
// $todoList1->add($todoList2);
// $todoList2->add($todo3);

$builder = $container->get(CompositePattern\Builder::class);

foreach ($listArr as $todoName => $todoArr) {
    $todoList = $builder->build($todoName, $todoArr);

    echo $todoList->rendor();
}

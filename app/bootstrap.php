<?php

require_once __DIR__ . '/vendor/autoload.php';

use DesignPattern\CompositePattern\Todo;
use DesignPattern\CompositePattern\TodoList;
use DesignPattern\CompositePattern\Builder;

$builder = new DI\ContainerBuilder();
$builder->addDefinitions([
    Builder::class => DI\create()
        ->constructor(DI\get('factory.todo'), DI\get('factory.todo-list')),
        // ->constructorParameter('todoFactory', DI\get('factory.todo'))
        // ->constructorParameter('todoListFactory', DI\get('factory.todo-list')),
    'factory.todo' => function () {
        return function (string $todo): Todo {
            return new Todo($todo);
        };
    },
    'factory.todo-list' => function () {
        return function (string $todo): TodoList {
            return new TodoList($todo);
        };
    },
]);

$container = $builder->build();

<?php

namespace DesignPattern\CompositePattern;

class TodoList implements TodoComponent
{
    const INDENT = "\t";

    private $list;
    private $todo;

    public function __construct(string $todo)
    {
        $this->todo = $todo;
        $this->list = [];
    }

    public function rendor(string $prefix = ''): string
    {
        $todoList = '';
        foreach ($this->list as $todo) {
            $todoList .= $todo->rendor($prefix . self::INDENT);
        }

        if (!empty($todoList)) {
            $todoList = "\n" . $todoList . $prefix;
        }

        $rendor = sprintf("%s<ul>%s%s<\\ul>\n", $prefix, $this->todo, $todoList);

        return $rendor;
    }

    public function add(TodoComponent $todoComponent): array
    {
        $this->list[] = $todoComponent;

        return [];
    }
}

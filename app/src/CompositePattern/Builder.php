<?php

namespace DesignPattern\CompositePattern;

class Builder
{
    public function __construct($todoFactory, $todoListFactory)
    {
        $this->todoFactory = $todoFactory;
        $this->todoListFactory = $todoListFactory;
    }

    public function build(string $todoName, $value): TodoComponent
    {
        if (is_string($value)) {
            $todo = ($this->todoFactory)($todoName);

            return $todo;
        }

        if (is_array($value)) {
            $todo = ($this->todoListFactory)($todoName);
            foreach ($value as $subTodoName => $subTodoArr) {
                $subTodo = $this->build($subTodoName, $subTodoArr);
                $todo->add($subTodo);
            }

            return $todo;
        }

        throw new \Exception("invalid value");
    }
}

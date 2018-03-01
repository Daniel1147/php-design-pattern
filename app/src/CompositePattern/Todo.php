<?php

namespace DesignPattern\CompositePattern;

class Todo implements TodoComponent
{
    private $todo;

    public function __construct(string $todo)
    {
        $this->todo = $todo;
    }

    public function rendor(string $prefix = ''): string
    {
        $rendor = sprintf("%s<li>%s<\\li>\n", $prefix, $this->todo);

        return $rendor;
    }
}

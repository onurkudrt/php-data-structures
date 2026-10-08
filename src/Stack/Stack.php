<?php

namespace OnKud\DataStructures\Stack;

use OnKud\DataStructures\Stack\Interface\StackInterface;

/** Last In Last Out (LIFO) */
class Stack implements StackInterface
{
    /**
     * @var array
     */
    private array $array = [];

    private int $head = -1;

    /**
     * @param mixed $element
     * @return static
     */
    public function push(mixed $element): static
    {
        $this->array[++$this->head] = $element;
       
        return $this;
    }

    /**
     * @return static
     */
    public function pop(): static
    {
        if($this->head === -1) {
            return $this;
        }

        unset($this->array[$this->head]);
        $this->head--;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHead(): mixed
    {
        if($this->head === -1) {
            return null;
        }

        return $this->array[$this->head];
    }

    public function length(): int
    {
        return count($this->array);
    }

    public function display(): static
    {
        echo "Stack State\n";
        echo "Head => " . $this->getHead() . "\n";

        foreach($this->array as $key => $value) {
            echo "$key => $value\n";
        }

        echo "\n";

        return $this;
    }
}
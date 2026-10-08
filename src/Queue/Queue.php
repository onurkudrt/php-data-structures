<?php

namespace OnKud\DataStructures\Queue;

use OnKud\DataStructures\Queue\Interface\QueueInterface;

class Queue implements QueueInterface
{
    private array $array = [];

    public function dequeue(): static
    {
        foreach($this->array as $index => $value) {
            if($index === 0) {
                continue;
            }

            $this->array[$index - 1] = $value;
        }

        $lastIndex = count($this->array);
        unset($this->array[$lastIndex]);

        return $this;
    }

    public function enqueue(mixed $element): static
    {
        $this->array[] = $element;

        return $this;
    }

    /**
     * @return $this
     */
    public function display(): static
    {
        echo "Queue : \n";
        foreach($this->array as $key => $value) {
            echo $key . " => " . $value . "\n";
        }
        echo "\n";

        return $this;
    }
}
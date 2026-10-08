<?php

namespace OnKud\DataStructures\LinkedList;

use Exception;
use OnKud\DataStructures\LinkedList\Interface\LinkedListInterface;

class LinkedList implements LinkedListInterface
{
    private ?Node $head = NULL;
    private int $length = -1;

    /**
     * @param mixed $items
     */
    public function __construct(?iterable $items = NULL) {
    
        if(is_iterable($items)) {
            $this->head = new Node();
            $current = $this->head;
            foreach($items as $value) {
                $current->value = $value;
                $current->next = new Node();
                $current = $current->next;
                $this->length++;
            }
        }
    }

    /**
     * @param mixed $element
     * @return $this
     */
    public function addHead(mixed $element): static
    {
        if($this->head === NULL) {
            $this->head = new Node($element);
            $this->length++;
            return $this;
        }

        // swap
        $newHead = new Node($element);
        $newHead->next = $this->head;
        $this->head = $newHead;
        $this->length++;

        return $this;
    }

    /**
     * @return $this
     * @throws Exception
     */
    public function removeHead(): static
    {
        if($this->head === NULL) {
            throw new Exception('You can\'t remove head of empty list');
        }

        $this->head = $this->head->next;
        $this->length--;

        return $this;
    }

    /**
     * @param int $index
     * @param mixed $element
     * @return $this
     * @throws Exception
     */
    public function add(int $index, mixed $element): static
    {
        if($index === 0) {
            return $this->addHead($element);
        }

        if ($index === $this->length) {
            return $this->addLast($element);
        }

        if($this->head === NULL) {
            throw new Exception('No element in list, try to add element in head');
        }

        $current = $this->head;
        $currentIndex = 0;
     
        while($currentIndex !== ($index -1)) {
            if($current === NULL) {
                break;
            }
            $current = $current->next;
            $currentIndex++;
        }

        if($currentIndex !== $index-1) {
            throw new Exception('Inconsistent indexes');
        }

        $new = new Node($element);
        $new->next = $current->next;
        $current->next = $new;
        $this->length++;
        return $this;
    }

    /**
     * @param int $index
     * @return $this
     * @throws Exception
     */
    public function remove(int $index): static
    {
        if($index === 0) {
            return $this->removeHead();
        }

        if($index === $this->length) {
            return $this->removeLast();
        }

        if($index < 0 || $index > $this->length) {
            throw new Exception('Invalid index value or index out of range');
        }

        $current = $this->head;
        $currentIndex = 0;

        while($currentIndex !== ($index - 1)) {
            if($current === NULL) {
                throw new Exception('Inconsistent index value, NULL pointer founded');
            }

            $current = $current->next;
            $currentIndex++;
        }

        $current->next = $current->next->next;
        $this->length--;

        return $this;
    }

    /**
     * @param mixed $element
     * @return $this
     */
    public function addLast(mixed $element): static
    {
        if($this->head === NULL) {
            $this->head = new Node($element);
            $this->length++;
            return $this;
        }

        $current = $this->head;

        while($current->next !== NULL) {
            $current = $current->next;
        }

        $current->next = new Node($element);
        $this->length++;
        return $this;
    }

    /**
     * @return $this
     */
    public function removeLast(): static
    {
        $current = $this->head;
        
        while($current !== NULL && $current->next !== NULL) {
            
            if($current->next->next === NULL) {
                break;
            }
            $current = $current->next;
        }

        $current->next = NULL;
        $this->length--;

        return $this;
    }

    /**
     * @return $this
     */
    public function display(): static
    {
        $current = $this->head;

        echo "LinkedList \n";
        while($current !== NULL) {
            echo "$current->value  -> ";
            $current = $current->next;
        }
        echo "\n";
    
        return $this;
    }
}
<?php

namespace OnKud\DataStructures\Stack\Interface;

interface StackInterface
{
    /**
     * 
     * @param mixed $element
     * @return static
     */
    public function push(mixed $element): static;

    /**
     * @return static
     */
    public function pop(): static;

    /**
     * @return static
     */
    public function getHead(): mixed;
}
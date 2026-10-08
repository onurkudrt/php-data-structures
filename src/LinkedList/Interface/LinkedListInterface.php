<?php

namespace OnKud\DataStructures\LinkedList\Interface;

interface LinkedListInterface
{
    public function addHead(mixed $element): static;

    public function removeHead(): static;

    public function add(int $index, mixed $element): static;

    public function remove(int $index): static;

    public function addLast(mixed $element): static;

    public function removeLast(): static;
}
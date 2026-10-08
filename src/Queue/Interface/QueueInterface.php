<?php

namespace OnKud\DataStructures\Queue\Interface;

interface QueueInterface
{
    public function dequeue(): static;

    public function enqueue(mixed $element): static;
}
<?php

namespace OnKud\DataStructures\LinkedList;

class Node
{
    public function __construct(public mixed $value = NULL, public ?Node $next = NULL) {}
}
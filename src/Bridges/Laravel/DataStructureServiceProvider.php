<?php

namespace OnKud\DataStructures\Bridges\Laravel;

use Illuminate\Support\ServiceProvider;
use OnKud\DataStructures\LinkedList\Interface\LinkedListInterface;
use OnKud\DataStructures\LinkedList\LinkedList;
use OnKud\DataStructures\Stack\Interface\StackInterface;
use OnKud\DataStructures\Stack\Stack;

class DataStructureServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(StackInterface::class, Stack::class);
        $this->app->bind(LinkedListInterface::class, LinkedList::class);

        $this->app->bind('data-structures.stack', fn () => new Stack());
        $this->app->bind('data-structures.linked-list', fn () => new LinkedList());
    }
}
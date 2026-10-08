<?php

namespace OnKud\DataStructures\Bridges\Symfony\DependencyInjection;

use OnKud\DataStructures\LinkedList\Interface\LinkedListInterface;
use OnKud\DataStructures\LinkedList\LinkedList;
use OnKud\DataStructures\Queue\Interface\QueueInterface;
use OnKud\DataStructures\Queue\Queue;
use OnKud\DataStructures\Stack\Interface\StackInterface;
use OnKud\DataStructures\Stack\Stack;
use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;

class DataStructureExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $stackDefinition = new Definition(Stack::class);
        $stackDefinition->setShared(false);

        $container->setDefinition(Stack::class, $stackDefinition);
        $container->setAlias(StackInterface::class, Stack::class);

        $stackAlias = new Alias(Stack::class, true);
        $container->setAlias('data-structures.stack', $stackAlias);


        $listDefinition = new Definition(LinkedList::class);
        $listDefinition->setShared(false);
        $container->setDefinition(LinkedList::class, $listDefinition);
        $container->setAlias(LinkedListInterface::class, LinkedList::class);

        $linkedListAlias = new Alias(LinkedList::class, true);
        $container->setAlias('data-structures.linkedlist', $linkedListAlias);
        $container->setAlias('data-structures.linked-list', $linkedListAlias);
        $container->setAlias('data-structures.linked.list', $linkedListAlias);
        $container->setAlias('data-structures.linked_list', $linkedListAlias);


        $queueDefinition = new Definition(Queue::class);
        $queueDefinition->setShared(false);
        $container->setDefinition(Queue::class, $queueDefinition);

        $container->setAlias(QueueInterface::class, Queue::class);
        $queueAlias = new Alias(Queue::class, true);
        $container->setAlias('data-structures.queue', $queueAlias);
    }
}
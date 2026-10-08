<?php

namespace OnKud\DataStructures\Bridges\Symfony;

use OnKud\DataStructures\Bridges\Symfony\DependencyInjection\DataStructureExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DataStructureBundle extends Bundle
{
    public function getContainerExtension(): ?ExtensionInterface
    {
        return new DataStructureExtension();
    }
}
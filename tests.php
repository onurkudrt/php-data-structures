<?php

use OnKud\DataStructures\LinkedList\LinkedList;
use OnKud\DataStructures\Stack\Stack;

include_once 'vendor/autoload.php';

function testStats(string $testName, callable $callback): void
{
    gc_collect_cycles();
    gc_mem_caches();

    $startTime = microtime(true);
    $startMemory = memory_get_usage();

    $callback();

    $endTime = microtime(true);
    $endMemory = memory_get_usage();

    $time = $endTime - $startTime;
    $memory = $endMemory - $startMemory;
    $peak = memory_get_peak_usage() - $startMemory;

    echo "\n=======================================================================\n";
    echo "TEST: $testName\n";
    echo sprintf("Time: %f seconds\nMemory: %d bytes (%.2f KB)\nPeak Allocation: %d bytes (%.2f KB)\n",
        $time,
        $memory, $memory / 1024,
        $peak, $peak / 1024
    );
    echo "\n=======================================================================\n";
}

testStats("STACK", function() {
    $stack = new Stack();
    $counter = 0;
    while (++$counter < 100000) {
        $stack->push($counter);
    }
});

testStats("LINKED LIST ADD HEAD TEST", function() {
    $linkedList = new LinkedList([$counter = 0]);
    while ((++$counter) < 100000) {
        $linkedList->addHead($counter);
    }
});

testStats("LINKED LIST ADD LAST TEST", function() {
    $linkedList = new LinkedList([$counter = 0]);
    while ((++$counter) < 100000) {
        $linkedList->addLast($counter);
    }
});

testStats("LINKED LIST ADD TO CUSTOM INDEX", function() {
    $linkedList = new LinkedList([$counter = 0]);
    while ((++$counter) < 100000) {
        $linkedList->add($counter, $counter);
    }
});
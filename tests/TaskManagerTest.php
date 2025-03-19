<?php

namespace arnaud\tests\TaskManagerTest;

use Boumilmounir\TestUnitaire\TaskManager;
use PHPUnit\Framework\TestCase;

class TaskManagerTest extends TestCase {

    public function testTaskManager(){
        $taskmanager = new TaskManager();
        $task = "Task 1";
        $taskmanager->addTask($task);
        $this->assertEquals([$task], $taskmanager->getTasks());
    }
}
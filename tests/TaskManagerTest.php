<?php

namespace arnaud\tests\TaskManagerTest;

use Boumilmounir\TestUnitaire\TaskManager;
use PHPUnit\Framework\TestCase;

class TaskManagerTest extends TestCase {

    public function testAddTask(){
        $taskmanager = new TaskManager();
        $task = "Task 1";
        $taskmanager->addTask($task);
        $this->assertCount(1, $taskmanager->getTasks());
    }
    // Scénario : On crée une tâche, on la supprime et 
    // on vérifie que l'exception OutofBounds fonctionne pour getTask() et removeTask()
    public function testRemoveTask(){
        $taskmanager = new TaskManager();
        $task = "Task 1";
        $taskmanager->addTask($task);
        $taskmanager->removeTask(0);
        $this->expectException(\OutOfBoundsException::class);
        $taskmanager->removeTask(1);
        $this->expectException(\OutOfBoundsException::class);
        $taskmanager->getTask(0);
        $this->assertCount(0, $taskmanager->getTasks());
    }
    // On vérifie si la logique d'attribution d'indice 
    // fonctionne correctement
    public function testTaskOrderAfterRemoval(){
        $taskmanager = new TaskManager();
        $task1 = "Task 1";
        $task2 = "Task 2";
        $taskmanager->addTask($task1);
        $taskmanager->addTask($task2);
        $this->assertEquals("Task 1", $taskmanager->getTask(0));
        $this->assertEquals("Task 2", $taskmanager->getTask(1));
        $taskmanager->removeTask(0);
        $this->assertEquals("Task 2", $taskmanager->getTask(0));

    }
    
}

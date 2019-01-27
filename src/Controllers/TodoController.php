<?php

use Todo\Controller;
use Todo\Database;
use Todo\TodoItem;

class TodoController extends Controller
{
    public function get()
    {
        $todos = TodoItem::findAll();
        return $this->view('index', ['todos' => $todos]);
    }

    public function add()
    {
        $body = filter_body();
        $title = htmlspecialchars($body['title']);
        $title = trim($title);

        if (strlen($title) >= 1) {
            $result = TodoItem::createTodo($title);
        }

        $this->redirect('/');
    }

    public function update($urlParams)
    {
        $body = filter_body(); // gives you the body of the request (the "envelope" contents)
        $title = htmlspecialchars($body['title']);
        $title = trim($title);
        $todoId = $urlParams['id']; // the id of the todo we're trying to update
        $completed = isset($body['status']) ? "true" : "false"; // whether or not the todo has been checked or not

        if (strlen($title) >= 1) {
            $result = TodoItem::updateTodo($todoId, $title, $completed);
        }

        $this->redirect('/');
    }

    public function delete($urlParams)
    {
        $result = TodoItem::deleteTodo($urlParams['id']);
        if ($result) {
            $this->redirect('/');
        } else {
            throw new \Exception("Redirection failed.");
        }
    }

    public function toggle()
    {
        $body = filter_body();
        $toggleAll = isset($body['toggle-all']) ? "true" : "false";
        
        $result = TodoItem::toggleTodos($toggleAll);
        if ($result) {
            $this->redirect('/');
        } else {
            throw new \Exception("Redirection failed.");
        }
    }

    public function clear()
    {
        $result = TodoItem::clearCompletedTodos();
        if ($result) {
            $this->redirect('/');
        } else {
            throw new \Exception("Redirection failed.");
        }
    }
}

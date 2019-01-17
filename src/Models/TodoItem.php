<?php

namespace Todo;

class TodoItem extends Model
{
    const TABLENAME = 'todos'; // This is used by the abstract model, don't touch

    public static function createTodo($title)
    {
        $query = "INSERT INTO todos (title, created) VALUES ('$title', now());";
        static::$db->query($query);
        $result = static::$db->execute();
        return $result;
    }

    public static function updateTodo($todoId, $title, $completed = null)
    {
        $query = "UPDATE todos SET title = '$title', completed = '$completed' WHERE id = '$todoId';";
        static::$db->query($query);
        $result = static::$db->execute();
        return $result;
    }

    public static function deleteTodo($todoId)
    {
        $query = "DELETE FROM todos WHERE id='$todoId';";
        static::$db->query($query);
        $result = static::$db->execute();
        return $result;
    }
    
    
    public static function toggleTodos($toggleAll)
    {
        $query = "UPDATE todos SET completed = '$toggleAll';";
        static::$db->query($query);
        $result = static::$db->execute();
        return $result;
    }

    public static function clearCompletedTodos()
    {
        $query = "DELETE FROM todos WHERE completed = 'true';";
        static::$db->query($query);
        $result = static::$db->execute();
        return $result;
    }
}

<header class="header">
    <h1><span style="color:#149FA6">Todo<span style="color:#D0002E">MVC</span></h1>
    <form id="create-todo" method="post" action="todos">
      <input name="title" class="new-todo" placeholder="What needs to be done?" autofocus>
    </form>
</header>

<section class="main">
    <form method="POST" action="/todos/toggle-all">
        <input type="checkbox" name="toggle-all" id="toggle-all" class="toggle-all" onChange="submit();"
        <?php 
            if (count(array_filter($todos, function ($todo) {return $todo['completed'] === "false";})) === 0){
                echo "checked";
            }
        ?> 
        >
        <label for="toggle-all">Mark all as complete</label>
    </form>
    
</section>
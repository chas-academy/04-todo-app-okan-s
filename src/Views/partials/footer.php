<footer class="footer">
    <span class="todo-count"><?= count(array_filter($todos, function ($todo) {
    return $todo['completed'] === "false";
})) ?>
        item<?= "".count($todos) !== 1 ? "s" : "" ?>
        left</span>
    <form method="POST" action="todos/clear-completed">
        <button class="clear-completed" style="padding: 0px 5px; border: 1px solid #e0e0e0; border-radius: 5px;">Clear completed</button>
    </form>
</footer>

</main>

<footer class="site-footer">
    <div class="small-container">
        <p class="text-center"">Made by <a href="https://github.com/okan-s" style="color: #149FA6;">Okan S.</a></p>
    </div>
</footer>

<script type="module" src="<?= $this->getScript('scripts'); ?>"></script>

</body>

</html>
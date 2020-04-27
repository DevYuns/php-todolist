<?php if (!isset($lists)): ?>
    <p id="mainMessage">
        Keep calm and make a list.
    </p>
<?php else: ?>
    <?php foreach ($lists as $index => $list): ?>
        <div class="list">
            <div class="imgDecor">
                <img src="/practice3_todolist/public/images/check.png" class="checkList"
                     onclick="finishedList(<?= $index ?>)"/>
            </div>
            <?php if (isset($_GET['id']) && $_GET['id'] == $list['id']): ?>
                <div>
                    <form action="/practice3_todolist/public/updateList.php" class="content updateForm" method="GET">
                        <input type="hidden" name="listId" value="<?= $list['id'] ?>"/>
                        <input type="text" name="content" class="editedText" value="<?= $list['content'] ?>"/>
                        <input type="submit" value="Edit"/>
                    </form>
                </div>
            <?php else: ?>
                <div class="content">
                    <p><?php echo htmlspecialchars($list['content'], ENT_QUOTES, 'UTF-8') ?></p>
                </div>
                <div class="update">
                    <a href="/practice3_todolist/public/index.php?id=<?= $list['id'] ?>">
                        <img src="/practice3_todolist/public/images/update.png" class="updateButton"/>
                    </a>
                </div>
                <div class="delete">
                    <form action="deleteList.php" name="deleteForm" class="deleteForm" method="GET">
                        <input type="hidden" name="id" value="<?= $list['id'] ?>"/>
                        <input type="image" src="/practice3_todolist/public/images/delete.png" alt="submit"
                               class="deleteButton" value="delete"
                               onclick="confirm('Are you sure you want to delete this list?');"/>
                    </form>
                </div>
            <?php endif; ?>
        </div>
        <script>
            function finishedList(index) {
                const textDecorationNone = 'text-decoration: none;'
                let content = document.getElementsByClassName('content')[index];
                let textDecoration = content.style.cssText;
                if (textDecoration == textDecorationNone || textDecoration == '') {
                    content.style.cssText = 'text-decoration:line-through;';
                } else {
                    content.style.cssText = textDecorationNone;
                }
            }
        </script>
    <?php endforeach; ?>
<?php endif; ?>
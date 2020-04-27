<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="../public/CSS/normalize.css v8.0.1.css"/>
    <link rel="stylesheet" href="../public/CSS/toDoList.css"/>
    <title>To-Do list</title>
</head>
<body>
<section id="container">
    <header>
        <h1 id="title"><a href="/../practice3_todolist/public/index.php">To-do list :</a></h1>
    </header>
    <main>
        <div id="toDoList">
            <?= $output ?>
        </div>
        <div id="createList">
            <p>What do you need to do?</p>
            <form action="./addList.php" name="af" id="add" method="post" onsubmit="checkForm()">
                <input type="text" name="content"/>
                <input
                        type="image"
                        src="/../practice3_todolist/public/images/add.png"
                        alt="submit"
                />
            </form>
        </div>
    </main>
</section>
<script>
    function checkForm() {
        var addFrom = document.af;
        if (af.content.value == "") {
            af.content.focus();
            alert('You should fill in the form :-)');
            return false;
        } else {
            return true;
        }
    }
</script>
</body>
</html>
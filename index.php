<?php
define('FCPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
$connection = require_once './method/Connection.php';

$notes = $connection->getNotes();

$currentNote = [
  'id' => '',
  'title' => '',
  'description' => ''
];

if (isset($_GET['id'])) {
  $currentNote = $connection->getNoteByID($_GET['id']);
}

// echo '<pre>',print_r($currentNote),'</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>記事本 | CRUD練習</title>
  <meta name="description" content="PHP + MySQL 的簡易記事本 (便利貼)">
  <link rel="shortcut icon" href="./images/favicon.png" type="image/png" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@300;400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./scss/main.css">
</head>

<body>
  <div class="main">
    <form class="new-note" action="./method/save.php" method="post">
      <h2>優質便利貼</h2>
      <input type="hidden" name="id" value="<?php echo $currentNote['id'] ?>" class="text_input">
      <input type="text" name="title" placeholder="請輸入標題" class="text_input" autocomplete="off" value="<?php echo $currentNote['title'] ?>">
      <textarea name="description" cols="30" rows="4" placeholder="請輸入內容" class="text_input">
        <?php echo $currentNote['description'] ?>
      </textarea>
      <button id="add">
        <?php if ($currentNote['id']) : ?>
          更新內容
        <?php else : ?>
          新增內容
        <?php endif; ?>
      </button>
    </form>

    <div class="notes">

      <?php foreach ($notes as $note) : ?>

        <div class="note">
          <div class="title">
            <a href="?id=<?php echo $note['id']; ?>">
              <?php echo $note['title']; ?>
            </a>
          </div>
          <p class="date">
            <?php echo $note['create_data']; ?>
          </p>
          <div class="description">
            <?php echo $note['description']; ?>
          </div>
          
          <form action="./method/remove.php" method="post">
            <input type="hidden" name="id" value="<?php echo $note['id'] ?>">
            <button class="close">X</button>
          </form>
        </div>

      <?php endforeach; ?>
    </div>
  </div>

  <script src="./js/app.js"></script>
</body>

</html>
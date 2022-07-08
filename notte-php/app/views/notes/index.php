<?php require __DIR__ . '/../partials/header.php' ?>
<div id="note--index">
  <div id="bar">
    <form action="/notes.php" method="get">
      <input type="text" name='query' />
      <input type="submit" value="SEARCH">
    </form>
  </div>
  <div id="notes">
    <? foreach($notes as $note): ?>
      <a class='note-outer' href='/notes.php?note=<?= $note->id ?>'>
        <div class="note">
          <section class="body">
            <?= $note.note ?>
          </section>
        </div>
      </a>
    <? endforeach; ?>
  </div>
</div>
<?php require __DIR__ . '/../partials/footer.php' ?>
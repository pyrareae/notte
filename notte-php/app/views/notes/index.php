<div id="note--index">
  <div id="bar">
    <form action="/notes" method="get">
      <input type="text" name='query' />
      <input type="submit" value="SEARCH">
    </form>
  </div>
  <div id="notes">
    <?php foreach($notes as $note): ?>
      <?= var_dump($note) ?>
      <a class='note-outer' href='/notes?note=<?= $note['id'] ?>'>
        <div class="note">
          <section class="body">
            <?= $note['note']?>
          </section>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</div>
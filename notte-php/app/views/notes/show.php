<?php require __DIR__ . '/../partials/header.php' ?>
<div id="note--show">
  <div id="note">
    <section class="body">
      <?php echo $note ?>
    </section>
    <section class="controls">
      <a href="#">Edit</a>
      <a href="#">Back</a>
      <form class='right'>
        <input type='submit' value='Delete' class='danger'/>
      </form>
    </section>
  </div>
</div>
<?php require __DIR__ . '/../partials/footer.php' ?>
<?php include dirname(__FILE__) . '/../partials/header.php' ?>
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
<?php include dirname(__FILE__) . '/../partials/footer.php' ?>
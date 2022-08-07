<?php
function layout($viewPath, $ctx){
  // redeclare the context as vars in this scope
  foreach($ctx as $name => $value) { $$name = $value; }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Notte -- php</title>
    <link href="/assets/app.css" rel="stylesheet"/>
  </head>
  <body>
    <?php require $viewPath ?>
  </body>
</html>

<?php }; ?>
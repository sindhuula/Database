<?php
session_start();
?>
<!DOCTYPE html>
<html>
<?php
session_unset();
session_destroy();
?>
<frameset rows="30%,70%" >
  <frame src="header.php" scrolling = "no" noresize="noresize" name = "head">
  <frame src="start.html" name = "main">
</frameset>
</html>
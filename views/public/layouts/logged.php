<?php
    if (isset($_GET['destroy']))
        session_unset();
?>
<form action="" method="get">
    
    <button name="destroy">destroy</button>
    
</form>
<pre>
    <?php print_r($_SESSION); ?>
</pre>
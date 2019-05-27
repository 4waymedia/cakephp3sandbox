<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="message notice" onclick="this.classList.add('hidden');"><?php echo  $message ?></div>
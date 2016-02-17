<?php if (!empty($row->field_field_audio_embed[0]['raw']['value'])): ?>
  <div style="float: right; margin: 0 2px 15px 15px;">
  <?php
    print $row->field_field_audio_embed[0]['raw']['value'];
  ?>
  </div>
<?php endif; ?>
<?php print $output; ?>


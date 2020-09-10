<?php

function auto_js_loader($path) {
  $content = scandir($path);

  foreach ($content as $files) {
    if ($files !== '.' && $files !== '..') {
      if (is_dir("$path/$files") === TRUE) {
        auto_js_loader("$path/$files");
      } else {
        ?>
        <script src="<?php echo "$path/$files" ?>"></script>
        <?php
      }
    }
  }
}

auto_js_loader('public/js');

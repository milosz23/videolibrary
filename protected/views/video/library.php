<?php

foreach (array_reverse($data) as $value) {
    echo "<div id='library_item'>";
        echo "<div id='library_header'>";
            echo '<h3>' . $value->title . '</h3>';
        echo "</div>";
        echo "<div id='library_image'>";
            echo '<a href="' . $redirect . '&id='. $value->id . '"><img src=' . $value->image . ' height="150" ></a>';
        echo "</div>";
    echo "</div>";
}

?>
<?php
Yii::app()->clientScript->registerScriptFile(
   Yii::app()->baseUrl.'/js/script.js'
);

?>
<h3 id="upper_title" class="page_info">Provide links to your favourite YouTube videos  to store them in library</h3>


<?php
if ( isset($status) ) echo $status;
?>

<form action="" method='post' onkeydown="if (event.keyCode == 13) return false;">
    <ul>
        <li>
            <input id="url" class="wide_input" type="url" name='url' placeholder=' link to your video '>
        </li>
        <li>
            <input id='url_button' type="button" value = 'add url!' style="visibility: visible" onclick="urlButtonPressed()">
        </li>
        <li>
            <input id="title" type="text" class="wide_input" name='title' style="visibility: hidden">
        </li>
        <li>
            <textarea id="description" class="wide_input" name='description' rows='5' style="visibility: hidden"></textarea>
        </li>
        <li><input id="submit_button" type="submit" value = 'GO!' style="visibility: hidden"></li>

        <li>
            <input id="image" name='image' style="display: none">
        </li>
        <li>
            <input id="video_url" name='video_url' style="display: none">
        </li>
    </ul>
</form>
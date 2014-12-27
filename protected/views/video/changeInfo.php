<h3 class="page_info">Set title and description for your video:</h3>
<form action="" method='post'>
    <ul>
        <li>
            <input type="text" class="wide_input" name='title' value="<?= htmlspecialchars($title); ?>">
        </li>
        <li>
            <textarea class="wide_input" name='description' rows='5'><?= htmlspecialchars($description); ?></textarea>
        </li>
        <li><input type="submit" value = 'GO!'></li>

        <input type="hidden" name='video_url' value="http://www.youtube.com/embed/<?= $video_id; ?>">
        <input type="hidden" name='image' value="<?= $image; ?>">
    </ul>
</form>
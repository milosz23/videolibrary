<h3 class="page_info">Provide links to your favourite YouTube videos  to store them in library</h3>


<?php
if ( isset($status) ) echo $status;
?>

<form action="" method='post'>
    <ul>
        <li>
            <input class="wide_input" type="url" name='video_url' placeholder=' link to your video '>
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
    </ul>
</form>

<script>
    
    function urlButtonPressed()
    {
        var xhr = new XMLHttpRequest();
    
        var title;
        var description;
    
        xhr.onreadystatechange = someCallback;
    
    
        function someCallback() {
            if (xhr.readyState==4 && xhr.status==200){
                var parser = new DOMParser();
                var xmlDoc = parser.parseFromString (xhr.responseText, "text/xml");
                description = xmlDoc.getElementsByTagName("description")[0].firstChild.nodeValue;
                title = xmlDoc.getElementsByTagName("title")[0].firstChild.nodeValue;
                changeForm();
            }
        }
    
        xhr.open('POST','test.php',true);
        xhr.send('');
    
        function changeForm() {
            //hide url button
            document.getElementById("url_button").style.visibility = "hidden";
            //show title, description and set values
            elTitle = document.getElementById("title");
            elDescription = document.getElementById("description");
            elTitle.value = title;
            elTitle.style.visibility = "visible";
            elDescription.style.visibility = "visible";
            //show submit button
            document.getElementById("submit_button").style.visibility = "visible";
        }
    }
</script>
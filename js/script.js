function urlButtonPressed()
    {
        var xhr = new XMLHttpRequest();
    
        var title;
        var description;
        var image;
        var url;
        var video_url;
        url = document.getElementById("url").value;

        xhr.onreadystatechange = someCallback;
    
    
        function someCallback() {
            if (xhr.readyState==4 && xhr.status==200){
                var x;
                var json = xhr.responseText;
                if (!json) 
                {
                    document.getElementById("upper_title").innerHTML = "Valid link, plaese:";
                }
                else
                {
                    var json_obj = JSON.parse(json);

                    title = json_obj.title;
                    description = json_obj.description;
                    image = json_obj.image;
                    video_url = json_obj.video_url;              
                    changeForm(); 
                }
                
            }
        }
    
        xhr.open('POST','index.php?r=video/ajax',true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.send("url=" + url);
    
        function changeForm() {
            //set page title
            document.getElementById("upper_title").innerHTML = "Set title and description for your video:";
            //hide url and button
            document.getElementById("url_button").style.display = "none";
            document.getElementById("url").style.display = "none";
            //show title, description and set values
            elTitle = document.getElementById("title");
            elDescription = document.getElementById("description");
            elTitle.value = title;
            elDescription.value = description;
            elTitle.style.visibility = "visible";
            elDescription.style.visibility = "visible";
            //set image value
            document.getElementById("image").value = image;
            //set video_url value
            document.getElementById("video_url").value = video_url;
            //show submit button
            document.getElementById("submit_button").style.visibility = "visible";
        }
    }
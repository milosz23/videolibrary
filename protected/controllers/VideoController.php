<?php

class VideoController extends Controller
{
    /**
     * main page,add new video
     */
    public function actionIndex()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') 
        {
            VideoLibrary::update_db($_POST['video_url'], $_POST['title'], $_POST['description'], $_POST['image']);                
            $this->redirect('index.php?r=video/library');
        }
        else
        {
            $this->render('addVideo');
        }
    }


    /**
     * make response to javascript request
     * (return xml with title,description,image and url of input video)
     */
    public function actionAjax()
    {
        $url = $_POST['url'];
        $video_id = VideoLibrary::get_video_id($url);
        //check if link was parsed succesfully
        if ( $video_id ) 
        {
            $json_output = VideoLibrary::get_json_output($video_id);
            $title = VideoLibrary::get_info($json_output,'title');
            $description = VideoLibrary::get_info($json_output,'description');
            $image = VideoLibrary::get_info($json_output,'thumbnails')->high->url;
            $video_url = "http://www.youtube.com/embed/" . $video_id;
            $json_array = ["title"=>$title, "description"=>$description, "image"=>$image, "video_url"=> $video_url ];
            echo json_encode($json_array);

        }
    }

    /**
     * second page, list of all videos
     */
    public function actionLibrary()
    {
        $all_videos = VideoLibrary::model()->findAll();
        $this->render('library', array('data'=>$all_videos,'redirect'=>'index.php?r=video/third'));
    }

    /**
     * third page, watch video
     */
    public function actionThird()
    {
        $id = $_GET['id'];

        $title = VideoLibrary::model()->findByPK($id)->title;
        $description = VideoLibrary::model()->findByPK($id)->description;
        $url = VideoLibrary::model()->findByPK($id)->url;
        $this->render('watchVideo', array('url'=>$url,'title'=>$title,'description'=>$description) );
    }


}
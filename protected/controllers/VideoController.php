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
            //1 step, get video information through video_url
            if ( !isset($_POST['title']) && !isset($_POST['description']) ) 
            {
                $video_url = $_POST['video_url'];
                $video_id = VideoLibrary::get_video_id($video_url);
                //check if link was parsed succesfully
                if ( $video_id ) 
                {
                    $json_output = VideoLibrary::get_json_output($video_id);
                    $title = VideoLibrary::get_info($json_output,'title');
                    $description = VideoLibrary::get_info($json_output,'description');
                    $image = VideoLibrary::get_info($json_output,'thumbnails')->high->url;
                    //render page where user can change title and description
                    $this->render('changeInfo',array('title'=>$title,'description'=>$description,'image'=>$image,'video_id'=>$video_id));                    
                }
                //set error meaasge, if link broken
                else 
                {
                    $this->render('addVideo', array('status'=>'please provide valid link to youtube video'));                    
                }
            }
            //2 step, update DB with video info changed by user 
            else 
            {
                VideoLibrary::update_db($_POST['video_url'], $_POST['title'], $_POST['description'], $_POST['image']);                
                $this->redirect('index.php?r=video/library');
            }
        }
        else
        {
            $this->render('addVideo');
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
<?php
/*
Class for working with DB table, that containts info about YouTube videos

CREATE TABLE video (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(200) NOT NULL,
    url VARCHAR(200) NOT NULL,
    image VARCHAR(200) NOT NULL,
    email VARCHAR(60) NOT NULL,
    description TEXT NOT NULL
)
*/
class VideoLibrary extends CActiveRecord
{
    //config AR ----------------------------------------
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
 
    public function tableName()
    {
        return 'video';
    }
    //---------------------------------------------------


    /**
     * Uses google API to get info about youtube video
     * @param  int $video_id
     * @return string json with youtube video's data
     */
    public static function get_json_output($video_id)
    {
        $url = "https://www.googleapis.com/youtube/v3/videos?id=" . $video_id . 
               "&part=snippet&key=AIzaSyDOkg-u9jnhP-WnzX5WPJyV1sc5QQrtuyc";
        $response = file_get_contents($url);
        return json_decode($response);
    }


    /**
     * Get particular info from big json info pack
     *@param string $video_id
     *@param string $info (title, description..) 
     *@return string particular info
     */
    public static function get_info($json_output, $info)
    {
        return $json_output->items[0]->snippet->$info;
    }


    /**
     * Parses url to get video id
     *@param string $video_url
     *@return string video id from video url
     */
    public static function get_video_id($video_url)
    {
        // https://www.youtube.com/watch?v=nOkIrS6ywCc
        parse_str( parse_url( $video_url, PHP_URL_QUERY ), $parse_array );
        if ( !isset($parse_array['v'])) {
            return false;
        }
        return $parse_array['v'];
    }    

    /**
     * Updates DB
     * @param  string $video_url
     * @param  string $title
     * @param  string $description
     * @param  string $image
     * @return updates DB
     */
    public static function update_db($video_url, $title, $description, $image) 
    {
        $Library = new VideoLibrary();
        $Library->url = $video_url;
        $Library->title = htmlspecialchars($title);
        $Library->description = htmlspecialchars($description);
        $Library->image = $image;
        $Library->save();
    }



    public static function xml_output($video_url, $title, $description, $image) 
    {

    }
}
?>
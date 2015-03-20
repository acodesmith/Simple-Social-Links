<?php
/**
 * Social Media Share Links
 * See Github or Readme for help
 * https://github.com/acodesmith/Simple-Social-Links
 */

class SocialMediaShareLinks {

    public $options = array(
        'facebook'=>array(
            'u'=>'url',
        ),
        'twitter'=>array(
            'url',
            'text'=>'title',
            'via',
            'hashtags'
        ),
        'google'=>array(
            'url',
        ),
        'pinterest'=>array(
            'media'=>'img',
            'url',
            'is_video',
            'description'=>'title'
        ),
        'linkedin'=>array(
            'url',
            'title'
        ),
        'buffer'=>array(
            'text'=>'title',
            'url'
        ),
        'digg'=>array(
            'url',
            'title'
        ),
        'tumblr'=>array(
            'url',
            'name'=>'title',
            'description'=>'desc'
        ),
        'reddit'=>array(
            'url',
            'title'
        ),
        'stumbleupon'=>array(
            'url',
            'title'
        )
    );

    public $links = array(
        'facebook'=>'http://www.facebook.com/sharer.php',
        'twitter'=>'https://twitter.com/share',
        'google'=>'https://plus.google.com/share',
        'pinterest'=>'https://pinterest.com/pin/create/bookmarklet/',
        'linkedin'=>'http://www.linkedin.com/shareArticle',
        'buffer'=>'http://bufferapp.com/add',
        'digg'=>'http://digg.com/submit',
        'tumblr'=>'http://www.tumblr.com/share/link',
        'reddit'=>'http://reddit.com/submit',
        'stumbleupon'=>'http://www.stumbleupon.com/submit'
    );

    public $processed;

    /**
     * @param $values
     * @param array $links
     */
    public function __construct($values, $links=array())
    {
        $links = !empty($links) ? array_intersect_key($this->links, array_flip($links))
            : $this->links;

        foreach($links as $link=>$url){
            //Check the URL is legit
            if(isset($this->options[$link]) && is_array($this->options[$link])){

                $temp_link = $url.'?';
                $count = 0;

                foreach($values as $user_key=>$user_value){
                    //Check the option is legit
                    $url_key = array_search($user_key,$this->options[$link]);

                    if(!empty($url_key) || $url_key === 0){
                        $count++;
                        $temp_link.= ($count > 1 ? '&' : '') . ( is_string($url_key) ? $url_key : $user_key ) . '=' . urlencode($user_value);
                    }
                }

                //Constructors don't return data, so we set it
                $this->processed[$link] = $temp_link;
            }
        }
    }
}
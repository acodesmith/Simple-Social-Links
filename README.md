# Simple Social Links
###Class Creating Simple Social Links.

The class can be used on it's own or as a wordpress plugin. The current repo is set up to be a wordpress plugin.

__simple_social_links__ is the wordpress plugin folder.

###Example Usage
Example for a limited number of links.
```php
<?php
$social_links = get_the_social_links(
    array(
        'url'=>'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'],
        'title'=>get_the_title(),
        'via'=>'acodesmith'
    ),
    array(
        'facebook',
        'twitter',
        'google',
        'stumbleupon'
    )
);

//Create icon links
foreach($social_links as $name=>$link): ?>
    <a href="<?php echo $link; ?>" target="_blank">
        <i class="icon-<?= $name; ?>"></i>
    </a>
<?php endforeach; ?>
```

###Function Parameters
The main wordpress plugin function is "get_the_social_links"

The function has two parameters. The first parameter contains information for the link.
The URL is the only required value, other values will be used as needed per social media site.

####All Link Options
#####Only certain sites, use certain options. For example Twitter uses via
```php
$options = array(
    'url' => 'http://siteToShare.com',
    'title' => 'Title to Share',
    'via' => 'acodesmith', //Twitter only! Will link @acodesmith
    'hashtags' => 'webdev', //Twitter only! Will tag #webdev
    'img'=>'http://wwww.example.com/image.jpg', //Pinterest Only! Full URL needed.
    'is_video' => 1, //Pinterest Only! Is the img link a video?
    'desc'=> 'Longer description of text' //Tumblr only!
);

get_the_social_links($options);

```

####Link Options
#####If left blank, all links will be returned by default
Get only facebook and twitter links with a URL and title.
```php
$options = array(
    'url' => 'http://siteToShare.com',
    'title' => 'Title to Share',
);

$links = array(
    'facebook',
    'twitter'
);

get_the_social_links($options, $links);

```

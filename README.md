# Simple Social Links
###Class Creating Simple Social Links.

The class can be used on it's own or as a wordpress plugin. The current repo is set up to be a wordpress plugin.
The php class was based on the word of (this javascript social share link repo)[https://github.com/bradvin/social-share-urls].

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
    <a href="<?= $link; ?>" target="_blank">
        <i class="icon-<?= $name; ?>"></i>
    </a>
<?php endforeach; ?>
```

###Function Parameters
The main wordpress plugin function is "get_the_social_links". The function returns an array of links
related to the site.

```php
//return example
array(
    'facebook'=>'http://www.facebook.com/sharer.php?u={url}',
    'twitter'=>'https://twitter.com/share?url={url}&text={title}&via={via}&hashtags={hashtags}'
);
```

The function has two parameters. The first parameter contains information for the link.
The URL is the only required value, other values will be used as needed per social media site.

####All Link Options
#####Only certain sites, use certain options.
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

$social_links = get_the_social_links($options);

```
All browsers have a length limit for urls, so __be aware__ of the description length!

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

$social_links = get_the_social_links($options, $links);

```

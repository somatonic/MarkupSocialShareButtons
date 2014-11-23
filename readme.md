
# MarkupSocialShareButtons

This module outputs a list of share links for the following services by default

* E-Mail (kinda extra)
* Facebook
* Twitter
* Google+
* LinkedIn
* Tumblr
* Reddit (default off)
* Pinterest (default off)

## Usage examples

```
echo $modules->MarkupSocialShareButtons->render();
```

This outputs a simple UL list with links

```
<ul class='MarkupSocialShareButtons cf'>
    <li class='mssb-item mssb-facebook mssb-popup'>
        <a href='url'><i>facebook</i></a>
    </li>
    ... etc ...
</ul>
```

## Options

THe module configuration GUI allows to configure all options to your need that will be
the default for your site. You can choose premade themes, configure links and even parameters
for each service link.

However you can also set all options in your template API call. Just create an array of options you need
and give that the render() method.

All options available:

```
$options = array(

    // most likely to be used

    "show" => array(
        "email",
        "facebook",
        "googleplus",
        "twitter",
        "linkedin",
        "tumblr",
        // "reddit",
        // "pinterest",
        ),

    "url" => "",
    "title" => "",
    "text" => "",
    "source" => "", // linkedin
    "tags" => "", // twitter
    "media" => "", // pinterest, requires a url of img/video urlencoded

    "title_fields" => "headline|title", // if no title set use these fields to search
    "text_fields" => "description|summary|body", // if no text set use these fields to search

    "theme" => null,
    "namespace" => "mssb-",
    "char_limit" => 100,
    "char_limit_sypnosis" => " …",


    // following can be set but most likely not

    /* Email Params
            subject     : the mail subject (needs caution)
            body        : the mail body
     */
    "email_url"             => "mailto:",
    "email_params"          => "?subject={title}&body=%0A%0A{url}%0A%0A{text}",// %0A = linebreak
    "email_icon"            => "<i>email</i>",

    /* Facebook Params
            u           : the page URL
     */
    "facebook_url"          => "https://www.facebook.com/sharer/sharer.php",
    "facebook_params"       => "?u={url}",
    "facebook_icon"         => "<i>facebook</i>",

    /* Google+ Params
            url         : the page URL
     */
    "googleplus_url"        => "https://plus.google.com/share",
    "googleplus_params"     => "?url={url}",
    "googleplus_icon"       => "<i>google+</i>",

    /* Twitter Params
            url         : the page URL
            text        : optional text
            hashtags    : a comma-delimited set of hashtags
     */
    "twitter_url"           => "https://twitter.com/intent/tweet",
    "twitter_params"        => "?url={url}&text={text}&hashtags={tags}",
    "twitter_icon"          => "<i>twitter</i>",

    /* LinkedIn Params
            mini        : must be set to ‘true’
            url         : the page URL
            source      : the company/named source (200 characters maximum)
            title       : article title (200 characters maximum)
            summary     : a short description (256 characters maximum)
     */
    "linkedin_url"          => "http://www.linkedin.com/shareArticle",
    "linkedin_params"       => "?mini=true&url={url}&title={title}&summary={text}&source={source}",
    "linkedin_icon"         => "<i>linkedin</i>",


    /* Tumblr Params
            url         : the page URL
            name        : article title
            description : article description
     */
    "tumblr_url"          => "http://www.tumblr.com/share/link",
    "tumblr_params"       => "?url={url}&name={title}&description={text}",
    "tumblr_icon"         => "<i>tumblr</i>",

    /* Reddit Params
            url         : the page URL
            title       : article title
     */
    "reddit_url"          => "http://www.reddit.com/submit",
    "reddit_params"       => "?url={url}&title={title}",
    "reddit_icon"         => "<i>reddit</i>",

    /* Pinterest Params
            url         : the page URL
            media       : Mandatory if you use this service, media full http url (image, video)
            description : article description or title
     */
    "pinterest_url"          => "https://pinterest.com/pin/create/bookmarklet/",
    "pinterest_params"       => "?media={media}&url={url}&description={text}",
    "pinterest_icon"         => "<i>tumblr</i>",

);
```

An example call usually could look like this:

```
$options = array(
    "show" => array(
        "email",
        "twitter",
        "facebook",
        ),
    );

echo $modules->MarkupSocialShareButtons->render($options);
```

Would only show the email, twitter and facebook links in the order specified.

## Shared URL

The shared url is taken from the current viewed page if none is specified. You can specify a custom URL, that may even require url segments or aren't the currently viewed page manually. Just make sure it is full url with the http protocol like: http://www.mydomain.com/some/page/url?foo=yoo

## Title and Text

If no title or url is manually set, the module tries to looks for current page's url, title and text.
You can configure what fields the module should look for. Defaults are:

```
"title_fields" => "headline|title"
"text_fields" => "description|summary|body"
```

You can can set multiple fields using pipe symbol: headline|title|summary.
It would take the first field found with a value in the order specified.

## Themes

There comes several premade PNG icon themes with the module, but you can add your own themes easily.

Important: If you choose a bundled theme, you have to include the theme.css to your site. Also if you want to handle the links in a popup, you can take the bundled example script ```example-jquery-popop.js``` and add it to your site.

If you want to create custom one. Copy one like the ```/themes/black/``` somewhere to your ```/site/``` folder
and modify it to your needs. You can then use the path and foldername of the theme in the options.

```
echo $modules->MarkupSocialShareButtons->render(array("theme" => "templates/mythemes/mytheme");
```

This will try to load the php theme file located in

```
/site/templates/mythemes/mytheme/theme.php
```

This file must contain an array ```$socialIcons``` for the markup of the icons used by the module. It looks like this:

```
$socialIcons = array(
    'email_icon'        => '<img src="{themeUrl}png/mail.png"/>',
    'googleplus_icon'   => '<img src="{themeUrl}png/googleplus-square.png"/>',
    'facebook_icon'     => '<img src="{themeUrl}png/facebook-square.png"/>',
    'twitter_icon'      => '<img src="{themeUrl}png/twitter.png"/>',
    'linkedin_icon'     => '<img src="{themeUrl}png/linkedin.png"/>',
);
```

```{themeUrl} and $themeUrl``` is provided by the module with the absolute url to your current theme folder
You may use wire("config")->urls or $this->config->urls->root etc to have custom urls.

# Assets JS and CSS

If you choose one of the premade bundled themes, you'd have to copy the proper theme.css to your site CSS manually.

Along with the module comes an example jQuery script ```example-jquery-popup.js``` you can add to your script to handle the popups.

[config screen](https://raw.githubusercontent.com/somatonic/MarkupSocialShareButtons/master/module-config-screen.png)

# Adding new custom services

Maybe you wish to add services to the module that aren't supported. You can simply add a an config array to your site/config.php.

```
$config->MarkupSocialShareButtonsServices = array(
    "example" => array(
        "example_url" => "http://exampleurl.com/",
        "example_params" => "?url={url}&description={text}",
        "example_icon" => "<img src='{themeUrl}png/example.png'>",
        )
    );
```

This would be then picked up by the module and is available in the module config screen, just select it from the list to show. Alternatively you can always set the showed buttons via API when rendering using the options array.

If the icon is not in the bundled default themes, you may consider creating your own custom theme and add icons manually.

Alternatively you could also set a new service via the public method addServices(array) before rendering.

```
$exampleServices = array(
    "example" => array(
            "example_url" => "http://exampleurl.com/",
            "example_params" => "?url={url}&description={text}",
            "example_icon" => "<img src='{themeUrl}png/example.png'>",
        ),
    "example2" => array(
            "example2_url" => "http://example2url.com/",
            "example2_params" => "?url={url}&description={text}",
            "example2_icon" => "<img src='{themeUrl}png/example2.png'>",
        )
    );

$mssb = $modules->MarkupSociaShareButtons;
$mssb->addServices($exampleServices); // add service
echo $mssb->render(array(
        "show" => array("example")
    ));
```

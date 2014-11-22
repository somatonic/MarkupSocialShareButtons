
# MarkupSocialShareButtons

This module outputs a list of share links for the following services by default

* E-Mail (kinda extra)
* Facebook
* Twitter
* Google+
* LinkedIn

## Usage examples

```
echo $modules->MarkupSocialShareButtons->render();
```

This outputs a simple UL list with links

```
<ul class='MarkupSocialShareButtons'>
  <li class='mssb-item mssb-facebook mssb-popup'><a href='url'><i>facebook</i></a></li>
  etc ...
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

    "show" => array(
        "email",
        "facebook",
        "googleplus",
        "twitter",
        "linkedin"
        ),
    "title" => "",
    "text" => "",
    "source" => "",
    "url" => "",
    "tags" => "",

    "theme" => "black",
    "namespace" => "mssb-",
    "char_limit" => 100,
    "char_limit_sypnosis" => " …",

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
    "linkedin_params"       => "?mini=true&url={url}&title={title}&summary={text}",
    "linkedin_icon"         => "<i>linkedin</i>",

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
  ""
);

echo $modules->MarkupSocialShareButtons->render($options);
```

Would only show the email, twitter and facebook links in the order specified.

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
    'email_icon'        => '<img src="' . $themeUrl . 'png/mail.png"/>',
    'googleplus_icon'   => '<img src="' . $themeUrl . 'png/googleplus-square.png"/>',
    'facebook_icon'     => '<img src="' . $themeUrl . 'png/facebook-square.png"/>',
    'twitter_icon'      => '<img src="' . $themeUrl . 'png/twitter.png"/>',
    'linkedin_icon'     => '<img src="' . $themeUrl . 'png/linkedin.png"/>',
    );
```

```$themeUrl``` is provided by the module with the root url to your theme folder
You may use wire("config")->urls or $this->config->urls->root etc to have custom urls.

# Assets JS and CSS

If you choose one of the premade bundled themes, you'd have to copy the proper theme.css to your site CSS manually.

Along with the module comes an example jQuery script ```example-jquery-popup.js``` you can add to your script to handle the popups.

![config screen](https://raw.githubusercontent.com/somatonic/MarkupSocialShareButtons/master/module-config-screen.png)


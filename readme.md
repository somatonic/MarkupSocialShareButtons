
# MarkupSocialShareButtons

This module outputs share links for the following services by default

* E-Mail (kinda extra)
* Facebook
* Twitter
* Google+
* LinkedIn

## Usage examples

```
echo $modules->MarkupSocialShareButtons->render();
```

outputs a UL list with links

```
<ul class='MarkupSocialShareButtons'>
  <li class='item facebook popup'><a href='url'><i class="icon-facebook">facebook</i></a></li>
  etc ...
</ul>
```

The render() method accepts an array of options to specify title, text, tags and url.
Also which buttons are shown. By default all are shown, but you can specify which ones
and what order by using the "show" key with a comma separated string of the social buttons.

* User "show" for a list comma separated names which should be shown and in what order. Like "email, twitter, facebook, googleplus, linkedin"
* Use "title" for giving it custom title, else it will try to get it from the current page->title
* Use "text" to specify a custom text. If no text specified, it will try to get it from the $page->leadtext $page->summary or $page->body. The text will be truncated around 100 chars + sypnosis "…".
* Use "tags" to specify a comma separated list of tags that will be used for twitter.
* Use "url" to manually specify the url to share. You can specify the relative url and the module will, when the page url exists, add the full aboslute url using $page->httpUrl

```
$options = array(
  "show" => "email, twitter, facebook, googleplus, linkedin",
  "title" => $page->title,
  "text" => $page->summary,
  "tags" => "processwire,cms",
  "url" => $page->url,
  }

echo $modules->MarkupSocialShareButtons->render($options);
```

## Themes

There comes tow themes with the module, but you can add your own icons easily.
The two themes I included are SVG icons I created using http://customizr.net/icons/?set=social-media

"round"
"square"

To set a theme you can do that using setTheme("theme")

```
echo $socialbuttons->setTheme("round")->render($options);
```

If you want to create one. Copy the /theme/default.php to your templates folder
and modify it to your needs. You can then use the path and name

```
echo $socialbuttons->setTheme("theme/mytheme")->render();
```

This will try to load the php theme file located in

```
/site/templates/theme/mytheme.php
```

This file must contain an array ```$socialIcons``` for the markup of the icons used by the module. The default looks like this:

```
$socialIcons = array(
    'email'        => '<i class="icon-email">e-mail</i>',
    'googleplus'   => '<i class="icon-googleplus">google+</i>',
    'facebook'     => '<i class="icon-facebook">facebook</i>',
    'twitter'      => '<i class="icon-twitter">twitter</i>',
    'linkedin'     => '<i class="icon-linkedin">linkedin</i>',
    );
```

# Assets JS and CSS

Along with the module comes a example jQuery script ```MarkupSocialShareButtons.js``` you can add to your script to handle the popups.

There's also a ```example.css``` you can take to add to you CSS or simply create your own.



=== WP-RecentComments ===
Contributors: mg12
Donate link: http://www.neoease.com/plugins/
Tags: comments, widget, sidebar, AJAX
Requires at least: 2.5
Tested up to: 2.7
Stable tag: 1.7.3

Display recent comments in your blog sidebar.

== Description ==

Show the recent comments in your WordPress sidebar. You can limit the number of comments, set the maximum length of excerpts, filter out pingbacks and/or trackbacks. You can also enable or disable the avatars, resize and reposition them. Besides above, it supports WordPress Widget. And now, you can turn to the newer or older comments when you clicked on the paging buttons.

在 WordPress 的侧边栏显示最新评论。你可以限制显示评论的数量，设置评论摘要的最大长度，过滤反链接评论。你还可以显示或屏蔽评论者头像，调整头像的尺寸和位置。除此之外，此插件支持 WordPress Widget。而现在，你可以通过点击分页按钮来查看新旧评论。

**Features:**

* Support for East Asian characters
* Avatar support
* Widget support
* AJAX paging
* Goto comment details
* Separating pingbacks and trackbacks from comments
* Support 'Show smilies as graphic icons' option
* Filter quotes

**Supported Languages:**

* US English/en_US (default)
* 简体中文/zh_CN (translate by [mg12](http://www.neoease.com/))
* Français/fr_FR (translate by Luc Santeramo)
* Türkçe/tr_TR (translate by [Hamdi Kellecioglu](http://www.tirnakmakasi.com/))
* Russian/ru_RU (translate by [Алексей В.Ч.](http://www.alexnote.ru/))
* Italian/it_IT (translate by Enrico Flaminios)
* Spanish/es_ES (translate by Eugenio Cavero)
* Bulgarian/bg_BG (translate by [Emil Minev](http://www.inspirelearning.net/))
* German/de_DE (translate by [Sylvia Egger](http://sprungmarker.de/))
* Macedonian/mk_MK (translate by [Dimitar Talevski](http://www.solipamet.com/))
* Danish/da_DK (translate by [Morten L. Johansen](http://www.lystorp.com/))
* Hungarian/hu_HU (translate by János Csárdi-Braunstein)
* Israel Hebrew/he_IL (translate by [Roy Azrad](http://www.lawtech.co.il/))
* Polish/pl_PL (translate by [Chris Ostrowski](http://www.kierunek-sukces.pl/))
* Persian/fa_IR (translate by [Farzad Sagharchi](http://blog.sagharchi.ir/))
* Ukrainian/uk (translate by Jurko Chervony)
* Arabic/ar (translate by Mustafa)

**Demo:**

[http://www.neoease.com/](http://www.neoease.com/)

== Installation ==

1. Unzip archive to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. This is two ways to add the WP-RecentComments widget to the sidebar:
    * Go to 'Design->Widgets', and add the WP-RecentComments to your blog.
    * In your 'sidebar.php' file add the following lines:
****

    <h3>Recent Comments</h3>
    <ul><?php wp_recentcomments(); ?></ul>

OR

    <h3>Recent Comments</h3>
    <ul><?php echo wp_recentcomments($args='', $echo=false); ?></ul>

**Arguments:**

    NAME            TYPE       DESCRIPTION                    DEFAULT VERSIONS
    limit           integer    The number of comments.        5       1.0+
    length          integer    The length of each comment     50      1.1+
                               excerpt.
    post            true/false Show the post titles.          true    1.1+
    pingback        true/false Show the pingback comments.    true    1.1+
    trackback       true/false Show the trackback comments.   true    1.4.3+
    avatar          true/false Show author avatars.           true    1.1+
    avatar_size     integer    The size of avatars.           32      1.1+
    avatar_position left/right The position of avatars.       left    1.1+
    avatar_default  string     The default avatar.                    1.4.1+
    navigator       true/false Show navigator buttons.        true    1.3+
    administrator   true/false Show the comments from         true    1.4.2+
                               administrators.
    smilies         true/false Show smilies as graphic icons. false   1.6+

**Default Avatar:**

* You can only entry a filename from '/wp-recentcomments/avatars/' directory.
* When you want to use an Internet image, you have to entry the filepath and start with 'HTTP://'.

**Using Examples:**

    <?php wp_recentcomments('limit=10&length=20&post=false'); ?>
    <?php wp_recentcomments('pingback=false&navigator=true&administrator=false'); ?>
    <?php wp_recentcomments('avatar=true&avatar_size=16&avatar_position=right'); ?>
    <?php wp_recentcomments('avatar=true&avatar_default=default.jpg'); ?>
    <?php wp_recentcomments('avatar=true&avatar_default=http://www.neoease.com/avatar.gif'); ?>

**Custom CSS:**

* WP-RecentComments will load wp-recentcomments.css from your theme directory if it exists.
* If it doesn't exists, it will load the default style that comes with WP-RecentComments.

== Screenshots ==

1. WP-RecentComments widget.
2. The comment detail.
3. The comments on single post page.

== Changelog ==

****

    VERSION DATE       TYPE   CHANGES
    1.7.3   2009/03/07 NEW    Added Polish language support. (Thanks Chris Ostrowski)
                       NEW    Added Persian language support. (Thanks Farzad Sagharchi)
                       NEW    Added Ukrainian language support. (Thanks Jurko Chervony)
                       NEW    Added Arabic language support. (Thanks Mustafa)
                       FIX    Fixed bugs related to table names of DB when TABLE PREFIX is not 'wp_'.
    1.7.2   2009/02/05 NEW    Compatible with 'Reviewers Info' plugin.
                       NEW    Added Italian language support. (Thanks Enrico Flaminio)
                       NEW    Added Spanish language support. (Thanks eugenio)
                       NEW    Added Bulgarian language support. (Thanks Emil Minev)
                       NEW    Added German language support. (Thanks Sylvia Egger)
                       NEW    Added Macedonian language support. (Thanks Dimitar Talevski)
                       NEW    Added Danish language support. (Thanks Morten L. Johansen)
                       NEW    Added Hungarian language support. (Thanks János Csárdi-Braunstein)
                       NEW    Added Israel Hebrew language support. (Thanks Roy Azrad)
                       FIX    Fixed a bug when WordPress root directory in sub folder.
    1.7.1   2008/12/25 FIX    Fixed a bug about author names.
    1.7     2008/12/23 NEW    The comments of PRIVATE posts only display to its author.
                       NEW    The comments of PASSWORD PROTECTED posts only display when people enter the password.
    1.6.5   2008/12/16 NEW    Added Russian language support. (Thanks Алексей В.Ч.)
                       MODIFY Replaces double line-breaks with paragraph elements.
                       FIX    Fixed a bug related to convert emoticons to graphics.
    1.6.4   2008/11/29 FIX    Fixed AJAX actions in Microsoft Internet Explorers.
    1.6.3   2008/11/28 MODIFY To enable newline characters in detail pages.
                       MODIFY Updated the JavaScript and using namespace.
    1.6.2   2008/11/01 FIX    Fixed a bug related to widget function.
    1.6.1   2008/10/29 FIX    Fixed a display bug of comment detail.
    1.6     2008/10/29 NEW    Added 'smilies' argument.
                       NEW    Return an HTML string as the result.
                       NEW    Separating pingbacks and trackbacks from comments.
                       NEW    Perfect the links which beginning with '#'.
                       NEW    Added comment datetime to comment details.
                       MODIFY Remove all the blockquotes from recent comment list.
                       MODIFY Remove all the blockquotes but the outermost from detail comment.
                       MODIFY Any comments but pingbacks/trackbacks can goto their detail page.
                       DELETE Removed 'get_recentcomments()' method.
    1.5.4   2008/10/04 NEW    Added Turkish language support. (Thanks Hamdi Kellecioglu)
    1.5.3   2008/10/04 NEW    Added French language support. (Thanks Luc Santeramo)
    1.5.2   2008/09/08 FIX    Fixed a bug that make the detail buttons working when 'navigator=false'.
    1.5.1   2008/09/07 FIX    No link back to author when the URL is absented.
    1.5     2008/09/05 NEW    Show details.
                       FIX    Fixed bugs in localization.
    1.4.3   2008/07/26 NEW    Added 'trackback' argument.
                       FIX    Fixed a bug about avatars.
    1.4.2   2008/07/11 NEW    Added 'administrator' argument.
                       NEW    Added loading status.
                       FIX    Fixed bugs in localization.
    1.4.1   2008/07/06 NEW    Added default avatar support.
    1.4     2008/07/05 NEW    Added localization support.
                       NEW    Added Simplified Chinese language support.
                       NEW    Added 'newest' button to paging navigator.
                       NEW    WP-RecentComments will load 'wp-recentcomments.css' from your theme directory if it exists.
                       MODIFY Uses 'wp_recentcomments()' method instead of 'get_recentcomments()', but still support the old method for a period.
    1.3     2008/06/14 NEW    Added AJAX paging support.
                       MODIFY Show avatars by default.
    1.2.3   2008/06/08 FIX    Fixed a code comment.
                       FIX    Show approved comments only.
    1.2.2   2008/06/06 FIX    Rewrite code with a better style.
    1.2.1   2008/06/02 FIX    Compatible with some another plugins.
    1.2     2008/05/15 NEW    Added WordPress Widget support.
                       NEW    Apply CSS styles automatically.
    1.1.2   2008/05/11 FIX    'Anonymous' as names of comment authors who did not type in their names.
    1.1.1   2008/05/10 FIX    Fixed a bug of experpt length.
    1.1     2008/05/09 NEW    Works for WordPress 2.5 only.
                       NEW    Added 'pingback' and 'post' argument.
                       NEW    Added avatars support.
                       NEW    Added CSS support.
                       MODIFY New formatted argument list.
                       MODIFY Limit 20 comments.
    1.0     2008/03/09 NEW    Works for WordPress 2.2 and WordPress 2.3.
                       NEW    Support for East Asian characters.
                       NEW    Allow the user to set the maximum length of excerpts.
                       NEW    Allow the user to set the maximum number of comments to display in the sidebar.
                       NEW    Limit 15 comments.

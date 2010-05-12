<?php
ob_start ("ob_gzhandler");
header("Content-type: text/css; charset: UTF-8");
header("Cache-Control: must-revalidate");
$expires_time = 1440;
$offset = 60 * $expires_time ;
$ExpStr = "Expires: " .
gmdate("D, d M Y H:i:s",
time() + $offset) . " GMT";
header($ExpStr);
                ?>

/*** joomla.css ***/

.rt-joomla .rt-article {margin-bottom: 15px;}.rt-article {overflow: hidden;}.rt-author, .rt-date-posted, .rt-date-modified {display: block;font-size: 11px;}.rt-author {font-weight: bold;display: block;font-size: 12px;}.rt-joomla .rt-article-cat {float: left;margin-top: 10px;margin-bottom: 0;}.rt-joomla .rt-headline {margin: 15px 0;position: relative;}.rt-comment-text {text-align: right;display: block;margin-bottom: 15px;}.rt-joomla .rt-article-bg {border-bottom: none;padding: 0;}.rt-breadcrumb-surround {padding: 8px 25px;height: auto;}.rt-poll .rt-pollrow {padding: 6px 0 10px 0;}#form-login ul li, #com-form-login ul li, ul.rt-more-articles li, .rt-section-list ul li {list-style: none;}#form-login ul li a, #com-form-login ul li a, ul.rt-more-articles li a, .rt-section-list ul li a {padding-left: 18px;}#com-form-login ul {margin-top: 15px;}.rt-joomla .results ol.list {margin-top: 0;}.rt-joomla .results ol.list h4 {border: 0;margin-top: 0;margin-bottom: 0;display: inline;}.rt-joomla .results ol.list li {padding: 10px 5px;margin-bottom: 5px;}.rt-joomla .results ol.list li p {margin-top: 0;font-size: 90%;}.rt-joomla .results ol.list .description {margin-bottom: 15px;}.rt-joomla .results ol.list li span.small {font-size: 90%;}.rt-joomla .user legend, .rt-joomla .contact legend {text-transform: uppercase;font-weight: bold;font-size: 260%;}.rt-joomla .icon {display:block;width:15px;height:15px;float: right;margin-left:5px;}.rt-joomla .pdf {background-position: -36px 0;background-repeat: no-repeat;}.rt-joomla .print {background-position: 0 0;background-repeat: no-repeat;}.rt-joomla .email {background-position: -18px 1px;background-repeat: no-repeat;margin-right: 2px;}.rt-joomla .edit {background-position: -52px 1px;background-repeat: no-repeat;position: absolute;top: 0;right: 0;margin: 0;}#rt-main-surround .rt-joomla fieldset legend {text-transform: none;}.rt-joomla .edit-article fieldset legend {text-transform: uppercase;font-weight: bold;font-size: 180%;}.rt-joomla .edit-article fieldset div {overflow: visible;}#editor-xtd-buttons {padding: 5px 0;}.button2-left, .button2-right, .button2-left div, .button2-right div {float: left;}.button2-left a, .button2-right a, .button2-left span, .button2-right span {display: block;height: 22px;float: left;line-height: 22px;font-size: 11px;cursor: pointer;margin-bottom: 5px;}.button2-left span, .button2-right span {cursor: default;}.button2-left .page a, .button2-right .page a, .button2-left .page span, .button2-right .page span {padding: 0 6px;}.button2-left a:hover, .button2-right a:hover {text-decoration: none;}.button2-left a, .button2-left span {padding: 0 24px 0 6px;}.button2-right a, .button2-right span {padding: 0 6px 0 24px;}.button2-left .blank a {padding-right: 6px;}.img_caption.left {float: left;margin-right: 1em;}.img_caption.right {float: right;margin-left: 1em;}.img_caption.left p {clear: left;text-align: center;}.img_caption.right p {clear: right;text-align: center;}.img_caption {text-align: center!important;}.rt-joomla .edit-article fieldset div {margin-bottom: 8px;}.edit-article fieldset div input {padding: 3px;}.edit-article fieldset div .label-left {padding: 1px 0;}.edit-article fieldset div img.calendar {vertical-align: middle;margin-left: 5px;}.rt-joomla .user div {clear: both;margin-bottom:10px;}.roktabs-wrapper ul li {list-style: none;}body.rtl .rt-joomla .rt-article-cat {float: right;}body.rtl .rt-joomla .rt-article-icons {float: left;}body.rtl .rt-joomla .icon {float: left;margin-left: 0;margin-right: 3px;}body.rtl #form-login ul li a, body.rtl #com-form-login ul li a, body.rtl ul.rt-more-articles li a, body.rtl .rt-section-list ul li a {padding-left: 0;padding-right: 18px;}body.rtl .rt-joomla .icon {float: left;margin-left: 0;margin-right: 5px;}body.rtl .rt-joomla .edit {right: auto;left: 0;}body.rtl .button2-left, body.rtl .button2-right, body.rtl .button2-left div, body.rtl .button2-right div {float: right;}body.rtl #editor-xtd-buttons {float: right;}body.rtl .edit-article fieldset table {float: right;}body.rtl .rt-poll .rt-pollbuttons .readon {float: right;}

/*** style6.css ***/

body {background: #fff;color: #333;}a:hover {color: #000;}h1, h2, h3, h4, h5 {color: #333;}#rt-top {background: #0f0f0f url(../images/backgrounds/style6/header-bg.png) 100% 0;color: #999;}#rt-top .search .inputbox {background: url(../images/backgrounds/style6/search-bg.png) 0 0 no-repeat;color: #999;}#rt-top .title span {color: #ccc;}#rt-logo {background: url(../images/logo/style6/logo.png) 0 0 no-repeat;}#rt-header {background: #0f0f0f url(../images/backgrounds/style6/header-bg.png) 100% 0;}#rt-header2 {background: url(../images/backgrounds/style6/header-div.png) 50% 100% repeat-x;}#rt-header3 {background: url(../images/backgrounds/style6/header-div.png) 50% 0 repeat-x;}.backgroundlevel-high #rt-header4, .backgroundlevel-med #rt-header4 {background: url(../images/backgrounds/style6/header-underlay.png) 50% 0 no-repeat;}#rt-header .title span {color: #ccc;}#rt-header ul.menu li > a, #rt-header ul.menu li > .separator {color: #999;}#rt-header ul.menu li.active > a, #rt-header ul.menu li:hover > a, #rt-header ul.menu li.active > .separator, #rt-header ul.menu li:hover > .separator {background: url(../images/menus/style6/menutab-r.png) 100% 0 no-repeat;color: #fff;}#rt-header ul.menu li.active > a span, #rt-header ul.menu li:hover > a span, #rt-header ul.menu li.active > .separator span, #rt-header ul.menu li:hover > .separator span {background: url(../images/menus/style6/menutab-l.png) 0 0 no-repeat;}#rt-header li ul {background: #222;border: 1px solid #333;}#rt-showcase {background: #0f0f0f url(../images/backgrounds/style6/header-bg.png) 100% 0;color: #aaa;}#rt-showcase .showcase-title {color: #999;text-shadow: -1px -2px #000;}#rt-showcase .showcase-title span {text-shadow: -1px -2px #000;}#rt-showcase .title span {color: #ccc;}#rt-showcase .readon {background: url(../images/body/style6/readon-r.png) 100% -180px no-repeat;}#rt-showcase .readon span {background: url(../images/body/style6/readon-l.png) 0 -180px no-repeat;color: #999;}#rt-showcase .readon:hover {background: url(../images/body/style6/readon-r.png) 100% -210px no-repeat;}#rt-showcase .readon:hover span {background: url(../images/body/style6/readon-l.png) 0 -210px no-repeat;color: #fff;}#rt-feature {background: #0f0f0f url(../images/backgrounds/style6/header-bg.png) 100% 0;color: #aaa;}#rt-feature .title span {color: #ccc;}#rt-toptab {background: #0f0f0f url(../images/backgrounds/style6/header-bg.png) 100% 0;}#rt-toptab .toptab {background: url(../images/body/style6/toptab-r.png) 100% 0 no-repeat;}#rt-toptab .toptab2 {background: url(../images/body/style6/toptab-l.png) 0 0 no-repeat;color: #333;}.backgroundlevel-high #rt-toptab .shadow, .backgroundlevel-med #rt-toptab .shadow {background: url(../images/backgrounds/style6/showcase-shadow.png) 50% 100% no-repeat;}#rt-content-top {background: url(../images/body/style6/body-div.png) 50% 100% repeat-x;}#rt-main-surround {background: #fff url(../images/backgrounds/style6/body-bg.png) 50% 0 repeat-x;}#rt-main-surround .title span, #rt-main-surround .rt-article-title span {color: #000;}#rt-main-surround .readon span, #rt-main-surround .readon .button {color: #333;}#rt-main-surround .readon:hover span, #rt-main-surround .readon:hover .button {color: #000;}#form-login ul li a, #com-form-login ul li a, ul.rt-more-articles li a, .rt-section-list ul li a{background-image: url(../images/body/style6/arrows.png);background-repeat: no-repeat;}.icon1 .module-icon, .icon2 .module-icon, .icon3 .module-icon, .icon4 .module-icon {background-image: url(../images/body/style6/module-icons.png);background-repeat: no-repeat;}#rt-main-surround ul.menu li {background: url(../images/body/style6/body-div.png) 50% 100% repeat-x;}#rt-main-surround ul.menu li a, #rt-main-surround ul.menu li .separator, #rt-main-surround ul.menu li .item {background: url(../images/body/style6/arrows.png) 5px 10px no-repeat;color: #333;}#rt-main-surround ul.menu li.active > a, #rt-main-surround ul.menu li > a:hover, #rt-main-surround ul.menu li.active > .separator {color: #000;}#rt-bottom {background: #BC0300 url(../images/backgrounds/style6/bottom-bg.png) 50% 0 repeat-x;color: #fff;}#rt-bottom .title {color: #000;}#rt-bottom .title span {color: #fff;}#rt-bottom .readon span, #rt-bottom .readon .button {color: #990000;}#rt-bottom .readon:hover span, #rt-bottom .readon .button {color: #333;}#rt-bottomtab {background: #fff;}#rt-bottomtab .bottomtab {background: url(../images/body/style6/bottomtab-r.png) 100% 0 no-repeat;}#rt-bottomtab .bottomtab2 {background: url(../images/body/style6/bottomtab-l.png) 0 0 no-repeat;color: #fff;}#rt-footer {color: #666;}#rt-footer a:hover {color: #000;}#rt-footer .title {color: #777;}#rt-footer .title span {color: #333;}#rt-footer .readon span, #rt-footer .readon .button {color: #333;}#rt-footer .readon:hover span, #rt-footer .readon:hover .button {color: #000;}#rt-copyright {color: #999;}#rt-copyright a:hover {color: #000;}#rt-copyright .rt-container {border-top: 1px solid #ddd;}#rocket, #gantry-logo {background: url(../images/body/style6/footer-assets.png) 0 0 no-repeat;}.readon {background: url(../images/body/style6/readon-r.png) 100% 0 no-repeat;}.readon span, .readon .button {background: url(../images/body/style6/readon-l.png) 0 0 no-repeat;color: #333;}.readon:hover span, .readon:hover .button {color: #000;}.rt-pagetitle {color: #333;}#rt-accessibility a.small .button, #rt-accessibility a.large .button, #rt-accessibility a.small:hover .button, #rt-accessibility a.large:hover .button {background-image: url(../images/body/style6/fontsizer.png);background-repeat: no-repeat;}.rokradios, .rokchecks, .rokradios-active, .rokchecks-active {background-image: url(../images/body/style6/inputs.png);}#rt-breadcrumbs {background: #fff;}#breadcrumbs-home {background: url(../images/body/style6/typography.png) 0 -23px no-repeat;}span.breadcrumbs img {background: url(../images/body/style6/arrows.png) 50% 4px no-repeat;}.rt-joomla .icon {background-image: url(../images/body/style6/typography.png);}.rt-pollrow {background: url(../images/body/style6/body-div.png) 50% 100% repeat-x;}.rt-joomla .search_result .phrase legend, .rt-joomla .search_result .only legend {color: #333;}.rt-joomla legend {color: #333;}.rt-joomla label {color: #333;}.rt-joomla-table {color: #333;}.button2-left a, .button2-right a, .button2-left span, .button2-right span {color: #666;}.button2-left span, .button2-right span {color: #666;}.button2-left a:hover, .button2-right a:hover {color: #000 !important;}.button2-left {background: url(../images/system/light/j_button2_left.png) no-repeat;color: #666;}.button2-right {background: url(../images/system/light/j_button2_right.png) 100% 0 no-repeat;color: #666;}.button2-left .image {background: url(../images/system/light/j_button2_image.png) 100% 0 no-repeat;}.button2-left .readmore {background: url(../images/system/light/j_button2_readmore.png) 100% 0 no-repeat;}.button2-left .pagebreak {background: url(../images/system/light/j_button2_pagebreak.png) 100% 0 no-repeat;}.button2-left .blank {background: url(../images/system/light/j_button2_blank.png) 100% 0 no-repeat;}body .button2-left .linkmacro {background: url(../images/system/light/j_button2_rokcandy.png) 100% 0 no-repeat;}.button2-left .blank a {color: #666;}body.rtl #rt-top .search .inputbox {background: url(../images/backgrounds/style6/search-bg-rtl.png) 0 0 no-repeat;}body.rtl #form-login ul li a, body.rtl #com-form-login ul li a, body.rtl ul.rt-more-articles li a, body.rtl .rt-section-list ul li a{background-image: url(../images/body/style6/arrows-rtl.png);}body.rtl #rt-main-surround ul.menu li a, body.rtl #rt-main-surround ul.menu li .separator, body.rtl #rt-main-surround ul.menu li .item {background: url(../images/body/style6/arrows-rtl.png) 100% 10px no-repeat;}body.rtl span.breadcrumbs img {background: url(../images/body/style6/arrows-rtl.png) 50% 4px no-repeat;}body.rtl #rt-showcase .readon {background: url(../images/body/style6/readon-r-rtl.png) 100% -180px no-repeat;}body.rtl #rt-showcase .readon span {background: url(../images/body/style6/readon-l-rtl.png) 0 -180px no-repeat;}body.rtl #rt-showcase .readon:hover {background: url(../images/body/style6/readon-r-rtl.png) 100% -210px no-repeat;}body.rtl #rt-showcase .readon:hover span {background: url(../images/body/style6/readon-l-rtl.png) 0 -210px no-repeat;}body.rtl .readon {background: url(../images/body/style6/readon-r-rtl.png) 100% 0 no-repeat;}body.rtl .readon span, body.rtl .readon .button {background: url(../images/body/style6/readon-l-rtl.png) 0 0 no-repeat;}

/*** template.css ***/

body {font-family: Helvetica,Arial,sans-serif;min-width: 960px;}.font-family-optima {font-family: Optima, Lucida, 'MgOpen Cosmetica', 'Lucida Sans Unicode', sans-serif;}.font-family-geneva {font-family: Geneva, Tahoma, "Nimbus Sans L", sans-serif;}.font-family-helvetica {font-family: Helvetica, Arial, FreeSans, sans-serif;}.font-family-lucida {font-family: "Lucida Grande",Helvetica,Verdana,sans-serif;}.font-family-georgia {font-family: Georgia, sans-serif;}.font-family-trebuchet {font-family: "Trebuchet MS", sans-serif;}.font-family-palatino {font-family: "Palatino Linotype", "Book Antiqua", Palatino, "Times New Roman", Times, serif;}#rt-menu .rt-container, #rt-top .rt-container, #rt-showcase .rt-container, #rt-feature .rt-container, #rt-main .rt-container, #rt-bottom .rt-container, #rt-footer .rt-container, #rt-copyright .rt-container, #rt-maintop .rt-container, #rt-mainbottom .rt-container, #rt-breadcrumbs .rt-container, #rt-header .rt-container, #rt-toptab .rt-container, #rt-bottomtab .rt-container {background: transparent;}.title {font-weight: normal;}ul {list-style: none;padding-left: 0;}ul li {list-style: square;margin-left: 15px;}#rt-top .search .inputbox {width: 236px;height: 20px;line-height: 16px;border: 0;padding: 3px 0 0 5px;}#rt-top .search {text-align: right;}#rt-header {position: relative;z-index: 2;}#rt-header .rt-block {margin-bottom: 0;}#rt-header4 {padding: 5px 0;}#rt-logo {width: 236px;height: 49px;display: block;}#rt-header ul {margin: 0;padding: 0;float: right;position: relative;z-index: 1000;}#rt-header ul li {padding: 0;margin-left: 4px;margin-bottom: 4px;list-style: none;float: left;position: relative;}#rt-header ul li a, #rt-header ul li .separator {display: block;height: 29px;line-height: 28px;margin-left: 8px;cursor: pointer;z-index: 100;position: relative;}#rt-header ul li a span, #rt-header ul li .separator span {display: block;padding: 0 10px;height: 29px;line-height: 28px;margin-left: -8px;font-size: 14px;}#rt-header li ul li.parent {background: url(../images/parent.png) 97% 12px no-repeat;}#rt-header li ul {position:absolute;width:200px;top:-999em;left: auto;padding: 10px 0;}#rt-header li ul ul {margin: 0;}#rt-header li:hover ul ul, #rt-header li:hover ul ul ul, #rt-header li:hover ul ul ul ul {top:-999em;left: auto;}#rt-header li li {margin: 0;padding: 0 10px 0 18px;height:auto;width:172px;}#rt-header li li a, #rt-header li li.active a, #rt-header li li a:hover, #rt-header li li .separator, #rt-header li li.active .separator {margin:0;padding: 0;height: auto;float: none;width: auto;line-height:20px;display: block;}#rt-header li li a span, #rt-header li li.active a span, #rt-header li li a:hover span, #rt-header li li .separator span, #rt-header li li.active .separator span {width: auto;display: block;line-height: 20px;text-transform: none;padding: 5px 5px 0 10px;}#rt-header li li a, #rt-header li.active li a, #rt-header li li .separator, #rt-header li.active li .separator {font-weight:normal;}#rt-header li:hover ul {left: 0;top: 29px;}#rt-header li li:hover ul, #rt-header li li li:hover ul, #rt-header li li li li:hover ul {left:200px;top: -11px;}#rt-showcase {position: relative;z-index: 1;}#rt-showcase .showcase-title {font-size: 3.8em;line-height: 1em;font-weight: bold;margin-top: 15px;}#rt-toptab .rt-block {padding: 15px 0 0 0;margin: 0;}#rt-toptab .toptab, #rt-toptab .toptab2 {height: 34px;display: inline-block;}#rt-toptab .toptab {margin-left: 25px;}#rt-toptab .toptab2 {padding: 0 25px;line-height: 34px;font-size: 18px;margin-left: -25px;}#rt-main-surround .rt-article-title {text-transform: none;margin: 0;display: block;font-size: 180%;letter-spacing: normal;}#rt-sidebar-a, #rt-sidebar-b, #rt-sidebar-c {background-color: transparent;}#rt-main-surround {overflow: hidden;}#form-login ul li a, #com-form-login ul li a, ul.rt-more-articles li a, .rt-section-list ul li a {background-position: 0 2px;padding-left: 15px;}#form-login ul li a:hover, #com-form-login ul li a:hover, ul.rt-more-articles li a:hover, .rt-section-list ul li a:hover {background-position: 0 -453px;}#rt-main-surround ul.menu {padding-left: 0;}#rt-main-surround ul.menu li {list-style: none;margin-left: 0;}#rt-main-surround ul.menu a, #rt-main-surround ul.menu .separator, #rt-main-surround ul.menu .item {display: block;text-indent: 0;overflow: hidden;font-size: 120%;font-weight: normal;padding: 4px 0 8px 20px;line-height: 1.8em;}#rt-main-surround ul.menu li.active > a, #rt-main-surround ul.menu li.active > .separator, #rt-main-surround ul.menu li.active > .item {font-weight: bold;}#rt-main-surround ul.menu li li {padding: 0;margin: 0;font-size: 95%;background: none;border: none;}#rt-main-surround .menu .subtext em {line-height: 14px;}#rt-main-surround .menu em {display: block;font-size:80%;font-style: normal;font-weight: normal;}#rt-main-surround ul.menu li a:hover, #rt-main-surround ul.menu li .separator:hover, #rt-main-surround ul.menu li .item:hover, #rt-main-surround ul.menu li.active > a, #rt-main-surround ul.menu li.active > .separator, #rt-main-surround ul.menu li.active > .item {background-position: 5px -445px;}.module-title {margin: 15px 0;}h2.title {display: block;letter-spacing: normal;line-height: 1em;margin: 0;}.flush .rt-block {padding: 0;}.icon1 .module-surround, .icon2 .module-surround, .icon3 .module-surround, .icon4 .module-surround {padding-left: 60px;position: relative;}.module-icon {width: 45px;height: 41px;position: absolute;left: 0;top: 0;}.icon1 .module-icon {background-position: 0 0;}.icon2 .module-icon {background-position: 0 -44px;}.icon3 .module-icon {background-position: 0 -87px;}.icon4 .module-icon {background-position: 0 -129px;}#rt-bottom .rt-container {border: 0;}#rt-bottomtab .rt-block {padding: 15px 0 0 0;margin: 0;}#rt-bottomtab .bottomtab, #rt-bottomtab .bottomtab2 {height: 34px;display: inline-block;}#rt-bottomtab .bottomtab2 {padding: 0 25px;line-height: 34px;font-size: 18px;}#powered-by {margin:10px 0;}#rocket {display:inline-block;width: 148px;height: 23px;margin:0 20px 0 5px;vertical-align:middle;}#gantry-logo {display:inline-block;width: 102px;height: 27px;margin:0 10px 0 0px;vertical-align:middle;background-position: 0 -24px;}#rt-copyright {text-align: left;}#gantry-totop, #gantry-totop span {height: 34px;display: inline-block;position: absolute;bottom: 0;right: 0;cursor: pointer;}#gantry-totop span {padding: 0 25px;line-height: 34px;text-align: center;white-space: nowrap;}#gantry-resetsettings {margin-left:15px;margin-bottom:5px;display:block;float:left;}.readon {display: inline-block;margin-left: 8px;height: 30px;}.readon span, .readon .button {display: block;margin-left: -8px;padding: 0 18px 0 10px;border: 0;font-size: 13px;cursor: pointer;height: 30px;line-height: 30px;float: left;}.readon:hover {background-position: 100% -30px;}.readon:hover span, .readon:hover .button {background-position: 0 -30px;}#rt-bottom .readon {background-position: 100% -60px;}#rt-bottom .readon span, #rt-bottom .readon .button {background-position: 0 -60px;}#rt-bottom .readon:hover {background-position: 100% -90px;}#rt-bottom .readon:hover span, #rt-bottom .readon:hover .button {background-position: 0 -90px;}#rt-footer .readon {background-position: 100% -120px;}#rt-footer .readon span, #rt-footer .readon .button {background-position: 0 -120px;}#rt-footer .readon:hover {background-position: 100% -150px;}#rt-footer .readon:hover span, #rt-footer .readon:hover .button {background-position: 0 -150px;}#rt-accessibility .rt-desc {display: block;float: left;text-align: left;margin-right: 5px;font-size: 12px;font-weight: bold;}#rt-accessibility #rt-buttons {float: left;}#rt-accessibility .button {display: block;width: 14px;height: 8px;}#rt-accessibility a.large .button {background-position: 0 0;margin-bottom: 4px;}#rt-accessibility a.large:hover .button {background-position: -15px 0;}#rt-accessibility a.small .button {background-position: 0 -11px;}#rt-accessibility a.small:hover .button {background-position: -15px -11px;}.rokradios, .rokchecks {padding: 1px 5px 7px 24px;line-height: 120%;}.rokradios {background-position: 0 0;background-repeat: no-repeat;}.rokradios-active {background-position: 0 -211px;background-repeat: no-repeat;}.rokchecks {background-position: 0 -423px;background-repeat: no-repeat;}.rokchecks-active {background-position: 0 -634px;background-repeat: no-repeat;}.date-block .date {font-size: 110%;}#rt-breadcrumbs {margin-top: 10px;}#breadcrumbs-home {width: 15px;height: 15px;display: block;float: left;margin-top: 4px;}#breadcrumbs h3, .leading_separator {display: none;}span.breadcrumbs {display: block;font-size: 110%;font-weight: bold;overflow: hidden;}span.breadcrumbs img {width: 12px;height: 23px;float: left;}span.breadcrumbs a, span.no-link {padding: 0 10px;float: left;display: block;height: 23px;line-height: 20px;}.floatleft {float: left;margin-right: 25px;margin-bottom: 25px;}.floatright {float: right;margin-left: 25px;margin-bottom: 25px;}body.rtl #rt-top .search .inputbox {padding: 3px 5px 0 0;}body.rtl #rt-top .search {text-align: right;}body.rtl #rt-header ul {float: left;}body.rtl #rt-header ul li {float: right;}body.rtl #rt-header li ul li.parent {background: url(../images/parent-rtl.png) 5px 12px no-repeat;}body.rtl #rt-header li ul {position:absolute;width:200px;top:-999em;left: auto;padding: 10px 0;}body.rtl #rt-header li ul ul {margin: 0;}body.rtl #rt-header li:hover ul ul, body.rtl #rt-header li:hover ul ul ul, body.rtl #rt-header li:hover ul ul ul ul {top:-999em;left: auto;}body.rtl #rt-header li li {margin: 0;padding: 0 10px 0 18px;height:auto;width:172px;}body.rtl #rt-header li li a, body.rtl #rt-header li li.active a, body.rtl #rt-header li li a:hover, body.rtl #rt-header li li .separator, body.rtl #rt-header li li.active .separator {margin:0;padding: 0;height: auto;float: none;width: auto;line-height:20px;display: block;}body.rtl #rt-header li li a span, body.rtl #rt-header li li.active a span, body.rtl #rt-header li li a:hover span, body.rtl #rt-header li li .separator span, body.rtl #rt-header li li.active .separator span {width: auto;display: block;line-height: 20px;text-transform: none;padding: 5px 5px 0 10px;}body.rtl #rt-header li li a, body.rtl #rt-header li.active li a, body.rtl #rt-header li li .separator, body.rtl #rt-header li.active li .separator {font-weight:normal;}body.rtl #rt-header li:hover ul {top: 29px;right: 0;}body.rtl #rt-header li li:hover ul, body.rtl #rt-header li li li:hover ul, body.rtl #rt-header li li li li:hover ul {top: -11px;right: 200px;}body.rtl #form-login ul li a, body.rtl #com-form-login ul li a, body.rtl ul.rt-more-articles li a, body.rtl .rt-section-list ul li a {background-position: 100% 2px;padding-left: 15px;}body.rtl #form-login ul li a:hover, body.rtl #com-form-login ul li a:hover, body.rtl ul.rt-more-articles li a:hover, body.rtl .rt-section-list ul li a:hover {background-position: 100% -453px;}body.rtl #rt-main-surround ul.menu ul {margin-right: 25px;margin-left: 0;}body.rtl #rt-main-surround ul.menu a, body.rtl #rt-main-surround ul.menu .separator, body.rtl #rt-main-surround ul.menu .item {padding: 4px 20px 8px 0;}body.rtl #rt-main-surround ul.menu li a, body.rtl #rt-main-surround ul.menu li .separator, body.rtl #rt-main-surround ul.menu li .item {background-position: 100% 10px;}body.rtl #rt-main-surround ul.menu li a:hover, body.rtl #rt-main-surround ul.menu li .separator:hover, body.rtl #rt-main-surround ul.menu li .item:hover, body.rtl #rt-main-surround ul.menu li.active > a, body.rtl #rt-main-surround ul.menu li.active > .separator, body.rtl #rt-main-surround ul.menu li.active > .item {background-position: 100% -445px;}body.rtl .icon1 .module-surround, body.rtl .icon2 .module-surround, body.rtl .icon3 .module-surround, body.rtl .icon4 .module-surround {padding-left: 0;padding-right: 60px;}body.rtl .module-icon {left: auto;right: 0;}body.rtl #rocket {margin:0 5px 0 20px;}body.rtl #gantry-logo {margin:0 0 0 10px;}body.rtl #rt-copyright {text-align: right;}body.rtl #gantry-totop, body.rtl #gantry-totop span {right: auto;left: 0;}body.rtl #gantry-resetsettings {margin-left: 0;margin-right: 15px;float: right;}body.rtl #rt-accessibility .rt-desc {float: right;text-align: right;margin-right: 0;margin-left: 5px;}body.rtl #rt-accessibility #rt-buttons {float: right;}body.rtl .rokradios, body.rtl .rokchecks {padding: 1px 24px 7px 5px;}body.rtl .rokradios {background-position: 100% 0;}body.rtl .rokradios-active {background-position: 100% -211px;}body.rtl .rokchecks {background-position: 100% -423px;}body.rtl .rokchecks-active {background-position: 100% -634px;}body.rtl #breadcrumbs-home {float: right;}body.rtl span.breadcrumbs img {float: right;}body.rtl span.breadcrumbs a, body.rtl span.no-link {float: right;}body.rtl .readon {margin-left: 14px;}body.rtl .readon span, body.rtl .readon .button {margin-left: -14px;padding: 0 10px 0 18px;}body.rtl .readon:hover {background-position: 100% -30px;}body.rtl .readon:hover span, body.rtl .readon:hover .button {background-position: 0 -30px;}

/*** typography.css ***/

ul.bullet-1, ul.bullet-2, ul.bullet-3, ul.bullet-4 {padding: 0 0 0 15px;}ul.bullet-1 li, ul.bullet-2 li, ul.bullet-3 li, ul.bullet-4 li {list-style: none;padding: 0 0 3px 15px;margin: 0 0 5px;background: no-repeat 0 4px;}ul.bullet-1 li a, ul.bullet-2 li a, ul.bullet-3 li a, ul.bullet-4 li a {font-size: 100%;line-height: 1.7;}ul.bullet-1 li {background-image: url(../images/typography/bullet1.png);}ul.bullet-2 li {background-image: url(../images/typography/bullet2.png);}ul.bullet-3 li {background-image: url(../images/typography/bullet3.png);}ul.bullet-4 li {background-image: url(../images/typography/bullet4.png);}.cssstyle-style1 ul.bullet-1 li, .cssstyle-style3 ul.bullet-1 li, .cssstyle-style5 ul.bullet-1 li {background-image: url(../images/typography/bullet1-dark.png);}.cssstyle-style1 ul.bullet-2 li, .cssstyle-style3 ul.bullet-2 li, .cssstyle-style5 ul.bullet-2 li {background-image: url(../images/typography/bullet2-dark.png);}.cssstyle-style1 ul.bullet-3 li, .cssstyle-style3 ul.bullet-3 li, .cssstyle-style5 ul.bullet-3 li {background-image: url(../images/typography/bullet3-dark.png);}.cssstyle-style1 ul.bullet-4 li, .cssstyle-style3 ul.bullet-4 li, .cssstyle-style5 ul.bullet-4 li {background-image: url(../images/typography/bullet4-dark.png);}em.color {font-style: italic;font-weight: bold;}em.bold {font-size: 120%;font-weight: bold;line-height: 150%;font-style: normal;}p.dropcap {overflow: hidden;}span.dropcap {font-size: 400%;margin: 0 5px 0 0;line-height: 100%;color: #333;float: left;display: block;}.cssstyle-style1 span.dropcap, .cssstyle-style3 span.dropcap, .cssstyle-style5 span.dropcap {color: #999;}pre{background: #F9F1ED;border-bottom: 1px solid #DCD7D4;border-right: 1px solid #DCD7D4;color: #AC3400;font-style:italic;overflow: auto;padding: 10px;}.cssstyle-style1 pre, .cssstyle-style3 pre, .cssstyle-style5 pre {background: #333;border-bottom: 1px solid #3a3a3a;border-right: 1px solid #3a3a3a;color: #bbb;}.alert, .approved, .attention, .camera, .cart, .doc, .download, .media, .note, .notice {display: block;margin: 15px 0;background: repeat-x 0 100%;background-color: #FAFCFD;}.typo-icon {display: block;padding: 8px 10px 0px 36px;margin: 15px 0;background: no-repeat 10px 12px;}.alert {color: #D0583F;background-image: url(../images/typography/alert.png);border-bottom: 1px solid #F8C9BB;border-right: 1px solid #F8C9BB;}.approved {color: #6CB656;background-image: url(../images/typography/approved.png);border-bottom: 1px solid #C1CEC1;border-right: 1px solid #C1CEC1;}.attention {color: #E1B42F;background-image: url(../images/typography/attention.png);border-bottom: 1px solid #E4E4D5;border-right: 1px solid #E4E4D5;}.camera {color: #55A0B4;background-image: url(../images/typography/camera.png);border-bottom: 1px solid #C9D5D8;border-right: 1px solid #C9D5D8;}.cart {color: #559726;background-image: url(../images/typography/cart.png);border-bottom: 1px solid #D3D3D3;border-right: 1px solid #D3D3D3;}.doc {color: #666666;background-image: url(../images/typography/doc.png);border-bottom: 1px solid #E5E5E5;border-right: 1px solid #E5E5E5;}.download {color: #666666;background-image: url(../images/typography/download.png);border-bottom: 1px solid #D3D3D3;border-right: 1px solid #D3D3D3;}.media {color: #8D79A9;background-image: url(../images/typography/media.png);border-bottom: 1px solid #DBE1E6;border-right: 1px solid #DBE1E6;}.note {color: #B76F38;background-image: url(../images/typography/note.png);border-bottom: 1px solid #E6DAD2;border-right: 1px solid #E6DAD2;}.notice {color: #6187B3;background-image: url(../images/typography/notice.png);border-bottom: 1px solid #C7CDDA;border-right: 1px solid #C7CDDA;}.approved .typo-icon {background-image: url(../images/typography/approved-icon.png);}.alert .typo-icon {background-image: url(../images/typography/alert-icon.png);}.attention .typo-icon {background-image: url(../images/typography/attention-icon.png);}.camera .typo-icon {background-image: url(../images/typography/camera-icon.png);}.cart .typo-icon {background-image: url(../images/typography/cart-icon.png);}.doc .typo-icon {background-image: url(../images/typography/doc-icon.png);}.download .typo-icon {background-image: url(../images/typography/download-icon.png);}.media .typo-icon {background-image: url(../images/typography/media-icon.png);}.note .typo-icon {background-image: url(../images/typography/note-icon.png);}.notice .typo-icon {background-image: url(../images/typography/notice-icon.png);}.important {border: 1px solid #E5E5E5;background: url(../images/typography/important.png) repeat-x 0 100%;padding: 15px;margin: 25px 0 10px 0;position: relative;}span.important-title {background: #fff;color: #000;position: absolute;display: block;top: -0.8em;left: 10px;padding: 3px 8px;font-size: 120%;font-weight: bold;}.cssstyle-style1 .important, .cssstyle-style3 .important, .cssstyle-style5 .important {background: none #333;border: none;color: #999;}.cssstyle-style1 span.important-title, .cssstyle-style1 span.important-title, .cssstyle-style3 span.important-title, .cssstyle-style3 span.important-title, .cssstyle-style5 span.important-title, .cssstyle-style5 span.important-title {color: #999;background: #333;}span.inset-left {float: left;margin-right: 20px;margin-bottom:20px;}span.inset-right {float: right;margin-left: 20px;margin-bottom:20px;}span.inset-right-title, span.inset-left-title {background: #fff;color: #000;position: absolute;display: block;top: -12px;left: 10px;padding: 3px 8px;font-size: 100%;font-weight: bold;}span.inset-left, span.inset-right {display: block;padding: 12px 8px 8px 8px;width: 20%;font-size: 100%;font-style: italic;margin-top: 25px;position: relative;border: 1px solid #E5E5E5;background: url(../images/typography/important.png) repeat-x 0 100%;color: #333;text-align: center;}.cssstyle-style1 span.inset-left, .cssstyle-style1 span.inset-right, .cssstyle-style3 span.inset-left, .cssstyle-style3 span.inset-right, .cssstyle-style5 span.inset-left, .cssstyle-style5 span.inset-right {background: none #333;border: none;color: #999;}.cssstyle-style1 span.inset-left-title, .cssstyle-style1 span.inset-right-title, .cssstyle-style3 span.inset-left-title, .cssstyle-style3 span.inset-right-title, .cssstyle-style5 span.inset-left-title, .cssstyle-style5 span.inset-right-title {color: #999;background: #333;}.cssstyle-style1 .img-demo, .cssstyle-style3 .img-demo, .cssstyle-style5 .img-demo {border: 2px solid #333;padding: 2px;margin: 3px;}.cssstyle-style2 .img-demo, .cssstyle-style4 .img-demo, .cssstyle-style6 .img-demo {border: 2px solid #ddd;padding: 2px;margin: 3px;}
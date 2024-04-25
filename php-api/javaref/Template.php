<?php

function d()
{} // Dummy func
   // Template modifiers. Allows pages to include custom functionality at certain points within the template.
   // By default, each key executes the dummy function. Keys can be defined to point to anonymous functions.
$tmods = [
    "head_top" => "d",
    "head_bottom" => "d",
    "head_after_stylesheet" => "d",
    "header_button_config" => [
        [
            '/',
            'Home',
            false
        ],
        [
            'https://github.com/the-scholar/javaref',
            'GitHub',
            false
        ],
        [
            '/about',
            'About',
            false
        ],
        [
            '/help',
            'Help',
            false
        ]
    ]
];

function t($title, $desc)
{
    global $tmods;
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php $tmods["head_top"]();?>
<meta name="viewport" content="width=1000">
<meta charset="UTF-8">
<meta name="description" content="<?php echo$desc;?>">
<link rel="stylesheet" type="text/css" href="/index.css">
<link rel="stylesheet" type="text/css" href="/light.css">
<meta charset="ISO-8859-1">
<?php $tmods["head_after_stylesheet"]();?>
<script src="/index.js"></script>
<title><?php echo$title;?></title>
<?php $tmods["head_bottom"]();?>
</head>

<body>
	<div id="Header">
		<div id="HeaderContent">
			<div id="HeaderContentTitle">
				<div id="Title">javaref.net</div>
				<div style="min-width: .5em;"></div>
				<input id=Search type="text" name="q" placeholder="Search..." onkeydown="search(event)">
			</div>
			<div id="HeaderContentMenu"><?php

    $b = function ($l, $n, $s = false) {
        echo '<a href="' . $l . '"' . ($s ? " class='selected' " : " ") . ">" . $n . "</a>";
    };
    $tmp = $tmods['header_button_config'];
    $b(...$tmp[0]);
    $b(...$tmp[1]);
    $b(...$tmp[2]);
    ?>
				
				<div></div>
				<?php $b(...$tmp[3]);?>
				<div id="LightThemeButton" class="button" onclick="toggleTheme()">
					<img src="/sun.svg" alt="Light Theme">
				</div>
				<div id="DarkThemeButton" class="button" onclick="toggleTheme()"
					style="display: none;">
					<img src="/moon.svg" alt="Dark Theme">
				</div>
			</div>
		</div>
	</div>
	<div id="ProgressBar"></div>
	<div id="Content">
		<?php
}

function b()
{
    ?>
	</div>
</body>
</html><?php
}
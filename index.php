<?php
include 'lib/dispatcher.php';
$basedir = "/dispatcher/";
$dispatcher = new Dispatcher();
?>
<html>
    <head>
        <title>PHP Url Dispatcher</title>
    </head>
    <body>
        <h1>PHP Url Dispatcher</h1>
        <ul>
            <li><b>Controller:</b> <?php echo $dispatcher->controller; ?></li>
            <li><b>Action:</b> <?php echo $dispatcher->action; ?></li>
            <li>
                <b>Parameters:</b>
                <ul>
                <?php
                foreach ($dispatcher->parameters as $param) {
                    echo '<li>'.$param.'</li>';
                }
                ?>
                </ul>
            </li>
        </ul>
        <h3>Test Links</h3>
        <ul>
            <li><a href="<?php echo $basedir; ?>test/">Test - no action</a></li>
            <li><a href="<?php echo $basedir; ?>test/show">Test - show</a></li>
            <li><a href="<?php echo $basedir; ?>test/show/param1/param2">Test - show - with parameters"</a></li>
            <li><a href="<?php echo $basedir; ?>">Home</a></li>
        </ul>
    </body>
</html>

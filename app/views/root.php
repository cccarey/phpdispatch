<?php
global $dispatcher;
?>
<html>
    <head>
        <title>PHP Url Dispatcher</title>
    </head>
    <body>
        <h1>PHP Url Dispatcher</h1>
        <ul>
            <li><b>BASEDIR:</b> <?php echo BASEDIR; ?></li>
            <li><b>REQUEST_URI:</b> <?php echo $_SERVER['REQUEST_URI']; ?></li>
            <li><b>SCRIPT_NAME:</b> <?php echo $_SERVER['SCRIPT_NAME']; ?></li>
            <li>
                <b>Controller:</b>
                <?php echo $dispatcher->controller; ?>
                <?php
                    if ($dispatcher->controllerExists()) {
                        echo "<em>Good</em>";
                    } else {
                        echo "<em style='color:red'>No Controller</em>";
                    }
                ?>
            </li>
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
            <li><a href="<?php echo BASEDIR; ?>test/">Test - no action</a></li>
            <li><a href="<?php echo BASEDIR; ?>test/show">Test - show</a></li>
            <li><a href="<?php echo BASEDIR; ?>test/show/param1/param2">Test - show - with parameters</a></li>
            <li><a href="<?php echo BASEDIR; ?>badcontroller/">Bad Controller</a></li>
            <li><a href="<?php echo BASEDIR; ?>">Home</a></li>
        </ul>
        <!--<h3>phpinfo</h3>-->
        <?php # echo phpinfo(); ?>
    </body>
</html>

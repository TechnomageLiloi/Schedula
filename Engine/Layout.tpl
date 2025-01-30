<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="shortcut icon" type="image/png" href="/Signum.png">

        <!-- @todo: add function to link scripts and styles -->
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Jquery.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Underscore.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-framework/Frontside/Library/Backbone.min.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/rune-api/Client/API.js"></script>
        <script src="<?php echo ROOT_URL; ?>/vendor/technomage-liloi/stylo/Source/Stylo.js"></script>

        <link href="<?php echo ROOT_URL; ?>/Engine/Style.css" rel="stylesheet" />
        <link href="<?php echo ROOT_URL; ?>/Engine/API/Style.css" rel="stylesheet" />

        <script src="<?php echo ROOT_URL; ?>/Engine/Bootstrap.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Requests.js"></script>
        <script src="<?php echo ROOT_URL; ?>/Engine/API/Vertex/Requests.js"></script>

        <?php if($admin): ?>

        <?php endif; ?>

        <title>Schedula</title>
    </head>
    <body>
        <div id="head">
            <!--<a href="javascript:void(0)" class="butn" onclick="Rune.Vertex.show();">Map</a>-->
            <?php if($admin): ?>
                <!--<a href="javascript:void(0)" class="butn" onclick="Rune.Security.Password.logout();">Logout</a>-->
            <?php else: ?>
                <!--<a href="javascript:void(0)" class="butn" onclick="Rune.Security.Password.show();">Login</a>-->
            <?php endif; ?>
        </div>
        <div id="page">
            <script>

            </script>
        </div>
    </body>
</html>
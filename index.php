<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reddit Award Calculator</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap">
    <link rel="stylesheet" href="style.css">

    <?php if( !@$_GET['url'] ) { ?>
    <script src="falling-images.js"></script>
    <style>
        @media all and (min-width: 700px) {
            html, body {
                height: 100%;
            }
    
            body {
                display: flex;
                align-items: center;
                vertical-align: middle;
                overflow: hidden;
            }
    
            #main {
                margin: auto;
            }
        }

        @media all and (max-width: 700px) {
            body {
                background-image: url('background.png');
                background-size: contain;
                background-position: bottom;
                background-repeat: no-repeat;
                height: 100vh;
            }
        }
    </style>
    <?php } ?>
</head>
<body>
    <main id="main">

        <div class="hero">
            <h1 class="headline">Reddit Award Calculator <span class="version">v0.1</span></h1>
            <p class="byline">By <a href="https://jeromepaulos.com">Jerome Paulos</a> • Comment support coming soon!</p>

            <form class="form" action="">
                <input required value="<?php echo strip_tags($_GET['url'] ?? ''); ?>" type="url" name="url" class="input" placeholder="https://www.reddit.com/r/pics/comments/cp4sce/democracy_now/">
                <button class="button">Submit</button>
            </form>
        </div>

        <?php if( @$_GET['url'] ) {
            require_once('response.php');
        } ?>

    </main>

    <script src="app.js"></script>
</body>
</html>
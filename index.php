<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Main Meta Tags -->
    <title>Reddit Award Calculator</title>
    <meta name="title" content="Reddit Award Calculator">
    <meta name="description" content="Calculate the approximate value of a Reddit post's awards in USD">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://projects.jeromepaulos.com/awards">
    <meta property="og:title" content="Reddit Award Calculator">
    <meta property="og:description" content="Calculate the approximate value of a Reddit post's awards in USD">
    <meta property="og:image" content="https://projects.jeromepaulos.com/awards/social.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://projects.jeromepaulos.com/awards">
    <meta property="twitter:title" content="Reddit Award Calculator">
    <meta property="twitter:description" content="Calculate the approximate value of a Reddit post's awards in USD">
    <meta property="twitter:image" content="https://projects.jeromepaulos.com/awards/social.png">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/Award_<?php echo rand(1, 100); ?>.png">

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-122805750-7"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-122805750-7');
    </script>

    <?php if( !@$_GET['url'] ) { ?>
    <!-- Conditinal Assets -->
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
            <div class="hero-header">
                <div>
                    <h1 class="headline">Reddit Award Calculator <span class="version">v0.1</span></h1>
                    <p class="byline">By <a href="https://jeromepaulos.com">Jerome Paulos</a> • Comment support coming soon!</p>
                </div>
                <a class="github" target="_blank" href="https://github.com/jxxe/reddit-award-calculator#readme">
                    <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>GitHub icon</title><path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/></svg>
                </a>
            </div>

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
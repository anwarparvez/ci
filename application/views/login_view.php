<!DOCTYPE html>
<html lang="es"><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Smashing HTML5!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css" type="text/css" media="screen"/>
    </head>

    <body id="index" class="home">

        <?php include 'header.php'; ?>

        <aside id="featured" class="body">
            <article>
                <figure>
                    <img src="images/sm-logo.gif" alt="Smashing Magazine">
                </figure>
                <hgroup>
                    <h2> Login</h2>
                </hgroup>
                <p>
                <p>
                    <?php echo validation_errors(); ?>
                </p>

                <?php echo form_open('verifylogin'); ?>
                <label for="username">Username:</label>
                <input type="text" size="20" id="username" name="username"/>
                <br/>
                <label for="password">Password:</label>
                <input type="password" size="20" id="passowrd" name="password"/>
                <br/>
                <input type="submit" value="Login"/>
                </form></p>
            </article>
        </aside><!-- /#featured -->



        <?php include 'footer.php'; ?>

    </body></html>
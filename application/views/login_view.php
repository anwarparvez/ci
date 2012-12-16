<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Smashing HTML5!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css" type="text/css" media="screen"/>

    </head>
    <style type="text/css">
        #form_message{

            text-align:center;
            margin-bottom:5px;
            padding:10px;
        }

    </style>

    <body id="index" class="home">

        <?php include 'header.php'; ?>

        <aside id="featured" class="body">
            <article>

                <hgroup>
                    <h2> Login</h2>
                </hgroup>

                <div style="text-align:right; width:500px;" >
                    <div id="form_message"> <?php echo validation_errors(); ?></div>
                    <?php echo form_open('verifylogin'); ?>

                    Username:*<input type="text" name="username" id="username" size="30" /><br/><br/>
                    Password:*<input type="password" name="password" id="password" size="30" /><br/><br/>
                    <input type="submit" value="Login" id="login_submit" />

                    </form>
                </div>

                </p>
            </article>
        </aside><!-- /#featured -->



        <?php include 'footer.php'; ?>

    </body></html>
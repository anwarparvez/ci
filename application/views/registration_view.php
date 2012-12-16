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
                <hgroup>
                    <h2> User Registration</h2>
                </hgroup>

                <div style="text-align:right; width:500px;" >
                    <div id="form_message"> <?php echo validation_errors(); ?></div>
                    <?php echo form_open('VerifyRegistration'); ?>
                    Name*:<input type="text" size="30" id="name" name="name"/><br/><br/>
                    Username*:<input type="text" name="username" id="username" size="30" /><br/><br/>
                    Password*:<input type="password" name="password" id="password" size="30" /><br/><br/>
                    Confirm Password*:<input type="password" size="30" id="cpassowrd" name="cpassword"/><br/><br/>
                    Email*:<input type="text" size="30" id="email" name="email"/><br/><br/>
                   <input type="submit" value="Register"/>

                    </form>
                </div>
            </article>
        </aside><!-- /#featured -->

        <?php include 'footer.php'; ?>

    </body>
</html>

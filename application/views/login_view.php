<!DOCTYPE html>
<html lang="es"><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Smashing HTML5!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css" type="text/css" media="screen"/>
    </head>

    <body id="index" class="home">

        <header id="banner" class="body">
            <h1><a href="#">News Hour! <strong>24 hr news portal  </strong></a></h1>
            <nav><ul>
                    <li ><?php echo anchor('news/','Home'); ?></li>
                    <li class="active"><?php echo anchor('login/','Login'); ?></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </header><!-- /#banner -->

        <aside id="featured" class="body">
            <article>
                <figure>
                    <img src="images/sm-logo.gif" alt="Smashing Magazine">
                </figure>
                <hgroup>
                    <h2> Login</h2>
                </hgroup>
                <p>
                    <?php echo validation_errors(); ?>
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



        <footer id="contentinfo" class="body">
            <address id="about" class="vcard body">
                <span class="primary">
                    <strong><a href="#" class="fn url">News Hour</a></strong>
                    <span class="role">24hr news portal</span>
                </span><!-- /.primary -->

                <img src="images/avatar.gif" alt="Smashing Magazine Logo" class="photo">

                <span class="bio">Smashing Magazine is a website and blog that offers
                    resources and advice to web developers and web designers. It was
                    founded by Sven Lennartz and Vitaly Friedman.</span>

            </address><!-- /#about -->

            <p>2005-2009 <a href="http://smashingmagazine.com/">Smashing Magazine</a>.</p>
        </footer><!-- /#contentinfo -->


    </body></html>
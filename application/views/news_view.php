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
                    <li ><?php echo anchor('news/', 'Home'); ?></li>
                    <li class="active">
                        <?php
                        if ($this->session->userdata('logged_in')) {
                            echo anchor('news/logout', 'Logout');
                        }
                        else{
                             echo anchor('login/', 'Login');
                        }
                        ?>
                    </li>
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
                    <h2>Featured Article</h2>
                    <h3><a href="#">HTML5 in Smashing Magazine!</a></h3>
                </hgroup>
                <p>Discover how to use Graceful Degradation and Progressive Enhancement techniques to achieve an outstanding, cross-browser <a href="http://dev.w3.org/html5/spec/Overview.html" rel="external">HTML5</a> and <a href="http://www.w3.org/TR/css3-roadmap/" rel="external">CSS3</a> website today!</p>
            </article>
        </aside><!-- /#featured -->

        <section id="content" class="body">

            <ol id="posts-list" class="hfeed">
                <?php foreach ($query as $row) { ?>

                    <li><article class="hentry">
                            <header>
                                <h2 class="entry-title">
                                    <?php echo anchor('news/comments/' . $row->id, $row->title); ?>
                                </h2>
                                <abbr class="published" title="2005-10-10T14:07:00-07:00"><!-- YYYYMMDDThh:mm:ss+ZZZZ -->
            						10th October 2005

                                </abbr>

                            </header>


                            <div class="entry-content">
                                <p><?php echo $row->body ?><?php echo anchor('news/comments/' . $row->id, 'read more'); ?></p>
                            </div><!-- /.entry-content -->
                        </article>
                    </li>
                <?php } ?>

            </ol><!-- /#posts-list -->

        </section><!-- /#content -->

        <section id="extras" class="body">
            <div class="blogroll">
                <h2>Recent News</h2>

                <ul>

                    <?php foreach ($query as $row) { ?>

                        <li> <?php echo anchor('news/comments/' . $row->id, $row->title); ?></li>
                    <?php } ?>
                </ul>
            </div>

            <div class="social">
                <h2>social</h2>
                <ul>
                    <li><a href="http://delicious.com/enrique_ramirez" rel="me">delicious</a></li>
                    <li><a href="http://digg.com/users/enriqueramirez" rel="me">digg</a></li>
                    <li><a href="http://facebook.com/enrique.ramirez.velez" rel="me">facebook</a></li>
                    <li><a href="http://www.lastfm.es/user/enrique-ramirez" rel="me">last.fm</a></li>
                    <li><a href="http://website.com/feed/" rel="alternate">rss</a></li>
                    <li><a href="http://twitter.com/enrique_ramirez" rel="me">twitter</a></li>
                </ul>
            </div>
        </section>

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
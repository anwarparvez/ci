<!DOCTYPE html>
<html lang="es"><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Smashing HTML5!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css" type="text/css" media="screen"/>
    </head>

    <body id="index" class="home">

        <?php include 'header.php' ?>

        <!--        <aside id="featured" class="body">
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
                </aside> /#featured -->

        <section id="content" class="body">

            <ol id="posts-list" class="hfeed">
                <?php foreach ($query as $row) { ?>

                    <li><article class="hentry">
                            <header>
                                <h2 class="entry-title">
                                    <?php echo anchor('news/detail/' . $row->id, $row->title); ?>
                                </h2>
                                <abbr class="published" title="2005-10-10T14:07:00-07:00"><!-- YYYYMMDDThh:mm:ss+ZZZZ -->
                                    <?php echo $row->date ?>

                                </abbr>
                                <?php
                                if ($this->session->userdata('logged_in')) {

                                    $session_data = $this->session->userdata('logged_in');
                                    if ($session_data['is_admin'] == 1) {
                                        echo anchor('news/delete/' . $row->id, 'delete');
                                    }
                                }
                                ?>


                            </header>


                            <div class="entry-content">
                                <p><?php echo $row->sbody ?><?php echo anchor('news/detail/' . $row->id, 'read more'); ?></p>
                            </div><!-- /.entry-content -->
                        </article>
                    </li>
                <?php } ?>

            </ol><!-- /#posts-list -->
            <?php echo $links ?>
        </section><!-- /#content -->

        <section id="extras" class="body">
            <div class="blogroll">
                <h2>Recent News</h2>

                <ul>

                    <?php foreach ($nquery as $row) { ?>

                        <li> <?php echo anchor('news/detail/' . $row->id, $row->title); ?></li>
                    <?php } ?>
                </ul>
            </div>

            <div class="social">
                <!--                <h2>social</h2>
                                <ul>
                                    <li><a href="http://delicious.com/enrique_ramirez" rel="me">delicious</a></li>
                                    <li><a href="http://digg.com/users/enriqueramirez" rel="me">digg</a></li>
                                    <li><a href="http://facebook.com/enrique.ramirez.velez" rel="me">facebook</a></li>
                                    <li><a href="http://www.lastfm.es/user/enrique-ramirez" rel="me">last.fm</a></li>
                                    <li><a href="http://website.com/feed/" rel="alternate">rss</a></li>
                                    <li><a href="http://twitter.com/enrique_ramirez" rel="me">twitter</a></li>
                                </ul>-->
            </div>
        </section>

        <?php include 'footer.php'; ?>


    </body></html>
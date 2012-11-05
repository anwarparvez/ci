<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Smashing HTML5!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css" type="text/css" media="screen"/>
    </head>

    <body id="index" class="home">

        <?php include_once 'header.php'; ?>

        <?php foreach ($query as $row) { ?>
            <aside id="featured" class="body">
                <article>
                    <figure>
                        <img src="images/sm-logo.gif" alt="Smashing Magazine">
                    </figure>
                    <hgroup>
                        <h2>  <?php echo anchor('blog/comments/' . $row->id, $row->title); ?></h2>
                        <h3>         <abbr class="published" title="2005-10-10T14:07:00-07:00"><!-- YYYYMMDDThh:mm:ss+ZZZZ -->
                    						10th October 2005

                            </abbr></h3>
                    </hgroup>
                    <p><?php echo $row->body ?><?php echo anchor('blog/comments/' . $row->id, 'read more'); ?></p>
                </article>
            </aside><!-- /#featured -->
        <?php } ?>

        <section id="content" class="body">
            <h2>Comments</h2>

            <ol id="posts-list" class="hfeed">
                <?php foreach ($comments as $row) { ?>

                    <li><article class="hentry">
                            <header>
                                <h2 class="entry-title">
                                    <?php echo $row->author; ?>
                                </h2>
                                <abbr class="published" title="2005-10-10T14:07:00-07:00"><!-- YYYYMMDDThh:mm:ss+ZZZZ -->
                    						10th October 2005

                                </abbr>

                            </header>


                            <div class="entry-content">
                                <p><?php echo $row->body; ?></p>
                            </div><!-- /.entry-content -->
                        </article>
                    </li>
                <?php } ?>

                <li><article class="hentry">
                        <!--                        <header>
                                                    <h2 class="entry-title">
                        <?php echo anchor('blog/comments/' . $row->id, $row->title); ?>
                                                    </h2>
                                                    <abbr class="published" title="2005-10-10T14:07:00-07:00"> YYYYMMDDThh:mm:ss+ZZZZ
    						10th October 2005

                                                    </abbr>

                                                </header>-->


                        <div class="entry-content">
                            <?php
                            // put your code here
                            ?>
                            <?php echo form_open('blog/comment_insert'); ?>
                            <?php echo form_hidden('entry_id', $this->uri->segment(3)); ?>
                            <p><input type="text" value="Parvez" name="author"/></p>
                            <p><textarea rows="10" name="body"></textarea></p>
                            <input value="Submit Comment" type="submit"/>
                            </form>
                        </div><!-- /.entry-content -->
                    </article>
                </li>




            </ol><!-- /#posts-list -->

        </section><!-- /#content -->

        <section id="extras" class="body">
            <div class="blogroll">
                <h2>Recent News</h2>

                <ul>

                    <?php foreach ($query as $row) { ?>

                        <li> <?php echo anchor('blog/comments/' . $row->id, $row->title); ?></li>
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

        <?php include_once 'footer.php'; ?>


    </body></html>
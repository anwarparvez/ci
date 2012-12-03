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
                    <!--                    <figure>
                                            <img src="images/sm-logo.gif" alt="Smashing Magazine">
                                        </figure>-->
                    <hgroup>
                        <h2>  <?php echo anchor('news/detail/' . $row->id, $row->title); ?></h2>
                        <?php
                        if ($this->session->userdata('logged_in')) {

                            $session_data = $this->session->userdata('logged_in');
                            if ($session_data['is_admin'] == 1) {
                                echo anchor('news/delete/' . $row->id, 'delete');
                            }
                        }
                        ?>
                        <h6>
                            <abbr class="published" title="2005-10-10T14:07:00-07:00"><!-- YYYYMMDDThh:mm:ss+ZZZZ -->
                                <?php echo $row->date ?>

                            </abbr>

                        </h6>

                    </hgroup>
                    <p><?php echo $row->body ?></p>
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
                                    <?php echo $row->date ?>

                                </abbr>

                            </header>


                            <div class="entry-content">
                                <p><?php echo $row->body; ?></p>
                            </div><!-- /.entry-content -->
                        </article>
                    </li>
                <?php } ?>

                <li><article class="hentry2">
                        <!--                        <header>
                                                    <h2 class="entry-title">
                        <?php echo anchor('news/detail/' . $row->id, $row->title); ?>
                                                    </h2>
                                                    <abbr class="published" title="2005-10-10T14:07:00-07:00"> YYYYMMDDThh:mm:ss+ZZZZ
    						10th October 2005

                                                    </abbr>

                                                </header>-->


                        <div class="entry-content">
                            <?php
                            // put your code here
                            ?>
                            <?php echo form_open('news/comment_insert'); ?>
                            <?php echo form_hidden('entry_id', $this->uri->segment(3)); ?>
<!--                            <p><input type="text" value="Parvez" name="author"/></p>-->
                            <p><textarea placeholder="Comment here!" name="body" cols="80" rows="5"></textarea></p>

                            <input value="Submit Comment" type="submit"/>
                            </form>
                        </div><!-- /.entry-content -->
                    </article>
                </li>




            </ol><!-- /#posts-list -->

        </section><!-- /#content -->
        <!--
                <section id="extras" class="body">
                    <div class="blogroll">
                        <h2>Recent News</h2>

                        <ul>

        <?php foreach ($query as $row) { ?>

                                                    <li> <?php echo anchor('news/detail/' . $row->id, $row->title); ?></li>
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
                </section>-->

        <?php include_once 'footer.php'; ?>


    </body></html>
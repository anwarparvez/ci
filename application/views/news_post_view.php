<!DOCTYPE html>
<html lang="es"><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Smashing HTML5!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css" type="text/css" media="screen"/>
    </head>

    <body id="index" class="home">

        <?php include 'header.php' ?>

        <section id="content" class="body">

            <ol id="posts-list" class="hfeed">
                <?php echo form_open('news/news_insert'); ?>

                <li><article class="hentry">
                        <header>
                            <h2 class="entry-title">
                                Title: <br/><input type="text" name="title"/>
                            </h2>

                        </header>

                        <div class="entry-content">
                            <p>Short Body:<br/><textarea rows="10" name="sbody"></textarea></p>
                        </div><!-- /.entry-content -->

                        <div class="entry-content">
                            <p>Body:<br/> <textarea rows="10" name="body"></textarea></p>
                        </div><!-- /.entry-content -->
                        <br/>
                        <input type="submit" value="Post"/>
                        </form>
                    </article>
                </li>


            </ol><!-- /#posts-list -->

        </section><!-- /#content -->

        <?php include 'footer.php'; ?>
    </body></html>
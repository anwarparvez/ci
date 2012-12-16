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
                        <br/>
                        <div class="entry-content">

                            Category:
                            <p>
                                <select name="category">
                                    <option value="0">Editorial</option>
                                    <option value="1">National</option>
                                    <option value="2">International</option>
                                    <option value="3">Business</option>
                                    <option value="4">Arts & Entertainment</option>
                                    <option value="5">Sports</option>
                                </select>
                            </p>

                        </div><!-- /.entry-content -->
                        <br/>



                        <div class="entry-content">
                            Short Body:
                            <p><textarea placeholder="short description of news here!" name="sbody" cols="80" rows="5"></textarea></p>
                        </div><!-- /.entry-content -->

                        <div class="entry-content">
                            Body:
                            <p><textarea placeholder="Body of news here!" name="body" cols="80" rows="5"></textarea></p>
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
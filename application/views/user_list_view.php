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
                            <label for="username">Name:</label>
                            <?php echo $row->name; ?>
                            <br/>

                            <label for="username">Username:</label>
                            <?php echo $row->username; ?>

                            <br/>
                            <!--                            <label for="password">Password:</label>
                            <?php echo $row->password; ?>
                                                            <br/>-->
                            <label for="username">Email :</label>
                            <?php echo $row->email; ?>
                            <br/>
                            <?php
                            if ($this->session->userdata('logged_in')) {

                                $session_data = $this->session->userdata('logged_in');
                                if ($row->id != $session_data['id'])
                                    echo anchor('user/delete/' . $row->id, 'Delete');
                            }
                            ?>
                        </article>
                    </li>
<?php } ?>

            </ol><!-- /#posts-list -->
<?php echo $links ?>
        </section><!-- /#content -->


<?php include 'footer.php'; ?>


    </body></html>
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
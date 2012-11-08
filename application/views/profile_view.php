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
                <figure>
                    <img src="<?php echo base_url(); ?>images/sm-logo.gif" alt="Smashing Magazine">
                </figure>
                <hgroup>
                    <h2> Profile</h2>
                </hgroup>
                <p>

                <?php foreach ($query as $row) { ?>

                    <label for="username">Name:</label>
                    <?php echo $row->name; ?>
                    <br/>

                    <label for="username">Username:</label>
                    <?php echo $row->username; ?>

                    <br/>
                    <label for="password">Password:</label>
                        <?php     echo $row->password;?>
                    <br/>
                    <label for="username">Email :</label>
                        <?php     echo $row->email;?>
                    <br/>
                          <?php echo anchor('user/edit','Edit Profile'); ?>
                <?php } ?></p>
            </article>
        </aside><!-- /#featured -->



        <?php include 'footer.php'; ?>

    </body>
</html>
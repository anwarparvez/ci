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
                    <img src="<?php echo base_url(); ?>uploads/<?php echo $upload_data['file_name']?>" alt="Smashing Magazine">
                </figure>
                <hgroup>
                    <h2> Upload Photo</h2>
                </hgroup>
                <p>
                <ul>
                    <?php
                    foreach ($upload_data as $item => $value):
                        ?>
                        <li><?php echo $item; ?>:
                            <?php echo $value; ?></li>
                        <?php endforeach; ?>
                </ul>

                <p><?php echo anchor('upload', 'Upload Another File!'); ?></p>


                </p>
            </article>
        </aside><!-- /#featured -->



        <?php include 'footer.php'; ?>

    </body></html>
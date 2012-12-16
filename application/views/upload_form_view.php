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
                    <h2> Upload Photo</h2>
                </hgroup>
                <p>
                <p>
                    <?php echo validation_errors(); ?>
                </p>

                <?php echo $error; ?>

                <?php echo form_open_multipart('upload/do_upload/'.$this->uri->segment(3)); ?>

                <input type="file" name="userfile" size="20" />

                <br /><br />

                <input type="submit" value="upload" /><?php  echo ' or '.anchor('news/detail/'.$this->uri->segment(3), 'skip');?>

                </form>


                </p>
            </article>
        </aside><!-- /#featured -->



        <?php include 'footer.php'; ?>

    </body></html>
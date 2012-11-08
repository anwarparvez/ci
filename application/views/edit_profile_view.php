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
                <p>
                    <?php echo validation_errors(); ?>
                </p>
                <?php echo form_open('user/verifyedit'); ?>
                <?php foreach ($query as $row) { ?>
                    <label for="username">Name:</label>
                    <input type="text" size="20" value="<?php echo $row->name; ?>" id="name" name="name"/>
                    <br/>

                    <label for="username">Username:</label>
                    <input type="text" size="20" value="<?php echo $row->username; ?>"id="username" name="username"/>
                    <br/>
                    <label for="password">Password:</label>
                    <input type="password" size="20" value="<?php echo $row->password; ?>" id="passowrd" name="password"/>
                    <br/>
                    <label for="password">Confirm Password:</label>
                    <input type="password" size="20" value="<?php echo $row->password; ?>"  id="cpassowrd" name="cpassword"/>
                    <br/>
                    <label for="username">Email :</label>
                    <input type="text" size="20" value="<?php echo $row->email; ?>" id="email" name="email"/>
                    <br/>
                    <input type="submit" value="Edit"/>

                <?php } ?></p>
                </form>



                </p>
            </article>
        </aside><!-- /#featured -->



        <?php include 'footer.php'; ?>

    </body>
</html>

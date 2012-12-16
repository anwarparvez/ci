<?php $base_url = base_url(); ?>
<!DOCTYPE html>
<html lang="es"><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Smashing HTML5!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo $base_url ?>css/themes/base/jquery.ui.all.css">
        <script src="<?php echo $base_url ?>js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo $base_url ?>js/jquery-ui-1.9.2.custom.min.js"></script>

        <style>

            label, input { display:block; }
            input.text { margin-bottom:12px; width:95%; padding: .4em; }
            fieldset { padding:0; border:0; margin-top:25px; }
            h1 { font-size: 1.2em; margin: .6em 0; }
            div#users-contain { font-size: 90.5%;width: 100%; margin: 20px 0; }
            div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
            div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
            .ui-dialog .ui-state-error { padding: .3em; }
            .validateTips { border: 1px solid transparent; padding: 0.3em; }
            #dialog-form{ font-size: 65%;}
        </style>
        <script>
            $(function() {

                $( "#dialog-form" ).dialog({
                    autoOpen: false,
                    height: 600,
                    width: 500,
                    modal: true

                });

                $( "#create-user" )
                .button()
                .click(function() {
                    $( "#dialog-form" ).dialog( "open" );
                });
            });
        </script>
    </head>

    <body id="index" class="home">

        <?php include 'header.php' ?>

        <section id="content" class="body">
            <div id="dialog-form" title="Create new user">
                <p class="validateTips">All form fields are required.</p>
                 <?php echo form_open('news/news_insert'); ?>
                    <fieldset>
                        <label for="title">Title</label>
                        <input type="text" name="title"  />
<!--                        <input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />-->
                        <label for="category:">Category</label>
                        <select name="category">
                            <option value="0">Editorial</option>
                            <option value="1">National</option>
                            <option value="2">International</option>
                            <option value="3">Business</option>
                            <option value="4">Arts & Entertainment</option>
                            <option value="5">Sports</option>
                        </select>
                        <label for="sbody">Short Body</label>
                        <textarea placeholder="short description of news here!" name="sbody" cols="50" rows="5" class="text ui-widget-content ui-corner-all"></textarea>
                        <label for="body">Body</label>
                        <textarea placeholder="Body of news here!" name="body" cols="50" rows="7"></textarea>
                        <input type="submit" value="Post"/>
                    </fieldset>
                </form>



            </div>


            <div id="users-contain" class="ui-widget" style="font-size:  90%">
                <h1>Existing News:</h1>
                <table id="users" class="ui-widget ui-widget-content">
                    <thead>
                        <tr class="ui-widget-header ">
                            <th>Title</th>
                            <th>Date</th>
                            <th>Body</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $row) { ?>
                            <tr>
                                <td><?php echo anchor('news/detail/' . $row->id, $row->title); ?></td>
                                <td><?php echo $row->date ?></td>
                                <td style="text-align: justify"><?php echo $row->sbody ?> <?php echo anchor('news/detail/' . $row->id, 'read more'); ?></td>
                                <td >
                                    <?php
                                    if ($this->session->userdata('logged_in')) {

                                        $session_data = $this->session->userdata('logged_in');
                                        if ($session_data['is_admin'] == 1) {
                                            echo anchor('news/delete/' . $row->id, 'delete');
                                        }
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <button id="create-user">Post News</button>

            <?php echo $links ?>
        </section><!-- /#content -->


        <?php include 'footer.php'; ?>


    </body></html>
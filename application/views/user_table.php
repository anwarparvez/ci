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
            div#users-contain { font-size: 62.5%;width: 100%; margin: 20px 0; }
            div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
            div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
            .ui-dialog .ui-state-error { padding: .3em; }
            .validateTips { border: 1px solid transparent; padding: 0.3em; }
        </style>

    </head>

    <body id="index" class="home">
        <?php include 'header.php' ?>
        <section id="content" class="body">
            <div id="users-contain" class="ui-widget">
                <h1>Existing Users:</h1>
                <table id="users" class="ui-widget ui-widget-content">
                    <thead>
                        <tr class="ui-widget-header ">
                            <th>Name</th>
                            <th>User Id</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($query as $row) { ?>
                            <tr>
                                <td><?php echo $row->name; ?></td>
                                <td><?php echo $row->username; ?></td>
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo $row->password; ?></td>
                                <td>                        <?php
                            if ($this->session->userdata('logged_in')) {

                                $session_data = $this->session->userdata('logged_in');
                                if ($row->id != $session_data['id'])
                                    echo anchor('user/delete/' . $row->id, 'Delete');
                            }
                            ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
  
            <?php echo $links ?>
        </section><!-- /#content -->


        <?php include 'footer.php'; ?>


    </body></html>
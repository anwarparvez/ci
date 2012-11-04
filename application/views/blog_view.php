<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php foreach ($query as $row){?>

        <h1><?php echo $row->title ?></h1>
        <h3><?php echo $row->body ?></h3>
        <p><?php echo anchor('blog/comments/'.$row->id,'Comments');?></p>
        <hr/>
        <?php }?>
    </body>
</html>

<!DOCTYPE html>
<html lang="es"><head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>News Room!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css" type="text/css" media="screen"/>
         <!--  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>-->
        <script language="javascript" src="<?php echo base_url(); ?>js/jquery-1.8.3.min.js"></script>
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script language="javascript" src="<?php echo base_url(); ?>js/gmaps.js"></script>
        <!--  <script type="text/javascript" src="https://raw.github.com/HPNeo/gmaps/master/gmaps.js"></script>-->

        <style>

            .popin{
                background:#fff;
                padding:15px;
                box-shadow: 0 0 20px #999;
                border-radius:2px;
            }
            #map{

                height:300px;
                background:#6699cc;
            }


        </style>
        <script type="text/javascript">
            var map;
            $(document).ready(function(){

                map = new GMaps({
                    div: '#map',
                    lat: 22.33306,
                    lng: 91.83639
                });
//                map.addMarker({
//                    lat: 22.33306,
//                    lng: 91.83639,
//                    title: 'Lima',
//                    details: {
//                        database_id: 42,
//                        author: 'HPNeo'
//                    },
//                    click: function(e){
//                        if(console.log)
//                            console.log(e);
//                        alert('You clicked in this marker');
//                    }
//                });
                map.addMarker({
                    lat: 22.33306,
                    lng: 91.83639,
                    title: 'News Room!!!',
                    infoWindow: {
                        content: '<p>HTML Content</p>'
                    }
                });
            });
        </script>
    </head>

    <body id="index" class="home">

        <?php include 'header.php'; ?>

        <aside id="featured" class="body">
            <article>

                <hgroup>
                    <h2> About us</h2>
                </hgroup>
                <p>
                <div class="popin">
                    <div id="map"></div>
                </div>
                </p>
            </article>
        </aside><!-- /#featured -->



        <?php include 'footer.php'; ?>

    </body></html>
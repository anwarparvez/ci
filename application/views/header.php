<nav style="
     background: none repeat scroll 0 0 transparent;
     background: none repeat scroll 0 0 ;
     border-radius: 5px 5px 5px 5px;
     font-size: 1em;
     height: 20px;
     line-height: 20px;
     padding:0 ;
     padding-right: 10px;
     text-align: right;
     width: 100;" >
     <?php
     if ($this->session->userdata('logged_in')) {
         echo anchor('user/', 'Profile');

         $session_data = $this->session->userdata('logged_in');
         if ($session_data['is_admin'] == 1) {
             echo ' | ' . anchor('user/tlist', 'User List');
             echo ' | ' . anchor('news/post', 'Post News');
             echo ' | ' . anchor('news/tnews', 'News List');
         } else {
             echo ' | ' . anchor('user/about', 'About us');
         }
         echo ' | ' . anchor('user/about', 'About us');
         echo ' | ' . anchor('user/logout', 'Logout');
     } else {
         echo anchor('user/about', 'About us');
         echo ' | ' . anchor('user/login', 'Login') . ' | ' . anchor('user', 'Registration');
     }
     ?>

</nav>
<header id="banner" class="body">
    <h1><a href="#">News Room !!! <strong> 24 hours news portal  </strong></a></h1>

</header><!-- /#banner -->
<div id="banner">
    <nav ><ul>
            <li ><?php echo anchor('news/', 'Home'); ?></li>
            <li>
                <?php
                echo anchor('news/editorial/', 'Editorial');
                ?>
            </li>

            <li>
                <?php
                echo anchor('news/international/', 'International');
                ?>
            </li>
            <li>
                <?php
                echo anchor('news/national/', 'National');
                ?>
            </li>
            <li>
                <?php
                echo anchor('news/business', 'Business');
                ?>
            </li>
            <li>
                <?php
                echo anchor('news/sports', 'Sports');
                ?>
            </li>
            <li>
                <?php
                echo anchor('news/arts_entertainment', 'Arts & Entertainment');
                ?>
            </li>



        </ul>


    </nav>
</div>


<header id="banner" class="body">
    <h1><a href="#">News Hour! <strong>24 hr news portal  </strong></a></h1>
    <nav><ul>
            <li ><?php echo anchor('news/', 'Home'); ?></li>
            <li class="active">
                <?php
                if ($this->session->userdata('logged_in')) {
                    echo anchor('news/logout', 'Logout');
                } else {
                    echo anchor('login/', 'Login');
                }
                ?>
            </li>
            <li>
                <?php
                if (!$this->session->userdata('logged_in')) {
                    echo anchor('user', 'Registration');
                }

                ?>
            </li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header><!-- /#banner -->
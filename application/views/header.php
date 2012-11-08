<header id="banner" class="body">
    <h1><a href="#">News Room !!! <strong> 24 hours news portal  </strong></a></h1>
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
            <li>
                <?php
                if ($this->session->userdata('logged_in')) {

                    $session_data = $this->session->userdata('logged_in');
                    if ($session_data['is_admin'] == 1) {
                        echo anchor('news/post', 'Create News');
                    }
                }
                ?>
            </li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
</header><!-- /#banner -->
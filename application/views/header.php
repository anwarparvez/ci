<header id="banner" class="body">
    <h1><a href="#">News Room !!! <strong> 24 hours news portal  </strong></a></h1>
    <nav><ul>
            <li ><?php echo anchor('news/', 'Home'); ?></li>
            <li class="active">
                <?php
                if ($this->session->userdata('logged_in')) {
                    echo anchor('user/logout', 'Logout');
                } else {
                    echo anchor('user/login', 'Login');
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
                        echo anchor('news/post', 'Post News');
                    }
                }
                ?>
            </li>
            <li>
                <?php
                if ($this->session->userdata('logged_in')) {
                    echo anchor('user/', 'Profile');
                }
                ?>
            </li>
            <li>
                <?php
                if ($this->session->userdata('logged_in')) {

                    $session_data = $this->session->userdata('logged_in');
                    if ($session_data['is_admin'] == 1) {
                        echo anchor('user/ulist', 'User List');
                    }
                    else
                    {
                        echo ' <a href="#">About us</a>';
                    }
                }
                else
                {
                    echo ' <a href="#">About us</a>';
                }
                ?>

            </li>
        </ul>
    </nav>
</header><!-- /#banner -->
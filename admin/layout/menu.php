<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link <?php echo (CURRENT_URL == ADMIN_URL) ? "active" : ""; ?>" href="<?php echo ADMIN_URL; ?>">
            <i class="fa fa-home"></i>
            Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo ADMIN_URL; ?>crud/members/">
            <i class="fa fa-users"></i>
            Membres
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo ADMIN_URL; ?>crud/projects/">
            <i class="fa fa-briefcase"></i>
            Projets
        </a>
    </li>
</ul>
<?php if(isset($_SESSION['username'])): ?>
    <li class="nav-link navbar-brand"><?php echo $_SESSION['username']; ?></li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin: 25px 10px;">
                <img src="app/image/avt.jpg" alt="" style="width: 25px; height:25px;">
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/php/account/register"></a></li>

            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/php/account/logout">Logout</a></li>
        </ul>
    </li>
<?php else: ?>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin: 25px 10px;">
            <img src="app/image/avt.jpg" alt="" style="width: 25px; height:25px;">
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/php/account/login">Đăng nhập</a></li>
            <li><a class="dropdown-item" href="/php/account/register">Đăng ký</a></li>
        </ul>
    </li>
<?php endif; ?>

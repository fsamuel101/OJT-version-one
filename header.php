<header class="green-header">
        <div class="solidgreen1"></div>

        <div class="admin-title">

            <div class="hamburger" onclick="toggleMenu()" id="hamburger">
                <div id="hamburger1" onclick="toggleMenu(); event.stopPropagation();"></div>
                <div id="hamburger2" onclick="toggleMenu(); event.stopPropagation();"></div>
                <div id="hamburger3" onclick="toggleMenu(); event.stopPropagation();"></div>
            </div>
            <div class="dropdown-menu" id="dropdownMenu">
                <form action="includes/logout.inc.php" class="hamb">
                    <button class="hover">Log out</button>
                    <a class="hover" href="change_password.php">Change Password</a>
                </form>
            </div>

            <div>
                <a href="welcome.php" style="text-decoration: none; color: #800015;;"><h1><strong>SLIS Library</strong></h1></a>
                <p>Browse books</p>
            </div>


        </div>
        <div class="solidgreen2"></div>
    </header>
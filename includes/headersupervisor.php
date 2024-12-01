<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR</title>
    
    <!-- Bootstrap CSS -->

    <?php if (!isset($skipBootstrap) || !$skipBootstrap): ?>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <?php endif; ?>

    <link rel="stylesheet" href="../css/empleado.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/perfil.css">
    <link rel ="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/questions.css">
    
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>  <!-- Cargar Chart.js -->
</head>
<body id="body">
    
<header>
    <div class="icon__menu">
        <i class="fas fa-bars" id="btn_open"></i>
    </div>

    <div class="header-right">
        <div class="icon_notifications">
            <i class="fas fa-bell"></i>
        </div>

        <!-- Menú desplegable del usuario -->
        <div class="user-menu">
            <div class="user-name" id="userMenuToggle">
                <span>User</span>
                <i class="fas fa-chevron-down"></i>
                <a href="Session/logout.php"></a>
            </div>
            <ul class="dropdown-menu" id="dropdownMenu">
                <li><a href="profile.php"><i class="fas fa-user"></i> My Profile</a></li>
                <li><a href="Session/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
    </div>
</header>


    <div class="menu__side" id="menu_side">

        <div class="name__page">
        <i class="fas fa-users"></i>
        <h4>Human resources</h4>
        </div>

        <div class="options__menu">	

            <a href="home.php" class="selected">
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Home</h4>
                </div>
            </a>

            <a href="incidents.php">
            <div class="option">
                <i class="fas fa-file-alt"></i>
                <h4>Incidents</h4>
                </div>
            </a>
            
            <a href="tickets.php">
            <div class="option">
                <i class="fas fa-calendar-alt"></i>
                    <h4>Tickets</h4>
                </div>
            </a>

            <a href="informationAdmin.php">
            <div class="option">
                    <i class="far fa-sticky-note" title="Report an incident"></i>
                    <h4>Personal information</h4>
                </div>
            </a>

            <a href="vacations.php">
            <div class="option">
                <i class="fas fa-user-check"></i>
                <h4>Vacations</h4>
                </div>
            </a>

            <a href="attandence.php">
            <div class="option">
                <i class="fas fa-chart-line"></i>
                <h4>Attandence</h4>
                </div>
            </a>

            <a href="absence.php">
                <div class="option">
                    <i class="far fa-address-card" title="Personal Information"></i>
                    <h4>Absences</h4>
                </div>
            </a>

            <a href="benefies.php">
                <div class="option">
                    <i class="far fa-address-card" title="Personal Information"></i>
                    <h4>Benefies</h4>
                </div>
            </a>

            <a href="aplications.php">
            <div class="option">
                    <i class="far fa-address-card" title="Personal Information"></i>
                    <h4>Aplications</h4>
                </div>
            </a>

            <a href="promotions.php">
            <div class="option">
                    <i class="far fa-address-card" title="Personal Information"></i>
                    <h4>Promotions</h4>
                </div>
            </a>

            <a href="employees.php"> 
            <div class="option">
                    <i class="far fa-address-card" title="Personal Information"></i>
                    <h4>Employee</h4>
                </div>
            </a>

            <a href="../Session/logout.php">
            <div class="option">
                <i class="fas fa-sign-out-alt"></i>
                <h4>Sign out</h4>
                </div>
            </a>

        </div>

    </div>

    <main>
      
        <div>
            
        </div>
        
    </main>

    <script src="../js/menu.js"></script>
</body>
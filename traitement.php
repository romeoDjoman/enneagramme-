<?php
require_once('inc/init.inc.php');
require_once('inc/function.inc.php');
require_once('inc/head.inc.php');

// DROP TABLE IF EXISTS `etudiants`;
// CREATE TABLE IF NOT EXISTS `etudiants` (
//   `id` int DEFAULT NULL,
//   `prenom` varchar(50) DEFAULT NULL,
//   `nom` varchar(50) DEFAULT NULL,
//   `q1` int DEFAULT NULL,
//   `q2` int DEFAULT NULL,
//   `q3` int DEFAULT NULL,
//   `q4` int DEFAULT NULL,
//   `q5` int DEFAULT NULL
// ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
// COMMIT;

// Calcul type essai
$req_type = $pdo->query('SELECT q1 + q3 + q5 FROM etudiants WHERE id=(SELECT MAX(id) FROM etudiants)');
$result_type = $req_type->fetch(PDO::FETCH_ASSOC);
echo $result_type['q1 + q3 + q5'];

// Calcul type 2
// $req_type2 = $pdo->query('SELECT q7 + q14 + q19 + q23 + q48 + q52 + q62 + q66 + q72 + q77 FROM etudiants WHERE id=(SELECT MAX(id) FROM etudiants)');
// $result_type2 = $req_type2->fetch(PDO::FETCH_ASSOC);
// echo $result_type2['q7 + q14 + q19 + q23 + q48 + q52 + q62 + q66 + q72 + q77'];

// // Calcul type 3
// $req_type3 = $pdo->query('SELECT q45 + q16 + q30 + q32 + q39 + q50 + q71 + q78 + q5 FROM etudiants WHERE id=(SELECT MAX(id) FROM etudiants)');
// $result_type3 = $req_type3->fetch(PDO::FETCH_ASSOC);
// echo $result_type3['q45 + q16 + q30 + q32 + q39 + q50 + q71 + q78 + q5'];

// // Calcul type 4
// $req_type4 = $pdo->query('SELECT q43 + q13 + q17 + q37 + q41 + q64 + q74 + q80 FROM etudiants WHERE id=(SELECT MAX(id) FROM etudiants)');
// $result_type4 = $req_type4->fetch(PDO::FETCH_ASSOC);
// echo $result_type4['q43 + q13 + q17 + q37 + q41 + q64 + q74 + q80'];

// // Calcul type 5
// $req_type5 = $pdo->query('SELECT q75 + q8 + q11 + q1 + q29 + q38 + q46 + q56 + q68 FROM etudiants WHERE id=(SELECT MAX(id) FROM etudiants)');
// $result_type5 = $req_type5->fetch(PDO::FETCH_ASSOC);
// echo $result_type5['q75 + q8 + q11 + q1 + q29 + q38 + q46 + q56 + q68'];

// // Calcul type 6
// $req_type6 = $pdo->query('SELECT q34 + q69 + q81 + q22 + q26 + q40 + q49 + q59 + q7 FROM etudiants WHERE id=(SELECT MAX(id) FROM etudiants)');
// $result_type6 = $req_type6->fetch(PDO::FETCH_ASSOC);
// echo $result_type6['q34 + q69 + q81 + q22 + q26 + q40 + q49 + q59 + q7'];

// // Calcul type 7
// $req_type7 = $pdo->query('SELECT q18 + q28 + q31 + q57 + q63 + q15 + q67 + q79 + q6 FROM etudiants WHERE id=(SELECT MAX(id) FROM etudiants)');
// $result_type7 = $req_type7->fetch(PDO::FETCH_ASSOC);
// echo $result_type7['q18 + q28 + q31 + q57 + q63 + q15 + q67 + q79 + q6'];

// // Calcul type 8
// $req_type8 = $pdo->query('SELECT q9 + q24 + q36 + q42 + q44 + q47 + q53 + q58 + q4 FROM etudiants WHERE id=(SELECT MAX(id) FROM etudiants)');
// $result_type8 = $req_type8->fetch(PDO::FETCH_ASSOC);
// echo $result_type8['q9 + q24 + q36 + q42 + q44 + q47 + q53 + q58 + q4'];

// // Calcul type 9
// $req_type9 = $pdo->query('SELECT q70 + q10 + q12 + q27 + q51 + q55 + q61 + q2 + q20 FROM etudiants WHERE id=(SELECT MAX(id) FROM etudiants)');
// $result_type9 = $req_type9->fetch(PDO::FETCH_ASSOC);
// echo $result_type9['q70 + q10 + q12 + q27 + q51 + q55 + q61 + q2 + q20'];

// // Calcul type 1
// $req_type1 = $pdo->query('SELECT q21 + q25 + q33 + q35 + q60 + q73 + q3 + q54 + q65 FROM etudiants WHERE id=(SELECT MAX(id) FROM etudiants)');
// $result_type1 = $req_type1->fetch(PDO::FETCH_ASSOC);
// echo $result_type1['q21 + q25 + q33 + q35 + q60 + q73 + q3 + q54 + q65'];

// $req_type2 = query('SELECT q7, q14, q19, q23, q48, q52, q62, q66, q72, q77 FROM etudiants');
// $req_type3 = query('SELECT q45, q16, q30, q32, q39, q50, q71, q78, q5 FROM etudiants');
// $req_type14 = query('SELECT q43, q13, q17, q37, q41, q64, q74, q80 FROM etudiants');
// $req_type5 = query('SELECT q75, q8, q11, q1, q29, q38, q46, q56, q68 FROM etudiants');
// $req_type6 = query('SELECT q34, q69, q81, q22, q26, q40, q49, q59, q76 FROM etudiants');
// $req_type7 = query('SELECT q18, q28, q31, q57, q63, q15, q67, q79, q6 FROM etudiants');
// $req_type8 = query('SELECT q9, q24, q36, q42, q44, q47, q53, q58, q4 FROM etudiants');
// $req_type9 = query('SELECT q70, q10, q12, q27, q51, q55, q61, q2, q20 FROM etudiants');
// $req_type1 = query('SELECT q21, q25, q33, q35, q60, q73, q3, q54, q65 FROM etudiants');

?>



<!-- Page content -->
<div class="d-flex align-items-center py-4 bg-body-tertiary">
    </head>

    <body class="bg-body-tertiary">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check2" viewBox="0 0 16 16">
                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
            </symbol>
            <symbol id="circle-half" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
            </symbol>
            <symbol id="moon-stars-fill" viewBox="0 0 16 16">
                <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
            </symbol>
            <symbol id="sun-fill" viewBox="0 0 16 16">
                <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
            </symbol>
        </svg>

        <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
            <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
                <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                    <use href="#circle-half"></use>
                </svg>
                <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                        <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                            <use href="#sun-fill"></use>
                        </svg>
                        Light
                        <svg class="bi ms-auto d-none" width="1em" height="1em">
                            <use href="#check2"></use>
                        </svg>
                    </button>
                </li>
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                        <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                            <use href="#moon-stars-fill"></use>
                        </svg>
                        Dark
                        <svg class="bi ms-auto d-none" width="1em" height="1em">
                            <use href="#check2"></use>
                        </svg>
                    </button>
                </li>
                <li>
                    <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                        <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                            <use href="#circle-half"></use>
                        </svg>
                        Auto
                        <svg class="bi ms-auto d-none" width="1em" height="1em">
                            <use href="#check2"></use>
                        </svg>
                    </button>
                </li>
            </ul>
        </div>


        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Offcanvas navbar</a>
                <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Notifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Switch account</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <main class="container">
            <div class="d-flex align-items-center p-3 my-3 text-white bg-purple rounded shadow-sm">
                <img class="me-3" src="../assets/brand/bootstrap-logo-white.svg" alt="" width="48" height="38">
                <div class="lh-1">
                    <h1 class="h6 mb-0 text-white lh-1">Bootstrap</h1>
                    <small>Since 2011</small>
                </div>
            </div>

            <!-- fill="#e83e8c" -->

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <h6 class="border-bottom pb-2 mb-0">Resultat global</h6>
                <div class="d-flex text-body-secondary pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Nom de la personne inscrite</title>
                        <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                    </svg>
                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">Roméo</strong>
                            <a href="#">Résultat</a>
                        </div>
                       
                        <span class="d-block">@etudiant</span>
                    </div>
                    
                </div>
                <div class="d-flex text-body-secondary pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                    </svg>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                                        <title>Nom de la personne inscrite</title>
                                        <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                                    </svg>
                                    <div class="d-flex justify-content-between">
                                        <strong class="text-gray-dark">Roméo</strong>
                                        <a href="#">Résultat</a>
                                    </div>
                                    <span class="d-block">@etudiant</span>
                                </th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td colspan="2">Larry the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex text-body-secondary pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
                    </svg>
                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                        <div class="d-flex justify-content-between">
                            <strong class="text-gray-dark">Full Name</strong>
                            <a href="#">Follow</a>
                        </div>
                        <span class="d-block">@username</span>
                    </div>
                </div>
                <small class="d-block text-end mt-3">
                    <a href="#">All suggestions</a>
                </small>
            </div>
        </main>
</div>


<!-- footer -->
<?php
require_once('inc/foot.inc.php');

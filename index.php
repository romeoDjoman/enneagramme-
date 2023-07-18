<?php
require_once('inc/init.inc.php');
require_once('inc/function.inc.php');


$errors = array();
$questions = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $prenom = testInput($_POST["prenom"]);
    if (empty($prenom)) {
        $errors["prenom"] = "Le prénom est requis";
    }

    $nom = testInput($_POST["nom"]);
    if (empty($nom)) {
        $errors["nom"] = "Le nom est requis";
    }

    $questions = array("J'ai tendance à me concentrer sur quelque chose pour comprendre d'avantage",
                       "Je suis receptif à tout",
                       "Je fais des efforts pour améliorer les choses ou la situation",
                       "J'ai de bonnes qualités de meneur",
                       "J'ai tendance à être émotif et reste souvent seul");

    foreach ($questions as $index => $question) {
        $questionNumber = $index + 1;
        $answer = isset($_POST["q$questionNumber"]) ? intval($_POST["q$questionNumber"]) : 0;
        if ($answer < 1 || $answer > 5) {
            $errors["q$questionNumber"] = "La réponse pour la question $questionNumber est requise";
        }
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO etudiants (prenom, nom, q1, q2, q3, q4, q5) VALUES (?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute([$prenom, $nom, $_POST["q1"], $_POST["q2"], $_POST["q3"], $_POST["q4"], $_POST["q5"]]);

        header('location:traitement.php');
        exit();
    }
}

function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// En tête de la page
require_once('inc/head.inc.php');
?>


<!-- Page content -->
<div class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <form action="" method="POST" enctype="multipart/form-data">
            <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Votre personnalité</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="<?php echo isset($_POST['prenom']) ? $_POST['prenom'] : ''; ?>">
                <label for="prenom">Prénom</label>
                <?php if (!empty($errors["prenom"])) {
                    echo "<p class='text-danger'>" . $errors["prenom"] . "</p>";
                } ?>
            </div>
            <br>
            <div class="form-floating">
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : ''; ?>">
                <label for="nom">Nom</label>
                <?php if (!empty($errors["nom"])) {
                    echo "<p class='text-danger'>" . $errors["nom"] . "</p>";
                } ?>
            </div>
            <br>

            <?php

            for ($i = 0; $i < count($questions); $i++) {
                $questionNumber = $i + 1;
                $question = $questions[$i];
            ?>
                <div class="bg-white py-4 px-4 form-control">
                    <div class="form-check">
                        <p><?php echo $questionNumber . ". " . $question; ?></p>
                        <div>
                            <input type="radio" name="q<?php echo $questionNumber; ?>" id="q<?php echo $questionNumber; ?>_1" value="1" class="form-check-input" required>
                            <label class="form-check-label" for="q<?php echo $questionNumber; ?>_1">1 (Pas du tout vrai)</label>
                        </div>
                        <div>
                            <input type="radio" name="q<?php echo $questionNumber; ?>" id="q<?php echo $questionNumber; ?>_2" value="2" class="form-check-input" required>
                            <label class="form-check-label" for="q<?php echo $questionNumber; ?>_2">2 (Peu vrai)</label>
                        </div>
                        <div>
                            <input type="radio" name="q<?php echo $questionNumber; ?>" id="q<?php echo $questionNumber; ?>_3" value="3" class="form-check-input" required>
                            <label class="form-check-label" for="q<?php echo $questionNumber; ?>_3">3 (Un peu vrai)</label>
                        </div>
                        <div>
                            <input type="radio" name="q<?php echo $questionNumber; ?>" id="q<?php echo $questionNumber; ?>_4" value="4" class="form-check-input" required>
                            <label class="form-check-label" for="q<?php echo $questionNumber; ?>_4">4 (Plutôt vrai)</label>
                        </div>
                        <div>
                            <input type="radio" name="q<?php echo $questionNumber; ?>" id="q<?php echo $questionNumber; ?>_5" value="5" class="form-check-input" required>
                            <label class="form-check-label" for="q<?php echo $questionNumber; ?>_5">5 (Tout à fait vrai)</label>
                        </div>
                    </div>
                </div>
                <br>
            <?php
            }
            ?>

            <button class="btn btn-primary w-100 py-2" type="submit">Envoyer</button>
        </form>
    </main>
</div>


<!-- Footer -->
<?php

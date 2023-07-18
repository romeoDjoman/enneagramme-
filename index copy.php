<?php
require_once('inc/init.inc.php');
require_once('inc/function.inc.php');
require_once('inc/head.inc.php');

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

        header("Location: index.php");
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

// Add a check to see if the form has been submitted
if (!isset($_POST['submit'])) {
?>

<!-- Page content -->
<div class="d-flex align-items-center py-4 bg-body-tertiary">
    <main class="form-signin w-100 m-auto">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Votre personnalité</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="<?php echo isset($_POST['prenom']) ? $_POST['prenom'] : ''; ?>">
                <label for="prenom">Prénom</label>
                <?php if (!empty($errors["prenom"])) {
                    echo "<p class='text-danger'>" . $errors["prenom"] . "</p>";
                } ?>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : ''; ?>">
                <label for="nom">Nom</label>
                <?php if (!empty($errors["nom"])) {
                    echo "<p class='text-danger'>" . $errors["nom"] . "</p>";
                } ?>
            </div>
            <br>

            <?php foreach ($questions as $index => $question) : ?>
                <div class="bg-white py-4 px-4 form-control">
                    <div class="form-check">
                        <p><?php echo ($index + 1) . ". " . $question; ?></p>
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <div>
                                <input type="radio" name="q<?php echo $index + 1; ?>" id="q<?php echo $index + 1; ?>_<?php echo $i; ?>" value="<?php echo $i; ?>" class="form-check-input" <?php if (isset($_POST["q" . ($index + 1)]) && $_POST["q" . ($index + 1)] == $i) echo "checked"; ?> required>
                                <label class="form-check-label" for="q<?php echo $index + 1; ?>_<?php echo $i; ?>"><?php echo $i; ?> (<?php echo ($i === 1) ? 'Pas du tout vrai' : (($i === 5) ? 'Tout à fait vrai' : (($i === 2) ? 'Peu vrai' : (($i === 3) ? 'Un peu vrai' : 'Plutôt vrai'))); ?>)</label>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <?php if (!empty($errors["q" . ($index + 1)])) {
                        echo "<p class='text-danger'>" . $errors["q" . ($index + 1)] . "</p>";
                    } ?>
                </div>
                <br>
            <?php endforeach; ?>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Soumettre</button>
        </form>
    </main>
</div>

<?php } ?>

<!-- Footer -->
<?php

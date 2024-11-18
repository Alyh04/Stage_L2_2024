<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../Utilisateur/image/sign-in-alt.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container" id="container">
        <!-- Formulaire d'inscription -->
        <div class="form-container sign-up">
            <form method="POST" action="ajout_utilisateur.php">
                <h1>Inscription</h1>
                <input type="text" placeholder="Nom" autocomplete="off" id="nom" name="nom" required>
                <input type="text" placeholder="Prénom" autocomplete="off" id="prenom" name="prenom" required>
                <input type="password" placeholder="Mot de passe" autocomplete="off" id="mdp_utilisateur" name="mdp_utilisateur" required>
                <input type="text" placeholder="Département" autocomplete="off" id="departement" name="departement" required>
                <select id="statut" name="statut" required>
                    <option value="Utilisateur">Utilisateur</option>
                    <option value="Administrateur">Administrateur</option>
                </select>
                <button name="Ajouter">Créer un compte</button>
            </form>
        </div>

        <!-- Formulaire de connexion -->
        <div class="form-container sign-in">
            <form method="POST" action="access.php"> 
                <h1>Se connecter</h1>
                <input type="text" id="nomUtilisateur" name="nomUtilisateur" placeholder="Nom" autocomplete="off" required>
                <input type="password" id="password" name="password" placeholder="Mot de passe" autocomplete="off" required>
                <button name="access">Se connecter</button>
            </form>
        </div>

        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Gestion de ticket</h1>
                    <p>Bienvenue sur notre application en ligne pour gérer les problèmes au niveau matériel de l'entreprise</p>
                    <button class="hidden" id="login" onclick="showSignIn();">Se connecter</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Gestion de ticket</h1>
                    <p>Bienvenue sur notre application en ligne pour gérer les problèmes au niveau matériel de l'entreprise</p>
                    <button class="hidden" id="register" onclick="showSignUp();">Créer un Compte</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
    // Fonction pour afficher le formulaire de connexion
    function showSignIn() {
        document.querySelector('.sign-in').style.display = 'block';
        document.querySelector('.sign-up').style.display = 'none';
        clearSignInFields();
    }

    // Fonction pour afficher le formulaire d'inscription
    function showSignUp() {
        document.querySelector('.sign-up').style.display = 'block';
        document.querySelector('.sign-in').style.display = 'none';
        clearSignUpFields();
    }

    // Fonction pour vider les champs du formulaire de connexion
    function clearSignInFields() {
        document.getElementById('nomUtilisateur').value = '';
        document.getElementById('password').value = '';
    }

    // Fonction pour vider les champs du formulaire d'inscription
    function clearSignUpFields() {
        document.getElementById('nom').value = '';
        document.getElementById('prenom').value = '';
        document.getElementById('mdp_utilisateur').value = '';
        document.getElementById('departement').value = '';
        document.getElementById('statut').selectedIndex = 0; // Réinitialise le select à la première option
    }

    // Initialiser avec le formulaire de connexion visible
    window.onload = showSignIn;
</script>

</body>

</html>

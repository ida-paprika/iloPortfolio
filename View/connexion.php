<?php $titre = "Connexion"; ?>

<div id="pageConnexion">
    <section>
        <h2>Se connecter</h2>
        <div class="">
            <form action="" method="post">
                <div class="form-group">
                    <label for="login"></label>
                    <input type="text" name="login" placeholder="Login" 
                           title="Saisir une adresse mail valide"
                           minlength="3" maxlength="10" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="password"></label>
                    <input type="password" name="password" placeholder="Password"
                           title="De 8 à 20 caractères, minuscule, majuscule et chiffre requis"
                           minlength="8" maxlength="20" required class="form-control">
                </div>
                <?= !empty($_SESSION['msg'])? '<p class="my-2 p-1 bg-danger font-weight-bold text-center" id="message"><i class="fa fa-exclamation-triangle"></i> '. $_SESSION['msg'] . '</p>' : ''; ?>
                <div class="submit-div">
                    <input type="submit" name="userConnect" value="Se connecter" class="btn btn-primary">
                </div>
            </form>
        </div>
    </section>
</div>

<div id="pageInscription">
    <section>
        <h2>Créer un compte</h2>
        <div class="blocForm">
            <form action="" method="post">
                <div class="newUserPseudo">
                    <label for="login"></label>
                    <input type="text" name="login" placeholder="Login" 
                           minlength="3" maxlength="20" 
                           title="De 3 à 20 caractères, minuscules, majuscules et chiffres seulement (pas de caractères spéciaux)" 
                           required class="">
                </div>
                <div class="newUserMdp">
                    <label for="password"></label>
                    <input type="password" name="password" placeholder="mot de passe"
                           title="De 8 à 20 caractères, minuscule, majuscule et chiffre requis"
                           minlength="8" maxlength="20" required class="">
                </div>
                <div class="newUserMail">
                    <label for="mail"></label>
                    <input type="email" name="mail" placeholder="email" 
                           title="Saisir une adresse mail valide"
                           minlength="8" maxlength="30" required class="">
                </div>
                <?= !empty($msg)? '<p class="my-2 p-1 bg-danger font-weight-bold text-center" id="message"><i class="fa fa-exclamation-triangle"></i> '. $msg . '</p>' : ''; ?>
                <div class="submit-div">
                    <input type="submit" name="userInscript" value="S'inscrire">
                </div>
            </form>
        </div>
    </section>
</div>
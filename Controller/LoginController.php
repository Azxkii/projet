<?php

namespace App\Controller;

use App\Model\DB;

class LoginController extends AbstractController
{
    /**
     * Sees if the user is connected otherwise, send on the login page.
     * @return void
     */
    public function index()
    {
        if (!isset($_SESSION["authenticated"])) {
            $this->display('login/login');
        }
        else{
            $this->display('articles/playstation');
        }
    }

    /**
     * Sends to the user's registration page.
     * @return void
     */

    public function index_Register()
    {
        if (!isset($_SESSION["authenticated"])) {
            $this->display('register/register');
        }
        else{
            $this->display('articles/playstation');
        }
    }

    /**
     * Logs out the user.
     * @return void
     */

    public function logout()
    {
        if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"]) {
            $_SESSION["authenticated"] = false;
            $_SESSION = array();
            session_destroy();

            header('Location: /login');
            exit;
        }
        else {
            header("Location: /login");
        }
    }

    /**
     * Send the data entered in the form to the database and check if they correspond.
     * @param $i
     * @return true
     */

    public static function checkLogin()
    {

        $req = DB::getInstance()->prepare('SELECT * FROM user WHERE pseudo = :username and email = :email');

        $email = strip_tags($_POST['email'] ?? ''); // Removes all potentially dangerous HTML tags
        $username = strip_tags($_POST['pseudo'] ?? ''); // Removes all potentially dangerous HTML tags
        $pass_form = strip_tags($_POST['password-connect'] ?? ''); // Removes all potentially dangerous HTML tags

        $req->bindParam(':username', $username);
        $req->bindParam(':email', $email);

        $pass_form = strip_tags($pass_form); // Removes all potentially dangerous HTML tags
        password_hash($pass_form, PASSWORD_BCRYPT); // Filtered

        if ($username && $pass_form) { // Check if the fields were found
            if ($req->execute()) {
                $userData = $req->fetch(); // Turn our $req into an associative array
                if (!empty($userData)) { // Go check if it's true
                    if (password_verify($pass_form, $userData['password'])) { // Check if the clear password > filter and equal to the password saved in the database
                        if ($req->execute()){
                            session_start();
                            $id = $userData['id']; // Retrieve User ID

                            $_SESSION["authenticated"] = true;
                            $_SESSION["user"] = [
                                "name" => $userData['pseudo'],
                                "email" => $userData['email'],
                            ];

                            $_SESSION["id"] = $id;

                            $_SESSION['login_attempts'] = 0;
                            unset($_SESSION['lockout_time']);

                            Header("Location: /topsel");
                        }
                        else {
                            Header("Location: /login?error_email=1");
                            echo("<div class='warning'> Adresse mail incorrect.. </div>");
                            echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 3000);</script>";
                            $_SESSION['login_attempts']++;
                        }
                    } else {
                        Header("Location: /login?error_pass=1");
                        echo("<div class='warning'> Mot de passe incorrect.. </div>");
                        echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 3000);</script>";
                        $_SESSION['login_attempts']++;
                    }
                } else {
                    Header("Location: /login?error_user=1");
                    echo "<div class='warning'> Aucun utilisateur trouvé avec le nom d'utilisateur: " . $username . "</div>";
                    echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 3000);</script>";
                    $_SESSION['login_attempts']++;
                }
            } else {
                Header("Location: /login?error_user=1");
                echo "<div class='warning'> Aucun compte associé à ce nom d'utilisateur </div>";
                echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 3000);</script>";
                $_SESSION['login_attempts']++;
            }
        } else {
            Header("Location: /login?error=1");
            echo "<div class='warning'> Aucun champ trouvé..  </div>";
            echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 3000);</script>";
            $_SESSION['login_attempts']++;
        }
    }

    /**
     * Send the data entered in the form to the database and check if they correspond.
     * @return void
     */

    public function registerUser()
    {


        if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password-repeat']) && isset($_POST['email'])) {
            $username = strip_tags($_POST['username']);
            $user_email = strip_tags($_POST['email']);
            $code_verification = uniqid();

            // Check if the email is valid
            $username = preg_replace('/[^a-zA-Z0-9]+/', '', strtr(trim($_POST['username']), 'àáâäãåçèéêëìíîïñòóôöõøùúûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy'));
            $user_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Filter email address to remove special characters
            if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
                echo "<div class='warning'> Cette adresse email n'est pas valide. </div>";
                echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 6000);</script>";
                return;
            }

            if (!preg_match('/^[a-zA-Z]+$/', $_POST['username'])) {
                echo "<div class='warning'> Le nom d'utilisateur ne doit contenir que des caractères alphabétiques non accentués. </div>";
                echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 6000);</script>";
                return;
            }

            // Check if username already exists
            $sql = "SELECT id FROM user WHERE pseudo = :username";
            $req = DB::getInstance()->prepare($sql);

            $req->bindParam(':username', $username);
            $req->execute();
            $result = $req->fetch();
            if ($result) {
                echo "<div class='warning'> Nom d'utilisateur déjà pris. </div>";
                echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 6000);</script>";
                $this->display('login/login');
                return;
            }

            // Check if the email address already exists
            $sql = "SELECT id FROM user WHERE email = :email";
            $req = DB::getInstance()->prepare($sql);

            $req->bindParam(':email', $user_email);
            $req->execute();
            $result = $req->fetch();
            if ($result) {
                echo "<div class='warning'> Cette adresse email est déjà utilisée. </div>";
                echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 6000);</script>";
                return;
            }

            // Verify both passwords
            if ($_POST['password'] === $_POST['password-repeat']){
                $username = htmlspecialchars($_POST['username'], ENT_QUOTES); // Convert special characters to HTML entities
                // The verifications have been passed, we can add the user to the database
                $pass = $_POST['password'];
                $hash = password_hash($pass, PASSWORD_BCRYPT);


                $sql = "INSERT INTO user (pseudo, password, email, code) VALUES (:username, :password, :email, :code)";
                $req = DB::getInstance()->prepare($sql);


                $req->bindParam(':username', $username);
                $req->bindParam(':password', $hash);
                $req->bindParam(':email', $user_email);
                $req->bindParam(':code', $code_verification);
                $req->execute();

                $_SESSION['code'] = $code_verification;

                $object = 'Vérification du compte';
                $object = htmlspecialchars($object);

                $content = 'Voici votre code secret pour valider votre compte : ' . $code_verification;
                $content = htmlspecialchars($content);

                $to = $user_email;
                $subject = $object;
                $message = $content;
                $message = wordwrap($message, 70, "\r\n");
                $headers = array(
                    'From' => 'azxki@azxki.fr',
                    'Reply-To' => 'azxki@azxki.fr',
                    'X-Mailer' => 'PHP/' . phpversion()
                );

                mail($to, $subject, $message, $headers, "-f azxki@azxki.fr");

                Header("Location: /verification");
            }
            else{
                echo "<div class='warning'> Mot de passe non identique. </div>";
                echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 8000);</script>";
                $this->display('login/login');
            }
        }
    }

    public function verifyUser () {
        $pdo = DB::getInstance();

        $sql = "SELECT * FROM user WHERE code = :code";
        $req = DB::getInstance()->prepare($sql);

        $req->bindParam(':code', $_POST['code']);
        $req->execute();
        $result = $req->fetch();

        if ($result) {
            // Updated "verify" column to 1
            $updateQuery = "UPDATE user SET verify = 1 WHERE code = :code and email = :email";
            $updateStmt = $pdo->prepare($updateQuery);
            $updateStmt->bindParam(':code', $_POST['code']);
            $updateStmt->bindParam(':email', $_POST['email']);
            $updateStmt->execute();

            // Redirect to login page
            header('Location: /login?code=1');
            exit();
        } else {
            // Redirection to the previous page (verification page)
            header('Location: /verification?code=0');
            exit();
        }
    }

    public function CheckForgotPassword() {
        $req = DB::getInstance()->prepare('SELECT * FROM user WHERE pseudo = :username AND email = :email');

        $username = strip_tags($_POST['pseudo'] ?? ''); // Removes all potentially dangerous HTML tags
        $email = strip_tags($_POST['email'] ?? ''); // Removes all potentially dangerous HTML tags
        $pass_form = strip_tags($_POST['forgot-password'] ?? ''); // Removes all potentially dangerous HTML tags

        $req->bindParam(':username', $username);
        $req->bindParam(':email', $email);

        $pass_form = strip_tags($pass_form); // Removes all potentially dangerous HTML tags
        $hash = password_hash($pass_form, PASSWORD_BCRYPT); // Step 2 we filter it

        if ($username && $pass_form && $email) { // Check if the fields were found
            if ($req->execute()) {
                $userData = $req->fetch(); // Turn our $req into an associative array
                if (!empty($userData)) { // Go check if it's true
                        $req = DB::getInstance()->prepare("UPDATE user SET password = :password WHERE pseudo = :username");
                        $req->bindParam(':username', $username);
                        $req->bindParam(':password', $hash);

                        $req->execute();

                        Header("Location: /login?success-password=1");
                    } else {
                        Header("Location: /forgot-password?error_pass=1");
                        echo("<div class='warning'> Mot de passe introuvable.. </div>");
                        echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 3000);</script>";
                        $_SESSION['login_attempts']++;
                    }
                } else {
                    Header("Location: /forgot-password?error_user=1");
                    echo "<div class='warning'> Aucun utilisateur trouvé avec le nom d'utilisateur: " . $username . "</div>";
                    echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 3000);</script>";
                    $_SESSION['login_attempts']++;
                }
            } else {
                Header("Location: /forgot-password?error_user=1");
                echo "<div class='warning'> Aucun compte associé à ce pseudo </div>";
                echo "<script>setTimeout(function(){ document.querySelector('.warning').style.display = 'none'; }, 3000);</script>";
                $_SESSION['login_attempts']++;
            }
        }
}

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . './code/Admin/Controller/Controller.php');
class loginView{
    /***************************** */
    public function header(){
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="login.css">
    <title>Login Page Admin</title>
</head>
<?php
    }
    /***************************** */
    public function login(){
        ?>
        <h1>Bien venu sur l'espace Admin du site<br> cuizine dz </h2>
        <img src="img/chef2.png" >
    <form method="post" action="<?php $controller=new adminController();$controller->Login(); ?>">
        <label for="username">Username</label>
        <input type="text" name="username" id="Username">
        <label for="password">password</label>
        <input type="password" name="password" id="password">
        <button type="submit" name="login">LogIn</button>
    </form>
        <?php
    }
    /***************************** */
    public function display()
    {
        $this->header();
        $this->login();
    }
    /***************************** */
}
?>
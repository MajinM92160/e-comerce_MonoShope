<?php
session_start();

/* ici ce if signifie si la session qui porte ce nom xRttpHo0greL39 à été set alors je supprime tout en recevant un tableau vide en déclarant un array vide et je detruit la session grace à la fonction session destroy et je renvoie donc l'utilisateur vers la page index.php */
if (isset($_SESSION['xRttpHo0greL39'])){

    $_SESSION['xRttpHo0greL39'] = array();

    session_destroy();

    header("Location: ../index.php");
}

?>
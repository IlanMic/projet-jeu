$(document).ready(function () {
    showConnectionForm();
    

/**
    Permet d'afficher le formulaire de connexion ou d'inscription
    */
    function showConnectionForm() {
        var connexion_form = document.getElementsByClassName("connexion-form")
        var inscription_form = document.getElementsByClassName("inscription-form")
        var reinitialisation_form = document.getElementsByClassName("reinitialisation-form")
        
        $(".btn-connexion").click(function() {
            $(connexion_form).removeClass("d-none")
            $(inscription_form).addClass("d-none")
            $(reinitialisation_form).addClass("d-none")
        });
        
        $(".btn-inscription").click(function() {
            $(inscription_form).removeClass("d-none")
            $(connexion_form).addClass("d-none")
            $(reinitialisation_form).addClass("d-none")
        });
        
        $(".btn-recuperation").click(function() {
            $(reinitialisation_form).removeClass("d-none")
            $(connexion_form).addClass("d-none")
            $(inscription_form).addClass("d-none")
        });
    }

});
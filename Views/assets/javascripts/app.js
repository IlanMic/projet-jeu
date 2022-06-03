$(document).ready(function () {
    showConnectionForm();
    showSelectedPersonnage();
    

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

    /**
    Permet d'afficher le personnage séléctionnée
    */
    function showSelectedPersonnage() {
        var svg_1= document.getElementsByClassName("svg-1")
        var svg_2 = document.getElementsByClassName("svg-2")
        var svg_3 = document.getElementsByClassName("svg-3")
        
        $(".tick-1").click(function() {
            $(svg_1).removeClass("invisible")
            $(svg_2).addClass("invisible")
            $(svg_3).addClass("invisible")
        });
        
        $(".tick-2").click(function() {
            $(svg_2).removeClass("invisible")
            $(svg_1).addClass("invisible")
            $(svg_3).addClass("invisible")
        });
        
        $(".tick-3").click(function() {
            $(svg_3).removeClass("invisible")
            $(svg_2).addClass("invisible")
            $(svg_1).addClass("invisible")
        });
    }



});
$(document).ready(function () {
    showConnectionForm();
    showSelectedPersonnage();
    matchTimer();
    activateCapacite();
    activateCapaciteByKey();
    

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


    /**
     * Timer pour le match
     */
    function matchTimer(){
        let temps = 5400
        const timerElement = document.getElementById("timer")
  
        function diminuerTemps() {
            let minutes = parseInt(temps / 60, 10)
            let secondes = parseInt(temps % 60, 10)

            minutes = minutes < 10 ? "0" + minutes : minutes
            secondes = secondes < 10 ? "0" + secondes : secondes
          
            timerElement.innerText = minutes + ":" + secondes
            temps--
        }
        setInterval(diminuerTemps, 1000)
    }

    /**
     * Capacité a activer avec cooldown de rechargement
     */
    function activateCapacite(){
        var enableCapacite1 = function(ele) {
            $(ele).removeAttr("disabled");
            document.getElementById("image-capacite-1").style.visibility='visible';
        }

        var enableCapacite2 = function(ele) {
            $(ele).removeAttr("disabled");
            document.getElementById("image-capacite-2").style.visibility='visible';
        }
        
        $("#capacite-1").click(function() {
            var that = this;
            $(this).attr("disabled", true);
            document.getElementById("image-capacite-1").style.visibility='hidden';
            setTimeout(function() { enableCapacite1(that) }, 10000);
        });

        $("#capacite-2").click(function() {
            var that = this;
            $(this).attr("disabled", true);
            document.getElementById("image-capacite-2").style.visibility='hidden';
            setTimeout(function() { enableCapacite2(that) }, 1000);
        });
    }

    function activateCapaciteByKey(){
        var enableCapacite1 = function(ele) {
            $(ele).removeAttr("disabled");
            document.getElementById("image-capacite-1").style.visibility='visible';
        }

        var enableCapacite2 = function(ele) {
            $(ele).removeAttr("disabled");
            document.getElementById("image-capacite-2").style.visibility='visible';
        }

        $(document).keypress(function(e){
            if (e.which == 65){
                $('#capacite-a').attr("disabled", true);
                document.getElementById("image-capacite-1").style.visibility='hidden';
                setTimeout(function() { enableCapacite1('#capacite-a') }, 1000);
            }else if(e.which == 69){
                $('#capacite-e').attr("disabled", true);
                document.getElementById("image-capacite-2").style.visibility='hidden';
                setTimeout(function() { enableCapacite2('#capacite-e') }, 10000);
            }
        });
    }


});
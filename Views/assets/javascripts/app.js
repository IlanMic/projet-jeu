$(document).ready(function () {
    showConnectionForm();
    matchTimer();
    activateCapacite();
    activateCapaciteByKey();
    showAdminForm();
    

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

    $('#perso_1').change(function(e){
        $('#perso_2').prop('disabled', !$(this).val());
    });

    $(function(){
    $('#perso_2').prop('disabled', true);
    });


    $('#perso_2').change(function(e){
        $('#perso_3').prop('disabled', !$(this).val());
    });

    $(function(){
    $('#perso_3').prop('disabled', true);
    });
    
    /**
     * Permet d'afficher le formulaire de création d'une poule, d'un personnage ou d'un club
     */
    function showAdminForm(){
        var club_creation_form = document.getElementsByClassName("club-admin-form")
        var poule_creation_form = document.getElementsByClassName("poule-admin-form")
        var personnage_creation_form = document.getElementsByClassName("personnage-admin-form")
        var utilisateur_creation_form = document.getElementsByClassName("utilisateur-admin-form")
        var capacite_creation_form = document.getElementsByClassName("capacite-admin-form")

        $(".btn-poule").click(function() {
            $(poule_creation_form).removeClass("d-none")
            $(club_creation_form).addClass("d-none")
            $(personnage_creation_form).addClass("d-none")
            $(utilisateur_creation_form).addClass("d-none")
            $(capacite_creation_form).addClass("d-none")
        });
        
        $(".btn-personnage").click(function() {
            $(personnage_creation_form).removeClass("d-none")
            $(poule_creation_form).addClass("d-none")
            $(club_creation_form).addClass("d-none")
            $(utilisateur_creation_form).addClass("d-none")
            $(capacite_creation_form).addClass("d-none")
        });
        
        $(".btn-club").click(function() {
            $(club_creation_form).removeClass("d-none")
            $(poule_creation_form).addClass("d-none")
            $(personnage_creation_form).addClass("d-none")
            $(utilisateur_creation_form).addClass("d-none")
            $(capacite_creation_form).addClass("d-none")
        });

        $(".btn-utilisateur").click(function() {
            $(utilisateur_creation_form).removeClass("d-none")
            $(poule_creation_form).addClass("d-none")
            $(personnage_creation_form).addClass("d-none")
            $(club_creation_form).addClass("d-none")
            $(capacite_creation_form).addClass("d-none")
        });

        $(".btn-capacite").click(function() {
            $(capacite_creation_form).removeClass("d-none")
            $(poule_creation_form).addClass("d-none")
            $(personnage_creation_form).addClass("d-none")
            $(club_creation_form).addClass("d-none")
            $(utilisateur_creation_form).addClass("d-none")
        });
    }

    /**
     * Permet de retirer des menus select une valeur sélectionnée dans le précedent menu select
     */
     $(".joueur").change(function() {
        var SaveSpot	=	{};
        // loop through same-named dropdowns
        $.each($(".joueur"),function(keys,vals) {
            // store value
            var ThisVal	=	$(this).val();
            // If there is selection, store value and name
            if(ThisVal != '-')
                SaveSpot[ThisVal]	=	$(this).prop("name");
        });
        
        
        $.each($(".joueur"), function(key,value) {
            $.each($(this).children(), function(subkey,subvalue) {
                if(SaveSpot[$(this).val()]) {
                        if($(this).parent("select").prop("name") != SaveSpot[$(this).val()])
                            $(this).prop("disabled",true);
                        else
                            $(this).prop("selected",true);
                    }
                else
                    $(this).prop("disabled",false);
            });
        });
        
        console.log(SaveSpot);
    });

    

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

    var total = 0;
    var max = 6;
    $('#total span').html(total);
    
    $('#nombre_defense').on('change', function() {
      var nombre_defense = parseInt($(this).val());
      let allowed = max - nombre_defense;
    
      $('#nombre_milieu').val(0).attr('max', allowed);
      $('#nombre_attaque').val(0).attr('max', allowed);
    
      total = nombre_defense;
      $('#total span').html(total);
    });
    
    $('#nombre_milieu').on('change', function() {
      var nombre_defense = parseInt($('#nombre_defense').val());
      var nombre_milieu = parseInt($(this).val());
      let allowed = max - (nombre_defense + nombre_milieu)
    
      $('#nombre_attaque').val(0).attr('max', allowed);
    
      total = nombre_defense + nombre_milieu
      $('#total span').html(total);
    });

});
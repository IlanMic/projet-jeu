<!-- Header/Navbar -->
<?php
    $titre_page = "Modification de personnage";
    include dirname(dirname(__FILE__)) .'/Views/layout/header.php';
    include dirname(dirname(__FILE__)) .'/Views/layout/navbar.php';
?>

<body>
<div class="personnage-creation-form-container">
    <!-- Formulaire de modification de personnage -->
    <form class="creation-form" action="Controllers/modifier-personnage.php">
        <div class="label-connexion-head">
            <h1>Modification de personnage</h1>
            <hr>
            <h3>Veuillez saisir les informations obligatoires (*) afin de créer votre personnage: <h2>
            <br>
        </div>
        <div class="connexion-content">
            <div class="row">
            <div class="picture-container-2">
                <img src="assets/images/illustration-placeholder.png" alt="illustration du personnage">
                <br>
                <label for="illustration">Illustration du personnage:</label>
                <br>
                <br>
                <input type="file" id="illustration" name="illustration" value="" accept="image/*"/>
            </div>
            <div class="edit-character-header">
                <div class="mb-4">
                    <label for="nom-perso" class="form-label">Pseudo *:</label><br>
                    <input type="text" id="psnom-persoeudo" class="form-control" name="nom-perso" placeholder="Pseudo actuel du personnage..." required>
                </div>
                <div class="mb-4">
                    <label for="race">Race *:</label>
                    <select class= "form-select" name="race" id="race" required>
                        <option selected disabled>Sélectionnez votre race...</option>
                        <option value="humain">Humain</option>
                        <option value="elfe">Elfe</option>
                        <option value="nain">Nain</option>
                        <option value="orc">Orc</option>
                    </select>
                </div>
            </div>
                <div class="mb-4">
                    <br>
                    <label for="bibilographie">Bibilographie du personnage:</label>
                    <br>
                    <textarea maxlength="300" name="bibilographie" placeholder="Saisissez la biographie de votre personnage..." class="textarea-bibliographie" cols="100%" rows="5%"></textarea>
                </div>
                <hr>
                <h5>Vous avez (?) points de compétences à dépenser: </h5>
                <div class="grid-caracteristique">
                    <div class="div-caracteristiques" id="carac-force">
                        <h3> Force </h3>
                        <svg class="icon-carac" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M104 96h-48C42.75 96 32 106.8 32 120V224C14.33 224 0 238.3 0 256c0 17.67 14.33 32 31.1 32L32 392C32 405.3 42.75 416 56 416h48C117.3 416 128 405.3 128 392v-272C128 106.8 117.3 96 104 96zM456 32h-48C394.8 32 384 42.75 384 56V224H256V56C256 42.75 245.3 32 232 32h-48C170.8 32 160 42.75 160 56v400C160 469.3 170.8 480 184 480h48C245.3 480 256 469.3 256 456V288h128v168c0 13.25 10.75 24 24 24h48c13.25 0 24-10.75 24-24V56C480 42.75 469.3 32 456 32zM608 224V120C608 106.8 597.3 96 584 96h-48C522.8 96 512 106.8 512 120v272c0 13.25 10.75 24 24 24h48c13.25 0 24-10.75 24-24V288c17.67 0 32-14.33 32-32C640 238.3 625.7 224 608 224z"/>
                        </svg>
                        <br>
                        <input name="force" id="force" type="range" value="0" min="0" max="10" oninput="this.nextElementSibling.value = this.value">
                        <output>0</output>
                    </div>
                    <div class="div-caracteristiques" id="carac-defense">
                        <h3> Défense </h3>
                        <svg class="icon-carac" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M256-.0078C260.7-.0081 265.2 1.008 269.4 2.913L457.7 82.79C479.7 92.12 496.2 113.8 496 139.1C495.5 239.2 454.7 420.7 282.4 503.2C265.7 511.1 246.3 511.1 229.6 503.2C57.25 420.7 16.49 239.2 15.1 139.1C15.87 113.8 32.32 92.12 54.3 82.79L242.7 2.913C246.8 1.008 251.4-.0081 256-.0078V-.0078z"/>
                        </svg>
                        <br>
                        <input name="defense" id="defense" type="range" value="0" min="0" max="10" oninput="this.nextElementSibling.value = this.value">
                        <output>0</output>
                    </div>
                    <div class="div-caracteristiques" id="carac-tacle">
                        <h3> Tacle </h3>
                        <svg class="icon-carac" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M480 96H576C611.3 96 640 124.7 640 160V352C640 387.3 611.3 416 576 416H480V96zM448 416H192V96H448V416zM272 184C258.7 184 248 194.7 248 208C248 221.3 258.7 232 272 232C285.3 232 296 221.3 296 208C296 194.7 285.3 184 272 184zM368 232C381.3 232 392 221.3 392 208C392 194.7 381.3 184 368 184C354.7 184 344 194.7 344 208C344 221.3 354.7 232 368 232zM272 280C258.7 280 248 290.7 248 304C248 317.3 258.7 328 272 328C285.3 328 296 317.3 296 304C296 290.7 285.3 280 272 280zM368 328C381.3 328 392 317.3 392 304C392 290.7 381.3 280 368 280C354.7 280 344 290.7 344 304C344 317.3 354.7 328 368 328zM64 96H160V416H64C28.65 416 0 387.3 0 352V160C0 124.7 28.65 96 64 96z"/>
                        </svg>
                        <br>
                        <input name="tacle" id="tacle" type="range" value="0" min="0" max="10" oninput="this.nextElementSibling.value = this.value">
                        <output>0</output>
                    </div>
                    <div class="div-caracteristiques" id="carac-endurance">
                        <h3> Endurance </h3>
                        <svg class="icon-carac" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M640 419.8c0 61.25-62.5 105.5-125.3 88.63l-59.53-15.88c-42.12-11.38-71.25-47.5-71.25-88.63L384 316.4l85.88 57.25c3.625 2.375 8.625 1.375 11-2.25l8.875-13.37c2.5-3.625 1.5-8.625-2.125-11L320 235.3l-167.6 111.8c-1.75 1.125-3 3-3.375 5c-.375 2.125 0 4.25 1.25 6l8.875 13.37c1.125 1.75 3 3 5 3.375c2.125 .375 4.25 0 6-1.125L256 316.4l.0313 87.5c0 41.13-29.12 77.25-71.25 88.63l-59.53 15.88C62.5 525.3 0 481 0 419.8c0-10 1.25-19.88 3.875-29.63C25.5 308.9 59.91 231 105.9 159.1c22.12-34.63 36.12-63.13 80.12-63.13C224.7 96 256 125.4 256 161.8v60.1l32.88-21.97C293.4 196.9 296 192 296 186.6V16C296 7.125 303.1 0 312 0h16c8.875 0 16 7.125 16 16v170.6c0 5.375 2.625 10.25 7.125 13.25L384 221.8v-60.1c0-36.38 31.34-65.75 69.97-65.75c43.1 0 58 28.5 80.13 63.13c46 71.88 80.41 149.8 102 231C638.8 399.9 640 409.8 640 419.8z"/>
                        </svg>
                        <br>
                        <input name="endurance" id="endurance" type="range" value="0" min="0" max="10" oninput="this.nextElementSibling.value = this.value">
                        <output>0</output>
                    </div>
                    <div class="div-caracteristiques" id="carac-technique">
                        <h3> Technique </h3>
                        <img class="icon-carac" src="assets/images/agility.png" alt="capacité technique">
                        <br>
                        <input name="technique" id="technique" type="range" value="0" min="0" max="10" oninput="this.nextElementSibling.value = this.value">
                        <output>0</output>
                    </div>  
                    <div class="div-caracteristiques" id="carac-vitesse">
                        <h3> Vitesse </h3>
                        <svg class="icon-carac-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">  
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M381.2 172.8C377.1 164.9 368.9 160 360 160h-156.6l50.84-127.1c2.969-7.375 2.062-15.78-2.406-22.38S239.1 0 232 0h-176C43.97 0 33.81 8.906 32.22 20.84l-32 240C-.7179 267.7 1.376 274.6 5.938 279.8C10.5 285 17.09 288 24 288h146.3l-41.78 194.1c-2.406 11.22 3.469 22.56 14 27.09C145.6 511.4 148.8 512 152 512c7.719 0 15.22-3.75 19.81-10.44l208-304C384.8 190.2 385.4 180.7 381.2 172.8z"/>
                        </svg>
                        <br>
                        <input name="vitesse" id="vitesse" type="range" value="0" min="0" max="10" oninput="this.nextElementSibling.value = this.value">
                        <output>0</output>
                    </div>
                    <div class="div-caracteristiques" id="carac-intelligence">
                        <h3> Intelligence </h3>
                        <img class="icon-carac-2" src="assets/images/logical-thinking.png" alt="capacité technique">
                        <br>
                        <input name="intelligence" id="intelligence" type="range" value="0" min="0" max="10" oninput="this.nextElementSibling.value = this.value">
                        <output>0</output>
                    </div>
                    <div class="div-caracteristiques" id="carac-passe">
                        <h3> Passe </h3>
                        <svg class="icon-carac" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M352 96C352 110.3 348.9 123.9 343.2 136.2L396 227.4C372.3 252.7 341.9 271.5 307.6 281L256 192H255.1L187.9 309.5C209.4 316.3 232.3 320 256 320C326.7 320 389.8 287.3 430.9 235.1C441.9 222.2 462.1 219.1 475.9 231C489.7 242.1 491.9 262.2 480.8 276C428.1 341.8 346.1 384 256 384C220.6 384 186.6 377.6 155.3 365.9L98.65 463.7C93.95 471.8 86.97 478.4 78.58 482.6L23.16 510.3C18.2 512.8 12.31 512.5 7.588 509.6C2.871 506.7 0 501.5 0 496V440.6C0 432.2 2.228 423.9 6.46 416.5L66.49 312.9C53.66 301.6 41.84 289.3 31.18 276C20.13 262.2 22.34 242.1 36.13 231C49.92 219.1 70.06 222.2 81.12 235.1C86.79 243.1 92.87 249.8 99.34 256.1L168.8 136.2C163.1 123.9 160 110.3 160 96C160 42.98 202.1 0 256 0C309 0 352 42.98 352 96L352 96zM256 128C273.7 128 288 113.7 288 96C288 78.33 273.7 64 256 64C238.3 64 224 78.33 224 96C224 113.7 238.3 128 256 128zM372.1 393.9C405.5 381.1 435.5 363.2 461.8 341L505.5 416.5C509.8 423.9 512 432.2 512 440.6V496C512 501.5 509.1 506.7 504.4 509.6C499.7 512.5 493.8 512.8 488.8 510.3L433.4 482.6C425 478.4 418.1 471.8 413.3 463.7L372.1 393.9z"/>
                        </svg>
                        <br>
                        <input name="passe" id="passe" type="range" value="0" min="0" max="10" oninput="this.nextElementSibling.value = this.value">
                        <output>0</output>
                    </div>
                    <div class="div-caracteristiques" id="carac-tir">
                        <h3> Tir </h3>
                        <svg class="icon-carac" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M224 256C224 238.3 238.3 224 256 224C273.7 224 288 238.3 288 256C288 273.7 273.7 288 256 288C238.3 288 224 273.7 224 256zM256 0C273.7 0 288 14.33 288 32V42.35C381.7 56.27 455.7 130.3 469.6 224H480C497.7 224 512 238.3 512 256C512 273.7 497.7 288 480 288H469.6C455.7 381.7 381.7 455.7 288 469.6V480C288 497.7 273.7 512 256 512C238.3 512 224 497.7 224 480V469.6C130.3 455.7 56.27 381.7 42.35 288H32C14.33 288 0 273.7 0 256C0 238.3 14.33 224 32 224H42.35C56.27 130.3 130.3 56.27 224 42.35V32C224 14.33 238.3 0 256 0V0zM224 404.6V384C224 366.3 238.3 352 256 352C273.7 352 288 366.3 288 384V404.6C346.3 392.1 392.1 346.3 404.6 288H384C366.3 288 352 273.7 352 256C352 238.3 366.3 224 384 224H404.6C392.1 165.7 346.3 119.9 288 107.4V128C288 145.7 273.7 160 256 160C238.3 160 224 145.7 224 128V107.4C165.7 119.9 119.9 165.7 107.4 224H128C145.7 224 160 238.3 160 256C160 273.7 145.7 288 128 288H107.4C119.9 346.3 165.7 392.1 224 404.6z"/>
                        </svg>
                        <br>
                        <input name="tir" id="tir" type="range" value="0" min="0" max="10" oninput="this.nextElementSibling.value = this.value">
                        <output>0</output>
                    </div>
                </div>
                <div class="text-center mt-4 mb-3">
                    <button type="submit" name="submit" class="form-btn">Modifier le personnage</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Footer -->
<?php
  include dirname(dirname(__FILE__)) .'/Views/layout/footer.php';
?>
</body>
</html>

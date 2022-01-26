<?php 
use App\Session;
        if (Session::hasMessages()){

            foreach (Session::getMessage('success') as $success){
                ?>

                <div class="uk-alert-success uk-text-center uk-width-1-5 uk-margin-auto" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>
                <?= $success; ?>
                </p>
            </div>
                <?php
            }

            foreach (Session::getMessage('error') as $erreur){
                ?>

                <div class="uk-alert-danger uk-text-center uk-width-1-5 uk-margin-auto" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                <p>
                <?= $erreur; ?>
                </p>
            </div>
                <?php
            }
        }
    ?>
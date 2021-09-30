<?php

    require('stripe-php-master/init.php');

    $Publishablekey="pk_test_51ISiOmHUiW3ic6gdRCXOcKB3q4fleipn6KfzFVDCfAcGFRTtFmcenzyzmGd82XhvYCUNtm0hBNJn0dAJMwvtwC1200BcOG3al8";
    $Secretkey="sk_test_51ISiOmHUiW3ic6gdHXGfAnEUN5N9gRNqtQZjZwTb7bvV6MV2CyiXzkM6drureniNTaB64aeu4at0KlCsGVbsZhbj00l1SCCRiU";

    \stripe\stripe::setApiKey($Secretkey);
?>
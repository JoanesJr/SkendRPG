<?php

 function modify($atr) {
    $mod = ($atr-10) / 2;

    if ($mod >= 0 ) {
        return '+'.$mod;
    }

    return '-'.$mod;
}

?>
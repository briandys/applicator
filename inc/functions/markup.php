<?php

$GLOBALS['cp_mu'] = '<div class="cp %2$s" data-name="%1$s">';
    $GLOBALS['cp_mu'] .= '<div class="cr %3$s---cr">';
        $GLOBALS['cp_mu'] .= '<div class="h %3$s---h"><span class="h_l %3$s---h_l">%1$s</span></div>';
        $GLOBALS['cp_mu'] .= '<div class="ct %3$s---ct">';
            $GLOBALS['cp_mu'] .= '<div class="ct_cr %3$s---ct_cr">';
                $GLOBALS['cp_mu'] .= '%4$s';
            $GLOBALS['cp_mu'] .= '</div>';
        $GLOBALS['cp_mu'] .= '</div><!-- ct -->';
    $GLOBALS['cp_mu'] .= '</div>';
$GLOBALS['cp_mu'] .= '</div><!-- %1$s -->';

$GLOBALS['obj_mu'] = '<span class="obj %2$s" data-name="%1$s">';
    $GLOBALS['obj_mu'] .= '<span class="g %3$s---g">';
        $GLOBALS['obj_mu'] .= '<span class="g_l %3$s---g_l">';
            $GLOBALS['obj_mu'] .= '%4$s';
        $GLOBALS['obj_mu'] .= '</span>';
    $GLOBALS['obj_mu'] .= '</span>';
$GLOBALS['obj_mu'] .= '</span><!-- %1$s -->';
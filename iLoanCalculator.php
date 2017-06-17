<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Worawit
 */
interface iLoanCalculator {
    //put your code here
    public function calculateLoanPayment($balance, $interest_rate, $year_term, $period);
    
    public function getDetailOfPaymentPlan($balance, $loan_type, $interest_rate, $year_term, $period);
}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Worawit
 */
require_once 'Calculator.php';
require_once 'iLoanCalculator.php';

Class LoanCalculator extends Calculator implements iLoanCalculator{

    public function __construct($balance, $loan_type, $year_term) {
          
        $this->setBalance($balance);
        $balance = $this->getBalance();
        //echo $this->getBalance();
        //echo $loan_type;
        $this->setLoanType($loan_type);
        $loan_type = $this->getLoanType();
        //echo $loan_type;
        $this->setInterest($loan_type);
        $interest_rate = $this->getInterest();
        //echo $interest_rate;
        $this->setYearTerm($year_term);
        $year_term = $this->getYearTerm();
        
        $this->setPeriodOfPayment($period);
        $period = $this->getPeriodOfPayment();
        //echo $balance;
        //if($operation == true){
            parent::__construct();
            self::getDetailOfPaymentPlan($balance, $loan_type, $interest_rate, $year_term, $period);
        //}
    }
    
    public function calculateLoanPayment($balance, $interest_rate, $year_term, $period){
    //echo $balance;
        if ($balance != "" && $interest_rate != "" && $year_term != "" && $period != ""){
            $month_term = $year_term * $period;
            //echo $month_term;
            $monthly_interest_rate = ($interest_rate / 100) / $period;
            $monthly_payment = pow((1 + $monthly_interest_rate), $month_term);
            //echo $monthly_payment;
            $period_payment = ($monthly_interest_rate * $monthly_payment) / ($monthly_payment - 1);
            //echo $period_payment;
            $payment = $balance * $period_payment;
            //echo $payment_paid;
        }
        return $payment;
    }
    
    public function getDetailOfPaymentPlan($balance, $loan_type, $interest_rate, $year_term, $period){
        
        if($loan_type==1){
            $loan_type = "Housing";
        }else{
            $loan_type = "Car";
        }
        
        $payment = $this->calculateLoanPayment($balance, $interest_rate, $year_term, $period);
        //echo $payment_paid;
        if($payment){
            echo "<table width='1000' border='3' align='center' cellpadding='7' cellspacing='1'>";
            echo "<tr><td colspan='4' align='center' bgcolor='FFFF99'><strong>Payment Information</strong></td></tr>";
            echo "<tr bgcolor='CCCCCC'><td colspan='2' align='right'>Balance:</td><td colspan='2'><em>".number_format($balance)."</em></td></tr>";
            echo "<tr bgcolor='CCCCCC'><td colspan='2' align='right'>Type of Loan:</td><td colspan='2'><em>".$loan_type." Loan</em></td></tr>";
            echo "<tr bgcolor='CCCCCC'><td colspan='2' align='right'>Pay Back Term:</td><td colspan='2'><em>".$year_term." Year(s)</em></td></tr>";
            echo "<tr bgcolor='CCCCCC'><td colspan='2' align='right'>Interest Rate:</td><td colspan='2'><em>".$interest_rate."</em> %</td></tr>";
            echo "<tr bgcolor='CCCCCC'><td colspan='2' align='right'>Monthly Payment:</td><td colspan='2'><em>".number_format($payment)."</em></td></tr>";
            echo "<tr bgcolor='CCFFFF'><td colspan='4' align='center'><strong>Monthly Payment Plan Over <em>".$year_term*$period."</em> Month(s)</strong></td></tr>";
            echo "<tr bgcolor='999999'><td width='25%' align='center'><em>Month(s)</em></td><td width='25%' align='center'><em>Principal Paid</em></td><td width='25%' align='center'><em>Interest Paid</em></td><td width='25%' align='center'><em>Payment</em></td></tr>";
            
            for ($i=0;$i<($year_term*$period);$i++){
                $month = $i+1;
                $tmp = (($payment) - ($balance*($interest_rate/100/$period)));
                $diff = round($tmp,2);
                $int  = round(($balance*$interest_rate/100/$period),2);
                $princ = $balance - $diff;
                $balance = round($balance,0);
                echo "<tr bgcolor='CCCCCC'><td align='center'>".$month."</td><td align='center'>".number_format($balance)."</td><td align='center'>".number_format($int)."</td><td align='center'>".number_format($payment)."</td></tr>";
                $balance = $princ;
            }
            echo "</table>";        
        }
        
        return true;
    }
}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Calculator
 *
 * @author Worawit
 */
class Calculator {
    //put your code here
    private $balance;
    private $loan_type;
    private $interest_rate = array(1=>"3.5", 2=>"4"); //1=housing; 2=Car
    private $year_term;
    private $period_of_payment;
    
    public function __construct() {
        
        $this->balance = 150000;
        $this->year_term = 1;
        $this->period_of_payment = 12;
        //print_r($this->interest_rate);
        //echo $this->loan_type;
    }
    
    public function setBalance($balance){

        $this->balance = $balance;
        return true;
    }
    
    public function getBalance(){
        
        return $this->balance;
    }
    
    public function setLoanType($loan_type){
        
        $this->loan_type = $loan_type;
        return true;
    }
    
    public function getLoanType(){
        
        return $this->loan_type;
    }


    public function setInterest($interest){

        $this->interest_rate[$interest];
        //print_r($this->interest_rate);       
        
        return true;
    }
    
    public function getInterest(){
        
        //echo $this->loan_type;
        return $this->interest_rate[$this->loan_type];
    }
    
    public function setYearTerm($year_term){
        
        $this->year_term = $year_term;
        return true;
    }
    
    public function getYearTerm(){
        
        return $this->year_term;
    }

    
    public function setPeriodOfPayment($period_of_payment){
        
        if($period_of_payment){
            $this->period_of_payment = $period_of_payment;
        }else{
            $this->period_of_payment = 12;
        }
        
        return true;
    }
    
    public function getPeriodOfPayment(){
        
        return $this->period_of_payment;
    }
}
?>

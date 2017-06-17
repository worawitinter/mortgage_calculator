<?php
require_once 'LoanCalculator.php';
//echo $_REQUEST['lstLoanType'];
$obj = new LoanCalculator($balance, $loan_type, $year_term);
if ($_REQUEST['btnSubmit']){
    $balance = $_REQUEST['txtBalance'];
    $loan_type = $_REQUEST['lstLoanType'];
    $year_term = $_REQUEST['txtLengthPayment'];
    //echo $obj->getInterest();
    //echo $loan_type;
}else{
    $balance = $obj->getBalance();
    $loan_type = $obj->getLoanType();
    $year_term = $obj->getYearTerm();
    //echo $obj->getInterest();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Loan Calculator</title>
</head>

<body>
<form id="form_loan_calculator" name="form_loan_calculator" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="1000" border="3" align="center" cellpadding="7" cellspacing="1">
  <tr>
    <td colspan="2" align="center" bgcolor="#666666"><strong>Loan Calculator</strong></td>
  </tr>
  <tr>
    <td width="208" align="right" bgcolor="#CCCCCC">Balance</td>
    <td width="351" align="left" bgcolor="#CCCCCC">
      <label for="txtBalance"></label>
      <input type="text" name="txtBalance" id="txtBalance" value="<?php echo $balance;?>"/>
      (in Baht)
    </td>
  </tr>
  <tr>
    <td align="right" bgcolor="#CCCCCC">Loan Type</td>
    <td align="left" bgcolor="#CCCCCC">
      <label for="lstLoanType"></label>
      <select name="lstLoanType" size="1" id="lstLoanType">
        <option value="1" <?php if($loan_type==1){echo "selected";}?>>Housing</option>
        <option value="2" <?php if($loan_type==2){echo "selected";}?>>Car</option>
      </select></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#CCCCCC">Length of Payment</td>
    <td align="left" bgcolor="#CCCCCC">
      <label for="txtLengthPayment"></label>
      <input type="text" name="txtLengthPayment" id="txtLengthPayment" value="<?php echo $year_term;?>"/> 
      Year(s)
    </td>
  </tr>
  <tr>
    <td align="right" bgcolor="#CCCCCC">&nbsp;</td>
    <td align="left" bgcolor="#CCCCCC">
      <input type="submit" name="btnSubmit" id="btnSubmit" value="Calculate" />
      <?php if ($_REQUEST['btnSubmit']) { print("<a href=\"" . $_SERVER['PHP_SELF'] . "\">Reset</a><br>"); } ?>
      </td>
  </tr>
</table>
</form>
<?php
//display detail of monthly payment plan
if ($_REQUEST['btnSubmit']){
    new LoanCalculator($balance, $loan_type, $year_term);
}else{
    echo "<center>--- Click Calculate to View Information ---</center>";
}
?>
</body>
</html>
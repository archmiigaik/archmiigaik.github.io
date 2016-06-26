<div id="calculator">
<? require("func_calc.php"); ?>

<script> var calculator_class=new Calculator_class()</script>
<form name="gradus">
    <table align="center" name="input_data">
	<tr>  
	<td><p>Углы  </p></td>
    <td><input type="text" oninput="calculator_class.to_decimal();" size='3' value="0" id="gradus">
        <a>°</a>
    </td>
	<td><input type="text" oninput="calculator_class.to_decimal();" size='3' value="0" id="min">
        <a>'</a>
    </td>
	<td><input type="text" oninput="calculator_class.to_decimal();" size='3' value="0" id="sec">
        <a>'' =  </a>
    </td>		
	<td><input type="text" name="decimal" oninput="calculator_class.to_secmin();" size='18' value="0" id="decimal">
        <a>°</a>
    </td>
	</tr>
	</table>
	<table align="center">
	<tr>
	<td><a>Округлить с точностью до </a><input type="text" oninput="calculator_class.myrounding();" size='2' value="3" id="rounding">
        <a>знаков после запятой.</a>		
    </td>
    </tr>
	</table>
	    
</form>
<form name="math_functions" >
<br>
<input type="button" value="+" onClick="document.polynomial.ans_polynom.value+=document.gradus.decimal.value+'+';document.gradus.reset();">
<input type="button" value="-" onClick="document.polynomial.ans_polynom.value+=document.gradus.decimal.value+'-';document.gradus.reset();">
<input type="button" value="*" onClick="document.polynomial.ans_polynom.value+=document.gradus.decimal.value+'*';">
<input type="button" value="/" onClick="document.polynomial.ans_polynom.value+=document.gradus.decimal.value+'/';document.gradus.reset();">
<input type="button" value="(" onClick="document.polynomial.ans_polynom.value+='('">
<input type="button" value=")" onClick="document.polynomial.ans_polynom.value+=')'">
<br>
<input type="button" value="sin" onClick="calculator_class.count_calc('sin');">
<input type="button" value="cos" onClick="calculator_class.count_calc('cos');">
<input type="button" value="tg" onClick="calculator_class.count_calc('tg');">
<input type="button" value="ctg" onClick="calculator_class.count_calc('ctg');">
<input type="button" value="=" onClick="document.polynomial.ans_polynom.value+=document.gradus.decimal.value; calculator_class.evaluation()">
<br>
<br>
Значения  <input type="text" name="ans" size="18" value="" id="result">
<br>
<br>
<input type="button" value="+" onClick="document.polynomial.ans_polynom.value+=document.math_functions.ans.value+'+';this.form.reset()">
<input type="button" value="-" onClick="document.polynomial.ans_polynom.value+=document.math_functions.ans.value+'-';this.form.reset()">
<input type="button" value="*" onClick="document.polynomial.ans_polynom.value+=document.math_functions.ans.value+'*'">
<input type="button" value="/" onClick="document.polynomial.ans_polynom.value+=document.math_functions.ans.value+'/';this.form.reset()">
<input type="button" value="(" onClick="document.polynomial.ans_polynom.value+='('">
<input type="button" value=")" onClick="document.polynomial.ans_polynom.value+=')'">
<br>
<input type="button" value="arcsin" onClick="calculator_class.reverse_count_calc('arcsin');">
<input type="button" value="arccos" onClick="calculator_class.reverse_count_calc('arccos');">
<input type="button" value="arctg" onClick="calculator_class.reverse_count_calc('arctg');">
<input type="button" value="arcctg" onClick="calculator_class.reverse_count_calc('arcctg');">
<input type="button" value="=" onClick="document.polynomial.ans_polynom.value+=document.math_functions.ans.value; calculator_class.evaluation()">
</form>
<form name="polynomial" >
<br>
<br>
<a>Выражение</a>
<input type="textfield" name="ans_polynom" size='20' value="">
<input type="button" value="=" onClick="calculator_class.evaluation()">
<input type="text" name="answer_for_polynom" size='20' value="">
<input type="button" value="° ' ''" onClick="calculator_class.to_secmin(calculator_class.answer,1)">
<br>
<br>
<input type="reset" value="Сброс" onClick="calculator_class.clear_forms()">
</form>
</div>
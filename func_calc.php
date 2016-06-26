<script>
function Calculator_class() {
	this.decimal_result="nan";
	this.math_funct_result="nan";
	this.answer="nan";
	
	this.to_decimal=function () {
		gr=document.getElementById("gradus");
		mi=document.getElementById("min");
		se=document.getElementById("sec");
		sum=parseInt(gr.value)+parseInt(mi.value)/60+parseInt(se.value)/3600;
		if (isNaN(sum)==true) {
			sum=0;
		}
		this.decimal_result=sum;
		this.myrounding(2);
    };
	
	this.to_secmin=function (number,flag) {
		if (flag==1) {
			this.decimal_result=number;
			deci=document.getElementById("decimal");
			deci.value=number;
		}
		if (number!=undefined){
			deci=parseFloat(number);
		} else {
			deci=document.getElementById("decimal");
			deci=parseFloat(deci.value);
			this.decimal_result=deci;
		}		
		gr=document.getElementById("gradus");
		mi=document.getElementById("min");
		se=document.getElementById("sec");
		gr_deci=Math.floor(deci);
		gr.value=gr_deci;
		deci=deci-gr_deci;
		deci=deci*60;
		mi_deci=Math.floor(deci);
		mi.value=mi_deci;
		deci=deci-mi_deci;
		deci=deci*60;
		se_deci=Math.round(deci);
		se.value=se_deci;
    };
	
	
	this.myrounding=function (flag) {		
		elem1=document.getElementById("decimal");
		elem2=document.getElementById("result");
		element1=parseFloat(this.decimal_result);
		element2=parseFloat(this.math_funct_result);
		n=document.getElementById("rounding");
		n=parseInt(n.value);
		if (flag=="3") {
			if (this.answer!= "nan") {
				document.polynomial.answer_for_polynom.value=Math.round(this.answer * Math.pow(10,n)) / Math.pow(10,n);
			}			
		} else {
			if (flag!="1") {
				if (element1!= "nan"){
					element1=Math.round(element1 * Math.pow(10,n)) / Math.pow(10,n);
					elem1.value=element1;
				}			
			}
			if (flag!="2") {
				if (element2!= "nan"){
					element2=Math.round(element2 * Math.pow(10,n)) / Math.pow(10,n);
					document.math_functions.ans.value=element2;
				}	
			}
			if (flag==undefined) {
				if (this.answer!= "nan") {
					document.polynomial.answer_for_polynom.value=Math.round(this.answer * Math.pow(10,n)) / Math.pow(10,n);
				}
			}			
		}
     };
	 
	this.count_calc=function (name) {		
		number=parseFloat(this.decimal_result);
		if (name=='sin'){
			this.math_funct_result=Math.sin(number);
		}
		if (name=='cos'){
			this.math_funct_result=Math.cos(number);
		}
		if (name=='tg'){
			this.math_funct_result=Math.tan(number);
		}
		if (name=='ctg'){
			this.math_funct_result=1/Math.tan(number);
		}
		this.to_secmin(this.math_funct_result);
		this.myrounding("1");		
	};
	
	this.reverse_count_calc=function (name) {
		this.math_funct_result=document.math_functions.ans.value;
		number=parseFloat(this.math_funct_result);
		if (name=='arcsin'){
			this.decimal_result=Math.asin(number);
		}
		if (name=='arccos'){
			this.decimal_result=Math.acos(number);
		}
		if (name=='arctg'){
			this.decimal_result=Math.atan(number);
		}
		if (name=='arcctg'){
			this.decimal_result=Math.atan(1/number);
		}
		this.to_secmin(this.decimal_result);
		this.myrounding("2");
	};
	
	this.evaluation=function () {		
		this.answer=eval(document.polynomial.ans_polynom.value);
		this.myrounding("3");
	}
	
	this.clear_forms=function () {
		document.gradus.reset();
		document.math_functions.reset()
		this.decimal_result="nan";
		this.math_funct_result="nan";
		this.answer="nan";
	};
};
</script>	
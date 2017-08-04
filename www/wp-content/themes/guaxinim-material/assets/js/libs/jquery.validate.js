(function($)
{
	$.fn.validate = function(showAlert)
	{
		var totalErrors = 0;
		var errors = new Array();

		this.each(function()
		{
			var element = $(this);
			element.find(":text,:password,textarea,select").each(function()
			{
				if ($(this).attr("validation-rules") != "" && $(this).attr("validation-rules") != undefined)
				{
					var validationResult = validate($(this));
					if (validationResult > 0)
					{
						totalErrors += validationResult;
						errors.push({message: $(this).attr("validation-error"), input: $(this)});
					}
				}
			})


			function validate(input)
			{
				var inputValue = input.val();
				var errorMessage = input.attr("validation-error");
				var errorClass = input.attr("validation-error-class");
				var explodedClass = input.attr("validation-rules").split(" ");
				var errorsFound = 0;

				for (i = 0; i < explodedClass.length; i++)
				{
					switch (explodedClass[i])
					{
						case "notnull":
							if (!notNull(inputValue, errorMessage))
							{
								errorsFound++;
								input.addClass(errorClass);
							}
							;
							break;

						case "isFullname":
							if (!isFullname(inputValue, errorMessage))
							{
								errorsFound++;
								input.addClass(errorClass);
							}
							;
							break;
						case "phone":
							if (!isPhone(inputValue, errorMessage))
							{
								alert("Phone Error");
								errorsFound++;
								input.addClass(errorClass);
							}
							;
							break;
						case "email":
							if (!isEmail(inputValue, errorMessage))
							{
								errorsFound++;
								input.addClass(errorClass);
							}
							;
							break;
						case "cpf":
							if (!isCPF(inputValue, errorMessage))
							{
								errorsFound++;
								input.addClass(errorClass);
							}
							;
							break;
						case "cnpj":
							if (!isCNPJ(inputValue, errorMessage))
							{
								errorsFound++;
								input.addClass(errorClass);
							}
							;
							break;
						case "url":
							if (!isUrl(inputValue, errorMessage))
							{
								errorsFound++;
								input.addClass(errorClass);
							}
							;
							break;
						default:
							break;
					}
				}
				return errorsFound;
			}
		})

		if (showAlert && totalErrors > 0)
			alert(errors[0].message);
		if (totalErrors > 0)
			$(errors[0].input).focus();

		var returnData = new Object();
		returnData.errorCount = totalErrors;
		returnData.errorsList = errors;

		return returnData;
	}
})(jQuery);


//FUNCTIONS
function notNull(value, error)
{
	if (value == "") {
		return false;
	}
	return true;
}

function isFullname(value)
{
	if (!isNull(value))
		return false;
	if (value.indexOf(" ") == -1)
		return false;
	var temp_array = value.split(" ");
	for (i = 0; i < temp_array.length; i++) {
		if (temp_array[i].length < 2)
			return false;
	}
	return true;
}

function isEmail(value)
{
	var emailExpression = new RegExp(/^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i);
	return emailExpression.exec(value);
}

function isPhone(value)
{
	var phoneReg = new RegExp(/\b(\d)\1+\b/i);
	return phoneReg.exec(value);
}

function isState(value) {
	if (!isNull(value))
		return false;
	if (value.length < 2)
		return false;
	return true;
}

function isCPF(value)
{
	exp = /\.|\-/g
	cpf = value.toString().replace(exp, "");
	var digitoDigitado = eval(cpf.charAt(9) + cpf.charAt(10));
	var soma1 = 0, soma2 = 0;
	var vlr = 11;

	for (i = 0; i < 9; i++) {
		soma1 += eval(cpf.charAt(i) * (vlr - 1));
		soma2 += eval(cpf.charAt(i) * vlr);
		vlr--;
	}
	soma1 = (((soma1 * 10) % 11) == 10 ? 0 : ((soma1 * 10) % 11));
	soma2 = (((soma2 + (2 * soma1)) * 10) % 11);

	var digitoGerado = (soma1 * 10) + soma2;
	if (digitoGerado != digitoDigitado)
		return false;
	return true;
}

function isDate(dateValue)
{
	if (dateValue.value != "") {
		var hoje = new Date();
		var barras = dateValue.split("/");
		if (barras.length == 3)
		{
			dia = barras[0];
			mes = barras[1];
			ano = barras[2];
			resultado = (!isNaN(dia) && (dia > 0) && (dia < 32)) && (!isNaN(mes) && (mes > 0) && (mes < 13)) && (!isNaN(ano) && (ano.length == 4) && (ano >= 1900));
			if (!resultado) {
				return false;
			}
		} else {
			return false;
		}
		return true;
	}
}

function isPhone(value) {
	exp = /\(\d{2}\)\ \d{4}\-\d{4}/
	return exp.test(value);
}

function isZipCode(zipCodeValue)
{
	exp = /\d{2}\.\d{3}\-\d{3}/
	return exp.test(zipCodeValue);
}

function isUrl(s)
{
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
	return regexp.test(s);
}

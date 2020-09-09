

//Evitar que el formulario actualice la pagina
$("form").submit(e => {
    e.preventDefault();
});

$('#input_dni').keyup(function(){
    console.log('change');
    var validChars = 'TRWAGMYFPDXBNJZSQVHLCKET';
    var nifRexp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
    var nieRexp = /^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
    var str = this.value.toString().toUpperCase();

    if (!nifRexp.test(str) && !nieRexp.test(str)) showIncorrect();

    var nie = str
      .replace(/^[X]/, '0')
      .replace(/^[Y]/, '1')
      .replace(/^[Z]/, '2');

    var letter = str.substr(-1);
    var charIndex = parseInt(nie.substr(0, 8)) % 23;

    if (validChars.charAt(charIndex) === letter) showCorrect();
    else showIncorrect();
});

var dni_check_msg;
$('#correct').hide();
$('#incorrect').hide();

function showCorrect(){
    clearTimeout(dni_check_msg);
    $('#correct').show();
    $('#incorrect').hide();
    dni_check_msg = setTimeout(() => {  $('#correct').hide; }, 2000);
};
function showIncorrect(){
    clearTimeout(dni_check_msg);
    $('#incorrect').show();
    $('#correct').hide();
    dni_check_msg = setTimeout(() => {  $('#incorrect').hide; }, 2000);
};
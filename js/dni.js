//Evitar que el formulario actualice la pagina
$("form").submit(e => {
    e.preventDefault();
});

$('#input_dni').keyup(function () {
    if (dni_val(this.value)) showCorrect();
    else showIncorrect();
});

function dni_val(value) {
    var validChars = 'TRWAGMYFPDXBNJZSQVHLCKET';
    var nifRexp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
    var nieRexp = /^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]$/i;
    var str = value.toString().toUpperCase();
    
    if (!nifRexp.test(str) && !nieRexp.test(str)) return false;

    var nie = str
        .replace(/^[X]/, '0')
        .replace(/^[Y]/, '1')
        .replace(/^[Z]/, '2');

    var letter = str.substr(-1);
    var charIndex = parseInt(nie.substr(0, 8)) % 23;

    if (validChars.charAt(charIndex) === letter) return true;
    else return false;
}

$('#correct').hide();
$('#incorrect').hide();

function showCorrect() {
    $('#correct').show();
    $('#incorrect').hide();
};
function showIncorrect() {
    $('#incorrect').show();
    $('#correct').hide();
};

$('#ask_dni').click(function () {
    if (dni_val($('#input_dni')[0].value)){
        $.ajax({
            url: "/prueba_itop/php/BD_dni.php?dni=" + dni.toString().toUpperCase(),
            type: "GET",
            success: (response) => {
                $('#list').html(response);
            }
        });
    }
    else showIncorrect();
})
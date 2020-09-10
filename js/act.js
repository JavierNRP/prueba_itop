//Evitar que el formulario actualice la pagina
$("form").submit(e => {
    e.preventDefault();
});

$("#sel_act_id").change(function(){
    window.location.href = "/prueba_itop/php/BD_act.php?request=select&id=" + this.value;
});

$('#create_act').click(function () {
    window.location.href = "/prueba_itop/php/BD_act.php?request=create&nombre=" + $("#input_nombre")[0].value + "&fecha=" + $("#input_fecha")[0].value;
});

$('#delete_act').click(function () {
    window.location.href = "/prueba_itop/php/BD_act.php?request=delete&id=" + $("#sel_act_id")[0].value;
});
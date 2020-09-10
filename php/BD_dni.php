<?php
$user = 'root';
$password = '';
$database = 'bd_prueba_itop';
$port = 3306;
$conn = new mysqli('127.0.0.1', $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_errno . " - " . $conn->connect_error);
}

if ($_GET['dni']) {
    $validChars = 'TRWAGMYFPDXBNJZSQVHLCKET';
    $nifRexp = '/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]$/i';
    $nieRexp = '/^[XYZ][0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]$/i';
    $str = strtoupper(strval($_GET['dni']));

    if (preg_match($nifRexp, $str) || preg_match($nieRexp, $str)) {

        $nie = str_replace('/^[X]/', '0', str_replace('/^[Y]/', '1', str_replace('/^[Z]/', '2', $str)));

        $letter = substr($str, -1);
        $charIndex = intval(substr($nie, 0, 8)) % 23;

        if (substr($validChars, $charIndex, 1) === $letter) {
            $return = "";

            $sql1 = 'SELECT entityrel.act_id FROM entityrel
                JOIN potenciales ON potenciales.id = pot_id
                JOIN entity ON entity.id = pot_id
                WHERE potenciales.dni="' . $_GET['dni'] . '" and entity.borrado=false;';
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
                $act_ids = array();
                while ($row1 = $result1->fetch_assoc())
                    array_push($act_ids, $row1['act_id']);
                foreach ($act_ids as $act_id) {
                    $sql2 = 'SELECT actividades.nombre, actividades.descripcion, actividades.fecha FROM actividades
                    JOIN entity ON entity.id = actividades.id
                    WHERE actividades.id=' . $act_id . ' and entity.borrado=false;';
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                        while ($row2 = $result2->fetch_assoc())
                            $return .=
                                '<li class="list-group-item">Actividad: ' . $row2['nombre'] . ' - Fecha:' . $row2['fecha'] . '</li>';
                    }
                }
            }
            if ($return != "" || $return != NULL)
                $return = "<ul class='list-group'>" . $return . "</ul>";
            echo $return;
        }
    }
}


$conn->close();

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/xampp/htdocs/Proyectodbdw/auxis/Exception.php';
require '/xampp/htdocs/Proyectodbdw/auxis/PHPMailer.php';
require '/xampp/htdocs/Proyectodbdw/auxis/SMTP.php';

require_once '/xampp/htdocs/Proyectodbdw/auxis/db.php';
require_once '/xampp/htdocs/Proyectodbdw/auxis/componentes.php';
$con = conectardb();
$resultado = mysqli_query($con,"SELECT *, count(*) FROM carrito GROUP BY id_plat");
$id_user = $_SESSION['id'];

echo "TEST//";

if(mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM usuarios WHERE id_usuario = $id_user"))['notarjeta'] != null){
    while($row = mysqli_fetch_assoc($resultado)){
        $id_plat = $row['id_plat'];
        $cantidad = $row['count(*)'];
        $ing_plat = mysqli_query($con,"SELECT * FROM plat_ing WHERE id_plat = $id_plat");
        while($rowing = mysqli_fetch_assoc($ing_plat)){
            $temp = $rowing['id_ing'];
            if(empty($ar[$temp])){
                $cant[$temp] = $rowing['cantidad'] * $cantidad;
                $id[$temp] = $temp;
            } else {
                $cant[$temp] = $cant[$temp] + ($rowing['cantidad'] * $cantidad);
                $id[$temp] = $temp;
            }
        }
    }
} else {
    die("Porfavor ingrese una tarjeta de credito en su perfil <a href='/proyectodbdw/perfil.php'>Ir a perfil</a>");
}
echo "TEST//";
foreach($id as $ing){
    if($ing != -1){
        $cantidad_inventario = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM ingredientes WHERE id = $ing"))['cantidad'];
        if($cantidad_inventario >= $cant[$ing]){
            $existencia = true;
        } else {
            $existencia = false;
            break;
        }
    }else{return;}
}
echo "TEST//";
if($existencia){
    $query1 = "INSERT INTO pedidos (id_usuario) VALUES ($id_user)";
    mysqli_query($con,$query1);
    $last_id = mysqli_fetch_assoc(mysqli_query($con,"SELECT LAST_INSERT_ID() AS x"))['x'];
    $query2 = "INSERT INTO estadopedidos (id_pedido, estado) VALUES ($last_id,'aceptado')";
    if(mysqli_query($con,$query2)){
        $resultado = mysqli_query($con,"SELECT *, count(*) FROM carrito GROUP BY id_plat");
        while ($tupla = mysqli_fetch_assoc($resultado)){
            for($i = 0; $i < $tupla['count(*)']; $i++){
                $id_plat = $tupla['id_plat'];
                $query3 = "INSERT INTO pedidos_platillos (id_pedido,id_platillos) VALUES ($last_id,$id_plat)";
                if(mysqli_query($con,$query3)){
                } else {
                    die("Algo salio mal <a href='/proyectodbdw/main.php'>Regresar</a>");
                }
            }
        }
    }
}else{
    die("No tenemos inventario suficiente para cubrir su orden <a href='/proyectodbdw/main.php'>Regresar</a>");
}
echo "TEST//";
if(mysqli_query($con,"DELETE FROM carrito")){
    $data = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM usuarios WHERE id_usuario = $id_user"));
    $correo = $data['correo'];
    $nombre = $data['nombre'];
    $asunto = "Mr.Taco pedido No.".$last_id;
    $msg = "Su pedido ha sido aceptado. Puede revisar el estado de su pedido en nuestra pagina web ingresando el numero ".$last_id." en la pestaña de Revisa tu pedido";
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'jmyc9999@gmail.com';                     // SMTP username
        $mail->Password   = 'Chema$899';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('jmyc9999@gmail.com', 'Mr.Taco');
        $mail->addAddress($correo, $nombre);     // Add a recipient
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $msg;
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    header("Location: /proyectodbdw/orden.php?id=$last_id");
} else {
    die("Algo salio mal <a href='/proyectodbdw/carrito.php'>Regresar</a>");
}
?>
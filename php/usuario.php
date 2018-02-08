<?php
$username = "root";
$password = "";
$servername = "127.0.0.1";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password, $dbname);

if($_POST["metodo"] == "select"){
    $sql = "select * from usuarios where usuario ='".$_POST["usuario"]."'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo json_encode(mysqli_fetch_assoc($result));
    }else{
        echo "Error";
    }
	
}else if($_POST["metodo"] == "traerUsuario"){
    $sql = "select * from usuarios where idUsuarios =".$_POST["id"];
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo json_encode(mysqli_fetch_assoc($result));
    }else{
        echo "Error";
    }
	
}else if($_POST["metodo"] == "selectAll"){
    $sql = "select * from usuarios";
    $usuarios = array();
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($usuarios, $row);
        }
        echo json_encode($usuarios);
    }else{
        echo "Error";
    }
	
}else{
    if($_POST["metodo"] == "registro"){
        $sql = "insert into usuarios (nombre,direccion,telefono,correo,
        pregunta_secreta,respuesta,usuario,password,rol) values ('"
        .$_POST["nombre"]."', '"
        .$_POST["direccion"]."', '"
        .$_POST["telefono"]."', '"
        .$_POST["correo"]."', '"
        .$_POST["pregunta"]."', '"
        .$_POST["respuesta"]."', '"
        .$_POST["usuario"]."', '"
        .$_POST["password"]."', '1')";
		
    }else if($_POST["metodo"] == "editar"){
        $sql = "update usuarios set 
        nombre='".$_POST["nombre"]."',
        direccion='".$_POST["direccion"]."',
        telefono='".$_POST["telefono"]."',
        correo='".$_POST["correo"]."',
        pregunta_secreta='".$_POST["pregunta_secreta"]."',
        respuesta='".$_POST["respuesta"]."',
        usuario='".$_POST["usuario"]."',
        password='".$_POST["password"]."'
		where idusuarios = ".$_POST["idUsuarios"];
    }

    if($conn->query($sql) === TRUE){
        echo "Exito";
    }else{
        echo "Error";
    }

}

$conn->close();
?>
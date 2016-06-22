<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
 $nombre=$_POST['nombre'];
 $apellido=$_POST['apellido'];
 $documento=$_POST['documento'];

	try{

			$base=new PDO('mysql:host=sql5.freemysqlhosting.net; dbname=sql5124996', 'sql5124996','c2d2UyxQzL');
			$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$base->exec("SET CHARACTER SET utf8");

		}catch (Exception $e){

			die ('Error:' . $e->GetMessage());
		}
           
       $sql="INSERT INTO aprendices (documento,nombres,apellidos) VALUES (:d_a,:n_a,:a_a)";

       $datos= $base->prepare($sql);
       $datos->execute(array(":d_a"=>$documento,"n_a"=>$nombre,":a_a"=>$apellido));

	
				/*echo "Nombre: " . $_POST['nombre']. " Apellido: ".$_POST['apellido']." Documento: ".$_POST['documento'] . "<br>";*/

/*$sql="DELETE FROM aprendices WHERE nombres='Pedro'";

       $datos= $base->prepare($sql);
       $datos->execute();

*/

       $sql="SELECT * FROM aprendices";
       $datos=$base->prepare($sql);
       $datos->execute();
while ($registros=$datos->fetch(PDO::FETCH_ASSOC)) {
	

	echo "Documento: ".$registros['documento']. "<br>";
	echo "Nombre: ".$registros['nombres']."<br>";
	echo "Apellido: ".$registros['apellidos'];"<br>";
	echo "<br>";
}
	
?>
</body>
</html>
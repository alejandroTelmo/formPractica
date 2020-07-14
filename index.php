<?php
error_reporting(E_ALL);
ini_set('display_errors', 'stdout');
    require_once 'header.php';
    require_once 'clases/ListaPersona.php';
    use app\clases\ListaPersona;
?>
      <pre>
      <?php
      var_dump($_GET);
      ?>

      </pre>
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center">
				Formularios Final
			</h3>
		</div>
	</div>
	<div class="row">
            <div class="col-md-12" >
			<form role="form" class="form-inline" >
				<div class="form-group">
					 
					<label for="correo">
						Correo
					</label>
                                    <input type="text" class="form-control"name="correo" value="<?=isset($_GET['correo'])?$_GET['correo']:'Ingrese su correo'; ?>" id="correo">
				</div>
				<div class="form-group">
					 
					<label for="apellido">
						Apellido
					</label>
                                    <input type="text" class="form-control"value="<?=isset($_GET['apellido'])?$_GET['apellido']:'Ingrese su apellido'; ?>"  name="apellido" id="apellido">
				</div> 
                            <div class="">
                                <select name="estudiante" id="estudiante"> 
                                    <option value="s" <?=(!empty($_GET['estudiante'])&&($_GET['estudiante']=='s'))?'selected':''; ?>>Estudiante</option> 
                                    <option  value="n" <?=(!empty($_GET['estudiante'])&&($_GET['estudiante']==='n'))?'selected':'';?>>No</option> 
                                    <option  value=""<?=(empty($_GET['estudiante']))?'selected':'';?>>n/s</option> 
                                </select>
					 
		
				</div> 
                            <input type="reset" value="Borrar">
                            <button type="submit" name="buscar"class="btn btn-primary">
					Enviar
				</button>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						
						<th>
							Correo
						</th>
						<th>
							Apellido
						</th>
						<th>
							Estudiante
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
                                        $lista= ListaPersona::obtenerListaPersonas();
                                        if(!array_key_exists('buscar',$_GET)){
                                        foreach($lista as $per){
                                            echo "<tr><td>{$per["correo"]}</td><td>{$per["apellido"]}</td><td>{$per["estudiante"]}</td></tr>";
                                        }}else{
                                            
                                            $apellido=(isset($_GET['apellido'])&&!empty($_GET['apellido']))?$_GET['apellido']:null;
                                            $correo=(isset($_GET['correo'])&&!empty($_GET['correo']))?$_GET['correo']:null;
                                            $estudiante=(!empty($_GET['estudiante']))?$_GET['estudiante']:null;
                                            if($estudiante===null&&$correo===null&&$apellido===null){
                                                foreach($lista as $est){
                                            echo "<tr><td>{$est["correo"]}</td><td>{$est["apellido"]}</td><td>{$est["estudiante"]}</td></tr>";
                                            }
                                            }else{
                                            foreach ($lista as $buscado){
                                                if((($buscado['apellido']===$apellido))
                                                 ||($buscado['correo']===$correo) ||($buscado['estudiante']==$estudiante)
                                                        
                                              ){
                                                  echo "<tr><td>{$buscado["correo"]}</td><td>{$buscado["apellido"]}</td><td>{$buscado["estudiante"]}</td></tr>";  
                                                }
                                            }
                                        }
                                        }
                                        ?>
				
				
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
      require_once 'footer.php';
?>
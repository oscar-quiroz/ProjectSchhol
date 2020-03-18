    <content style="float: left; margin-bottom: 20px;" class="col-12">
    	<?php
    	$subjectGroup=new SubjectGroup($user->getId(),$user->getType());
    	$subjects=$subjectGroup->getSubjects();
    	$tasks=$subjectGroup->getTasks();
    	?>
    	<div class="row">
    		<div class="col-lg-12">
    			<div style="margin-top: 10px; margin-bottom: 10px;" class="content-heaader">
    				<h2>Administrar tareas</h2>
    			</div>
    		</div>

    		<div class="sub-menu col-lg-12">
    			<div class="sub-menu-right">
    				<button type="button" data-toggle="modal" data-target="#newTaskModal" class="btn btn-success"><i class="fa fa-book"></i> Nueva tarea</button>
    			</div>
    		</div>

    		<aside class="col-lg-3">
    			<div class="card">
    				<div class="card-header">
    					<strong>Materias</strong>
    				</div>

    				<div class="card-body">
    					<table>
    						<?php foreach ($subjects as $subject):?>
    						<tr><button class="btn btn-block btn-light"><?php echo $subject['nombre']; ?></button></tr>
    						<?php endforeach;?>
    					</table>
    				</div>
    			</div>
    			<br>
    		</aside>

    		<div class="col-lg-9">
    			<div class="card">
    				<div class="card-header">
    					<strong>Tareas</strong>
    				</div>

    				<div class="card-body">
    					<table class="col-12">
    						<?php if($tasks): ?>
    						<tr>
    							<th>Tarea</th>
    							<th>Asignatura</th>
    							<th>Curso</th>
    							<th>Fecha de entrega</th>
    							<th>Entregadas</th>
    							<th style="text-align: center;"></th>
    						</tr>
    						<?php foreach ($tasks as $tasks):?>
    						<tr>
    							<?php
    							echo '<td>'.$tasks->getName().'</td>'.PHP_EOL;
    							echo '<td>'.$tasks->getSubject().'</td>'.PHP_EOL;
    							echo '<td>'.$tasks->getName().'</td>'.PHP_EOL;
    							echo '<td>'.$tasks->getLimitDate().'</td>'.PHP_EOL;
    							echo '<td>'.$tasks->getDeliveredQuantity().'</td>';
    							?>
    							<td><button class="btn btn-block btn-primary">Ver</button></td>
    						</tr>
    						<?php endforeach;
    						else:
    							echo 'No ha definido tareas';
    						endif;
    						?>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </content>

    <div class="modal fade" id="newTaskModal" tabindex="-1" role="dialog" aria-labelledby="newTaskModalLabel" aria-hidden="true">
    	<div class="modal-dialog modal-lg" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="modal-title" id="newTaskModalLabel">Nueva tarea</h5>
    				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">&times;</span>
    				</button>
    			</div>

    			<div class="modal-body">
    				<form action="insert-task.php" method="POST" enctype="multipart/form-data">
    					<div class="form-row">
    						<div class="form-group col-md-6">
	    						<label for="selectSubjet">Materia</label>
	    						<select id="selectSubjet" class="form-control" required onchange="getClassList(this.value);">
	    							<option value="">Seleccione una materia</option>
	    							<?php foreach ($subjects as $subject):?>
		    						<option value="<?php echo $subject['id']; ?>"><?php echo $subject['nombre']; ?></option>
		    						<?php endforeach;?>
	    						</select>
	    					</div>
	    					<script type="text/javascript">
	    						function getClassList(id){
	    							$.ajax({
		    							type: 'post',
		    							url: 'consult.php',
		    							data: 'consult=classList&subjectId='+id
		    						})
		    						.then(function(ans){
		    							document.getElementById("selectClass").innerHTML=ans;
		    							document.getElementById("selectClass").disabled=false;
		    						});
	    						}
	    					</script>

	    					<div class="form-group col-md-6">
	    						<label for="selectSubjet">Materia</label>
	    						<select id="selectClass" class="form-control" name="class" required disabled>
	    						</select>
	    					</div>
    					</div>

    					<div class="form-row">
    						<div class="form-group col-md-6">
    							<label for="inputDate">Fecha límite</label>
    							<input type="date" class="form-control" id="inputDate" name="date" required value="<?php echo date('Y-m-d');?>">
    						</div>

    						<div class="form-group col-md-6">
    							<label for="inputDate">Hora</label>
    							<input type="time" class="form-control" id="inputTime" name="time" value="<?php echo date('H:i');?>" required>
    						</div>
    					</div>

    					<div class="form-group">
    						<label for="inputHeader">Encabezado</label>
    						<input type="text" class="form-control" id="inputHeader" placeholder="Encabezado" name="header" required>
    					</div>

    					<div class="mb-3">
    						<label for="textareaDescription">Descripción</label>
						    <textarea id="textareaDescription" class="form-control" placeholder="Descripción" name="desc" required></textarea>
						</div>

						 <div class="form-group">
						    <label for="inputResources">Example file input</label>
						    <input type="file" class="form-control-file" id="inputResources" multiple accept="image/*, .doc,.docx,.pdf,.sql" name="files[]">
						  </div>
						<p></p>    					
						<button class="btn btn-primary btn-block">Confirmar</button>
    				</form>
    			</div>
    		</div>
    	</div>
    </div>
    <content style="float: left; margin-bottom: 20px;" class="col-lg-12">
    	<div class="row">
    		<div class="col-12">
	    		<div style="margin-top: 10px; margin-bottom: 10px;" class="content-heaader">
	    			<h2>Administrar tareas</h2>
	    		</div>
    		</div>

	    	<aside class="col-lg-4">
	    		<div class="card">
	    			<div class="card-header">
	    				<strong>Tareas calificadas</strong>
	    			</div>

	    			<div class="card-body">
	    				<table class="col-12">
	    					<tr>
	    						<th>Tarea</th>
	    						<th>Asignatura</th>
	    						<th>Calificación</th>
	    					</tr>

	    					<tr>
	    						<td>Ejercicios 1</td>
	    						<td>Matematicas</td>
	    						<td>4</td>
	    					</tr>
	    				</table>
	    			</div>
	    		</div>
	    		<br>
	    	</aside>

	    	<div class="col-lg-8">
	    		<div class="card">
	    			<div class="card-header">
	    				<strong>Tareas</strong>
	    			</div>
	    			<?php
	    			$subjectGroup=new SubjectGroup($user->getGroupId(),$user->getType());
	    			$tasks=$subjectGroup->getTasks();
	    			?>
	    			<div>
	    				<div style="padding-left: 15px; padding-right: 15px;">
	    					<?php
	    					if($tasks)
		    					foreach ($tasks as $task):
		    						$taskDate= DateTime::createFromFormat('Y-m-d H:i:s', $task->getLimitDate());
	    					?>
	    					<div class="row row-striped">
								<div class="col-2 text-right">
									<h1 class="display-4"><span class="badge badge-secondary"><?php echo strftime("%d", $taskDate->getTimestamp());?></span></h1>
									<h2><?php echo strtoupper(substr(spanishMonth($task->getLimitDate()), 0,3));?></h2>
								</div>

								<div class="col-10">
									<h4 class="text-uppercase"><strong><?php echo $task->getName(); ?></strong></h4>
									<h5><?php echo $task->getSubject(); ?></h5>
									<ul class="list-inline">
									    <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php echo spanishDay($task->getLimitDate());?></li>
										<li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo strftime("%I:%M %p", $taskDate->getTimestamp());?></li>
									</ul>
									<p><?php echo $task->getDescription(); ?></p>
								</div>

								<div class="col-12">
									<button class="btn btn-block btn-primary" onclick="location.href='/tareas/entregar?id=<?php echo $task->getId();?>';">Enviar</button>
								</div>
							</div>
							<?php endforeach;
							else
								echo 'No tienes tareas';?>
						</div>
	    			</div>
	    		</div>
	    	</div>
    	</div>
    </content>
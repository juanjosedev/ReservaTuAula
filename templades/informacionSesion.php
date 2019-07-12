<div class="media">
	<br>
	<div class="media-left">
			<?php
				if($tipo == "admin"){
					$gradiente = "background: rgba(218,165,32,1);background: linear-gradient(to right, #FF9800 0%, #FFEB3B 100%);";
					$color = "txt-ambar";
				}else{
					$gradiente = "background: #3F51B5;background: linear-gradient(to right, #D32F2F 0%, #ff3d00 100%);";
					$color = "txt-azul-claro";
				}
			?>
		<div class="sesion-info" style="<?php echo $gradiente;?>">
			<div style="background:url(../../img/usuarios/<?php echo $foto;?>);width: 100%;height: 100%;background-position: center;background-size: cover;border-radius: 50%;"></div>
		</div>
	</div>
	<div class="media-body text-left">
		<h5 class="media-heading fw-500"><?php echo $nombre." ".$apellidos; ?></h5>
	    <i class="<?php echo $color; ?>"><?php echo $correo; ?></i>
	</div>
</div>
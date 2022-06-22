<style>
	<?php include get_template_directory() . '/titan/infobox/infobox.css'; ?>
</style>
<div class="container-fluid infobox-comercio">

	<div class="row">
		<!--campo uno-->
		<div id="campo_uno" class="col-12 col-sm-6 col-lg-3 campo_uno iconos_home">
			<a class="d-inline-block w-100" <?php $link1 = get_field('link_capsula_uno');
											if (!empty($link1)) { ?> href="<?php the_field('link_capsula_uno'); ?>" <?php }; ?>>
				<div class="contendor-iconos">
					<div class="icono_campo uno"><?php the_field('Icono_capsula_uno'); ?></div>
					<div class="texto_interior_campos_home">
						<div class="titulo_campo uno"><?php the_field('capsula_uno'); ?></div>
						<div class="texto_campo uno"><?php the_field('texto_uno'); ?></div>
					</div>
				</div>
			</a>
		</div>
		<!--campo uno-->

		<!--campo dos-->
		<div id="campo_dos" class="col-12 col-sm-6 col-lg-3 campo_dos iconos_home">
			<a class="d-inline-block w-100" <?php $link2 = get_field('link_capsula_dos');
											if (!empty($link2)) { ?> href="<?php the_field('link_capsula_dos'); ?>" <?php }; ?>>
				<div class="contendor-iconos">
					<div class="icono_campo dos"><?php the_field('Icono_capsula_dos'); ?></div>
					<div class="texto_interior_campos_home">
						<div class="titulo_campo dos"><?php the_field('capsula_dos'); ?></div>
						<div class="texto_campo dos"><?php the_field('texto_dos'); ?></div>
					</div>
				</div>
			</a>
		</div>
		<!--campo dos-->

		<!--campo tres-->
		<div id="campo_tres" class="col-12 col-sm-6 col-lg-3 campo_tres iconos_home">
			<a class="d-inline-block w-100" <?php $link3 = get_field('link_capsula_tres');
											if (!empty($link3)) { ?> href="<?php the_field('link_capsula_tres'); ?>" <?php }; ?>>
				<div class="contendor-iconos">
					<div class="icono_campo tres"><?php the_field('Icono_capsula_tres'); ?></div>
					<div class="texto_interior_campos_home">
						<div class="titulo_campo tres"><?php the_field('capsula_tres'); ?></div>
						<div class="texto_campo tres"><?php the_field('texto_tres'); ?></div>
					</div>
				</div>
			</a>
		</div>
		<!--campo tres-->

		<!--campo cuatro-->
		<div id="campo_cuatro" class="col-12 col-sm-6 col-lg-3 campo_cuatro iconos_home">
			<a class="d-inline-block w-100" <?php $link4 = get_field('link_capsula_cuatro');
											if (!empty($link4)) { ?> href="<?php the_field('link_capsula_cuatro'); ?>" <?php }; ?>>
				<div class="contendor-iconos">
					<div class="icono_campo cuatro"><?php the_field('Icono_capsula_cuatro'); ?></div>
					<div class="texto_interior_campos_home">
						<div class="titulo_campo cuatro"><?php the_field('capsula_cuatro'); ?></div>
						<div class="texto_campo cuatro"><?php the_field('texto_cuatro'); ?></div>
					</div>
				</div>
			</a>
		</div>
		<!--campo cuatro-->
	</div>


</div>
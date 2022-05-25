<div class="container">

<div class="row">
	<div class="col-12 col-sm-12 col-md-12 col-lg-10">
		<div class="row">
			<div class="col-12 col-sm-6 col-md-4 col-lg-3">

				<?php
				if (is_active_sidebar('menu_uno_izquierdo')) :
					dynamic_sidebar('menu_uno_izquierdo');
				endif; ?>
			</div>

			<div class="col-12 col-sm-6 col-md-4 col-lg-3">
 
				<?php 
				if (is_active_sidebar('menu_dos_izquierdo')) :
					dynamic_sidebar('menu_dos_izquierdo');
				endif; ?>
			</div>

			<div class="col-12 col-sm-6 col-md-4 col-lg-3">

				<?php
				if (is_active_sidebar('menu_uno_derecho')) :
					dynamic_sidebar('menu_uno_derecho');
				endif; ?>
			</div>

			<div class="col-12 col-sm-6 col-md-4 col-lg-3">

				<?php
				if (is_active_sidebar('menu_dos_derecho')) :
					dynamic_sidebar('menu_dos_derecho');
				endif; ?>
			</div>
			<div class="col-12 col-sm-12 col-md-12 col-lg-12">

				<?php
				if (is_active_sidebar('menu_logos')) :
					dynamic_sidebar('menu_logos');

				endif;
				?>
			</div>
		</div>
	</div>

	<div class="col-12 col-sm-12 col-md-12 col-lg-2">


		<?php
		if (is_active_sidebar('menu_derecho_form')) :
			dynamic_sidebar('menu_derecho_form');
		endif;
		?>

	</div>
</div>

<div class="menu-pie-pagina col-12 col-sm-12 col-md-12 col-lg-12">
	<?php
	if (is_active_sidebar('menu_pie_pagina')) :
		dynamic_sidebar('menu_pie_pagina');

	endif;
	?>
	<?php
	if (is_active_sidebar('menu_pie-pagina')) :
		dynamic_sidebar('menu_pie-pagina');
	endif;
	?>

</div>
</div>
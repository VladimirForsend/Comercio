<style>
	<?php include get_template_directory() . '/assets/modulos/modulo-infodelivery/infodelivery.css'; ?>
</style>
<div id="comercio-infodelivery" class="container-fluid">
	<div class="container">
		<div class="row">
			<?php $active = true;
			$temp = $wp_query;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$post_per_page = 4; // -1 shows all posts
			$args = array(
				'post_type' => 'infodelivery',
				'orderby' => 'date',
				'order' => 'ASC',
				'paged' => $paged,
				'posts_per_page' => $post_per_page
			);
			$wp_query = new WP_Query($args);
			if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

<div class="tipo--entrega">
<!-- tipo de entrega nueva -->
<?php $envio = get_field('envio_a_domicilio');
$retiro = get_field('retira_tu_compra');
if (!empty($envio) && !empty($retiro)) {
} else { ?>
	<div class="tipo-entrega-nueva">
		<?php if (empty($envio)) { ?>
			<div class="primera-parte">
				<h5 class="">TODOS LOS ENVIOS SON POR PAGAR</h5>
				<div class="">
					<i class="fas fa-shipping-fast"></i>
					<h6 class="">Zona Metropolitana de Santiago y Envío a regiones: </h6>
					<p class="d-inline">Su pedido se despachara de 3 a 5 días hábiles después de efectuada la compra. Enviaremos a su correo el número de seguimiento dentro de las 24 horas.</p>
				</div>
			</div>
		<?php }; ?>
		<?php if (empty($retiro)) { ?>
			<div class="segunda-parte">
				<i class="fas fa-store-alt"></i>
				<h6 class="">Compra directo en tienda, ¡Visítanos!</h6>
				<ul class="">
					<li class="">– San Alfonso 562 Metro Estación central</li>
					<li class="">– Horario: Lunes a Viernes de 9:30 a 18:00 hrs. Sábado: 10:00 a 14:00 hrs.</li>
				</ul>
			</div>
		<?php }; ?>
	</div>
<?php }; ?>
<!-- fin de tipo de entrega nueva -->
</div>
</div>
</div>
</div>
</div>


				<?php endwhile;
			else : ?>
			<?php endif;
			wp_reset_query();
			$wp_query = $temp ?>
		</div>
	</div>
</div>
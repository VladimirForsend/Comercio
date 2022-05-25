<style>
    <?php include get_template_directory() . '/titan/category-box/category-box.css'; ?>
</style>

<div class="container-fluid px-0">
    <h3 class="h3"><?php the_field('titulo_seccion_categoria'); ?></h3>
    <div class="row">
        <!-- banner superior del home -->
        <?php
        $link_big = get_field('link_a_catagoria_big');
        $image_big = get_field('imagen_categoria_big');
		/* variables para definir los tipos de categorías a mostrar */
		$categoriasactivadas = get_field('activar_categorias_antiguas');
		$categoriasnuevasextra = get_field('activar_fila_adicional');
        if (!empty($link_big)) : ?>
            <div class="col-12 tarjeta-comercio big">
                <a class="p-0 fondo carbon" href="<?php echo esc_url($link_big); ?>">
                    <div class="banner-home col-12 col-lg-8 p-0">
                        <img class="img-fluid" src="<?php echo esc_url($image_big['url']); ?>" alt="<?php echo esc_attr($image_big['alt']); ?>" />
                    </div>
                    <div class="contenido--tarjeta--comercio col-12 col-lg-4">
                        <span class="sub--titulo-tarjeta texto blanco h3 m-0"><?php the_field('subtitulo_tarjeta_categoria'); ?></span>
                        <span class="nombre--cat col-12 col-md-12 texto blanco h2"><?php the_field('nombre_de_categoria_big'); ?></span>
                        <span class="col-12 col-md-5 p-0" href="<?php echo esc_url($link_big); ?>"><span class="justificar al inicio boton-ver-mas fondo transparente">Ver más</span></span>
                    </div>
                </a>
            </div>  
        <?php endif; ?>
        <!-- fin del banner superior del home -->
    
        <!-- row de categorias 1 -->
		<?php if(!empty($categoriasactivadas)) {?>
			<?php
			$link_uno = get_field('link_a_catagoria_uno');
			$image_uno = get_field('imagen_categoria_1');
			if (!empty($link_uno)) : ?>
				<div class="col-12 col-md-4 tarjeta-comercio">
					<a class="py-2 py-lg-0" href="<?php echo esc_url($link_uno); ?>">
						<div class="imagen-categoria col-6 col-md-12 col-lg-6">
							<img class="img-fluid" src="<?php echo esc_url($image_uno['url']); ?>" alt="<?php echo esc_attr($image_uno['alt']); ?>" />
						</div>
						<div class="contenido--tarjeta--comercio col-6 col-md-12 col-lg-6">
							<h4 class="nombre--cat"><?php the_field('nombre_de_categoria_1'); ?></h4>
							<span class="" href="<?php echo esc_url($link_uno); ?>"><span class="boton-ver-mas">Ver más</span></span>
						</div>
					</a>
				</div>
			<?php endif; ?>

			<?php
			$link_dos = get_field('link_a_catagoria_dos');
			$image_dos = get_field('imagen_categoria_dos');
			if (!empty($link_dos)) : ?>
				<div class="col-12 col-md-4 tarjeta-comercio">
					<a class="py-2 py-lg-0" href="<?php echo esc_url($link_dos); ?>">
						<div class="imagen-categoria col-6 col-md-12 col-lg-6">
							<img class="img-fluid" src="<?php echo esc_url($image_dos['url']); ?>" alt="<?php echo esc_attr($image_dos['alt']); ?>" />
						</div>
						<div class="contenido--tarjeta--comercio col-6 col-md-12 col-lg-6">
							<h4 class="nombre--cat"><?php the_field('nombre_de_categoria_dos'); ?></h4>
							<span class="" href="<?php echo esc_url($link_dos); ?>"><span class="boton-ver-mas">Ver más</span></span>
						</div>
					</a>
				</div>
			<?php endif; ?>

			<?php
			$link_tres = get_field('link_a_catagoria_tres');
			$image_tres = get_field('imagen_categoria_tres');
			if (!empty($link_tres)) : ?>
				<div class="col-12 col-md-4 tarjeta-comercio">
					<a class="py-2 py-lg-0" href="<?php echo esc_url($link_tres); ?>">
					<div class="imagen-categoria col-6 col-md-12 col-lg-6">
							<img class="img-fluid" src="<?php echo esc_url($image_tres['url']); ?>" alt="<?php echo esc_attr($image_tres['alt']); ?>" />
						</div>
						<div class="contenido--tarjeta--comercio col-6 col-md-12 col-lg-6">
							<h4 class="nombre--cat"><?php the_field('nombre_de_categoria_tres'); ?></h4>
							<span class="" href="<?php echo esc_url($link_tres); ?>"><span class="boton-ver-mas">Ver más</span></span>
						</div>
					</a>
				</div>
			<?php endif; ?>
		<?php }; ?>
        <!-- din de row de categorias 1 -->
		
		<!-- row de categorias nuevas -->
		<?php if(empty($categoriasactivadas)){ ?>
			<?php
			$linkneo_uno = get_field('link_nueva_uno');
			$imageneo_uno = get_field('imagen_nueva_uno');
			if (!empty($imageneo_uno)) : ?>
				<div class="col-12 col-sm-6 col-lg-3 tarjeta-comercio-2">
					<a class="" <?php if(!empty($linkneo_uno)){?>href="<?php echo esc_url($linkneo_uno); ?>"<?php }; ?>>
						<img class="img-fluid" src="<?php echo esc_url($imageneo_uno['url']); ?>" alt="<?php echo esc_attr($imageneo_uno['alt']); ?>" />
					</a>
				</div>
			<?php endif; ?>
			<?php
			$linkneo_dos = get_field('link_nueva_dos');
			$imageneo_dos = get_field('imagen_nueva_dos');
			if (!empty($imageneo_dos)) : ?>
				<div class="col-12 col-sm-6 col-lg-3 tarjeta-comercio-2">
					<a class="" <?php if(!empty($linkneo_dos)){?>href="<?php echo esc_url($linkneo_dos); ?>"<?php }; ?>>
						<img class="img-fluid" src="<?php echo esc_url($imageneo_dos['url']); ?>" alt="<?php echo esc_attr($imageneo_dos['alt']); ?>" />
					</a>
				</div>
			<?php endif; ?>
			<?php
			$linkneo_tres = get_field('link_nueva_tres');
			$imageneo_tres = get_field('imagen_nueva_tres');
			if (!empty($imageneo_tres)) : ?>
				<div class="col-12 col-sm-6 col-lg-3 tarjeta-comercio-2">
					<a class="" <?php if(!empty($linkneo_tres)){?>href="<?php echo esc_url($linkneo_tres); ?>"<?php }; ?>>
						<img class="img-fluid" src="<?php echo esc_url($imageneo_tres['url']); ?>" alt="<?php echo esc_attr($imageneo_tres['alt']); ?>" />
					</a>
				</div>
			<?php endif; ?>
			<?php
			$linkneo_cuatro = get_field('link_nueva_cuatro');
			$imageneo_cuatro = get_field('imagen_nueva_cuatro');
			if (!empty($imageneo_cuatro)) : ?>
				<div class="col-12 col-sm-6 col-lg-3 tarjeta-comercio-2">
					<a class="" <?php if(!empty($linkneo_cuatro)){?>href="<?php echo esc_url($linkneo_cuatro); ?>"<?php }; ?>>
						<img class="img-fluid" src="<?php echo esc_url($imageneo_cuatro['url']); ?>" alt="<?php echo esc_attr($imageneo_cuatro['alt']); ?>" />
					</a>
				</div>
			<?php endif; ?>
		<?php }; ?>
        <!-- fin de row de categorias nuevas -->

        <!-- slider de productos destacados -->
        <?php include get_template_directory() . '/titan/productos/producto-destacados-post-type.php'; ?>
        <!-- fin de slider de productos destacados -->

        <!-- row de categorias 2 -->
		<?php if(!empty($categoriasactivadas)){?>
			<?php
			$link_cuatro = get_field('link_a_catagoria_cuatro');
			$image_cuatro = get_field('imagen_categoria_cuatro');
			if (!empty($link_cuatro)) : ?>
				<div class="col-12 col-md-4 tarjeta-comercio">
					<a class="py-2 py-lg-0" href="<?php echo esc_url($link_cuatro); ?>">
						<div class="imagen-categoria col-6 col-md-12 col-lg-6">
							<img class="img-fluid" src="<?php echo esc_url($image_cuatro['url']); ?>" alt="<?php echo esc_attr($image_cuatro['alt']); ?>" />
						</div>
						<div class="contenido--tarjeta--comercio col-6 col-md-12 col-lg-6">
							<h4 class="nombre--cat"><?php the_field('nombre_de_categoria_cuatro'); ?></h4>
							<span class="" href="<?php echo esc_url($link_cuatro); ?>"><span class="boton-ver-mas">Ver más</span></span>
						</div>
					</a>
				</div>
			<?php endif; ?>

			<?php
			$link_cinco = get_field('link_a_catagoria_cinco');
			$image_cinco = get_field('imagen_categoria_cinco');
			if (!empty($link_cinco)) : ?>
				<div class="col-12 col-md-4 tarjeta-comercio">
					<a class="py-2 py-lg-0" href="<?php echo esc_url($link_cinco); ?>">
						<div class="imagen-categoria col-6 col-md-12 col-lg-6">
							<img class="img-fluid" src="<?php echo esc_url($image_cinco['url']); ?>" alt="<?php echo esc_attr($image_cinco['alt']); ?>" />
						</div>
						<div class="contenido--tarjeta--comercio col-6 col-md-12 col-lg-6">
							<h4 class="nombre--cat"><?php the_field('nombre_de_categoria_cinco'); ?></h4>
							<span class="" href="<?php echo esc_url($link_cinco); ?>"><span class="boton-ver-mas">Ver más</span></span>
						</div>
					</a>
				</div>
			<?php endif; ?>

			<?php
			$link_seis = get_field('link_a_catagoria_seis');
			$image_seis = get_field('imagen_categoria_seis');
			if (!empty($link_seis)) : ?>
				<div class="col-12 col-md-4 tarjeta-comercio">
					<a class="py-2 py-lg-0" href="<?php echo esc_url($link_seis); ?>">
						<div class="imagen-categoria col-6 col-md-12 col-lg-6">
							<img class="img-fluid" src="<?php echo esc_url($image_seis['url']); ?>" alt="<?php echo esc_attr($image_seis['alt']); ?>" />
						</div>
						<div class="contenido--tarjeta--comercio col-6 col-md-12 col-lg-6">
							<h4 class="nombre--cat"><?php the_field('nombre_de_categoria_seis'); ?></h4>
							<span class="" href="<?php echo esc_url($link_seis); ?>"><span class="boton-ver-mas">Ver más</span></span>
						</div>
					</a>
				</div>
			<?php endif; ?>
		<?php }; ?>
        <!-- fin de row de categorias 2 -->
		
		<!-- row de categorias nuevas -->
		<?php if(empty($categoriasactivadas)){ ?>
			<?php if(!empty($categoriasnuevasextra)) {?>
				<?php
				$linkneo_cinco = get_field('link_nueva_cinco');
				$imageneo_cinco = get_field('imagen_nueva_cinco');
				if (!empty($imageneo_cinco)) : ?>
					<div class="col-12 col-sm-6 col-lg-3 tarjeta-comercio-2">
						<a class="" <?php if(!empty($linkneo_cinco)){?>href="<?php echo esc_url($linkneo_cinco); ?>"<?php }; ?>>
							<img class="img-fluid" src="<?php echo esc_url($imageneo_cinco['url']); ?>" alt="<?php echo esc_attr($imageneo_cinco['alt']); ?>" />
						</a>
					</div>
				<?php endif; ?>
				<?php
				$linkneo_seis = get_field('link_nueva_seis');
				$imageneo_seis = get_field('imagen_nueva_seis');
				if (!empty($imageneo_seis)) : ?>
					<div class="col-12 col-sm-6 col-lg-3 tarjeta-comercio-2">
						<a class="" <?php if(!empty($linkneo_seis)){?>href="<?php echo esc_url($linkneo_seis); ?>"<?php }; ?>>
							<img class="img-fluid" src="<?php echo esc_url($imageneo_seis['url']); ?>" alt="<?php echo esc_attr($imageneo_seis['alt']); ?>" />
						</a>
					</div>
				<?php endif; ?>
				<?php
				$linkneo_siete = get_field('link_nueva_siete');
				$imageneo_siete = get_field('imagen_nueva_siete');
				if (!empty($imageneo_siete)) : ?>
					<div class="col-12 col-sm-6 col-lg-3 tarjeta-comercio-2">
						<a class="" <?php if(!empty($linkneo_siete)){?>href="<?php echo esc_url($linkneo_siete); ?>"<?php }; ?>>
							<img class="img-fluid" src="<?php echo esc_url($imageneo_siete['url']); ?>" alt="<?php echo esc_attr($imageneo_siete['alt']); ?>" />
						</a>
					</div>
				<?php endif; ?>
				<?php
				$linkneo_ocho = get_field('link_nueva_ocho');
				$imageneo_ocho = get_field('imagen_nueva_ocho');
				if (!empty($imageneo_ocho)) : ?>
					<div class="col-12 col-sm-6 col-lg-3 tarjeta-comercio-2">
						<a class="" <?php if(!empty($linkneo_ocho)){?>href="<?php echo esc_url($linkneo_ocho); ?>"<?php }; ?>>
							<img class="img-fluid" src="<?php echo esc_url($imageneo_ocho['url']); ?>" alt="<?php echo esc_attr($imageneo_ocho['alt']); ?>" />
						</a>
					</div>
				<?php endif; ?>
			<?php }; ?>
		<?php }; ?>
        <!-- fin de row de categorias nuevas -->

        <!-- lista principal de productos -->
        <?php include get_template_directory() . '/titan/productos/producto-post-type.php'; ?>
        <!-- fin de lista principal de productos -->

        <!-- banner inferior del home -->
        <?php
        $link_big_dos = get_field('link_a_catagoria_big_dos');
        $image_big_dos = get_field('imagen_categoria_big_dos');
        if (!empty($link_big_dos)) : ?>
            <div class="col-12 tarjeta-comercio big">
                <a class="p-0 fondo carbon" href="<?php echo esc_url($link_big_dos); ?>">
                    <div class="banner-home col-12 col-lg-8 p-0">
                        <img class="img-fluid" src="<?php echo esc_url($image_big_dos['url']); ?>" alt="<?php echo esc_attr($image_big_dos['alt']); ?>" />
                    </div>
                    <div class="contenido--tarjeta--comercio col-12 col-lg-4">
                        <span class="sub--titulo-tarjeta texto blanco h3 m-0"><?php the_field('subtitulo_tarjeta_categoria_dos'); ?></span>
                        <span class="nombre--cat texto blanco h2"><?php the_field('nombre_de_categoria_big_dos'); ?></span>
                        <span class="p-0" href="<?php echo esc_url($link_big_dos); ?>"><span class="justificar al inicio boton-ver-mas fondo transparente">Ver más</span></span>
                    </div>
                </a>
            </div>  
        <?php endif; ?>
        <!-- fin de banner inferior del home -->
    </div>
</div>

<!-- Nuevo Home (En construcción) -->
<div class="d-none">
	<!-- seccion 1 -->
	<?php $seccion1 = get_field('seccion_uno'); if(empty($seccion1)) {?>
		<section id="SeccionUno" class="container-fluid mb-5">
			<div class="row mb-5">
				<div class="col-12">
					<?php $imagenmain = get_field('bannerhome'); if(!empty($imagenmain)) {?>
						<a href="<?php the_field('bannerhomelink'); ?>" class="contenedor-imagen-bg">
							<img class="imagen-bg" src="<?php echo esc_url($imagenmain['url']); ?>" alt="<?php echo esc_attr($imagenmain['alt']); ?>">
						</a>
					<?php }; ?>
				</div>
			</div>
			<div class="row mb-5">
				<!-- carrusel -->
				<div class="col-12">
					<?php require get_template_directory() . '/titan/slider/slider.php'; ?>
				</div>
			</div>
			<div class="row mb-4">
				<div class="col-12 col-md-6 mb-4">
					<?php $imagenbig1 = get_field('bannerbig_uno'); if(!empty($imagenbig1)) {?>
						<a href="<?php the_field('linkbig_uno'); ?>" class="contenedor-imagen-bg">
							<img class="imagen-bg" src="<?php echo esc_url($imagenbig1['url']); ?>" alt="<?php echo esc_attr($imagenbig1['alt']); ?>">
						</a>
					<?php }; ?>
				</div>
				<div class="col-12 col-md-6 mb-4">
					<?php $imagenbig2 = get_field('bannerbig_dos'); if(!empty($imagenbig2)) {?>
						<a href="<?php the_field('linkbig_dos'); ?>" class="contenedor-imagen-bg">
							<img class="imagen-bg" src="<?php echo esc_url($imagenbig2['url']); ?>" alt="<?php echo esc_attr($imagenbig2['alt']); ?>">
						</a>
					<?php }; ?>
				</div>
				<div class="col-12 col-md-6 mb-4">
					<?php $imagenbig3 = get_field('bannerbig_tres'); if(!empty($imagenbig3)) {?>
						<a href="<?php the_field('linkbig_tres'); ?>" class="contenedor-imagen-bg">
							<img class="imagen-bg" src="<?php echo esc_url($imagenbig3['url']); ?>" alt="<?php echo esc_attr($imagenbig3['alt']); ?>">
						</a>
					<?php }; ?>
				</div>
				<div class="col-12 col-md-6 mb-4">
					<?php $imagenbig4 = get_field('bannerbig_cuatro'); if(!empty($imagenbig4)) {?>
						<a href="<?php the_field('linkbig_cuatro'); ?>" class="contenedor-imagen-bg">
							<img class="imagen-bg" src="<?php echo esc_url($imagenbig4['url']); ?>" alt="<?php echo esc_attr($imagenbig4['alt']); ?>">
						</a>
					<?php }; ?>
				</div>
			</div>
		</section>
	<?php }; ?>

	<!-- seccion 2 -->
	<?php $seccion2 = get_field('seccion_dos'); if(empty($seccion2)) {?>
		<section id="SeccionDos" class="container-fluid mb-5">
			<div class="row mb-4">
				<div class="col-12 text-center mb-4">
					<?php $titulo2 = get_field('titulo_dos'); if(!empty($titulo2)) {?>
						<h2 class="titulo"><?php the_field('titulo_dos');?></h2>
					<?php }; ?>
				</div>
				<div class="col-12 col-md-4 mb-4">
					<?php $imagensmall1 = get_field('bannersmall_uno'); if(!empty($imagensmall1)) {?>
						<a href="<?php the_field('linksmall_uno'); ?>" class="contenedor-imagen-bg">
							<img class="imagen-bg" src="<?php echo esc_url($imagensmall1['url']); ?>" alt="<?php echo esc_attr($imagensmall1['alt']); ?>">
						</a>
					<?php }; ?>
				</div>
				<div class="col-12 col-md-4 mb-4">
					<?php $imagensmall2 = get_field('bannersmall_dos'); if(!empty($imagensmall2)) {?>
						<a href="<?php the_field('linksmall_dos'); ?>" class="contenedor-imagen-bg">
							<img class="imagen-bg" src="<?php echo esc_url($imagensmall2['url']); ?>" alt="<?php echo esc_attr($imagensmall2['alt']); ?>">
						</a>
					<?php }; ?>
				</div>
				<div class="col-12 col-md-4 mb-4">
					<?php $imagensmall3 = get_field('bannersmall_tres'); if(!empty($imagensmall3)) {?>
						<a href="<?php the_field('linksmall_tres'); ?>" class="contenedor-imagen-bg">
							<img class="imagen-bg" src="<?php echo esc_url($imagensmall3['url']); ?>" alt="<?php echo esc_attr($imagensmall3['alt']); ?>">
						</a>
					<?php }; ?>
				</div>
				<div class="col-12 productos">
					<?php if(get_field('productos_dos')) { echo do_shortcode( get_field('productos_dos') );} ?>
				</div>
				<div class="col-12">
					<?php $subtitulo2 = get_field('subtitulo_dos'); if(!empty($subtitulo2)) {?>
						<h2 class="titulo text-left"><?php the_field('subtitulo_dos');?></h2>
					<?php }; ?>
				</div>
				<!-- slider de productos -->
				<div id="asd" class="col-12">
					<?php if(get_field('productos_dosb')) { echo do_shortcode( get_field('productos_dosb') );} ?>
				</div>
			</div>
		</section>
	<?php }; ?>

	<!-- seccion 3 -->
	<?php $seccion3 = get_field('seccion_tres'); if(empty($seccion3)) {?>
		<section id="SeccionTres" class="container-fluid mb-5">
			<div class="row">
				<div class="col-12 text-center mb-4">
					<?php $titulo3 = get_field('titulo_tres'); if(!empty($titulo3)) {?>
						<h2 class="titulo"><?php the_field('titulo_tres');?></h2>
					<?php }; ?>
				</div>
				<div class="col-12 productos">
					<?php if(get_field('productos_tres')) { echo do_shortcode( get_field('productos_tres') );} ?>
				</div>
			</div>
		</section>
	<?php }; ?>
	
	<!-- seccion 4 -->
	<?php $seccion4 = get_field('seccion_cuatro'); if(empty($seccion4)) {?>
		<section id="SeccionCuatro" class="container-fluid mb-5">
			<div class="row justify-content-center">
				<div class="col-12 text-center mb-4">
					<?php $titulo4 = get_field('titulo_cuatro'); if(!empty($titulo4)) {?>
						<h2 class="titulo"><?php the_field('titulo_cuatro');?></h2>
					<?php }; ?>
				</div>
				<div class="col-12 col-md-4 mb-4">
					<?php $imagensmall4 = get_field('bannersmall_cuatro'); if(!empty($imagensmall4)) {?>
						<a href="<?php the_field('linksmall_cuatro'); ?>" class="contenedor-imagen-bg">
							<img class="imagen-bg" src="<?php echo esc_url($imagensmall4['url']); ?>" alt="<?php echo esc_attr($imagensmall4['alt']); ?>">
						</a>
					<?php }; ?>
				</div>
				<div class="col-12 col-md-4 mb-4">
					<?php $imagensmall5 = get_field('bannersmall_cinco'); if(!empty($imagensmall5)) {?>
						<a href="<?php the_field('linksmall_cinco'); ?>" class="contenedor-imagen-bg">
							<img class="imagen-bg" src="<?php echo esc_url($imagensmall5['url']); ?>" alt="<?php echo esc_attr($imagensmall5['alt']); ?>">
						</a>
					<?php }; ?>
				</div>
				<div class="col-12 col-md-4 mb-4">
					<?php $imagensmall6 = get_field('bannersmall_seis'); if(!empty($imagensmall6)) {?>
						<a href="<?php the_field('linksmall_seis'); ?>" class="contenedor-imagen-bg">
							<img class="imagen-bg" src="<?php echo esc_url($imagensmall6['url']); ?>" alt="<?php echo esc_attr($imagensmall6['alt']); ?>">
						</a>
					<?php }; ?>
				</div>
				<div class="col-12 mb-4">
					<?php $imagenbig5 = get_field('bannerbig_cinco'); if(!empty($imagenbig5)) {?>
						<a href="<?php the_field('linkbig_cinco'); ?>" class="contenedor-imagen-bg">
							<img class="imagen-bg" src="<?php echo esc_url($imagenbig5['url']); ?>" alt="<?php echo esc_attr($imagenbig5['alt']); ?>">
						</a>
					<?php }; ?>
				</div>
				<div class="col-12 productos">
					<?php if(get_field('productos_cuatro')) { echo do_shortcode( get_field('productos_cuatro') );} ?>
				</div>
			</div>
		</section>
	<?php }; ?>
	
	<!-- seccion 5 -->
	<?php $seccion5 = get_field('seccion_cinco'); if(empty($seccion5)) {?>
		<section id="SeccionCinco" class="container-fluid mb-5">
			<div class="row">
				<div class="col-12 text-center mb-4">
					<?php $titulo5 = get_field('titulo_cinco'); if(!empty($titulo5)) {?>
						<h2 class="titulo"><?php the_field('titulo_cinco');?></h2>
					<?php }; ?>
				</div>
				<div class="col-12 productos">
					<?php if(get_field('productos_cinco')) { echo do_shortcode( get_field('productos_cinco') );} ?>
				</div>
			</div>
		</section>
	<?php }; ?>
	
	<!-- seccion 6 -->
	<?php $seccion6 = get_field('seccion_seis'); if(empty($seccion6)) {?>
		<section id="SeccionSeis" class="container-fluid mb-5">
			<div class="row">
				<div class="col-12 text-center mb-4">
					<?php $titulo6 = get_field('titulo_seis'); if(!empty($titulo6)) {?>
						<h2 class="titulo"><?php the_field('titulo_seis');?></h2>
					<?php }; ?>
				</div>
				<div class="col-12 productos">
					<?php if(get_field('productos_seis')) { echo do_shortcode( get_field('productos_seis') );} ?>
				</div>
			</div>
		</section>
	<?php }; ?>
</div>
<!-- Nuevo Home (En construcción) -->
<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package kelly
 */
?>

	</div><!-- #content -->

	<footer id="footer">
				<div class="footer-developer">
					<div class="footer-content">
						<div class="footer-content-cefet">
							<div class="footer-content-cefet-container">
								<div class="footer-content-cefet-imagotipo">
									<img class="footer-content-cefet-imagotipo-isotipo" src="/wordpress/wp-content/themes/kelly/logo_cefet.png" alt="logotipo do cefet">
								</div>
								<div class="footer-content-cefet-contato">
									<div class="footer-content-cefet-contato-endereco">
										<div class="footer-content-cefet-contato-endereco-icon">
											<img class="footer-content-cefet-contato-endereco-icon-ctt" src="/wordpress/wp-content/themes/kelly/endereco-icon.png" alt="icon">
										</div>
										<div class="footer-content-cefet-contato-endereco-text">
											<p class="footer-content-cefet-contato-endereco-text-ctt">Av. Gov. Roberto Silveira, 1900 - Prado, Nova Friburgo - RJ, 28635-080</p>
										</div>
										<div style="clear:both;"></div>
									</div>
									<div class="footer-content-cefet-contato-telefone">
										<div class="footer-content-cefet-contato-telefone-icon">
											<img class="footer-content-cefet-contato-telefone-icon-ctt" src="/wordpress/wp-content/themes/kelly/telefone-icon.png" alt="icon">
										</div>
										<div class="footer-content-cefet-contato-telefone-text">
											<p class="footer-content-cefet-contato-telefone-text-ctt">(22) 2519-8905</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="footer-content-fabricadesoftware">
							<div class="footer-content-fabricadesoftware-container">
								<div class="footer-content-fabricadesoftware-imagotipo">
									<img class="footer-content-fabricadesoftware-imagotipo-isotipo" src="/wordpress/wp-content/themes/kelly/logo_fabrica.png" alt="logotipo da fábrica de software">
									<div style="clear:both;"></div>
								</div>
								<div class="footer-content-fabricadesoftware-descricao">
									<div class="footer-content-fabricadesoftware-descricao-text">
										<p class="footer-content-fabricadesoftware-descricao-text-ctt">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
									</div>
								</div>
								<div style="clear:both;"></div>
							</div>
						</div>
						<div style="clear:both;"></div>
					</div>
				</div>
				<div class="creditosWP">
					<p class="creditosWP-text">
						<?php do_action( 'kelly_credits' ); ?>
						<a><?php printf( __( 'Proudly powered by %s', 'kelly' ), 'WordPress' ); ?></a>
						<span class="sep"> | </span>
						<?php printf( __( 'Theme: %1$s by %2$s.', 'kelly' ), 'Kelly', '<a  >WordPress.com</a>' ); ?>
					</p>
				</div>
			</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
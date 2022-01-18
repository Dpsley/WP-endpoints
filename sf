
				<?php
				while ( have_posts() ) {
					the_post();

					get_template_part( 'loop-templates/content', 'single' );
                     echo ("Площадь:  ");					
                     the_field('площадь');
					 echo ("<br>     Стоимость:  ");					
                     the_field('стоимость');
                     echo ("<br>     Адрес:  ");					
                     the_field('адрес');
                     echo ("<br>     Жилая площадь:  ");					
                     the_field('жилая_площадь');
                     echo ("<br>     Этаж:  ");					
                     the_field('этаж');
					understrap_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				}
				?>

			</main><!-- #main -->

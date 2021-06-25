  </div>

  <div class="last-posts">
    <?php
    $args = array('posts_per_page' => 10);
    $the_query = new WP_Query($args);
    while ($the_query->have_posts()) :
      $the_query->the_post();
    ?>
      <a class="post" href="<?php echo get_permalink(); ?>">
        <?php
        the_post_thumbnail('thumbnail');
        the_title('<h2>', '</h2>');
        ?>
      </a>
    <?php
    endwhile;
    rewind_posts();
    wp_reset_query();
    ?>
  </div>


  <div class="social">
    <a class="instagram" href="https://www.instagram.com/wallstreet._.academy/">اینستاگرام</a>
  </div>

  <div class="call">
    <h2>سوالی دارید؟</h2>
    <div>
      <span>با ما تماس بگیرید:</span>
      <a href="tel:+989038115607"><i>+98</i>903 811 5607</a>
      <img src="<?php echo get_template_directory_uri() ?>/assets/images/phone-white.svg" alt="">
    </div>
    <form>
      <label for="phone">با شما تماس می‌گیریم!</label>
      <input type="tel" name="phone" placeholder="09388063351" />
      <input type="submit" value="ثبت تلفن تماس" />
    </form>
  </div>
  </main>

  <footer>
    <div>
      <ul class="links">
        <li><a href="<?php echo get_permalink( get_page_by_path( 'archive' ) ); ?>">بایگانی مطالب</a></li>
        <li><a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ); ?>">ارتباط با ما</a></li>
        <li><a href="<?php echo get_permalink( get_page_by_path( 'archive' ) ); ?>">درباره ما</a></li>
        <li><a href="http://tyyi.net">برنامه‌نویس: محمدرضا طیبی</a></li>
      </ul>
    </div>
    <div class="authors">
      <?php wp_list_authors(); ?>
    </div>
    <div class="categories">
      <?php wp_list_categories(); ?>
    </div>
  </footer>

  <?php wp_footer() ?>

  </body>

  </html>
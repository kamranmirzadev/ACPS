<?php
/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */  



/**
 * Your code goes below.
 */
 
 /**
 * Projects Tabs Shortcode: [projects_tabs]
 * CPT: projects | Taxonomy: project-type | Latest 6 posts
 */
function pt_projects_tabs_shortcode() {

    $q = new WP_Query( array(
        'post_type'      => 'projects',
        'post_status'    => 'publish',
        'posts_per_page' => 6,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'no_found_rows'  => true,
    ) );

    if ( ! $q->have_posts() ) {
        return '';
    }

    ob_start();
    ?>
    <style>
    .pt-wrap{
        --pt-primary: var(--e-global-color-primary, #4a9fd8);
        --pt-title-inactive: #fff9;
        --pt-title-active: #ffffff;
        --pt-term-color: #6f7c84;
        --pt-active-bg: #132a37;
        --pt-line: #ffffff1f;
        position: relative;
        width: 100%;
        min-height: 420px;
    }
    .pt-wrap *{ box-sizing: border-box; }
    .pt-list{ list-style: none; margin: 0; padding: 0; width: 33%; }
    .pt-item{ margin: 0; padding: 0; border-bottom: 1px solid var(--pt-line); }

    /* Tab head */
    .pt-head{
        position: relative;
        display: flex;
        align-items: flex-start;
        gap: 24px;
        padding: 26px 20px 24px 28px;
        cursor: pointer;
        transition: background-color .35s ease;
        outline: none;
    }
    .pt-head::before{
        content: "";
        position: absolute;
        left: 0; top: 0;
        width: 2px; height: 100%;
        background: var(--pt-primary);
        transform: scaleY(0);
        transform-origin: top;
        transition: transform .45s cubic-bezier(.65,.05,.36,1);
    }
    .pt-item.is-active .pt-head{ background: var(--pt-active-bg); }
    .pt-item.is-active .pt-head::before{ transform: scaleY(1); }

    /* Counter */
    .pt-count{
        font-family: var(--e-global-typography-f0f7841-font-family), Sans-serif;
        font-size: var(--e-global-typography-f0f7841-font-size);
        font-weight: var(--e-global-typography-f0f7841-font-weight);
        text-transform: var(--e-global-typography-f0f7841-text-transform);
        line-height: var(--e-global-typography-f0f7841-line-height);
        letter-spacing: var(--e-global-typography-f0f7841-letter-spacing);
        color: var(--e-global-color-primary);
        flex: 0 0 auto;
        min-width: 22px;
    }

    /* Post title H3 */
    .pt-wrap .pt-title{
        font-family: "Oswald", Sans-serif;
        font-size: 19px;
        font-weight: 700;
        text-transform: uppercase;
        line-height: 22px;
        letter-spacing: 0.5px;
        color: var(--pt-title-inactive);
        margin: 0;
        padding: 0;
        transition: color .35s ease;
    }
    .pt-item.is-active .pt-head .pt-title{ color: var(--pt-title-active); }

    /* Taxonomy under title */
    .pt-term{
        display: block;
        margin-top: 6px;
        font-family: "Oswald", Sans-serif;
        font-size: 12px;
        font-weight: 400;
        text-transform: uppercase;
        line-height: 20px;
        letter-spacing: 0.3px;
        color: var(--pt-term-color);
    }

    /* Right panel (desktop) */
    .pt-panel{
        position: absolute;
        top: 0; right: 0; bottom: 0;
        left: 33%;
        overflow: hidden;
        opacity: 0;
        visibility: hidden;
        transition: opacity .45s ease, visibility .45s ease;
    }
    .pt-item.is-active .pt-panel{ opacity: 1; visibility: visible; }
    .pt-panel img{
        position: absolute; inset: 0;
        width: 100%; height: 100%;
        object-fit: cover; display: block;
    }
    .pt-panel::after{
        content: "";
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(12, 25, 33, 0.82), transparent 55%);
        pointer-events: none;
    }
    .pt-caption{
        position: absolute;
        left: 28px; right: 28px; bottom: 22px;
        z-index: 2;
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 20px;
    }
    .pt-cap-meta{
        font-family: "Oswald", Sans-serif;
        font-size: 12px;
        font-weight: 400;
        text-transform: uppercase;
        line-height: 20px;
        letter-spacing: 0.3px;
        color: var(--e-global-color-primary);
    }
    .pt-wrap .pt-cap-title{
        font-family: "Oswald", Sans-serif;
        font-size: 19px;
        font-weight: 700;
        text-transform: uppercase;
        line-height: 22px;
        letter-spacing: 0.5px;
        color: #fff;
        margin: 0; padding: 0;
        text-align: right;
    }

    /* Mobile accordion */
    @media (max-width: 767px){
        .pt-wrap{ min-height: 0; height: auto; overflow: visible; }
        .pt-list{ width: 100%; height: auto; overflow: visible; }
        .pt-head{ padding: 20px 16px 20px 20px; gap: 16px; }
        .pt-panel{
            position: relative;
            left: auto; right: auto; top: auto; bottom: auto;
            opacity: 1;
            visibility: visible;
            height: 0;
            transition: height .5s cubic-bezier(.65,.05,.36,1);
        }
        .pt-item.is-active .pt-panel{
            height: 62vw;
            max-height: 380px;
        }
        .pt-caption{ left: 16px; right: 16px; bottom: 14px; }
    }
    </style>

    <div class="pt-wrap">
        <ul class="pt-list">
        <?php
        $i = 0;
        while ( $q->have_posts() ) :
            $q->the_post();
            $i++;
            $num   = str_pad( $i, 2, '0', STR_PAD_LEFT );
            $terms = get_the_terms( get_the_ID(), 'project-type' );
            $label = ( $terms && ! is_wp_error( $terms ) ) ? implode( ', ', wp_list_pluck( $terms, 'name' ) ) : '';
            $active = ( 1 === $i ) ? ' is-active' : '';
            ?>
            <li class="pt-item<?php echo $active; ?>">
                <div class="pt-head" role="button" tabindex="0" aria-expanded="<?php echo ( 1 === $i ) ? 'true' : 'false'; ?>">
                    <span class="pt-count"><?php echo esc_html( $num ); ?></span>
                    <div class="pt-text">
                        <h3 class="pt-title"><?php echo esc_html( get_the_title() ); ?></h3>
                        <?php if ( $label ) : ?>
                            <span class="pt-term"><?php echo esc_html( $label ); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="pt-panel">
                    <?php
                    if ( has_post_thumbnail() ) {
                        echo get_the_post_thumbnail( get_the_ID(), 'large', array( 'loading' => ( 1 === $i ) ? 'eager' : 'lazy' ) );
                    }
                    ?>
                    <div class="pt-caption">
                        <span class="pt-cap-meta"><?php echo esc_html( $num . ( $label ? ' / ' . $label : '' ) ); ?></span>
                        <h3 class="pt-cap-title"><?php echo esc_html( get_the_title() ); ?></h3>
                    </div>
                </div>
            </li>
        <?php endwhile; wp_reset_postdata(); ?>
        </ul>
    </div>

    <script>
    (function(){
        document.querySelectorAll('.pt-wrap').forEach(function(wrap){
            if (wrap.dataset.ptInit) return;
            wrap.dataset.ptInit = '1';
            var items = wrap.querySelectorAll('.pt-item');
            var mq = window.matchMedia('(min-width: 768px)');

            function activate(it){
                items.forEach(function(x){
                    var on = (x === it);
                    x.classList.toggle('is-active', on);
                    x.querySelector('.pt-head').setAttribute('aria-expanded', on ? 'true' : 'false');
                });
            }
            function close(it){
                it.classList.remove('is-active');
                it.querySelector('.pt-head').setAttribute('aria-expanded', 'false');
            }
            function handle(it){
                if (mq.matches) { activate(it); }
                else if (it.classList.contains('is-active')) { close(it); }
                else { activate(it); }
            }

            items.forEach(function(it){
                var head = it.querySelector('.pt-head');
                head.addEventListener('mouseenter', function(){ if (mq.matches) activate(it); });
                head.addEventListener('click', function(){ handle(it); });
                head.addEventListener('keydown', function(e){
                    if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); handle(it); }
                });
            });
        });
    })();
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode( 'projects_tabs', 'pt_projects_tabs_shortcode' );


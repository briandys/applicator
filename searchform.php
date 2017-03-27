<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<div class="cp search-cp" data-name="Search">
    <div class="search--cr">
        
        <h2 class="h search--h">
            <span class="h-l"><?php esc_html_e( 'Search', 'applicator'); ?></span>
        </h2>
        
        <form class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
            <fieldset class="fs grp fs--grp">
                <legend><?php esc_html_e( 'Search Form', 'applicator'); ?></legend>
                <div class="item fs-item search-term--fs-item">
                    <div class="search-term--fs-item--cr">
                        <label class="label search-term--label" for="<?php echo $unique_id; ?>">
                            <span class="search-term--label-l"><?php esc_html_e( 'Search for:', 'applicator' ); ?></span>
                        </label>
                        <div class="input-text search-term--input-text">
                            <input id="<?php echo $unique_id; ?>" class="input--text input--search search-term--input--text" type="search" placeholder="<?php esc_attr_e( 'Enter search term', 'applicator' ); ?>" value="<?php echo get_search_query(); ?>" name="s" required>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class="search-form--axns">
                <div class="search-form--axns--cr">
                    <div class="grp search-form-axn--grp">
                        <div class="item search-form-axn-item search-form--axns--form-axn-item">
                            <div class="btn search-form-submit--btn">
                                <button class="b search-form-submit--b" type="submit">
                                    <span class="b-l"><?php esc_html_e( 'Search', 'applicator' ); ?></span>
                                </button>
                            </div>
                        </div>
                        <div class="item form-axn-item search-form--axns--form-axn-item">
                            <div class="btn search-form-reset--btn">
                                <button class="b a search-form-reset--a" type="reset">
                                    <span class="search-form-reset--a-l"><?php esc_html_e( 'Reset', 'applicator' ); ?></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- search-form--axns -->
        </form>

    </div>
</div><!-- search-cp -->
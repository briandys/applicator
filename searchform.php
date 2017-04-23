<?php
$unique_id = esc_attr( uniqid( 'search-form-' ) );
?>

<div class="cp search---cp" data-name="Search">
    <div class="cr search---cr">
        <div class="hr search---hr">
            <div class="hr_cr search---hr_cr">
                <h2 class="h search---h"><span class="h_l search---h_l"><?php esc_html_e( 'Search', 'applicator'); ?></span></h2>
            </div>
        </div>
        <div class="ct search---ct">
            <div class="ct_cr search---ct_cr">
                <form class="form search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" role="search" data-name="Search Form">
                    <div class="fieldsets search-form---fieldsets">
                        <div class="fieldsets---cr search-form---fieldsets---cr">

                            <div class="cp fs-item search-term-creation" data-name="Search Term Creation">
                                <div class="cr search-term-crt---cr">
                                    <div class="h search-term-crt---h"><span class="h_l search-term-crt---h_l"><?php esc_html_e( 'Search Term Creation', 'applicator'); ?></span></div>
                                    <div class="ct search-term-crt---ct">
                                        <div class="ct_cr search-term-crt---ct_cr">
                                            <span class="obj search-term-creation-label---obj" data-name="Search Term Creation Label">
                                                <label class="label search-term-crt-lbl---label" for="<?php echo $unique_id; ?>"><span class="label_l search-term-crt-lbl---label_l"><?php esc_html_e( 'Search Term', 'applicator'); ?></span></label>
                                            </span>
                                            <span class="obj search-term-creation-input---obj" data-name="Search Term Creation Input">
                                                <span class="ee--input-text search-term-crt-inp---ee--input-text"><input id="<?php echo $unique_id; ?>" class="input-text search-term-crt-inp--input-text" name="s" type="text" placeholder="<?php esc_attr_e( 'Enter search term', 'applicator' ); ?>" value="<?php echo get_search_query(); ?>" required></span>
                                            </span>
                                        </div>
                                    </div><!-- search-term-crt---ct -->
                                </div>
                            </div><!-- search-term-creation -->

                        </div>
                    </div><!-- fieldsets -->
                    <div class="axns search-form-axns" data-name="Search Form Actions">
                        <div class="cr search-form-axns---cr">
                            <div class="h search-form-axns---h"><span class="h_l search-form-axns---h_l">Search Form Actions</span></div>
                            <div class="obj axn search-submit-axn" data-name="Search Submit Action">
                                <button class="b search-submit-axn---b" type="submit" title="<?php esc_attr_e( 'Search', 'applicator' ); ?>"><span class="b_l search-submit-axn---b_l"><?php esc_html_e( 'Search', 'applicator' ); ?></span></button>
                            </div><!-- search-submit-axn -->
                            <div class="obj axn search-reset-axn" data-name="Search Reset Action">
                                <button class="b search-reset-axn---b" type="reset" title="<?php esc_attr_e( 'Reset', 'applicator' ); ?>"><span class="b_l search-reset-axn---b_l"><?php esc_html_e( 'Reset', 'applicator' ); ?></span></button>
                            </div><!-- search-reset-axn -->
                        </div>
                    </div><!-- search-form-axns -->
                </form><!-- search-form -->
            </div>
        </div><!-- search---ct -->
    </div>
</div><!-- search---cp -->








<div class="cp search---cp" data-name="Search">
    <div class="search--cr">
        
        <h2 class="h search--h">
            <span class="h-l"><?php esc_html_e( 'Search', 'applicator'); ?></span>
        </h2>
        
        <form class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
            <fieldset class="fs grp fs--grp search-term--fs-grp">
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
                        <div class="item search-form-axn-item search-form--axns--form-axn-item search-form-submit--form-axn-item">
                            <div class="btn search-form-submit--btn">
                                <button class="b a form--a search-form-submit--a" type="submit" title="<?php esc_attr_e( 'Search', 'applicator' ); ?>">
                                    <span class="search-form-submit--a-l">
                                        <span class="search-form-submit--a--words-l"><?php esc_html_e( 'Search', 'applicator' ); ?></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="item form-axn-item search-form--axns--form-axn-item search-form-reset--form-axn-item">
                            <div class="btn search-form-reset--btn">
                                <button class="b a form--a search-form-reset--a" type="reset" title="<?php esc_attr_e( 'Reset', 'applicator' ); ?>">
                                    <span class="search-form-reset--a-l">
                                        <span class="search-form-reset--a--words-l"><?php esc_html_e( 'Reset', 'applicator' ); ?></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- search-form--axns -->
        </form>

    </div>
</div><!-- search---cp -->
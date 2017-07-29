=== Applicator ===
Contributors: Brian Dys Sahagun
Requires at least: WordPress 4.7
Tested up to: WordPress 4.7
Version: 0
License: GNU General Public License
License URI: http://www.gnu.org/licenses/gpl.html
Tags: right-sidebar, accessibility-ready, custom-menu, footer-widgets, sticky-post, translation-ready

== Description ==

A WordPress Theme that is accessibility-ready, SEO and mobile-friendly.

For more information about Applicator please go to http://applicator.dysinelab.com.

== Copyright ==

Applicator WordPress Theme, Copyright 2017 DysineLab
Applicator is distributed under the terms of the GNU GPL

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

Applicator bundles the following third-party resources:

HTML5 Shiv, Copyright 2014 Alexander Farkas
Licenses: MIT/GPL2
Source: https://github.com/aFarkas/html5shiv

normalize.css, Copyright 2012-2016 Nicolas Gallagher and Jonathan Neal
License: MIT
Source: https://necolas.github.io/normalize.css/

Font Awesome icons, Copyright Dave Gandy
License: SIL Open Font License, version 1.1.
Source: http://fontawesome.io/

Bundled image, Copyright Bogdan Dada on Unsplash
License: CC0 1.0 Universal (CC0 1.0)
Source: https://unsplash.com/@bogs?photo=vXpcpTl2Tt4

== Changelog ==

= 0 =
* Released: March 22, 2017

Initial release

== Structure, Components, Objects ==

* wbp (cn)

    ** wbp-start (cn)

    ** main-header (cn)

        *** wbp-main-info (cp)

            **** wbp-main-name-obj (obj)
            **** wbp-main-logo-obj (obj)
            **** wbp-main-desc-obj (obj)

        *** main-nav (nav)

            **** WP Generated: ul
                ***** WP Generated: li (cp)
                    ****** [main-navi (navi)] > WP Generated: a [main-navi---a]
                    ****** sub-nav-toggle (obj)

        *** main-search-func (cp)

            **** search---h (h)
            **** main-search-toggle (obj)

            **** search-form <form>
                ***** search-term-creation (cp)
                    ****** search-term-creation-label (obj)
                    ****** search-term-creation-input (obj)

                ***** search-form-axns (axns)
                    ****** search-submit-axn (axn)
                    ****** search-reset-axn (axn)

        *** main-header-aside (cn)

            **** main-hr-as---h (h)
            **** main-menu-toggle (obj)

            **** widget (cp)
                ***** WP Generated: div

    ** main-content (cn)
    
        *** main-ct---h (h)
        
        *** pri-content (cn)
        
            **** entry-md (md)
            
                ***** post (cp)
                    ****** post-title-obj (obj)
                    ****** post-admin-axns (axns)
                    
                    ****** post-header-aside (cn)
                    
                        ******* post-meta (cp)
                            ******** post-published-modified-date-time-stamp-info (cp)
                                
                                ********* post-published (cp)
                                    ********** post-published-time-stamp-label (obj)
                                    
                                    ********** post-published-date-time-stamp (cp)
                                        *********** post-published-date-stamp (obj)
                                        *********** post-published-time-stamp (obj)
                                
                                
                                ********* post-modified (cp)
                                    ********** post-modified-time-stamp-label (obj)
                                    
                                    ********** post-modified-date-time-stamp (cp)
                                        *********** post-modified-date-stamp (obj)
                                        *********** post-modified-time-stamp (obj)
                            
                            
                            ******** post-published-author (cp)
                                ********* published-by-label-obj (obj)
                                ********* post-author (cp)
                                    ********** post-author-name-obj (obj)
                                    ********** post-author-avatar-obj (obj)
                            
                            ******** post-category-classification (cp)
                                ********* post-category-label (obj)
                                ********* post-categories <ul>
                        
                        
                        ******* post-banner-visual-obj (obj)
                        
                        ******* comments-actions-snippet (cp)
                            ******** comments-population (cp)
                            ******** comments-ability (cp)
                    
                    ****** edit-post-axn (axn)
                    
                    ****** post-content (cp)
                    
                ***** comment-md (md)



    ** main-footer (cn)

    ** wbp-end (cn)

== HTML Attribute to Check ==

Navigation
* class="nav"
* role="navigation"
* aria-label="Nav Name"
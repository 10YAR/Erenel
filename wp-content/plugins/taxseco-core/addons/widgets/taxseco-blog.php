<?php
use \Elementor\Widget_Base;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;
/**
 *
 * Blog Post Widget .
 *
 */
class Taxseco_Blog_Post extends Widget_Base {

	public function get_name() {
		return 'taxsecoblogpost';
	}

	public function get_title() {
		return __( 'Taxseco Blog Post', 'taxseco' );
	}

	public function get_icon() {
		return 'eicon-code';
    }

	public function get_categories() {
		return [ 'taxseco' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'blog_post_section',
			[
				'label' => __( 'Blog Post', 'taxseco' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'blog_slider_style',
			[
				'label' 		=> __( 'Blog Style', 'taxseco' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'one',
				'options'		=> [
					'one'  			=> __( 'Style One', 'taxseco' ),
					'two' 			=> __( 'Style Two', 'taxseco' ),
					'three' 		=> __( 'Style Three', 'taxseco' ),
					'four' 		=> __( 'Style Four', 'taxseco' ),
				],
			]
		);
        $this->add_control(
			'blog_post_count',
			[
				'label' 	=> __( 'No of Post to show', 'taxseco' ),
                'type' 		=> Controls_Manager::NUMBER,
                'min'       => 1,
                'max'       => count( get_posts( array('post_type' => 'post', 'post_status' => 'publish', 'fields' => 'ids', 'posts_per_page' => '-1') ) ),
                'default'  	=> __( '4', 'taxseco' )
			]
        );

		$this->add_control(
			'title_count',
			[
				'label' 	=> __( 'Title Length', 'taxseco' ),
				'type' 		=> Controls_Manager::TEXT,
				'default'  	=> __( '5', 'taxseco' ),
			]
		);

        $this->add_control(
			'blog_post_order',
			[
				'label' 	=> __( 'Order', 'taxseco' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ASC'   	=> __('ASC','taxseco'),
                    'DESC'   	=> __('DESC','taxseco'),
                ],
                'default'  	=> 'DESC'
			]
        );

        $this->add_control(
			'blog_post_order_by',
			[
				'label' 	=> __( 'Order By', 'taxseco' ),
                'type' 		=> Controls_Manager::SELECT,
                'options'   => [
                    'ID'    	=> __( 'ID', 'taxseco' ),
                    'author'    => __( 'Author', 'taxseco' ),
                    'title'    	=> __( 'Title', 'taxseco' ),
                    'date'    	=> __( 'Date', 'taxseco' ),
                    'rand'    	=> __( 'Random', 'taxseco' ),
                ],
                'default'  	=> 'ID'
			]
        );

        $this->add_control(
			'exclude_cats',
			[
				'label' 		=> __( 'Exclude Categories', 'taxseco' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->taxseco_get_categories(),
			]
        );

        $this->add_control(
			'exclude_tags',
			[
				'label' 		=> __( 'Exclude Tags', 'taxseco' ),
                'type' 			=> Controls_Manager::SELECT2,
                'multiple' 		=> true,
				'options' 		=> $this->taxseco_get_tags(),
			]
        );

        $this->add_control(
			'exclude_post_id',
			[
				'label'         => __( 'Exclude Post', 'taxseco' ),
                'type'          => Controls_Manager::SELECT2,
                'multiple'      => true,
				'options'       => $this->taxseco_post_id(),
			]
        );
        $this->add_control(
			'read_more',
			[
				'label' 	=> __( 'Read More Text', 'taxseco' ),
                'type' 		=> Controls_Manager::TEXT,
                'default'  	=> __( 'Read More', 'taxseco' ),
			]
        );
        $this->end_controls_section();

		/*-----------------------------------------general styling------------------------------------*/

		$this->start_controls_section(
			'general_styling',
			[
				'label' 	=> __( 'General Styling', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'con_bg_color',
			[
				'label' 		=> __( 'Post Background Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-card'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .blog-content'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' 			=> 'border',
				'label' 		=> esc_html__( 'Border', 'taxseco' ),
				'selector' 		=> '{{WRAPPER}} .blog-content',
			]
		);
		$this->add_control(
			'date_bg_color',
			[
				'label' 		=> __( 'Date Background Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-wide .blog-date a'	=> 'background-color: {{VALUE}}!important;',
				],
			]
        );
        
        $this->end_controls_section();


        /*-----------------------------------------meta styling------------------------------------*/

		$this->start_controls_section(
			'meta_style',
			[
				'label' 	=> __( 'Meta', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'meta_color',
			[
				'label' 		=> __( 'Meta Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-meta a' => 'color: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'meta_hvr_color',
			[
				'label' 		=> __( 'Meta HoverColor', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-meta a:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'meta_typography',
				'label' 	=> __( 'Meta Typography', 'taxseco' ),
				'selector' 	=> '{{WRAPPER}} .blog-meta a',
			]
		);

		$this->add_control(
			'admin_color',
			[
				'label' 		=> __( 'Author Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-box .author-name' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'author_typography',
				'label' 	=> __( 'Author Typography', 'taxseco' ),
				'selector' 	=> '{{WRAPPER}} .blog-box .author-name',
			]
		);
		$this->end_controls_section();

		/*-----------------------------------------title styling------------------------------------*/

        $this->start_controls_section(
			'blog_title_styling',
			[
				'label' 	=> __( 'Title Styling', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'blog_title_color',
			[
				'label' 		=> __( 'Title Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title a'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_control(
			'blog_title_hvr_color',
			[
				'label' 		=> __( 'Title Hover Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title a:hover'	=> 'color: {{VALUE}}!important;',
				]
			]
        );
        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'blog_title_typography',
		 		'label' 		=> esc_html__( 'Title Typography', 'taxseco' ),
		 		'selector' 		=> '{{WRAPPER}} .blog-title a',
		 	]
		);

        $this->add_responsive_control(
			'blog_title_margin',
			[
				'label' 		=> __( 'Title Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );

        $this->add_responsive_control(
			'blog_title_padding',
			[
				'label' 		=> __( 'Title Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .blog-title a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
			]
        );
        $this->end_controls_section();

        //----------------------------------button styling----------------------------------//

        $this->start_controls_section(
			'button_style_section',
			[
				'label' 	=> __( 'Button Style', 'taxseco' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'btn_color',
			[
				'label' 		=> __( 'Button Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> 'background-color: {{VALUE}}!important;',
					'{{WRAPPER}} .link-btn' => 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_hvr_color',
			[
				'label' 		=> __( 'Button Hover Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .link-btn:hover'	=> 'color: {{VALUE}}!important;',
				],
				'condition'		=> [ 'blog_slider_style' =>  ['two', 'three']  ],
			]
        );

        $this->add_control(
			'btn_hvr_color1',
			[
				'label' 		=> __( 'Button Gradient Hover Color 1', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> '--theme-color: {{VALUE}}!important;',
				],
				'condition'		=> [ 'blog_slider_style' =>  ['one']  ],
			]
        );
        $this->add_control(
			'btn_hvr_color2',
			[
				'label' 		=> __( 'Button Gradient Hover Color 2', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> '--theme-color2: {{VALUE}}!important;',
				],
				'condition'		=> [ 'blog_slider_style' =>  ['one']  ],
			]
        );

        $this->add_group_control(
		Group_Control_Typography::get_type(),
		 	[
				'name' 			=> 'button_typography',
		 		'label' 		=> __( 'Typography', 'taxseco' ),
		 		'selector' 		=> '{{WRAPPER}} .vs-btn, {{WRAPPER}} .link-btn'
			]
		);

		$this->add_control(
			'btn_text_color',
			[
				'label' 		=> __( 'Text Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .link-btn'	=> 'color: {{VALUE}}!important;',
				],
			]
        );
        $this->add_control(
			'btn_text_hvr_color',
			[
				'label' 		=> __( 'Text Hover Color', 'taxseco' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn:hover'	=> 'color: {{VALUE}}!important;',
					'{{WRAPPER}} .link-btn:hover'	=> 'color: {{VALUE}}!important;',
				],
			]
        );

        $this->add_responsive_control(
			'button_margin',
			[
				'label' 		=> __( 'Button Margin', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .link-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
        );

        $this->add_responsive_control(
			'button_padding',
			[
				'label' 		=> __( 'Button Padding', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .link-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
			]
		);
        $this->add_responsive_control(
			'button_border_radius',
			[
				'label' 		=> __( 'Button Border Radius', 'taxseco' ),
				'type' 			=> Controls_Manager::DIMENSIONS,
				'size_units' 	=> [ 'px', '%', 'em' ],
				'selectors' 	=> [
					'{{WRAPPER}} .vs-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'condition'		=> [ 'blog_slider_style' =>  ['one']  ],
			]
		);
        $this->end_controls_section();

		
    }

    public function taxseco_get_categories() {
        $cats = get_terms(array(
            'taxonomy' => 'category',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'taxseco');
        }

        return $catarr;
    }

    public function taxseco_get_tags() {
        $cats = get_terms(array(
            'taxonomy' => 'post_tag',
            'hide_empty' => true,
        ));

        $catarr = [];

        foreach( $cats as $singlecat ) {
            $catarr[$singlecat->term_id] = __($singlecat->name,'taxseco');
        }

        return $catarr;
    }

    // Get Specific Post
    public function taxseco_post_id(){
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => -1,
        );

        $taxseco_post = new WP_Query( $args );

        $postarray = [];

        while( $taxseco_post->have_posts() ){
            $taxseco_post->the_post();
            $postarray[get_the_Id()] = get_the_title();
        }
        wp_reset_postdata();
        return $postarray;
    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $exclude_post = $settings['exclude_post_id'];

        if( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats']
            );
        } elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags']
            );
        }elseif( !empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( !empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'category__not_in'      => $settings['exclude_cats'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
                'post__not_in'          => $exclude_post
            );
        } elseif( empty( $settings['exclude_cats'] ) && !empty( $settings['exclude_tags'] ) && empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'tag__not_in'           => $settings['exclude_tags'],
            );
        } elseif( empty( $settings['exclude_cats'] ) && empty( $settings['exclude_tags'] ) && !empty( $settings['exclude_post_id'] ) ) {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true,
                'post__not_in'          => $exclude_post
            );
        } else {
            $args = array(
                'post_type'             => 'post',
                'posts_per_page'        => esc_attr( $settings['blog_post_count'] ),
                'order'                 => esc_attr( $settings['blog_post_order'] ),
                'orderby'               => esc_attr( $settings['blog_post_order_by'] ),
                'ignore_sticky_posts'   => true
            );
        }


        $blogpost = new WP_Query( $args );

        if( $settings['blog_slider_style'] == 'one' ){
        	$i = 0;
	        if( $blogpost->have_posts() ) {
	        	$i++;
	        	if($i == 1){
	        		$img_size = '';
	        	}
	        	echo '<!-- blog Area -->';      		
	  	     		echo '<div class="blog-grid-wrap">';
	                	while( $blogpost->have_posts() ) {$blogpost->the_post();
	                		$categories = get_the_category();

	                		echo '<div class="blog-grid">';
	                			if(has_post_thumbnail()){
				                    echo '<div class="blog-img">';
				                        the_post_thumbnail( );
				                        echo '<a href="'. esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="category">'.esc_html( $categories[0]->name ).'</a>';
				                    echo '</div>';
				                }
			                    echo '<div class="blog-content">';
			                        if( get_the_title() ){
			                            echo '<h3 class="blog-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
			                        }
			                        echo '<div class="blog-meta style2">';
			                            echo '<a href="'.esc_url( taxseco_blog_date_permalink() ).'">'.esc_html( get_the_date( 'd M Y' ) ).'</a>';
			                        echo '</div>';
			                        if(!empty($settings['read_more'])){
		                                echo '<a href="'.esc_url( get_permalink() ).'" class="link-btn">'.esc_html($settings['read_more']).'<i class="fas fa-arrow-right"></i></a>';
		                            }
			                    echo '</div>';
			                echo '</div>';
			            }   wp_reset_postdata(); 
		            echo '</div>';
				echo '<!-- blog Area end -->';
	        }
	    }elseif( $settings['blog_slider_style'] == 'two' ){
	    	echo '<div class="blog-wrap arrow-wrap">';
		    	echo '<div class="row blog_slider1">';
	                while( $blogpost->have_posts() ) {$blogpost->the_post();
	                	$categories = get_the_category();
	                	echo '<div class="col-md-6 col-xl-4">';
		                    echo '<div class="blog-card">';
		                        if(has_post_thumbnail()){
				                    echo '<div class="blog-img">';
				                        the_post_thumbnail('taxseco_370X280');
				                        echo '<a href="'. esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="category">'.esc_html( $categories[0]->name ).'</a>';
				                    echo '</div>';
				                }
		                        echo '<div class="blog-content">';
		                            if( get_the_title() ){
			                            echo '<h3 class="blog-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
			                        }
		                            echo '<div class="blog-meta style2">';
		                                echo '<a href="'.esc_url( taxseco_blog_date_permalink() ).'">'.esc_html( get_the_date( 'd M Y' ) ).'</a>';
		                            echo '</div>';
		                            if(!empty($settings['read_more'])){
		                                echo '<a href="'.esc_url( get_permalink() ).'" class="link-btn">'.esc_html($settings['read_more']).'<i class="fas fa-arrow-right"></i></a>';
		                            }
		                        echo '</div>';
		                    echo '</div>';
		                echo '</div>';
					}  wp_reset_postdata(); 
				echo '</div>';
			echo '</div>';
	    }elseif( $settings['blog_slider_style'] == 'three' ){
	    	echo '<div class="blog-wrap arrow-wrap">';
		    	echo '<div class="row blog_slider1 slider-shadow">';
	                while( $blogpost->have_posts() ) {$blogpost->the_post();
	                	$categories = get_the_category();
	                	echo '<div class="col-md-6 col-xl-4">';
			                echo '<div class="blog-box">';
			                    if(has_post_thumbnail()){
				                    echo '<div class="blog-img">';
				                        the_post_thumbnail('taxseco_370X280');
				                    echo '</div>';
				                }
			                    echo '<div class="blog-content">';
			                        echo '<a href="'. esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="category">'.esc_html( $categories[0]->name ).'</a>';
			                        if( get_the_title() ){
			                            echo '<h3 class="blog-title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
			                        }
			                        echo '<div class="blog-meta style2">';
			                            echo '<a href="'.esc_url( taxseco_blog_date_permalink() ).'">'.esc_html( get_the_date( 'd M Y' ) ).'</a>';
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            echo '</div>';
					}  wp_reset_postdata(); 
				echo '</div>';
			echo '</div>';
	    }else{
	    	echo '<div class="blog-wrap arrow-wrap">';
		    	echo '<div class="row blog_slider2 slider-shadow">';
	                while( $blogpost->have_posts() ) {$blogpost->the_post();
	                	$categories = get_the_category();
	                	echo '<div class="col-md-6 col-xl-4">';
			                echo '<div class="blog-box">';
			                    if(has_post_thumbnail()){
				                    echo '<div class="blog-img">';
				                        the_post_thumbnail('taxseco_544X296');
				                    echo '</div>';
				                }
			                    echo '<div class="blog-content">';
			                        echo '<a href="'. esc_url( get_category_link( $categories[0]->term_id ) ) . '" class="category">'.esc_html( $categories[0]->name ).'</a>';
			                        if( get_the_title() ){
			                            echo '<h3 class="blog-title style2"><a href="'.esc_url( get_permalink() ).'">'.esc_html( wp_trim_words( get_the_title( ), $settings['title_count'], '' ) ).'</a></h3>';
			                        }
			                        echo '<div class="blog-meta style2">';
			                            echo '<a href="'.esc_url( taxseco_blog_date_permalink() ).'">'.esc_html( get_the_date( 'd M Y' ) ).'</a>';
			                        echo '</div>';
			                    echo '</div>';
			                echo '</div>';
			            echo '</div>';
					}  wp_reset_postdata(); 
				echo '</div>';
			echo '</div>';
	    }
	}
}
<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

use Elementor\Utils;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

class Elementor_ucfe_advanced_carousel extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'advanced-carousel';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Advanced Carousel', 'uae' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-sliders';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ultimate-addons' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		// wp_enqueue_style( 'slick-carousal-css', plugins_url( '../css/slick-carousal.css' , __FILE__ ));
		// wp_enqueue_script( 'slick-js', plugins_url( '../js/slick.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		// wp_enqueue_script( 'custom-tm-js', plugins_url( '../js/front/custom-tm.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		
		$this->start_controls_section(
			'setting_section',
			[
				'label' => __( 'Settings', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'theme',
			[
				'label' => __( 'Select Theme', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description'	=>	'Click here to <a href="https://elementor.topdigitaltrends.net/advanced-carousel/" target="_blank">See Demo</a>',
				'options' 		=> [
		     		'default-tdt' 			=> esc_html__('Top Image Bottom Content', 'uae'),
		     		'content-over-slider' 	=> esc_html__('Content Over Image', 'uae'),
				],
				'default' 		=> 'default-tdt',
			]
		);

		$this->add_responsive_control(
			'mbl_height',
			[
				'label' => __( 'Custom Height (For Mobile) px', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'theme' => 'content-over-slider',
				],
			]
		);

		$this->add_control(
			'padding',
			[
				'label' => __( 'Padding Top (%)', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'description'	=>	'padding will apply from top for the content',
				'default'	=>	'15',
				'condition' => [
					'theme' => 'content-over-slider',
				],
			]
		);

		$this->add_control(
			'effect',
			[
				'label' => __( 'Slide Effect', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'false' 			=> esc_html__('Slide [Right To Left]', 'uae'),
		     		'true' 				=> esc_html__('Fade', 'uae'),
				],
				'default' 		=> 'false',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'true' 			=> esc_html__('True', 'uae'),
		     		'false' 		=> esc_html__('False', 'uae'),
				],
				'default' 		=> 'true',
			]
		);

		$this->add_control(
			'infinite',
			[
				'label' => __( 'Infinite Scroll', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description'	=>	'Infinite loop sliding',
				'options' 		=> [
		     		'true' 			=> esc_html__('True', 'uae'),
		     		'false' 		=> esc_html__('False', 'uae'),
				],
				'default' 		=> 'true',
			]
		);

		$this->add_control(
			'adaptiveheight',
			[
				'label' => __( 'Adaptive Height', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description'	=>	'resize height automatically to fill the gap If each slide has different height',
				'options' 		=> [
		     		'true' 			=> esc_html__('True', 'uae'),
		     		'false' 		=> esc_html__('False', 'uae'),
				],
				'default' 		=> 'true',
			]
		);

		$this->add_control(
			'pauseonhover',
			[
				'label' => __( 'Pause on Hover', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description'	=>	'Pause Autoplay On Hover',
				'options' 		=> [
		     		'true' 			=> esc_html__('True', 'uae'),
		     		'false' 		=> esc_html__('False', 'uae'),
				],
				'default' 		=> 'true',
			]
		);

		$this->add_control(
			'speed',
			[
				'label' => __( 'Slider Speed', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'description'	=>	'write in ms eg, 1500 [1s = 1000]',
				'default'	=>	'2500',
			]
		);

		$this->add_control(
			'spaces',
			[
				'label' => __( 'Spaces between two items [px]', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default'	=>	'0',
				'selectors' => [
					'{{WRAPPER}} .tm-slider .slick-slide' => 'padding: 0 {{VALUE}}px !important;',
				],
			]
		);

		$this->add_control(
			'title_heading',
			[
				'label' => __('Slide To Show [Visible Number of Slides]', 'uae'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'slide_visible',
			[
				'label' => __( 'On PC', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default'	=>	'1',
			]
		);
		$this->add_control(
			'tabs',
			[
				'label' => __( 'On Tabs', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default'	=>	'1',
			]
		);
		$this->add_control(
			'slide_visible_mbl',
			[
				'label' => __( 'On Mobile', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default'	=>	'1',
			]
		);

		$this->add_control(
			'slide_to_scroll',
			[
				'label' => __('Slide To Scroll', 'uae'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'slide_scroll',
			[
				'label' => __( 'Slide To Scroll', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'description'	=>	'allow user to multiple slide on click or drag.',
				'default'	=>	'1',
			]
		);

		$this->add_control(
			'class',
			[
				'label' => __( 'Extra Class', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'description'	=>	'Add extra class name that will be applied to the icon process, and you can use this class for your customizations.',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'navigation_area', 
			[
				'label'        => esc_html__('Navigation', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'arrow',
			[
				'label' => __( 'Arrows', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'true' 			=> esc_html__('Show', 'uae'),
		     		'false' 		=> esc_html__('Hide', 'uae'),
				],
				'default' 		=> 'true',
			]
		);

		$this->add_control(
			'arrowclr',
			[
				'label' => __( 'Arrow Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'condition' => [
					'arrow' => 'true',
				],
				'selectors' => [
					'{{WRAPPER}} .tm-slider .slick-next:before' => 'color: {{VALUE}} !important;',
					'{{WRAPPER}} .tm-slider .slick-prev:before' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'arrowbg',
			[
				'label' => __( 'Arrow Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'condition' => [
					'arrow' => 'true',
				],
				'selectors' => [
					'{{WRAPPER}} .tm-slider .slick-next:before' => 'background: {{VALUE}} !important;',
					'{{WRAPPER}} .tm-slider .slick-prev:before' => 'background: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'arrowsize',
			[
				'label' => __( 'Arrow Font Size', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default'	=>	'30',
				'condition' => [
					'arrow' => 'true',
				],
				'selectors' => [
					'{{WRAPPER}} .tm-slider .slick-next:before' => 'font-size: {{SIZE}}px;',
					'{{WRAPPER}} .tm-slider .slick-prev:before' => 'font-size: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'arrowposition',
			[
				'label' => __( 'Position', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default'	=>	'40',
				'description'	=>	'change the position of arrows on slider, with minus sign arrows move away from slider',
				'condition' => [
					'arrow' => 'true',
				],
			]
		);

		$this->add_control(
			'arrow_on_mbl',
			[
				'label' => __( 'On Mobile', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'separator' => 'after',
				'options' 		=> [
		     		'block' 			=> esc_html__('Show', 'uae'),
		     		'none' 		=> esc_html__('Hide', 'uae'),
				],
				'default' 		=> 'block',
			]
		);

		$this->add_control(
			'dot',
			[
				'label' => __( 'Dots', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'true' 			=> esc_html__('Show', 'uae'),
		     		'false' 		=> esc_html__('Hide', 'uae'),
				],
				'default' 		=> 'true',
			]
		);

		$this->add_control(
			'dotclr',
			[
				'label' => __( 'Dot Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'condition' => [
					'dot' => 'true',
				],
				'selectors' => [
					'{{WRAPPER}} .tm-slider .slick-dots li button:before' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->add_control(
			'dotsize',
			[
				'label' => __( 'Dot Size', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default'	=>	'30',
				'condition' => [
					'dot' => 'true',
				],
				'selectors' => [
					'{{WRAPPER}} .tm-slider .slick-dots li button:before' => 'font-size: {{SIZE}}px !important;',
				],
			]
		);

		$this->add_control(
			'dotposition',
			[
				'label' => __( 'Position', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default'	=>	'-25',
				'description'	=>	'change the position of arrows on slider, with minus sign arrows move away from slider',
				'separator' => 'after',
				'condition' => [
					'dot' => 'true',
				],
				'selectors' => [
					'{{WRAPPER}} .tm-slider .slick-dots' => 'bottom: {{SIZE}}px !important;',
				],
			]
		);

		// $this->add_control(
		// 	'borderclr',
		// 	[
		// 		'label' => __( 'Border Color', 'uae' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#000',
		// 		'condition' => [
		// 			'style' => 'border',
		// 		],
		// 	]
		// );
		

		$this->end_controls_section();


//-----------------------------------------


		$this->start_controls_section(
			'carousel_flip', 
			[
				'label'        => esc_html__('Carousel + FlipBox', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$repeater_ = new \Elementor\Repeater();

// type
		$repeater_->add_control(
			'more_options_1',
			[
				'label' => __( 'FlipBox Type', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);	
		$repeater_->add_control(
    		'tp_flipbox_type',
		    [
		        'label' => __( 'Filp Box Type', 'fancy-elementor-flipbox' ),
		        'type' => Controls_Manager::CHOOSE,
						'default'     => __( 'vertical', 'fancy-elementor-flipbox' ),
		        'options' => [
		            'horizontal'    => [
		                'title' => __( 'Horizontal', 'fancy-elementor-flipbox' ),
		                'icon' => 'eicon-v-align-stretch',
		            ],
		            'vertical' => [
		                'title' => __( 'Vertical', 'fancy-elementor-flipbox' ),
		                'icon' => 'eicon-spacer',
		            ]
		        ],
		    ]
		);

		$repeater_->add_control(
			'tp_flipbox_type-min-height',
			[
				'label' => esc_html__( 'Min Height', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'description' => 'Unit in px',
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__holder ' => 'height: {{VALUE}}px;',
				],
			]
		);

		$repeater_->add_control(
			'padding',
			[
				'label' => __( 'Padding', 'fancy-elementor-flipbox' ),
				'type' => 'dimensions',
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__front' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tp-flipbox__back' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$repeater_->add_group_control(
			'box-shadow',
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .tp-flipbox__back, {{WRAPPER}} .tp-flipbox__front',
			]
		);

		$repeater_->add_control(
			'tp_flipbox_border_color',
			[
				'label' => __( 'Color', 'fancy-elementor-flipbox' ),
				'type' => 'color',
				'selectors' => [
					'{{WRAPPER}}  .tp-flipbox__front' => 'border-color: {{VALUE}};',
					'{{WRAPPER}}  .tp-flipbox__back' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'border_border!' => '',
				],
			]
		);

		$repeater_->add_group_control(
			'border',
			[
				'name' => 'border',
				'placeholder' => '1px',
				'exclude' => [ 'color' ],
				'fields_options' => [
					'width' => [
						'label' => __( 'Border Width', 'fancy-elementor-flipbox' ),
					],
				],
				'selector' => '{{WRAPPER}} .tp-flipbox__back, {{WRAPPER}} .tp-flipbox__front',
			]
		);

		$repeater_->add_control(
			'tp_flipbox_border_radius',
			[
				'label' => __( 'Border Radius', 'fancy-elementor-flipbox' ),
				'type' => 'dimensions',
				'size_units' => [ 'px', '%' ],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__front' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .tp-flipbox__back' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$repeater_->add_control(
			'tp_flipbox_f_align_items',
			[
				'label' => __( 'Align items', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' 				=> _x( 'Default', 'Background Control', 'elementor' ),
					'normal' 		=> _x( 'normal', 'Background Control', 'elementor' ),
					'flex-start' 	=> _x( 'flex-start', 'Background Control', 'elementor' ),
					'flex-end' 		=> _x( 'flex-end', 'Background Control', 'elementor' ),
					'center' 		=> _x( 'center', 'Background Control', 'elementor' ),
					'baseline' 		=> _x( 'baseline', 'Background Control', 'elementor' ),
					'stretch' 		=> _x( 'stretch', 'Background Control', 'elementor' ),
				],
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__front' => 'align-items: {{VALUE}};',
				],
			]
		);

// end type

// Background & Colors
		$repeater_->add_control(
			'more_options_2',
			[
				'label' => __( 'Background & Colors', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);		
		$repeater_->add_control(
			'tp_flipbox_f_icon',
			[
				 'label' => __( 'Front Side Image Icon', 'fancy-elementor-flipbox' ),
				 'type' => Controls_Manager::MEDIA
			]
		);

		$repeater_->add_control(
			'tp_flipbox_f_bg_img',
			[
				 'label' => __( 'Front Side Image background', 'fancy-elementor-flipbox' ),
				 'type' => Controls_Manager::MEDIA,
				 'dynamic' => [
						'active' => true,
				 ],
				 'selectors' => [
 					'{{WRAPPER}} .tp-flipbox__front' => 'background-image: url({{URL}});',
 				]
			]
		);

		$repeater_->add_control(
			'tp_flipbox_f_bg_img_position',
			[
				'label' => __( 'Front background position', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'center center' => _x( 'Center Center', 'Background Control', 'elementor' ),
					'center left' => _x( 'Center Left', 'Background Control', 'elementor' ),
					'center right' => _x( 'Center Right', 'Background Control', 'elementor' ),
					'top center' => _x( 'Top Center', 'Background Control', 'elementor' ),
					'top left' => _x( 'Top Left', 'Background Control', 'elementor' ),
					'top right' => _x( 'Top Right', 'Background Control', 'elementor' ),
					'bottom center' => _x( 'Bottom Center', 'Background Control', 'elementor' ),
					'bottom left' => _x( 'Bottom Left', 'Background Control', 'elementor' ),
					'bottom right' => _x( 'Bottom Right', 'Background Control', 'elementor' ),
				],
				'default' => 'center center',
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__front' => 'background-position: {{VALUE}};',
				],
			]
		);

		$repeater_->add_control(
			'tp_flipbox_f_bg_img_size',
			[
				'label' => __( 'Front background size', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => _x( 'Default', 'Background Control', 'elementor' ),
					'auto' => _x( 'Auto', 'Background Control', 'elementor' ),
					'cover' => _x( 'Cover', 'Background Control', 'elementor' ),
					'contain' => _x( 'Contain', 'Background Control', 'elementor' ),
				],
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__front' => 'background-size: {{VALUE}};',
				],
			]
		);

		$repeater_->add_control(
			'tp_flipbox_f_bg_color',
			[
				'label' => __( 'Front Side Background Color', 'fancy-elementor-flipbox' ),
				'default' => '#52ffaf',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__front' => 'background-color: {{VALUE}};',
				]
			]

		);

		$repeater_->add_control(
		  'tp_flipbox_b_icon',
		  [
		     'label' => __( 'Back Side Image Icon', 'fancy-elementor-flipbox' ),
		     'type' => Controls_Manager::MEDIA
		  ]
		);

		$repeater_->add_control(
		  'tp_flipbox_b_bg_img',
		  [
		     'label' => __( 'Back Side Image background', 'fancy-elementor-flipbox' ),
			 'type' => Controls_Manager::MEDIA,
			 'dynamic' => [
				'active' => true,
		 		],
				 'selectors' => [
 					'{{WRAPPER}} .tp-flipbox__back' => 'background-image:url({{URL}});',
 				]
		  ]
		);

		$repeater_->add_control(
		  'tp_flipbox_b_bg_color',
		  [
		    'label' => __( 'Back Side Background Color', 'fancy-elementor-flipbox' ),
				'default' => '#ee8cff',
		    'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__back' => 'background-color: {{VALUE}};',
				]
		  ]
		);
// end Background & Colors

// Title & Contents
		$repeater_->add_control(
			'more_options_3',
			[
				'label' => __( 'Title & Contents', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$repeater_->add_control(
            'title_tag',
            [
                'label' => __( 'Title HTML Tag', 'fancy-elementor-flipbox' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1'   => __( 'H1',   'fancy-elementor-flipbox' ),
                    'h2'   => __( 'H2',   'fancy-elementor-flipbox' ),
                    'h3'   => __( 'H3',   'fancy-elementor-flipbox' ),
                    'h4'   => __( 'H4',   'fancy-elementor-flipbox' ),
                    'h5'   => __( 'H5',   'fancy-elementor-flipbox' ),
                    'h6'   => __( 'H6',   'fancy-elementor-flipbox' ),
                    'div'  => __( 'div',  'fancy-elementor-flipbox' ),
                    'span' => __( 'Span', 'fancy-elementor-flipbox' ),
                ],
                'default' => 'div',
            ]
        );

		$repeater_->add_control(
            'content_tag',
            [
                'label' => __( 'Description HTML Tag', 'fancy-elementor-flipbox' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'div'  => __( 'div',  'fancy-elementor-flipbox' ),
                    'span' => __( 'Span', 'fancy-elementor-flipbox' ),
                    'p'    => __( 'P',    'fancy-elementor-flipbox' ),
                ],
                'default' => 'div',
            ]
        );

		$repeater_->add_control(
			'tp_flipbox_f_title',
			[
				'label' => __( 'Front Side Title', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
			 	],
				'default'     => __( 'We Are So Glad You Are Here', 'fancy-elementor-flipbox' ),
		 'placeholder' => __( 'Please enter the flipbox front title', 'fancy-elementor-flipbox' ),
			]
		);

		$repeater_->add_control(
			'tp_flipbox_f_desc',
			[
				'label' => __( 'Front Side Description', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::TEXTAREA,
				'default'     => __( 'Hover Me Please, to check the back side', 'fancy-elementor-flipbox' ),
				'dynamic' => [
					'active' => true,
			 	],
				'placeholder' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies sem lorem, non ullamcorper neque tincidunt id.', 'fancy-elementor-flipbox' ),
			]
		);

		// $repeater_->add_control(
		// 	'tp_flipbox_f_desc_padding',
		// 	[
		// 		'label' => __( 'Padding', 'fancy-elementor-flipbox' ),
		// 		'type' => Controls_Manager::DIMENSIONS,
		// 		'size_units' => [ 'px', '%', 'em' ],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .tp-flipbox__desc-front' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		// 		],
		// 	]
		// );				

		$repeater_->add_control(
		  'tp_flipbox_b_title',
		  [
		    'label' => __( 'Back Side Title', 'fancy-elementor-flipbox' ),
			'type' => Controls_Manager::TEXT,
			'dynamic' => [
				'active' => true,
			 ],
		    'default'     => __( 'Contact Us', 'fancy-elementor-flipbox' ),
		 'placeholder' => __( 'Please enter the flipbox front title', 'fancy-elementor-flipbox' ),
		  ]
		);

		$repeater_->add_control(
		  'tp_flipbox_b_desc',
		  [
		    'label' => __( 'Back Side Description', 'fancy-elementor-flipbox' ),
			'type' => Controls_Manager::TEXTAREA,
			'dynamic' => [
				'active' => true,
			 ],
		    'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies sem lorem, non ullamcorper neque tincidunt id.', 'fancy-elementor-flipbox' ),
		    'placeholder' => __( 'Please enter the flipbox back description', 'fancy-elementor-flipbox' ),
		  ]
		);			
// end Title & Contents

// Typography
		$repeater_->add_control(
			'more_options_4',
			[
				'label' => __( 'Typography', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$repeater_->add_group_control(			//Add group control to perform typography for button2.

			Group_Control_Typography::get_type(),
			[
				'name' => 'tp_flipbox_f_title_typo',
				'label' => __( 'Front Side Title Typography', 'fancy-elementor-flipbox' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .tp-flipbox__title-front',
			]
		);

		$repeater_->add_group_control(			//Add group control to perform typography for button2.

			Group_Control_Typography::get_type(),
			[
				'name' => 'tp_flipbox_f_desc_typo',
				'label' => __( 'Front Side Description Typography', 'fancy-elementor-flipbox' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .tp-flipbox__desc-front',
			]
		);

		$repeater_->add_group_control(			//Add group control to perform typography for button2.

			Group_Control_Typography::get_type(),
			[
				'name' => 'tp_flipbox_b_title_typo',
				'label' => __( 'Back Side Title Typography', 'fancy-elementor-flipbox' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .tp-flipbox__title-back',
			]
		);

		$repeater_->add_group_control(			//Add group control to perform typography for button2.

			Group_Control_Typography::get_type(),
			[
				'name' => 'tp_flipbox_b_desc_typo',
				'label' => __( 'Back Side Description Typography', 'fancy-elementor-flipbox' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .tp-flipbox__desc-back',
			]
		);		
// end Typography

// Texts Colors
		$repeater_->add_control(
			'more_options_5',
			[
				'label' => __( 'Texts Colors', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$repeater_->add_control(
			'tp_flipbox_f_title_color',
			[
				'label' => __( 'Front Side Title color', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__title-front ' => 'color: {{VALUE}};',
				]
			]
		);

		$repeater_->add_control(
			'tp_flipbox_f_desc_color',
			[
				'label' => __( 'Front Side Description color', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__desc-front ' => 'color: {{VALUE}};',
				]
			]
		);

		$repeater_->add_control(
			'tp_flipbox_b_title_color',
			[
				'label' => __( 'Back Side Title color', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__title-back ' => 'color: {{VALUE}};',
				]
			]
		);

		$repeater_->add_control(
			'tp_flipbox_b_desc_color',
			[
				'label' => __( 'Back Side Description color', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__desc-back ' => 'color: {{VALUE}};',
				]
			]
		);
// end Texts Colors

// Button Settings
		$repeater_->add_control(
			'more_options_6',
			[
				'label' => __( 'Button Settings', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$repeater_->add_control(
					'tp_flipbox_show_btn',
					[
						'label' => __( 'Show Button?', 'fancy-elementor-flipbox' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __( 'Show', 'fancy-elementor-flipbox' ),
						'label_off' => __( 'Hide', 'fancy-elementor-flipbox' ),
						'return_value' => 'yes',
						'default' => 'yes',
					]
		);

		$repeater_->add_control(
			'tp_flipbox_b_btn_text',
			  [
			    'label' => __( 'Button Text', 'fancy-elementor-flipbox' ),
			    'type' => Controls_Manager::TEXT,
			    'default'     => __( 'View All', 'fancy-elementor-flipbox' ),
				 'placeholder' => __( 'Please enter the flipbox button text', 'fancy-elementor-flipbox' ),
				 'condition' => [
 					'tp_flipbox_show_btn' => 'yes',
 				],
			  ]
		);

		$repeater_->add_control(
			'tp_flipbox_b_btn_text_back',
			  [
			     'label' => __( 'Button Text back', 'fancy-elementor-flipbox' ),
			     'type' => Controls_Manager::TEXT,
			     'default'     => __( 'View All', 'fancy-elementor-flipbox' ),
				 'placeholder' => __( 'Please enter the flipbox button text', 'fancy-elementor-flipbox' ),
				 'condition' => [
 					'tp_flipbox_show_btn' => 'yes',
 				],
			  ]
		);

		$repeater_->add_control(
		  'tp_flipbox_b_btn_url',
		  [
		     'label' => __( 'Button URL', 'fancy-elementor-flipbox' ),
		     'type' => Controls_Manager::URL,
		     'default' => [
		        'url' => 'http://',
		        'is_external' => '',
		     ],
		     'show_external' => true,
				 'condition' => [
 					'tp_flipbox_show_btn' => 'yes',
 				],
		  ]
		);

		$repeater_->add_control(
			'tp_flipbox_b_btn_bg_color',
			[
				'label' => __( 'Button Background Color', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f96161',
				'condition' => [
				 'tp_flipbox_show_btn' => 'yes',
			 ],
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__action a' => 'background-color: {{VALUE}};',
				]
			]
		);

		$repeater_->add_control(
			'tp_flipbox_b_btn_text_color',
			[
				'label' => __( 'Button Text Color', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'condition' => [
				 'tp_flipbox_show_btn' => 'yes',
			 ],
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__action a' => 'color: {{VALUE}};',
				]
			]
		);

		$repeater_->add_control(
			'tp_flipbox_b_btn_text_color_close',
			[
				'label' => __( 'Button Text Color (BACK)', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'condition' => [
				 'tp_flipbox_show_btn' => 'yes',
			 ],
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__action a.tp-flipbox__btn_close' => 'color: {{VALUE}};',
				]
			]
		);

		$repeater_->add_control(
			'tp_flipbox_b_btn_bg_color_hover',
			[
				'label' => __( 'Button Background Color On Hover', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fcb935',
				'condition' => [
				 'tp_flipbox_show_btn' => 'yes',
			 ],
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__action a:hover' => 'background-color: {{VALUE}} !important;',
				]
			]
		);

		$repeater_->add_control(
			'tp_flipbox_b_btn_text_color_hover',
			[
				'label' => __( 'Button Text Color On Hover', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f7f7f7',
				'condition' => [
				 'tp_flipbox_show_btn' => 'yes',
			 ],
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__action a:hover' => 'color: {{VALUE}};',
				]
			]
		);

		$repeater_->add_control(
			'tp_flipbox_b_btn_text_color_hover_back',
			[
				'label' => __( 'Button Text Color  On Hover (BACK)', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f7f7f7',
				'condition' => [
				 'tp_flipbox_show_btn' => 'yes',
			 ],
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__action a.tp-flipbox__btn_close:hover' => 'color: {{VALUE}};',
				]
			]
		);

		$repeater_->add_control(
			'tp_flipbox_b_btn_padding',
			[
				'label' => __( 'Button Padding', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__btn.tp-flipbox__btn_open' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
// end Button Settings



		$this->add_control(
			'list_items_',
			[
				'label' => __( 'Repeater List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater_->get_controls(),
				'default' => [
					[
						'slide_name' => __( 'Slider Name', 'plugin-domain' ),
					],
				],
				'title_field' => '{{{ slide_name }}}',
			]
		);

		$this->end_controls_section();


// old carousel
		$this->start_controls_section(
			'carousel_style', 
			[
				'label'        => esc_html__('Advanced Carousel', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'slide_name',
			[
				'label' => __( 'Slider Name', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Slider Name', 'uae'),
                'dynamic' => [
                    'active' => true,
                ],
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 		=> 	'border_radius',
				'label'      => esc_html__('Border Image Radius', 'uae'),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
					'{{WRAPPER}} .tm-slider .ultimate-slide-img img' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$repeater->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'full',
				'separator' => 'none',
			]
		);

		$repeater->add_control(
			'btn_link',
			[
				'label' => __('Link To', 'uae'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'uae'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);

		$repeater->add_control(
			'content',
			[
				'label' => esc_html__( 'Slider Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		$repeater->add_control(
			'desc_heading',
			[
				'label' => __('Button Section', 'uae'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$repeater->add_control(
			'btn_text',
			[
				'label' => __( 'Button Text', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'btnbg',
			[
				'label'      => esc_html__('Button Background', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#D30C5C',
			]
		);

		$repeater->add_control(
			'btn_link2',
			[
				'label' => __('Link To', 'uae'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'uae'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);

		$repeater->add_responsive_control(
			'btn_padding',
			[
				'label' => __( 'Padding', 'uae' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .tm-slider .ultimate_carousel_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$repeater->add_control(
			'alignment',
			[
				'label' => __( 'Button Alignment', 'uae' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'uae' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'uae' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'uae' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
			]
		);

		$repeater->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .tm-slider .ultimate_carousel_btn',
			]
		);

		$this->add_control(
			'list_items',
			[
				'label' => __( 'Repeater List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'slide_name' => __( 'Slider Name', 'plugin-domain' ),
					],
				],
				'title_field' => '{{{ slide_name }}}',
			]
		);

		$this->end_controls_section();





	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings_ = $this->get_settings_for_display();
		$some_id = rand(5, 500);
		ob_start(); 
		?>

		<!--====== HTML CODING START ========-->

		<section class="tm-slider slider <?php echo $settings_['class']; ?> <?php echo $settings_['theme']; ?>" id="tdt-slider-<?php echo $some_id ?>" data-mobiles="<?php echo $settings_['slide_visible_mbl'] ?>" data-tabs="<?php echo $settings_['tabs'] ?>" data-slick='{"arrows": <?php echo $settings_['arrow']; ?>, "autoplaySpeed": <?php echo $settings_['speed']; ?>, "dots": <?php echo $settings_['dot']; ?>, "autoplay": <?php echo $settings_['autoplay']; ?>, "infinite": <?php echo $settings_['infinite']; ?>, "adaptiveHeight": <?php echo $settings_['adaptiveheight']; ?>, "pauseOnHover": <?php echo $settings_['pauseonhover']; ?>, "slidesToShow": <?php echo $settings_['slide_visible']; ?>, "slidesToScroll": <?php echo $settings_['slide_scroll']; ?>, "fade": <?php echo $settings_['effect']; ?>}'>
			
			<?php foreach ($settings_['list_items_'] as $key => $settings) : 

				$tp_bg_img_front = $settings['tp_flipbox_f_bg_img'];
				$tp_bg_img_back = $settings['tp_flipbox_b_bg_img'];
				$tp_icon_front = $settings['tp_flipbox_f_icon'];
				$tp_icon_back = $settings['tp_flipbox_b_icon'];
				$tp_flipbox_show_btn = $settings['tp_flipbox_show_btn'];
				$tp_flipbox_f_bg_color = $settings['tp_flipbox_f_bg_color'];

				?>




				<div id="flip-demo-<?php echo $key;?>" class="tp-flipbox tp-flipbox--<?php echo $settings['tp_flipbox_type'];?>" onclick="">
				 	<div class="tp-flipbox__holder" >
				  		
				  		<div class="tp-flipbox__front" style=" background-color:<?php echo $tp_flipbox_f_bg_color;?>;background-image: url(<?php echo $tp_bg_img_front['url'];?>);">
				  			<div class="tp-flipbox__content">

				  				<div class="tp-flipbox__desc-front"><?php echo $settings['tp_flipbox_f_desc']; ?></div>

								<?php   				
								if ( $tp_flipbox_show_btn == "yes" ) { ?>
								   
								   <div class="tp-flipbox__action">
										<?php
											$btn_external = "";
											$btn_nofollow = "";
											if( $settings['tp_flipbox_b_btn_url']['is_external'] ) {
												$btn_external = ' target="_blank" ';
											}
											if( $settings['tp_flipbox_b_btn_url']['nofollow'] ) {
												$btn_nofollow = ' rel="nofollow" ';
											}
										?>

								  		<a <?php echo $btn_external; ?> <?php echo $btn_nofollow; ?> _href="<?php echo $settings['tp_flipbox_b_btn_url']['url'];?>" class="tp-flipbox__btn tp-flipbox__btn_open">
								  			<?php echo $settings['tp_flipbox_b_btn_text']; ?>
								  		</a>
								    </div>
								    <!-- end tp-flipbox__action -->

								<?php } ?>	

				  			</div> <!-- /tp-flipbox__content -->
				  		</div>
				  		<!-- end tp-flipbox__front -->

				  		<div class="tp-flipbox__back" style="background-image: url(<?php echo $tp_bg_img_back['url']; ?>);" >
							<div class="tp-flipbox__content">
								<div class="tp-flipbox__desc-back"><?php echo $settings['tp_flipbox_b_desc']; ?></div>
					
								<?php if( $tp_flipbox_show_btn == "yes") { ?>
								  
								    <div class="tp-flipbox__action">
									  	<?php 
											$btn_external = "";
											$btn_nofollow = "";
											if( $settings['tp_flipbox_b_btn_url']['is_external'] ) {
												$btn_external = ' target="_blank" ';
											}
											if( $settings['tp_flipbox_b_btn_url']['nofollow'] ) {
												$btn_nofollow = ' rel="nofollow" ';
											}
										?>

								  		<a <?php echo $btn_external; ?> <?php echo $btn_nofollow; ?> _href="<?php echo $settings['tp_flipbox_b_btn_url']['url']; ?>" class="tp-flipbox__btn tp-flipbox__btn_close">
								  			<?php echo $settings['tp_flipbox_b_btn_text_back']; ?> 
								  		</a>
								    </div>
								    <!-- end tp-flipbox__action -->

								<?php } ?>
				  			
				  			</div> <!-- /tp-flipbox__content -->
				  		</div>
				  		<!-- end tp-flipbox__back -->

				  	</div> <!-- /tp-flipbox__holder -->
				</div> <!-- /tp-flipbox -->

			<?php endforeach; ?>

		</section>


<!--
				//$target = $list_items['btn_link']['is_external'] ? ' target="_blank"' : ''; $target2 = $list_items['btn_link2']['is_external'] ? ' target="_blank"' : '';
				//$nofollow = $list_items['btn_link']['nofollow'] ? ' rel="nofollow"' : ''; $nofollow2 = $list_items['btn_link2']['nofollow'] ? ' rel="nofollow"' : ''; ?>
				  <div>
				  	<?php if ($list_items['btn_link']['url'] != '') { ?>
				  		<a href="<?php echo $list_items['btn_link']['url']; ?>" <?php echo $target.$nofollow; ?> class="">
					<?php } ?>
					<?php if ($list_items['btn_link']['url'] == NULL) { ?>
						<a>
					<?php } ?>
					<?php if ($list_items['image'] != '') { ?>
						<span class="ultimate-slide-img" style="max-width: 100%; border-radius: ; margin-bottom: 15px;">
					  		<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $list_items ); ?>
						</span>
					<?php } ?>	
						</a>
				  	<span class="content-section">
					  	<?php echo $list_items['content']; ?><br>

					  	<?php if ($list_items['btn_text'] != '') { ?>
						  	<span class="carousel_btn_span" style="text-align: <?php echo $list_items['alignment']; ?>;">
						  		<a href="<?php echo $list_items['btn_link2']['url']; ?>" <?php echo $target2.$nofollow2; ?> class="ultimate_carousel_btn" style="background-color: <?php echo $list_items['btnbg']; ?>; color: #fff; text-decoration: none;">
							  		<?php echo $list_items['btn_text']; ?>
							  	</a>
							</span>
					  	<?php } ?>
					  	<p>&nbsp;</p>
				  	</span>
				  </div> -->
			

		

		<style>
			#tdt-slider-<?php echo $some_id ?> .slick-prev {
				left: <?php echo $settings_['arrowposition']; ?>px !important;
			}
			#tdt-slider-<?php echo $some_id ?> .slick-next {
				right: <?php echo $settings_['arrowposition']; ?>px !important;
			}
			#tdt-slider-<?php echo $some_id ?>.content-over-slider .slick-slide .content-section {
				top: <?php echo $settings_['padding']; ?>%;
			}
			@media only screen and (max-width: 480px) {
				#tdt-slider-<?php echo $some_id ?>.content-over-slider .slick-slide .content-section {
					top: 35px !important;
				}
				#tdt-slider-<?php echo $some_id ?>.content-over-slider .ultimate-slide-img img{
					height: <?php echo $settings_['mbl_height']; ?>px !important;
					object-fit: cover;
				}
				#tdt-slider-<?php echo $some_id ?> .slick-prev, #tdt-slider-<?php echo $some_id ?> .slick-next {
					display: <?php echo $settings_['arrow_on_mbl'] ?> !important;
				}
			}
		</style>

		<?php
		echo ob_get_clean();

		/*========== HTML CODING END============*/

	}
}
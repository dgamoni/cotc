<?php
namespace FancyElementorFlipbox\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Fancy Flipbox
 *
 * Elementor widget for Elementor Fancy Flipbox.
 *
 * @since 1.0.0
 */
class Fancy_Elementor_Flipbox extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'fancy-elementor-flipbox';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Elementor Flipbox Custom', 'fancy-elementor-flipbox' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-flip-box';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general-elements' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'fancy-elementor-flipbox' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {


		$this->start_controls_section(
			'section_type',
			[
				'label' => __( 'FlipBox Type', 'fancy-elementor-flipbox' ),
			]
		);


		$this->add_control(
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

		$this->add_control(
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

		$this->add_control(
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

		$this->add_group_control(
			'box-shadow',
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .tp-flipbox__back, {{WRAPPER}} .tp-flipbox__front',
			]
		);

		$this->add_control(
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

		$this->add_group_control(
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

		$this->add_control(
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


		$this->add_control(
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


		$this->end_controls_section();






		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Background & Colors', 'fancy-elementor-flipbox' ),
			]
		);




		$this->add_control(
			'tp_flipbox_f_icon',
			[
				 'label' => __( 'Front Side Image Icon', 'fancy-elementor-flipbox' ),
				 'type' => Controls_Manager::MEDIA
			]
		);

		$this->add_control(
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

		$this->add_control(
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

		$this->add_control(
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

		$this->add_control(
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













		$this->add_control(
		  'tp_flipbox_b_icon',
		  [
		     'label' => __( 'Back Side Image Icon', 'fancy-elementor-flipbox' ),
		     'type' => Controls_Manager::MEDIA
		  ]
		);

		$this->add_control(
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

		$this->add_control(
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




		$this->end_controls_section();


		/*
		Title & Contents
		----------------------------------------------------------------------------
		*/
				$this->start_controls_section(
					'section_texts',
					[
						'label' => __( 'Title & Contents', 'fancy-elementor-flipbox' ),
					]
				);


				$this->add_control(
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


				$this->add_control(
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


				$this->add_control(
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

				$this->add_control(
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

				$this->add_control(
					'tp_flipbox_f_desc_padding',
					[
						'label' => __( 'Padding', 'fancy-elementor-flipbox' ),
						'type' => Controls_Manager::DIMENSIONS,
						'size_units' => [ 'px', '%', 'em' ],
						'selectors' => [
							'{{WRAPPER}} .tp-flipbox__desc-front' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
						],
					]
				);				

				$this->add_control(
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

				$this->add_control(
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


$this->end_controls_section();



/*
Typography tab
================================================================================
*/
		$this->start_controls_section(
			'section_typo',
			[
				'label' => __( 'Typography', 'fancy-elementor-flipbox' ),
			]
		);

		$this->add_group_control(			//Add group control to perform typography for button2.

			Group_Control_Typography::get_type(),
			[
				'name' => 'tp_flipbox_f_title_typo',
				'label' => __( 'Front Side Title Typography', 'fancy-elementor-flipbox' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .tp-flipbox__title-front',
			]
		);



		$this->add_group_control(			//Add group control to perform typography for button2.

			Group_Control_Typography::get_type(),
			[
				'name' => 'tp_flipbox_f_desc_typo',
				'label' => __( 'Front Side Description Typography', 'fancy-elementor-flipbox' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .tp-flipbox__desc-front',
			]
		);

		$this->add_group_control(			//Add group control to perform typography for button2.

			Group_Control_Typography::get_type(),
			[
				'name' => 'tp_flipbox_b_title_typo',
				'label' => __( 'Back Side Title Typography', 'fancy-elementor-flipbox' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .tp-flipbox__title-back',
			]
		);


		$this->add_group_control(			//Add group control to perform typography for button2.

			Group_Control_Typography::get_type(),
			[
				'name' => 'tp_flipbox_b_desc_typo',
				'label' => __( 'Back Side Description Typography', 'fancy-elementor-flipbox' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .tp-flipbox__desc-back',
			]
		);


$this->end_controls_section();

/*
color tab
================================================================================
*/
		$this->start_controls_section(
			'section_color',
			[
				'label' => __( 'Texts Colors', 'fancy-elementor-flipbox' ),
			]
		);

		$this->add_control(
			'tp_flipbox_f_title_color',
			[
				'label' => __( 'Front Side Title color', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__title-front ' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'tp_flipbox_f_desc_color',
			[
				'label' => __( 'Front Side Description color', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__desc-front ' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'tp_flipbox_b_title_color',
			[
				'label' => __( 'Back Side Title color', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__title-back ' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'tp_flipbox_b_desc_color',
			[
				'label' => __( 'Back Side Description color', 'fancy-elementor-flipbox' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tp-flipbox__desc-back ' => 'color: {{VALUE}};',
				]
			]
		);


			$this->end_controls_section();

			/*
			Button settings tab
			================================================================================
			*/

			$this->start_controls_section(
				'section_button',
				[
					'label' => __( 'Button Settings', 'fancy-elementor-flipbox' ),
				]
			);


			$this->add_control(
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


					$this->add_control(
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

					$this->add_control(
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

					$this->add_control(
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


			$this->add_control(
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


			$this->add_control(
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

			$this->add_control(
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


			$this->add_control(
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


			$this->add_control(
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

			$this->add_control(
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

				$this->add_control(
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

$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

$tp_bg_img_front = $settings['tp_flipbox_f_bg_img'];
$tp_bg_img_back = $settings['tp_flipbox_b_bg_img'];
$tp_icon_front = $settings['tp_flipbox_f_icon'];
$tp_icon_back = $settings['tp_flipbox_b_icon'];
$tp_flipbox_show_btn = $settings['tp_flipbox_show_btn'];
$tp_flipbox_f_bg_color = $settings['tp_flipbox_f_bg_color'];



		echo '<div id="flip-demo-0" class="tp-flipbox tp-flipbox--'.$settings['tp_flipbox_type'].'" onclick="">';
	  echo '    <div class="tp-flipbox__holder" >';
	  echo '        <div class="tp-flipbox__front" style=" background-color:'.$tp_flipbox_f_bg_color.';background-image: url('.$tp_bg_img_front['url'].');">';

	  echo '            <div class="tp-flipbox__content">';
	  // echo '                <div class="tp-flipbox__icon-front">';

	  // echo '                    <img src="'.$tp_icon_front["url"].'"/>';


	  // echo '                </div>';
	  //echo '                <' . esc_html($settings['title_tag']) . ' class="tp-flipbox__title-front">'.$settings['tp_flipbox_f_title'].'</' . esc_html($settings['title_tag']) . '>';
	  echo '                <' . esc_html($settings['content_tag']) . ' class="tp-flipbox__desc-front">'.$settings['tp_flipbox_f_desc'].'</' . esc_html($settings['content_tag']) . '>';
	if($tp_flipbox_show_btn == "yes"){
	  echo '               <div class="tp-flipbox__action">';
		$btn_external = "";
		$btn_nofollow = "";
		if( $settings['tp_flipbox_b_btn_url']['is_external'] ) {
			$btn_external = ' target="_blank" ';
		}

		if( $settings['tp_flipbox_b_btn_url']['nofollow'] ) {
			$btn_nofollow = ' rel="nofollow" ';
		}

	  echo '                    <a ' . $btn_external . ' ' . $btn_nofollow . ' href="'.$settings['tp_flipbox_b_btn_url']['url'].'" class="tp-flipbox__btn tp-flipbox__btn_open">'.$settings['tp_flipbox_b_btn_text'].'</a>';
	  echo '                   </div>';
	}	  
	  echo '            </div>';
	  echo '        </div>';
	  echo '        <div class="tp-flipbox__back" style="background-image: url('.$tp_bg_img_back['url'].');" >';

	  echo '            <div class="tp-flipbox__content">';
		// echo '                <div class="tp-flipbox__icon-back">';

	 //  echo '                    <img src="'.$tp_icon_back["url"].'"/>';


	 //  echo '                </div>';
	  //echo '                <' . esc_html($settings['title_tag']) . ' class="tp-flipbox__title-back">'.$settings['tp_flipbox_b_title'].'</' . esc_html($settings['title_tag']) . '>';
		echo '                <' . esc_html($settings['content_tag']) . ' class="tp-flipbox__desc-back">'.$settings['tp_flipbox_b_desc'].'</' . esc_html($settings['content_tag']) . '>';
	if($tp_flipbox_show_btn == "yes"){
	  echo '               <div class="tp-flipbox__action">';
		$btn_external = "";
		$btn_nofollow = "";
		if( $settings['tp_flipbox_b_btn_url']['is_external'] ) {
			$btn_external = ' target="_blank" ';
		}

		if( $settings['tp_flipbox_b_btn_url']['nofollow'] ) {
			$btn_nofollow = ' rel="nofollow" ';
		}

	  echo '                    <a ' . $btn_external . ' ' . $btn_nofollow . ' href="'.$settings['tp_flipbox_b_btn_url']['url'].'" class="tp-flipbox__btn tp-flipbox__btn_close">'.$settings['tp_flipbox_b_btn_text_back'].'</a>';
	  echo '                   </div>';
	}
	  echo '                </div>';
	  echo '            </div>';

	  echo '        </div>';
	  echo '    </div>';
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		?>
		<div class="title">
			{{{ settings.title }}}
		</div>


		<div id="flip-demo-0" class="tp-flipbox tp-flipbox--{{settings.tp_flipbox_type}}" onclick="">
	      <div class="tp-flipbox__holder" >
	          <div class="tp-flipbox__front">

	              <div class="tp-flipbox__content">
	                  <div class="tp-flipbox__icon-front">

	                      <img src="{{settings.tp_flipbox_f_icon.url}}"/>


	                  </div>
	                  <{{{ settings.title_tag }}} class="tp-flipbox__title-front">{{{ settings.tp_flipbox_f_title }}}</{{{ settings.title_tag }}}>
	                  <{{{ settings.content_tag }}} class="tp-flipbox__desc-front">{{{ settings.tp_flipbox_f_desc }}}</{{{ settings.content_tag }}}>
	              </div>
	          </div>
	          <div class="tp-flipbox__back" >

	              <div class="tp-flipbox__content">
									<div class="tp-flipbox__icon-back">
											<img src="{{settings.tp_flipbox_b_icon.url}}"/>
									</div>
	                  <{{{ settings.title_tag }}} class="tp-flipbox__title-back">{{{ settings.tp_flipbox_b_title }}}</{{{ settings.title_tag }}}>
										<{{{ settings.content_tag }}} class="tp-flipbox__desc-back">{{{ settings.tp_flipbox_b_desc }}}</{{{ settings.content_tag }}}>
<# if ( settings.tp_flipbox_show_btn == 'yes' ) { #>
	                 <div class="tp-flipbox__action">
	                      <a href="{{ settings.tp_flipbox_b_btn_url.url}}" class="tp-flipbox__btn">{{{ settings.tp_flipbox_b_btn_text }}}</a>
	                  </div>
										<# } #>
	              </div>
	          </div>
	      </div>
		<?php
	}
}

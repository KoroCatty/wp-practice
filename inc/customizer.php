<?php

// =================================================================
// COPYRIGHT SETTINGS
// =================================================================
//! WP Customize Manager Class 内に add_section などが入っている (DBの、wp_options tableの、theme_mods_udemy に保存される)
// 使いたい場所に(footerなど)に、 get_theme_mod('set_copyright', 'Copyright All Rights Reserved😤');を入れる
function wpdevs_customizer($wp_customize)
{
  // 1 Copyright Section 
  $wp_customize->add_section(
    'sec_copyright',
    array(
      'title' => __('Copyright Settings😤','wp-devs'),
      'description' => __('Copyright Settings', 'wp-devs'),    )
  );

  $wp_customize->add_setting(
    'set_copyright',
    array(
      'type' => 'theme_mod',
      'default' => 'Copyright X - ALL RIGHTS RESERVED',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'set_copyright',
    array(
      'label' => 'Copyright Information',
      'description' => 'Please, type your copyright here😝',
      'section' => 'sec_copyright',
      'type' => 'text',
    )
  );

  // =================================================================
  // Hero Section
  // =================================================================
  $wp_customize->add_section(
    'sec_hero',
    array(
      'title' => __('Hero Section😊', 'wp-devs')
    )
  );

  // Title 
  $wp_customize->add_setting(
    'set_hero_title',
    array(
      'type' => 'theme_mod',
      'default' => __('Please, add some title', 'wp-devs'),
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'set_hero_title',
    array(
      'label' => __('Hero Title', 'wp-devs'),
      'description' => __('Please, type your here title here', 'wp-devs'),
      'section' => 'sec_hero',
      'type' => 'text',
    )
  );

  // Sub Title
  $wp_customize->add_setting(
    'set_hero_subtitle',
    array(
      'type' => 'theme_mod',
      'default' => __('Please, add some subtitle', 'wp-devs'),
      'sanitize_callback' => 'sanitize_textarea_field', // 注意
    )
  );

  $wp_customize->add_control(
    'set_hero_subtitle',
    array(
      'label' => __('Hero Subtitle', 'wp-devs'),
      'description' => __('Please, type your subtitle here', 'wp-devs'),
      'section' => 'sec_hero',
      'type' => 'textarea',
    )
  );

  // Button Text
  $wp_customize->add_setting(
    'set_hero_button_text',
    array(
      'type' => 'theme_mod',
      'default' => __('Learn More', 'wp-devs'),
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'set_hero_button_text',
    array(
      'label' => __('Hero button text', 'wp-devs'),
      'description' => __('Please, type your hero button text here', 'wp-devs'),
      'section' => 'sec_hero',
      'type' => 'text',
    )
  );

  // Button URL
  $wp_customize->add_setting(
    'set_hero_button_url',
    array(
      'type' => 'theme_mod',
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    )
  );

  $wp_customize->add_control(
    'set_hero_button_url',
    array(
      'label' => __('Hero button link', 'wp-devs'),
      'description' => __('Please, type your hero button link here', 'wp-devs'),
      'section' => 'sec_hero',
      'type' => 'url',
    )
  );

  // Hero Height
  $wp_customize->add_setting(
    'set_hero_height',
    array(
      'type' => 'theme_mod',
      'default' => 800,
      'sanitize_callback' => 'absint', // absint は、整数に変換する関数 (absint(3.14) => 3
    )
  );

  $wp_customize->add_control(
    'set_hero_height',
    array(
      'label' => __('Hero height', 'wp-devs'),
      'description' => __('Please, type your hero height', 'wp-devs'),
      'section' => 'sec_hero',
      'type' => 'number',
    )
  );

  // Hero Background (IMG)
  $wp_customize->add_setting(
    'set_hero_background',
    array(
      'type' => 'theme_mod',
      'sanitize_callback' => 'absint'
    )
  );

  $wp_customize->add_control(new WP_Customize_Media_Control(
    $wp_customize,
    'set_hero_background',
    array(
      'label' => __('Hero Image', 'wp-devs'),
      'section'   => 'sec_hero',
      'mime_type' => 'image'
    )
  ));

  // =================================================================
  // Blog section
  // =================================================================
  $wp_customize->add_section(
    'sec_blog',
    array(
      'title' => 'Blog Section😎'
    )
  );

  // Posts per page
  $wp_customize->add_setting(
    'set_per_page',
    array(
      'type' => 'theme_mod',
      'sanitize_callback' => 'absint' // absint は、整数に変換する関数 (absint(3.14) => 3
    )
  );

  $wp_customize->add_control(
    'set_per_page',
    array(
      'label' => __('Posts per page', 'wp-devs'),
      'description' => __('How many items to display in the post list?', 'wp-devs'),
      'section' => 'sec_blog',
      'type' => 'number'
    )
  );

  // Post categories to include
  $wp_customize->add_setting(
    'set_category_include',
    array(
      'type' => 'theme_mod',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );

  $wp_customize->add_control(
    'set_category_include',
    array(
      'label' => __('Post categories to include', 'wp-devs'),
      'description' => __('Comma separated values or single category ID', 'wp-devs'),
      'section' => 'sec_blog',
      'type' => 'text' // textの理由は、複数のカテゴリーを入れるため
    )
  );

  // Post categories to exclude
  $wp_customize->add_setting(
    'set_category_exclude',
    array(
      'type' => 'theme_mod',
      'sanitize_callback' => 'sanitize_text_field'
    )
  );

  $wp_customize->add_control(
    'set_category_exclude',
    array(
      'label' => __('Post categories to exclude', 'wp-devs'),
      'description' => __('Comma separated values or single category ID', 'wp-devs'),
      'section' => 'sec_blog',
      'type' => 'text'
    )
  );
};

add_action('customize_register', 'wpdevs_customizer');

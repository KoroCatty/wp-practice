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
      'title' => 'Copyright Settings😤',
      'description' => 'Copyright Settings',
    )
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
      'title' => 'Hero Section😘',
    )
  );

  // Title 
  $wp_customize->add_setting(
    'set_hero_title',
    array(
      'type' => 'theme_mod',
      'default' => 'Plz add some title',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'set_hero_title',
    array(
      'label' => 'Hero Title',
      'description' => 'Plz type your here title ~',
      'section' => 'sec_hero',
      'type' => 'text',
    )
  );

  // Sub Title
  $wp_customize->add_setting(
    'set_hero_subtitle',
    array(
      'type' => 'theme_mod',
      'default' => 'Plz add some sub title',
      'sanitize_callback' => 'sanitize_textarea_field', // 注意
    )
  );

  $wp_customize->add_control(
    'set_hero_subtitle',
    array(
      'label' => 'Hero subTitle',
      'description' => 'Plz type your here subtitle ~',
      'section' => 'sec_hero',
      'type' => 'textarea',
    )
  );

  // Button Text
  $wp_customize->add_setting(
    'set_hero_button_text',
    array(
      'type' => 'theme_mod',
      'default' => 'Learn More',
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'set_hero_button_text',
    array(
      'label' => 'Hero button text',
      'description' => 'Plz type your BUTTON TEXT ~',
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
      'label' => 'Hero button URL',
      'description' => 'Plz type your BUTTON URL ~',
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
      'label' => 'Hero Height',
      'description' => 'Plz type your hero height ~',
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
      'label' => 'Hero Image',
      'section'   => 'sec_hero',
      'mime_type' => 'image'
    )
  ));
};

add_action('customize_register', 'wpdevs_customizer');

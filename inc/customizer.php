<?php

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
};

add_action('customize_register', 'wpdevs_customizer');

<?php
/*
 * hook_menu to load tpl files from theme folder
 * i.e sites/all/themes/custom/{current_theme_name}/templates/books
 * current_theme_name = fiction 
 */
function frames_theme() {
 $path_to_theme = drupal_get_path('theme', variable_get('theme_default', 'fiction'));
 $themes = array(); 
$themes['frames_list'] = array(
'template' => 'frames-list',
'path' => $path_to_theme . '/templates/frames/', 
);
    return $themes;
}
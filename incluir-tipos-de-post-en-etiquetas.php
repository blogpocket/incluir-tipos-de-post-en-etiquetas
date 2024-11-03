<?php
/*
Plugin Name: Incluir Tipos de Post en Etiquetas
Description: Permite seleccionar los tipos de post que se incluirán en los archivos de etiquetas.
Version: 1.1
Author: Tu Nombre
*/

// Agregar una página de configuración en el menú de administración
function itpe_agregar_pagina_configuracion() {
    add_options_page(
        'Incluir Tipos de Post en Etiquetas',
        'Tipos de Post en Etiquetas',
        'manage_options',
        'itpe-configuracion',
        'itpe_pagina_configuracion'
    );
}
add_action('admin_menu', 'itpe_agregar_pagina_configuracion');

// Renderizar la página de configuración
function itpe_pagina_configuracion() {
    ?>
    <div class="wrap">
        <h1>Incluir Tipos de Post en Etiquetas</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('itpe_opciones_grupo');
            do_settings_sections('itpe-configuracion');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Registrar los ajustes
function itpe_registrar_ajustes() {
    register_setting('itpe_opciones_grupo', 'itpe_post_types');

    add_settings_section(
        'itpe_seccion_principal',
        'Configuración',
        null,
        'itpe-configuracion'
    );

    add_settings_field(
        'itpe_campo_post_types',
        'Selecciona los tipos de post a incluir en los archivos de etiquetas:',
        'itpe_campo_post_types_callback',
        'itpe-configuracion',
        'itpe_seccion_principal'
    );
}
add_action('admin_init', 'itpe_registrar_ajustes');

// Callback para mostrar los tipos de post en la configuración
function itpe_campo_post_types_callback() {
    $post_types = get_post_types(array('public' => true), 'objects');
    $selected_post_types = get_option('itpe_post_types', array('post'));

    foreach ($post_types as $post_type) {
        // Excluir ciertos tipos de post
        if (in_array($post_type->name, array('attachment', 'revision', 'nav_menu_item'))) {
            continue;
        }
        $checked = in_array($post_type->name, $selected_post_types) ? 'checked' : '';
        echo '<label><input type="checkbox" name="itpe_post_types[]" value="' . esc_attr($post_type->name) . '" ' . $checked . '> ' . esc_html($post_type->labels->singular_name) . '</label><br>';
    }
}

// Modificar la consulta principal para incluir los tipos de post seleccionados
function itpe_incluir_post_types_en_etiquetas($query) {
    if ($query->is_main_query() && $query->is_tag() && !is_admin()) {
        $selected_post_types = get_option('itpe_post_types', array('post'));
        $query->set('post_type', $selected_post_types);
    }
}
add_action('pre_get_posts', 'itpe_incluir_post_types_en_etiquetas');

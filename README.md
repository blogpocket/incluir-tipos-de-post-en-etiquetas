# Incluir tipos de posts en archivos de etiquetas
Permite seleccionar los tipos de post que se incluirán en los archivos de etiquetas.
## Instalar el plugin: 
- Sube el archivo incluir-tipos-de-post-en-etiquetas.php a la carpeta wp-content/plugins/incluir-fedipost-en-etiquetas de tu instalación de WordPress mediante FTP o el método que prefieras.
## Activar el plugin
- Ve al panel de administración de WordPress, navega a Plugins y activa Incluir Tipos de Post en Etiquetas.
## Configurar el plugin
- En el panel de administración, ve a Ajustes > Tipos de Post en Etiquetas.
- Verás una lista de los tipos de post disponibles.
- Marca las casillas de los tipos de post que deseas incluir en los archivos de etiquetas.
- Haz clic en Guardar cambios.
## Cómo funciona el plugin
- Página de Configuración: El plugin añade una página de configuración en Ajustes > Tipos de Post en Etiquetas, donde puedes seleccionar los tipos de post que quieres incluir en los archivos de etiquetas.
- Almacenamiento de Ajustes: Los tipos de post seleccionados se almacenan en la base de datos usando la opción itpe_post_types.
- Modificación de la Consulta: La función itpe_incluir_post_types_en_etiquetas modifica la consulta principal de los archivos de etiquetas para incluir los tipos de post seleccionados en la configuración.
## Notas adicionales
- Tipos de Post Públicos: Solo se muestran y permiten seleccionar los tipos de post que son públicos.
- Compatibilidad: Asegúrate de que los tipos de post personalizados que deseas incluir están registrados y utilizan la taxonomía de etiquetas.


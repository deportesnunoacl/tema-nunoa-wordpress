<?php
/**
 * Template Name: Contacto Personalizado
 */

get_header();

// Detectar estado del envío desde query params
$mensaje_enviado = false;
$error = '';

if (isset($_GET['enviado'])) {
  if ($_GET['enviado'] === 'success') {
    $mensaje_enviado = true;
  } elseif ($_GET['enviado'] === 'error') {
    $error = 'Hubo un error al enviar tu mensaje. Por favor, intenta nuevamente.';
  } elseif ($_GET['enviado'] === 'invalid') {
    $error = 'Por favor completa todos los campos obligatorios correctamente.';
  }
}

// Procesar el formulario si se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_contacto'])) {
  
  // Verificar nonce
  if (!isset($_POST['contacto_nonce']) || !wp_verify_nonce($_POST['contacto_nonce'], 'enviar_contacto')) {
    wp_redirect(add_query_arg('enviado', 'error', get_permalink()));
    exit;
  }
  
  // Sanitizar datos
  $nombre = sanitize_text_field($_POST['nombre']);
  $email = sanitize_email($_POST['email']);
  $telefono = sanitize_text_field($_POST['telefono']);
  $asunto = sanitize_text_field($_POST['asunto']);
  $mensaje = sanitize_textarea_field($_POST['mensaje']);
  
  // Validar campos requeridos
  if (empty($nombre) || empty($email) || empty($mensaje)) {
    wp_redirect(add_query_arg('enviado', 'invalid', get_permalink()));
    exit;
  }
  
  if (!is_email($email)) {
    wp_redirect(add_query_arg('enviado', 'invalid', get_permalink()));
    exit;
  }
  
  // Preparar el email
  $para = 'contacto@deportes.nunoa.cl'; // ⚠️ CAMBIAR por tu email real
  $asunto_email = '[Contacto Web] ' . ($asunto ? $asunto : 'Consulta general');
  
  // Cuerpo del email en HTML
  $cuerpo = "
    <html>
    <head>
      <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; background: #f9f9f9; }
        .header { color: #3dae6a; border-bottom: 3px solid #3dae6a; padding-bottom: 10px; }
        .content { background: white; padding: 20px; border-radius: 8px; margin-top: 20px; }
        .field { margin-bottom: 15px; }
        .field strong { display: inline-block; width: 120px; }
        .message-box { background: #f5f5f5; padding: 15px; border-left: 4px solid #3dae6a; margin-top: 20px; }
        .footer { text-align: center; color: #999; font-size: 12px; margin-top: 20px; }
      </style>
    </head>
    <body>
      <div class='container'>
        <h2 class='header'>Nuevo mensaje desde el formulario de contacto</h2>
        
        <div class='content'>
          <div class='field'><strong>Nombre:</strong> {$nombre}</div>
          <div class='field'><strong>Email:</strong> <a href='mailto:{$email}'>{$email}</a></div>
          <div class='field'><strong>Teléfono:</strong> {$telefono}</div>
          <div class='field'><strong>Asunto:</strong> {$asunto}</div>
          
          <div class='message-box'>
            <strong>Mensaje:</strong>
            <p>{$mensaje}</p>
          </div>
        </div>
        
        <p class='footer'>Este mensaje fue enviado desde el sitio web de Ñuñoa Deportes</p>
      </div>
    </body>
    </html>
  ";
  
  // Headers
  $headers = array(
    'Content-Type: text/html; charset=UTF-8',
    'From: ' . get_bloginfo('name') . ' <noreply@' . $_SERVER['HTTP_HOST'] . '>',
    'Reply-To: ' . $nombre . ' <' . $email . '>'
  );
  
  // Enviar email
  $enviado = wp_mail($para, $asunto_email, $cuerpo, $headers);
  
  // Log para debug
  error_log('Intento de envío de email de contacto: ' . ($enviado ? 'ÉXITO' : 'FALLO'));
  
  // Redirigir según resultado
  if ($enviado) {
    wp_redirect(add_query_arg('enviado', 'success', get_permalink()));
  } else {
    wp_redirect(add_query_arg('enviado', 'error', get_permalink()));
  }
  exit;
}
?>

<div class="contacto-page">
  
  <!-- Hero Section -->
  <div class="contacto-hero py-10 bg-primary">
    <div class="container mx-auto px-4 py-16 text-center">
      <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 font-gabarito">
        Contáctanos
      </h1>
      <p class="text-white text-lg opacity-90 font-roboto">
        ¿Tienes alguna consulta? Completa el formulario y te responderemos a la brevedad.
      </p>
    </div>
  </div>
  
  <!-- Formulario -->
  <div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
      
      <!-- Mensajes de estado -->
      <?php if ($mensaje_enviado): ?>
        <div class="alert alert-success">
          <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <div>
            <strong>¡Mensaje enviado con éxito!</strong>
            <p>Gracias por contactarnos. Te responderemos pronto.</p>
          </div>
        </div>
      <?php endif; ?>
      
      <?php if (!empty($error)): ?>
        <div class="alert alert-error">
          <svg class="alert-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
          <div>
            <strong>Error</strong>
            <p><?php echo esc_html($error); ?></p>
          </div>
        </div>
      <?php endif; ?>
      
      <!-- Sección del formulario -->
      <div class="form-container">
        <div class="form-header bg-blueColor">
          Datos de Contacto
        </div>
        
        <form method="POST" action="" class="contacto-form">
          <?php wp_nonce_field('enviar_contacto', 'contacto_nonce'); ?>
          
          <div class="form-row">
            <!-- Nombre -->
            <div class="form-group">
              <label for="nombre">Nombre completo *</label>
              <input 
                type="text" 
                id="nombre" 
                name="nombre" 
                required
                placeholder="Tu nombre completo"
              >
            </div>
            
            <!-- Email -->
            <div class="form-group">
              <label for="email">Correo Electrónico *</label>
              <input 
                type="email" 
                id="email" 
                name="email" 
                required
                placeholder="tu@email.com"
              >
            </div>
          </div>
          
          <div class="form-row">
            <!-- Teléfono -->
            <div class="form-group">
              <label for="telefono">Teléfono</label>
              <input 
                type="tel" 
                id="telefono" 
                name="telefono"
                placeholder="+56 9 1234 5678"
              >
            </div>
            
            <!-- Asunto -->
            <div class="form-group">
              <label for="asunto">Asunto</label>
              <input 
                type="text" 
                id="asunto" 
                name="asunto"
                placeholder="Motivo de tu consulta"
              >
            </div>
          </div>
          
          <!-- Mensaje -->
          <div class="form-group">
            <label for="mensaje">Comentario/Mensaje *</label>
            <textarea 
              id="mensaje" 
              name="mensaje" 
              rows="6" 
              required
              placeholder="Escribe tu mensaje aquí..."
            ></textarea>
          </div>
          
          <!-- Botón de envío -->
          <div class="form-submit">
            <button type="submit" name="submit_contacto" class="btn-submit">
              Enviar
            </button>
          </div>
          
        </form>
      </div>
      
      <!-- Información de contacto -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
        
        <div class="info-card">
          <div class="info-icon">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
          </div>
          <h3>Ubicación</h3>
          <p>Av. Irarrázaval 2980<br>Ñuñoa, Santiago</p>
        </div>
        
        <div class="info-card">
          <div class="info-icon">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
          </div>
          <h3>Teléfono</h3>
          <p><a href="tel:+56223477000">+56 2 2347 7000</a></p>
        </div>
        
        <div class="info-card">
          <div class="info-icon">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
          </div>
          <h3>Email</h3>
          <p><a href="mailto:contacto@deportes.nunoa.cl">contacto@deportes.nunoa.cl</a></p>
        </div>
        
      </div>
      
    </div>
  </div>
  
</div>

<style>
/* ===================================
   Página de Contacto Personalizada
   =================================== */

/* Contenedor del formulario */
.form-container {
  background: #ffffff;
  border-radius: 16px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
  overflow: hidden;
  margin-bottom: 2rem;
}

/* Header del formulario */
.form-header {
  color: white;
  padding: 1.25rem 2rem;
  font-size: 1.125rem;
  font-weight: 700;
  letter-spacing: 0.025em;
}

/* Formulario */
.contacto-form {
  padding: 2rem;
}

/* Form rows */
.form-row {
  display: grid;
  grid-template-columns: 1fr;
  gap: 1.5rem;
  margin-bottom: 1.5rem;
}

@media (min-width: 768px) {
  .form-row {
    grid-template-columns: 1fr 1fr;
  }
}

/* Form groups */
.form-group {
  display: flex;
  flex-direction: column;
}

.form-group label {
  font-weight: 600;
  color: #374151;
  margin-bottom: 0.5rem;
  font-size: 0.95rem;
}

/* Inputs y textareas */
.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="tel"],
.form-group textarea {
  width: 100%;
  padding: 0.875rem 1rem;
  border: 2px solid #e5e7eb;
  border-radius: 8px;
  font-size: 1rem;
  transition: all 0.3s ease;
  background-color: #ffffff;
  color: #1f2937;
  font-family: inherit;
}

.form-group input:focus,
.form-group textarea:focus {
  outline: none;
  border-color: #5b7ef4;
  box-shadow: 0 0 0 3px rgba(91, 126, 244, 0.1);
}

.form-group textarea {
  resize: vertical;
  min-height: 150px;
}

/* Botón de envío */
.form-submit {
  margin-top: 1.5rem;
}

.btn-submit {
  background: #3dae6a;
  color: white;
  font-weight: 700;
  padding: 1rem 3rem;
  border: none;
  border-radius: 50px;
  font-size: 1rem;
  cursor: pointer;
  transition: all 0.3s ease;
  box-shadow: 0 4px 15px rgba(61, 174, 106, 0.3);
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.btn-submit:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(61, 174, 106, 0.4);
  background: #35995d;
}

.btn-submit:active {
  transform: translateY(0);
}

/* Alertas */
.alert {
  display: flex;
  align-items: flex-start;
  padding: 1.25rem 1.5rem;
  border-radius: 12px;
  margin-bottom: 1.5rem;
  gap: 1rem;
}

.alert-icon {
  width: 24px;
  height: 24px;
  flex-shrink: 0;
}

.alert strong {
  display: block;
  font-weight: 700;
  margin-bottom: 0.25rem;
}

.alert p {
  margin: 0;
  opacity: 0.9;
}

.alert-success {
  background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
  border: 2px solid #10b981;
  color: #065f46;
}

.alert-error {
  background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
  border: 2px solid #ef4444;
  color: #991b1b;
}

/* Tarjetas de información */
.info-card {
  background: white;
  padding: 2rem;
  border-radius: 16px;
  text-align: center;
  box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
  transition: all 0.3s ease;
}

.info-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.12);
}

.info-icon {
  width: 56px;
  height: 56px;
  margin: 0 auto 1rem;
  background: linear-gradient(135deg, #3dae6a 0%, #35995d 100%);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.info-icon svg {
  width: 28px;
  height: 28px;
  color: white;
}

.info-card h3 {
  font-size: 1.125rem;
  font-weight: 700;
  color: #1f2937;
  margin-bottom: 0.5rem;
}

.info-card p {
  color: #6b7280;
  margin: 0;
  line-height: 1.6;
}

.info-card a {
  color: #3dae6a;
  text-decoration: none;
  font-weight: 600;
  transition: color 0.3s ease;
}

.info-card a:hover {
  color: #35995d;
  text-decoration: underline;
}

/* Responsive */
@media (max-width: 768px) {
  .contacto-form {
    padding: 1.5rem;
  }
  
  .form-header {
    padding: 1rem 1.5rem;
  }
  
  .btn-submit {
    width: 100%;
    padding: 1rem 2rem;
  }
  
  .info-card {
    padding: 1.5rem;
  }
}
</style>

<?php get_footer(); ?>

<?php 
// Add admin menu page for Go Galapagos Dashboard
function gg_admin_dashboard(){
?>
<h1>Go Galapagos Dashboard</h1>
<?php 
      if( is_user_logged_in() ) {
          $user = wp_get_current_user();
          $role = ( array ) $user->roles;            
          echo '<pre>';
          print_r($role);
          echo '</pre>';
      } else {
          return false;
      }
      $usuariosVentas = get_role('pasantias');
      echo '<pre>';
      print_r($usuariosVentas);
      echo '</pre>';
} // FIN FUNCION ADMIN DASHBOARD
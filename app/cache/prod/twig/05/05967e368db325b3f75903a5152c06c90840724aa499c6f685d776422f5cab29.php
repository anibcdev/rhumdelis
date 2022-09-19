<?php

/* __string_template__41d42ef073c7e479ee37a18c280962837ffc85a042d0917802288261b9c753ac */
class __TwigTemplate_34e3ddeffeab37337589e1c924904752cbbc9041b537d4a7ccb7a077f5eaade9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'extra_stylesheets' => array($this, 'block_extra_stylesheets'),
            'content_header' => array($this, 'block_content_header'),
            'content' => array($this, 'block_content'),
            'content_footer' => array($this, 'block_content_footer'),
            'sidebar_right' => array($this, 'block_sidebar_right'),
            'javascripts' => array($this, 'block_javascripts'),
            'extra_javascripts' => array($this, 'block_extra_javascripts'),
            'translate_javascripts' => array($this, 'block_translate_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"fr\">
<head>
  <meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=0.75, maximum-scale=0.75, user-scalable=0\">
<meta name=\"apple-mobile-web-app-capable\" content=\"yes\">
<meta name=\"robots\" content=\"NOFOLLOW, NOINDEX\">

<link rel=\"icon\" type=\"image/x-icon\" href=\"/rhumdelis/img/favicon.ico\" />
<link rel=\"apple-touch-icon\" href=\"/rhumdelis/img/app_icon.png\" />

<title>Produits • RHUMAMINA</title>

  <script type=\"text/javascript\">
    var help_class_name = 'AdminProducts';
    var iso_user = 'fr';
    var full_language_code = 'fr';
    var full_cldr_language_code = 'fr-FR';
    var country_iso_code = 'FR';
    var _PS_VERSION_ = '1.7.2.2';
    var roundMode = 2;
    var youEditFieldFor = '';
        var new_order_msg = 'Une nouvelle commande a été passée sur votre boutique.';
    var order_number_msg = 'Numéro de commande : ';
    var total_msg = 'Total : ';
    var from_msg = 'Du ';
    var see_order_msg = 'Afficher cette commande';
    var new_customer_msg = 'Un nouveau client s\\\\\\'est inscrit sur votre boutique';
    var customer_name_msg = 'Nom du client : ';
    var new_msg = 'Un nouveau message a été posté sur votre boutique.';
    var see_msg = 'Lire le message';
    var token = 'ffe73c61f2412f7f0058c1fc5a55bc79';
    var token_admin_orders = 'bba9ec5c9138026d6cf5429b77218ae8';
    var token_admin_customers = '3c6197678840aa347189d4086abffe8f';
    var token_admin_customer_threads = '650f7a398cdd7e59571aa4ced367b794';
    var currentIndex = 'index.php?controller=AdminProducts';
    var employee_token = '403269a58f24e2d59eab5268d05c1a28';
    var choose_language_translate = 'Choisissez la langue';
    var default_language = '1';
    var admin_modules_link = '/rhumdelis/adminrhumdelis/index.php/module/catalog/recommended?route=admin_module_catalog_post&_token=FdwfJgGx7ptXozR-Zgnia_zRS-Lg89XKr5G00jGhtVc';
    var tab_modules_list = 'prestagiftvouchers,dmuassocprodcat,etranslation,apiway,prestashoptoquickbooks';
    var update_success_msg = 'Mise à jour réussie';
    var errorLogin = 'PrestaShop n\\\\\\'a pas pu se connecter à Addons. Veuillez vérifier vos identifiants et votre connexion Internet.';
    var search_product_msg = 'Rechercher un produit';
  </script>

      <link href=\"/rhumdelis/adminrhumdelis/themes/new-theme/public/theme.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/rhumdelis/js/jquery/plugins/chosen/jquery.chosen.css\" rel=\"stylesheet\" type=\"text/css\"/>
      <link href=\"/rhumdelis/adminrhumdelis/themes/default/css/vendor/nv.d3.css\" rel=\"stylesheet\" type=\"text/css\"/>
  
  <script type=\"text/javascript\">
var baseAdminDir = \"\\/rhumdelis\\/adminrhumdelis\\/\";
var baseDir = \"\\/rhumdelis\\/\";
var currency = {\"iso_code\":\"EUR\",\"sign\":\"\\u20ac\",\"name\":\"euro\",\"format\":\"#,##0.00\\u00a0\\u00a4\"};
var host_mode = false;
var show_new_customers = \"1\";
var show_new_messages = false;
var show_new_orders = \"1\";
</script>
<script type=\"text/javascript\" src=\"/rhumdelis/modules/ps_googleanalytics/views/js/GoogleAnalyticActionLib.js\"></script>
<script type=\"text/javascript\" src=\"/rhumdelis/adminrhumdelis/themes/new-theme/public/main.bundle.js\"></script>
<script type=\"text/javascript\" src=\"/rhumdelis/js/jquery/plugins/jquery.chosen.js\"></script>
<script type=\"text/javascript\" src=\"/rhumdelis/js/admin.js?v=1.7.2.2\"></script>
<script type=\"text/javascript\" src=\"/rhumdelis/js/cldr.js\"></script>
<script type=\"text/javascript\" src=\"/rhumdelis/js/tools.js?v=1.7.2.2\"></script>
<script type=\"text/javascript\" src=\"/rhumdelis/adminrhumdelis/public/bundle.js\"></script>
<script type=\"text/javascript\" src=\"/rhumdelis/js/vendor/d3.v3.min.js\"></script>
<script type=\"text/javascript\" src=\"/rhumdelis/adminrhumdelis/themes/default/js/vendor/nv.d3.min.js\"></script>


  
\t\t\t<script type=\"text/javascript\">
\t\t\t\t(window.gaDevIds=window.gaDevIds||[]).push('d6YPbH');
\t\t\t\t(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
\t\t\t\t(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
\t\t\t\tm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
\t\t\t\t})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
\t\t\t\tga('create', 'UA-56035815-14', 'auto');
\t\t\t\tga('require', 'ec');ga('set', 'nonInteraction', true);</script>

";
        // line 81
        $this->displayBlock('stylesheets', $context, $blocks);
        $this->displayBlock('extra_stylesheets', $context, $blocks);
        echo "</head>
<body class=\"adminproducts\">



<header>
  <nav class=\"main-header\">

    
    

    
    <i class=\"material-icons pull-left p-x-1 js-mobile-menu hidden-md-up\">menu</i>
    <a class=\"logo pull-left\" href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminDashboard&amp;token=dde3551614f53d2411c2476c73f33bea\"></a>

    <div class=\"component pull-left hidden-md-down\"><div class=\"ps-dropdown dropdown\">
  <span type=\"button\" id=\"quick-access\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
    <span class=\"selected-item\">Accès rapide</span> 
    <i class=\"material-icons arrow-down pull-right\">keyboard_arrow_down</i>
  </span>
  <div class=\"ps-dropdown-menu dropdown-menu\" aria-labelledby=\"quick-access\">
          <a class=\"dropdown-item\"
         href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminOrders&amp;token=bba9ec5c9138026d6cf5429b77218ae8\"
                 data-item=\"Commandes\"
      >Commandes</a>
          <a class=\"dropdown-item\"
         href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php/module/manage?token=e72a1e6bfd6cb2eff63d140c5da769a2\"
                 data-item=\"Modules installés\"
      >Modules installés</a>
          <a class=\"dropdown-item\"
         href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminCartRules&amp;addcart_rule&amp;token=2e43f5176cfb21fe975a118dd89b4e31\"
                 data-item=\"Nouveau bon de réduction\"
      >Nouveau bon de réduction</a>
          <a class=\"dropdown-item\"
         href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php/product/new?token=e72a1e6bfd6cb2eff63d140c5da769a2\"
                 data-item=\"Nouveau produit\"
      >Nouveau produit</a>
          <a class=\"dropdown-item\"
         href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminCategories&amp;addcategory&amp;token=a76eb546791aaa03d80dee60e2e5aeb2\"
                 data-item=\"Nouvelle catégorie\"
      >Nouvelle catégorie</a>
        <hr>
          <a
        class=\"dropdown-item js-quick-link\"
        data-rand=\"180\"
        data-icon=\"icon-AdminCatalog\"
        data-method=\"add\"
        data-url=\"index.php/product/catalog?-Zgnia_zRS-Lg89XKr5G00jGhtVc\"
        data-post-link=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminQuickAccesses&token=b19f737ea73c6fcb5ca8d7acd0d18ecb\"
        data-prompt-text=\"Veuillez nommer ce raccourci :\"
        data-link=\"Produits - Liste\"
      >
        <i class=\"material-icons\">add_circle_outline</i>
        Ajouter cette page à l'Accès Rapide
      </a>
        <a class=\"dropdown-item\" href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminQuickAccesses&token=b19f737ea73c6fcb5ca8d7acd0d18ecb\">
      <i class=\"material-icons\">settings</i>
      Gérer les accès rapides
    </a>
  </div>
</div>
</div>
    <div class=\"component hidden-md-down\">

<form id=\"header_search\"
      class=\"bo_search_form dropdown-form js-dropdown-form\"
      method=\"post\"
      action=\"/rhumdelis/adminrhumdelis/index.php?controller=AdminSearch&amp;token=d6eac53a38b4f1cda17aed8b0136f018\"
      role=\"search\">
  <input type=\"hidden\" name=\"bo_search_type\" id=\"bo_search_type\" class=\"js-search-type\" />
    <div class=\"input-group\">
    <input id=\"bo_query\" name=\"bo_query\" type=\"search\" class=\"form-control dropdown-form-search js-form-search\" value=\"\" placeholder=\"Rechercher (ex. : référence produit, nom du client, etc.)\" />
    <div class=\"input-group-addon\">
      <div class=\"dropdown\">
        <span class=\"dropdown-toggle js-dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\">
          Partout
        </span>
        <div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenu\">
          <ul class=\"items-list js-items-list\">
            <li class=\"search-all search-option active\">
              <a class=\"dropdown-item\" data-item=\"Partout\" href=\"#\" data-value=\"0\" data-placeholder=\"Que souhaitez-vous trouver ?\" data-icon=\"icon-search\">
              <i class=\"material-icons\">search</i> Partout</a>
            </li>
            <hr>
            <li class=\"search-book search-option\">
              <a class=\"dropdown-item\" data-item=\"Catalogue\" href=\"#\" data-value=\"1\" data-placeholder=\"Nom du produit, unité de gestion des stocks (SKU), référence...\" data-icon=\"icon-book\">
                <i class=\"material-icons\">library_books</i> Catalogue
              </a>
            </li>
            <li class=\"search-customers-name search-option\">
              <a class=\"dropdown-item\" data-item=\"Clients par nom\" href=\"#\" data-value=\"2\" data-placeholder=\"E-mail, nom...\" data-icon=\"icon-group\">
                <i class=\"material-icons\">group</i> Clients par nom
              </a>
            </li>
            <li class=\"search-customers-addresses search-option\">
              <a class=\"dropdown-item\" data-item=\"Clients par adresse IP\" href=\"#\" data-value=\"6\" data-placeholder=\"123.45.67.89\" data-icon=\"icon-desktop\">
                <i class=\"material-icons\">desktop_windows</i>Clients par adresse IP</a>
            </li>
            <li class=\"search-orders search-option\">
              <a class=\"dropdown-item\" data-item=\"Commandes\" href=\"#\" data-value=\"3\" data-placeholder=\"ID commande\" data-icon=\"icon-credit-card\">
                <i class=\"material-icons\">credit_card</i> Commandes
              </a>
            </li>
            <li class=\"search-invoices search-option\">
              <a class=\"dropdown-item\" data-item=\"Factures\" href=\"#\" data-value=\"4\" data-placeholder=\"Numéro de facture\" data-icon=\"icon-book\">
                <i class=\"material-icons\">book</i></i> Factures
              </a>
            </li>
            <li class=\"search-carts search-option\">
              <a class=\"dropdown-item\" data-item=\"Paniers\" href=\"#\" data-value=\"5\" data-placeholder=\"ID panier\" data-icon=\"icon-shopping-cart\">
                <i class=\"material-icons\">shopping_cart</i> Paniers
              </a>
            </li>
            <li class=\"search-modules search-option\">
              <a class=\"dropdown-item\" data-item=\"Modules\" href=\"#\" data-value=\"7\" data-placeholder=\"Nom du module\" data-icon=\"icon-puzzle-piece\">
                <i class=\"material-icons\">view_module</i> Modules
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class=\"input-group-addon search-bar\">
      <button type=\"submit\">RECHERCHE<i class=\"material-icons\">search</i></button>
    </div>
  </div>
</form>

<script type=\"text/javascript\">
 \$(document).ready(function(){
  });
</script>
</div>


    <div class=\"component pull-md-right -norightmargin hidden-md-down\"><div class=\"employee-dropdown dropdown\">
      <div class=\"img-circle person\" data-toggle=\"dropdown\">
      <i class=\"material-icons\">person</i>
    </div>
    <div class=\"dropdown-menu dropdown-menu-right p-a-1 m-r-2\">
    <div class=\"text-xs-center employee_avatar\">
      <img class=\"avatar img-circle\" src=\"https://profile.prestashop.com/dev%40bc-web-agence.com.jpg\" /><br>
      <span>Aurélie Nigaud</span>
    </div>
    <hr>
    <a class=\"employee-link profile-link\" href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminEmployees&amp;token=403269a58f24e2d59eab5268d05c1a28&amp;id_employee=9&amp;updateemployee\">
      <i class=\"material-icons\">settings_applications</i> Votre profil
    </a>
    <a class=\"employee-link m-t-1\" id=\"header_logout\" href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminLogin&amp;token=ae78063d6eff804268f6585917084364&amp;logout\">
      <i class=\"material-icons\">power_settings_new</i> Déconnexion
    </a>
  </div>
</div>
</div>
          <div class=\"component pull-xs-right\"><div id=\"notif\" class=\"notification-center dropdown\">
  <div class=\"notification js-notification dropdown-toggle\">
    <i class=\"material-icons\">notifications_none</i>
    <span id=\"notifications-total\" class=\"count hide\">0</span>
  </div>
  <div class=\"dropdown-menu dropdown-menu-right js-notifs_dropdown\">
    <div class=\"notifications\">
      <ul class=\"nav nav-tabs\" role=\"tablist\">
                          <li class=\"nav-item\">
            <a
              class=\"nav-link active\"
              id=\"orders-tab\"
              data-toggle=\"tab\"
              data-type=\"order\"
              href=\"#orders-notifications\"
              role=\"tab\"
            >
              Commandes<span id=\"_nb_new_orders_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"customers-tab\"
              data-toggle=\"tab\"
              data-type=\"customer\"
              href=\"#customers-notifications\"
              role=\"tab\"
            >
              Clients<span id=\"_nb_new_customers_\"></span>
            </a>
          </li>
                                    <li class=\"nav-item\">
            <a
              class=\"nav-link \"
              id=\"messages-tab\"
              data-toggle=\"tab\"
              data-type=\"customer_message\"
              href=\"#messages-notifications\"
              role=\"tab\"
            >
              Messages<span id=\"_nb_new_messages_\"></span>
            </a>
          </li>
                        </ul>

      <!-- Tab panes -->
      <div class=\"tab-content\">
                          <div class=\"tab-pane active empty\" id=\"orders-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Pas de nouvelle commande pour le moment :(<br>
              Et pourquoi pas lancer des promotions de saison ?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"customers-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Aucun nouveau client pour l'instant :(<br>
              Avez-vous fait une campagne d'acquisition par e-mail récemment ?
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                                    <div class=\"tab-pane  empty\" id=\"messages-notifications\" role=\"tabpanel\">
            <p class=\"no-notification\">
              Pas de nouveau message pour l'instant.<br>
              C'est du temps libéré pour autre chose !
            </p>
            <div class=\"notification-elements\"></div>
          </div>
                        </div>
    </div>
  </div>
</div>

  <script type=\"text/html\" id=\"order-notification-template\">
    <a class=\"notif\" href='order_url'>
      #_id_order_ -
      de <strong>_customer_name_</strong> (_iso_code_)_carrier_
      <strong class=\"pull-xs-right\">_total_paid_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"customer-notification-template\">
    <a class=\"notif\" href='customer_url'>
      #_id_customer_ - <strong>_customer_name_</strong>_company_ - enregistré le <strong>_date_add_</strong>
    </a>
  </script>

  <script type=\"text/html\" id=\"message-notification-template\">
    <a class=\"notif\" href='message_url'>
    <span class=\"message-notification-status _status_\">
      <i class=\"material-icons\">fiber_manual_record</i> _status_
    </span>
      - <strong>_customer_name_</strong> (_company_) - <i class=\"material-icons\">access_time</i> _date_add_
    </a>
  </script>
</div>
        <div class=\"component pull-md-right hidden-md-down\">  <div class=\"shop-list\">
    <a class=\"link\" href=\"http://bcwebdev1.bc-web-agence.com/rhumdelis/\" target= \"_blank\">RHUMAMINA</a>
  </div>
</div>
            

    

    
    
  </nav>
</header>

<nav class=\"nav-bar\">
  <ul class=\"main-menu\">

          
                
                
        
          <li class=\"link-levelone \" data-submenu=\"1\">
            <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminDashboard&amp;token=dde3551614f53d2411c2476c73f33bea\" class=\"link\" >
              <i class=\"material-icons\">trending_up</i> <span>Tableau de bord</span>
            </a>
          </li>

        
                
                                  
                
        
          <li class=\"category-title hidden-sm-down -active\" data-submenu=\"2\">
              <span class=\"title\">Vendre</span>
          </li>

                          
                
                                
                <li class=\"link-levelone \" data-submenu=\"3\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminOrders&amp;token=bba9ec5c9138026d6cf5429b77218ae8\" class=\"link\">
                    <i class=\"material-icons\">shopping_basket</i>
                    <span>
                    Commandes
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-3\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"4\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminOrders&amp;token=bba9ec5c9138026d6cf5429b77218ae8\" class=\"link\"> Commandes
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"5\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminInvoices&amp;token=083db84a0b19c8f9c26194c6ceebbd3b\" class=\"link\"> Factures
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"6\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminSlip&amp;token=9c415b0cc21c67e46933303961486231\" class=\"link\"> Avoirs
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"7\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminDeliverySlip&amp;token=fb547e8f713cd17682ab9d0674eeff8a\" class=\"link\"> Bons de livraison
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"8\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminCarts&amp;token=de28aba807d24e9cb46c9f701f01658d\" class=\"link\"> Paniers
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone -active\" data-submenu=\"9\">
                  <a href=\"/rhumdelis/adminrhumdelis/index.php/product/catalog?_token=FdwfJgGx7ptXozR-Zgnia_zRS-Lg89XKr5G00jGhtVc\" class=\"link\">
                    <i class=\"material-icons\">store</i>
                    <span>
                    Catalogue
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-9\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo -active\" data-submenu=\"10\">
                              <a href=\"/rhumdelis/adminrhumdelis/index.php/product/catalog?_token=FdwfJgGx7ptXozR-Zgnia_zRS-Lg89XKr5G00jGhtVc\" class=\"link\"> Produits
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"11\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminCategories&amp;token=a76eb546791aaa03d80dee60e2e5aeb2\" class=\"link\"> Catégories
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"12\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminTracking&amp;token=9dd3725eb61ae3f4d16ea9ddae5cc632\" class=\"link\"> Suivi
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"13\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminAttributesGroups&amp;token=85d74a1d7da04a790e2c8bf7af9861cd\" class=\"link\"> Attributs &amp; caractéristiques
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"16\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminManufacturers&amp;token=8f83e8ebd3544053fe23447e2ece59d1\" class=\"link\"> Marques et fournisseurs
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"19\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminAttachments&amp;token=eb9e4ccb5bb1371fcd7fcb719a374eb1\" class=\"link\"> Fichiers
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"20\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminCartRules&amp;token=2e43f5176cfb21fe975a118dd89b4e31\" class=\"link\"> Promotions
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"23\">
                              <a href=\"/rhumdelis/adminrhumdelis/index.php/stock/?_token=FdwfJgGx7ptXozR-Zgnia_zRS-Lg89XKr5G00jGhtVc\" class=\"link\"> Stocks
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"24\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminCustomers&amp;token=3c6197678840aa347189d4086abffe8f\" class=\"link\">
                    <i class=\"material-icons\">account_circle</i>
                    <span>
                    Clients
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-24\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"25\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminCustomers&amp;token=3c6197678840aa347189d4086abffe8f\" class=\"link\"> Clients
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"26\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminAddresses&amp;token=bde38a5f861c3f91e12541acbc4c03e5\" class=\"link\"> Adresses
                              </a>
                            </li>

                                                                                                                          </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"28\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminCustomerThreads&amp;token=650f7a398cdd7e59571aa4ced367b794\" class=\"link\">
                    <i class=\"material-icons\">chat</i>
                    <span>
                    SAV
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-28\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"29\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminCustomerThreads&amp;token=650f7a398cdd7e59571aa4ced367b794\" class=\"link\"> SAV
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"30\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminOrderMessage&amp;token=b61d4f4b371c824a78f0a881a40c9a77\" class=\"link\"> Messages prédéfinis
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"31\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminReturn&amp;token=98116e1203d92916f4bdf0c9ab4b2b62\" class=\"link\"> Retours produits
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"32\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminStats&amp;token=eb55eb778ce6863d4fdd12966ddc16be\" class=\"link\">
                    <i class=\"material-icons\">assessment</i>
                    <span>
                    Statistiques
                                        </span>

                  </a>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"144\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminMondialrelayLabelsGeneration&amp;token=7f56083b68a7a13a18f80fc99716a186\" class=\"link\">
                    <i class=\"material-icons\">local_shipping</i>
                    <span>
                    Mondial Relay
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-144\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"145\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminMondialrelayLabelsGeneration&amp;token=7f56083b68a7a13a18f80fc99716a186\" class=\"link\"> Générer des étiquettes
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"146\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminMondialrelayLabelsHistory&amp;token=6abcf31bb3bf8543239b81b3a8cefd50\" class=\"link\"> Historique des étiquettes
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"147\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminMondialrelayAccountSettings&amp;token=0544b488bdb9d779421bf8fef777c2ab\" class=\"link\"> Paramètres du compte
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"148\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminMondialrelayAdvancedSettings&amp;token=81c1cd6d4add44f5aa35b50e2e52b56c\" class=\"link\"> Paramètres avancés
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"149\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminMondialrelayCarriersSettings&amp;token=7f27f271d8f9d21fa04ac915159a55b0\" class=\"link\"> Paramètres des transporteurs
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"150\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminMondialrelayProcessLogger&amp;token=f681514abff8c3cbedceee5240fdf08c\" class=\"link\"> Logs d&#039;Activité
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"151\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminMondialrelayHelp&amp;token=03bd429a667c00db260b1e2735b6833b\" class=\"link\"> Aide
                              </a>
                            </li>

                                                                                                                                                                            </ul>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title hidden-sm-down \" data-submenu=\"42\">
              <span class=\"title\">Personnaliser</span>
          </li>

                          
                
                                
                <li class=\"link-levelone \" data-submenu=\"43\">
                  <a href=\"/rhumdelis/adminrhumdelis/index.php/module/catalog?_token=FdwfJgGx7ptXozR-Zgnia_zRS-Lg89XKr5G00jGhtVc\" class=\"link\">
                    <i class=\"material-icons\">extension</i>
                    <span>
                    Modules
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-43\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"44\">
                              <a href=\"/rhumdelis/adminrhumdelis/index.php/module/catalog?_token=FdwfJgGx7ptXozR-Zgnia_zRS-Lg89XKr5G00jGhtVc\" class=\"link\"> Modules et services
                              </a>
                            </li>

                                                                                                                              
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"46\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminAddonsCatalog&amp;token=4502c3dcf4ee319dcd586ee9d75c647a\" class=\"link\"> Catalogue de modules
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"47\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminThemes&amp;token=8d5b3c69d238e70bb96e1c13cd1bb815\" class=\"link\">
                    <i class=\"material-icons\">desktop_mac</i>
                    <span>
                    Apparence
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-47\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"48\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminThemes&amp;token=8d5b3c69d238e70bb96e1c13cd1bb815\" class=\"link\"> Thème et logo
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"49\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminThemesCatalog&amp;token=5908b83cad33b244abd039317f6e7a5e\" class=\"link\"> Catalogue de thèmes
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"50\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminCmsContent&amp;token=14fa90ef04d0321e4b5f083c9ad68993\" class=\"link\"> Pages vues
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"51\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminModulesPositions&amp;token=35bcbe33533951dcfc7720568f482b47\" class=\"link\"> Positions
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"52\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminImages&amp;token=478cf6e918a3fdd4ae6cfba84bce5375\" class=\"link\"> Images
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"117\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminLinkWidget&amp;token=54efd6c640668554233f41dc437bd8b2\" class=\"link\"> Link Widget
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"53\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminCarriers&amp;token=cdb7b40929b7830908cc9fdff76a2658\" class=\"link\">
                    <i class=\"material-icons\">local_shipping</i>
                    <span>
                    Livraison
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-53\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"54\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminCarriers&amp;token=cdb7b40929b7830908cc9fdff76a2658\" class=\"link\"> Transporteurs
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"55\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminShipping&amp;token=e1ba11246c8fc2e60c51ff97bce69220\" class=\"link\"> Préférences
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"56\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminPayment&amp;token=f5c7b8918321b1b3e53cb1727231bc61\" class=\"link\">
                    <i class=\"material-icons\">payment</i>
                    <span>
                    Paiement
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-56\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"57\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminPayment&amp;token=f5c7b8918321b1b3e53cb1727231bc61\" class=\"link\"> Modes de paiement
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"58\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminPaymentPreferences&amp;token=1b84fa5237866be91f4ccda80d2600bc\" class=\"link\"> Préférences
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"59\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminLocalization&amp;token=73891538f3c7210a9ac7cbfbd32d789e\" class=\"link\">
                    <i class=\"material-icons\">language</i>
                    <span>
                    International
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-59\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"60\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminLocalization&amp;token=73891538f3c7210a9ac7cbfbd32d789e\" class=\"link\"> Localisation
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"65\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminCountries&amp;token=80890780973c08b40792353b901e3c02\" class=\"link\"> Zones géographiques
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"69\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminTaxes&amp;token=b281e9b2383c8bd3357eb39b68b3a36d\" class=\"link\"> Taxes
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"72\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminTranslations&amp;token=cf441d1bb95d7e0c926300ee88710b1e\" class=\"link\"> Traductions
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title hidden-sm-down \" data-submenu=\"73\">
              <span class=\"title\">Configurer</span>
          </li>

                          
                
                                
                <li class=\"link-levelone \" data-submenu=\"74\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminPreferences&amp;token=baa6c38c9f3f95315fdda1cb8bff2282\" class=\"link\">
                    <i class=\"material-icons\">settings</i>
                    <span>
                    Paramètres de la boutique
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-74\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"75\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminPreferences&amp;token=baa6c38c9f3f95315fdda1cb8bff2282\" class=\"link\"> Paramètres généraux
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"78\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminOrderPreferences&amp;token=de70ea2fcec3b406f94c10c093dc1daa\" class=\"link\"> Commandes
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"81\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminPPreferences&amp;token=e569510b5578f87b2da753352e6913ab\" class=\"link\"> Produits
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"82\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminCustomerPreferences&amp;token=ce928dca405cfa8cfe99ac4bbe34f16a\" class=\"link\"> Clients
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"86\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminContacts&amp;token=2ac3408c567f4e42bc6054826cefb145\" class=\"link\"> Contact
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"89\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminMeta&amp;token=b9e340e4fc96a13609c1cbb5946efcf9\" class=\"link\"> Trafic et SEO
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"93\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminSearchConf&amp;token=d4df2cc27306352678dca8fdcbc86fd8\" class=\"link\"> Rechercher
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"119\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminGamification&amp;token=51651b58231a202f16f69ae148ff720e\" class=\"link\"> Merchant Expertise
                              </a>
                            </li>

                                                                        </ul>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"96\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminInformation&amp;token=6cc784d6aa7fd6ac31d5dfd5f04fc081\" class=\"link\">
                    <i class=\"material-icons\">settings_applications</i>
                    <span>
                    Paramètres avancés
                                          <i class=\"material-icons pull-right hidden-md-up\">keyboard_arrow_down</i>
                                        </span>

                  </a>
                                          <ul id=\"collapse-96\" class=\"submenu panel-collapse\">
                                                  
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"97\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminInformation&amp;token=6cc784d6aa7fd6ac31d5dfd5f04fc081\" class=\"link\"> Informations
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"98\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminPerformance&amp;token=ecc1f3af6a8e389842a5b6345c57dc51\" class=\"link\"> Performances
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"99\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminAdminPreferences&amp;token=f1cc207aba975da61158c7fb52c5e050\" class=\"link\"> Administration
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"100\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminEmails&amp;token=4682d11c8260a3ee1db3051a8e258136\" class=\"link\"> Email
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"101\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminImport&amp;token=720a595ff2664e79ffe99247becc31ef\" class=\"link\"> Importer
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"102\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminEmployees&amp;token=403269a58f24e2d59eab5268d05c1a28\" class=\"link\"> Équipe
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"106\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminRequestSql&amp;token=6756d9def9fcdf19e11fb5bd66afd5e9\" class=\"link\"> Base de données
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"109\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminLogs&amp;token=8c46235807f602937abc6f5028ae605d\" class=\"link\"> Logs
                              </a>
                            </li>

                                                                            
                            
                                                        
                            <li class=\"link-leveltwo \" data-submenu=\"110\">
                              <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminWebservice&amp;token=9b5aa2dee46eb26fb2961b69c5716824\" class=\"link\"> Webservice
                              </a>
                            </li>

                                                                                                                                                                            </ul>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title hidden-sm-down \" data-submenu=\"114\">
              <span class=\"title\">Détails</span>
          </li>

                          
                
                                
                <li class=\"link-levelone \" data-submenu=\"143\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminSelfUpgrade&amp;token=2bc50baab3ca8bb89ffb924036173d92\" class=\"link\">
                    <i class=\"material-icons\"></i>
                    <span>
                    1-Click Upgrade
                                        </span>

                  </a>
                                    </li>
                          
        
                
                                  
                
        
          <li class=\"category-title hidden-sm-down \" data-submenu=\"122\">
              <span class=\"title\">Form Builder Pro</span>
          </li>

                          
                
                                
                <li class=\"link-levelone \" data-submenu=\"123\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminGformconfig&amp;token=f70f97e1ffdedf0a8df16916a7c75f91\" class=\"link\">
                    <i class=\"material-icons\"></i>
                    <span>
                    General Settings
                                        </span>

                  </a>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"124\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminGformmanager&amp;token=461679976ed55d466ae322f4d6559112\" class=\"link\">
                    <i class=\"material-icons\"></i>
                    <span>
                    Form
                                        </span>

                  </a>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"125\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminGformrequest&amp;token=3e4877bf28985f7437a1b6b196f74fa9\" class=\"link\">
                    <i class=\"material-icons\"></i>
                    <span>
                    Received Data
                                        </span>

                  </a>
                                    </li>
                                        
                
                                
                <li class=\"link-levelone \" data-submenu=\"126\">
                  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminGformrequestexport&amp;token=d9bdc001169a1d47d8bbf13e674fc29d\" class=\"link\">
                    <i class=\"material-icons\"></i>
                    <span>
                    CSV Export
                                        </span>

                  </a>
                                    </li>
                          
        
            </ul>

  <span class=\"menu-collapse hidden-md-down\">
    <i class=\"material-icons\">&#xE8EE;</i>
  </span>

  
</nav>


<div id=\"main-div\">

  
    
<div class=\"header-toolbar\">

  
    <ol class=\"breadcrumb\">

              <li>
                      <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminCatalog&amp;token=730cf1b5d2f46dc98fcac0784843185d\">Catalogue</a>
                  </li>
      
              <li>
                      <a href=\"/rhumdelis/adminrhumdelis/index.php/product/catalog?_token=FdwfJgGx7ptXozR-Zgnia_zRS-Lg89XKr5G00jGhtVc\">Produits</a>
                  </li>
      
    </ol>
  

  
    <h2 class=\"title\">
      Produits    </h2>
  

  
    <div class=\"toolbar-icons\">
                                  
        <a
          class=\"toolbar-button toolbar_btn\"
          id=\"page-header-desc-configuration-modules-list\"
          href=\"/rhumdelis/adminrhumdelis/index.php/module/catalog?_token=FdwfJgGx7ptXozR-Zgnia_zRS-Lg89XKr5G00jGhtVc\"          title=\"Modules et services recommandés\"
                  >
                      <i class=\"material-icons\">extension</i>
                    <span class=\"title\">Modules et services recommandés</span>
        </a>
            
                  <a class=\"toolbar-button\" href=\"http://help.prestashop.com/fr/doc/AdminProducts?version=1.7.2.2&amp;country=fr\" title=\"Aide\">
            <i class=\"material-icons\">help</i>
            <span class=\"title\">Aide</span>
          </a>
                  </div>
  
    
</div>
    <div class=\"modal fade\" id=\"modal_addons_connect\" tabindex=\"-1\">
\t<div class=\"modal-dialog modal-md\">
\t\t<div class=\"modal-content\">
\t\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
\t\t\t\t<h4 class=\"modal-title\"><i class=\"icon-puzzle-piece\"></i> <a target=\"_blank\" href=\"http://addons.prestashop.com/?utm_source=back-office&utm_medium=modules&utm_campaign=back-office-FR&utm_content=download\">PrestaShop Addons</a></h4>
\t\t\t</div>
\t\t\t
\t\t\t
<div class=\"modal-body\">
\t\t\t\t\t\t<!--start addons login-->
\t\t\t<form id=\"addons_login_form\" method=\"post\" >
\t\t\t\t<div>
\t\t\t\t\t<a href=\"https://addons.prestashop.com/fr/login?email=dev%40bc-web-agence.com&amp;firstname=Aur%C3%A9lie&amp;lastname=Nigaud&amp;website=http%3A%2F%2Fbcwebdev1.bc-web-agence.com%2Frhumdelis%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-FR&amp;utm_content=download#createnow\"><img class=\"img-responsive center-block\" src=\"/rhumdelis/adminrhumdelis/themes/default/img/prestashop-addons-logo.png\" alt=\"Logo PrestaShop Addons\"/></a>
\t\t\t\t\t<h3 class=\"text-center\">Connectez-vous à la place de marché de PrestaShop afin d'importer automatiquement tous vos achats.</h3>
\t\t\t\t\t<hr />
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Vous n'avez pas de compte ?</h4>
\t\t\t\t\t\t<p class='text-justify'>Les clés pour réussir votre boutique sont sur PrestaShop Addons ! Découvrez sur la place de marché officielle de PrestaShop plus de 3 500 modules et thèmes pour augmenter votre trafic, optimiser vos conversions, fidéliser vos clients et vous faciliter l’e-commerce.</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Connectez-vous à PrestaShop Addons</h4>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><i class=\"icon-user\"></i></span>
\t\t\t\t\t\t\t\t<input id=\"username_addons\" name=\"username_addons\" type=\"text\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><i class=\"icon-key\"></i></span>
\t\t\t\t\t\t\t\t<input id=\"password_addons\" name=\"password_addons\" type=\"password\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a class=\"btn btn-link pull-right _blank\" href=\"//addons.prestashop.com/fr/forgot-your-password\">Mot de passe oublié</a>
\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row row-padding-top\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<a class=\"btn btn-default btn-block btn-lg _blank\" href=\"https://addons.prestashop.com/fr/login?email=dev%40bc-web-agence.com&amp;firstname=Aur%C3%A9lie&amp;lastname=Nigaud&amp;website=http%3A%2F%2Fbcwebdev1.bc-web-agence.com%2Frhumdelis%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-FR&amp;utm_content=download#createnow\">
\t\t\t\t\t\t\t\tCréer un compte
\t\t\t\t\t\t\t\t<i class=\"icon-external-link\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<button id=\"addons_login_button\" class=\"btn btn-primary btn-block btn-lg\" type=\"submit\">
\t\t\t\t\t\t\t\t<i class=\"icon-unlock\"></i> Connexion
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div id=\"addons_loading\" class=\"help-block\"></div>

\t\t\t</form>
\t\t\t<!--end addons login-->
\t\t\t</div>


\t\t\t\t\t</div>
\t</div>
</div>

    <div class=\"content-div \">

      

      

      

      
      
      
      

      <div class=\"row \">
        <div class=\"col-xs-12\">
          <div id=\"ajax_confirmation\" class=\"alert alert-success\" style=\"display: none;\"></div>




  ";
        // line 1270
        $this->displayBlock('content_header', $context, $blocks);
        // line 1271
        echo "                 ";
        $this->displayBlock('content', $context, $blocks);
        // line 1272
        echo "                 ";
        $this->displayBlock('content_footer', $context, $blocks);
        // line 1273
        echo "                 ";
        $this->displayBlock('sidebar_right', $context, $blocks);
        // line 1274
        echo "
        </div>
      </div>

    </div>

  
</div>

<div id=\"non-responsive\" class=\"js-non-responsive\">
  <h1>Oh non !</h1>
  <p class=\"m-t-3\">
    La version mobile de cette page n'est pas encore disponible.
  </p>
  <p class=\"m-t-2\">
    En attendant que cette page soit adaptée au mobile, vous êtes invité à la consulter sur ordinateur.
  </p>
  <p class=\"m-t-2\">
    Merci.
  </p>
  <a href=\"https://bcwebdev1.bc-web-agence.com/rhumdelis/adminrhumdelis/index.php?controller=AdminDashboard&amp;token=dde3551614f53d2411c2476c73f33bea\" class=\"btn btn-primary p-y-1 m-t-3\">
    <i class=\"material-icons\">arrow_back</i>
    Précédent
  </a>
</div>
<div class=\"mobile-layer\"></div>



  <div id=\"footer\" class=\"bootstrap hide\">
<!--
  <div class=\"col-sm-2 hidden-xs\">
    <a href=\"http://www.prestashop.com/\" class=\"_blank\">PrestaShop&trade;</a>
    -
    <span id=\"footer-load-time\"><i class=\"icon-time\" title=\"Temps de chargement : \"></i> 0.660s</span>
  </div>

  <div class=\"col-sm-2 hidden-xs\">
    <div class=\"social-networks\">
      <a class=\"link-social link-twitter _blank\" href=\"https://twitter.com/PrestaShop\" title=\"Twitter\">
        <i class=\"icon-twitter\"></i>
      </a>
      <a class=\"link-social link-facebook _blank\" href=\"https://www.facebook.com/prestashop\" title=\"Facebook\">
        <i class=\"icon-facebook\"></i>
      </a>
      <a class=\"link-social link-github _blank\" href=\"https://www.prestashop.com/github\" title=\"Github\">
        <i class=\"icon-github\"></i>
      </a>
      <a class=\"link-social link-google _blank\" href=\"https://plus.google.com/+prestashop/\" title=\"Google\">
        <i class=\"icon-google-plus\"></i>
      </a>
    </div>
  </div>
  <div class=\"col-sm-5\">
    <div class=\"footer-contact\">
      <a href=\"http://www.prestashop.com/en/contact_us?utm_source=back-office&amp;utm_medium=footer&amp;utm_campaign=back-office-FR&amp;utm_content=download\" class=\"footer_link _blank\">
        <i class=\"icon-envelope\"></i>
        Contact
      </a>
      /&nbsp;
      <a href=\"http://forge.prestashop.com/?utm_source=back-office&amp;utm_medium=footer&amp;utm_campaign=back-office-FR&amp;utm_content=download\" class=\"footer_link _blank\">
        <i class=\"icon-bug\"></i>
        Bug Tracker
      </a>
      /&nbsp;
      <a href=\"http://www.prestashop.com/forums/?utm_source=back-office&amp;utm_medium=footer&amp;utm_campaign=back-office-FR&amp;utm_content=download\" class=\"footer_link _blank\">
        <i class=\"icon-comments\"></i>
        Forum
      </a>
      /&nbsp;
      <a href=\"http://addons.prestashop.com/?utm_source=back-office&amp;utm_medium=footer&amp;utm_campaign=back-office-FR&amp;utm_content=download\" class=\"footer_link _blank\">
        <i class=\"icon-puzzle-piece\"></i>
        Addons
      </a>
      /&nbsp;
      <a href=\"http://www.prestashop.com/en/training-prestashop?utm_source=back-office&amp;utm_medium=footer&amp;utm_campaign=back-office-FR&amp;utm_content=download\" class=\"footer_link _blank\">
        <i class=\"icon-book\"></i>
        Formation
      </a>
                    <p>Questions • Renseignements • Formations :
          <strong>+33 (0)1.40.18.30.04</strong>
        </p>
          </div>
  </div>

  <div class=\"col-sm-3\">
    
  </div>

  <div id=\"go-top\" class=\"hide\"><i class=\"icon-arrow-up\"></i></div>
  -->
</div>



  <div class=\"bootstrap\">
    <div class=\"modal fade\" id=\"modal_addons_connect\" tabindex=\"-1\">
\t<div class=\"modal-dialog modal-md\">
\t\t<div class=\"modal-content\">
\t\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
\t\t\t\t<h4 class=\"modal-title\"><i class=\"icon-puzzle-piece\"></i> <a target=\"_blank\" href=\"http://addons.prestashop.com/?utm_source=back-office&utm_medium=modules&utm_campaign=back-office-FR&utm_content=download\">PrestaShop Addons</a></h4>
\t\t\t</div>
\t\t\t
\t\t\t
<div class=\"modal-body\">
\t\t\t\t\t\t<!--start addons login-->
\t\t\t<form id=\"addons_login_form\" method=\"post\" >
\t\t\t\t<div>
\t\t\t\t\t<a href=\"https://addons.prestashop.com/fr/login?email=dev%40bc-web-agence.com&amp;firstname=Aur%C3%A9lie&amp;lastname=Nigaud&amp;website=http%3A%2F%2Fbcwebdev1.bc-web-agence.com%2Frhumdelis%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-FR&amp;utm_content=download#createnow\"><img class=\"img-responsive center-block\" src=\"/rhumdelis/adminrhumdelis/themes/default/img/prestashop-addons-logo.png\" alt=\"Logo PrestaShop Addons\"/></a>
\t\t\t\t\t<h3 class=\"text-center\">Connectez-vous à la place de marché de PrestaShop afin d'importer automatiquement tous vos achats.</h3>
\t\t\t\t\t<hr />
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Vous n'avez pas de compte ?</h4>
\t\t\t\t\t\t<p class='text-justify'>Les clés pour réussir votre boutique sont sur PrestaShop Addons ! Découvrez sur la place de marché officielle de PrestaShop plus de 3 500 modules et thèmes pour augmenter votre trafic, optimiser vos conversions, fidéliser vos clients et vous faciliter l’e-commerce.</p>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<h4>Connectez-vous à PrestaShop Addons</h4>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><i class=\"icon-user\"></i></span>
\t\t\t\t\t\t\t\t<input id=\"username_addons\" name=\"username_addons\" type=\"text\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t<span class=\"input-group-addon\"><i class=\"icon-key\"></i></span>
\t\t\t\t\t\t\t\t<input id=\"password_addons\" name=\"password_addons\" type=\"password\" value=\"\" autocomplete=\"off\" class=\"form-control ac_input\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<a class=\"btn btn-link pull-right _blank\" href=\"//addons.prestashop.com/fr/forgot-your-password\">Mot de passe oublié</a>
\t\t\t\t\t\t\t<br>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"row row-padding-top\">
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<a class=\"btn btn-default btn-block btn-lg _blank\" href=\"https://addons.prestashop.com/fr/login?email=dev%40bc-web-agence.com&amp;firstname=Aur%C3%A9lie&amp;lastname=Nigaud&amp;website=http%3A%2F%2Fbcwebdev1.bc-web-agence.com%2Frhumdelis%2F&amp;utm_source=back-office&amp;utm_medium=connect-to-addons&amp;utm_campaign=back-office-FR&amp;utm_content=download#createnow\">
\t\t\t\t\t\t\t\tCréer un compte
\t\t\t\t\t\t\t\t<i class=\"icon-external-link\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<button id=\"addons_login_button\" class=\"btn btn-primary btn-block btn-lg\" type=\"submit\">
\t\t\t\t\t\t\t\t<i class=\"icon-unlock\"></i> Connexion
\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div id=\"addons_loading\" class=\"help-block\"></div>

\t\t\t</form>
\t\t\t<!--end addons login-->
\t\t\t</div>


\t\t\t\t\t</div>
\t</div>
</div>

  </div>

";
        // line 1442
        $this->displayBlock('javascripts', $context, $blocks);
        $this->displayBlock('extra_javascripts', $context, $blocks);
        $this->displayBlock('translate_javascripts', $context, $blocks);
        echo "</body>
</html>";
    }

    // line 81
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    public function block_extra_stylesheets($context, array $blocks = array())
    {
    }

    // line 1270
    public function block_content_header($context, array $blocks = array())
    {
    }

    // line 1271
    public function block_content($context, array $blocks = array())
    {
    }

    // line 1272
    public function block_content_footer($context, array $blocks = array())
    {
    }

    // line 1273
    public function block_sidebar_right($context, array $blocks = array())
    {
    }

    // line 1442
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function block_extra_javascripts($context, array $blocks = array())
    {
    }

    public function block_translate_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "__string_template__41d42ef073c7e479ee37a18c280962837ffc85a042d0917802288261b9c753ac";
    }

    public function getDebugInfo()
    {
        return array (  1521 => 1442,  1516 => 1273,  1511 => 1272,  1506 => 1271,  1501 => 1270,  1492 => 81,  1484 => 1442,  1314 => 1274,  1311 => 1273,  1308 => 1272,  1305 => 1271,  1303 => 1270,  110 => 81,  28 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__41d42ef073c7e479ee37a18c280962837ffc85a042d0917802288261b9c753ac", "");
    }
}

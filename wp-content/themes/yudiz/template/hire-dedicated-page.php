<?php
/* Template Name: Hire Dedicated Page  */
//require '/var/www/html/wp-load.php';
if (!empty($_POST)) {
   $domain_url = (isset($_SERVER['HTTPS'])) ? "https" : "http";
   $domain_url .= "://$_SERVER[HTTP_HOST]";
   $posted_data = (isset($_POST['data-to-save']) && !empty($_POST['data-to-save'])) ? $_POST['data-to-save'] : false;
   $has_error = false;
   $resp_msg = "";

   if ($posted_data !==  false) {

      if (!filter_var($posted_data['email'], FILTER_VALIDATE_EMAIL)) {
         $has_error = true;
         $resp_msg = "Email address is not valid!";
      }
   }
   if ($has_error === true) {
      /* Return Error*/
      header("Content-type: application/json");
      header("Access-Control-Allow-Origin: " . str_replace('.', '-', "$domain_url") . ".cdn.ampproject.org");
      header("AMP-Access-Control-Allow-Source-Origin: " . $domain_url);
      header("HTTP/1.0 412 Precondition Failed", true, 412);
      $data = array('error_msg' => $resp_msg);
      echo json_encode($data);
      exit;
   }
   $captcha = $_POST['recaptcha_token'];
   $response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Le3aGQjAAAAAMEBENgZTuere_FNQTQ3e26_dCbO&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']), true);
   if ($response['success'] == false) {
      //echo '<h2>You are spammer ! Get the @$%K out</h2>';
      $has_error = true;
      $resp_msg = "Invalid Captcha! Try again!";
   }
   if ($has_error === true) {
      /* Return Error*/
      header("Content-type: application/json");
      header("Access-Control-Allow-Origin: " . str_replace('.', '-', "$domain_url") . ".cdn.ampproject.org");
      header("AMP-Access-Control-Allow-Source-Origin: " . $domain_url);
      header("HTTP/1.0 412 Precondition Failed", true, 412);
      $data = array('error_msg' => $resp_msg);
      echo json_encode($data);
      exit;
   } else {
      $store_data['name'] = sanitize_text_field($posted_data['name']);
      $store_data['email'] = sanitize_email($posted_data['email']);
      $store_data['phone'] = sanitize_text_field($posted_data['phone']);
      $store_data['message'] = sanitize_textarea_field($posted_data['message']);
      $store_data['ip'] = $_SERVER['REMOTE_ADDR'];
      $serialized_array = serialize($store_data);
      // Gather post data.
      $my_post = array(
         'post_type'     => 'yswp_amp_data',
         'post_title'    => $store_data['email'],
         'post_content'  => $serialized_array,
         'post_status'   => 'publish'
      );
      // Insert the post into the database.
      $post_id = wp_insert_post($my_post);
      if (!is_wp_error($post_id)) {
         $to = "vishal@yudiz.com,chirag@yudiz.com,nirav@yudiz.com";
         $headers = array('Content-Type: text/html; charset=UTF-8');
         $subject = "Hire Dedicated Inquiry ";
         $message = "";
         ob_start(); ?>
         <!DOCTYPE html>
         <html>
         <meta name="keywords" content="" />
         <meta name="description" content="" />
         <meta name="author" content="" />
         <meta charset="utf-8" />
         <meta http-equiv="X-UA-Compatible" content="IE=edge" />
         <meta name="viewport" content="width=device-width, initial-scale=1" />
         <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
         <title><?php echo get_bloginfo('name'); ?> | Hire Dedicated </title>
         <style type="text/css">
            h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            p {
               margin: 0;
            }

            table {
               border: 0px;
            }
         </style>

         <body>
            <div>
               <p><b> Name : </b> <?php echo $store_data['name'] ?> </p>
               <p><b> Email : </b> <?php echo $store_data['email'] ?> </p>
               <p><b> Phone : </b> <?php echo $store_data['phone'] ?> </p>
               <p><b> Message : </b> <?php echo $store_data['message'] ?> </p>
               <p><b> Ip : </b> <?php echo $_SERVER['REMOTE_ADDR'] ?> </p>
            </div>
         </body>

         </html>
<?php
         $message = ob_get_clean();
         wp_mail($to, $subject, $message, $headers);
         header("Content-type: application/json");
         header("Access-Control-Allow-Origin: " . str_replace('.', '-', "$domain_url") . ".cdn.ampproject.org");
         header("AMP-Access-Control-Allow-Source-Origin: " . $domain_url);
         $data = array('success_msg' => "Thanks for reaching out to us! We'll get back to you in 24 hrs. Explore our website meanwhile!");
         echo json_encode($data);
         exit;
      } else {
         header("HTTP/1.0 412 Precondition Failed", true, 412);
         header("Content-type: application/json");
         header("Access-Control-Allow-Origin: " . str_replace('.', '-', "$domain_url") . ".cdn.ampproject.org");
         header("AMP-Access-Control-Allow-Source-Origin: " . $domain_url);
         $data = array('error_msg' => $post_id->get_error_message());
         echo json_encode($data);
         exit;
      }
   }
   exit;
}
?>
<!DOCTYPE html>
<html ⚡>

<head>
   <meta charset="utf-8">
   <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
   <script async src="https://cdn.ampproject.org/v0.js"></script>
   <link rel="canonical" href="https://www.yudiz.com/hire-dedicated-resources/">
   <!-- Fonts -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
   <link href="https://www.yudiz.com/wp-content/themes/yudiz/css/fontawesome.min.css" rel="stylesheet" type="text/css" />
   <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
   <!-- Meta -->
   <meta name="robots" content="index,follow">
   <meta name="description" content="Shape your innovative idea into a strategic reality. Hire dedicated developers & resources at Yudiz, a leading Blockchain, Game, and AI/ML development company in India.">
   <meta property="og:title" content="Hire Dedicated Developers | Hire Dedicated Resources">
   <meta name="og:description" content="Shape your innovative idea into a strategic reality. Hire dedicated developers & resources at Yudiz, a leading Blockchain, Game, and AI/ML development company in India.">
   <meta name="keywords" content="Hire dedicated developers, Hire dedicated resources, Dedicated development team" />
   <!-- title -->
   <title>Hire Dedicated Developers | Hire Dedicated Resources</title>
   <!-- amp google script -->
   <script async custom-element="amp-recaptcha-input" src="https://cdn.ampproject.org/v0/amp-recaptcha-input-0.1.js"></script>
   <!-- megamenu -->
<!--    <script async custom-element="amp-mega-menu" src="https://cdn.ampproject.org/v0/amp-mega-menu-0.1.js"></script> -->
   <!--amp-sidebar-->
   <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
   <!-- Amo Bind -->
   <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
   <!-- Amp Accordion -->
   <script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
   <!-- Amp Selector -->
   <script async custom-element="amp-selector" src="https://cdn.ampproject.org/v0/amp-selector-0.1.js"></script>
   <!-- Amp Base Corousal -->
   <script async custom-element="amp-base-carousel" src="https://cdn.ampproject.org/v0/amp-base-carousel-0.1.js"></script>
   <!-- Amp From -->
   <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
   <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
   <!-- Google Optimiser -->
   <script src="https://www.googleoptimize.com/optimize.js?id=OPT-MV32HTT"></script>
   <style amp-boilerplate>
      body {
         -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
         -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
         -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
         animation: -amp-start 8s steps(1, end) 0s 1 normal both
      }

      @-webkit-keyframes -amp-start {
         from {
            visibility: hidden
         }

         to {
            visibility: visible
         }
      }

      @-moz-keyframes -amp-start {
         from {
            visibility: hidden
         }

         to {
            visibility: visible
         }
      }

      @-ms-keyframes -amp-start {
         from {
            visibility: hidden
         }

         to {
            visibility: visible
         }
      }

      @-o-keyframes -amp-start {
         from {
            visibility: hidden
         }

         to {
            visibility: visible
         }
      }

      @keyframes -amp-start {
         from {
            visibility: hidden
         }

         to {
            visibility: visible
         }
      }
   </style><noscript>
      <style amp-boilerplate>
         body {
            -webkit-animation: none;
            -moz-animation: none;
            -ms-animation: none;
            animation: none
         }
      </style>
   </noscript>
   <style amp-custom>
      html {
         font-family: sans-serif;
         -webkit-text-size-adjust: 100%;
         -ms-text-size-adjust: 100%;
      }

      body {
         margin: 0;
      }

      article,
      aside,
      details,
      figcaption,
      figure,
      footer,
      header,
      hgroup,
      main,
      menu,
      nav,
      section,
      summary {
         display: block;
      }

      audio,
      canvas,
      progress,
      video {
         display: inline-block;
         vertical-align: baseline;
      }

      audio:not([controls]) {
         display: none;
         height: 0;
      }

      [hidden],
      template {
         display: none;
      }

      a {
         background-color: transparent;
      }

      a:active,
      a:hover {
         outline: 0;
      }

      abbr[title] {
         border-bottom: 1px dotted;
      }

      b,
      strong {
         font-weight: bold;
      }

      dfn {
         font-style: italic;
      }

      h1 {
         margin: .67em 0;
         font-size: 2em;
      }

      mark {
         color: #000;
         background: #ff0;
      }

      small {
         font-size: 80%;
      }

      sub,
      sup {
         position: relative;
         font-size: 75%;
         line-height: 0;
         vertical-align: baseline;
      }

      sup {
         top: -.5em;
      }

      sub {
         bottom: -.25em;
      }

      img {
         border: 0;
      }

      svg:not(:root) {
         overflow: hidden;
      }

      figure {
         margin: 1em 40px;
      }

      hr {
         height: 0;
         -webkit-box-sizing: content-box;
         -moz-box-sizing: content-box;
         box-sizing: content-box;
      }

      pre {
         overflow: auto;
      }

      code,
      kbd,
      pre,
      samp {
         font-family: monospace, monospace;
         font-size: 1em;
      }

      button,
      input,
      optgroup,
      select,
      textarea {
         margin: 0;
         font: inherit;
         color: inherit;
      }

      button {
         overflow: visible;
      }

      button,
      select {
         text-transform: none;
      }

      button,
      html input[type="button"],
      input[type="reset"],
      input[type="submit"] {
         -webkit-appearance: button;
         cursor: pointer;
      }

      button[disabled],
      html input[disabled] {
         cursor: default;
      }

      button::-moz-focus-inner,
      input::-moz-focus-inner {
         padding: 0;
         border: 0;
      }

      input {
         line-height: normal;
      }

      input[type="checkbox"],
      input[type="radio"] {
         -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
         padding: 0;
      }

      input[type="number"]::-webkit-inner-spin-button,
      input[type="number"]::-webkit-outer-spin-button {
         height: auto;
      }

      input[type="search"] {
         -webkit-box-sizing: content-box;
         -moz-box-sizing: content-box;
         box-sizing: content-box;
         -webkit-appearance: textfield;
      }

      input[type="search"]::-webkit-search-cancel-button,
      input[type="search"]::-webkit-search-decoration {
         -webkit-appearance: none;
      }

      fieldset {
         padding: .35em .625em .75em;
         margin: 0 2px;
         border: 1px solid #c0c0c0;
      }

      legend {
         padding: 0;
         border: 0;
      }

      textarea {
         overflow: auto;
      }

      optgroup {
         font-weight: bold;
      }

      table {
         border-spacing: 0;
         border-collapse: collapse;
      }

      td,
      th {
         padding: 0;
      }

      /*! Source: https://github.com/h5bp/html5-boilerplate/blob/master/src/css/main.css */
      @media print {

         *,
         *:before,
         *:after {
            color: #000 ;
            text-shadow: none ;
            background: transparent ;
            -webkit-box-shadow: none ;
            box-shadow: none ;
         }

         a,
         a:visited {
            text-decoration: underline;
         }

         a[href]:after {
            content: " (" attr(href) ")";
         }

         abbr[title]:after {
            content: " (" attr(title) ")";
         }

         a[href^="#"]:after,
         a[href^="javascript:"]:after {
            content: "";
         }

         pre,
         blockquote {
            border: 1px solid #999;
            page-break-inside: avoid;
         }

         thead {
            display: table-header-group;
         }

         tr,
         img {
            page-break-inside: avoid;
         }

         img {
            max-width: 100% ;
         }

         p,
         h2,
         h3 {
            orphans: 3;
            widows: 3;
         }

         h2,
         h3 {
            page-break-after: avoid;
         }

         .navbar {
            display: none;
         }

         .btn>.caret,
         .dropup>.btn>.caret {
            border-top-color: #000 ;
         }

         .label {
            border: 1px solid #000;
         }

         .table {
            border-collapse: collapse ;
         }

         .table td,
         .table th {
            background-color: #fff ;
         }

         .table-bordered th,
         .table-bordered td {
            border: 1px solid #ddd ;
         }
      }

      /*@font-face { font-family: 'Glyphicons Halflings'; src: url('../fonts/glyphicons-halflings-regular.eot'); src: url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../fonts/glyphicons-halflings-regular.woff2') format('woff2'), url('../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg'); }*/
      .glyphicon {
         position: relative;
         top: 1px;
         display: inline-block;
         font-family: 'Glyphicons Halflings';
         font-style: normal;
         font-weight: normal;
         line-height: 1;
         -webkit-font-smoothing: antialiased;
         -moz-osx-font-smoothing: grayscale;
      }

      .glyphicon-asterisk:before {
         content: "\002a";
      }

      .glyphicon-plus:before {
         content: "\002b";
      }

      .glyphicon-euro:before,
      .glyphicon-eur:before {
         content: "\20ac";
      }

      .glyphicon-minus:before {
         content: "\2212";
      }

      .glyphicon-cloud:before {
         content: "\2601";
      }

      .glyphicon-envelope:before {
         content: "\2709";
      }

      .glyphicon-pencil:before {
         content: "\270f";
      }

      .glyphicon-glass:before {
         content: "\e001";
      }

      .glyphicon-music:before {
         content: "\e002";
      }

      .glyphicon-search:before {
         content: "\e003";
      }

      .glyphicon-heart:before {
         content: "\e005";
      }

      .glyphicon-star:before {
         content: "\e006";
      }

      .glyphicon-star-empty:before {
         content: "\e007";
      }

      .glyphicon-user:before {
         content: "\e008";
      }

      .glyphicon-film:before {
         content: "\e009";
      }

      .glyphicon-th-large:before {
         content: "\e010";
      }

      .glyphicon-th:before {
         content: "\e011";
      }

      .glyphicon-th-list:before {
         content: "\e012";
      }

      .glyphicon-ok:before {
         content: "\e013";
      }

      .glyphicon-remove:before {
         content: "\e014";
      }

      .glyphicon-zoom-in:before {
         content: "\e015";
      }

      .glyphicon-zoom-out:before {
         content: "\e016";
      }

      .glyphicon-off:before {
         content: "\e017";
      }

      .glyphicon-signal:before {
         content: "\e018";
      }

      .glyphicon-cog:before {
         content: "\e019";
      }

      .glyphicon-trash:before {
         content: "\e020";
      }

      .glyphicon-home:before {
         content: "\e021";
      }

      .glyphicon-file:before {
         content: "\e022";
      }

      .glyphicon-time:before {
         content: "\e023";
      }

      .glyphicon-road:before {
         content: "\e024";
      }

      .glyphicon-download-alt:before {
         content: "\e025";
      }

      .glyphicon-download:before {
         content: "\e026";
      }

      .glyphicon-upload:before {
         content: "\e027";
      }

      .glyphicon-inbox:before {
         content: "\e028";
      }

      .glyphicon-play-circle:before {
         content: "\e029";
      }

      .glyphicon-repeat:before {
         content: "\e030";
      }

      .glyphicon-refresh:before {
         content: "\e031";
      }

      .glyphicon-list-alt:before {
         content: "\e032";
      }

      .glyphicon-lock:before {
         content: "\e033";
      }

      .glyphicon-flag:before {
         content: "\e034";
      }

      .glyphicon-headphones:before {
         content: "\e035";
      }

      .glyphicon-volume-off:before {
         content: "\e036";
      }

      .glyphicon-volume-down:before {
         content: "\e037";
      }

      .glyphicon-volume-up:before {
         content: "\e038";
      }

      .glyphicon-qrcode:before {
         content: "\e039";
      }

      .glyphicon-barcode:before {
         content: "\e040";
      }

      .glyphicon-tag:before {
         content: "\e041";
      }

      .glyphicon-tags:before {
         content: "\e042";
      }

      .glyphicon-book:before {
         content: "\e043";
      }

      .glyphicon-bookmark:before {
         content: "\e044";
      }

      .glyphicon-print:before {
         content: "\e045";
      }

      .glyphicon-camera:before {
         content: "\e046";
      }

      .glyphicon-font:before {
         content: "\e047";
      }

      .glyphicon-bold:before {
         content: "\e048";
      }

      .glyphicon-italic:before {
         content: "\e049";
      }

      .glyphicon-text-height:before {
         content: "\e050";
      }

      .glyphicon-text-width:before {
         content: "\e051";
      }

      .glyphicon-align-left:before {
         content: "\e052";
      }

      .glyphicon-align-center:before {
         content: "\e053";
      }

      .glyphicon-align-right:before {
         content: "\e054";
      }

      .glyphicon-align-justify:before {
         content: "\e055";
      }

      .glyphicon-list:before {
         content: "\e056";
      }

      .glyphicon-indent-left:before {
         content: "\e057";
      }

      .glyphicon-indent-right:before {
         content: "\e058";
      }

      .glyphicon-facetime-video:before {
         content: "\e059";
      }

      .glyphicon-picture:before {
         content: "\e060";
      }

      .glyphicon-map-marker:before {
         content: "\e062";
      }

      .glyphicon-adjust:before {
         content: "\e063";
      }

      .glyphicon-tint:before {
         content: "\e064";
      }

      .glyphicon-edit:before {
         content: "\e065";
      }

      .glyphicon-share:before {
         content: "\e066";
      }

      .glyphicon-check:before {
         content: "\e067";
      }

      .glyphicon-move:before {
         content: "\e068";
      }

      .glyphicon-step-backward:before {
         content: "\e069";
      }

      .glyphicon-fast-backward:before {
         content: "\e070";
      }

      .glyphicon-backward:before {
         content: "\e071";
      }

      .glyphicon-play:before {
         content: "\e072";
      }

      .glyphicon-pause:before {
         content: "\e073";
      }

      .glyphicon-stop:before {
         content: "\e074";
      }

      .glyphicon-forward:before {
         content: "\e075";
      }

      .glyphicon-fast-forward:before {
         content: "\e076";
      }

      .glyphicon-step-forward:before {
         content: "\e077";
      }

      .glyphicon-eject:before {
         content: "\e078";
      }

      .glyphicon-chevron-left:before {
         content: "\e079";
      }

      .glyphicon-chevron-right:before {
         content: "\e080";
      }

      .glyphicon-plus-sign:before {
         content: "\e081";
      }

      .glyphicon-minus-sign:before {
         content: "\e082";
      }

      .glyphicon-remove-sign:before {
         content: "\e083";
      }

      .glyphicon-ok-sign:before {
         content: "\e084";
      }

      .glyphicon-question-sign:before {
         content: "\e085";
      }

      .glyphicon-info-sign:before {
         content: "\e086";
      }

      .glyphicon-screenshot:before {
         content: "\e087";
      }

      .glyphicon-remove-circle:before {
         content: "\e088";
      }

      .glyphicon-ok-circle:before {
         content: "\e089";
      }

      .glyphicon-ban-circle:before {
         content: "\e090";
      }

      .glyphicon-arrow-left:before {
         content: "\e091";
      }

      .glyphicon-arrow-right:before {
         content: "\e092";
      }

      .glyphicon-arrow-up:before {
         content: "\e093";
      }

      .glyphicon-arrow-down:before {
         content: "\e094";
      }

      .glyphicon-share-alt:before {
         content: "\e095";
      }

      .glyphicon-resize-full:before {
         content: "\e096";
      }

      .glyphicon-resize-small:before {
         content: "\e097";
      }

      .glyphicon-exclamation-sign:before {
         content: "\e101";
      }

      .glyphicon-gift:before {
         content: "\e102";
      }

      .glyphicon-leaf:before {
         content: "\e103";
      }

      .glyphicon-fire:before {
         content: "\e104";
      }

      .glyphicon-eye-open:before {
         content: "\e105";
      }

      .glyphicon-eye-close:before {
         content: "\e106";
      }

      .glyphicon-warning-sign:before {
         content: "\e107";
      }

      .glyphicon-plane:before {
         content: "\e108";
      }

      .glyphicon-calendar:before {
         content: "\e109";
      }

      .glyphicon-random:before {
         content: "\e110";
      }

      .glyphicon-comment:before {
         content: "\e111";
      }

      .glyphicon-magnet:before {
         content: "\e112";
      }

      .glyphicon-chevron-up:before {
         content: "\e113";
      }

      .glyphicon-chevron-down:before {
         content: "\e114";
      }

      .glyphicon-retweet:before {
         content: "\e115";
      }

      .glyphicon-shopping-cart:before {
         content: "\e116";
      }

      .glyphicon-folder-close:before {
         content: "\e117";
      }

      .glyphicon-folder-open:before {
         content: "\e118";
      }

      .glyphicon-resize-vertical:before {
         content: "\e119";
      }

      .glyphicon-resize-horizontal:before {
         content: "\e120";
      }

      .glyphicon-hdd:before {
         content: "\e121";
      }

      .glyphicon-bullhorn:before {
         content: "\e122";
      }

      .glyphicon-bell:before {
         content: "\e123";
      }

      .glyphicon-certificate:before {
         content: "\e124";
      }

      .glyphicon-thumbs-up:before {
         content: "\e125";
      }

      .glyphicon-thumbs-down:before {
         content: "\e126";
      }

      .glyphicon-hand-right:before {
         content: "\e127";
      }

      .glyphicon-hand-left:before {
         content: "\e128";
      }

      .glyphicon-hand-up:before {
         content: "\e129";
      }

      .glyphicon-hand-down:before {
         content: "\e130";
      }

      .glyphicon-circle-arrow-right:before {
         content: "\e131";
      }

      .glyphicon-circle-arrow-left:before {
         content: "\e132";
      }

      .glyphicon-circle-arrow-up:before {
         content: "\e133";
      }

      .glyphicon-circle-arrow-down:before {
         content: "\e134";
      }

      .glyphicon-globe:before {
         content: "\e135";
      }

      .glyphicon-wrench:before {
         content: "\e136";
      }

      .glyphicon-tasks:before {
         content: "\e137";
      }

      .glyphicon-filter:before {
         content: "\e138";
      }

      .glyphicon-briefcase:before {
         content: "\e139";
      }

      .glyphicon-fullscreen:before {
         content: "\e140";
      }

      .glyphicon-dashboard:before {
         content: "\e141";
      }

      .glyphicon-paperclip:before {
         content: "\e142";
      }

      .glyphicon-heart-empty:before {
         content: "\e143";
      }

      .glyphicon-link:before {
         content: "\e144";
      }

      .glyphicon-phone:before {
         content: "\e145";
      }

      .glyphicon-pushpin:before {
         content: "\e146";
      }

      .glyphicon-usd:before {
         content: "\e148";
      }

      .glyphicon-gbp:before {
         content: "\e149";
      }

      .glyphicon-sort:before {
         content: "\e150";
      }

      .glyphicon-sort-by-alphabet:before {
         content: "\e151";
      }

      .glyphicon-sort-by-alphabet-alt:before {
         content: "\e152";
      }

      .glyphicon-sort-by-order:before {
         content: "\e153";
      }

      .glyphicon-sort-by-order-alt:before {
         content: "\e154";
      }

      .glyphicon-sort-by-attributes:before {
         content: "\e155";
      }

      .glyphicon-sort-by-attributes-alt:before {
         content: "\e156";
      }

      .glyphicon-unchecked:before {
         content: "\e157";
      }

      .glyphicon-expand:before {
         content: "\e158";
      }

      .glyphicon-collapse-down:before {
         content: "\e159";
      }

      .glyphicon-collapse-up:before {
         content: "\e160";
      }

      .glyphicon-log-in:before {
         content: "\e161";
      }

      .glyphicon-flash:before {
         content: "\e162";
      }

      .glyphicon-log-out:before {
         content: "\e163";
      }

      .glyphicon-new-window:before {
         content: "\e164";
      }

      .glyphicon-record:before {
         content: "\e165";
      }

      .glyphicon-save:before {
         content: "\e166";
      }

      .glyphicon-open:before {
         content: "\e167";
      }

      .glyphicon-saved:before {
         content: "\e168";
      }

      .glyphicon-import:before {
         content: "\e169";
      }

      .glyphicon-export:before {
         content: "\e170";
      }

      .glyphicon-send:before {
         content: "\e171";
      }

      .glyphicon-floppy-disk:before {
         content: "\e172";
      }

      .glyphicon-floppy-saved:before {
         content: "\e173";
      }

      .glyphicon-floppy-remove:before {
         content: "\e174";
      }

      .glyphicon-floppy-save:before {
         content: "\e175";
      }

      .glyphicon-floppy-open:before {
         content: "\e176";
      }

      .glyphicon-credit-card:before {
         content: "\e177";
      }

      .glyphicon-transfer:before {
         content: "\e178";
      }

      .glyphicon-cutlery:before {
         content: "\e179";
      }

      .glyphicon-header:before {
         content: "\e180";
      }

      .glyphicon-compressed:before {
         content: "\e181";
      }

      .glyphicon-earphone:before {
         content: "\e182";
      }

      .glyphicon-phone-alt:before {
         content: "\e183";
      }

      .glyphicon-tower:before {
         content: "\e184";
      }

      .glyphicon-stats:before {
         content: "\e185";
      }

      .glyphicon-sd-video:before {
         content: "\e186";
      }

      .glyphicon-hd-video:before {
         content: "\e187";
      }

      .glyphicon-subtitles:before {
         content: "\e188";
      }

      .glyphicon-sound-stereo:before {
         content: "\e189";
      }

      .glyphicon-sound-dolby:before {
         content: "\e190";
      }

      .glyphicon-sound-5-1:before {
         content: "\e191";
      }

      .glyphicon-sound-6-1:before {
         content: "\e192";
      }

      .glyphicon-sound-7-1:before {
         content: "\e193";
      }

      .glyphicon-copyright-mark:before {
         content: "\e194";
      }

      .glyphicon-registration-mark:before {
         content: "\e195";
      }

      .glyphicon-cloud-download:before {
         content: "\e197";
      }

      .glyphicon-cloud-upload:before {
         content: "\e198";
      }

      .glyphicon-tree-conifer:before {
         content: "\e199";
      }

      .glyphicon-tree-deciduous:before {
         content: "\e200";
      }

      .glyphicon-cd:before {
         content: "\e201";
      }

      .glyphicon-save-file:before {
         content: "\e202";
      }

      .glyphicon-open-file:before {
         content: "\e203";
      }

      .glyphicon-level-up:before {
         content: "\e204";
      }

      .glyphicon-copy:before {
         content: "\e205";
      }

      .glyphicon-paste:before {
         content: "\e206";
      }

      .glyphicon-alert:before {
         content: "\e209";
      }

      .glyphicon-equalizer:before {
         content: "\e210";
      }

      .glyphicon-king:before {
         content: "\e211";
      }

      .glyphicon-queen:before {
         content: "\e212";
      }

      .glyphicon-pawn:before {
         content: "\e213";
      }

      .glyphicon-bishop:before {
         content: "\e214";
      }

      .glyphicon-knight:before {
         content: "\e215";
      }

      .glyphicon-baby-formula:before {
         content: "\e216";
      }

      .glyphicon-tent:before {
         content: "\26fa";
      }

      .glyphicon-blackboard:before {
         content: "\e218";
      }

      .glyphicon-bed:before {
         content: "\e219";
      }

      .glyphicon-apple:before {
         content: "\f8ff";
      }

      .glyphicon-erase:before {
         content: "\e221";
      }

      .glyphicon-hourglass:before {
         content: "\231b";
      }

      .glyphicon-lamp:before {
         content: "\e223";
      }

      .glyphicon-duplicate:before {
         content: "\e224";
      }

      .glyphicon-piggy-bank:before {
         content: "\e225";
      }

      .glyphicon-scissors:before {
         content: "\e226";
      }

      .glyphicon-bitcoin:before {
         content: "\e227";
      }

      .glyphicon-btc:before {
         content: "\e227";
      }

      .glyphicon-xbt:before {
         content: "\e227";
      }

      .glyphicon-yen:before {
         content: "\00a5";
      }

      .glyphicon-jpy:before {
         content: "\00a5";
      }

      .glyphicon-ruble:before {
         content: "\20bd";
      }

      .glyphicon-rub:before {
         content: "\20bd";
      }

      .glyphicon-scale:before {
         content: "\e230";
      }

      .glyphicon-ice-lolly:before {
         content: "\e231";
      }

      .glyphicon-ice-lolly-tasted:before {
         content: "\e232";
      }

      .glyphicon-education:before {
         content: "\e233";
      }

      .glyphicon-option-horizontal:before {
         content: "\e234";
      }

      .glyphicon-option-vertical:before {
         content: "\e235";
      }

      .glyphicon-menu-hamburger:before {
         content: "\e236";
      }

      .glyphicon-modal-window:before {
         content: "\e237";
      }

      .glyphicon-oil:before {
         content: "\e238";
      }

      .glyphicon-grain:before {
         content: "\e239";
      }

      .glyphicon-sunglasses:before {
         content: "\e240";
      }

      .glyphicon-text-size:before {
         content: "\e241";
      }

      .glyphicon-text-color:before {
         content: "\e242";
      }

      .glyphicon-text-background:before {
         content: "\e243";
      }

      .glyphicon-object-align-top:before {
         content: "\e244";
      }

      .glyphicon-object-align-bottom:before {
         content: "\e245";
      }

      .glyphicon-object-align-horizontal:before {
         content: "\e246";
      }

      .glyphicon-object-align-left:before {
         content: "\e247";
      }

      .glyphicon-object-align-vertical:before {
         content: "\e248";
      }

      .glyphicon-object-align-right:before {
         content: "\e249";
      }

      .glyphicon-triangle-right:before {
         content: "\e250";
      }

      .glyphicon-triangle-left:before {
         content: "\e251";
      }

      .glyphicon-triangle-bottom:before {
         content: "\e252";
      }

      .glyphicon-triangle-top:before {
         content: "\e253";
      }

      .glyphicon-console:before {
         content: "\e254";
      }

      .glyphicon-superscript:before {
         content: "\e255";
      }

      .glyphicon-subscript:before {
         content: "\e256";
      }

      .glyphicon-menu-left:before {
         content: "\e257";
      }

      .glyphicon-menu-right:before {
         content: "\e258";
      }

      .glyphicon-menu-down:before {
         content: "\e259";
      }

      .glyphicon-menu-up:before {
         content: "\e260";
      }

      * {
         -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
      }

      *:before,
      *:after {
         -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
      }

      html {
         font-size: 10px;
         -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
      }

      body {
         font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
         font-size: 14px;
         line-height: 1.42857143;
         color: #333;
         background-color: #fff;
      }

      input,
      button,
      select,
      textarea {
         font-family: inherit;
         font-size: inherit;
         line-height: inherit;
      }

      a {
         color: #337ab7;
         text-decoration: none;
      }

      a:hover,
      a:focus {
         color: #23527c;
         text-decoration: underline;
      }

      a:focus {
         outline: 5px auto -webkit-focus-ring-color;
         outline-offset: -2px;
      }

      figure {
         margin: 0;
      }

      img {
         vertical-align: middle;
      }

      .img-responsive,
      .thumbnail>img,
      .thumbnail a>img,
      .carousel-inner>.item>img,
      .carousel-inner>.item>a>img {
         display: block;
         max-width: 100%;
         height: auto;
      }

      .img-rounded {
         border-radius: 6px;
      }

      .img-thumbnail {
         display: inline-block;
         max-width: 100%;
         height: auto;
         padding: 4px;
         line-height: 1.42857143;
         background-color: #fff;
         border: 1px solid #ddd;
         border-radius: 4px;
         -webkit-transition: all .2s ease-in-out;
         -o-transition: all .2s ease-in-out;
         transition: all .2s ease-in-out;
      }

      .img-circle {
         border-radius: 50%;
      }

      hr {
         margin-top: 20px;
         margin-bottom: 20px;
         border: 0;
         border-top: 1px solid #eee;
      }

      .sr-only {
         position: absolute;
         width: 1px;
         height: 1px;
         padding: 0;
         margin: -1px;
         overflow: hidden;
         clip: rect(0, 0, 0, 0);
         border: 0;
      }

      .sr-only-focusable:active,
      .sr-only-focusable:focus {
         position: static;
         width: auto;
         height: auto;
         margin: 0;
         overflow: visible;
         clip: auto;
      }

      [role="button"] {
         cursor: pointer;
      }

      h1,
      h2,
      h3,
      h4,
      h5,
      h6,
      .h1,
      .h2,
      .h3,
      .h4,
      .h5,
      .h6 {
         font-family: inherit;
         font-weight: 500;
         line-height: 1.1;
         color: inherit;
      }

      h1 small,
      h2 small,
      h3 small,
      h4 small,
      h5 small,
      h6 small,
      .h1 small,
      .h2 small,
      .h3 small,
      .h4 small,
      .h5 small,
      .h6 small,
      h1 .small,
      h2 .small,
      h3 .small,
      h4 .small,
      h5 .small,
      h6 .small,
      .h1 .small,
      .h2 .small,
      .h3 .small,
      .h4 .small,
      .h5 .small,
      .h6 .small {
         font-weight: normal;
         line-height: 1;
         color: #777;
      }

      h1,
      .h1,
      h2,
      .h2,
      h3,
      .h3 {
         margin-top: 20px;
         margin-bottom: 10px;
      }

      h1 small,
      .h1 small,
      h2 small,
      .h2 small,
      h3 small,
      .h3 small,
      h1 .small,
      .h1 .small,
      h2 .small,
      .h2 .small,
      h3 .small,
      .h3 .small {
         font-size: 65%;
      }

      h4,
      .h4,
      h5,
      .h5,
      h6,
      .h6 {
         margin-top: 10px;
         margin-bottom: 10px;
      }

      h4 small,
      .h4 small,
      h5 small,
      .h5 small,
      h6 small,
      .h6 small,
      h4 .small,
      .h4 .small,
      h5 .small,
      .h5 .small,
      h6 .small,
      .h6 .small {
         font-size: 75%;
      }

      h1,
      .h1 {
         font-size: 36px;
      }

      h2,
      .h2 {
         font-size: 30px;
      }

      h3,
      .h3 {
         font-size: 24px;
      }

      h4,
      .h4 {
         font-size: 18px;
      }

      h5,
      .h5 {
         font-size: 14px;
      }

      h6,
      .h6 {
         font-size: 12px;
      }

      p {
         margin: 0 0 10px;
      }

      .lead {
         margin-bottom: 20px;
         font-size: 16px;
         font-weight: 300;
         line-height: 1.4;
      }

      @media (min-width: 768px) {
         .lead {
            font-size: 21px;
         }
      }

      small,
      .small {
         font-size: 85%;
      }

      mark,
      .mark {
         padding: .2em;
         background-color: #fcf8e3;
      }

      .text-left {
         text-align: left;
      }

      .text-right {
         text-align: right;
      }

      .text-center {
         text-align: center;
      }

      .text-justify {
         text-align: justify;
      }

      .text-nowrap {
         white-space: nowrap;
      }

      .text-lowercase {
         text-transform: lowercase;
      }

      .text-uppercase {
         text-transform: uppercase;
      }

      .text-capitalize {
         text-transform: capitalize;
      }

      .text-muted {
         color: #777;
      }

      .text-primary {
         color: #337ab7;
      }

      a.text-primary:hover,
      a.text-primary:focus {
         color: #286090;
      }

      .text-success {
         color: #3c763d;
      }

      a.text-success:hover,
      a.text-success:focus {
         color: #2b542c;
      }

      .text-info {
         color: #31708f;
      }

      a.text-info:hover,
      a.text-info:focus {
         color: #245269;
      }

      .text-warning {
         color: #8a6d3b;
      }

      a.text-warning:hover,
      a.text-warning:focus {
         color: #66512c;
      }

      .text-danger {
         color: #a94442;
      }

      a.text-danger:hover,
      a.text-danger:focus {
         color: #843534;
      }

      .bg-primary {
         color: #fff;
         background-color: #337ab7;
      }

      a.bg-primary:hover,
      a.bg-primary:focus {
         background-color: #286090;
      }

      .bg-success {
         background-color: #dff0d8;
      }

      a.bg-success:hover,
      a.bg-success:focus {
         background-color: #c1e2b3;
      }

      .bg-info {
         background-color: #d9edf7;
      }

      a.bg-info:hover,
      a.bg-info:focus {
         background-color: #afd9ee;
      }

      .bg-warning {
         background-color: #fcf8e3;
      }

      a.bg-warning:hover,
      a.bg-warning:focus {
         background-color: #f7ecb5;
      }

      .bg-danger {
         background-color: #f2dede;
      }

      a.bg-danger:hover,
      a.bg-danger:focus {
         background-color: #e4b9b9;
      }

      .page-header {
         padding-bottom: 9px;
         margin: 40px 0 20px;
         border-bottom: 1px solid #eee;
      }

      ul,
      ol {
         margin-top: 0;
         margin-bottom: 10px;
      }

      ul ul,
      ol ul,
      ul ol,
      ol ol {
         margin-bottom: 0;
      }

      .list-unstyled {
         padding-left: 0;
         list-style: none;
      }

      .list-inline {
         padding-left: 0;
         margin-left: -5px;
         list-style: none;
      }

      .list-inline>li {
         display: inline-block;
         padding-right: 5px;
         padding-left: 5px;
      }

      dl {
         margin-top: 0;
         margin-bottom: 20px;
      }

      dt,
      dd {
         line-height: 1.42857143;
      }

      dt {
         font-weight: bold;
      }

      dd {
         margin-left: 0;
      }

      @media (min-width: 768px) {
         .dl-horizontal dt {
            float: left;
            width: 160px;
            overflow: hidden;
            clear: left;
            text-align: right;
            text-overflow: ellipsis;
            white-space: nowrap;
         }

         .dl-horizontal dd {
            margin-left: 180px;
         }
      }

      abbr[title],
      abbr[data-original-title] {
         cursor: help;
         border-bottom: 1px dotted #777;
      }

      .initialism {
         font-size: 90%;
         text-transform: uppercase;
      }

      blockquote {
         padding: 10px 20px;
         margin: 0 0 20px;
         font-size: 17.5px;
         border-left: 5px solid #eee;
      }

      blockquote p:last-child,
      blockquote ul:last-child,
      blockquote ol:last-child {
         margin-bottom: 0;
      }

      blockquote footer,
      blockquote small,
      blockquote .small {
         display: block;
         font-size: 80%;
         line-height: 1.42857143;
         color: #777;
      }

      blockquote footer:before,
      blockquote small:before,
      blockquote .small:before {
         content: '\2014 \00A0';
      }

      .blockquote-reverse,
      blockquote.pull-right {
         padding-right: 15px;
         padding-left: 0;
         text-align: right;
         border-right: 5px solid #eee;
         border-left: 0;
      }

      .blockquote-reverse footer:before,
      blockquote.pull-right footer:before,
      .blockquote-reverse small:before,
      blockquote.pull-right small:before,
      .blockquote-reverse .small:before,
      blockquote.pull-right .small:before {
         content: '';
      }

      .blockquote-reverse footer:after,
      blockquote.pull-right footer:after,
      .blockquote-reverse small:after,
      blockquote.pull-right small:after,
      .blockquote-reverse .small:after,
      blockquote.pull-right .small:after {
         content: '\00A0 \2014';
      }

      address {
         margin-bottom: 20px;
         font-style: normal;
         line-height: 1.42857143;
      }

      code,
      kbd,
      pre,
      samp {
         font-family: Menlo, Monaco, Consolas, "Courier New", monospace;
      }

      code {
         padding: 2px 4px;
         font-size: 90%;
         color: #c7254e;
         background-color: #f9f2f4;
         border-radius: 4px;
      }

      kbd {
         padding: 2px 4px;
         font-size: 90%;
         color: #fff;
         background-color: #333;
         border-radius: 3px;
         -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25);
         box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25);
      }

      kbd kbd {
         padding: 0;
         font-size: 100%;
         font-weight: bold;
         -webkit-box-shadow: none;
         box-shadow: none;
      }

      pre {
         display: block;
         padding: 9.5px;
         margin: 0 0 10px;
         font-size: 13px;
         line-height: 1.42857143;
         color: #333;
         word-break: break-all;
         word-wrap: break-word;
         background-color: #f5f5f5;
         border: 1px solid #ccc;
         border-radius: 4px;
      }

      pre code {
         padding: 0;
         font-size: inherit;
         color: inherit;
         white-space: pre-wrap;
         background-color: transparent;
         border-radius: 0;
      }

      .pre-scrollable {
         max-height: 340px;
         overflow-y: scroll;
      }

      .container {
         padding-right: 15px;
         padding-left: 15px;
         margin-right: auto;
         margin-left: auto;
      }

      @media (min-width: 768px) {
         .container {
            width: 750px;
         }
      }

      @media (min-width: 992px) {
         .container {
            width: 970px;
         }
      }

      @media (min-width: 1200px) {
         .container {
            width: 1170px;
         }
      }

      .container-fluid {
         padding-right: 15px;
         padding-left: 15px;
         margin-right: auto;
         margin-left: auto;
      }

      .row {
         margin-right: -15px;
         margin-left: -15px;
      }

      .col-xs-1,
      .col-sm-1,
      .col-md-1,
      .col-lg-1,
      .col-xs-2,
      .col-sm-2,
      .col-md-2,
      .col-lg-2,
      .col-xs-3,
      .col-sm-3,
      .col-md-3,
      .col-lg-3,
      .col-xs-4,
      .col-sm-4,
      .col-md-4,
      .col-lg-4,
      .col-xs-5,
      .col-sm-5,
      .col-md-5,
      .col-lg-5,
      .col-xs-6,
      .col-sm-6,
      .col-md-6,
      .col-lg-6,
      .col-xs-7,
      .col-sm-7,
      .col-md-7,
      .col-lg-7,
      .col-xs-8,
      .col-sm-8,
      .col-md-8,
      .col-lg-8,
      .col-xs-9,
      .col-sm-9,
      .col-md-9,
      .col-lg-9,
      .col-xs-10,
      .col-sm-10,
      .col-md-10,
      .col-lg-10,
      .col-xs-11,
      .col-sm-11,
      .col-md-11,
      .col-lg-11,
      .col-xs-12,
      .col-sm-12,
      .col-md-12,
      .col-lg-12 {
         position: relative;
         min-height: 1px;
         padding-right: 15px;
         padding-left: 15px;
      }

      .col-xs-1,
      .col-xs-2,
      .col-xs-3,
      .col-xs-4,
      .col-xs-5,
      .col-xs-6,
      .col-xs-7,
      .col-xs-8,
      .col-xs-9,
      .col-xs-10,
      .col-xs-11,
      .col-xs-12 {
         float: left;
      }

      .col-xs-12 {
         width: 100%;
      }

      .col-xs-11 {
         width: 91.66666667%;
      }

      .col-xs-10 {
         width: 83.33333333%;
      }

      .col-xs-9 {
         width: 75%;
      }

      .col-xs-8 {
         width: 66.66666667%;
      }

      .col-xs-7 {
         width: 58.33333333%;
      }

      .col-xs-6 {
         width: 50%;
      }

      .col-xs-5 {
         width: 41.66666667%;
      }

      .col-xs-4 {
         width: 33.33333333%;
      }

      .col-xs-3 {
         width: 25%;
      }

      .col-xs-2 {
         width: 16.66666667%;
      }

      .col-xs-1 {
         width: 8.33333333%;
      }

      .col-xs-pull-12 {
         right: 100%;
      }

      .col-xs-pull-11 {
         right: 91.66666667%;
      }

      .col-xs-pull-10 {
         right: 83.33333333%;
      }

      .col-xs-pull-9 {
         right: 75%;
      }

      .col-xs-pull-8 {
         right: 66.66666667%;
      }

      .col-xs-pull-7 {
         right: 58.33333333%;
      }

      .col-xs-pull-6 {
         right: 50%;
      }

      .col-xs-pull-5 {
         right: 41.66666667%;
      }

      .col-xs-pull-4 {
         right: 33.33333333%;
      }

      .col-xs-pull-3 {
         right: 25%;
      }

      .col-xs-pull-2 {
         right: 16.66666667%;
      }

      .col-xs-pull-1 {
         right: 8.33333333%;
      }

      .col-xs-pull-0 {
         right: auto;
      }

      .col-xs-push-12 {
         left: 100%;
      }

      .col-xs-push-11 {
         left: 91.66666667%;
      }

      .col-xs-push-10 {
         left: 83.33333333%;
      }

      .col-xs-push-9 {
         left: 75%;
      }

      .col-xs-push-8 {
         left: 66.66666667%;
      }

      .col-xs-push-7 {
         left: 58.33333333%;
      }

      .col-xs-push-6 {
         left: 50%;
      }

      .col-xs-push-5 {
         left: 41.66666667%;
      }

      .col-xs-push-4 {
         left: 33.33333333%;
      }

      .col-xs-push-3 {
         left: 25%;
      }

      .col-xs-push-2 {
         left: 16.66666667%;
      }

      .col-xs-push-1 {
         left: 8.33333333%;
      }

      .col-xs-push-0 {
         left: auto;
      }

      .col-xs-offset-12 {
         margin-left: 100%;
      }

      .col-xs-offset-11 {
         margin-left: 91.66666667%;
      }

      .col-xs-offset-10 {
         margin-left: 83.33333333%;
      }

      .col-xs-offset-9 {
         margin-left: 75%;
      }

      .col-xs-offset-8 {
         margin-left: 66.66666667%;
      }

      .col-xs-offset-7 {
         margin-left: 58.33333333%;
      }

      .col-xs-offset-6 {
         margin-left: 50%;
      }

      .col-xs-offset-5 {
         margin-left: 41.66666667%;
      }

      .col-xs-offset-4 {
         margin-left: 33.33333333%;
      }

      .col-xs-offset-3 {
         margin-left: 25%;
      }

      .col-xs-offset-2 {
         margin-left: 16.66666667%;
      }

      .col-xs-offset-1 {
         margin-left: 8.33333333%;
      }

      .col-xs-offset-0 {
         margin-left: 0;
      }

      @media (min-width: 768px) {

         .col-sm-1,
         .col-sm-2,
         .col-sm-3,
         .col-sm-4,
         .col-sm-5,
         .col-sm-6,
         .col-sm-7,
         .col-sm-8,
         .col-sm-9,
         .col-sm-10,
         .col-sm-11,
         .col-sm-12 {
            float: left;
         }

         .col-sm-12 {
            width: 100%;
         }

         .col-sm-11 {
            width: 91.66666667%;
         }

         .col-sm-10 {
            width: 83.33333333%;
         }

         .col-sm-9 {
            width: 75%;
         }

         .col-sm-8 {
            width: 66.66666667%;
         }

         .col-sm-7 {
            width: 58.33333333%;
         }

         .col-sm-6 {
            width: 50%;
         }

         .col-sm-5 {
            width: 41.66666667%;
         }

         .col-sm-4 {
            width: 33.33333333%;
         }

         .col-sm-3 {
            width: 25%;
         }

         .col-sm-2 {
            width: 16.66666667%;
         }

         .col-sm-1 {
            width: 8.33333333%;
         }

         .col-sm-pull-12 {
            right: 100%;
         }

         .col-sm-pull-11 {
            right: 91.66666667%;
         }

         .col-sm-pull-10 {
            right: 83.33333333%;
         }

         .col-sm-pull-9 {
            right: 75%;
         }

         .col-sm-pull-8 {
            right: 66.66666667%;
         }

         .col-sm-pull-7 {
            right: 58.33333333%;
         }

         .col-sm-pull-6 {
            right: 50%;
         }

         .col-sm-pull-5 {
            right: 41.66666667%;
         }

         .col-sm-pull-4 {
            right: 33.33333333%;
         }

         .col-sm-pull-3 {
            right: 25%;
         }

         .col-sm-pull-2 {
            right: 16.66666667%;
         }

         .col-sm-pull-1 {
            right: 8.33333333%;
         }

         .col-sm-pull-0 {
            right: auto;
         }

         .col-sm-push-12 {
            left: 100%;
         }

         .col-sm-push-11 {
            left: 91.66666667%;
         }

         .col-sm-push-10 {
            left: 83.33333333%;
         }

         .col-sm-push-9 {
            left: 75%;
         }

         .col-sm-push-8 {
            left: 66.66666667%;
         }

         .col-sm-push-7 {
            left: 58.33333333%;
         }

         .col-sm-push-6 {
            left: 50%;
         }

         .col-sm-push-5 {
            left: 41.66666667%;
         }

         .col-sm-push-4 {
            left: 33.33333333%;
         }

         .col-sm-push-3 {
            left: 25%;
         }

         .col-sm-push-2 {
            left: 16.66666667%;
         }

         .col-sm-push-1 {
            left: 8.33333333%;
         }

         .col-sm-push-0 {
            left: auto;
         }

         .col-sm-offset-12 {
            margin-left: 100%;
         }

         .col-sm-offset-11 {
            margin-left: 91.66666667%;
         }

         .col-sm-offset-10 {
            margin-left: 83.33333333%;
         }

         .col-sm-offset-9 {
            margin-left: 75%;
         }

         .col-sm-offset-8 {
            margin-left: 66.66666667%;
         }

         .col-sm-offset-7 {
            margin-left: 58.33333333%;
         }

         .col-sm-offset-6 {
            margin-left: 50%;
         }

         .col-sm-offset-5 {
            margin-left: 41.66666667%;
         }

         .col-sm-offset-4 {
            margin-left: 33.33333333%;
         }

         .col-sm-offset-3 {
            margin-left: 25%;
         }

         .col-sm-offset-2 {
            margin-left: 16.66666667%;
         }

         .col-sm-offset-1 {
            margin-left: 8.33333333%;
         }

         .col-sm-offset-0 {
            margin-left: 0;
         }
      }

      @media (min-width: 992px) {

         .col-md-1,
         .col-md-2,
         .col-md-3,
         .col-md-4,
         .col-md-5,
         .col-md-6,
         .col-md-7,
         .col-md-8,
         .col-md-9,
         .col-md-10,
         .col-md-11,
         .col-md-12 {
            float: left;
         }

         .col-md-12 {
            width: 100%;
         }

         .col-md-11 {
            width: 91.66666667%;
         }

         .col-md-10 {
            width: 83.33333333%;
         }

         .col-md-9 {
            width: 75%;
         }

         .col-md-8 {
            width: 66.66666667%;
         }

         .col-md-7 {
            width: 58.33333333%;
         }

         .col-md-6 {
            width: 50%;
         }

         .col-md-5 {
            width: 41.66666667%;
         }

         .col-md-4 {
            width: 33.33333333%;
         }

         .col-md-3 {
            width: 25%;
         }

         .col-md-2 {
            width: 16.66666667%;
         }

         .col-md-1 {
            width: 8.33333333%;
         }

         .col-md-pull-12 {
            right: 100%;
         }

         .col-md-pull-11 {
            right: 91.66666667%;
         }

         .col-md-pull-10 {
            right: 83.33333333%;
         }

         .col-md-pull-9 {
            right: 75%;
         }

         .col-md-pull-8 {
            right: 66.66666667%;
         }

         .col-md-pull-7 {
            right: 58.33333333%;
         }

         .col-md-pull-6 {
            right: 50%;
         }

         .col-md-pull-5 {
            right: 41.66666667%;
         }

         .col-md-pull-4 {
            right: 33.33333333%;
         }

         .col-md-pull-3 {
            right: 25%;
         }

         .col-md-pull-2 {
            right: 16.66666667%;
         }

         .col-md-pull-1 {
            right: 8.33333333%;
         }

         .col-md-pull-0 {
            right: auto;
         }

         .col-md-push-12 {
            left: 100%;
         }

         .col-md-push-11 {
            left: 91.66666667%;
         }

         .col-md-push-10 {
            left: 83.33333333%;
         }

         .col-md-push-9 {
            left: 75%;
         }

         .col-md-push-8 {
            left: 66.66666667%;
         }

         .col-md-push-7 {
            left: 58.33333333%;
         }

         .col-md-push-6 {
            left: 50%;
         }

         .col-md-push-5 {
            left: 41.66666667%;
         }

         .col-md-push-4 {
            left: 33.33333333%;
         }

         .col-md-push-3 {
            left: 25%;
         }

         .col-md-push-2 {
            left: 16.66666667%;
         }

         .col-md-push-1 {
            left: 8.33333333%;
         }

         .col-md-push-0 {
            left: auto;
         }

         .col-md-offset-12 {
            margin-left: 100%;
         }

         .col-md-offset-11 {
            margin-left: 91.66666667%;
         }

         .col-md-offset-10 {
            margin-left: 83.33333333%;
         }

         .col-md-offset-9 {
            margin-left: 75%;
         }

         .col-md-offset-8 {
            margin-left: 66.66666667%;
         }

         .col-md-offset-7 {
            margin-left: 58.33333333%;
         }

         .col-md-offset-6 {
            margin-left: 50%;
         }

         .col-md-offset-5 {
            margin-left: 41.66666667%;
         }

         .col-md-offset-4 {
            margin-left: 33.33333333%;
         }

         .col-md-offset-3 {
            margin-left: 25%;
         }

         .col-md-offset-2 {
            margin-left: 16.66666667%;
         }

         .col-md-offset-1 {
            margin-left: 8.33333333%;
         }

         .col-md-offset-0 {
            margin-left: 0;
         }
      }

      @media (min-width: 1200px) {

         .col-lg-1,
         .col-lg-2,
         .col-lg-3,
         .col-lg-4,
         .col-lg-5,
         .col-lg-6,
         .col-lg-7,
         .col-lg-8,
         .col-lg-9,
         .col-lg-10,
         .col-lg-11,
         .col-lg-12 {
            float: left;
         }

         .col-lg-12 {
            width: 100%;
         }

         .col-lg-11 {
            width: 91.66666667%;
         }

         .col-lg-10 {
            width: 83.33333333%;
         }

         .col-lg-9 {
            width: 75%;
         }

         .col-lg-8 {
            width: 66.66666667%;
         }

         .col-lg-7 {
            width: 58.33333333%;
         }

         .col-lg-6 {
            width: 50%;
         }

         .col-lg-5 {
            width: 41.66666667%;
         }

         .col-lg-4 {
            width: 33.33333333%;
         }

         .col-lg-3 {
            width: 25%;
         }

         .col-lg-2 {
            width: 16.66666667%;
         }

         .col-lg-1 {
            width: 8.33333333%;
         }

         .col-lg-pull-12 {
            right: 100%;
         }

         .col-lg-pull-11 {
            right: 91.66666667%;
         }

         .col-lg-pull-10 {
            right: 83.33333333%;
         }

         .col-lg-pull-9 {
            right: 75%;
         }

         .col-lg-pull-8 {
            right: 66.66666667%;
         }

         .col-lg-pull-7 {
            right: 58.33333333%;
         }

         .col-lg-pull-6 {
            right: 50%;
         }

         .col-lg-pull-5 {
            right: 41.66666667%;
         }

         .col-lg-pull-4 {
            right: 33.33333333%;
         }

         .col-lg-pull-3 {
            right: 25%;
         }

         .col-lg-pull-2 {
            right: 16.66666667%;
         }

         .col-lg-pull-1 {
            right: 8.33333333%;
         }

         .col-lg-pull-0 {
            right: auto;
         }

         .col-lg-push-12 {
            left: 100%;
         }

         .col-lg-push-11 {
            left: 91.66666667%;
         }

         .col-lg-push-10 {
            left: 83.33333333%;
         }

         .col-lg-push-9 {
            left: 75%;
         }

         .col-lg-push-8 {
            left: 66.66666667%;
         }

         .col-lg-push-7 {
            left: 58.33333333%;
         }

         .col-lg-push-6 {
            left: 50%;
         }

         .col-lg-push-5 {
            left: 41.66666667%;
         }

         .col-lg-push-4 {
            left: 33.33333333%;
         }

         .col-lg-push-3 {
            left: 25%;
         }

         .col-lg-push-2 {
            left: 16.66666667%;
         }

         .col-lg-push-1 {
            left: 8.33333333%;
         }

         .col-lg-push-0 {
            left: auto;
         }

         .col-lg-offset-12 {
            margin-left: 100%;
         }

         .col-lg-offset-11 {
            margin-left: 91.66666667%;
         }

         .col-lg-offset-10 {
            margin-left: 83.33333333%;
         }

         .col-lg-offset-9 {
            margin-left: 75%;
         }

         .col-lg-offset-8 {
            margin-left: 66.66666667%;
         }

         .col-lg-offset-7 {
            margin-left: 58.33333333%;
         }

         .col-lg-offset-6 {
            margin-left: 50%;
         }

         .col-lg-offset-5 {
            margin-left: 41.66666667%;
         }

         .col-lg-offset-4 {
            margin-left: 33.33333333%;
         }

         .col-lg-offset-3 {
            margin-left: 25%;
         }

         .col-lg-offset-2 {
            margin-left: 16.66666667%;
         }

         .col-lg-offset-1 {
            margin-left: 8.33333333%;
         }

         .col-lg-offset-0 {
            margin-left: 0;
         }
      }

      table {
         background-color: transparent;
      }

      caption {
         padding-top: 8px;
         padding-bottom: 8px;
         color: #777;
         text-align: left;
      }

      th {
         text-align: left;
      }

      .table {
         width: 100%;
         max-width: 100%;
         margin-bottom: 20px;
      }

      .table>thead>tr>th,
      .table>tbody>tr>th,
      .table>tfoot>tr>th,
      .table>thead>tr>td,
      .table>tbody>tr>td,
      .table>tfoot>tr>td {
         padding: 8px;
         line-height: 1.42857143;
         vertical-align: top;
         border-top: 1px solid #ddd;
      }

      .table>thead>tr>th {
         vertical-align: bottom;
         border-bottom: 2px solid #ddd;
      }

      .table>caption+thead>tr:first-child>th,
      .table>colgroup+thead>tr:first-child>th,
      .table>thead:first-child>tr:first-child>th,
      .table>caption+thead>tr:first-child>td,
      .table>colgroup+thead>tr:first-child>td,
      .table>thead:first-child>tr:first-child>td {
         border-top: 0;
      }

      .table>tbody+tbody {
         border-top: 2px solid #ddd;
      }

      .table .table {
         background-color: #fff;
      }

      .table-condensed>thead>tr>th,
      .table-condensed>tbody>tr>th,
      .table-condensed>tfoot>tr>th,
      .table-condensed>thead>tr>td,
      .table-condensed>tbody>tr>td,
      .table-condensed>tfoot>tr>td {
         padding: 5px;
      }

      .table-bordered {
         border: 1px solid #ddd;
      }

      .table-bordered>thead>tr>th,
      .table-bordered>tbody>tr>th,
      .table-bordered>tfoot>tr>th,
      .table-bordered>thead>tr>td,
      .table-bordered>tbody>tr>td,
      .table-bordered>tfoot>tr>td {
         border: 1px solid #ddd;
      }

      .table-bordered>thead>tr>th,
      .table-bordered>thead>tr>td {
         border-bottom-width: 2px;
      }

      .table-striped>tbody>tr:nth-of-type(odd) {
         background-color: #f9f9f9;
      }

      .table-hover>tbody>tr:hover {
         background-color: #f5f5f5;
      }

      table col[class*="col-"] {
         position: static;
         display: table-column;
         float: none;
      }

      table td[class*="col-"],
      table th[class*="col-"] {
         position: static;
         display: table-cell;
         float: none;
      }

      .table>thead>tr>td.active,
      .table>tbody>tr>td.active,
      .table>tfoot>tr>td.active,
      .table>thead>tr>th.active,
      .table>tbody>tr>th.active,
      .table>tfoot>tr>th.active,
      .table>thead>tr.active>td,
      .table>tbody>tr.active>td,
      .table>tfoot>tr.active>td,
      .table>thead>tr.active>th,
      .table>tbody>tr.active>th,
      .table>tfoot>tr.active>th {
         background-color: #f5f5f5;
      }

      .table-hover>tbody>tr>td.active:hover,
      .table-hover>tbody>tr>th.active:hover,
      .table-hover>tbody>tr.active:hover>td,
      .table-hover>tbody>tr:hover>.active,
      .table-hover>tbody>tr.active:hover>th {
         background-color: #e8e8e8;
      }

      .table>thead>tr>td.success,
      .table>tbody>tr>td.success,
      .table>tfoot>tr>td.success,
      .table>thead>tr>th.success,
      .table>tbody>tr>th.success,
      .table>tfoot>tr>th.success,
      .table>thead>tr.success>td,
      .table>tbody>tr.success>td,
      .table>tfoot>tr.success>td,
      .table>thead>tr.success>th,
      .table>tbody>tr.success>th,
      .table>tfoot>tr.success>th {
         background-color: #dff0d8;
      }

      .table-hover>tbody>tr>td.success:hover,
      .table-hover>tbody>tr>th.success:hover,
      .table-hover>tbody>tr.success:hover>td,
      .table-hover>tbody>tr:hover>.success,
      .table-hover>tbody>tr.success:hover>th {
         background-color: #d0e9c6;
      }

      .table>thead>tr>td.info,
      .table>tbody>tr>td.info,
      .table>tfoot>tr>td.info,
      .table>thead>tr>th.info,
      .table>tbody>tr>th.info,
      .table>tfoot>tr>th.info,
      .table>thead>tr.info>td,
      .table>tbody>tr.info>td,
      .table>tfoot>tr.info>td,
      .table>thead>tr.info>th,
      .table>tbody>tr.info>th,
      .table>tfoot>tr.info>th {
         background-color: #d9edf7;
      }

      .table-hover>tbody>tr>td.info:hover,
      .table-hover>tbody>tr>th.info:hover,
      .table-hover>tbody>tr.info:hover>td,
      .table-hover>tbody>tr:hover>.info,
      .table-hover>tbody>tr.info:hover>th {
         background-color: #c4e3f3;
      }

      .table>thead>tr>td.warning,
      .table>tbody>tr>td.warning,
      .table>tfoot>tr>td.warning,
      .table>thead>tr>th.warning,
      .table>tbody>tr>th.warning,
      .table>tfoot>tr>th.warning,
      .table>thead>tr.warning>td,
      .table>tbody>tr.warning>td,
      .table>tfoot>tr.warning>td,
      .table>thead>tr.warning>th,
      .table>tbody>tr.warning>th,
      .table>tfoot>tr.warning>th {
         background-color: #fcf8e3;
      }

      .table-hover>tbody>tr>td.warning:hover,
      .table-hover>tbody>tr>th.warning:hover,
      .table-hover>tbody>tr.warning:hover>td,
      .table-hover>tbody>tr:hover>.warning,
      .table-hover>tbody>tr.warning:hover>th {
         background-color: #faf2cc;
      }

      .table>thead>tr>td.danger,
      .table>tbody>tr>td.danger,
      .table>tfoot>tr>td.danger,
      .table>thead>tr>th.danger,
      .table>tbody>tr>th.danger,
      .table>tfoot>tr>th.danger,
      .table>thead>tr.danger>td,
      .table>tbody>tr.danger>td,
      .table>tfoot>tr.danger>td,
      .table>thead>tr.danger>th,
      .table>tbody>tr.danger>th,
      .table>tfoot>tr.danger>th {
         background-color: #f2dede;
      }

      .table-hover>tbody>tr>td.danger:hover,
      .table-hover>tbody>tr>th.danger:hover,
      .table-hover>tbody>tr.danger:hover>td,
      .table-hover>tbody>tr:hover>.danger,
      .table-hover>tbody>tr.danger:hover>th {
         background-color: #ebcccc;
      }

      .table-responsive {
         min-height: .01%;
         overflow-x: auto;
      }

      @media screen and (max-width: 767px) {
         .table-responsive {
            width: 100%;
            margin-bottom: 15px;
            overflow-y: hidden;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            border: 1px solid #ddd;
         }

         .table-responsive>.table {
            margin-bottom: 0;
         }

         .table-responsive>.table>thead>tr>th,
         .table-responsive>.table>tbody>tr>th,
         .table-responsive>.table>tfoot>tr>th,
         .table-responsive>.table>thead>tr>td,
         .table-responsive>.table>tbody>tr>td,
         .table-responsive>.table>tfoot>tr>td {
            white-space: nowrap;
         }

         .table-responsive>.table-bordered {
            border: 0;
         }

         .table-responsive>.table-bordered>thead>tr>th:first-child,
         .table-responsive>.table-bordered>tbody>tr>th:first-child,
         .table-responsive>.table-bordered>tfoot>tr>th:first-child,
         .table-responsive>.table-bordered>thead>tr>td:first-child,
         .table-responsive>.table-bordered>tbody>tr>td:first-child,
         .table-responsive>.table-bordered>tfoot>tr>td:first-child {
            border-left: 0;
         }

         .table-responsive>.table-bordered>thead>tr>th:last-child,
         .table-responsive>.table-bordered>tbody>tr>th:last-child,
         .table-responsive>.table-bordered>tfoot>tr>th:last-child,
         .table-responsive>.table-bordered>thead>tr>td:last-child,
         .table-responsive>.table-bordered>tbody>tr>td:last-child,
         .table-responsive>.table-bordered>tfoot>tr>td:last-child {
            border-right: 0;
         }

         .table-responsive>.table-bordered>tbody>tr:last-child>th,
         .table-responsive>.table-bordered>tfoot>tr:last-child>th,
         .table-responsive>.table-bordered>tbody>tr:last-child>td,
         .table-responsive>.table-bordered>tfoot>tr:last-child>td {
            border-bottom: 0;
         }
      }

      fieldset {
         min-width: 0;
         padding: 0;
         margin: 0;
         border: 0;
      }

      legend {
         display: block;
         width: 100%;
         padding: 0;
         margin-bottom: 20px;
         font-size: 21px;
         line-height: inherit;
         color: #333;
         border: 0;
         border-bottom: 1px solid #e5e5e5;
      }

      label {
         display: inline-block;
         max-width: 100%;
         margin-bottom: 5px;
         font-weight: bold;
      }

      input[type="search"] {
         -webkit-box-sizing: border-box;
         -moz-box-sizing: border-box;
         box-sizing: border-box;
      }

      input[type="radio"],
      input[type="checkbox"] {
         margin: 4px 0 0;
         margin-top: 1px \9;
         line-height: normal;
      }

      input[type="file"] {
         display: block;
      }

      input[type="range"] {
         display: block;
         width: 100%;
      }

      select[multiple],
      select[size] {
         height: auto;
      }

      input[type="file"]:focus,
      input[type="radio"]:focus,
      input[type="checkbox"]:focus {
         outline: 5px auto -webkit-focus-ring-color;
         outline-offset: -2px;
      }

      output {
         display: block;
         padding-top: 7px;
         font-size: 14px;
         line-height: 1.42857143;
         color: #555;
      }

      .form-control {
         display: block;
         width: 100%;
         height: 34px;
         padding: 6px 12px;
         font-size: 14px;
         line-height: 1.42857143;
         color: #555;
         background-color: #fff;
         background-image: none;
         border: 1px solid #ccc;
         border-radius: 4px;
         -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
         box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
         -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
         -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
         transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
      }

      .form-control:focus {
         border-color: #66afe9;
         outline: 0;
         -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
         box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
      }

      .form-control::-moz-placeholder {
         color: #999;
         opacity: 1;
      }

      .form-control:-ms-input-placeholder {
         color: #999;
      }

      .form-control::-webkit-input-placeholder {
         color: #999;
      }

      .form-control::-ms-expand {
         background-color: transparent;
         border: 0;
      }

      .form-control[disabled],
      .form-control[readonly],
      fieldset[disabled] .form-control {
         background-color: #eee;
         opacity: 1;
      }

      .form-control[disabled],
      fieldset[disabled] .form-control {
         cursor: not-allowed;
      }

      textarea.form-control {
         height: auto;
      }

      input[type="search"] {
         -webkit-appearance: none;
      }

      @media screen and (-webkit-min-device-pixel-ratio: 0) {

         input[type="date"].form-control,
         input[type="time"].form-control,
         input[type="datetime-local"].form-control,
         input[type="month"].form-control {
            line-height: 34px;
         }

         input[type="date"].input-sm,
         input[type="time"].input-sm,
         input[type="datetime-local"].input-sm,
         input[type="month"].input-sm,
         .input-group-sm input[type="date"],
         .input-group-sm input[type="time"],
         .input-group-sm input[type="datetime-local"],
         .input-group-sm input[type="month"] {
            line-height: 30px;
         }

         input[type="date"].input-lg,
         input[type="time"].input-lg,
         input[type="datetime-local"].input-lg,
         input[type="month"].input-lg,
         .input-group-lg input[type="date"],
         .input-group-lg input[type="time"],
         .input-group-lg input[type="datetime-local"],
         .input-group-lg input[type="month"] {
            line-height: 46px;
         }
      }

      .form-group {
         margin-bottom: 15px;
      }

      .radio,
      .checkbox {
         position: relative;
         display: block;
         margin-top: 10px;
         margin-bottom: 10px;
      }

      .radio label,
      .checkbox label {
         min-height: 20px;
         padding-left: 20px;
         margin-bottom: 0;
         font-weight: normal;
         cursor: pointer;
      }

      .radio input[type="radio"],
      .radio-inline input[type="radio"],
      .checkbox input[type="checkbox"],
      .checkbox-inline input[type="checkbox"] {
         position: absolute;
         margin-top: 4px \9;
         margin-left: -20px;
      }

      .radio+.radio,
      .checkbox+.checkbox {
         margin-top: -5px;
      }

      .radio-inline,
      .checkbox-inline {
         position: relative;
         display: inline-block;
         padding-left: 20px;
         margin-bottom: 0;
         font-weight: normal;
         vertical-align: middle;
         cursor: pointer;
      }

      .radio-inline+.radio-inline,
      .checkbox-inline+.checkbox-inline {
         margin-top: 0;
         margin-left: 10px;
      }

      input[type="radio"][disabled],
      input[type="checkbox"][disabled],
      input[type="radio"].disabled,
      input[type="checkbox"].disabled,
      fieldset[disabled] input[type="radio"],
      fieldset[disabled] input[type="checkbox"] {
         cursor: not-allowed;
      }

      .radio-inline.disabled,
      .checkbox-inline.disabled,
      fieldset[disabled] .radio-inline,
      fieldset[disabled] .checkbox-inline {
         cursor: not-allowed;
      }

      .radio.disabled label,
      .checkbox.disabled label,
      fieldset[disabled] .radio label,
      fieldset[disabled] .checkbox label {
         cursor: not-allowed;
      }

      .form-control-static {
         min-height: 34px;
         padding-top: 7px;
         padding-bottom: 7px;
         margin-bottom: 0;
      }

      .form-control-static.input-lg,
      .form-control-static.input-sm {
         padding-right: 0;
         padding-left: 0;
      }

      .input-sm {
         height: 30px;
         padding: 5px 10px;
         font-size: 12px;
         line-height: 1.5;
         border-radius: 3px;
      }

      select.input-sm {
         height: 30px;
         line-height: 30px;
      }

      textarea.input-sm,
      select[multiple].input-sm {
         height: auto;
      }

      .form-group-sm .form-control {
         height: 30px;
         padding: 5px 10px;
         font-size: 12px;
         line-height: 1.5;
         border-radius: 3px;
      }

      .form-group-sm select.form-control {
         height: 30px;
         line-height: 30px;
      }

      .form-group-sm textarea.form-control,
      .form-group-sm select[multiple].form-control {
         height: auto;
      }

      .form-group-sm .form-control-static {
         height: 30px;
         min-height: 32px;
         padding: 6px 10px;
         font-size: 12px;
         line-height: 1.5;
      }

      .input-lg {
         height: 46px;
         padding: 10px 16px;
         font-size: 18px;
         line-height: 1.3333333;
         border-radius: 6px;
      }

      select.input-lg {
         height: 46px;
         line-height: 46px;
      }

      textarea.input-lg,
      select[multiple].input-lg {
         height: auto;
      }

      .form-group-lg .form-control {
         height: 46px;
         padding: 10px 16px;
         font-size: 18px;
         line-height: 1.3333333;
         border-radius: 6px;
      }

      .form-group-lg select.form-control {
         height: 46px;
         line-height: 46px;
      }

      .form-group-lg textarea.form-control,
      .form-group-lg select[multiple].form-control {
         height: auto;
      }

      .form-group-lg .form-control-static {
         height: 46px;
         min-height: 38px;
         padding: 11px 16px;
         font-size: 18px;
         line-height: 1.3333333;
      }

      .has-feedback {
         position: relative;
      }

      .has-feedback .form-control {
         padding-right: 42.5px;
      }

      .form-control-feedback {
         position: absolute;
         top: 0;
         right: 0;
         z-index: 2;
         display: block;
         width: 34px;
         height: 34px;
         line-height: 34px;
         text-align: center;
         pointer-events: none;
      }

      .input-lg+.form-control-feedback,
      .input-group-lg+.form-control-feedback,
      .form-group-lg .form-control+.form-control-feedback {
         width: 46px;
         height: 46px;
         line-height: 46px;
      }

      .input-sm+.form-control-feedback,
      .input-group-sm+.form-control-feedback,
      .form-group-sm .form-control+.form-control-feedback {
         width: 30px;
         height: 30px;
         line-height: 30px;
      }

      .has-success .help-block,
      .has-success .control-label,
      .has-success .radio,
      .has-success .checkbox,
      .has-success .radio-inline,
      .has-success .checkbox-inline,
      .has-success.radio label,
      .has-success.checkbox label,
      .has-success.radio-inline label,
      .has-success.checkbox-inline label {
         color: #3c763d;
      }

      .has-success .form-control {
         border-color: #3c763d;
         -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
         box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
      }

      .has-success .form-control:focus {
         border-color: #2b542c;
         -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168;
         box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168;
      }

      .has-success .input-group-addon {
         color: #3c763d;
         background-color: #dff0d8;
         border-color: #3c763d;
      }

      .has-success .form-control-feedback {
         color: #3c763d;
      }

      .has-warning .help-block,
      .has-warning .control-label,
      .has-warning .radio,
      .has-warning .checkbox,
      .has-warning .radio-inline,
      .has-warning .checkbox-inline,
      .has-warning.radio label,
      .has-warning.checkbox label,
      .has-warning.radio-inline label,
      .has-warning.checkbox-inline label {
         color: #8a6d3b;
      }

      .has-warning .form-control {
         border-color: #8a6d3b;
         -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
         box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
      }

      .has-warning .form-control:focus {
         border-color: #66512c;
         -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b;
         box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b;
      }

      .has-warning .input-group-addon {
         color: #8a6d3b;
         background-color: #fcf8e3;
         border-color: #8a6d3b;
      }

      .has-warning .form-control-feedback {
         color: #8a6d3b;
      }

      .has-error .help-block,
      .has-error .control-label,
      .has-error .radio,
      .has-error .checkbox,
      .has-error .radio-inline,
      .has-error .checkbox-inline,
      .has-error.radio label,
      .has-error.checkbox label,
      .has-error.radio-inline label,
      .has-error.checkbox-inline label {
         color: #a94442;
      }

      .has-error .form-control {
         border-color: #a94442;
         -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
         box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
      }

      .has-error .form-control:focus {
         border-color: #843534;
         -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
         box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483;
      }

      .has-error .input-group-addon {
         color: #a94442;
         background-color: #f2dede;
         border-color: #a94442;
      }

      .has-error .form-control-feedback {
         color: #a94442;
      }

      .has-feedback label~.form-control-feedback {
         top: 25px;
      }

      .has-feedback label.sr-only~.form-control-feedback {
         top: 0;
      }

      .help-block {
         display: block;
         margin-top: 5px;
         margin-bottom: 10px;
         color: #737373;
      }

      @media (min-width: 768px) {
         .form-inline .form-group {
            display: inline-block;
            margin-bottom: 0;
            vertical-align: middle;
         }

         .form-inline .form-control {
            display: inline-block;
            width: auto;
            vertical-align: middle;
         }

         .form-inline .form-control-static {
            display: inline-block;
         }

         .form-inline .input-group {
            display: inline-table;
            vertical-align: middle;
         }

         .form-inline .input-group .input-group-addon,
         .form-inline .input-group .input-group-btn,
         .form-inline .input-group .form-control {
            width: auto;
         }

         .form-inline .input-group>.form-control {
            width: 100%;
         }

         .form-inline .control-label {
            margin-bottom: 0;
            vertical-align: middle;
         }

         .form-inline .radio,
         .form-inline .checkbox {
            display: inline-block;
            margin-top: 0;
            margin-bottom: 0;
            vertical-align: middle;
         }

         .form-inline .radio label,
         .form-inline .checkbox label {
            padding-left: 0;
         }

         .form-inline .radio input[type="radio"],
         .form-inline .checkbox input[type="checkbox"] {
            position: relative;
            margin-left: 0;
         }

         .form-inline .has-feedback .form-control-feedback {
            top: 0;
         }
      }

      .form-horizontal .radio,
      .form-horizontal .checkbox,
      .form-horizontal .radio-inline,
      .form-horizontal .checkbox-inline {
         padding-top: 7px;
         margin-top: 0;
         margin-bottom: 0;
      }

      .form-horizontal .radio,
      .form-horizontal .checkbox {
         min-height: 27px;
      }

      .form-horizontal .form-group {
         margin-right: -15px;
         margin-left: -15px;
      }

      @media (min-width: 768px) {
         .form-horizontal .control-label {
            padding-top: 7px;
            margin-bottom: 0;
            text-align: right;
         }
      }

      .form-horizontal .has-feedback .form-control-feedback {
         right: 15px;
      }

      @media (min-width: 768px) {
         .form-horizontal .form-group-lg .control-label {
            padding-top: 11px;
            font-size: 18px;
         }
      }

      @media (min-width: 768px) {
         .form-horizontal .form-group-sm .control-label {
            padding-top: 6px;
            font-size: 12px;
         }
      }

      .btn {
         display: inline-block;
         padding: 6px 12px;
         margin-bottom: 0;
         font-size: 14px;
         font-weight: normal;
         line-height: 1.42857143;
         text-align: center;
         white-space: nowrap;
         vertical-align: middle;
         -ms-touch-action: manipulation;
         touch-action: manipulation;
         cursor: pointer;
         -webkit-user-select: none;
         -moz-user-select: none;
         -ms-user-select: none;
         user-select: none;
         background-image: none;
         border: 1px solid transparent;
         border-radius: 4px;
      }

      .btn:focus,
      .btn:active:focus,
      .btn.active:focus,
      .btn.focus,
      .btn:active.focus,
      .btn.active.focus {
         outline: 5px auto -webkit-focus-ring-color;
         outline-offset: -2px;
      }

      .btn:hover,
      .btn:focus,
      .btn.focus {
         color: #333;
         text-decoration: none;
      }

      .btn:active,
      .btn.active {
         background-image: none;
         outline: 0;
         -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
         box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
      }

      .btn.disabled,
      .btn[disabled],
      fieldset[disabled] .btn {
         cursor: not-allowed;
         filter: alpha(opacity=65);
         -webkit-box-shadow: none;
         box-shadow: none;
         opacity: .65;
      }

      a.btn.disabled,
      fieldset[disabled] a.btn {
         pointer-events: none;
      }

      .btn-default {
         color: #333;
         background-color: #fff;
         border-color: #ccc;
      }

      .btn-default:focus,
      .btn-default.focus {
         color: #333;
         background-color: #e6e6e6;
         border-color: #8c8c8c;
      }

      .btn-default:hover {
         color: #333;
         background-color: #e6e6e6;
         border-color: #adadad;
      }

      .btn-default:active,
      .btn-default.active,
      .open>.dropdown-toggle.btn-default {
         color: #333;
         background-color: #e6e6e6;
         border-color: #adadad;
      }

      .btn-default:active:hover,
      .btn-default.active:hover,
      .open>.dropdown-toggle.btn-default:hover,
      .btn-default:active:focus,
      .btn-default.active:focus,
      .open>.dropdown-toggle.btn-default:focus,
      .btn-default:active.focus,
      .btn-default.active.focus,
      .open>.dropdown-toggle.btn-default.focus {
         color: #333;
         background-color: #d4d4d4;
         border-color: #8c8c8c;
      }

      .btn-default:active,
      .btn-default.active,
      .open>.dropdown-toggle.btn-default {
         background-image: none;
      }

      .btn-default.disabled:hover,
      .btn-default[disabled]:hover,
      fieldset[disabled] .btn-default:hover,
      .btn-default.disabled:focus,
      .btn-default[disabled]:focus,
      fieldset[disabled] .btn-default:focus,
      .btn-default.disabled.focus,
      .btn-default[disabled].focus,
      fieldset[disabled] .btn-default.focus {
         background-color: #fff;
         border-color: #ccc;
      }

      .btn-default .badge {
         color: #fff;
         background-color: #333;
      }

      .btn-primary {
         color: #fff;
         background-color: #337ab7;
         border-color: #2e6da4;
      }

      .btn-primary:focus,
      .btn-primary.focus {
         color: #fff;
         background-color: #286090;
         border-color: #122b40;
      }

      .btn-primary:hover {
         color: #fff;
         background-color: #286090;
         border-color: #204d74;
      }

      .btn-primary:active,
      .btn-primary.active,
      .open>.dropdown-toggle.btn-primary {
         color: #fff;
         background-color: #286090;
         border-color: #204d74;
      }

      .btn-primary:active:hover,
      .btn-primary.active:hover,
      .open>.dropdown-toggle.btn-primary:hover,
      .btn-primary:active:focus,
      .btn-primary.active:focus,
      .open>.dropdown-toggle.btn-primary:focus,
      .btn-primary:active.focus,
      .btn-primary.active.focus,
      .open>.dropdown-toggle.btn-primary.focus {
         color: #fff;
         background-color: #204d74;
         border-color: #122b40;
      }

      .btn-primary:active,
      .btn-primary.active,
      .open>.dropdown-toggle.btn-primary {
         background-image: none;
      }

      .btn-primary.disabled:hover,
      .btn-primary[disabled]:hover,
      fieldset[disabled] .btn-primary:hover,
      .btn-primary.disabled:focus,
      .btn-primary[disabled]:focus,
      fieldset[disabled] .btn-primary:focus,
      .btn-primary.disabled.focus,
      .btn-primary[disabled].focus,
      fieldset[disabled] .btn-primary.focus {
         background-color: #337ab7;
         border-color: #2e6da4;
      }

      .btn-primary .badge {
         color: #337ab7;
         background-color: #fff;
      }

      .btn-success {
         color: #fff;
         background-color: #5cb85c;
         border-color: #4cae4c;
      }

      .btn-success:focus,
      .btn-success.focus {
         color: #fff;
         background-color: #449d44;
         border-color: #255625;
      }

      .btn-success:hover {
         color: #fff;
         background-color: #449d44;
         border-color: #398439;
      }

      .btn-success:active,
      .btn-success.active,
      .open>.dropdown-toggle.btn-success {
         color: #fff;
         background-color: #449d44;
         border-color: #398439;
      }

      .btn-success:active:hover,
      .btn-success.active:hover,
      .open>.dropdown-toggle.btn-success:hover,
      .btn-success:active:focus,
      .btn-success.active:focus,
      .open>.dropdown-toggle.btn-success:focus,
      .btn-success:active.focus,
      .btn-success.active.focus,
      .open>.dropdown-toggle.btn-success.focus {
         color: #fff;
         background-color: #398439;
         border-color: #255625;
      }

      .btn-success:active,
      .btn-success.active,
      .open>.dropdown-toggle.btn-success {
         background-image: none;
      }

      .btn-success.disabled:hover,
      .btn-success[disabled]:hover,
      fieldset[disabled] .btn-success:hover,
      .btn-success.disabled:focus,
      .btn-success[disabled]:focus,
      fieldset[disabled] .btn-success:focus,
      .btn-success.disabled.focus,
      .btn-success[disabled].focus,
      fieldset[disabled] .btn-success.focus {
         background-color: #5cb85c;
         border-color: #4cae4c;
      }

      .btn-success .badge {
         color: #5cb85c;
         background-color: #fff;
      }

      .btn-info {
         color: #fff;
         background-color: #5bc0de;
         border-color: #46b8da;
      }

      .btn-info:focus,
      .btn-info.focus {
         color: #fff;
         background-color: #31b0d5;
         border-color: #1b6d85;
      }

      .btn-info:hover {
         color: #fff;
         background-color: #31b0d5;
         border-color: #269abc;
      }

      .btn-info:active,
      .btn-info.active,
      .open>.dropdown-toggle.btn-info {
         color: #fff;
         background-color: #31b0d5;
         border-color: #269abc;
      }

      .btn-info:active:hover,
      .btn-info.active:hover,
      .open>.dropdown-toggle.btn-info:hover,
      .btn-info:active:focus,
      .btn-info.active:focus,
      .open>.dropdown-toggle.btn-info:focus,
      .btn-info:active.focus,
      .btn-info.active.focus,
      .open>.dropdown-toggle.btn-info.focus {
         color: #fff;
         background-color: #269abc;
         border-color: #1b6d85;
      }

      .btn-info:active,
      .btn-info.active,
      .open>.dropdown-toggle.btn-info {
         background-image: none;
      }

      .btn-info.disabled:hover,
      .btn-info[disabled]:hover,
      fieldset[disabled] .btn-info:hover,
      .btn-info.disabled:focus,
      .btn-info[disabled]:focus,
      fieldset[disabled] .btn-info:focus,
      .btn-info.disabled.focus,
      .btn-info[disabled].focus,
      fieldset[disabled] .btn-info.focus {
         background-color: #5bc0de;
         border-color: #46b8da;
      }

      .btn-info .badge {
         color: #5bc0de;
         background-color: #fff;
      }

      .btn-warning {
         color: #fff;
         background-color: #f0ad4e;
         border-color: #eea236;
      }

      .btn-warning:focus,
      .btn-warning.focus {
         color: #fff;
         background-color: #ec971f;
         border-color: #985f0d;
      }

      .btn-warning:hover {
         color: #fff;
         background-color: #ec971f;
         border-color: #d58512;
      }

      .btn-warning:active,
      .btn-warning.active,
      .open>.dropdown-toggle.btn-warning {
         color: #fff;
         background-color: #ec971f;
         border-color: #d58512;
      }

      .btn-warning:active:hover,
      .btn-warning.active:hover,
      .open>.dropdown-toggle.btn-warning:hover,
      .btn-warning:active:focus,
      .btn-warning.active:focus,
      .open>.dropdown-toggle.btn-warning:focus,
      .btn-warning:active.focus,
      .btn-warning.active.focus,
      .open>.dropdown-toggle.btn-warning.focus {
         color: #fff;
         background-color: #d58512;
         border-color: #985f0d;
      }

      .btn-warning:active,
      .btn-warning.active,
      .open>.dropdown-toggle.btn-warning {
         background-image: none;
      }

      .btn-warning.disabled:hover,
      .btn-warning[disabled]:hover,
      fieldset[disabled] .btn-warning:hover,
      .btn-warning.disabled:focus,
      .btn-warning[disabled]:focus,
      fieldset[disabled] .btn-warning:focus,
      .btn-warning.disabled.focus,
      .btn-warning[disabled].focus,
      fieldset[disabled] .btn-warning.focus {
         background-color: #f0ad4e;
         border-color: #eea236;
      }

      .btn-warning .badge {
         color: #f0ad4e;
         background-color: #fff;
      }

      .btn-danger {
         color: #fff;
         background-color: #d9534f;
         border-color: #d43f3a;
      }

      .btn-danger:focus,
      .btn-danger.focus {
         color: #fff;
         background-color: #c9302c;
         border-color: #761c19;
      }

      .btn-danger:hover {
         color: #fff;
         background-color: #c9302c;
         border-color: #ac2925;
      }

      .btn-danger:active,
      .btn-danger.active,
      .open>.dropdown-toggle.btn-danger {
         color: #fff;
         background-color: #c9302c;
         border-color: #ac2925;
      }

      .btn-danger:active:hover,
      .btn-danger.active:hover,
      .open>.dropdown-toggle.btn-danger:hover,
      .btn-danger:active:focus,
      .btn-danger.active:focus,
      .open>.dropdown-toggle.btn-danger:focus,
      .btn-danger:active.focus,
      .btn-danger.active.focus,
      .open>.dropdown-toggle.btn-danger.focus {
         color: #fff;
         background-color: #ac2925;
         border-color: #761c19;
      }

      .btn-danger:active,
      .btn-danger.active,
      .open>.dropdown-toggle.btn-danger {
         background-image: none;
      }

      .btn-danger.disabled:hover,
      .btn-danger[disabled]:hover,
      fieldset[disabled] .btn-danger:hover,
      .btn-danger.disabled:focus,
      .btn-danger[disabled]:focus,
      fieldset[disabled] .btn-danger:focus,
      .btn-danger.disabled.focus,
      .btn-danger[disabled].focus,
      fieldset[disabled] .btn-danger.focus {
         background-color: #d9534f;
         border-color: #d43f3a;
      }

      .btn-danger .badge {
         color: #d9534f;
         background-color: #fff;
      }

      .btn-link {
         font-weight: normal;
         color: #337ab7;
         border-radius: 0;
      }

      .btn-link,
      .btn-link:active,
      .btn-link.active,
      .btn-link[disabled],
      fieldset[disabled] .btn-link {
         background-color: transparent;
         -webkit-box-shadow: none;
         box-shadow: none;
      }

      .btn-link,
      .btn-link:hover,
      .btn-link:focus,
      .btn-link:active {
         border-color: transparent;
      }

      .btn-link:hover,
      .btn-link:focus {
         color: #23527c;
         text-decoration: underline;
         background-color: transparent;
      }

      .btn-link[disabled]:hover,
      fieldset[disabled] .btn-link:hover,
      .btn-link[disabled]:focus,
      fieldset[disabled] .btn-link:focus {
         color: #777;
         text-decoration: none;
      }

      .btn-lg,
      .btn-group-lg>.btn {
         padding: 10px 16px;
         font-size: 18px;
         line-height: 1.3333333;
         border-radius: 6px;
      }

      .btn-sm,
      .btn-group-sm>.btn {
         padding: 5px 10px;
         font-size: 12px;
         line-height: 1.5;
         border-radius: 3px;
      }

      .btn-xs,
      .btn-group-xs>.btn {
         padding: 1px 5px;
         font-size: 12px;
         line-height: 1.5;
         border-radius: 3px;
      }

      .btn-block {
         display: block;
         width: 100%;
      }

      .btn-block+.btn-block {
         margin-top: 5px;
      }

      input[type="submit"].btn-block,
      input[type="reset"].btn-block,
      input[type="button"].btn-block {
         width: 100%;
      }

      .fade {
         opacity: 0;
         -webkit-transition: opacity .15s linear;
         -o-transition: opacity .15s linear;
         transition: opacity .15s linear;
      }

      .fade.in {
         opacity: 1;
      }

      .collapse {
         display: none;
      }

      .collapse.in {
         display: block;
      }

      tr.collapse.in {
         display: table-row;
      }

      tbody.collapse.in {
         display: table-row-group;
      }

      .collapsing {
         position: relative;
         height: 0;
         overflow: hidden;
         -webkit-transition-timing-function: ease;
         -o-transition-timing-function: ease;
         transition-timing-function: ease;
         -webkit-transition-duration: .35s;
         -o-transition-duration: .35s;
         transition-duration: .35s;
         -webkit-transition-property: height, visibility;
         -o-transition-property: height, visibility;
         transition-property: height, visibility;
      }

      .caret {
         display: inline-block;
         width: 0;
         height: 0;
         margin-left: 2px;
         vertical-align: middle;
         border-top: 4px dashed;
         border-top: 4px solid \9;
         border-right: 4px solid transparent;
         border-left: 4px solid transparent;
      }

      .dropup,
      .dropdown {
         position: relative;
      }

      .dropdown-toggle:focus {
         outline: 0;
      }

      .dropdown-menu {
         position: absolute;
         top: 100%;
         left: 0;
         z-index: 1000;
         display: none;
         float: left;
         min-width: 160px;
         padding: 5px 0;
         margin: 2px 0 0;
         font-size: 14px;
         text-align: left;
         list-style: none;
         background-color: #fff;
         -webkit-background-clip: padding-box;
         background-clip: padding-box;
         border: 1px solid #ccc;
         border: 1px solid rgba(0, 0, 0, .15);
         border-radius: 4px;
         -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
         box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
      }

      .dropdown-menu.pull-right {
         right: 0;
         left: auto;
      }

      .dropdown-menu .divider {
         height: 1px;
         margin: 9px 0;
         overflow: hidden;
         background-color: #e5e5e5;
      }

      .dropdown-menu>li>a {
         display: block;
         padding: 3px 20px;
         clear: both;
         font-weight: normal;
         line-height: 1.42857143;
         color: #333;
         white-space: nowrap;
      }

      .dropdown-menu>li>a:hover,
      .dropdown-menu>li>a:focus {
         color: #262626;
         text-decoration: none;
         background-color: #f5f5f5;
      }

      .dropdown-menu>.active>a,
      .dropdown-menu>.active>a:hover,
      .dropdown-menu>.active>a:focus {
         color: #fff;
         text-decoration: none;
         background-color: #337ab7;
         outline: 0;
      }

      .dropdown-menu>.disabled>a,
      .dropdown-menu>.disabled>a:hover,
      .dropdown-menu>.disabled>a:focus {
         color: #777;
      }

      .dropdown-menu>.disabled>a:hover,
      .dropdown-menu>.disabled>a:focus {
         text-decoration: none;
         cursor: not-allowed;
         background-color: transparent;
         background-image: none;
         filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
      }

      .open>.dropdown-menu {
         display: block;
      }

      .open>a {
         outline: 0;
      }

      .dropdown-menu-right {
         right: 0;
         left: auto;
      }

      .dropdown-menu-left {
         right: auto;
         left: 0;
      }

      .dropdown-header {
         display: block;
         padding: 3px 20px;
         font-size: 12px;
         line-height: 1.42857143;
         color: #777;
         white-space: nowrap;
      }

      .dropdown-backdrop {
         position: fixed;
         top: 0;
         right: 0;
         bottom: 0;
         left: 0;
         z-index: 990;
      }

      .pull-right>.dropdown-menu {
         right: 0;
         left: auto;
      }

      .dropup .caret,
      .navbar-fixed-bottom .dropdown .caret {
         content: "";
         border-top: 0;
         border-bottom: 4px dashed;
         border-bottom: 4px solid \9;
      }

      .dropup .dropdown-menu,
      .navbar-fixed-bottom .dropdown .dropdown-menu {
         top: auto;
         bottom: 100%;
         margin-bottom: 2px;
      }

      @media (min-width: 768px) {
         .navbar-right .dropdown-menu {
            right: 0;
            left: auto;
         }

         .navbar-right .dropdown-menu-left {
            right: auto;
            left: 0;
         }
      }

      .btn-group,
      .btn-group-vertical {
         position: relative;
         display: inline-block;
         vertical-align: middle;
      }

      .btn-group>.btn,
      .btn-group-vertical>.btn {
         position: relative;
         float: left;
      }

      .btn-group>.btn:hover,
      .btn-group-vertical>.btn:hover,
      .btn-group>.btn:focus,
      .btn-group-vertical>.btn:focus,
      .btn-group>.btn:active,
      .btn-group-vertical>.btn:active,
      .btn-group>.btn.active,
      .btn-group-vertical>.btn.active {
         z-index: 2;
      }

      .btn-group .btn+.btn,
      .btn-group .btn+.btn-group,
      .btn-group .btn-group+.btn,
      .btn-group .btn-group+.btn-group {
         margin-left: -1px;
      }

      .btn-toolbar {
         margin-left: -5px;
      }

      .btn-toolbar .btn,
      .btn-toolbar .btn-group,
      .btn-toolbar .input-group {
         float: left;
      }

      .btn-toolbar>.btn,
      .btn-toolbar>.btn-group,
      .btn-toolbar>.input-group {
         margin-left: 5px;
      }

      .btn-group>.btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
         border-radius: 0;
      }

      .btn-group>.btn:first-child {
         margin-left: 0;
      }

      .btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle) {
         border-top-right-radius: 0;
         border-bottom-right-radius: 0;
      }

      .btn-group>.btn:last-child:not(:first-child),
      .btn-group>.dropdown-toggle:not(:first-child) {
         border-top-left-radius: 0;
         border-bottom-left-radius: 0;
      }

      .btn-group>.btn-group {
         float: left;
      }

      .btn-group>.btn-group:not(:first-child):not(:last-child)>.btn {
         border-radius: 0;
      }

      .btn-group>.btn-group:first-child:not(:last-child)>.btn:last-child,
      .btn-group>.btn-group:first-child:not(:last-child)>.dropdown-toggle {
         border-top-right-radius: 0;
         border-bottom-right-radius: 0;
      }

      .btn-group>.btn-group:last-child:not(:first-child)>.btn:first-child {
         border-top-left-radius: 0;
         border-bottom-left-radius: 0;
      }

      .btn-group .dropdown-toggle:active,
      .btn-group.open .dropdown-toggle {
         outline: 0;
      }

      .btn-group>.btn+.dropdown-toggle {
         padding-right: 8px;
         padding-left: 8px;
      }

      .btn-group>.btn-lg+.dropdown-toggle {
         padding-right: 12px;
         padding-left: 12px;
      }

      .btn-group.open .dropdown-toggle {
         -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
         box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
      }

      .btn-group.open .dropdown-toggle.btn-link {
         -webkit-box-shadow: none;
         box-shadow: none;
      }

      .btn .caret {
         margin-left: 0;
      }

      .btn-lg .caret {
         border-width: 5px 5px 0;
         border-bottom-width: 0;
      }

      .dropup .btn-lg .caret {
         border-width: 0 5px 5px;
      }

      .btn-group-vertical>.btn,
      .btn-group-vertical>.btn-group,
      .btn-group-vertical>.btn-group>.btn {
         display: block;
         float: none;
         width: 100%;
         max-width: 100%;
      }

      .btn-group-vertical>.btn-group>.btn {
         float: none;
      }

      .btn-group-vertical>.btn+.btn,
      .btn-group-vertical>.btn+.btn-group,
      .btn-group-vertical>.btn-group+.btn,
      .btn-group-vertical>.btn-group+.btn-group {
         margin-top: -1px;
         margin-left: 0;
      }

      .btn-group-vertical>.btn:not(:first-child):not(:last-child) {
         border-radius: 0;
      }

      .btn-group-vertical>.btn:first-child:not(:last-child) {
         border-top-left-radius: 4px;
         border-top-right-radius: 4px;
         border-bottom-right-radius: 0;
         border-bottom-left-radius: 0;
      }

      .btn-group-vertical>.btn:last-child:not(:first-child) {
         border-top-left-radius: 0;
         border-top-right-radius: 0;
         border-bottom-right-radius: 4px;
         border-bottom-left-radius: 4px;
      }

      .btn-group-vertical>.btn-group:not(:first-child):not(:last-child)>.btn {
         border-radius: 0;
      }

      .btn-group-vertical>.btn-group:first-child:not(:last-child)>.btn:last-child,
      .btn-group-vertical>.btn-group:first-child:not(:last-child)>.dropdown-toggle {
         border-bottom-right-radius: 0;
         border-bottom-left-radius: 0;
      }

      .btn-group-vertical>.btn-group:last-child:not(:first-child)>.btn:first-child {
         border-top-left-radius: 0;
         border-top-right-radius: 0;
      }

      .btn-group-justified {
         display: table;
         width: 100%;
         table-layout: fixed;
         border-collapse: separate;
      }

      .btn-group-justified>.btn,
      .btn-group-justified>.btn-group {
         display: table-cell;
         float: none;
         width: 1%;
      }

      .btn-group-justified>.btn-group .btn {
         width: 100%;
      }

      .btn-group-justified>.btn-group .dropdown-menu {
         left: auto;
      }

      [data-toggle="buttons"]>.btn input[type="radio"],
      [data-toggle="buttons"]>.btn-group>.btn input[type="radio"],
      [data-toggle="buttons"]>.btn input[type="checkbox"],
      [data-toggle="buttons"]>.btn-group>.btn input[type="checkbox"] {
         position: absolute;
         clip: rect(0, 0, 0, 0);
         pointer-events: none;
      }

      .input-group {
         position: relative;
         display: table;
         border-collapse: separate;
      }

      .input-group[class*="col-"] {
         float: none;
         padding-right: 0;
         padding-left: 0;
      }

      .input-group .form-control {
         position: relative;
         z-index: 2;
         float: left;
         width: 100%;
         margin-bottom: 0;
      }

      .input-group .form-control:focus {
         z-index: 3;
      }

      .input-group-lg>.form-control,
      .input-group-lg>.input-group-addon,
      .input-group-lg>.input-group-btn>.btn {
         height: 46px;
         padding: 10px 16px;
         font-size: 18px;
         line-height: 1.3333333;
         border-radius: 6px;
      }

      select.input-group-lg>.form-control,
      select.input-group-lg>.input-group-addon,
      select.input-group-lg>.input-group-btn>.btn {
         height: 46px;
         line-height: 46px;
      }

      textarea.input-group-lg>.form-control,
      textarea.input-group-lg>.input-group-addon,
      textarea.input-group-lg>.input-group-btn>.btn,
      select[multiple].input-group-lg>.form-control,
      select[multiple].input-group-lg>.input-group-addon,
      select[multiple].input-group-lg>.input-group-btn>.btn {
         height: auto;
      }

      .input-group-sm>.form-control,
      .input-group-sm>.input-group-addon,
      .input-group-sm>.input-group-btn>.btn {
         height: 30px;
         padding: 5px 10px;
         font-size: 12px;
         line-height: 1.5;
         border-radius: 3px;
      }

      select.input-group-sm>.form-control,
      select.input-group-sm>.input-group-addon,
      select.input-group-sm>.input-group-btn>.btn {
         height: 30px;
         line-height: 30px;
      }

      textarea.input-group-sm>.form-control,
      textarea.input-group-sm>.input-group-addon,
      textarea.input-group-sm>.input-group-btn>.btn,
      select[multiple].input-group-sm>.form-control,
      select[multiple].input-group-sm>.input-group-addon,
      select[multiple].input-group-sm>.input-group-btn>.btn {
         height: auto;
      }

      .input-group-addon,
      .input-group-btn,
      .input-group .form-control {
         display: table-cell;
      }

      .input-group-addon:not(:first-child):not(:last-child),
      .input-group-btn:not(:first-child):not(:last-child),
      .input-group .form-control:not(:first-child):not(:last-child) {
         border-radius: 0;
      }

      .input-group-addon,
      .input-group-btn {
         width: 1%;
         white-space: nowrap;
         vertical-align: middle;
      }

      .input-group-addon {
         padding: 6px 12px;
         font-size: 14px;
         font-weight: normal;
         line-height: 1;
         color: #555;
         text-align: center;
         background-color: #eee;
         border: 1px solid #ccc;
         border-radius: 4px;
      }

      .input-group-addon.input-sm {
         padding: 5px 10px;
         font-size: 12px;
         border-radius: 3px;
      }

      .input-group-addon.input-lg {
         padding: 10px 16px;
         font-size: 18px;
         border-radius: 6px;
      }

      .input-group-addon input[type="radio"],
      .input-group-addon input[type="checkbox"] {
         margin-top: 0;
      }

      .input-group .form-control:first-child,
      .input-group-addon:first-child,
      .input-group-btn:first-child>.btn,
      .input-group-btn:first-child>.btn-group>.btn,
      .input-group-btn:first-child>.dropdown-toggle,
      .input-group-btn:last-child>.btn:not(:last-child):not(.dropdown-toggle),
      .input-group-btn:last-child>.btn-group:not(:last-child)>.btn {
         border-top-right-radius: 0;
         border-bottom-right-radius: 0;
      }

      .input-group-addon:first-child {
         border-right: 0;
      }

      .input-group .form-control:last-child,
      .input-group-addon:last-child,
      .input-group-btn:last-child>.btn,
      .input-group-btn:last-child>.btn-group>.btn,
      .input-group-btn:last-child>.dropdown-toggle,
      .input-group-btn:first-child>.btn:not(:first-child),
      .input-group-btn:first-child>.btn-group:not(:first-child)>.btn {
         border-top-left-radius: 0;
         border-bottom-left-radius: 0;
      }

      .input-group-addon:last-child {
         border-left: 0;
      }

      .input-group-btn {
         position: relative;
         font-size: 0;
         white-space: nowrap;
      }

      .input-group-btn>.btn {
         position: relative;
      }

      .input-group-btn>.btn+.btn {
         margin-left: -1px;
      }

      .input-group-btn>.btn:hover,
      .input-group-btn>.btn:focus,
      .input-group-btn>.btn:active {
         z-index: 2;
      }

      .input-group-btn:first-child>.btn,
      .input-group-btn:first-child>.btn-group {
         margin-right: -1px;
      }

      .input-group-btn:last-child>.btn,
      .input-group-btn:last-child>.btn-group {
         z-index: 2;
         margin-left: -1px;
      }

      .nav {
         padding-left: 0;
         margin-bottom: 0;
         list-style: none;
      }

      .nav>li {
         position: relative;
         display: block;
      }

      .nav>li>a {
         position: relative;
         display: block;
         padding: 10px 15px;
      }

      .nav>li>a:hover,
      .nav>li>a:focus {
         text-decoration: none;
         background-color: #eee;
      }

      .nav>li.disabled>a {
         color: #777;
      }

      .nav>li.disabled>a:hover,
      .nav>li.disabled>a:focus {
         color: #777;
         text-decoration: none;
         cursor: not-allowed;
         background-color: transparent;
      }

      .nav .open>a,
      .nav .open>a:hover,
      .nav .open>a:focus {
         background-color: #eee;
         border-color: #337ab7;
      }

      .nav .nav-divider {
         height: 1px;
         margin: 9px 0;
         overflow: hidden;
         background-color: #e5e5e5;
      }

      .nav>li>a>img {
         max-width: none;
      }

      .nav-tabs {
         border-bottom: 1px solid #ddd;
      }

      .nav-tabs>li {
         float: left;
         margin-bottom: -1px;
      }

      .nav-tabs>li>a {
         margin-right: 2px;
         line-height: 1.42857143;
         border: 1px solid transparent;
         border-radius: 4px 4px 0 0;
      }

      .nav-tabs>li>a:hover {
         border-color: #eee #eee #ddd;
      }

      .nav-tabs>li.active>a,
      .nav-tabs>li.active>a:hover,
      .nav-tabs>li.active>a:focus {
         color: #555;
         cursor: default;
         background-color: #fff;
         border: 1px solid #ddd;
         border-bottom-color: transparent;
      }

      .nav-tabs.nav-justified {
         width: 100%;
         border-bottom: 0;
      }

      .nav-tabs.nav-justified>li {
         float: none;
      }

      .nav-tabs.nav-justified>li>a {
         margin-bottom: 5px;
         text-align: center;
      }

      .nav-tabs.nav-justified>.dropdown .dropdown-menu {
         top: auto;
         left: auto;
      }

      @media (min-width: 768px) {
         .nav-tabs.nav-justified>li {
            display: table-cell;
            width: 1%;
         }

         .nav-tabs.nav-justified>li>a {
            margin-bottom: 0;
         }
      }

      .nav-tabs.nav-justified>li>a {
         margin-right: 0;
         border-radius: 4px;
      }

      .nav-tabs.nav-justified>.active>a,
      .nav-tabs.nav-justified>.active>a:hover,
      .nav-tabs.nav-justified>.active>a:focus {
         border: 1px solid #ddd;
      }

      @media (min-width: 768px) {
         .nav-tabs.nav-justified>li>a {
            border-bottom: 1px solid #ddd;
            border-radius: 4px 4px 0 0;
         }

         .nav-tabs.nav-justified>.active>a,
         .nav-tabs.nav-justified>.active>a:hover,
         .nav-tabs.nav-justified>.active>a:focus {
            border-bottom-color: #fff;
         }
      }

      .nav-pills>li {
         float: left;
      }

      .nav-pills>li>a {
         border-radius: 4px;
      }

      .nav-pills>li+li {
         margin-left: 2px;
      }

      .nav-pills>li.active>a,
      .nav-pills>li.active>a:hover,
      .nav-pills>li.active>a:focus {
         color: #fff;
         background-color: #337ab7;
      }

      .nav-stacked>li {
         float: none;
      }

      .nav-stacked>li+li {
         margin-top: 2px;
         margin-left: 0;
      }

      .nav-justified {
         width: 100%;
      }

      .nav-justified>li {
         float: none;
      }

      .nav-justified>li>a {
         margin-bottom: 5px;
         text-align: center;
      }

      .nav-justified>.dropdown .dropdown-menu {
         top: auto;
         left: auto;
      }

      @media (min-width: 768px) {
         .nav-justified>li {
            display: table-cell;
            width: 1%;
         }

         .nav-justified>li>a {
            margin-bottom: 0;
         }
      }

      .nav-tabs-justified {
         border-bottom: 0;
      }

      .nav-tabs-justified>li>a {
         margin-right: 0;
         border-radius: 4px;
      }

      .nav-tabs-justified>.active>a,
      .nav-tabs-justified>.active>a:hover,
      .nav-tabs-justified>.active>a:focus {
         border: 1px solid #ddd;
      }

      @media (min-width: 768px) {
         .nav-tabs-justified>li>a {
            border-bottom: 1px solid #ddd;
            border-radius: 4px 4px 0 0;
         }

         .nav-tabs-justified>.active>a,
         .nav-tabs-justified>.active>a:hover,
         .nav-tabs-justified>.active>a:focus {
            border-bottom-color: #fff;
         }
      }

      .tab-content>.tab-pane {
         display: none;
      }

      .tab-content>.active {
         display: block;
      }

      .nav-tabs .dropdown-menu {
         margin-top: -1px;
         border-top-left-radius: 0;
         border-top-right-radius: 0;
      }

      .navbar {
         position: relative;
         min-height: 50px;
         margin-bottom: 20px;
         border: 1px solid transparent;
      }

      @media (min-width: 768px) {
         .navbar {
            border-radius: 4px;
         }
      }

      @media (min-width: 768px) {
         .navbar-header {
            float: left;
         }
      }

      .navbar-collapse {
         padding-right: 15px;
         padding-left: 15px;
         overflow-x: visible;
         -webkit-overflow-scrolling: touch;
         border-top: 1px solid transparent;
         -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1);
         box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1);
      }

      .navbar-collapse.in {
         overflow-y: auto;
      }

      @media (min-width: 768px) {
         .navbar-collapse {
            width: auto;
            border-top: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
         }

         .navbar-collapse.collapse {
            display: block ;
            height: auto ;
            padding-bottom: 0;
            overflow: visible ;
         }

         .navbar-collapse.in {
            overflow-y: visible;
         }

         .navbar-fixed-top .navbar-collapse,
         .navbar-static-top .navbar-collapse,
         .navbar-fixed-bottom .navbar-collapse {
            padding-right: 0;
            padding-left: 0;
         }
      }

      .navbar-fixed-top .navbar-collapse,
      .navbar-fixed-bottom .navbar-collapse {
         max-height: 340px;
      }

      @media (max-device-width: 480px) and (orientation: landscape) {

         .navbar-fixed-top .navbar-collapse,
         .navbar-fixed-bottom .navbar-collapse {
            max-height: 200px;
         }
      }

      .container>.navbar-header,
      .container-fluid>.navbar-header,
      .container>.navbar-collapse,
      .container-fluid>.navbar-collapse {
         margin-right: -15px;
         margin-left: -15px;
      }

      @media (min-width: 768px) {

         .container>.navbar-header,
         .container-fluid>.navbar-header,
         .container>.navbar-collapse,
         .container-fluid>.navbar-collapse {
            margin-right: 0;
            margin-left: 0;
         }
      }

      .navbar-static-top {
         z-index: 1000;
         border-width: 0 0 1px;
      }

      @media (min-width: 768px) {
         .navbar-static-top {
            border-radius: 0;
         }
      }

      .navbar-fixed-top,
      .navbar-fixed-bottom {
         position: fixed;
         right: 0;
         left: 0;
         z-index: 1030;
      }

      @media (min-width: 768px) {

         .navbar-fixed-top,
         .navbar-fixed-bottom {
            border-radius: 0;
         }
      }

      .navbar-fixed-top {
         top: 0;
         border-width: 0 0 1px;
      }

      .navbar-fixed-bottom {
         bottom: 0;
         margin-bottom: 0;
         border-width: 1px 0 0;
      }

      .navbar-brand {
         float: left;
         height: 50px;
         padding: 15px 15px;
         font-size: 18px;
         line-height: 20px;
      }

      .navbar-brand:hover,
      .navbar-brand:focus {
         text-decoration: none;
      }

      .navbar-brand>img {
         display: block;
      }

      @media (min-width: 768px) {

         .navbar>.container .navbar-brand,
         .navbar>.container-fluid .navbar-brand {
            margin-left: -15px;
         }
      }

      .navbar-toggle {
         position: relative;
         float: right;
         padding: 9px 10px;
         margin-top: 8px;
         margin-right: 15px;
         margin-bottom: 8px;
         background-color: transparent;
         background-image: none;
         border: 1px solid transparent;
         border-radius: 4px;
      }

      .navbar-toggle:focus {
         outline: 0;
      }

      .navbar-toggle .icon-bar {
         display: block;
         width: 22px;
         height: 2px;
         border-radius: 1px;
      }

      .navbar-toggle .icon-bar+.icon-bar {
         margin-top: 4px;
      }

      @media (min-width: 768px) {
         .navbar-toggle {
            display: none;
         }
      }

      .navbar-nav {
         margin: 7.5px -15px;
      }

      .navbar-nav>li>a {
         padding-top: 10px;
         padding-bottom: 10px;
         line-height: 20px;
      }

      @media (max-width: 767px) {
         .navbar-nav .open .dropdown-menu {
            position: static;
            float: none;
            width: auto;
            margin-top: 0;
            background-color: transparent;
            border: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
         }

         .navbar-nav .open .dropdown-menu>li>a,
         .navbar-nav .open .dropdown-menu .dropdown-header {
            padding: 5px 15px 5px 25px;
         }

         .navbar-nav .open .dropdown-menu>li>a {
            line-height: 20px;
         }

         .navbar-nav .open .dropdown-menu>li>a:hover,
         .navbar-nav .open .dropdown-menu>li>a:focus {
            background-image: none;
         }
      }

      @media (min-width: 768px) {
         .navbar-nav {
            float: left;
            margin: 0;
         }

         .navbar-nav>li {
            float: left;
         }

         .navbar-nav>li>a {
            padding-top: 15px;
            padding-bottom: 15px;
         }
      }

      .navbar-form {
         padding: 10px 15px;
         margin-top: 8px;
         margin-right: -15px;
         margin-bottom: 8px;
         margin-left: -15px;
         border-top: 1px solid transparent;
         border-bottom: 1px solid transparent;
         -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1);
         box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1);
      }

      @media (min-width: 768px) {
         .navbar-form .form-group {
            display: inline-block;
            margin-bottom: 0;
            vertical-align: middle;
         }

         .navbar-form .form-control {
            display: inline-block;
            width: auto;
            vertical-align: middle;
         }

         .navbar-form .form-control-static {
            display: inline-block;
         }

         .navbar-form .input-group {
            display: inline-table;
            vertical-align: middle;
         }

         .navbar-form .input-group .input-group-addon,
         .navbar-form .input-group .input-group-btn,
         .navbar-form .input-group .form-control {
            width: auto;
         }

         .navbar-form .input-group>.form-control {
            width: 100%;
         }

         .navbar-form .control-label {
            margin-bottom: 0;
            vertical-align: middle;
         }

         .navbar-form .radio,
         .navbar-form .checkbox {
            display: inline-block;
            margin-top: 0;
            margin-bottom: 0;
            vertical-align: middle;
         }

         .navbar-form .radio label,
         .navbar-form .checkbox label {
            padding-left: 0;
         }

         .navbar-form .radio input[type="radio"],
         .navbar-form .checkbox input[type="checkbox"] {
            position: relative;
            margin-left: 0;
         }

         .navbar-form .has-feedback .form-control-feedback {
            top: 0;
         }
      }

      @media (max-width: 767px) {
         .navbar-form .form-group {
            margin-bottom: 5px;
         }

         .navbar-form .form-group:last-child {
            margin-bottom: 0;
         }
      }

      @media (min-width: 768px) {
         .navbar-form {
            width: auto;
            padding-top: 0;
            padding-bottom: 0;
            margin-right: 0;
            margin-left: 0;
            border: 0;
            -webkit-box-shadow: none;
            box-shadow: none;
         }
      }

      .navbar-nav>li>.dropdown-menu {
         margin-top: 0;
         border-top-left-radius: 0;
         border-top-right-radius: 0;
      }

      .navbar-fixed-bottom .navbar-nav>li>.dropdown-menu {
         margin-bottom: 0;
         border-top-left-radius: 4px;
         border-top-right-radius: 4px;
         border-bottom-right-radius: 0;
         border-bottom-left-radius: 0;
      }

      .navbar-btn {
         margin-top: 8px;
         margin-bottom: 8px;
      }

      .navbar-btn.btn-sm {
         margin-top: 10px;
         margin-bottom: 10px;
      }

      .navbar-btn.btn-xs {
         margin-top: 14px;
         margin-bottom: 14px;
      }

      .navbar-text {
         margin-top: 15px;
         margin-bottom: 15px;
      }

      @media (min-width: 768px) {
         .navbar-text {
            float: left;
            margin-right: 15px;
            margin-left: 15px;
         }
      }

      @media (min-width: 768px) {
         .navbar-left {
            float: left ;
         }

         .navbar-right {
            float: right ;
            margin-right: -15px;
         }

         .navbar-right~.navbar-right {
            margin-right: 0;
         }
      }

      .navbar-default {
         background-color: #f8f8f8;
         border-color: #e7e7e7;
      }

      .navbar-default .navbar-brand {
         color: #777;
      }

      .navbar-default .navbar-brand:hover,
      .navbar-default .navbar-brand:focus {
         color: #5e5e5e;
         background-color: transparent;
      }

      .navbar-default .navbar-text {
         color: #777;
      }

      .navbar-default .navbar-nav>li>a {
         color: #777;
      }

      .navbar-default .navbar-nav>li>a:hover,
      .navbar-default .navbar-nav>li>a:focus {
         color: #333;
         background-color: transparent;
      }

      .navbar-default .navbar-nav>.active>a,
      .navbar-default .navbar-nav>.active>a:hover,
      .navbar-default .navbar-nav>.active>a:focus {
         color: #555;
         background-color: #e7e7e7;
      }

      .navbar-default .navbar-nav>.disabled>a,
      .navbar-default .navbar-nav>.disabled>a:hover,
      .navbar-default .navbar-nav>.disabled>a:focus {
         color: #ccc;
         background-color: transparent;
      }

      .navbar-default .navbar-toggle {
         border-color: #ddd;
      }

      .navbar-default .navbar-toggle:hover,
      .navbar-default .navbar-toggle:focus {
         background-color: #ddd;
      }

      .navbar-default .navbar-toggle .icon-bar {
         background-color: #888;
      }

      .navbar-default .navbar-collapse,
      .navbar-default .navbar-form {
         border-color: #e7e7e7;
      }

      .navbar-default .navbar-nav>.open>a,
      .navbar-default .navbar-nav>.open>a:hover,
      .navbar-default .navbar-nav>.open>a:focus {
         color: #555;
         background-color: #e7e7e7;
      }

      @media (max-width: 767px) {
         .navbar-default .navbar-nav .open .dropdown-menu>li>a {
            color: #777;
         }

         .navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,
         .navbar-default .navbar-nav .open .dropdown-menu>li>a:focus {
            color: #333;
            background-color: transparent;
         }

         .navbar-default .navbar-nav .open .dropdown-menu>.active>a,
         .navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover,
         .navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus {
            color: #555;
            background-color: #e7e7e7;
         }

         .navbar-default .navbar-nav .open .dropdown-menu>.disabled>a,
         .navbar-default .navbar-nav .open .dropdown-menu>.disabled>a:hover,
         .navbar-default .navbar-nav .open .dropdown-menu>.disabled>a:focus {
            color: #ccc;
            background-color: transparent;
         }
      }

      .navbar-default .navbar-link {
         color: #777;
      }

      .navbar-default .navbar-link:hover {
         color: #333;
      }

      .navbar-default .btn-link {
         color: #777;
      }

      .navbar-default .btn-link:hover,
      .navbar-default .btn-link:focus {
         color: #333;
      }

      .navbar-default .btn-link[disabled]:hover,
      fieldset[disabled] .navbar-default .btn-link:hover,
      .navbar-default .btn-link[disabled]:focus,
      fieldset[disabled] .navbar-default .btn-link:focus {
         color: #ccc;
      }

      .navbar-inverse {
         background-color: #222;
         border-color: #080808;
      }

      .navbar-inverse .navbar-brand {
         color: #9d9d9d;
      }

      .navbar-inverse .navbar-brand:hover,
      .navbar-inverse .navbar-brand:focus {
         color: #fff;
         background-color: transparent;
      }

      .navbar-inverse .navbar-text {
         color: #9d9d9d;
      }

      .navbar-inverse .navbar-nav>li>a {
         color: #9d9d9d;
      }

      .navbar-inverse .navbar-nav>li>a:hover,
      .navbar-inverse .navbar-nav>li>a:focus {
         color: #fff;
         background-color: transparent;
      }

      .navbar-inverse .navbar-nav>.active>a,
      .navbar-inverse .navbar-nav>.active>a:hover,
      .navbar-inverse .navbar-nav>.active>a:focus {
         color: #fff;
         background-color: #080808;
      }

      .navbar-inverse .navbar-nav>.disabled>a,
      .navbar-inverse .navbar-nav>.disabled>a:hover,
      .navbar-inverse .navbar-nav>.disabled>a:focus {
         color: #444;
         background-color: transparent;
      }

      .navbar-inverse .navbar-toggle {
         border-color: #333;
      }

      .navbar-inverse .navbar-toggle:hover,
      .navbar-inverse .navbar-toggle:focus {
         background-color: #333;
      }

      .navbar-inverse .navbar-toggle .icon-bar {
         background-color: #fff;
      }

      .navbar-inverse .navbar-collapse,
      .navbar-inverse .navbar-form {
         border-color: #101010;
      }

      .navbar-inverse .navbar-nav>.open>a,
      .navbar-inverse .navbar-nav>.open>a:hover,
      .navbar-inverse .navbar-nav>.open>a:focus {
         color: #fff;
         background-color: #080808;
      }

      @media (max-width: 767px) {
         .navbar-inverse .navbar-nav .open .dropdown-menu>.dropdown-header {
            border-color: #080808;
         }

         .navbar-inverse .navbar-nav .open .dropdown-menu .divider {
            background-color: #080808;
         }

         .navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
            color: #9d9d9d;
         }

         .navbar-inverse .navbar-nav .open .dropdown-menu>li>a:hover,
         .navbar-inverse .navbar-nav .open .dropdown-menu>li>a:focus {
            color: #fff;
            background-color: transparent;
         }

         .navbar-inverse .navbar-nav .open .dropdown-menu>.active>a,
         .navbar-inverse .navbar-nav .open .dropdown-menu>.active>a:hover,
         .navbar-inverse .navbar-nav .open .dropdown-menu>.active>a:focus {
            color: #fff;
            background-color: #080808;
         }

         .navbar-inverse .navbar-nav .open .dropdown-menu>.disabled>a,
         .navbar-inverse .navbar-nav .open .dropdown-menu>.disabled>a:hover,
         .navbar-inverse .navbar-nav .open .dropdown-menu>.disabled>a:focus {
            color: #444;
            background-color: transparent;
         }
      }

      .navbar-inverse .navbar-link {
         color: #9d9d9d;
      }

      .navbar-inverse .navbar-link:hover {
         color: #fff;
      }

      .navbar-inverse .btn-link {
         color: #9d9d9d;
      }

      .navbar-inverse .btn-link:hover,
      .navbar-inverse .btn-link:focus {
         color: #fff;
      }

      .navbar-inverse .btn-link[disabled]:hover,
      fieldset[disabled] .navbar-inverse .btn-link:hover,
      .navbar-inverse .btn-link[disabled]:focus,
      fieldset[disabled] .navbar-inverse .btn-link:focus {
         color: #444;
      }

      .breadcrumb {
         padding: 8px 15px;
         margin-bottom: 20px;
         list-style: none;
         background-color: #f5f5f5;
         border-radius: 4px;
      }

      .breadcrumb>li {
         display: inline-block;
      }

      .breadcrumb>li+li:before {
         padding: 0 5px;
         color: #ccc;
         content: "/\00a0";
      }

      .breadcrumb>.active {
         color: #777;
      }

      .pagination {
         display: inline-block;
         padding-left: 0;
         margin: 20px 0;
         border-radius: 4px;
      }

      .pagination>li {
         display: inline;
      }

      .pagination>li>a,
      .pagination>li>span {
         position: relative;
         float: left;
         padding: 6px 12px;
         margin-left: -1px;
         line-height: 1.42857143;
         color: #337ab7;
         text-decoration: none;
         background-color: #fff;
         border: 1px solid #ddd;
      }

      .pagination>li:first-child>a,
      .pagination>li:first-child>span {
         margin-left: 0;
         border-top-left-radius: 4px;
         border-bottom-left-radius: 4px;
      }

      .pagination>li:last-child>a,
      .pagination>li:last-child>span {
         border-top-right-radius: 4px;
         border-bottom-right-radius: 4px;
      }

      .pagination>li>a:hover,
      .pagination>li>span:hover,
      .pagination>li>a:focus,
      .pagination>li>span:focus {
         z-index: 2;
         color: #23527c;
         background-color: #eee;
         border-color: #ddd;
      }

      .pagination>.active>a,
      .pagination>.active>span,
      .pagination>.active>a:hover,
      .pagination>.active>span:hover,
      .pagination>.active>a:focus,
      .pagination>.active>span:focus {
         z-index: 3;
         color: #fff;
         cursor: default;
         background-color: #337ab7;
         border-color: #337ab7;
      }

      .pagination>.disabled>span,
      .pagination>.disabled>span:hover,
      .pagination>.disabled>span:focus,
      .pagination>.disabled>a,
      .pagination>.disabled>a:hover,
      .pagination>.disabled>a:focus {
         color: #777;
         cursor: not-allowed;
         background-color: #fff;
         border-color: #ddd;
      }

      .pagination-lg>li>a,
      .pagination-lg>li>span {
         padding: 10px 16px;
         font-size: 18px;
         line-height: 1.3333333;
      }

      .pagination-lg>li:first-child>a,
      .pagination-lg>li:first-child>span {
         border-top-left-radius: 6px;
         border-bottom-left-radius: 6px;
      }

      .pagination-lg>li:last-child>a,
      .pagination-lg>li:last-child>span {
         border-top-right-radius: 6px;
         border-bottom-right-radius: 6px;
      }

      .pagination-sm>li>a,
      .pagination-sm>li>span {
         padding: 5px 10px;
         font-size: 12px;
         line-height: 1.5;
      }

      .pagination-sm>li:first-child>a,
      .pagination-sm>li:first-child>span {
         border-top-left-radius: 3px;
         border-bottom-left-radius: 3px;
      }

      .pagination-sm>li:last-child>a,
      .pagination-sm>li:last-child>span {
         border-top-right-radius: 3px;
         border-bottom-right-radius: 3px;
      }

      .pager {
         padding-left: 0;
         margin: 20px 0;
         text-align: center;
         list-style: none;
      }

      .pager li {
         display: inline;
      }

      .pager li>a,
      .pager li>span {
         display: inline-block;
         padding: 5px 14px;
         background-color: #fff;
         border: 1px solid #ddd;
         border-radius: 15px;
      }

      .pager li>a:hover,
      .pager li>a:focus {
         text-decoration: none;
         background-color: #eee;
      }

      .pager .next>a,
      .pager .next>span {
         float: right;
      }

      .pager .previous>a,
      .pager .previous>span {
         float: left;
      }

      .pager .disabled>a,
      .pager .disabled>a:hover,
      .pager .disabled>a:focus,
      .pager .disabled>span {
         color: #777;
         cursor: not-allowed;
         background-color: #fff;
      }

      .label {
         display: inline;
         padding: .2em .6em .3em;
         font-size: 75%;
         font-weight: bold;
         line-height: 1;
         color: #fff;
         text-align: center;
         white-space: nowrap;
         vertical-align: baseline;
         border-radius: .25em;
      }

      a.label:hover,
      a.label:focus {
         color: #fff;
         text-decoration: none;
         cursor: pointer;
      }

      .label:empty {
         display: none;
      }

      .btn .label {
         position: relative;
         top: -1px;
      }

      .label-default {
         background-color: #777;
      }

      .label-default[href]:hover,
      .label-default[href]:focus {
         background-color: #5e5e5e;
      }

      .label-primary {
         background-color: #337ab7;
      }

      .label-primary[href]:hover,
      .label-primary[href]:focus {
         background-color: #286090;
      }

      .label-success {
         background-color: #5cb85c;
      }

      .label-success[href]:hover,
      .label-success[href]:focus {
         background-color: #449d44;
      }

      .label-info {
         background-color: #5bc0de;
      }

      .label-info[href]:hover,
      .label-info[href]:focus {
         background-color: #31b0d5;
      }

      .label-warning {
         background-color: #f0ad4e;
      }

      .label-warning[href]:hover,
      .label-warning[href]:focus {
         background-color: #ec971f;
      }

      .label-danger {
         background-color: #d9534f;
      }

      .label-danger[href]:hover,
      .label-danger[href]:focus {
         background-color: #c9302c;
      }

      .badge {
         display: inline-block;
         min-width: 10px;
         padding: 3px 7px;
         font-size: 12px;
         font-weight: bold;
         line-height: 1;
         color: #fff;
         text-align: center;
         white-space: nowrap;
         vertical-align: middle;
         background-color: #777;
         border-radius: 10px;
      }

      .badge:empty {
         display: none;
      }

      .btn .badge {
         position: relative;
         top: -1px;
      }

      .btn-xs .badge,
      .btn-group-xs>.btn .badge {
         top: 0;
         padding: 1px 5px;
      }

      a.badge:hover,
      a.badge:focus {
         color: #fff;
         text-decoration: none;
         cursor: pointer;
      }

      .list-group-item.active>.badge,
      .nav-pills>.active>a>.badge {
         color: #337ab7;
         background-color: #fff;
      }

      .list-group-item>.badge {
         float: right;
      }

      .list-group-item>.badge+.badge {
         margin-right: 5px;
      }

      .nav-pills>li>a>.badge {
         margin-left: 3px;
      }

      .jumbotron {
         padding-top: 30px;
         padding-bottom: 30px;
         margin-bottom: 30px;
         color: inherit;
         background-color: #eee;
      }

      .jumbotron h1,
      .jumbotron .h1 {
         color: inherit;
      }

      .jumbotron p {
         margin-bottom: 15px;
         font-size: 21px;
         font-weight: 200;
      }

      .jumbotron>hr {
         border-top-color: #d5d5d5;
      }

      .container .jumbotron,
      .container-fluid .jumbotron {
         padding-right: 15px;
         padding-left: 15px;
         border-radius: 6px;
      }

      .jumbotron .container {
         max-width: 100%;
      }

      @media screen and (min-width: 768px) {
         .jumbotron {
            padding-top: 48px;
            padding-bottom: 48px;
         }

         .container .jumbotron,
         .container-fluid .jumbotron {
            padding-right: 60px;
            padding-left: 60px;
         }

         .jumbotron h1,
         .jumbotron .h1 {
            font-size: 63px;
         }
      }

      .thumbnail {
         display: block;
         padding: 4px;
         margin-bottom: 20px;
         line-height: 1.42857143;
         background-color: #fff;
         border: 1px solid #ddd;
         border-radius: 4px;
         -webkit-transition: border .2s ease-in-out;
         -o-transition: border .2s ease-in-out;
         transition: border .2s ease-in-out;
      }

      .thumbnail>img,
      .thumbnail a>img {
         margin-right: auto;
         margin-left: auto;
      }

      a.thumbnail:hover,
      a.thumbnail:focus,
      a.thumbnail.active {
         border-color: #337ab7;
      }

      .thumbnail .caption {
         padding: 9px;
         color: #333;
      }

      .alert {
         padding: 15px;
         margin-bottom: 20px;
         border: 1px solid transparent;
         border-radius: 4px;
      }

      .alert h4 {
         margin-top: 0;
         color: inherit;
      }

      .alert .alert-link {
         font-weight: bold;
      }

      .alert>p,
      .alert>ul {
         margin-bottom: 0;
      }

      .alert>p+p {
         margin-top: 5px;
      }

      .alert-dismissable,
      .alert-dismissible {
         padding-right: 35px;
      }

      .alert-dismissable .close,
      .alert-dismissible .close {
         position: relative;
         top: -2px;
         right: -21px;
         color: inherit;
      }

      .alert-success {
         color: #3c763d;
         background-color: #dff0d8;
         border-color: #d6e9c6;
      }

      .alert-success hr {
         border-top-color: #c9e2b3;
      }

      .alert-success .alert-link {
         color: #2b542c;
      }

      .alert-info {
         color: #31708f;
         background-color: #d9edf7;
         border-color: #bce8f1;
      }

      .alert-info hr {
         border-top-color: #a6e1ec;
      }

      .alert-info .alert-link {
         color: #245269;
      }

      .alert-warning {
         color: #8a6d3b;
         background-color: #fcf8e3;
         border-color: #faebcc;
      }

      .alert-warning hr {
         border-top-color: #f7e1b5;
      }

      .alert-warning .alert-link {
         color: #66512c;
      }

      .alert-danger {
         color: #a94442;
         background-color: #f2dede;
         border-color: #ebccd1;
      }

      .alert-danger hr {
         border-top-color: #e4b9c0;
      }

      .alert-danger .alert-link {
         color: #843534;
      }

      @-webkit-keyframes progress-bar-stripes {
         from {
            background-position: 40px 0;
         }

         to {
            background-position: 0 0;
         }
      }

      @-o-keyframes progress-bar-stripes {
         from {
            background-position: 40px 0;
         }

         to {
            background-position: 0 0;
         }
      }

      @keyframes progress-bar-stripes {
         from {
            background-position: 40px 0;
         }

         to {
            background-position: 0 0;
         }
      }

      .progress {
         height: 20px;
         margin-bottom: 20px;
         overflow: hidden;
         background-color: #f5f5f5;
         border-radius: 4px;
         -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
         box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1);
      }

      .progress-bar {
         float: left;
         width: 0;
         height: 100%;
         font-size: 12px;
         line-height: 20px;
         color: #fff;
         text-align: center;
         background-color: #337ab7;
         -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
         box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15);
         -webkit-transition: width .6s ease;
         -o-transition: width .6s ease;
         transition: width .6s ease;
      }

      .progress-striped .progress-bar,
      .progress-bar-striped {
         background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
         background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
         background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
         -webkit-background-size: 40px 40px;
         background-size: 40px 40px;
      }

      .progress.active .progress-bar,
      .progress-bar.active {
         -webkit-animation: progress-bar-stripes 2s linear infinite;
         -o-animation: progress-bar-stripes 2s linear infinite;
         animation: progress-bar-stripes 2s linear infinite;
      }

      .progress-bar-success {
         background-color: #5cb85c;
      }

      .progress-striped .progress-bar-success {
         background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
         background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
         background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
      }

      .progress-bar-info {
         background-color: #5bc0de;
      }

      .progress-striped .progress-bar-info {
         background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
         background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
         background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
      }

      .progress-bar-warning {
         background-color: #f0ad4e;
      }

      .progress-striped .progress-bar-warning {
         background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
         background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
         background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
      }

      .progress-bar-danger {
         background-color: #d9534f;
      }

      .progress-striped .progress-bar-danger {
         background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
         background-image: -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
         background-image: linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent);
      }

      .media {
         margin-top: 15px;
      }

      .media:first-child {
         margin-top: 0;
      }

      .media,
      .media-body {
         overflow: hidden;
         zoom: 1;
      }

      .media-body {
         width: 10000px;
      }

      .media-object {
         display: block;
      }

      .media-object.img-thumbnail {
         max-width: none;
      }

      .media-right,
      .media>.pull-right {
         padding-left: 10px;
      }

      .media-left,
      .media>.pull-left {
         padding-right: 10px;
      }

      .media-left,
      .media-right,
      .media-body {
         display: table-cell;
         vertical-align: top;
      }

      .media-middle {
         vertical-align: middle;
      }

      .media-bottom {
         vertical-align: bottom;
      }

      .media-heading {
         margin-top: 0;
         margin-bottom: 5px;
      }

      .media-list {
         padding-left: 0;
         list-style: none;
      }

      .list-group {
         padding-left: 0;
         margin-bottom: 20px;
      }

      .list-group-item {
         position: relative;
         display: block;
         padding: 10px 15px;
         margin-bottom: -1px;
         background-color: #fff;
         border: 1px solid #ddd;
      }

      .list-group-item:first-child {
         border-top-left-radius: 4px;
         border-top-right-radius: 4px;
      }

      .list-group-item:last-child {
         margin-bottom: 0;
         border-bottom-right-radius: 4px;
         border-bottom-left-radius: 4px;
      }

      a.list-group-item,
      button.list-group-item {
         color: #555;
      }

      a.list-group-item .list-group-item-heading,
      button.list-group-item .list-group-item-heading {
         color: #333;
      }

      a.list-group-item:hover,
      button.list-group-item:hover,
      a.list-group-item:focus,
      button.list-group-item:focus {
         color: #555;
         text-decoration: none;
         background-color: #f5f5f5;
      }

      button.list-group-item {
         width: 100%;
         text-align: left;
      }

      .list-group-item.disabled,
      .list-group-item.disabled:hover,
      .list-group-item.disabled:focus {
         color: #777;
         cursor: not-allowed;
         background-color: #eee;
      }

      .list-group-item.disabled .list-group-item-heading,
      .list-group-item.disabled:hover .list-group-item-heading,
      .list-group-item.disabled:focus .list-group-item-heading {
         color: inherit;
      }

      .list-group-item.disabled .list-group-item-text,
      .list-group-item.disabled:hover .list-group-item-text,
      .list-group-item.disabled:focus .list-group-item-text {
         color: #777;
      }

      .list-group-item.active,
      .list-group-item.active:hover,
      .list-group-item.active:focus {
         z-index: 2;
         color: #fff;
         background-color: #337ab7;
         border-color: #337ab7;
      }

      .list-group-item.active .list-group-item-heading,
      .list-group-item.active:hover .list-group-item-heading,
      .list-group-item.active:focus .list-group-item-heading,
      .list-group-item.active .list-group-item-heading>small,
      .list-group-item.active:hover .list-group-item-heading>small,
      .list-group-item.active:focus .list-group-item-heading>small,
      .list-group-item.active .list-group-item-heading>.small,
      .list-group-item.active:hover .list-group-item-heading>.small,
      .list-group-item.active:focus .list-group-item-heading>.small {
         color: inherit;
      }

      .list-group-item.active .list-group-item-text,
      .list-group-item.active:hover .list-group-item-text,
      .list-group-item.active:focus .list-group-item-text {
         color: #c7ddef;
      }

      .list-group-item-success {
         color: #3c763d;
         background-color: #dff0d8;
      }

      a.list-group-item-success,
      button.list-group-item-success {
         color: #3c763d;
      }

      a.list-group-item-success .list-group-item-heading,
      button.list-group-item-success .list-group-item-heading {
         color: inherit;
      }

      a.list-group-item-success:hover,
      button.list-group-item-success:hover,
      a.list-group-item-success:focus,
      button.list-group-item-success:focus {
         color: #3c763d;
         background-color: #d0e9c6;
      }

      a.list-group-item-success.active,
      button.list-group-item-success.active,
      a.list-group-item-success.active:hover,
      button.list-group-item-success.active:hover,
      a.list-group-item-success.active:focus,
      button.list-group-item-success.active:focus {
         color: #fff;
         background-color: #3c763d;
         border-color: #3c763d;
      }

      .list-group-item-info {
         color: #31708f;
         background-color: #d9edf7;
      }

      a.list-group-item-info,
      button.list-group-item-info {
         color: #31708f;
      }

      a.list-group-item-info .list-group-item-heading,
      button.list-group-item-info .list-group-item-heading {
         color: inherit;
      }

      a.list-group-item-info:hover,
      button.list-group-item-info:hover,
      a.list-group-item-info:focus,
      button.list-group-item-info:focus {
         color: #31708f;
         background-color: #c4e3f3;
      }

      a.list-group-item-info.active,
      button.list-group-item-info.active,
      a.list-group-item-info.active:hover,
      button.list-group-item-info.active:hover,
      a.list-group-item-info.active:focus,
      button.list-group-item-info.active:focus {
         color: #fff;
         background-color: #31708f;
         border-color: #31708f;
      }

      .list-group-item-warning {
         color: #8a6d3b;
         background-color: #fcf8e3;
      }

      a.list-group-item-warning,
      button.list-group-item-warning {
         color: #8a6d3b;
      }

      a.list-group-item-warning .list-group-item-heading,
      button.list-group-item-warning .list-group-item-heading {
         color: inherit;
      }

      a.list-group-item-warning:hover,
      button.list-group-item-warning:hover,
      a.list-group-item-warning:focus,
      button.list-group-item-warning:focus {
         color: #8a6d3b;
         background-color: #faf2cc;
      }

      a.list-group-item-warning.active,
      button.list-group-item-warning.active,
      a.list-group-item-warning.active:hover,
      button.list-group-item-warning.active:hover,
      a.list-group-item-warning.active:focus,
      button.list-group-item-warning.active:focus {
         color: #fff;
         background-color: #8a6d3b;
         border-color: #8a6d3b;
      }

      .list-group-item-danger {
         color: #a94442;
         background-color: #f2dede;
      }

      a.list-group-item-danger,
      button.list-group-item-danger {
         color: #a94442;
      }

      a.list-group-item-danger .list-group-item-heading,
      button.list-group-item-danger .list-group-item-heading {
         color: inherit;
      }

      a.list-group-item-danger:hover,
      button.list-group-item-danger:hover,
      a.list-group-item-danger:focus,
      button.list-group-item-danger:focus {
         color: #a94442;
         background-color: #ebcccc;
      }

      a.list-group-item-danger.active,
      button.list-group-item-danger.active,
      a.list-group-item-danger.active:hover,
      button.list-group-item-danger.active:hover,
      a.list-group-item-danger.active:focus,
      button.list-group-item-danger.active:focus {
         color: #fff;
         background-color: #a94442;
         border-color: #a94442;
      }

      .list-group-item-heading {
         margin-top: 0;
         margin-bottom: 5px;
      }

      .list-group-item-text {
         margin-bottom: 0;
         line-height: 1.3;
      }

      .panel {
         margin-bottom: 20px;
         background-color: #fff;
         border: 1px solid transparent;
         border-radius: 4px;
         -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
         box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
      }

      .panel-body {
         padding: 15px;
      }

      .panel-heading {
         padding: 10px 15px;
         border-bottom: 1px solid transparent;
         border-top-left-radius: 3px;
         border-top-right-radius: 3px;
      }

      .panel-heading>.dropdown .dropdown-toggle {
         color: inherit;
      }

      .panel-title {
         margin-top: 0;
         margin-bottom: 0;
         font-size: 16px;
         color: inherit;
      }

      .panel-title>a,
      .panel-title>small,
      .panel-title>.small,
      .panel-title>small>a,
      .panel-title>.small>a {
         color: inherit;
      }

      .panel-footer {
         padding: 10px 15px;
         background-color: #f5f5f5;
         border-top: 1px solid #ddd;
         border-bottom-right-radius: 3px;
         border-bottom-left-radius: 3px;
      }

      .panel>.list-group,
      .panel>.panel-collapse>.list-group {
         margin-bottom: 0;
      }

      .panel>.list-group .list-group-item,
      .panel>.panel-collapse>.list-group .list-group-item {
         border-width: 1px 0;
         border-radius: 0;
      }

      .panel>.list-group:first-child .list-group-item:first-child,
      .panel>.panel-collapse>.list-group:first-child .list-group-item:first-child {
         border-top: 0;
         border-top-left-radius: 3px;
         border-top-right-radius: 3px;
      }

      .panel>.list-group:last-child .list-group-item:last-child,
      .panel>.panel-collapse>.list-group:last-child .list-group-item:last-child {
         border-bottom: 0;
         border-bottom-right-radius: 3px;
         border-bottom-left-radius: 3px;
      }

      .panel>.panel-heading+.panel-collapse>.list-group .list-group-item:first-child {
         border-top-left-radius: 0;
         border-top-right-radius: 0;
      }

      .panel-heading+.list-group .list-group-item:first-child {
         border-top-width: 0;
      }

      .list-group+.panel-footer {
         border-top-width: 0;
      }

      .panel>.table,
      .panel>.table-responsive>.table,
      .panel>.panel-collapse>.table {
         margin-bottom: 0;
      }

      .panel>.table caption,
      .panel>.table-responsive>.table caption,
      .panel>.panel-collapse>.table caption {
         padding-right: 15px;
         padding-left: 15px;
      }

      .panel>.table:first-child,
      .panel>.table-responsive:first-child>.table:first-child {
         border-top-left-radius: 3px;
         border-top-right-radius: 3px;
      }

      .panel>.table:first-child>thead:first-child>tr:first-child,
      .panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child,
      .panel>.table:first-child>tbody:first-child>tr:first-child,
      .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child {
         border-top-left-radius: 3px;
         border-top-right-radius: 3px;
      }

      .panel>.table:first-child>thead:first-child>tr:first-child td:first-child,
      .panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:first-child,
      .panel>.table:first-child>tbody:first-child>tr:first-child td:first-child,
      .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:first-child,
      .panel>.table:first-child>thead:first-child>tr:first-child th:first-child,
      .panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:first-child,
      .panel>.table:first-child>tbody:first-child>tr:first-child th:first-child,
      .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:first-child {
         border-top-left-radius: 3px;
      }

      .panel>.table:first-child>thead:first-child>tr:first-child td:last-child,
      .panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:last-child,
      .panel>.table:first-child>tbody:first-child>tr:first-child td:last-child,
      .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:last-child,
      .panel>.table:first-child>thead:first-child>tr:first-child th:last-child,
      .panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:last-child,
      .panel>.table:first-child>tbody:first-child>tr:first-child th:last-child,
      .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:last-child {
         border-top-right-radius: 3px;
      }

      .panel>.table:last-child,
      .panel>.table-responsive:last-child>.table:last-child {
         border-bottom-right-radius: 3px;
         border-bottom-left-radius: 3px;
      }

      .panel>.table:last-child>tbody:last-child>tr:last-child,
      .panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child,
      .panel>.table:last-child>tfoot:last-child>tr:last-child,
      .panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child {
         border-bottom-right-radius: 3px;
         border-bottom-left-radius: 3px;
      }

      .panel>.table:last-child>tbody:last-child>tr:last-child td:first-child,
      .panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:first-child,
      .panel>.table:last-child>tfoot:last-child>tr:last-child td:first-child,
      .panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:first-child,
      .panel>.table:last-child>tbody:last-child>tr:last-child th:first-child,
      .panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:first-child,
      .panel>.table:last-child>tfoot:last-child>tr:last-child th:first-child,
      .panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:first-child {
         border-bottom-left-radius: 3px;
      }

      .panel>.table:last-child>tbody:last-child>tr:last-child td:last-child,
      .panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:last-child,
      .panel>.table:last-child>tfoot:last-child>tr:last-child td:last-child,
      .panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:last-child,
      .panel>.table:last-child>tbody:last-child>tr:last-child th:last-child,
      .panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:last-child,
      .panel>.table:last-child>tfoot:last-child>tr:last-child th:last-child,
      .panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:last-child {
         border-bottom-right-radius: 3px;
      }

      .panel>.panel-body+.table,
      .panel>.panel-body+.table-responsive,
      .panel>.table+.panel-body,
      .panel>.table-responsive+.panel-body {
         border-top: 1px solid #ddd;
      }

      .panel>.table>tbody:first-child>tr:first-child th,
      .panel>.table>tbody:first-child>tr:first-child td {
         border-top: 0;
      }

      .panel>.table-bordered,
      .panel>.table-responsive>.table-bordered {
         border: 0;
      }

      .panel>.table-bordered>thead>tr>th:first-child,
      .panel>.table-responsive>.table-bordered>thead>tr>th:first-child,
      .panel>.table-bordered>tbody>tr>th:first-child,
      .panel>.table-responsive>.table-bordered>tbody>tr>th:first-child,
      .panel>.table-bordered>tfoot>tr>th:first-child,
      .panel>.table-responsive>.table-bordered>tfoot>tr>th:first-child,
      .panel>.table-bordered>thead>tr>td:first-child,
      .panel>.table-responsive>.table-bordered>thead>tr>td:first-child,
      .panel>.table-bordered>tbody>tr>td:first-child,
      .panel>.table-responsive>.table-bordered>tbody>tr>td:first-child,
      .panel>.table-bordered>tfoot>tr>td:first-child,
      .panel>.table-responsive>.table-bordered>tfoot>tr>td:first-child {
         border-left: 0;
      }

      .panel>.table-bordered>thead>tr>th:last-child,
      .panel>.table-responsive>.table-bordered>thead>tr>th:last-child,
      .panel>.table-bordered>tbody>tr>th:last-child,
      .panel>.table-responsive>.table-bordered>tbody>tr>th:last-child,
      .panel>.table-bordered>tfoot>tr>th:last-child,
      .panel>.table-responsive>.table-bordered>tfoot>tr>th:last-child,
      .panel>.table-bordered>thead>tr>td:last-child,
      .panel>.table-responsive>.table-bordered>thead>tr>td:last-child,
      .panel>.table-bordered>tbody>tr>td:last-child,
      .panel>.table-responsive>.table-bordered>tbody>tr>td:last-child,
      .panel>.table-bordered>tfoot>tr>td:last-child,
      .panel>.table-responsive>.table-bordered>tfoot>tr>td:last-child {
         border-right: 0;
      }

      .panel>.table-bordered>thead>tr:first-child>td,
      .panel>.table-responsive>.table-bordered>thead>tr:first-child>td,
      .panel>.table-bordered>tbody>tr:first-child>td,
      .panel>.table-responsive>.table-bordered>tbody>tr:first-child>td,
      .panel>.table-bordered>thead>tr:first-child>th,
      .panel>.table-responsive>.table-bordered>thead>tr:first-child>th,
      .panel>.table-bordered>tbody>tr:first-child>th,
      .panel>.table-responsive>.table-bordered>tbody>tr:first-child>th {
         border-bottom: 0;
      }

      .panel>.table-bordered>tbody>tr:last-child>td,
      .panel>.table-responsive>.table-bordered>tbody>tr:last-child>td,
      .panel>.table-bordered>tfoot>tr:last-child>td,
      .panel>.table-responsive>.table-bordered>tfoot>tr:last-child>td,
      .panel>.table-bordered>tbody>tr:last-child>th,
      .panel>.table-responsive>.table-bordered>tbody>tr:last-child>th,
      .panel>.table-bordered>tfoot>tr:last-child>th,
      .panel>.table-responsive>.table-bordered>tfoot>tr:last-child>th {
         border-bottom: 0;
      }

      .panel>.table-responsive {
         margin-bottom: 0;
         border: 0;
      }

      .panel-group {
         margin-bottom: 20px;
      }

      .panel-group .panel {
         margin-bottom: 0;
         border-radius: 4px;
      }

      .panel-group .panel+.panel {
         margin-top: 5px;
      }

      .panel-group .panel-heading {
         border-bottom: 0;
      }

      .panel-group .panel-heading+.panel-collapse>.panel-body,
      .panel-group .panel-heading+.panel-collapse>.list-group {
         border-top: 1px solid #ddd;
      }

      .panel-group .panel-footer {
         border-top: 0;
      }

      .panel-group .panel-footer+.panel-collapse .panel-body {
         border-bottom: 1px solid #ddd;
      }

      .panel-default {
         border-color: #ddd;
      }

      .panel-default>.panel-heading {
         color: #333;
         background-color: #f5f5f5;
         border-color: #ddd;
      }

      .panel-default>.panel-heading+.panel-collapse>.panel-body {
         border-top-color: #ddd;
      }

      .panel-default>.panel-heading .badge {
         color: #f5f5f5;
         background-color: #333;
      }

      .panel-default>.panel-footer+.panel-collapse>.panel-body {
         border-bottom-color: #ddd;
      }

      .panel-primary {
         border-color: #337ab7;
      }

      .panel-primary>.panel-heading {
         color: #fff;
         background-color: #337ab7;
         border-color: #337ab7;
      }

      .panel-primary>.panel-heading+.panel-collapse>.panel-body {
         border-top-color: #337ab7;
      }

      .panel-primary>.panel-heading .badge {
         color: #337ab7;
         background-color: #fff;
      }

      .panel-primary>.panel-footer+.panel-collapse>.panel-body {
         border-bottom-color: #337ab7;
      }

      .panel-success {
         border-color: #d6e9c6;
      }

      .panel-success>.panel-heading {
         color: #3c763d;
         background-color: #dff0d8;
         border-color: #d6e9c6;
      }

      .panel-success>.panel-heading+.panel-collapse>.panel-body {
         border-top-color: #d6e9c6;
      }

      .panel-success>.panel-heading .badge {
         color: #dff0d8;
         background-color: #3c763d;
      }

      .panel-success>.panel-footer+.panel-collapse>.panel-body {
         border-bottom-color: #d6e9c6;
      }

      .panel-info {
         border-color: #bce8f1;
      }

      .panel-info>.panel-heading {
         color: #31708f;
         background-color: #d9edf7;
         border-color: #bce8f1;
      }

      .panel-info>.panel-heading+.panel-collapse>.panel-body {
         border-top-color: #bce8f1;
      }

      .panel-info>.panel-heading .badge {
         color: #d9edf7;
         background-color: #31708f;
      }

      .panel-info>.panel-footer+.panel-collapse>.panel-body {
         border-bottom-color: #bce8f1;
      }

      .panel-warning {
         border-color: #faebcc;
      }

      .panel-warning>.panel-heading {
         color: #8a6d3b;
         background-color: #fcf8e3;
         border-color: #faebcc;
      }

      .panel-warning>.panel-heading+.panel-collapse>.panel-body {
         border-top-color: #faebcc;
      }

      .panel-warning>.panel-heading .badge {
         color: #fcf8e3;
         background-color: #8a6d3b;
      }

      .panel-warning>.panel-footer+.panel-collapse>.panel-body {
         border-bottom-color: #faebcc;
      }

      .panel-danger {
         border-color: #ebccd1;
      }

      .panel-danger>.panel-heading {
         color: #a94442;
         background-color: #f2dede;
         border-color: #ebccd1;
      }

      .panel-danger>.panel-heading+.panel-collapse>.panel-body {
         border-top-color: #ebccd1;
      }

      .panel-danger>.panel-heading .badge {
         color: #f2dede;
         background-color: #a94442;
      }

      .panel-danger>.panel-footer+.panel-collapse>.panel-body {
         border-bottom-color: #ebccd1;
      }

      .embed-responsive {
         position: relative;
         display: block;
         height: 0;
         padding: 0;
         overflow: hidden;
      }

      .embed-responsive .embed-responsive-item,
      .embed-responsive iframe,
      .embed-responsive embed,
      .embed-responsive object,
      .embed-responsive video {
         position: absolute;
         top: 0;
         bottom: 0;
         left: 0;
         width: 100%;
         height: 100%;
         border: 0;
      }

      .embed-responsive-16by9 {
         padding-bottom: 56.25%;
      }

      .embed-responsive-4by3 {
         padding-bottom: 75%;
      }

      .well {
         min-height: 20px;
         padding: 19px;
         margin-bottom: 20px;
         background-color: #f5f5f5;
         border: 1px solid #e3e3e3;
         border-radius: 4px;
         -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
         box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
      }

      .well blockquote {
         border-color: #ddd;
         border-color: rgba(0, 0, 0, .15);
      }

      .well-lg {
         padding: 24px;
         border-radius: 6px;
      }

      .well-sm {
         padding: 9px;
         border-radius: 3px;
      }

      .close {
         float: right;
         font-size: 21px;
         font-weight: bold;
         line-height: 1;
         color: #000;
         text-shadow: 0 1px 0 #fff;
         filter: alpha(opacity=20);
         opacity: .2;
      }

      .close:hover,
      .close:focus {
         color: #000;
         text-decoration: none;
         cursor: pointer;
         filter: alpha(opacity=50);
         opacity: .5;
      }

      button.close {
         -webkit-appearance: none;
         padding: 0;
         cursor: pointer;
         background: transparent;
         border: 0;
      }

      .modal-open {
         overflow: hidden;
      }

      .modal {
         position: fixed;
         top: 0;
         right: 0;
         bottom: 0;
         left: 0;
         z-index: 1050;
         display: none;
         overflow: hidden;
         -webkit-overflow-scrolling: touch;
         outline: 0;
      }

      .modal.fade .modal-dialog {
         -webkit-transition: -webkit-transform .3s ease-out;
         -o-transition: -o-transform .3s ease-out;
         transition: transform .3s ease-out;
         -webkit-transform: translate(0, -25%);
         -ms-transform: translate(0, -25%);
         -o-transform: translate(0, -25%);
         transform: translate(0, -25%);
      }

      .modal.in .modal-dialog {
         -webkit-transform: translate(0, 0);
         -ms-transform: translate(0, 0);
         -o-transform: translate(0, 0);
         transform: translate(0, 0);
      }

      .modal-open .modal {
         overflow-x: hidden;
         overflow-y: auto;
      }

      .modal-dialog {
         position: relative;
         width: auto;
         margin: 10px;
      }

      .modal-content {
         position: relative;
         background-color: #fff;
         -webkit-background-clip: padding-box;
         background-clip: padding-box;
         border: 1px solid #999;
         border: 1px solid rgba(0, 0, 0, .2);
         border-radius: 6px;
         outline: 0;
         -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
         box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
      }

      .modal-backdrop {
         position: fixed;
         top: 0;
         right: 0;
         bottom: 0;
         left: 0;
         z-index: 1040;
         background-color: #000;
      }

      .modal-backdrop.fade {
         filter: alpha(opacity=0);
         opacity: 0;
      }

      .modal-backdrop.in {
         filter: alpha(opacity=50);
         opacity: .5;
      }

      .modal-header {
         padding: 15px;
         border-bottom: 1px solid #e5e5e5;
      }

      .modal-header .close {
         margin-top: -2px;
      }

      .modal-title {
         margin: 0;
         line-height: 1.42857143;
      }

      .modal-body {
         position: relative;
         padding: 15px;
      }

      .modal-footer {
         padding: 15px;
         text-align: right;
         border-top: 1px solid #e5e5e5;
      }

      .modal-footer .btn+.btn {
         margin-bottom: 0;
         margin-left: 5px;
      }

      .modal-footer .btn-group .btn+.btn {
         margin-left: -1px;
      }

      .modal-footer .btn-block+.btn-block {
         margin-left: 0;
      }

      .modal-scrollbar-measure {
         position: absolute;
         top: -9999px;
         width: 50px;
         height: 50px;
         overflow: scroll;
      }

      @media (min-width: 768px) {
         .modal-dialog {
            width: 600px;
            margin: 30px auto;
         }

         .modal-content {
            -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
            box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
         }

         .modal-sm {
            width: 300px;
         }
      }

      @media (min-width: 992px) {
         .modal-lg {
            width: 900px;
         }
      }

      .tooltip {
         position: absolute;
         z-index: 1070;
         display: block;
         font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
         font-size: 12px;
         font-style: normal;
         font-weight: normal;
         line-height: 1.42857143;
         text-align: left;
         text-align: start;
         text-decoration: none;
         text-shadow: none;
         text-transform: none;
         letter-spacing: normal;
         word-break: normal;
         word-spacing: normal;
         word-wrap: normal;
         white-space: normal;
         filter: alpha(opacity=0);
         opacity: 0;
         line-break: auto;
      }

      .tooltip.in {
         filter: alpha(opacity=90);
         opacity: .9;
      }

      .tooltip.top {
         padding: 5px 0;
         margin-top: -3px;
      }

      .tooltip.right {
         padding: 0 5px;
         margin-left: 3px;
      }

      .tooltip.bottom {
         padding: 5px 0;
         margin-top: 3px;
      }

      .tooltip.left {
         padding: 0 5px;
         margin-left: -3px;
      }

      .tooltip-inner {
         max-width: 200px;
         padding: 3px 8px;
         color: #fff;
         text-align: center;
         background-color: #000;
         border-radius: 4px;
      }

      .tooltip-arrow {
         position: absolute;
         width: 0;
         height: 0;
         border-color: transparent;
         border-style: solid;
      }

      .tooltip.top .tooltip-arrow {
         bottom: 0;
         left: 50%;
         margin-left: -5px;
         border-width: 5px 5px 0;
         border-top-color: #000;
      }

      .tooltip.top-left .tooltip-arrow {
         right: 5px;
         bottom: 0;
         margin-bottom: -5px;
         border-width: 5px 5px 0;
         border-top-color: #000;
      }

      .tooltip.top-right .tooltip-arrow {
         bottom: 0;
         left: 5px;
         margin-bottom: -5px;
         border-width: 5px 5px 0;
         border-top-color: #000;
      }

      .tooltip.right .tooltip-arrow {
         top: 50%;
         left: 0;
         margin-top: -5px;
         border-width: 5px 5px 5px 0;
         border-right-color: #000;
      }

      .tooltip.left .tooltip-arrow {
         top: 50%;
         right: 0;
         margin-top: -5px;
         border-width: 5px 0 5px 5px;
         border-left-color: #000;
      }

      .tooltip.bottom .tooltip-arrow {
         top: 0;
         left: 50%;
         margin-left: -5px;
         border-width: 0 5px 5px;
         border-bottom-color: #000;
      }

      .tooltip.bottom-left .tooltip-arrow {
         top: 0;
         right: 5px;
         margin-top: -5px;
         border-width: 0 5px 5px;
         border-bottom-color: #000;
      }

      .tooltip.bottom-right .tooltip-arrow {
         top: 0;
         left: 5px;
         margin-top: -5px;
         border-width: 0 5px 5px;
         border-bottom-color: #000;
      }

      .popover {
         position: absolute;
         top: 0;
         left: 0;
         z-index: 1060;
         display: none;
         max-width: 276px;
         padding: 1px;
         font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
         font-size: 14px;
         font-style: normal;
         font-weight: normal;
         line-height: 1.42857143;
         text-align: left;
         text-align: start;
         text-decoration: none;
         text-shadow: none;
         text-transform: none;
         letter-spacing: normal;
         word-break: normal;
         word-spacing: normal;
         word-wrap: normal;
         white-space: normal;
         background-color: #fff;
         -webkit-background-clip: padding-box;
         background-clip: padding-box;
         border: 1px solid #ccc;
         border: 1px solid rgba(0, 0, 0, .2);
         border-radius: 6px;
         -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
         box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
         line-break: auto;
      }

      .popover.top {
         margin-top: -10px;
      }

      .popover.right {
         margin-left: 10px;
      }

      .popover.bottom {
         margin-top: 10px;
      }

      .popover.left {
         margin-left: -10px;
      }

      .popover-title {
         padding: 8px 14px;
         margin: 0;
         font-size: 14px;
         background-color: #f7f7f7;
         border-bottom: 1px solid #ebebeb;
         border-radius: 5px 5px 0 0;
      }

      .popover-content {
         padding: 9px 14px;
      }

      .popover>.arrow,
      .popover>.arrow:after {
         position: absolute;
         display: block;
         width: 0;
         height: 0;
         border-color: transparent;
         border-style: solid;
      }

      .popover>.arrow {
         border-width: 11px;
      }

      .popover>.arrow:after {
         content: "";
         border-width: 10px;
      }

      .popover.top>.arrow {
         bottom: -11px;
         left: 50%;
         margin-left: -11px;
         border-top-color: #999;
         border-top-color: rgba(0, 0, 0, .25);
         border-bottom-width: 0;
      }

      .popover.top>.arrow:after {
         bottom: 1px;
         margin-left: -10px;
         content: " ";
         border-top-color: #fff;
         border-bottom-width: 0;
      }

      .popover.right>.arrow {
         top: 50%;
         left: -11px;
         margin-top: -11px;
         border-right-color: #999;
         border-right-color: rgba(0, 0, 0, .25);
         border-left-width: 0;
      }

      .popover.right>.arrow:after {
         bottom: -10px;
         left: 1px;
         content: " ";
         border-right-color: #fff;
         border-left-width: 0;
      }

      .popover.bottom>.arrow {
         top: -11px;
         left: 50%;
         margin-left: -11px;
         border-top-width: 0;
         border-bottom-color: #999;
         border-bottom-color: rgba(0, 0, 0, .25);
      }

      .popover.bottom>.arrow:after {
         top: 1px;
         margin-left: -10px;
         content: " ";
         border-top-width: 0;
         border-bottom-color: #fff;
      }

      .popover.left>.arrow {
         top: 50%;
         right: -11px;
         margin-top: -11px;
         border-right-width: 0;
         border-left-color: #999;
         border-left-color: rgba(0, 0, 0, .25);
      }

      .popover.left>.arrow:after {
         right: 1px;
         bottom: -10px;
         content: " ";
         border-right-width: 0;
         border-left-color: #fff;
      }

      .carousel {
         position: relative;
      }

      .carousel-inner {
         position: relative;
         width: 100%;
         overflow: hidden;
      }

      .carousel-inner>.item {
         position: relative;
         display: none;
         -webkit-transition: .6s ease-in-out left;
         -o-transition: .6s ease-in-out left;
         transition: .6s ease-in-out left;
      }

      .carousel-inner>.item>img,
      .carousel-inner>.item>a>img {
         line-height: 1;
      }

      @media all and (transform-3d),
      (-webkit-transform-3d) {
         .carousel-inner>.item {
            -webkit-transition: -webkit-transform .6s ease-in-out;
            -o-transition: -o-transform .6s ease-in-out;
            transition: transform .6s ease-in-out;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-perspective: 1000px;
            perspective: 1000px;
         }

         .carousel-inner>.item.next,
         .carousel-inner>.item.active.right {
            left: 0;
            -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
         }

         .carousel-inner>.item.prev,
         .carousel-inner>.item.active.left {
            left: 0;
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
         }

         .carousel-inner>.item.next.left,
         .carousel-inner>.item.prev.right,
         .carousel-inner>.item.active {
            left: 0;
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
         }
      }

      .carousel-inner>.active,
      .carousel-inner>.next,
      .carousel-inner>.prev {
         display: block;
      }

      .carousel-inner>.active {
         left: 0;
      }

      .carousel-inner>.next,
      .carousel-inner>.prev {
         position: absolute;
         top: 0;
         width: 100%;
      }

      .carousel-inner>.next {
         left: 100%;
      }

      .carousel-inner>.prev {
         left: -100%;
      }

      .carousel-inner>.next.left,
      .carousel-inner>.prev.right {
         left: 0;
      }

      .carousel-inner>.active.left {
         left: -100%;
      }

      .carousel-inner>.active.right {
         left: 100%;
      }

      .carousel-control {
         position: absolute;
         top: 0;
         bottom: 0;
         left: 0;
         width: 15%;
         font-size: 20px;
         color: #fff;
         text-align: center;
         text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
         background-color: rgba(0, 0, 0, 0);
         filter: alpha(opacity=50);
         opacity: .5;
      }

      .carousel-control.left {
         background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
         background-image: -o-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
         background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .5)), to(rgba(0, 0, 0, .0001)));
         background-image: linear-gradient(to right, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%);
         filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
         background-repeat: repeat-x;
      }

      .carousel-control.right {
         right: 0;
         left: auto;
         background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
         background-image: -o-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
         background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .0001)), to(rgba(0, 0, 0, .5)));
         background-image: linear-gradient(to right, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%);
         filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1);
         background-repeat: repeat-x;
      }

      .carousel-control:hover,
      .carousel-control:focus {
         color: #fff;
         text-decoration: none;
         filter: alpha(opacity=90);
         outline: 0;
         opacity: .9;
      }

      .carousel-control .icon-prev,
      .carousel-control .icon-next,
      .carousel-control .glyphicon-chevron-left,
      .carousel-control .glyphicon-chevron-right {
         position: absolute;
         top: 50%;
         z-index: 5;
         display: inline-block;
         margin-top: -10px;
      }

      .carousel-control .icon-prev,
      .carousel-control .glyphicon-chevron-left {
         left: 50%;
         margin-left: -10px;
      }

      .carousel-control .icon-next,
      .carousel-control .glyphicon-chevron-right {
         right: 50%;
         margin-right: -10px;
      }

      .carousel-control .icon-prev,
      .carousel-control .icon-next {
         width: 20px;
         height: 20px;
         font-family: serif;
         line-height: 1;
      }

      .carousel-control .icon-prev:before {
         content: '\2039';
      }

      .carousel-control .icon-next:before {
         content: '\203a';
      }

      .carousel-indicators {
         position: absolute;
         bottom: 10px;
         left: 50%;
         z-index: 15;
         width: 60%;
         padding-left: 0;
         margin-left: -30%;
         text-align: center;
         list-style: none;
      }

      .carousel-indicators li {
         display: inline-block;
         width: 10px;
         height: 10px;
         margin: 1px;
         text-indent: -999px;
         cursor: pointer;
         background-color: #000 \9;
         background-color: rgba(0, 0, 0, 0);
         border: 1px solid #fff;
         border-radius: 10px;
      }

      .carousel-indicators .active {
         width: 12px;
         height: 12px;
         margin: 0;
         background-color: #fff;
      }

      .carousel-caption {
         position: absolute;
         right: 15%;
         bottom: 20px;
         left: 15%;
         z-index: 10;
         padding-top: 20px;
         padding-bottom: 20px;
         color: #fff;
         text-align: center;
         text-shadow: 0 1px 2px rgba(0, 0, 0, .6);
      }

      .carousel-caption .btn {
         text-shadow: none;
      }

      @media screen and (min-width: 768px) {

         .carousel-control .glyphicon-chevron-left,
         .carousel-control .glyphicon-chevron-right,
         .carousel-control .icon-prev,
         .carousel-control .icon-next {
            width: 30px;
            height: 30px;
            margin-top: -10px;
            font-size: 30px;
         }

         .carousel-control .glyphicon-chevron-left,
         .carousel-control .icon-prev {
            margin-left: -10px;
         }

         .carousel-control .glyphicon-chevron-right,
         .carousel-control .icon-next {
            margin-right: -10px;
         }

         .carousel-caption {
            right: 20%;
            left: 20%;
            padding-bottom: 30px;
         }

         .carousel-indicators {
            bottom: 20px;
         }
      }

      .clearfix:before,
      .clearfix:after,
      .dl-horizontal dd:before,
      .dl-horizontal dd:after,
      .container:before,
      .container:after,
      .container-fluid:before,
      .container-fluid:after,
      .row:before,
      .row:after,
      .form-horizontal .form-group:before,
      .form-horizontal .form-group:after,
      .btn-toolbar:before,
      .btn-toolbar:after,
      .btn-group-vertical>.btn-group:before,
      .btn-group-vertical>.btn-group:after,
      .nav:before,
      .nav:after,
      .navbar:before,
      .navbar:after,
      .navbar-header:before,
      .navbar-header:after,
      .navbar-collapse:before,
      .navbar-collapse:after,
      .pager:before,
      .pager:after,
      .panel-body:before,
      .panel-body:after,
      .modal-header:before,
      .modal-header:after,
      .modal-footer:before,
      .modal-footer:after {
         display: table;
         content: " ";
      }

      .clearfix:after,
      .dl-horizontal dd:after,
      .container:after,
      .container-fluid:after,
      .row:after,
      .form-horizontal .form-group:after,
      .btn-toolbar:after,
      .btn-group-vertical>.btn-group:after,
      .nav:after,
      .navbar:after,
      .navbar-header:after,
      .navbar-collapse:after,
      .pager:after,
      .panel-body:after,
      .modal-header:after,
      .modal-footer:after {
         clear: both;
      }

      .center-block {
         display: block;
         margin-right: auto;
         margin-left: auto;
      }

      .pull-right {
         float: right ;
      }

      .pull-left {
         float: left ;
      }

      .hide {
         display: none ;
      }

      .show {
         display: block ;
      }

      .invisible {
         visibility: hidden;
      }

      .text-hide {
         font: 0/0 a;
         color: transparent;
         text-shadow: none;
         background-color: transparent;
         border: 0;
      }

      .hidden {
         display: none ;
      }

      .affix {
         position: fixed;
      }

      @-ms-viewport {
         width: device-width;
      }

      .visible-xs,
      .visible-sm,
      .visible-md,
      .visible-lg {
         display: none ;
      }

      .visible-xs-block,
      .visible-xs-inline,
      .visible-xs-inline-block,
      .visible-sm-block,
      .visible-sm-inline,
      .visible-sm-inline-block,
      .visible-md-block,
      .visible-md-inline,
      .visible-md-inline-block,
      .visible-lg-block,
      .visible-lg-inline,
      .visible-lg-inline-block {
         display: none ;
      }

      @media (max-width: 767px) {
         .visible-xs {
            display: block ;
         }

         table.visible-xs {
            display: table ;
         }

         tr.visible-xs {
            display: table-row ;
         }

         th.visible-xs,
         td.visible-xs {
            display: table-cell ;
         }
      }

      @media (max-width: 767px) {
         .visible-xs-block {
            display: block ;
         }
      }

      @media (max-width: 767px) {
         .visible-xs-inline {
            display: inline ;
         }
      }

      @media (max-width: 767px) {
         .visible-xs-inline-block {
            display: inline-block ;
         }
      }

      @media (min-width: 768px) and (max-width: 991px) {
         .visible-sm {
            display: block ;
         }

         table.visible-sm {
            display: table ;
         }

         tr.visible-sm {
            display: table-row ;
         }

         th.visible-sm,
         td.visible-sm {
            display: table-cell ;
         }
      }

      @media (min-width: 768px) and (max-width: 991px) {
         .visible-sm-block {
            display: block ;
         }
      }

      @media (min-width: 768px) and (max-width: 991px) {
         .visible-sm-inline {
            display: inline ;
         }
      }

      @media (min-width: 768px) and (max-width: 991px) {
         .visible-sm-inline-block {
            display: inline-block ;
         }
      }

      @media (min-width: 992px) and (max-width: 1199px) {
         .visible-md {
            display: block ;
         }

         table.visible-md {
            display: table ;
         }

         tr.visible-md {
            display: table-row ;
         }

         th.visible-md,
         td.visible-md {
            display: table-cell ;
         }
      }

      @media (min-width: 992px) and (max-width: 1199px) {
         .visible-md-block {
            display: block ;
         }
      }

      @media (min-width: 992px) and (max-width: 1199px) {
         .visible-md-inline {
            display: inline ;
         }
      }

      @media (min-width: 992px) and (max-width: 1199px) {
         .visible-md-inline-block {
            display: inline-block ;
         }
      }

      @media (min-width: 1200px) {
         .visible-lg {
            display: block ;
         }

         table.visible-lg {
            display: table ;
         }

         tr.visible-lg {
            display: table-row ;
         }

         th.visible-lg,
         td.visible-lg {
            display: table-cell ;
         }
      }

      @media (min-width: 1200px) {
         .visible-lg-block {
            display: block ;
         }
      }

      @media (min-width: 1200px) {
         .visible-lg-inline {
            display: inline ;
         }
      }

      @media (min-width: 1200px) {
         .visible-lg-inline-block {
            display: inline-block ;
         }
      }

      @media (max-width: 767px) {
         .hidden-xs {
            display: none ;
         }
      }

      @media (min-width: 768px) and (max-width: 991px) {
         .hidden-sm {
            display: none ;
         }
      }

      @media (min-width: 992px) and (max-width: 1199px) {
         .hidden-md {
            display: none ;
         }
      }

      @media (min-width: 1200px) {
         .hidden-lg {
            display: none ;
         }
      }

      .visible-print {
         display: none ;
      }

      @media print {
         .visible-print {
            display: block ;
         }

         table.visible-print {
            display: table ;
         }

         tr.visible-print {
            display: table-row ;
         }

         th.visible-print,
         td.visible-print {
            display: table-cell ;
         }
      }

      .visible-print-block {
         display: none ;
      }

      @media print {
         .visible-print-block {
            display: block ;
         }
      }

      .visible-print-inline {
         display: none ;
      }

      @media print {
         .visible-print-inline {
            display: inline ;
         }
      }

      .visible-print-inline-block {
         display: none ;
      }

      @media print {
         .visible-print-inline-block {
            display: inline-block ;
         }
      }

      @media print {
         .hidden-print {
            display: none ;
         }
      }

      * {
         margin: 0px;
         padding: 0px;
         box-sizing: border-box;
      }

      body {
         font-family: 'Poppins', sans-serif;
         color: #1c2530;
         overflow-x: hidden;
         font-size: 18px;
         line-height: 32px;
      }

      ul,
      ol {
         list-style: none;
      }

      a {
         text-decoration: none;
         transition: all 0.3s ease;
      }

      a:focus,
      a:hover {
         color: #23527c;
         text-decoration: underline;
      }

      .d-flex {
         display: flex ;
      }

      img,
      amp-img {
         max-width: 100%;
         height: auto;
         vertical-align: middle;
         border: 0;
      }

      .secondary-bg {
         background-color: #f8faff ;
      }

      h2,
      .mid-h1 {
         font-size: 64px;
         line-height: 78px;
         font-weight: 900;
      }

      h1,
      h2,
      h3,
      h4,
      h5,
      h6 {
         margin: 0px;
         font-family: 'Poppins', sans-serif;
      }

      h1,
      h2.big-h2 {
         font-size: 72px;
         font-weight: 700;
         line-height: 82px;
      }

      h2,
      .mid-h1 {
         font-size: 64px;
         line-height: 78px;
         font-weight: 900;
      }

      h2 strong {
         color: #0487FF;
         font-weight: 900;
      }

      h1.medium,
      h3 {
         font-size: 48px;
         line-height: 64px;
      }

      h3 {
         font-weight: 900;
      }

      h1.small,
      .service-title h1,
      h4 {
         font-size: 40px;
         line-height: 50px;
      }

      h5 {
         font-size: 32px;
         line-height: 48px;
      }

      h6 {
         font-size: 20px;
         line-height: 28px;
         color: #666;
         text-transform: uppercase;
         font-weight: 400;
         letter-spacing: 1px;
      }

      p,
      ol,
      ul {
         font-size: 18px;
         line-height: 32px;
      }

      small {
         font-size: 14px;
         line-height: 24px;
         display: inline-block;
      }

      .common-section {
         padding-top: 90px;
         padding-bottom: 90px;
      }

      .common-section-small {
         padding-top: 65px;
         padding-bottom: 65px;
      }

      .custom-saperator {
         height: 30px;
         visibility: hidden;
      }

      .pb-0 {
         padding-bottom: 0 ;
      }

      .pt-0 {
         padding-top: 0 ;
      }

      /* Button Style Start */
      .btn-grp {
         margin: 0 -15px
      }

      .btn-grp a {
         margin: 15px
      }

      .theme-btn a .fireworks,
      .theme-btn button .fireworks,
      .theme-btn input .fireworks {
         position: absolute;
         top: -2px;
         left: -2px;
         border-radius: 50px
      }

      .theme-btn a,
      .theme-btn button {
         padding: 15px 30px;
         font-size: 18px;
         line-height: 18px;
         background: 0 0;
         border: 2px solid transparent;
         display: inline-block;
         text-transform: capitalize;
         border-radius: 50px;
         text-decoration: none ;
         transition-duration: .3s;
         -webkit-transition-duration: .3s;
         position: relative;
         cursor: pointer
      }

      .theme-btn.bordered-blue a {
         color: #0487ff;
         border-color: #0487ff
      }

      .theme-btn.bordered-blue a:hover,
      .theme-btn.bordered-blue button:hover {
         background: #0487ff;
         color: #fff
      }

      .theme-btn.bordered-white a,
      .theme-btn.bordered-white button {
         color: #fff;
         border-color: #fff
      }

      .theme-btn.bordered-white a:hover,
      .theme-btn.bordered-white button:hover {
         background: #fff;
         color: #0487ff
      }

      .theme-btn.bordered-black a,
      .theme-btn.bordered-black button {
         color: #1c2530;
         border-color: #1c2530
      }

      .theme-btn.bordered-black a:hover,
      .theme-btn.bordered-black button:hover {
         background: #1c2530;
         color: #fff
      }

      .theme-btn.solid-blue a,
      .theme-btn.solid-blue button {
         color: #fff;
         border-color: #0487ff;
         background: #0487ff
      }

      .theme-btn.solid-blue a:hover,
      .theme-btn.solid-blue button:hover {
         background: 0 0;
         color: #0487ff
      }

      /* Button Style End */
      /* Header Style Start */
      .menu-item-has-children {
         position: relative;
      }

      .sub-menu {
         overflow: visible;
         display: block;
         position: absolute;
         left: 0;
         top: calc(100% - 2px);
         border-top: 34px solid transparent;
         visibility: hidden;
         transition-duration: .3s;
         -webkit-transition-duration: .3s;
         opacity: 0
      }

      .hamburger {
         position: relative;
         display: inline-block;
         vertical-align: middle;
         width: 52px;
         height: 52px;
         background: #fff;
         -webkit-touch-callout: none;
         -webkit-user-select: none;
         -moz-user-select: none;
         -ms-user-select: none;
         user-select: none;
         -webkit-transform: scale(1);
         transform: scale(1);
         cursor: pointer
      }

      .burger-main {
         position: absolute;
         padding: 12px;
         height: 52px;
         width: 52px
      }

      header.site-header {
         position: fixed;
         z-index: 99999;
         width: 100%;
         top: 0;
         left: 0
      }

      .desktop-mega-header ul.menu>li>a:hover,
      .linebtn {
         color: #0d7cff
      }

      .main-header {
         padding: 15px;
         background: #fff;
         overflow: visible;
         display: flex;
         align-items: center;
         border-bottom: 2px solid #efefef;
         transition: .3s ease-in-out;
         -webkit-transition: .3s ease-in-out
      }

      .main-header>div {
         width: 100%
      }

      .primary-head-menu ul {
         margin-bottom: 0
      }

      .primary-head-menu ul>li {
         float: left;
         margin: 0 22px
      }

      .primary-head-menu ul>li>a {
         text-transform: uppercase;
         font-size: 16px;
         line-height: 30px;
         color: #1c2530;
         font-weight: 400;
         position: relative;
         display: block
      }

      .primary-head-menu ul.menu>li>a::after {
         content: "";
         display: block;
         width: 0;
         height: 2px;
         background-color: #1c2530;
         position: absolute;
         bottom: 0;
         left: 0
      }

      .primary-head-menu ul.menu>li.career-menu>a::after {
         display: none
      }

      .primary-head-menu ul>li.current-menu-item>a::after,
      .primary-head-menu ul>li.current_page_item>a,
      .primary-head-menu ul>li.current_page_item>a::after {
         width: 100%;
         animation: none
      }

      .primary-head-menu ul>li.current-menu-item>a::after,
      .primary-head-menu ul>li.current_page_item>a::after {
         background-color: #0487ff
      }

      .primary-head-menu ul>li:hover>a,
      .primary-head-menu ul>li>a:focus {
         text-decoration: none
      }

      .primary-head-menu ul>li.current-menu-item>a,
      .primary-head-menu ul>li.current_page_item>a {
         text-decoration: none;
         color: #0487ff
      }

      .menu-item-has-children>a::after {
         max-width: calc(100% - 20px)
      }

      .main-header>div.primary-logo {
         width: auto;
         display: inline-block;
         flex-shrink: 0;
         -webkit-flex-shrink: 0;
         transition: .3s ease-in-out;
         -webkit-transition: .3s ease-in-out
      }

      .main-header>div.primary-logo a {
         width: 100%;
         display: inline-block
      }

      .main-header>div.primary-logo amp-img {
         width: 240px;
         height: 61px;
         aspect-ratio: 1/0.20;
      }

      .desktop-mega-header.main-header {
         padding: 15px 32px;
         justify-content: space-between
      }

      .main-header.desktop-mega-header>div.desktop-primary-menu {
         width: auto;
         display: flex;
         align-items: center
      }

      .desktop-mega-header .desktop-primary-menu li.service-megamenu .sub-menu {
         top: 100%;
         border-top: 0;
         left: 0;
         margin: 0;
         max-width: 100%;
         width: 100%;
         background: #fff;
         box-shadow: 0 5px 16px rgba(0, 0, 0, .09)
      }

      .desktop-mega-header li.service-megamenu .sub-menu li {
         width: 100%;
         margin: 0 ;
         float: none
      }

      .desktop-mega-header .what-we-do-submenu ul,
      .desktop-mega-header .what-we-do-submenu ul>li {
         margin: 0
      }

      .desktop-mega-header .about-submenu .mega-sub-menu-wrapper,
      .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper {
         padding: 20px 45px
      }

      .desktop-mega-header .about-submenu .mega-sub-menu-wrapper .main-service-cat,
      .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat {
         text-decoration: none ;
         margin-bottom: 24px ;
         display: inline-block;
         padding-bottom: 2px;
         position: relative;
         font-family: Poppins;
         font-style: normal;
         font-weight: 600;
         font-size: 18px;
         line-height: 27px;
         text-transform: capitalize;
         color: #0d7cff
      }

      .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat:hover {
         color: #000 
      }

      .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat:after {
         content: '';
         position: absolute;
         bottom: 0;
         left: 0;
         width: 165px;
         height: 2px;
         background: #ededed
      }

      .desktop-mega-header .about-submenu .mega-sub-menu-wrapper .megamenu-item-icon,
      .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .megamenu-item-icon {
         width: 24px;
         height: 24px;
         border-radius: 2px;
         background-color: #f0f7ff;
         display: flex;
         align-items: center;
         justify-content: center;
         margin-bottom: 0 ;
      }

      .desktop-mega-header .about-submenu .service-sub-cat>li>a,
      .desktop-mega-header .what-we-do-submenu .service-sub-cat>li>a {
         display: inline-flex;
         align-items: center
      }

      .desktop-mega-header .about-submenu .service-sub-cat>li>a:hover .megamenu-item-desc span,
      .desktop-mega-header .what-we-do-submenu .service-sub-cat>li>a:hover .megamenu-item-desc span {
         color: #0d7cff 
      }

      .desktop-mega-header .desktop-primary-menu li.about-megamenu .about-submenu .service-sub-cat>li,
      .desktop-mega-header .desktop-primary-menu li.service-megamenu .what-we-do-submenu .service-sub-cat>li {
         margin-bottom: 18px ;
         line-height: 1
      }

      .desktop-mega-header .what-we-do-submenu .service-sub-cat>li:last-child,
      .desktop-mega-header .what-we-do-submenu .service-sub-cat>li:nth-last-child(2),
      .desktop-mega-header li.service-megamenu .sub-menu li .hire-dev-box>li:last-child {
         margin-bottom: 0 
      }

      .desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc,
      .desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc {
         margin-bottom: 0;
         margin-left: 16px;
         line-height: 27px
      }

      .desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc span,
      .desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc span {
         font-size: 18px;
         line-height: 27px;
         font-weight: 500;
         color: #000;
         text-transform: capitalize
      }

      .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper>ul {
         display: grid;
         grid-template-columns: repeat(3, 1fr);
         grid-gap: 5px
      }

      .desktop-mega-header .menu-item-has-children>a {
         padding-right: 0;
         background: 0 0
      }

      .desktop-mega-header ul.menu>li.menu-item-has-children>a:after {
         bottom: -3px;
         max-width: 100%
      }

      .desktop-mega-header ul.menu {
         display: flex;
         align-items: center;
         margin: 0
      }

      .desktop-mega-header ul.menu>li {
         margin: 0 32px;
         float: none
      }

      .desktop-mega-header ul.menu>li>a {
         margin: 12px 0;
         text-transform: none;
         font-weight: 400;
         font-size: 18px;
         line-height: 30px
      }

      .desktop-mega-header ul.menu>li.career-menu a {
         display: block;
         color: #0487ff;
         padding: 15px 30px;
         font-weight: 600;
         font-size: 18px;
         line-height: 18px;
         border: 2px solid #0487ff;
         border-radius: 100px
      }

      .desktop-mega-header ul.menu>li.career-menu a:hover {
         color: #fff;
         background: #0487ff
      }

      .desktop-mega-header ul.menu>li.career-menu {
         margin-left: 0;
         margin-right: 0
      }

      .desktop-mega-header .header-contactus {
         margin-left: 32px
      }

      .megamenu-left {
         width: 60%
      }

      .megamenu-right {
         width: 40%;
         display: flex;
         align-items: center
      }

      .hire-dev-rightbox {
         background: url('https://www.yudiz.com/wp-content/themes/yudiz/images/header-dev-sec-image.png') center center/cover no-repeat
      }

      .hire-dev-rightbox-overlay {
         position: relative
      }

      .hire-dev-rightbox-overlay:before {
         content: '';
         position: absolute;
         left: 0;
         top: 0;
         background: linear-gradient(89.3deg, #000 18.37%, rgba(0, 0, 0, .33) 70.26%, rgba(0, 0, 0, 0) 99.38%);
         width: 100%;
         height: 100%
      }

      .hire-develop-wrapper {
         position: relative;
         z-index: 10;
         padding: 75px 20px;
         height: 100%;
      }

      .megamenu-right li {
         background: 0 0
      }

      .desktop-mega-header li.service-megamenu .sub-menu li .hire-dev-box>li {
         display: flex;
      }

      .hire-dev-box .hire-icon-box {
         width: 40px;
         height: 40px;
         margin-right: 12px;
         border-radius: 2px;
         background-color: #fff;
         display: flex;
         align-items: center;
         justify-content: center
      }

      .hire-dev-box .hire-icon-box {
         display: none;
      }

      .hire-desc-box {
         width: calc(100% - 52px);
      }

      .hire-desc-box h5 {
         margin-bottom: 2px;
         font-weight: 500;
         font-size: 24px;
         line-height: 39px;
         color: #000
      }

      .hire-desc-box p {
         margin-bottom: 4px;
         font-size: 16px;
         line-height: 170%;
         font-weight: 400
      }

      .linebtn {
         font-size: 16px;
         line-height: 26px;
         font-weight: 500;
         display: inline-flex;
         align-items: center
      }

      .linebtn img {
         margin-left: 5px
      }

      .hire-dev-rightbox-overlay .hire-desc-box h5,
      .hire-dev-rightbox-overlay .hire-desc-box p {
         color: #fff
      }

      .desktop-mega-header .desktop-primary-menu li.product-megamenu .sub-menu {
         top: 100%;
         border-top: 0;
         left: auto;
         right: 0px;
         margin: 0;
         max-width: 81%;
         width: auto;
         background: #fff;
         box-shadow: 0 5px 16px rgba(0, 0, 0, .09)
      }

      .desktop-mega-header .desktop-primary-menu li.product-megamenu .sub-menu>li {
         margin: 0;
         float: none
      }

      .our-product-wrapper {
         display: flex;
         width: 100%
      }

      .our-product-wrapper .product-wrapper-left {
         padding: 0;
         width: calc(100% - 30%)
      }

      .our-product-wrapper .product-wrapper-right {
         padding: 20px 32px;
         background-color: #f0f7ff;
         width: 30%
      }

      .our-product-wrapper .product-wrapper-left>ul {
         display: grid;
         grid-template-columns: repeat(3, 1fr);
         margin: 0;
         height: 100%
      }

      .our-product-wrapper .product-wrapper-left>ul>li {
         height: 377px;
         margin: 0 
      }

      .our-product-wrapper ul>li {
         float: none;
         position: relative;
         margin: 0 
      }

      .hire-dev-box {
         margin: 0 ;
         height: 100%;
      }

      .desktop-mega-header li.service-megamenu .sub-menu li .hire-dev-box {
         max-width: 80%;
         display: flex;
         justify-content: space-between;
         flex-direction: column;
      }

      .our-product-wrapper ul>li .product-detail-box {
         padding: 20px;
         height: 100%;
         width: 100%;
         background-repeat: no-repeat;
         background-position: center;
         background-size: cover;
         display: flex;
         align-items: center;
         justify-content: center;
         text-align: center
      }

      .our-product-wrapper ul>li .product-detail-box .img-box {
         height: 150px;
         display: flex;
         align-items: center;
         justify-content: center
      }

      .our-product-wrapper ul>li .product-detail-box .img-box img {
         max-height: 100%;
         max-width: 100%
      }

      .product-detail-hoverbox {
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: rgba(0, 0, 0, .8);
         z-index: 2;
         opacity: 0;
         visibility: hidden;
         transition: .3s linear;
         transform: scale(.2);
         display: flex;
         align-items: center;
         justify-content: center
      }

      .our-product-wrapper ul>li:hover .product-detail-hoverbox {
         opacity: 1;
         visibility: visible;
         transform: scale(1)
      }

      .our-product-wrapper ul>li .product-detail-box p {
         margin-top: 28px;
         font-weight: 500;
         font-size: 16px;
         line-height: 170%;
         color: #fff
      }

      .visitlink {
         padding: 4px 42px;
         background: #fff;
         border-radius: 100px;
         font-weight: 400;
         font-size: 18px;
         line-height: 30px;
         color: #000;
         text-align: center;
         text-decoration: none 
      }

      .desktop-mega-header .desktop-primary-menu li.about-megamenu,
      .desktop-mega-header .desktop-primary-menu li.product-megamenu,
      .desktop-mega-header .desktop-primary-menu li.service-megamenu {
         position: unset
      }

      @keyframes border {
         0% {
            transform: scaleX(1);
            transform-origin: right;
         }

         50% {
            transform: scaleX(0);
            transform-origin: right;
         }

         50.01% {
            transform: scaleX(0);
            transform-origin: left;
         }

         100% {
            transform: scaleX(1);
            transform-origin: left;
         }
      }

      @-webkit-keyframes border {
         0% {
            transform: scaleX(1);
            transform-origin: right;
         }

         50% {
            transform: scaleX(0);
            transform-origin: right;
         }

         50.01% {
            transform: scaleX(0);
            transform-origin: left;
         }

         100% {
            transform: scaleX(1);
            transform-origin: left;
         }
      }

      .menu-item-has-children:hover a:hover+.sub-menu,
      .sub-menu:hover {
         visibility: visible;
         opacity: 1;
      }

      .desktop-mega-header .desktop-primary-menu li.about-megamenu .sub-menu {
         margin-top: 0;
         top: 100%;
         border-top: 0;
         left: 32%;
         right: 10px;
         margin: 0 ;
         max-width: 55%;
         width: auto;
         background: #FFFFFF;
         box-shadow: 0px 5px 16px rgb(0 0 0 / 9%);
      }

      .hamburger {
         position: relative;
         display: inline-block;
         vertical-align: middle;
         width: 52px;
         height: 52px;
         background: #fff;
         -webkit-touch-callout: none;
         -webkit-user-select: none;
         -moz-user-select: none;
         -ms-user-select: none;
         user-select: none;
         -webkit-transform: scale(1);
         transform: scale(1);
         cursor: pointer;
      }

      .burger-main {
         position: absolute;
         padding: 12px;
         height: 52px;
         width: 52px;
      }

      .burger-inner {
         position: relative;
         height: 26px;
         width: 28px;
      }

      .burger-main span {
         position: absolute;
         display: block;
         height: 2px;
         width: 28px;
         border-radius: 2px;
         background: #1c2530;
      }

      .hamburger.open .burger-main span {
         background: #0487FF;
      }

      .top {
         top: 2px;
         transform-origin: 30px 2px;
      }

      .bot {
         bottom: 2px;
         transform-origin: 28px 2px;
      }

      .mid {
         top: 12px;
      }

      /* About mega menu */
      .desktop-mega-header .desktop-primary-menu li.about-megamenu {
         position: unset;
      }

      .desktop-mega-header .desktop-primary-menu li .common-megamenu .megamenu-left {
         background: url('https://www.yudiz.com/wp-content/uploads/2022/09/pattern-bg-aboutmenu.png')no-repeat 0% 0%/auto;
      }

      .desktop-mega-header .desktop-primary-menu li.about-megamenu .sub-menu {
         margin-top: 0;
         top: 100%;
         border-top: 0;
         left: 32%;
         right: 10px;
         margin: 0 ;
         max-width: 55%;
         width: auto;
         background: #FFFFFF;
         box-shadow: 0px 5px 16px rgba(0, 0, 0, 0.09);
      }

      .desktop-mega-header .desktop-primary-menu li.about-megamenu .sub-menu>li {
         margin: 0;
         float: none;
      }

      .desktop-mega-header .desktop-primary-menu .primary-head-menu li.about-megamenu li {
         margin: 0;
      }

      .desktop-mega-header .desktop-primary-menu .sub-menu .primary-head-menu li.about-megamenu {
         float: none;
         margin: 0;
      }

      .desktop-mega-header .desktop-primary-menu li.about-megamenu .about-submenu .service-sub-cat li {
         margin: 0;
         float: none;
      }

      .desktop-mega-header .desktop-primary-menu li.about-megamenu .about-submenu .megamenu-left {
         width: 30%;
      }

      .desktop-mega-header .desktop-primary-menu li.about-megamenu .about-submenu .megamenu-right {
         width: 70%;
      }

      .desktop-mega-header .desktop-primary-menu li.about-megamenu .about-submenu li {
         float: none;
      }

      .desktop-mega-header .desktop-primary-menu li.about-megamenu .about-submenu ul {
         margin: 0;
      }

      .desktop-mega-header .desktop-primary-menu li.about-megamenu .service-sub-cat {
         margin: 0;
      }

      .desktop-mega-header .desktop-primary-menu li.about-megamenu .sub-menu li {
         background: transparent;
      }

      .about-brochure-wrapper .hire-dev-box>li {
         display: flex;
         align-items: center;
      }

      .quote-text-para {
         margin-top: 87px;
         font-family: 'Poppins';
         font-style: italic;
         font-weight: 400;
         font-size: 16px;
         line-height: 170%;
      }

      .about-brochure-wrapper .hire-dev-box>li .hire-desc-box {
         width: 46%;
         margin-left: 30px;
      }

      /* Our Product Menu */
      .desktop-mega-header .desktop-primary-menu li.product-megamenu {
         position: unset;
      }

      .desktop-mega-header .desktop-primary-menu li.product-megamenu .sub-menu {
         margin-top: 0;
         top: 100%;
         border-top: 0;
         left: auto;
         right: 10px;
         margin: 0;
         max-width: 81%;
         width: auto;
         background: #FFFFFF;
         box-shadow: 0px 5px 16px rgba(0, 0, 0, 0.09);
      }

      .desktop-mega-header .desktop-primary-menu li.product-megamenu .sub-menu>li {
         margin: 0;
         float: none;
      }

      .our-product-wrapper {
         display: flex;
         width: 100%;
      }

      .our-product-wrapper .product-wrapper-left {
         padding: 0;
         width: calc(100% - 30%);
      }

      .our-product-wrapper .product-wrapper-right {
         padding: 20px 32px;
         background-color: #F0F7FF;
         width: 30%;
      }

      .our-product-wrapper .product-wrapper-right .hire-dev-box {
         height: auto ;
      }

      .our-product-wrapper .product-wrapper-left>ul {
         display: grid;
         grid-template-columns: repeat(3, 1fr);
         margin: 0;
         height: 100%;
      }

      .our-product-wrapper .product-wrapper-left>ul>li {
         height: 377px;
         margin: 0 ;
      }

      .our-product-wrapper ul>li {
         margin: 0;
         float: none;
      }

      .hire-dev-box {
         margin: 0 ;
      }

      .our-product-wrapper ul>li .product-detail-box {
         padding: 20px;
         height: 100%;
         width: 100%;
         background-repeat: no-repeat;
         background-position: center;
         background-size: cover;
         display: flex;
         align-items: center;
         justify-content: center;
         text-align: center;
      }

      .our-product-wrapper ul>li .product-detail-box .img-box {
         height: 150px;
         display: flex;
         align-items: center;
         justify-content: center;
      }

      .our-product-wrapper ul>li .product-detail-box .img-box img {
         max-height: 100%;
         max-width: 100%;
      }

      .our-product-wrapper ul>li {
         position: relative;
         margin: 0 ;
      }

      .product-detail-hoverbox {
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: rgba(0, 0, 0, .8);
         z-index: 2;
         opacity: 0;
         visibility: hidden;
         transition: .3s linear;
         transform: scale(.2);
         display: flex;
         align-items: center;
         justify-content: center;
      }

      .our-product-wrapper ul>li:hover .product-detail-hoverbox {
         opacity: 1;
         visibility: visible;
         transform: scale(1);
      }

      .our-product-wrapper ul>li .product-detail-box p {
         margin-top: 28px;
         font-weight: 500;
         font-size: 16px;
         line-height: 170%;
         color: #FFFFFF;
      }

      .visitlink {
         padding: 4px 42px;
         background: #FFFFFF;
         border-radius: 100px;
         font-weight: 400;
         font-size: 18px;
         line-height: 30px;
         color: #000000;
         text-align: center;
         text-decoration: none ;
      }

      /*============ Investor Menu Start ==============*/
      .dropdown-new-menu .sub-menu {
         border-top: 24px;
         margin: 0;
         padding: 24px 12px;
         min-width: 274px;
         background: #FFFFFF;
         box-shadow: 0px 5px 16px rgba(0, 0, 0, 0.09);
      }

      .dropdown-new-menu>.sub-menu {
         left: 50%;
         transform: translate(-50%);
      }

      .dropdown-new-menu .sub-menu .sub-menu {
         left: calc(100% + 12px);
         min-width: 309px;
         top: 0;
      }

      .dropdown-new-menu .sub-menu li a {
         text-transform: capitalize;
         font-family: 'Poppins';
         font-weight: 500;
         font-size: 18px;
         line-height: 30px;
         color: #000000;
      }

      .dropdown-new-menu .sub-menu li {
         position: relative;
         float: none;
         margin: 0 0 24px;
      }

      .dropdown-new-menu .sub-menu li:after {
         opacity: 0;
         content: "";
         position: absolute;
         right: 0;
         top: 50%;
         transform: translateY(-50%);
         width: 9px;
         height: 11px;
         background: url('https://www.yudiz.com/wp-content/themes/yudiz/images/polygon-menu.svg')no-repeat center center/cover;
      }

      .dropdown-new-menu .sub-menu li.menu-item-has-children:after {
         opacity: 1;
      }

      .dropdown-new-menu .sub-menu li.menu-item-has-children {
         padding-right: 24px;
      }

      .dropdown-new-menu .sub-menu li:last-child {
         margin-bottom: 0;
      }

      .dropdown-new-menu .sub-menu li.investor-tagline a {
         font-size: 16px;
         line-height: 22px;
         font-style: italic;
      }

      /*============ Investor Menu End ==============*/

      /* Header Style End */
      /* Footer Style ============================= */
      footer aside,
      footer aside ul {
         margin-bottom: 0px;
      }

      .site-footer {
         background: #1c2530;
         position: relative;
         z-index: 11;
      }

      .footer-row {
         padding-top: 50px;
      }

      .footer-content {
         padding: 100px 0px 50px;
      }

      .footer-item-title {
         color: #47EBC6;
         margin-bottom: 15px;
         letter-spacing: 0px;
         text-transform: capitalize;
      }

      .footer-logo {
         margin-bottom: 30px;
      }

      .footer-logo amp-img {
         width: 191px;
         height: 50px;
         aspect-ratio: 1/0.27;
      }

      .footer-company-text,
      .footer-address-block .widget_custom_html {
         color: rgba(255, 255, 255, 0.8);
         font-weight: 300;
      }

      .footer-review-icons {
         text-align: right;
      }

      .footer-review-icons a {
         margin-left: 15px;
         display: inline-block;
      }

      .footer-company-text p,
      .footer-address-block .widget_custom_html p {
         font-size: 16px;
         line-height: 28px;
      }

      .footer-address-block .widget_custom_html strong {
         color: rgba(255, 255, 255, 0.25);
      }

      img.wp-smiley,
      img.emoji {
         margin: 0px 8px 10px 0px ;
         height: 15px ;
         width: 20px ;
         vertical-align: top ;
      }

      .footer-address-block .widget_custom_html p img {
         object-fit: cover;
         overflow: hidden;
         margin: auto 8px auto 0px ;
         height: 20px ;
         width: 27.5px;
         vertical-align: middle ;
      }

      .footer-address-block .widget_custom_html .textwidget>div:first-child p img {
         object-position: left center;
      }

      .footer-address-block .widget_custom_html .textwidget>div:nth-child(2) p img {
         object-position: -27.5px center;
      }

      .footer-address-block .widget_custom_html .textwidget>div:nth-child(3) p img {
         object-position: -55px center;
      }

      .footer-address-block .widget_custom_html .textwidget>div:last-child p img {
         object-position: right center;
      }

      ul.cnss-social-icon {
         margin: 0px -6px;
      }

      #menu-footer-links li {
         padding-right: 5px;
         margin-bottom: 20px;
         font-size: 16px;
         line-height: 26px;
         width: calc(50% - 5px);
         display: inline-block;
         font-weight: 300;
      }

      #menu-footer-links li a {
         color: #fff;
         opacity: 0.8;
         text-transform: capitalize;
         transition-duration: 0.5s;
         -webkit-transition-duration: 0.3s;
         font-style: italic;
         position: relative;
      }

      #menu-footer-links li.current_page_item a,
      #menu-footer-links li.current-menu-item a {
         font-weight: 700;
         text-decoration: none;
         opacity: 1;
      }

      #menu-footer-links li a:hover {
         opacity: 1;
      }

      .footer-contact {
         padding: 40px;
         position: relative;
         overflow: hidden;
         z-index: 1;
      }

      .footer-contact:before,
      .footer-contact:after {
         position: absolute;
         bottom: 0;
         right: 0;
         height: 100%;
         width: 100%;
         border: 1px solid #4A4A4A;
         content: "";
         display: block;
      }

      .footer-contact:before {
         z-index: -1;
      }

      .footer-contact:after {
         height: 40px;
         width: 30px;
         bottom: -1px;
         right: -1px;
         background: #1c2530;
      }

      .footer-contact li {
         color: rgba(255, 255, 255, 0.8);
         font-size: 18px;
         line-height: 22px;
         margin-bottom: 20px;
      }

      .footer-contact li:last-child {
         margin-bottom: 0px;
      }

      .footer-contact li a {
         font-style: italic;
         color: #ffffff;
         text-decoration: none;
         position: relative;
      }

      .footer-contact li a:hover {
         text-decoration: none;
      }

      .site-info {
         padding: 30px 0px;
      }

      .site-info small {
         font-size: 14px;
      }

      .menu-copyright-links-container {
         overflow: hidden;
      }

      #menu-copyright-links {
         float: right;
         margin-bottom: 0px;
         overflow: hidden;
      }

      #menu-copyright-links li {
         float: left;
         padding: 0px 20px;
         font-size: 14px;
         line-height: 26px;
         position: relative;
      }

      #menu-copyright-links li:after {
         position: absolute;
         width: 2px;
         right: -1px;
         top: 50%;
         transform: translateY(-50%);
         display: block;
         height: 50%;
         background: rgba(255, 255, 255, 0.30);
         content: "";
      }

      #menu-copyright-links li:last-child:after {
         display: none;
      }

      .site-info small,
      #menu-copyright-links li a {
         color: rgba(255, 255, 255, 0.30);
      }

      #menu-copyright-links li.current_page_item a,
      #menu-copyright-links li a:hover {
         color: #fff;
      }

      #menu-copyright-links li.current_page_item a {
         font-weight: 700;
         text-decoration: none;
      }

      .menu-footer-social-menu-container ul {
         margin: 0 -5px;
      }

      .menu-footer-social-menu-container li {
         display: inline-block;
         padding: 0 5px;
      }

      .menu-footer-social-menu-container li a {
         font-size: 16px;
         line-height: 28px;
         font-weight: 300;
         color: rgba(255, 255, 255, 0.8);
         position: relative;
      }

      .menu-footer-social-menu-container li a:hover,
      .menu-footer-social-menu-container li a:focus {
         text-decoration: none;
      }

      .menu-footer-social-menu-container li a::after,
      #menu-footer-links li a::after,
      .footer-contact li a::after {
         content: "";
         display: block;
         width: 0;
         height: 1px;
         background-color: rgba(255, 255, 255, 0.8);
         position: absolute;
         bottom: 0;
         left: 0;
      }

      .menu-footer-social-menu-container li a::after {
         width: 100%;
         animation: none;
      }

      #menu-footer-links li a::after,
      .footer-contact li a::after {
         background-color: #ffffff;
      }

      .menu-footer-social-menu-container li a:hover::after,
      #menu-footer-links li a:hover::after,
      .footer-contact li a:hover::after {
         animation: border 1s ease forwards;
         width: 100%;
      }

      #menu-footer-links li.current-menu-item>a::after {
         width: 100%;
         animation: none;
      }

      #menu-footer-links li a:hover {
         text-decoration: none;
      }

      /* New Footer Design*/
      .footer-item-title-new {
         color: #53595F;
         margin-bottom: 7px;
         letter-spacing: 0px;
         text-transform: capitalize;
      }

      .footer-item-title-new.form-footer-title {
         color: #ECC01C;
      }

      .footer-form-box p {
         margin-bottom: 9px;
         font-weight: 600;
         font-size: 18px;
         line-height: 187%;
         color: rgba(255, 255, 255, 0.8);
      }

      .footer-inquiry-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-radio) {
         font-weight: 400;
         padding: 12px;
         border: 1px solid #53595F;
         border-radius: 4px;
         background-color: transparent;
         color: #fff;
      }

      .footer-inquiry-form .form-group {
         margin-bottom: 16px;
      }

      .footer-inquiry-form .wpcf7-form-control.wpcf7-textarea {
         height: 93px;
      }

      .footer-inquiry-form .wpcf7-form-control.wpcf7-submit {
         margin-top: 8px;
         font-weight: 400;
         padding: 8px 29px;
      }

      .new-footer-link li a {
         font-weight: 300;
         font-size: 18px;
         line-height: 187%;
         color: rgba(255, 255, 255, 0.8);
         display: inline-block;
      }

      .new-footer-link li {
         line-height: 1;
      }

      .footer-inquiry-form {
         max-width: 90%;
      }

      .footer-row-new {
         padding-top: 40px;
      }

      .footer-inquiry-form span.wpcf7-not-valid-tip {
         position: unset;
      }

      .footer-review-icons {
         text-align: left;
         display: flex;
         align-items: center;
      }

      .new-footer .site-info {
         padding: 16px 0;
         border-top: 1px solid rgba(255, 255, 255, 0.8);
      }

      .new-footer .footer-company-review {
         text-align: left;
      }

      .new-footer .footer-company-review img {
         max-height: 55px;
      }

      .new-footer .footer-company-review a:first-child {
         margin-left: 0;
      }

      .new-footer .menu-social-icon-menu-container .menu {
         display: flex;
         align-items: center;
         margin-bottom: 0;
         justify-content: flex-end;
         flex-wrap: wrap;
      }

      .new-footer .menu-social-icon-menu-container .menu li {
         margin-left: 16px;
      }

      .new-footer .menu-social-icon-menu-container .menu li:first-child {
         margin-left: 0;
      }

      .new-footer .menu-social-icon-menu-container .menu li a {
         width: 24px;
         height: 24px;
         padding: 1px;
         background-color: #fff;
         border-radius: 50%;
         color: #000;
         display: flex;
         align-items: center;
         justify-content: center;
      }

      .new-footer #menu-copyright-links li:last-child {
         padding-right: 0 ;
      }

      .new-footer #menu-copyright-links {
         margin-bottom: 6px;
      }

      .new-footer .site-info>.row {
         display: flex;
         align-items: center;
         flex-wrap: wrap;
      }

      .new-footer .footer-content {
         padding: 47px 0px 75px;
      }

      .new-footer .footer-address-block .widget_custom_html .textwidget>div:nth-child(2) p img {
         object-position: left center;
      }

      .new-footer .footer-address-block .widget_custom_html .textwidget>div:nth-child(3) p img {
         object-position: -27.5px center;
      }

      .new-footer .footer-address-block .widget_custom_html .textwidget>div:nth-child(4) p img {
         object-position: -55px center;
      }

      br.n-desktop {
         display: none;
      }

      .footer-contact-new-text ul {
         margin-top: 10px;
      }

      .footer-contact-new-text li {
         margin-bottom: 10px;
         font-weight: 300;
         font-size: 15px;
         line-height: 187%;
         color: rgba(255, 255, 255, 0.8);
         display: block;
      }

      .footer-contact-new-text li a {
         font-weight: 400;
         font-size: 14px;
         line-height: 187%;
         color: rgba(255, 255, 255, 1);
         text-decoration: underline;
      }

      /*============================ Banner Section Start ================================ */
      /* hire dedicated page css starts */
      .dedicated-banner-section {
         position: relative;
         padding: 170px 0px;
         background: linear-gradient(0deg, rgba(0, 0, 0, 0.82), rgba(0, 0, 0, 0.82)) no-repeat center center / cover;
         color: #fff;
      }

      .hire-dedicated-banner-img {
         position: absolute;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         object-fit: cover;
         object-position: center;
         z-index: -1;
      }

      .banner-text-box {
         margin: 0 auto;
         max-width: 80%;
         text-align: center;
      }

      .banner-text-box h1 {
         margin-bottom: 32px;
         line-height: 1.28125;
         font-weight: 700;
         font-family: "Montserrat";
      }

      .banner-text-box p {
         margin-bottom: 32px;
         max-width: 83.5%;
         margin-left: auto;
         margin-right: auto;
         font-size: 22px;
         line-height: 38px;
         font-weight: 400;
         opacity: 0.8;
      }

      .banner-btn-box {
         justify-content: center;
      }

      .banner-btn-box .theme-btn:last-child {
         margin-left: 30px;
      }

      .banner-btn-box .theme-btn:last-child a {
         color: #fff;
      }

      .banner-btn-box .theme-btn:last-child a:hover {
         border-color: #0487FF;
         background: transparent;
         color: #0487FF;
      }

      /* hire dedicated page css ends */
      /*============================ Banner Section End ================================ */
      /* 4d-what-we-do- section start */
      .fd-what-we-do-section h4 {
         font-weight: 700;
         font-family: 'Montserrat';
      }

      .fd-what-we-do-wrapper {
         text-align: center;
      }

      .fd-what-we-do-wrapper h5 {
         margin: 10px 0 16px;
         font-weight: 700;
         font-size: 22px;
         line-height: 33px;
         font-family: 'Montserrat';
         color: #1C2530;
      }

      /* 4d-what-we-do- section end */
      /* our clients css starts */
      .dedicated-page-amp .ourclient-title {
         text-align: left;
      }

      .dedicated-page-amp .slick-prev,
      .dedicated-page-amp .slick-next {
         display: none ;
      }

      .dedicated-page-amp .hire-now-wrap {
         color: #fff;
         padding: 36px 0px;
         background: linear-gradient(270deg, rgba(8, 45, 63, 0) -2.99%, rgba(8, 45, 63, 0.86) 16.82%, #082D3F 46.4%, rgba(8, 45, 63, 0.85) 78.88%, rgba(8, 45, 63, 0) 108.1%), url("https://www.yudiz.com/wp-content/themes/yudiz/images/hire-now-bg.png") no-repeat center center / cover;
      }

      .dedicated-page-amp h2 {
         margin-bottom: 40px;
         font-family: 'Montserrat';
      }

      .dedicated-page-amp .hire-now-section h6 {
         margin-bottom: 2px;
         color: #fff;
         font-weight: 700;
      }

      /* our clients css ends */
      /* hire process section starts */
      .hire-process-tree {
         margin-top: -85px;
         flex: 1;
      }

      .process-tree-content {
         justify-content: space-between;
      }

      /* .hire-process-title-box         { padding: 90px 0px; } */
      .hire-process-tree-box {
         background-color: #0C1D3D;
         padding: 30px 0px;
      }

      /* .hire-process-tree-box > .container { justify-content: space-between; } */
      .process-number-box {
         padding: 12px 20px;
         display: flex;
         align-items: center;
         justify-content: center;
         width: 105px;
         height: 105px;
         box-shadow: 0px 4px 20px 9px rgba(0, 0, 0, 0.06);
         background-color: #fff;
         border-radius: 100%;
      }

      .process-number-box h4 {
         text-align: center;
         font-size: 42px;
         line-height: 62px;
         font-weight: 700;
      }

      .process-description {
         margin-top: 30px;
      }

      .process-description p {
         font-size: 24px;
         line-height: 32px;
         font-family: 'Montserrat';
         font-weight: 700;
         color: #fff;
      }

      .process-number-wrap {
         position: relative;
      }

      .hire-process-tree .process-number-wrap::before {
         content: '';
         background: url('https://www.yudiz.com/wp-content/themes/yudiz/images/border-pattern1.svg')no-repeat center center/100% auto;
         height: 64px;
         width: calc(100% - 105px);
         position: absolute;
         top: 50%;
         right: 0;
         transform: translate(0, -50%);
         display: block;
      }

      .hire-process-tree:nth-child(2n) .process-number-wrap::before {
         background: url('https://www.yudiz.com/wp-content/themes/yudiz/images/border-pattern2.svg')no-repeat center center/100% auto;
      }

      .hire-process-tree:last-child .process-number-wrap::before {
         display: none;
      }

      /* hire process section ends */
      /* technology development section starts */
      .technology-dev-sec {
         padding: 100px 0;
         background-size: cover ;
         background-position: center center ;
      }

      .technology-dev-sec h4 {
         margin: 0 auto;
         max-width: 40%;
         text-align: center;
         color: #fff;
      }

      .payment-partner-logos {
         margin: -60px auto 0;
         padding: 70px 0;
         width: auto;
         max-width: 77%;
         background: #fff;
         overflow: hidden;
      }

      .payment-partner-logos ul {
         margin-bottom: 0;
         text-align: center;
      }

      .payment-partner-logos li {
         width: calc(100% / 5 - 5px);
         display: inline-block;
         text-align: center;
         position: relative;
      }

      .payment-partner-logos li:after {
         content: '';
         position: absolute;
         right: 0;
         top: 0;
         transform: translate(-50%, -50%);
         height: 250px;
         width: 1px;
         background: #EEEEEE;
      }

      .payment-partner-logos li:last-child:after {
         display: none;
      }

      /* technology development section ends */
      .amp-location-img {
         width: 28px;
      }

      /* Hire-Dev-Section why choose us  */
      .hire-dev-why-choose-us {
         background: #F4F6F6;
         overflow: hidden;
      }

      .hire-dev-why-choose-us .container>.row {
         display: flex;
         align-items: center;
         flex-wrap: wrap;
      }

      .hire-why-choose-content-heading h4 {
         margin-bottom: 24px;
         font-family: 'Montserrat';
         font-weight: 800;
         font-size: 42px;
         line-height: 62px;
         color: #0C1D3D;
      }

      .hire-why-choose-content-heading p {
         font-family: 'Poppins';
         font-weight: 400;
         font-size: 21px;
         line-height: 38px;
         color: #516385;
      }

      .hire-why-choose-desc-box {
         position: relative;
      }

      .hire-why-choose-desc-box:after {
         content: "";
         position: absolute;
         width: calc(100% + 1000px);
         height: 459px;
         top: 50%;
         left: 0;
         transform: translate(0, -50%);
         background: #D2DDF4;
      }

      .hire-why-choose-desc-box ul {
         max-width: 78%;
         margin: 0 auto;
         display: flex;
         align-items: center;
         text-align: center;
         flex-wrap: wrap;
         position: relative;
         z-index: 5;
      }

      .hire-why-choose-desc-box ul li {
         padding: 15px;
         width: calc(100%/2);
      }

      .hire-why-choose-desc-box ul li:nth-child(even) {
         margin-top: -74px;
      }

      .hire-dedi-techno-box {
         padding: 24px 32px;
         background: #fff;
         min-height: 490px;
         display: flex;
         align-items: center;
         flex-direction: column;
         justify-content: center;
         box-shadow: 0px -2px 20px rgba(0, 0, 0, 0.06), 12px 10px 20px rgba(0, 0, 0, 0.08);
         border-radius: 16px;
      }

      .amp-img-why-choose-section {
         width: 120px;
         height: 120px;
         margin: 0 auto;
      }

      .hire-dedic-dev-desc-box {
         margin-top: 24px;
      }

      .hire-dedic-dev-desc-box h5 {
         margin-bottom: 24px;
         font-family: 'Montserrat';
         font-weight: 700;
         font-size: 28px;
         line-height: 42px;
         color: #292929;
      }

      .hire-reso-logo-img {
         position: absolute;
         width: 180px;
         height: 180px;
         bottom: 10%;
         left: 0;
         transform: translate(-50%, -50%);
         padding: 11px;
         background: #F4F6F6;
         border-radius: 50%;
         z-index: 5;
      }

      .payment-partner-sec {
         background: #F4F6F6;
      }

      /* Home Testimonials Section  Start */
      .client-logo-new-section.triangle-pattern-bg:after {
         display: none;
      }

      .triangle-shape-newhome {
         position: absolute;
         top: 0%;
         right: 0;
         transform: translate(50%);
      }

      .triangle-shape-newhome-left {
         position: absolute;
         top: 0%;
         left: 0;
         transform: translate(-50%);
      }

      .client-testimony-box {
         padding: 32px;
         height: 100%;
         position: relative;
         background: #FFFFFF;
         box-shadow: 0px 12px 35px rgba(0, 0, 0, 0.12);
         border-radius: 12px;
      }

      .client-testimony-box:after {
         content: '';
         position: absolute;
         width: 94px;
         height: 62px;
         right: 3%;
         bottom: 0;
         transform: translate(-50%, 50%);
         background: url('https://www.yudiz.com/wp-content/themes/yudiz/images/testimony-quotes.svg')no-repeat center center/cover;
      }

      h5.client-name-box {
         margin-bottom: 8px;
         font-weight: 700;
         font-size: 24px;
         line-height: 32px;
         color: #1C2530;
         font-family: 'Montserrat';
      }

      h6.client-country-name {
         margin-bottom: 32px;
         font-weight: 500;
         font-size: 20px;
         line-height: 32px;
         color: #666666;
         font-family: 'Poppins';
         letter-spacing: 0;
         text-transform: none;
      }

      .client-testimony-box p {
         font-weight: 400;
         font-size: 20px;
         line-height: 32px;
         color: #333333;
      }

      /*  */
      .home-testimonial-content amp-base-carousel .i-amphtml-carousel-scroll[horizontal=true] {
         padding-bottom: 0 ;
      }

      .home-testimonial-content amp-base-carousel.i-amphtml-layout-size-defined {
         overflow: visible ;
      }

      /* .home-testimonial-content                       { overflow:hidden; } */
      .home-testimonial-content .i-amphtml-base-carousel-arrows {
         display: flex;
         bottom: auto;
         left: auto;
         top: -31%;
      }

      .home-testimonial-content .i-amphtml-carousel-slotted {
         padding: 28px 33px;
      }

      /* Home Testimonials Section  End */
      /* Hiring modal Section Start */
      .hiring-model-amp-section {
         text-align: center;
      }

      .hiring-model-amp-section h3 {
         font-weight: 700;
         font-size: 42px;
         line-height: 62px;
         color: #0C1D3D;
         font-family: 'Montserrat';
      }

      .hiring-model-amp-content>.row {
         display: flex;
         flex-wrap: wrap;
      }

      .hiring-model-amp-wrapper {
         padding: 90px;
         height: 100%;
         border-top: 4px solid;
         background: #FFFFFF;
         transition: all 0.5s ease;
      }

      .hiring-model-amp-wrapper h5 {
         margin-bottom: 40px;
         color: #1C2530;
         font-family: 'Montserrat';
         font-weight: 700;
      }

      .hiring-model-amp-wrapper .price-box-amp {
         font-weight: 600;
         font-size: 42px;
         line-height: 62px;
         font-family: 'Poppins';
         color: #0487FF;
      }

      .hiring-model-amp-wrapper .price-box-amp span {
         font-family: 'Poppins';
         font-style: normal;
         font-weight: 600;
         font-size: 24px;
         line-height: 32px;
         color: #333333;
      }

      .hiring-model-amp-wrapper p {
         margin-bottom: 40px;
         font-size: 20px;
         line-height: 30px;
         color: #1C2530;
      }

      .hiring-model-amp-wrapper p:last-child {
         margin-bottom: 0;
      }

      .hiring-model-amp-wrapper:hover {
         box-shadow: 1px 10px 32px rgba(0, 0, 0, 0.12);
         border-radius: 0px 0px 16px 16px;
      }

      .hiring-amp-saperetor {
         margin-bottom: 40px;
         border: 2px solid #B5B5B5;
      }

      /* Hiring modal Section End */
      /*=========  ========*/
      #get-in-touch-scroll {
         text-align: center;
         background: #f8faff ;
      }

      #get-in-touch-scroll {
         padding-top: 60px;
         padding-bottom: 60px;
         position: relative;
         background: transparent;
         overflow: hidden;
      }

      #get-in-touch-scroll:before,
      #get-in-touch-scroll:after {
         position: absolute;
         left: 0;
         top: 0;
         height: 100%;
         width: 250%;
         display: block;
         content: "";
      }

      #get-in-touch-scroll .get-project-section {
         position: relative;
         z-index: 50;
      }

      #get-in-touch-scroll:before {
         top: 8%;
         background: url('https://www.yudiz.com/wp-content/themes/yudiz/images/get-in-touch-cloud-strip.webp') repeat-x top center / 50% auto;
         animation: get-in-touch-bg-scroll 120s linear infinite;
         -webkit-animation: get-in-touch-bg-scroll 120s linear infinite;
         opacity: 0.8;
      }

      #get-in-touch-scroll:after {
         background: url('https://www.yudiz.com/wp-content/themes/yudiz/images/get-in-touch-building-strip.png') repeat-x center bottom / 25% auto;
         animation: get-in-touch-bg-scroll 64s linear infinite;
         -webkit-animation: get-in-touch-bg-scroll 64s linear infinite;
      }

      @keyframes get-in-touch-bg-scroll {
         0% {
            left: 0%;
         }

         100% {
            left: -125%;
         }
      }

      @-webkit-keyframes get-in-touch-bg-scroll {
         0% {
            left: 0%;
         }

         100% {
            left: -125%;
         }
      }

      /* Accordiun Style */
      .accordion {
         margin-top: 30px;
      }

      .accordion dt p {
         padding: 10px 30px 10px 0px;
         position: relative;
         border-bottom: 1px solid transparent;
         display: block;
         color: #1c2530;
         text-decoration: none;
      }

      .accordion dt p:before,
      .accordion dt p:after {
         height: 3px;
         width: 18px;
         content: "";
         display: block;
         background: #1c2530;
         position: absolute;
         right: 0;
         top: 50%;
         transform-origin: center center;
         -webkit-transform-origin: center center;
         transform: translateY(-50%);
         -webkit-transform: translateY(-50%);
         transition-duration: 0.3s;
         -webkit-transition-duration: 0.3s;
      }

      .accordion dt p:before {
         transform: translateY(-50%) rotate(-90deg);
         -wenkit-transform: translateY(-50%) rotate(-90deg);
      }

      .accordion>section[expanded] dt p:before,
      .accordion>section[expanded] dt p:after {
         background: #0487FF;
      }

      .accordion>section[expanded] dt p:before {
         transform: translateY(-50%) rotate(0deg);
         -wenkit-transform: translateY(-50%) rotate(0deg);
      }

      .accordion>section[expanded] dt p {
         border-bottom-color: rgba(28, 37, 48, 0.3);
         color: #0487FF;
      }

      .accordion dt {
         font-weight: 600;
      }

      .accordion dd {
         padding: 15px 0px;
         opacity: 0.8;
      }

      .accordion .i-amphtml-accordion-header {
         cursor: pointer;
         background-color: transparent;
         padding-right: 0;
         border: none;
      }

      .accordion dd ul,
      .accordion dd ol {
         padding-left: 20px;
      }

      .accordion dd ul li {
         list-style-type: disc;
      }

      .accordion dd ol li {
         list-style-type: decimal;
      }

      /* Exp[ertis] */
      /* Styles for the selector based tabs */
      amp-selector.tabpanels [role=tabpanel] {
         display: none;
      }

      amp-selector.tabpanels [role=tabpanel][selected] {
         outline: none;
         display: block;
      }

      amp-selector [option][selected] {
         outline: none;
      }

      /* ===================== Experties Tab Section Start ========================= */
      .experties-content-box>.row {
         display: flex;
      }

      .experties-tabs-content {
         height: 100%;
         background: #F5F9FC url('https://www.yudiz.com/wp-content/themes/yudiz/images/experties-tabs-content-pattern-bg.webp')no-repeat right bottom/auto;
      }

      .experties-tabs-content .tab-content-box {
         height: 100%;
         padding: 40px;
         border-radius: 12px;
      }

      .tab-content-box h3 {
         margin-bottom: 32px;
         font-family: 'Montserrat';
         font-weight: 700;
         font-size: 32px;
         line-height: 39px;
      }

      .tab-content-box h3 a {
         color: #1C2530;
      }

      .tab-content-box p {
         margin-bottom: 32px;
         color: #333333;
      }

      .experties-tab-list {
         display: flex;
         align-items: center;
         flex-wrap: wrap;
      }

      .experties-tab-list li {
         margin-bottom: 16px;
         padding-left: 12px;
         position: relative;
         font-weight: 500;
         font-size: 20px;
         line-height: 30px;
         color: #1C2530;
         width: 50%;
      }

      .experties-tab-list li:before {
         content: "";
         position: absolute;
         top: 50%;
         left: 0;
         transform: translate(-100%, -50%);
         width: 8px;
         height: 8px;
         border-radius: 50%;
         background: #0487FF;
      }

      .tabs-nav-box {
         height: 100%;
         padding: 40px;
         padding-left: 0 ;
         background: #F5F9FC;
         border-radius: 12px;
      }

      .tabs-nav-box amp-selector {
         margin-bottom: 0;
      }

      .tabs-nav-box amp-selector .tab-amp-nav-li {
         margin-bottom: 10px;
         cursor: pointer;
         position: relative;
         display: block;
         padding: 24px 16px 24px 24px;
         font-weight: 500;
         font-size: 24px;
         line-height: 32px;
         color: #333333;
         transition: all 0.5s ease;
      }

      .tabs-nav-box amp-selector .tab-amp-nav-li:hover {
         text-decoration: none;
      }

      .tabs-nav-box amp-selector [option][selected].tab-amp-nav-li:after {
         opacity: 1;
      }

      .tabs-nav-box amp-selector .tab-amp-nav-li:hover:after {
         opacity: 1;
      }

      .tabs-nav-box amp-selector .tab-amp-nav-li:after {
         content: '';
         position: absolute;
         left: 0;
         top: 0;
         height: 100%;
         width: 6px;
         background: #0487FF;
         opacity: 0;
         transition: all 0.5s ease;
      }

      .tabs-nav-box amp-selector .tab-amp-nav-li img {
         width: 40px;
         height: 40px;
         margin-right: 24px;
      }

      .experties-tab-technology {
         margin-bottom: 40px;
         display: flex;
      }

      .experties-tab-technology li {
         width: 72px;
         height: 72px;
         display: flex;
         justify-content: center;
         align-items: center;
         margin-right: 24px;
         border: 1px solid #D8E0E5;
         transition: all 0.3s ease-in-out;
      }

      .experties-tab-technology li:hover img {
         filter: grayscale(0%);
      }

      .experties-tab-technology li img {
         transition: all 0.5s ease;
         filter: grayscale(100%);
      }

      .tabs-nav-box amp-selector .tab-amp-nav-li:last-child a {
         margin-bottom: 0;
      }

      .home-portfolio-section {
         overflow: hidden;
      }

      .tab-content-box {
         transition: all 1s ease-in;
      }

      #myTabPanels {
         height: 100%;
      }

      /* ===================== Experties Tab Section End ========================= */
      /* our client */
      .i-amphtml-base-carousel-arrows {
         display: none;
      }

      /* Form Start */
      .hire-form-section {
         background: #0C1D3D;
      }

      .hire-form-section h4 {
         color: #fff;
      }

      .amp-form-section label {
         display: block;
         margin-bottom: 8px;
         font-size: 16px;
         line-height: 18px;
         color: #2d4152;
         opacity: .72;
         font-weight: 500;
      }

      .amp-form-section .form-control {
         padding: 20px;
         box-shadow: none;
         height: auto;
         display: block;
         background-color: #f8faff;
         border: none;
         appearance: none;
         -webkit-appearance: none;
         border-radius: 0;
         font-size: 18px;
         font-weight: 500;
         line-height: 22px;
         color: #1c2530;
         width: 100%;
         border: 1px solid #dae2f6;
      }

      .amp-form-section .form-group {
         margin-bottom: 45px;
      }

      [visible-when-invalid] {
         font-size: 12px;
      }

      /* Form End */
      .footer-form-box .form-control {
         padding: 20px;
         box-shadow: none;
         background-color: #f8faff;
         border: none;
         appearance: none;
         -webkit-appearance: none;
         border-radius: 0px;
         font-size: 18px;
         font-weight: 500;
         line-height: 22px;
         color: #1c2530;
         width: 100%;
         border: 1px solid #dae2f6;
         font-weight: 400;
         padding: 12px;
         border: 1px solid #53595F;
         border-radius: 4px;
         background-color: transparent;
         color: #fff;
         height: auto;
      }

      .footer-form-box .form-control:focus {
         box-shadow: none;
      }

      /* Responsive style */
      @media(min-width: 1400px) and (max-width: 1599px) {
         .container {
            width: 1300px;
         }

         /* Header Style Start */
         /* New Deskyop Menu */
         .desktop-mega-header.main-header {
            padding: 15px 26px;
         }

         .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper,
         .desktop-mega-header .about-submenu .mega-sub-menu-wrapper {
            padding: 12px 30px;
         }

         .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat,
         .desktop-mega-header .about-submenu .mega-sub-menu-wrapper .main-service-cat {
            margin-bottom: 16px ;
            padding-bottom: 2px;
            font-size: 15px;
            line-height: 24px;
         }

         .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat:after,
         .desktop-mega-header .about-submenu .mega-sub-menu-wrapper .main-service-cat:after {
            width: 120px;
            height: 2px;
         }

         .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .megamenu-item-icon,
         .desktop-mega-header .about-submenu .mega-sub-menu-wrapper .megamenu-item-icon {
            width: 22px;
            height: 22px;
            border-radius: 2px;
         }

         .desktop-mega-header .desktop-primary-menu li.service-megamenu .what-we-do-submenu .service-sub-cat>li,
         .desktop-mega-header .desktop-primary-menu li.about-megamenu .mega-sub-menu-wrapper .service-sub-cat>li {
            margin-bottom: 16px ;
         }

         .desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc,
         .desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc {
            margin-left: 12px;
            line-height: 24px;
         }

         .desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc span,
         .desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc span {
            font-size: 15px;
            line-height: 22px;
         }

         .desktop-mega-header ul.menu>li.menu-item-has-children>a:after {
            bottom: -3px;
         }

         .desktop-mega-header ul.menu>li {
            margin: 0 22px;
         }

         .desktop-mega-header ul.menu>li>a {
            margin: 12px 0;
         }

         .desktop-mega-header ul.menu>li.career-menu a {
            margin-left: 22px;
         }

         .desktop-mega-header .header-contactus {
            margin-left: 22px;
         }

         .megamenu-left {
            width: 65%;
         }

         .megamenu-right {
            width: 35%;
         }

         .hire-develop-wrapper {
            padding: 12px 50px;
         }

         /* .desktop-mega-header li.service-megamenu .sub-menu li .hire-dev-box > li{ margin-bottom: 0px ; } */
         .hire-dev-box .hire-icon-box {
            width: 35px;
            height: 35px;
            margin-right: 10px;
         }

         .hire-desc-box {
            width: 100%;
         }

         .hire-desc-box h5 {
            margin-bottom: 2px;
            font-size: 20px;
            line-height: 30px;
         }

         .hire-desc-box p {
            margin-bottom: 3px;
            font-size: 15px;
            line-height: 170%;
         }

         .linebtn {
            font-size: 15px;
            line-height: 22px;
         }

         .linebtn img {
            margin-left: 4px;
         }

         /* Our Product Menu */
         .desktop-mega-header .desktop-primary-menu li.product-megamenu .sub-menu {
            right: 8px;
            max-width: 85%;
         }

         .our-product-wrapper .product-wrapper-left {
            width: calc(100% - 27%);
         }

         .our-product-wrapper .product-wrapper-right {
            padding: 12px 24px;
            width: 27%;
         }

         .our-product-wrapper .product-wrapper-left>ul>li {
            height: 330px;
         }

         .our-product-wrapper ul>li .product-detail-box {
            padding: 16px;
         }

         .our-product-wrapper ul>li .product-detail-box .img-box {
            height: 130px;
            width: 230px;
            margin: 0 auto;
         }

         .our-product-wrapper ul>li .product-detail-box p {
            margin-top: 24px;
            font-size: 14px;
            line-height: 170%;
         }

         .visitlink {
            padding: 4px 32px;
            border-radius: 100px;
            font-size: 16px;
            line-height: 30px;
         }

         .our-product-wrapper .hire-desc-box {
            max-width: 100%;
         }

         /*============ Investor Menu Start ==============*/
         .dropdown-new-menu .sub-menu {
            border-top: 24px;
            margin: 0;
            padding: 24px 12px;
            min-width: 274px;
         }

         .dropdown-new-menu .sub-menu .sub-menu {
            left: calc(100% + 12px);
         }

         .dropdown-new-menu .sub-menu li a {
            font-size: 16px;
            line-height: 24px;
         }

         .dropdown-new-menu .sub-menu li {
            margin: 0 0 20px;
         }

         .dropdown-new-menu .sub-menu li:after {
            width: 9px;
            height: 11px;
         }

         .dropdown-new-menu .sub-menu li.menu-item-has-children {
            padding-right: 20px;
         }

         .dropdown-new-menu .sub-menu li.investor-tagline a {
            font-size: 14px;
            line-height: 20px;
         }

         /*============ Investor Menu End ==============*/
         /* Header Style End */
         /*  */
         /* 4d-what-we-do- section start */
         .fd-what-we-do-wrapper h5 {
            margin: 6px 0 10px;
            font-size: 20px;
            line-height: 30px;
         }

         /* Hire-Dev-Section why choose us  */
         .hire-why-choose-content-heading h4 {
            margin-bottom: 20px;
            font-size: 34px;
            line-height: 52px;
         }

         .hire-why-choose-content-heading p {
            font-size: 18px;
            line-height: 32px;
         }

         .hire-why-choose-desc-box:after {
            height: 459px;
         }

         .hire-why-choose-desc-box ul {
            max-width: 78%;
         }

         .hire-why-choose-desc-box ul li {
            padding: 12px;
            width: calc(100%/2);
         }

         .hire-why-choose-desc-box ul li:nth-child(even) {
            margin-top: -74px;
         }

         .hire-dedi-techno-box {
            padding: 20px 28px;
            min-height: 490px;
         }

         .amp-img-why-choose-section {
            width: 100px;
            height: 100px;
         }

         .hire-dedic-dev-desc-box {
            margin-top: 20px;
         }

         .hire-dedic-dev-desc-box h5 {
            margin-bottom: 20px;
            font-size: 24px;
            line-height: 34px;
         }

         .hire-reso-logo-img {
            width: 160px;
            height: 160px;
            bottom: 10%;
            padding: 8px;
         }

         /* hire process section starts */
         .hire-process-tree {
            margin-top: -61px;
            flex: 1;
         }

         .hire-process-tree-box {
            padding: 20px 0px;
         }

         .process-number-box {
            padding: 8px 14px;
            width: 80px;
            height: 80px;
         }

         .process-number-box h4 {
            font-size: 32px;
            line-height: 52px;
         }

         .process-description {
            margin-top: 24px;
         }

         .process-description p {
            font-size: 22px;
            line-height: 30px;
         }

         .hire-process-tree .process-number-wrap::before {
            height: 57px;
            width: calc(100% - 80px);
         }

         .payment-partner-logos {
            margin: -61px auto 0;
            padding: 60px 0;
            max-width: 82%;
         }

         /* Hiring modal Section Start */
         .hiring-model-amp-section h3 {
            font-size: 32px;
            line-height: 50px;
         }

         .hiring-model-amp-wrapper {
            padding: 60px;
            border-top: 3px solid;
         }

         .hiring-model-amp-wrapper h5 {
            margin-bottom: 30px;
         }

         .hiring-model-amp-wrapper .price-box-amp {
            font-size: 34px;
            line-height: 50px;
         }

         .hiring-model-amp-wrapper .price-box-amp span {
            font-size: 20px;
            line-height: 30px;
         }

         .hiring-model-amp-wrapper p {
            margin-bottom: 32px;
            font-size: 20px;
            line-height: 30px;
         }

         .hiring-model-amp-wrapper:hover {
            border-radius: 0px 0px 14px 14px;
         }

         .hiring-amp-saperetor {
            margin-bottom: 32px;
         }

         /* Hiring modal Section End */
         /* ===================== Experties Tab Section Start ========================= */
         .experties-tabs-content {
            background-size: 50% auto;
         }

         .experties-tabs-content .tab-content-box {
            padding: 30px;
         }

         .tab-content-box h3 {
            margin-bottom: 28px;
            font-size: 28px;
            line-height: 34px;
         }

         .tab-content-box p {
            margin-bottom: 28px;
         }

         .experties-tab-list li {
            margin-bottom: 12px;
            padding-left: 8px;
            font-size: 16px;
            line-height: 28px;
            width: 50%;
         }

         .experties-tab-list li:before {
            width: 6px;
            height: 6px;
         }

         .tabs-nav-box {
            padding: 30px;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li {
            margin-bottom: 8px;
            padding: 20px 14px 20px 20px;
            font-size: 20px;
            line-height: 30px;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li:after {
            width: 4px;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li img {
            width: 30px;
            height: 30px;
            margin-right: 20px;
         }

         .experties-tab-technology {
            margin-bottom: 30px;
         }

         .experties-tab-technology li {
            width: 60px;
            height: 60px;
            margin-right: 16px;
         }

         .experties-tab-technology li img {
            width: 49px;
         }

         /* ===================== Experties Tab Section End ========================= */
         /* New Footer Design*/
         .footer-item-title-new {
            margin-bottom: 8px;
         }

         .footer-form-box p {
            margin-bottom: 7px;
            font-size: 16px;
            line-height: 187%;
         }

         .new-footer-link li a {
            font-size: 16px;
            line-height: 187%;
         }

         .footer-row-new {
            padding-top: 30px;
         }

         .new-footer .site-info {
            padding: 14px 0;
         }

         .new-footer .menu-social-icon-menu-container .menu li {
            margin-left: 14px;
         }

         .new-footer .menu-social-icon-menu-container .menu li a {
            width: 24px;
            height: 24px;
            padding: 1px;
         }

         .new-footer #menu-copyright-links {
            margin-bottom: 10px;
         }

         .new-footer .footer-content {
            padding: 40px 0px 65px;
         }

         /* Form Start */
         .amp-form-section label {
            margin-bottom: 6px;
            font-size: 16px;
            line-height: 20px;
         }

         .amp-form-section .form-control {
            padding: 20px;
            font-size: 16px;
            line-height: 20px;
         }

         .amp-form-section .form-group {
            margin-bottom: 35px;
         }

         /* Form End */
      }

      @media(min-width: 1200px) and (max-width: 1599px) {

         /* Typography */
         h1,
         h2.big-h2 {
            font-size: 60px;
            line-height: 70px;
         }

         h2,
         .mid-h1 {
            font-size: 50px;
            line-height: 60px;
         }

         h1.medium,
         h3 {
            font-size: 42px;
            line-height: 50px;
         }

         h1.small,
         .service-title h1,
         h4 {
            font-size: 32px;
            line-height: 42px;
         }

         h5 {
            font-size: 26px;
            line-height: 34px;
         }

         h6 {
            font-size: 20px;
            line-height: 24px;
         }

         .common-section {
            padding-top: 85px;
            padding-bottom: 85px;
         }

         .common-section-small {
            padding-top: 55px;
            padding-bottom: 55px;
         }

         .custom-saperator {
            height: 25px;
         }

         h2,
         .mid-h1 {
            font-size: 50px;
            line-height: 60px;
         }

         /* Header Style ============================= */
         /* primary header */
         .primary-head-menu ul>li {
            margin: 0px 10px;
         }

         .primary-head-menu ul>li>a {
            font-size: 13px;
         }

         /* Sub Menu Style */
         .sub-menu-wrapper {
            max-width: 978px;
         }

         .sub-menu-wrapper ul li {
            max-width: 326px;
         }

         .sub-menu-wrapper ul li a {
            padding: 15px;
         }

         .sub-menu-wrapper ul li .menu-item-icon {
            width: 50px;
         }

         .sub-menu-wrapper ul li .menu-item-icon img {
            max-height: 50px;
         }

         .sub-menu-wrapper ul li .menu-item-desc {
            padding-left: 10px;
            width: calc(100% - 50px);
         }

         .technology-dev-sec {
            padding: 80px 0;
         }

         /* Footer Style ============================= */
         .footer-row {
            padding-top: 40px;
         }

         .footer-content {
            padding: 80px 0px 40px;
         }

         .footer-logo img {
            width: 200px;
         }

         #menu-footer-links li {
            margin-bottom: 16px;
            line-height: 24px;
         }

         .menu-footer-social-menu-container li a {
            font-size: 16px;
            line-height: 24px;
         }

         .footer-contact {
            padding: 30px;
         }

         .footer-contact li {
            font-size: 16px;
         }

         .site-info {
            padding: 30px 0px;
         }

         #menu-copyright-links li {
            padding: 0px 15px;
         }

         /* Form Start */
         .amp-form-section label {
            margin-bottom: 6px;
            font-size: 16px;
            line-height: 20px;
         }

         .amp-form-section .form-control {
            padding: 16px;
            font-size: 16px;
            line-height: 20px;
         }

         .amp-form-section .form-group {
            margin-bottom: 20px;
         }

         /* Form End */
      }

      @media(min-width: 1200px) and (max-width: 1399px) {

         /* New Deskyop Menu */
         .desktop-mega-header.main-header {
            padding: 15px 22px;
         }

         .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper,
         .desktop-mega-header .about-submenu .mega-sub-menu-wrapper {
            padding: 12px 30px;
         }

         .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat,
         .desktop-mega-header .about-submenu .mega-sub-menu-wrapper .main-service-cat {
            margin-bottom: 12px ;
            padding-bottom: 4px;
            font-size: 14px;
            line-height: 22px;
         }

         .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat:after {
            width: 100px;
            height: 2px;
         }

         .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .megamenu-item-icon,
         .desktop-mega-header .about-submenu .mega-sub-menu-wrapper .megamenu-item-icon {
            width: 22px;
            height: 22px;
            border-radius: 2px;
            margin-bottom: 0;
         }

         .desktop-mega-header .desktop-primary-menu li.service-megamenu .what-we-do-submenu .service-sub-cat>li,
         .desktop-mega-header .desktop-primary-menu li.about-megamenu .about-submenu .service-sub-cat>li {
            margin-bottom: 12px ;
         }

         .desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc,
         .desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc {
            margin-left: 10px;
            line-height: 22px;
         }

         .desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc span,
         .desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc span {
            font-size: 14px;
            line-height: 20px;
         }

         .desktop-mega-header ul.menu>li.menu-item-has-children>a:after {
            bottom: -3px;
         }

         .desktop-mega-header ul.menu>li {
            margin: 0 14px;
         }

         .desktop-mega-header ul.menu>li>a {
            margin: 6px 0;
            font-size: 14px;
            line-height: 20px;
         }

         .desktop-mega-header ul.menu>li.career-menu a {
            margin-left: 14px;
         }

         .desktop-mega-header .header-contactus {
            margin-left: 14px;
         }

         .megamenu-left {
            width: 65%;
         }

         .megamenu-right {
            width: 35%;
         }

         .hire-develop-wrapper {
            padding: 12px 30px;
         }

         /* .desktop-mega-header li.service-megamenu .sub-menu li .hire-dev-box > li{ margin-bottom: 40px ; } */
         .hire-dev-box .hire-icon-box {
            width: 35px;
            height: 35px;
            margin-right: 10px;
         }

         .hire-desc-box {
            width: 100%;
         }

         .hire-desc-box h5 {
            margin-bottom: 2px;
            font-size: 18px;
            line-height: 28px;
         }

         .hire-desc-box p {
            margin-bottom: 3px;
            font-size: 14px;
            line-height: 150%;
         }

         .linebtn {
            font-size: 14px;
            line-height: 20px;
         }

         .linebtn img {
            margin-left: 4px;
         }

         /* Our Product Menu */
         .desktop-mega-header .desktop-primary-menu li.product-megamenu .sub-menu {
            right: 10px;
            max-width: 87%;
         }

         .our-product-wrapper .product-wrapper-left {
            width: calc(100% - 25%);
         }

         .our-product-wrapper .product-wrapper-right {
            padding: 12px 16px;
            width: 25%;
         }

         .our-product-wrapper .product-wrapper-left>ul>li {
            height: 275px;
         }

         .our-product-wrapper ul>li .product-detail-box {
            padding: 14px;
         }

         .our-product-wrapper ul>li .product-detail-box .img-box {
            height: 115px;
            width: 200px;
            margin: 0 auto;
         }

         .our-product-wrapper ul>li .product-detail-box p {
            margin-top: 24px;
            font-size: 14px;
            line-height: 170%;
         }

         .visitlink {
            padding: 4px 26px;
            border-radius: 80px;
            font-size: 16px;
            line-height: 26px;
         }

         .our-product-wrapper .hire-desc-box {
            max-width: 100%;
         }

         /*============ Investor Menu Start ==============*/
         .dropdown-new-menu .sub-menu {
            border-top: 24px;
            margin: 0;
            padding: 20px 12px;
            min-width: 200px;
         }

         .dropdown-new-menu .sub-menu .sub-menu {
            left: calc(100% + 12px);
            min-width: 240px;
         }

         .dropdown-new-menu .sub-menu li a {
            font-size: 14px;
            line-height: 20px;
         }

         .dropdown-new-menu .sub-menu li {
            margin: 0 0 12px;
         }

         .dropdown-new-menu .sub-menu li:after {
            width: 9px;
            height: 11px;
         }

         .dropdown-new-menu .sub-menu li.menu-item-has-children {
            padding-right: 12px;
         }

         .dropdown-new-menu .sub-menu li.investor-tagline a {
            font-size: 13px;
            line-height: 20px;
         }

         /*============ Investor Menu End ==============*/
         /* 4d-what-we-do- section start */
         .fd-what-we-do-wrapper img {
            width: 50px;
         }

         .fd-what-we-do-wrapper h5 {
            margin: 6px 0 10px;
            font-size: 18px;
            line-height: 28px;
         }

         /* Hire-Dev-Section why choose us  */
         .hire-why-choose-content-heading h4 {
            margin-bottom: 20px;
            font-size: 34px;
            line-height: 52px;
         }

         .hire-why-choose-content-heading p {
            font-size: 18px;
            line-height: 32px;
         }

         .hire-why-choose-desc-box:after {
            height: 459px;
         }

         .hire-why-choose-desc-box ul {
            max-width: 89%;
            margin-right: 0;
         }

         .hire-why-choose-desc-box ul li {
            padding: 12px;
            width: calc(100%/2);
         }

         .hire-why-choose-desc-box ul li:nth-child(even) {
            margin-top: -74px;
         }

         .hire-dedi-techno-box {
            padding: 20px 24px;
            min-height: 410px;
         }

         .amp-img-why-choose-section {
            width: 100px;
            height: 100px;
         }

         .hire-dedic-dev-desc-box {
            margin-top: 20px;
         }

         .hire-dedic-dev-desc-box h5 {
            margin-bottom: 20px;
            font-size: 24px;
            line-height: 34px;
         }

         .hire-reso-logo-img {
            width: 160px;
            height: 160px;
            bottom: 10%;
            padding: 8px;
         }

         /* hire process section starts */
         .hire-process-tree {
            margin-top: -61px;
            flex: 1;
         }

         .hire-process-tree-box {
            padding: 14px 0px;
         }

         .process-number-box {
            padding: 8px 14px;
            width: 70px;
            height: 70px;
         }

         .process-number-box h4 {
            font-size: 24px;
            line-height: 38px;
         }

         .process-description {
            margin-top: 20px;
         }

         .process-description p {
            font-size: 20px;
            line-height: 30px;
         }

         .hire-process-tree .process-number-wrap::before {
            height: 57px;
            width: calc(100% - 70px);
         }

         .payment-partner-logos {
            margin: -61px auto 0;
            padding: 60px 0;
            max-width: 87%;
         }

         .technology-dev-sec {
            padding: 70px 0;
         }

         /* Home Testimonials Section  Start */
         .triangle-shape-newhome {
            position: absolute;
            top: 0%;
            right: 0;
            transform: translate(50%);
         }

         .client-testimony-box {
            padding: 28px;
            border-radius: 12px;
         }

         .client-testimony-box:after {
            width: 81px;
            height: 55px;
            right: 3%;
         }

         h5.client-name-box {
            margin-bottom: 8px;
            font-size: 24px;
            line-height: 32px;
         }

         h6.client-country-name {
            margin-bottom: 24px;
            font-size: 20px;
            line-height: 32px;
         }

         .client-testimony-box p {
            font-size: 20px;
            line-height: 32px;
         }

         .home-testimonial-content .i-amphtml-carousel-slotted {
            padding: 16px 26px;
         }

         /* Home Testimonials Section  End */
         /* Hiring modal Section Start */
         .hiring-model-amp-section h3 {
            font-size: 33px;
            line-height: 48px;
         }

         .hiring-model-amp-wrapper {
            padding: 40px;
            border-top: 3px solid;
         }

         .hiring-model-amp-wrapper h5 {
            margin-bottom: 24px;
         }

         .hiring-model-amp-wrapper .price-box-amp {
            font-size: 26px;
            line-height: 44px;
         }

         .hiring-model-amp-wrapper .price-box-amp span {
            font-size: 20px;
            line-height: 30px;
         }

         .hiring-model-amp-wrapper p {
            margin-bottom: 26px;
            font-size: 20px;
            line-height: 30px;
         }

         .hiring-model-amp-wrapper:hover {
            border-radius: 0px 0px 12px 12px;
         }

         .hiring-amp-saperetor {
            margin-bottom: 26px;
         }

         /* Hiring modal Section End */
         /* ===================== Experties Tab Section Start ========================= */
         .experties-tabs-content {
            background-size: 45% auto;
         }

         .experties-tabs-content .tab-content-box {
            padding: 24px;
         }

         .tab-content-box h3 {
            margin-bottom: 28px;
            font-size: 28px;
            line-height: 34px;
         }

         .tab-content-box p {
            margin-bottom: 28px;
         }

         .experties-tab-list li {
            margin-bottom: 12px;
            padding-left: 8px;
            font-size: 16px;
            line-height: 28px;
            width: 50%;
         }

         .experties-tab-list li:before {
            width: 6px;
            height: 6px;
         }

         .tabs-nav-box {
            padding: 24px;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li {
            margin-bottom: 8px;
            padding: 20px 14px 20px 20px;
            font-size: 20px;
            line-height: 30px;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li:after {
            width: 4px;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li img {
            width: 30px;
            height: 30px;
            margin-right: 10px;
         }

         .experties-tab-technology {
            margin-bottom: 30px;
         }

         .experties-tab-technology li {
            width: 60px;
            height: 60px;
            margin-right: 16px;
         }

         .experties-tab-technology li img {
            width: 49px;
         }

         /* ===================== Experties Tab Section End ========================= */
         /* New Footer Design*/
         .footer-item-title-new {
            margin-bottom: 6px;
         }

         .footer-form-box p {
            margin-bottom: 5px;
            font-size: 16px;
            line-height: 187%;
         }

         .footer-inquiry-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-radio) {
            padding: 10px;
         }

         .footer-inquiry-form .form-group {
            margin-bottom: 12px;
         }

         .footer-inquiry-form .wpcf7-form-control.wpcf7-textarea {
            height: 80px;
         }

         .footer-inquiry-form .wpcf7-form-control.wpcf7-submit {
            padding: 8px 24px;
         }

         .new-footer-link li a {
            font-size: 16px;
            line-height: 187%;
         }

         .footer-inquiry-form {
            max-width: 100%;
         }

         .footer-row-new {
            padding-top: 24px;
         }

         .new-footer .site-info {
            padding: 12px 0;
         }

         .new-footer .menu-social-icon-menu-container .menu li {
            margin-left: 12px;
         }

         .new-footer .menu-social-icon-menu-container .menu li a {
            width: 26px;
            height: 26px;
            padding: 1px;
         }

         .new-footer #menu-copyright-links {
            margin-bottom: 10px;
         }

         .new-footer .footer-content {
            padding: 40px 0px 60px;
         }

         .new-footer .footer-company-review img {
            max-height: 36px;
         }

         /* Form Start */
         .amp-form-section label {
            margin-bottom: 6px;
            font-size: 16px;
            line-height: 20px;
         }

         .amp-form-section .form-control {
            padding: 16px;
            font-size: 16px;
            line-height: 20px;
         }

         .amp-form-section .form-group {
            margin-bottom: 20px;
         }

         /* Form End */
      }

      @media(min-width:992px) and (max-width:1199px) {

         /* Typography */
         h1,
         h2.big-h2 {
            font-size: 52px;
            line-height: 60px;
         }

         h2,
         .mid-h1 {
            font-size: 45px;
            line-height: 52px;
         }

         h1.medium,
         h3 {
            font-size: 36px;
            line-height: 45px;
         }

         h1.small,
         .service-title h1,
         h4 {
            font-size: 28px;
            line-height: 36px;
         }

         h5 {
            font-size: 20px;
            line-height: 28px;
         }

         h6 {
            font-size: 18px;
            line-height: 22px;
         }

         body,
         p,
         ol,
         ul {
            font-size: 16px;
            line-height: 24px;
         }

         small {
            font-size: 12px;
            line-height: 20px;
         }

         .common-section {
            padding-top: 70px;
            padding-bottom: 70px;
         }

         .common-section-small {
            padding-top: 50px;
            padding-bottom: 50px;
         }

         .custom-saperator {
            height: 20px;
         }

         h2,
         .mid-h1 {
            font-size: 45px;
            line-height: 52px;
         }

         .btn-grp {
            margin: 0 -8px
         }

         .btn-grp a {
            margin: 8px
         }

         .theme-btn a .fireworks,
         .theme-btn button .fireworks {
            top: -1px;
            left: -1px
         }

         .theme-btn a,
         input.load-more {
            padding: 10px 20px;
            font-size: 16px;
            line-height: 16px;
            border-width: 1px
         }

         /* Header Style ============================= */
         .main-header {
            padding: 10px 12px;
            border-bottom: 2px solid #fafafa;
         }

         .primary-head-menu ul>li {
            margin: 0px 8px;
         }

         .primary-head-menu ul>li>a {
            font-size: 12px;
            line-height: 30px;
         }

         .main-header>div.primary-logo a {
            width: 185px;
         }

         /* Sub Menu Style */
         .sub-menu {
            border-top-width: 25px;
         }

         .sub-menu-wrapper {
            max-width: 710px;
         }

         .sub-menu-wrapper ul li {
            max-width: 235px;
         }

         .sub-menu-wrapper ul li a {
            padding: 15px 10px;
         }

         .sub-menu-wrapper ul li .menu-item-icon {
            width: 45px;
         }

         .sub-menu-wrapper ul li .menu-item-icon img {
            max-height: 45px;
         }

         .sub-menu-wrapper ul li .menu-item-desc {
            padding-left: 8px;
            width: calc(100% - 45px);
         }

         /* New Deskyop Menu */
         .desktop-mega-header.main-header {
            padding: 12.5px 16px;
         }

         .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper,
         .desktop-mega-header .about-submenu .mega-sub-menu-wrapper {
            padding: 14px 16px;
         }

         .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat,
         .desktop-mega-header .about-submenu .mega-sub-menu-wrapper .main-service-cat {
            margin-bottom: 12px ;
            padding-bottom: 4px;
            font-size: 14px;
            line-height: 22px;
         }

         .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat:after,
         .desktop-mega-header .about-submenu .mega-sub-menu-wrapper .main-service-cat:after {
            width: 100px;
            height: 2px;
         }

         .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .megamenu-item-icon,
         .desktop-mega-header .about-submenu .mega-sub-menu-wrapper .megamenu-item-icon {
            margin-bottom: 0;
            width: 22px;
            height: 22px;
            border-radius: 2px;
         }

         .desktop-mega-header .desktop-primary-menu li.service-megamenu .what-we-do-submenu .service-sub-cat>li,
         .desktop-mega-header .desktop-primary-menu li.about-megamenu .about-submenu .service-sub-cat>li {
            margin-bottom: 10px ;
         }

         .desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc,
         .desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc {
            margin-left: 10px;
            line-height: 18px;
         }

         .desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc span,
         .desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc span {
            font-size: 13px;
            line-height: 18px;
         }

         .desktop-mega-header ul.menu>li.menu-item-has-children>a:after {
            bottom: -3px;
         }

         .desktop-mega-header ul.menu>li {
            margin: 0 8px;
         }

         .desktop-mega-header ul.menu>li>a {
            margin: 6px 0;
            font-size: 14px;
            line-height: 22px;
         }

         .desktop-mega-header ul.menu>li.career-menu a {
            margin-left: 8px;
            padding: 10px 20px;
            font-size: 16px;
            line-height: 16px;
            border-width: 1px;
         }

         .desktop-mega-header .header-contactus {
            margin-left: 8px;
         }

         .megamenu-left {
            width: 70%;
         }

         .megamenu-right {
            width: 30%;
         }

         .hire-develop-wrapper {
            padding: 10px 16px;
         }

         /* .desktop-mega-header li.service-megamenu .sub-menu li .hire-dev-box > li { margin-bottom: 20px ; } */
         .hire-dev-box .hire-icon-box {
            width: 35px;
            height: 35px;
            margin-right: 10px;
         }

         .hire-desc-box {
            width: 100%;
         }

         .hire-desc-box h5 {
            margin-bottom: 2px;
            font-size: 15px;
            line-height: 22px;
         }

         .hire-desc-box p {
            margin-bottom: 4px;
            font-size: 12px;
            line-height: 150%;
         }

         .linebtn {
            font-size: 12px;
            line-height: 18px;
         }

         .linebtn img {
            margin-left: 4px;
         }

         /* Our Product Menu */
         .desktop-mega-header .desktop-primary-menu li.product-megamenu .sub-menu {
            right: 0px;
            max-width: 98%;
         }

         .our-product-wrapper .product-wrapper-left {
            width: calc(100% - 25%);
         }

         .our-product-wrapper .product-wrapper-right {
            padding: 10px 12px;
            width: 25%;
         }

         .our-product-wrapper .product-wrapper-left>ul>li {
            height: 265px;
         }

         .our-product-wrapper ul>li .product-detail-box {
            padding: 6px;
         }

         .our-product-wrapper ul>li .product-detail-box .img-box {
            height: 95px;
            width: 150px;
            margin: 0 auto;
         }

         .our-product-wrapper ul>li .product-detail-box p {
            margin-top: 12px;
            font-size: 12px;
            line-height: 150%;
         }

         .visitlink {
            padding: 4px 22px;
            border-radius: 40px;
            font-size: 13px;
            line-height: 22px;
         }

         .our-product-wrapper .hire-desc-box {
            max-width: 100%;
         }

         /*============ Investor Menu Start ==============*/
         .dropdown-new-menu .sub-menu {
            border-top: 24px;
            margin: 0;
            padding: 20px 12px;
            min-width: 200px;
         }

         .dropdown-new-menu .sub-menu .sub-menu {
            left: calc(100% + 12px);
            min-width: 220px;
         }

         .dropdown-new-menu .sub-menu li a {
            font-size: 14px;
            line-height: 20px;
         }

         .dropdown-new-menu .sub-menu li {
            margin: 0 0 12px;
         }

         .dropdown-new-menu .sub-menu li:after {
            width: 9px;
            height: 11px;
         }

         .dropdown-new-menu .sub-menu li.menu-item-has-children {
            padding-right: 12px;
         }

         .dropdown-new-menu .sub-menu li.investor-tagline a {
            font-size: 13px;
            line-height: 20px;
         }

         /*============ Investor Menu End ==============*/
         /* 4d-what-we-do- section start */
         .fd-what-we-do-wrapper img {
            width: 40px;
         }

         .fd-what-we-do-wrapper h5 {
            margin: 6px 0 10px;
            font-size: 18px;
            line-height: 28px;
         }

         /* hire dedicated page css starts */
         .dedicated-banner-section {
            padding: 130px 0px;
         }

         .banner-text-box {
            max-width: 91%;
         }

         .banner-text-box p {
            max-width: 76.5%;
            font-size: 18px;
            line-height: 34px;
         }

         .banner-text-box h2 {
            line-height: 60px;
         }

         /* Hire-Dev-Section why choose us  */
         .hire-why-choose-content-heading h4 {
            margin-bottom: 14px;
            font-size: 26px;
            line-height: 42px;
         }

         .hire-why-choose-content-heading p {
            font-size: 16px;
            line-height: 24px;
         }

         .hire-why-choose-desc-box:after {
            height: 300px;
         }

         .hire-why-choose-desc-box ul {
            max-width: 91%;
            margin-right: 0;
         }

         .hire-why-choose-desc-box ul li {
            padding: 10px;
            width: calc(100%/2);
         }

         .hire-why-choose-desc-box ul li:nth-child(even) {
            margin-top: -74px;
         }

         .hire-dedi-techno-box {
            padding: 10px 14px;
            min-height: 360px;
         }

         .amp-img-why-choose-section {
            width: 60px;
            height: 60px;
         }

         .hire-dedic-dev-desc-box {
            margin-top: 14px;
         }

         .hire-dedic-dev-desc-box h5 {
            margin-bottom: 14px;
            font-size: 20px;
            line-height: 30px;
         }

         .hire-reso-logo-img {
            width: 100px;
            height: 100px;
            bottom: 16%;
            padding: 5px;
         }

         /* hire process section starts */
         .hire-process-tree {
            margin-top: -51px;
            flex: 1;
         }

         .hire-process-tree-box {
            padding: 14px 0px;
         }

         .process-number-box {
            padding: 8px 14px;
            width: 70px;
            height: 70px;
         }

         .process-number-box h4 {
            font-size: 24px;
            line-height: 38px;
         }

         .process-description {
            margin-top: 20px;
         }

         .process-description p {
            font-size: 20px;
            line-height: 30px;
         }

         .hire-process-tree .process-number-wrap::before {
            height: 57px;
            width: calc(100% - 70px);
         }

         .payment-partner-logos {
            margin: -61px auto 0;
            padding: 45px 0;
            max-width: 87%;
         }

         .payment-partner-logos li {
            padding: 0 10px;
         }

         .technology-dev-sec {
            padding: 70px 0;
         }

         /* Home Testimonials Section  Start */
         .client-testimony-box {
            padding: 24px;
            border-radius: 12px;
         }

         .client-testimony-box:after {
            width: 81px;
            height: 55px;
            right: 3%;
         }

         h5.client-name-box {
            margin-bottom: 8px;
            font-size: 22px;
            line-height: 30px;
         }

         h6.client-country-name {
            margin-bottom: 20px;
            font-size: 18px;
            line-height: 30px;
         }

         .client-testimony-box p {
            font-size: 18px;
            line-height: 30px;
         }

         .home-testimonial-content .i-amphtml-carousel-slotted {
            padding: 39px 26px;
         }

         .home-testimonial-content amp-base-carousel.i-amphtml-layout-size-defined {
            height: 420px ;
         }

         /* Home Testimonials Section  End */
         /* Hiring modal Section Start */
         .hiring-model-amp-section h3 {
            font-size: 33px;
            line-height: 48px;
         }

         .hiring-model-amp-wrapper {
            padding: 40px;
            border-top: 3px solid;
         }

         .hiring-model-amp-wrapper h5 {
            margin-bottom: 24px;
         }

         .hiring-model-amp-wrapper .price-box-amp {
            font-size: 26px;
            line-height: 44px;
         }

         .hiring-model-amp-wrapper .price-box-amp span {
            font-size: 18px;
            line-height: 24px;
         }

         .hiring-model-amp-wrapper p {
            margin-bottom: 26px;
            font-size: 18px;
            line-height: 24px;
         }

         .hiring-model-amp-wrapper:hover {
            border-radius: 0px 0px 12px 12px;
         }

         .hiring-amp-saperetor {
            margin-bottom: 26px;
         }

         /* Hiring modal Section End */
         /* ===================== Experties Tab Section Start ========================= */
         .experties-tabs-content {
            background-size: 45% auto;
         }

         .experties-tabs-content .tab-content-box {
            padding: 22px;
         }

         .tab-content-box h3 {
            margin-bottom: 24px;
            font-size: 24px;
            line-height: 32px;
         }

         .tab-content-box p {
            margin-bottom: 24px;
         }

         .experties-tab-list li {
            margin-bottom: 8px;
            padding-left: 6px;
            font-size: 16px;
            line-height: 28px;
            width: 50%;
         }

         .experties-tab-list li:before {
            width: 5px;
            height: 5px;
         }

         .tabs-nav-box {
            padding: 22px;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li {
            margin-bottom: 8px;
            padding: 16px 12px 16px 16px;
            font-size: 16px;
            line-height: 24px;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li:after {
            width: 4px;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li img {
            width: 26px;
            height: 26px;
            margin-right: 10px;
         }

         .experties-tab-technology {
            margin-bottom: 24px;
         }

         .experties-tab-technology li {
            width: 50px;
            height: 50px;
            margin-right: 12px;
         }

         .experties-tab-technology li img {
            width: 40px;
         }

         /* ===================== Experties Tab Section End ========================= */
         /* Footer Style ============================= */
         .footer-row {
            padding-top: 40px;
         }

         .footer-content {
            padding: 60px 0px 30px;
         }

         .footer-item-title {
            margin-bottom: 12px;
         }

         .footer-logo img {
            width: 150px;
         }

         ul.cnss-social-icon li a {
            padding: 0px ;
            height: 30px ;
            width: 30px ;
         }

         ul.cnss-social-icon li a i {
            font-size: 18px ;
            line-height: 30px ;
         }

         .footer-company-text p,
         .footer-address-block .widget_custom_html p {
            font-size: 14px;
            line-height: 26px;
         }

         .footer-review-icons a img {
            max-height: 65px;
         }

         #menu-footer-links li {
            margin-bottom: 14px;
            font-size: 14px;
            line-height: 24px;
         }

         .footer-contact {
            padding: 20px;
         }

         .footer-contact:after {
            height: 30px;
            width: 25px;
         }

         .footer-contact li {
            font-size: 14px;
            line-height: 20px;
            margin-bottom: 16px;
         }

         .menu-footer-social-menu-container li a {
            font-size: 14px;
            line-height: 22px;
         }

         .site-info {
            padding: 25px 0px;
         }

         .site-info small {
            font-size: 12px;
         }

         #menu-copyright-links li {
            padding: 0px 8px;
            font-size: 12px;
            line-height: 20px;
         }

         /* New Footer Design*/
         .footer-item-title-new {
            margin-bottom: 6px;
         }

         .footer-form-box p {
            margin-bottom: 4px;
            font-size: 12px;
            line-height: 187%;
         }

         .new-footer-link li a {
            font-size: 14px;
            line-height: 187%;
         }

         .footer-row-new {
            padding-top: 20px;
         }

         .new-footer .site-info {
            padding: 10px 0;
         }

         .new-footer .menu-social-icon-menu-container .menu li {
            margin-left: 10px;
         }

         .new-footer .menu-social-icon-menu-container .menu li a {
            width: 24px;
            height: 24px;
            padding: 1px;
         }

         .new-footer #menu-copyright-links {
            margin-bottom: 8px;
         }

         .new-footer .footer-content {
            padding: 30px 0px 50px;
         }

         .new-footer .footer-company-review img {
            max-height: 30px;
         }

         /* Form Start */
         .amp-form-section label {
            margin-bottom: 6px;
            font-size: 16px;
            line-height: 20px;
         }

         .amp-form-section .form-control {
            padding: 14px;
            font-size: 16px;
            line-height: 20px;
         }

         .amp-form-section .form-group {
            margin-bottom: 20px;
         }

         /* Form End */
      }

      @media (min-width:768px) and (max-width:991px) {

         /* Typography */
         body {
            font-size: 13px;
         }

         h1,
         h2.big-h2 {
            font-size: 50px;
            line-height: 60px;
         }

         h2,
         .mid-h1 {
            font-size: 34px;
            line-height: 42px;
         }

         h1.medium,
         h3 {
            font-size: 28px;
            line-height: 34px;
         }

         h1.small,
         .service-title h1,
         h4 {
            font-size: 24px;
            line-height: 30px;
         }

         h5 {
            font-size: 18px;
            line-height: 26px;
         }

         h6 {
            font-size: 16px;
            line-height: 22px;
         }

         body,
         p,
         ol,
         ul {
            font-size: 14px;
            line-height: 28px;
         }

         .common-section,
         .common-section-small {
            padding-top: 45px;
            padding-bottom: 45px;
         }

         .custom-saperator {
            height: 15px;
         }

         h2,
         .mid-h1 {
            font-size: 34px;
            line-height: 42px;
         }

         .btn-grp {
            margin: 0 -6px
         }

         .btn-grp a {
            margin: 6px
         }

         .theme-btn a .fireworks,
         .theme-btn button .fireworks {
            top: -1px;
            left: -1px
         }

         .theme-btn a,
         input.load-more {
            padding: 10px 20px;
            font-size: 14px;
            line-height: 14px;
            border-width: 1px
         }

         /* Header Style ============================= */
         .main-header {
            padding: 8px 15px;
            border-bottom-width: 1px;
         }

         .primary-head-menu ul li {
            margin: 0px 10px;
         }

         .primary-head-menu ul li a {
            font-size: 14px;
            line-height: 30px;
         }

         /* .main-header > div.primary-logo                        { width: 150px; text-align: center; }
      */
         .main-header>div.primary-logo a {
            width: 150px;
         }

         /* Sub Menu Style */
         .sub-menu {
            border-top-width: 25px;
         }

         .sub-menu-wrapper {
            max-width: 500px;
         }

         .sub-menu-wrapper ul li {
            max-width: 235px;
         }

         .sub-menu-wrapper ul li a {
            padding: 15px 10px;
         }

         .sub-menu-wrapper ul li .menu-item-icon {
            width: 45px;
         }

         .sub-menu-wrapper ul li .menu-item-icon img {
            max-height: 45px;
         }

         .sub-menu-wrapper ul li .menu-item-desc {
            padding-left: 8px;
            width: calc(100% - 45px);
         }

         /* 4d-what-we-do- section start */
         .fd-what-we-do-wrapper {
            margin-bottom: 16px;
         }

         .fd-what-we-do-wrapper img {
            width: 40px;
         }

         .fd-what-we-do-wrapper h5 {
            margin: 6px 0 10px;
            font-size: 16px;
            line-height: 24px;
         }

         /* hire dedicated page css starts */
         .dedicated-banner-section {
            padding: 80px 0px;
         }

         .banner-text-box {
            max-width: 100%;
         }

         .banner-text-box p {
            max-width: 85%;
            font-size: 17px;
            line-height: 32px;
         }

         .banner-text-box h2 {
            line-height: 45px;
         }

         /* Hire-Dev-Section why choose us  */
         .hire-why-choose-content-heading h4 {
            margin-bottom: 10px;
            font-size: 20px;
            line-height: 30px;
         }

         .hire-why-choose-content-heading p {
            font-size: 16px;
            line-height: 24px;
         }

         .hire-why-choose-desc-box:after {
            height: 250px;
            right: -12%;
            left: auto;
            width: 100%;
         }

         .hire-why-choose-desc-box ul {
            max-width: 76%;
            margin-right: 0;
         }

         .hire-why-choose-desc-box ul li {
            padding: 8px;
            width: calc(100%/2);
         }

         .hire-why-choose-desc-box ul li:nth-child(even) {
            margin-top: 0px;
         }

         .hire-dedi-techno-box {
            padding: 8px 12px;
            min-height: 250px;
         }

         .amp-img-why-choose-section {
            width: 50px;
            height: 50px;
         }

         .hire-dedic-dev-desc-box {
            margin-top: 10px;
         }

         .hire-dedic-dev-desc-box h5 {
            margin-bottom: 10px;
            font-size: 18px;
            line-height: 24px;
         }

         .hire-reso-logo-img {
            width: 80px;
            height: 80px;
            bottom: 14%;
            padding: 5px;
            left: 12%;
         }

         /* hire process section starts */
         .hire-process-tree {
            margin-top: -51px;
            flex: 1;
         }

         .hire-process-tree-box {
            padding: 26px 0px;
         }

         .process-number-box {
            padding: 4px 10px;
            width: 50px;
            height: 50px;
         }

         .process-number-box h4 {
            font-size: 16px;
            line-height: 30px;
         }

         .process-description {
            margin-top: 12px;
         }

         .process-description p {
            font-size: 14px;
            line-height: 22px;
         }

         .hire-process-tree .process-number-wrap::before {
            height: 57px;
            width: calc(100% - 50px);
         }

         .payment-partner-logos {
            margin: -61px auto 0;
            padding: 35px 0;
            max-width: 92%;
         }

         .payment-partner-logos li {
            padding: 0 10px;
         }

         .technology-dev-sec h4 {
            max-width: 45%;
         }

         .technology-dev-sec {
            padding: 50px 0;
         }

         /* Home Testimonials Section  Start */
         .client-testimony-box {
            padding: 20px;
            border-radius: 8px;
         }

         .client-testimony-box:after {
            width: 42px;
            height: 28px;
            right: 4%;
         }

         h5.client-name-box {
            margin-bottom: 4px;
            font-size: 20px;
            line-height: 30px;
         }

         h6.client-country-name {
            margin-bottom: 12px;
            font-size: 16px;
            line-height: 24px;
         }

         .client-testimony-box p {
            font-size: 16px;
            line-height: 24px;
         }

         .home-testimonial-content amp-base-carousel.i-amphtml-layout-size-defined {
            height: 275px ;
         }

         /* Home Testimonials Section  End */
         .hiring-model-amp-content>.row {
            justify-content: center;
         }

         /* Hiring modal Section Start */
         .hiring-model-amp-section h3 {
            font-size: 33px;
            line-height: 48px;
         }

         .hiring-model-amp-wrapper {
            padding: 40px;
            border-top: 3px solid;
         }

         .hiring-model-amp-wrapper h5 {
            margin-bottom: 24px;
         }

         .hiring-model-amp-wrapper .price-box-amp {
            font-size: 26px;
            line-height: 44px;
         }

         .hiring-model-amp-wrapper .price-box-amp span {
            font-size: 18px;
            line-height: 24px;
         }

         .hiring-model-amp-wrapper p {
            margin-bottom: 26px;
            font-size: 18px;
            line-height: 24px;
         }

         .hiring-model-amp-wrapper:hover {
            border-radius: 0px 0px 12px 12px;
         }

         .hiring-amp-saperetor {
            margin-bottom: 26px;
         }

         /* Hiring modal Section End */
         /* ===================== Experties Tab Section Start ========================= */
         .experties-tabs-content {
            background-size: 37% auto;
         }

         .experties-tabs-content .tab-content-box {
            padding: 16px;
         }

         .tab-content-box h3 {
            margin-bottom: 16px;
            font-size: 20px;
            line-height: 30px;
         }

         .tab-content-box p {
            margin-bottom: 16px;
         }

         .experties-tab-list li {
            margin-bottom: 4px;
            padding-left: 5px;
            font-size: 14px;
            line-height: 20px;
            width: 50%;
         }

         .experties-tab-list li:before {
            width: 4px;
            height: 4px;
         }

         .tabs-nav-box {
            padding: 16px;
         }

         .tabs-nav-box ul {
            display: flex;
            flex-wrap: wrap;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li {
            width: 50%;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li {
            margin-bottom: 6px;
            padding: 11px 11px 11px 16px;
            font-size: 16px;
            line-height: 24px;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li:after {
            width: 4px;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li img {
            width: 30px;
            height: 30px;
            margin-right: 8px;
         }

         .experties-tab-technology {
            margin-bottom: 14px;
         }

         .experties-tab-technology li {
            width: 40px;
            height: 40px;
            margin-right: 12px;
         }

         .experties-tab-technology li img {
            width: 32px;
         }

         .experties-content-box>.row {
            display: block;
         }

         /* ===================== Experties Tab Section End ========================= */
         /* Footer Style ============================= */
         .footer-logo img {
            max-height: 44px;
         }

         .footer-row {
            padding-top: 30px;
         }

         .footer-content {
            padding: 50px 0px 25px;
         }

         .footer-item-title {
            margin-bottom: 10px;
         }

         .footer-company-text p,
         .footer-address-block .widget_custom_html p {
            font-size: 14px;
            line-height: 22px;
         }

         .footer-address-block .widget_custom_html .col-sm-6 {
            margin-top: 12px;
         }

         .footer-address-block .widget_custom_html .col-sm-6:nth-child(odd) {
            clear: both;
         }

         .footer-review-icons a {
            margin-left: 8px;
         }

         .footer-review-icons a img {
            max-height: 63px;
         }

         ul.cnss-social-icon li a {
            padding: 0px ;
            height: 20px ;
            width: 20px ;
         }

         ul.cnss-social-icon li a i {
            font-size: 14px ;
            line-height: 20px ;
         }

         #menu-footer-links li {
            padding-right: 0px;
            margin-bottom: 10px;
            font-size: 14px;
            line-height: 22px;
         }

         .menu-footer-social-menu-container li a {
            font-size: 14px;
            line-height: 22px;
         }

         .footer-contact {
            padding: 20px;
            margin: 0px -15px;
         }

         .footer-contact:after {
            height: 20px;
            width: 20px;
         }

         .footer-contact li {
            font-size: 12px;
            line-height: 20px;
            margin-bottom: 10px;
         }

         .site-info {
            padding: 30px 0px;
         }

         .site-info small {
            font-size: 12px;
         }

         #menu-copyright-links li {
            padding: 0px 6px;
            font-size: 12px;
            line-height: 20px;
         }

         #menu-copyright-links li:after {
            width: 1px;
         }

         /* New Footer Design*/
         .footer-item-title-new {
            margin-bottom: 6px;
         }

         .new-footer-link li a {
            font-size: 14px;
            line-height: 187%;
         }

         .footer-row-new {
            padding-top: 20px;
         }

         .new-footer .site-info {
            padding: 10px 0;
         }

         .new-footer .menu-social-icon-menu-container .menu li {
            margin-left: 10px;
         }

         .new-footer .menu-social-icon-menu-container .menu li a {
            width: 20px;
            height: 20px;
            padding: 1px;
         }

         .new-footer #menu-copyright-links {
            margin-bottom: 8px;
         }

         .new-footer .footer-content {
            padding: 20px 0px 40px;
         }

         .new-footer .footer-company-review img {
            max-height: 28px;
         }

         .footer-form-box {
            margin-top: 16px;
         }

         .copyright-social-menu {
            order: 2;
         }

         .footer-copyright-text {
            order: 3;
         }

         /* Footer Style ============================= */
         .footer-row {
            padding-top: 20px;
         }

         .footer-content {
            padding: 36px 0px 20px;
         }

         .footer-address-block .widget_custom_html {
            margin-bottom: 0;
         }

         .footer-company-text p,
         .footer-address-block .widget_custom_html p {
            font-size: 14px;
            line-height: 24px;
         }

         .footer-company-text {
            margin-bottom: 20px;
         }

         .footer-item-title {
            margin: 0px 0px 6px;
         }

         .footer-logo {
            margin-bottom: 14px;
         }

         .footer-logo img {
            width: 130px;
            max-height: none;
         }

         .footer-address-block .widget_custom_html .col-sm-6 {
            margin-top: 12px;
         }

         .footer-review-icons {
            text-align: left;
         }

         .footer-review-icons a {
            margin: 5px 15px 5px 0px;
         }

         .footer-review-icons a img {
            max-height: 50px;
         }

         ul#menu-footer-links {
            margin: 0 -5px;
         }

         #menu-footer-links li {
            margin: 5px;
            font-size: 14px;
            line-height: 20px;
            display: inline-block;
            width: auto;
         }

         .menu-footer-social-menu-container li a {
            margin-bottom: 10px;
            font-size: 14px;
            line-height: 20px;
            display: block;
         }

         .footer-contact {
            margin-top: 16px;
            padding: 15px 25px;
            display: inline-block;
         }

         .footer-contact .footer-item-title {
            margin-top: 0px;
         }

         .footer-contact:after {
            height: 20px;
            width: 20px;
         }

         .footer-contact li {
            font-size: 14px;
            line-height: 20px;
            margin-bottom: 10px;
         }

         .site-info {
            padding: 15px 0px;
            text-align: center;
         }

         #menu-copyright-links-contaciner {
            text-align: center;
         }

         #menu-copyright-links {
            display: inline-block;
            float: none;
         }

         #menu-copyright-links li {
            padding: 0px 6px;
            font-size: 11px;
            line-height: 20px;
         }

         #menu-copyright-links li:after {
            width: 1px;
         }

         .site-info small {
            font-size: 11px;
         }

         /* New Footer Design*/
         .footer-item-title-new {
            margin-bottom: 6px;
         }

         .footer-form-box p {
            margin-bottom: 4px;
            font-size: 12px;
            line-height: 187%;
         }

         .new-footer-link li a {
            font-size: 14px;
            line-height: 137%;
         }

         .footer-inquiry-form {
            max-width: 100%;
         }

         .footer-row-new {
            padding-top: 20px;
         }

         .new-footer .site-info {
            padding: 24px 0;
         }

         .new-footer .menu-social-icon-menu-container .menu li {
            margin-left: 10px;
         }

         .new-footer .menu-social-icon-menu-container .menu li a {
            width: 25px;
            height: 25px;
            padding: 1px;
         }

         .new-footer #menu-copyright-links {
            margin-bottom: 3px;
         }

         .new-footer .footer-content {
            padding: 20px 0px 40px;
         }

         .new-footer .footer-company-review img {
            max-height: 28px;
         }

         .footer-form-box {
            margin-top: 16px;
         }

         /* 	.copyright-social-menu  { order:2; }
               .footer-copyright-text { order:3; } */
         .new-footer .footer-address-block .textwidget.custom-html-widget>[class^="col-"] {
            margin-top: 12px;
         }

         .new-footer-link li {
            margin: 5px;
            display: inline-block;
         }

         .new-footer .site-info>.row {
            justify-content: center;
         }

         .new-footer .footer-company-review {
            margin-bottom: 7px;
         }

         .new-footer .footer-review-icons a {
            margin: 0px 15px 0px 0px;
         }

         .new-footer .footer-logo {
            margin-bottom: 20px;
         }

         br.n-desktop {
            display: block;
         }

         /* Form Start */
         .amp-form-section label {
            margin-bottom: 6px;
            font-size: 14px;
            line-height: 20px;
         }

         .amp-form-section .form-control {
            padding: 12px;
            font-size: 14px;
            line-height: 20px;
         }

         .amp-form-section .form-group {
            margin-bottom: 16px;
         }

         /* Form End */
      }

      @media(max-width:767px) {

         /* Typography */
         h1,
         h2.big-h2 {
            font-size: 45px;
            line-height: 60px;
         }

         h2,
         .mid-h1 {
            font-size: 32px;
            line-height: 42px;
         }

         h1.medium,
         h3 {
            font-size: 25px;
            line-height: 32px;
         }

         h1.small,
         .service-title h1,
         .service-title blockquote,
         h4 {
            font-size: 24px;
            line-height: 30px;
         }

         h5 {
            font-size: 20px;
            line-height: 28px;
         }

         h6 {
            font-size: 16px;
            line-height: 24px;
         }

         body,
         p,
         ol,
         ul {
            font-size: 16px;
            line-height: 24px;
         }

         .common-section {
            padding-top: 45px;
            padding-bottom: 45px;
         }

         .common-section-small {
            padding-top: 30px;
            padding-bottom: 30px;
         }

         .custom-saperator {
            height: 15px;
         }

         h2,
         .mid-h1 {
            font-size: 32px;
            line-height: 42px;
         }

         .btn-grp {
            margin: 0 -6px
         }

         .btn-grp a {
            margin: 6px
         }

         .theme-btn a .fireworks,
         .theme-btn button .fireworks {
            top: -2px;
            left: -2px
         }

         .theme-btn a,
         .theme-btn button,
         input.load-more {
            padding: 12px 22px;
            font-size: 16px;
            line-height: 16px
         }

         .new-mobile-menu-wrapper .menu-item-has-children:hover a:hover+.sub-menu,
         .new-mobile-menu-wrapper .sub-menu:hover {
            visibility: visible ;
            opacity: 1 ;
         }

         /* Header Style ============================= */
         /* Hamburger Menu Style */
         .hamburger {
            transform: scale(0.7);
            -moz-transform: scale(0.7);
            -webkit-transform: scale(0.7);
            transform-origin: right;
         }

         .mobile-nav-header>div.primary-logo {
            width: auto;
         }

         .mobile-nav-header>div.primary-logo amp-img {
            width: 150px;
            height: 38px;
         }

         /* 4d-what-we-do- section start */
         .fd-what-we-do-wrapper img {
            width: 40px;
         }

         .fd-what-we-do-wrapper {
            margin-bottom: 16px;
         }

         .fd-what-we-do-wrapper h5 {
            margin: 6px 0 10px;
            font-size: 16px;
            line-height: 24px;
         }

         /* hire dedicated page css starts */
         .dedicated-banner-section {
            padding: 50px 0px;
         }

         .banner-text-box {
            max-width: 95%;
         }

         .banner-text-box p {
            max-width: 85%;
            font-size: 17px;
            line-height: 28px;
         }

         .banner-text-box h2 {
            line-height: 45px;
         }

         .banner-btn-box {
            flex-direction: column;
         }

         .banner-btn-box .theme-btn:last-child {
            margin-left: 0px;
         }

         .banner-text-box h1 {
            margin-bottom: 18px;
            line-height: 1.5;
         }

         /* Home Testimonials Section  Start */
         .home-testimonial-content .row .col-md-6 {
            margin-bottom: 32px;
         }

         .client-testimony-box {
            padding: 20px;
            border-radius: 8px;
         }

         .client-testimony-box:after {
            width: 54px;
            height: 37px;
            right: 3%;
         }

         h5.client-name-box {
            margin-bottom: 4px;
            font-size: 20px;
            line-height: 30px;
         }

         h6.client-country-name {
            margin-bottom: 12px;
            font-size: 16px;
            line-height: 24px;
         }

         .client-testimony-box p {
            font-size: 16px;
            line-height: 24px;
         }

         .home-testimonial-content amp-base-carousel.i-amphtml-layout-size-defined {
            height: 400px ;
         }

         .home-testimonial-content .i-amphtml-carousel-slotted {
            padding: 24px 21px;
         }

         /* Home Testimonials Section  End */
         /* Hire-Dev-Section why choose us  */
         .hire-why-choose-content-heading h4 {
            margin-bottom: 10px;
            font-size: 20px;
            line-height: 30px;
         }

         .hire-why-choose-content-heading p {
            font-size: 16px;
            line-height: 24px;
         }

         .hire-why-choose-desc-box:after {
            display: none;
         }

         .hire-why-choose-desc-box ul {
            max-width: 100%;
            display: block;
            margin-right: 0;
         }

         .hire-why-choose-desc-box ul li {
            padding: 8px;
            width: 100%;
         }

         .hire-why-choose-desc-box ul li:nth-child(even) {
            margin-top: 0px;
         }

         .hire-dedi-techno-box {
            padding: 8px 12px;
            min-height: 250px;
         }

         .amp-img-why-choose-section {
            width: 50px;
            height: 50px;
         }

         .hire-dedic-dev-desc-box {
            margin-top: 10px;
         }

         .hire-dedic-dev-desc-box h5 {
            margin-bottom: 10px;
            font-size: 18px;
            line-height: 24px;
         }

         .hire-reso-logo-img {
            display: none;
         }

         /* hire process section starts */
         .process-tree-content {
            flex-wrap: wrap;
         }

         .hire-process-tree {
            margin-top: 0;
            margin: 5px 0;
            flex: 1 0 50%;
         }

         .hire-process-tree br {
            display: none;
         }

         .hire-process-tree-box {
            padding: 26px 0px;
         }

         .process-number-box {
            padding: 4px 10px;
            width: 50px;
            height: 50px;
         }

         .process-number-box h4 {
            font-size: 16px;
            line-height: 22px;
         }

         .process-description {
            margin-top: 10px;
         }

         .process-description p {
            font-size: 14px;
            line-height: 20px;
         }

         .hire-process-tree .process-number-wrap::before {
            display: none;
            height: 57px;
            width: calc(100% - 30px);
         }

         .payment-partner-logos {
            margin: -15px auto 0;
            padding: 23px 0;
            width: auto;
            max-width: 100%;
         }

         .payment-partner-logos li {
            padding: 0 10px;
         }

         .technology-dev-sec h4 {
            max-width: 100%;
         }

         .technology-dev-sec {
            padding: 40px 0;
         }

         /* Hiring modal Section Start */
         .hiring-model-amp-content>.row {
            justify-content: center;
         }

         .hiring-model-amp-section h3 {
            font-size: 28px;
            line-height: 42px;
         }

         .hiring-model-amp-wrapper {
            padding: 20px;
            border-top: 2px solid;
         }

         .hiring-model-amp-wrapper h5 {
            margin-bottom: 20px;
         }

         .hiring-model-amp-wrapper .price-box-amp {
            font-size: 24px;
            line-height: 40px;
         }

         .hiring-model-amp-wrapper .price-box-amp span {
            font-size: 18px;
            line-height: 24px;
         }

         .hiring-model-amp-wrapper p {
            margin-bottom: 20px;
            font-size: 18px;
            line-height: 24px;
         }

         .hiring-model-amp-wrapper:hover {
            border-radius: 0px 0px 12px 12px;
         }

         .hiring-amp-saperetor {
            margin-bottom: 20px;
         }

         .hiring-model-amp-box {
            margin-bottom: 24px;
            max-width: 400px;
            margin: 0 auto;
         }

         /* ===================== Experties Tab Section Start ========================= */
         .experties-tabs-content {
            background-size: 70% auto;
         }

         .experties-tabs-content .tab-content-box {
            padding: 16px;
         }

         .tab-content-box h3 {
            margin-bottom: 16px;
            font-size: 20px;
            line-height: 30px;
         }

         .tab-content-box p {
            margin-bottom: 16px;
         }

         .experties-tab-list li {
            margin-bottom: 4px;
            padding-left: 5px;
            font-size: 14px;
            line-height: 20px;
            width: 100%;
         }

         .experties-tab-list li:before {
            width: 4px;
            height: 4px;
         }

         .tabs-nav-box {
            padding: 16px;
         }

         .tabs-nav-box ul {
            display: flex;
            flex-wrap: wrap;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li {
            width: 100%;
            z-index: 15;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li {
            margin: 6px 0;
            padding: 11px 11px 11px 16px;
            font-size: 16px;
            line-height: 24px;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li:after {
            width: 4px;
         }

         .tabs-nav-box amp-selector .tab-amp-nav-li img {
            width: 30px;
            height: 30px;
            margin-right: 8px;
         }

         .experties-tab-technology {
            margin-bottom: 14px;
         }

         .experties-tab-technology li {
            width: 40px;
            height: 40px;
            margin-right: 12px;
         }

         .experties-tab-technology li img {
            width: 32px;
         }

         .experties-content-box>.row {
            display: block;
         }

         /* ===================== Experties Tab Section End ========================= */
         /* Footer Style ============================= */
         .footer-row {
            padding-top: 20px;
         }

         .footer-content {
            padding: 36px 0px 20px;
         }

         .footer-address-block .widget_custom_html {
            margin-bottom: 0;
         }

         .footer-company-text p,
         .footer-address-block .widget_custom_html p {
            font-size: 14px;
            line-height: 24px;
         }

         .footer-company-text {
            margin-bottom: 20px;
         }

         .footer-item-title {
            margin: 0px 0px 6px;
         }

         .footer-logo {
            margin-bottom: 14px;
         }

         .footer-logo img {
            width: 130px;
            max-height: none;
         }

         .footer-address-block .widget_custom_html .col-sm-6 {
            margin-top: 12px;
         }

         .footer-review-icons {
            text-align: left;
         }

         .footer-review-icons a {
            margin: 5px 15px 5px 0px;
         }

         .footer-review-icons a img {
            max-height: 50px;
         }

         ul#menu-footer-links {
            margin: 0 -5px;
         }

         #menu-footer-links li {
            margin: 5px;
            font-size: 14px;
            line-height: 20px;
            display: inline-block;
            width: auto;
         }

         .menu-footer-social-menu-container li a {
            margin-bottom: 10px;
            font-size: 14px;
            line-height: 20px;
            display: block;
         }

         .footer-contact {
            margin-top: 16px;
            padding: 15px 25px;
            display: inline-block;
         }

         .footer-contact .footer-item-title {
            margin-top: 0px;
         }

         .footer-contact:after {
            height: 20px;
            width: 20px;
         }

         .footer-contact li {
            font-size: 14px;
            line-height: 20px;
            margin-bottom: 10px;
         }

         .site-info {
            padding: 15px 0px;
            text-align: center;
         }

         #menu-copyright-links-contaciner {
            text-align: center;
         }

         #menu-copyright-links {
            display: inline-block;
            float: none;
         }

         #menu-copyright-links li {
            padding: 0px 6px;
            font-size: 11px;
            line-height: 20px;
         }

         #menu-copyright-links li:after {
            width: 1px;
         }

         .site-info small {
            font-size: 11px;
         }

         /* New Footer Design*/
         .footer-item-title-new {
            margin-bottom: 6px;
         }

         .footer-form-box p {
            margin-bottom: 4px;
            font-size: 12px;
            line-height: 187%;
         }

         .footer-inquiry-form .wpcf7-form-control:not(.wpcf7-submit):not(.wpcf7-radio) {
            padding: 8px;
         }

         .footer-inquiry-form .form-group {
            margin-bottom: 10px;
         }

         .footer-inquiry-form .wpcf7-form-control.wpcf7-textarea {
            height: 70px;
         }

         .footer-inquiry-form .wpcf7-form-control.wpcf7-submit {
            padding: 8px 22px;
         }

         .new-footer-link li a {
            font-size: 14px;
            line-height: 137%;
         }

         .footer-inquiry-form {
            max-width: 100%;
         }

         .footer-row-new {
            padding-top: 20px;
         }

         .footer-row-new>.row {
            flex-direction: column;
         }

         .new-footer .site-info {
            padding: 24px 0;
         }

         .new-footer .menu-social-icon-menu-container .menu li {
            margin-left: 10px;
         }

         .new-footer .menu-social-icon-menu-container .menu li a {
            width: 25px;
            height: 25px;
            padding: 1px;
         }

         .new-footer #menu-copyright-links {
            margin-bottom: 3px;
         }

         .new-footer .footer-content {
            padding: 20px 0px 40px;
         }

         .new-footer .footer-company-review img {
            max-height: 28px;
         }

         .footer-form-box {
            margin-top: 16px;
         }

         /* 	.copyright-social-menu  { order:2; }
            .footer-copyright-text { order:3; } */
         .new-footer .footer-address-block .textwidget.custom-html-widget>[class^="col-"] {
            margin-top: 12px;
         }

         .new-footer-link li {
            margin: 5px;
            display: inline-block;
         }

         .new-footer .site-info>.row {
            justify-content: center;
         }

         .new-footer .footer-company-review {
            margin-bottom: 7px;
         }

         .new-footer .footer-review-icons a {
            margin: 0px 15px 0px 0px;
         }

         .new-footer .footer-logo {
            margin-bottom: 20px;
         }

         br.n-desktop {
            display: block;
         }

         /* Form Start */
         .amp-form-section label {
            margin-bottom: 6px;
            font-size: 14px;
            line-height: 20px;
         }

         .amp-form-section .form-control {
            padding: 12px;
            font-size: 14px;
            line-height: 20px;
         }

         .amp-form-section .form-group {
            margin-bottom: 16px;
         }

         /* Form End */
      }

      @media(min-width: 1600px) {
         .container {
            width: 1590px;
         }

         .primary-head-menu ul {
            margin: 0px -15px;
         }
      }

      @media(min-width: 1200px) {
         body {
            padding-top: 108px ;
         }
      }

      @media(min-width: 992px) and (max-width:1199px) {
         .desktop-mega-header .dropdown-new-menu>.sub-menu {
            left: -100%;
            transform: none;
         }

         body {
            padding-top: 87px ;
         }
      }

      @media(max-width:991px) {
         body {
            padding-top: 69px ;
         }

         br.n-desktop {
            display: block;
         }

         /* Mobile Menu Header */
         .mobile-nav-header {
            justify-content: space-between;
            padding: 8px 15px;
            border-bottom-width: 1px;
         }

         .mobile-nav-header>div {
            width: auto;
         }

         .mobile-nav-header .burger-main {
            position: relative;
            width: auto;
            height: auto;
            padding: 0;
         }

         .mobile-nav-header>div.primary-logo {
            width: auto;
         }

         .mobile-nav-header>div.primary-logo img {
            width: 150px;
         }

         /* New mobile menu */
         .main-header.mobile-nav-header {
            padding: 15px;
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container {
            background-color: #fff;
         }

         body.open-menu .main-header.mobile-nav-header {
            border-color: #efefef;
         }

         .page-template-headermenu-template #wpadminbar {
            display: none;
         }

         .new-mobile-menu-wrapper .burger-main span {
            transition: all 0.3s ease-in-out;
         }

         /* .new-mobile-menu-wrapper #menu-mobile-navigation li { width: 100%; } */
         .new-mobile-menu-wrapper #menu-mobile-navigation li.open-sub>a,
         .new-mobile-menu-wrapper #menu-mobile-navigation li.current-menu-item>a,
         .new-mobile-menu-wrapper .menu-item-has-children:hover a:hover a+.sub-menu,
         .new-mobile-menu-wrapper .sub-menu:hover a {
            color: #0D7CFF
         }

         .new-mobile-menu-wrapper #menu-mobile-navigation {
            margin: 10px 0 0;
            display: flex;
            flex-direction: column;
            height: calc(100vh - 79px);
            overflow-y: auto;
         }

         .new-mobile-menu-wrapper .burger-main.open span.mid {
            opacity: 0;
         }

         .new-mobile-menu-wrapper .burger-main.open span.top {
            transform: rotate(45deg);
            top: 12px;
            transform-origin: center;
         }

         .new-mobile-menu-wrapper .burger-main.open span.bot {
            transform: rotate(-45deg);
            bottom: 12px;
            transform-origin: center;
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container {
            min-height: calc(100vh - 69px);
            min-height: calc(var(--app-height) - 69px);
            position: fixed;
            width: 100%;
            top: 69px;
            left: 0;
            transition: all 0.3s ease-in-out;
            z-index: 5;
            overflow-y: auto;
            background: #ffffff url('/wp-content/themes/yudiz/images/bg_ptrn.png') repeat-x center bottom / auto 70%;
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container:before {
            display: block;
            height: 71%;
            width: 100%;
            position: absolute;
            content: "";
            bottom: 0;
            left: 0;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0.96) 100%);
            z-index: -1;
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container.open {
            transform: translateX(0);
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item {
            padding: 0;
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item>a {
            display: inline-block;
            padding: 0 15px;
            color: #1c2530;
            margin: 10px 0;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            line-height: 30px;
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item.get-in-touch {
            text-align: center;
            margin-bottom: 10px;
            margin-top: 40px;
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item.get-in-touch>a {
            padding: 10px 24px;
            border: 2px solid #3c4c5e;
            color: #3c4c5e;
            text-transform: capitalize;
            border-radius: 40px;
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item.get-in-touch>a:hover {
            background: #3c4c5e;
            color: #fff;
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item>a:hover,
         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item>a:focus {
            text-decoration: none;
         }

         /* .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children{
         overflow: hidden;
      } */
         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children>a {
            display: block;
            padding-right: 0px;
            position: relative;
            background: none;
            margin-right: 15px;
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children>a::after {
            content: "";
            position: absolute;
            top: 50%;
            right: 0;
            height: 13px;
            width: 15px;
            background: url('/wp-content/themes/yudiz/images/down-arrow.svg') no-repeat center right/cover;
            transition: all 0.5s ease-in-out;
            transform-origin: center center;
            transform: translateY(-50%);
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children.open-sub>a::after,
         .new-mobile-menu-wrapper .menu-item-has-children:hover a:hover+.sub-menu a:after,
         .new-mobile-menu-wrapper .sub-menu:hover a:after {
            transform: translateY(-50%) rotate(180deg);
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children ul.sub-menu {
            border: none;
            width: 100%;
            z-index: 2;
            max-height: 0;
            transition: all 0.5s ease-in-out;
            position: relative;
            opacity: 1 ;
            visibility: visible ;
            overflow: hidden;
            padding-left: 30px;
            top: 0;
            background-color: #f8faff;
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children.open-sub .sub-menu,
         .new-mobile-menu-wrapper .menu-item-has-children:hover a:hover+.sub-menu,
         .new-mobile-menu-wrapper .sub-menu:hover {
            max-height: 500px;
            padding-top: 12px;
            padding-bottom: 12px;
            margin-bottom: 20px;
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children ul.sub-menu li {
            border: none;
            background-color: transparent;
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children ul.sub-menu li a {
            color: #000;
            font-weight: 400;
            font-size: 18px;
            line-height: 28px;
            margin: 4px 0;
            padding: 0;
            position: relative;
            padding-left: 22px;
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children ul.sub-menu li a:after {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            /* background-color: #0D7CFF; */
            background-color: #000;
            height: 2px;
            width: 6px;
         }

         .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item.get-in-touch.current-menu-item>a {
            background-color: #3c4c5e;
            color: #fff ;
         }

         amp-sidebar {
            width: 100%;
            max-width: 100%;
         }

         .mobile-nav-block {
            display: flex;
            align-items: center;
            justify-content: space-between;
         }
.desktop-mega-header.hidden-sm.hidden-xs { display:none; }
      }

      @media(max-width:1400px) {
         .desktop-mega-header li.service-megamenu .sub-menu li .hire-dev-box {
            max-width: 100%;
         }
      }

      @media(max-height:700px) and (max-width:1400px) and (min-width:992px) {

         .desktop-mega-header .desktop-primary-menu li.service-megamenu .what-we-do-submenu .service-sub-cat>li,
         .desktop-mega-header .desktop-primary-menu li.about-megamenu .about-submenu .service-sub-cat>li {
            margin-bottom: 9px ;
         }
      }
      form.amp-form-submit-error [submit-error], form.amp-form-submit-success [submit-success], form.amp-form-submitting [submitting] { margin-top:10px; }
      form [submit-error] {
         color:red;
      }
      form [submit-success]{
         color:green;
      }
   </style>
</head>

<body class="dedicated-page-amp">
   <!-- Google tag (gtag.js) -->
   <amp-analytics type="gtag" data-credentials="include">
      <script type="application/json">
         {
            "vars": {
               "gtag_id": "G-M5CZ0PWR9W",
               "config": {
                  "G-M5CZ0PWR9W": {
                     "groups": "default"
                  }
               }
            },
            "triggers": {
               "C_kDRYoskfsO8": {
                  "on": "click",
                  "selector": "#custm-submit-id",
                  "vars": {
                     "event_name": "conversion",
                     "send_to": ["AW-832641733/AKZxCKqEkokYEMW1hI0D"]
                  }
               }
            }

         }
      </script>
   </amp-analytics>
   <header id="masthead" class="site-header unset">
      <div class="main-header desktop-mega-header  hidden-sm hidden-xs">
         <div class="primary-logo">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $image = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
            <a href="<?php echo home_url(); ?>"><amp-img layout="intrinsic" width="240" height="61" src="<?php echo $image[0]; ?>" alt="logo"></amp-img></a>
         </div>
         <div class="desktop-primary-menu">
            <div class="primary-head-menu">
               <div class="menu-primary-mega-menu-container">
                  <ul id="menu-primary-mega-menu" class="menu">
                     <li id="menu-item-21880" class="about-megamenu menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-21880">
                        <a href="https://www.yudiz.com/company/">Company</a>
                        <ul class="sub-menu">
                           <li id="menu-item-22124" class="menu-item menu-item-type-yawp_wim menu-item-object-yawp_wim menu-item-22124">
                              <div class="yawp_wim_wrap">
                                 <div class="widget-area">
                                    <div id="block-5" class="yawp_wim_widget widget_block">
                                       <div class="about-submenu common-megamenu d-flex">
                                          <div class="megamenu-left">
                                             <div class="mega-sub-menu-wrapper">
                                                <ul>
                                                   <li>
                                                      <div class="inner-menu-wrapper">
                                                         <ul class="service-sub-cat">
                                                            <li>
                                                               <a href="https://www.yudiz.com/company/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/09/our-team-megamenu.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Our Team</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/company-events/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/09/events-about-megamenu.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Events</span>
                                                                  </p>
                                                               </a>
                                                               </p>
                                                            </li>
                                                            <!-- <li>
                                                               <a href="#">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/09/awards-about-megamenu.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Awards</span>
                                                                  </p>
                                                               </a>
                                                               </p>
                                                            </li> -->
                                                            <li>
                                                               <a href="https://www.yudiz.com/testimonials/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/09/testimonials-about-menu.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Testimonials</span>
                                                                  </p>
                                                               </a>
                                                               </p>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/case-studies/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2023/06/case-studies.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Case Study</span>
                                                                  </p>
                                                               </a>
                                                               </p>
                                                            </li>
                                                         </ul>
                                                         <p class="quote-text-para"><em>“Advancing with Assured Empirical Enterprise Solutions”</em></p>
                                                      </div>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                          <div class="megamenu-right secondary-bg about-brochure-wrapper">
                                             <div class="hire-develop-wrapper">
                                                <ul class="hire-dev-box">
                                                   <li>
                                                      <div class="hire-icons-box">
                                                         <amp-img layout="intrinsic" width="272" height="375" src="https://www.yudiz.com/wp-content/uploads/2023/06/Brochure-poster-img-menu.jpg" alt="hire-icon"></amp-img>
                                                      </div>
                                                      <div class="hire-desc-box">
                                                         <p>
                                                            We develop the best sustainable solutions with state of the art technology.
                                                         </p>
                                                         <p> <a href="#" class="linebtn">Download our E-brochure<br>
                                                               <amp-img layout="intrinsic" width="28" height="10" src="https://www.yudiz.com/wp-content/uploads/2022/08/text-btn-arrow.svg" alt=""></amp-img></a>
                                                         </p>
                                                      </div>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </li>
                     <li id="menu-item-21885" class="service-megamenu menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-21885">
                        <a>Services</a>
                        <ul class="sub-menu">
                           <li id="menu-item-21888" class="menu-item menu-item-type-yawp_wim menu-item-object-yawp_wim menu-item-21888">
                              <div class="yawp_wim_wrap">
                                 <div class="widget-area">
                                    <div id="block-2" class="yawp_wim_widget widget_block">
                                       <div class="what-we-do-submenu common-megamenu d-flex">
                                          <div class="megamenu-left">
                                             <div class="mega-sub-menu-wrapper">
                                                <ul>
                                                   <li>
                                                      <div class="inner-menu-wrapper">
                                                         <a href="https://www.yudiz.com/game-development/" class="main-service-cat">Game Development</a>
                                                         <ul class="service-sub-cat">
                                                            <li>
                                                               <a href="https://www.yudiz.com/2d-game-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/game-3d-modeling.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>2D Game</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/3d-game-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/game-unity.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>3D Game </span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/html5-game-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2023/06/html5game.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>HTML 5 Game</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/blockchain-game-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/virtual-game-nft.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>NFT Game</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                         </ul>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <div class="inner-menu-wrapper">
                                                         <a class="main-service-cat">Virtual Technology </a>
                                                         <ul class="service-sub-cat">
                                                            <li>
                                                               <a href="https://www.yudiz.com/virtual-reality-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/virtual-game-ar.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Virtual Reality</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/augmented-reality-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/virtual-game-vr.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Augmented Reality</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/mixed-reality-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/virtual-game-nft.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Mix Reality</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                         </ul>
                                                      </div>
                                                   </li>

                                                   <li>
                                                      <div class="inner-menu-wrapper">
                                                         <a class="main-service-cat">Futuristic Technology<br>
                                                         </a>
                                                         <ul class="service-sub-cat">
                                                            <li>
                                                               <a href="https://www.yudiz.com/blockchain-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/futuristic-blockchain.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Blockchain </span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/iot-software-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/futuristic-iot.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>iOT </span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/artificial-intelligence/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/futuristic-ai-ml.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>AI/ML</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/devops-consulting/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/cloud-devopes-ic.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>DevOps</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                         </ul>
                                                      </div>
                                                   </li>

                                                   <li>
                                                      <div class="inner-menu-wrapper">
                                                         <a href="https://www.yudiz.com/web-development/" class="main-service-cat">Web Development </a>
                                                         <ul class="service-sub-cat">
                                                            <li>
                                                               <a href="https://www.yudiz.com/mean-mern-stack-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/web-mean-mern.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>MEAN/MERN </span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/laravel-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/web-laravel.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Laravel</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/php-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/web-php.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>php</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/dot-net-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/web-dotnet.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>.NET</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/magento-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/web-magento.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Magento </span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/shopify-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/web-shopify.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Shopify </span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/wordpress-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/web-wordpress.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Wordpress</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/frontend-development/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2023/06/frontend.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Frontend</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                         </ul>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <div class="inner-menu-wrapper">
                                                         <a href="https://www.yudiz.com/mobile-app-development/" class="main-service-cat">App Development </a>
                                                         <ul class="service-sub-cat">
                                                            <li>
                                                               <a href="https://www.yudiz.com/android-app/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/mobile-app-android.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Android</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/ios-app/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/mobile-app-ios.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>iOs </span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a>
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/mobile-app-flutter.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Flutter</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/react-native-app/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/mobile-app-reactnative.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>React Native</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/wearable-app/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2023/06/wearable.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Wearable</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                         </ul>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <div class="inner-menu-wrapper">
                                                         <a class="main-service-cat">Design</a>
                                                         <ul class="service-sub-cat">
                                                            <li>
                                                               <a href="https://www.yudiz.com/3d-game-modeling/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/game-3d-modeling.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>3D Game modeling</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/character-design/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/design-2d-char.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>character Design</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/graphic-design/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/design-motion-graphics.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Graphic Design</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/ui-ux-design/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/design-uiux.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>UI/UX</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                            <li>
                                                               <a href="https://www.yudiz.com/game-environment-design/">
                                                                  <p class="megamenu-item-icon">
                                                                     <amp-img layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/game-environment.svg" width="23" height="18" alt="yudiz-menu-icon"></amp-img>
                                                                  </p>
                                                                  <p class="megamenu-item-desc">
                                                                     <span>Game Environment Design</span>
                                                                  </p>
                                                               </a>
                                                            </li>
                                                         </ul>
                                                      </div>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                          <div class="megamenu-right secondary-bg hire-dev-rightbox hire-dev-rightbox-overlay">
                                             <div class="hire-develop-wrapper">
                                                <ul class="hire-dev-box">
                                                   <li>
                                                      <div class="hire-icon-box">
                                                         <amp-img layout="intrinsic" width="25px" height="19px" src="https://www.yudiz.com/wp-content/uploads/2023/06/hire-dedicated-team.svg" alt="hire-icon"></amp-img>
                                                      </div>
                                                      <div class="hire-desc-box">
                                                         <h5>Hire Dedicated Team</h5>
                                                         <p> Our dedicated team is brightly skilled to design, develop and deploy your idea with consistent collaborative efficiency. </p>
                                                         <p> <a href="#" class="linebtn">Hire us<br>
                                                               <amp-img layout="intrinsic" width="28px" height="10px" src="https://www.yudiz.com/wp-content/uploads/2022/08/text-btn-arrow.svg" alt="Hire us"></amp-img></a>
                                                         </p>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <div class="hire-icon-box">
                                                         <amp-img layout="intrinsic" width="25px" height="19px" src="https://www.yudiz.com/wp-content/uploads/2023/06/full-cycle-product-development.svg" alt="hireicon"></amp-img>
                                                      </div>
                                                      <div class="hire-desc-box">
                                                         <h5>Full Cycle Product Development</h5>
                                                         <p> A process that encompasses all aspects of product development. From initial ideation to after launch advancements. Everything! </p>
                                                         <p> <a href="https://www.yudiz.com/full-cycle-product-development/" class="linebtn">Get the Solution<br>
                                                               <amp-img layout="intrinsic" width="28px" height="10px" src="https://www.yudiz.com/wp-content/uploads/2022/08/text-btn-arrow.svg" alt="Hire us"></amp-img></a>
                                                         </p>
                                                      </div>
                                                   </li>
                                                   <li>
                                                      <div class="hire-icon-box">
                                                         <amp-img layout="intrinsic" width="25px" height="19px" src="https://www.yudiz.com/wp-content/uploads/2023/06/it-consulting-service.svg" alt="hire-icon"></amp-img>
                                                      </div>
                                                      <div class="hire-desc-box">
                                                         <h5>IT Consulting Services</h5>
                                                         <p> We strategize for efficiency and utilize IT resources to achieve your business goals through IT consulting, a valuable asset. </p>
                                                         <p> <a href="https://www.yudiz.com/it-consulting-service/" class="linebtn">Get the Product<br>
                                                               <amp-img layout="intrinsic" width="28px" height="10px" src="https://www.yudiz.com/wp-content/uploads/2022/08/text-btn-arrow.svg" alt="Hire us"></amp-img></a>
                                                         </p>
                                                      </div>
                                                   </li>
                                                </ul>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </li>
                     <li id="menu-item-21886" class="product-megamenu menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-21886">
                        <a>Products</a>
                        <ul class="sub-menu">
                           <li id="menu-item-21918" class="menu-item menu-item-type-yawp_wim menu-item-object-yawp_wim menu-item-21918">
                              <div class="yawp_wim_wrap">
                                 <div class="widget-area">
                                    <div id="block-4" class="yawp_wim_widget widget_block">
                                       <div class="wp-block-group our-product-menu">
                                          <div class="wp-block-group__inner-container">
                                             <div class="our-product-wrapper">
                                                <div class="product-wrapper-left megamenu-left">
                                                   <ul>
                                                      <li>
                                                         <div class="product-detail-box" style="background-image:url('https://www.yudiz.com/wp-content/uploads/2022/08/fansportiz-bg.png')">
                                                            <div>
                                                               <div class="img-box">
                                                                  <amp-img layout="intrinsic" width="245" height="104" src="https://www.yudiz.com/wp-content/uploads/2022/08/fansportiz-logo.svg" alt="fansportiz-logo"></amp-img>
                                                               </div>
                                                               <p>Fantasy Sports Gaming App</p>
                                                            </div>
                                                         </div>
                                                         <div class="product-detail-hoverbox">
                                                            <a target="_blank" href="https://www.fansportiz.com/" class="visitlink">visit</a>
                                                         </div>
                                                      </li>
                                                      <li>
                                                         <div class="product-detail-box" style="background-image:url('https://www.yudiz.com/wp-content/uploads/2022/08/nftiz-bg.png')">
                                                            <div>
                                                               <div class="img-box">
                                                                  <amp-img layout="intrinsic" width="245" height="104" src="https://www.yudiz.com/wp-content/uploads/2022/08/nftiz-logo.svg" alt="nftiz-logo"></amp-img>
                                                               </div>
                                                               <p>Build an excillent NFT marketplace</p>
                                                            </div>
                                                         </div>
                                                         <div class="product-detail-hoverbox">
                                                            <a target="_blank" href="https://nftiz.biz/" class="visitlink">visit</a>
                                                         </div>
                                                      </li>
                                                      <li>
                                                         <div class="product-detail-box" style="background-image:url('https://www.yudiz.com/wp-content/uploads/2022/08/taash-bg.png')">
                                                            <div>
                                                               <div class="img-box">
                                                                  <amp-img layout="intrinsic" width="245" height="104" src="https://www.yudiz.com/wp-content/uploads/2022/08/taash-logo.svg" alt="taash-logo"></amp-img>
                                                               </div>
                                                               <p>A Platform for Rummy Game</p>
                                                            </div>
                                                         </div>
                                                         <div class="product-detail-hoverbox">
                                                            <a target="_blank" href="https://www.taash52games.com/" class="visitlink">visit</a>
                                                         </div>
                                                      </li>
                                                   </ul>
                                                </div>
                                                <div class="product-wrapper-right megamenu-right">
                                                   <ul class="hire-dev-box m-0">
                                                      <li>
                                                         <div class="hire-desc-box">
                                                            <h5>Visit Our Product Pages</h5>
                                                            <p>
                                                               We aim for helping business to scale with innovative products and solutions through synergized approaches and evolving tech.
                                                            </p>
                                                            <p> <a href="https://www.yudiz.com/digital-product-development/" class="linebtn"> Take a quick Trip
                                                                  <amp-img layout="intrinsic" width="28" height="10" src="https://www.yudiz.com/wp-content/uploads/2022/08/text-btn-arrow.svg" alt=""></amp-img></a>
                                                            </p>
                                                         </div>
                                                      </li>
                                                   </ul>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </li>
                     <li id="menu-item-21882" class="menu-item menu-item-type-post_type_archive menu-item-object-portfolio menu-item-21882"><a href="https://www.yudiz.com/portfolio/">Portfolio</a></li>
                     <li id="menu-item-21969" class="dropdown-new-menu menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-21969">
                        <a href="https://www.yudiz.com/investor-relations/">Investor</a>
                        <ul class="sub-menu">
                           <li id="menu-item-24439" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-24439"><a href="https://www.yudiz.com/prospectus/">DRHP</a></li>
                           <li id="menu-item-24381" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-24381"><a href="#">Financial Statements</a>
                              <ul class="sub-menu">
                                 <li id="menu-item-24382" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24382"><a href="#">Stanalone Financial Results</a></li>
                                 <li id="menu-item-24383" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24383"><a href="#">Consolidated Financial Results</a></li>
                                 <li id="menu-item-24384" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24384"><a href="#">Annual Report</a></li>
                                 <li id="menu-item-24385" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24385"><a href="#">Annual Return</a></li>
                              </ul>
                           </li>
                           <li id="menu-item-24386" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24386"><a href="https://www.yudiz.com/assets/investor/shareholdingpatterns.pdf">Shareholding Pattern</a></li>
                           <li id="menu-item-24387" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-24387"><a href="#">Holding Company</a>
                              <ul class="sub-menu">
                                 <li id="menu-item-24388" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24388"><a href="#">Ability Games Limited</a></li>
                              </ul>
                           </li>
                           <li id="menu-item-24389" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-24389"><a href="#">Boards</a>
                              <ul class="sub-menu">
                                 <li id="menu-item-24390" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24390"><a href="#">Board Meeting Notice</a></li>
                                 <li id="menu-item-24391" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24391"><a href="#">Outcome of Board Meeting</a></li>
                                 <li id="menu-item-24392" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24392"><a href="#">Newspaper Advertisment</a></li>
                              </ul>
                           </li>
                           <li id="menu-item-24393" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-24393"><a href="#">Corporate Governance</a>
                              <ul class="sub-menu">
                                 <li id="menu-item-24394" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24394"><a href="https://www.yudiz.com/assets/investor/directors-and-key-managerial-persons-kmp.pdf">Directors
                                       &#038; Key Managerial Persons (KMP)</a></li>
                                 <li id="menu-item-24395" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24395"><a href="https://www.yudiz.com/assets/investor/Commitees.pdf">Composition of Committees</a></li>
                                 <li id="menu-item-24396" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24396"><a href="https://www.yudiz.com/code-of-conduct/">Code of Conduct</a></li>
                                 <li id="menu-item-24397" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24397"><a href="#">Secretarial Compliance Report</a></li>
                                 <li id="menu-item-24398" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24398"><a href="https://www.yudiz.com/policies/">Policies</a></li>
                                 <li id="menu-item-24399" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24399"><a href="https://www.yudiz.com/assets/investor/familiarization-program-for-independent-directors.pdf">Familiarization
                                       Program for Independent Directors</a></li>
                              </ul>
                           </li>
                           <li id="menu-item-24400" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24400"><a href="#">Shareholder Information</a></li>
                           <li id="menu-item-24401" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-24401"><a href="#">Investor Contacts</a>
                              <ul class="sub-menu">
                                 <li id="menu-item-24402" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24402"><a href="#">Registrar and Share Transfer Agents</a></li>
                                 <li id="menu-item-24403" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24403"><a href="#">Company Contact</a></li>
                                 <li id="menu-item-24404" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24404"><a href="#">Investors Grievance</a></li>
                              </ul>
                           </li>
                           <li id="menu-item-24405" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-24405"><a href="#">Other Disclosure</a></li>
                           <li id="menu-item-24406" class="investor-tagline menu-item menu-item-type-custom menu-item-object-custom menu-item-24406"><a>The contact
                                 details of persons authorized for determining materiality of an event or information.</a></li>
                        </ul>
                     </li>
                     <li id="menu-item-21884" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21884"><a href="https://blog.yudiz.com/">Blog</a></li>
                     <li id="menu-item-21883" class="career-menu menu-item menu-item-type-post_type_archive menu-item-object-join-our-team menu-item-21883"><a href="https://www.yudiz.com/join-our-team/">Career</a></li>
                  </ul>
               </div>
            </div>
            <div class="header-contactus theme-btn solid-blue">
               <a href="https://www.yudiz.com/get-in-touch/">Let’s Talk</a>
            </div>
         </div>
      </div>
      <div class="visible-xs visible-sm new-mobile-menu-wrapper">
         <div class="main-header mobile-nav-header">
            <div class="primary-logo">
               <a href="https://www.yudiz.com"><amp-img layout="intrinsic" width="150" height="38" src="https://www.yudiz.com/wp-content/uploads/2022/07/yudiz-logo-ltd.svg" alt="logo"></amp-img></a>
            </div>
            <div role="button" class="sidebar-open-btn" on="tap:sidebar">
               <div class="overlay-head-icon">
                  <div class="burger-main mobile-menu-icon">
                     <div class="burger-inner">
                        <span class="top"></span>
                        <span class="mid"></span>
                        <span class="bot"></span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
   <amp-sidebar id="sidebar" class="new-mobile-menu-wrapper" layout="nodisplay">
      <div class="mobile-nav-block main-header mobile-nav-header">
         <a href="<?php echo home_url(); ?>">
            <figure><amp-img layout="intrinsic" width="28" height="28" src="<?php echo get_template_directory_uri(); ?>/images/mn-home.svg" alt="yudiz menu icon"></amp-img></figure>
         </a>
         <a href="<?php echo home_url(); ?>">
            <figure><amp-img layout="intrinsic" width="150" height="36" src="<?php echo $image[0]; ?>" alt="yudiz menu logo"></amp-img></figure>
         </a>
         <div role="button" on="tap:sidebar.close" aria-label="close sidebar" class="close-menu">
            <figure><amp-img layout="intrinsic" width="36" height="36" src="<?php echo get_template_directory_uri(); ?>/images/mn-close.svg" alt="yudiz menu icon"></amp-img></figure>
         </div>
      </div>
      <nav id="mobile-menu-nav" class="new-mobile-menu-wrapper">
         <?php wp_nav_menu(array("theme_location" =>   "mobile-menu")) ?>
         <?php //if (function_exists(clean_custom_menus())) clean_custom_menus(); 
         ?>
      </nav>
   </amp-sidebar>
   <!-- .site-header -->
   <!-- banner section Start -->
   <section class="dedicated-banner-section">
      <img class="hire-dedicated-banner-img" src="<?php echo get_stylesheet_directory_uri() ?>/images/dedicated-banner.jpg" alt="Dedicated-Banner">
      <div class="banner-text-box">
         <h1 class="common-gap mid-h1">Trust our Synergy, Hire dedicated developers with Top-Notch Development Expertise.</h1>
         <p class="common-gap">We promise your success by our timeless methodologies. Hire dedicated resources that are highly skilled and leverage our vast technological diversity to meet your unique business requirements. </p>
         <div class="theme-btn solid-blue text-center">
            <a href="#contact-amp-form">Get a Quote</a>
         </div>
      </div>
   </section>
   <!-- banner section ends -->
   <!-- Client Slider Section -->
   <section class="client-logo-new-section">
      <div class="container">
         <div class="common-section">
            <div class="ourclient-title">
               <h6>BADGE WE PROUDLY WEAR</h6>
               <h2>Clients Our Team Served</h2>
            </div>
            <amp-base-carousel loop="true" height="200" layout="fixed-height" auto-advance="true" auto-advance-interval="3000" visible-count="(min-width: 992px) 4, (min-width: 768px) 3,  (min-width: 400px) 2,1" advance-count="(min-width: 1150px) 3, (min-width: 700px) 2, 1">
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2022/03/mpl-logo-1.png" alt="MPL" /></figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/10/zydus.png" alt="Zydus" /></figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/10/wfp.png" alt="WFP" /></figure>
               </div>
               <div>
                  <figure>
                     <img src="https://www.yudiz.com/wp-content/uploads/2019/10/vibrant_gujrat.png" alt="Vibrant Gujarat" />
                  </figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/10/ucmas.png" alt="UCMAS" /></figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/10/shemaroo.png" alt="shemaroo" /></figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/10/nec.png" alt="NEC" /></figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/10/ketchapp.png" alt="Ketchapp" /></figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/10/havas-media.png" alt="Havas Media" /></figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/10/groupon.png" alt="Groupon" /></figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/10/dangee_dums.png" alt="Dangee Dums" /></figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/10/cera.png" alt="Cera" /></figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/06/11-wickets.png" alt="11 Wickets" /></figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/10/allen.png" alt="Allen" /></figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/06/ubisoft.png" alt="Ubisoft" /></figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/06/tv18.png" alt="TV18" /></figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/06/money-control-1.png" alt="Money Control" /></figure>
               </div>
               <div>
                  <figure><img src="https://www.yudiz.com/wp-content/uploads/2019/06/nestle.png" alt="Nestle" /></figure>
               </div>
            </amp-base-carousel>
         </div>
      </div>
   </section>
   <!-- Experties Section Start -->
   <div class="common-section experties-tab-section secondary-bg">
      <div class="container">
         <div class="row">
            <div class="col-sm-8">
               <h6>We are</h6>
               <h2>Experts In</h2>
            </div>
         </div>
         <div class="custom-saperator"></div>
         <div class="experties-content-box">
            <div class="row">
               <div class="col-md-4">
                  <div class="tabs-nav-box">
                     <amp-selector class="tabs-with-selector" role="tablist" on="select:myTabPanels.toggle(index=event.targetOption, value=true)" keyboard-select-mode="focus">
                        <div class="tab-amp-nav-li" id="sample3-tab1" role="tab" aria-controls="sample3-tabpanel1" option="0" selected>
                           <img src="https://www.yudiz.com/wp-content/uploads/2022/10/ic_blockchain.svg" alt="blockchain-dev" /> Blockchain Development
                        </div>
                        <div class="tab-amp-nav-li" id="sample3-tab2" role="tab" aria-controls="sample3-tabpanel2" option="1">
                           <img src="https://www.yudiz.com/wp-content/uploads/2022/10/ic_game_dev.svg" alt="blockchain-dev" /> Game Development
                        </div>
                        <div class="tab-amp-nav-li" id="sample3-tab3" role="tab" aria-controls="sample3-tabpanel3" option="2">
                           <img src="https://www.yudiz.com/wp-content/uploads/2022/10/ic_app_dev.svg" alt="blockchain-dev" /> Mobile App Development
                        </div>
                        <div class="tab-amp-nav-li" id="sample3-tab4" role="tab" aria-controls="sample3-tabpanel4" option="3">
                           <img src="https://www.yudiz.com/wp-content/uploads/2022/10/ic_ai-1.svg" alt="blockchain-dev" /> AI/ML Development
                        </div>
                        <div class="tab-amp-nav-li" id="sample3-tab5" role="tab" aria-controls="sample3-tabpanel5" option="4">
                           <img src="https://www.yudiz.com/wp-content/uploads/2022/10/ic_ARVR.svg" alt="blockchain-dev" /> AR/VR Development
                        </div>
                        <div class="tab-amp-nav-li" id="sample3-tab6" role="tab" aria-controls="sample3-tabpanel6" option="5">
                           <img src="https://www.yudiz.com/wp-content/uploads/2022/10/ic_web_dev.svg" alt="blockchain-dev" /> Website Development
                        </div>
                        <div class="tab-amp-nav-li" id="sample3-tab7" role="tab" aria-controls="sample3-tabpanel7" option="6">
                           <img src="https://www.yudiz.com/wp-content/uploads/2022/10/ic_design.svg" alt="blockchain-dev" /> UI/UX Design
                        </div>
                     </amp-selector>
                  </div>
               </div>
               <div class="col-md-8">
                  <section class="experties-tabs-content">
                     <amp-selector id="myTabPanels" class="tabpanels">
                        <div class="tab-content-box" id="sample3-tabpanel1" role="tabpanel" aria-labelledby="sample3-tab1" option selected>
                           <div style="height: 100%; display: flex; flex-direction: column;">
                              <div>
                                 <h3><a href="https://www.yudiz.com/blockchain-development/">Blockchain Development </a></h3>
                                 <p>We are here to modernize the traditional way of payment process. Yudiz is a leading blockchain app development company offering solutions to various industry niches.</p>
                                 <ul class="experties-tab-list">
                                    <li>Smart Contracts Development</li>
                                    <li>Crypto Exchange Development</li>
                                    <li>Blockchain App Consultation</li>
                                    <li>Crypto Wallet Development</li>
                                    <li>Hyperledger Based Solutions</li>
                                    <li>IEO &amp; ICO Services</li>
                                 </ul>
                                 <ul class="experties-tab-technology">
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/blockchain-dev-1.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/blockchain-dev-1.svg" alt="Blockchain Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/blockchain-dev-2.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/blockchain-dev-2.svg" alt="Blockchain Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/blockchain-dev-3.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/blockchain-dev-3.svg" alt="Blockchain Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/blockchain-dev-4.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/blockchain-dev-4.svg" alt="Blockchain Development"></li>
                                 </ul>
                              </div>
                              <div class="theme-btn solid-blue" style="margin-top: auto; margin-bottom: 0;">
                                 <a href="https://www.yudiz.com/blockchain-development/"> Explore Blockchain Development </a>
                              </div>
                           </div>
                        </div>
                        <div class="tab-content-box" id="sample3-tabpanel2" role="tabpanel" aria-labelledby="sample3-tab2" option>
                           <div style="height: 100%; display: flex; flex-direction: column;">
                              <div>
                                 <h3><a href="https://www.yudiz.com/game-development/">Game Development </a></h3>
                                 <p>Yudiz is an experienced mobile game development company incorporating skilled game developers resourceful to offer custom built game development solutions.</p>
                                 <ul class="experties-tab-list">
                                    <li>Unity Game Development</li>
                                    <li>2D &amp; 3D Game Development</li>
                                    <li>iOS Game Development</li>
                                    <li>HTML5 Game Development</li>
                                    <li>Android Game Development</li>
                                 </ul>
                                 <ul class="experties-tab-technology">
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/game-dev-1.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/game-dev-1.svg" alt="Game Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/game-dev-2.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/game-dev-2.svg" alt="Game Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/game-dev-3.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/game-dev-3.svg" alt="Game Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/game-dev-4.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/game-dev-4.svg" alt="Game Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/game-dev-5.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/game-dev-5.svg" alt="Game Development"></li>
                                 </ul>
                              </div>
                              <div class="theme-btn solid-blue" style="margin-top: auto; margin-bottom: 0;">
                                 <a href="https://www.yudiz.com/game-development/"> Explore Game Development </a>
                              </div>
                           </div>
                        </div>
                        <div class="tab-content-box" id="sample3-tabpanel3" role="tabpanel" aria-labelledby="sample3-tab3" option>
                           <div style="height: 100%; display: flex; flex-direction: column;">
                              <div>
                                 <h3><a href="https://www.yudiz.com/mobile-app-development/">Mobile App Development </a></h3>
                                 <p>We have a plethora of experience to provide reliable mobile app development solutions which are high performance and competitively ahead of the curve.</p>
                                 <ul class="experties-tab-list">
                                    <li>iOS App Development</li>
                                    <li>Beacon Apps</li>
                                    <li>Android App Development</li>
                                    <li>React Native Apps</li>
                                    <li>Smart Watch Apps</li>
                                    <li>Mobile Web Apps</li>
                                 </ul>
                                 <ul class="experties-tab-technology">
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/mobile-app-dev-2.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/mobile-app-dev-2.svg" alt="Mobile App Development "></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/mobile-app-dev-1.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/mobile-app-dev-1.svg" alt="Mobile App Development "></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/mobile-app-dev-3.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/mobile-app-dev-3.svg" alt="Mobile App Development "></li>
                                 </ul>
                              </div>
                              <div class="theme-btn solid-blue" style="margin-top: auto; margin-bottom: 0;">
                                 <a href="https://www.yudiz.com/mobile-app-development/"> Explore Mobile App Development </a>
                              </div>
                           </div>
                        </div>
                        <div class="tab-content-box" id="sample3-tabpanel4" role="tabpanel" aria-labelledby="sample3-tab4" option>
                           <div style="height: 100%; display: flex; flex-direction: column;">
                              <div>
                                 <h3><a href="https://www.yudiz.com/artificial-intelligence/">AI/ML Development </a></h3>
                                 <p>Yudiz utilizes state of the art technology to offer the best Artificial Intelligence and Machine learning solutions. We comprise a dedicated team that excels in AI/ML based research and development.</p>
                                 <ul class="experties-tab-list">
                                    <li>AI-Based Solutions</li>
                                    <li>Intelligent Recommendation Engine</li>
                                    <li>Chatbot Development</li>
                                    <li>Voice-based AI</li>
                                    <li>Business Process Automation</li>
                                    <li>Computer Vision</li>
                                 </ul>
                                 <ul class="experties-tab-technology">
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/ai-ml-dev-new-1.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/ai-ml-dev-new-1.svg" alt="AI/ML Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/ai-ml-dev-new-2.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/ai-ml-dev-new-2.svg" alt="AI/ML Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/ai-ml-dev-new-3.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/ai-ml-dev-new-3.svg" alt="AI/ML Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/ai-ml-dev-new-4.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/ai-ml-dev-new-4.svg" alt="AI/ML Development"></li>
                                 </ul>
                              </div>
                              <div class="theme-btn solid-blue" style="margin-top: auto; margin-bottom: 0;">
                                 <a href="https://www.yudiz.com/artificial-intelligence/"> Explore AI/ML Development </a>
                              </div>
                           </div>
                        </div>
                        <div class="tab-content-box" id="sample3-tabpanel5" role="tabpanel" aria-labelledby="sample3-tab5" option>
                           <div style="height: 100%; display: flex; flex-direction: column;">
                              <div>
                                 <h3><a href="https://www.yudiz.com/ar-vr-development/">AR/VR Development </a></h3>
                                 <p>We have wisely invested our valuable resources and adept manpower for introducing possibly the best Augmented Reality and unique Virtual Reality solutions to these modern markets.</p>
                                 <ul class="experties-tab-list">
                                    <li>VR &amp; AR Game</li>
                                    <li>Interactive Virtual Experiences</li>
                                    <li>Virtual Tour Application</li>
                                    <li>AR Application</li>
                                    <li>Kids &amp; Educational Apps and Games</li>
                                    <li>Interactive Walls &amp; Floor</li>
                                 </ul>
                                 <ul class="experties-tab-technology">
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/ar-vr-new-1.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/ar-vr-new-1.svg" alt="AR/VR Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/ar-vr-new-2.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/ar-vr-new-2.svg" alt="AR/VR Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/ar-vr-new-3.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/ar-vr-new-3.svg" alt="AR/VR Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/ar-vr-new-4.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/ar-vr-new-4.svg" alt="AR/VR Development"></li>
                                 </ul>
                              </div>
                              <div class="theme-btn solid-blue" style="margin-top: auto; margin-bottom: 0;">
                                 <a href="https://www.yudiz.com/ar-vr-development/"> Explore AR/VR Development </a>
                              </div>
                           </div>
                        </div>
                        <div class="tab-content-box" id="sample3-tabpanel6" role="tabpanel" aria-labelledby="sample3-tab6" option>
                           <div style="height: 100%; display: flex; flex-direction: column;">
                              <div>
                                 <h3><a href="https://www.yudiz.com/web-development/">Website Development </a></h3>
                                 <p>Yudiz empowers your digital transformation journey through practically advanced and clever methodologies. Employe our scalable website development solutions to grow efficiently globally.</p>
                                 <ul class="experties-tab-list">
                                    <li>Custom Web Applications Development</li>
                                    <li>Progressive Web Apps</li>
                                    <li>REST API Development</li>
                                    <li>Mobile Web Apps</li>
                                    <li>Opensource Framework Experts</li>
                                 </ul>
                                 <ul class="experties-tab-technology">
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/website-dev-1.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/website-dev-1.svg" alt="Website Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/website-dev-2.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/website-dev-2.svg" alt="Website Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/website-dev-3.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/website-dev-3.svg" alt="Website Development"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/website-dev-4.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/website-dev-4.svg" alt="Website Development"></li>
                                 </ul>
                              </div>
                              <div class="theme-btn solid-blue" style="margin-top: auto; margin-bottom: 0;">
                                 <a href="https://www.yudiz.com/web-development/"> Explore Website Development </a>
                              </div>
                           </div>
                        </div>
                        <div class="tab-content-box" id="sample3-tabpanel7" role="tabpanel" aria-labelledby="sample7-tab7" option>
                           <div style="height: 100%; display: flex; flex-direction: column;">
                              <div>
                                 <h3><a href="https://www.yudiz.com/ui-ux-design/">UI/UX Design </a></h3>
                                 <p>Yudiz empowers your digital transformation journey through practically advanced and clever methodologies. Employe our scalable website development solutions to grow efficiently globally.</p>
                                 <ul class="experties-tab-list">
                                    <li>Graphic Designing</li>
                                    <li>Branding</li>
                                    <li>User Interface</li>
                                    <li>Responsive Design</li>
                                    <li>UX Design</li>
                                    <li>Design Language</li>
                                 </ul>
                                 <ul class="experties-tab-technology">
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/ui-ux-dev-1.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/ui-ux-dev-1.svg" alt="UI/UX Design"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/ui-ux-dev-2.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/ui-ux-dev-2.svg" alt="UI/UX Design"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/ui-ux-dev-4.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/ui-ux-dev-4.svg" alt="UI/UX Design"></li>
                                    <li><img class="" src="https://www.yudiz.com/wp-content/uploads/2022/09/ui-ux-dev-3.svg" data-lzy_src="https://www.yudiz.com/wp-content/uploads/2022/09/ui-ux-dev-3.svg" alt="UI/UX Design"></li>
                                 </ul>
                              </div>
                              <div class="theme-btn solid-blue" style="margin-top: auto; margin-bottom: 0;">
                                 <a href="https://www.yudiz.com/ui-ux-design/"> Explore UI/UX Design </a>
                              </div>
                           </div>
                        </div>
                     </amp-selector>
                  </section>
               </div>
            </div>
         </div>

      </div>
   </div>
   <!--Experties Section End -->
   <!-- =========== 4d what we do section start ================ -->
   <section class="fd-what-we-do-section common-section secondary-bg">
      <div class="container">
         <h4 class="text-center">
            4Ds what we do
         </h4>
         <div class="custom-saperator"></div>
         <div class="custom-saperator"></div>
         <div class="row">
            <div class="col-md-3 fd-what-we-do-wrapper">
               <img src="https://www.yudiz.com/wp-content/uploads/2022/09/Design-icon.svg" alt="fd-what-we-do-icon" />
               <h5>Design</h5>
               <p>We understand every design we create holds a unique value and aspires to profitably meet our client’s ideal purpose and business goals.</p>
            </div>
            <div class="col-md-3 fd-what-we-do-wrapper">
               <img src="https://www.yudiz.com/wp-content/uploads/2022/09/development-icon.svg" alt="fd-what-we-do-icon" />
               <h5>Development</h5>
               <p>We fabricate scalable solutions from scratch. Our development experts practice comprehensive research tactics that give us a competitive edge. </p>
            </div>
            <div class="col-md-3 fd-what-we-do-wrapper">
               <img src="https://www.yudiz.com/wp-content/uploads/2022/09/deployement-tool.svg" alt="fd-what-we-do-icon" />
               <h5>Deployment</h5>
               <p>We consider every minor as well as major practical and theoretical repercussions to carry out rigorously planned deployment of your solutions and products.</p>
            </div>
            <div class="col-md-3 fd-what-we-do-wrapper">
               <img src="https://www.yudiz.com/wp-content/uploads/2022/09/debugging-icon.svg" alt="fd-what-we-do-icon" />
               <h5>Debugging</h5>
               <p>We acknowledge that debugging helps in improving our methodologies, solutions, and products to attain a proficient result that is worth our clients’ time and money.</p>
            </div>
         </div>
      </div>
   </section>
   <!-- =========== 4d what we do section End ================ -->
   <!-- Hire now section starts -->
   <section class="hire-now-section">
      <div class="hire-now-wrap">
         <div class="hire-now-content text-center">
            <h6>Looking for Creative and Optimistic Individuals?</h6>
            <h2>Hire Dedicated Resources</h2>
            <div class="wpb_raw_code wpb_content_element wpb_raw_html theme-btn bordered-white text-center">
               <div class="wpb_wrapper">
                  <a href="#contact-amp-form">Hire now</a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Hire now section ends -->
   <!-- Hire process section starts -->
   <section class="hire-process-section common-section pb-0">
      <div class="hire-process-title-box ">
         <div class="container">
            <div class="row">
               <div class="col-sm-8">
                  <h6>Hire Reliability and Experience</h6>
                  <h2>Our Proficient Workflow </h2>
               </div>
            </div>
         </div>
      </div>
      <div class="custom-saperator"></div>
      <div class="hire-process-tree-box">
         <div class="container  ">
            <div class="process-tree-content d-flex flex-wrap">
               <div class="hire-process-tree">
                  <div class="process-number-wrap">
                     <div class="process-number-box align-center">
                        <h4>01</h4>
                     </div>
                  </div>
                  <div class="process-description">
                     <p>Clients Clarifying <br /> Requirements </p>
                  </div>
               </div>
               <div class="hire-process-tree">
                  <div class="process-number-wrap">
                     <div class="process-number-box align-center">
                        <h4>02</h4>
                     </div>
                  </div>
                  <div class="process-description">
                     <p>Approaching <br />the Idea</p>
                  </div>
               </div>
               <div class="hire-process-tree">
                  <div class="process-number-wrap">
                     <div class="process-number-box align-center">
                        <h4>03</h4>
                     </div>
                  </div>
                  <div class="process-description">
                     <p>Addressing <br /> Challenges</p>
                  </div>
               </div>
               <div class="hire-process-tree">
                  <div class="process-number-wrap">
                     <div class="process-number-box align-center">
                        <h4>04</h4>
                     </div>
                  </div>
                  <div class="process-description">
                     <p>Assembling<br /> Resources</p>
                  </div>
               </div>
               <div class="hire-process-tree">
                  <div class="process-number-wrap">
                     <div class="process-number-box align-center">
                        <h4>05</h4>
                     </div>
                  </div>
                  <div class="process-description">
                     <p>Developing <br /> Solution</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Hire process section ends -->
   <!-- Hire process section starts -->
   <section class="technology-dev-sec" style="background: url('<?php echo home_url('/wp-content/uploads/2022/09/technology-dev-banner.jpg'); ?>') no-repeat;">
      <div class="container">
         <h4>Our Technological Trunk</h4>
      </div>
   </section>
   <section class="payment-partner-sec">
      <div class="container">
         <div class="payment-partner-blk">
            <div class="payment-partner-logos">
               <ul>
                  <li><amp-img width="150" height="46" layout="intrinsic" src="<?php echo home_url('/wp-content/uploads/2022/09/shippo-logo.svg'); ?>" /></li>
                  <li><amp-img width="179" height="39" layout="intrinsic" src="<?php echo home_url('/wp-content/uploads/2022/09/bringg-logo.svg'); ?>" /></li>
                  <li><amp-img width="150" height="38" layout="intrinsic" src="<?php echo home_url('/wp-content/uploads/2022/09/paypal-logo.svg'); ?>" /></li>
                  <li><amp-img width="100" height="42" layout="intrinsic" src="<?php echo home_url('/wp-content/uploads/2022/09/stripe-logo.svg'); ?>" /></li>
                  <li><amp-img width="80" height="48" layout="intrinsic" src="<?php echo home_url('/wp-content/uploads/2022/09/aws-logo.svg'); ?>" /></li>
               </ul>
            </div>
         </div>
      </div>
   </section>
   <!-- Hire process section ends -->
   <!-- Hire-Dev Why choose us section start -->
   <section class="hire-dev-why-choose-us common-section">
      <div class="container">
         <div class="row">
            <div class="col-md-4 hire-why-choose-content">
               <div class="hire-why-choose-content-heading">
                  <h4>Why choose<br /> Us</h4>
                  <p>Our dedicated development team is a community of exceptionally versatile people, a merge of amazingly experienced leaders and young fresh innovators. We provide scalable solutions utilizing state of the art technology through collaborative approach.</p>
               </div>
            </div>
            <div class="col-md-8 hire-why-choose-content">
               <div class="hire-why-choose-desc-box">
                  <ul>
                     <li>
                        <div class="hire-dedi-techno-box">
                           <div class="amp-img-why-choose-section">
                              <amp-img layout="intrinsic" width="120px" height="120px" src="https://www.yudiz.com/wp-content/uploads/2022/11/our-vision-hire.svg"></amp-img>
                           </div>
                           <div class="hire-dedic-dev-desc-box">
                              <h5>Our Vision</h5>
                              <p>We want to be a notable contributor in this rapidly evolving world of technology.</p>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="hire-dedi-techno-box">
                           <div class="amp-img-why-choose-section">
                              <amp-img layout="intrinsic" width="120px" height="120px" src="https://www.yudiz.com/wp-content/uploads/2022/11/clever-management.svg"></amp-img>
                           </div>
                           <div class="hire-dedic-dev-desc-box">
                              <h5>Clever Management</h5>
                              <p>We make use of every crucial strategy and technologies to increase our operational performance.</p>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="hire-dedi-techno-box">
                           <div class="amp-img-why-choose-section">
                              <amp-img layout="intrinsic" width="120px" height="120px" src="https://www.yudiz.com/wp-content/uploads/2022/11/high-reliability.svg"></amp-img>
                           </div>
                           <div class="hire-dedic-dev-desc-box">
                              <h5>High Reliability</h5>
                              <p>Our robust tech-based business tactics ensure high reliability output to our clientele.</p>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="hire-dedi-techno-box">
                           <div class="amp-img-why-choose-section">
                              <amp-img layout="intrinsic" width="120px" height="120px" src="https://www.yudiz.com/wp-content/uploads/2022/11/smart-innovation.svg"></amp-img>
                           </div>
                           <div class="hire-dedic-dev-desc-box">
                              <h5>Smart Innovation</h5>
                              <p>Our smart innovations adapts cutting-edge technologies and modern methodologies.</p>
                           </div>
                        </div>
                     </li>
                  </ul>
                  <div class="hire-reso-logo-img">
                     <amp-img width="180px" height="180px" layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/10/hire-res-logo-img.svg"></amp-img>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </section>
   <!-- Hire-Dev Why choose us section End -->
   <!-- ********** ============ Hiring models Css =========== ************* -->
   <section class="hiring-model-amp-section common-section">
      <div class="container">
         <h3>Hiring Models</h3>
         <div class="custom-saperator"></div>
         <div class="hiring-model-amp-content">
            <div class="row">
               <div class="col-md-4 col-sm-6 hiring-model-amp-box">
                  <div class="hiring-model-amp-wrapper" style="border-color:#7B4689;">
                     <h5>Full Time</h5>
                     <h5 class="price-box-amp">160 <span>hrs/month</span></h5>
                     <p>8hrs/Day</p>
                     <div class="hiring-amp-saperetor"></div>
                     <p>Agile Methodology</p>
                     <p>Basecamp & Jira Project Tracking Tools</p>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6 hiring-model-amp-box">
                  <div class="hiring-model-amp-wrapper" style="border-color:#1DB281;">
                     <h5>Part Time</h5>
                     <h5 class="price-box-amp">80 <span>hrs/month</span></h5>
                     <p>4hrs/Day</p>
                     <div class="hiring-amp-saperetor"></div>
                     <p>Agile Methodology</p>
                     <p>Basecamp & Jira Project Tracking Tools</p>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6 hiring-model-amp-box">
                  <div class="hiring-model-amp-wrapper" style="border-color:#FF942D;">
                     <h5>Hourly Basis</h5>
                     <h5 class="price-box-amp">Custom <span>Plan</span></h5>
                     <p>Per Hours</p>
                     <div class="hiring-amp-saperetor"></div>
                     <p>Agile Methodology</p>
                     <p>Basecamp & Jira Project Tracking Tools</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="custom-saperator"></div>
         <div class="theme-btn solid-blue text-center">
            <a href="#contact-amp-form">Hire Now</a>
         </div>
      </div>
   </section>
   <!-- ********** ============ Hiring models Css =========== ************* -->
   <!-- Testimonials Section Start -->
   <div class="common-section home-testimonial-section secondary-bg">
      <div class="container">
         <div class="row">
            <div class="col-sm-8">
               <h6>What Our Clients Say</h6>
               <h2>Testimonials</h2>
            </div>
         </div>
         <div class="custom-saperator"></div>
         <div class="home-testimonial-content">
            <div>
               <amp-base-carousel loop="true" height="380" layout="fixed-height" auto-advance="true" auto-advance-interval="3000" visible-count="(min-width: 992px) 2, 1" advance-count="1">
                  <div>
                     <div class="client-testimony-box">
                        <h5 class="client-name-box">Ruby L. Evans</h5>
                        <h6 class="client-country-name">Australia</h6>
                        <p>“We aspire to create and retain customers for the foreseeable future with effective communication and proper resolution of their issues. We extend reliable and flexible services to ensure utmost satisfaction for our end clients.”</p>
                     </div>
                  </div>
                  <div>
                     <div class="client-testimony-box">
                        <h5 class="client-name-box">Matt Perper</h5>
                        <h6 class="client-country-name">USA</h6>
                        <p>“They’ve been resourceful, transparent and organized with their workflow throughout the whole process. They are highly passionate in their respective field, utilize advanced tools and provide researched backed solutions accordingly.”</p>
                     </div>
                  </div>
                  <div>
                     <div class="client-testimony-box">
                        <h5 class="client-name-box">Fadi Shaya</h5>
                        <h6 class="client-country-name">Kuwait</h6>
                        <p>“The company is happy with Yudiz Solutions’ work. The team quickly fixes all issues and delivers tasks according to the client’s requirements. Their support services are highly professional, and they meet deadlines and are highly responsive.”</p>
                     </div>
                  </div>
                  <div>
                     <div class="client-testimony-box">
                        <h5 class="client-name-box">Zakaria Al-Tokally</h5>
                        <h6 class="client-country-name">Saudi Arabia</h6>
                        <p>“Delivering high-quality native apps and software, Yudiz Solutions Ltd. staff communicates over multiple channels. Their professionalism is augmented by an ability to incorporate emerging technologies including AR and VR. Their management is also notable.”</p>
                     </div>
                  </div>
               </amp-base-carousel>
            </div>
         </div>
      </div>
   </div>
   <!-- Testimonial Section End -->
   <!-- Hire now section starts -->
   <section class="hire-now-section">
      <div class="hire-now-wrap" style="background-image:url('<?php echo home_url('/wp-content/uploads/2022/10/cta-hire-dev-amp.webp') ?>');">
         <div class="hire-now-content text-center">
            <h6>Looking for Confident and Orignative Individuals?</h6>
            <h2>Hire Dedicated Developers</h2>
            <div class="wpb_raw_code wpb_content_element wpb_raw_html theme-btn bordered-white text-center">
               <div class="wpb_wrapper">
                  <a href="#contact-amp-form">Hire now</a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Hire now section ends -->
   <!-- FAQ Section Start -->
   <section class="faq-amp-section common-section">
      <div class="container">
         <h3>Frequently asked questions</h3>
         <div class="custom-saperator"></div>
         <amp-accordion class="sample accordion" expand-single-section animate>
            <section expanded>
               <h4>
                  <dt>
                     <p>
                        1. How can you hire our dedicated resources?
                     </p>
                  </dt>
               </h4>
               <dd>
                  <ul>
                     <li>List the number of tasks that our dedicated resources need to follow.</li>
                     <li>Select your preferred technology resources and developers. </li>
                     <li>Draft a final proposal with our expert sales team.</li>
                     <li>Successfully provide confirmation.</li>
                     <li>Rest easy, we will establish an efficient operational condition for you to connect with the developers.</li>
                  </ul>
               </dd>
            </section>
            <section>
               <h4>
                  <dt>
                     <p>
                        2. What will be the cost of developing a product or solutions?
                     </p>
                  </dt>
               </h4>
               <dd>We charge reasonably for product development based on the kind of engagement you need. We offer fixed cost, T&M, and even other engagement models that fit in with your convenience in delivering a satisfying business experience with our scalable products and solutions. </dd>
            </section>
            <section>
               <h4>
                  <dt>
                     <p>
                        3. Can I hire dedicated developers for every industry niche and segment?
                     </p>
                  </dt>
               </h4>
               <dd>Yes. You can hire dedicated developers for every industry niche as we offer scalable solutions and product development in various industrial segments such as Metaverse, Game & Blockchain development. We have AI/ML, AR/VR experts as well as UI/UX designers. </dd>
            </section>
            <section>
               <h4>
                  <dt>
                     <p>
                        4. How long does it take to complete a dedicated development project?
                     </p>
                  </dt>
               </h4>
               <dd>Every Industrial solution and product comes with its own set of complexities and complications. Our dedicated development team divides the process in phase following agile methodology that ensures our commitment to deliver the best developing experience. Our skilled developers ensure that the projects get done on time. On a general basis the process usually takes about 3 months to one year.</dd>
            </section>
            <section>
               <h4>
                  <dt>
                     <p>
                        5. How do we overcome challenges and execute impeccable experience?
                     </p>
                  </dt>
               </h4>
               <dd>Our Agile methodology focuses on constantly staying in touch with the clients requirements. We prepare a Plan of Action (POA) that ensures tailoring picture perfect solutions. Our core ethos is always to aim for a scalable solution through implementing collaborative approaches. </dd>
            </section>
         </amp-accordion>
      </div>
   </section>
   <!-- Hire Form section -->
   <!-- Hire now section starts -->
   <section id="contact-amp-form" class="hire-now-section hire-form-section">
      <div class="common-section" style="background-image:url('<?php echo home_url('/wp-content/uploads/2022/12/background-image-for-hire-dedicated-developers.jpg') ?>');">
         <div class="hire-now-content text-center">
            <h6>Looking for Confident and Orignative Individuals?</h6>
            <h4>Our Unrivaled Solutions, Your Unstoppable Success.</h4>
         </div>
      </div>
   </section>
   <!-- Hire now section ends -->
   <section class="common-section amp-form-section">
      <div class="container">
         <div class="row">
            <div class="col-md-10 col-md-offset-1">
               <form id="HIREform" class="sample-form" method="post" action-xhr="<?php echo get_stylesheet_directory_uri() . "/template/hire-dedicated-page.php"; ?>" target="_top" custom-validation-reporting="show-all-on-submit" on="submit-success:AMP.setState({ state: {currentValue: ''}})">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="name">Full Name</label>
                           <input class="form-control" placeholder="your full name" type="text" id="show-all-on-submit-name" name="data-to-save[name]" required [value]="state.currentValue">
                           <span visible-when-invalid="valueMissing" validation-for="show-all-on-submit-name">Please enter your full name!</span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="email">Email</label>
                           <input class="form-control" type="email" id="show-all-on-submit-email" placeholder="your Email" name="data-to-save[email]" required [value]="state.currentValue">
                           <span visible-when-invalid="valueMissing" validation-for="show-all-on-submit-email">Please enter your email!</span>
                           <span visible-when-invalid="typeMismatch" validation-for="show-all-on-submit-email"></span>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="phone">Phone Number</label>
                           <input class="form-control" type="tel" name="data-to-save[phone]" placeholder="your Phone" id="show-all-on-submit-phone" required [value]="state.currentValue">
                           <span visible-when-invalid="valueMissing" validation-for="show-all-on-submit-phone">Please enter your phone number!</span>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="message">Message</label>
                           <textarea class="form-control" placeholder="Tell us about your idea" name="data-to-save[message]" autoexpand [text]="state.currentValue"></textarea>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="theme-btn solid-blue text-center">
                           <button name="cstm_submit" type="submit">Submit</button>
                        </div>
                     </div>
                  </div>
                  <amp-recaptcha-input layout="nodisplay" name="recaptcha_token" data-sitekey="6Le3aGQjAAAAABbQLrm36jtW6gV61sJE82Vpa5kh" data-action="recaptcha_example">
                  </amp-recaptcha-input>
                  <div submit-success>
                     <template type="amp-mustache">
                        {{success_msg}}
                     </template>
                  </div>
                  <div submit-error>
                     <template type="amp-mustache">
                        {{error_msg}}
                     </template>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>
   <!-- Form Section -->
   <!-- FAQ Section End  -->
   <!-- Footer Section -->
   <footer id="colophon" class="site-footer new-footer">
      <div class="container">
         <div class="row">
            <div class="col-md-12 ">
               <div class="footer-content">
                  <div class="row">
                     <div class="col-md-3">
                        <div class="footer-logo">
                           <amp-img width="191" height="50px" layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/07/yudiz-ltd-white-logo.svg" alt="Yudiz Solutions Ltd."></amp-img>
                        </div>
                        <div class="footer-company-text">
                           <aside id="text-2" class="widget widget_text">
                              <div class="textwidget">
                                 <p>Yudiz is the leading Metaverse, Game, and Blockchain development company providing cost-effective and sustainable solutions through state-of-the-art technology on global level.</p>
                              </div>
                           </aside>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="row">
                           <div class="footer-address-block">
                              <aside id="custom_html-7" class="widget_text widget widget_custom_html">
                                 <div class="textwidget custom-html-widget">
                                    <div class="col-sm-6 col-md-5">
                                       <p class="amp-location-img"><amp-img layout="intrinsic" width="28px" height="20px" src="https://www.yudiz.com/wp-content/themes/yudiz/images/footer-country-flag.svg" alt="footer-country-flag"></p>
                                       <p></amp-img><strong>India-HQ</strong></p>
                                       <p>13th Floor, Bsquare 2,<br> Iscon-Ambli Road,<br> Ahmedabad, Gujarat -380054
                                       </p>
                                    </div>
                                    <div class="col-sm-6 col-md-5">
                                       <p class="amp-location-img"><amp-img layout="intrinsic" width="28px" height="20px" src="https://www.yudiz.com/wp-content/themes/yudiz/images/footer-country-flag.svg" alt="footer-country-flag"></amp-img></p>
                                       <p><strong>India</strong></p>
                                       <p>12th Floor 1207, Time Square 1,<br class="n-desktop" /> Thaltej - Shilaj Rd,<br>Ahmedabad, Gujarat - 380059
                                       </p>
                                    </div>
                                 </div>
                              </aside>
                           </div>
                        </div>
                        <!-- <h6 class="footer-item-title-new"><strong>Quick Links</strong></h6> -->
                        <!--  -->
                     </div>
                     <div class="col-md-3">
                        <div class="footer-contact-new-text">
                           <h6 class="footer-item-title-new"><strong>Starts a Conversation</strong></h6>
                           <aside id="custom_html-2" class="widget_text widget widget_custom_html">
                              <div class="textwidget custom-html-widget">
                                 <ul>
                                    <li>Email: <a href="mailto:contact@yudiz.com">contact@yudiz.com</a></li>
                                    <li>Call For Sales: <a href="tel:+917433977525">+91 7433977525</a></li>
                                    <li>Call For HR: <a href="tel:+917874400606">+91 7874400606</a></li>
                                    <li>Skype: <a href="skype:-yudizsolutions-?chat">yudizsolutions</a></li>
                                 </ul>
                              </div>
                           </aside>
                        </div>
                     </div>
                  </div>
                  <div class="footer-row-new">
                     <div class="row" style="display:flex; flex-wrap:wrap;">
                        <div class="col-md-8 col-sm-12">
                           <div class="footer-links-box">
                              <div class="row">
                                 <div class="col-sm-4">
                                    <div>
                                       <h6 class="footer-item-title-new"><strong>About</strong></h6>
                                       <div class="new-footer-link">
                                          <div class="menu-footer-about-links-container">
                                             <ul id="menu-footer-about-links" class="menu">
                                                <li id="menu-item-21934" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-21934">
                                                   <a href="https://www.yudiz.com/company/">Our Company</a>
                                                </li>
                                                <li id="menu-item-21930" class="menu-item menu-item-type-post_type_archive menu-item-object-join-our-team menu-item-21930">
                                                   <a href="https://www.yudiz.com/join-our-team/">Careers</a>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                    <div>
                                       <h6 class="footer-item-title-new"><strong>Insights</strong></h6>
                                       <div class="new-footer-link">
                                          <div class="menu-footer-resources-links-container">
                                             <ul id="menu-footer-resources-links" class="menu">
                                                <li id="menu-item-21954" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21954">
                                                   <a href="https://blog.yudiz.com/">Blog</a>
                                                </li>
                                                <li id="menu-item-23455" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23455">
                                                   <a href="https://www.yudiz.com/newsroom/">Press
                                                      Releases</a>
                                                </li>
                                                <li id="menu-item-21957" class="menu-item menu-item-type-post_type_archive menu-item-object-case-study menu-item-21957">
                                                   <a href="https://www.yudiz.com/case-study/">Case
                                                      Study</a>
                                                </li>
                                                <li id="menu-item-22598" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-22598">
                                                   <a href="https://www.yudiz.com/investor-relations/">Investors</a>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-5">
                                    <div>
                                       <h6 class="footer-item-title-new"><strong>Solutions</strong></h6>
                                       <div class="new-footer-link">
                                          <div class="menu-footer-service-link-container">
                                             <ul id="menu-footer-service-link" class="menu">
                                                <li id="menu-item-25470" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25470">
                                                   <a href="https://www.yudiz.com/game-development/">Game
                                                      Development</a>
                                                </li>
                                                <li id="menu-item-25471" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25471">
                                                   <a href="https://www.yudiz.com/blockchain-development/">Blockchain
                                                      Development</a>
                                                </li>
                                                <li id="menu-item-25473" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25473">
                                                   <a href="https://www.yudiz.com/web-development/">Website
                                                      Development</a>
                                                </li>
                                                <li id="menu-item-25474" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25474">
                                                   <a href="https://www.yudiz.com/mobile-app-development/">Mobile
                                                      App Development</a>
                                                </li>
                                                <li id="menu-item-25475" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25475">
                                                   <a href="https://www.yudiz.com/ar-vr-development/">AR/VR
                                                      Development</a>
                                                </li>
                                                <li id="menu-item-25476" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25476">
                                                   <a href="https://www.yudiz.com/artificial-intelligence/">Artificial
                                                      Intelligence</a>
                                                </li>
                                                <li id="menu-item-25477" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-25477">
                                                   <a href="https://www.yudiz.com/ui-ux-design/">UI/UX</a>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-3">
                                    <div>
                                       <h6 class="footer-item-title-new"><strong>Industries</strong></h6>
                                       <div class="new-footer-link">
                                          <div class="menu-footer-industries-links-container">
                                             <ul id="menu-footer-industries-links" class="menu">
                                                <li id="menu-item-23461" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23461">
                                                   <a href="https://www.yudiz.com/healthcare-app-development/">Healthcare</a>
                                                </li>
                                                <li id="menu-item-23457" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23457">
                                                   <a href="https://www.yudiz.com/fantasy-app-development/">Fantasy
                                                      App</a>
                                                </li>
                                                <li id="menu-item-23462" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23462">
                                                   <a href="https://www.yudiz.com/hrms-software-development/">Human
                                                      Resource</a>
                                                </li>
                                                <li id="menu-item-23464" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23464">
                                                   <a href="https://www.yudiz.com/social-media-app-development/">Social
                                                      Media</a>
                                                </li>
                                                <li id="menu-item-23459" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23459">
                                                   <a href="https://www.yudiz.com/food-delivery-app-development/">F&#038;B</a>
                                                </li>
                                                <li id="menu-item-23458" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23458">
                                                   <a href="https://www.yudiz.com/fintech-app-development/">Fintech
                                                      App</a>
                                                </li>
                                                <li id="menu-item-23460" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23460">
                                                   <a href="https://www.yudiz.com/gaming-app-development/">Gaming</a>
                                                </li>
                                                <li id="menu-item-23456" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23456">
                                                   <a href="https://www.yudiz.com/education-app-development/">Education</a>
                                                </li>
                                                <li id="menu-item-23463" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23463">
                                                   <a href="https://www.yudiz.com/on-demand-app-development/">On
                                                      Demand</a>
                                                </li>
                                                <li id="menu-item-23465" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-23465">
                                                   <a href="https://www.yudiz.com/supply-chain-app-development/">Supply
                                                      Chain</a>
                                                </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4 col-sm-7 footer-form-box">
                           <h6 class="footer-item-title-new form-footer-title"><strong>Talk to our experts</strong>
                           </h6>
                           <p>Reach to us, we will reach you to the solutions.</p>
                           <form id="FooterAMPForm" class="sample-form" method="post" action-xhr="<?php echo get_stylesheet_directory_uri() . "/template/hire-dedicated-page.php"; ?>" target="_top" custom-validation-reporting="show-all-on-submit" on="submit-success:AMP.setState({ state: {currentValue: ''}})">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <input class="form-control" placeholder="Name" type="text" id="show-all-on-submit-name-footer" name="data-to-save[name]" required [value]="state.currentValue">
                                       <span visible-when-invalid="valueMissing" validation-for="show-all-on-submit-name-footer">Please enter your full name!</span>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <input class="form-control" type="email" id="show-all-on-submit-email-footer" placeholder="Email" name="data-to-save[email]" required [value]="state.currentValue">
                                       <span visible-when-invalid="valueMissing" validation-for="show-all-on-submit-email-footer">Please enter your email!</span>
                                       <span visible-when-invalid="typeMismatch" validation-for="show-all-on-submit-email-footer"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <input class="form-control" type="tel" name="data-to-save[phone]" placeholder="Phone" id="show-all-on-submit-phone-footer" required [value]="state.currentValue">
                                       <span visible-when-invalid="valueMissing" validation-for="show-all-on-submit-phone-footer">Please enter your phone number!</span>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <textarea class="form-control" placeholder="Message" name="data-to-save[message]" autoexpand [text]="state.currentValue"></textarea>
                                    </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="theme-btn solid-blue">
                                       <button name="cstm_submit_footer_form" type="submit">Submit</button>
                                    </div>
                                 </div>
                              </div>
                              <amp-recaptcha-input layout="nodisplay" name="recaptcha_token" data-sitekey="6Le3aGQjAAAAABbQLrm36jtW6gV61sJE82Vpa5kh" data-action="recaptcha_example">
                              </amp-recaptcha-input>
                              <div submit-success>
                                 <template type="amp-mustache">
                                    {{success_msg}}
                                 </template>
                              </div>
                              <div submit-error>
                                 <template type="amp-mustache">
                                    {{error_msg}}
                                 </template>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="site-info">
                  <div class="row align-items-center">
                     <div class="col-sm-6 col-md-4">
                        <aside id="text-8" class="widget widget_text">
                           <div class="textwidget">
                              <div class="footer-review-icons footer-company-review">
                                 <a href="https://clutch.co/profile/yudiz-solutions" target="_blank" rel="noopener"><amp-img width="137" height="43" layout="intrinsic" src="https://www.yudiz.com/wp-content/uploads/2022/08/clutch-review-img-.svg" alt="yudiz review" /></a>
                                 <a rel="noopener"><amp-img layout="intrinsic" width="67" height="55" src="https://www.yudiz.com/wp-content/uploads/2019/12/iso-registered.svg" alt="yudiz review" /></a>
                                 <a rel="noopener"><amp-img layout="intrinsic" width="117" height="55" src="https://www.yudiz.com/wp-content/uploads/2022/08/aigf-footer-img.svg" alt="yudiz review"></amp-img></a>
                                 <a href="//www.dmca.com/Protection/Status.aspx?ID=56846f89-3b22-4f6a-9f34-1f99cb931e48" rel="noopener"><amp-img layout="intrinsic" width="107" height="21" src="https://www.yudiz.com/wp-content/uploads/2022/12/dmca_protected_badge.png" alt="yudiz review"></amp-img></a>
                                 <a href="https://www.mobileappdaily.com/directory/top-mobile-app-development-companies/36" rel="noopener"><amp-img layout="intrinsic" width="49" height="49" src="https://www.yudiz.com/wp-content/uploads/2023/05/featured-img-daily-app.png" alt="yudiz review"></amp-img></a>
                              </div>
                           </div>
                        </aside>
                     </div>
                     <div class="col-sm-12 col-md-4 footer-copyright-text text-center"><small>&copy; 2023 Yudiz Solutions Ltd. All Rights Reserved</small></div>
                     <div class="col-sm-6 col-md-4 copyright-social-menu">
                        <div class="menu-copyright-links-container">
                           <ul id="menu-copyright-links" class="menu">
                              <li id="menu-item-17618" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17618"><a href="https://www.yudiz.com/branding-guidelines/">Brand Guidelines</a></li>
                              <li id="menu-item-580" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-580"><a href="https://www.yudiz.com/privacy-policy/">Privacy Policy</a></li>
                           </ul>
                        </div>
                        <div class="menu-social-icon-menu-container">
                           <ul id="menu-social-icon-menu" class="menu">
                              <li id="menu-item-21962" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21962"><a target="_blank" rel="noopener" href="https://www.facebook.com/yudizsolutions"><i class="fab fa-facebook-f"></i></a></li>
                              <li id="menu-item-21963" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21963"><a target="_blank" rel="noopener" href="https://twitter.com/yudizsolutions"><i class="fab fa-twitter"></i></a></li>
                              <li id="menu-item-21964" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21964"><a target="_blank" rel="noopener" href="https://www.linkedin.com/company/yudiz-solutions-ltd"><i class="fab fa-linkedin-in"></i></a></li>
                              <li id="menu-item-21965" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21965"><a href="https://www.instagram.com/yudizsolutions/"><i class="fab fa-instagram"></i></a></li>
                              <li id="menu-item-21966" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21966"><a href="https://www.behance.net/yudizsolutions"><i class="fab fa-behance"></i></a></li>
                              <li id="menu-item-21967" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21967"><a href="https://dribbble.com/yudizsolutions"><i class="fab fa-dribbble"></i></a></li>
                              <li id="menu-item-21968" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-21968"><a href="https://www.youtube.com/channel/UC6rsk0Zqpsd0sESOWHlXuAw"><i class="fab fa-youtube"></i></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- .site-info -->
         </div>
      </div>
      <div id="btn-click">
         <div class="scroll-to-top" id="go-top"></div>
      </div>
      <!-- .scroll-to-top -->
   </footer>
   <!-- .site-footer -->
</body>

</html>
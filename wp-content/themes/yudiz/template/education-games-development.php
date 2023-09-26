<?php
/* Template Name: Education Games Development  */
require '/var/www/html/wp-load.php';
if(!empty($_POST)){
   $domain_url = (isset($_SERVER['HTTPS']) ) ? "https" : "http";
   $domain_url .= "://$_SERVER[HTTP_HOST]";
   $posted_data = ( isset( $_POST['data-to-save'] ) && ! empty ( $_POST['data-to-save'] )  ) ? $_POST['data-to-save'] : false ;
   $has_error = false;
   $resp_msg = "";
     
   if(  $posted_data !==  false ){
      
      if( ! filter_var($posted_data['email'], FILTER_VALIDATE_EMAIL)  ){
         $has_error = true;
         $resp_msg = "Email address is not valid!";
      }
   }
   if( $has_error === true ){
      /* Return Error*/   
      header("Content-type: application/json");
      header("Access-Control-Allow-Origin: ". str_replace('.', '-',"$domain_url") .".cdn.ampproject.org");
      header("AMP-Access-Control-Allow-Source-Origin: " . $domain_url);
      header("HTTP/1.0 412 Precondition Failed", true, 412);
      $data = array('error_msg'=> $resp_msg);
      echo json_encode($data); exit;
   }
   $captcha=$_POST['recaptcha_token'];
$response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Le3aGQjAAAAAMEBENgZTuere_FNQTQ3e26_dCbO&response=".$captcha . "&remoteip=".$_SERVER['REMOTE_ADDR']), true);  if($response['success'] == false){
      //echo '<h2>You are spammer ! Get the @$%K out</h2>';
      $has_error = true;
      $resp_msg = "Invalid Captcha! Try again!";
   }
   if( $has_error === true ){
      /* Return Error*/   
      header("Content-type: application/json");
      header("Access-Control-Allow-Origin: ". str_replace('.', '-',"$domain_url") .".cdn.ampproject.org");
      header("AMP-Access-Control-Allow-Source-Origin: " . $domain_url);
      header("HTTP/1.0 412 Precondition Failed", true, 412);
      $data = array('error_msg'=> $resp_msg);
      echo json_encode($data); exit;
   }else{
      $store_data['name'] = sanitize_text_field($posted_data['name']);
      $store_data['email'] = sanitize_email($posted_data['email']);
      $store_data['phone'] = sanitize_text_field($posted_data['phone']);
      $store_data['message'] = sanitize_textarea_field($posted_data['message']);
      $store_data['ip'] = $_SERVER['REMOTE_ADDR'];
      $serialized_array = serialize( $store_data );
     // Gather post data.
      $my_post = array(
         'post_type'     => 'yswp_amp_data',
         'post_title'    => $store_data['email'],
         'post_content'  => $serialized_array,
         'post_status'   => 'publish'
      );
      // Insert the post into the database.
      $post_id = wp_insert_post( $my_post );
     if( ! is_wp_error(  $post_id  ) ){
         $to = "vishal@yudiz.com,chirag@yudiz.com,nirav@yudiz.com,hiten@yudiz.com,premag@yudiz.com";
         $headers = array('Content-Type: text/html; charset=UTF-8');
         $subject = "Education Game Development PPC";
         $message = "";
         ob_start(); ?>
            <!DOCTYPE html>
            <html lang="en">
            <meta name="keywords" content="" />
					<meta name="description" content="" />
					<meta name="author" content="" />
					<meta charset="utf-8"/>
					<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
					<meta name="viewport" content="width=device-width, initial-scale=1"/>
					<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
					<title><?php echo get_bloginfo( 'name' ); ?> | Education Game Development PPC </title>
					<style type="text/css">
						h1,h2,h3,h4,h5,h6,p { margin: 0; }
						table { border: 0px;}
					</style>
            <body>
               <div>
                  <p><b> Name : </b> <?php echo $store_data['name']?> </p>
                  <p><b> Email : </b> <?php echo $store_data['email']?> </p>
                  <p><b> Phone : </b> <?php echo $store_data['phone']?> </p>
                  <p><b> Message : </b> <?php echo $store_data['message']?> </p>
                  <p><b> Ip : </b> <?php echo $_SERVER['REMOTE_ADDR']?> </p>
               </div>
            </body>
            </html>
         <?php
         $message = ob_get_clean();
         wp_mail( $to, $subject, $message, $headers);
         header("Content-type: application/json");
         header("Access-Control-Allow-Origin: ". str_replace('.', '-',"$domain_url") .".cdn.ampproject.org");
         header("AMP-Access-Control-Allow-Source-Origin: " . $domain_url);
         $data = array('success_msg' => "Thanks for reaching out to us! We'll get back to you in 24 hrs. Explore our website meanwhile!");
         echo json_encode($data); exit;
      }else{
         header("HTTP/1.0 412 Precondition Failed", true, 412);
         header("Content-type: application/json");
         header("Access-Control-Allow-Origin: ". str_replace('.', '-',"$domain_url") .".cdn.ampproject.org");
         header("AMP-Access-Control-Allow-Source-Origin: " . $domain_url);
         $data = array('error_msg'=> $post_id->get_error_message() );
         echo json_encode($data); exit;  
      }
   }
   exit;
}
?>
<!doctype html>
<html ⚡>
<head>
    <meta charset="utf-8">
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
      <link rel="canonical" href="https://amp.dev/documentation/guides-and-tutorials/start/create/basic_markup/">
      <!-- Fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      <link href="https://www.yudiz.com/wp-content/themes/yudiz/css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
      <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
     <!-- Meta -->
     <meta name="description" content="Yudiz Solutions is an educational game development company offers unique cluster of innovative learning loops on a hyper-creative platform.">
     <meta property="og:title" content="Educational Game Development Company | Yudiz Solutions">
     <meta name="robots" content="index,follow">
     <!-- title -->
     <title>Educational Game Development Company | Yudiz Solutions </title>
     <!-- megamenu -->
      <script async custom-element="amp-mega-menu" src="https://cdn.ampproject.org/v0/amp-mega-menu-0.1.js"></script>
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
            <script async custom-element="amp-recaptcha-input" src="https://cdn.ampproject.org/v0/amp-recaptcha-input-0.1.js"></script>

      <!-- Google Optimiser -->
      <script src="https://www.googleoptimize.com/optimize.js?id=OPT-MV32HTT"></script>
      <!-- amp google script -->
     <style amp-boilerplate> body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
      <style amp-custom>
         html { font-family: sans-serif; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; } body { margin: 0; } article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary { display: block; } audio, canvas, progress, video { display: inline-block; vertical-align: baseline; } audio:not([controls]) { display: none; height: 0; } [hidden], template { display: none; } a { background-color: transparent; } a:active, a:hover { outline: 0; } abbr[title] { border-bottom: 1px dotted; } b, strong { font-weight: bold; } dfn { font-style: italic; } h1 { margin: .67em 0; font-size: 2em; } mark { color: #000; background: #ff0; } small { font-size: 80%; } sub, sup { position: relative; font-size: 75%; line-height: 0; vertical-align: baseline; } sup { top: -.5em; } sub { bottom: -.25em; } img { border: 0; } svg:not(:root) { overflow: hidden; } figure { margin: 1em 40px; } hr { height: 0; -webkit-box-sizing: content-box; -moz-box-sizing: content-box; box-sizing: content-box; } pre { overflow: auto; } code, kbd, pre, samp { font-family: monospace, monospace; font-size: 1em; } button, input, optgroup, select, textarea { margin: 0; font: inherit; color: inherit; } button { overflow: visible; } button, select { text-transform: none; } button, html input[type="button"], input[type="reset"], input[type="submit"] { -webkit-appearance: button; cursor: pointer; } button[disabled], html input[disabled] { cursor: default; } button::-moz-focus-inner, input::-moz-focus-inner { padding: 0; border: 0; } input { line-height: normal; } input[type="checkbox"], input[type="radio"] { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; padding: 0; } input[type="number"]::-webkit-inner-spin-button, input[type="number"]::-webkit-outer-spin-button { height: auto; } input[type="search"] { -webkit-box-sizing: content-box; -moz-box-sizing: content-box; box-sizing: content-box; -webkit-appearance: textfield; } input[type="search"]::-webkit-search-cancel-button, input[type="search"]::-webkit-search-decoration { -webkit-appearance: none; } fieldset { padding: .35em .625em .75em; margin: 0 2px; border: 1px solid #c0c0c0; } legend { padding: 0; border: 0; } textarea { overflow: auto; } optgroup { font-weight: bold; } table { border-spacing: 0; border-collapse: collapse; } td, th { padding: 0; } /*! Source: https://github.com/h5bp/html5-boilerplate/blob/master/src/css/main.css */ @media print { *, *:before, *:after { color: #000 !important; text-shadow: none !important; background: transparent !important; -webkit-box-shadow: none !important; box-shadow: none !important; } a, a:visited { text-decoration: underline; } a[href]:after { content: " (" attr(href) ")"; } abbr[title]:after { content: " (" attr(title) ")"; } a[href^="#"]:after, a[href^="javascript:"]:after { content: ""; } pre, blockquote { border: 1px solid #999; page-break-inside: avoid; } thead { display: table-header-group; } tr, img { page-break-inside: avoid; } img { max-width: 100% !important; } p, h2, h3 { orphans: 3; widows: 3; } h2, h3 { page-break-after: avoid; } .navbar { display: none; } .btn > .caret, .dropup > .btn > .caret { border-top-color: #000 !important; } .label { border: 1px solid #000; } .table { border-collapse: collapse !important; } .table td, .table th { background-color: #fff !important; } .table-bordered th, .table-bordered td { border: 1px solid #ddd !important; } } /*@font-face { font-family: 'Glyphicons Halflings'; src: url('../fonts/glyphicons-halflings-regular.eot'); src: url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../fonts/glyphicons-halflings-regular.woff2') format('woff2'), url('../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg'); }*/ .glyphicon { position: relative; top: 1px; display: inline-block; font-family: 'Glyphicons Halflings'; font-style: normal; font-weight: normal; line-height: 1; -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; } .glyphicon-asterisk:before { content: "\002a"; } .glyphicon-plus:before { content: "\002b"; } .glyphicon-euro:before, .glyphicon-eur:before { content: "\20ac"; } .glyphicon-minus:before { content: "\2212"; } .glyphicon-cloud:before { content: "\2601"; } .glyphicon-envelope:before { content: "\2709"; } .glyphicon-pencil:before { content: "\270f"; } .glyphicon-glass:before { content: "\e001"; } .glyphicon-music:before { content: "\e002"; } .glyphicon-search:before { content: "\e003"; } .glyphicon-heart:before { content: "\e005"; } .glyphicon-star:before { content: "\e006"; } .glyphicon-star-empty:before { content: "\e007"; } .glyphicon-user:before { content: "\e008"; } .glyphicon-film:before { content: "\e009"; } .glyphicon-th-large:before { content: "\e010"; } .glyphicon-th:before { content: "\e011"; } .glyphicon-th-list:before { content: "\e012"; } .glyphicon-ok:before { content: "\e013"; } .glyphicon-remove:before { content: "\e014"; } .glyphicon-zoom-in:before { content: "\e015"; } .glyphicon-zoom-out:before { content: "\e016"; } .glyphicon-off:before { content: "\e017"; } .glyphicon-signal:before { content: "\e018"; } .glyphicon-cog:before { content: "\e019"; } .glyphicon-trash:before { content: "\e020"; } .glyphicon-home:before { content: "\e021"; } .glyphicon-file:before { content: "\e022"; } .glyphicon-time:before { content: "\e023"; } .glyphicon-road:before { content: "\e024"; } .glyphicon-download-alt:before { content: "\e025"; } .glyphicon-download:before { content: "\e026"; } .glyphicon-upload:before { content: "\e027"; } .glyphicon-inbox:before { content: "\e028"; } .glyphicon-play-circle:before { content: "\e029"; } .glyphicon-repeat:before { content: "\e030"; } .glyphicon-refresh:before { content: "\e031"; } .glyphicon-list-alt:before { content: "\e032"; } .glyphicon-lock:before { content: "\e033"; } .glyphicon-flag:before { content: "\e034"; } .glyphicon-headphones:before { content: "\e035"; } .glyphicon-volume-off:before { content: "\e036"; } .glyphicon-volume-down:before { content: "\e037"; } .glyphicon-volume-up:before { content: "\e038"; } .glyphicon-qrcode:before { content: "\e039"; } .glyphicon-barcode:before { content: "\e040"; } .glyphicon-tag:before { content: "\e041"; } .glyphicon-tags:before { content: "\e042"; } .glyphicon-book:before { content: "\e043"; } .glyphicon-bookmark:before { content: "\e044"; } .glyphicon-print:before { content: "\e045"; } .glyphicon-camera:before { content: "\e046"; } .glyphicon-font:before { content: "\e047"; } .glyphicon-bold:before { content: "\e048"; } .glyphicon-italic:before { content: "\e049"; } .glyphicon-text-height:before { content: "\e050"; } .glyphicon-text-width:before { content: "\e051"; } .glyphicon-align-left:before { content: "\e052"; } .glyphicon-align-center:before { content: "\e053"; } .glyphicon-align-right:before { content: "\e054"; } .glyphicon-align-justify:before { content: "\e055"; } .glyphicon-list:before { content: "\e056"; } .glyphicon-indent-left:before { content: "\e057"; } .glyphicon-indent-right:before { content: "\e058"; } .glyphicon-facetime-video:before { content: "\e059"; } .glyphicon-picture:before { content: "\e060"; } .glyphicon-map-marker:before { content: "\e062"; } .glyphicon-adjust:before { content: "\e063"; } .glyphicon-tint:before { content: "\e064"; } .glyphicon-edit:before { content: "\e065"; } .glyphicon-share:before { content: "\e066"; } .glyphicon-check:before { content: "\e067"; } .glyphicon-move:before { content: "\e068"; } .glyphicon-step-backward:before { content: "\e069"; } .glyphicon-fast-backward:before { content: "\e070"; } .glyphicon-backward:before { content: "\e071"; } .glyphicon-play:before { content: "\e072"; } .glyphicon-pause:before { content: "\e073"; } .glyphicon-stop:before { content: "\e074"; } .glyphicon-forward:before { content: "\e075"; } .glyphicon-fast-forward:before { content: "\e076"; } .glyphicon-step-forward:before { content: "\e077"; } .glyphicon-eject:before { content: "\e078"; } .glyphicon-chevron-left:before { content: "\e079"; } .glyphicon-chevron-right:before { content: "\e080"; } .glyphicon-plus-sign:before { content: "\e081"; } .glyphicon-minus-sign:before { content: "\e082"; } .glyphicon-remove-sign:before { content: "\e083"; } .glyphicon-ok-sign:before { content: "\e084"; } .glyphicon-question-sign:before { content: "\e085"; } .glyphicon-info-sign:before { content: "\e086"; } .glyphicon-screenshot:before { content: "\e087"; } .glyphicon-remove-circle:before { content: "\e088"; } .glyphicon-ok-circle:before { content: "\e089"; } .glyphicon-ban-circle:before { content: "\e090"; } .glyphicon-arrow-left:before { content: "\e091"; } .glyphicon-arrow-right:before { content: "\e092"; } .glyphicon-arrow-up:before { content: "\e093"; } .glyphicon-arrow-down:before { content: "\e094"; } .glyphicon-share-alt:before { content: "\e095"; } .glyphicon-resize-full:before { content: "\e096"; } .glyphicon-resize-small:before { content: "\e097"; } .glyphicon-exclamation-sign:before { content: "\e101"; } .glyphicon-gift:before { content: "\e102"; } .glyphicon-leaf:before { content: "\e103"; } .glyphicon-fire:before { content: "\e104"; } .glyphicon-eye-open:before { content: "\e105"; } .glyphicon-eye-close:before { content: "\e106"; } .glyphicon-warning-sign:before { content: "\e107"; } .glyphicon-plane:before { content: "\e108"; } .glyphicon-calendar:before { content: "\e109"; } .glyphicon-random:before { content: "\e110"; } .glyphicon-comment:before { content: "\e111"; } .glyphicon-magnet:before { content: "\e112"; } .glyphicon-chevron-up:before { content: "\e113"; } .glyphicon-chevron-down:before { content: "\e114"; } .glyphicon-retweet:before { content: "\e115"; } .glyphicon-shopping-cart:before { content: "\e116"; } .glyphicon-folder-close:before { content: "\e117"; } .glyphicon-folder-open:before { content: "\e118"; } .glyphicon-resize-vertical:before { content: "\e119"; } .glyphicon-resize-horizontal:before { content: "\e120"; } .glyphicon-hdd:before { content: "\e121"; } .glyphicon-bullhorn:before { content: "\e122"; } .glyphicon-bell:before { content: "\e123"; } .glyphicon-certificate:before { content: "\e124"; } .glyphicon-thumbs-up:before { content: "\e125"; } .glyphicon-thumbs-down:before { content: "\e126"; } .glyphicon-hand-right:before { content: "\e127"; } .glyphicon-hand-left:before { content: "\e128"; } .glyphicon-hand-up:before { content: "\e129"; } .glyphicon-hand-down:before { content: "\e130"; } .glyphicon-circle-arrow-right:before { content: "\e131"; } .glyphicon-circle-arrow-left:before { content: "\e132"; } .glyphicon-circle-arrow-up:before { content: "\e133"; } .glyphicon-circle-arrow-down:before { content: "\e134"; } .glyphicon-globe:before { content: "\e135"; } .glyphicon-wrench:before { content: "\e136"; } .glyphicon-tasks:before { content: "\e137"; } .glyphicon-filter:before { content: "\e138"; } .glyphicon-briefcase:before { content: "\e139"; } .glyphicon-fullscreen:before { content: "\e140"; } .glyphicon-dashboard:before { content: "\e141"; } .glyphicon-paperclip:before { content: "\e142"; } .glyphicon-heart-empty:before { content: "\e143"; } .glyphicon-link:before { content: "\e144"; } .glyphicon-phone:before { content: "\e145"; } .glyphicon-pushpin:before { content: "\e146"; } .glyphicon-usd:before { content: "\e148"; } .glyphicon-gbp:before { content: "\e149"; } .glyphicon-sort:before { content: "\e150"; } .glyphicon-sort-by-alphabet:before { content: "\e151"; } .glyphicon-sort-by-alphabet-alt:before { content: "\e152"; } .glyphicon-sort-by-order:before { content: "\e153"; } .glyphicon-sort-by-order-alt:before { content: "\e154"; } .glyphicon-sort-by-attributes:before { content: "\e155"; } .glyphicon-sort-by-attributes-alt:before { content: "\e156"; } .glyphicon-unchecked:before { content: "\e157"; } .glyphicon-expand:before { content: "\e158"; } .glyphicon-collapse-down:before { content: "\e159"; } .glyphicon-collapse-up:before { content: "\e160"; } .glyphicon-log-in:before { content: "\e161"; } .glyphicon-flash:before { content: "\e162"; } .glyphicon-log-out:before { content: "\e163"; } .glyphicon-new-window:before { content: "\e164"; } .glyphicon-record:before { content: "\e165"; } .glyphicon-save:before { content: "\e166"; } .glyphicon-open:before { content: "\e167"; } .glyphicon-saved:before { content: "\e168"; } .glyphicon-import:before { content: "\e169"; } .glyphicon-export:before { content: "\e170"; } .glyphicon-send:before { content: "\e171"; } .glyphicon-floppy-disk:before { content: "\e172"; } .glyphicon-floppy-saved:before { content: "\e173"; } .glyphicon-floppy-remove:before { content: "\e174"; } .glyphicon-floppy-save:before { content: "\e175"; } .glyphicon-floppy-open:before { content: "\e176"; } .glyphicon-credit-card:before { content: "\e177"; } .glyphicon-transfer:before { content: "\e178"; } .glyphicon-cutlery:before { content: "\e179"; } .glyphicon-header:before { content: "\e180"; } .glyphicon-compressed:before { content: "\e181"; } .glyphicon-earphone:before { content: "\e182"; } .glyphicon-phone-alt:before { content: "\e183"; } .glyphicon-tower:before { content: "\e184"; } .glyphicon-stats:before { content: "\e185"; } .glyphicon-sd-video:before { content: "\e186"; } .glyphicon-hd-video:before { content: "\e187"; } .glyphicon-subtitles:before { content: "\e188"; } .glyphicon-sound-stereo:before { content: "\e189"; } .glyphicon-sound-dolby:before { content: "\e190"; } .glyphicon-sound-5-1:before { content: "\e191"; } .glyphicon-sound-6-1:before { content: "\e192"; } .glyphicon-sound-7-1:before { content: "\e193"; } .glyphicon-copyright-mark:before { content: "\e194"; } .glyphicon-registration-mark:before { content: "\e195"; } .glyphicon-cloud-download:before { content: "\e197"; } .glyphicon-cloud-upload:before { content: "\e198"; } .glyphicon-tree-conifer:before { content: "\e199"; } .glyphicon-tree-deciduous:before { content: "\e200"; } .glyphicon-cd:before { content: "\e201"; } .glyphicon-save-file:before { content: "\e202"; } .glyphicon-open-file:before { content: "\e203"; } .glyphicon-level-up:before { content: "\e204"; } .glyphicon-copy:before { content: "\e205"; } .glyphicon-paste:before { content: "\e206"; } .glyphicon-alert:before { content: "\e209"; } .glyphicon-equalizer:before { content: "\e210"; } .glyphicon-king:before { content: "\e211"; } .glyphicon-queen:before { content: "\e212"; } .glyphicon-pawn:before { content: "\e213"; } .glyphicon-bishop:before { content: "\e214"; } .glyphicon-knight:before { content: "\e215"; } .glyphicon-baby-formula:before { content: "\e216"; } .glyphicon-tent:before { content: "\26fa"; } .glyphicon-blackboard:before { content: "\e218"; } .glyphicon-bed:before { content: "\e219"; } .glyphicon-apple:before { content: "\f8ff"; } .glyphicon-erase:before { content: "\e221"; } .glyphicon-hourglass:before { content: "\231b"; } .glyphicon-lamp:before { content: "\e223"; } .glyphicon-duplicate:before { content: "\e224"; } .glyphicon-piggy-bank:before { content: "\e225"; } .glyphicon-scissors:before { content: "\e226"; } .glyphicon-bitcoin:before { content: "\e227"; } .glyphicon-btc:before { content: "\e227"; } .glyphicon-xbt:before { content: "\e227"; } .glyphicon-yen:before { content: "\00a5"; } .glyphicon-jpy:before { content: "\00a5"; } .glyphicon-ruble:before { content: "\20bd"; } .glyphicon-rub:before { content: "\20bd"; } .glyphicon-scale:before { content: "\e230"; } .glyphicon-ice-lolly:before { content: "\e231"; } .glyphicon-ice-lolly-tasted:before { content: "\e232"; } .glyphicon-education:before { content: "\e233"; } .glyphicon-option-horizontal:before { content: "\e234"; } .glyphicon-option-vertical:before { content: "\e235"; } .glyphicon-menu-hamburger:before { content: "\e236"; } .glyphicon-modal-window:before { content: "\e237"; } .glyphicon-oil:before { content: "\e238"; } .glyphicon-grain:before { content: "\e239"; } .glyphicon-sunglasses:before { content: "\e240"; } .glyphicon-text-size:before { content: "\e241"; } .glyphicon-text-color:before { content: "\e242"; } .glyphicon-text-background:before { content: "\e243"; } .glyphicon-object-align-top:before { content: "\e244"; } .glyphicon-object-align-bottom:before { content: "\e245"; } .glyphicon-object-align-horizontal:before { content: "\e246"; } .glyphicon-object-align-left:before { content: "\e247"; } .glyphicon-object-align-vertical:before { content: "\e248"; } .glyphicon-object-align-right:before { content: "\e249"; } .glyphicon-triangle-right:before { content: "\e250"; } .glyphicon-triangle-left:before { content: "\e251"; } .glyphicon-triangle-bottom:before { content: "\e252"; } .glyphicon-triangle-top:before { content: "\e253"; } .glyphicon-console:before { content: "\e254"; } .glyphicon-superscript:before { content: "\e255"; } .glyphicon-subscript:before { content: "\e256"; } .glyphicon-menu-left:before { content: "\e257"; } .glyphicon-menu-right:before { content: "\e258"; } .glyphicon-menu-down:before { content: "\e259"; } .glyphicon-menu-up:before { content: "\e260"; } * { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; } *:before, *:after { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; } html { font-size: 10px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); } body { font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.42857143; color: #333; background-color: #fff; } input, button, select, textarea { font-family: inherit; font-size: inherit; line-height: inherit; } a { color: #337ab7; text-decoration: none; } a:hover, a:focus { color: #23527c; text-decoration: underline; } a:focus { outline: 5px auto -webkit-focus-ring-color; outline-offset: -2px; } figure { margin: 0; } img { vertical-align: middle; } .img-responsive, .thumbnail > img, .thumbnail a > img, .carousel-inner > .item > img, .carousel-inner > .item > a > img { display: block; max-width: 100%; height: auto; } .img-rounded { border-radius: 6px; } .img-thumbnail { display: inline-block; max-width: 100%; height: auto; padding: 4px; line-height: 1.42857143; background-color: #fff; border: 1px solid #ddd; border-radius: 4px; -webkit-transition: all .2s ease-in-out; -o-transition: all .2s ease-in-out; transition: all .2s ease-in-out; } .img-circle { border-radius: 50%; } hr { margin-top: 20px; margin-bottom: 20px; border: 0; border-top: 1px solid #eee; } .sr-only { position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); border: 0; } .sr-only-focusable:active, .sr-only-focusable:focus { position: static; width: auto; height: auto; margin: 0; overflow: visible; clip: auto; } [role="button"] { cursor: pointer; } h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 { font-family: inherit; font-weight: 500; line-height: 1.1; color: inherit; } h1 small, h2 small, h3 small, h4 small, h5 small, h6 small, .h1 small, .h2 small, .h3 small, .h4 small, .h5 small, .h6 small, h1 .small, h2 .small, h3 .small, h4 .small, h5 .small, h6 .small, .h1 .small, .h2 .small, .h3 .small, .h4 .small, .h5 .small, .h6 .small { font-weight: normal; line-height: 1; color: #777; } h1, .h1, h2, .h2, h3, .h3 { margin-top: 20px; margin-bottom: 10px; } h1 small, .h1 small, h2 small, .h2 small, h3 small, .h3 small, h1 .small, .h1 .small, h2 .small, .h2 .small, h3 .small, .h3 .small { font-size: 65%; } h4, .h4, h5, .h5, h6, .h6 { margin-top: 10px; margin-bottom: 10px; } h4 small, .h4 small, h5 small, .h5 small, h6 small, .h6 small, h4 .small, .h4 .small, h5 .small, .h5 .small, h6 .small, .h6 .small { font-size: 75%; } h1, .h1 { font-size: 36px; } h2, .h2 { font-size: 30px; } h3, .h3 { font-size: 24px; } h4, .h4 { font-size: 18px; } h5, .h5 { font-size: 14px; } h6, .h6 { font-size: 12px; } p { margin: 0 0 10px; } .lead { margin-bottom: 20px; font-size: 16px; font-weight: 300; line-height: 1.4; } @media (min-width: 768px) { .lead { font-size: 21px; } } small, .small { font-size: 85%; } mark, .mark { padding: .2em; background-color: #fcf8e3; } .text-left { text-align: left !important; } .text-right { text-align: right; } .text-center { text-align: center; } .text-justify { text-align: justify; } .text-nowrap { white-space: nowrap; } .text-lowercase { text-transform: lowercase; } .text-uppercase { text-transform: uppercase; } .text-capitalize { text-transform: capitalize; } .text-muted { color: #777; } .text-primary { color: #337ab7; } a.text-primary:hover, a.text-primary:focus { color: #286090; } .text-success { color: #3c763d; } a.text-success:hover, a.text-success:focus { color: #2b542c; } .text-info { color: #31708f; } a.text-info:hover, a.text-info:focus { color: #245269; } .text-warning { color: #8a6d3b; } a.text-warning:hover, a.text-warning:focus { color: #66512c; } .text-danger { color: #a94442; } a.text-danger:hover, a.text-danger:focus { color: #843534; } .bg-primary { color: #fff; background-color: #337ab7; } a.bg-primary:hover, a.bg-primary:focus { background-color: #286090; } .bg-success { background-color: #dff0d8; } a.bg-success:hover, a.bg-success:focus { background-color: #c1e2b3; } .bg-info { background-color: #d9edf7; } a.bg-info:hover, a.bg-info:focus { background-color: #afd9ee; } .bg-warning { background-color: #fcf8e3; } a.bg-warning:hover, a.bg-warning:focus { background-color: #f7ecb5; } .bg-danger { background-color: #f2dede; } a.bg-danger:hover, a.bg-danger:focus { background-color: #e4b9b9; } .page-header { padding-bottom: 9px; margin: 40px 0 20px; border-bottom: 1px solid #eee; } ul, ol { margin-top: 0; margin-bottom: 10px; } ul ul, ol ul, ul ol, ol ol { margin-bottom: 0; } .list-unstyled { padding-left: 0; list-style: none; } .list-inline { padding-left: 0; margin-left: -5px; list-style: none; } .list-inline > li { display: inline-block; padding-right: 5px; padding-left: 5px; } dl { margin-top: 0; margin-bottom: 20px; } dt, dd { line-height: 1.42857143; } dt { font-weight: bold; } dd { margin-left: 0; } @media (min-width: 768px) { .dl-horizontal dt { float: left; width: 160px; overflow: hidden; clear: left; text-align: right; text-overflow: ellipsis; white-space: nowrap; } .dl-horizontal dd { margin-left: 180px; } } abbr[title], abbr[data-original-title] { cursor: help; border-bottom: 1px dotted #777; } .initialism { font-size: 90%; text-transform: uppercase; } blockquote { padding: 10px 20px; margin: 0 0 20px; font-size: 17.5px; border-left: 5px solid #eee; } blockquote p:last-child, blockquote ul:last-child, blockquote ol:last-child { margin-bottom: 0; } blockquote footer, blockquote small, blockquote .small { display: block; font-size: 80%; line-height: 1.42857143; color: #777; } blockquote footer:before, blockquote small:before, blockquote .small:before { content: '\2014 \00A0'; } .blockquote-reverse, blockquote.pull-right { padding-right: 15px; padding-left: 0; text-align: right; border-right: 5px solid #eee; border-left: 0; } .blockquote-reverse footer:before, blockquote.pull-right footer:before, .blockquote-reverse small:before, blockquote.pull-right small:before, .blockquote-reverse .small:before, blockquote.pull-right .small:before { content: ''; } .blockquote-reverse footer:after, blockquote.pull-right footer:after, .blockquote-reverse small:after, blockquote.pull-right small:after, .blockquote-reverse .small:after, blockquote.pull-right .small:after { content: '\00A0 \2014'; } address { margin-bottom: 20px; font-style: normal; line-height: 1.42857143; } code, kbd, pre, samp { font-family: Menlo, Monaco, Consolas, "Courier New", monospace; } code { padding: 2px 4px; font-size: 90%; color: #c7254e; background-color: #f9f2f4; border-radius: 4px; } kbd { padding: 2px 4px; font-size: 90%; color: #fff; background-color: #333; border-radius: 3px; -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25); box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .25); } kbd kbd { padding: 0; font-size: 100%; font-weight: bold; -webkit-box-shadow: none; box-shadow: none; } pre { display: block; padding: 9.5px; margin: 0 0 10px; font-size: 13px; line-height: 1.42857143; color: #333; word-break: break-all; word-wrap: break-word; background-color: #f5f5f5; border: 1px solid #ccc; border-radius: 4px; } pre code { padding: 0; font-size: inherit; color: inherit; white-space: pre-wrap; background-color: transparent; border-radius: 0; } .pre-scrollable { max-height: 340px; overflow-y: scroll; } .container { padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; } @media (min-width: 768px) { .container { width: 750px; } } @media (min-width: 992px) { .container { width: 970px; } } @media (min-width: 1200px) { .container { width: 1170px; } } .container-fluid { padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; } .row { margin-right: -15px; margin-left: -15px; } .col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 { position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; } .col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 { float: left; } .col-xs-12 { width: 100%; } .col-xs-11 { width: 91.66666667%; } .col-xs-10 { width: 83.33333333%; } .col-xs-9 { width: 75%; } .col-xs-8 { width: 66.66666667%; } .col-xs-7 { width: 58.33333333%; } .col-xs-6 { width: 50%; } .col-xs-5 { width: 41.66666667%; } .col-xs-4 { width: 33.33333333%; } .col-xs-3 { width: 25%; } .col-xs-2 { width: 16.66666667%; } .col-xs-1 { width: 8.33333333%; } .col-xs-pull-12 { right: 100%; } .col-xs-pull-11 { right: 91.66666667%; } .col-xs-pull-10 { right: 83.33333333%; } .col-xs-pull-9 { right: 75%; } .col-xs-pull-8 { right: 66.66666667%; } .col-xs-pull-7 { right: 58.33333333%; } .col-xs-pull-6 { right: 50%; } .col-xs-pull-5 { right: 41.66666667%; } .col-xs-pull-4 { right: 33.33333333%; } .col-xs-pull-3 { right: 25%; } .col-xs-pull-2 { right: 16.66666667%; } .col-xs-pull-1 { right: 8.33333333%; } .col-xs-pull-0 { right: auto; } .col-xs-push-12 { left: 100%; } .col-xs-push-11 { left: 91.66666667%; } .col-xs-push-10 { left: 83.33333333%; } .col-xs-push-9 { left: 75%; } .col-xs-push-8 { left: 66.66666667%; } .col-xs-push-7 { left: 58.33333333%; } .col-xs-push-6 { left: 50%; } .col-xs-push-5 { left: 41.66666667%; } .col-xs-push-4 { left: 33.33333333%; } .col-xs-push-3 { left: 25%; } .col-xs-push-2 { left: 16.66666667%; } .col-xs-push-1 { left: 8.33333333%; } .col-xs-push-0 { left: auto; } .col-xs-offset-12 { margin-left: 100%; } .col-xs-offset-11 { margin-left: 91.66666667%; } .col-xs-offset-10 { margin-left: 83.33333333%; } .col-xs-offset-9 { margin-left: 75%; } .col-xs-offset-8 { margin-left: 66.66666667%; } .col-xs-offset-7 { margin-left: 58.33333333%; } .col-xs-offset-6 { margin-left: 50%; } .col-xs-offset-5 { margin-left: 41.66666667%; } .col-xs-offset-4 { margin-left: 33.33333333%; } .col-xs-offset-3 { margin-left: 25%; } .col-xs-offset-2 { margin-left: 16.66666667%; } .col-xs-offset-1 { margin-left: 8.33333333%; } .col-xs-offset-0 { margin-left: 0; } @media (min-width: 768px) { .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 { float: left; } .col-sm-12 { width: 100%; } .col-sm-11 { width: 91.66666667%; } .col-sm-10 { width: 83.33333333%; } .col-sm-9 { width: 75%; } .col-sm-8 { width: 66.66666667%; } .col-sm-7 { width: 58.33333333%; } .col-sm-6 { width: 50%; } .col-sm-5 { width: 41.66666667%; } .col-sm-4 { width: 33.33333333%; } .col-sm-3 { width: 25%; } .col-sm-2 { width: 16.66666667%; } .col-sm-1 { width: 8.33333333%; } .col-sm-pull-12 { right: 100%; } .col-sm-pull-11 { right: 91.66666667%; } .col-sm-pull-10 { right: 83.33333333%; } .col-sm-pull-9 { right: 75%; } .col-sm-pull-8 { right: 66.66666667%; } .col-sm-pull-7 { right: 58.33333333%; } .col-sm-pull-6 { right: 50%; } .col-sm-pull-5 { right: 41.66666667%; } .col-sm-pull-4 { right: 33.33333333%; } .col-sm-pull-3 { right: 25%; } .col-sm-pull-2 { right: 16.66666667%; } .col-sm-pull-1 { right: 8.33333333%; } .col-sm-pull-0 { right: auto; } .col-sm-push-12 { left: 100%; } .col-sm-push-11 { left: 91.66666667%; } .col-sm-push-10 { left: 83.33333333%; } .col-sm-push-9 { left: 75%; } .col-sm-push-8 { left: 66.66666667%; } .col-sm-push-7 { left: 58.33333333%; } .col-sm-push-6 { left: 50%; } .col-sm-push-5 { left: 41.66666667%; } .col-sm-push-4 { left: 33.33333333%; } .col-sm-push-3 { left: 25%; } .col-sm-push-2 { left: 16.66666667%; } .col-sm-push-1 { left: 8.33333333%; } .col-sm-push-0 { left: auto; } .col-sm-offset-12 { margin-left: 100%; } .col-sm-offset-11 { margin-left: 91.66666667%; } .col-sm-offset-10 { margin-left: 83.33333333%; } .col-sm-offset-9 { margin-left: 75%; } .col-sm-offset-8 { margin-left: 66.66666667%; } .col-sm-offset-7 { margin-left: 58.33333333%; } .col-sm-offset-6 { margin-left: 50%; } .col-sm-offset-5 { margin-left: 41.66666667%; } .col-sm-offset-4 { margin-left: 33.33333333%; } .col-sm-offset-3 { margin-left: 25%; } .col-sm-offset-2 { margin-left: 16.66666667%; } .col-sm-offset-1 { margin-left: 8.33333333%; } .col-sm-offset-0 { margin-left: 0; } } @media (min-width: 992px) { .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 { float: left; } .col-md-12 { width: 100%; } .col-md-11 { width: 91.66666667%; } .col-md-10 { width: 83.33333333%; } .col-md-9 { width: 75%; } .col-md-8 { width: 66.66666667%; } .col-md-7 { width: 58.33333333%; } .col-md-6 { width: 50%; } .col-md-5 { width: 41.66666667%; } .col-md-4 { width: 33.33333333%; } .col-md-3 { width: 25%; } .col-md-2 { width: 16.66666667%; } .col-md-1 { width: 8.33333333%; } .col-md-pull-12 { right: 100%; } .col-md-pull-11 { right: 91.66666667%; } .col-md-pull-10 { right: 83.33333333%; } .col-md-pull-9 { right: 75%; } .col-md-pull-8 { right: 66.66666667%; } .col-md-pull-7 { right: 58.33333333%; } .col-md-pull-6 { right: 50%; } .col-md-pull-5 { right: 41.66666667%; } .col-md-pull-4 { right: 33.33333333%; } .col-md-pull-3 { right: 25%; } .col-md-pull-2 { right: 16.66666667%; } .col-md-pull-1 { right: 8.33333333%; } .col-md-pull-0 { right: auto; } .col-md-push-12 { left: 100%; } .col-md-push-11 { left: 91.66666667%; } .col-md-push-10 { left: 83.33333333%; } .col-md-push-9 { left: 75%; } .col-md-push-8 { left: 66.66666667%; } .col-md-push-7 { left: 58.33333333%; } .col-md-push-6 { left: 50%; } .col-md-push-5 { left: 41.66666667%; } .col-md-push-4 { left: 33.33333333%; } .col-md-push-3 { left: 25%; } .col-md-push-2 { left: 16.66666667%; } .col-md-push-1 { left: 8.33333333%; } .col-md-push-0 { left: auto; } .col-md-offset-12 { margin-left: 100%; } .col-md-offset-11 { margin-left: 91.66666667%; } .col-md-offset-10 { margin-left: 83.33333333%; } .col-md-offset-9 { margin-left: 75%; } .col-md-offset-8 { margin-left: 66.66666667%; } .col-md-offset-7 { margin-left: 58.33333333%; } .col-md-offset-6 { margin-left: 50%; } .col-md-offset-5 { margin-left: 41.66666667%; } .col-md-offset-4 { margin-left: 33.33333333%; } .col-md-offset-3 { margin-left: 25%; } .col-md-offset-2 { margin-left: 16.66666667%; } .col-md-offset-1 { margin-left: 8.33333333%; } .col-md-offset-0 { margin-left: 0; } } @media (min-width: 1200px) { .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12 { float: left; } .col-lg-12 { width: 100%; } .col-lg-11 { width: 91.66666667%; } .col-lg-10 { width: 83.33333333%; } .col-lg-9 { width: 75%; } .col-lg-8 { width: 66.66666667%; } .col-lg-7 { width: 58.33333333%; } .col-lg-6 { width: 50%; } .col-lg-5 { width: 41.66666667%; } .col-lg-4 { width: 33.33333333%; } .col-lg-3 { width: 25%; } .col-lg-2 { width: 16.66666667%; } .col-lg-1 { width: 8.33333333%; } .col-lg-pull-12 { right: 100%; } .col-lg-pull-11 { right: 91.66666667%; } .col-lg-pull-10 { right: 83.33333333%; } .col-lg-pull-9 { right: 75%; } .col-lg-pull-8 { right: 66.66666667%; } .col-lg-pull-7 { right: 58.33333333%; } .col-lg-pull-6 { right: 50%; } .col-lg-pull-5 { right: 41.66666667%; } .col-lg-pull-4 { right: 33.33333333%; } .col-lg-pull-3 { right: 25%; } .col-lg-pull-2 { right: 16.66666667%; } .col-lg-pull-1 { right: 8.33333333%; } .col-lg-pull-0 { right: auto; } .col-lg-push-12 { left: 100%; } .col-lg-push-11 { left: 91.66666667%; } .col-lg-push-10 { left: 83.33333333%; } .col-lg-push-9 { left: 75%; } .col-lg-push-8 { left: 66.66666667%; } .col-lg-push-7 { left: 58.33333333%; } .col-lg-push-6 { left: 50%; } .col-lg-push-5 { left: 41.66666667%; } .col-lg-push-4 { left: 33.33333333%; } .col-lg-push-3 { left: 25%; } .col-lg-push-2 { left: 16.66666667%; } .col-lg-push-1 { left: 8.33333333%; } .col-lg-push-0 { left: auto; } .col-lg-offset-12 { margin-left: 100%; } .col-lg-offset-11 { margin-left: 91.66666667%; } .col-lg-offset-10 { margin-left: 83.33333333%; } .col-lg-offset-9 { margin-left: 75%; } .col-lg-offset-8 { margin-left: 66.66666667%; } .col-lg-offset-7 { margin-left: 58.33333333%; } .col-lg-offset-6 { margin-left: 50%; } .col-lg-offset-5 { margin-left: 41.66666667%; } .col-lg-offset-4 { margin-left: 33.33333333%; } .col-lg-offset-3 { margin-left: 25%; } .col-lg-offset-2 { margin-left: 16.66666667%; } .col-lg-offset-1 { margin-left: 8.33333333%; } .col-lg-offset-0 { margin-left: 0; } } table { background-color: transparent; } caption { padding-top: 8px; padding-bottom: 8px; color: #777; text-align: left; } th { text-align: left; } .table { width: 100%; max-width: 100%; margin-bottom: 20px; } .table > thead > tr > th, .table > tbody > tr > th, .table > tfoot > tr > th, .table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td { padding: 8px; line-height: 1.42857143; vertical-align: top; border-top: 1px solid #ddd; } .table > thead > tr > th { vertical-align: bottom; border-bottom: 2px solid #ddd; } .table > caption + thead > tr:first-child > th, .table > colgroup + thead > tr:first-child > th, .table > thead:first-child > tr:first-child > th, .table > caption + thead > tr:first-child > td, .table > colgroup + thead > tr:first-child > td, .table > thead:first-child > tr:first-child > td { border-top: 0; } .table > tbody + tbody { border-top: 2px solid #ddd; } .table .table { background-color: #fff; } .table-condensed > thead > tr > th, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > tbody > tr > td, .table-condensed > tfoot > tr > td { padding: 5px; } .table-bordered { border: 1px solid #ddd; } .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td { border: 1px solid #ddd; } .table-bordered > thead > tr > th, .table-bordered > thead > tr > td { border-bottom-width: 2px; } .table-striped > tbody > tr:nth-of-type(odd) { background-color: #f9f9f9; } .table-hover > tbody > tr:hover { background-color: #f5f5f5; } table col[class*="col-"] { position: static; display: table-column; float: none; } table td[class*="col-"], table th[class*="col-"] { position: static; display: table-cell; float: none; } .table > thead > tr > td.active, .table > tbody > tr > td.active, .table > tfoot > tr > td.active, .table > thead > tr > th.active, .table > tbody > tr > th.active, .table > tfoot > tr > th.active, .table > thead > tr.active > td, .table > tbody > tr.active > td, .table > tfoot > tr.active > td, .table > thead > tr.active > th, .table > tbody > tr.active > th, .table > tfoot > tr.active > th { background-color: #f5f5f5; } .table-hover > tbody > tr > td.active:hover, .table-hover > tbody > tr > th.active:hover, .table-hover > tbody > tr.active:hover > td, .table-hover > tbody > tr:hover > .active, .table-hover > tbody > tr.active:hover > th { background-color: #e8e8e8; } .table > thead > tr > td.success, .table > tbody > tr > td.success, .table > tfoot > tr > td.success, .table > thead > tr > th.success, .table > tbody > tr > th.success, .table > tfoot > tr > th.success, .table > thead > tr.success > td, .table > tbody > tr.success > td, .table > tfoot > tr.success > td, .table > thead > tr.success > th, .table > tbody > tr.success > th, .table > tfoot > tr.success > th { background-color: #dff0d8; } .table-hover > tbody > tr > td.success:hover, .table-hover > tbody > tr > th.success:hover, .table-hover > tbody > tr.success:hover > td, .table-hover > tbody > tr:hover > .success, .table-hover > tbody > tr.success:hover > th { background-color: #d0e9c6; } .table > thead > tr > td.info, .table > tbody > tr > td.info, .table > tfoot > tr > td.info, .table > thead > tr > th.info, .table > tbody > tr > th.info, .table > tfoot > tr > th.info, .table > thead > tr.info > td, .table > tbody > tr.info > td, .table > tfoot > tr.info > td, .table > thead > tr.info > th, .table > tbody > tr.info > th, .table > tfoot > tr.info > th { background-color: #d9edf7; } .table-hover > tbody > tr > td.info:hover, .table-hover > tbody > tr > th.info:hover, .table-hover > tbody > tr.info:hover > td, .table-hover > tbody > tr:hover > .info, .table-hover > tbody > tr.info:hover > th { background-color: #c4e3f3; } .table > thead > tr > td.warning, .table > tbody > tr > td.warning, .table > tfoot > tr > td.warning, .table > thead > tr > th.warning, .table > tbody > tr > th.warning, .table > tfoot > tr > th.warning, .table > thead > tr.warning > td, .table > tbody > tr.warning > td, .table > tfoot > tr.warning > td, .table > thead > tr.warning > th, .table > tbody > tr.warning > th, .table > tfoot > tr.warning > th { background-color: #fcf8e3; } .table-hover > tbody > tr > td.warning:hover, .table-hover > tbody > tr > th.warning:hover, .table-hover > tbody > tr.warning:hover > td, .table-hover > tbody > tr:hover > .warning, .table-hover > tbody > tr.warning:hover > th { background-color: #faf2cc; } .table > thead > tr > td.danger, .table > tbody > tr > td.danger, .table > tfoot > tr > td.danger, .table > thead > tr > th.danger, .table > tbody > tr > th.danger, .table > tfoot > tr > th.danger, .table > thead > tr.danger > td, .table > tbody > tr.danger > td, .table > tfoot > tr.danger > td, .table > thead > tr.danger > th, .table > tbody > tr.danger > th, .table > tfoot > tr.danger > th { background-color: #f2dede; } .table-hover > tbody > tr > td.danger:hover, .table-hover > tbody > tr > th.danger:hover, .table-hover > tbody > tr.danger:hover > td, .table-hover > tbody > tr:hover > .danger, .table-hover > tbody > tr.danger:hover > th { background-color: #ebcccc; } .table-responsive { min-height: .01%; overflow-x: auto; } @media screen and (max-width: 767px) { .table-responsive { width: 100%; margin-bottom: 15px; overflow-y: hidden; -ms-overflow-style: -ms-autohiding-scrollbar; border: 1px solid #ddd; } .table-responsive > .table { margin-bottom: 0; } .table-responsive > .table > thead > tr > th, .table-responsive > .table > tbody > tr > th, .table-responsive > .table > tfoot > tr > th, .table-responsive > .table > thead > tr > td, .table-responsive > .table > tbody > tr > td, .table-responsive > .table > tfoot > tr > td { white-space: nowrap; } .table-responsive > .table-bordered { border: 0; } .table-responsive > .table-bordered > thead > tr > th:first-child, .table-responsive > .table-bordered > tbody > tr > th:first-child, .table-responsive > .table-bordered > tfoot > tr > th:first-child, .table-responsive > .table-bordered > thead > tr > td:first-child, .table-responsive > .table-bordered > tbody > tr > td:first-child, .table-responsive > .table-bordered > tfoot > tr > td:first-child { border-left: 0; } .table-responsive > .table-bordered > thead > tr > th:last-child, .table-responsive > .table-bordered > tbody > tr > th:last-child, .table-responsive > .table-bordered > tfoot > tr > th:last-child, .table-responsive > .table-bordered > thead > tr > td:last-child, .table-responsive > .table-bordered > tbody > tr > td:last-child, .table-responsive > .table-bordered > tfoot > tr > td:last-child { border-right: 0; } .table-responsive > .table-bordered > tbody > tr:last-child > th, .table-responsive > .table-bordered > tfoot > tr:last-child > th, .table-responsive > .table-bordered > tbody > tr:last-child > td, .table-responsive > .table-bordered > tfoot > tr:last-child > td { border-bottom: 0; } } fieldset { min-width: 0; padding: 0; margin: 0; border: 0; } legend { display: block; width: 100%; padding: 0; margin-bottom: 20px; font-size: 21px; line-height: inherit; color: #333; border: 0; border-bottom: 1px solid #e5e5e5; } label { display: inline-block; max-width: 100%; margin-bottom: 5px; font-weight: bold; } input[type="search"] { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; } input[type="radio"], input[type="checkbox"] { margin: 4px 0 0; margin-top: 1px \9; line-height: normal; } input[type="file"] { display: block; } input[type="range"] { display: block; width: 100%; } select[multiple], select[size] { height: auto; } input[type="file"]:focus, input[type="radio"]:focus, input[type="checkbox"]:focus { outline: 5px auto -webkit-focus-ring-color; outline-offset: -2px; } output { display: block; padding-top: 7px; font-size: 14px; line-height: 1.42857143; color: #555; } .form-control { display: block; width: 100%; height: 34px; padding: 6px 12px; font-size: 14px; line-height: 1.42857143; color: #555; background-color: #fff; background-image: none; border: 1px solid #ccc; border-radius: 4px; -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075); box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075); -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s; -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s; transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s; } .form-control:focus { border-color: #66afe9; outline: 0; -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6); box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, .6); } .form-control::-moz-placeholder { color: #999; opacity: 1; } .form-control:-ms-input-placeholder { color: #999; } .form-control::-webkit-input-placeholder { color: #999; } .form-control::-ms-expand { background-color: transparent; border: 0; } .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control { background-color: #eee; opacity: 1; } .form-control[disabled], fieldset[disabled] .form-control { cursor: not-allowed; } textarea.form-control { height: auto; } input[type="search"] { -webkit-appearance: none; } @media screen and (-webkit-min-device-pixel-ratio: 0) { input[type="date"].form-control, input[type="time"].form-control, input[type="datetime-local"].form-control, input[type="month"].form-control { line-height: 34px; } input[type="date"].input-sm, input[type="time"].input-sm, input[type="datetime-local"].input-sm, input[type="month"].input-sm, .input-group-sm input[type="date"], .input-group-sm input[type="time"], .input-group-sm input[type="datetime-local"], .input-group-sm input[type="month"] { line-height: 30px; } input[type="date"].input-lg, input[type="time"].input-lg, input[type="datetime-local"].input-lg, input[type="month"].input-lg, .input-group-lg input[type="date"], .input-group-lg input[type="time"], .input-group-lg input[type="datetime-local"], .input-group-lg input[type="month"] { line-height: 46px; } } .form-group { margin-bottom: 15px; } .radio, .checkbox { position: relative; display: block; margin-top: 10px; margin-bottom: 10px; } .radio label, .checkbox label { min-height: 20px; padding-left: 20px; margin-bottom: 0; font-weight: normal; cursor: pointer; } .radio input[type="radio"], .radio-inline input[type="radio"], .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"] { position: absolute; margin-top: 4px \9; margin-left: -20px; } .radio + .radio, .checkbox + .checkbox { margin-top: -5px; } .radio-inline, .checkbox-inline { position: relative; display: inline-block; padding-left: 20px; margin-bottom: 0; font-weight: normal; vertical-align: middle; cursor: pointer; } .radio-inline + .radio-inline, .checkbox-inline + .checkbox-inline { margin-top: 0; margin-left: 10px; } input[type="radio"][disabled], input[type="checkbox"][disabled], input[type="radio"].disabled, input[type="checkbox"].disabled, fieldset[disabled] input[type="radio"], fieldset[disabled] input[type="checkbox"] { cursor: not-allowed; } .radio-inline.disabled, .checkbox-inline.disabled, fieldset[disabled] .radio-inline, fieldset[disabled] .checkbox-inline { cursor: not-allowed; } .radio.disabled label, .checkbox.disabled label, fieldset[disabled] .radio label, fieldset[disabled] .checkbox label { cursor: not-allowed; } .form-control-static { min-height: 34px; padding-top: 7px; padding-bottom: 7px; margin-bottom: 0; } .form-control-static.input-lg, .form-control-static.input-sm { padding-right: 0; padding-left: 0; } .input-sm { height: 30px; padding: 5px 10px; font-size: 12px; line-height: 1.5; border-radius: 3px; } select.input-sm { height: 30px; line-height: 30px; } textarea.input-sm, select[multiple].input-sm { height: auto; } .form-group-sm .form-control { height: 30px; padding: 5px 10px; font-size: 12px; line-height: 1.5; border-radius: 3px; } .form-group-sm select.form-control { height: 30px; line-height: 30px; } .form-group-sm textarea.form-control, .form-group-sm select[multiple].form-control { height: auto; } .form-group-sm .form-control-static { height: 30px; min-height: 32px; padding: 6px 10px; font-size: 12px; line-height: 1.5; } .input-lg { height: 46px; padding: 10px 16px; font-size: 18px; line-height: 1.3333333; border-radius: 6px; } select.input-lg { height: 46px; line-height: 46px; } textarea.input-lg, select[multiple].input-lg { height: auto; } .form-group-lg .form-control { height: 46px; padding: 10px 16px; font-size: 18px; line-height: 1.3333333; border-radius: 6px; } .form-group-lg select.form-control { height: 46px; line-height: 46px; } .form-group-lg textarea.form-control, .form-group-lg select[multiple].form-control { height: auto; } .form-group-lg .form-control-static { height: 46px; min-height: 38px; padding: 11px 16px; font-size: 18px; line-height: 1.3333333; } .has-feedback { position: relative; } .has-feedback .form-control { padding-right: 42.5px; } .form-control-feedback { position: absolute; top: 0; right: 0; z-index: 2; display: block; width: 34px; height: 34px; line-height: 34px; text-align: center; pointer-events: none; } .input-lg + .form-control-feedback, .input-group-lg + .form-control-feedback, .form-group-lg .form-control + .form-control-feedback { width: 46px; height: 46px; line-height: 46px; } .input-sm + .form-control-feedback, .input-group-sm + .form-control-feedback, .form-group-sm .form-control + .form-control-feedback { width: 30px; height: 30px; line-height: 30px; } .has-success .help-block, .has-success .control-label, .has-success .radio, .has-success .checkbox, .has-success .radio-inline, .has-success .checkbox-inline, .has-success.radio label, .has-success.checkbox label, .has-success.radio-inline label, .has-success.checkbox-inline label { color: #3c763d; } .has-success .form-control { border-color: #3c763d; -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075); box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075); } .has-success .form-control:focus { border-color: #2b542c; -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168; box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #67b168; } .has-success .input-group-addon { color: #3c763d; background-color: #dff0d8; border-color: #3c763d; } .has-success .form-control-feedback { color: #3c763d; } .has-warning .help-block, .has-warning .control-label, .has-warning .radio, .has-warning .checkbox, .has-warning .radio-inline, .has-warning .checkbox-inline, .has-warning.radio label, .has-warning.checkbox label, .has-warning.radio-inline label, .has-warning.checkbox-inline label { color: #8a6d3b; } .has-warning .form-control { border-color: #8a6d3b; -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075); box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075); } .has-warning .form-control:focus { border-color: #66512c; -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b; box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #c0a16b; } .has-warning .input-group-addon { color: #8a6d3b; background-color: #fcf8e3; border-color: #8a6d3b; } .has-warning .form-control-feedback { color: #8a6d3b; } .has-error .help-block, .has-error .control-label, .has-error .radio, .has-error .checkbox, .has-error .radio-inline, .has-error .checkbox-inline, .has-error.radio label, .has-error.checkbox label, .has-error.radio-inline label, .has-error.checkbox-inline label { color: #a94442; } .has-error .form-control { border-color: #a94442; -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075); box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075); } .has-error .form-control:focus { border-color: #843534; -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483; box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483; } .has-error .input-group-addon { color: #a94442; background-color: #f2dede; border-color: #a94442; } .has-error .form-control-feedback { color: #a94442; } .has-feedback label ~ .form-control-feedback { top: 25px; } .has-feedback label.sr-only ~ .form-control-feedback { top: 0; } .help-block { display: block; margin-top: 5px; margin-bottom: 10px; color: #737373; } @media (min-width: 768px) { .form-inline .form-group { display: inline-block; margin-bottom: 0; vertical-align: middle; } .form-inline .form-control { display: inline-block; width: auto; vertical-align: middle; } .form-inline .form-control-static { display: inline-block; } .form-inline .input-group { display: inline-table; vertical-align: middle; } .form-inline .input-group .input-group-addon, .form-inline .input-group .input-group-btn, .form-inline .input-group .form-control { width: auto; } .form-inline .input-group > .form-control { width: 100%; } .form-inline .control-label { margin-bottom: 0; vertical-align: middle; } .form-inline .radio, .form-inline .checkbox { display: inline-block; margin-top: 0; margin-bottom: 0; vertical-align: middle; } .form-inline .radio label, .form-inline .checkbox label { padding-left: 0; } .form-inline .radio input[type="radio"], .form-inline .checkbox input[type="checkbox"] { position: relative; margin-left: 0; } .form-inline .has-feedback .form-control-feedback { top: 0; } } .form-horizontal .radio, .form-horizontal .checkbox, .form-horizontal .radio-inline, .form-horizontal .checkbox-inline { padding-top: 7px; margin-top: 0; margin-bottom: 0; } .form-horizontal .radio, .form-horizontal .checkbox { min-height: 27px; } .form-horizontal .form-group { margin-right: -15px; margin-left: -15px; } @media (min-width: 768px) { .form-horizontal .control-label { padding-top: 7px; margin-bottom: 0; text-align: right; } } .form-horizontal .has-feedback .form-control-feedback { right: 15px; } @media (min-width: 768px) { .form-horizontal .form-group-lg .control-label { padding-top: 11px; font-size: 18px; } } @media (min-width: 768px) { .form-horizontal .form-group-sm .control-label { padding-top: 6px; font-size: 12px; } } .btn { display: inline-block; padding: 6px 12px; margin-bottom: 0; font-size: 14px; font-weight: normal; line-height: 1.42857143; text-align: center; white-space: nowrap; vertical-align: middle; -ms-touch-action: manipulation; touch-action: manipulation; cursor: pointer; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; background-image: none; border: 1px solid transparent; border-radius: 4px; } .btn:focus, .btn:active:focus, .btn.active:focus, .btn.focus, .btn:active.focus, .btn.active.focus { outline: 5px auto -webkit-focus-ring-color; outline-offset: -2px; } .btn:hover, .btn:focus, .btn.focus { color: #333; text-decoration: none; } .btn:active, .btn.active { background-image: none; outline: 0; -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125); box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125); } .btn.disabled, .btn[disabled], fieldset[disabled] .btn { cursor: not-allowed; filter: alpha(opacity=65); -webkit-box-shadow: none; box-shadow: none; opacity: .65; } a.btn.disabled, fieldset[disabled] a.btn { pointer-events: none; } .btn-default { color: #333; background-color: #fff; border-color: #ccc; } .btn-default:focus, .btn-default.focus { color: #333; background-color: #e6e6e6; border-color: #8c8c8c; } .btn-default:hover { color: #333; background-color: #e6e6e6; border-color: #adadad; } .btn-default:active, .btn-default.active, .open > .dropdown-toggle.btn-default { color: #333; background-color: #e6e6e6; border-color: #adadad; } .btn-default:active:hover, .btn-default.active:hover, .open > .dropdown-toggle.btn-default:hover, .btn-default:active:focus, .btn-default.active:focus, .open > .dropdown-toggle.btn-default:focus, .btn-default:active.focus, .btn-default.active.focus, .open > .dropdown-toggle.btn-default.focus { color: #333; background-color: #d4d4d4; border-color: #8c8c8c; } .btn-default:active, .btn-default.active, .open > .dropdown-toggle.btn-default { background-image: none; } .btn-default.disabled:hover, .btn-default[disabled]:hover, fieldset[disabled] .btn-default:hover, .btn-default.disabled:focus, .btn-default[disabled]:focus, fieldset[disabled] .btn-default:focus, .btn-default.disabled.focus, .btn-default[disabled].focus, fieldset[disabled] .btn-default.focus { background-color: #fff; border-color: #ccc; } .btn-default .badge { color: #fff; background-color: #333; } .btn-primary { color: #fff; background-color: #337ab7; border-color: #2e6da4; } .btn-primary:focus, .btn-primary.focus { color: #fff; background-color: #286090; border-color: #122b40; } .btn-primary:hover { color: #fff; background-color: #286090; border-color: #204d74; } .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary { color: #fff; background-color: #286090; border-color: #204d74; } .btn-primary:active:hover, .btn-primary.active:hover, .open > .dropdown-toggle.btn-primary:hover, .btn-primary:active:focus, .btn-primary.active:focus, .open > .dropdown-toggle.btn-primary:focus, .btn-primary:active.focus, .btn-primary.active.focus, .open > .dropdown-toggle.btn-primary.focus { color: #fff; background-color: #204d74; border-color: #122b40; } .btn-primary:active, .btn-primary.active, .open > .dropdown-toggle.btn-primary { background-image: none; } .btn-primary.disabled:hover, .btn-primary[disabled]:hover, fieldset[disabled] .btn-primary:hover, .btn-primary.disabled:focus, .btn-primary[disabled]:focus, fieldset[disabled] .btn-primary:focus, .btn-primary.disabled.focus, .btn-primary[disabled].focus, fieldset[disabled] .btn-primary.focus { background-color: #337ab7; border-color: #2e6da4; } .btn-primary .badge { color: #337ab7; background-color: #fff; } .btn-success { color: #fff; background-color: #5cb85c; border-color: #4cae4c; } .btn-success:focus, .btn-success.focus { color: #fff; background-color: #449d44; border-color: #255625; } .btn-success:hover { color: #fff; background-color: #449d44; border-color: #398439; } .btn-success:active, .btn-success.active, .open > .dropdown-toggle.btn-success { color: #fff; background-color: #449d44; border-color: #398439; } .btn-success:active:hover, .btn-success.active:hover, .open > .dropdown-toggle.btn-success:hover, .btn-success:active:focus, .btn-success.active:focus, .open > .dropdown-toggle.btn-success:focus, .btn-success:active.focus, .btn-success.active.focus, .open > .dropdown-toggle.btn-success.focus { color: #fff; background-color: #398439; border-color: #255625; } .btn-success:active, .btn-success.active, .open > .dropdown-toggle.btn-success { background-image: none; } .btn-success.disabled:hover, .btn-success[disabled]:hover, fieldset[disabled] .btn-success:hover, .btn-success.disabled:focus, .btn-success[disabled]:focus, fieldset[disabled] .btn-success:focus, .btn-success.disabled.focus, .btn-success[disabled].focus, fieldset[disabled] .btn-success.focus { background-color: #5cb85c; border-color: #4cae4c; } .btn-success .badge { color: #5cb85c; background-color: #fff; } .btn-info { color: #fff; background-color: #5bc0de; border-color: #46b8da; } .btn-info:focus, .btn-info.focus { color: #fff; background-color: #31b0d5; border-color: #1b6d85; } .btn-info:hover { color: #fff; background-color: #31b0d5; border-color: #269abc; } .btn-info:active, .btn-info.active, .open > .dropdown-toggle.btn-info { color: #fff; background-color: #31b0d5; border-color: #269abc; } .btn-info:active:hover, .btn-info.active:hover, .open > .dropdown-toggle.btn-info:hover, .btn-info:active:focus, .btn-info.active:focus, .open > .dropdown-toggle.btn-info:focus, .btn-info:active.focus, .btn-info.active.focus, .open > .dropdown-toggle.btn-info.focus { color: #fff; background-color: #269abc; border-color: #1b6d85; } .btn-info:active, .btn-info.active, .open > .dropdown-toggle.btn-info { background-image: none; } .btn-info.disabled:hover, .btn-info[disabled]:hover, fieldset[disabled] .btn-info:hover, .btn-info.disabled:focus, .btn-info[disabled]:focus, fieldset[disabled] .btn-info:focus, .btn-info.disabled.focus, .btn-info[disabled].focus, fieldset[disabled] .btn-info.focus { background-color: #5bc0de; border-color: #46b8da; } .btn-info .badge { color: #5bc0de; background-color: #fff; } .btn-warning { color: #fff; background-color: #f0ad4e; border-color: #eea236; } .btn-warning:focus, .btn-warning.focus { color: #fff; background-color: #ec971f; border-color: #985f0d; } .btn-warning:hover { color: #fff; background-color: #ec971f; border-color: #d58512; } .btn-warning:active, .btn-warning.active, .open > .dropdown-toggle.btn-warning { color: #fff; background-color: #ec971f; border-color: #d58512; } .btn-warning:active:hover, .btn-warning.active:hover, .open > .dropdown-toggle.btn-warning:hover, .btn-warning:active:focus, .btn-warning.active:focus, .open > .dropdown-toggle.btn-warning:focus, .btn-warning:active.focus, .btn-warning.active.focus, .open > .dropdown-toggle.btn-warning.focus { color: #fff; background-color: #d58512; border-color: #985f0d; } .btn-warning:active, .btn-warning.active, .open > .dropdown-toggle.btn-warning { background-image: none; } .btn-warning.disabled:hover, .btn-warning[disabled]:hover, fieldset[disabled] .btn-warning:hover, .btn-warning.disabled:focus, .btn-warning[disabled]:focus, fieldset[disabled] .btn-warning:focus, .btn-warning.disabled.focus, .btn-warning[disabled].focus, fieldset[disabled] .btn-warning.focus { background-color: #f0ad4e; border-color: #eea236; } .btn-warning .badge { color: #f0ad4e; background-color: #fff; } .btn-danger { color: #fff; background-color: #d9534f; border-color: #d43f3a; } .btn-danger:focus, .btn-danger.focus { color: #fff; background-color: #c9302c; border-color: #761c19; } .btn-danger:hover { color: #fff; background-color: #c9302c; border-color: #ac2925; } .btn-danger:active, .btn-danger.active, .open > .dropdown-toggle.btn-danger { color: #fff; background-color: #c9302c; border-color: #ac2925; } .btn-danger:active:hover, .btn-danger.active:hover, .open > .dropdown-toggle.btn-danger:hover, .btn-danger:active:focus, .btn-danger.active:focus, .open > .dropdown-toggle.btn-danger:focus, .btn-danger:active.focus, .btn-danger.active.focus, .open > .dropdown-toggle.btn-danger.focus { color: #fff; background-color: #ac2925; border-color: #761c19; } .btn-danger:active, .btn-danger.active, .open > .dropdown-toggle.btn-danger { background-image: none; } .btn-danger.disabled:hover, .btn-danger[disabled]:hover, fieldset[disabled] .btn-danger:hover, .btn-danger.disabled:focus, .btn-danger[disabled]:focus, fieldset[disabled] .btn-danger:focus, .btn-danger.disabled.focus, .btn-danger[disabled].focus, fieldset[disabled] .btn-danger.focus { background-color: #d9534f; border-color: #d43f3a; } .btn-danger .badge { color: #d9534f; background-color: #fff; } .btn-link { font-weight: normal; color: #337ab7; border-radius: 0; } .btn-link, .btn-link:active, .btn-link.active, .btn-link[disabled], fieldset[disabled] .btn-link { background-color: transparent; -webkit-box-shadow: none; box-shadow: none; } .btn-link, .btn-link:hover, .btn-link:focus, .btn-link:active { border-color: transparent; } .btn-link:hover, .btn-link:focus { color: #23527c; text-decoration: underline; background-color: transparent; } .btn-link[disabled]:hover, fieldset[disabled] .btn-link:hover, .btn-link[disabled]:focus, fieldset[disabled] .btn-link:focus { color: #777; text-decoration: none; } .btn-lg, .btn-group-lg > .btn { padding: 10px 16px; font-size: 18px; line-height: 1.3333333; border-radius: 6px; } .btn-sm, .btn-group-sm > .btn { padding: 5px 10px; font-size: 12px; line-height: 1.5; border-radius: 3px; } .btn-xs, .btn-group-xs > .btn { padding: 1px 5px; font-size: 12px; line-height: 1.5; border-radius: 3px; } .btn-block { display: block; width: 100%; } .btn-block + .btn-block { margin-top: 5px; } input[type="submit"].btn-block, input[type="reset"].btn-block, input[type="button"].btn-block { width: 100%; } .fade { opacity: 0; -webkit-transition: opacity .15s linear; -o-transition: opacity .15s linear; transition: opacity .15s linear; } .fade.in { opacity: 1; } .collapse { display: none; } .collapse.in { display: block; } tr.collapse.in { display: table-row; } tbody.collapse.in { display: table-row-group; } .collapsing { position: relative; height: 0; overflow: hidden; -webkit-transition-timing-function: ease; -o-transition-timing-function: ease; transition-timing-function: ease; -webkit-transition-duration: .35s; -o-transition-duration: .35s; transition-duration: .35s; -webkit-transition-property: height, visibility; -o-transition-property: height, visibility; transition-property: height, visibility; } .caret { display: inline-block; width: 0; height: 0; margin-left: 2px; vertical-align: middle; border-top: 4px dashed; border-top: 4px solid \9; border-right: 4px solid transparent; border-left: 4px solid transparent; } .dropup, .dropdown { position: relative; } .dropdown-toggle:focus { outline: 0; } .dropdown-menu { position: absolute; top: 100%; left: 0; z-index: 1000; display: none; float: left; min-width: 160px; padding: 5px 0; margin: 2px 0 0; font-size: 14px; text-align: left; list-style: none; background-color: #fff; -webkit-background-clip: padding-box; background-clip: padding-box; border: 1px solid #ccc; border: 1px solid rgba(0, 0, 0, .15); border-radius: 4px; -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175); box-shadow: 0 6px 12px rgba(0, 0, 0, .175); } .dropdown-menu.pull-right { right: 0; left: auto; } .dropdown-menu .divider { height: 1px; margin: 9px 0; overflow: hidden; background-color: #e5e5e5; } .dropdown-menu > li > a { display: block; padding: 3px 20px; clear: both; font-weight: normal; line-height: 1.42857143; color: #333; white-space: nowrap; } .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus { color: #262626; text-decoration: none; background-color: #f5f5f5; } .dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus { color: #fff; text-decoration: none; background-color: #337ab7; outline: 0; } .dropdown-menu > .disabled > a, .dropdown-menu > .disabled > a:hover, .dropdown-menu > .disabled > a:focus { color: #777; } .dropdown-menu > .disabled > a:hover, .dropdown-menu > .disabled > a:focus { text-decoration: none; cursor: not-allowed; background-color: transparent; background-image: none; filter: progid:DXImageTransform.Microsoft.gradient(enabled = false); } .open > .dropdown-menu { display: block; } .open > a { outline: 0; } .dropdown-menu-right { right: 0; left: auto; } .dropdown-menu-left { right: auto; left: 0; } .dropdown-header { display: block; padding: 3px 20px; font-size: 12px; line-height: 1.42857143; color: #777; white-space: nowrap; } .dropdown-backdrop { position: fixed; top: 0; right: 0; bottom: 0; left: 0; z-index: 990; } .pull-right > .dropdown-menu { right: 0; left: auto; } .dropup .caret, .navbar-fixed-bottom .dropdown .caret { content: ""; border-top: 0; border-bottom: 4px dashed; border-bottom: 4px solid \9; } .dropup .dropdown-menu, .navbar-fixed-bottom .dropdown .dropdown-menu { top: auto; bottom: 100%; margin-bottom: 2px; } @media (min-width: 768px) { .navbar-right .dropdown-menu { right: 0; left: auto; } .navbar-right .dropdown-menu-left { right: auto; left: 0; } } .btn-group, .btn-group-vertical { position: relative; display: inline-block; vertical-align: middle; } .btn-group > .btn, .btn-group-vertical > .btn { position: relative; float: left; } .btn-group > .btn:hover, .btn-group-vertical > .btn:hover, .btn-group > .btn:focus, .btn-group-vertical > .btn:focus, .btn-group > .btn:active, .btn-group-vertical > .btn:active, .btn-group > .btn.active, .btn-group-vertical > .btn.active { z-index: 2; } .btn-group .btn + .btn, .btn-group .btn + .btn-group, .btn-group .btn-group + .btn, .btn-group .btn-group + .btn-group { margin-left: -1px; } .btn-toolbar { margin-left: -5px; } .btn-toolbar .btn, .btn-toolbar .btn-group, .btn-toolbar .input-group { float: left; } .btn-toolbar > .btn, .btn-toolbar > .btn-group, .btn-toolbar > .input-group { margin-left: 5px; } .btn-group > .btn:not(:first-child):not(:last-child):not(.dropdown-toggle) { border-radius: 0; } .btn-group > .btn:first-child { margin-left: 0; } .btn-group > .btn:first-child:not(:last-child):not(.dropdown-toggle) { border-top-right-radius: 0; border-bottom-right-radius: 0; } .btn-group > .btn:last-child:not(:first-child), .btn-group > .dropdown-toggle:not(:first-child) { border-top-left-radius: 0; border-bottom-left-radius: 0; } .btn-group > .btn-group { float: left; } .btn-group > .btn-group:not(:first-child):not(:last-child) > .btn { border-radius: 0; } .btn-group > .btn-group:first-child:not(:last-child) > .btn:last-child, .btn-group > .btn-group:first-child:not(:last-child) > .dropdown-toggle { border-top-right-radius: 0; border-bottom-right-radius: 0; } .btn-group > .btn-group:last-child:not(:first-child) > .btn:first-child { border-top-left-radius: 0; border-bottom-left-radius: 0; } .btn-group .dropdown-toggle:active, .btn-group.open .dropdown-toggle { outline: 0; } .btn-group > .btn + .dropdown-toggle { padding-right: 8px; padding-left: 8px; } .btn-group > .btn-lg + .dropdown-toggle { padding-right: 12px; padding-left: 12px; } .btn-group.open .dropdown-toggle { -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125); box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125); } .btn-group.open .dropdown-toggle.btn-link { -webkit-box-shadow: none; box-shadow: none; } .btn .caret { margin-left: 0; } .btn-lg .caret { border-width: 5px 5px 0; border-bottom-width: 0; } .dropup .btn-lg .caret { border-width: 0 5px 5px; } .btn-group-vertical > .btn, .btn-group-vertical > .btn-group, .btn-group-vertical > .btn-group > .btn { display: block; float: none; width: 100%; max-width: 100%; } .btn-group-vertical > .btn-group > .btn { float: none; } .btn-group-vertical > .btn + .btn, .btn-group-vertical > .btn + .btn-group, .btn-group-vertical > .btn-group + .btn, .btn-group-vertical > .btn-group + .btn-group { margin-top: -1px; margin-left: 0; } .btn-group-vertical > .btn:not(:first-child):not(:last-child) { border-radius: 0; } .btn-group-vertical > .btn:first-child:not(:last-child) { border-top-left-radius: 4px; border-top-right-radius: 4px; border-bottom-right-radius: 0; border-bottom-left-radius: 0; } .btn-group-vertical > .btn:last-child:not(:first-child) { border-top-left-radius: 0; border-top-right-radius: 0; border-bottom-right-radius: 4px; border-bottom-left-radius: 4px; } .btn-group-vertical > .btn-group:not(:first-child):not(:last-child) > .btn { border-radius: 0; } .btn-group-vertical > .btn-group:first-child:not(:last-child) > .btn:last-child, .btn-group-vertical > .btn-group:first-child:not(:last-child) > .dropdown-toggle { border-bottom-right-radius: 0; border-bottom-left-radius: 0; } .btn-group-vertical > .btn-group:last-child:not(:first-child) > .btn:first-child { border-top-left-radius: 0; border-top-right-radius: 0; } .btn-group-justified { display: table; width: 100%; table-layout: fixed; border-collapse: separate; } .btn-group-justified > .btn, .btn-group-justified > .btn-group { display: table-cell; float: none; width: 1%; } .btn-group-justified > .btn-group .btn { width: 100%; } .btn-group-justified > .btn-group .dropdown-menu { left: auto; } [data-toggle="buttons"] > .btn input[type="radio"], [data-toggle="buttons"] > .btn-group > .btn input[type="radio"], [data-toggle="buttons"] > .btn input[type="checkbox"], [data-toggle="buttons"] > .btn-group > .btn input[type="checkbox"] { position: absolute; clip: rect(0, 0, 0, 0); pointer-events: none; } .input-group { position: relative; display: table; border-collapse: separate; } .input-group[class*="col-"] { float: none; padding-right: 0; padding-left: 0; } .input-group .form-control { position: relative; z-index: 2; float: left; width: 100%; margin-bottom: 0; } .input-group .form-control:focus { z-index: 3; } .input-group-lg > .form-control, .input-group-lg > .input-group-addon, .input-group-lg > .input-group-btn > .btn { height: 46px; padding: 10px 16px; font-size: 18px; line-height: 1.3333333; border-radius: 6px; } select.input-group-lg > .form-control, select.input-group-lg > .input-group-addon, select.input-group-lg > .input-group-btn > .btn { height: 46px; line-height: 46px; } textarea.input-group-lg > .form-control, textarea.input-group-lg > .input-group-addon, textarea.input-group-lg > .input-group-btn > .btn, select[multiple].input-group-lg > .form-control, select[multiple].input-group-lg > .input-group-addon, select[multiple].input-group-lg > .input-group-btn > .btn { height: auto; } .input-group-sm > .form-control, .input-group-sm > .input-group-addon, .input-group-sm > .input-group-btn > .btn { height: 30px; padding: 5px 10px; font-size: 12px; line-height: 1.5; border-radius: 3px; } select.input-group-sm > .form-control, select.input-group-sm > .input-group-addon, select.input-group-sm > .input-group-btn > .btn { height: 30px; line-height: 30px; } textarea.input-group-sm > .form-control, textarea.input-group-sm > .input-group-addon, textarea.input-group-sm > .input-group-btn > .btn, select[multiple].input-group-sm > .form-control, select[multiple].input-group-sm > .input-group-addon, select[multiple].input-group-sm > .input-group-btn > .btn { height: auto; } .input-group-addon, .input-group-btn, .input-group .form-control { display: table-cell; } .input-group-addon:not(:first-child):not(:last-child), .input-group-btn:not(:first-child):not(:last-child), .input-group .form-control:not(:first-child):not(:last-child) { border-radius: 0; } .input-group-addon, .input-group-btn { width: 1%; white-space: nowrap; vertical-align: middle; } .input-group-addon { padding: 6px 12px; font-size: 14px; font-weight: normal; line-height: 1; color: #555; text-align: center; background-color: #eee; border: 1px solid #ccc; border-radius: 4px; } .input-group-addon.input-sm { padding: 5px 10px; font-size: 12px; border-radius: 3px; } .input-group-addon.input-lg { padding: 10px 16px; font-size: 18px; border-radius: 6px; } .input-group-addon input[type="radio"], .input-group-addon input[type="checkbox"] { margin-top: 0; } .input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child > .btn, .input-group-btn:first-child > .btn-group > .btn, .input-group-btn:first-child > .dropdown-toggle, .input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle), .input-group-btn:last-child > .btn-group:not(:last-child) > .btn { border-top-right-radius: 0; border-bottom-right-radius: 0; } .input-group-addon:first-child { border-right: 0; } .input-group .form-control:last-child, .input-group-addon:last-child, .input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group > .btn, .input-group-btn:last-child > .dropdown-toggle, .input-group-btn:first-child > .btn:not(:first-child), .input-group-btn:first-child > .btn-group:not(:first-child) > .btn { border-top-left-radius: 0; border-bottom-left-radius: 0; } .input-group-addon:last-child { border-left: 0; } .input-group-btn { position: relative; font-size: 0; white-space: nowrap; } .input-group-btn > .btn { position: relative; } .input-group-btn > .btn + .btn { margin-left: -1px; } .input-group-btn > .btn:hover, .input-group-btn > .btn:focus, .input-group-btn > .btn:active { z-index: 2; } .input-group-btn:first-child > .btn, .input-group-btn:first-child > .btn-group { margin-right: -1px; } .input-group-btn:last-child > .btn, .input-group-btn:last-child > .btn-group { z-index: 2; margin-left: -1px; } .nav { padding-left: 0; margin-bottom: 0; list-style: none; } .nav > li { position: relative; display: block; } .nav > li > a { position: relative; display: block; padding: 10px 15px; } .nav > li > a:hover, .nav > li > a:focus { text-decoration: none; background-color: #eee; } .nav > li.disabled > a { color: #777; } .nav > li.disabled > a:hover, .nav > li.disabled > a:focus { color: #777; text-decoration: none; cursor: not-allowed; background-color: transparent; } .nav .open > a, .nav .open > a:hover, .nav .open > a:focus { background-color: #eee; border-color: #337ab7; } .nav .nav-divider { height: 1px; margin: 9px 0; overflow: hidden; background-color: #e5e5e5; } .nav > li > a > img { max-width: none; } .nav-tabs { border-bottom: 1px solid #ddd; } .nav-tabs > li { float: left; margin-bottom: -1px; } .nav-tabs > li > a { margin-right: 2px; line-height: 1.42857143; border: 1px solid transparent; border-radius: 4px 4px 0 0; } .nav-tabs > li > a:hover { border-color: #eee #eee #ddd; } .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus { color: #555; cursor: default; background-color: #fff; border: 1px solid #ddd; border-bottom-color: transparent; } .nav-tabs.nav-justified { width: 100%; border-bottom: 0; } .nav-tabs.nav-justified > li { float: none; } .nav-tabs.nav-justified > li > a { margin-bottom: 5px; text-align: center; } .nav-tabs.nav-justified > .dropdown .dropdown-menu { top: auto; left: auto; } @media (min-width: 768px) { .nav-tabs.nav-justified > li { display: table-cell; width: 1%; } .nav-tabs.nav-justified > li > a { margin-bottom: 0; } } .nav-tabs.nav-justified > li > a { margin-right: 0; border-radius: 4px; } .nav-tabs.nav-justified > .active > a, .nav-tabs.nav-justified > .active > a:hover, .nav-tabs.nav-justified > .active > a:focus { border: 1px solid #ddd; } @media (min-width: 768px) { .nav-tabs.nav-justified > li > a { border-bottom: 1px solid #ddd; border-radius: 4px 4px 0 0; } .nav-tabs.nav-justified > .active > a, .nav-tabs.nav-justified > .active > a:hover, .nav-tabs.nav-justified > .active > a:focus { border-bottom-color: #fff; } } .nav-pills > li { float: left; } .nav-pills > li > a { border-radius: 4px; } .nav-pills > li + li { margin-left: 2px; } .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus { color: #fff; background-color: #337ab7; } .nav-stacked > li { float: none; } .nav-stacked > li + li { margin-top: 2px; margin-left: 0; } .nav-justified { width: 100%; } .nav-justified > li { float: none; } .nav-justified > li > a { margin-bottom: 5px; text-align: center; } .nav-justified > .dropdown .dropdown-menu { top: auto; left: auto; } @media (min-width: 768px) { .nav-justified > li { display: table-cell; width: 1%; } .nav-justified > li > a { margin-bottom: 0; } } .nav-tabs-justified { border-bottom: 0; } .nav-tabs-justified > li > a { margin-right: 0; border-radius: 4px; } .nav-tabs-justified > .active > a, .nav-tabs-justified > .active > a:hover, .nav-tabs-justified > .active > a:focus { border: 1px solid #ddd; } @media (min-width: 768px) { .nav-tabs-justified > li > a { border-bottom: 1px solid #ddd; border-radius: 4px 4px 0 0; } .nav-tabs-justified > .active > a, .nav-tabs-justified > .active > a:hover, .nav-tabs-justified > .active > a:focus { border-bottom-color: #fff; } } .tab-content > .tab-pane { display: none; } .tab-content > .active { display: block; } .nav-tabs .dropdown-menu { margin-top: -1px; border-top-left-radius: 0; border-top-right-radius: 0; } .navbar { position: relative; min-height: 50px; margin-bottom: 20px; border: 1px solid transparent; } @media (min-width: 768px) { .navbar { border-radius: 4px; } } @media (min-width: 768px) { .navbar-header { float: left; } } .navbar-collapse { padding-right: 15px; padding-left: 15px; overflow-x: visible; -webkit-overflow-scrolling: touch; border-top: 1px solid transparent; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1); box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1); } .navbar-collapse.in { overflow-y: auto; } @media (min-width: 768px) { .navbar-collapse { width: auto; border-top: 0; -webkit-box-shadow: none; box-shadow: none; } .navbar-collapse.collapse { display: block !important; height: auto !important; padding-bottom: 0; overflow: visible !important; } .navbar-collapse.in { overflow-y: visible; } .navbar-fixed-top .navbar-collapse, .navbar-static-top .navbar-collapse, .navbar-fixed-bottom .navbar-collapse { padding-right: 0; padding-left: 0; } } .navbar-fixed-top .navbar-collapse, .navbar-fixed-bottom .navbar-collapse { max-height: 340px; } @media (max-device-width: 480px) and (orientation: landscape) { .navbar-fixed-top .navbar-collapse, .navbar-fixed-bottom .navbar-collapse { max-height: 200px; } } .container > .navbar-header, .container-fluid > .navbar-header, .container > .navbar-collapse, .container-fluid > .navbar-collapse { margin-right: -15px; margin-left: -15px; } @media (min-width: 768px) { .container > .navbar-header, .container-fluid > .navbar-header, .container > .navbar-collapse, .container-fluid > .navbar-collapse { margin-right: 0; margin-left: 0; } } .navbar-static-top { z-index: 1000; border-width: 0 0 1px; } @media (min-width: 768px) { .navbar-static-top { border-radius: 0; } } .navbar-fixed-top, .navbar-fixed-bottom { position: fixed; right: 0; left: 0; z-index: 1030; } @media (min-width: 768px) { .navbar-fixed-top, .navbar-fixed-bottom { border-radius: 0; } } .navbar-fixed-top { top: 0; border-width: 0 0 1px; } .navbar-fixed-bottom { bottom: 0; margin-bottom: 0; border-width: 1px 0 0; } .navbar-brand { float: left; height: 50px; padding: 15px 15px; font-size: 18px; line-height: 20px; } .navbar-brand:hover, .navbar-brand:focus { text-decoration: none; } .navbar-brand > img { display: block; } @media (min-width: 768px) { .navbar > .container .navbar-brand, .navbar > .container-fluid .navbar-brand { margin-left: -15px; } } .navbar-toggle { position: relative; float: right; padding: 9px 10px; margin-top: 8px; margin-right: 15px; margin-bottom: 8px; background-color: transparent; background-image: none; border: 1px solid transparent; border-radius: 4px; } .navbar-toggle:focus { outline: 0; } .navbar-toggle .icon-bar { display: block; width: 22px; height: 2px; border-radius: 1px; } .navbar-toggle .icon-bar + .icon-bar { margin-top: 4px; } @media (min-width: 768px) { .navbar-toggle { display: none; } } .navbar-nav { margin: 7.5px -15px; } .navbar-nav > li > a { padding-top: 10px; padding-bottom: 10px; line-height: 20px; } @media (max-width: 767px) { .navbar-nav .open .dropdown-menu { position: static; float: none; width: auto; margin-top: 0; background-color: transparent; border: 0; -webkit-box-shadow: none; box-shadow: none; } .navbar-nav .open .dropdown-menu > li > a, .navbar-nav .open .dropdown-menu .dropdown-header { padding: 5px 15px 5px 25px; } .navbar-nav .open .dropdown-menu > li > a { line-height: 20px; } .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-nav .open .dropdown-menu > li > a:focus { background-image: none; } } @media (min-width: 768px) { .navbar-nav { float: left; margin: 0; } .navbar-nav > li { float: left; } .navbar-nav > li > a { padding-top: 15px; padding-bottom: 15px; } } .navbar-form { padding: 10px 15px; margin-top: 8px; margin-right: -15px; margin-bottom: 8px; margin-left: -15px; border-top: 1px solid transparent; border-bottom: 1px solid transparent; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1); box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1); } @media (min-width: 768px) { .navbar-form .form-group { display: inline-block; margin-bottom: 0; vertical-align: middle; } .navbar-form .form-control { display: inline-block; width: auto; vertical-align: middle; } .navbar-form .form-control-static { display: inline-block; } .navbar-form .input-group { display: inline-table; vertical-align: middle; } .navbar-form .input-group .input-group-addon, .navbar-form .input-group .input-group-btn, .navbar-form .input-group .form-control { width: auto; } .navbar-form .input-group > .form-control { width: 100%; } .navbar-form .control-label { margin-bottom: 0; vertical-align: middle; } .navbar-form .radio, .navbar-form .checkbox { display: inline-block; margin-top: 0; margin-bottom: 0; vertical-align: middle; } .navbar-form .radio label, .navbar-form .checkbox label { padding-left: 0; } .navbar-form .radio input[type="radio"], .navbar-form .checkbox input[type="checkbox"] { position: relative; margin-left: 0; } .navbar-form .has-feedback .form-control-feedback { top: 0; } } @media (max-width: 767px) { .navbar-form .form-group { margin-bottom: 5px; } .navbar-form .form-group:last-child { margin-bottom: 0; } } @media (min-width: 768px) { .navbar-form { width: auto; padding-top: 0; padding-bottom: 0; margin-right: 0; margin-left: 0; border: 0; -webkit-box-shadow: none; box-shadow: none; } } .navbar-nav > li > .dropdown-menu { margin-top: 0; border-top-left-radius: 0; border-top-right-radius: 0; } .navbar-fixed-bottom .navbar-nav > li > .dropdown-menu { margin-bottom: 0; border-top-left-radius: 4px; border-top-right-radius: 4px; border-bottom-right-radius: 0; border-bottom-left-radius: 0; } .navbar-btn { margin-top: 8px; margin-bottom: 8px; } .navbar-btn.btn-sm { margin-top: 10px; margin-bottom: 10px; } .navbar-btn.btn-xs { margin-top: 14px; margin-bottom: 14px; } .navbar-text { margin-top: 15px; margin-bottom: 15px; } @media (min-width: 768px) { .navbar-text { float: left; margin-right: 15px; margin-left: 15px; } } @media (min-width: 768px) { .navbar-left { float: left !important; } .navbar-right { float: right !important; margin-right: -15px; } .navbar-right ~ .navbar-right { margin-right: 0; } } .navbar-default { background-color: #f8f8f8; border-color: #e7e7e7; } .navbar-default .navbar-brand { color: #777; } .navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus { color: #5e5e5e; background-color: transparent; } .navbar-default .navbar-text { color: #777; } .navbar-default .navbar-nav > li > a { color: #777; } .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus { color: #333; background-color: transparent; } .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus { color: #555; background-color: #e7e7e7; } .navbar-default .navbar-nav > .disabled > a, .navbar-default .navbar-nav > .disabled > a:hover, .navbar-default .navbar-nav > .disabled > a:focus { color: #ccc; background-color: transparent; } .navbar-default .navbar-toggle { border-color: #ddd; } .navbar-default .navbar-toggle:hover, .navbar-default .navbar-toggle:focus { background-color: #ddd; } .navbar-default .navbar-toggle .icon-bar { background-color: #888; } .navbar-default .navbar-collapse, .navbar-default .navbar-form { border-color: #e7e7e7; } .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus { color: #555; background-color: #e7e7e7; } @media (max-width: 767px) { .navbar-default .navbar-nav .open .dropdown-menu > li > a { color: #777; } .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus { color: #333; background-color: transparent; } .navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus { color: #555; background-color: #e7e7e7; } .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a, .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:hover, .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:focus { color: #ccc; background-color: transparent; } } .navbar-default .navbar-link { color: #777; } .navbar-default .navbar-link:hover { color: #333; } .navbar-default .btn-link { color: #777; } .navbar-default .btn-link:hover, .navbar-default .btn-link:focus { color: #333; } .navbar-default .btn-link[disabled]:hover, fieldset[disabled] .navbar-default .btn-link:hover, .navbar-default .btn-link[disabled]:focus, fieldset[disabled] .navbar-default .btn-link:focus { color: #ccc; } .navbar-inverse { background-color: #222; border-color: #080808; } .navbar-inverse .navbar-brand { color: #9d9d9d; } .navbar-inverse .navbar-brand:hover, .navbar-inverse .navbar-brand:focus { color: #fff; background-color: transparent; } .navbar-inverse .navbar-text { color: #9d9d9d; } .navbar-inverse .navbar-nav > li > a { color: #9d9d9d; } .navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus { color: #fff; background-color: transparent; } .navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus { color: #fff; background-color: #080808; } .navbar-inverse .navbar-nav > .disabled > a, .navbar-inverse .navbar-nav > .disabled > a:hover, .navbar-inverse .navbar-nav > .disabled > a:focus { color: #444; background-color: transparent; } .navbar-inverse .navbar-toggle { border-color: #333; } .navbar-inverse .navbar-toggle:hover, .navbar-inverse .navbar-toggle:focus { background-color: #333; } .navbar-inverse .navbar-toggle .icon-bar { background-color: #fff; } .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form { border-color: #101010; } .navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus { color: #fff; background-color: #080808; } @media (max-width: 767px) { .navbar-inverse .navbar-nav .open .dropdown-menu > .dropdown-header { border-color: #080808; } .navbar-inverse .navbar-nav .open .dropdown-menu .divider { background-color: #080808; } .navbar-inverse .navbar-nav .open .dropdown-menu > li > a { color: #9d9d9d; } .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:focus { color: #fff; background-color: transparent; } .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a, .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:hover, .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:focus { color: #fff; background-color: #080808; } .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a, .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:hover, .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:focus { color: #444; background-color: transparent; } } .navbar-inverse .navbar-link { color: #9d9d9d; } .navbar-inverse .navbar-link:hover { color: #fff; } .navbar-inverse .btn-link { color: #9d9d9d; } .navbar-inverse .btn-link:hover, .navbar-inverse .btn-link:focus { color: #fff; } .navbar-inverse .btn-link[disabled]:hover, fieldset[disabled] .navbar-inverse .btn-link:hover, .navbar-inverse .btn-link[disabled]:focus, fieldset[disabled] .navbar-inverse .btn-link:focus { color: #444; } .breadcrumb { padding: 8px 15px; margin-bottom: 20px; list-style: none; background-color: #f5f5f5; border-radius: 4px; } .breadcrumb > li { display: inline-block; } .breadcrumb > li + li:before { padding: 0 5px; color: #ccc; content: "/\00a0"; } .breadcrumb > .active { color: #777; } .pagination { display: inline-block; padding-left: 0; margin: 20px 0; border-radius: 4px; } .pagination > li { display: inline; } .pagination > li > a, .pagination > li > span { position: relative; float: left; padding: 6px 12px; margin-left: -1px; line-height: 1.42857143; color: #337ab7; text-decoration: none; background-color: #fff; border: 1px solid #ddd; } .pagination > li:first-child > a, .pagination > li:first-child > span { margin-left: 0; border-top-left-radius: 4px; border-bottom-left-radius: 4px; } .pagination > li:last-child > a, .pagination > li:last-child > span { border-top-right-radius: 4px; border-bottom-right-radius: 4px; } .pagination > li > a:hover, .pagination > li > span:hover, .pagination > li > a:focus, .pagination > li > span:focus { z-index: 2; color: #23527c; background-color: #eee; border-color: #ddd; } .pagination > .active > a, .pagination > .active > span, .pagination > .active > a:hover, .pagination > .active > span:hover, .pagination > .active > a:focus, .pagination > .active > span:focus { z-index: 3; color: #fff; cursor: default; background-color: #337ab7; border-color: #337ab7; } .pagination > .disabled > span, .pagination > .disabled > span:hover, .pagination > .disabled > span:focus, .pagination > .disabled > a, .pagination > .disabled > a:hover, .pagination > .disabled > a:focus { color: #777; cursor: not-allowed; background-color: #fff; border-color: #ddd; } .pagination-lg > li > a, .pagination-lg > li > span { padding: 10px 16px; font-size: 18px; line-height: 1.3333333; } .pagination-lg > li:first-child > a, .pagination-lg > li:first-child > span { border-top-left-radius: 6px; border-bottom-left-radius: 6px; } .pagination-lg > li:last-child > a, .pagination-lg > li:last-child > span { border-top-right-radius: 6px; border-bottom-right-radius: 6px; } .pagination-sm > li > a, .pagination-sm > li > span { padding: 5px 10px; font-size: 12px; line-height: 1.5; } .pagination-sm > li:first-child > a, .pagination-sm > li:first-child > span { border-top-left-radius: 3px; border-bottom-left-radius: 3px; } .pagination-sm > li:last-child > a, .pagination-sm > li:last-child > span { border-top-right-radius: 3px; border-bottom-right-radius: 3px; } .pager { padding-left: 0; margin: 20px 0; text-align: center; list-style: none; } .pager li { display: inline; } .pager li > a, .pager li > span { display: inline-block; padding: 5px 14px; background-color: #fff; border: 1px solid #ddd; border-radius: 15px; } .pager li > a:hover, .pager li > a:focus { text-decoration: none; background-color: #eee; } .pager .next > a, .pager .next > span { float: right; } .pager .previous > a, .pager .previous > span { float: left; } .pager .disabled > a, .pager .disabled > a:hover, .pager .disabled > a:focus, .pager .disabled > span { color: #777; cursor: not-allowed; background-color: #fff; } .label { display: inline; padding: .2em .6em .3em; font-size: 75%; font-weight: bold; line-height: 1; color: #fff; text-align: center; white-space: nowrap; vertical-align: baseline; border-radius: .25em; } a.label:hover, a.label:focus { color: #fff; text-decoration: none; cursor: pointer; } .label:empty { display: none; } .btn .label { position: relative; top: -1px; } .label-default { background-color: #777; } .label-default[href]:hover, .label-default[href]:focus { background-color: #5e5e5e; } .label-primary { background-color: #337ab7; } .label-primary[href]:hover, .label-primary[href]:focus { background-color: #286090; } .label-success { background-color: #5cb85c; } .label-success[href]:hover, .label-success[href]:focus { background-color: #449d44; } .label-info { background-color: #5bc0de; } .label-info[href]:hover, .label-info[href]:focus { background-color: #31b0d5; } .label-warning { background-color: #f0ad4e; } .label-warning[href]:hover, .label-warning[href]:focus { background-color: #ec971f; } .label-danger { background-color: #d9534f; } .label-danger[href]:hover, .label-danger[href]:focus { background-color: #c9302c; } .badge { display: inline-block; min-width: 10px; padding: 3px 7px; font-size: 12px; font-weight: bold; line-height: 1; color: #fff; text-align: center; white-space: nowrap; vertical-align: middle; background-color: #777; border-radius: 10px; } .badge:empty { display: none; } .btn .badge { position: relative; top: -1px; } .btn-xs .badge, .btn-group-xs > .btn .badge { top: 0; padding: 1px 5px; } a.badge:hover, a.badge:focus { color: #fff; text-decoration: none; cursor: pointer; } .list-group-item.active > .badge, .nav-pills > .active > a > .badge { color: #337ab7; background-color: #fff; } .list-group-item > .badge { float: right; } .list-group-item > .badge + .badge { margin-right: 5px; } .nav-pills > li > a > .badge { margin-left: 3px; } .jumbotron { padding-top: 30px; padding-bottom: 30px; margin-bottom: 30px; color: inherit; background-color: #eee; } .jumbotron h1, .jumbotron .h1 { color: inherit; } .jumbotron p { margin-bottom: 15px; font-size: 21px; font-weight: 200; } .jumbotron > hr { border-top-color: #d5d5d5; } .container .jumbotron, .container-fluid .jumbotron { padding-right: 15px; padding-left: 15px; border-radius: 6px; } .jumbotron .container { max-width: 100%; } @media screen and (min-width: 768px) { .jumbotron { padding-top: 48px; padding-bottom: 48px; } .container .jumbotron, .container-fluid .jumbotron { padding-right: 60px; padding-left: 60px; } .jumbotron h1, .jumbotron .h1 { font-size: 63px; } } .thumbnail { display: block; padding: 4px; margin-bottom: 20px; line-height: 1.42857143; background-color: #fff; border: 1px solid #ddd; border-radius: 4px; -webkit-transition: border .2s ease-in-out; -o-transition: border .2s ease-in-out; transition: border .2s ease-in-out; } .thumbnail > img, .thumbnail a > img { margin-right: auto; margin-left: auto; } a.thumbnail:hover, a.thumbnail:focus, a.thumbnail.active { border-color: #337ab7; } .thumbnail .caption { padding: 9px; color: #333; } .alert { padding: 15px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; } .alert h4 { margin-top: 0; color: inherit; } .alert .alert-link { font-weight: bold; } .alert > p, .alert > ul { margin-bottom: 0; } .alert > p + p { margin-top: 5px; } .alert-dismissable, .alert-dismissible { padding-right: 35px; } .alert-dismissable .close, .alert-dismissible .close { position: relative; top: -2px; right: -21px; color: inherit; } .alert-success { color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6; } .alert-success hr { border-top-color: #c9e2b3; } .alert-success .alert-link { color: #2b542c; } .alert-info { color: #31708f; background-color: #d9edf7; border-color: #bce8f1; } .alert-info hr { border-top-color: #a6e1ec; } .alert-info .alert-link { color: #245269; } .alert-warning { color: #8a6d3b; background-color: #fcf8e3; border-color: #faebcc; } .alert-warning hr { border-top-color: #f7e1b5; } .alert-warning .alert-link { color: #66512c; } .alert-danger { color: #a94442; background-color: #f2dede; border-color: #ebccd1; } .alert-danger hr { border-top-color: #e4b9c0; } .alert-danger .alert-link { color: #843534; } @-webkit-keyframes progress-bar-stripes { from { background-position: 40px 0; } to { background-position: 0 0; } } @-o-keyframes progress-bar-stripes { from { background-position: 40px 0; } to { background-position: 0 0; } } @keyframes progress-bar-stripes { from { background-position: 40px 0; } to { background-position: 0 0; } } .progress { height: 20px; margin-bottom: 20px; overflow: hidden; background-color: #f5f5f5; border-radius: 4px; -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1); box-shadow: inset 0 1px 2px rgba(0, 0, 0, .1); } .progress-bar { float: left; width: 0; height: 100%; font-size: 12px; line-height: 20px; color: #fff; text-align: center; background-color: #337ab7; -webkit-box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15); box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .15); -webkit-transition: width .6s ease; -o-transition: width .6s ease; transition: width .6s ease; } .progress-striped .progress-bar, .progress-bar-striped { background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent); background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent); background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent); -webkit-background-size: 40px 40px; background-size: 40px 40px; } .progress.active .progress-bar, .progress-bar.active { -webkit-animation: progress-bar-stripes 2s linear infinite; -o-animation: progress-bar-stripes 2s linear infinite; animation: progress-bar-stripes 2s linear infinite; } .progress-bar-success { background-color: #5cb85c; } .progress-striped .progress-bar-success { background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent); background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent); background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent); } .progress-bar-info { background-color: #5bc0de; } .progress-striped .progress-bar-info { background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent); background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent); background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent); } .progress-bar-warning { background-color: #f0ad4e; } .progress-striped .progress-bar-warning { background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent); background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent); background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent); } .progress-bar-danger { background-color: #d9534f; } .progress-striped .progress-bar-danger { background-image: -webkit-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent); background-image:      -o-linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent); background-image:         linear-gradient(45deg, rgba(255, 255, 255, .15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, .15) 50%, rgba(255, 255, 255, .15) 75%, transparent 75%, transparent); } .media { margin-top: 15px; } .media:first-child { margin-top: 0; } .media, .media-body { overflow: hidden; zoom: 1; } .media-body { width: 10000px; } .media-object { display: block; } .media-object.img-thumbnail { max-width: none; } .media-right, .media > .pull-right { padding-left: 10px; } .media-left, .media > .pull-left { padding-right: 10px; } .media-left, .media-right, .media-body { display: table-cell; vertical-align: top; } .media-middle { vertical-align: middle; } .media-bottom { vertical-align: bottom; } .media-heading { margin-top: 0; margin-bottom: 5px; } .media-list { padding-left: 0; list-style: none; } .list-group { padding-left: 0; margin-bottom: 20px; } .list-group-item { position: relative; display: block; padding: 10px 15px; margin-bottom: -1px; background-color: #fff; border: 1px solid #ddd; } .list-group-item:first-child { border-top-left-radius: 4px; border-top-right-radius: 4px; } .list-group-item:last-child { margin-bottom: 0; border-bottom-right-radius: 4px; border-bottom-left-radius: 4px; } a.list-group-item, button.list-group-item { color: #555; } a.list-group-item .list-group-item-heading, button.list-group-item .list-group-item-heading { color: #333; } a.list-group-item:hover, button.list-group-item:hover, a.list-group-item:focus, button.list-group-item:focus { color: #555; text-decoration: none; background-color: #f5f5f5; } button.list-group-item { width: 100%; text-align: left; } .list-group-item.disabled, .list-group-item.disabled:hover, .list-group-item.disabled:focus { color: #777; cursor: not-allowed; background-color: #eee; } .list-group-item.disabled .list-group-item-heading, .list-group-item.disabled:hover .list-group-item-heading, .list-group-item.disabled:focus .list-group-item-heading { color: inherit; } .list-group-item.disabled .list-group-item-text, .list-group-item.disabled:hover .list-group-item-text, .list-group-item.disabled:focus .list-group-item-text { color: #777; } .list-group-item.active, .list-group-item.active:hover, .list-group-item.active:focus { z-index: 2; color: #fff; background-color: #337ab7; border-color: #337ab7; } .list-group-item.active .list-group-item-heading, .list-group-item.active:hover .list-group-item-heading, .list-group-item.active:focus .list-group-item-heading, .list-group-item.active .list-group-item-heading > small, .list-group-item.active:hover .list-group-item-heading > small, .list-group-item.active:focus .list-group-item-heading > small, .list-group-item.active .list-group-item-heading > .small, .list-group-item.active:hover .list-group-item-heading > .small, .list-group-item.active:focus .list-group-item-heading > .small { color: inherit; } .list-group-item.active .list-group-item-text, .list-group-item.active:hover .list-group-item-text, .list-group-item.active:focus .list-group-item-text { color: #c7ddef; } .list-group-item-success { color: #3c763d; background-color: #dff0d8; } a.list-group-item-success, button.list-group-item-success { color: #3c763d; } a.list-group-item-success .list-group-item-heading, button.list-group-item-success .list-group-item-heading { color: inherit; } a.list-group-item-success:hover, button.list-group-item-success:hover, a.list-group-item-success:focus, button.list-group-item-success:focus { color: #3c763d; background-color: #d0e9c6; } a.list-group-item-success.active, button.list-group-item-success.active, a.list-group-item-success.active:hover, button.list-group-item-success.active:hover, a.list-group-item-success.active:focus, button.list-group-item-success.active:focus { color: #fff; background-color: #3c763d; border-color: #3c763d; } .list-group-item-info { color: #31708f; background-color: #d9edf7; } a.list-group-item-info, button.list-group-item-info { color: #31708f; } a.list-group-item-info .list-group-item-heading, button.list-group-item-info .list-group-item-heading { color: inherit; } a.list-group-item-info:hover, button.list-group-item-info:hover, a.list-group-item-info:focus, button.list-group-item-info:focus { color: #31708f; background-color: #c4e3f3; } a.list-group-item-info.active, button.list-group-item-info.active, a.list-group-item-info.active:hover, button.list-group-item-info.active:hover, a.list-group-item-info.active:focus, button.list-group-item-info.active:focus { color: #fff; background-color: #31708f; border-color: #31708f; } .list-group-item-warning { color: #8a6d3b; background-color: #fcf8e3; } a.list-group-item-warning, button.list-group-item-warning { color: #8a6d3b; } a.list-group-item-warning .list-group-item-heading, button.list-group-item-warning .list-group-item-heading { color: inherit; } a.list-group-item-warning:hover, button.list-group-item-warning:hover, a.list-group-item-warning:focus, button.list-group-item-warning:focus { color: #8a6d3b; background-color: #faf2cc; } a.list-group-item-warning.active, button.list-group-item-warning.active, a.list-group-item-warning.active:hover, button.list-group-item-warning.active:hover, a.list-group-item-warning.active:focus, button.list-group-item-warning.active:focus { color: #fff; background-color: #8a6d3b; border-color: #8a6d3b; } .list-group-item-danger { color: #a94442; background-color: #f2dede; } a.list-group-item-danger, button.list-group-item-danger { color: #a94442; } a.list-group-item-danger .list-group-item-heading, button.list-group-item-danger .list-group-item-heading { color: inherit; } a.list-group-item-danger:hover, button.list-group-item-danger:hover, a.list-group-item-danger:focus, button.list-group-item-danger:focus { color: #a94442; background-color: #ebcccc; } a.list-group-item-danger.active, button.list-group-item-danger.active, a.list-group-item-danger.active:hover, button.list-group-item-danger.active:hover, a.list-group-item-danger.active:focus, button.list-group-item-danger.active:focus { color: #fff; background-color: #a94442; border-color: #a94442; } .list-group-item-heading { margin-top: 0; margin-bottom: 5px; } .list-group-item-text { margin-bottom: 0; line-height: 1.3; } .panel { margin-bottom: 20px; background-color: #fff; border: 1px solid transparent; border-radius: 4px; -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05); box-shadow: 0 1px 1px rgba(0, 0, 0, .05); } .panel-body { padding: 15px; } .panel-heading { padding: 10px 15px; border-bottom: 1px solid transparent; border-top-left-radius: 3px; border-top-right-radius: 3px; } .panel-heading > .dropdown .dropdown-toggle { color: inherit; } .panel-title { margin-top: 0; margin-bottom: 0; font-size: 16px; color: inherit; } .panel-title > a, .panel-title > small, .panel-title > .small, .panel-title > small > a, .panel-title > .small > a { color: inherit; } .panel-footer { padding: 10px 15px; background-color: #f5f5f5; border-top: 1px solid #ddd; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px; } .panel > .list-group, .panel > .panel-collapse > .list-group { margin-bottom: 0; } .panel > .list-group .list-group-item, .panel > .panel-collapse > .list-group .list-group-item { border-width: 1px 0; border-radius: 0; } .panel > .list-group:first-child .list-group-item:first-child, .panel > .panel-collapse > .list-group:first-child .list-group-item:first-child { border-top: 0; border-top-left-radius: 3px; border-top-right-radius: 3px; } .panel > .list-group:last-child .list-group-item:last-child, .panel > .panel-collapse > .list-group:last-child .list-group-item:last-child { border-bottom: 0; border-bottom-right-radius: 3px; border-bottom-left-radius: 3px; } .panel > .panel-heading + .panel-collapse > .list-group .list-group-item:first-child { border-top-left-radius: 0; border-top-right-radius: 0; } .panel-heading + .list-group .list-group-item:first-child { border-top-width: 0; } .list-group + .panel-footer { border-top-width: 0; } .panel > .table, .panel > .table-responsive > .table, .panel > .panel-collapse > .table { margin-bottom: 0; } .panel > .table caption, .panel > .table-responsive > .table caption, .panel > .panel-collapse > .table caption { padding-right: 15px; padding-left: 15px; } .panel > .table:first-child, .panel > .table-responsive:first-child > .table:first-child { border-top-left-radius: 3px; border-top-right-radius: 3px; } .panel > .table:first-child > thead:first-child > tr:first-child, .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child, .panel > .table:first-child > tbody:first-child > tr:first-child, .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child { border-top-left-radius: 3px; border-top-right-radius: 3px; } .panel > .table:first-child > thead:first-child > tr:first-child td:first-child, .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:first-child, .panel > .table:first-child > tbody:first-child > tr:first-child td:first-child, .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:first-child, .panel > .table:first-child > thead:first-child > tr:first-child th:first-child, .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:first-child, .panel > .table:first-child > tbody:first-child > tr:first-child th:first-child, .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:first-child { border-top-left-radius: 3px; } .panel > .table:first-child > thead:first-child > tr:first-child td:last-child, .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child td:last-child, .panel > .table:first-child > tbody:first-child > tr:first-child td:last-child, .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child td:last-child, .panel > .table:first-child > thead:first-child > tr:first-child th:last-child, .panel > .table-responsive:first-child > .table:first-child > thead:first-child > tr:first-child th:last-child, .panel > .table:first-child > tbody:first-child > tr:first-child th:last-child, .panel > .table-responsive:first-child > .table:first-child > tbody:first-child > tr:first-child th:last-child { border-top-right-radius: 3px; } .panel > .table:last-child, .panel > .table-responsive:last-child > .table:last-child { border-bottom-right-radius: 3px; border-bottom-left-radius: 3px; } .panel > .table:last-child > tbody:last-child > tr:last-child, .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child, .panel > .table:last-child > tfoot:last-child > tr:last-child, .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child { border-bottom-right-radius: 3px; border-bottom-left-radius: 3px; } .panel > .table:last-child > tbody:last-child > tr:last-child td:first-child, .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:first-child, .panel > .table:last-child > tfoot:last-child > tr:last-child td:first-child, .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:first-child, .panel > .table:last-child > tbody:last-child > tr:last-child th:first-child, .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:first-child, .panel > .table:last-child > tfoot:last-child > tr:last-child th:first-child, .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:first-child { border-bottom-left-radius: 3px; } .panel > .table:last-child > tbody:last-child > tr:last-child td:last-child, .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child td:last-child, .panel > .table:last-child > tfoot:last-child > tr:last-child td:last-child, .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child td:last-child, .panel > .table:last-child > tbody:last-child > tr:last-child th:last-child, .panel > .table-responsive:last-child > .table:last-child > tbody:last-child > tr:last-child th:last-child, .panel > .table:last-child > tfoot:last-child > tr:last-child th:last-child, .panel > .table-responsive:last-child > .table:last-child > tfoot:last-child > tr:last-child th:last-child { border-bottom-right-radius: 3px; } .panel > .panel-body + .table, .panel > .panel-body + .table-responsive, .panel > .table + .panel-body, .panel > .table-responsive + .panel-body { border-top: 1px solid #ddd; } .panel > .table > tbody:first-child > tr:first-child th, .panel > .table > tbody:first-child > tr:first-child td { border-top: 0; } .panel > .table-bordered, .panel > .table-responsive > .table-bordered { border: 0; } .panel > .table-bordered > thead > tr > th:first-child, .panel > .table-responsive > .table-bordered > thead > tr > th:first-child, .panel > .table-bordered > tbody > tr > th:first-child, .panel > .table-responsive > .table-bordered > tbody > tr > th:first-child, .panel > .table-bordered > tfoot > tr > th:first-child, .panel > .table-responsive > .table-bordered > tfoot > tr > th:first-child, .panel > .table-bordered > thead > tr > td:first-child, .panel > .table-responsive > .table-bordered > thead > tr > td:first-child, .panel > .table-bordered > tbody > tr > td:first-child, .panel > .table-responsive > .table-bordered > tbody > tr > td:first-child, .panel > .table-bordered > tfoot > tr > td:first-child, .panel > .table-responsive > .table-bordered > tfoot > tr > td:first-child { border-left: 0; } .panel > .table-bordered > thead > tr > th:last-child, .panel > .table-responsive > .table-bordered > thead > tr > th:last-child, .panel > .table-bordered > tbody > tr > th:last-child, .panel > .table-responsive > .table-bordered > tbody > tr > th:last-child, .panel > .table-bordered > tfoot > tr > th:last-child, .panel > .table-responsive > .table-bordered > tfoot > tr > th:last-child, .panel > .table-bordered > thead > tr > td:last-child, .panel > .table-responsive > .table-bordered > thead > tr > td:last-child, .panel > .table-bordered > tbody > tr > td:last-child, .panel > .table-responsive > .table-bordered > tbody > tr > td:last-child, .panel > .table-bordered > tfoot > tr > td:last-child, .panel > .table-responsive > .table-bordered > tfoot > tr > td:last-child { border-right: 0; } .panel > .table-bordered > thead > tr:first-child > td, .panel > .table-responsive > .table-bordered > thead > tr:first-child > td, .panel > .table-bordered > tbody > tr:first-child > td, .panel > .table-responsive > .table-bordered > tbody > tr:first-child > td, .panel > .table-bordered > thead > tr:first-child > th, .panel > .table-responsive > .table-bordered > thead > tr:first-child > th, .panel > .table-bordered > tbody > tr:first-child > th, .panel > .table-responsive > .table-bordered > tbody > tr:first-child > th { border-bottom: 0; } .panel > .table-bordered > tbody > tr:last-child > td, .panel > .table-responsive > .table-bordered > tbody > tr:last-child > td, .panel > .table-bordered > tfoot > tr:last-child > td, .panel > .table-responsive > .table-bordered > tfoot > tr:last-child > td, .panel > .table-bordered > tbody > tr:last-child > th, .panel > .table-responsive > .table-bordered > tbody > tr:last-child > th, .panel > .table-bordered > tfoot > tr:last-child > th, .panel > .table-responsive > .table-bordered > tfoot > tr:last-child > th { border-bottom: 0; } .panel > .table-responsive { margin-bottom: 0; border: 0; } .panel-group { margin-bottom: 20px; } .panel-group .panel { margin-bottom: 0; border-radius: 4px; } .panel-group .panel + .panel { margin-top: 5px; } .panel-group .panel-heading { border-bottom: 0; } .panel-group .panel-heading + .panel-collapse > .panel-body, .panel-group .panel-heading + .panel-collapse > .list-group { border-top: 1px solid #ddd; } .panel-group .panel-footer { border-top: 0; } .panel-group .panel-footer + .panel-collapse .panel-body { border-bottom: 1px solid #ddd; } .panel-default { border-color: #ddd; } .panel-default > .panel-heading { color: #333; background-color: #f5f5f5; border-color: #ddd; } .panel-default > .panel-heading + .panel-collapse > .panel-body { border-top-color: #ddd; } .panel-default > .panel-heading .badge { color: #f5f5f5; background-color: #333; } .panel-default > .panel-footer + .panel-collapse > .panel-body { border-bottom-color: #ddd; } .panel-primary { border-color: #337ab7; } .panel-primary > .panel-heading { color: #fff; background-color: #337ab7; border-color: #337ab7; } .panel-primary > .panel-heading + .panel-collapse > .panel-body { border-top-color: #337ab7; } .panel-primary > .panel-heading .badge { color: #337ab7; background-color: #fff; } .panel-primary > .panel-footer + .panel-collapse > .panel-body { border-bottom-color: #337ab7; } .panel-success { border-color: #d6e9c6; } .panel-success > .panel-heading { color: #3c763d; background-color: #dff0d8; border-color: #d6e9c6; } .panel-success > .panel-heading + .panel-collapse > .panel-body { border-top-color: #d6e9c6; } .panel-success > .panel-heading .badge { color: #dff0d8; background-color: #3c763d; } .panel-success > .panel-footer + .panel-collapse > .panel-body { border-bottom-color: #d6e9c6; } .panel-info { border-color: #bce8f1; } .panel-info > .panel-heading { color: #31708f; background-color: #d9edf7; border-color: #bce8f1; } .panel-info > .panel-heading + .panel-collapse > .panel-body { border-top-color: #bce8f1; } .panel-info > .panel-heading .badge { color: #d9edf7; background-color: #31708f; } .panel-info > .panel-footer + .panel-collapse > .panel-body { border-bottom-color: #bce8f1; } .panel-warning { border-color: #faebcc; } .panel-warning > .panel-heading { color: #8a6d3b; background-color: #fcf8e3; border-color: #faebcc; } .panel-warning > .panel-heading + .panel-collapse > .panel-body { border-top-color: #faebcc; } .panel-warning > .panel-heading .badge { color: #fcf8e3; background-color: #8a6d3b; } .panel-warning > .panel-footer + .panel-collapse > .panel-body { border-bottom-color: #faebcc; } .panel-danger { border-color: #ebccd1; } .panel-danger > .panel-heading { color: #a94442; background-color: #f2dede; border-color: #ebccd1; } .panel-danger > .panel-heading + .panel-collapse > .panel-body { border-top-color: #ebccd1; } .panel-danger > .panel-heading .badge { color: #f2dede; background-color: #a94442; } .panel-danger > .panel-footer + .panel-collapse > .panel-body { border-bottom-color: #ebccd1; } .embed-responsive { position: relative; display: block; height: 0; padding: 0; overflow: hidden; } .embed-responsive .embed-responsive-item, .embed-responsive iframe, .embed-responsive embed, .embed-responsive object, .embed-responsive video { position: absolute; top: 0; bottom: 0; left: 0; width: 100%; height: 100%; border: 0; } .embed-responsive-16by9 { padding-bottom: 56.25%; } .embed-responsive-4by3 { padding-bottom: 75%; } .well { min-height: 20px; padding: 19px; margin-bottom: 20px; background-color: #f5f5f5; border: 1px solid #e3e3e3; border-radius: 4px; -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05); box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05); } .well blockquote { border-color: #ddd; border-color: rgba(0, 0, 0, .15); } .well-lg { padding: 24px; border-radius: 6px; } .well-sm { padding: 9px; border-radius: 3px; } .close { float: right; font-size: 21px; font-weight: bold; line-height: 1; color: #000; text-shadow: 0 1px 0 #fff; filter: alpha(opacity=20); opacity: .2; } .close:hover, .close:focus { color: #000; text-decoration: none; cursor: pointer; filter: alpha(opacity=50); opacity: .5; } button.close { -webkit-appearance: none; padding: 0; cursor: pointer; background: transparent; border: 0; } .modal-open { overflow: hidden; } .modal { position: fixed; top: 0; right: 0; bottom: 0; left: 0; z-index: 1050; display: none; overflow: hidden; -webkit-overflow-scrolling: touch; outline: 0; } .modal.fade .modal-dialog { -webkit-transition: -webkit-transform .3s ease-out; -o-transition:      -o-transform .3s ease-out; transition:         transform .3s ease-out; -webkit-transform: translate(0, -25%); -ms-transform: translate(0, -25%); -o-transform: translate(0, -25%); transform: translate(0, -25%); } .modal.in .modal-dialog { -webkit-transform: translate(0, 0); -ms-transform: translate(0, 0); -o-transform: translate(0, 0); transform: translate(0, 0); } .modal-open .modal { overflow-x: hidden; overflow-y: auto; } .modal-dialog { position: relative; width: auto; margin: 10px; } .modal-content { position: relative; background-color: #fff; -webkit-background-clip: padding-box; background-clip: padding-box; border: 1px solid #999; border: 1px solid rgba(0, 0, 0, .2); border-radius: 6px; outline: 0; -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5); box-shadow: 0 3px 9px rgba(0, 0, 0, .5); } .modal-backdrop { position: fixed; top: 0; right: 0; bottom: 0; left: 0; z-index: 1040; background-color: #000; } .modal-backdrop.fade { filter: alpha(opacity=0); opacity: 0; } .modal-backdrop.in { filter: alpha(opacity=50); opacity: .5; } .modal-header { padding: 15px; border-bottom: 1px solid #e5e5e5; } .modal-header .close { margin-top: -2px; } .modal-title { margin: 0; line-height: 1.42857143; } .modal-body { position: relative; padding: 15px; } .modal-footer { padding: 15px; text-align: right; border-top: 1px solid #e5e5e5; } .modal-footer .btn + .btn { margin-bottom: 0; margin-left: 5px; } .modal-footer .btn-group .btn + .btn { margin-left: -1px; } .modal-footer .btn-block + .btn-block { margin-left: 0; } .modal-scrollbar-measure { position: absolute; top: -9999px; width: 50px; height: 50px; overflow: scroll; } @media (min-width: 768px) { .modal-dialog { width: 600px; margin: 30px auto; } .modal-content { -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5); box-shadow: 0 5px 15px rgba(0, 0, 0, .5); } .modal-sm { width: 300px; } } @media (min-width: 992px) { .modal-lg { width: 900px; } } .tooltip { position: absolute; z-index: 1070; display: block; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 12px; font-style: normal; font-weight: normal; line-height: 1.42857143; text-align: left; text-align: start; text-decoration: none; text-shadow: none; text-transform: none; letter-spacing: normal; word-break: normal; word-spacing: normal; word-wrap: normal; white-space: normal; filter: alpha(opacity=0); opacity: 0; line-break: auto; } .tooltip.in { filter: alpha(opacity=90); opacity: .9; } .tooltip.top { padding: 5px 0; margin-top: -3px; } .tooltip.right { padding: 0 5px; margin-left: 3px; } .tooltip.bottom { padding: 5px 0; margin-top: 3px; } .tooltip.left { padding: 0 5px; margin-left: -3px; } .tooltip-inner { max-width: 200px; padding: 3px 8px; color: #fff; text-align: center; background-color: #000; border-radius: 4px; } .tooltip-arrow { position: absolute; width: 0; height: 0; border-color: transparent; border-style: solid; } .tooltip.top .tooltip-arrow { bottom: 0; left: 50%; margin-left: -5px; border-width: 5px 5px 0; border-top-color: #000; } .tooltip.top-left .tooltip-arrow { right: 5px; bottom: 0; margin-bottom: -5px; border-width: 5px 5px 0; border-top-color: #000; } .tooltip.top-right .tooltip-arrow { bottom: 0; left: 5px; margin-bottom: -5px; border-width: 5px 5px 0; border-top-color: #000; } .tooltip.right .tooltip-arrow { top: 50%; left: 0; margin-top: -5px; border-width: 5px 5px 5px 0; border-right-color: #000; } .tooltip.left .tooltip-arrow { top: 50%; right: 0; margin-top: -5px; border-width: 5px 0 5px 5px; border-left-color: #000; } .tooltip.bottom .tooltip-arrow { top: 0; left: 50%; margin-left: -5px; border-width: 0 5px 5px; border-bottom-color: #000; } .tooltip.bottom-left .tooltip-arrow { top: 0; right: 5px; margin-top: -5px; border-width: 0 5px 5px; border-bottom-color: #000; } .tooltip.bottom-right .tooltip-arrow { top: 0; left: 5px; margin-top: -5px; border-width: 0 5px 5px; border-bottom-color: #000; } .popover { position: absolute; top: 0; left: 0; z-index: 1060; display: none; max-width: 276px; padding: 1px; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-weight: normal; line-height: 1.42857143; text-align: left; text-align: start; text-decoration: none; text-shadow: none; text-transform: none; letter-spacing: normal; word-break: normal; word-spacing: normal; word-wrap: normal; white-space: normal; background-color: #fff; -webkit-background-clip: padding-box; background-clip: padding-box; border: 1px solid #ccc; border: 1px solid rgba(0, 0, 0, .2); border-radius: 6px; -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, .2); box-shadow: 0 5px 10px rgba(0, 0, 0, .2); line-break: auto; } .popover.top { margin-top: -10px; } .popover.right { margin-left: 10px; } .popover.bottom { margin-top: 10px; } .popover.left { margin-left: -10px; } .popover-title { padding: 8px 14px; margin: 0; font-size: 14px; background-color: #f7f7f7; border-bottom: 1px solid #ebebeb; border-radius: 5px 5px 0 0; } .popover-content { padding: 9px 14px; } .popover > .arrow, .popover > .arrow:after { position: absolute; display: block; width: 0; height: 0; border-color: transparent; border-style: solid; } .popover > .arrow { border-width: 11px; } .popover > .arrow:after { content: ""; border-width: 10px; } .popover.top > .arrow { bottom: -11px; left: 50%; margin-left: -11px; border-top-color: #999; border-top-color: rgba(0, 0, 0, .25); border-bottom-width: 0; } .popover.top > .arrow:after { bottom: 1px; margin-left: -10px; content: " "; border-top-color: #fff; border-bottom-width: 0; } .popover.right > .arrow { top: 50%; left: -11px; margin-top: -11px; border-right-color: #999; border-right-color: rgba(0, 0, 0, .25); border-left-width: 0; } .popover.right > .arrow:after { bottom: -10px; left: 1px; content: " "; border-right-color: #fff; border-left-width: 0; } .popover.bottom > .arrow { top: -11px; left: 50%; margin-left: -11px; border-top-width: 0; border-bottom-color: #999; border-bottom-color: rgba(0, 0, 0, .25); } .popover.bottom > .arrow:after { top: 1px; margin-left: -10px; content: " "; border-top-width: 0; border-bottom-color: #fff; } .popover.left > .arrow { top: 50%; right: -11px; margin-top: -11px; border-right-width: 0; border-left-color: #999; border-left-color: rgba(0, 0, 0, .25); } .popover.left > .arrow:after { right: 1px; bottom: -10px; content: " "; border-right-width: 0; border-left-color: #fff; } .carousel { position: relative; } .carousel-inner { position: relative; width: 100%; overflow: hidden; } .carousel-inner > .item { position: relative; display: none; -webkit-transition: .6s ease-in-out left; -o-transition: .6s ease-in-out left; transition: .6s ease-in-out left; } .carousel-inner > .item > img, .carousel-inner > .item > a > img { line-height: 1; } @media all and (transform-3d), (-webkit-transform-3d) { .carousel-inner > .item { -webkit-transition: -webkit-transform .6s ease-in-out; -o-transition:      -o-transform .6s ease-in-out; transition:         transform .6s ease-in-out; -webkit-backface-visibility: hidden; backface-visibility: hidden; -webkit-perspective: 1000px; perspective: 1000px; } .carousel-inner > .item.next, .carousel-inner > .item.active.right { left: 0; -webkit-transform: translate3d(100%, 0, 0); transform: translate3d(100%, 0, 0); } .carousel-inner > .item.prev, .carousel-inner > .item.active.left { left: 0; -webkit-transform: translate3d(-100%, 0, 0); transform: translate3d(-100%, 0, 0); } .carousel-inner > .item.next.left, .carousel-inner > .item.prev.right, .carousel-inner > .item.active { left: 0; -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); } } .carousel-inner > .active, .carousel-inner > .next, .carousel-inner > .prev { display: block; } .carousel-inner > .active { left: 0; } .carousel-inner > .next, .carousel-inner > .prev { position: absolute; top: 0; width: 100%; } .carousel-inner > .next { left: 100%; } .carousel-inner > .prev { left: -100%; } .carousel-inner > .next.left, .carousel-inner > .prev.right { left: 0; } .carousel-inner > .active.left { left: -100%; } .carousel-inner > .active.right { left: 100%; } .carousel-control { position: absolute; top: 0; bottom: 0; left: 0; width: 15%; font-size: 20px; color: #fff; text-align: center; text-shadow: 0 1px 2px rgba(0, 0, 0, .6); background-color: rgba(0, 0, 0, 0); filter: alpha(opacity=50); opacity: .5; } .carousel-control.left { background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%); background-image:      -o-linear-gradient(left, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%); background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .5)), to(rgba(0, 0, 0, .0001))); background-image:         linear-gradient(to right, rgba(0, 0, 0, .5) 0%, rgba(0, 0, 0, .0001) 100%); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1); background-repeat: repeat-x; } .carousel-control.right { right: 0; left: auto; background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%); background-image:      -o-linear-gradient(left, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%); background-image: -webkit-gradient(linear, left top, right top, from(rgba(0, 0, 0, .0001)), to(rgba(0, 0, 0, .5))); background-image:         linear-gradient(to right, rgba(0, 0, 0, .0001) 0%, rgba(0, 0, 0, .5) 100%); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#80000000', GradientType=1); background-repeat: repeat-x; } .carousel-control:hover, .carousel-control:focus { color: #fff; text-decoration: none; filter: alpha(opacity=90); outline: 0; opacity: .9; } .carousel-control .icon-prev, .carousel-control .icon-next, .carousel-control .glyphicon-chevron-left, .carousel-control .glyphicon-chevron-right { position: absolute; top: 50%; z-index: 5; display: inline-block; margin-top: -10px; } .carousel-control .icon-prev, .carousel-control .glyphicon-chevron-left { left: 50%; margin-left: -10px; } .carousel-control .icon-next, .carousel-control .glyphicon-chevron-right { right: 50%; margin-right: -10px; } .carousel-control .icon-prev, .carousel-control .icon-next { width: 20px; height: 20px; font-family: serif; line-height: 1; } .carousel-control .icon-prev:before { content: '\2039'; } .carousel-control .icon-next:before { content: '\203a'; } .carousel-indicators { position: absolute; bottom: 10px; left: 50%; z-index: 15; width: 60%; padding-left: 0; margin-left: -30%; text-align: center; list-style: none; } .carousel-indicators li { display: inline-block; width: 10px; height: 10px; margin: 1px; text-indent: -999px; cursor: pointer; background-color: #000 \9; background-color: rgba(0, 0, 0, 0); border: 1px solid #fff; border-radius: 10px; } .carousel-indicators .active { width: 12px; height: 12px; margin: 0; background-color: #fff; } .carousel-caption { position: absolute; right: 15%; bottom: 20px; left: 15%; z-index: 10; padding-top: 20px; padding-bottom: 20px; color: #fff; text-align: center; text-shadow: 0 1px 2px rgba(0, 0, 0, .6); } .carousel-caption .btn { text-shadow: none; } @media screen and (min-width: 768px) { .carousel-control .glyphicon-chevron-left, .carousel-control .glyphicon-chevron-right, .carousel-control .icon-prev, .carousel-control .icon-next { width: 30px; height: 30px; margin-top: -10px; font-size: 30px; } .carousel-control .glyphicon-chevron-left, .carousel-control .icon-prev { margin-left: -10px; } .carousel-control .glyphicon-chevron-right, .carousel-control .icon-next { margin-right: -10px; } .carousel-caption { right: 20%; left: 20%; padding-bottom: 30px; } .carousel-indicators { bottom: 20px; } } .clearfix:before, .clearfix:after, .dl-horizontal dd:before, .dl-horizontal dd:after, .container:before, .container:after, .container-fluid:before, .container-fluid:after, .row:before, .row:after, .form-horizontal .form-group:before, .form-horizontal .form-group:after, .btn-toolbar:before, .btn-toolbar:after, .btn-group-vertical > .btn-group:before, .btn-group-vertical > .btn-group:after, .nav:before, .nav:after, .navbar:before, .navbar:after, .navbar-header:before, .navbar-header:after, .navbar-collapse:before, .navbar-collapse:after, .pager:before, .pager:after, .panel-body:before, .panel-body:after, .modal-header:before, .modal-header:after, .modal-footer:before, .modal-footer:after { display: table; content: " "; } .clearfix:after, .dl-horizontal dd:after, .container:after, .container-fluid:after, .row:after, .form-horizontal .form-group:after, .btn-toolbar:after, .btn-group-vertical > .btn-group:after, .nav:after, .navbar:after, .navbar-header:after, .navbar-collapse:after, .pager:after, .panel-body:after, .modal-header:after, .modal-footer:after { clear: both; } .center-block { display: block; margin-right: auto; margin-left: auto; } .pull-right { float: right !important; } .pull-left { float: left !important; } .hide { display: none !important; } .show { display: block !important; } .invisible { visibility: hidden; } .text-hide { font: 0/0 a; color: transparent; text-shadow: none; background-color: transparent; border: 0; } .hidden { display: none !important; } .affix { position: fixed; } @-ms-viewport { width: device-width; } .visible-xs, .visible-sm, .visible-md, .visible-lg { display: none !important; } .visible-xs-block, .visible-xs-inline, .visible-xs-inline-block, .visible-sm-block, .visible-sm-inline, .visible-sm-inline-block, .visible-md-block, .visible-md-inline, .visible-md-inline-block, .visible-lg-block, .visible-lg-inline, .visible-lg-inline-block { display: none !important; } @media (max-width: 767px) { .visible-xs { display: block !important; } table.visible-xs { display: table !important; } tr.visible-xs { display: table-row !important; } th.visible-xs, td.visible-xs { display: table-cell !important; } } @media (max-width: 767px) { .visible-xs-block { display: block !important; } } @media (max-width: 767px) { .visible-xs-inline { display: inline !important; } } @media (max-width: 767px) { .visible-xs-inline-block { display: inline-block !important; } } @media (min-width: 768px) and (max-width: 991px) { .visible-sm { display: block !important; } table.visible-sm { display: table !important; } tr.visible-sm { display: table-row !important; } th.visible-sm, td.visible-sm { display: table-cell !important; } } @media (min-width: 768px) and (max-width: 991px) { .visible-sm-block { display: block !important; } } @media (min-width: 768px) and (max-width: 991px) { .visible-sm-inline { display: inline !important; } } @media (min-width: 768px) and (max-width: 991px) { .visible-sm-inline-block { display: inline-block !important; } } @media (min-width: 992px) and (max-width: 1199px) { .visible-md { display: block !important; } table.visible-md { display: table !important; } tr.visible-md { display: table-row !important; } th.visible-md, td.visible-md { display: table-cell !important; } } @media (min-width: 992px) and (max-width: 1199px) { .visible-md-block { display: block !important; } } @media (min-width: 992px) and (max-width: 1199px) { .visible-md-inline { display: inline !important; } } @media (min-width: 992px) and (max-width: 1199px) { .visible-md-inline-block { display: inline-block !important; } } @media (min-width: 1200px) { .visible-lg { display: block !important; } table.visible-lg { display: table !important; } tr.visible-lg { display: table-row !important; } th.visible-lg, td.visible-lg { display: table-cell !important; } } @media (min-width: 1200px) { .visible-lg-block { display: block !important; } } @media (min-width: 1200px) { .visible-lg-inline { display: inline !important; } } @media (min-width: 1200px) { .visible-lg-inline-block { display: inline-block !important; } } @media (max-width: 767px) { .hidden-xs { display: none !important; } } @media (min-width: 768px) and (max-width: 991px) { .hidden-sm { display: none !important; } } @media (min-width: 992px) and (max-width: 1199px) { .hidden-md { display: none !important; } } @media (min-width: 1200px) { .hidden-lg { display: none !important; } } .visible-print { display: none !important; } @media print { .visible-print { display: block !important; } table.visible-print { display: table !important; } tr.visible-print { display: table-row !important; } th.visible-print, td.visible-print { display: table-cell !important; } } .visible-print-block { display: none !important; } @media print { .visible-print-block { display: block !important; } } .visible-print-inline { display: none !important; } @media print { .visible-print-inline { display: inline !important; } } .visible-print-inline-block { display: none !important; } @media print { .visible-print-inline-block { display: inline-block !important; } } @media print { .hidden-print { display: none !important; } }
         *                                               { margin: 0px; padding: 0px; box-sizing:border-box; }
         html                                            {scroll-behavior:smooth}
         body                                            { font-family: 'Poppins', sans-serif; color: #1c2530; overflow-x: hidden; font-size: 18px; line-height: 32px; }
         ul, ol                                          { list-style: none; }
         a                                               { text-decoration: none; transition: all 0.3s ease; }
         a:focus, a:hover                                { color: #23527c; text-decoration: underline; }
         .d-flex                                         { display: flex !important; }
         img ,amp-img                                            { max-width: 100%; height: auto; vertical-align: middle; border: 0; }
         .secondary-bg                                   { background-color: #f8faff !important; }
         h2 , .mid-h1                                    { font-size: 64px; line-height: 78px; font-weight: 900;}
         h1, h2, h3, h4, h5, h6                          { margin: 0px; font-family: 'Poppins', sans-serif;}
         h1 ,h2.big-h2                                   { font-size: 72px; font-weight: 700; line-height: 82px;}
         h2 strong                                       { color: #0487FF; font-weight: 900;}
         h1.medium,
         h3                                              { font-size: 48px; line-height: 64px; }
         h3                                              { font-weight: 900;}
         h1.small,
         .service-title h1,
         h4                                              { font-size: 40px; line-height: 50px;}
         h5                                              { font-size: 32px; line-height: 48px;}
         h6                                              { font-size: 20px; line-height: 28px; color: #666; text-transform: uppercase; font-weight: 400; letter-spacing: 1px;}
         p,
         ol,
         ul                                              { font-size: 18px; line-height: 32px;}
         small                                           { font-size: 14px; line-height: 24px; display: inline-block;}
         .common-section                                 { padding-top: 90px; padding-bottom: 90px;}
         .common-section-small                           { padding-top: 65px; padding-bottom: 65px;}
         .custom-saperator { height: 30px; visibility: hidden;}
         .pb-0                                           { padding-bottom:0 !important; }
         .pt-0                                           { padding-top:0 !important; }
         .pl-0                                           { padding-left:0 !important; }
         .pr-0                                           { padding-right:0 !important; }
         .mb-0                                           { margin-bottom:0 !important; }
         .row                                            { display:flex; flex-wrap:wrap; }
         .position-relative                              { position: relative !important; }
         .overflow-hidden                                { overflow:hidden !important; }
         /* Button Style Start */
         .btn-grp                                        { margin:0 -15px }
         .btn-grp a                                      { margin:15px }
         .theme-btn a .fireworks,.theme-btn button .fireworks,.theme-btn input .fireworks { position:absolute; top:-2px; left:-2px; border-radius:50px }
         .theme-btn a,.theme-btn button                  { padding:15px 30px; font-size:18px; line-height:18px; background:0 0; border:2px solid transparent; display:inline-block; text-transform:capitalize; border-radius:50px; text-decoration:none!important; transition-duration:.3s; -webkit-transition-duration:.3s; position:relative; cursor:pointer }
         .theme-btn.bordered-blue a                      { color:#0487ff; border-color:#0487ff }
         .theme-btn.bordered-blue a:hover,.theme-btn.bordered-blue button:hover  { background:#0487ff; color:#fff }
         .theme-btn.bordered-white a,.theme-btn.bordered-white button   { color:#fff; border-color:#fff }
         .theme-btn.bordered-white a:hover,.theme-btn.bordered-white button:hover   { background:#fff; color:#0487ff }
         .theme-btn.bordered-black a,.theme-btn.bordered-black button   { color:#1c2530; border-color:#1c2530 }
         .theme-btn.bordered-black a:hover,.theme-btn.bordered-black button:hover   { background:#1c2530; color:#fff }
         .theme-btn.solid-blue a,.theme-btn.solid-blue button  { color:#fff; border-color:#0487ff; background:#0487ff }
         .theme-btn.solid-blue a:hover,.theme-btn.solid-blue button:hover  { background:0 0; color:#0487ff }
         .theme-btn.solid-white a,.theme-btn.solid-white button  { color:#0C1D3D; border-color:#fff; background:#fff }
         .theme-btn.solid-white a:hover,.theme-btn.solid-white button:hover  { background:0 0; color:#fff }
         .theme-btn.solid-black a,.theme-btn.solid-black button  { color:#fff; border-color:#0C1D3D; background:#0C1D3D }
         .theme-btn.solid-black a:hover,.theme-btn.solid-black button:hover  { background:0 0; color:#0C1D3D }
         /* Button Style End */
         /* Header Style Start */
         .menu-item-has-children                         { position: relative; }
         .sub-menu                                       { overflow:visible; display:block; position:absolute; left:0; top:calc(100% - 2px); border-top:34px solid transparent; visibility:hidden; transition-duration:.3s; -webkit-transition-duration:.3s; opacity:0 }
         .hamburger                                      { position:relative; display:inline-block; vertical-align:middle; width:52px; height:52px; background:#fff; -webkit-touch-callout:none; -webkit-user-select:none; -moz-user-select:none; -ms-user-select:none; user-select:none; -webkit-transform:scale(1); transform:scale(1); cursor:pointer }
         .burger-main                                    { position:absolute; padding:12px; height:52px; width:52px }
         header.site-header                              { position:fixed; z-index:99999; width:100%; top:0; left:0 }
         .desktop-mega-header ul.menu>li>a:hover,.linebtn { color:#0d7cff }
         .main-header                                    { padding:15px; background:#fff; overflow:visible; display:flex; align-items:center; border-bottom:2px solid #efefef; transition:.3s ease-in-out; -webkit-transition:.3s ease-in-out }
         .main-header>div                                { width:100% }
         .primary-head-menu ul                           { margin-bottom:0 }
         .primary-head-menu ul>li                        { float:left; margin:0 22px }
         .primary-head-menu ul>li>a                      { text-transform:uppercase; font-size:16px; line-height:30px; color:#1c2530; font-weight:400; position:relative; display:block }
         .primary-head-menu ul.menu>li>a::after          { content:""; display:block; width:0; height:2px; background-color:#1c2530; position:absolute; bottom:0; left:0 }
         .primary-head-menu ul.menu>li.career-menu>a::after{ display:none }
         .primary-head-menu ul>li.current-menu-item>a::after,.primary-head-menu ul>li.current_page_item>a,.primary-head-menu ul>li.current_page_item>a::after{ width:100%; animation:none }
         .primary-head-menu ul>li.current-menu-item>a::after,.primary-head-menu ul>li.current_page_item>a::after{ background-color:#0487ff }
         .primary-head-menu ul>li:hover>a,.primary-head-menu ul>li>a:focus{ text-decoration:none }
         .primary-head-menu ul>li.current-menu-item>a,.primary-head-menu ul>li.current_page_item>a{ text-decoration:none; color:#0487ff }
         .menu-item-has-children>a::after                { max-width:calc(100% - 20px) }
         .main-header>div.primary-logo                   { width: auto; display: inline-block; flex-shrink:0; -webkit-flex-shrink:0; transition:.3s ease-in-out; -webkit-transition:.3s ease-in-out }
         .main-header>div.primary-logo a                 { width:100%; display:inline-block }
         .main-header > div.primary-logo amp-img             { width: 240px; height:61px; aspect-ratio: 1/0.20; }
         .desktop-mega-header.main-header                { padding:15px 32px; justify-content:space-between }
         .main-header.desktop-mega-header>div.desktop-primary-menu   { width:auto; display:flex; align-items:center }
         .desktop-mega-header .desktop-primary-menu li.service-megamenu .sub-menu   { top:100%; border-top:0; left:0; margin:0; max-width:100%; width:100%; background:#fff; box-shadow:0 5px 16px rgba(0,0,0,.09) }
         .desktop-mega-header li.service-megamenu .sub-menu li { width:100%; margin:0!important; float:none }
         .desktop-mega-header .what-we-do-submenu ul,.desktop-mega-header .what-we-do-submenu ul>li{ margin:0 }
         .desktop-mega-header .about-submenu .mega-sub-menu-wrapper,.desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper{ padding:20px 45px }
         .desktop-mega-header .about-submenu .mega-sub-menu-wrapper .main-service-cat, .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat{ text-decoration:none!important; margin-bottom:24px!important; display:inline-block; padding-bottom:2px; position:relative; font-family:Poppins; font-style:normal; font-weight:600; font-size:18px; line-height:30px; text-transform:capitalize; color:#0d7cff }
         .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat:hover{ color:#000!important }
         .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat:after{ content:''; position:absolute; bottom:0; left:0; width:165px; height:2px; background:#ededed }
         .desktop-mega-header .about-submenu .mega-sub-menu-wrapper .megamenu-item-icon,.desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .megamenu-item-icon{ width:24px; height:24px; border-radius:2px; background-color:#f0f7ff; display:flex; align-items:center; justify-content:center }
         .desktop-mega-header .about-submenu .service-sub-cat>li>a,.desktop-mega-header .what-we-do-submenu .service-sub-cat>li>a{ display:inline-flex; align-items:center }
         .desktop-mega-header .about-submenu .service-sub-cat>li>a:hover .megamenu-item-desc span,.desktop-mega-header .what-we-do-submenu .service-sub-cat>li>a:hover .megamenu-item-desc span{ color:#0d7cff!important }
         .desktop-mega-header .desktop-primary-menu li.about-megamenu .about-submenu .service-sub-cat>li,.desktop-mega-header .desktop-primary-menu li.service-megamenu .what-we-do-submenu .service-sub-cat>li{ margin-bottom:18px!important; line-height:1 }
         .desktop-mega-header .what-we-do-submenu .service-sub-cat>li:last-child,.desktop-mega-header .what-we-do-submenu .service-sub-cat>li:nth-last-child(2),.desktop-mega-header li.service-megamenu .sub-menu li .hire-dev-box>li:last-child{ margin-bottom:0!important }
         .desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc,.desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc{ margin-left:16px; line-height:27px }
         .desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc span,.desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc span{ font-size:18px; line-height:27px; font-weight:500; color:#000; text-transform:capitalize }
         .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper>ul   { display:grid; grid-template-columns:repeat(3,1fr); grid-gap:5px }
         .desktop-mega-header .menu-item-has-children>a  { padding-right:0; background:0 0 }
         .desktop-mega-header ul.menu>li.menu-item-has-children>a:after { bottom:-3px; max-width:100% }
         .desktop-mega-header ul.menu                    { display:flex; align-items:center; margin:0 }
         .desktop-mega-header ul.menu>li                 { margin:0 32px; float:none }
         .desktop-mega-header ul.menu>li>a               { margin:12px 0; text-transform:none; font-weight:400; font-size:18px; line-height:30px }
         .desktop-mega-header ul.menu>li.career-menu a   { display:block; color:#0487ff; padding:15px 30px; font-weight:600; font-size:18px; line-height:18px; border:2px solid #0487ff; border-radius:100px }
         .desktop-mega-header ul.menu>li.career-menu a:hover{ color:#fff; background:#0487ff }
         .desktop-mega-header ul.menu>li.career-menu     { margin-left:0; margin-right:0 }
         .desktop-mega-header .header-contactus          { margin-left:32px }
         .megamenu-left                                  { width:60% }
         .megamenu-right                                 { width:40%; display:flex; align-items:center }
         .hire-dev-rightbox                              { background:url('https://www.yudiz.com/wp-content/themes/yudiz/images/header-dev-sec-image.png') center center/cover no-repeat }
         .hire-dev-rightbox-overlay                      { position:relative }
         .hire-dev-rightbox-overlay:before               { content:''; position:absolute; left:0; top:0; background:linear-gradient(89.3deg,#000 18.37%,rgba(0,0,0,.33) 70.26%,rgba(0,0,0,0) 99.38%); width:100%; height:100% }
         .hire-develop-wrapper                           { position:relative; z-index:10; padding:20px 75px }
         .megamenu-right li                              { background:0 0 }
         .desktop-mega-header li.service-megamenu .sub-menu li .hire-dev-box>li { display:flex; margin-bottom:114px!important }
         .hire-dev-box .hire-icon-box                    { width:40px; height:40px; margin-right:12px; border-radius:2px; background-color:#fff; display:flex; align-items:center; justify-content:center }
         .hire-desc-box                                  { width:calc(100% - 52px) }
         .hire-desc-box h5                               { margin-bottom:2px; font-weight:500; font-size:24px; line-height:39px; color:#000 }
         .hire-desc-box p                                { margin-bottom:4px; font-size:16px; line-height:170%; font-weight:400 }
         .linebtn                                        { font-size:16px; line-height:26px; font-weight:500; display:flex; align-items:center }
         .linebtn img                                    { margin-left:5px }
         .hire-dev-rightbox-overlay .hire-desc-box h5,.hire-dev-rightbox-overlay .hire-desc-box p{ color:#fff }
         .desktop-mega-header .desktop-primary-menu li.product-megamenu .sub-menu   { top:100%; border-top:0; left:auto; right:10px; margin:0; max-width:81%; width:auto; background:#fff; box-shadow:0 5px 16px rgba(0,0,0,.09) }
         .desktop-mega-header .desktop-primary-menu li.product-megamenu .sub-menu>li   { margin:0; float:none }
         .our-product-wrapper                            { display:flex; width:100% }
         .our-product-wrapper .product-wrapper-left      { padding:0; width:calc(100% - 30%) }
         .our-product-wrapper .product-wrapper-right     { padding:20px 32px; background-color:#f0f7ff; width:30% }
         .our-product-wrapper .product-wrapper-left>ul   { display:grid; grid-template-columns:repeat(3,1fr); margin:0; height:100% }
         .our-product-wrapper .product-wrapper-left>ul>li   { height:377px; margin:0!important }
         .our-product-wrapper ul>li                      { float:none; position:relative; margin:0!important }
         .hire-dev-box                                   { margin:0!important }
         .our-product-wrapper ul>li .product-detail-box  { padding:20px; height:100%; width:100%; background-repeat:no-repeat; background-position:center; background-size:cover; display:flex; align-items:center; justify-content:center; text-align:center }
         .our-product-wrapper ul>li .product-detail-box .img-box  { height:150px; display:flex; align-items:center; justify-content:center }
         .our-product-wrapper ul>li .product-detail-box .img-box img { max-height:100%; max-width:100% }
         .product-detail-hoverbox                        { position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,.8); z-index:2; opacity:0; visibility:hidden; transition:.3s linear; transform:scale(.2); display:flex; align-items:center; justify-content:center }
         .our-product-wrapper ul>li:hover .product-detail-hoverbox { opacity:1; visibility:visible; transform:scale(1) }
         .our-product-wrapper ul>li .product-detail-box p   { margin-top:28px; font-weight:500; font-size:16px; line-height:170%; color:#fff }
         .visitlink                                      { padding:4px 42px; background:#fff; border-radius:100px; font-weight:400; font-size:18px; line-height:30px; color:#000; text-align:center; text-decoration:none!important }
         .desktop-mega-header .desktop-primary-menu li.about-megamenu,.desktop-mega-header .desktop-primary-menu li.product-megamenu,.desktop-mega-header .desktop-primary-menu li.service-megamenu{ position:unset }
         @keyframes border {
            0% { transform: scaleX(1); transform-origin: right; } 50% { transform: scaleX(0); transform-origin: right; } 50.01% { transform: scaleX(0); transform-origin: left; } 100% { transform: scaleX(1); transform-origin: left; }
         }
         @-webkit-keyframes border {
            0% { transform: scaleX(1); transform-origin: right; } 50% { transform: scaleX(0); transform-origin: right; } 50.01% { transform: scaleX(0); transform-origin: left; } 100% { transform: scaleX(1); transform-origin: left; }
         }
         .menu-item-has-children:hover a:hover + .sub-menu, .sub-menu:hover { visibility: visible; opacity: 1; }
         .desktop-mega-header .desktop-primary-menu li.about-megamenu .sub-menu { margin-top: 0; top: 100%; border-top: 0; left: 32%; right: 10px; margin: 0 !important; max-width: 55%; width: auto; background: #FFFFFF; box-shadow: 0px 5px 16px rgb(0 0 0 / 9%); }
         .hamburger                                      { position: relative; display: inline-block; vertical-align: middle; width: 52px; height: 52px; background: #fff; -webkit-touch-callout: none; -webkit-user-select: none; -moz-user-select: none; -ms-user-select: none; user-select: none; -webkit-transform: scale(1); transform: scale(1); cursor: pointer;}
         .burger-main                                    { position: absolute; padding: 12px; height: 52px; width: 52px;}
         .burger-inner                                   { position: relative; height: 26px; width: 28px;}
         .burger-main span                               { position: absolute; display: block; height: 2px; width: 28px; border-radius: 2px; background: #1c2530;}
         .hamburger.open .burger-main span               { background: #0487FF;}
         .top                                            { top: 2px; transform-origin: 30px 2px;}
         .bot                                            { bottom: 2px; transform-origin: 28px 2px;}
         .mid                                            { top: 12px;}
         .common-padding-small                           { padding-block:60px; }
         .title-bx                                       { margin-bottom:32px; text-align:center; }
         .under-line                                     {  position: relative; display:inline-block; }
         .under-line:after                               { content:""; position: absolute; left:0; bottom:0; height:19px; width:100%; background:#CEE5FB;  }
         .under-line span                                { position: relative; z-index: 2; }
         .title-box h3                                   { color: var(--secondary, #0C1D3D); font-family: Montserrat; font-size: 60px; font-weight: 800; line-height: 72px;  }
         .title-box h3 strong                            { font-weight: 800;   }
         p.big-p                                         { color: rgba(0, 0, 0, 0.80); font-family: Poppins; font-size: 22px; font-weight: 400; line-height: 38px; } /* Header Style End */
         .container                                      { position: relative; z-index:5; }
         /*============================ Banner Section Start ================================ */
        /* hire dedicated page css starts */
         .dedicated-banner-section                       { position: relative; padding: 90px 0px 63px; background:#F8F9FD url('https://www.yudiz.com/wp-content/uploads/2023/09/banner-bg-image.jpg') no-repeat bottom left / cover; color: #fff; }
         .dedicated-banner-section:before                { content:""; position: absolute; left:0; top:0; width:100%; height:100%; background-color:rgba(0, 6, 28,0.86); }
         .dedicated-banner-section:after                 { content:""; position: absolute; left:0; bottom:-1px; width:100%; height:160px; background:url('https://www.yudiz.com/wp-content/uploads/2023/09/bottom-cloud-shape.png')no-repeat center center/cover; }
         .hire-dedicated-banner-img                      { position:absolute; top:0; left:0; width:100%; height:100%; object-fit:cover; object-position:center; z-index:-1; }
         .banner-text-box                                { margin-top:70px; }
         .banner-text-box h1                             { margin-bottom:24px; line-height: 1.28125; font-weight: 700; font-family: "Montserrat"; color: #FFFFFF;  }
         .banner-text-box h1 strong                      { color:#0487FF; }
         .banner-text-box p                              { margin-bottom:0px; max-width:100%; font-size: 22px; line-height: 38px; font-weight: 400;  color: rgba(255,255,255,0.8); }
         .banner-text-box .theme-btn                      { display:none; }
         .pattern-shape-img amp-img                      { position: absolute; }
         .banner-plane                                   { position: absolute; bottom: 3%; left: 33%; z-index: 8; } 
         /* hire dedicated page css ends */
         /*============================ Banner Section End ================================ */
         /* Client Section Start */
         .client-section-content                         { display:flex;  }
         .client-box                                     {  width:calc(100% / 5); display:flex; align-items:center; justify-content:center; border:1px solid #F0F0F2; border-right:0; padding-block:17px; text-align:center; }
         .client-box:last-child                          { border-right:1px solid #F0F0F2;}
         .client-section-box h5                          { color: #0C1D3D; font-family: Poppins; font-size: 32px; font-weight: 600; line-height: 48px;  }
         /* Client Section End */
         /* Cta Section Start */
         .cta-section h4                                 { margin-bottom:32px; color: #0C1D3D; text-align: center; font-family: Montserrat; font-size: 50px; font-weight: 800; line-height: 65px;  }
         .cta-section p                                  { margin-bottom:40px; margin-inline:auto; max-width:60%; }
         .cta-sparrow                                    { top: 43%; transform: translateY(-50%);  }
         .cta-first-right                                { right:0; top:50%;  transform: translateY(-50%);}
         .bottom-cloud:before                            { content:''; position: absolute; bottom:-1px; width:100%; height:33px; background:url('https://www.yudiz.com/wp-content/uploads/2023/09/bottom-cloud-small.png')no-repeat center center/cover;  }
         .cta-shape-right                                { right:18%; bottom:17%; }
         .cta-last .cta-first-right                      { top:60%; }
         /* Cta Section End */
         /* Advantages Section Start */
         .advantages-content .title-box                  { margin-bottom:32px; }
         .advantages-content p                           { color:#516385; }
         .ed-ad-list                                     { margin-top:24px; display:flex; align-items:center; flex-wrap:wrap; }
         .ed-ad-list li                                  { width:calc(100%/2); padding-left:32px; margin-bottom:24px; position: relative; color: rgba(0, 0, 0, 0.80); font-family: Poppins; font-size: 18px; font-weight: 400; line-height: 30px;  }
         .ed-ad-list li:before                           { content:url(https://www.yudiz.com/wp-content/uploads/2023/09/right-arrow.png); position:absolute; left:0; top:49%; transform:translateY(-50%); width:27px; height:27px; background:#6B8DDC; border-radius:50%; display:flex; align-items:center; justify-content:center; }
         .ed-ad-list li:nth-child(2):before              { background:#00A3A1;  }
         .ed-ad-list li:nth-child(3):before              { background:#FF7525;  }
         .ed-ad-list li:nth-child(4):before              { background:#FFB438;  }
         .ed-ad-list li:nth-child(5):before              { background:#FF5C8D;  }
         .ed-ad-list li:nth-child(6):before              { background:#BB4DFF;  }
         .spiner-ic                                      { top:25%; left:2%; }
         .ed-ad-cross                                     { right:3%; top:5%;}
         .jug-ic                                         { right:12%; bottom:2%; }
         /* Advantages Section End */
         /* Hiring Model Section Start */
         .hiring-mod-content                             { margin-top:86px; }
         .hire-box                                       { position:relative; margin-inline:15px; border-radius: 33px; padding:0 32px 58px; background:#E6F6F6; }
         .tit-hire                                       { margin-inline:auto; transform:translateY(-50%); padding:10px;  width:190px; display:flex; align-items:center; justify-content:center; border-radius: 15px; background: #1EA7DC; }
         .tit-hire h5                                    { color: #FFF; font-family: Poppins; font-size: 24px; font-weight: 600; line-height: 32px;  }
         .hire-con-list                                  { margin-top:30px; }
         .hire-con-list li                               { margin-bottom:38px; position:relative; padding-left:57px; color: rgba(0, 0, 0, 0.80); font-family: Poppins; font-size: 18px; font-weight: 400; line-height: 30px; /* 166.667% */ }
         .hire-con-list li:last-child                    { margin-bottom:0; }
         .hire-con-list li:before                        { content:''; background:url('https://www.yudiz.com/wp-content/uploads/2023/09/black-arrows.png')no-repeat center center/cover; position:absolute; left:0; top:49%; transform:translateY(-50%); width:44px; height:44px;  }
         .hire-wrap:nth-child(2) .hire-box               { background:#FFF1BD;  }
         .hire-wrap:last-child() .hire-box               { background:#FFEFFA; }
         .hire-wrap:nth-child(2) .tit-hire               { background:#FFA83D;  }
         .hire-wrap:last-child() .tit-hire               { background:#D87FC4; }
         .hiring-mod-content .theme-btn                  { margin-top:40px; }
         .hiring-sparrow                                 { left:0; top:0; }
         .hiring-bat                                     { left:0; bottom:0; }
         .hiring-rat                                     { right:0; bottom:0; }
         /* Hiring Model Section End */
         /* other service Section Start */
         .other-service-section                          { background:#F5F2D4; }
         .other-service-section:before                   { content:''; position: absolute; top:2px; left:50%; transform:translate(-50% , -100%); width:100%; height:98px; background:url('https://www.yudiz.com/wp-content/uploads/2023/09/other-ser-shape-top.svg')no-repeat center center/auto 100%;  }
         .other-service-list                             { display:flex; align-items:center; flex-wrap:wrap; justify-content:center;  margin-top:60px; }
         .other-service-list li                          { padding-inline:30px; margin-bottom:60px; width:calc(100%/3); }
         .ser-list-box                                   { padding:16px 10px; border-radius: 23px; background: #FFF; }
         .serv-border-box                                { display:flex; align-items:center; padding:16px 24px; border-radius: 23px; border: 2px dashed #44B9DF; background: #FFF; }
         .serv-border-box .img-box                       { width:59px; height:59px; border-radius: 50%; background: #19A9D7; display:flex; align-items:center; justify-content:center; }
         .serv-border-box h5                             { margin-left:16px; width:calc(100% - 75px);  color: #0C1D3D; font-family: Poppins; font-size: 24px; font-weight: 600; line-height: 32px; }
         .other-ser-person                               { left:0; bottom:0; }
         .other-ser-pot                                  { right:0; bottom:0; }
         /* other service Section End */
         /* Testimoial Section Start */
         .testimony-content                              { margin-top:60px; text-align:center; }
         .testimony-box .testimony-desc                  { position: relative; padding:56px 40px 40px; border-radius: 30px; background: #FF7598;}
         .testimony-wrap:nth-child(2) .testimony-desc    { background:#19A9D7; } 
         .testimony-wrap:nth-child(3) .testimony-desc    { background:#FFA91F; }
         .testimony-box .testimony-desc:after            { content:''; position: absolute; left:13%; bottom:0; transform:translateY(100%); width:35px; height:49px; background:url('https://www.yudiz.com/wp-content/uploads/2023/09/testi-shape-pink.png')no-repeat center center/cover; }
         .testimony-wrap:nth-child(2) .testimony-desc:after { background-image:url('https://www.yudiz.com/wp-content/uploads/2023/09/testi-shape-blue.png'); }
         .testimony-wrap:nth-child(3) .testimony-desc:after { background-image:url('https://www.yudiz.com/wp-content/uploads/2023/09/testi-shape-yellow.png'); }
         .testimony-box .testimony-desc p                { text-align:left; position: relative; z-index:1; color: #FFF; font-family: Poppins; font-size: 20px; font-weight: 400; line-height: 32px;  }
         .testimony-box .testimony-desc p:before         { content:''; z-index: -1; position: absolute; left:0; top:-5%; width:75px; height:62px; background:url('https://www.yudiz.com/wp-content/uploads/2023/09/testimony-pink.png')no-repeat center center/cover;  }
         .testimony-wrap:nth-child(2) .testimony-desc p:before { background-image:url('https://www.yudiz.com/wp-content/uploads/2023/09/testimony-blue.png'); } 
         .testimony-wrap:nth-child(3) .testimony-desc p:before { background-image:url('https://www.yudiz.com/wp-content/uploads/2023/09/testimony-yellow.png'); } 
         .testimony-logo                                 { margin-top:52px; display:inline-block; padding:15px 38px; border-radius: 72px; border: 2px solid #FF7598; }
         .testimony-wrap:nth-child(2) .testimony-logo    { border-color:#19A9D7; } 
         .testimony-wrap:nth-child(3) .testimony-logo    { border-color:#FFA91F; }
         /* Testimoial Section End */
         /* Service Section Start */
         .service-content-box                            { border-radius: 16px; padding:40px; text-align:center; }
         .service-content-box .service-desc              { margin-top:32px; }
         .service-content-box .service-desc h5           { margin-bottom:24px; font-family: Poppins; font-size: 24px; line-height: 32px;  font-weight: 600; }
         .service-content-box .service-desc p            { color: #9F6E62; text-align: center; font-family: Poppins; font-size: 18px; line-height: 30px; font-weight: 400; }
         .color-orange                                   { background: #FDE9E4; }
         .color-orange h5                                { color: #FF543A; }
         .color-violet                                   { background: #EDEAFF; }
         .color-violet h5                                { color: #786ACF; }
         .color-green                                   { background: #DEFDFA; }
         .color-green h5                                { color: #0CC0AF;}
         .service-testimonial-content .i-amphtml-carousel-slotted { padding:0 20px; }
         .service-testimonial-content .i-amphtml-base-carousel-arrow { position:relative; margin:0; width:40px; height:40px; border-radius:50%; border:2px solid #0487FF;  }
         .service-testimonial-content .i-amphtml-base-carousel-arrow:hover { background:#0487FF; }
         .service-testimonial-content .i-amphtml-base-carousel-arrow:hover:before { filter: brightness(0) invert(1); -webkit-filter: brightness(0) invert(1); }
         .service-testimonial-content .i-amphtml-base-carousel-arrow:before { content:''; position:absolute; background:url('https://www.yudiz.com/wp-content/uploads/2023/09/arrow-left-service.svg')no-repeat center center/cover; left:50%; top:50%; transform:translate(-50%,-50%); width:21px; height:18px; }
         .service-testimonial-content .i-amphtml-base-carousel-arrow-next-slot {right: -60px;  }
         .service-testimonial-content .i-amphtml-base-carousel-arrow-prev-slot { left: -60px; }
         .service-testimonial-content .i-amphtml-base-carousel-arrow-next-slot .i-amphtml-base-carousel-arrow:before { transform: scaleX(-1) translate(50%,-50%); }
         .service-testimonial-content .i-amphtml-base-carousel-arrow > div { display:none;  }
         .service-testimonial-content .i-amphtml-base-carousel-arrow .i-amphtml-base-carousel-arrow-icon{ display:none; }
         .service-testimonial-content .i-amphtml-layout-size-defined { overflow:visible !important; }
         .book-ic                                        { top:50%; left:2%; }
         .small-star                                       {  top:29%; right:12%;}
         .bright-star                                    { bottom:6%; right:7%; }
         /* Service Section End */
         /*=========  ========*/
         #get-in-touch-scroll                            { text-align:center; background: #f8faff !important;}
         #get-in-touch-scroll                            { padding-top: 60px; padding-bottom: 60px; position: relative; background: transparent; overflow: hidden; }
         #get-in-touch-scroll:before,
         #get-in-touch-scroll:after                      { position: absolute; left: 0; top: 0; height: 100%; width: 250%; display: block; content: "";}
         #get-in-touch-scroll .get-project-section       { position: relative; z-index: 50; }
         #get-in-touch-scroll:before                     { top: 8%; background: url('https://www.yudiz.com/wp-content/themes/yudiz/images/get-in-touch-cloud-strip.webp') repeat-x top center / 50% auto; animation: get-in-touch-bg-scroll 120s linear infinite; -webkit-animation: get-in-touch-bg-scroll 120s linear infinite; opacity: 0.8;}
         #get-in-touch-scroll:after                      { background: url('https://www.yudiz.com/wp-content/themes/yudiz/images/get-in-touch-building-strip.png') repeat-x center bottom / 25% auto; animation: get-in-touch-bg-scroll 64s linear infinite; -webkit-animation: get-in-touch-bg-scroll 64s linear infinite;}
         @keyframes get-in-touch-bg-scroll {0% { left: 0%;} 100% { left: -125%;}}
         @-webkit-keyframes get-in-touch-bg-scroll {0% { left: 0%;} 100% { left: -125%;}}
         /* Accordiun Style */
         .faq-amp-section h3  { color: #0C1D3D; font-family: Montserrat; font-size: 42px; font-weight: 800; line-height: 62px; /* 147.619% */ }
         .accordion { margin-top: 30px;}
         .accordion dt p { margin-bottom:0; padding: 32px 30px 32px 0px; position: relative; border:0; display: block; color: #1c2530; text-decoration: none;}
         .accordion dt p:before,
         .accordion dt p:after { height: 3px; width:18px; content: ""; display: block; background: #1c2530; position: absolute; right: 0; top: 50%; transform-origin: center center; -webkit-transform-origin: center center; transform: translateY(-50%); -webkit-transform: translateY(-50%); transition-duration: 0.3s; -webkit-transition-duration: 0.3s;}
         .accordion dt p:before {transform: translateY(-50%) rotate(-90deg); -wenkit-transform: translateY(-50%) rotate(-90deg);}
         .accordion > section[expanded] dt p:before,
         .accordion > section[expanded] dt p:after { background: #0487FF;}
         .accordion > section[expanded] dt p:before { transform: translateY(-50%) rotate(0deg); -wenkit-transform: translateY(-50%) rotate(0deg); }
         .accordion > section[expanded] dt p {  color: #0487FF;}
         .accordion > section { border-bottom: 1px solid rgba(28, 37, 48, 0.3); }
         .accordion dt { font-weight: 600;}
         .accordion dd { padding: 15px 0px; opacity: 0.8;}
         .accordion .i-amphtml-accordion-header { cursor: pointer; background-color: transparent; padding-right: 0; border: none; }
         .accordion dd ul ,.accordion dd ol{ padding-left: 20px; }
         .accordion dd ul li { list-style-type: disc; }
         .accordion dd ol li { list-style-type: decimal; }
         /* Exp[ertis] */
         /* Form Start */
         .hire-form-section { background:#0C1D3D; }
         .hire-form-section h4 { color:#fff; }
         .amp-form-section label { display: block; margin-bottom: 8px; font-size: 16px; line-height: 18px; color: #2d4152; opacity: .72; font-weight: 500; }
         .amp-form-section .form-control { padding: 20px; box-shadow:none; height:auto; display:block; background-color: transparent; appearance: none; -webkit-appearance: none; border-radius: 0; font-size: 18px; font-weight: 500; line-height: 22px; color: #1c2530; width: 100%;  border: 2px solid #D6D7DB; border-radius: 10px; }
         .amp-form-section .form-group { margin-bottom:40px; }
         [visible-when-invalid] { font-size:12px; }
         .amp-form-section .form-control:focus { border-color:#0487FF; }
         .amp-form-section textarea { resize:none; height:150px; }
         /* Form End */
         /* Hire Blockchain Page Start */
         /* Banner Section */
         .form-section                          { max-width:708px; margin-left:auto; padding:50px 40px; background: #FFFFFF; box-shadow: -2px 20px 100px 0px rgba(0, 0, 0, 0.12); border-radius: 8px; position:relative; z-index: 55; }
         .form-section .heading-box h2          { margin-bottom:16px; font-weight: 600; color: #141D2A; font-size: 32px; line-height: 40px; font-family: 'Montserrat'; }
         .form-section .heading-box p           { font-family: 'Poppins'; font-style: normal; font-weight: 400; font-size: 22px; line-height: 38px; color: #516385;  }
         .form-section form                     { margin-top:40px; }
         .form-section form label               { margin-bottom:8px; font-family: 'Poppins'; font-style: normal; font-weight: 600; font-size: 20px; line-height: 30px; color: #424952; }
         /* project Slider Section Start */
         form.amp-form-submit-success [submit-success] { background: green; padding: 4px 16px; }
         form.amp-form-submit-error [submit-error] { background: red; padding: 4px 16px; }
         /* Hire Blockchain page end  */
         /* Portfolio section start */
         .portfolio-content .i-amphtml-base-carousel-arrows { display:none; }
         .portfolio-content                     { position:relative; left:calc(50% - (1590px/2)); }
         .portfolio-content figure              { position:relative;  padding-inline:20px; }
         .portfolio-content figure amp-img:after { content:''; position:absolute; left:0; top:0; width:100%; height:100%; border-radius: 30px; background: linear-gradient(181deg, rgba(0, 0, 0, 0.00) 52.22%, rgba(0, 0, 0, 0.62) 102.56%); }
         .portfolio-content figure  amp-img     { position:relative; overflow:hidden; border-radius: 30px; } 
         .portfolio-content figure h5           { position:absolute; margin-left:48px; margin-bottom:24px; left:0; bottom:0; color: #FFF; font-family: Poppins; font-size: 24px; font-weight: 600; line-height: 32px; }
         
         /* Responsive style */
         @media(min-width: 1400px) and (max-width: 1599px) {
            .container                                            { width: 1300px; }
            /* Header Style Start */
            /* New Deskyop Menu */
            .desktop-mega-header.main-header                      { padding:15px 26px; }
            .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper ,.desktop-mega-header .about-submenu .mega-sub-menu-wrapper { padding:12px 30px; }
            .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat ,.desktop-mega-header .about-submenu .mega-sub-menu-wrapper .main-service-cat{ margin-bottom: 16px !important; padding-bottom: 2px; font-size: 15px; line-height:24px; }
            .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat:after ,.desktop-mega-header .about-submenu .mega-sub-menu-wrapper .main-service-cat:after{ width: 120px; height:2px; }
            .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .megamenu-item-icon,.desktop-mega-header .about-submenu .mega-sub-menu-wrapper .megamenu-item-icon { width: 22px; height: 22px; border-radius: 2px; }
            .desktop-mega-header .desktop-primary-menu li.service-megamenu .what-we-do-submenu .service-sub-cat > li ,.desktop-mega-header .desktop-primary-menu li.about-megamenu .mega-sub-menu-wrapper .service-sub-cat > li{ margin-bottom: 16px !important; }
            .desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc,.desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc { margin-left:12px; line-height: 24px; }
            .desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc span,.desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc span { font-size: 15px; line-height: 22px; }
            .desktop-mega-header ul.menu > li.menu-item-has-children > a:after { bottom:-3px; }
            .desktop-mega-header ul.menu > li                     { margin:0 22px; }
            .desktop-mega-header ul.menu > li > a                 { margin:12px 0; }
            .desktop-mega-header ul.menu > li.career-menu a       { margin-left: 22px; }
            .desktop-mega-header .header-contactus                { margin-left: 22px; }
            .megamenu-left                                        { width:65%; }
            .megamenu-right                                       { width:35%; }
            .hire-develop-wrapper                                 { padding:12px 50px; }
            .desktop-mega-header li.service-megamenu .sub-menu li .hire-dev-box > li{ margin-bottom: 70px !important; }
            .hire-dev-box .hire-icon-box                          { width: 35px; height: 35px; margin-right:10px; }
            .hire-desc-box                                        { width:calc(100% - 45px); }
            .hire-desc-box h5                                     { margin-bottom:2px; font-size: 20px; line-height: 30px; }
            .hire-desc-box p                                      { margin-bottom: 3px; font-size: 15px; line-height: 170%; }
            .linebtn                                              { font-size: 15px; line-height: 22px; }
            .linebtn img                                          { margin-left: 4px; }
            /* Header Style End */
            /* Form Start */
            .amp-form-section label                               { margin-bottom: 6px; font-size: 16px; line-height: 20px;  }
            .amp-form-section .form-control                       { padding: 20px; font-size: 16px; line-height: 20px;  }
            .amp-form-section .form-group                         { margin-bottom:30px; }
            /* Form End */
            /* Banner Section */
            .banner-text-box p                                    { font-size: 20px; line-height: 34px; } 
            .form-section                                         { padding: 28px 24px;   }
            .form-section .heading-box h2                         { margin-bottom: 16px; font-size: 26px; line-height: 36px;}
            .form-section .heading-box p                          { font-size: 20px; line-height:24px; }
            .form-section form                                    { margin-top:30px; }
            .form-section form label                              { margin-bottom:8px;  font-size: 18px; line-height: 24px;  }
            .banner-plane                                         { max-width:18%; }
            .common-padding-small                                 { padding-block:50px; }
            .title-bx                                             { margin-bottom:24px;  }
            .under-line:after                                     { height:14px; }
            .title-box h3                                         { font-size: 50px; line-height:62px;  }
            p.big-p                                               { font-size: 20px; line-height: 34px; } 
            /* Client Section Start */
            .client-box                                           {  width:calc(100% / 5);  padding-block:15px; }
            .client-section-box h5                                { font-size: 28px; line-height: 42px;  }
            /* Client Section End */
            /* Cta Section Start */
            .cta-section h4                                       { margin-bottom:28px; font-size: 40px; line-height: 55px;  }
            .cta-section p                                        { margin-bottom:30px;  max-width:80%; }
            .cta-sparrow                                          { top: 43%;   width:10%; }
            .cta-first-right                                      { right:0; top:50%; width:15%; }
            .bottom-cloud:before                                  { bottom:-1px; width:100%; height:33px;  }
            .cta-shape-right                                      { right:18%; bottom:17%; width:12%; }
            .cta-last .cta-first-right                            { top:60%; width:12%;}
            .cta-last                                             { background-size: 100% auto!important; }
            /* Cta Section End */
            /* Advantages Section Start */
            .advantages-content .title-box                  { margin-bottom:28px; }
            .ed-ad-list                                     { margin-top:24px;}
            .ed-ad-list li                                  { width:calc(100%/2); padding-left:30px; margin-bottom:20px; font-size: 18px;  line-height: 30px;  }
            .ed-ad-list li:before                           {  top:46%;  width:25px; height:25px;  }
            /* Advantages Section End */
            /* Hiring Model Section Start */
            .hiring-mod-content                             { margin-top:86px; }
            .hire-box                                       { margin-inline:10px; border-radius: 30px; padding:0 20px 40px;  }
            .tit-hire                                       {  padding:8px; width:180px;  }
            .tit-hire h5                                    { font-size: 20px; line-height: 30px;  }
            .hire-con-list                                  { margin-top:24px; }
            .hire-con-list li                               { margin-bottom:28px;  padding-left:40px; font-size: 18px;  line-height: 30px; }
            .hire-con-list li:before                        { width:26px; height:26px;  }
            .hiring-mod-content .theme-btn                  { margin-top:30px; }
            .hiring-sparrow ,.hiring-bat ,.hiring-rat       { width:12%; }
            /* Hiring Model Section End */
            /* other service Section Start */
            .other-service-section:before                   { top:23px; left:50%; width:77%; }
            .other-service-list                             { margin-top:50px; }
            .other-service-list li                          { padding-inline:20px; margin-bottom:35px; width:calc(100%/3); }
            .ser-list-box                                   { padding:12px 10px; border-radius: 23px; }
            .serv-border-box                                { padding:12px 20px; border-radius: 23px; }
            .serv-border-box .img-box                       { width:50px; height:50px; }
            .serv-border-box h5                             { margin-left:12px; width:calc(100% - 62px);  font-size: 20px;  line-height: 30px; }
            .other-ser-person                               { width:10%;}
            .other-ser-pot                                  { width:8%; }
            /* other service Section End */
            /* Testimoial Section Start */
            .testimony-content                              { margin-top:50px;}
            .testimony-box .testimony-desc                  { padding:46px 28px 30px; min-height:406px; }
            .testimony-box .testimony-desc:after            { left:13%; width:27px; height:38px;  }
            .testimony-box .testimony-desc p                { font-size: 20px; line-height: 32px;  }
            .testimony-box .testimony-desc p:before         { top:-5%; width:56px; height:43px;  }
            .testimony-logo                                 { margin-top:40px; padding:8px 20px; border-radius: 60px;}
            .testimony-logo amp-img                         { max-width:70%; }
            /* Testimoial Section End */
            /* Service Section Start */
            .service-content-box                               { padding:30px;  }
            .service-content-box .service-desc                 { margin-top:24px; }
            .service-content-box .service-desc h5              { margin-bottom:16px; font-size: 22px; line-height: 32px;  }
            .service-content-box .service-desc p               { font-size: 16px; line-height: 24px; }
            .service-testimonial-content .i-amphtml-carousel-slotted { padding:0 14px; }
            .service-testimonial-content .i-amphtml-base-carousel-arrow {  width:30px; height:30px;  }
            .service-testimonial-content .i-amphtml-base-carousel-arrow:before {  width: 15px; height: 12px; }
            .service-testimonial-content .i-amphtml-base-carousel-arrow-next-slot {right: -40px;  }
            .service-testimonial-content .i-amphtml-base-carousel-arrow-prev-slot { left: -40px; }
            .service-img-logo amp-img                          { width:60px; }
            .service-testimonial-content amp-base-carousel     { height: 432px !important; }
            /* Service Section End */
           
         }
         @media(min-width: 1200px) and (max-width: 1599px) {
            /* Typography */
            h1 ,h2.big-h2                                               { font-size: 60px; line-height: 70px;}
            h2 , .mid-h1                                                { font-size: 46px; line-height: 60px;}
            h1.medium,
            h3                                                          { font-size: 42px; line-height: 50px;}
            h1.small,
            .service-title h1,
            h4                                                          { font-size: 32px; line-height: 42px;}
            h5                                                          { font-size: 26px; line-height: 34px;}
            h6                                                          { font-size: 20px; line-height: 24px;}
            .common-section                                             { padding-top: 85px; padding-bottom: 85px;}
            .common-section-small                                       { padding-top: 55px; padding-bottom: 55px;}
            .custom-saperator                                           { height: 25px;}
            /* Header Style ============================= */
            /* primary header */
            .primary-head-menu ul > li                                  { margin: 0px 10px; }
            .primary-head-menu ul > li > a                              { font-size: 13px; }
            /* Sub Menu Style */
            .sub-menu-wrapper                                           { max-width: 978px; }
            .sub-menu-wrapper ul li                                     { max-width: 326px; }
            .sub-menu-wrapper ul li a                                   { padding: 15px; }
            .sub-menu-wrapper ul li .menu-item-icon                     { width: 50px; }
            .sub-menu-wrapper ul li .menu-item-icon img                 { max-height: 50px; }
            .sub-menu-wrapper ul li .menu-item-desc                     { padding-left: 10px; width: calc(100% - 50px); }
            .technology-dev-sec                                         { padding:80px 0;  }
            /* Form Start */
            .amp-form-section label { margin-bottom: 6px; font-size: 16px; line-height: 20px;  }
            .amp-form-section .form-control { padding: 13px; font-size: 16px; line-height: 20px;  }
            .amp-form-section .form-group { margin-bottom:16px; }
            /* Form End */
             /* Portfolio section start */
            .portfolio-content                     { left:calc(50% - (1300px/2)); }
            .portfolio-content figure              {  padding-inline:16px; }
            .portfolio-content figure  amp-img     {  border-radius: 30px; } 
            .portfolio-content figure h5           { margin-left:38px; margin-bottom:20px;  font-size: 22px; line-height: 32px; }
            .portfolio-content amp-base-carousel   { height:500px !important; }
            /* Responsive style */
            }
         @media(min-width: 1200px) and (max-width: 1399px) {
            h2, .mid-h1                                           { font-size: 42px; line-height: 60px; }
            /* New Deskyop Menu */
            .desktop-mega-header.main-header                      { padding:15px 22px; }
            .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper ,.desktop-mega-header .about-submenu .mega-sub-menu-wrapper { padding:12px 30px; }
            .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat,.desktop-mega-header .about-submenu .mega-sub-menu-wrapper .main-service-cat{ margin-bottom: 12px !important; padding-bottom: 4px; font-size: 14px; line-height:22px; }
            .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat:after { width: 100px; height:2px; }
            .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .megamenu-item-icon ,.desktop-mega-header .about-submenu .mega-sub-menu-wrapper .megamenu-item-icon{ width: 22px; height: 22px; border-radius: 2px; }
            .desktop-mega-header .desktop-primary-menu li.service-megamenu .what-we-do-submenu .service-sub-cat > li ,.desktop-mega-header .desktop-primary-menu li.about-megamenu .about-submenu .service-sub-cat > li{ margin-bottom: 12px !important; }
            .desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc,.desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc { margin-left:10px; line-height: 22px; }
            .desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc span ,.desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc span{ font-size: 14px; line-height: 20px; }
            .desktop-mega-header ul.menu > li.menu-item-has-children > a:after { bottom:-3px; }
            .desktop-mega-header ul.menu > li                     { margin:0 14px; }
            .desktop-mega-header ul.menu > li > a                 { margin:6px 0; font-size: 14px; line-height: 20px; }
            .desktop-mega-header ul.menu > li.career-menu a       { margin-left: 14px; }
            .desktop-mega-header .header-contactus                { margin-left: 14px; }
            .megamenu-left                                        { width:65%; }
            .megamenu-right                                       { width:35%; }
            .hire-develop-wrapper                                 { padding:12px 30px; }
            .desktop-mega-header li.service-megamenu .sub-menu li .hire-dev-box > li{ margin-bottom: 40px !important; }
            .hire-dev-box .hire-icon-box                          { width: 35px; height: 35px; margin-right:10px; }
            .hire-desc-box                                        { width:calc(100% - 45px); }
            .hire-desc-box h5                                     { margin-bottom:2px; font-size: 18px; line-height: 28px; }
            .hire-desc-box p                                      { margin-bottom: 3px; font-size: 14px; line-height: 150%; }
            .linebtn                                              { font-size: 14px; line-height: 20px; }
            .linebtn img                                          { margin-left: 4px; }
            /* hire dedicated page css starts */
               .dedicated-banner-section                                {  padding: 50px 0px;   }
               .banner-text-box h1                                      { margin-bottom:28px;  }
               .banner-text-box p                                       { margin-bottom:28px; max-width:80%; font-size: 20px; line-height: 38px; }
               /* hire dedicated page css ends */
               /* Form Start */
               .amp-form-section label { margin-bottom: 6px; font-size: 16px; line-height: 20px;  }
               .amp-form-section .form-control { padding: 10px; font-size: 16px; line-height: 20px;  }
               .amp-form-section .form-group { margin-bottom:20px; }
               /* Form End */
               /* Banner Section */
               .dedicated-banner-section                 { padding: 60px 0px 70px; }
               .banner-text-box h6                              { font-size: 20px; line-height: 32px; }
            .banner-text-box p                               { max-width:100%; font-size: 19px; line-height: 32px;  } 
            .form-section                                   { padding: 30px 24px;   }
            .form-section .heading-box h2                   { margin-bottom: 12px; font-size: 24px; line-height: 36px;}
            .form-section .heading-box p                    { font-size: 16px; line-height:22px; }
            .form-section form                              { margin-top:24px; }
            .form-section form label                        { margin-bottom:8px;  font-size: 18px; line-height: 24px;  }
            .dedicated-banner-section:after                       { height:100px; }
            .banner-plane                                         { max-width:18%; }
            .common-padding-small                                 { padding-block:40px; }
            .title-bx                                             { margin-bottom:20px;  }
            .under-line:after                                     { height:12px; }
            .title-box h3                                         { font-size: 40px; line-height:52px;  }
            p.big-p                                               { font-size: 18px; line-height: 32px; } 
            /* Client Section Start */
            .client-box                                           {  width:calc(100% / 5);  padding-block:10px; }
            .client-section-box h5                                { font-size: 24px; line-height: 38px;  }
            /* Client Section End */
            /* Cta Section Start */
            .cta-section h4                                       { margin-bottom:24px; font-size: 30px; line-height: 45px;  }
            .cta-section p                                        { margin-bottom:30px;  max-width:80%; }
            .cta-sparrow                                          { top: 40%; width:8%; }
            .cta-first-right                                      { right:0; top:50%; width:12%; }
            .bottom-cloud:before                                  { bottom:-1px; width:100%; height:20px;  }
            .cta-shape-right                                      { right:18%; bottom:17%; width:4%; }
            .cta-last .cta-first-right                            { top:60%; width:10%;}
            .cta-last                                             { background-size: 100% auto!important; }
            /* Cta Section End */
            /* Advantages Section Start */
            .advantages-content .title-box                  { margin-bottom:24px; }
            .ed-ad-list                                     { margin-top:20px;}
            .ed-ad-list li                                  { width:calc(100%/2); padding-left:30px; margin-bottom:15px; font-size: 16px;  line-height: 24px;  }
            .ed-ad-list li:before                           {  top:46%;  width:20px; height:20px;  }
            /* Advantages Section End */
            /* Hiring Model Section Start */
            .hiring-mod-content                             { margin-top:66px; }
            .hire-box                                       { margin-inline:10px; border-radius: 30px; padding:0 18px 36px;  }
            .tit-hire                                       {  padding:8px; width:170px;  }
            .tit-hire h5                                    { font-size: 18px; line-height: 28px;  }
            .hire-con-list                                  { margin-top:20px; }
            .hire-con-list li                               { margin-bottom:24px;  padding-left:30px; font-size: 16px;  line-height: 24px; }
            .hire-con-list li:before                        { width:24px; height:24px; }
            .hiring-mod-content .theme-btn                  { margin-top:24px; }
            .hiring-sparrow ,.hiring-bat ,.hiring-rat       { width:12%; }
            /* Hiring Model Section End */
            /* other service Section Start */
            .other-service-section:before                   { top:38px; left:50%; width:77%; }
            .other-service-list                             { margin-top:40px; }
            .other-service-list li                          { padding-inline:12px; margin-bottom:30px; width:calc(100%/3); }
            .ser-list-box                                   { padding:10px 8px; border-radius: 20px; }
            .serv-border-box                                { padding:10px 16px; border-radius: 20px; }
            .serv-border-box .img-box                       { width:40px; height:40px; }
            .serv-border-box .img-box amp-img               { width:25px; }
            .serv-border-box h5                             { margin-left:12px; width:calc(100% - 52px);  font-size: 18px;  line-height: 28px; }
            .other-ser-person                               { width:10%;}
            .other-ser-pot                                  { width:8%; }
            /* other service Section End */
            /* Testimoial Section Start */
            .testimony-content                              { margin-top:40px;}
            .testimony-box .testimony-desc                  { padding:36px 20px 20px; min-height:348px;}
            .testimony-box .testimony-desc:after            { left:13%; width:27px; height:38px;  }
            .testimony-box .testimony-desc p                { font-size: 18px; line-height: 28px;  }
            .testimony-box .testimony-desc p:before         { top:-5%; width:56px; height:43px;  }
            .testimony-logo                                 { margin-top:30px; padding:8px 16px; border-radius: 50px;}
            .testimony-logo amp-img                         { max-width:70%; }
            /* Testimoial Section End */
            /* Service Section Start */
            .service-content-box                               { padding:20px;  }
            .service-content-box .service-desc                 { margin-top:16px; }
            .service-content-box .service-desc h5              { margin-bottom:12px; font-size: 20px; line-height: 30px;  }
            .service-content-box .service-desc p               { font-size: 16px; line-height: 24px; }
            .service-testimonial-content .i-amphtml-carousel-slotted { padding:0 12px; }
            .service-testimonial-content .i-amphtml-base-carousel-arrow {  width:30px; height:30px;  }
            .service-testimonial-content .i-amphtml-base-carousel-arrow:before {  width: 15px; height: 12px; }
            .service-testimonial-content .i-amphtml-base-carousel-arrow-next-slot {right: -25px;  }
            .service-testimonial-content .i-amphtml-base-carousel-arrow-prev-slot { left: -25px; }
            .service-img-logo amp-img                          { width:40px; }
            .service-testimonial-content amp-base-carousel     { height: 378px !important; }
            /* Service Section End */
            .portfolio-content                     { left:calc(50% - (1170px/2)); }
         }
         @media(min-width:992px) and (max-width:1199px){
            /* Typography */
            h1 ,h2.big-h2                                         { font-size: 52px; line-height: 60px;}
            h2 , .mid-h1                                          { font-size: 44px; line-height: 48px;}
            h1.medium,
            h3                                                    { font-size: 36px; line-height: 45px;}
            h1.small,
            .service-title h1,
            h4                                                    { font-size: 28px; line-height: 36px;}
            h5                                                    { font-size: 20px; line-height: 28px;}
            h6                                                    { font-size: 18px; line-height: 22px;}
            body,
            p,
            ol,
            ul                                                    { font-size: 16px; line-height: 24px;}
            small                                                 { font-size: 12px; line-height: 20px;}
            .common-section                                       { padding-top: 70px; padding-bottom: 70px;}
            .common-section-small                                 { padding-top: 50px; padding-bottom: 50px;}
            .custom-saperator                                     { height: 20px;}
            .btn-grp                                              { margin:0 -8px }
            .btn-grp a                                            { margin:8px }
            .theme-btn a .fireworks,.theme-btn button .fireworks  { top:-1px; left:-1px }
            .theme-btn a,input.load-more                          { padding:10px 20px; font-size:16px; line-height:16px; border-width:1px }
            /* Header Style ============================= */
            .main-header                                          { padding: 10px 12px; border-bottom: 2px solid #fafafa; }
            .primary-head-menu ul > li                            { margin: 0px 8px; }
            .primary-head-menu ul > li > a                        { font-size: 12px; line-height: 30px; }
            .main-header > div.primary-logo a                     { width: 185px; }
            /* Sub Menu Style */
            .sub-menu                                             { border-top-width: 25px; }
            .sub-menu-wrapper                                     { max-width: 710px; }
            .sub-menu-wrapper ul li                               { max-width: 235px; }
            .sub-menu-wrapper ul li a                             { padding: 15px 10px; }
            .sub-menu-wrapper ul li .menu-item-icon               { width: 45px; }
            .sub-menu-wrapper ul li .menu-item-icon img           { max-height: 45px; }
            .sub-menu-wrapper ul li .menu-item-desc               { padding-left: 8px; width: calc(100% - 45px); }
            /* New Deskyop Menu */
            .desktop-mega-header.main-header                      { padding:12.5px 16px; }
            .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper ,.desktop-mega-header .about-submenu .mega-sub-menu-wrapper { padding:14px 16px; }
            .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat ,.desktop-mega-header .about-submenu .mega-sub-menu-wrapper .main-service-cat{ margin-bottom: 12px !important; padding-bottom: 4px; font-size: 14px; line-height:22px; }
            .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .main-service-cat:after ,.desktop-mega-header .about-submenu .mega-sub-menu-wrapper .main-service-cat:after { width: 100px; height:2px; }
            .desktop-mega-header .what-we-do-submenu .mega-sub-menu-wrapper .megamenu-item-icon ,.desktop-mega-header .about-submenu .mega-sub-menu-wrapper .megamenu-item-icon{ width: 22px; height: 22px; border-radius: 2px; }
            .desktop-mega-header .desktop-primary-menu li.service-megamenu .what-we-do-submenu .service-sub-cat > li ,.desktop-mega-header .desktop-primary-menu li.about-megamenu .about-submenu .service-sub-cat > li{ margin-bottom: 10px !important; }
            .desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc,.desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc { margin-left:10px; line-height: 18px; }
            .desktop-mega-header .what-we-do-submenu .service-sub-cat .megamenu-item-desc span ,.desktop-mega-header .about-submenu .service-sub-cat .megamenu-item-desc span{ font-size: 13px; line-height: 18px; }
            .desktop-mega-header ul.menu > li.menu-item-has-children > a:after { bottom:-3px; }
            .desktop-mega-header ul.menu > li                      { margin:0 8px; }
            .desktop-mega-header ul.menu > li > a                  { margin:6px 0; font-size: 14px; line-height:22px; }
            .desktop-mega-header ul.menu > li.career-menu a        { margin-left: 8px; padding: 10px 20px; font-size: 16px; line-height: 16px; border-width: 1px; }
            .desktop-mega-header .header-contactus                 { margin-left: 8px; }
            .megamenu-left                                         { width:70%; }
            .megamenu-right                                        { width:30%; }
            .hire-develop-wrapper                                  { padding:10px 16px; }
            .desktop-mega-header li.service-megamenu .sub-menu li .hire-dev-box > li { margin-bottom: 20px !important; }
            .hire-dev-box .hire-icon-box                           { width: 35px; height: 35px; margin-right:10px; }
            .hire-desc-box                                         { width:calc(100% - 45px); }
            .hire-desc-box h5                                      { margin-bottom:2px; font-size: 15px; line-height: 22px; }
            .hire-desc-box p                                       { margin-bottom: 4px; font-size: 12px; line-height: 150%; }
            .linebtn                                               { font-size: 12px; line-height:18px; }
            .linebtn img                                           { margin-left: 4px; }
            /* hire dedicated page css starts */
            .dedicated-banner-section                             { padding: 40px 0px; }
            .banner-text-box                                      { max-width: 100%; } 
            .banner-text-box p                                    { font-size: 18px; line-height:30px; }
            .banner-text-box h2                                   { line-height: 50px; }
            /* hire process section starts */
            /* Form Start */
            .amp-form-section label { margin-bottom: 6px; font-size: 16px; line-height: 20px;  }
            .amp-form-section .form-control { padding: 14px; font-size: 16px; line-height: 20px;  }
            .amp-form-section .form-group { margin-bottom:20px; }
            /* Form End */
            /* Banner Section */
            .dedicated-banner-section                             { padding: 50px 0px 70px; }
            .banner-text-box h1                                   { margin-bottom:18px; }
            .banner-text-box h6                                   { font-size: 18px; line-height: 30px; } 
            .banner-text-box p                                    { max-width:100%; font-size: 19px; line-height: 32px;  } 
            .form-section                                         { padding: 26px 19px;  }
            .form-section .heading-box h2                         { margin-bottom: 10px; font-size: 20px; line-height: 30px;}
            .form-section .heading-box p                          { font-size: 18px; line-height:24px; }
            .form-section form                                    { margin-top:24px; }
            .form-section form label                              { margin-bottom:8px;  font-size: 18px; line-height: 24px;  }
            .dedicated-banner-section:after                       { height:83px; }
            .banner-plane                                         { max-width:18%; }
            .common-padding-small                                 { padding-block:40px; }
            .title-bx                                             { margin-bottom:20px;  }
            .under-line:after                                     { height:12px; }
            .title-box h3                                         { font-size: 40px; line-height:52px;  }
            p.big-p                                               { font-size: 18px; line-height: 32px; } 
            /* Client Section Start */
            .client-box                                           {  width:calc(100% / 5);  padding-block:10px; }
            .client-section-box h5                                { font-size: 24px; line-height: 38px;  }
            /* Client Section End */
            /* Cta Section Start */
            .cta-section h4                                       { margin-bottom:24px; font-size: 30px; line-height: 45px;  }
            .cta-section p                                        { margin-bottom:30px;  max-width:80%; }
            .cta-sparrow                                          { top: 40%; width:8%; }
            .cta-first-right                                      { right:0; top:50%; width:12%; }
            .bottom-cloud:before                                  { bottom:-1px; width:100%; height:20px;  }
            .cta-shape-right                                      { right:18%; bottom:17%; width:4%; }
            .cta-last .cta-first-right                            { top:60%; width:10%;}
            .cta-last                                             { background-size: 114% auto !important; }
            /* Cta Section End */
            /* Advantages Section Start */
            .advantages-content .title-box                  { margin-bottom:24px; }
            .ed-ad-list                                     { margin-top:20px;}
            .ed-ad-list li                                  { width:calc(100%/2); padding-left:30px; margin-bottom:15px; font-size: 16px;  line-height: 24px;  }
            .ed-ad-list li:before                           {  top:46%;  width:20px; height:20px;  }
            /* Advantages Section End */
            /* Hiring Model Section Start */
            .hiring-mod-content                             { margin-top:50px; }
            .hire-box                                       { margin-inline:0px; border-radius: 30px; padding:0 18px 36px;  }
            .tit-hire                                       {  padding:8px; width:170px;  }
            .tit-hire h5                                    { font-size: 18px; line-height: 28px;  }
            .hire-con-list                                  { margin-top:20px; }
            .hire-con-list li                               { margin-bottom:24px;  padding-left:30px; font-size: 16px;  line-height: 24px; }
            .hire-con-list li:before                        { width:24px; height:24px; }
            .hiring-mod-content .theme-btn                  { margin-top:24px; }
            .hiring-sparrow ,.hiring-bat ,.hiring-rat       { width:12%; }
            /* Hiring Model Section End */
            /* other service Section Start */
            .other-service-section:before                   { top:40px; left:50%; width:77%; }
            .other-service-list                             { margin-top:40px; }
            .other-service-list li                          { padding-inline:12px; margin-bottom:30px; width:calc(100%/3); }
            .ser-list-box                                   { padding:8px 5px; border-radius: 15px; }
            .serv-border-box                                { padding:8px 5px; border-radius: 15px; }
            .serv-border-box .img-box                       { width:35px; height:35px; }
            .serv-border-box .img-box amp-img               { width:20px; }
            .serv-border-box h5                             { margin-left:6px; width:calc(100% - 41px);  font-size: 16px;  line-height: 24px; }
            .other-ser-person                               { width:10%;}
            .other-ser-pot                                  { width:8%; }
            /* other service Section End */
            /* Testimoial Section Start */
            .testimony-content                              { margin-top:30px;}
            .testimony-box .testimony-desc                  { padding:30px 12px 16px; min-height:298px;}
            .testimony-box .testimony-desc:after            { left:13%; width:17px; height:24px;  }
            .testimony-box .testimony-desc p                { font-size: 16px; line-height: 24px;  }
            .testimony-box .testimony-desc p:before         { top:-5%; width:37px; height:30px;  }
            .testimony-logo                                 { margin-top:20px; padding:6px 5px; border-radius: 50px;}
            .testimony-logo amp-img                         { max-width:50%; }
            /* Testimoial Section End */
             /* Service Section Start */
             .service-content-box                               { padding:13px;  }
            .service-content-box .service-desc                 { margin-top:16px; }
            .service-content-box .service-desc h5              { margin-bottom:12px; font-size: 18px; line-height: 24px;  }
            .service-content-box .service-desc p               { font-size: 16px; line-height: 24px; }
            .service-testimonial-content .i-amphtml-carousel-slotted { padding:0 10px; }
            .service-testimonial-content .i-amphtml-base-carousel-arrow {  width:30px; height:30px;  }
            .service-testimonial-content .i-amphtml-base-carousel-arrow:before {  width: 15px; height: 12px; }
            .service-testimonial-content .i-amphtml-base-carousel-arrow-next-slot {right: -25px;  }
            .service-testimonial-content .i-amphtml-base-carousel-arrow-prev-slot { left: -25px; }
            .service-img-logo amp-img                          { width:40px; }
            .service-testimonial-content amp-base-carousel     { height: 291px !important; }
            /* Service Section End */
            /* Portfolio section start */
            .portfolio-content                     { left:calc(50% - (970px/2)); }
            .portfolio-content figure              {  padding-inline:12px; }
            .portfolio-content figure  amp-img     {  border-radius: 16px; } 
            .portfolio-content figure h5           { margin-left:30px; margin-bottom:15px;  font-size: 20px; line-height: 30px; }
            .portfolio-content amp-base-carousel   { height:440px !important; }
            /* Responsive style */
            .spiner-ic                                      { top:55%; left:2%;max-width:30px; }
            .ed-ad-cross                                     { right:3%; top:5%; max-width:30px;}
            .jug-ic                                         { right:12%; bottom:4%; max-width:30px; }
            .book-ic                                        { top:50%; left:2%; max-width:30px;}
            .small-star                                       {  top:40%; right:12%; max-width:20px;}
            .bright-star                                    { bottom:6%; right:7%;max-width:30px; }
         }
         @media (min-width:768px) and (max-width:991px){
            /* Typography */
            body { font-size: 13px;}
            h1 ,h2.big-h2{ font-size: 50px; line-height: 60px;}
            h1.medium,
            h3 { font-size: 28px; line-height: 34px;}
            h1.small,
            .service-title h1,
            h4 { font-size: 24px; line-height: 30px;}
            h5 { font-size: 18px; line-height: 26px;}
            h6 { font-size: 16px; line-height: 22px;}
            body,
            p,
            ol,
            ul { font-size: 14px; line-height: 28px;}
            .common-section,
            .common-section-small { padding-top: 45px; padding-bottom: 45px;}
            .custom-saperator { height: 15px;}
            h2 , .mid-h1                                           { font-size: 34px; line-height: 42px;}
            .btn-grp                                               { margin:0 -6px }
            .btn-grp a                                             { margin:6px }
            .theme-btn a .fireworks,.theme-btn button .fireworks   { top:-1px; left:-1px }
            .theme-btn a,input.load-more                           { padding:10px 20px; font-size:14px; line-height:14px; border-width:1px }
            /* Header Style ============================= */
            .main-header                                           { padding: 8px 15px; border-bottom-width: 1px; }
            .primary-head-menu ul li                               { margin: 0px 10px; }
            .primary-head-menu ul li a                            { font-size: 14px; line-height: 30px; }
            /* .main-header > div.primary-logo                        { width: 150px; text-align: center; }
            */
            .main-header>div.primary-logo a                       { width: 150px; } 
            /* Sub Menu Style */
            .sub-menu                                              { border-top-width: 25px; }
            .sub-menu-wrapper                                      { max-width: 500px; }
            .sub-menu-wrapper ul li                                { max-width: 235px; }
            .sub-menu-wrapper ul li a                              { padding: 15px 10px; }
            .sub-menu-wrapper ul li .menu-item-icon                { width: 45px; }
            .sub-menu-wrapper ul li .menu-item-icon img            { max-height: 45px; }
            .sub-menu-wrapper ul li .menu-item-desc                { padding-left: 8px; width: calc(100% - 45px); }
               /* hire dedicated page css starts */
               .dedicated-banner-section   { padding: 20px 0px; }
               .banner-text-box            { max-width: 100%; } 
               .banner-text-box p          {  font-size: 16px; line-height: 32px; }
               .banner-text-box h2         { line-height: 32px; }
               .hiring-model-amp-content > .row { justify-content:center; }
               /* Form Start */
               .amp-form-section label { margin-bottom: 6px; font-size: 14px; line-height: 20px;  }
               .amp-form-section .form-control { padding: 12px; font-size: 14px; line-height: 20px;  }
               .amp-form-section .form-group { margin-bottom:16px; }
                     /* Form End */
               /* Banner Section */
            .dedicated-banner-section                        { padding: 60px 0px 100px; }
            .banner-text-box h1                             { margin-bottom:18px; }
            .banner-text-box h6                             { font-size: 18px; line-height: 30px; } 
            .banner-text-box p                              { max-width:100%; font-size: 19px; line-height: 32px;  } 
            .form-section                                   { padding: 26px 19px;  }
           .form-section .row  ,.dedicated-banner-section .row        { display:block; }
           .dedicated-banner-section                        { background-position:bottom center; }
           .dedicated-banner-section > *                    { float:none; }
            .form-section .heading-box h2                   { margin-bottom: 10px; font-size: 24px; line-height: 38px;}
            .form-section .heading-box p                    { font-size: 18px; line-height:24px; }
            .form-section form                              { margin-top:24px; }
            .form-section form label                        { margin-bottom:8px;  font-size: 18px; line-height: 24px;  }
            .portfolio-content amp-base-carousel            { height:440px !important; }   
            .service-testimonial-content amp-base-carousel  { width:calc(768px - 30px); }
            .portfolio-content                     { left:calc(50% - (750px/2)); }
            .spiner-ic                                      { top:40%; left:2%;max-width:25px; }
            .ed-ad-cross                                     { right:3%; top:5%; max-width:25px;}
            .jug-ic                                         { right:12%; bottom:4%; max-width:25px; }
            .book-ic                                        { top:50%; left:2%; max-width:25px;}
            .small-star                                       {  top:40%; right:12%; max-width:20px;}
            .bright-star                                    { bottom:6%; right:7%;max-width:25px; }
         }
         @media(max-width:991px){  
                     .form-section                                { margin-top:50px; }
                     .banner-text-box                                      { margin-top:12px; }
            .banner-text-box .theme-btn                           { display:block; margin-top:16px; }
            .dedicated-banner-section:after                       { height:64px; }
            .banner-plane                                         { left:80%; max-width:18%; }
            .common-padding-small                                 { padding-block:30px; }
            .title-bx                                             { margin-bottom:20px;  }
            .under-line:after                                     { height:12px; }
            .title-box                                            { margin-bottom:23px; }
            .title-box h3                                         { font-size: 40px; line-height:52px;  }
            p.big-p                                               { font-size: 18px; line-height: 32px; } 
            /* Client Section Start */
            .client-box                                           {  width:calc(100% / 5);  padding:10px 16px; }
            .client-section-box h5                                { font-size: 24px; line-height: 38px;  }
            /* Client Section End */
            /* Cta Section Start */
            .cta-section h4                                       { margin-bottom:20px; font-size: 24px; line-height: 38px;  }
            .cta-section p                                        { margin-bottom:16px;  max-width:80%; }
            .cta-sparrow                                          { top: 40%; width:12%; }
            .cta-first-right                                      { right:0; top:50%; width:14%; }
            .bottom-cloud:before                                  { bottom:-1px; width:100%; height:20px;  }
            .cta-shape-right                                      { right:18%; bottom:17%; width:4%; }
            .cta-last .cta-first-right                            { top:60%; width:14%;}
            .cta-last                                             { background-size: cover !important; }
            /* Cta Section End */
            /* Advantages Section Start */
            .advantages-content .title-box                  { margin-bottom:24px; }
            .ed-ad-list                                     { margin-top:20px;}
            .ed-ad-list li                                  { width:calc(100%/2); padding-left:30px; margin-bottom:15px; font-size: 16px;  line-height: 24px;  }
            .ed-ad-list li:before                           {  top:46%;  width:20px; height:20px;  }
            /* Advantages Section End */
            /* Hiring Model Section Start */
            .hiring-mod-content                             { margin-top:50px; }
            .hiring-mod-content .row                        { justify-content:center; }
            .hire-wrap                                      { margin-bottom:60px; }
            .hire-wrap:last-child                         { margin-bottom:0px;}
            .hire-box                                       { margin-inline:0px; border-radius: 30px; padding:0 18px 36px;  }
            .tit-hire                                       {  padding:8px; width:170px;  }
            .tit-hire h5                                    { font-size: 18px; line-height: 28px;  }
            .hire-con-list                                  { margin-top:20px; }
            .hire-con-list li                               { margin-bottom:24px;  padding-left:30px; font-size: 16px;  line-height: 24px; }
            .hire-con-list li:before                        { width:24px; height:24px; }
            .hiring-mod-content .theme-btn                  { margin-top:24px; }
            .hiring-sparrow ,.hiring-bat ,.hiring-rat       { width:12%; }
            /* Hiring Model Section End */
            /* other service Section Start */
            .other-service-section:before                   { top:40px; left:50%; width:77%; }
            .other-service-list                             { margin-top:40px; }
            .other-service-list li                          { padding-inline:12px; margin-bottom:30px; width:calc(100%/2); }
            .ser-list-box                                   { padding:8px 5px; border-radius: 15px; }
            .serv-border-box                                { padding:8px 5px; border-radius: 15px; }
            .serv-border-box .img-box                       { width:35px; height:35px; }
            .serv-border-box .img-box amp-img               { width:20px; }
            .serv-border-box h5                             { margin-left:6px; width:calc(100% - 41px);  font-size: 16px;  line-height: 24px; }
            .other-ser-person                               { width:10%;}
            .other-ser-pot                                  { width:8%; }
            /* other service Section End */
            /* Testimoial Section Start */
            .testimony-content                              { margin-top:30px; justify-content:center;}
            .testimony-wrap                                 { margin-bottom:30px;  }
            .testimony-box .testimony-desc                  { padding:30px 12px 16px; }
            .testimony-box .testimony-desc:after            { left:13%; width:17px; height:24px;  }
            .testimony-box .testimony-desc p                { font-size: 16px; line-height: 24px;  }
            .testimony-box .testimony-desc p:before         { top:-5%; width:37px; height:30px;  }
            .testimony-logo                                 { margin-top:20px; padding:6px 5px; border-radius: 50px;}
            .testimony-logo amp-img                         { max-width:50%; }
            /* Testimoial Section End */
            .faq-amp-section h3                             { font-size:22px; line-height:40px; }
            .accordion dt p                                 { padding: 16px 30px 16px 0px; }
             /* Service Section Start */
             .service-content-box                               { padding:14px 9px;  }
            .service-content-box .service-desc                 { margin-top:16px; }
            .service-content-box .service-desc h5              { margin-bottom:12px; font-size: 18px; line-height: 24px;  }
            .service-content-box .service-desc p               { font-size: 16px; line-height: 24px; }
            .service-testimonial-content .i-amphtml-carousel-slotted { padding:0 23px; }
            .service-testimonial-content .i-amphtml-base-carousel-arrow {  width:25px; height:25px;  }
            .service-testimonial-content .i-amphtml-base-carousel-arrow:before {  width: 15px; height: 12px; }
            .service-testimonial-content .i-amphtml-base-carousel-arrow-next-slot {right: -8px;  }
            .service-testimonial-content .i-amphtml-base-carousel-arrow-prev-slot { left: -8px; }
            .service-img-logo amp-img                          { width:40px; }
            .service-testimonial-content amp-base-carousel     { height: 257px !important; }
            /* Service Section End */
            /* Portfolio section start */
            .portfolio-content figure              {  padding-inline:10px; }
            .portfolio-content figure  amp-img     {  border-radius: 12.5pxpx; } 
            .portfolio-content figure h5           { margin-left:20px; margin-bottom:10px;  font-size: 18px; line-height: 26px; }
            .portfolio-content amp-base-carousel            { height:390px !important; }  
            
            /* Responsive style */
          }
          @media(min-width:576px) and (max-width:767px){ 
            .service-testimonial-content amp-base-carousel     { height: 330px !important; }
          }
       @media(max-width:767px){
            /* Typography */
            .row  { display:block !important; }
            .row > * { float:none !important; }
            h1 ,h2.big-h2                                         { font-size: 45px; line-height: 60px;}
            h1.medium,
            h3                                                    { font-size: 25px; line-height: 32px;}
            h1.small,
            .service-title h1,
            .service-title blockquote,
            h4 { font-size: 24px; line-height: 30px;}
            h5 { font-size: 20px; line-height: 28px;}
            h6 { font-size: 16px; line-height: 24px;}
            body,
            p,
            ol,
            ul { font-size: 16px; line-height: 24px;}
            .common-section { padding-top: 45px; padding-bottom: 45px;}
            .common-section-small { padding-top: 30px; padding-bottom: 30px;}
            .custom-saperator { height: 15px;}
            h2 , .mid-h1                                             { font-size: 32px; line-height: 42px;}
            .btn-grp                                                 { margin:0 -6px }
            .btn-grp a                                               { margin:6px }
            .theme-btn a .fireworks,.theme-btn button .fireworks     { top:-2px; left:-2px }
            .theme-btn a,.theme-btn button,input.load-more           { padding:12px 22px; font-size:16px; line-height:16px }
            .new-mobile-menu-wrapper .menu-item-has-children:hover a:hover + .sub-menu, .new-mobile-menu-wrapper .sub-menu:hover{ visibility: visible !important; opacity: 1 !important; }
            .title-bx                                             { margin-bottom:20px;  }
            .under-line:after                                     { height:8px; }
            .title-box                                            { margin-bottom:23px; }
            .title-box h3                                         { font-size: 24px; line-height:34px;  }
            p.big-p                                               { font-size: 17px; line-height: 28px; } 
            /* Header Style ============================= */
            /* Hamburger Menu Style */
            .hamburger                                               { transform: scale(0.7); -moz-transform: scale(0.7); -webkit-transform: scale(0.7); transform-origin: right; }
            .mobile-nav-header > div.primary-logo                    { width: auto;}
            .mobile-nav-header > div.primary-logo amp-img            { width: 150px; height:38px;}
                     /* hire dedicated page css starts */
                  .dedicated-banner-section   { padding: 20px 0px; }
                  .banner-text-box            { max-width: 100%; } 
                  .banner-text-box p          { max-width:100%; font-size: 15px; line-height: 24px; }
                  .banner-btn-box             { flex-direction: column; }
                  .banner-btn-box .theme-btn:last-child               { margin-left: 0px; }
                  .banner-text-box h1       { margin-bottom: 18px; line-height: 1.5; }
                     /* Form Start */
                     .amp-form-section label { margin-bottom: 6px; font-size: 14px; line-height: 20px;  }
                     .amp-form-section .form-control { padding: 12px; font-size: 14px; line-height: 20px;  }
                     .amp-form-section .form-group { margin-bottom:16px; }
                     /* Form End */
                /* Banner Section */
                .accordion                                  { margin-top:0px; }
            .dedicated-banner-section                        { padding: 20px 0px 40px; }
            .banner-text-box h1                             { margin-bottom:18px; }
            .banner-text-box h6                             { font-size: 18px; line-height: 30px; } 
            .banner-text-box p                              { max-width:100%; font-size: 19px; line-height: 32px;  } 
            .form-section                                   { padding: 26px 19px;  }
           .form-section .row  ,.dedicated-banner-section .row        { display:block; }
           .dedicated-banner-section                        { background-position:bottom center; }
           .dedicated-banner-section > *                    { float:none; }
            .form-section .heading-box h2                   { margin-bottom: 8px; font-size: 20px; line-height: 30px;}
            .form-section .heading-box p                    { font-size: 16px; line-height:24px; }
            .form-section form                              { margin-top:24px; }
            .form-section form label                        { margin-bottom:8px;  font-size: 18px; line-height: 24px;  }
            /* Client Section Start */
            .client-section-content                         { flex-wrap:wrap; justify-content:center; } 
            .client-box                                           { border: 1px solid #F0F0F2 !important; height:70px; width:calc(100% / 3);  padding:10px 16px; }
            .client-box amp-img                             { max-width:80%; }
            .client-section-box h5                                { font-size: 24px; line-height: 38px;  }
            /* Client Section End */
            /* Cta Section Start */
            .cta-section h4                                       { margin-bottom:20px; font-size: 24px; line-height: 38px;  }
            .cta-section p                                        { margin-bottom:16px;  max-width:100%; }
            .cta-sparrow                                          { top: 80%; width:12%; }
            .cta-first-right                                      { display:none; right:0; top:70%; width:15%; }
            .bottom-cloud:before                                  { bottom:-1px; width:100%; height:20px;  }
            .cta-shape-right                                      { right:18%; bottom:17%; width:4%; }
            .cta-last .cta-first-right                            { top:60%; width:14%;}
            .cta-last                                             { background-size: cover !important; }
            /* Cta Section End */
            /* Advantages Section Start */
            .advantages-content .title-box                  { margin-bottom:24px; }
            .ed-ad-list                                     { margin-top:20px;}
            .ed-ad-list li                                  { width:100%; padding-left:30px; margin-bottom:15px; font-size: 16px;  line-height: 24px;  }
            .ed-ad-list li:before                           {  top:46%;  width:20px; height:20px;  }
            /* Advantages Section End */
            /* Hiring Model Section Start */
            .hiring-mod-content                             { margin-top:50px; }
            .hiring-mod-content .row                        { justify-content:center; }
            .hire-wrap                                      { margin-bottom:40px; }
            .hire-wrap:last-child                       { margin-bottom:0px !important;}
            .hire-box                                       { margin-inline:0px; border-radius: 30px; padding:0 18px 36px;  }
            .tit-hire                                       {  padding:8px; width:170px;  }
            .tit-hire h5                                    { font-size: 18px; line-height: 28px;  }
            .hire-con-list                                  { margin-top:20px; }
            .hire-con-list li                               { margin-bottom:24px;  padding-left:30px; font-size: 16px;  line-height: 24px; }
            .hire-con-list li:before                        { width:24px; height:24px; }
            .hiring-mod-content .theme-btn                  { margin-top:24px; }
            .hiring-sparrow ,.hiring-bat ,.hiring-rat       { width:23%; }
            /* Hiring Model Section End */
            /* other service Section Start */
            .other-service-section:before                   { top:60px; left:50%; width:70%; }
            .other-service-section .title-box               { margin-top:24px; }
            .other-service-list                             { margin-top:30px; }
            .other-service-list li                          { padding-inline:12px; margin-bottom:30px; width:calc(100%); }
            .ser-list-box                                   { padding:8px 5px; border-radius: 15px; }
            .serv-border-box                                { padding:8px 5px; border-radius: 15px; }
            .serv-border-box .img-box                       { width:35px; height:35px; }
            .serv-border-box .img-box amp-img               { width:20px; }
            .serv-border-box h5                             { margin-left:6px; width:calc(100% - 41px);  font-size: 16px;  line-height: 24px; }
            .other-ser-person                               { width:10%;}
            .other-ser-pot                                  { width:8%; }
            /* other service Section End */
            /* Testimoial Section Start */
            .testimony-content                              { margin-top:30px; justify-content:center;}
            .testimony-wrap                                 { margin-bottom:30px;  }
            .testimony-box .testimony-desc                  { padding:30px 12px 16px; }
            .testimony-box .testimony-desc:after            { left:13%; width:17px; height:24px;  }
            .testimony-box .testimony-desc p                { font-size: 16px; line-height: 24px;  }
            .testimony-box .testimony-desc p:before         { top:-5%; width:37px; height:30px;  }
            .testimony-logo                                 { margin-top:20px; padding:6px 5px; border-radius: 50px;}
            .testimony-logo amp-img                         { max-width:50%; }
            /* Testimoial Section End */
            .portfolio-content                     { left:auto; }
            .spiner-ic                                      { top:40%; left:2%;max-width:25px; }
            .ed-ad-cross                                     { right:3%; top:5%; max-width:25px;}
            .jug-ic                                         { right:12%; bottom:4%; max-width:25px; }
            .book-ic                                        { top:50%; left:2%; max-width:25px;}
            .small-star                                       {  top:40%; right:12%; max-width:20px;}
            .bright-star                                    { bottom:6%; right:7%;max-width:25px; }
         }
         @media(min-width: 1600px)                                   { .container { width: 1590px; } .primary-head-menu ul { margin: 0px -15px; } }
         @media(min-width: 1200px)                                   { body { padding-top: 93px !important; } }
         @media(min-width: 992px) and (max-width:1199px)             { body { padding-top: 88px !important; } }
        
         @media(max-width:767px)                                     {  body { padding-top: 69px !important; } }
         @media(max-width:991px)                                     { body { padding-top: 92px !important; } br.n-desktop { display: block; } 
               /* Mobile Menu Header */
               .mobile-nav-header { justify-content: space-between; padding: 8px 15px; border-bottom-width: 1px;}
               .mobile-nav-header > div { width: auto;}
               .mobile-nav-header .burger-main { position: relative; width: auto; height: auto; padding:0; }
               .mobile-nav-header > div.primary-logo { width: auto;}
               .mobile-nav-header > div.primary-logo img { width: 150px;}
               /* New mobile menu */
            .main-header.mobile-nav-header { padding:15px;  }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container { background-color: #fff; }
            body.open-menu .main-header.mobile-nav-header { border-color: #efefef; }
            .page-template-headermenu-template #wpadminbar { display: none;}
            .new-mobile-menu-wrapper .burger-main span{ transition: all 0.3s ease-in-out; }
            /* .new-mobile-menu-wrapper #menu-mobile-navigation li { width: 100%; } */
            .new-mobile-menu-wrapper #menu-mobile-navigation li.open-sub > a ,.new-mobile-menu-wrapper #menu-mobile-navigation li.current-menu-item > a ,.new-mobile-menu-wrapper .menu-item-has-children:hover a:hover a+ .sub-menu, .new-mobile-menu-wrapper .sub-menu:hover a{ color:#0D7CFF }
            .new-mobile-menu-wrapper #menu-mobile-navigation { margin: 10px 0 0; display: flex; flex-direction: column; height: calc(100vh - 79px); overflow-y: auto;}
            .new-mobile-menu-wrapper .burger-main.open span.mid{ opacity: 0; } 
            .new-mobile-menu-wrapper .burger-main.open span.top{ transform: rotate(45deg); top: 12px; transform-origin: center; }
            .new-mobile-menu-wrapper .burger-main.open span.bot{ transform: rotate(-45deg); bottom: 12px; transform-origin: center; }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container { min-height: calc(100vh - 69px); min-height: calc(var(--app-height) - 69px); position: fixed; width: 100%; top: 69px; left: 0; transition: all 0.3s ease-in-out;  z-index: 5; overflow-y: auto; background:#ffffff url('/wp-content/themes/yudiz/images/bg_ptrn.png') repeat-x center bottom / auto 70%; }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container:before { display: block; height: 71%; width: 100%; position: absolute; content: ""; bottom: 0; left: 0; background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,0.96) 100%); z-index: -1; }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container.open{ transform: translateX(0); }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item { padding:0; }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item > a { display: inline-block; padding:  0 15px; color: #1c2530; margin:10px 0; font-weight: 500; font-family: 'Poppins', sans-serif; font-size: 20px; line-height: 30px; }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item.get-in-touch { text-align: center; margin-bottom:10px; margin-top: 40px; }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item.get-in-touch > a { padding: 10px 24px; border: 2px solid #3c4c5e; color: #3c4c5e; text-transform: capitalize; border-radius: 40px; }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item.get-in-touch > a:hover{ background: #3c4c5e; color: #fff; }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item > a:hover,
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item > a:focus { text-decoration: none; }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children > a{ display: block; padding-right: 0px; position: relative; background: none; margin-right: 15px; }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children > a::after{ content: ""; position: absolute; top: 50%; right: 0; height: 13px; width: 15px; background: url('/wp-content/themes/yudiz/images/down-arrow.svg') no-repeat center right/cover; transition: all 0.5s ease-in-out; transform-origin: center center; transform: translateY(-50%); }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children.open-sub > a::after ,.new-mobile-menu-wrapper .menu-item-has-children:hover a:hover + .sub-menu a:after, .new-mobile-menu-wrapper .sub-menu:hover a:after{ transform: translateY(-50%) rotate(180deg); }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children ul.sub-menu { border: none; width: 100%; z-index: 2; max-height: 0; transition: all 0.5s ease-in-out; position: relative; opacity: 1 !important; visibility: visible !important; overflow: hidden; padding-left: 30px; top:0; background-color: #f8faff; }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children.open-sub .sub-menu ,.new-mobile-menu-wrapper .menu-item-has-children:hover a:hover + .sub-menu, .new-mobile-menu-wrapper .sub-menu:hover{ max-height: 500px; padding-top:12px; padding-bottom:12px; margin-bottom: 20px; }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children ul.sub-menu li { border: none; background-color: transparent; }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children ul.sub-menu li a{ color: #000; font-weight: 400; font-size: 18px; line-height: 28px; margin: 4px 0; padding:0; position: relative; padding-left: 22px; }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item-has-children ul.sub-menu li a:after { content:''; position: absolute; top:50%; left:0; transform: translateY(-50%); /* background-color: #0D7CFF; */ background-color: #000; height: 2px; width: 6px; }
            .new-mobile-menu-wrapper .menu-mobile-navigation-container .menu-item.get-in-touch.current-menu-item > a { background-color: #3c4c5e; color:#fff !important; }
            amp-sidebar { width:100%; max-width:100%; }
            .mobile-nav-block { display:flex; align-items:center; justify-content:space-between; }
           
         }
         @media(min-width:577px) and (max-width:767px) { 
           /* .home-testimonial-content amp-base-carousel.i-amphtml-layout-size-defined { height:300px !important; } */
           /* .portfolio-content amp-base-carousel            { height:450px !important; }   */
         }
</style>
</head>
<body id="blkchain-page" class="dedicated-page-amp">
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
      <div class="main-header desktop-mega-header hidden-xs hidden-sm">
         <div class="primary-logo">
            <a href="#blkchain-page">
               <?php
                  $custom_logo_id = get_theme_mod('custom_logo');
                  $image = wp_get_attachment_image_src($custom_logo_id, 'full');
                  ?>
               <amp-img layout="intrinsic" width="240" height="61" src="<?php echo $image[0]; ?>" alt="logo"></amp-img>
            </a>
         </div>
         <div class="desktop-primary-menu">
            <div class="primary-head-menu">
               <div class="menu-primary-mega-menu-container">
                  <ul id="menu-primary-mega-menu" class="menu">
                     <li id="menu-item-21880" class=" menu-item menu-item-type-post_type menu-item-object-page menu-item-21880">
                        <a href="#services">Services</a>
                     </li>
                     <li id="menu-item-21882" class="menu-item menu-item-type-post_type_archive menu-item-object-portfolio menu-item-21882"><a href="#portfolio">Portfolio</a></li>
                     <li id="menu-item-21886" class=" menu-item menu-item-type-custom menu-item-object-custom menu-item-21886">
                        <a href="#testimonial">Testimonial</a>
                     </li>
                     <!-- <li id="menu-item-21883" class="career-menu menu-item menu-item-type-post_type_archive menu-item-object-join-our-team menu-item-21883"><a href="https://www.yudiz.com/join-our-team/">Career</a></li> -->
                  </ul>
               </div>
            </div>
            <div class="header-contactus theme-btn solid-blue">
               <a href="#contact-amp-form">Contact Us</a>
            </div>
         </div>
      </div>
      <div class="visible-xs visible-sm new-mobile-menu-wrapper">
         <div class="main-header mobile-nav-header">
            <div class="primary-logo">
               <amp-img layout="intrinsic" width="150" height="38" src="https://www.yudiz.com/wp-content/uploads/2022/07/yudiz-logo-ltd.svg" alt="logo"></amp-img>
            </div>
            <div role="button"  class="sidebar-open-btn" on="tap:sidebar">
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
         <a href="<?php echo home_url();?>"><figure><amp-img layout="intrinsic" width="28" height="28" src="<?php echo get_template_directory_uri();?>/images/mn-home.svg" alt="yudiz menu icon"></amp-img></figure></a>
         <a href="<?php echo home_url();?>"><figure><amp-img layout="intrinsic" width="150" height="36" src="<?php echo $image[0]; ?>" alt="yudiz menu logo" ></amp-img></figure></a>
         <div role="button" on="tap:sidebar.close"  aria-label="close sidebar" class="close-menu"><figure><amp-img layout="intrinsic" width="36" height="36" src="<?php echo get_template_directory_uri();?>/images/mn-close.svg" alt="yudiz menu icon" ></amp-img></figure></div>
                  </div>
                  <nav id="mobile-menu-nav" class="new-mobile-menu-wrapper">
                     <div class="menu-mobile-navigation-container">
                        <ul id="menu-mobile-navigation" class="menu">
                        <li id="menu-item-21880" class=" menu-item menu-item-type-post_type menu-item-object-page menu-item-21880">
                     <a href="#services">Services</a>
                  </li>
                  <li id="menu-item-21882" class="menu-item menu-item-type-post_type_archive menu-item-object-portfolio menu-item-21882"><a href="#portfolio">Portfolio</a></li>
                  <li id="menu-item-21886" class=" menu-item menu-item-type-custom menu-item-object-custom menu-item-21886">
                     <a href="#testimonial">Testimonial</a>
                  </li>
                  <li id="menu-item-21874"
                        class="get-in-touch menu-item menu-item-type-post_type menu-item-object-page menu-item-21874"><a
                           href="#contact-amp-form">Hire blockchain developers</a></li>
               </ul>
                     </div>
                  </nav>
   </amp-sidebar>
      <!-- .site-header -->
      <!-- banner section Start -->
      <section id="contact-amp-form" class="dedicated-banner-section amp-form-section">
         <div class="container">
            <div class="row">
               <div class="col-md-6 ">
                  <div class="banner-text-box">
                     <h1 class="common-gap mid-h1"><strong>Elevate Learning</strong> With Our Educational Games</h1>
                     <p class="common-gap">As a veteran Educational Game Development Company, Yudiz offers cutting-edge cross-platform educational games. Our excellence reigns in rolling out captivating and performance enhancing educational games. 
</p>
                     <div class="theme-btn solid-blue">
                        <a class="talk-btn" href="#contact-amp-form">Know more</a>
                     </div>
                  </div>
               </div>
               <div class="col-md-6 col-sm-8">
                  <div class="form-section">
                     <div class="heading-box">
                        <h2>Quick Inquiry</h2>
                        <p>Reach out to us! We’ll help you reach your solutions.</p>
                     </div>
                     <form class="sample-form" method="post" action-xhr="<?php echo get_stylesheet_directory_uri(  ) . "/template/hire-blockchain-developers.php"; ?>" target="_top" custom-validation-reporting="show-all-on-submit" on="submit-success:AMP.setState({ state: {currentValue: ''}})">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="name">Full Name*</label>
                              <input class="form-control" placeholder="your full name" type="text" id="show-all-on-submit-name" name="data-to-save[name]" required  [value]="state.currentValue">
                              <span visible-when-invalid="valueMissing" validation-for="show-all-on-submit-name">Please enter your full name!</span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="email">Email*</label>
                              <input class="form-control" placeholder="your Email" type="email" id="show-all-on-submit-email" name="data-to-save[email]"  required [value]="state.currentValue">
                              <span visible-when-invalid="valueMissing" validation-for="show-all-on-submit-email">Please enter your email!</span>
                              <span visible-when-invalid="typeMismatch" validation-for="show-all-on-submit-email"></span>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="phone">Phone number</label>
                              <input class="form-control" type="tel" placeholder="your Phone" name="data-to-save[phone]" id="show-all-on-submit-phone" required [value]="state.currentValue">
                              <span visible-when-invalid="valueMissing" validation-for="show-all-on-submit-phone" >Please enter your phone number!</span>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for="message">Project Requirement*</label>
                              <textarea class="form-control" placeholder="Describe what you’re looking for" name="data-to-save[message]" autoexpand [text]="state.currentValue" ></textarea>  
                           </div> 
                        </div>
                        <div class="col-md-12">
                           <div class="theme-btn solid-black ">
                              <button id="custm-submit-id" type="submit">Submit</button>
                           </div>
                        </div>
                     </div>
                  <!-- recaptch input start -->
                  <amp-recaptcha-input
                     layout="nodisplay"
                     name="recaptcha_token"
                     data-sitekey="6Le3aGQjAAAAABbQLrm36jtW6gV61sJE82Vpa5kh"
                     data-action="recaptcha_example"
                  >
                  </amp-recaptcha-input>
                  <div class="loading-message">Loading...</div>
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
               <!-- Google tag (gtag.js) --> 
                  </div>
               </div>
            </div>
         </div>
         <div class="pattern-shape-img">
            <amp-img layout="intrinsic" class="banner-plane" width="323" height="227" src="https://www.yudiz.com/wp-content/uploads/2023/09/banner-isolation-mode-img.png" alt="logo"></amp-img>
         </div>
      </section>
      <!-- banner section ends -->
      <!-- Client Section Start -->
      <section class="client-section-box common-padding-small position-relative">
         <div class="container">
            <div class="title-bx">
               <h5 class="under-line"><span>Our Clients</span></h5>
            </div>
            <div class="client-section-content">
               <div class="client-box">
               <div class="clien-bx-img">
                  <amp-img layout="intrinsic"  width="150" height="65" src="https://www.yudiz.com/wp-content/uploads/2023/09/phonics-museum-logo.png" alt="logo"></amp-img>
               </div>
               </div>
               <div class="client-box">
               <div class="clien-bx-img">
                  <amp-img layout="intrinsic"  width="180" height="46" src="https://www.yudiz.com/wp-content/uploads/2023/09/library-ideas-logo.png" alt="logo"></amp-img>
               </div>
               </div>
               <div class="client-box">
               <div class="clien-bx-img">
                  <amp-img layout="intrinsic"  width="150" height="53" src="https://www.yudiz.com/wp-content/uploads/2023/09/ivoz-books-logo.png" alt="logo"></amp-img>
               </div>
               </div>
               <div class="client-box">
               <div class="clien-bx-img">
                  <amp-img layout="intrinsic"  width="150" height="40" src="https://www.yudiz.com/wp-content/uploads/2023/09/axon-logo.png" alt="logo"></amp-img>
               </div>
               </div>
               <div class="client-box">
               <div class="clien-bx-img">
                  <amp-img layout="intrinsic"  width="150" height="40" src="https://www.yudiz.com/wp-content/uploads/2023/09/allen-logo.png" alt="logo"></amp-img>
               </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Client Section End -->
      <!-- Services Section Start -->
      <section class="service-section-box common-section position-relative" id="services">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="title-box">
                     <h3>Education Game <strong class="under-line"><span>Development Services</span></strong></h3>
                  </div>
               </div>
               <div class="col-md-6">
                  <p class="big-p">Our niche is to develop tech-savvy & amusing gaming attributes to simplify complex learning concepts. We strive to cater our clients with scalable, visually perky and animation-rich educational games by ideating their preferences to our finesse.</p>
               </div>
            </div>
            <div class="custom-saperator"></div>
            <div class="custom-saperator"></div>
          <div class="row" style="justify-content:center;">
            <div class="col-lg-10 col-md-11">
               <div class="service-testimonial-content">
                  <div>
                     <amp-base-carousel loop="true" height="448" layout="fixed-height"  auto-advance="true" auto-advance-interval="2000" visible-count="(min-width: 992px) 3, (min-width: 768px) 2,  (min-width: 576px) 2,1" advance-count="(min-width: 1150px) 3, (min-width: 700px) 2, 1">
                        <div>
                           <div class="service-content-box color-orange">
                              <div class="service-info-box">
                                 <div class="service-img-logo">
                                    <amp-img layout="intrinsic" width="80" height="80" src="https://www.yudiz.com/wp-content/uploads/2023/09/Language-Vocabulary.svg"  alt="bones club"/>
                                 </div>
                                 <div class="service-desc">
                                    <h5 class="service-name-box">Language & Vocabulary</h5>
                                 </div>
                              </div>
                              <p>“Want to transform your users into prodigies?  Dive into our interactive adventures that make language learning amusing and rewarding for your users.”</p>
                           </div>
                        </div>
                        <div>
                           <div class="service-content-box color-violet">
                              <div class="service-info-box">
                                 <div class="service-img-logo">
                                    <amp-img layout="intrinsic" width="80" height="80" src="https://www.yudiz.com/wp-content/uploads/2023/09/Math-Games.svg"  alt="bones club"/>
                                 </div>
                                 <div class="service-desc">
                                    <h5 class="service-name-box"> Math Games</h5>
                                 </div>
                              </div>
                              <p>“It’s time to decode numbers in the most fun way. Tap into the fascinating Math games and simplify the complex formula-based sums by unlocking levels.”</p>
                           </div>
                        </div>
                        <div>
                           <div class="service-content-box color-green">
                              <div class="service-info-box">
                                 <div class="service-img-logo">
                                    <amp-img layout="intrinsic" width="80" height="80" src="https://www.yudiz.com/wp-content/uploads/2023/09/Sports-Games.svg"  alt="Sports club"/>
                                 </div>
                                 <div class="service-desc">
                                    <h5 class="service-name-box">Sports Games </h5>
                                 </div>
                              </div>
                              <p>“If fitness is what you’re fixated on? Our Sports games are the best option to not just learn about fitness but to also motivate and ignite enthusiasm in well-being.”</p>
                           </div>
                        </div>
                        <div>
                           <div class="service-content-box color-orange">
                              <div class="service-info-box">
                                 <div class="service-img-logo">
                                    <amp-img layout="intrinsic" width="80" height="80" src="https://www.yudiz.com/wp-content/uploads/2023/09/STEM.svg"  alt="bones club"/>
                                 </div>
                                 <div class="service-desc">
                                    <h5 class="service-name-box"> STEM</h5>
                                 </div>
                              </div>
                              <p>“Layerless learning and deep understanding is a cornerstone of our educational games. Make learning engaging and enthralling with us.”</p>
                           </div>
                        </div>
                        <div>
                           <div class="service-content-box color-violet">
                              <div class="service-info-box">
                                 <div class="service-img-logo">
                                    <amp-img layout="intrinsic" width="80" height="80" src="https://www.yudiz.com/wp-content/uploads/2023/09/Educational-Simulations.svg"  alt="bones club"/>
                                 </div>
                                 <div class="service-desc">
                                    <h5 class="service-name-box"> Educational Simulations
                                 </div>
                              </div>
                              <p>“Immersive learning boosts subject understanding. Our educational games seamlessly links real & digital world to cater rich learning experiences.”</p>
                           </div>
                        </div>
                     </amp-base-carousel>
                  </div>
               </div>
            </div>
          </div>
         </div>
         <div class="pattern-shape-img">
            <amp-img layout="intrinsic" class="book-ic" width="56" height="63" src="https://www.yudiz.com/wp-content/uploads/2023/09/book-icon.svg" alt="logo"></amp-img>
            <amp-img layout="intrinsic" class="small-star" width="31" height="31" src="https://www.yudiz.com/wp-content/uploads/2023/09/star-ic.svg" alt="logo"></amp-img>
            <amp-img layout="intrinsic" class="bright-star" width="50" height="48" src="https://www.yudiz.com/wp-content/uploads/2023/09/star-bright-ic.svg" alt="logo"></amp-img>
         </div>
      </section>
      <!-- Services Section End -->
      <!-- Cta Section Start -->
      <section class="cta-section common-padding-small position-relative" style="background:url('https://www.yudiz.com/wp-content/uploads/2023/09/cta-cloud-wave-bg.jpg')no-repeat center center/cover;">
         <div class="container">
            <div class="row" style="justify-content:center;">
               <div class="col-md-10">
                  <div class="cta-content text-center">
                     <h4>Learn More About Our Educational Solutions</h4>
                     <p>We offer reliable and highly functional client centric Website Development Services that transforms their business models</p>
                     <div class="theme-btn solid-blue">
                        <a class="talk-btn" href="#contact-amp-form">Know more</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="pattern-shape-img">
            <amp-img layout="intrinsic" class="cta-sparrow" width="205" height="205" src="https://www.yudiz.com/wp-content/uploads/2023/09/cta-ed-games.png" alt="logo"></amp-img>
            <amp-img layout="intrinsic" class="cta-first-right" width="271" height="192" src="https://www.yudiz.com/wp-content/uploads/2023/09/cta-ed-games-right.png" alt="logo"></amp-img>
         </div>
      </section>
      <!-- Cta Section End -->
      <!-- Advantages section start -->
      <section class="advantages-section common-section position-relative">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-8">
                  <div class="img-box">
                     <amp-img layout="intrinsic" width="754" height="521" src="https://www.yudiz.com/wp-content/uploads/2023/09/advantages-ed-games.png" alt="logo"></amp-img>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="advantages-content">
                     <div class="title-box">
                        <h3>Advantages of Our <strong class="under-line"><span>Educational Games</span></strong></h3>
                     </div>
                     <p class="big-p">Captivating creatives & immersive graphical layouts powered by storytelling features is our pioneering Educational Game Development Services accelerating active participation. Educational games by Yudiz is the unique cluster of innovative learning loops on a hyper-creative platform. </p>
                     <ul class="ed-ad-list">
                        <li>Collaborative Learning</li>
                        <li>Wider Participation</li>
                        <li>Creative Play-to-Learn</li>
                        <li>Innovative Problem-Solving</li>
                        <li>Digital Library Access</li>
                        <li>Eclectic Learning Models</li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="pattern-shape-img">
            <amp-img layout="intrinsic" class="spiner-ic" width="53" height="58" src="https://www.yudiz.com/wp-content/uploads/2023/09/spiner-ic.svg" alt="logo"></amp-img>
            <amp-img layout="intrinsic" class="ed-ad-cross" width="66" height="66" src="https://www.yudiz.com/wp-content/uploads/2023/09/ed-game-ic.svg" alt="logo"></amp-img>
            <amp-img layout="intrinsic" class="jug-ic" width="49" height="73" src="https://www.yudiz.com/wp-content/uploads/2023/09/jug-ic.svg" alt="logo"></amp-img>
         </div>
      </section>
      <!-- Advantages section End -->
      <!-- HIring Modal Section Start -->
      <section class="hiring-section common-section position-relative">
         <div class="container">
            <div class="row" style="justify-content:center;">
               <div class="col-md-10">
                  <div class="title-box text-center">
                     <h3 class="under-line"><span>Hiring Models</span></h3>
                  </div>
                  <div class="hiring-mod-content">
                     <div class="row">
                        <div class="col-md-4 col-sm-6 hire-wrap">
                           <div class="hire-box">
                              <div class="tit-hire"><h5>Full Time</h5></div>
                              <ul class="hire-con-list">
                                 <li>8hrs/Day - Hours</li>
                                 <li>1 Month/160hrs - Duration</li>
                                 <li>Agile - Methodology</li>
                                 <li>Basecamp & Jira - Project Tracking Tools</li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-md-4 col-sm-6 hire-wrap">
                           <div class="hire-box">
                              <div class="tit-hire"><h5>Part Time</h5></div>
                              <ul class="hire-con-list">
                                 <li>4hrs/Day - Hours</li>
                                 <li>1 Month/80hrs - Duration</li>
                                 <li>Agile - Methodology</li>
                                 <li>Basecamp & Jira - Project Tracking Tools</li>
                              </ul>
                           </div>
                        </div>
                        <div class="col-md-4 col-sm-6 hire-wrap">
                           <div class="hire-box">
                              <div class="tit-hire"><h5>Hourly Basis</h5></div>
                              <ul class="hire-con-list">
                                 <li>Per Hours - Hours</li>
                                 <li>As per need - Duration</li>
                                 <li>Agile - Methodology</li>
                                 <li>Basecamp & Jira - Project Tracking Tools</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                     <div class="theme-btn solid-black text-center">
                        <a class="talk-btn" href="#contact-amp-form">Know more</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="pattern-shape-img">
            <amp-img layout="intrinsic" class="hiring-sparrow" width="227" height="187" src="https://www.yudiz.com/wp-content/uploads/2023/09/hiring-ed-game-sparrow.png" alt="logo"></amp-img>
            <amp-img layout="intrinsic" class="hiring-bat" width="256" height="282" src="https://www.yudiz.com/wp-content/uploads/2023/09/hiring-ed-bat.png" alt="logo"></amp-img>
            <amp-img layout="intrinsic" class="hiring-rat" width="273" height="300" src="https://www.yudiz.com/wp-content/uploads/2023/09/hiring-ed-rat.png" alt="logo"></amp-img>
         </div>
      </section>
      <!-- HIring Modal Section End -->
      <!-- Cta Section Start -->
      <section class="cta-section bottom-cloud common-padding-small position-relative" style="background:#D4E7F5;">
         <div class="container">
            <div class="row" style="justify-content:center;">
               <div class="col-md-10">
                  <div class="cta-content text-center">
                     <h4>Make Learning Fun with the expertise of Yudiz</h4>
                     <p>Looking for Sturdy Educational Game Development Services? Engage our Game Developers for Stellar Ed-Game Apps </p>
                     <div class="theme-btn solid-blue">
                        <a class="talk-btn" href="#contact-amp-form">Talk with us</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="pattern-shape-img">
            <amp-img layout="intrinsic" class="cta-sparrow" width="91" height="58" src="https://www.yudiz.com/wp-content/uploads/2023/09/ed-game-cta-hat.png" alt="logo"></amp-img>
            <amp-img layout="intrinsic" class="cta-first-right" width="200" height="257" src="https://www.yudiz.com/wp-content/uploads/2023/09/ed-games-cta-grapes.png" alt="logo"></amp-img>
            <amp-img layout="intrinsic" class="cta-shape-right" width="91" height="65" src="https://www.yudiz.com/wp-content/uploads/2023/09/ed-game-cta-shape.png" alt="logo"></amp-img>
         </div>
      </section>
      <!-- Cta Section End -->
      <!-- portfolio Section Start -->
      <section class="portfolio-section common-section position-relative overflow-hidden" id="portfolio">
         <div class="container">
            <div class="row" style="justify-content:center;">
               <div class="col-md-10">
                  <div class="title-box text-center">
                     <h3 class="under-line"><span>Portfolio</span></h3>
                  </div>
               </div>
            </div>
         </div>
         <div class="custom-saperator"></div>
            <div class="custom-saperator"></div>
            <div class="portfolio-content">
               <amp-base-carousel loop="true" height="550" layout="fixed-height" autoplay delay="1000" auto-advance="true" auto-advance-interval="3000" visible-count="(min-width: 1600px)5.7,(min-width: 1400px)4.8,(min-width: 1200px)4.2,(min-width: 992px)3.8, (min-width: 768px)3.5,(min-width: 575px) 2.8,1.5" advance-count="(min-width: 1150px) 3, (min-width: 700px) 2, 1">
                  <div>
                     <figure>
                        <amp-img layout="intrinsic"  width="330" height="500" src="https://www.yudiz.com/wp-content/uploads/2023/09/phonix-ed-games.jpg" alt="logo"></amp-img>
                        <h5>Phonix</h5>
                     </figure>
                  </div>
                  <div>
                     <figure>
                        <amp-img layout="intrinsic"  width="330" height="500" src="https://www.yudiz.com/wp-content/uploads/2021/10/ivox-portfolio.png" alt="logo"></amp-img>
                        <h5>IVOX</h5>
                     </figure>
                  </div>
                  <div>
                     <figure>
                        <amp-img layout="intrinsic"  width="330" height="500" src="https://www.yudiz.com/wp-content/uploads/2021/10/portfolio-3.png" alt="logo"></amp-img>
                        <h5>Mystry Warrior</h5>
                     </figure>
                  </div>
                  <div>
                     <figure>
                        <amp-img layout="intrinsic"  width="330" height="500" src="https://www.yudiz.com/wp-content/uploads/2021/10/portfolio-1.png" alt="logo"></amp-img>
                        <h5>Library ideas</h5>
                     </figure>
                  </div>
                  <div>
                     <figure>
                        <amp-img layout="intrinsic"  width="330" height="500" src="https://www.yudiz.com/wp-content/uploads/2021/10/portfolio-5.png" alt="logo"></amp-img>
                        <h5>Mineral Craft</h5>
                     </figure>
                  </div>
                  <div>
                     <figure>
                        <amp-img layout="intrinsic"  width="330" height="500" src="https://www.yudiz.com/wp-content/uploads/2023/09/phonix-ed-games.jpg" alt="logo"></amp-img>
                        <h5>Phonix</h5>
                     </figure>
                  </div>
                  <div>
                     <figure>
                        <amp-img layout="intrinsic"  width="330" height="500" src="https://www.yudiz.com/wp-content/uploads/2021/10/ivox-portfolio.png" alt="logo"></amp-img>
                        <h5>IVOX</h5>
                     </figure>
                  </div>
                  <div>
                     <figure>
                        <amp-img layout="intrinsic"  width="330" height="500" src="https://www.yudiz.com/wp-content/uploads/2021/10/portfolio-3.png" alt="logo"></amp-img>
                        <h5>Mystry Warrior</h5>
                     </figure>
                  </div>
                  <div>
                     <figure>
                        <amp-img layout="intrinsic"  width="330" height="500" src="https://www.yudiz.com/wp-content/uploads/2021/10/portfolio-1.png" alt="logo"></amp-img>
                        <h5>Library ideas</h5>
                     </figure>
                  </div>
                  <div>
                     <figure>
                        <amp-img layout="intrinsic"  width="330" height="500" src="https://www.yudiz.com/wp-content/uploads/2021/10/portfolio-5.png" alt="logo"></amp-img>
                        <h5>Mineral Craft</h5>
                     </figure>
                  </div>
               </amp-base-carousel>
            </div>
         <div class="pattern-shape-img">
            <amp-img layout="intrinsic" class="hiring-sparrow" width="118" height="167" src="https://www.yudiz.com/wp-content/uploads/2023/09/ed-games-portfolio-ballon.png" alt="logo"></amp-img>
         </div>
      </section>
      <!-- portfolio Section End -->
      <!-- Other Service Section Start -->
      <section class="other-service-section position-relative">
         <div class="container">
            <div class="title-box text-center">
               <h3 class="under-line"><span>Our Other Services</span></h3>
            </div>
            <ul class="other-service-list">
               <li>
                  <div class="ser-list-box">
                     <div class="serv-border-box">
                        <div class="img-box">
                           <amp-img layout="intrinsic"  width="32" height="32" src="https://www.yudiz.com/wp-content/uploads/2023/09/mob-ed-game.png" alt="logo"></amp-img>
                        </div>
                        <h5>Mobile App Development</h5>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="ser-list-box" >
                     <div class="serv-border-box" style="border-color:#FF7094;">
                        <div class="img-box" style="background:#FF7094;">
                           <amp-img layout="intrinsic"  width="32" height="32" src="https://www.yudiz.com/wp-content/uploads/2023/09/vr-ed-games.png" alt="logo"></amp-img>
                        </div>
                        <h5>AR/VR Development</h5>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="ser-list-box" >
                     <div class="serv-border-box" style="border-color:#FFB742;">
                        <div class="img-box" style="background:#FFB742;">
                           <amp-img layout="intrinsic"  width="32" height="32" src="https://www.yudiz.com/wp-content/uploads/2023/09/web-ed-games.png" alt="logo"></amp-img>
                        </div>
                        <h5>Website Development</h5>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="ser-list-box" >
                     <div class="serv-border-box" style="border-color:#16BBA7;">
                        <div class="img-box" style="background:#16BBA7;">
                           <amp-img layout="intrinsic"  width="32" height="32" src="https://www.yudiz.com/wp-content/uploads/2023/09/ai-ml-ed-games.png" alt="logo"></amp-img>
                        </div>
                        <h5>AI/ML Development</h5>
                     </div>
                  </div>
               </li>
               <li>
                  <div class="ser-list-box" >
                     <div class="serv-border-box" style="border-color:#A485FF;">
                        <div class="img-box" style="background:#A485FF;">
                           <amp-img layout="intrinsic"  width="32" height="32" src="https://www.yudiz.com/wp-content/uploads/2023/08/blockchain-img-banner.webp" alt="logo"></amp-img>
                        </div>
                        <h5>Blockchain Development</h5>
                     </div>
                  </div>
               </li>
            </ul>
         </div>
         <div class="pattern-shape-img">
            <amp-img layout="intrinsic" class="other-ser-person" width="211" height="266" src="https://www.yudiz.com/wp-content/uploads/2023/09/ed-game-other-ser-person.png" alt="person"></amp-img>
            <amp-img layout="intrinsic" class="other-ser-pot" width="200" height="310" src="https://www.yudiz.com/wp-content/uploads/2023/09/ed-games-ser-pot.png" alt="shape"></amp-img>
         </div>
      </section>
      <!-- Other Service Section End -->
      <!-- Testimonials Section Start -->
      <section class="testimony-section position-relative common-section" id="testimonial">
         <div class="container">
            <div class="title-box text-center">
               <h3 class="under-line"><span>What our Clients Say?</span></h3>
            </div>
           <div class="row testimony-content">
               <div class="col-md-4 col-sm-6 testimony-wrap">
                  <div class="testimony-box">
                     <div class="testimony-desc">
                        <p>“Their Educational games are a right mix of creative influx &  problem solving levels that helps our users to keep learning seamlessly. It accelerates knowledge retention by equipping our users with multiple learning models. And, options like digital libraries are added dollops. ”</p>
                     </div>
                     <div class="testimony-logo text-center">
                        <amp-img layout="intrinsic" width="144" height="62" src="https://www.yudiz.com/wp-content/uploads/2023/09/phonics-museum-logo.png" alt="logo"></amp-img>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6 testimony-wrap">
                  <div class="testimony-box">
                     <div class="testimony-desc">
                        <p>“Yudiz is a platform we will recommend further for educational game development services. Mainly, as their educational games are developed with attention to details and state of art technology that helps our users to have a dynamic learning process. ”</p>
                     </div>
                     <div class="testimony-logo text-center">
                        <amp-img layout="intrinsic" width="144" height="62" src="https://www.yudiz.com/wp-content/uploads/2023/09/mystery-warrior-logo.png" alt="logo"></amp-img>
                     </div>
                  </div>
               </div>
               <div class="col-md-4 col-sm-6 testimony-wrap">
                  <div class="testimony-box">
                     <div class="testimony-desc">
                        <p>“As a pioneering educational games company Yudiz Solutions does justice to their educational games rightly. With integrating trending technologies to the best customized gaming attributes. We certainly believe that their educational game development services let you have a competitive upperhand. ”</p>
                     </div>
                     <div class="testimony-logo text-center">
                        <amp-img layout="intrinsic" width="144" height="62" src="https://www.yudiz.com/wp-content/uploads/2023/09/ivoz-books-logo.png" alt="logo"></amp-img>
                     </div>
                  </div>
               </div>
           </div>
         </div>
         <div class="pattern-shape-img">
            <amp-img layout="intrinsic" class="testimonial-person" width="200" height="310" src="" alt="shape"></amp-img>
         </div>
      </section>
      <!-- Testimonials Section End -->
       <!-- Cta Section Start -->
       <section class="cta-section common-padding-small cta-last position-relative overflow-hidden" style="background:url('https://www.yudiz.com/wp-content/uploads/2023/09/snowman-with-cta-bg.jpg')no-repeat center center/cover;">
         <div class="container">
            <div class="row" style="justify-content:center;">
               <div class="col-md-10">
                  <div class="cta-content text-center">
                     <h4> Let us make Educational Game-Changing for you.</h4>
                     <p>Winner Winner Lesson-Learner! We are the Ultimate Educational Games Company you need.</p>
                     <div class="theme-btn solid-blue">
                        <a class="talk-btn" href="#contact-amp-form">Contact Us</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="pattern-shape-img">
            <amp-img layout="intrinsic" class="cta-first-right" width="271" height="192" src="https://www.yudiz.com/wp-content/uploads/2023/09/ed-games-cta-rabbit.png" alt="logo"></amp-img>
         </div>
      </section>
      <!-- Cta Section End -->
      <!-- FAQ Section Start -->
      <section class="faq-amp-section common-section">
         <div class="container">
            <h3>Frequently asked questions</h3>
            <div class="custom-saperator"></div>
            <amp-accordion class="accordion" class="sample" expand-single-section animate>
               <section expanded>
                  <h4>
                     <dt>
                        <p>
                       1.  What are educational games?

                        </p> 
                     </dt>
                  </h4>
                  <dd>
                     <ul>
                     <li>It is basically a digital layout on which innovative learning styles are presented to make learning easier and engaging for the users. </li>
                     <li>Indifferent learning patterns are available on the interface which also includes preference based games. </li>
                     <li>It helps the user to learn and solve complex problems on various subjects easily. </li>
                     <li>These games also assist the users in managing a progress record, access collaborative learning, enter competitive tasks and can set a challenge to check their expertise.</li>
                     </ul>
               </dd>
               </section>
               <section>
                  <h4>
                     <dt>
                        <p>
                        2. Is it possible to get the educational game personalized?
                        </p> 
                     </dt>
                  </h4>
                  <dd>
                     <ul>
                        <li>Ed-Games can usually be customized and altered to the client’s perspective. </li>
                        <li>Like at Yudiz we have an in-house expert troupe of game developers assisted by a project manager. The team rightly caters and assists the clients in incorporating their specific demands with regards to rolling out cost-effective Ed-Gaming Solutions. </li>
                     </ul>
                  </dd>
               </section>
               <section>
                  <h4>
                     <dt>
                        <p>
                        3. How much does it cost to get an Education Game Developed?
                        </p> 
                     </dt>
                  </h4>
                  <dd>
                     <ul>
                  <li>The cost of getting such a game developed depends on a number of factors. </li>
                  <li>Factors like the learning dashboard, styles, features and modes sum up to the actual development cost. </li>
                  <li>On top of this, the cost also depends on the educational game development companies. Aspects like our respected client’s customization requests and the experts chosen are also some of the contingent factors. </li>
                  <li>Mainly, quoting an exact amount is difficult. Contact us and discuss your ideas now to know the exact development costs. </li>
<ul>
                  </dd>
               </section>
               <section>
                  <h4>
                     <dt>
                        <p>
                           4. Do educational games promote better learning?
                        </p> 
                     </dt>
                  </h4>
                  <dd>
                  <ul>
                  <li>The games that enhance learning are popularly known as learning games. It is a proven innovative learning path of the times. Where learning hits a level of boredom quite easily, these games come to the rescue. </li>
                  <li>It strikes a balance between learning and fun mechanisms. The perfect blend of new age learning styles where gameplays are added to capture and spark the user’s interest in learning.</li>
                  <li>With that various modes are available and made accessible for the users on our Ed-Games including collaboration, challenge modes, creative learning modes and much more.</li>
                  <li>Education gamification is the new and most favorable learning pattern adapted by the users.</li>
                  </ul>
                  </dd>
               </section>
               <section>
                  <h4>
                     <dt>
                        <p>
                           5. How do you develop an educational game?
                        </p> 
                     </dt>
                  </h4>
                  <dd>
                     <ul>
                  <li>There is a full-rounded game development process that we follow at Yudiz as an Educational Games Company. </li>
                  <li>And, when it comes to Educational games, we have a myriad of steps followed to pan out utmost impeccable games.</li>
                  <li>The ultimate goal is to design and develop a captivating and visually appealing game that makes learning easiest and most fun for your users. </li>
                  <li>From advanced tech-stack to full-cycle expert development processes, extensive R&D to the product growth-support and post-sale assistance. </li>
                  <li>To know more about the same, book a free demo now. </li>
</ul>

                  </dd>
               </section>
              
               </amp-accordion>
         </div>
      </section>
      <!-- FAQ Section End  -->
      <!-- Get in touch Start -->
      <div id="get-in-touch-scroll" class="common-section">
         <div class="get-project-section">
            <div class="wpb_wrapper">
               <h6 style="text-align: center;">Let’s create something Amazing</h6>
               <h2 class="mid-h1" style="text-align: center; margin-bottom:0;">Start a Conversation</h2>
            </div>
            <div class="custom-saperator"></div>
            <div class="theme-btn bordered-black">
               <a class="talk-btn" href="#contact-amp-form">Still Have Questions? Let’s Talk!</a>
            </div>
         </div>
      </div>
      </body>
</html>

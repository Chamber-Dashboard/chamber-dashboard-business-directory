<?php
/*Subscribe to emails through the plugin pages*/

if ( ! defined( 'ABSPATH' ) ) exit;

function cdash_email_subscribe(){
  ?>
  <div class="cdash_email_subscribe_div">
    <div>
      <h2>Be the first to know about updates and new features.</h2>
      <button type="button" name="cdash_email_subscribe" class="cdash_admin email_signup button-primary" title="Sign up for updates" aria-label="Sign up for updates"><?php esc_html_e('Stay Up-to-Date'); ?></button>
    </div>
    <div class="cdash_email_popup cdash_wrapper">
      <button type="button" class="close_button cdash_admin" title="close" aria-label="Close">X</button>
      <form action="" method="post" name="cdash_email_subscribe" class="email_subscribe_form">
          <div>
            <label for="First Name"><?php esc_html_e('First Name'); ?></label>
            <input type="text" name="first_name" />
          </div>
          <div>
            <label for="Last Name"><?php esc_html_e('Last Name'); ?></label>
            <input type="text" name="last_name" />
          </div>
          <div>
            <label for="Email"><?php esc_html_e('Email'); ?></label>
            <input type="email" name="cdash_email" />
          </div>
          <div class="actions">
            <button type="submit" name="cdash_ac_email_subscribe" class="button-primary cdash_form cdash_admin" title="Subscribe" aria-label="Subscribe"><?php esc_html_e('Subscribe'); ?></button>
          </div>
      </form>
      <?php
        if(isset($_POST['cdash_ac_email_subscribe'])){
          $firstname = $_POST['first_name'];
          $lastname = $_POST['last_name'];
          $email = $_POST['cdash_email'];
          $url = 'https://chamberdashboard.activehosted.com';

          $params = array(
            'api_key' =>  'cc01252383c15b7100801098b2165e3d2fedd80324d66a89b3d7ab45a9cc1fa6b8823233',
            // this is the action that adds a contact
            'api_action'   => 'contact_add',
            'api_output'   => 'serialize',
          );

          // here we define the data we are posting in order to perform an update
          $post = array(
              'email'                    => $email,
              'first_name'               => $firstname,
              'last_name'                => $lastname,
              //'ip4'                    => '127.0.0.1',

              // assign to lists:
              'p[5]'                   => 5, // example list ID (REPLACE '123' WITH ACTUAL LIST ID, IE: p[5] = 5)
              'status[5]'              => 1, // 1: active, 2: unsubscribed (REPLACE '123' WITH ACTUAL LIST ID, IE: status[5] = 1)
              //'form'          => 1001, // Subscription Form ID, to inherit those redirection settings
              //'noresponders[123]'      => 1, // uncomment to set "do not send any future responders"
              //'sdate[123]'             => '2009-12-07 06:00:00', // Subscribe date for particular list - leave out to use current date/time
              // use the folowing only if status=1
              'instantresponders[123]' => 1, // set to 0 to if you don't want to sent instant autoresponders
              //'lastmessage[123]'       => 1, // uncomment to set "send the last broadcast campaign"

              //'p[]'                    => 345, // some additional lists?
              //'status[345]'            => 1, // some additional lists?
          );

          // This section takes the input fields and converts them to the proper format
          $query = "";
          foreach( $params as $key => $value ) $query .= urlencode($key) . '=' . urlencode($value) . '&';
          $query = rtrim($query, '& ');

          // This section takes the input data and converts it to the proper format
          $data = "";
          foreach( $post as $key => $value ) $data .= urlencode($key) . '=' . urlencode($value) . '&';
          $data = rtrim($data, '& ');

          // clean up the url
          $url = rtrim($url, '/ ');

          // This sample code uses the CURL library for php to establish a connection,
          // submit your request, and show (print out) the response.
          if ( !function_exists('curl_init') ) die('CURL not supported. (introduced in PHP 4.0.2)');

          // If JSON is used, check if json_decode is present (PHP 5.2.0+)
          if ( $params['api_output'] == 'json' && !function_exists('json_decode') ) {
              die('JSON not supported. (introduced in PHP 5.2.0)');
          }

          // define a final API request - GET
          $api = $url . '/admin/api.php?' . $query;

          $request = curl_init($api); // initiate curl object
          curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
          curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
          curl_setopt($request, CURLOPT_POSTFIELDS, $data); // use HTTP POST to send form data
          //curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment if you get no gateway response and are using HTTPS
          curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);

          $response = (string)curl_exec($request); // execute curl post and store results in $response

          // additional options may be required depending upon your server configuration
          // you can find documentation on curl options at http://www.php.net/curl_setopt
          curl_close($request); // close curl object

          if ( !$response ) {
              die('Nothing was returned. Do you have a connection to Email Marketing server?');
          }

          // This line takes the response and breaks it into an array using:
          // JSON decoder
          //$result = json_decode($response);
          // unserializer
          $result = unserialize($response);
          // XML parser...
           /*$result = new XMLWriter();
           $result->openURI('php://output');
           $result->startDocument('1.0','UTF-8');
           $result->setIndent(4);
           $result->startElement('subscriber_insert_post');
           //$result->startElement("result_code");
           $result->writeElement('result_code', 1);
           $result->writeElement('result_message', 'Contact successfully added');
           //$result->endElement();
           //$result->startElement("msg");
           $result->writeAttribute('result_output', 'xml');
           //$result->endElement();
           $result->endElement();
           $result->endDocument();
           $result->flush();*/

          // Result info that is always returned
          //echo 'Result: ' . ( $result['result_code'] ? 'SUCCESS' : 'FAILED' ) . '<br />';
          if($result['result_code']){
            echo '<br /><br />' . $email . ' was successfully added to Chamber Dashboard subscribers list.';
          }else{
            echo '<br /><br />' . $result['result_message'] . '<br />';
          }


          // The entire result printed out
          /*echo 'The entire result printed out:<br />';
          echo '<pre>';
          print_r($result);
          echo '</pre>';*/

          // Raw response printed out
          /*echo 'Raw response printed out:<br />';
          echo '<pre>';
          print_r($response);
          echo '</pre>';*/

          // API URL that returned the result
          /*echo 'API URL that returned the result:<br />';
          echo $api;

          echo '<br /><br />POST params:<br />';
          echo '<pre>';
          print_r($post);
          echo '</pre>';*/
        }
      ?>
    </div>
  </div>
<?php
}
?>

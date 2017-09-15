<?php
	
	# Start the session 
	session_start();
	
	# Autoload the required files
	require_once __DIR__ . '/vendor/autoload.php';
	# Set the default parameters
	$fb = new Facebook\Facebook([
	  'app_id' => '239018943292833',
	  'app_secret' => '1a11f41dd2211eca3c47c9674d36b1b0',
	  'default_graph_version' => 'v2.5',
	]);
	$redirect = 'http://localhost/imageWrap/home.php';
	# Create the login helper object
	$helper = $fb->getRedirectLoginHelper();
	# Get the access token and catch the exceptions if any
	try {
	  $accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookResponseException $e) {
	  // When Graph returns an error
	  echo 'Graph returned an error: ' . $e->getMessage();
	  exit;
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  // When validation fails or other local issues
	  echo 'Facebook SDK returned an error: ' . $e->getMessage();
	  exit;
	}
	
    //make variables
    $loginUrl="";
    $usernameSet="";
	if (isset($accessToken)) {
	  	// Logged in!
	 	// Now you can redirect to another page and use the
  		// access token from $_SESSION['facebook_access_token'] 
  		// But we shall we the same page
		// Sets the default fallback access token so 
		// we don't have to pass it to each request
		$fb->setDefaultAccessToken($accessToken);
		try {
		  $response = $fb->get('/me?fields=email,name');
		  $userNode = $response->getGraphUser();
		}catch(Facebook\Exceptions\FacebookResponseException $e) {
		  // When Graph returns an error
		  echo 'Graph returned an error: ' . $e->getMessage();
		  exit;
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		  // When validation fails or other local issues
		  echo 'Facebook SDK returned an error: ' . $e->getMessage();
		  exit;
		}
		// Print the user Details
		//echo "Welcome !<br><br>";
		//echo  $userNode->getName();
		      $usernameSet= $userNode->getId();
//		echo 'Email: ' . $userNode->getProperty('email').'<br><br>';
		$image = 'https://graph.facebook.com/'.$userNode->getId().'/picture?width=1024';
//		echo "Picture<br>";
//		echo "<img src='$image' /><br><br>";
        
//        $permissions  = ['email'];
//		$loginUrl = $helper->getLoginUrl($redirect,$permissions);
		
	}else{
		$permissions  = ['email'];
		$loginUrl = $helper->getLoginUrl($redirect,$permissions);
	}
?>
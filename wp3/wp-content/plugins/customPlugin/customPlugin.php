/**
 * Plugin Name: User Email Domain Allowlist
 */

function validate_registration_email_domain( $errors, $user_login, $email ) {
  $permitted_domains = [
    'gmail.com',
    'hotmal.com'
  ];

  $email_domain = explode( '@', $email )[1];

  if( ! in_array( $email_domain, $permitted_domains ) ) {
    $errors->add(
      'email_domain_invalid',
      sprintf(
        'Registration is not permitted for email addresses at that domain. Valid email domains are %s',
        implode( ', ', $permitted_domains )
      )
    );
  }

  return $errors;
}

add_filter( 'registration_errors', 'validate_registration_email_domain', 10, 3 );
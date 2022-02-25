<?php
	
	if ( ! class_exists( 'ben_plug_restrict_usernames_emails_characters_validation' ) ) :
	
	class ben_plug_restrict_usernames_emails_characters_validation extends ben_plug_restrict_usernames_emails_characters_glob {
		public function __construct(  ) {
			parent::__construct();
		}
		
		private $va1 = true;
		
		public function func__part($login) {
			$names_limit_partial = trim($this->options('names_limit_partial'));
			if ($names_limit_partial == '') return false;
			
		    $names_partial = array_filter(array_unique(array_map('trim',explode(PHP_EOL, $names_limit_partial))));
			$spr = apply_filters( 'filter_benrueeg_rue_partial_separator', ' | ' ); // add_filter( 'filter_benrueeg_rue_partial_separator', function() {return ' , ';});
			
			$c = true;
			$a = $d = $e = $s = $end = $end_avt = false;
			foreach ( $names_partial as $_part ) {
				
				if ( $this->options("names_limit_partial_opt") == 'restrict_contain' ) {
				$a = true;
				if (strpos( $login, $_part ) !== false)
				return $_part;
				} elseif ($this->options("names_limit_partial_opt") == 'restrict_except') {
			    $e = true;
                if (strpos( $login, $_part ) !== false)
				$c = false;
				} elseif ($this->options("names_limit_partial_opt") == 'restrict_without_start') {
			    $s = true;
                if (strpos( $login, $_part ) === 0)
				$d = true;
				} elseif ($this->options("names_limit_partial_opt") == 'restrict_without_end') {
                $end_avt = true;
				if (substr($login, -strlen($_part)) === $_part)
				$end = true;	
				}					
				
			}
			
			    if ($a != true) {
				if ($c && !$s && !$end_avt || !$d && !$e && !$end_avt || $end_avt && !$end)
			    return implode($spr, $names_partial);
				}
			
			return false;
		}
		/*
			public function func_part($login) {
			if ( $this->func__part($login) )
			return true;
			return false;
			}
		*/
		
		public function func_space_s_e_m($login) {
		
			$allow_spc_cars = $this->options('allow_spc_cars');
		    $list_chars_ = array_filter(array_unique(array_map('trim',explode(PHP_EOL, $allow_spc_cars))));
			$list_chars = implode('\\', $list_chars_);

		    $_login = preg_match( '/[à]/', $list_chars ) ? str_replace("à", "", $login) : $login;
			
			if ( preg_match('/^\s+|\s+$| \s+/', $_login ) )
			return true;
			return false;
		}
		
		public function func_replogin($login) {
			$replogin = preg_match( '/^\+?\d+$/', $login ) && !$this->func_space_s_e_m($login) ? str_replace("+", "", $login) : $login;
			return $replogin;
		}
		
		public function func_s($login) {
			if ( preg_match( '/^\+?\d+\s+$/', $login ) )
			return true;
			return false;
		}
		
		public function func_validation( $valid, $login ) {
			
		    $namelogin = $this->options('namelogin'); // filter user_login field in registration form
			$login = $namelogin == '' ? $login : (isset($_POST[$namelogin]) ? $_POST[$namelogin] : $login) ;
			
			$__valid = $this->mu_bp() ? true : $valid;
			$_valid  = $this->mu_bp() ? $valid = true : $valid = false;
			
            if ( $this->can_create_users() && is_admin() ) return $__valid;
			
		    $list_chars = array_filter(array_unique(array_map('trim',explode(PHP_EOL, $this->options('disallow_spc_cars')))));
			$list_chars_dis = implode($list_chars);
			
			$names_limit = $this->options('names_limit');
			
			// ++++++ empty login
			$name_empty = $this->wp__less_than('4.4') ? !empty($login) : true;
			if ( $this->B_name && $name_empty ) {
				$this->B___name = true;
				return $_valid;
			}
			
			// ++++++ space_start_end_multi
			if ( username_exists( $login ) && $this->func_space_s_e_m($login) || $this->func_s($login) ){
					$this->space_start_end_multi = true;
					return $_valid;
			}
			
			// ++++++ username_exists
			$replogin = $this->func_replogin($login);
			if ( username_exists( $login ) || username_exists( $replogin ) ){
				$this->exist__login = true;
				return $_valid;
			} 
			
			$_part = array("'","\\\\",'"');
			foreach ($_part as $__part) 
			{	
				if ( $__valid && strpos( $login, $__part ) !== false ) {
					$this->invalid_chars_allow = true;
					return $_valid;
				} 
			}
			
			// ++++++ invalid
			if (!$__valid ) {
				$this->invalid = true;
				return $_valid;
			}
			
			// ++++++ spc_cars
			$preg_ = array('-','_','.','@');	
			foreach ($preg_ as $preg) 
			{	
				if ( $__valid &&  preg_match('/['.$preg.']/', $list_chars_dis ) && preg_match('/['.$preg.']/', $login ) && $this->options('disallow_spc_cars') ) {
					$this->valid_charts = true;
					return $_valid;
				} 
			} // foreach
			
			// ++++++ space_start_end_multi
			if ( !username_exists( $login ) ){
				if ( $this->func_space_s_e_m($login) ) {
					$this->space_start_end_multi = true;
					return $_valid;
				}
			}
			
			// ++++++ space
			if ( !$this->mu_bp() ) {
			if ( $__valid && preg_match('/ /', $login) && $this->options('p_space') == 'on' ) {
				$this->space = true;
				return $_valid;
			}
			}
			
			// ++++++ limit names
		    $names = array_filter(array_unique(array_map('trim',explode(PHP_EOL, $names_limit))));
			if ( $__valid && in_array( $login, $names ) && $names_limit ){
				$this->invalid_names = true;
				return $_valid;
			}	
			
			// ++++++ uppercase names
			$upper__case = $this->options('uppercase');
			$uppercase = $this->mu() ? !$upper__case : $upper__case;
			if ( $__valid && preg_match('/[A-Z]/', $login ) && $uppercase ) {
				$this->uppercase_names = true;
				return $_valid;
			}

			// ++++++ name_not__email
			if ( $__valid && is_email( $login ) && $this->options('name_not__email') ) {
				$this->name_not__email = true;
				return $_valid;
			}
			
			// ++++++ partial
			if ( $__valid && $this->func__part($login) ) {
				$this->valid_partial = true;
				return $_valid;
			}
			
			// ++++++ min
			$min_length = $this->options('min_length');
			$length_space = $this->options('length_space');
			$mbstrlen = preg_match( '/^\+\d+$/', $login ) ? mb_strlen($login) - 1 : mb_strlen($login);
			$strlen = $length_space != 'on' || $this->mu_bp() ? $mbstrlen - substr_count($login, ' ') : $mbstrlen ;
			if ( $__valid && $strlen < $min_length && ! empty($min_length) && ! empty($login) ) {
				$this->length_min = true;
				return $_valid;
			}
			
			// ++++++ max
			$max_length = $this->options('max_length');
			$v_max_length = $strlen > $max_length || $strlen > 60;
			if ( $__valid && $v_max_length && ! empty($max_length) && ! empty($login) ) {
				$this->length_max = true;
				return $_valid;
			}
			
			// ++++++ num
			if ( preg_match('/^[0-9]+$/i', $login ) || preg_match( '/^\+?\d+$/', $login ) || preg_match( '/^[0 -9]+$/i', $login ) && $this->options('p_space') != 'on' ) {
				if ( $__valid && $this->options('p_num') ) {	
					$this->valid_num = true;
					return $_valid;
				}
			}
			
			// ++++++ num_less
			//$va = $this->mu() ? $this->va1 : $valid ;
			
			$int = preg_replace('/[^0-9]+/', '', $login);
			$wout_sp =  preg_replace('/ /', '', $login);
			$c = mb_strlen($wout_sp) - strlen($int);
			if ( $__valid && $c <= strlen($int) && $c >= 1 && $this->options('digits_less') && !preg_match( '/^\+?\d+$/', $login ) ) {
				$this->valid_num_less = true;
				return $_valid;
			}
			
			return $__valid;
		}
		
	}
	
	endif;
	

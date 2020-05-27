<?php
use App\Language;
use App\Counter;
$visitorNumber = Counter::getData('visitor');
$language = new Language();
$language->init($visitorNumber);
$domain = $language->getDomain(); 
$languageUrls = $language->getLanguageUrls();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title><?php echo _("Log in - Pan Chen"); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="alternate" href="<?php echo $languageUrls[1]; ?>" hreflang="zh-cn" />
	<link rel="alternate" href="<?php echo $languageUrls[2]; ?>" hreflang="zh-tw" />
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/admin.css">
	<script src="/js/admin.js"></script>
</head>
<style>
    .flag {
        margin-bottom: 25px;
    }
    .flag img {
        width: 125px;
    }
</style>
<style>
/*Footer*/
#footer {
	margin-top: 8em;
	font-size: 10px;
	text-align: center;
	margin-bottom: 3em;
}
#footer-logo {
	width: 20px;
	height: 20px;
	border-radius: 100%;
}
#copyright, #acknowledgements {
	margin-bottom: 8px;
}
#vultr, #cloudflare {
	display: inline;
}
#vultr-logo {
	width: 12px;
	height: 12px;
	border-radius: auto;
}
#cloudflare-logo {
	width: auto;
	height: 12px;
	border-radius: auto;
}
#footer a {
	color: #192236;
}

#footer {
	font-family: Georgia, -apple-system, 'Nimbus Roman No9 L', Arial, sans-serif;
}

@media (min-width: 785px) {
	#footer {
		font-size: 20px;
	}
	#footer-logo {
		width: 20px;
		height: 20px;
		border-radius: 100%;
	}
	#vultr-logo {
		width: 16px;
		height: 16px;
		border-radius: auto;
	}
	#cloudflare-logo {
		width: auto;
		height: 16px;
		border-radius: auto;
	}
}
</style>
<body>
    <div class="mainContent">
        <h2 id = "login-page-title"><?php echo _('Login');?></h2>

<style>
form {
  max-width: 300px;
  margin-left: auto;
  margin-right: auto;
}

input {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  border: 1px solid #ccc;
  border-radius: .1875rem;
  box-sizing: border-box;
  display: block;
  font-size: .875rem;
  margin-bottom: 1rem;
  padding: .275rem;
  width: 100%;
}

input[type="checkbox"] {
  -webkit-appearance: checkbox;
     -moz-appearance: checkbox;
          appearance: checkbox;
  display: inline-block;
  width: auto;
}

input[type="password"] {
  margin-bottom: .5rem;
}

input[type="submit"] {
  background-color: #4D5139;
  border: none;
  color: #fff;
  font-size: 1rem;
  padding: .5rem 1rem;
}

label {
  color: #666;
  font-size: .875rem;
}
#login-page-title {
    text-align: center;
}
</style>


            <form method="POST" action="{{ route('login') }}">
                @csrf

                    <label for="email">{{ __('E-Mail Address') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    

                    <label for="password">{{ __('Password') }}</label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                            <input class="dashboard-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>

                    <input type="submit" value={{ __("Login") }}>
            </form>
    </div>    
    <footer id = "footer">
        @yield('copyright', View::make('shared-components/copyright'))
        @yield('acknowledgements', View::make('shared-components/acknowledgements'))
    </footer>
</body>
</html>



















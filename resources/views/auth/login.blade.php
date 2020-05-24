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
        <h2><?php echo _('Login');?></h2>
        <p><?php echo _('Welcome Back! Pan Chen.');?></p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
    </div>    
    <footer id = "footer">
    <div id = "copyright">
		Copyright &copy; 2016 - <?php echo date("Y");?> Pan <img id = 'footer-logo' src='/android-chrome-192x192.png' alt = 'My Photo'/> Chen. All Rights Reserved.
	</div>
    @yield('acknowledgements', View::make('shared-components/acknowledgements'))
    </footer>
</body>
</html>



















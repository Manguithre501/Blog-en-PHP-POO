<div class="mobile-panel">
    <div class="wrap">
        <div class="wrap_float">
            <div class="mobile-btn" id="js-menu-open">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <a class="logo" href="/">
                uipaper
            </a>
            <div class="search-button"></div>
        </div>
    </div>
</div>

<div class="container-wrap--dummy"></div>

<div class="top-panel" id="js-panel">
    <div class="wrap">
        <div class="wrap_float">
            <div class="mode-check">
                <input type="checkbox" id="mode-checkbox" class="mode-checkbox-input">
                <label for="mode-checkbox" class="mode-checkbox-label" data-dark-title="Dark Mode"
                    data-light-title="Light Mode"></label>
            </div>
            <div class="wrap-center">
                <a href="/" class="logo">
                    {{ APP_NAME }}
                </a>
                <div class="menu" id="js-menu">
                    <ul>
                        <li class="{{ route::getCurrentUrl() === '' ? 'active' : '' }}">
                            <a href="/">Accueil</a>
                        </li>


                        @auth
                        <li class="profile-li">
                            <a href="profile.html" class="profile-link getModal">
                                <div class="author-image">
                                    <img src="{{ logo::firstChars() }}" alt="" class="image-cover">
                                </div>
                                <span>Profile</span>
                            </a>
                            <ul class="profile-ul">
                                <li><a href="/profile">Paramètres</a></li>
                                <li><a href="favorites.html">Favoris</a></li>

                                <li>
                                    <form action="{{ route::name('logout') }}" method="POST">
                                        <button type="submit" class="btn-logout">Déconnexion</button>
                                    </form>
                                </li>

                            </ul>
                        </li>
                        @endauth

                        @guest
                        <li class="login-li"><a data-href="#modal-login" class="login-link getModal">Se
                                connecter</a>
                        </li>
                        @endguest
                    </ul>




                </div>
            </div>
            <div class="search-button" id="btn-search"></div>
        </div>
        <div class="socials">
            <a class="soc-link">
                <img src="@asset('img/facebook-icon.svg')" class="img-svg" alt="">
            </a>
            <a class="soc-link">
                <img src="@asset('img/twitter-soc-icon.svg')" class="img-svg" alt="">
            </a>

        </div>
        <div class="menu-close" id="js-menu-close"></div>
    </div>
</div>

@guest
<div style="display: none;">
    <div class="modal modal_default modal_login" id="modal-login">
        <div class="modal_wrap">
            <h2 class="title">Se connecter à {{ APP_NAME }}</h2>
            <div class="modal-form">
                <form action="{{ route::name('store') }}" method="POST" onsubmit="return false;" id="loginForm">
                    <div class="input-wrap white-label">
                        <input type="text" name="email" class="input" placeholder="Email">
                    </div>
                    <div class="input-wrap white-label password-field">
                        <input type="password" name="password" class="input password-input" placeholder="Mot de passe">
                        <button class="show-password-btn"></button>
                    </div>
                    {{-- <div class="agreement">
                        <input type="checkbox" class="agreement-checkbox" id="remember-1">
                        <label for="remember-1" class="agreement-label">
                            <span>
                                Remember me
                            </span>
                        </label>
                    </div> --}}
                    <button type="submit" class="btn disabled" id="submit">
                        <span>Connexion</span>
                    </button>
                </form>

            </div>
            <div class=" modal-info">
                <p><a data-href="#modal-reset-password">Mot de passe oublié ?</a></p>
                <p>Pas encore membres ? <a data-href="#modal-registration" class="getModal">S'inscrire.</a></p>
            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div>
@endguest

{{-- <div style="display: none;">
    <div class="modal modal_default modal_registration" id="modal-registration">
        <div class="modal_wrap">
            <h2 class="title">S'inscrire sur {{ APP_NAME }}</h2>
            <div class="modal-form">
                <div class="input-wrap white-label">
                    <input type="text" class="input" placeholder="Email">
                </div>
                <div class="input-wrap white-label password-field">
                    <input type="password" class="input password-input" placeholder="Password">
                    <button class="show-password-btn"></button>
                </div>
                <div class="agreement">
                    <input type="checkbox" class="agreement-checkbox" id="agree-1">
                    <label for="agree-1" class="agreement-label">
                        <span>
                            I accept the conditions of transmitting information
                        </span>
                    </label>
                </div>
                <button class="btn submit-btn">
                    <span>Insrciption</span>
                </button>

            </div>
            <div class="modal-info">
                <p>Déjà membre ? <a data-href="#modal-login" class="getModal">S'identifier</a></p>
            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div>


<div style="display: none;">
    <div class="modal modal_default modal_reset" id="modal-reset-password">
        <div class="modal_wrap">
            <h2 class="title">Forgot password?</h2>
            <div class="subtitle">
                Use the e-mail and password that you specified when registering on the site
            </div>
            <div class="modal-form">
                <div class="input-wrap white-label">
                    <input type="text" class="input" placeholder="Email">
                </div>
                <button class="btn submit-btn">
                    <span>Reset Password</span>
                </button>
            </div>
            <div class="modal-info">
                <p>Don’t have an account? <a data-href="#modal-registration" class="getModal">Create your own right
                        now.</a></p>
            </div>
        </div>
        <div class="modal_close"></div>
    </div>
</div> --}}

@push('scripts')

@guest


<script>
    const form = document.getElementById('loginForm'),
    route_login = form.getAttribute('action'),
    baseUrl = "{{ APP_URL }}",
    btn_login =  document.getElementById('submit');
    btn_login.disabled = true;

    form.email.addEventListener('keyup', () => {
   
   if(form.password.value === '' || form.email.value === '')
   {
       btn_login.disabled = true;
       btn_login.classList.add('disabled');   
   }
   else
   {
       btn_login.disabled = false;
       btn_login.classList.remove('disabled');
    }
   });

   form.password.addEventListener('keyup', () => {
        
        if(form.email.value === '' || form.password.value === '')
        {
            btn_login.disabled = true;
            btn_login.classList.add('disabled');
           
            }
            else
        {
            btn_login.disabled = false;
            btn_login.classList.remove('disabled');
            }
    });


    $("#submit").click(function (e) {
        form.email.disabled = true;
     form.password.disabled = true;
     btn_login.disabled = true;
     btn_login.classList.add('load');

         let data = JSON.stringify({
                        email: form.email.value,
                        password:form.password.value
                        });

                      

                    

                    axios.post(route_login, data, {
                    headers: {'Content-Type': 'multipart/form-data'},
                    baseUrl: baseUrl,
                }).then(response => {

                    response.data === 'ok' ? window.location.href = baseUrl : '';
                
                })
                .catch(err => {

                    setTimeout(() => {
                        
                        form.email.disabled = false;
                        form.password.disabled = false;
                        btn_login.disabled = false;
                        btn_login.classList.remove('load');
                        form.email.value = '';

                    }, 2000);

                    
                    if(err.response.status === 400)
                    {
                
                        console.log(err.response.data);
                        if(err.response.data.exists != null)
                        {
                            setTimeout(() => {
                                useSwallError(err.response.data.exists);
                            }, 2010);
                        }
                    
                    
                    }
                
                });

                    form.password.value = "";
    });

</script>

@endguest
@endpush
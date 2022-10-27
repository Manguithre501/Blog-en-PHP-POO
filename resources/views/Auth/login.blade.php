@extends('guest')
@section('content')


<section id="content">
    <div class="content-wrap py-0">

        <div class="section m-0 py-6">
            <div class="curve-bg"></div>
            <div class="container d-flex justify-content-center align-items-center">

                <div class="cs-signin-form">
                    <div class="cs-signin-form-inner">
                        <div class="text-center">
                            <h3 class="h4 fw-bolder mb-3">Se connecter à {{ APP_NAME }} </h3>
                        </div>


                        <div class="clear mt-5"></div>



                        <form id="loginForm" class="mb-0 row" action="{{ route::name('store') }}" method="post"
                            onsubmit="return false;">

                            <div class="col-12 form-group">
                                <label class="nott ls0 fw-normal mb-1" for="email">Email:</label>
                                <input type="text" id="email" name="email" class="form-control"
                                    placeholder="Entrez votre adresse email">
                                <span id="errorEmail" class="text-danger mt-1 small"></span>
                            </div>
                            <div class="clear"></div>
                            <div class="col-12 form-group">
                                <label class="nott ls0 fw-normal mb-1" for="password">Mot de passe:</label>
                                <div class="input-group">
                                    <input id="password" type="text" name="password" class="form-control border-end-0"
                                        placeholder="Mot de passe">
                                    <button class="btn border" onclick="myFunction()" type="button"><i
                                            class="icon-line-eye text-smaller"></i></button>
                                </div>
                                <span id="errorPassword" class="text-danger mt-1 small"></span>
                            </div>

                            {{-- <div class="col-12 d-flex justify-content-between">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                        value="option2">
                                    <label class="form-check-label nott ls0 mb-0 fw-semibold"
                                        for="inlineCheckbox2">Remember me</label>
                                </div>
                                <a href="#" class="text-smaller fw-medium"><u>Forgot Password?</u></a>
                            </div> --}}

                            <div class="col-12 mt-4">
                                <button class="button w-100 bg-alt py-2 rounded-1 fw-medium nott ls0 m-0"
                                    id="submit">Connexion</button>
                            </div>
                        </form>
                        <p class="mb-0 mt-4 text-center fw-semibold">Pas encore membre ? <a
                                href="{{ route::name('register') }}">S'inscrire</a></p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
@endsection

@push('scripts')

<script src="@asset('js/axios/dist/axios.js')"></script>

<script>
    const form = document.getElementById('loginForm'),
    url = form.getAttribute('action'),
    btn =  document.getElementById('submit');
 
    btn.disabled = true;

    form.email.addEventListener('keyup', () => {
   
   if(form.password.value === '' || form.email.value === '')
   {
       btn.disabled = true;
       btn.classList.add('disabled');
       
   }
   else
   {
       btn.disabled = false;
       btn.classList.remove('disabled');
    }
   });

   form.password.addEventListener('keyup', () => {
        
        if(form.email.value === '' || form.password.value === '')
        {
            btn.disabled = true;
            btn.classList.add('disabled');
           
            }
            else
        {
            btn.disabled = false;
            btn.classList.remove('disabled');
            }
    });
    

    $("#submit").click(function (e) {
        form.email.disabled = true;
     form.password.disabled = true;
     btn.disabled = true;
         let data = JSON.stringify({
                        email: form.email.value,
                        password:form.password.value
                        }),

                        errorEmail = document.getElementById('errorEmail'),
                        errorPassword = document.getElementById('errorPassword');

                    axios.post(url, data, {
                    headers: {'Content-Type': 'multipart/form-data'},
                    baseUrl: 'http://dts/POO/',
                }).then(response => {
                    response.data === 'ok' ? window.location.href = "http://dts/POO/" : '';
                })
                .catch(err => {
                    if(err.response.status === 400)
                    {
                
                        console.log(err.response.data);


                        if(err.response.data.exists != null)
                        {
                            /* useSwallError(err.response.data.exists); */
                            errorEmail.innerHTML= err.response.data.exists;
                        }

                        if(err.response.data.vide != null)
                        {
                            /* errorEmail.innerHTML= err.response.data.vide; */
                            useSwallError(err.response.data.vide);
                        }
                    
                    
                    }
                
                });

form.password.value = "";
    });

</script>

@endpush
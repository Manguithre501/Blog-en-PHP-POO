@extends('guest')
@section('content')


<div class="single-header header-wide image-header with-wide-wrap">
    <div class="image-wrap">
        <img src="@asset('img/' . $article->image)" alt="" class="image-cover bg-img">
    </div>
    <div class="wrap wrap-center">
        <div class="wrap_float">
            <div class="breadcrumbs white-color">
                <a href="/">Accueil</a> /<span class="current">Article</span>
            </div>
        </div>
    </div>
</div>

<div class="page-wrap">
    <div class="page-wrap-content">
        <div class="post-single-wrap sticky-parent">
            <div class="share-block">
                <div class="share-block-main js-share-block-main">
                    <div class="socials">

                        <a class="soc-link" data-title="Github">
                            <span class="soc-icon">
                                <img src="@asset('img/github-50-icon.svg')" class="img-svg" alt="">
                            </span>
                        </a>

                        <div class="soc-link show-more-socials" style="display: none;"></div>
                    </div>
                    <div class="share-block-item js-anchor link-to-comments" data-href="#comments-section">
                        <div class="comments-count">
                            <span>234</span>
                        </div>
                    </div>
                </div>
                <div class="share-block-item mobile-item js-mobile-share-show mobile-share-show-btn">
                    <div class="show-mobile-icon"></div>
                </div>
                <div class="share-block-item add-to-favorites">
                    <div class="favorites-tag js-add-to-fav">
                        <i class="is-added bouncy"></i>
                        <i class="not-added bouncy"></i>
                        <span class="fav-overlay"></span>
                    </div>
                </div>
            </div>
            <div class="single-content wp-content">
                <div class="wrap wrap-center">
                    <div class="wrap_float">
                        <div class="location location-in-title">
                            Catégorie:

                            @if ($article->categorie_id === '1')
                            <a href="#" class="tag">Loisirs</a>
                            @elseif($article->categorie_id === '2')
                            <a href="#">Sports</a>
                            @else
                            <a href="#">Musique</a>

                            @endif

                        </div>
                        <h1 class="page-title large-title">
                            {{ $article->title }}
                        </h1>
                        <div class="post-description">
                            {{ $article->content }}
                        </div>




                        <div class="packages-slider-block js-slider-block">
                            <div class="section-head">
                                <h2>
                                    Articles similaires
                                </h2>
                                <div class="arrows">
                                    <div class="arrow prev"></div>
                                    <div class="arrow next"></div>
                                </div>
                            </div>
                            <div class="section-content">
                                <div class="packages-slider single-packages-slider">
                                    @foreach($similaires as $similaire)
                                    <a href="{{ route::name('single', ['id' => $similaire->id]) }}"
                                        class="packages-item">
                                        <div class="shadow js-shadow"></div>
                                        <div class="bg-img"
                                            style="background-image: url(@asset('img/' . $similaire->image))">
                                        </div>
                                        <div class="packages-item-head">
                                            {{-- <div class="packages-cost"><span class="cost-val">$2,212</span> / night
                                            </div> --}}
                                            <div class="favorites-tag js-add-to-fav">
                                                <i class="is-added bouncy"></i>
                                                <i class="not-added bouncy"></i>
                                                <span class="fav-overlay"></span>
                                            </div>
                                        </div>
                                        <div class="packages-item-foot">
                                            <h3 class="packages-title">{{ $similaire->title }}</h3>
                                            {{-- <div class="location">United States, San Francisco</div> --}}
                                        </div>
                                    </a>

                                    @endforeach

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="comments-section" id="comments-section">
            <div class="wrap wrap-center">
                <div class="wrap_float">
                    <h2 class="title" id="nb_coms">Commentaire{{ count($comments) > 1 ? 's' : '' }}<span
                            class="comments-count">{{
                            count($comments)
                            }}</span></h2>

                    <div class="comments-form">
                        <form id="comsForm">
                            @auth
                            <div class="input-wrap textarea-wrap white-label comment-field">
                                <textarea name="comment" class="input textarea"
                                    placeholder="Écrivez un commentaire"></textarea>
                            </div>

                            <button type="submit" class="btn submit disabled" disabled id="commenter">
                                <span>Poster un commentaire</span>
                            </button>
                            @endauth
                        </form>

                        @guest
                        <div class="input-wrap textarea-wrap white-label comment-field">
                            <textarea class="input textarea" placeholder="Écrivez un commentaire" disabled
                                readonly></textarea>
                        </div>
                        <a data-href="#modal-login" class="btn submit getModal">
                            <span>Veuillez-vous connecter avant de poster un commentaire</span>
                        </a>
                        @endguest
                    </div>
                    <div class="comments-list">
                        <div class="comments-list-item">
                            <div class="comment-item">


                                <div class="comment-item-text">
                                    Veuillez vous <a data-href="#modal-login" class="getModal"><u>connecter</u></a> si
                                    vous
                                    voulez voir les
                                    commentaires !!!
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')

<script>
    const form_coms = document.getElementById('comsForm'),
    urlRoot = "{{ APP_URL }}",
    btn_coms =  document.getElementById('commenter');

    

    const getArticles = () =>  
    {
        axios.get(urlRoot + "comment/{{ $article->id }}", {
                    headers: {'Content-Type': 'multipart/form-data'},
                    baseUrl: urlRoot,
                }).then(response => {
                    $('.comments-list').html(response.data);
                })
                .catch(err => {
                    console.log(err.response);
                });
    }

    getArticles();



    
</script>

@auth
<script>
    const route_coms =  "{{ route::name('comment') }}";
    btn_coms.disabled = true;
    form_coms.comment.addEventListener('keyup', () => {
   
   if(form_coms.comment.value === '')
   {
       btn_coms.disabled = true;
       btn_coms.classList.add('disabled');   
   }
   else
   {
       btn_coms.disabled = false;
       btn_coms.classList.remove('disabled');
    }
   });


    $("#commenter").click(function (e) {
        e.preventDefault();

        form_coms.comment.disabled = true;
        btn_coms.disabled = true;
        btn_coms.classList.add('load');

        let data = JSON.stringify({ article_id: "{{ $article->id }}", comment:form_coms.comment.value });

        axios.post(route_coms, data, {
                    headers: {'Content-Type': 'multipart/form-data'},
                    baseUrl: urlRoot,
                }).then(response => {

                  console.log(response.data);
                  

                  setTimeout(() => {
                        form_coms.comment.disabled = false;
                        form_coms.comment.value = '';
                        btn_coms.disabled = true;
                        btn_coms.classList.add('disabled');
                        btn_coms.classList.remove('load');
                        document.getElementById('nb_coms').innerHTML =  response.data; 
                        document.querySelector('.input-wrap').classList.remove('active');
                        getArticles();
                        useSwallSuccess('Commentaire a été publier avec succès !', 'top-end');
                    }, 1500);
                
                })
                .catch(err => {

                    setTimeout(() => {
                        form_coms.comment.disabled = false;
                        btn_coms.disabled = false;
                        btn_coms.classList.remove('load');
                    }, 2000);

                    if(err.response.status === 400)
                    {
                        console.log(err.response.data);
                    }

                    });
    });
</script>
@endauth

@endpush
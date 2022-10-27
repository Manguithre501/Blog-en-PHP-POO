@extends('guest')
@section('content')

<div class="page-wrap profile-page">
    <div class="page-wrap-content">
        <div class="breadcrumbs">
            <div class="wrap wrap-center">
                <div class="wrap_float">
                    <a href="/">Accueil</a> / <span class="current">Page de profile</span>
                </div>
            </div>
        </div>
        <div class="profile-section">
            <div class="wrap wrap-center">
                <div class="wrap_float">
                    <h1 class="page-title">Paramètres</h1>
                    <div class="profile-settings">
                        <form id="profileForm">
                            <div class="profile-settings-userpic">
                                <div class="author-image">
                                    <img src="{{ logo::firstChars($profile->name) }}" alt="" class="image-cover">
                                </div>
                                <div class="select-file">

                                    <label for="profile-userpic" class="file-label"><span>{{ auth::user()->name
                                            }} </span></label>
                                </div>
                            </div>
                            <div class="profile-settings-data">
                                <div class="fields">
                                    <div class="input-wrap white-label name-field fullwidth">
                                        <input type="text" name="name" class="input" placeholder="Nom d'utilisateur*"
                                            value="{{ $profile->name }}">
                                    </div>
                                    <div class="input-wrap white-label email-field fullwidth">
                                        <input type="email" name="email" class="input" placeholder="Email*"
                                            value="{{ $profile->email }}">
                                    </div>

                                </div>
                            </div>
                            <button type="submit" class="btn disabled" disabled id="save">
                                <span>Enregistrer le changement</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
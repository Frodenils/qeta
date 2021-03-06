@extends('layouts.mainAdmin')

@section('content')
    <style>
        .content {
            width: 95%;
            margin: 0 auto 50px;
            margin-top: 10%
        }

        .content__title {
            margin-bottom: 40px;
            font-size: 20px;
            text-align: center;
        }

        .content__title--m-sm {
            margin-bottom: 500px;
        }

        .row {
            justify-content: center;
            margin-bottom: 25px
        }

        .multisteps-form__progress {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
        }

        .multisteps-form__progress-btn {
            transition-property: all;
            transition-duration: 0.15s;
            transition-timing-function: linear;
            transition-delay: 0s;
            position: relative;
            padding-top: 20px;
            color: rgba(108, 117, 125, 0.7);
            text-indent: -9999px;
            border: none;
            background-color: transparent;
            outline: none !important;
            cursor: pointer;
        }

        @media (min-width: 500px) {
            .multisteps-form__progress-btn {
                text-indent: 0;
            }
        }

        .multisteps-form__progress-btn:before {
            position: absolute;
            top: 2px;
            left: 50%;
            display: block;
            width: 13px;
            height: 13px;
            content: '';
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            transition: all 0.15s linear 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
            transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
            transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
            border: 2px solid currentColor;
            border-radius: 50%;
            background-color: #fff;
            box-sizing: border-box;
            z-index: 3;
        }

        .multisteps-form__progress-btn:after {
            position: absolute;
            top: 5px;
            left: calc(-50% - 13px / 2);
            transition-property: all;
            transition-duration: 0.15s;
            transition-timing-function: linear;
            transition-delay: 0s;
            display: block;
            width: 100%;
            height: 2px;
            content: '';
            background-color: currentColor;
            z-index: 1;
        }

        .multisteps-form__progress-btn:first-child:after {
            display: none;
        }

        .multisteps-form__progress-btn.js-active {
            color: #007bff;
        }

        .multisteps-form__progress-btn.js-active:before {
            -webkit-transform: translateX(-50%) scale(1.2);
            transform: translateX(-50%) scale(1.2);
            background-color: currentColor;
        }

        .multisteps-form__form {
            position: relative;
        }

        .multisteps-form__panel {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 0;
            opacity: 0;
            visibility: hidden;
        }

        .multisteps-form__panel.js-active {
            height: auto;
            opacity: 1;
            visibility: visible;
        }

        .multisteps-form__panel[data-animation="scaleIn"] {
            -webkit-transform: scale(0.9);
            transform: scale(0.9);
        }

        .multisteps-form__panel[data-animation="scaleIn"].js-active {
            transition-property: all;
            transition-duration: 0.2s;
            transition-timing-function: linear;
            transition-delay: 0s;
            -webkit-transform: scale(1);
            transform: scale(1);
        }

        textarea[name=description] {
            resize: none;
        }

    </style>
    <div class="content">
        <div class="container">
            <center>
                <h1>Ajouter un utilisateur</h1>
            </center>
            <br>
            <form action="{{ route('admin.user.add') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="formGroupExampleInput">Pseudo</label>

                    <input class="multisteps-form__input form-control" type="text" name="pseudo" placeholder="Pseudo ..."
                        required />
                </div>
                @error('pseudo')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="formGroupExampleInput">Email</label>

                    <input class="multisteps-form__input form-control" type="text" name="email" placeholder="Email ..."
                        required />
                </div>
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="formGroupExampleInput">Password</label>

                    <input class="multisteps-form__input form-control" type="password" name="password" placeholder="Password ..."
                        required />
                </div>
                @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="formGroupExampleInput2">Image</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="image" id="image"
                            aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="formGroupExampleInput">Website</label>

                        <input class="multisteps-form__input form-control" type="text" name="website" placeholder=""
                            required />
                    </div>
                    @error('website')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="formGroupExampleInput">Github</label>

                        <input class="multisteps-form__input form-control" type="text" name="github" placeholder=""
                            required />
                    </div>
                    @error('github')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="formGroupExampleInput">Twitter</label>

                        <input class="multisteps-form__input form-control" type="text" name="twitter" placeholder=""
                            required />
                    </div>
                    @error('twitter')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Radios" id="admin" value="2">
                        <label class="form-check-label" for="admin">
                            Administarteur
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Radios" id="utilisateur" value="1" checked>
                        <label class="form-check-label" for="utilisateur">
                            Utilisateur
                        </label>
                    </div>
                    @error('Radios')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="button-row d-flex mt-4">
                        <button class="btn btn-success ml-auto" type="submit" title="Send">Envoyer</button>
                    </div>
            </form>
        </div>
    </div>
@endsection

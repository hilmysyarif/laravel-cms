@extends('layouts.app')

@section('title', 'Личный кабинет - Аватар')

@section('content')
    @include('partials._personal_menu', ['avatarActive' => true])

    <div class="page-header">
        <h4 class="text-center">Аватар</h4>
    </div>

    @include('partials._status')
    @include('partials._errors')

    <form class="form-horizontal" role="form" action="{{ route('profile.avatar.save') }}" accept-charset="UTF-8" method="POST" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="row">
            <div class="form-group col-lg-12">
                <div class="form-status"></div>

                <!-- Current avatar -->
                <div class="avatar-current" id="avatar_current">
                    <div class="avatar-view">
                        <img class="img-thumbnail" style="max-width: 200px; max-height: 200px;" src="{{ Auth::user()->avatar ? Auth::user()->avatar : asset('img/avatar.png') }}">
                        &nbsp;
                        <button type="button" class="btn btn-sm btn-default" v-on="click: avatarSelect">Изменить аватарку <i class="fa fa-upload"></i></button>
                    </div>

                    <!-- Upload image and data -->
                    <div class="avatar-upload">
                        <input type="hidden" name="avatar_data" id="avatar_data">
                        <input type="file" accept="image/*" id="avatar_file" name="avatar_file" style="display: none;" v-on="change: avatarSelected">
                    </div>
                </div>

                <!-- Crop and preview -->
                <div class="row" id="avatar_cropper" style="display: none;">
                    <div class="col-sm-12 text-center lead">
                        <i class="fa fa-image"></i> Редактирование новой аватарки
                    </div>
                    <div class="col-sm-8">
                        <div class="avatar-wrapper" id="avatar_wrapper"></div>
                        <div>&nbsp;</div>
                        <div class="text-center">
                            <button type="button" class="btn btn-success form-button" v-on="click: avatarUpload">Сохранить аватарку <i class="fa fa-check-square-o"></i></button>
                            <button type="button" class="btn btn-warning" v-on="click: cancelAvatarUpload">Отмена <i class="fa fa-remove"></i></button>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="avatar-preview preview-lg"></div>
                        <div class="avatar-preview preview-md"></div>
                        <div class="avatar-preview preview-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
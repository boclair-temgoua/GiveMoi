@extends('inc.app')
@section('title', '| Edit your profile')

@section('style')
<!-- emojionearea -->
<link rel="stylesheet" href="/assets/css/plugins/emojionearea.css">
@endsection
@section('navbar')

<nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg bg-{{$user->color_name}}" color-on-scroll="100" id="sectionsNav">
    @endsection
@section('content')
<div class="signup-page sidebar-collapse">
    <div class="page-header header-filter"
         style="background-image: url(&apos;{{ url(Auth::user()->avatarcover)  }}?{{ time() }}&apos;); background-size: cover; background-position: top center;">
        <div class="container">

            {!! Form::model($user,['files'=> 'true', 'class' => 'form-horizontal']) !!}
            <div class="row">


                <div class="col-md-6 ml-auto mr-auto">
                    <div style="padding-top: -100px;" class="profile text-center ">
                        <div class="avatar">

                            <div class="fileinput fileinput-new text-center"
                                 data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-circle img-raised">
                                    @if($user->avatar)
                                    <img src="{{ url($user->avatar)  }}?{{ time() }}" alt="...">
                                    @endif
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                <div>
                                 <span class="btn btn-raised btn-round btn-{{ $user->color_name }} btn-file">
                                    <span class="fileinput-new">
                                         <i class="material-icons">photo</i>
                                        <b> Add Profile</b>
                                    </span>
                                    <span class="fileinput-exists">
                                        <i class="material-icons">edit</i>
                                        <b> Change</b>
                                    </span>
                                    <input id="avatar" type="file" class="form-control"
                                           name="avatar"/>
                                 </span>
                                    <br/>
                                    <a href="#pablo"
                                       class="btn btn-danger btn-round fileinput-exists"
                                       data-dismiss="fileinput"><i class="fa fa-times"></i>
                                        <b>Remove</b>
                                    </a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 ml-auto mr-auto">
                    <div class="card cardlogin">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 ml-auto mr-auto">
                                    <!-- Tabs with icons on Card -->
                                    <br>
                                    <div class="card card-nav-tabs">
                                        <div class="card-header card-header-{{$user->color_name}}">
                                            <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                            <div class="nav-tabs-navigation">
                                                <div class="nav-tabs-wrapper">
                                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                                        <li style="padding-left: 15px;" class="nav-item">
                                                            <a class="nav-link active" href="#profile"
                                                               data-toggle="tab">
                                                                <i class="material-icons">face</i>
                                                                <b> Profile</b>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#messages" data-toggle="tab">
                                                                <i class="material-icons">lock_outline</i>
                                                                <b> Change password</b>
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="#settings" data-toggle="tab">
                                                                <i class="material-icons">photo</i>
                                                                <b> Change cover Image</b>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body ">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="profile">
                                                    <br>
                                                    @include('inc.alert')

                                                    <div class="row">
                                                        <div class="col-md-4 row-block">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">{{__('Pseudo')}}</label>
                                                                {!! Form::text('username', null, ['class' => 'form-control','id' => 'username']) !!}
                                                                @if ($errors->has('username'))
                                                                <span class="help-block">
                                                                    <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 row-block">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">{{ __('Last name')}}</label>
                                                                {!! Form::text('name', null, ['class' => 'form-control','id' => 'name']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 row-block">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">{{ __('First name')}}</label>
                                                                {!! Form::text('first_name', null, ['class' => 'form-control','id' => 'first_name']) !!}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-5 row-block">
                                                            <div class="form-group">
                                                                <label for="name" class="bmd-label-floating">Email</label>
                                                                {!! Form::email('email', null, ['class' => 'form-control','id' => 'email']) !!}
                                                                @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3 row-block">
                                                            <div class="form-group">
                                                                <label for="cellphone" class="bmd-label-floating">{{ __('Phone')}}</label>
                                                                {!! Form::text('cellphone', null, ['class' => 'form-control','id' => 'cellphone']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 row-block">
                                                            <div class="form-group">
                                                                <label for="work" class="bmd-label-floating">{{ __('Work ?')}}</label>
                                                                {!! Form::text('work', null, ['class' => 'form-control','id'=>'work' ]) !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-4 row-block">
                                                            <div class="form-group">
                                                                <label for="fblink" class="bmd-label-floating">{{ __('Facebook Username')}}</label>

                                                                {!! Form::text('fblink', null, ['class' => 'form-control','id' => 'fblink']) !!}

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 row-block">
                                                            <div class="form-group">
                                                                <label for="instalink" class="bmd-label-floating">{{ __('Instagram Username')}}</label>

                                                                {!! Form::text('instalink', null, ['class' => 'form-control','id' => 'instalink']) !!}
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4 row-block">
                                                            <div class="form-group">
                                                                <label for="birthday" class="bmd-label-floating">Birthday date</label>
                                                                {!! Form::text('birthday', $user->birthday ? $user->birthday->format('d/m/y') : null , ['class' => 'form-control datepicker']) !!}
                                                            </div>
                                                        </div>
                                                        <!--
                                                        <div class="col-sm-4 row-block">
                                                            <div class="form-group">
                                                                <label for="twlink" class="bmd-label-floating">{{
                                                                    __('Twitter Username')}}</label>
                                                                <input type="text"
                                                                       class="form-control{{ $errors->has('twlink') ? ' is-invalid' : '' }}"
                                                                       id="twlink" name="twlink"
                                                                       value="{{ ($errors->any()? old('twlink') : $user->twlink) }}">
                                                                @if ($errors->has('twlink'))
                                                                <span class="invalid-feedback">
                                                                             <strong>{{ $errors->first('twlink') }}</strong>
                                                                        </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        -->
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4 row-block">
                                                            <label for="color_name" class="bmd-label-floating"></label>
                                                            {!! Form::select('color_name', [
                                                            'info' => 'Info', 'danger' => 'Danger','warning' => 'Warning','rose'=>'Rose','dark'=>'Dark','success'=>'Success','primary'=>'Primary'
                                                            ], null, ['class' => 'form-control selectpicker' ,'data-style' => 'select-with-transition','title' => 'Choose Color', 'data-size'=>'6']) !!}
                                                        </div>
                                                        <div class="col-md-4 row-block">
                                                            <label for="gender" class="bmd-label-floating"></label>
                                                            {!! Form::select('sex', ['Female' => 'Female', 'Male' => 'Male'], null, ['class' => 'form-control selectpicker' ,'data-style' => 'select-with-transition','title' => 'Choose Sex']) !!}
                                                            @if ($errors->has('sex'))
                                                            <span class="help-block">
                                                                    <strong class="text-danger">{{ $errors->first('sex') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-4 ml-auto mr-auto row-block">
                                                            <label for="gender" class="bmd-label-floating"></label>
                                                            {!! Form::select('country', [

                                                            'Afghanistan'                                       => "Afghanistan",
                                                            'Åland Islands'                                     => "Åland Islands",
                                                            'Albania'                                           => "Albania",
                                                            'Algeria'                                           => "Algeria",
                                                            'American Samoa'                                    => "American Samoa",
                                                            'Andorra'                                           => "Andorra",
                                                            'Angola'                                            => "Angola",
                                                            'Anguilla'                                          => "Anguilla",
                                                            'Antarctica'                                        => "Antarctica",
                                                            'Antigua and Barbuda'                               => "Antigua and Barbuda",
                                                            'Argentina'                                         => "Argentina",
                                                            'Armenia'                                           => "Armenia",
                                                            'Aruba'                                             => "Aruba",
                                                            'Australia'                                         => "Australia",
                                                            'Austria'                                           => "Austria",
                                                            'Azerbaijan'                                        => "Azerbaijan",
                                                            'Bahamas'                                           => "Bahamas",
                                                            'Bahrain'                                           => "Bahrain",
                                                            'Bangladesh'                                        => "Bangladesh",
                                                            'Barbados'                                          => "Barbados",
                                                            'Belarus'                                           => "Belarus",
                                                            'Belgium'                                           => "Belgium",
                                                            'Belize'                                            => "Belize",
                                                            'Benin'                                             => "Benin",
                                                            'Bermuda'                                           => "Bermuda",
                                                            'Bhutan'                                            => "Bhutan",
                                                            'Bolivia'                                           => "Bolivia",
                                                            'Bosnia and Herzegovina'                            => "Bosnia and Herzegovina",
                                                            'Botswana'                                          => "Botswana",
                                                            'Bouvet Island'                                     => "Bouvet Island",
                                                            'Brazil'                                            => "Brazil",
                                                            'British Indian Ocean Territory'                    => "British Indian Ocean Territory",
                                                            'Brunei Darussalam'                                 => "Brunei Darussalam",
                                                            'Bulgaria'                                          => "Bulgaria",
                                                            'Burkina Faso'                                      => "Burkina Faso",
                                                            'Burundi'                                           => "Burundi",
                                                            'Cambodia'                                          => "Cambodia",
                                                            'Cameroon'                                          => "Cameroon",
                                                            'Canada'                                            => "Canada",
                                                            'Cape Verde'                                        => "Cape Verde",
                                                            'Cayman Islands'                                    => "Cayman Islands",
                                                            'Central African Republic'                          => "Central African Republic",
                                                            'Chad'                                              => "Chad",
                                                            'Chile'                                             => "Chile",
                                                            'China'                                             => "China",
                                                            'Christmas Island'                                  => "Christmas Island",
                                                            'Cocos (Keeling) Islands'                           => "Cocos (Keeling) Islands",
                                                            'Colombia'                                          => "Colombia",
                                                            'Comoros'                                           => "Comoros",
                                                            'Congo'                                             => "Congo",
                                                            'Congo, The Democratic Republic of the'             => "Congo, The Democratic Republic of the",
                                                            'Cook Islands'                                      => "Cook Islands",
                                                            'Costa Rica'                                        => "Costa Rica",
                                                            'Cote D\'Ivoire'                                    => "Cote D'Ivoire",
                                                            'Croatia'                                           => "Croatia",
                                                            'Cuba'                                              => "Cuba",
                                                            'Cyprus'                                            => "Cyprus",
                                                            'Czech Republic'                                    => "Czech Republic",
                                                            'Denmark'                                           => "Denmark",
                                                            'Djibouti'                                          => "Djibouti",
                                                            'Dominica'                                          => "Dominica",
                                                            'Dominican Republic'                                => "Dominican Republic",
                                                            'Ecuador'                                           => "Ecuador",
                                                            'Egypt'                                             => "Egypt",
                                                            'El Salvador'                                       => "El Salvador",
                                                            'Equatorial Guinea'                                 => "Equatorial Guinea",
                                                            'Eritrea'                                           => "Eritrea",
                                                            'Estonia'                                           => "Estonia",
                                                            'Ethiopia'                                          => "Ethiopia",
                                                            'Falkland Islands (Malvinas)'                       => "Falkland Islands (Malvinas)",
                                                            'Faroe Islands'                                     => "Faroe Islands",
                                                            'Fiji'                                              => "Fiji",
                                                            'Finland'                                           => "Finland",
                                                            'France'                                            => "France",
                                                            'French Guiana'                                     => "French Guiana",
                                                            'French Polynesia'                                  => "French Polynesia",
                                                            'French Southern Territories'                       => "French Southern Territories",
                                                            'Gabon'                                             => "Gabon",
                                                            'Gambia'                                            => "Gambia",
                                                            'Georgia'                                           => "Georgia",
                                                            'Germany'                                           => "Germany",
                                                            'Ghana'                                             => "Ghana",
                                                            'Gibraltar'                                         => "Gibraltar",
                                                            'Greece'                                            => "Greece",
                                                            'Greenland'                                         => "Greenland",
                                                            'Grenada'                                           => "Grenada",
                                                            'Guadeloupe'                                        => "Guadeloupe",
                                                            'Guam'                                              => "Guam",
                                                            'Guatemala'                                         => "Guatemala",
                                                            'Guernsey'                                          => "Guernsey",
                                                            'Guinea'                                            => "Guinea",
                                                            'Guinea-Bissau'                                     => "Guinea-Bissau",
                                                            'Guyana'                                            => "Guyana",
                                                            'Haiti'                                             => "Haiti",
                                                            'HM'                                                => "Heard Island and Mcdonald Islands",
                                                            'Holy See (Vatican City State)'                     => "Holy See (Vatican City State)",
                                                            'Honduras'                                          => "Honduras",
                                                            'Hong Kong'                                         => "Hong Kong",
                                                            'Hungary'                                           => "Hungary",
                                                            'Iceland'                                           => "Iceland",
                                                            'India'                                             => "India",
                                                            'Indonesia'                                         => "Indonesia",
                                                            'Iran, Islamic Republic Of'                         => "Iran, Islamic Republic Of",
                                                            'Iraq'                                              => "Iraq",
                                                            'Ireland'                                           => "Ireland",
                                                            'Isle of Man'                                       => "Isle of Man",
                                                            'Israel'                                            => "Israel",
                                                            'Italy'                                             => "Italy",
                                                            'Jamaica'                                           => "Jamaica",
                                                            'Japan'                                             => "Japan",
                                                            'Jersey'                                            => "Jersey",
                                                            'Jordan'                                            => "Jordan",
                                                            'Kazakhstan'                                        => "Kazakhstan",
                                                            'Kenya'                                             => "Kenya",
                                                            'Kiribati'                                          => "Kiribati",
                                                            'Democratic People\'s Republic of Korea'            => "Democratic People's Republic of Korea",
                                                            'Korea, Republic of'                                => "Korea, Republic of",
                                                            'Kosovo'                                            => "Kosovo",
                                                            'Kuwait'                                            => "Kuwait",
                                                            'Kyrgyzstan'                                        => "Kyrgyzstan",
                                                            'Lao People\'s Democratic Republic'                 => "Lao People's Democratic Republic",
                                                            'Latvia'                                            => "Latvia",
                                                            'Lebanon'                                           => "Lebanon",
                                                            'Lesotho'                                           => "Lesotho",
                                                            'Liberia'                                           => "Liberia",
                                                            'LY'                                                => "Libyan Arab Jamahiriya",
                                                            'Liechtenstein'                                     => "Liechtenstein",
                                                            'Lithuania'                                         => "Lithuania",
                                                            'Luxembourg'                                        => "Luxembourg",
                                                            'Macao'                                             => "Macao",
                                                            'Macedonia, The Former Yugoslav Republic of'        => "Macedonia, The Former Yugoslav Republic of",
                                                            'Madagascar'                                        => "Madagascar",
                                                            'Malawi'                                            => "Malawi",
                                                            'Malaysia'                                          => "Malaysia",
                                                            'Maldives'                                          => "Maldives",
                                                            'Mali'                                              => "Mali",
                                                            'Malta'                                             => "Malta",
                                                            'Marshall Islan'                                    => "Marshall Islands",
                                                            'Martinique'                                        => "Martinique",
                                                            'Mauritania'                                        => "Mauritania",
                                                            'Mauritius'                                         => "Mauritius",
                                                            'Mayotte'                                           => "Mayotte",
                                                            'Mexico'                                            => "Mexico",
                                                            'Micronesia, Federated States of'                   => "Micronesia, Federated States of",
                                                            'Moldova, Republic of'                              => "Moldova, Republic of",
                                                            'Monaco'                                            => "Monaco",
                                                            'Mongolia'                                          => "Mongolia",
                                                            'Montenegro'                                        => "Montenegro",
                                                            'Montserrat'                                        => "Montserrat",
                                                            'Morocco'                                           => "Morocco",
                                                            'Mozambique'                                        => "Mozambique",
                                                            'Myanmar'                                           => "Myanmar",
                                                            'Namibia'                                           => "Namibia",
                                                            'Nauru'                                             => "Nauru",
                                                            'Nepal'                                             => "Nepal",
                                                            'Netherlands'                                       => "Netherlands",
                                                            'Netherlands Antilles'                              => "Netherlands Antilles",
                                                            'New Caledonia'                                     => "New Caledonia",
                                                            'New Zealand'                                       => "New Zealand",
                                                            'Nicaragua",'                                       => "Nicaragua",
                                                            'Niger'                                             => "Niger",
                                                            'Nigeria'                                           => "Nigeria",
                                                            'Niue'                                              => "Niue",
                                                            'Norfolk Island'                                    => "Norfolk Island",
                                                            'Northern Mariana Islands'                          => "Northern Mariana Islands",
                                                            'Norway'                                            => "Norway",
                                                            'Oman'                                              => "Oman",
                                                            'Pakistan'                                          => "Pakistan",
                                                            'Palau'                                             => "Palau",
                                                            'Palestinian Territory, Occupied'                   => "Palestinian Territory, Occupied",
                                                            'Panama'                                            => "Panama",
                                                            'Papua New Guinea'                                  => "Papua New Guinea",
                                                            'Paraguay'                                          => "Paraguay",
                                                            'Peru'                                              => "Peru",
                                                            'Philippines'                                       => "Philippines",
                                                            'Pitcairn'                                          => "Pitcairn",
                                                            'Poland'                                            => "Poland",
                                                            'Portugal'                                          => "Portugal",
                                                            'Puerto Ri'                                         => "Puerto Rico",
                                                            'Qatar'                                             => "Qatar",
                                                            'Reunion'                                           => "Reunion",
                                                            'Romania'                                           => "Romania",
                                                            'Russian Federation'                                => "Russian Federation",
                                                            'Rwanda'                                            => "Rwanda",
                                                            'Saint Helena'                                      => "Saint Helena",
                                                            'Saint Kitts and Nevis'                             => "Saint Kitts and Nevis",
                                                            'Saint Lucia'                                       => "Saint Lucia",
                                                            'Saint Pierre and Miquelon'                         => "Saint Pierre and Miquelon",
                                                            'Saint Vincent and the Grenadines'                  => "Saint Vincent and the Grenadines",
                                                            'Samoa'                                             => "Samoa",
                                                            'San Marino'                                        => "San Marino",
                                                            'Sao Tome and Principe'                             => "Sao Tome and Principe",
                                                            'Saudi Arabia'                                      => "Saudi Arabia",
                                                            'Senegal,'                                          => "Senegal",
                                                            'Serbia,'                                           => "Serbia",
                                                            'Seychelles,'                                       => "Seychelles",
                                                            'Sierra Leone'                                      => "Sierra Leone",
                                                            'Singapore,'                                        => "Singapore",
                                                            'Slovakia,'                                         => "Slovakia",
                                                            'Slovenia,'                                         => "Slovenia",
                                                            'Solomon Islands'                                   => "Solomon Islands",
                                                            'Somalia'                                           => "Somalia",
                                                            'South Africa'                                      => "South Africa",
                                                            'South Georgia and the South Sandwich Islands'      => "South Georgia and the South Sandwich Islands",
                                                            'Spain'                                             => "Spain",
                                                            'Sri Lanka'                                         => "Sri Lanka",
                                                            'Sudan'                                             => "Sudan",
                                                            'Suriname'                                          => "Suriname",
                                                            'Svalbard and Jan Mayen'                            => "Svalbard and Jan Mayen",
                                                            'Swaziland'                                         => "Swaziland",
                                                            'Sweden'                                            => "Sweden",
                                                            'Switzerland'                                       => "Switzerland",
                                                            'Syrian Arab Republic'                              => "Syrian Arab Republic",
                                                            'Taiwan'                                            => "Taiwan",
                                                            'Tajikistan'                                        => "Tajikistan",
                                                            'Tanzania, United Republic of'                      => "Tanzania, United Republic of",
                                                            'Thailand'                                          => "Thailand",
                                                            'Timor-Leste'                                       => "Timor-Leste",
                                                            'Togo'                                              => "Togo",
                                                            'Tokelau'                                           => "Tokelau",
                                                            'Tonga'                                             => "Tonga",
                                                            'Trinidad and Tobago'                               => "Trinidad and Tobago",
                                                            'Tunisia'                                           => "Tunisia",
                                                            'Turkey'                                            => "Turkey",
                                                            'Turkmenistan'                                      => "Turkmenistan",
                                                            'Turks and Caicos Islands'                          => "Turks and Caicos Islands",
                                                            'Tuvalu'                                            => "Tuvalu",
                                                            'Uganda'                                            => "Uganda",
                                                            'Ukraine'                                           => "Ukraine",
                                                            'United Arab Emirates'                              => "United Arab Emirates",
                                                            'United Kingdom'                                    => "United Kingdom",
                                                            'United States'                                     => "United States",
                                                            'United States Minor Outlying Islands'              => "United States Minor Outlying Islands",
                                                            'Uruguay'                                           => "Uruguay",
                                                            'Uzbekistan'                                        => "Uzbekistan",
                                                            'Vanuatu'                                           => "Vanuatu",
                                                            'Venezuela'                                         => "Venezuela",
                                                            'Viet Nam'                                          => "Viet Nam",
                                                            'Virgin Islands, British'                           => "Virgin Islands, British",
                                                            'Virgin Islands, U.S.'                              => "Virgin Islands, U.S.",
                                                            'Wallis and Futuna'                                 => "Wallis and Futuna",
                                                            'Western Sahara'                                    => "Western Sahara",
                                                            'Yemen'                                             => "Yemen",
                                                            'Zambia'                                            => "Zambia",
                                                            'Zimbabwe'                                          => "Zimbabwe"

                                                            ], null, ['class' => 'form-control selectpicker' ,'data-style' => 'select-with-transition','title' => 'Choose Country', 'data-size'=>'10']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="media-body">

                                                        <label for="body" class="bmd-label-floating"></label>

                                                        {!! Form::textarea('body', null, ['id'=>'example5','class' => 'form-control', 'placeholder' => 'Tell something about you in 200 words']) !!}
                                                        @if ($errors->has('body'))
                                                        <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('body') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                    <br/>

                                                </div>
                                                <div class="tab-pane" id="messages">
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-md-6 ml-auto mr-auto text-center">
                                                            <a href="{{ route('user.change_password') }}"
                                                               class="btn btn-info btn-raised btn-round">
                                                                <i class="material-icons">lock_outline</i>
                                                                <b>Click to edit your password</b>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <br>

                                                </div>
                                                <div class="tab-pane" id="settings">

                                                    <div class="row">


                                                        <div class="col-md-6 ml-auto mr-auto">
                                                            <div style="padding-top: -100px;" class="profile text-center ">

                                                                <div class="fileinput fileinput-new text-center"
                                                                     data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail img-raised">
                                                                        @if($user->avatarcover)
                                                                        <img src="{{ url($user->avatarcover)  }}?{{ time() }}" alt="...">
                                                                        @endif
                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail  img-raised">

                                                                    </div>
                                                                    <div>
                                                                        <span class="btn btn-raised btn-round btn-{{ $user->color_name }} btn-file">
                                                                            <span class="fileinput-new">
                                                                                 <i class="material-icons">photo</i>
                                                                                <b> Add Cover Image</b>
                                                                            </span>
                                                                            <span class="fileinput-exists">
                                                                                <i class="material-icons">edit</i>
                                                                                <b> Change</b>
                                                                            </span>
                                                                            <input id="avatarcover" type="file" class="form-control" name="avatarcover"/>
                                                                        </span>
                                                                        <br/>
                                                                        <a href="#pablo"
                                                                           class="btn btn-danger btn-round fileinput-exists"
                                                                           data-dismiss="fileinput">
                                                                            <i class="fa fa-times"></i>
                                                                            <b>Remove</b>
                                                                        </a>
                                                                    </div>
                                                                    <br>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="submit text-center">
                                        <a href="{{ route('/', Auth::user()->username) }}"
                                           class="btn btn-{{$user->color_name}} btn-raised btn-round">
                                            <i class="material-icons">undo</i>
                                            <b>Back to profile</b>
                                        </a>
                                        <button class="btn btn-success btn-raised btn-round" type="submit">
                                           <span class="btn-label">
                                             <i class="material-icons">save_alt</i>
                                           </span>
                                            <b>Update</b>
                                        </button>
                                    </div>
                                   <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        @include('inc._footer')
    </div>
</div>
@endsection
@section('scripts')
<!-- emojionearea -->
<script src="/assets/js/plugins/emojionearea.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#example5").emojioneArea({
            template: "<filters/><tabs/><editor/>"
        });
    });
</script>

<script>
    $(document).ready(function () {

        $(".datepicker").datetimepicker({
            format: "DD/MM/YYYY",
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: "fa fa-chevron-left",
                next: "fa fa-chevron-right",
                today: "fa fa-screenshot",
                clear: "fa fa-trash",
                close: "fa fa-remove"
            }
        })

    });
</script>
@endsection

@extends('inc.admin._main')
@section('title', '| Admin')
@section('sectionTitle', 'Admin Profile')
@section('style')
@endsection

@section('init')
<!-- emojionearea -->
<link rel="stylesheet" href="/assets/css/plugins/emojionearea.css">
<!-- Site wrapper -->
@endsection

@section('content')
<div class="content">
    <div class="container-fluid">
        @include('inc.admin.components.status_admin')
        <br/>
        <div class="row">
            <div class="col-md-10 ml-auto mr-auto">
                <div class="card">
                    <div class="card-header card-header-icon card-header-{!! Auth::user()->color_name !!}">
                        <div class="card-icon">
                            <i class="material-icons">perm_identity</i>
                        </div>
                        <h4 class="card-title"><b>Edit Profile</b> -
                            <small class="category">Complete your profile</small>
                        </h4>
                    </div>

                    <div class="card-body">
                        @include('inc.alert')
                        {!! Form::model($admin,['files'=> 'true', 'class' => 'form-horizontal']) !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">{!! config('app.name') !!} </label>
                                        <input type="text" class="form-control" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ml-auto mr-auto">
                                    <div style="padding-top: -100px;" class="profile text-center ">
                                        <div class="avatar">

                                            <div class="fileinput fileinput-new text-center"
                                                 data-provides="fileinput">
                                                <div class="fileinput-new thumbnail img-circle img-raised">
                                                    @if(Auth::user()->avatar)
                                                    <img src="{{ url(Auth::user()->avatar)  }}?{{ time() }}" alt="...">
                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail img-circle img-raised"></div>
                                                <div>
                                                        <span class="btn btn-raised btn-round btn-{{Auth::user()->color_name}} btn-file">
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

                        <div class="col-md-12">
                            <!-- Tabs with icons on Card -->
                            <div class="card card-nav-tabs">
                                <div class="card-header card-header-{{Auth::user()->color_name}}">
                                    <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                                    <div class="nav-tabs-navigation">
                                        <div class="nav-tabs-wrapper">
                                            <ul class="nav nav-tabs" data-tabs="tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#profile" data-toggle="tab">
                                                        <i class="material-icons">face</i>
                                                        <b>Profile</b>
                                                    </a>
                                                </li>
                                                <!--<li class="nav-item">
                                                    <a class="nav-link" href="#messages" data-toggle="tab">
                                                        <i class="material-icons">lock_outline</i>
                                                        <b> Change password</b>
                                                    </a>
                                                </li>-->
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#settings" data-toggle="tab">
                                                        <i class="material-icons">build</i>
                                                        <b>About me</b>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body ">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="profile">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">{{__('Pseudo')}}</label>
                                                        {!! Form::text('username', null, ['class' => 'form-control','id' => 'username']) !!}
                                                        @if ($errors->has('username'))
                                                        <span class="invalid-feedback">
                                                           <strong>{{ $errors->first('username') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">{{ __('Last name')}}</label>
                                                        {!! Form::text('name', null, ['class' => 'form-control','id' => 'name']) !!}
                                                        @if ($errors->has('name'))
                                                        <span class="invalid-feedback">
                                                           <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">{{ __('Email')}}</label>
                                                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                                                        @if ($errors->has('email'))
                                                        <span class="invalid-feedback">
                                                           <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">{{ __('First name')}}</label>
                                                        {!! Form::text('first_name', null, ['class' => 'form-control','id' => 'first_name']) !!}
                                                        @if ($errors->has('first_name'))
                                                        <span class="invalid-feedback">
                                                           <strong>{{ $errors->first('first_name') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="work" class="bmd-label-floating">{{ __('Work ?')}}</label>
                                                        {!! Form::text('work', null, ['class' => 'form-control','id'=>'work' ]) !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">{{ __('Address')}}</label>
                                                        {!! Form::text('address', null, ['class' => 'form-control','id' => 'address']) !!}
                                                        @if ($errors->has('address'))
                                                        <span class="invalid-feedback">
                                                           <strong>{{ $errors->first('address') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="work" class="bmd-label-floating">{{ __('Your phone number')}}</label>
                                                        {!! Form::text('phone', null, ['class' => 'form-control','id'=>'phone' ]) !!}
                                                        @if ($errors->has('phone'))
                                                        <span class="invalid-feedback">
                                                           <strong>{{ $errors->first('phone') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="birthday" class="bmd-label-floating">Birthday date</label>
                                                        {!! Form::text('birthday', Auth::user()->birthday ? Auth::user()->birthday->format('d/m/y') : null , ['class' => 'form-control datepicker','required' => '']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 ml-auto mr-auto row-block">
                                                    <label for="color_name" class="bmd-label-floating">Color</label>
                                                    {!! Form::select('color_name', [
                                                    'info' => 'Info', 'danger' => 'Danger','warning' => 'Warning','rose'=>'Rose','dark'=>'Dark','success'=>'Success','primary'=>'Primary'
                                                    ], null, ['class' => 'form-control selectpicker' ,'data-style' => 'select-with-transition','title' => 'Choose Color', 'data-size'=>'6']) !!}
                                                </div>
                                                <div class="col-lg-4 ml-auto mr-auto row-block">
                                                    <label for="gender" class="bmd-label-floating">Country</label>
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
                                                <div class="col-lg-4 ml-auto mr-auto row-block">
                                                    <label for="gender" class="bmd-label-floating">Sex</label>
                                                    {!! Form::select('gender', ['Female' => 'Female', 'Male' => 'Male'], null, ['class' => 'form-control selectpicker' ,'data-style' => 'select-with-transition','title' => 'Choose Sex']) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="tab-pane" id="messages">
                                            <div class="row">

                                                <div class="input-group form-control-lg">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                          <i class="material-icons">lock_outline</i>
                                                        </span>
                                                    </div>
                                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                                        <div class="col-sm-10 checkbox-radios">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="password_options" value="keep"
                                                                           checked> Do Not Change Password
                                                                    <span class="circle">
                                                                        <span class="check"></span>
                                                                    </span>
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input class="form-check-input" type="radio"
                                                                           name="password_options"
                                                                           value="manual"> Manuel Set New
                                                                    Password
                                                                    <span class="circle">
                                                                        <span class="check"></span>
                                                                     </span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="password" class="form-control" id="password"
                                                   placeholder="Password( Select manuel set new Password! )"
                                                   name="password">
                                            @if ($errors->has('password'))
                                            <span class="help-block">
                                                          <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                                    </span>
                                            @endif
                                            <br/>
                                        </div>
                                        -->
                                        <div class="tab-pane" id="settings">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="media-body">
                                                        <label for="body" class="bmd-label-floating">About Me</label>
                                                        {!! Form::textarea('body', null, ['id'=>'ckeditor','class' => 'form-control', 'placeholder' => 'Tell something about you ....']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Tabs with icons on Card -->
                        </div>

                        <div class="submit">
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-raised btn-round">
                                <span class="btn-label">
                                    <i class="material-icons">save_alt</i>
                                </span>
                                    <b>Update profile</b>
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <!--
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="../../assets/img/faces/marc.jpg" />
                        </a>
                    </div>
                    <div class="card-body">
                        <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                        <h4 class="card-title">Alec Thompson</h4>
                        <p class="card-description">
                            Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                        </p>
                        <a href="#pablo" class="btn btn-rose btn-round">Follow</a>
                    </div>
                </div>
            </div>
            -->
           <!-- @component('inc.admin.components.who')

            @endcomponent-->

        </div>
    </div>
</div>
@include('inc._footer')

@endsection
@section('script')

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

@if(Auth::user()->avatar)
<div class="sidebar" data-color="rose" data-background-color="black" data-image="{{ url(Auth::user()->avatar)  }}?{{ time() }}">
@endif
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="/" class="simple-text logo-mini">
            GM
        </a>
        <a href="/" class="simple-text logo-normal">
            {{ config('app.name') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                @if(Auth::user()->avatar)
                <img src="{{ url(Auth::user()->avatar)  }}?{{ time() }}" />
                @endif
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
              <b>{{ Auth::user()->name }}</b>
                <b class="caret"></b>
              </span>
              </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.profile')}}">
                                <span class="sidebar-mini"><b>MP</b></span>
                                <span class="sidebar-normal"><b>My Profile</b></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.account')}}">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"><b>Edit Profile</b></span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('auth.change_password')}}">
                                <span class="sidebar-mini"> PW </span>
                                <span class="sidebar-normal"><b>Change password</b></span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><b>MS</b></span>
                                <span class="sidebar-normal"><b>Connected
                                    {{ \Carbon\Carbon::parse(Auth::user()->created_at)->diffForHumans() }}</b></span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.logout')}}">
                                <span class="sidebar-mini"><b>L</b></span>
                                <span class="sidebar-normal"><b>Logout</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item {{ active_check('admin') }}">
                <a class="nav-link" href="/admin">
                    <i class="material-icons">dashboard</i>
                    <p><b>Dashboard</b></p>
                </a>
            </li>
            <li class="nav-item {{ active_check('admin/link') }}">
                <a class="nav-link" href="{{route('link.index')}}">
                    <i class="material-icons">http</i>
                    <p><b>Links</b></p>
                </a>
            </li>
            <li class="nav-item {{ active_check('admin/articles') }}">
                <a class="nav-link" href="/admin/articles">
                    <i class="material-icons">more_horiz</i>
                    <p><b>Articles</b></p>
                </a>
            </li>
            <li class="nav-item {{ active_check('admin/category') }}">
                <a class="nav-link" href="{{route('category.index')}}">
                    <i class="material-icons">label</i>
                    <p><b>Categories</b></p>
                </a>
            </li>
            <li class="nav-item {{ active_check('admin/event') }}">
                <a class="nav-link" href="/admin/event">
                    <i class="material-icons">receipt</i>
                    <p><b>Events</b></p>
                </a>
            </li>
            <li class="nav-item {{ active_check('admin/tag') }}">
                <a class="nav-link" href="{{route('tag.index')}}">
                    <i class="material-icons">local_offer</i>
                    <p><b>Tags</b></p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                    <i class="material-icons">update</i>
                    <p><b>Pages</b>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="pagesExamples">
                    <ul class="nav">
                        <li class="nav-item {{ active_check('admin/about') }}">
                            <a class="nav-link" href="{{route('about.index')}}">
                                <span class="sidebar-mini"><b>AM</b></span>
                                <span class="sidebar-normal"><b>About Members</b></span>
                            </a>
                        </li>
                        <li class="nav-item {{ active_check('admin/presentation') }}">
                            <a class="nav-link" href="{{route('presentation.index')}}">
                                <span class="sidebar-mini"><b>AP</b></span>
                                <span class="sidebar-normal"><b>About Presentations</b></span>
                            </a>
                        </li>
                        <li class="nav-item {{ active_check('admin/testimonial') }}">
                            <a class="nav-link" href="{{route('testimonial.index')}}">
                                <span class="sidebar-mini"><b>TE</b></span>
                                <span class="sidebar-normal"><b>Testimonials</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#formsExamples">
                    <i class="material-icons">content_paste</i>
                    <p><b>Styles</b>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="formsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/admin/color">
                                <span class="sidebar-mini"><b>CO</b></span>
                                <span class="sidebar-normal"><b>Colors</b></span>
                            </a>
                        </li>
                        <!--<li class="nav-item ">
                            <a class="nav-link" href="./forms/extended.html">
                                <span class="sidebar-mini"><b>EF</b></span>
                                <span class="sidebar-normal"><b>Extended Forms</b></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./forms/validation.html">
                                <span class="sidebar-mini"><b>VF</b></span>
                                <span class="sidebar-normal"><b>Validation Forms</b></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./forms/wizard.html">
                                <span class="sidebar-mini"><b>W</b></span>
                                <span class="sidebar-normal"><b>Wizard</b></span>
                            </a>
                        </li> -->
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ Active::check(['admin/user','categories']) }} ">
                <a class="nav-link" data-toggle="collapse" href="#settingsExamples">
                    <i class="material-icons">settings</i>
                    <p><b>Settings</b>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="settingsExamples">
                    <ul class="nav">
                        <li class="nav-item  {{ active_check('admin/user') }}">
                            <a class="nav-link" href="{{route('user.index')}}">
                                <span class="sidebar-mini"><b>US</b></span>
                                <span class="sidebar-normal"><b>Users</b></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><b>ST</b></span>
                                <span class="sidebar-normal"><b>Settings</b></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><b>NV</b></span>
                                <span class="sidebar-normal"><b>Navigation</b></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"><b>AD</b></span>
                                <span class="sidebar-normal"><b>Administrators</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <!--<li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
                    <i class="material-icons">grid_on</i>
                    <p><b>Tables</b>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="tablesExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/tables/regular.html">
                                <span class="sidebar-mini"><b>RT</b></span>
                                <span class="sidebar-normal"><b>Regular Tables</b></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/tables/extended.html">
                                <span class="sidebar-mini"><b>ET</b></span>
                                <span class="sidebar-normal"><b>Extended Tables</b></span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/tables/datatables.net.html">
                                <span class="sidebar-mini"><b>DT</b></span>
                                <span class="sidebar-normal"><b>DataTables.net</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> -->
         <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#profileExamples">
                <i class="material-icons">perm_media</i>
                <p><b>Slides page</b>
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="profileExamples">
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('profile_page.index') }}">
                            <span class="sidebar-mini"><b>Sa</b></span>
                            <span class="sidebar-normal"><b>Slide about</b></span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('profile_page.index') }}">
                            <span class="sidebar-mini"><b>Sc</b></span>
                            <span class="sidebar-normal"><b>Slide contact</b></span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('profile_page.index') }}">
                            <span class="sidebar-mini"><b>St</b></span>
                            <span class="sidebar-normal"><b>Slide testimonial</b></span>
                        </a>
                    </li>
                </ul>
            </div>
         </li>



           <li class="nav-item {{ Active::check(['admin/all-contact','contact/all-work_with-us']) }}">
                <a class="nav-link" data-toggle="collapse" href="#contactExamples">
                    <i class="material-icons">drafts</i>
                    <p><b>Contact</b>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="contactExamples">
                    <ul class="nav">
                        <li class="nav-item {{ active_check('admin/all-contact') }}">
                            <a class="nav-link" href="/admin/all-contact">
                                <span class="sidebar-mini"> MC </span>
                                <span class="sidebar-normal"> Message Contact us </span>
                            </a>
                        </li>

                        <li class="nav-item {{ active_check('admin/contact/speciality') }}">
                            <a class="nav-link" href="{{ route('speciality.index') }}">
                                <span class="sidebar-mini"> AS </span>
                                <span class="sidebar-normal"> All speciality </span>
                            </a>
                        </li>
                        <li class="nav-item {{ active_check('admin/contact/all-work_with-us') }}">
                            <a class="nav-link" href="{{ route('admin.work-us') }}">
                                <span class="sidebar-mini"> AW </span>
                                <span class="sidebar-normal"> All work user </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item  {{ Active::check(['admin/administrators','admin/permissions','admin/roles']) }}">
                <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
                    <i class="material-icons">person_outline</i>
                    <p><b>Management Admin</b>
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="mapsExamples">
                    <ul class="nav">
                        <li class="nav-item {{ active_check('admin/administrators') }}">
                            <a class="nav-link" href="{{route('administrators.index')}}">
                                <span class="sidebar-mini"><b>AD</b></span>
                                <span class="sidebar-normal"><b>Administrators</b></span>
                            </a>
                        </li>
                        <li class="nav-item {{ active_check('admin/permissions') }}">
                            <a class="nav-link" href="{{route('permissions.index')}}">
                                <span class="sidebar-mini"><b>PE</b></span>
                                <span class="sidebar-normal"><b>Permissions</b></span>
                            </a>
                        </li>
                        <li class="nav-item {{ active_check('admin/roles') }}">
                            <a class="nav-link" href="{{route('roles.index')}}">
                                <span class="sidebar-mini"><b>RO</b></span>
                                <span class="sidebar-normal"><b>Roles</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_check('admin/conditions') }}">
                <a class="nav-link" href="/admin/conditions">
                    <i class="material-icons">widgets</i>
                    <p><b>Terms and Conditions</b></p>
                </a>
            </li>


            <!--<li class="nav-item">
                <a class="nav-link" href="../examples/charts.html">
                    <i class="material-icons">timeline</i>
                    <p><b>Charts</b></p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../examples/calendar.html">
                    <i class="material-icons">date_range</i>
                    <p><b>Calendar</b></p>
                </a>
            </li> -->
        </ul>
    </div>
</div>

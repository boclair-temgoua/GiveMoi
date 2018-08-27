
<div class="sidebar" data-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
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
                <img src="{{ url(Auth::user()->avatar)  }}" />
                @endif
            </div>
            <div class="user-info">
                <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
              {{ Auth::user()->name }}
                <b class="caret"></b>
              </span>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.account')}}">
                                <span class="sidebar-mini"> MP </span>
                                <span class="sidebar-normal"> My Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> MS </span>
                                <span class="sidebar-normal"> Admin,
                                    {{ Auth::user()->created_at->diffForHumans() }}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> EP </span>
                                <span class="sidebar-normal"> Edit Profile </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> S </span>
                                <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.logout')}}">
                                <span class="sidebar-mini"> D </span>
                                <span class="sidebar-normal"> Logout </span>
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
                    <p> Dashboard </p>
                </a>
            </li>
            <li class="nav-item {{ active_check('admin/link') }}">
                <a class="nav-link" href="{{route('link.index')}}">
                    <i class="material-icons">http</i>
                    <p> Liens </p>
                </a>
            </li>
            <li class="nav-item {{ active_check('admin/articles') }}">
                <a class="nav-link" href="/admin/articles">
                    <i class="material-icons">more_horiz</i>
                    <p> Articles </p>
                </a>
            </li>
            <li class="nav-item {{ active_check('admin/category') }}">
                <a class="nav-link" href="{{route('category.index')}}">
                    <i class="material-icons">label</i>
                    <p> Categories </p>
                </a>
            </li>
            <li class="nav-item {{ active_check('admin/event') }}">
                <a class="nav-link" href="/admin/event">
                    <i class="material-icons">receipt</i>
                    <p> Events </p>
                </a>
            </li>
            <li class="nav-item {{ active_check('admin/tag') }}">
                <a class="nav-link" href="{{route('tag.index')}}">
                    <i class="material-icons">local_offer</i>
                    <p> Tags </p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                    <i class="material-icons">update</i>
                    <p> Pages
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="pagesExamples">
                    <ul class="nav">
                        <li class="nav-item {{ active_check('admin/about') }}">
                            <a class="nav-link" href="{{route('about.index')}}">
                                <span class="sidebar-mini"> AB </span>
                                <span class="sidebar-normal"> About </span>
                            </a>
                        </li>
                        <li class="nav-item {{ active_check('admin/presentation') }}">
                            <a class="nav-link" href="{{route('presentation.index')}}">
                                <span class="sidebar-mini"> PR </span>
                                <span class="sidebar-normal"> Presentation about </span>
                            </a>
                        </li>
                        <li class="nav-item {{ active_check('admin/testimonial') }}">
                            <a class="nav-link" href="{{route('testimonial.index')}}">
                                <span class="sidebar-mini"> TE </span>
                                <span class="sidebar-normal"> Testimonial </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#formsExamples">
                    <i class="material-icons">content_paste</i>
                    <p> Styles
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="formsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="/admin/color">
                                <span class="sidebar-mini"> CO </span>
                                <span class="sidebar-normal"> Colors </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./forms/extended.html">
                                <span class="sidebar-mini"> EF </span>
                                <span class="sidebar-normal"> Extended Forms </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./forms/validation.html">
                                <span class="sidebar-mini"> VF </span>
                                <span class="sidebar-normal"> Validation Forms </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="./forms/wizard.html">
                                <span class="sidebar-mini"> W </span>
                                <span class="sidebar-normal"> Wizard </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item {{ Active::check(['admin/user','categories']) }} ">
                <a class="nav-link" data-toggle="collapse" href="#settingsExamples">
                    <i class="material-icons">settings</i>
                    <p> Settings
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="settingsExamples">
                    <ul class="nav">
                        <li class="nav-item  {{ active_check('admin/user') }}">
                            <a class="nav-link" href="{{route('user.index')}}">
                                <span class="sidebar-mini"> US </span>
                                <span class="sidebar-normal"> Users </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> ST </span>
                                <span class="sidebar-normal"> Settings </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> NV </span>
                                <span class="sidebar-normal"> Navigation </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> AD </span>
                                <span class="sidebar-normal"> Administrators </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
                    <i class="material-icons">grid_on</i>
                    <p> Tables
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="tablesExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/tables/regular.html">
                                <span class="sidebar-mini"> RT </span>
                                <span class="sidebar-normal"> Regular Tables </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/tables/extended.html">
                                <span class="sidebar-mini"> ET </span>
                                <span class="sidebar-normal"> Extended Tables </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="../examples/tables/datatables.net.html">
                                <span class="sidebar-mini"> DT </span>
                                <span class="sidebar-normal"> DataTables.net </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item  {{ Active::check(['admin/administrators','admin/permissions','admin/roles']) }}">
                <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
                    <i class="material-icons">face</i>
                    <p> Admin Management
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="mapsExamples">
                    <ul class="nav">
                        <li class="nav-item {{ active_check('admin/administrators') }}">
                            <a class="nav-link" href="{{route('administrators.index')}}">
                                <span class="sidebar-mini"> AD </span>
                                <span class="sidebar-normal"> Administrators </span>
                            </a>
                        </li>
                        <li class="nav-item {{ active_check('admin/permissions') }}">
                            <a class="nav-link" href="{{route('permissions.index')}}">
                                <span class="sidebar-mini"> PE </span>
                                <span class="sidebar-normal"> Permissions </span>
                            </a>
                        </li>
                        <li class="nav-item {{ active_check('admin/roles') }}">
                            <a class="nav-link" href="{{route('roles.index')}}">
                                <span class="sidebar-mini"> RO </span>
                                <span class="sidebar-normal"> Roles </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item {{ active_check('admin/conditions') }}">
                <a class="nav-link" href="/admin/conditions">
                    <i class="material-icons">widgets</i>
                    <p> Conditions and terms </p>
                </a>
            </li>
            <li class="nav-item {{ active_check('admin/all-contact') }}">
                <a class="nav-link" href="/admin/all-contact">
                    <i class="material-icons">drafts</i>
                    <p> Message contact </p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../examples/charts.html">
                    <i class="material-icons">timeline</i>
                    <p> Charts </p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../examples/calendar.html">
                    <i class="material-icons">date_range</i>
                    <p> Calendar </p>
                </a>
            </li>
        </ul>
    </div>
</div>
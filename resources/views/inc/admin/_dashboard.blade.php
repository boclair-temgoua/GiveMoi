<div class="sidebar" data-color="rose" data-background-color="black" data-image="/assets/dashboard/assets/img/sidebar-1.jpg">
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
                <img src=" " />
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
            <li class="nav-item  ">
                <a class="nav-link" href="/admin">
                    <i class="material-icons">dashboard</i>
                    <p> Dashboard </p>
                </a>
            </li>
            <li class="nav-item  ">
                <a class="nav-link" href="{{route('link.index')}}">
                    <i class="material-icons">more_horiz</i>
                    <p> Liens </p>
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
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('about.index')}}">
                                <span class="sidebar-mini"> AB </span>
                                <span class="sidebar-normal"> About </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('presentation.index')}}">
                                <span class="sidebar-mini"> PR </span>
                                <span class="sidebar-normal"> Presentation about </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('testimonial.index')}}">
                                <span class="sidebar-mini"> TE </span>
                                <span class="sidebar-normal"> Testimonial </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
                    <i class="material-icons">apps</i>
                    <p> Event
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="componentsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('event.index')}}">
                                <span class="sidebar-mini"> Ar </span>
                                <span class="sidebar-normal"> Articles </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('category.index')}}">
                                <span class="sidebar-mini"> Ca </span>
                                <span class="sidebar-normal"> Categories </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('tag.index')}}">
                                <span class="sidebar-mini"> Ta </span>
                                <span class="sidebar-normal"> Tags </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> US </span>
                                <span class="sidebar-normal"> Users </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#formsExamples">
                    <i class="material-icons">content_paste</i>
                    <p> Forms
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="formsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="./forms/regular.html">
                                <span class="sidebar-mini"> RF </span>
                                <span class="sidebar-normal"> Regular Forms </span>
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
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
                    <i class="material-icons">grid_on</i>
                    <p> News and Events
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="tablesExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> CA </span>
                                <span class="sidebar-normal"> Category </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> NAE </span>
                                <span class="sidebar-normal"> News and Events </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#galleryExamples">
                    <i class="material-icons">perm_media</i>
                    <p> Gallery
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="galleryExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> AL </span>
                                <span class="sidebar-normal"> Album </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> PH</span>
                                <span class="sidebar-normal"> Photo</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
                    <i class="material-icons">thumbs_up_down</i>
                    <p> Corporate
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="mapsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> TE </span>
                                <span class="sidebar-normal"> Tenders </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> VA </span>
                                <span class="sidebar-normal"> Vacancies </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> AR </span>
                                <span class="sidebar-normal"> Annual Report </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#faqsExamples">
                    <i class="material-icons">priority_high</i>
                    <p> Faqs
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="faqsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> GA </span>
                                <span class="sidebar-normal"> Categories </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> FQ </span>
                                <span class="sidebar-normal"> FAQ Questions </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#newsletterExamples">
                    <i class="material-icons">markunread</i>
                    <p> Newsletter
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="newsletterExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> SU </span>
                                <span class="sidebar-normal"> Subscribes </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#reportsExamples">
                    <i class="material-icons">show_chart</i>
                    <p> Reports
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="reportsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> SU </span>
                                <span class="sidebar-normal"> Summary </span>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="#">
                                <span class="sidebar-mini"> CU </span>
                                <span class="sidebar-normal"> Contact Us </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item ">
                <a class="nav-link" data-toggle="collapse" href="#settingsExamples">
                    <i class="material-icons">settings</i>
                    <p> Settings
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="settingsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('user.index')}}">
                                <span class="sidebar-mini"> US </span>
                                <span class="sidebar-normal"> Users </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('administrators.index')}}">
                                <span class="sidebar-mini"> AD </span>
                                <span class="sidebar-normal"> Administrators </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('permissions.index')}}">
                                <span class="sidebar-mini"> PM </span>
                                <span class="sidebar-normal"> Permissions </span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('roles.index')}}">
                                <span class="sidebar-mini"> RO </span>
                                <span class="sidebar-normal"> Roles </span>
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
        </ul>


    </div>
</div>
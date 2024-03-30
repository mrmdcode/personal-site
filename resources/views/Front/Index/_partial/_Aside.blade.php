<div class="responsive-nav">
    <i class="fa fa-bars" id="menu-toggle"></i>
    <div id="menu" class="menu">
        <i class="fa fa-times" id="menu-close"></i>
        <div class="container">
            <div class="image">
                <a href="#"><img src="@php $pathArr = explode("/",$setting->myPic);$newPath = array_pop($pathArr) ;echo asset("storage/Images/".$newPath); @endphp" alt="{{$setting->myName}} - {{$setting->title}}" /></a>
            </div>
            <div class="author-content">
                <h4>{{$setting->myName}}</h4>
                <span>{{ $setting->myPosition}}</span>
            </div>
            <nav class="main-nav" role="navigation">
                <ul class="main-menu">
                    <li><a href="#section1">About Me</a></li>
                    <li><a href="#section2">Bold Skills</a></li>
                    <li><a href="#section3">My Work</a></li>
                    <li><a href="#section4">Contact Me</a></li>
                </ul>
            </nav>
            <div class="social-network">
                <ul class="soial-icons">
                    <li>
                        <a href="mailto:dr.mahdikazemizade84@gmail.com"><i class="fa fa-mail-forward"></i></a>
                    </li>
                    <li>
                        <a href="https://instagram.com/mahdikazemi910"><i class="fa fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/in/mrmdcode/"><i class="fa fa-linkedin"></i></a>
                    </li>

                </ul>
            </div>
            <div class="copyright-text">
                <p><a href="https://mrmdcode.ir">Mahdi Kazemi Zade</a></p>
            </div>
        </div>
    </div>
</div>

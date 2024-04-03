<section class="section my-work" data-section="section3">
    <div class="container">
        <div class="section-heading">
            <h2>My Work</h2>
            <div class="line-dec"></div>
            <span>You can see all my related projects and exercises and get more information on LinkedIn. All projects are running except the exercises</span>
        </div>
        <div class="row">
            <div class="isotope-wrapper">
                <form class="isotope-toolbar">
                    <label>
                        <input type="radio" data-type="*" checked="" name="isotope-filter"/>
                        <span>all</span>
                    </label>
                    <label>
                        <input type="radio" data-type="web_application" name="isotope-filter"/>
                        <span>Web Applications</span>
                    </label>
                    <label>
                        <input type="radio" data-type="panels" name="isotope-filter"/>
                        <span>Panels</span>
                    </label>
                    <label>
                        <input type="radio" data-type="exercise" name="isotope-filter"/>
                        <span>Exercise</span>
                    </label>
                    <label>
                        <input type="radio" data-type="other" name="isotope-filter"/>
                        <span>Others</span>
                    </label>
                </form>
                <div class="isotope-box">
                    @foreach($Works as $work)
                        <div class="isotope-item" data-type="{{$work->type}}">
                            <figure class="snip1321">
                                <img src="@php $pathArr = explode("/",$work->image);$newPath = array_pop($pathArr) ;echo asset("storage/Images/".$newPath); @endphp" alt="{{$work->title}}"/>
                                <figcaption>
                                    <a href="{{$work->linkedin}}">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                    <h4>See on Linkedin</h4>
                                    <span>You Can See More Description on Linkedin</span>
                                </figcaption>
                            </figure>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@extends('layout.main')
@section('title') Home @endsection
@section('content')
    <div id="current_projects" class="well_current_projects well">
        <h1 id="current_projects_heading">You currently have 0 projects.</h1>
        <hr>

    </div>
    <div id="projects_options" class="well_projects_options well">
        <h1>New Project</h1>
        <hr>
        <div id="inner-options">
            <h3>Single Page Designs:</h3>
            <br />
            <div id="tool-plain_page" onmouseenter="enLarge('tool-plain_page')" onmouseleave="deLarge('tool-plain_page')" class="tool">
               <a href="builder_init?nw=true&pi=false&type=1"> <div class="tool_image">
                    <img class="img-responsive" src="{{ url('img/icons/new.png') }}" />
                </div>
                <div class="tool_text">
                    Blank Page
                    <hr>
                </div>
               </a>
            </div>
            <div id="tool-landing_page" onmouseenter="enLarge('tool-landing_page')" onmouseleave="deLarge('tool-landing_page')" class="tool">
                <a href="builder_init?nw=true&pi=false&type=2"> <div class="tool_image">
                        <img class="img-responsive" src="{{ url('img/icons/landing-page.png') }}" />
                    </div>
                    <div class="tool_text">
                        Landing Page
                        <hr>
                    </div>
                </a>
            </div>
        </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ url('js/vl.js') }}"></script>
    <script src="{{ url('js/core.js') }}"></script>
@endsection
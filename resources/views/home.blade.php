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
        <div id="tool-landing_page" class="tool">
            <div class="tool_image">
                <img class="img-responsive" src="{{ url('img/icons/landing-page.png') }}" />
            </div>
            <div class="tool_text">
            Landing Page
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ url('js/vl.js') }}"></script>
@endsection
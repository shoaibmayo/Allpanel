@extends('frontend.layouts.app')
@section('title')
    CRICKET247BUZZ
@endsection
@section('content')
    <!--Main Section-->
    <main>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-8">
                    <div class="video-container">
                        @if ($game->game_videos)
                            @foreach ($game->game_videos as $key =>  $video)
                            <video width="100%" height="400" class="video-mobile-width"  autoplay muted>
                                <source src="{{ asset('videos/' . $video->video) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-md-4 p-0">
                    <div class=" mt-2 p-2 text-white" style="background-color:#2d3387;">Place Bet</div>
                    <div class=" mt-2 p-2 text-white" style="background-color:#2d3387;">My Bet</div>
                    <table class="table table-bordered  mt-2">
                        <thead>
                            <tr style="background-color: #bbb;">
                                <th scope="col">Matched Bet</th>
                                <th scope="col">Odds</th>
                                <th scope="col">Stake</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <h6><b>Match Odds:</b></h6>
                <div class="col-md-12">
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th scope="col">First</th>
                                <th class="bg-info">Last</th>
                                <th class="bg-danger">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mark</td>
                                <td class="bg-info">Otto</td>
                                <td class="bg-danger">@mdo</td>
                            </tr>
                            <tr>
                                <td>Jacob</td>
                                <td class="bg-info">Thornton</td>
                                <td class="bg-danger">@fat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <h6><b>Pair Plus:</b></h6>
                <div class="col-md-12">
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th scope="col">First</th>
                                <th class="bg-info">Last</th>
                                <th class="bg-danger">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mark</td>
                                <td class="bg-info">Otto</td>
                                <td class="bg-danger">@mdo</td>
                            </tr>
                            <tr>
                                <td>Jacob</td>
                                <td class="bg-info">Thornton</td>
                                <td class="bg-danger">@fat</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row ">
                <h6><b>Combo:</b></h6>
                <div class="col-md-12">
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th scope="col">First</th>
                                <th class="bg-info">Last</th>
                                <th class="bg-danger">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mark</td>
                                <td class="bg-info">Otto</td>
                                <td class="bg-danger">@mdo</td>
                            </tr>
                            <tr>
                                <td>Jacob</td>
                                <td class="bg-info">Thornton</td>
                                <td class="bg-danger">@fat</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class=" p-2 text-white" style="background-color:#2d3387;">Last Results</div>
                    <div class="mb-5 mt-3 ">
                        <span class="circle-image blink">A</span>
                        <span class="circle-image blink">A</span>
                        <span class="circle-image blink">A</span>
                        <span class="circle-image bg-info blink">B</span>
                        <span class="circle-image bg-info blink">B</span>
                        <span class="circle-image bg-info blink">B</span>
                        <span class="circle-image blink">A</span>
                        <span class="circle-image blink">A</span>
                        <span class="circle-image bg-info blink">B</span>
                    </div>
                </div>

            </div>
        </div>
    </main>
    <!--Main Section-->
@endsection
@section('javascript')
    <script></script>
@endsection

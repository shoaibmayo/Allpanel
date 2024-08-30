@extends('frontend.layouts.app')
@section('title')
    CRICKET247BUZZ
@endsection
@section('content')
    <!--Main Section-->
    <main>
        <!--bilink section-->
        <div class="scroll-container">
            <div class="scroll-item">
                <a class="" href="#">
                    <button class="btn  blink text-white " style="background-color:#2d3387;">Blinking Button</button>
                </a>
            </div>
            <div class="scroll-item">
                <a class="" href="#">
                    <button class="btn  blink text-white " style="background-color:#2d3387;">Blinking Button</button>
                </a>
            </div>
            <div class="scroll-item">
                <a class="" href="#">
                    <button class="btn  blink text-white " style="background-color:#2d3387;">Blinking Button</button>
                </a>
            </div>
            <div class="scroll-item">
                <a class="" href="#">
                    <button class="btn  blink text-white " style="background-color:#2d3387;">Blinking Button</button>
                </a>
            </div>
            <div class="scroll-item">
                <a class="" href="#">
                    <button class="btn  blink text-white " style="background-color:#2d3387;">Blinking Button</button>
                </a>
            </div>
            <div class="scroll-item">
                <a class="" href="#">
                    <button class="btn  blink text-white " style="background-color:#2d3387;">Blinking Button</button>
                </a>
            </div>
            <div class="scroll-item">
                <a class="" href="#">
                    <button class="btn  blink text-white " style="background-color:#2d3387;">Blinking Button</button>
                </a>
            </div>
            <div class="scroll-item">
                <a class="" href="#">
                    <button class="btn  blink text-white " style="background-color:#2d3387;">Blinking Button</button>
                </a>
            </div>
            <div class="scroll-item">
                <a class="" href="#">
                    <button class="btn  blink text-white " style="background-color:#2d3387;">Blinking Button</button>
                </a>
            </div>
            <div class="scroll-item">
                <a class="" href="#">
                    <button class="btn  blink text-white " style="background-color:#2d3387;">Blinking Button</button>
                </a>
            </div>
        </div>
        <!--blink section-->
        <!--item slider-->
        <div class="scroll-container">
            <div class="scroll-item">
                <a class="nav-link " href="#">
                    <span>Cricket</span>
                </a>
            </div>
            <div class="scroll-item">
                <a class="nav-link " href="#">
                    <span>Football</span>
                </a>
            </div>
            <div class="scroll-item">
                <a class="nav-link " href="#">
                    <span>Tennis</span>
                </a>
            </div>
            <div class="scroll-item">
                <a class="nav-link " href="#">
                    <span>Horse Racing</span>
                </a>
            </div>
            <div class="scroll-item">
                <a class="nav-link " href="#">
                    <span>Grevhound Racing</span>
                </a>
            </div>
            <div class="scroll-item">
                <a class="nav-link " href="#">
                    <span>Teenpatti</span>
                </a>
            </div>
            <div class="scroll-item">
                <a class="nav-link " href="#">
                    <span>Roulette</span>
                </a>
            </div>
            <div class="scroll-item">
                <a class="nav-link " href="#">
                    <span>Roulette</span>
                </a>
            </div>
            <div class="scroll-item">
                <a class="nav-link " href="#">
                    <span>Roulette</span>
                </a>
            </div>
            <div class="scroll-item">
                <a class="nav-link " href="#">
                    <span>Roulette</span>
                </a>
            </div>
        </div>
        <!--table section-->
        <!--table section-->
        <div class="container-fluid">
            <div class="row ">
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
        </div>
        <!--item slider-->
        <section class=" pt-2">
            <div class="container">
                <div class="section-title">
                    <h4>All Games</h4>
                </div>
                <div class="row gx-2">
                    @if ($games->IsNotEmpty())
                        @foreach ($games as $game)
                            @php
                                $gameImage = $game->game_images->first();
                            @endphp
                            <div class="col-md-2 mt-2">
                                <div class="card product-card">
                                    <div class="product-image position-relative">
                                        <a href="{{ route('front.plyGame',$game->slug) }}" class="product-img">
                                            @if (!empty($gameImage->image))
                                                <img src="{{ asset('images/' . $gameImage->image) }}" class="card-img-top"
                                                    width="100" height="200">
                                            @endif
                                        </a>
                                    </div>
                                    <a class=" nav-link text-center" href="{{ route('front.plyGame',$game->slug) }}">
                                        {{ $game->name }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </section>

    </main>
    <!--Main Section-->

@endsection
@section('javascript')
    <script></script>
@endsection

@extends('site.home.master')

@section('title','Volley')

@section('content')

    <div class="container">
        <div class="box">
            <div class="box-body">
                <div class=" sidebar-widgets">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget newsletter-widget">
                            <h4 class="single-sidebar-widget__title">Modalidades</h4>
                            <h2>Futsal</h2>
                            <p>O futsal, também chamado de futebol de salão, é um esporte coletivo semelhante ao futebol de campo, porém possui suas peculiaridades.

                                Ainda que sejam semelhantes, o futsal possui regras específicas e diferencia-se, por exemplo, pelo número de jogadores e as dimensões do espaço de jogo. </p>
                            <h2>Regras</h2>
                            <p>As principais regras do futsal são: </p>
                            <ul>
                                <li>No futsal nunca se deve colocar a mão na bola.</li>
                                <li>não há o conceito de impedimento, como no futebol de campo</li>
                                <li>O tempo total de jogo é de 40 minutos.</li>
                                <li>Três cartões amarelos equivalem a um vermelho</li>
                                <li>As faltas podem ser cometidas quando o jogador encosta a mão na bola, quando há desavenças entre jogadores e árbitros, ou ainda, quando há violência física ou verbal.
                                </li>
                            </ul>
                            <p>Quantidade de jogadores: 5 (cada equipe)</p>
                            <figure class="image"><img alt="Partida de futsal" height="472"
                                                       src={{asset('storage/images/modalities/futsal.jpg')}}
                                                       width="630">
                                <figcaption>Partida de futsal</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Blog Post Siddebar -->
        </div>
    </div>
@endsection
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
                            <h2>Tênis de mesa</h2>
                            <p>O Tênis de Mesa é um dos esportes mais populares no mundo, se considerado pela quantidade de jogadores. Também chamada de Pingue-Pongue e
                                Mesatenismo, a modalidade teve seu início na Inglaterra (Século XIX) e inicialmente foi chamado de ping pong, mas alguns anos depois se
                                tornou uma Marca Registrada e foi convencionado se chamar de Tênis de Mesa. Ainda é considerado um esporte com a bola mais veloz do mundo,
                                cuja raquete pode produzir uma força motriz de grande efeito. </p>
                            <p>Atualmente a China é o país que lidera o ranking em popularidade do esporte, com mais de 10 milhões de adeptos devidamente registrados na Federação.</p>
                            <h2>Regras</h2>
                            <p>As principais regras do tênis de mesa são: </p>
                            <ul>
                                <li>partida é disputada em Sets ímpares;</li>
                                <li>os torneios no âmbito nacional possuem o padrão de disputa com um melhor de 5 Sets e os internacionais cujo limite é de 7 sets;</li>
                                <li>Vence a partida o jogador que ganhar 3 ou 4 Sets;</li>
                                <li> Cada set tem um máximo de 25 pontos com uma diferença mínima de 2 pontos;</li>
                                <li>A contagem do Set é feita até 11 e se houver empate, será somado mais dois pontos de vantagem
                                </li>
                                <li>Para iniciar o jogo, começa com o saque de um dos adversários  e segue a marcação da pontuação geral.</li>
                            </ul>
                            <p>Quantidade de jogadores: 1 (cada equipe)</p>
                            <figure class="image"><img alt="Tênis de Mesa. Foto: Stefan Holm / Shutterstock.com" height="472"
                                                       src={{asset('storage/images/modalities/tenis-de-mesa.jpg')}}
                                                       width="630">
                                <figcaption>Tênis de Mesa. Foto: Stefan Holm / Shutterstock.com</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Blog Post Siddebar -->
        </div>
    </div>
@endsection
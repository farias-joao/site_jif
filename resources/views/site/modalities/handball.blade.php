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
                            <h2>Handball</h2>
                            <p>criada pelo alemão Karl Schelenz, em 1919 — embora se baseasse em outros desportos praticados desde fins do
                                século XIX, na Europa setentrional e no Uruguai. O jogo inicialmente era praticado na relva em um campo
                                similar ao do futebol com dimensões entre 90 m a 110 m de comprimento e entre 55 m a 65 m de largura, a
                                área de baliza (gol em português do Brasil) com raio de 13 m, a baliza com 7,32 m de largura por 2,44 m de altura
                                (a mesma usada no futebol), e era disputado por duas equipas de onze jogadores cada, sendo a bola semelhante à usada
                                na versão de sete jogadores </p>
                            <h2>Regras</h2>
                            <p>As principais regras do handball são: </p>
                            <ul>
                                <li>É permitido: lançar, parar e pegar a bola, não importa de que maneira, com a ajuda das mãos, braços, cabeça, tronco, coxa e joelhos (menos os pés)</li>
                                <li>Segurar a bola durante o máximo de 3 segundos mesmo se ela está no chão</li>
                                <li>Fazer o máximo de 3 passos com a bola na mão;</li>
                                <li> Conduzir ou manejar a bola com os pés não é permitido e nem chutar;</li>
                                <li>Somente o guarda-redes pode permanecer na área de gol.
                                </li>
                            </ul>
                            <p>Quantidade de jogadores: 7 (cada equipe)</p>
                            <figure class="image"><img alt="Partida de handball" height="472"
                                                       src={{asset('storage/images/modalities/hand.jpeg')}}
                                                       width="630">
                                <figcaption>Partida de handball</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Blog Post Siddebar -->
        </div>
    </div>
@endsection
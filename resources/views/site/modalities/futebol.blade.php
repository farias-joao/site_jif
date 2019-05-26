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
                            <h2>Futebol</h2>
                            <p>Futebol é um esporte disputado entre duas equipes, cada uma com 11 jogadores, que utilizam os pés e a cabeça para movimentar a
                                bola em direção ao campo adversário, com o objetivo de colocá-la dentro do gol ou meta. A partida divide-se em dois tempos de
                                45 minutos, com um intervalo de 15 minutos. O tempo de jogo pode ser prorrogado por acidente ou qualquer outra causa a critério
                                do juiz. A equipe vencedora é a que faz o maior número de gols. </p>
                            <h2>Regras</h2>
                            <p>As principais regras do futebol são: </p>
                            <ul>
                                <li>Cada partida tem 90 minutos e é dividida em dois tempos de 45 minutos cada.</li>
                                <li>O jogo é supervisionado por um árbitro.</li>
                                <li>É proibido o uso das mãos para o manejo da bola. Podem, entretanto, serem usados os pés, as pernas, o tronco e a cabeça.</li>
                                <li> SPara evitar que os jogadores do time adversário fiquem apenas na área penal do lado adversário, foi criada a regra do
                                    impedimento. Ela consiste em impedir ou invalidar um gol que tenha sido feito por um jogador quando não há pelo menos dois
                                    jogadores da outra equipe entre ele a linha de fundo adversária.</li>
                                <li>O vencedor da partida é aquele que conseguir fazer o maior número de gols.
                                </li>
                                <li>Em caso de desempate, podem ser feitas duas prorrogações de 15 minutos ao final dos tempos.</li>
                                <li>Quando um jogador comete faltas, ele pode receber um cartão amarelo ou um cartão vermelho. Se receber
                                    dois cartões amarelos ou um cartão vermelho em uma partida, ele é expulso do jogo</li>
                                <li> Caso um jogador execute alguma agressão física sobre um adversário, o juiz deve marcar pênalti a favor do time adversário.</li>
                                <li>Quando a bola sai do campo pela linha de fundo, é cobrado escanteio se o último jogador a tocá-la estava na defensiva, e é cobrado
                                    tiro de meta se o último jogador a tocá-la estava no ataque. Nesse caso, o escanteio é a favor do time atacante e o tiro de
                                    meta, a favor do time da defensiva.</li>
                            </ul>
                            <p>Quantidade de jogadores: 11 (cada equipe)</p>
                            <figure class="image"><img alt="Partida de futebol" height="472"
                                                       src={{asset('storage/images/modalities/futebol.jpg')}}
                                                       width="630">
                                <figcaption>Partida de futebol</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Blog Post Siddebar -->
        </div>
    </div>
@endsection
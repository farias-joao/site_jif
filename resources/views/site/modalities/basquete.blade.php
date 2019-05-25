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
                            <h2>Basquete</h2>
                            <p>O basquetebol, ou simplesmente basquete, é um esporte coletivo praticado entre duas equipes. Ele é jogado com uma bola, onde o
                                objetivo é inseri-la no cesto fixo que está localizado nas extremidades da quadra.

                                Atualmente, o basquetebol é um dos jogos olímpicos mais populares no mundo. Nas escolas, é um dos esportes mais praticados
                                nas aulas de educação física. </p>
                            <h2>Regras</h2>
                            <p>As principais regras do basquete são: </p>
                            <ul>
                                <li> tem como objetivo inserir a bola no cesto correspondente à sua equipe. </li>
                                <li>os pontos variam segundo o local de arremesso.</li>
                                <li>O jogo está dividido em 4 tempos, sendo 10 minutos para cada</li>
                                <li>passes de bola podem ser: passe com a mão, passe de peito, passe picado (ou quicado), passe de ombro e passe por cima da cabeça.</li>
                                <li>jogadores não podem dar mais de três passos com a bola nas mãos
                                </li>
                                <li> jogador não pode receber mais que 5 faltas;</li>
                                <li> As faltam podem ser cometidas quando o jogador dá mais de dois passos sem quicar a bola.</li>
                                <li> jogador não pode permanecer mais que 5 segundos com a bola nas mãos.</li>
                                <li> na área denominada “garrafão”, os jogadores não podem permanecer mais de 3 segundos..</li>
                            </ul>
                            <p>Quantidade de jogadores: 5 (cada equipe)</p>
                            <figure class="image"><img alt="Partida de basquetebol" height="472"
                                                       src={{asset('storage/images/modalities/basquete.jpg')}}
                                                       width="630">
                                <figcaption>Partida de basquetebol</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Blog Post Siddebar -->
        </div>
    </div>
@endsection
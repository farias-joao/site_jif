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
                            <h2>Xadrez</h2>
                            <p>O jogo de Xadrez tem dois participantes, que usam um tabuleiro para jogar.O jogo é composto por 32 peças,
                                16 brancas e 16 pretas. Sendo que ambas as cores possuem: 2 Torres, 2 Cavalos, 2 Bispos, 1 Dama,
                                1 Rei e 8 Peões. O Tabuleiro é formado por 64 casas, claras e escuras e seu objetivo é Impor o xeque-mate
                                ao adversário ou o seu rendimento.</p>
                            <h2>Regras</h2>
                            <p>As principais regras do xadrez são: </p>
                            <ul>
                                <li>Torre - A movimentação da torre se dá somente de forma horizontal (linhas do tabuleiro) ou vertical (colunas do tabuleiro).</li>
                                <li>Bispo - Esta peça se movimenta somente nas diagonais do tabuleiro.</li>
                                <li>Dama - Uma dama pode se movimentar tanto na horizontal como na vertical (assim como uma torre) ou nas diagonais (assim como um bispo).</li>
                                <li>Rei - Se movimenta em qualquer direção mas com limitação quanto ao número de casas. O limite de casas que um rei pode se deslocar é de
                                    uma casa por lance. O rei NUNCA pode fazer um movimento que resulte em um xeque para ele.
                                </li>
                                <li>Peão - O peão somente pode fazer movimentos adjacentes à sua posição anterior, isto é, não pode retroceder. O peão, assim como o rei só pode
                                    deslocar-se 1 casa à frente por lance, no entanto, quando o peão ainda está na sua posição inicial, este pode dar um salto de 2 casas à frente.</li>
                                <li> Cavalo - É a única peça que pode "saltar" sobre outras peças. A movimentação do cavalo é feita em forma de "L", ou seja, anda 2 casas em
                                    qualquer direção (vertical ou horizontal) e depois mais uma em sentido perpendicular.</li>
                                <li> Nenhuma peça, quando deslocada, pode ocupar uma casa que já está sendo ocupada por outra peça da mesma cor</li>
                                <li> Quando a casa de destino de uma peça, quando em movimento, estiver sendo ocupada por uma peça de cor adversária,
                                    a peça em movimento efetuará a captura da aversária.</li>
                                <li> A captura feita por peças do tipo peão só é possível quando a peça a ser capturada estiver deslocada uma linha à frente e 1 coluna a direita
                                    ou a esquerda. A captura se dá na diagonal.</li>
                                <li>Um peão, ao alcançar a última linha do tabuleiro  é promovido, o jogador é obrigado a escolher entre uma das seguintes peças para substituí-lo:                                   Dama
                                    Torre ,Bispo ou Cavalo</li>
                            </ul>
                            <p>Quantidade de jogadores: 1 (cada equipe)</p>
                            <figure class="image"><img alt="Peças xadrez" height="472"
                                                       src={{asset('storage/images/modalities/xadrez.jpg')}}
                                                       width="630">
                                <figcaption>Peças xadrez</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Blog Post Siddebar -->
        </div>
    </div>
@endsection
<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        echo "Criando 1 tipos de usuarios...\n";
        factory(App\Models\TypeUser::class, 1)->create();

        echo "Criando 1 usuarios...\n";
        factory(App\User::class, 1)->create();

       /* echo "Criando 4 solicitacoes...\n";
        factory(App\Models\Solicitation::class, 4)->create();

        echo "Criando 10 jogadores...\n";
        factory(App\Models\Player::class, 10)->create();

        echo "Criando 5 modalidades...\n";
        factory(App\Models\Modality::class, 5)->create();

        echo "Criando 3 times...\n";
        factory(App\Models\Team::class, 3)->create();

        echo "Criando 10 jogadorTime...\n";
        factory(App\Models\PlayerTeam::class, 10)->create();

        echo "Criando 5 locais...\n";
        factory(App\Models\Local::class, 5)->create();

        echo "Criando 5 enderecos...\n";
        factory(App\Models\Address::class, 5)->create();

        echo "Criando 4 jogos...\n";
        factory(App\Models\Game::class, 4)->create();

        echo "Criando 4 jogosTime...\n";
        factory(App\Models\PlayerTeam::class, 4)->create();

        echo "Criando 4 noticias...\n";
        factory(App\Models\Notice::class, 4)->create();

        echo "Criando 10 comentarios...\n";
        factory(App\Models\Comment::class, 10)->create();

        echo "Criando 3 pontuacoes...\n";
        factory(App\Models\Punctuation::class, 3)->create();

        echo "Criando 10 resultados...\n";
        factory(App\Models\Result::class, 10)->create();

        echo "Criando 10 placares...\n";
        factory(App\Models\Scoreboard::class, 10)->create();

        echo "Criando 10 jogos time...\n";
        factory(App\Models\GameTeam::class, 10)->create();*/
    }
}

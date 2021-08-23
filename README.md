#Sobre o projeto

Back-end e api para o sistemas de Correios de Ghotam City. Feito em laravel, em sua versão 8.

Versão do PHP utilizada: 7.4.20 (recomendo ter a mesma versão para a instalação dos pacotes)

Versão do composer: 2.1.5 (recomendo a versão > 2 para a instalação dos pacotes)

#Instalação

1. Clone o repositório
2. Configure seu .env Cpode copiar do .env.example). Lembre de ter um banco de dados mysql em sua máquina chamado cep_trade, para que assim consiga rodar as migrations;
3. Rode o comando composer install : para instalar as dependências do projeto
4. Caso no seu .env não tenha nada na sua chave APP_KEY, rode o comando php artisan key:generate. Caso no seu .env não tenha nada na chave JWT_SECRET, rode o comando php artisan jwt:secret para gerar uma nova chave.
5. Rode o comando php artisan migrate --seed : para rodar e configurar o banco de dados, juntamente com a seed de usuário. Assim você terá um usuário disponível no front para realizar o login (usuario e senha no readme.md do projeto front-end)
6. Rode o comando php artisan serve para rodar a api localmente. Atente-se que esteja rodando na porta 8000, pois assim está configurado no front. Caso deseje mudar, precisa reconfigurar o env do front-end;

# Telescope

Foi instalado o telescope (serviço do laravel que auxilia no desenvolvimento). Caso queira utilizar, rodar o comando php artisan telescope:install para ter acesso à rota /telescope.

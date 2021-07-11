# Desafio Estágio da Convergence Works

Gosta de novas tecnologias e de desafios? Tem espírito de equipe e é comprometido? Você gostaria de colocar tudo isto em prática em uma empresa?

## Quem somos?
Somos a Convergence Works, somos a convergência entre os desafios das empresas e as ideias pra vencê-los. Desenvolvemos plataformas para o mundo digital, com foco em comunicação. Somos especialistas na criação de sites e aplicativos para plataformas de comunicação. Integramos sistema de gestão de conteúdo, aplicativo, disparo de email, solução para clube de assinantes, implantação de editoriais em múltiplas plataformas.

## A Vaga
Para se candidatar:  

- Conhecimento em programação (PHP, JavaScript ou outras)
- Noções de desenvolvimento de software
- Conhecimentos em Git
- Conhecimentos em Http
- Capacidade de comunicação, comprometimento e vontade de pôr a mão na massa;
- Capacidade de aprender rapidamente tecnologias emergentes.

Benefícios
- Excelente ambiente de trabalho 
- Oportunidade de crescimento e contratação

## O Desafio
Para avaliar seu desempenho temos um desafio para você.

Você deverá fazer um fork deste repositório, e desenvolver uma api de notícias acessível. A aplicação deverá consumir a seguinte fonte de dados RSS [https://www.correio24horas.com.br/rss/] e entregar as notícias no formato json, permitindo as seguintes funcionalidades:

- Ordenação: As notícias deverão ser ordenadas por ordem crescente e decrescente a partir dos sequintes campos: pubDate e title
- Filtro de Categoria: Filtrar pelo campo de categoria (category)
- Filtro de limite: Limitar um número máximo de notícias (aceitar valores de 1 até 20)
- Filtro básico: Apenas deverá ser entregue os seguintes campos das notícias: title, description e pubDate.

Ps: Os filtros e ordenações deverão ser passados por parametro GET e documentados no README.md do projeto Git.

Bonus: Filtro de busca textual.

## Critérios de Avaliação

- Organização
- Semântica
- Decisões Técnicas
- Ferramentas Utilizadas

## Sobre a Realização do Desafio by Ailton Silva

Desafio proposto pela Covergence Works para vaga de Programador PHP

Foram utilizadas as seguintes ferramentas: 

1 - Template Metronic; 
2 - Framework Laravel versão 8x;
3 - DOMDocument class PHP

Foi desenvolvida uma aplicação em PHP com 4 rotinas específicas para atender às especificações do desafio, e segue as URLs com parâmetros hipotéticos para ambiente local:

1 - Pesquisa por Categoria: http://localhost/desafio-estagio-backend./public/search-filter-category/brasil 

2 - Pesquisa por Limitação de linhas: http://localhost/desafio-estagio-backend./public/search-filter-limit/3 

3 - Pesquisa por ordenação: http://localhost/desafio-estagio-backend./public/search-filter-ordem/asc 

4 - Pesquisa por Conteúdo Textual (bonus): http://localhost/desafio-estagio-backend./public/search-filter-content/brasil

A aplicação foi desenvolvida para rotas GET conforme solicitado, e está funcional do ponto de vista do entendimento da tarefa.

<?php

namespace App\Http\Controllers;

use DOMDocument;
use Illuminate\Http\Request;
use stdClass;

class PagesController extends Controller
{
    /**
     * Método para index de Busca Por Categoria
     */
    public function indexCategory()
    {
        $page_title = 'Dashboard - Desafio C W';
        $page_description = 'Busca Por Categoria';

        return view('pages.desafio_cw_category', compact('page_title', 'page_description'));
    }

    /**
     * Método para index de Busca Por Limitação
     */
    public function indexLimit()
    {
        $page_title = 'Dashboard - Desafio C W';
        $page_description = 'Busca Por Limitação - (1 a 20)';

        return view('pages.desafio_cw_limit', compact('page_title', 'page_description'));
    }

    /**
     * Método para index de Busca Por Ordenação
     */
    public function indexOrdem()
    {
        $page_title = 'Dashboard - Desafio C W';
        $page_description = 'Busca Por Ordenação - (ASC e DESC)';

        return view('pages.desafio_cw_ordem', compact('page_title', 'page_description'));
    }

    /**
     * Método para index de Busca Por Categoria
     */
    public function indexContent()
    {
        $page_title = 'Dashboard - Desafio C W';
        $page_description = 'Busca Por Conteúdo';

        return view('pages.desafio_cw_content', compact('page_title', 'page_description'));
    }

    /**
     * Método para pegar o content encodado e demais variáveis
     */
    public function getContentFeedRssEncoded()
    {
        $url = 'https://www.correio24horas.com.br/rss/';

        $rss = new DOMDocument();
        $rss->load($url);
        $feed = array();
        foreach ($rss->getElementsByTagName('item') as $node) {
            $item = array (
                    'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
                    'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
                    'pubDate' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
                    'description' => $node->getElementsByTagName('description')->item(0)->nodeValue,
                    'category' => $node->getElementsByTagName('category')->item(0)->nodeValue,
                    'content' => $node->getElementsByTagName('encoded')->item(0)->nodeValue

                    );
            array_push($feed, $item);
        }
        $json = json_encode($feed);
        return $json;
    }

    /**
     * Método para fazer o tratamento das pesquisas RSS - por categoria
     */
    public function searchRssCategory(string $category=null)
    {
        $message = null;
        //captura dos dados em Json
        $json = $this->getContentFeedRssEncoded();
        $dados_json = json_decode($json,TRUE);
        
        $result = 'success';
        $page_title = 'Dashboard - Desafio C W';
        $page_description = 'Pesquisa por Categoria';

        /**
         * Funcionalidade para gerar o filtro de acordo a categoria pesquisada
         */
        //variavel object para armazenamento dos dados filtrados
        $outObj = collect();
        $_i = 0;
        if($category != '') {
            foreach($dados_json as $dados) {
                if (strpos($dados['category'], $category) !== false) {
                    $obj = new stdClass();
                    $obj->pubDate       = $dados['pubDate'];
                    $obj->category      = $dados['category'];
                    $obj->title         = $dados['title'];
                    $obj->description   = $dados['description'];
                    $obj->content       = $dados['content'];

                    $outObj->push($obj);
                    $_i++;
                }
            }
            //pesquisa filtrada
            $message =  "Pesquisa por categoria, que contenha(m): '" . $category .  "'. Fora(m) localizado(s) " . $_i . " registro(s)!";
        } else {
            //busca  global
            foreach($dados_json as $dados) {
                $obj = new stdClass();
                $obj->pubDate       = $dados['pubDate'];
                $obj->category      = $dados['category'];
                $obj->title         = $dados['title'];
                $obj->description   = $dados['description'];
                $obj->content       = $dados['content'];

                $outObj->push($obj);
                $_i++;
            }
            $message =  "Pesquisa global. Foram localizados " . $_i . " registro(s)!";
        }
        if($_i == 0){
            $message =  "Não fora(m) encontrado(s) nenhum registro(s)!";
            $result = 'danger'; 
        }
        $dados_json = (array)$outObj;
        $dados_json = json_encode($dados_json);
        $dados_json = json_decode($dados_json,TRUE);
        
        return view('pages.desafio_cw_category', compact('page_title', 'page_description', 'dados_json', 'message', 'result'));
    }

    /**
     * Método para fazer o tratamento das pesquisas RSS - por limitação
     */
    public function searchRssLimit(int $limit=null)
    {
        $message = null;
        $_limit = ($limit > 0) ? ($limit-1) : null;
        //captura dos dados em Json
        $json = $this->getContentFeedRssEncoded();
        $dados_json = json_decode($json,TRUE);

        $result = 'success';
        $page_title = 'Dashboard - Desafio C W';
        $page_description = 'Pesquisa por Limitação';

        /**
         * Funcionalidade para gerar o filtro de acordo a categoria pesquisada
         */
        //variavel object para armazenamento dos dados filtrados
        $outObj = collect();
        $_i = 0;
        if(!is_null($_limit)) {
            foreach($dados_json as $dados) {
                if ($_i <= $_limit) {
                    $obj = new stdClass();
                    $obj->pubDate       = $dados['pubDate'];
                    $obj->category      = $dados['category'];
                    $obj->title         = $dados['title'];
                    $obj->description   = $dados['description'];
                    $obj->content       = $dados['content'];

                    $outObj->push($obj);
                    $_i++;
                }
            }
            //pesquisa filtrada
            $message =  "Pesquisa por limitação, que totaliza(m): '" . $limit .  "'  registro(s)!";
        } else {
            //busca  global
            foreach($dados_json as $dados) {
                $obj = new stdClass();
                $obj->pubDate       = $dados['pubDate'];
                $obj->category      = $dados['category'];
                $obj->title         = $dados['title'];
                $obj->description   = $dados['description'];
                $obj->content       = $dados['content'];

                $outObj->push($obj);
                $_i++;
            }
            $message =  "Pesquisa global. Foram localizados " . $_i . " registro(s)!";
        }
        if($_i == 0){
            $message =  "Não fora(m) encontrado(s) nenhum registro(s)!";
            $result = 'danger'; 
        }
        $dados_json = (array)$outObj;
        $dados_json = json_encode($dados_json);
        $dados_json = json_decode($dados_json,TRUE);
        
        return view('pages.desafio_cw_limit', compact('page_title', 'page_description', 'dados_json', 'message', 'result'));
    }

    /**
     * Método para fazer o tratamento das pesquisas RSS - por ordenação
     */
    public function searchRssOrdem(string $ordem=null)
    {
        $message = null;
        //captura dos dados em Json
        $json = $this->getContentFeedRssEncoded();
        $dados_json = json_decode($json,TRUE);

        $result = 'success';
        $page_title = 'Dashboard - Desafio C W';
        $page_description = 'Pesquisa por Ordenação';

        /**
         * Funcionalidade para gerar o filtro de acordo a categoria pesquisada
         */
        //variavel object para armazenamento dos dados filtrados
        $outObj = collect();
        $_i = 0;
        //busca  única - geração do objeto
        foreach($dados_json as $dados) {
            $obj = new stdClass();
            $obj->pubDate       = $dados['pubDate'];
            $obj->category      = $dados['category'];
            $obj->title         = $dados['title'];
            $obj->description   = $dados['description'];
            $obj->content       = $dados['content'];

            $outObj->push($obj);
            $_i++;
        }
        if($ordem != ''){
            $message =  "Pesquisa pelo parâmetro de ordenação: '" . $ordem .  "'. Foram localizados " . $_i . " registro(s)!";    
        } else {
            $message =  "Pesquisa global. Foram localizados " . $_i . " registro(s)!";
        }
        if($_i == 0){
            $message =  "Não fora(m) encontrado(s) nenhum registro(s)!";
            $result = 'danger'; 
        }
        $dados_json = (array)$outObj;
        $dados_json = json_encode($dados_json);
        $dados_json = json_decode($dados_json,TRUE);
        
        return view('pages.desafio_cw_ordem', compact('page_title', 'page_description', 'dados_json', 'message', 'result', 'ordem'));
    }

    /**
     * Método para setar o conteúdo pesquisado no texto
     */
    public function traitStringContent(string $text)
    {
        $replace_content = '<span style="background-color: rgb(255, 255, 0);"><strong><u>' . $text . '</u></strong></span>';
        return $replace_content;
    }

    /**
     * Método para fazer o tratamento das pesquisas RSS - por conteúdo textual
     */
    public function searchRssContent(string $content=null)
    {
        $message = null;
        //captura dos dados em Json
        $json = $this->getContentFeedRssEncoded();
        $dados_json = json_decode($json,TRUE);

        $result = 'success';
        $page_title = 'Dashboard - Desafio C W';
        $page_description = 'Pesquisa por Conteúdo Textual';

        /**
         * Funcionalidade para gerar o filtro de acordo a categoria pesquisada
         */
        //variavel object para armazenamento dos dados filtrados
        $outObj = collect();
        $_i = 0;
        if($content != '') {
            foreach($dados_json as $dados) {
                if (strpos($dados['content'], $content) !== false) {
                    $obj = new stdClass();
                    $obj->pubDate       = $dados['pubDate'];
                    $obj->category      = $dados['category'];
                    $obj->title         = $dados['title'];
                    $obj->description   = $dados['description'];
                    $obj->content       = $dados['content'];
                    $content_trait = $this->traitStringContent($content);
                    $obj->content = str_replace($content, $content_trait, $obj->content);

                    $outObj->push($obj);
                    $_i++;
                }
            }
            //pesquisa filtrada
            $message =  "Pesquisa por conteúdo textual, que contenha(m): '" . $content .  "'. Fora(m) localizado(s) " . $_i . " registro(s)!";
        } else {
            //busca  global
            foreach($dados_json as $dados) {
                $obj = new stdClass();
                $obj->pubDate       = $dados['pubDate'];
                $obj->category      = $dados['category'];
                $obj->title         = $dados['title'];
                $obj->description   = $dados['description'];
                $obj->content       = $dados['content'];

                $outObj->push($obj);
                $_i++;
            }
            $message =  "Pesquisa global. Foram localizados " . $_i . " registro(s)!";
        }
        if($_i == 0){
            $message =  "Não fora(m) encontrado(s) nenhum registro(s)!";
            $result = 'danger'; 
        }
        $dados_json = (array)$outObj;
        asort($dados_json);//parametro tem que ser passado para a blade
        $dados_json = json_encode($dados_json);
        $dados_json = json_decode($dados_json,TRUE);
        
        return view('pages.desafio_cw_content', compact('page_title', 'page_description', 'dados_json', 'message', 'result'));
    }

    // Quicksearch Result
    public function quickSearch()
    {
        return view('layout.partials.extras._quick_search_result');
    }
}

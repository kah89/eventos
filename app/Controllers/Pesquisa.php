<?php

namespace App\Controllers;

use App\Models\CadPesquisaModel;
use App\Models\CidadeModel;
use App\Models\PesquisaModel;

class Pesquisa extends BaseController
{

    public function pesquisaSatifacao()
    {

        helper(['form', 'url']);
        $atividade = new CadPesquisaModel();
        $cidadeModel = new CidadeModel();
        $data = [
            'title' => 'Pesquisa',
            'atividades' =>  json_encode($atividade->findall()),
            'cidades' => $cidadeModel->findall(),
            'msg' => "",
        ];

        if ($this->request->getMethod() == 'post') {

            //salva no BD
            $model =  new PesquisaModel();

            $newData = [
                'genero' => (int)$this->request->getVar('genero'),
                '60anos' => (int)$this->request->getVar('maior60'),
                'especiais' => (int)$this->request->getVar('portador'),
                'crf-sp' => (int)$this->request->getVar('inscrito'),
                'atividade' => (int)$this->request->getVar('atividade'),
                'participacao' => (int)$this->request->getVar('forma'),
                'data' => $this->request->getVar('data'),
                'municipio' => (int)$this->request->getVar('cidades'),
                'conduta' => (int)$this->request->getVar('a'),
                'abordagem' => (int)$this->request->getVar('b'),
                'conhecimento' => (int)$this->request->getVar('c'),
                'experiencia' => (int)$this->request->getVar('d'),
                'conteudo' => (int)$this->request->getVar('e'),
                'apresentacao' => (int)$this->request->getVar('f'),
                'objetividade' => (int)$this->request->getVar('g'),
                'manifestacao' => $this->request->getVar('manifestacao'),
                'suporte' => (int)$this->request->getVar('suporte'),
            ];


            if ($model->save($newData)) {
                $data['msg'] = "Avaliação enviada com sucesso. Agradecemos a contribuição.";
            } else {
                $data['msg'] = "Erro ao salvar";
            }
            // var_dump($data['msg']);exit;
        }

        echo view('templates/header', $data);
        echo view('pesquisa');
        // echo view('templates/footer');
    }

    //------------------------------------------------------------------------------

    // Cadastra a atividade para um evento
    public function cadastrarPesquisa()
    {
        // Verifica de o usuario está logado * Presente em todas as funções
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {

            helper(['form', 'url']);
            $cidadeModel = new CidadeModel();
            $data = [
                'title' => 'Cadastrar Pesquisa',
                'msg' => "",
                'cidades' => $cidadeModel->findall(),
            ];



            if ($this->request->getMethod() == 'post') {
                //VALIDAÇÕES

                //salva no BD
                $model =  new CadPesquisaModel();

                $newData = [
                    'titulo' => $this->request->getVar('titulo'),
                    'data' => $this->request->getVar('data'),
                    'temas' => $this->request->getVar('temas'),
                    'forma' => (int)$this->request->getVar('forma'),
                    'municipio' => (int)$this->request->getVar('cidades'),
                    'created' => session()->get('id'),
                ];


                if ($model->save($newData)) {
                    $session = session();
                    $session->setFlashdata('success', 'Sua pesquisa foi cadastrada com sucesso!');

                    // return redirect()->to(base_url('alterarAtividades'));
                } else {
                    echo "Erro ao salvar";
                    exit;
                }
            }
        }
        echo view('templates/header', $data);
        echo view('cadastrarPesquisa');
        echo view('templates/footer');
    }

    // Cadastra a atividade para um evento
    public function resultadoPesquisa()
    {
        // Verifica de o usuario está logado * Presente em todas as funções
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url(''));
        } else {
            $model =  new PesquisaModel();
            $resultado = $model->findAll();
            helper(['form', 'url']);

            $masculino = 0;
            $feminino   = 0;
            $mulherTransexual = 0;
            $travesti = 0;
            $homemTransexual = 0;
            $naoBinario = 0;
            $outro = 0;
            $sim = 0;
            $nao = 0;
            $nenhum = 0;
            $presencial = 0;
            $online = 0;
            $muitoSatisfeito = 0;
            $satisfeito   = 0;
            $neutro = 0;
            $insatisfeito = 0;
            $muitoInsatisfeito = 0;
            $naoAvaliar = 0;



            //genero
            foreach ($resultado as $result) {
                if ($result['genero'] == 1) {
                    $masculino++;
                } else if ($result['genero'] == 2) {
                    $feminino++;
                } else if ($result['genero'] == 3) {
                    $mulherTransexual++;
                } else if ($result['genero'] == 4) {
                    $travesti++;
                } else if ($result['genero'] == 5) {
                    $homemTransexual++;
                } else if ($result['genero'] == 6) {
                    $naoBinario++;
                } else {
                    $outro++;
                }


                //IDADE
                if ($result['60anos'] == 1) {
                    $sim++;
                } else if ($result['60anos'] == 2) {
                    $nao++;
                } else {
                    $nenhum++;
                }


                //Portador de necessidades especiais
                if ($result['especiais']  == 1) {
                    $sim++;
                } else if ($result['especiais'] == 2) {
                    $nao++;
                } else {
                    $nenhum++;
                }


                //inscrito crf-sp
                if ($result['crf-sp'] == 1) {
                    $sim++;
                } else if ($result['crf-sp'] == 2) {
                    $nao++;
                } else {
                    $nenhum++;
                }


                // forma de participação
                if ($result['participacao'] == 1) {
                    $presencial++;
                } else {
                    $online++;
                }


                // tipo de atividade
                // if ($result['atividade'] == 1) {
                //     $presencial++;
                // } else {
                //     $online++;
                // }


                // municipio
                // if ($result['municipio'] == 1) {
                //     $presencial++;
                // } else {
                //     $online++;
                // }


                // data
                // if ($result['data'] == 1) {
                //     $presencial++;
                // } else {
                //     $online++;
                // }


                // conduta
                if ($result['conduta'] == 1) {
                    $muitoSatisfeito++;
                } else if ($result['conduta'] == 2) {
                    $satisfeito++;
                } else if ($result['conduta'] == 3) {
                    $neutro++;
                } else if ($result['conduta'] == 4) {
                    $insatisfeito++;
                } else if ($result['conduta'] == 5) {
                    $muitoInsatisfeito++;
                } else {
                    $naoAvaliar++;
                }


                // abordagem
                if ($result['abordagem'] == 1) {
                    $muitoSatisfeito++;
                } else if ($result['abordagem'] == 2) {
                    $satisfeito++;
                } else if ($result['abordagem'] == 3) {
                    $neutro++;
                } else if ($result['abordagem'] == 4) {
                    $insatisfeito++;
                } else if ($result['abordagem'] == 5) {
                    $muitoInsatisfeito++;
                } else {
                    $naoAvaliar++;
                }


                // conhecimento
                if ($result['conhecimento'] == 1) {
                    $muitoSatisfeito++;
                } else if ($result['conhecimento'] == 2) {
                    $satisfeito++;
                } else if ($result['conhecimento'] == 3) {
                    $neutro++;
                } else if ($result['conhecimento'] == 4) {
                    $insatisfeito++;
                } else if ($result['conhecimento'] == 5) {
                    $muitoInsatisfeito++;
                } else {
                    $naoAvaliar++;
                }


                // experiencia
                if ($result['experiencia'] == 1) {
                    $muitoSatisfeito++;
                } else if ($result['experiencia'] == 2) {
                    $satisfeito++;
                } else if ($result['experiencia'] == 3) {
                    $neutro++;
                } else if ($result['experiencia'] == 4) {
                    $insatisfeito++;
                } else if ($result['experiencia'] == 5) {
                    $muitoInsatisfeito++;
                } else {
                    $naoAvaliar++;
                }


                // conteudo
                if ($result['conteudo'] == 1) {
                    $muitoSatisfeito++;
                } else if ($result['conteudo'] == 2) {
                    $satisfeito++;
                } else if ($result['conteudo'] == 3) {
                    $neutro++;
                } else if ($result['conteudo'] == 4) {
                    $insatisfeito++;
                } else if ($result['conteudo'] == 5) {
                    $muitoInsatisfeito++;
                } else {
                    $naoAvaliar++;
                }


                // apresentação
                if ($result['apresentacao'] == 1) {
                    $muitoSatisfeito++;
                } else if ($result['apresentacao'] == 2) {
                    $satisfeito++;
                } else if ($result['apresentacao'] == 3) {
                    $neutro++;
                } else if ($result['apresentacao'] == 4) {
                    $insatisfeito++;
                } else if ($result['apresentacao'] == 5) {
                    $muitoInsatisfeito++;
                } else {
                    $naoAvaliar++;
                }


                // objetividade
                if ($result['objetividade'] == 1) {
                    $muitoSatisfeito++;
                } else if ($result['objetividade'] == 2) {
                    $satisfeito++;
                } else if ($result['objetividade'] == 3) {
                    $neutro++;
                } else if ($result['objetividade'] == 4) {
                    $insatisfeito++;
                } else if ($result['objetividade'] == 5) {
                    $muitoInsatisfeito++;
                } else {
                    $naoAvaliar++;
                }

                // manifestacao
                // if ($result['manifestacao'] == 1) {
                //     $presencial++;
                // } else {
                //     $online++;
                // }


                // suporte
                // if ($result['suporte'] == 1) {
                //     $presencial++;
                // } else {
                //     $online++;
                // }


            }


            $resultado = [
                'masculino' => $masculino,
                'feminino' => $feminino,
                'mulherTransexual' => $mulherTransexual,
                'travesti' => $travesti,
                'homemTransexual' => $homemTransexual,
                'naoBinario' => $naoBinario,
                'outro' => $outro,
                'sim' => $sim,
                'nao' => $nao,
                'nenhum' => $nenhum,
                'presencial' => $presencial,
                'online' => $online,
                'muitoSatisfeito' => $muitoSatisfeito,
                'satisfeito' => $satisfeito,
                'neutro' => $neutro,
                'insatisfeito' => $insatisfeito,
                'muitoInsatisfeito' => $muitoInsatisfeito,
                'naoAvaliar' => $naoAvaliar,
            ];

            $data = [
                'title' => 'Resultado Pesquisa',
                'msg' => "",
                'resultado' => $resultado,
            ];
        }

        // var_dump($resultado);exit;
        echo view('templates/header', $data);
        echo view('resultadosPesquisa');
        echo view('templates/footer');
    }


    public function getForma()
    {
        $forma = service('request')->getPost('forma');

        $pesquisa = new CadPesquisaModel();
        echo $pesquisa->selectAtividade($forma);
    }
}

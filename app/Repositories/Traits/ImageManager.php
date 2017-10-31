<?php

namespace MVG\Repositories\Traits;

trait ImageManager
{
    /**
     * Compara o conteúdo de dois arquivos para verificar se há diferenças.
     *
     * Não verifica qual exatamente é a diferença entre os arquivos. Dessa 
     * forma, uma diferenção é encontrada, a função para de ler os arquivos.
     *
     * @param SplFileInfo $a O primeiro arquivo para comparar.
     * @param SplFileInfo $b O segundo arquivo para comparar.
     * @return bool Indica se há qualquer diferença entre os arquivos.
     */
    public function fileDiff($a, $b) 
    {
        $diff = false;
        $fa = $a->openFile();
        $fb = $b->openFile();

        /*
         * Lê o mesmo número de bytes de cada arquivo. Quebra (break) o loop 
         * assim que uma diferença for encontrada.
         */
        while (!$fa->eof() && !$fb->eof()) {
            if ($fa->fread(4096) !== $fb->fread(4096)) {
                $diff = true;
                break;
            }
        }

        /*
         * Apenas um dos arquivos chegou ao fim.
         */
        if ($fa->eof() !== $fb->eof()) {
            $diff = true;
        }

        /*
         * Closing handlers.
         */
        $fa = null;
        $fb = null;

        return $diff;
    }

    /**
     * Verifica se o arquivo passado já foi enviado antes.
     *
     * Passa de arquivo em arquivo no diretório de uploads, conferindo se algum 
     * pode ser igual ao arquivo sendo enviado.
     *
     * @param SplFileInfo $file O arquivo para verificar.
     * @return bool Indica se arquivo já foi enviando antes.
     */
    public function isAlreadyUploaded($file) 
    {
        $size = $file->getSize();

        /*
         * O arquivo onde os arquivos são gravados.
         */
        $path = storage_path('app/uploads/');

        if (!is_dir($path)) {
            return false;
        }

        $files = scandir($path);

        foreach ($files as $f) {
            $filePath = $path . $f;

            if (!is_file($filePath)) {
                continue;
            }

            /*
             * Se ambos os arquivos tiverem o mesmo tamanho, compara o conteúdo.
             */
            if (filesize($filePath) === $size) {

                /*
                 * Verifica se há alguma diferença, usando a função que escrevemos 
                 * acima.
                 */
                $diff = $this->fileDiff(new \SplFileInfo($filePath), $file);

                /*
                 * Retorna se os arquivos **não** são diferentes, ou seja, iguais. 
                 * Isso significa que já foi enviado antes.
                 */
                return !$diff;
            }
        }

        return false;
    }
}
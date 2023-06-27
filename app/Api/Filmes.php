<?php

namespace App\Api;

/**
 * Classe abstrata auxiliar na busca na API dos filmes
 */
class Filmes
{
    #region METHODS
        /**
         * Metodo que lista os filmes da API
         *
         * @return Mixed
         **/
        public function listAllFilmes()
        {
            try
            {
                $curl = curl_init("https://moviesdatabase.p.rapidapi.com/titles");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, !config('app.debug') );
                curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
                curl_setopt($curl, CURLOPT_TIMEOUT, 0);
                curl_setopt($curl, CURLOPT_HTTPHEADER,[
                    "X-RapidAPI-Host: {$this->getHost()}",
                    "X-RapidAPI-Key: {$this->getKey()}"
                ]);
                $response = curl_exec($curl);
                $result = json_decode($response);
                $err = curl_error($curl);

                curl_close($curl);
                return $result;
            }
            catch (\Throwable $th)
            {
                return [];
            }
        }

        /**
         * Metodo que avança ou volta a pagina da api
         *
         * @return Mixed
         **/
        public function anotherPage($page, $is_back)
        {
            try
            {
                $curl = curl_init("https://moviesdatabase.p.rapidapi.com/titles?page=".$page);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, !config('app.debug') );
                curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 0);
                curl_setopt($curl, CURLOPT_TIMEOUT, 0);
                curl_setopt($curl, CURLOPT_HTTPHEADER,[
                    "X-RapidAPI-Host: {$this->getHost()}",
                    "X-RapidAPI-Key: {$this->getKey()}"
                ]);
                $response = curl_exec($curl);
                $result = json_decode($response);
                $err = curl_error($curl);
                curl_close($curl);
                return $result;
            }
            catch (\Throwable $th)
            {
                return [];
            }
        }
	#endregion

	#region METHODS AUX
		/**
		 * metodo que retorna o host da api
		 *
		 * @return string
		 **/
		private function getHost()
		{
			return config('app.x_rapid_host');
		}

		/**
		 * metodo que retorna a chave da API
		 *
		 * @return string
		 **/
		private function getKey()
		{
			return config('app.x_rapid_key');
		}
	#endregion
}
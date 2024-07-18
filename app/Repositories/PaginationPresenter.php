<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

class PaginationPresenter implements PaginationInterface
{
    /**
     * @var stdClass[]
     */
    private array $items;

    public function __construct(
        protected LengthAwarePaginator $paginator,
    )
    {
        $this ->items = $this -> resolveItems($this -> paginator -> items());
    }

     /**
     * @return stdClass[]
     */
    public function items(): array
    {
        //return $this->paginator->items();
        return $this ->items;

    }
    public function total(): int
    {
        return $this->paginator->total() ?? 0;
    }
    public function isfirstPage(): bool
    {
        return $this->paginator->onFirstPage();
    }
    public function islastPage(): bool
    {
        return $this->paginator->currentPage() === $this->paginator->lastPage();
    }
    public function currentPage(): int
    {
        return $this ->paginator->currentPage() ??1;
    }
    public function getNumberNextPage(): int
    {
        return $this ->paginator->currentPage() + 1;
    }
    public function getNumberPreviousPage(): int
    {
        return $this ->paginator->currentPage() -1;
    }
    //SUBSTITUIR ESSA PARTE ANTIGA PELA NOVA ABAIXO.
    /*
    private function resolveItems(array $items): array
    {
        $response = [];
        foreach( $items as $item ){
            stdClassObject = new stdClass;
            foreach( $item -> toArray() as $key => $value ){
                $stdClassObject -> { $key} = $value;
            }
            array_push($response, $stdClassObject);
        }
        return $response;
    }*/


    //MEU CÓDIGO NOVO CORRIGIDO.

        private function resolveItems(array $items): array
        {
        $response = [];
        foreach ($items as $item) {
            $stdClassObject = new \stdClass(); // Correção: criação e atribuição da instância corretamente
            foreach ($item->toArray() as $key => $value) {
                $stdClassObject->{$key} = $value; // Correção: acesso a propriedade corretamente
            }
            array_push($response, $stdClassObject); // Adiciona o objeto ao array de resposta
        }
        return $response;
        }

        
    
}
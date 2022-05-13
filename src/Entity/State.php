<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

trait State {

    #[ORM\Column(type: 'string', length: 255)]
    protected string $state;

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(string $state): void
    {
        $this->state = $state;
    }

}

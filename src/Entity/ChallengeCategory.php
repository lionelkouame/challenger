<?php

namespace App\Entity;

use App\Repository\ChallengeCategoryRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ChallengeCategoryRepository::class)]
class ChallengeCategory
{
    use State;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    #[Assert\Length(
        min: '5',
        max: 200,
        minMessage: 'Il faut au moins 3 caractères pour le nom',
        maxMessage: 'Il faut 200 caractères maximum')]
    private  $name;



    #[ORM\Column(type: 'string', length: 255)]
    private $code;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }
}

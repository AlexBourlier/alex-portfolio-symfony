<?php

namespace App\Entity;

use App\Repository\DomainRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DomainRepository::class)]
class Domain
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updated_at = null;

    /**
     * @var Collection<int, Compentencies>
     */
    #[ORM\OneToMany(targetEntity: Compentencies::class, mappedBy: 'domain_id')]
    private Collection $compentencies;

    public function __construct()
    {
        $this->compentencies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection<int, Compentencies>
     */
    public function getCompentencies(): Collection
    {
        return $this->compentencies;
    }

    public function addCompentency(Compentencies $compentency): static
    {
        if (!$this->compentencies->contains($compentency)) {
            $this->compentencies->add($compentency);
            $compentency->setDomainId($this);
        }

        return $this;
    }

    public function removeCompentency(Compentencies $compentency): static
    {
        if ($this->compentencies->removeElement($compentency)) {
            // set the owning side to null (unless already changed)
            if ($compentency->getDomainId() === $this) {
                $compentency->setDomainId(null);
            }
        }

        return $this;
    }
}

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
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, Competencies>
     */
    #[ORM\OneToMany(targetEntity: Competencies::class, mappedBy: 'domain')]
    private Collection $competencies;

    public function __construct()
    {
        $this->competencies = new ArrayCollection();
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
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
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, Competencies>
     */
    public function getCompetencies(): Collection
    {
        return $this->competencies;
    }

    public function addCompetency(Competencies $competency): static
    {
        if (!$this->competencies->contains($competency)) {
            $this->competencies->add($competency);
            $competency->setDomain($this);
        }

        return $this;
    }

    public function removeCompetency(Competencies $competency): static
    {
        if ($this->competencies->removeElement($competency)) {
            if ($competency->getDomain() === $this) {
                $competency->setDomain(null);
            }
        }

        return $this;
    }
}
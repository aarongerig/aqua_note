<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GenusRepository")
 * @ORM\Table(name="genus")
 */
class Genus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SubFamily")
     * @ORM\JoinColumn(nullable=false)
     */
    private $subFamily;

    /**
     * @Assert\NotBlank()
     * @Assert\Range(min=0, minMessage="Negative species! Come on...")
     * @ORM\Column(type="integer")
     */
    private $speciesCount;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $funFact;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished = true;

    /**
     * @Assert\NotBlank()
     * @ORM\Column(type="date")
     */
    private $firstDiscoveredAt;

    /**
     * @ORM\OneToMany(targetEntity="GenusNote", mappedBy="genus")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     */
    private $notes;

    /**
     * Genus constructor.
     */
    public function __construct()
    {
        $this->notes = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return SubFamily
     */
    public function getSubFamily()
    {
        return $this->subFamily;
    }

    /**
     * @param SubFamily $subFamily
     */
    public function setSubFamily(SubFamily $subFamily)
    {
        $this->subFamily = $subFamily;
    }

    /**
     * @return mixed
     */
    public function getSpeciesCount()
    {
        return $this->speciesCount;
    }

    /**
     * @param $speciesCount
     */
    public function setSpeciesCount($speciesCount)
    {
        $this->speciesCount = $speciesCount;
    }

    /**
     * @return mixed
     */
    public function getFunFact()
    {
        return $this->funFact;
    }

    /**
     * @param $funFact
     */
    public function setFunFact($funFact)
    {
        $this->funFact = $funFact;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return new \DateTime('-'.rand(0, 100).' days');
    }

    /**
     * @return mixed
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * @param $isPublished
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
    }

    /**
     * @return ArrayCollection|GenusNote[]
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return mixed
     */
    public function getFirstDiscoveredAt()
    {
        return $this->firstDiscoveredAt;
    }

    /**
     * @param \DateTime|null $firstDiscoveredAt
     */
    public function setFirstDiscoveredAt(\DateTime $firstDiscoveredAt = null)
    {
        $this->firstDiscoveredAt = $firstDiscoveredAt;
    }
}

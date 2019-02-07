<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Offre
 *
 * @ORM\Table(name="offre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OffreRepository")
 */
class Offre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="dateDebut", type="datetime")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="datetime")
     */
    private $dateFin;


    /**
     * @var string
     *
     * @ORM\Column(name="qteDisponible", type="integer")
     */
    private $qteDisponible ;

    /**
     * @var \datetime
     *
     * @ORM\Column(name="prix", type="decimal", precision=10, scale=2)
     */
    private $prix;

    /**
     * @var int
     * @ORM\ManyToOne (targetEntity="Produit")
     * @ORM\JoinColumn(nullable = false)
     */
    private $produitId;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     
     */
    private $image;
    /**
     * @var bool
     *
     * @ORM\Column(name="valide", type="boolean")
     */
    private $valide ;
    /**
     * @var int
     * @ORM\Column(name="userId", type="integer")
     */
    private $UserId;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Offre
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Offre
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set qteDisponible
     *
     * @param integer $qteDisponible
     *
     * @return Offre
     */
    public function setQteDisponible($qteDisponible)
    {
        $this->qteDisponible = $qteDisponible;

        return $this;
    }

    /**
     * Get qteDisponible
     *
     * @return integer
     */
    public function getQteDisponible()
    {
        return $this->qteDisponible;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return Offre
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Offre
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set valide
     *
     * @param boolean $valide
     *
     * @return Offre
     */
    public function setValide($valide)
    {
        $this->valide = $valide;

        return $this;
    }

    /**
     * Get valide
     *
     * @return boolean
     */
    public function getValide()
    {
        return $this->valide;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Offre
     */
    public function setUserId($userId)
    {
        $this->UserId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->UserId;
    }

    /**
     * Set produitId
     *
     * @param \AppBundle\Entity\Produit $produitId
     *
     * @return Offre
     */
    public function setProduitId(\AppBundle\Entity\Produit $produitId)
    {
        $this->produitId = $produitId;

        return $this;
    }

    /**
     * Get produitId
     *
     * @return \AppBundle\Entity\Produit
     */
    public function getProduitId()
    {
        return $this->produitId;
    }
}

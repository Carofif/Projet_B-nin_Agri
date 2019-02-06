<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DemandeRepository")
 */
class Demande
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
     * @var \DateTime
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
     * @var int
     *
     * @ORM\Column(name="QuantiteCmd", type="integer")
     */
    private $quantiteCmd;

    /**
     * @var string
     *
     * @ORM\Column(name="PrixUTvoulue", type="decimal", precision=10, scale=2)
     */
    private $prixUTvoulue;
    /**
     * @var int
     * @ORM\ManyToOne (targetEntity="Produit")
     * @ORM\JoinColumn(nullable = false)
     */
    private $produitId;
    /**
     * @var bool
     *
     * @ORM\Column(name="valide", type="boolean")
     */
    private $valide;
    /**
     * @var int
     *@ORM\Column(name="userId", type="integer")
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
     * @return Demande
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
     * @return Demande
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
     * Set quantiteCmd
     *
     * @param integer $quantiteCmd
     *
     * @return Demande
     */
    public function setQuantiteCmd($quantiteCmd)
    {
        $this->quantiteCmd = $quantiteCmd;

        return $this;
    }

    /**
     * Get quantiteCmd
     *
     * @return integer
     */
    public function getQuantiteCmd()
    {
        return $this->quantiteCmd;
    }

    /**
     * Set prixUTvoulue
     *
     * @param string $prixUTvoulue
     *
     * @return Demande
     */
    public function setPrixUTvoulue($prixUTvoulue)
    {
        $this->prixUTvoulue = $prixUTvoulue;

        return $this;
    }

    /**
     * Get prixUTvoulue
     *
     * @return string
     */
    public function getPrixUTvoulue()
    {
        return $this->prixUTvoulue;
    }

    /**
     * Set valide
     *
     * @param boolean $valide
     *
     * @return Demande
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
     * @return Demande
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
     * @return Demande
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

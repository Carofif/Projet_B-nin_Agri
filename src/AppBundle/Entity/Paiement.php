<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paiement
 *
 * @ORM\Table(name="paiement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaiementRepository")
 */
class Paiement
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
     * @ORM\Column(name="montantTTC", type="decimal", precision=10, scale=2)
     */
    private $montantTTC;

    /**
     * @var string
     *
     * @ORM\Column(name="methodePaiement", type="string", length=255)
     */
    private $methodePaiement;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePaiement", type="datetime")
     */
    private $datePaiement;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set montantTTC
     *
     * @param string $montantTTC
     *
     * @return Paiement
     */
    public function setMontantTTC($montantTTC)
    {
        $this->montantTTC = $montantTTC;

        return $this;
    }

    /**
     * Get montantTTC
     *
     * @return string
     */
    public function getMontantTTC()
    {
        return $this->montantTTC;
    }

    /**
     * Set methodePaiement
     *
     * @param string $methodePaiement
     *
     * @return Paiement
     */
    public function setMethodePaiement($methodePaiement)
    {
        $this->methodePaiement = $methodePaiement;

        return $this;
    }

    /**
     * Get methodePaiement
     *
     * @return string
     */
    public function getMethodePaiement()
    {
        return $this->methodePaiement;
    }

    /**
     * Set datePaiement
     *
     * @param \DateTime $datePaiement
     *
     * @return Paiement
     */
    public function setDatePaiement($datePaiement)
    {
        $this->datePaiement = $datePaiement;

        return $this;
    }

    /**
     * Get datePaiement
     *
     * @return \DateTime
     */
    public function getDatePaiement()
    {
        return $this->datePaiement;
    }
}

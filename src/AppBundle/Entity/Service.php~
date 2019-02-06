<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceRepository")
 */
class Service
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
     * @ORM\Column(name="libelle", type="string", length=50)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="prixUTservice", type="decimal", precision=10, scale=2)
     */
    private $prixUTservice;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Service
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set prixUTservice
     *
     * @param string $prixUTservice
     *
     * @return Service
     */
    public function setPrixUTservice($prixUTservice)
    {
        $this->prixUTservice = $prixUTservice;

        return $this;
    }

    /**
     * Get prixUTservice
     *
     * @return string
     */
    public function getPrixUTservice()
    {
        return $this->prixUTservice;
    }
}

<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CatgorieProduit
 *
 * @ORM\Table(name="catgorie_produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CatgorieProduitRepository")
 */
class CatgorieProduit
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
     * @ORM\Column(name="libelleCategorie", type="string", length=255)
     */
    private $libelleCategorie;


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
     * Set libelleCategorie
     *
     * @param string $libelleCategorie
     *
     * @return CatgorieProduit
     */
    public function setLibelleCategorie($libelleCategorie)
    {
        $this->libelleCategorie = $libelleCategorie;

        return $this;
    }

    /**
     * Get libelleCategorie
     *
     * @return string
     */
    public function getLibelleCategorie()
    {
        return $this->libelleCategorie;
    }
}

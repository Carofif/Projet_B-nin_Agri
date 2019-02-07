<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact
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
     * @ORM\Column(name="nonEtPrenom", type="string", length=100)
     */
    private $nonEtPrenom;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="sujet", type="string", length=30)
     */
    private $sujet;

    /**
     * @var string
     *
     * @ORM\Column(name="corpsDuTexte", type="string", length=255)
     */
    private $corpsDuTexte;


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
     * Set nonEtPrenom
     *
     * @param string $nonEtPrenom
     *
     * @return Contact
     */
    public function setNonEtPrenom($nonEtPrenom)
    {
        $this->nonEtPrenom = $nonEtPrenom;

        return $this;
    }

    /**
     * Get nonEtPrenom
     *
     * @return string
     */
    public function getNonEtPrenom()
    {
        return $this->nonEtPrenom;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set sujet
     *
     * @param string $sujet
     *
     * @return Contact
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set corpsDuTexte
     *
     * @param string $corpsDuTexte
     *
     * @return Contact
     */
    public function setCorpsDuTexte($corpsDuTexte)
    {
        $this->corpsDuTexte = $corpsDuTexte;

        return $this;
    }

    /**
     * Get corpsDuTexte
     *
     * @return string
     */
    public function getCorpsDuTexte()
    {
        return $this->corpsDuTexte;
    }
}


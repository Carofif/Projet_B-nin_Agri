<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Produit;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DemandeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateDebut',TextType::class)->add('dateFin',TextType::class)->add('quantiteCmd')->add('prixUTvoulue')->add('produitId', entityType::class,[
        'class'=> 'AppBundle:Produit',
        'choice_label'=>'libelle',

        'expanded'=>false,
        'multiple'=>false]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Demande'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_demande';
    }


}

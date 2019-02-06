<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ChampType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('superficie')->add('addresse')->add('ville')->add('departement',ChoiceType::class,array(
            'choices'=>array(
                'Alibori'=>'Alibori',
                'Atacora'=>'Atacora',
                'Donga'=>'Donga',
                'Borgou'=>'Borgou',
                 'Collines'=>'Collines',
                'Zou'=>'Zou',
                 'Plateau'=>'Plateau',
                'Oueme'=>'Oueme',
                 'Mono'=>'Mono',
                'Couffo'=>'Couffo',
                 'Atlantique'=>'Atlantique',
                'Littoral'=>'Littoral'
                             )
            )
        );
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Champ'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_champ';
    }


}

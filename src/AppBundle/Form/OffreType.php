<?php

namespace AppBundle\Form;

use AppBundle\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

use AppBundle\Entity\Offre;
class OffreType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateDebut',TextType::class)
        ->add('dateFin',TextType::class)
        ->add('qteDisponible')
         ->add('image', FileType::class, array(
                'label' => 'Brochure (PDF file)',
                'data_class' => null,
                'required' => false
            ))
        ->add('prix')->add('produitId', entityType::class,[
            'class'=> 'AppBundle:Produit',
          'choice_label'=>'libelle',

            'expanded'=>false,
            'multiple'=>false,

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Offre'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_offre';
    }


}
